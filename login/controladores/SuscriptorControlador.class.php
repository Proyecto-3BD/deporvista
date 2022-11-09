<?php 
    Header("Access-Control-Allow-Origin: *");
    require "../utils/autoload.php";

    class SuscriptorControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombreSuscriptor'])){
                date_default_timezone_set("America/Montevideo");
                $u = new SuscriptorModelo();
                $u -> idSuscriptor = $context['post']['idSuscriptor'];
                $u -> nombreSuscriptor = $context['post']['nombreSuscriptor'];
                $u -> email = $context['post']['email'];
                $u -> password = $context['post']['password'];
                $u -> documento = $context['post']['documento'];
                $u -> nombre = $context['post']['nombre'];
                $u -> apellidos = $context['post']['apellidos'];
                $u -> telefono = $context['post']['telefono'];
                $u -> metodoPago = $context['post']['metodoPago'];
                $u -> fechaAlta = date("Y-m-d");
                $u -> Guardar();
                render('gestionSuscriptor', ["ingresado" => true]);
            }else
                render('gestionSuscriptor', ["error" => true]);
        }
        
        public static function Eliminar($context){
            $u = new SuscriptorModelo($context["post"]["idSuscriptor"]);
            $u -> Eliminar();
            render("gestionSuscriptor" , ["eliminado" => true]);
        }        

        public static function Modificar($context){
            $u = new SuscriptorModelo($context["post"]["idSuscriptor"]);
            $u -> idSuscriptor = $context['post']['idSuscriptor'];
            $u -> nombreSuscriptor = $context['post']['nombreSuscriptor'];
            $u -> email = $context['post']['email'];
            $u -> password = $context['post']['password'];
            $u -> documento = $context['post']['documento'];
            $u -> nombre = $context['post']['nombre'];
            $u -> apellidos = $context['post']['apellidos'];
            $u -> telefono = $context['post']['telefono'];
            $u -> metodoPago = $context['post']['metodoPago'];
            if(!empty($context["post"]["idSuscriptor"])){
                $u -> Guardar();
                render("gestionSuscriptor", ['modificado' => true]);
            }else
                render("gestionSuscriptor", ['errorModificado' => true]);          
        }

        public static function Listar(){
            $u = new SuscriptorModelo();
            $suscriptores = $u -> ObtenerTodos();
            $resultado = [];
            foreach($suscriptores as $suscriptor){
                $t = [
                    'idSuscriptor' => $suscriptor -> idSuscriptor,
                    'nombreSuscriptor' => $suscriptor -> nombreSuscriptor,
                    'email' => $suscriptor -> email,
                    'documento' => $suscriptor -> documento,
                    'nombre' => $suscriptor -> nombre,
                    'apellidos' => $suscriptor -> apellidos,
                    'telefono' => $suscriptor -> telefono,
                    'metodoPago' => $suscriptor -> metodoPago,
                    'fechaAlta' => $suscriptor -> fechaAlta,
                ];
                array_push($resultado,$t);
            }
            return $resultado;            
        }
    }