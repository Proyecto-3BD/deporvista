<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {

        public static function ListarInfoDeportista($context){
            $a = new InformacionDeportistaModelo($context['post']['idDeportista']);
            $res = $a -> ObtenerEqupoQueJuega();
            
            /*$l = new CompeticionesModelo();

            $liga = CompeticionesControlador::Listar();

            var_dump($liga);
            */
            
            echo json_encode($res);          
        }
    }