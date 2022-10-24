<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {
        /*#############

            arreglar variables de clase en el modelo.
            hacer nuevo dump de la base de datos

            hacer obtener en el modelo 
        */############

        public static function ListarInfoDeportista($context){
            $a = new InformacionDeportistaModelo($context['post']['idDeportista']);
            $d = $a -> ObtenerDeportista();
            $c = $a -> ObtenerCompeticion();
            var_dump($d);
            var_dump($c);
        }


        public static function ObtenerDeportista($context){
            return $this -> ObtenerEqupoQueJuega();          
        }

        public static function ObtenerCompeticion($context){
            return $this -> ObtenerCompeticion();
        }
    }