<?php

namespace App\Controller;

use App\Model\TaskModel;
use App\View\TaskView;
use App\Core\ServiceLocator;

class TaskController {

    private $serviceLocator;
    private $model;

    public function __construct(ServiceLocator $serviceLocator) {
        $this->serviceLocator = $serviceLocator;

        $this->model =  new TaskModel($this->serviceLocator->get('\App\Service\QueryBilderService'));
    }

    public function create_action() {

        //$queryBilderService = $this->serviceLocator->get("QueryBilderService");

        //$model = new TaskModel($queryBilderService);
        $this->model->create_task($_POST);
    }

    public function add_action() {
        //$model = new TaskModel($queryBilderService);
        $this->model->add_task();

        $view = new TaskView();
        $view->generate_add_task();
    }
}
