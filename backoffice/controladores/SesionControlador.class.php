<?php 
    require "../utils/autoload.php";

    class SesionControlador {
        public static function IniciarSesion($context){
            if(self::autenticar($context['post']['nombreUsuario'],$context['post']['password']) === "true"){
                SessionCreate("autenticado",true);
                SessionCreate("nombreUsuario", $context['post']['nombreUsuario']);
                header("Location: /");

            }else render("loginAdmin",["error" => true]);
        }

        public static function CerrarSesion($context){
            session_destroy();
            header("Location:/loginAdmin");
        }

        private static function autenticar($nombreUsuario,$password){
            $parametros = [
                "nombreUsuario" => $nombreUsuario,
                "password" => $password
            ];

            $resultado = HttpRequest(API_AUTH_ADMIN_URL, "post", $parametros);
            return $resultado['Resultado'];
            
        
            
        }

       
    }