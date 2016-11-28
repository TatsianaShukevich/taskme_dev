<?php

namespace App\Model;


use App\Core\ConnectorDB;
use \App\Service\QueryBilderService;

class MainModel {

    private $db;

    public function __construct(QueryBilderService $queryBilderService) {
        $this->db = $queryBilderService;
    }

    public function get_data() {
        $data =$this->db->select('*', 'Task')->run()->as_array();

        //Запрос с where пример
        //$task = $db->select('*', 'Task')->where('tid', 1, '=')->run()->as_array();

        if (isset($data) && !empty($data)) {
            return $data;
        }
        else {
            //exception
        }


    }
};
