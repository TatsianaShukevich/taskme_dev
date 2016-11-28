<?php

namespace App\Controller;

use App\Model\TaskModel;
use App\View\TaskView;
use App\Core\ServiceLocator;

class TaskController {

    private $serviceLocator;
    private $model;
    private $view;

    public function __construct(ServiceLocator $serviceLocator, TaskModel $taskModel, TaskView $taskView) {
        $this->serviceLocator = $serviceLocator;
        $this->model =  $taskModel;
        $this->view =  $taskView;
    }

    public function create_action() {
        $this->model->create_task($_POST);
    }

    public function add_action() {

        $this->model->add_task();
        $this->view->generate_add_task();
    }
}
