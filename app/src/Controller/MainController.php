<?php

namespace app\Controller;

use app\Model\MainModel;

class MainController {

    public function main_action() {
        //include 'C:\OpenServer\domains\taskme\src\Model\MainModel.php';
        $model = new MainModel();
        $model->get_data();
    }
}
