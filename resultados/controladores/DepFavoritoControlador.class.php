<?php

	header("Access-Control-Allow-Origin: *");
	require "../utils/autoload.php";

    class DepFavoritoControlador{
        public static function Alta($context){
            if(!empty($context['post']['idSuscriptor'])){
                $u = new DepFavoritoModelo();
                $u -> idSuscriptor = $context['post']['idSuscriptor'];
                $u -> idDeporte = $context['post']['idDeporte'];
                $alta = $u -> Alta();
                var_dump($alta);
                die;
                if($alta){
                    $respuesta = [
                        "Resultado" => "true",
                        "Mensaje" => "Deporte Favorito Ingresado"
                    ];
                    echo json_encode($respuesta);
                    return;
                }
                $respuesta = [
                    "Resultado" => "false",
                    "Mensaje" => "Error en el ingreso"
                ];
                echo json_encode($respuesta);
                return;
            }
        }

        public static function Eliminar($context){
            $u = new DepFavoritoModelo($context['post']['idSuscriptor']);
            $u -> Eliminar();
            $respuesta = [
                "Resultado" => "true",
                "Mensaje" => "Deporte Eliminado"
            ];
            echo json_encode($respuesta);
        }        

        public static function Modificar($context){

            $u = new DepFavoritoModelo($context['post']['idSuscriptor']);
            $u -> idDeporte = $context['post']['idSuscriptor'];
            $u -> nombreDeporte = $context['post']['Deporte'];
            if(!empty($context['post']['idDeporte'])){
                $u -> Guardar();
                $respuesta = [
                    "Resultado" => "true",
                    "Mensaje"  => "Favoritos Modificado"
                ];
                echo json_encode($respuesta);
            }
        }


        public static function Listar(){
            $a = new DepFavoritoModelo();
            $favoritos = $a -> ObtenerTodos();

            $resultado = [];
            foreach($favoritos as $deporte){
                $t = [
                    'idSuscriptor' => $deporte -> idSuscriptor,
                    'idDeporte' => $deporte -> idDeporte,
                    'tipoDeporte' => $deporte -> tipoDeporte,
                ];   
                array_push($resultado,$t);
            }
            echo json_encode($resultado);          
        }
    }