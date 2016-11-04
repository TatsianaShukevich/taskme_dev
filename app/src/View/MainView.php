<?php

namespace App\View;

class MainView {

    public function generate($data = null) {
        $task = '';
        foreach ($data as $key => $value) {
            $task .= '<tr> <td>' . $value['name'] . '</td><td>' . $value['desc'] . '</td>';
            //$task .= 'name: ' . $value['name'] . ' and description: ' . $value['desc'] . '</br>';
        }
        $path = __DIR__ . '../../../../app/templates/main_template.html';

        include $path;
    }
};
