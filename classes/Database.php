<?php

namespace classes;

class Database
{
    public string $host;
    public string $db_username;
    public string $db_password;
    public string $db_name;

    public function __construct($host, $db_username, $db_password, $db_name)
    {
        $this->host = $host;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
    }

    public function connect(){
        $db = mysqli_connect($this->host, $this->db_username, $this->db_password, $this->db_name);
        if(!$db){
            die("Connection failed: " . mysqli_connect_error());
        } else {
            return $db;
        }
    }

}