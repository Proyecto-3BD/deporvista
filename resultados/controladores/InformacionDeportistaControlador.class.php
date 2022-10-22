<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {

        public static function ListarInfoDeportista($context){
            $a = new InformacionDeportistaModelo($context['post']['idDeportista']);
            $res = $a -> ObtenerEqupoQueJuega();
            
            //$l = new CompeticionesModelo;

            //$liga ->$l obtenerPorPais();   ###########VER ESTOOOOOOOOO
            
            
            echo json_encode($res);          
        }
    }