<?php
include_once "class_conexion.php";

class UsuariosEstadosClass
{

    public $id;
    public $descripcion;


    public function __construct()
    {
        $this->id = "";
        $this->descripcion = "";
    }
    public function cargar($id = null, $descripcion)
    {
        $this->setId($id);
        $this->setDescripcion($descripcion);
    }
    /////////SETTERS//////////////
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    /////////GETTERS//////////////
    public function getSabor_id()
    {
        return $this->id;
    }
    public function getdescripcion()
    {
        return $this->descripcion;
    }

    public static function getEstados()
    {
        $query = "SELECT * FROM usuarios_estado WHERE id != 3 ";
        try {
            $comando = DB::getInstance()->prepare($query);
            $comando->execute();
            $arreglo = array();

            while ($datos = $comando->fetch()) {
                $carrito = new UsuariosEstadosClass();
                $carrito->cargar($datos[0], $datos[1]);
                array_push($arreglo, $carrito);
            }

            return $arreglo;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
