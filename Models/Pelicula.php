<?php namespace Models;

class Pelicula{
    private $id;
    private $titulo;
    private $categoria_id;
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
        $sql = "SELECT * FROM peliculas";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    public function add(){
        $sql = "INSERT INTO peliculas (id, titulo, categoria_id) VALUES (null, '{$this->titulo}', '{$this->categoria_id}')";
        $this->con->consultaSimple($sql);
    }

    public function delete(){
        $sql = "DELETE FROM peliculas WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    public function edit(){
        $sql = "UPDATE peliculas SET titulo = '{$this->titulo}', categoria_id = '{$this->categoria_id}' WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    public function view(){
        $sql = "SELECT * FROM peliculas WHERE id = '{$this->id}'";
        $datos = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_assoc($datos);
        return $row;
    }
}
?>