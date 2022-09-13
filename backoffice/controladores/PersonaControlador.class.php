<?php 
    require $_SERVER['DOCUMENT_ROOT'] ."/utils/autoload.php";

    class PersonaControlador{
        public static function Alta($nombre,$apellido,$telefono){
            $p = new PersonaModelo();
            $p -> nombre = $nombre;
            $p -> apellido = $apellido;
            $p -> telefono = $telefono;
            $p -> Guardar();
        
        }

        public static function Eliminar($id){
            $p = new PersonaModelo($id);
            $p -> Eliminar();
        }

        public static function Modificar($id,$nombre,$apellido,$telefono){
            $p = new PersonaModelo($id);
            $p -> nombre = $nombre;
            $p -> apellido = $apellido;
            $p -> telefono = $telefono;
            $p -> Guardar();
        }

        public static function Listar(){
            $p = new PersonaModelo();
            $personitas = $p -> ObtenerTodos();

            $resultado = [];
            foreach($personitas as $persona){
                $t = [
                    'id' => $persona -> id,
                    'nombre' => $persona -> nombre,
                    'apellido' => $persona -> apellido,
                    'telefono' => $persona -> telefono,
                ];
                
                array_push($resultado,$t);
            }
            return $resultado;            
        }
    }