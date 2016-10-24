<?php

namespace App\View;

class MainView {

    public function generate($data = null) {
        $task = '';
        foreach ($data as $key => $value) {
            $task .= 'name: ' . $value['name'] . ' and description: ' . $value['desc'] . '</br>';
        }
        $path = '../../../../app/templates/main_template.html';
        //не инклюдит по пути $path(

        include $path;
    }
};
