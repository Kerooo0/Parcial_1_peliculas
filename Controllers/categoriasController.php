<?php namespace Controllers;

use Models\Categoria as Categoria;

class categoriasController{
    private $categorias;

    public function __construct(){
        $this->categorias = new Categoria();
    }

    public function index(){
        $datos = $this->categorias->listar();
        return $datos;
    }

    public function agregar(){
        if($_POST){
            $this->categorias->set("nombre", $_POST['nombre']);
            $this->categorias->add();
            header("Location: " . URL . "categorias");
        }
    }

    public function editar($id){
        if($_POST){
            $this->categorias->set("id", $_POST['id']);
            $this->categorias->set("nombre", $_POST['nombre']);
            $this->categorias->edit();
            header("Location: " . URL . "categorias");
        } else {
            $this->categorias->set("id", $id);
            $datos = $this->categorias->view();
            return $datos;
        }
    }

    public function eliminar($id){
        $this->categorias->set("id", $id);
        $this->categorias->delete();
        header("Location: " . URL . "categorias");
    }
}
?>