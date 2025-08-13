<?php
/**
 *
 * This file is part of Aura for PHP.
 *
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
namespace Aura\Sql;

use Aura\Sql\Profiler\Profiler;
use Aura\Sql\Profiler\ProfilerInterface;
use PDO;

/**
 *
 * Decorates an existing PDO instance with the extended methods.
 *
 * @package Aura.Sql
 *
 */
class DecoratedPdo extends AbstractExtendedPdo
{
    /**
     *
     * Constructor.
     *
     * This overrides the parent so that it can take an existing PDO instance
     * and decorate it with the extended methods.
     *
     * @param PDO $pdo An existing PDO instance to decorate.
     *
     * @param ProfilerInterface|null $profiler Tracks and logs query profiles.
     *
     */
    public function __construct(PDO $pdo, ?ProfilerInterface $profiler = null)
    {
        $this->pdo = $pdo;

        $this->setProfiler($profiler ?? new Profiler());

        $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        $this->setParser($this->newParser($driver));
        $this->setQuoteName($driver);
    }

    public static function connect(
        string $dsn,
        ?string $username = null,
        ?string $password = null,
        ?array $options = null,
        ?ProfilerInterface $profiler = null
    ): static {
        if (version_compare(PHP_VERSION, '8.4.0', '>=')) {
            return new static(\PDO::connect($dsn, $username, $password, $options));
        } else {
            return new static(new PDO($dsn, $username, $password, $options), $profiler);
        }
    }

    /**
     *
     * Connects to the database.
     *
     * @return void
     *
     */
    public function lazyConnect(): void
    {
        // already connected
    }

    /**
     *
     * Disconnects from the database; disallowed with decorated PDO connections.
     *
     * @return void
     *
     * @throws Exception\CannotDisconnect
     */
    public function disconnect(): void
    {
        $message = "Cannot disconnect a DecoratedPdo instance.";
        throw new Exception\CannotDisconnect($message);
    }
}
