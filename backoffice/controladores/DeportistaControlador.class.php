<?php
	require "../utils/autoload.php";

    class DeportistaControlador{
        public static function Alta($context){
            if(!empty($context['post']['idDeportista'])){
                $u = new DeportistaModelo();
                $u -> idDeportista = $context['post']['idDeportista'];
                $u -> nombreDeportista = $context['post']['nombreDeportista'];
                $u -> apellidos = $context['post']['apellidos'];
                $u -> paisDeportista = $context['post']['paisDeportista'];
                $u -> Guardar();
                render("gestionDeportista", ["ingresado" => true]);
            }else
                render("gestionDeportista", ["error" => true]);
        }

        public static function Eliminar($context){
            $u = new DeportistaModelo($context['post']['idDeportista']);
            $u -> Eliminar();
            render("gestionDeportista", ["borrado" => true]);
        }

        public static function Modificar($context){

            $u = new DeportistaModelo($context['post']['idCompeticion']);
            $u -> idCompeticion = $context['post']['idCompeticion'];
            $u -> nombreCompeticion = $context['post']['nombreCompeticion'];
            $u -> paisCompeticion = $context['post']['paisCompeticion'];
            $u -> anio = $context['post']['anio'];
            if(!empty($context['post']['idCompeticion'])){
                $u -> Guardar();
                render("gestionDeportista", ["modificado" => true]);
            }else
                render("gestionDeportista", ["errorModificado" => true]);
        }


        public static function Listar(){
            $a = new DeportistaModelo();
            $deportistas = $a -> ObtenerTodos();

            $resultado = [];
            foreach($deportistas as $deportista){
                $t = [
                    'idDeportista' => $deportista -> idDeportista,
                    'nombreDeportista' => $deportista -> nombreDeportista,
                    'apellidos' => $deportista -> apellidos,
                    'paisDeportista' => $deportista -> paisDeportista
                ];   
                array_push($resultado,$t);
            }
            echo json_encode($resultado);          
        }
    }
	