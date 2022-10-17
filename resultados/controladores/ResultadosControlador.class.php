<?php 
    require "../utils/autoload.php";

class ResultadosControlador {

    public static function Listar(){
        $a = new ResultadosModelo();
        $res = $a -> ObtenerEventos();

        $resultado = [];
        foreach($res as $evento){
            $t = [
                'idEvento' => $evento -> idEvento,
                'fechaHora' => $evento -> fechaHora,
                'resultado' => $evento -> resultado,
                'infracciones' => $evento -> infracciones,
                'ubicacion' => $evento -> ubicacion
            ];   
            array_push($resultado,$t);
        }
        return $resultado;          
    }
}