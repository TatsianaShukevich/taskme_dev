<?php

namespace app\Controller;

use app\Model\TaskModel;

class TaskController {

    public function add_action() {
        //include 'C:\OpenServer\domains\taskme\src\Model\MainModel.php';
        $model = new TaskModel();
        $model->add_task();
    }
}
