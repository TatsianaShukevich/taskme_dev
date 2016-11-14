<?php


class DbConnectorService {
    private $pdo;


    public function __construct($dsn, $user="", $passwd="", $opt = array()) {
        return $this->pdo = new \PDO($dsn, $user, $passwd, $opt);
    }
}
