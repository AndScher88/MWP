<?php

namespace classes\database;

use Exception;
use mysqli;

/**
 * Class DatabaseConnector
 * @package classes\database
 */
final class DatabaseConnector
{
    /**
     * @var object
     * @var string
     * @var string
     * @var string
     * @var string
     * @var object
     */
    private static $instance;
    private $dbName = 'mwp-systems';
    private $dbUserName = 'root';
    private $dbUserPwd = '';
    private $dbServerName = 'localhost1';
    private $conn;

    private function __construct()
    {
    }

    public static function getInstance(): string
    {
        if (empty(self::$instance)) {
            self::$instance = new DatabaseConnector();
        }
        try {
            self::$instance->getConnection();
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
        return (self::$instance->conn);
    }

    /**
     * @return object
     * @throws Exception
     * @var object $mysqli
     */
    private function getConnection(): object
    {
        $this->conn = new mysqli($this->dbServerName, $this->dbUserName, $this->dbUserPwd, $this->dbName);
        if ($this->conn->connect_errno) {
            throw new Exception('Verbindung mit Datenbank konnte nicht hergestellt werden');
        }
        return $this->conn;
    }

    public function __clone()
    {
    }

    public function __wakeup()
    {
    }
}

