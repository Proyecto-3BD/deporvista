<?php 
    require "../utils/autoload.php";
    header("Access-Control-Allow-Origin:*");


    class ResultadosControlador {


        public static function ResultadoEquipo($context){
            $e = new  EventoModelo();
            $locatarios = $e -> LocatarioEvento();
            $visitantes = $e -> VisitanteEvento();
            $competiciones= $e -> EventoCompeticion();
            $resultados = [];
            $deportes = [];
            for ($i=0; $i <count($locatarios) ; $i++) {
                if ($locatarios[$i]['idEvento'] === $visitantes[$i]['idEvento']) {
                    $deportes[$i]['deporte'] = 
                        self::ObtenerDeporte($locatarios[$i]['idDeporte']);
                    
                    $locatarios[$i]['equipoLocatario'] = self::ObtenerEquipos($locatarios[$i]['idLocatario']);

                    $visitantes[$i]['equipoVisitante'] = self::ObtenerEquipos($visitantes[$i]['idVisitante']);

                    $resultados[$i]= array_merge($locatarios[$i], 
                        $visitantes[$i], $competiciones[$i], $deportes[$i]);
                }
            }
            
            echo json_encode($resultados); 

        }

        public static function ObtenerDeporte($idDeporte){
            $e = new  DeporteModelo($idDeporte);
            return $e -> nombreDeporte;

        }

        public static function ObtenerEquipos($idEquipo){
            $e = new  EquipoModelo($idEquipo);
            return $e -> desportistaEquipo;

        }
    }