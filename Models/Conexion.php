<?php namespace Models;

    class Conexion{

        private $datos = array(
            "host" => "localhost", //0
            "user" => "root", //1
            "pass" => "", //2
            "db" => "peliculas" //3

        );

        private $con;

        public function __construct(){
            //cual es el host al que hay que contectar
            $this->con = new \mysqli($this->datos['host'],$this->datos['user'],$this->datos['pass'],$this->datos['db']); 
        }

        //como voy a hacer las consultas a la base de datos
        public function consultaSimple($sql){
            $this->con->query($sql);
        }

        //retorno de la consulta sql
        public function consultaRetorno($sql){
            $datos = $this->con->query($sql);
            return $datos;
        }



    }





?>