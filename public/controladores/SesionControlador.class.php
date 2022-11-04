<?php 
    require "../utils/autoload.php";

    class SesionControlador { 
        public static function IniciarSesion($context){
            try{
                if(self::autenticar($context['post']['nombreSuscriptor'],$context['post']['password']) === "true"){
                    SessionCreate("autenticado",true);
                    SessionCreate("nombreSuscriptor", $context['post']['nombreSuscriptor']);
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

        private static function autenticar($nombreSuscriptor,$password){
            $parametros = [
                "nombreSuscriptor" => $nombreSuscriptor,
                "password" => $password
            ];

            $resultado = HttpRequest(API_AUTH_URL,"post",$parametros); 
            return $resultado['Resultado'];
            
        
            
        }

       
    }
