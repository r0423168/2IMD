<?php   
        // start a session
        session_start();

        // include all classes
        spl_autoload_register(function($class){
        require_once(__DIR__ . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . $class . ".class.php");

    }); 
    