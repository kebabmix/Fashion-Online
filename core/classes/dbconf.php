<?php
class dbconf extends db {
    function __construct() {
        $this->dbhost = "127.0.0.1";
        $this->dbuser = "root";
        $this->dbpassword = "";
        $this->dbname = "fashion_online";
        $db = parent::_connect();
    }
}