<?php

namespace Models;

use PDO;
use PDOException;

class Database
{
    private string $host;
    private string $databaseName;
    private string $username;
    private string $password;
    private string $charset;

    protected PDO $db;

    public function __construct()
    {
        $this->host = 'mysql';
        $this->databaseName = 'web_programming';
        $this->username = 'root';
        $this->password = 'root';
        $this->charset = 'utf8';

        $dns = "mysql:host=$this->host;dbname=$this->databaseName;charset=$this->charset";

        try {
            $this->db = new PDO($dns, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            echo 'Connected to the database';
        } catch (PDOException $e) {
            $errorCode = $e->getCode();
            $errorMessage = $e->getMessage();
            echo "Error: $errorCode - $errorMessage";
            exit();
        }
    }
}