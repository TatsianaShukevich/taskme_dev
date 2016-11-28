<?php

namespace App\Model;

use App\Core\ConnectorDB;
use App\Core\ServiceLocator;
use \App\Service\QueryBilderService;

class TaskModel {

    private $db;

    public function __construct(QueryBilderService $queryBilderService) {
        $this->db = $queryBilderService;
    }

    public function add_task() {

    }

    public function create_task($post) {
        $data = array(
            'name' => $post['caption'],
            'desc' => $post['description'],
            'date_created' => $post['date_created'],
            'date_deadline' => $post['date_deadline'],
            'assignee' => $post['assignee']
        );
        $data = $this->db->insert('Task', $data)->run();

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
