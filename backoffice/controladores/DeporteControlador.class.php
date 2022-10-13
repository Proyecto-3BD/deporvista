<?php 
    require "../utils/autoload.php";

class DeporteControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombreDeporte'])){
                $u = new DeportesModelo();
                $u -> idDeporte = $context['post']['idDeporte'];
                $u -> nombreDeporte = $context['post']['nombreDeporte'];
                $u -> tipoDeporte = $context['post']['tipoDeporte'];
                $u -> Guardar();
                render('gestionDeporte', ["ingresado" => true]);
            }else
                render('gestionDeporte', ["error" => true]);
            
        
        }

        public static function Eliminar($context){
            $u = new DeportesModelo($context['post']['idDeporte']);
            $u -> Eliminar();
            render("gestionDeporte" , ["eliminado" => true]);
        }        

        public static function Modificar($context){

            $u = new DeportesModelo($context['post']['idDeporte']);
            $u -> idDeporte = $context['post']['idDeporte'];
            $u -> nombreDeporte = $context['post']['nombreDeporte'];
            $u -> tipoDeporte = $context['post']['tipoDeporte'];
            if(!empty($context['post']['idDeporte'])){
                $u -> Guardar();
                render("gestionDeporte", ['modificado' => true]);
            }else
                render("gestionDeporte", ['errorModificado' => true]);
        }


        public static function Listar(){
            $a = new DeportesModelo();
            $deportes = $a -> ObtenerTodos();

            $resultado = [];
            foreach($deportes as $deporte){
                $t = [
                    'idDeporte' => $deporte -> idDeporte,
                    'nombreDeporte' => $deporte -> nombreDeporte,
                    'tipoDeporte' => $deporte -> tipoDeporte
                ];   
                array_push($resultado,$t);
            }
            return $resultado;          
        }
    }