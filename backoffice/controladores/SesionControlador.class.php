<?php 
    require "../utils/autoload.php";

    class SesionControlador {
        public static function IniciarSesion($context){
            try{
                $u = new AdministradorModelo();
                $u -> nombreAdmin = $context['post']['nombreAdmin'];
                $u -> password = $context['post']['password'];
                if($u -> Autenticar($u -> nombreAdmin, $u -> password)){
                    SessionCreate("autenticado", true);
                    SessionCreate("nombreAdmin", $u -> nombreAdmin);
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