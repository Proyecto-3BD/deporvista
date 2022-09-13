<?php 
    require "../utils/autoload.php";

    class SuscriptorControlador{
        public static function Alta($context){
            date_default_timezone_set("America/Montevideo");
            $u = new UsuarioSuscriptorModelo();
            $u -> idUsuario = $idUsuario;
            $u -> email = $email;
            $u -> password = $password;
            $u -> idSuscriptor = $idSuscriptor;
            $u -> documento = $documento;
            $u -> nombre = $nombre;
            $u -> apellidos = $apellidos;
            $u -> telefono = $telefono;
            $u -> metodoPago = $metodoPago;
            $u -> fechaAlta = date("Y-m-d");
            $u -> Guardar();
        
        }
        
        public static function Eliminar($context){
            $u = new UsuarioModelo($idUsuario);
            $u -> Eliminar();
        }        

        public static function Modificar($context){
            $u = new UsuarioSuscriptorModelo();
            $u -> idUsuario = $idUsuario; 
            $u -> nombreUsuario = $nombreUsuario;
            $u -> email = $email;
            $u -> password = $password;
            $u -> idSuscriptor = $idSuscriptor;
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
                    'idUsuario' => $usuario -> idUsuario,
                    'nombreUsuario' => $usuario -> nombreUsuario,
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