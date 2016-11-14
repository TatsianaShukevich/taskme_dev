<?php

namespace App\Controller;

use App\Model\MainModel;
use App\View\MainView;
use App\Core\ServiceLocator;

class MainController {

    private $serviceLocator;
    private $model;

    public function __construct(ServiceLocator $serviceLocator) {
        $this->serviceLocator = $serviceLocator;

        $this->model =  new MainModel($this->serviceLocator->get('\App\Service\QueryBilderService'));
    }

    public function main_action() {
        //$model = new MainModel();
        $data = $this->model->get_data();

        $view = new MainView();
        $view->generate($data);
    }
}
