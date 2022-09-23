<?php 
    require "../utils/autoload.php";

    class AdministradorControlador{
        public static function Alta($context){
            $u = new AdministradorModelo();
            $u -> idUsuario = $context['post']['idUsuario'];
            $u -> nombreUsuario = $context['post']['nombreUsuario'];
            $u -> email = $context['post']['email'];
            $u -> password = $context['post']['password'];
            $u -> Guardar();
        
        }

        public static function Eliminar($context){
            $u = new AdministradorModelo();
            $u -> idUsuario = $context['post']['idUsuario'];
            $u -> Eliminar();
        }        

        public static function Modificar($context){

            $u = new AdministradorModelo();
            $u -> idUsuario = $context['post']['idUsuario'];
            $u -> nombreUsuario = $context['post']['nombreUsuario'];
            $u -> email = $context['post']['email'];
            $u -> password = $context['post']['password'];
            $u -> Guardar();
        }


        public static function Listar(){
            $a = new AdministradorModelo();
            $administradores = $a -> ObtenerTodos();

            $resultado = [];
            foreach($administradores as $administrador){
                $t = [
                    'idUsuario' => $administrador -> idUsuario,
                    'nombreUsuario' => $administrador -> nombreUsuario,
                    'email' => $administrador -> email
                ];   
                array_push($resultado,$t);
            }
            return $resultado;          
        }
    }