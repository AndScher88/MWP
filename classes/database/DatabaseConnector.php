<?php

namespace classes\database;

use Exception;
use mysqli;

class DatabaseConnector
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
    private $dbName = "mwp-systems";
    private $dbUserName = "root";
    private $dbUserPwd = "";
    private $dbServerName = "localhost1";
    private $conn;

    public function __construct()
    {
    }

    public function getInstance()
    {
        error_reporting(0);
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
            throw new Exception("Verbindung mit Datenbank konnte nicht hergestellt werden");
        } else {
            return $this->conn;
        }
    }

}

