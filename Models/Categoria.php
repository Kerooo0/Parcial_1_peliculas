<?php namespace Models;

class Categoria{
    private $id;
    private $nombre;
    private $con;

    public function __construct(){
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido){
        $this->$atributo = $contenido;
    }

    public function get($atributo){
        return $this->$atributo;
    }

    public function listar(){
        $sql = "SELECT * FROM categorias";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    public function add(){
        $sql = "INSERT INTO categorias (id, nombre) VALUES (null, '{$this->nombre}')";
        $this->con->consultaSimple($sql);
    }

    public function delete(){
        $sql = "DELETE FROM categorias WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    public function edit(){
        $sql = "UPDATE categorias SET nombre = '{$this->nombre}' WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    public function view(){
        $sql = "SELECT * FROM categorias WHERE id = '{$this->id}'";
        $datos = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_assoc($datos);
        return $row;
    }
}
?>