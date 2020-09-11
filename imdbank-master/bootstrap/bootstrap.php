<?php
	// Start a new session
	session_start();

	// Autoload all classes inside classes folder
	spl_autoload_register('Autoloader::ClassLoader');

	/**
	 * 
	 */
	class Autoloader {
		public static function ClassLoader($className) {
			$className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

			$dir = dirname(__DIR__, 1) . 
				DIRECTORY_SEPARATOR . "classes" . 
				DIRECTORY_SEPARATOR . $className . ".php";

         	if (file_exists($dir)) {
         		require_once($dir);
         	}
    	}
	}
	