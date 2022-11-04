<?php
	require "../utils/autoload.php";
    header("Access-Control-Allow-Origin:*");

    
    class EquipoControlador{
        public static function Alta($context){
            if(!empty($context['post']['idEquipo'])){
                $u = new EquipoModelo();
                $u -> idEquipo = $context['post']['idEquipo'];
                $u -> nombreEquipo = $context['post']['nombreEquipo'];
                $u -> paisEquipo = $context['post']['paisEquipo'];
                $u -> dt = $context['post']['dt'];
                $u -> Guardar();
                $respuesta = [
                    "paisEquipo" => "true",
                    "Mensaje" => "Equipo Ingresado"
                ];
                echo json_encode($respuesta);
        	}
        }

        public static function Eliminar($context){
            $u = new EquipoModelo($context['post']['idEquipo']);
            $u -> Eliminar();
            $respuesta = [
                    "paisEquipo" => "true",
                    "Mensaje" => "Equipo Eliminado"
            ];
            echo json_encode($respuesta);
        }        

        public static function Modificar($context){

            $u = new EquipoModelo($context['post']['idEquipo']);
            $u -> idEquipo = $context['post']['idEquipo'];
            $u -> nombreEquipo = $context['post']['nombreEquipo'];
            $u -> paisEquipo = $context['post']['paisEquipo'];
            $u -> dt = $context['post']['dt'];
            if(!empty($context['post']['idEquipo'])){
                $u -> Guardar();
                $respuesta = [
                    "paisEquipo" => "true",
                    "Mensaje" => "Equipo Modificado"
            ];
            echo json_encode($respuesta);
            }
        }


        public static function Listar(){
            $a = new EquipoModelo();
            $equipos = $a -> obtenerTodos();

            $resultado = [];
            foreach($equipos as $equipo){
                $t = [
                    'idEquipo' => $equipo -> idEquipo,
                    'nombreEquipo' => $equipo -> nombreEquipo,
                    'paisEquipo' => $equipo -> paisEquipo,
                    'dt' => $equipo -> dt
                ];   
                array_push($resultado,$t);
            }
            echo json_encode($resultado);          
        }
    }