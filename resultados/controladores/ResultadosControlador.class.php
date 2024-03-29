<?php 
    require "../utils/autoload.php";
    header("Access-Control-Allow-Origin:*");


    class ResultadosControlador {


        public static function ResultadoEquipo($context){
            $e = new  EventoModelo();
            $eventos = $e -> Evento();
            $resultado = [];
            foreach($eventos as $evento) {
                $t = [
                    'idEvento' => $evento -> idEvento,
                    'fechaHora' => $evento -> fechaHora,
                    'resultado' => $evento -> resultado,
                    'idDeporte' => $evento -> nombreDeporte,
                    'infracciones' => $evento -> infracciones,
                    'ubicacion' => $evento -> ubicacion,
                    'idLocatario' => $evento -> idLocatario,
                    'locatario' => $evento ->locatario,
                    'equipoLocatario' => $evento -> equipoLocatario,
                    
                    'idVisitante' => $evento -> idVisitante,
                    'visitante' => $evento -> visitante,
                    'equipoVisitante' => $evento -> equipoVisitante,
                    'idCompeticion' => $evento -> idCompeticion,
                    'nombreCompeticion' => $evento -> nombreCompeticion
                    
                ]; 
                array_push($resultado,$t);
            }
            
            echo json_encode($resultado); 

        }


        public static function ObtenerEquipos($idEquipo){
            $e = new  EquipoModelo($idEquipo);
            return $e -> desportistaEquipo();

        }
    }