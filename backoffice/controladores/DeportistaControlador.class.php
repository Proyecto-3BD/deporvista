<?php 
    require "../utils/autoload.php";

class DeportistaControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombre'])){
                $u = new DeportistaModelo();
                $u -> idDeportista = $context['post']['idDeportista'];
                $u -> nombre = $context['post']['nombre'];
                $u -> apellidos = $context['post']['apellidos'];
                $u -> pais = $context['post']['pais'];
                $u -> Guardar();
                render('gestionDeportista', ["ingresado" => true]);
            }else
                render('gestionDeportista', ["error" => true]);
            
        
        }

        public static function Eliminar($context){
            $u = new DeportistaModelo($context['post']['idDeportista']);
            $u -> Eliminar();
            render("gestionDeportista" , ["eliminado" => true]);
        }        

        public static function Modificar($context){

            $u = new DeportistaModelo($context['post']['idDeportista']);
            $u -> idDeportista = $context['post']['idDeportista'];
            $u -> nombre = $context['post']['nombre'];
            $u -> apellidos = $context['post']['apellidos'];
            $u -> pais = $context['post']['pais'];
            if(!empty($context['post']['idDeportista'])){
                $u -> Guardar();
                render("gestionDeportista", ['modificado' => true]);
            }else
                render("gestionDeportista", ['errorModificado' => true]);
        }


        public static function Listar(){
            $a = new DeportistaModelo();
            $deportistas = $a -> ObtenerTodos();

            $resultado = [];
            foreach($deportistas as $deportista){
                $t = [
                    'idDeportista' => $deportista -> idDeportista,
                    'nombreAdmin' => $deportista -> nombre,
                    'apellidos' => $deportista -> apellidos,
                    'pais' => $deportista -> pais
                ];   
                array_push($resultado,$t);
            }
            return $resultado;          
        }
    }