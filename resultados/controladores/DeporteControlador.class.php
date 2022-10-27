<?php
	require "../utils/autoload.php";

    class DeporteControlador{
        public static function Alta($context){
            if(!empty($context['post']['idDeportista'])){
                $u = new DeportistaModelo();
                $u -> idDeportista = $context['post']['idDeportista'];
                $u -> nombreDeportista = $context['post']['nombreDeportista'];
                $u -> apellidos = $context['post']['apellidos'];
                $u -> paisDeportista = $context['post']['paisDeportista'];

                $u -> Guardar();
                $respuesta = [
                    "Resultado" => "true",
                    "Mensaje" => "Deportista Ingresado"
                ];
                echo json_encode($respuesta);
            }
        }

        public static function Eliminar($context){
            $u = new DeportistaModelo($context['post']['idDeportista']);
            $u -> Eliminar();
            $respuesta = [
                "Resultado" => "true",
                "Mensaje" => "Deportista Eliminado"
            ];
            echo json_encode($respuesta);
        }        

        public static function Modificar($context){

            $u = new DeportistaModelo($context['post']['idCompeticion']);
            $u -> idCompeticion = $context['post']['idCompeticion'];
            $u -> nombreCompeticion = $context['post']['nombreCompeticion'];
            $u -> paisCompeticion = $context['post']['paisCompeticion'];
            $u -> anio = $context['post']['anio'];
            if(!empty($context['post']['idCompeticion'])){
                $u -> Guardar();
                $respuesta = [
                    "Resultado" => "true",
                    "Mensaje"  => "Competencia Modificada"
                ];
                echo json_encode($respuesta);
            }
        }


        public static function Listar(){
            $a = new DeportistaModelo();
            $deportistas = $a -> ObtenerTodos();

            $resultado = [];
            foreach($deportistas as $deportista){
                $t = [
                    'idDeportista' => $deportista -> idDeportista,
                    'nombreDeportista' => $deportista -> nombreDeportista,
                    'apellidos' => $deportista -> apellidos,
                    'paisDeportista' => $deportista -> paisDeportista
                ];   
                array_push($resultado,$t);
            }
            echo json_encode($resultado);          
        }
    }
	