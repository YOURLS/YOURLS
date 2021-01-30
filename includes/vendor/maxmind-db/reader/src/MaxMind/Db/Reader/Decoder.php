<?php

declare(strict_types=1);

namespace MaxMind\Db\Reader;

// @codingStandardsIgnoreLine
use RuntimeException;

/**
 * @ignore
 *
 * We subtract 1 from the log to protect against precision loss.
 */
\define(__NAMESPACE__ . '\_MM_MAX_INT_BYTES', (log(PHP_INT_MAX, 2) - 1) / 8);

class Decoder
{
    /**
     * @var resource
     */
    private $fileStream;
    /**
     * @var int
     */
    private $pointerBase;
    /**
     * @var float
     */
    private $pointerBaseByteSize;
    /**
     * This is only used for unit testing.
     *
     * @var bool
     */
    private $pointerTestHack;
    /**
     * @var bool
     */
    private $switchByteOrder;

    private const _EXTENDED = 0;
    private const _POINTER = 1;
    private const _UTF8_STRING = 2;
    private const _DOUBLE = 3;
    private const _BYTES = 4;
    private const _UINT16 = 5;
    private const _UINT32 = 6;
    private const _MAP = 7;
    private const _INT32 = 8;
    private const _UINT64 = 9;
    private const _UINT128 = 10;
    private const _ARRAY = 11;
    private const _CONTAINER = 12;
    private const _END_MARKER = 13;
    private const _BOOLEAN = 14;
    private const _FLOAT = 15;

    /**
     * @param resource $fileStream
     */
    public function __construct(
        $fileStream,
        int $pointerBase = 0,
        bool $pointerTestHack = false
    ) {
        $this->fileStream = $fileStream;
        $this->pointerBase = $pointerBase;

        $this->pointerBaseByteSize = $pointerBase > 0 ? log($pointerBase, 2) / 8 : 0;
        $this->pointerTestHack = $pointerTestHack;

        $this->switchByteOrder = $this->isPlatformLittleEndian();
    }

    public function decode(int $offset): array
    {
        $ctrlByte = \ord(Util::read($this->fileStream, $offset, 1));
        ++$offset;

        $type = $ctrlByte >> 5;

        // Pointers are a special case, we don't read the next $size bytes, we
        // use the size to determine the length of the pointer and then follow
        // it.
        if ($type === self::_POINTER) {
            [$pointer, $offset] = $this->decodePointer($ctrlByte, $offset);

            // for unit testing
            if ($this->pointerTestHack) {
                return [$pointer];
            }

            [$result] = $this->decode($pointer);

            return [$result, $offset];
        }

        if ($type === self::_EXTENDED) {
            $nextByte = \ord(Util::read($this->fileStream, $offset, 1));

            $type = $nextByte + 7;

            if ($type < 8) {
                throw new InvalidDatabaseException(
                    'Something went horribly wrong in the decoder. An extended type '
                    . 'resolved to a type number < 8 ('
                    . $type
                    . ')'
                );
            }

            ++$offset;
        }

        [$size, $offset] = $this->sizeFromCtrlByte($ctrlByte, $offset);

        return $this->decodeByType($type, $offset, $size);
    }

    private function decodeByType(int $type, int $offset, int $size): array
    {
        switch ($type) {
            case self::_MAP:
                return $this->decodeMap($size, $offset);
            case self::_ARRAY:
                return $this->decodeArray($size, $offset);
            case self::_BOOLEAN:
                return [$this->decodeBoolean($size), $offset];
        }

        $newOffset = $offset + $size;
        $bytes = Util::read($this->fileStream, $offset, $size);
        switch ($type) {
            case self::_BYTES:
            case self::_UTF8_STRING:
                return [$bytes, $newOffset];
            case self::_DOUBLE:
                $this->verifySize(8, $size);

                return [$this->decodeDouble($bytes), $newOffset];
            case self::_FLOAT:
                $this->verifySize(4, $size);

                return [$this->decodeFloat($bytes), $newOffset];
            case self::_INT32:
                return [$this->decodeInt32($bytes, $size), $newOffset];
            case self::_UINT16:
            case self::_UINT32:
            case self::_UINT64:
            case self::_UINT128:
                return [$this->decodeUint($bytes, $size), $newOffset];
            default:
                throw new InvalidDatabaseException(
                    'Unknown or unexpected type: ' . $type
                );
        }
    }

    private function verifySize(int $expected, int $actual): void
    {
        if ($expected !== $actual) {
            throw new InvalidDatabaseException(
                "The MaxMind DB file's data section contains bad data (unknown data type or corrupt data)"
            );
        }
    }

    private function decodeArray(int $size, int $offset): array
    {
        $array = [];

        for ($i = 0; $i < $size; ++$i) {
            [$value, $offset] = $this->decode($offset);
            $array[] = $value;
        }

        return [$array, $offset];
    }

    private function decodeBoolean(int $size): bool
    {
        return $size !== 0;
    }

