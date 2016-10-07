<?php

namespace App\Model;


use App\Core\ConnectorDB;

class MainModel {

    public function get_data() {
        $dsn = "mysql:host=localhost;dbname=taskme";
        $db =  new ConnectorDB($dsn, 'root');
        $data =$db->select('*', 'Task')->run()->as_array();

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
