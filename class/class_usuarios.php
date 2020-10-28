<?php
include_once "class_conexion.php";

class UsuariosClass
{

    public $id;
    public $nombre;
    public $usuario;
    public $pass;
    public $tipo;
    public $estado;
    public $fecha;
    public $email;

    public function __construct()
    {
        $this->id = "";
        $this->nombre = "";
        $this->usuario = "";
        $this->pass = "";
        $this->tipo = "";
        $this->estado = "";
        $this->fecha = "";
        $this->email = "";
    }
    public function cargar(
        $id = null,
        $nombre,
        $usuario,
        $pass,
        $tipo,
        $estado,
        $fecha,
        $email
    ) {
        $this->setIdUsuario($id);
        $this->setNombre($nombre);
        $this->setUsuario($usuario);
        $this->setPass($pass);
        $this->setTipo($tipo);
        $this->setEstado($estado);
        $this->setFecha($fecha);
        $this->setEmail($email);
    }
    // SETTERS
    public function setIdUsuario($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
    public function setTipo($tipo)
    {
        return $this->tipo = $tipo;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // GETTERS
    public function getIdUsuario()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function getTipo()
    {
        return $this->tipo;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function create()
    {
        $query = "INSERT INTO usuarios (
            id,
            nombre,
            usuario,
            password,
            tipo,
            estado,
            fecha_alta,
            email
        )
        VALUES
            (
                :id,
                :nombre,
                :usuario,
                :password ,
                :tipo,
                :estado,
                NOW(),
                :email
            )";
        try {
            $comando = DB::getInstance()->prepare($query);
            $rows = $comando->execute(
                array(
                    ':id' => $this->getIdUsuario(),
                    ':nombre' => $this->getNombre(),
                    ':usuario' => $this->getUsuario(),
                    ':password' =>  md5($this->getPass()),
                    ':tipo' => $this->getTipo(),
                    ':estado' => $this->getEstado(),
                    ':email' => $this->getEmail()
                )
            );
        } catch (PDOException $e) {
            dump("ERROR" . $e->getMessage());
        }
    }
    public static function listarUsuarios($where)
    {
        $query = "SELECT
        a.id,
        a.nombre,
        a.usuario,
        a.password,
        b.descripcion tipo,
        c.descripcion estado,
        a.fecha_alta,
        a.email
    FROM
        usuarios a
    INNER JOIN usuarios_tipo b ON b.id = a.tipo
    INNER JOIN usuarios_estado c ON c.id = a.estado	
WHERE a.estado !=" . USUARIO_ELIMINADO . $where;
        try {
            $comando = DB::getInstance()->prepare($query);
            $comando->execute();
            $arreglo = array();
            while ($datos = $comando->fetch()) {

                $usuario = new UsuariosClass();
                $usuario->cargar(
                    $datos['id'],
                    $datos['nombre'],
                    $datos['usuario'],
                    $datos['password'],
                    $datos['tipo'],
                    $datos['estado'],
                    $datos['fecha_alta'],
                    $datos['email']
                );
                array_push($arreglo, $usuario);
            }
            return $arreglo;
        } catch (PDOException $e) {
            dump("ERROR" . $e->getMessage());
        }
    }

    public static function login($user, $pass)
    {
        $query = "SELECT * FROM usuarios WHERE UCASE(usuario) LIKE UCASE('%$user%') AND password = '$pass'";
        try {
            $comando = DB::getInstance()->prepare($query);
            $comando->execute();
            $usuario = null;
            while ($datos = $comando->fetch()) {

                $usuario = new UsuariosClass();
                $usuario->cargar(
                    $datos['id'],
                    $datos['nombre'],
                    $datos['usuario'],
                    $datos['password'],
                    $datos['tipo'],
                    $datos['estado'],
                    $datos['fecha_alta'],
                    $datos['email']
                );
            }
            return $usuario;
        } catch (PDOException $e) {
            dump("ERROR" . $e->getMessage());
        }
    }
}
