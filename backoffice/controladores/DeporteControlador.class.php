<?php

	header("Access-Control-Allow-Origin: *");

	require "../utils/autoload.php";

    class DeporteControlador{
        public static function Alta($context){
            if(!empty($context['post']['idDeporte'])){
                $u = new DeporteModelo();
                $u -> idDeporte = $context['post']['idDeporte'];
                $u -> nombreDeporte = $context['post']['nombreDeporte'];
                $u -> tipoDeporte = $context['post']['tipoDeporte'];
                $u -> Guardar();
                $respuesta = [
                    "Resultado" => "true",
                    "Mensaje" => "Deporte Ingresado"
                ];
                echo json_encode($respuesta);
            }
        }

        public static function Eliminar($context){
            $u = new DeporteModelo($context['post']['idDeporte']);
            $u -> Eliminar();
            $respuesta = [
                "Resultado" => "true",
                "Mensaje" => "Deporte Eliminado"
            ];
            echo json_encode($respuesta);
        }        

        public static function Modificar($context){

            $u = new DeporteModelo($context['post']['idDeporte']);
            $u -> idDeporte = $context['post']['idDeporte'];
            $u -> nombreDeporte = $context['post']['nombreDeporte'];
            $u -> tipoDeporte = $context['post']['tipoDeporte'];
            if(!empty($context['post']['idDeporte'])){
                $u -> Guardar();
                $respuesta = [
                    "Resultado" => "true",
                    "Mensaje"  => "Deporte Modificada"
                ];
                echo json_encode($respuesta);
            }
        }


        public static function Listar(){
            $a = new DeporteModelo();
            $deportes = $a -> ObtenerTodos();

            $resultado = [];
            foreach($deportes as $deporte){
                $t = [
                    'idDeporte' => $deporte -> idDeporte,
                    'nombreDeporte' => $deporte -> nombreDeporte,
                    'tipoDeporte' => $deporte -> tipoDeporte,
                ];   
                array_push($resultado,$t);
            }
            echo json_encode($resultado);          
        }
    }