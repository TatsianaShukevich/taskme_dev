<?php

namespace App\Controller;

use App\Model\MainModel;
use App\View\MainView;

class MainController {

    public function main_action() {
        $model = new MainModel();
        $data = $model->get_data();

        $view = new MainView();
        $view->generate($data);
    }
}
