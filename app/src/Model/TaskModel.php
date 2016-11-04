<?php

namespace App\Model;

use App\Core\ConnectorDB;

class TaskModel {

    public function add_task() {

    }

    public function create_task($post) {
        $dsn = "mysql:host=localhost;dbname=taskme";
        $db =  new ConnectorDB($dsn, 'root');
        $data = array(
            'name' => $post['caption'],
            'desc' => $post['description'],
            'date_created' => $post['date_created'],
            'date_deadline' => $post['date_deadline'],
            'assignee' => $post['assignee']
        );
        $data =$db->insert('Task', $data)->run();

        if (isset($data) && !empty($data)) {
            return $data;
        }
        else {
            //exception
        }
    }

    public function delete_task() {

    }

    public function assign_task() {

    }
}
