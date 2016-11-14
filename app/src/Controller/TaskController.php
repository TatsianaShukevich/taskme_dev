<?php

namespace App\Controller;

use App\Model\TaskModel;
use App\View\TaskView;
use App\Core\ServiceLocator;

class TaskController {

    private $serviceLocator;

    public function __construct(ServiceLocator $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }

    public function create_action() {

        $DbConnectorService = $this->serviceLocator->get("DbConnectorService");

        $model = new TaskModel($DbConnectorService);
        $model->create_task($_POST);
    }

    public function add_action() {
        $model = new TaskModel();
        $model->add_task();

        $view = new TaskView();
        $view->generate_add_task();
    }
}
