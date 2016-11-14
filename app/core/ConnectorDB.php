<?php

namespace App\Core;


class ConnectorDB {

    private $pdo;
    private $stmt;
    private $args = array();
    private $sql;
    private $tables = [
        'Task',
        //TODO
    ];

//    public function __construct($dsn, $user="", $passwd="", $opt = array()) {
//        $this->pdo = new \PDO($dsn, $user, $passwd, $opt);
//    }

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function select($rows, $table) {
        if (!in_array($table, $this->tables)) {
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

    public function insert($table, $data) {

        if (!in_array($table, $this->tables)) {
            //exception;
        }
        switch($table) {
            case 'Task':
                $this->args = [
                    'name' => $data["name"],
                    'desc' => $data['desc'],
                    'date_created' => $data['date_created'],
                    'date_deadline' => $data['date_deadline'],
                    'assignee' => $data['assignee']
                ];
                if (isset($data) && !empty($data)) {
                    $this->sql = "INSERT INTO $table (`name`, `desc`, `date_created`, `date_deadline`, `assignee` )
                                  VALUES (:name, :desc, :date_created, :date_deadline, :assignee );";
                }
                else {
                    //exception;
                }

                break;
        }
        return $this;
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
