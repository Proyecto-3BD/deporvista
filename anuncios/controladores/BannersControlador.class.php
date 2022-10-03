<?php 
    require "../utils/autoload.php";

    class BannersControlador{

        public static function Alta($context){            
            if(!empty($_FILES['file']['name'])){
                $src = "/anuncios/" . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $src); 
                $p = new BannersModelo();
                $p -> src = $src;
                $p -> publicado = $context['post']['publicado'];
                $p -> Guardar();
                render("gestionBanners", ["ingresado" => true]);
            }else
                render("gestionBanners", ["error" => true]);
            
        
        }

        public static function Eliminar($context){
            $p = new BannersModelo($context['post']['idBanner']);
            unlink($_SERVER['DOCUMENT_ROOT'] . $p -> src);
            $p -> Eliminar();
            render("gestionBanners", ["borrado" => true]);
        }

        public static function Modificar($context){
            $src = "/anuncios/" . $_FILES['file']['name'];
            $p = new BannersModelo($context['post']['idBanner']);
            $p -> publicado = $context['post']['publicado'];
            if($p -> idBanner !== NULL){
                $p -> Guardar();
                render("gestionBanners", ["modificado" => true]);
            }else
                render("gestionBanners", ["errorModificado" => true]);
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