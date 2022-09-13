<?php 
    require $_SERVER['DOCUMENT_ROOT'] ."/utils/autoload.php";

    class AnunciosControlador{
        public static function Alta($context){
            $p = new AnunciosModelo();
            $p -> tipo = $tipo;
            $p -> ubicacion = $ubicacion;
            $p -> Guardar();
        
        }

        public static function Eliminar($id){
            $a = new AnunciosModelo($idBanner);
            $a -> Eliminar();
        }

        public static function Modificar($context){
            $a = new AnunciosModelo($idBanner);
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
                    'tipo' => $anuncio -> tipo,
                    'ubicacion' => $anuncio -> ubicacion
                ];
                
                array_push($resultado,$t);
            }
            return $resultado;          
        }

    }