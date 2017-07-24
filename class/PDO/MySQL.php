<?php
namespace App\PDO;

use PDO;

/**
 * @inheritDoc
 */
final class MySQL extends PDO
{
    /**
     * Constructor.
     *
     * @param string $host
     * @param string $port
     * @param string $database
     * @param string $username
     * @param string $password
     */
    final public function __construct(
        string $host,
        string $port,
        string $database,
        string $username,
        string $password
    ) {
        parent::__construct(
            "mysql:host={$host};port={$port};dbname={$database}",
            $username,
            $password
        );
        $this->exec('SET sql_mode                 = ANSI'   );
        $this->exec('SET time_zone                = +00:00' );
        $this->exec('SET character_set_client     = utf8mb4');
        $this->exec('SET character_set_results    = utf8mb4');
        $this->exec('SET character_set_connection = utf8mb4');
    }
}
