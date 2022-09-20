<?php 
    require "../utils/autoload.php";

    class BannersControlador{
        public static function Alta($context){
            $publicado = true;
            $src = "/anuncios/" . $_FILES['file']['name'];
            $file = $_SERVER['DOCUMENT_ROOT'] . $src;
            move_uploaded_file($_FILES['file']['tmp-name'], $file); 
            $p = new BannersModelo();
            $p -> src = $src;
            $p -> publicado = $publicado;
            $p -> Guardar();
        
        }

        public static function Eliminar($context){
            $p = new BannersModelo();
            $p -> Eliminar();
        }

        public static function Modificar($context){
            $p = new BannersModelo();
            $p -> src = $src;
            $p -> publicado = $publicado;
            $p -> Guardar();
        }

        public static function Listar(){
            $p = new BannersModelo();
            $banners = $p -> ObtenerTodos();

            $resultado = [];
            foreach($banners as $anuncio){
                $t = [
                    'idBanner' => $anuncio -> idBanner,
                    'src' => $anuncio -> src,
                    'publicado' => $anuncio -> publicado
                ];
                
                array_push($resultado,$t);
            }
            return $resultado;          
        }

    }