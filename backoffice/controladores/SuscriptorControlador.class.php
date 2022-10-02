<?php 
    require "../utils/autoload.php";

    class SuscriptorControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombreSuscriptor'])){
                date_default_timezone_set("America/Montevideo");
                $u = new SuscriptorModelo();
                $u -> idSuscriptor = $idSuscriptor;
                $u -> nombreSuscriptor = $nombreSuscriptor;
                $u -> email = $email;
                $u -> password = $password;
                $u -> documento = $documento;
                $u -> nombre = $nombre;
                $u -> apellidos = $apellidos;
                $u -> telefono = $telefono;
                $u -> metodoPago = $metodoPago;
                $u -> fechaAlta = date("Y-m-d");
                $u -> Guardar();
                render('gestionSuscriptor', ["ingresado" => true]);
            }else
                render('gestionSuscriptor', ["error" => true]);
        }
        
        public static function Eliminar($context){
            $u = new SuscriptorModelo($idSuscriptor);
            $u -> Eliminar();
            render("gestionAdministrador" , ["eliminado" => true]);
        }        

        public static function Modificar($context){
            $u = new SuscriptorModelo($context["post"]["idSuscriptor"]);
            $u -> idSuscriptor = $idSuscriptor; 
            $u -> nombreSuscriptor = $nombreSuscriptor;
            $u -> email = $email;
            $u -> password = $password;
            $u -> documento = $documento;
            $u -> nombre = $nombre;
            $u -> apellidos = $apellidos;
            $u -> telefono = $telefono;
            $u -> metodoPago = $metodoPago;
            if(!empty($context["post"]["idSuscriptor"])){
                $u -> Guardar();
                render("gestionAdministrador", ['modificado' => true]);
            }else
                render("gestionAdministrador", ['errorModificado' => true]);          
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