<?php

namespace app\Model;

use app\View\MainView;

class MainModel {

    public function get_data() {
        //include 'C:\OpenServer\domains\taskme\src\View\MainView.php';
        $view = new MainView();
        $view->generate();
    }
};
