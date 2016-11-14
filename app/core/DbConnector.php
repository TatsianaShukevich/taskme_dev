<?php

namespace App\Core;

class DbConnector{
//    private $pdo;
//
//
//    public function __construct() {
//
//    }

    public function getPDO($dsn, $user="", $passwd="", $opt = array()) {
        return new \PDO($dsn, $user, $passwd, $opt);
    }
}
