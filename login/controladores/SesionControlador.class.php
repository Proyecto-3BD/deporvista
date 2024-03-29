<?php 
    Header("Access-Control-Allow-Origin: *");
    require "../utils/autoload.php";

    class SesionControlador {

        public static function IniciarSesion($context){
            $u = new SuscriptorModelo();
            $u -> nombreSuscriptor = $context['post']['nombreSuscriptor'];
            $u -> password = $context['post']['password'];
            if($u -> Autenticar()){
                $respuesta = [
                    "Resultado" => "true",
                    "Mensaje" => "Credenciales validas"
                ];
                echo json_encode($respuesta);
                return;
            }
            $respuesta = [
                "Resultado" => "false",
                "Mensaje" => "Credenciales invalidas"
            ];
            echo json_encode($respuesta);
            return;
        }
    }