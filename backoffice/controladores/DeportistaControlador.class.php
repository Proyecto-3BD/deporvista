<?php
	require "../utils/autoload.php";

    class DeportistaControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombreDeportista'])){
                $u = new DeportistaModelo();
                $u -> idDeportista = $context['post']['idDeportista'];
                $u -> nombreDeportista = $context['post']['nombreDeportista'];
                $u -> apellidos = $context['post']['apellidos'];
                $u -> paisDeportista = $context['post']['paisDeportista'];
                $u -> idEquipo = $context['post']['idEquipo'];
                $u -> rol = $context['post']['rol'];

                $u -> Guardar();
                render("gestionDeportistas", ["ingresado" => true]);
            }else
                render("gestionDeportistas", ["error" => true]);
        }

        public static function Eliminar($context){
            $u = new DeportistaModelo($context['post']['idDeportista']);
            $u -> Eliminar();
            render("gestionDeportistas", ["borrado" => true]);
        }

        public static function Modificar($context){

            $u = new DeportistaModelo($context['post']['idDeportista']);
            $u -> idDeportista = $context['post']['idCompeticion'];
            $u -> nombreDeportista = $context['post']['nombreDeportista'];
            $u -> apellidos = $context['post']['apellidos'];
            $u -> paisDeportista = $context['post']['paisDeportista'];
            $u -> rol = $context['post']['rol'];
            $u -> idEquipo = $context['post']['idEquipo'];
            $u -> nombreEquipo = $context['post']['nombreEquipo'];
            if(!empty($context['post']['idDeportista'])){
                $u -> Guardar();
                render("gestionDeportistas", ["modificado" => true]);
            }else
                render("gestionDeportistas", ["errorModificado" => true]);
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
            return $resultado;          
        }

        public static function ListarDepEquipo(){
            $a = new DeportistaModelo();
            $deportistas = $a -> listarDepEquipo();

            $resultado = [];
            foreach($deportistas as $deportista){
                $t = [
                    'idDeportista' => $deportista -> idDeportista,
                    'nombreDeportista' => $deportista -> nombreDeportista,
                    'apellidos' => $deportista -> apellidos,
                    'paisDeportista' => $deportista -> paisDeportista,
                    'rol' => $deportista -> rol,
                    'nombreEquipo' => $deportista -> nombreEquipo
                ];   
                array_push($resultado,$t);
            }
            return $resultado;          
        }
    }
	