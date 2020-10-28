<?php
require_once "./models/Login.php";
class LoginController
{
    public function index()
    {
        require_once "views/login/login.view.php";
    }

    public function login()
    {
        $request = !empty($_POST) ? $_POST : null;
        $login = Login::ingresar($request);
        echo $login;
    }
    public function logout()
    {
        $login = Login::logout();
        echo $login;
    }
}
