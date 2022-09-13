<?php 
    require $_SERVER['DOCUMENT_ROOT'] ."/utils/autoload.php";

    class AnunciosControlador{
        public static function Alta($tipo,$ubicacion){
            $p = new AnunciosModelo();
            $p -> tipo = $tipo;
            $p -> ubicacion = $ubicacion;
            $p -> Guardar();
        
        }

        public static function Eliminar($id){
            $a = new AnunciosModelo($id);
            $a -> Eliminar();
        }

        public static function Modificar($id,$estado, $tipo,$ubicacion){
            $a = new AnunciosModelo($id);
            $a -> estado = $estado;
            $a -> tipo = $tipo;
            $a -> ubicacion = $ubicacion;
            $a -> Guardar();
        }

        public static function Listar(){
            $a = new AnunciosModelo();
            $anuncios = $a -> ObtenerTodos();

            $resultado = [];
            foreach($anuncios as $anuncio){
                $t = [
                    'id' => $anuncio -> id,
                    'estado' => $anuncio -> estado,
                    'tipo' => $anuncio -> tipo,
                    'ubicacion' => $anuncio -> ubicacion
                ];
                
                array_push($resultado,$t);
            }
            return $resultado;          
        }

    }