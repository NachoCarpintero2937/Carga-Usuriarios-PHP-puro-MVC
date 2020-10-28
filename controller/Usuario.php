<?php
require_once "./models/Usuario.php";
class UsuarioController
{
    public function index()
    {
        require_once "views/usuario/listadoUsuario.view.php";
    }
    public function getUsuarios()
    {

        $request = !empty($_POST) ? $_POST : null;
        $usuarios = Usuario::getUsuarios($request);

        echo $usuarios;
    }
    public function getAtributeUsers()
    {
        $usuarios = Usuario::getAtributeUsers();
        return $usuarios;
    }
    public function create()
    {
        $request = !empty($_POST) ? $_POST : null;
        $usuario = Usuario::create($request);
        echo $usuario;
    }
}
