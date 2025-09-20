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
 * A lazy-connecting PDO with extended methods.
 *
 * @package Aura.Sql
 *
 */
class ExtendedPdo extends AbstractExtendedPdo
{
    public const CONNECT_IMMEDIATELY = 'auraSqlImmediate';
    public const DRIVER_SPECIFIC     = 'auraSqlDriverSpecific';

    /**
     *
     * Constructor arguments for instantiating the PDO connection.
     *
     * @var array
     *
     */
    protected array $args = [];

    /**
     *
     * Flag for how to construct the PDO object
     *
     * @var bool
     */
    protected bool $driverSpecific = false;

    /**
     *
     * Constructor.
     *
     * This overrides the parent so that it can take connection attributes as a
     * constructor parameter, and set them after connection.
     *
     * @param string $dsn The data source name for the connection.
     *
     * @param string|null $username The username for the connection.
     *
     * @param string|null $password The password for the connection.
     *
     * @param array $options Driver-specific options for the connection.
     *
     * @param array $queries Queries to execute after the connection.
     *
     * @param \Aura\Sql\Profiler\ProfilerInterface|null $profiler Tracks and logs query profiles.
     *
     * @see http://php.net/manual/en/pdo.construct.php
     */
    public function __construct(
        string $dsn,
        ?string $username = null,
        ?string $password = null,
        array $options = [],
        array $queries = [],
        ?ProfilerInterface $profiler = null
    ) {
        // if no error mode is specified, use exceptions
        if (! isset($options[PDO::ATTR_ERRMODE])) {
            $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        }

        // check option for driver specific construct and set flag for lazy loading later
        if (isset($options[static::DRIVER_SPECIFIC])) {
            $this->driverSpecific = (bool)$options[static::DRIVER_SPECIFIC];
            unset($options[static::DRIVER_SPECIFIC]);
        }

        // retain the arguments for later
        $this->args = [
            $dsn,
            $username,
            $password,
            $options,
            $queries
        ];

        // retain a profiler, instantiating a default one if needed
        $this->setProfiler($profiler ?? new Profiler());

        // retain a query parser
        $parts = explode(":", $dsn);
        $parser = $this->newParser($parts[0]);
        $this->setParser($parser);

        // set quotes for identifier names
        $this->setQuoteName($parts[0]);

        // create a connection immediately
        if (isset($options[static::CONNECT_IMMEDIATELY])) {
            $connectImmediately = (bool)$options[static::CONNECT_IMMEDIATELY];
            unset($options[static::CONNECT_IMMEDIATELY]);
            if ($connectImmediately) {
                $this->lazyConnect();
            }
        }
    }

    public static function connect(
        string $dsn,
        ?string $username = null,
        ?string $password = null,
        ?array $options = null,
        array $queries = [],
        ?ProfilerInterface $profiler = null
    ): static {
        $options                          ??= [];
        $options[static::DRIVER_SPECIFIC] = true;
        return new static($dsn, $username, $password, $options, $queries, $profiler);
    }

    /**
     *
     * Connects to the database.
     *
     * @return void
     */
    public function lazyConnect(): void
    {
        if ($this->pdo) {
            return;
        }

        // connect
        $this->profiler->start(__FUNCTION__);
        list($dsn, $username, $password, $options, $queries) = $this->args;
        if ($this->driverSpecific && version_compare(PHP_VERSION, '8.4.0', '>=')) {
            $this->pdo = PDO::connect($dsn, $username, $password, $options);
        } else {
            $this->pdo = new PDO($dsn, $username, $password, $options);
        }
        $this->pdo = new PDO($dsn, $username, $password, $options);
        $this->profiler->finish();

        // connection-time queries
        foreach ($queries as $query) {
            $this->exec($query);
        }
    }

    /**
     *
     * Disconnects from the database.
     *
     * @return void
     *
     */
    public function disconnect(): void
    {
        $this->profiler->start(__FUNCTION__);
        $this->pdo = null;
        $this->profiler->finish();
    }

    /**
     *
     * The purpose of this method is to hide sensitive data from stack traces.
     *
     * @return array
     *
     */
    public function __debugInfo(): array
    {
        return [
            'args' => [
                $this->args[0],
                '****',
                '****',
                $this->args[3],
                $this->args[4],
            ],
        ];
    }

    /**
     *
     * Return the inner PDO (if any)
     *
     * @return \PDO
     *
     */
    public function getPdo(): PDO
    {
        $this->lazyConnect();
        return $this->pdo;
    }
}
