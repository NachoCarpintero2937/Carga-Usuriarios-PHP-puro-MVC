<?php
function loadController($controlador)
{
    $nombre_controlador = ucwords($controlador) . "Controller";
    $archivo_controlador = "./controller/" . ucwords($controlador) . ".php";
    if (is_file($archivo_controlador)) {
        require_once $archivo_controlador;
        $control = new $nombre_controlador();
    } else {
        $control = "Controlador no encontrado";
    }

    return $control;
}

function loadAction($controller, $action)
{
    if (!empty($action) && method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "metodo no encontrado";
    }
}
