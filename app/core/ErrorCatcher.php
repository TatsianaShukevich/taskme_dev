<?php

namespace App\Core;


class ErrorCatcher {

    public function registerErrorHandler() {
        set_error_handler(array($this, 'handleError'));
    }

    public function registerExeptionHandler() {
        set_exception_handler(array($this, 'handleException'));
    }


    /**
     * Handles errors.
     * @param int $errno error level
     * @param string $errstr error message
     * @param string $errfile file name where error has happened
     * @param int $errline line where error has happened
     * @return boolean
     */
    public function handleError($errno, $errstr, $errfile, $errline, $errcontext) {
        //кроме E_ERROR, E_PARSE, E_CORE_ERROR, E_CORE_WARNING, E_COMPILE_ERROR, E_COMPILE_WARNING, и большинство E_STRICT
        if (!(error_reporting() & $errno)) {
            // Этот код ошибки не включен в error_reporting
            return;
        }
        switch ($errno) {
            case E_USER_ERROR:
                echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
                echo "  Фатальная ошибка в строке $errline файла $errfile";
                echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
                echo "Завершение работы...<br />\n";

                $stack = print_r(debug_backtrace(), TRUE);

                $msg = <<<EOT
                        My ERROR [$errno] $errstr\n
                        Фатальная ошибка в строке $errline файла $errfile
                        , PHP " . PHP_VERSION . " (" . PHP_OS . ")\n
                        Stack \n
                        $stack
EOT;
                error_log($msg, 3, "c:\\OpenServer\\domains\\taskme_error.log");
                exit(1);
                break;

            case E_USER_WARNING:
                $stack = print_r(debug_backtrace(), TRUE);
                $msg = "My WARNING [$errno] $errstr \n $stack";
                error_log($msg, 3, "c:\\OpenServer\\domains\\taskme_error.log");
                break;

            case E_USER_NOTICE:
                $stack = print_r(debug_backtrace(), TRUE);
                $msg =  "My NOTICE [$errno] $errstr \n $stack";
                error_log($msg, 3, "c:\\OpenServer\\domains\\taskme_error.log");
                break;

            default:
                $stack = print_r(debug_backtrace(), TRUE);
                $msg =  "Неизвестная ошибка: [$errno] $errstr\n $stack";
                error_log($msg, 3, "c:\\OpenServer\\domains\\taskme_error.log");
                break;
        }
        /* Не запускаем внутренний обработчик ошибок PHP */
        return true;
    }

    /**
     * Handles uncaught exceptions.
     * @param \Throwable $exception
     */
    public function handleException(\Throwable $exception) {
        //для неперехватываемых исключений
        $msg = "Uncaught exception: " . $exception->getMessage() . " \n";

        echo "Uncaught exception: " , $exception->getMessage(), "\n";
        error_log($msg, 3, "c:\\OpenServer\\domains\\taskme_error.log");
    }

}
