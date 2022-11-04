<?php
	require "../utils/autoload.php";

    class EquipoControlador{
        public static function Alta($context){
            if(!empty($context['post']['idEquipo'])){
                $u = new EquipoModelo();
                $u -> idEquipo = $context['post']['idEquipo'];
                $u -> nombreEquipo = $context['post']['nombreEquipo'];
                $u -> paisEquipo = $context['post']['paisEquipo'];
                $u -> dt = $context['post']['dt'];
                $u -> Guardar();
                render("gestionEquipo", ["ingresado" => true]);
            }else
                render("gestionEquipo", ["error" => true]);
        }

        public static function Eliminar($context){
            $u = new EquipoModelo($context['post']['idEquipo']);
            $u -> Eliminar();
            render("gestionEquipo", ["borrado" => true]);
        }        

        public static function Modificar($context){

            $u = new EquipoModelo($context['post']['idEquipo']);
            $u -> idEquipo = $context['post']['idEquipo'];
            $u -> nombreEquipo = $context['post']['nombreEquipo'];
            $u -> paisEquipo = $context['post']['paisEquipo'];
            $u -> dt = $context['post']['dt'];
            if(!empty($context['post']['idEquipo'])){
                $u -> Guardar();
                render("gestionEquipo", ["modificado" => true]);
            }else
                render("gestionEquipo", ["errorModificado" => true]);
        }


        public static function Listar(){
            $a = new EquipoModelo();
            $eventos = $a -> ObtenerTodos();

            $resultado = [];
            foreach($equipos as $equipo){
                $t = [
                    'idEquipo' => $equipo -> idEquipo,
                    'nombreEquipo' => $equipo -> nombreEquipo,
                    'paisEquipo' => $equipo -> paisEquipo,
                    'dt' => $equipo -> dt
                ];   
                array_push($resultado,$t);
            }
            echo json_encode($resultado);          
        }
    }