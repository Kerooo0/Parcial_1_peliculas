<?php namespace Models;

class Usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $password;
    private $email;

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
        $sql = "SELECT * FROM usuarios";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    public function add(){
        $sql = "INSERT INTO usuarios (id, nombre, apellido, email, password ) VALUES (null, '{$this->nombre}', '{$this->apellido}', '{$this->email}' , '{$this->MD5('password')}')";
        $this->con->consultaSimple($sql);
    }

    public function delete(){
        $sql = "DELETE FROM usuarios WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    public function edit(){
        $sql = "UPDATE usuarios SET nombre = '{$this->nombre}', apellido='{$this->apellido}' ,email = '{$this->email}' WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    public function view(){
        $sql = "SELECT * FROM usuarios WHERE id = '{$this->id}'";
        $datos = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_assoc($datos);
        return $row;
    }
}
?>