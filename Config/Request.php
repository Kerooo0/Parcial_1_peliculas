<?php namespace Config;

    class Request{

        //creamos las variables que van a tener los controladores/metodos/argumentos


        public function __construct(){
            if(isset($_GET['url'])){
                //parametros de la ruta url 

                //parametros de seguridad sanitizante
                $ruta  = filter_input(INPUT_GET, 'url',FILTER_SANITIZE_URL);
                $ruta = explode("/", $ruta);
                $ruta = array_filter($ruta);

                //redirigir la url del index

                if($ruta[0] == "index.php" ){
                    $this->controlador = "peliculas";

                }else{
                    $this->controlador = strtolower(array_shift($ruta));
                }

                $this->metodo = strtolower(array_shift($ruta));

                if(!$this->metodo){
                    $this->metodo = "index";

                }
                    $this->argumento = $ruta;
                

                }else{
                    $this->controlador = "peliculas";
                    $this->metodo = "index";
                }

            

            }

            public function  getControlador(){
                return $this->controlador;

            }
            public function  getMetodo(){
                return $this->metodo;

            }
            public function  getArgumento(){
                return $this->argumento;

            }



        }


 


    



?>