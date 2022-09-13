<?php 
    require "../utils/autoload.php";

    class SesionControlador {
        public static function IniciarSesion($context){
            $u = new UsuarioSuscriptorModelo();
            $u -> nombreUsuario = $context['post']['nombreUsuario'];
            $u -> password = $context['post']['password'];
            if($u -> Autenticar($u -> nombreUsuario, $u -> password)){
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