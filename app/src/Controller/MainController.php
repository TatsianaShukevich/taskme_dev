<?php

namespace App\Controller;

use App\Model\MainModel;
use App\View\MainView;
use App\Core\ServiceLocator;

class MainController {

    private $serviceLocator;
    private $model;
    private $view;

    public function __construct(ServiceLocator $serviceLocator, MainModel $mainModel, MainView $mainView) {
        $this->serviceLocator = $serviceLocator;
        $this->model =  $mainModel;
        $this->view =  $mainView;
    }

    public function main_action() {
        $data = $this->model->get_data();
        $this->view->generate($data);
    }
}
