<?php namespace Controllers;

    abstract class Controller{
        private $VISTA;

        public function __construct(Request $request);
    }



?>