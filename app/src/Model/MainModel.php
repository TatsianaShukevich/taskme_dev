<?php

namespace App\Model;

use App\View\MainView;

class MainModel {

    public function get_data() {
        //include 'C:\OpenServer\domains\taskme\src\View\MainView.php';
        $view = new MainView();
        $view->generate();
    }
};
