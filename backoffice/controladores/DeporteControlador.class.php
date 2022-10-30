<?php

	header("Access-Control-Allow-Origin: *");

	require "../utils/autoload.php";

    class DeporteControlador{
        public static function Alta($context){
            if(!empty($context['post']['idDeporte'])){
                $u = new DeporteModelo();
                $u -> idDeporte = $context['post']['idDeporte'];
                $u -> nombreDeporte = $context['post']['nombreDeporte'];
                $u -> tipoDeporte = $context['post']['tipoDeporte'];
                $u -> Guardar();
                render("gestionDeporte", ["ingresado" => true]);
            }else
                render("gestionDeporte", ["error" => true]);
        }

        public static function Eliminar($context){
            $u = new DeporteModelo($context['post']['idDeporte']);
            $u -> Eliminar();
            render("gestionBanners", ["borrado" => true]);
        }        

        public static function Modificar($context){

            $u = new DeporteModelo($context['post']['idDeporte']);
            $u -> idDeporte = $context['post']['idDeporte'];
            $u -> nombreDeporte = $context['post']['nombreDeporte'];
            $u -> tipoDeporte = $context['post']['tipoDeporte'];
            if(!empty($context['post']['idDeporte'])){
                $u -> Guardar();
                render("gestionDeporte", ["modificado" => true]);
            }else
                render("gestionDeporte", ["errorModificado" => true]);
        }


        public static function Listar(){
            $a = new DeporteModelo();
            $deportes = $a -> ObtenerTodos();

            $resultado = [];
            foreach($deportes as $deporte){
                $t = [
                    'idDeporte' => $deporte -> idDeporte,
                    'nombreDeporte' => $deporte -> nombreDeporte,
                    'tipoDeporte' => $deporte -> tipoDeporte,
                ];   
                array_push($resultado,$t);
            }
            echo json_encode($resultado);          
        }
    }