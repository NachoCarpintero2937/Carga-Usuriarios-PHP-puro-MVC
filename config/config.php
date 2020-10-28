<?php
require_once 'class/class_usuarios.php';
require_once 'class/class_usuarios_estados.php';
require_once 'class/class_usuarios_tipo.php';

// CONEXION A BD
const DB_SERVER = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "NTLIFE";

// USUARIOS
// 1) TEST , PW: 12345,
// 2) NT , PW: Life15 (L mayúscula)


// TIPOS DE USUARIO
const TIPO_ADMINISTRADOR = 1;
const TIPO_CLIENTE = 2;

// ESTADO DE USUARIOS
const USUARIO_ACTIVO = 1;
const USUARIO_INACTIVO = 2;
const USUARIO_ELIMINADO = 3;



$exclude_actions = [
    'getUsuarios',
    'login',
    'logout',
    'getAtributeUsers',
    'create'
];

// formatear dump
function dump($array)
{
    echo "<pre style='color: #303fa5;
        display: flex;
        justify-content: center;
        background: #f6f0f0;
        width: 30%;
        border-radius: 50px;
        margin: 20px;
        padding: 10px;
        border: 0.1px solid;'>";
    print_r($array);
    echo "</pre>";
    die;
}
function _response($data, $status, $message)
{
    $array = [
        "data" => $data,
        "status" => $status,
        "message" => $message
    ];
    return json_encode($array);
}
