<?php 
    require "../utils/autoload.php";

    class UsuarioControlador {
        public static function Alta($context){
            date_default_timezone_set("America/Montevideo");
            $u = new UsuarioSuscriptorModelo();
            $u -> nombreUsuario = $context['post']['nombreUsuario'];
            $u -> email = $context['post']['email'];

            $u -> password = $context['post']['password'];
            $u -> documento = $context['post']['documento'];
            $u -> nombre = $context['post']['nombre'];
            $u -> apellidos = $context['post']['apellidos'];
            $u -> telefono = $context['post']['telefono'];
            $u -> metodoPago = $context['post']['metodoPago'];
            $u -> fechaAlta = date("Y-m-d"); 
            $u -> Guardar();
            
            header("Location: /");
        }


    }
