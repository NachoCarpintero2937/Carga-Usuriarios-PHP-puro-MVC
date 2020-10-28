<?php
class Usuario
{

    public static function create($request)
    {
        $usuario = !empty($request['usuario']) ? $request['usuario'] : null;
        $nombre = !empty($request['nombre']) ? $request['nombre'] : null;
        $email = !empty($request['email']) ? $request['email'] : null;
        $password = !empty($request['password']) ? $request['password'] : null;
        $tipo = !empty($request['tipo']) ? $request['tipo'] : null;
        $estado = !empty($request['estado']) ? $request['estado'] : null;
        try {
            if (!$usuario || !$nombre || !$email || !$password || !$tipo || !$estado) {
                throw new Exception("Complete los campos con *");
            }
            $model = new UsuariosClass();
            $model->setNombre($nombre);
            $model->setUsuario($usuario);
            $model->setEmail($email);
            $model->setPass($password);
            $model->setTipo($tipo);
            $model->setEstado($estado);
            $model->create();
            return _response(null, 1, "Usuario generado correctamente");
        } catch (Exception $e) {
            return _response(null, 0, $e->getMessage());
        }
    }
    public static function getUsuarios($request)
    {
        $filtro = !empty($request['filtro']) ? $request['filtro'] : null;
        $filtro_id = !empty($request['filtro_id']) ? $request['filtro_id'] : null;
        if ($filtro) {
            $where = " AND a.id LIKE ('%$filtro%')  OR a.nombre LIKE ('%$filtro%')  OR a.usuario LIKE ('%$filtro%')  OR a.email LIKE ('%$filtro%')";
            $usuarios = UsuariosClass::listarUsuarios($where);
        } else if ($filtro_id) {
            $where = " AND a.id = " . $filtro_id;
            $usuarios = UsuariosClass::listarUsuarios($where);
        } else {
            $usuarios = UsuariosClass::listarUsuarios("");
        }
        return _response($usuarios, 1, "Ok");
    }
    public static function getAtributeUsers()
    {
        $estados = UsuariosEstadosClass::getEstados();
        $tipo_usuario = UsuariosTipoClass::getEstados();
        $array['estados'] = $estados;
        $array['tipo_usuario'] = $tipo_usuario;

        echo _response($array, 1, "Ok");
    }
}
