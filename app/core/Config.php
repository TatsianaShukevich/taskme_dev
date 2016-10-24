<?php

namespace App\Core;


class Config {

    private $configs;


    public function parseIni() {
        $path = __DIR__ . '/../../config/config.ini';
        $this->configs = parse_ini_file($path, TRUE);
    }

    public function getConfig($config) {
        $param = explode('.', $config);

        if (array_key_exists($param[0], $this->configs)) {
            if (array_key_exists($param[1],$this->configs[$param[0]])) {
                return $this->configs[$param[0]][$param[1]];
            }
            else {
                return $this->configs[$param[0]];
            }
        }
        else {
            //exception
            throw new \Exception('There aren\'t any configs with name ' . $config);

        }
    }

    public function setConfig($config) {


    }

}
