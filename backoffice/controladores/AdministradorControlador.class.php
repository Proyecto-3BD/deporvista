<?php 
    require "../utils/autoload.php";

    class AdministradorControlador{
        public static function Alta($context){
            if(!empty($context['post']['nombreAdmin'])){
                $u = new AdministradorModelo();
                $u -> idAdmin = $context['post']['idAdmin'];
                $u -> nombreAdmin = $context['post']['nombreAdmin'];
                $u -> email = $context['post']['email'];
                $u -> password = $context['post']['password'];
                $u -> Guardar();
                render('gestionAdministrador', ["ingresado" => true]);
            }else
                render('gestionAdministrador', ["error" => true]);
            
        
        }

        public static function Eliminar($context){
            $u = new AdministradorModelo($context['post']['idAdmin']);
            $u -> Eliminar();
            render("gestionAdministrador" , ["eliminado" => true]);
        }        

        public static function Modificar($context){

            $u = new AdministradorModelo($context['post']['idAdmin']);
            $u -> idAdmin = $context['post']['idAdmin'];
            $u -> nombreAdmin = $context['post']['nombreAdmin'];
            $u -> email = $context['post']['email'];
            $u -> password = $context['post']['password'];
            if(!empty($context['post']['idAdmin'])){
                $u -> Guardar();
                render("gestionAdministrador", ['modificado' => true]);
            }else
                render("gestionAdministrador", ['errorModificado' => true]);
        }


        public static function Listar(){
            $a = new AdministradorModelo();
            $administradores = $a -> ObtenerTodos();

            $resultado = [];
            foreach($administradores as $administrador){
                $t = [
                    'idAdmin' => $administrador -> idAdmin,
                    'nombreAdmin' => $administrador -> nombreAdmin,
                    'email' => $administrador -> email
                ];   
                array_push($resultado,$t);
            }
            return $resultado;          
        }
    }