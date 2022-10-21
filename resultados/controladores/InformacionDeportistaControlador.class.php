<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {

        public static function ListarInfoDeportista($context){
            var_dump($context);
            $a = new InformacionDeportistaModelo($context['post']['idDeportista']);
            $res = $a -> ObtenerEqupoQueJuega();

            
            
            var_dump($res);          
        }
    }