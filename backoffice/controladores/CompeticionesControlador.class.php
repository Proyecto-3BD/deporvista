<?php 
    require "../utils/autoload.php";

class CompeticionesControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombre'])){
                $u = new CompeticionModelo();
                $u -> idCompeticion = $context['post']['idCompeticion'];
                $u -> nombre = $context['post']['nombre'];
                $u -> pais = $context['post']['pais'];
                $u -> anio = $context['post']['anio'];
                $u -> Guardar();
                render('gestionCompeticiones', ["ingresado" => true]);
            }else
                render('gestionCompeticiones', ["error" => true]);
            
        }

        public static function Eliminar($context){
            $u = new CompeticionModelo($context['post']['idCompeticion']);
            $u -> Eliminar();
            render("gestionCompeticiones" , ["eliminado" => true]);
        }        

        public static function Modificar($context){

            $u = new CompeticionModelo($context['post']['idCompeticion']);
            $u -> idCompeticion = $context['post']['idCompeticion'];
            $u -> nombre = $context['post']['nombre'];
            $u -> pais = $context['post']['pais'];
            $u -> anio = $context['post']['anio'];
            if(!empty($context['post']['idEvento'])){
                $u -> Guardar();
                render("gestionCompeticiones", ['modificado' => true]);
            }else
                render("gestionCompeticiones", ['errorModificado' => true]);
        }


        public static function Listar(){
            $a = new CompeticionModelo();
            $competiciones = $a -> ObtenerTodos();

            $resultado = [];
            foreach($competiciones as $competicion){
                $t = [
                    'idCompeticion' => $competicion -> idCompeticion,
                    'nombre' => $competicion -> nombre,
                    'pais' => $competicion -> pais,
                    'anio' => $competicion -> anio
                ];   
                array_push($resultado,$t);
            }
            return $resultado;          
        }
    }