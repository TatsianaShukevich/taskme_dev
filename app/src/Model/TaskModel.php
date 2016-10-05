<?php

namespace App\Model;

use App\View\TaskView;

class TaskModel {

    public function add_task() {
        //include 'C:\OpenServer\domains\taskme\src\View\MainView.php';
        $view = new TaskView();
        $view->generate_add_task();
    }

    public function delete_task() {
        //include 'C:\OpenServer\domains\taskme\src\View\MainView.php';
//        $view = new TaskView();
//        $view->generate_add_task();
    }

    public function assign_task() {
        //include 'C:\OpenServer\domains\taskme\src\View\MainView.php';
//        $view = new TaskView();
//        $view->generate_add_task();
    }
}
