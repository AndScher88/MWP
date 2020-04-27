<?php

/**
 * Class DatabaseConnector
 * @package classes\database
 */
final class DatabaseConnector
{

    /**
     * @var
     */
    private static $instance;
    /**
     * @var string
     */
    private $dbName = 'mwp-systems';
    /**
     * @var string
     */
    private $dbUserName = 'root';
    /**
     * @var string
     */
    private $dbUserPwd = '';
    /**
     * @var string
     */
    private $dbServerName = 'localhost';
    /**
     * @var
     */
    private $conn;

    /**
     * DatabaseConnector constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return mixed
     */
    public static function getAccess()
    {
        if (empty(self::$instance)) {
            self::$instance = new DatabaseConnector();
        }
        try {
            self::$instance->getConnection();
        } catch (RuntimeException $exception) {
            throw $exception;
        }
        return (self::$instance->conn);
    }

    /**
     * @return object
     */
    private function getConnection(): object
    {
        $this->conn = new mysqli($this->dbServerName, $this->dbUserName, $this->dbUserPwd, $this->dbName);
        if ($this->conn->connect_errno) {
            throw new RuntimeException('Verbindung mit Datenbank konnte nicht hergestellt werden');
        }
        $this->conn->set_charset('utf8');
        return $this->conn;
    }

    /**
     *
     */
    public function __clone()
    {
    }

    /**
     *
     */
    public function __wakeup()
    {
    }
}
