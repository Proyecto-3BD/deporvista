<?php 
    require "../utils/autoload.php";
    header("Access-Control-Allow-Origin:*");

    class EventoControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombre'])){
                $u = new EventoModelo();
                $u -> idEvento = $context['post']['idEvento'];
                $u -> fechaHora = $context['post']['fechaHora'];
                $u -> resultado = $context['post']['resultado'];
                $u -> infracciones = $context['post']['infracciones'];
                $u -> ubicacion = $context['post']['ubicacion'];
                $u -> Guardar();
                $respuesta = [
                    "Resultado" => "true",
                    "Mensaje" => "Evento Ingresado"
                ];
                echo json_encode($respuesta);
        	}
        }

        public static function Eliminar($context){
            $u = new EventoModelo($context['post']['idEvento']);
            $u -> Eliminar();
            $respuesta = [
                    "Resultado" => "true",
                    "Mensaje" => "Evento Eliminado"
            ];
            echo json_encode($respuesta);
        }        

        public static function Modificar($context){

            $u = new EventoModelo($context['post']['idEvento']);
            $u -> idEvento = $context['post']['idEvento'];
            $u -> fechaHora = $context['post']['fechaHora'];
            $u -> resultado = $context['post']['resultado'];
            $u -> infracciones = $context['post']['infracciones'];
            $u -> ubicacion = $context['post']['ubicacion'];
            if(!empty($context['post']['idCompeticion'])){
                $u -> Guardar();
                $respuesta = [
                    "Resultado" => "true",
                    "Mensaje" => "Evento Modificado"
            ];
            echo json_encode($respuesta);
            }
        }


        public static function Listar(){
            $a = new EventoModelo();
            $eventos = $a -> obtenerTodos();

            $resultado = [];
            foreach($eventos as $evento){
                $t = [
                    'idEvento' => $evento -> idEvento,
                    'fechaHora' => $evento -> fechaHora,
                    'resultado' => $evento -> resultado,
                    'infracciones' => $evento -> infracciones,
                    'ubicacion' => $evento -> ubicacion
                ];   
                array_push($resultado,$t);
            }
            echo json_encode($resultado);          
        }
    }