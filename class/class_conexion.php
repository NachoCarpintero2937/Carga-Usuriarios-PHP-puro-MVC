<?php
include_once 'class_dbconfig.php';

class db
{
    private static $instance = NULL;

    private function __construct()
    {
    }

    public static function getInstance()
    {

        if (!self::$instance) {
            $conexion = new ConfigBD();
            self::$instance = new PDO("mysql:host=$conexion->DBServer;dbname=$conexion->DBName", $conexion->UserName, $conexion->Password);; //asi funciona y con variables NO. 
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }

    private function __clone()
    {
    }
}
