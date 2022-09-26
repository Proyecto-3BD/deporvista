<?php 
    require "../utils/autoload.php";

    class SesionControlador {
        public static function IniciarSesion($context){
            try{
                $u = new AdministradorModelo();
                $u -> nombreUsuario = $context['post']['nombreUsuario'];
                $u -> password = $context['post']['password'];
                if($u -> Autenticar($u -> nombreUsuario, $u -> password)){
                    SessionCreate("autenticado", true);
                    SessionCreate("nombreUsuario", $u -> nombreUsuario);
                    header("Location: /");
                }
                render("login", ["error" => true]);
            }
            catch (Exception $e){
                render("login", ["errorConexion" => true]);
            }
        }

        public static function CerrarSesion($context){
            session_destroy();
            header("Location:/login");
        }
    }