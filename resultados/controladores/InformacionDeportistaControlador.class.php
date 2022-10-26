<?php 
    require "../utils/autoload.php";

    class InformacionDeportistaControlador {
       
        public static function ListarDeportistaEquipo($context){
            $d = new DeportistaModelo($context['post']['idDeportista']);
            $deportistaEq = $d -> deportistaEquipo();
            $deporComp = $d -> deportistaCompeticion();
           
            $data = array_merge($deportistaEq, $deporComp);
            return $data;
        }
    }