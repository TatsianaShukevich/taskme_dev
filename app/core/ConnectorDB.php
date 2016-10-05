<?php

namespace App\Core;


class ConnectorDB {

    private $pdo;

    public function __construct($dsn, $user="", $passwd="", $opt = array()) {
        $this->pdo = new \PDO($dsn, $user, $passwd, $opt);
    }

    public function select() {

    }
}
