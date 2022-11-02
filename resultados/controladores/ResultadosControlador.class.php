<?php 
    require "../utils/autoload.php";
    header("Access-Control-Allow-Origin:*");


class ResultadosControlador {


    public static function ResultadoEquipo($context){
        $e = new  EventoModelo();
        $locatarios = $e -> LocatarioEvento();
        $visitantes = $e -> VisitanteEvento();
        $resultados = [];
        $deportes = [];
        for ($i=0; $i <count($locatarios) ; $i++) {
            if ($locatarios[$i]['idEvento'] === $visitantes[$i]['idEvento']) {
                $deportes[$i]['deporte'] = self::ObtenerDeporte($locatarios[$i]['idDeporte']);
                $resultados[$i]= array_merge($locatarios[$i], $visitantes[$i], $deportes[$i]);
            }
        }
        
        echo json_encode($resultados); 

    }

    public static function ObtenerDeporte($idDeporte){
        $e = new  DeporteModelo($idDeporte);
        return $e -> nombreDeporte;

    }

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

