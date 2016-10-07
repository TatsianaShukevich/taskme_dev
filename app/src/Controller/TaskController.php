<?php

namespace App\Controller;

use App\Model\TaskModel;
use App\View\TaskView;

class TaskController {

    public function add_action() {

        $model = new TaskModel();
        $model->add_task();

        $view = new TaskView();
        $view->generate_add_task();
    }
}
