<?php
    //definimos que queremos un directorio raiz
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath(dirname(__FILE__)) . DS);

    //definimos el directorio
    define('URL', "http://localhost/peliculas/");

    //requerimos configuracion!!!!! archivo Autoload.php
    require_once "Config/Autoload.php";
    Config\Autoload::run();

    //cargamos la vista
    require_once "Views/_template/template.php";
    


    Config\Enrutador::run(new Config\Request());


?>