<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {
        /*#############

            arreglar variables de clase en el modelo.
            hacer nuevo dump de la base de datos

            hacer obtener en el modelo 
        */############

        public static function ListarInfoDeportista($context){
            $d = ObtenerDeportista($context['post']['idDeportista']);
            $c = ObtenerCompeticion($context['post']['idDeportista']);
            var_dump($d);
            var_dump($c);
        }


        public static function ObtenerDeportista($context){
            $a = new InformacionDeportistaModelo($context['post']['idDeportista']);
            return $a -> ObtenerEqupoQueJuega();          
        }

        public static function ObtenerCompeticion($context){
            $a = new InformacionDeportistaModelo($context['post']['idDeportista']);
            return $a -> ObtenerCompeticion();
        }
    }