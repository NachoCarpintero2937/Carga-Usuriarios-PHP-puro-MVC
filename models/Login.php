<?php
class Login
{
    public static function ingresar($request)
    {

        if ($request['data']) {
            $data = json_decode(base64_decode($request['data']));
            if (!$data->usuario || !$data->password) {
                return _response(null, 0, "Complete todos los campos con *");
            } else {
                try {
                    $login = UsuariosClass::login($data->usuario, md5($data->password));
                    if (!$login) {
                        throw new Exception("Usuario y/o contraseña incorrecto");
                    }
                    @session_start();
                    $_SESSION['user'] = $login;
                    return _response($login, 1, "Ok");
                } catch (Exception $e) {
                    return _response(null, 0, $e->getMessage());
                }
            }
        }
    }
    public static function logout()
    {
        @session_start();
        $user = !empty($_SESSION['user']) ? $_SESSION['user'] : null;
        if ($user) {
            @session_destroy();
            $login = _response(null, 1, "Usuario deslogueado correctamente");
        } else
            $login = _response(null, 0, "Usuario no logueado");

        return $login;
    }
}
