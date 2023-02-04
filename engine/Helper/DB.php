<?php

namespace Karakorum\App\Helper;

class DB
{
    public $host;
    public $username;
    public $password;
    public $port;
    public $database;
    public $connection;
    public function __construct()
    {
        $this->connection = mysqli_connect("localhost", "root", "", "karakorum");
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}