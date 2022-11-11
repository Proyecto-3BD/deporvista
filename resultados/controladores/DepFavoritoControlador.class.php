<?php

	header("Access-Control-Allow-Origin: *");
	require "../utils/autoload.php";

    class DepFavoritoControlador{
        public static function Alta($context){
            if(!empty($context['post']['idSuscriptor'])){
                $u = new DepFavoritoModelo();
                $u -> idSuscriptor = $context['post']['idSuscriptor'];
                $u -> idDeporte = $context['post']['idDeporte'];
                if ($u -> Guardar()){
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