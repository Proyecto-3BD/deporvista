<?php 
    require "../utils/autoload.php";

    class AdministradorControlador{ 
        public static function Autenticar($context){
            $u = new AdministradorModelo();
            $u -> nombreUsuario = $context['post']['nombreUsuario'];
            $u -> password = $context['post']['password'];
            if($u -> Autenticar($u -> nombreUsuario, $u -> nombreUsuario)){
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