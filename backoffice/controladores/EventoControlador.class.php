<?php 
    require "../utils/autoload.php";

    class EventoControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombre'])){
                $u = new EventoModelo();
                $u -> idEvento = $context['post']['idEvento'];
                $u -> fechaHora = $context['post']['fechaHora'];
                $u -> resultado = $context['post']['resultado'];
                $u -> resultado = $context['post']['idDeporte'];
                $u -> infracciones = $context['post']['infracciones'];
                $u -> ubicacion = $context['post']['ubicacion'];
                $u -> Guardar();
                render("gestionEventos", ["ingresado" => true]);
            }else
                render("gestionEventos", ["error" => true]);
    	}

        public static function AltaEvento($context){
            if(!empty($context['post']['fechaHora'])){
                $e = new EventoModelo();
                $e -> fechaHora = $context['post']['fechaHora'];
                $e -> resultado = $context['post']['resultado'];
                $e -> idDeporte = $context['post']['idDeporte'];
                $e -> infracciones = $context['post']['infracciones'];
                $e -> ubicacion = $context['post']['ubicacion'];

                $e -> idLocatario = $context['post']['idLocatario'];
                $e -> idVisitante = $context['post']['idVisitante'];
                $e -> idCompeticion = $context['post']['idCompeticion'];
                $e -> Guardar();
                
                render("gestionEventos", ["ingresado" => true]);
            }else
                render("gestionEventos", ["error" => true]);
        }

        public static function Eliminar($context){
            $u = new EventoModelo($context['post']['idEvento']);
            $u -> Eliminar();
            render("gestionEventos", ["borrado" => true]);
        }        

        public static function Modificar($context){

            $u = new EventoModelo($context['post']['idEvento']);
            $u -> idEvento = $context['post']['idEvento'];
            $u -> fechaHora = $context['post']['fechaHora'];
            $u -> resultado = $context['post']['resultado'];
            $u -> infracciones = $context['post']['infracciones'];
            $u -> ubicacion = $context['post']['ubicacion'];
            if(!empty($context['post']['idCompeticion'])){
                $u -> guardar();
                render("gestionEvento", ["modificado" => true]);
            }else
                render("gestionEvento", ["errorModificado" => true]);
        }


        public static function Listar(){
            $a = new EventoModelo();
            $eventos = $a -> ObtenerTodos();

            $resultado = [];
            foreach($eventos as $evento){
                $t = [
                    'idEvento' => $evento -> idEvento,
                    'fechaHora' => $evento -> fechaHora,
                    'resultado' => $evento -> resultado,
                    'infracciones' => $evento -> infracciones,
                    'ubicacion' => $evento -> ubicacion
                ];   
                array_push($resultado,$t);
            }
            return $resultado;          
        }


    }