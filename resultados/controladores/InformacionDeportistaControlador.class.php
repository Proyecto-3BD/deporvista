<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {
       
        public static function ListarDeportistaEquipo($context){
            $d = new DeportistaModelo($context['post']['idDeportista']);
            $deportistaEq = $d -> deportistaEquipo();
           
            //return $deportistaEq;
            var_dump($deportistaEq);
            //var_dump($e);
        }
    }