<?php

namespace App\Core;


class ConnectorDB {

    private $pdo;
    private $stmt;
    private $args = array();
    private $sql;

    public function __construct($dsn, $user="", $passwd="", $opt = array()) {
        $this->pdo = new \PDO($dsn, $user, $passwd, $opt);
    }

    public function select($rows, $table) {
        $tables = [
            'Task',
            //TODO
        ];
        if (!in_array($table, $tables)) {
            //exception;
        }
        $this->sql = "SELECT $rows FROM $table";

        return $this;
    }

    public function where($field, $condition, $operator) {
        $operators = [
            '=',
            '>',
            '<',
            //TODO
        ];

        $this->args = [
            'condition' => $condition,
        ];
        if(!in_array($operator, $operators)) {
            //exception;
        }
        $this->sql .= " WHERE $field $operator :condition";

        return $this;
    }

    public function run() {
        $this->stmt = $this->pdo->prepare($this->sql);
        $this->stmt->execute($this->args);

        return $this;
    }

    public function as_array() {
        $result = $this->stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function close() {
    }

    public function insert() {

    }

    public function join() {

    }

    public function delete() {

    }

    public function update() {

    }
    public function order() {

    }
    public function limit() {

    }
}
