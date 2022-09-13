<?php 
    require "../utils/autoload.php";

    class SuscriptorControlador {
        public static function Alta($context){
            $u = new UsuarioSuscriptorModelo();
            $u -> nombreUsuario = $context['post']['nombreUsuario'];
            $u -> email = $context['post']['email'];
            $u -> password = $context['post']['password'];
            $u -> idSuscriptor = $context['post']['idSuscriptor'];
            $u -> documento = $context['post']['documento'];
            $u -> nombre = $context['post']['nombre'];
            $u -> apellidos = $context['post']['apellidos'];
            $u -> telefono = $context['post']['telefono'];
            $u -> metodoPago = $context['post']['metodoPago'];
            $u -> fechaAlta = $context['post']['fechaAlta'];

            $u -> Guardar();

            $respuesta = [
                "Resultado" => "true",
                "Mensaje" => "Usuario creado"
            ];
            echo json_encode($respuesta);
            return;
        }

        public static function Listar($context){
            $u = new UsuarioSuscriptorModelo();
            $suscriptores = $u -> ObtenerTodos();
            $resultado = [];
            foreach($suscriptores as $suscriptor){
                $t = [
                    'idUsuario' => $suscriptor -> idUsuario,
                    'nombreUsuario' => $suscriptor -> nombreUsuario,
                    'email' => $suscriptor -> email,
                    'password' => $suscriptor -> password,
                    'idSuscriptor' => $suscriptor -> idSuscriptor,
                    'documento' => $suscriptor -> documento,
                    'nombre' => $suscriptor -> nombre,
                    'apellidos' => $suscriptor -> apellidos,
                    'telefono' => $suscriptor -> telefono,
                    'metodoPago' => $suscriptor -> metodoPago,
                    'fechaAlta' => $suscriptor -> fechaAlta,

                ];
                
                array_push($resultado,$t);
            }
            echo json_encode($resultado);
            return;
        }
    }

