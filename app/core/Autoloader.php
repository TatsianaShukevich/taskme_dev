<?php

namespace app\core;

/**
 * Loads classes.
 */
class Autoloader {

    /**
     * Register loader with SPL autoloader stack.
     *
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'load_class'));
        spl_autoload_register(array($this, 'load_class_src'));
    }

    /**
     * Loads the class file for a given class name.
     *
     * @param string $className The fully-qualified class name.
     * @return mixed
     */
    public function load_class($className)
    {
        $className = ltrim($className, '\\');
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);

            $file  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            $file .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

            $this->require_file($file);
        }
    }

    /**
     * Loads the class file from src for a given class name.
     *
     * @param string $className The fully-qualified class name.
     * @return mixed
     */
    public function load_class_src($className)
    {
        $prefix = 'app\\';
        $base_dir =  'app' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
        $len = strlen($prefix);

        if (strrpos($className, '\\')) {
            $relative_class = substr($className, $len);
            $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

            $this->require_file($file);
        }
    }

    /**
     * If a file exists, require it from the file system.
     *
     * @param string $file The file to require.
     * @return bool True if the file exists, false if not.
     */
    protected function require_file($file)
    {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }
}
