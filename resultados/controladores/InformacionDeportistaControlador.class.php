<?php 
    require "../utils/autoload.php";
    header("Access-Control-Allow-Origin:*");


    class InformacionDeportistaControlador {
       
        public static function ListarDeportistaEquipo($context){
            $d = new DeportistaModelo($context['post']['idDeportista']);
            $deportistaEq = $d -> deportistaEquipo();
            $deporComp = $d -> deportistaCompeticion();
            
            $data = array_merge($deportistaEq, $deporComp);
            echo json_encode($data);
        }
    }