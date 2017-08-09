<?php

namespace MaxMind\Db;

use MaxMind\Db\Reader\Decoder;
use MaxMind\Db\Reader\InvalidDatabaseException;
use MaxMind\Db\Reader\Metadata;
use MaxMind\Db\Reader\Util;

/**
 * Instances of this class provide a reader for the MaxMind DB format. IP
 * addresses can be looked up using the <code>get</code> method.
 */
class Reader
{
    private static $DATA_SECTION_SEPARATOR_SIZE = 16;
    private static $METADATA_START_MARKER = "\xAB\xCD\xEFMaxMind.com";
    private static $METADATA_START_MARKER_LENGTH = 14;
    private static $METADATA_MAX_SIZE = 131072; // 128 * 1024 = 128KB

    private $decoder;
    private $fileHandle;
    private $fileSize;
    private $ipV4Start;
    private $metadata;

    /**
     * Constructs a Reader for the MaxMind DB format. The file passed to it must
     * be a valid MaxMind DB file such as a GeoIp2 database file.
     *
     * @param string $database
     *            the MaxMind DB file to use.
     * @throws \InvalidArgumentException for invalid database path or unknown arguments
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     *             if the database is invalid or there is an error reading
     *             from it.
     */
    public function __construct($database)
    {
        if (func_num_args() != 1) {
            throw new \InvalidArgumentException(
                'The constructor takes exactly one argument.'
            );
        }

        if (!is_readable($database)) {
            throw new \InvalidArgumentException(
                "The file \"$database\" does not exist or is not readable."
            );
        }
        $this->fileHandle = @fopen($database, 'rb');
        if ($this->fileHandle === false) {
            throw new \InvalidArgumentException(
                "Error opening \"$database\"."
            );
        }
        $this->fileSize = @filesize($database);
        if ($this->fileSize === false) {
            throw new \UnexpectedValueException(
                "Error determining the size of \"$database\"."
            );
        }

        $start = $this->findMetadataStart($database);
        $metadataDecoder = new Decoder($this->fileHandle, $start);
        list($metadataArray) = $metadataDecoder->decode($start);
        $this->metadata = new Metadata($metadataArray);
        $this->decoder = new Decoder(
            $this->fileHandle,
            $this->metadata->searchTreeSize + self::$DATA_SECTION_SEPARATOR_SIZE
        );
    }

    /**
     * Looks up the <code>address</code> in the MaxMind DB.
     *
     * @param string $ipAddress
     *            the IP address to look up.
     * @return array the record for the IP address.
     * @throws \BadMethodCallException if this method is called on a closed database.
     * @throws \InvalidArgumentException if something other than a single IP address is passed to the method.
     * @throws InvalidDatabaseException
     *             if the database is invalid or there is an error reading
     *             from it.
     */
    public function get($ipAddress)
    {
        if (func_num_args() != 1) {
            throw new \InvalidArgumentException(
                'Method takes exactly one argument.'
            );
        }

        if (!is_resource($this->fileHandle)) {
            throw new \BadMethodCallException(
                'Attempt to read from a closed MaxMind DB.'
            );
        }

        if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException(
                "The value \"$ipAddress\" is not a valid IP address."
            );
        }

