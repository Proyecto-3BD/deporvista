<?php 
    require "../utils/autoload.php";
    header("Access-Control-Allow-Origin:*");


class ResultadosControlador {

    public static function Listar($context){
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