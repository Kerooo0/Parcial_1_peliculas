<?php namespace Controllers;

use Models\Usuario as Usuario;

class usuarioController{
    private $usuarios;

    public function __construct(){
        $this->usuarios = new Usuario();
    }

    public function index(){
        $datos = $this->usuarios->listar();
        return $datos;
    }

    public function agregar(){
        if($_POST){
            $this->usuarios->set("nombre", $_POST['nombre']);
            $this->usuarios->set("apellido", $_POST['apellido']);
            $this->usuarios->set("email", $_POST['email']);
            $this->usuarios->set("password", $_POST['password']);
            $this->usuarios->add();
            header("Location: " . URL . "usuario");
        }
    }

    public function editar($id){
        if($_POST){
            $this->usuarios->set("id", $_POST['id']);
            $this->usuarios->set("nombre", $_POST['nombre']);
            $this->usuarios->set("apellido", $_POST['apellido']);
            $this->usuarios->set("email", $_POST['email']);
            $this->usuarios->edit();
            header("Location: " . URL . "usuario");
        } else {
            $this->usuarios->set("id", $id);
            $datos = $this->usuarios->view();
            return $datos;
        }
    }

    public function eliminar($id){
        $this->usuarios->set("id", $id);
        $this->usuarios->delete();
        header("Location: " . URL . "usuario");
    }
}
?>