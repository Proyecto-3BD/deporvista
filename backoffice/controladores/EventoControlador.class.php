<?php 
    require "../utils/autoload.php";

    class EventoControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombre'])){
                $u = new EventoModelo();
                $u -> idEvento = $context['post']['idEvento'];
                $u -> fechaHora = $context['post']['fechaHora'];
                $u -> resultado = $context['post']['resultado'];
                $u -> infracciones = $context['post']['infracciones'];
                $u -> ubicacion = $context['post']['ubicacion'];
                $u -> Guardar();
                render("gestionEvento", ["ingresado" => true]);
            }else
                render("gestionEvento", ["error" => true]);
    	}


        public static function Eliminar($context){
            $u = new EventoModelo($context['post']['idEvento']);
            $u -> Eliminar();
            render("gestionEvento", ["borrado" => true]);
        }        

        public static function Modificar($context){

            $u = new EventoModelo($context['post']['idEvento']);
            $u -> idEvento = $context['post']['idEvento'];
            $u -> fechaHora = $context['post']['fechaHora'];
            $u -> resultado = $context['post']['resultado'];
            $u -> infracciones = $context['post']['infracciones'];
            $u -> ubicacion = $context['post']['ubicacion'];
            if(!empty($context['post']['idCompeticion'])){
                $u -> Guardar();
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