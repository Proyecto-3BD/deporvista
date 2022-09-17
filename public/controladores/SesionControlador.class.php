<?php 
    require "../utils/autoload.php";

    class SesionControlador { 
        public static function IniciarSesion($context){
            try{
                if(self::autenticar($context['post']['nombreUsuario'],$context['post']['password']) === "true"){
                    SessionCreate("autenticado",true);
                    SessionCreate("nombreUsuario", $context['post']['nombreUsuario']);
                    header("Location: /");

                }
                render("login",["error" => true]);
            }
            catch (Exception $e) {
                render("login", ["errorConexion" => true]);
            }
        }

        public static function CerrarSesion($context){
            session_destroy();
            header("Location:/");
        }

        private static function autenticar($nombreUsuario,$password){
            $parametros = [
                "nombreUsuario" => $nombreUsuario,
                "password" => $password
            ];

            $resultado = HttpRequest(API_AUTH_URL,"post",$parametros); 
            return $resultado['Resultado'];
            
        
            
        }

       
    }