    private function decodeDouble(string $bytes): float
    {
        // This assumes IEEE 754 doubles, but most (all?) modern platforms
        // use them.
        [, $double] = unpack('E', $bytes);

        return $double;
    }

    private function decodeFloat(string $bytes): float
    {
        // This assumes IEEE 754 floats, but most (all?) modern platforms
        // use them.
        [, $float] = unpack('G', $bytes);

        return $float;
    }

    private function decodeInt32(string $bytes, int $size): int
    {
        switch ($size) {
            case 0:
                return 0;
            case 1:
            case 2:
            case 3:
                $bytes = str_pad($bytes, 4, "\x00", STR_PAD_LEFT);
                break;
            case 4:
                break;
            default:
                throw new InvalidDatabaseException(
                    "The MaxMind DB file's data section contains bad data (unknown data type or corrupt data)"
                );
        }

        [, $int] = unpack('l', $this->maybeSwitchByteOrder($bytes));

        return $int;
    }

    private function decodeMap(int $size, int $offset): array
    {
        $map = [];

        for ($i = 0; $i < $size; ++$i) {
            [$key, $offset] = $this->decode($offset);
            [$value, $offset] = $this->decode($offset);
            $map[$key] = $value;
        }

        return [$map, $offset];
    }

    private function decodePointer(int $ctrlByte, int $offset): array
    {
        $pointerSize = (($ctrlByte >> 3) & 0x3) + 1;

        $buffer = Util::read($this->fileStream, $offset, $pointerSize);
        $offset = $offset + $pointerSize;

        switch ($pointerSize) {
            case 1:
                $packed = \chr($ctrlByte & 0x7) . $buffer;
                [, $pointer] = unpack('n', $packed);
                $pointer += $this->pointerBase;
                break;
            case 2:
                $packed = "\x00" . \chr($ctrlByte & 0x7) . $buffer;
                [, $pointer] = unpack('N', $packed);
                $pointer += $this->pointerBase + 2048;
                break;
            case 3:
                $packed = \chr($ctrlByte & 0x7) . $buffer;

                // It is safe to use 'N' here, even on 32 bit machines as the
                // first bit is 0.
                [, $pointer] = unpack('N', $packed);
                $pointer += $this->pointerBase + 526336;
                break;
            case 4:
                // We cannot use unpack here as we might overflow on 32 bit
                // machines
                $pointerOffset = $this->decodeUint($buffer, $pointerSize);

                $byteLength = $pointerSize + $this->pointerBaseByteSize;

                if ($byteLength <= _MM_MAX_INT_BYTES) {
                    $pointer = $pointerOffset + $this->pointerBase;
                } elseif (\extension_loaded('gmp')) {
                    $pointer = gmp_strval(gmp_add($pointerOffset, $this->pointerBase));
                } elseif (\extension_loaded('bcmath')) {
                    $pointer = bcadd($pointerOffset, (string) $this->pointerBase);
                } else {
                    throw new RuntimeException(
                        'The gmp or bcmath extension must be installed to read this database.'
                    );
                }
                break;
            default:
                throw new InvalidDatabaseException(
                    'Unexpected pointer size ' . $pointerSize
                );
        }

        return [$pointer, $offset];
    }

    private function decodeUint(string $bytes, int $byteLength)
    {
        if ($byteLength === 0) {
            return 0;
        }

        $integer = 0;

        for ($i = 0; $i < $byteLength; ++$i) {
            $part = \ord($bytes[$i]);

            // We only use gmp or bcmath if the final value is too big
            if ($byteLength <= _MM_MAX_INT_BYTES) {
                $integer = ($integer << 8) + $part;
            } elseif (\extension_loaded('gmp')) {
                $integer = gmp_strval(gmp_add(gmp_mul((string) $integer, '256'), $part));
            } elseif (\extension_loaded('bcmath')) {
                $integer = bcadd(bcmul((string) $integer, '256'), (string) $part);
            } else {
                throw new RuntimeException(
                    'The gmp or bcmath extension must be installed to read this database.'
                );
            }
        }

        return $integer;
    }

    private function sizeFromCtrlByte(int $ctrlByte, int $offset): array
    {
        $size = $ctrlByte & 0x1f;

        if ($size < 29) {
            return [$size, $offset];
        }

        $bytesToRead = $size - 28;
        $bytes = Util::read($this->fileStream, $offset, $bytesToRead);

        if ($size === 29) {
            $size = 29 + \ord($bytes);
        } elseif ($size === 30) {
            [, $adjust] = unpack('n', $bytes);
            $size = 285 + $adjust;
        } else {
            [, $adjust] = unpack('N', "\x00" . $bytes);
            $size = $adjust + 65821;
        }

        return [$size, $offset + $bytesToRead];
    }

    private function maybeSwitchByteOrder(string $bytes): string
    {
        return $this->switchByteOrder ? strrev($bytes) : $bytes;
    }

    private function isPlatformLittleEndian(): bool
    {
        $testint = 0x00FF;
        $packed = pack('S', $testint);

        return $testint === current(unpack('v', $packed));
    }
}
