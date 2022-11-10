<?php 
    require "../utils/autoload.php";

class ResultadosControlador {

    public static function ResultadoEquipo(){
        $e = new  EventoModelo();
        $locatarios = $e -> LocatarioEvento();
        $visitantes = $e -> VisitanteEvento();
        $competiciones= $e -> EventoCompeticion();
        $resultados = [];
        $deportes = [];
        for ($i=0; $i <count($locatarios) ; $i++) {
            if (isset($competiciones[$i]['idEvento']) && $locatarios[$i]['idEvento'] === $visitantes[$i]['idEvento']) {
                $deportes[$i]['deporte'] = 
                    self::ObtenerDeporte($locatarios[$i]['idDeporte']);
                $resultados[$i]= array_merge($locatarios[$i], 
                    $visitantes[$i], $competiciones[$i], $deportes[$i]);
            }
        }
        return $resultados; 
    }

    public static function ObtenerDeporte($idDeporte){
        $e = new  DeporteModelo($idDeporte);
        return $e -> nombreDeporte;

    }
}