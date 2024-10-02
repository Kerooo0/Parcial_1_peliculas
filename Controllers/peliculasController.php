<?php namespace Controllers;

use Models\Pelicula as Pelicula;
use Models\Categoria as Categoria;

class peliculasController{

    private $peliculas;
    private $categorias;

    public function __construct(){
        $this->peliculas = new Pelicula();
        $this->categorias = new Categoria();
    }

    // Llamado a la función "listar" de modelo
    public function index(){
        $datos = $this->peliculas->listar();
        return $datos;
    }

    // Agregar
    public function agregar(){
        if(!$_POST){
            $datos = $this->categorias->listar();
            return $datos;
        } else {
            // Me aseguro que solo se suban este tipo de archivos
            $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
            $limite = 700; // Limite en KB

            if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024){
                $nombre = date('is') . $_FILES['imagen']['name'];
                $ruta = "Views" . DS . "_template" . DS . "imagenes" . DS . "fotoPelis" . DS . $nombre;
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

                $this->peliculas->set("titulo", $_POST['titulo']);
                $this->peliculas->set("categoria_id", $_POST['categoria_id']);
                $this->peliculas->set("imagen", $nombre);
                $this->peliculas->add();
                header("Location: " . URL . "peliculas");
            }
        }
    }

    // Editar
    public function editar($id){
        if(!$_POST){
            $this->peliculas->set("id", $id);
            $datos = $this->peliculas->view();
            return $datos;
        } else {
            $this->peliculas->set("id", $_POST['id']);
            $this->peliculas->set("titulo", $_POST['titulo']);
            $this->peliculas->set("categoria_id", $_POST['categoria_id']);
            $this->peliculas->edit();
            header("Location: " . URL . "peliculas");
        }
    }

    // Listar categorías
    public function listarCategorias(){
        $datos = $this->categorias->listar();
        return $datos;
    }

    // Ver una película
    public function ver($id){
        $this->peliculas->set("id", $id);
        $datos = $this->peliculas->view();
        return $datos;
    }

    // Eliminar una película
    public function eliminar($id){
        $this->peliculas->set("id", $id);
        $this->peliculas->delete();
        header("Location: " . URL . "peliculas");
    }
}

$peliculas = new peliculasController();
?>