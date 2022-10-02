<?php 
    require "../utils/autoload.php";

    class SuscriptorControlador{
        public static function Alta($context){
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
        
        }
        
        public static function Eliminar($context){
            $u = new UsuarioModelo($idSuscriptor);
            $u -> Eliminar();
        }        

        public static function Modificar($context){
            $u = new UsuarioSuscriptorModelo();
            $u -> idSuscriptor = $idSuscriptor; 
            $u -> nombreSuscriptor = $nombreSuscriptor;
            $u -> email = $email;
            $u -> password = $password;
            $u -> documento = $documento;
            $u -> nombre = $nombre;
            $u -> apellidos = $apellidos;
            $u -> telefono = $telefono;
            $u -> metodoPago = $metodoPago;
            $u -> Guardar();
        }

        public static function Listar(){
            $u = new UsuarioSuscriptorModelo();
            $usuarios = $u -> ObtenerTodos();
            $resultado = [];
            foreach($usuarios as $usuario){
                $t = [
                    'idSuscriptor' => $usuario -> idSuscriptor,
                    'nombreSuscriptor' => $usuario -> nombreSuscriptor,
                    'email' => $usuario -> email,
                    'documento' => $usuario -> documento,
                    'nombre' => $usuario -> nombre,
                    'apellidos' => $usuario -> apellidos,
                    'telefono' => $usuario -> telefono,
                    'metodoPago' => $usuario -> metodoPago,
                    'fechaAlta' => $usuario -> fechaAlta,
                ];
                array_push($resultado,$t);
            }
            return $resultado;            
        }
    }