        if ($this->metadata->ipVersion == 4 && strrpos($ipAddress, ':')) {
            throw new \InvalidArgumentException(
                "Error looking up $ipAddress. You attempted to look up an"
                . " IPv6 address in an IPv4-only database."
            );
        }
        $pointer = $this->findAddressInTree($ipAddress);
        if ($pointer == 0) {
            return null;
        }
        return $this->resolveDataPointer($pointer);
    }

    private function findAddressInTree($ipAddress)
    {
        // XXX - could simplify. Done as a byte array to ease porting
        $rawAddress = array_merge(unpack('C*', inet_pton($ipAddress)));

        $bitCount = count($rawAddress) * 8;

        // The first node of the tree is always node 0, at the beginning of the
        // value
        $node = $this->startNode($bitCount);

        for ($i = 0; $i < $bitCount; $i++) {
            if ($node >= $this->metadata->nodeCount) {
                break;
            }
            $tempBit = 0xFF & $rawAddress[$i >> 3];
            $bit = 1 & ($tempBit >> 7 - ($i % 8));

            $node = $this->readNode($node, $bit);
        }
        if ($node == $this->metadata->nodeCount) {
            // Record is empty
            return 0;
        } elseif ($node > $this->metadata->nodeCount) {
            // Record is a data pointer
            return $node;
        }
        throw new InvalidDatabaseException("Something bad happened");
    }


    private function startNode($length)
    {
        // Check if we are looking up an IPv4 address in an IPv6 tree. If this
        // is the case, we can skip over the first 96 nodes.
        if ($this->metadata->ipVersion == 6 && $length == 32) {
            return $this->ipV4StartNode();
        }
        // The first node of the tree is always node 0, at the beginning of the
        // value
        return 0;
    }

    private function ipV4StartNode()
    {
        // This is a defensive check. There is no reason to call this when you
        // have an IPv4 tree.
        if ($this->metadata->ipVersion == 4) {
            return 0;
        }

        if ($this->ipV4Start != 0) {
            return $this->ipV4Start;
        }
        $node = 0;

        for ($i = 0; $i < 96 && $node < $this->metadata->nodeCount; $i++) {
            $node = $this->readNode($node, 0);
        }
        $this->ipV4Start = $node;
        return $node;
    }

    private function readNode($nodeNumber, $index)
    {
        $baseOffset = $nodeNumber * $this->metadata->nodeByteSize;

        // XXX - probably could condense this.
        switch ($this->metadata->recordSize) {
            case 24:
                $bytes = Util::read($this->fileHandle, $baseOffset + $index * 3, 3);
                list(, $node) = unpack('N', "\x00" . $bytes);
                return $node;
            case 28:
                $middleByte = Util::read($this->fileHandle, $baseOffset + 3, 1);
                list(, $middle) = unpack('C', $middleByte);
                if ($index == 0) {
                    $middle = (0xF0 & $middle) >> 4;
                } else {
                    $middle = 0x0F & $middle;
                }
                $bytes = Util::read($this->fileHandle, $baseOffset + $index * 4, 3);
                list(, $node) = unpack('N', chr($middle) . $bytes);
                return $node;
            case 32:
                $bytes = Util::read($this->fileHandle, $baseOffset + $index * 4, 4);
                list(, $node) = unpack('N', $bytes);
                return $node;
            default:
                throw new InvalidDatabaseException(
                    'Unknown record size: '
                    . $this->metadata->recordSize
                );
        }
    }

    private function resolveDataPointer($pointer)
    {
        $resolved = $pointer - $this->metadata->nodeCount
            + $this->metadata->searchTreeSize;
        if ($resolved > $this->fileSize) {
            throw new InvalidDatabaseException(
                "The MaxMind DB file's search tree is corrupt"
            );
        }

        list($data) = $this->decoder->decode($resolved);
        return $data;
    }

    /*
     * This is an extremely naive but reasonably readable implementation. There
     * are much faster algorithms (e.g., Boyer-Moore) for this if speed is ever
     * an issue, but I suspect it won't be.
     */
    private function findMetadataStart($filename)
    {
        $handle = $this->fileHandle;
        $fstat = fstat($handle);
        $fileSize = $fstat['size'];
        $marker = self::$METADATA_START_MARKER;
        $markerLength = self::$METADATA_START_MARKER_LENGTH;
        $metadataMaxLengthExcludingMarker
            = min(self::$METADATA_MAX_SIZE, $fileSize) - $markerLength;

        for ($i = 0; $i <= $metadataMaxLengthExcludingMarker; $i++) {
            for ($j = 0; $j < $markerLength; $j++) {
                fseek($handle, $fileSize - $i - $j - 1);
                $matchBit = fgetc($handle);
                if ($matchBit != $marker[$markerLength - $j - 1]) {
                    continue 2;
                }
            }
            return $fileSize - $i;
        }
        throw new InvalidDatabaseException(
            "Error opening database file ($filename). " .
            'Is this a valid MaxMind DB file?'
        );
    }

    /**
     * @throws \InvalidArgumentException if arguments are passed to the method.
     * @throws \BadMethodCallException if the database has been closed.
     * @return Metadata object for the database.
     */
    public function metadata()
    {
        if (func_num_args()) {
            throw new \InvalidArgumentException(
                'Method takes no arguments.'
            );
        }

        // Not technically required, but this makes it consistent with
        // C extension and it allows us to change our implementation later.
        if (!is_resource($this->fileHandle)) {
            throw new \BadMethodCallException(
                'Attempt to read from a closed MaxMind DB.'
            );
        }

        return $this->metadata;
    }

    /**
     * Closes the MaxMind DB and returns resources to the system.
     *
     * @throws \Exception
     *             if an I/O error occurs.
     */
    public function close()
    {
        if (!is_resource($this->fileHandle)) {
            throw new \BadMethodCallException(
                'Attempt to close a closed MaxMind DB.'
            );
        }
        fclose($this->fileHandle);
    }
}
