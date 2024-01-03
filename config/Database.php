<?php

abstract class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "propelrr";
    private $port = 3306;

    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;port=$this->port", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected!";
        } catch (PDOException $e) {
            die("Connection failed: Internal Server Error " . $e->getMessage());
        }
    }
}
