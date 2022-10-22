<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {

        public static function ListarInfoDeportista($context){
            $a = new InformacionDeportistaModelo($context['post']['idDeportista']);
            $res = $a -> ObtenerEqupoQueJuega();
            
            $liga = new CompeticionesModelo($res['pais']) 

            $liga-> obtener;

            var_dump($res);
            var_dump($liga['pais']);



            //echo json_encode($res);          
        }
    }