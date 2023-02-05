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
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}