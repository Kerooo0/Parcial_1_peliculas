<?php namespace Config;

    class Enrutador{
        //Controlar las URLs
        public static function run(Request $request ){
            $controlador = $request->getControlador() . "Controller";
            $ruta = ROOT . "Controllers" . DS . $controlador . ".php";

            $metodo = $request->getMetodo();
            
            if ($metodo == "index.php") {
                $metodo = "index";
                
            }

            //todo lo que entre en la url, va a ser un argumento

            $argumento = $request->getArgumento();

            if(is_readable($ruta)){
                require_once $ruta;
                $mostrar = "Controllers\\" . $controlador;
                $controlador = new $mostrar;
                if(!isset($argumento)){
                    $datos = call_user_func(array($controlador,$metodo), $argumento);

                }
            }

            //Cargamos la Vista
            $ruta = ROOT . "Views" . DS .$request->getControlador() . DS . $request->getMetodo() . ".php";
            if(is_readable($ruta)){
                require_once $ruta;

            }else{
                print "Error 404";
            }

        }

    }




?>