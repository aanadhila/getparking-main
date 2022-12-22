<?php

class Config
{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $conn = "siparkir";
    public $db;

    public function __construct()
    {
        $this->connect_database();
    }

    public function connect_database()
    {
        $this->db = new mysqli($this->server, $this->user, $this->pass, $this->conn);
    }
}
