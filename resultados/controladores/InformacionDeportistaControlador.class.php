<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {

        public static function ListarInfoDeportista($context){
            $a = new InformacionDeportistaModelo($context['post']['idDeportista']);
            $res = $a -> ObtenerEqupoQueJuega();

            echo json_encode($res);          
        }
    }