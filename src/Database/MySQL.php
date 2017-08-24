<?php
namespace Smadevo\Database;

use PDO;

/**
 * MySQL database connection.
 *
 * @inheritDoc
 */
abstract class MySQL extends \Smadevo\Database\Base
{
    /**
     * Creates and returns a MySQL database connection.
     *
     * @param string $host
     * @param string $port
     * @param string $database
     * @param string $username
     * @param string $password
     *
     * @return self
     *
     * @uses PDO
     */
    final public static function create(
        string $host,
        string $port,
        string $database,
        string $username,
        string $password
    ): self {
        $pdo = new PDO(
            "mysql:host={$host};port={$port};dbname={$database}",
            $username,
            $password
        );
        $pdo->exec('SET sql_mode                 = ANSI'   );
        $pdo->exec('SET time_zone                = +00:00' );
        $pdo->exec('SET character_set_client     = utf8mb4');
        $pdo->exec('SET character_set_results    = utf8mb4');
        $pdo->exec('SET character_set_connection = utf8mb4');

        return new static($pdo);
    }
}
