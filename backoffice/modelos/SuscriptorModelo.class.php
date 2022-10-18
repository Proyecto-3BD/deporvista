<?php 

    require "../utils/autoload.php";

    class SuscriptorModelo extends Modelo{
        public $idSuscriptor;
        public $nombreSuscriptor;
        public $email;
        public $password;
        public $documento;
        public $nombre;
        public $apellidos;
        public $telefono;
        public $metodoPago;
        public $fechaAlta;
        

        public function __construct($idSuscriptor=""){
            parent::__construct();
            if($idSuscriptor != ""){
                $this -> idSuscriptor = $idSuscriptor;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> idSuscriptor == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO suscriptores (nombreSuscriptor, email, password, documento, nombre, apellidos, telefono, metodoPago, fechaAlta) 
            VALUES ('" . $this -> nombreSuscriptor . "',
                    '" . $this -> email . "',
                    '" . $this -> hashearPassword($this -> password) . "',
                    '" . $this -> documento . "',
                    '" . $this -> nombre . "',
                    '" . $this -> apellidos . "',
                    '" . $this -> telefono . "',
                    '" . $this -> metodoPago . "',
                    '" . $this -> fechaAlta . "');";
            $this -> conexion -> query($sql);
        }

        private function hashearPassword($password){
            return password_hash($password,PASSWORD_DEFAULT);
        }

        private function actualizar(){
<<<<<<< HEAD:backoffice/modelos/UsuarioSuscriptorModelo.class.php
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE usuarios SET
            nombreUsuario = '" . $this -> nombreUsuario . "',
            email = '" . $this -> email . "'
            password = '" . $this -> hashearPassword($this -> password) . "'
            WHERE idUsuario = " . $this -> idUsuario . ";";
            $this -> conexion -> query($sql);

=======
>>>>>>> modelos:backoffice/modelos/SuscriptorModelo.class.php
            $sql = "UPDATE suscriptores SET
            nombreSuscriptor = '" . $this -> nombreSuscriptor . "',
            email = '" . $this -> email . "',
            password = '" . $this -> hashearPassword($this -> password) . "',
            documento = '" . $this -> documento . "',
            nombre = '" . $this -> nombre . "',
            apellidos = '" . $this -> apellidos . "',
            telefono = '" . $this -> telefono . "',
            metodoPago = '" . $this -> metodoPago . "',
            fechaAlta = '" . $this ->  fechaAlta . "'
            WHERE idSuscriptor = " . $this -> idSuscriptor . ";";
            $this -> conexion -> query($sql);   
        }

        public function Obtener(){
            $sql = "SELECT * FROM suscriptores WHERE
                idSuscriptor = " . $this ->idSuscriptor . ";";

            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idSuscriptor = $fila['idSuscriptor'];
            $this -> nombreSuscriptor = $fila['nombreSuscriptor'];
            $this -> email = $fila['email'];
            $this -> documento = $fila['documento'];
            $this -> nombre = $fila['nombre'];
            $this -> apellidos = $fila['apellidos'];
            $this -> telefono = $fila['telefono'];
            $this -> metodoPago = $fila['metodoPago'];
            $this -> fechaAlta = $fila['fechaAlta'];
        }


        public function Eliminar(){
            $sql = "DELETE FROM suscriptores 
                WHERE idSuscriptor = " . $this ->idSuscriptor . ";";
            $this -> conexion -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "select * from suscriptores";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            $resultado = array();
            foreach($filas as $fila){
                $p = new SuscriptorModelo();
                $p -> idSuscriptor  = $fila['idSuscriptor'];
                $p -> nombreSuscriptor = $fila['nombreSuscriptor'];
                $p -> email = $fila['email'];
                $p -> password = $fila['password'];
                $p -> documento = $fila['documento'];
                $p -> nombre = $fila['nombre'];
                $p -> apellidos = $fila['apellidos'];
                $p -> telefono = $fila['telefono'];
                $p -> metodoPago = $fila['metodoPago'];
                $p -> fechaAlta = $fila['fechaAlta'];
                array_push($resultado,$p);
            }
            return $resultado;
        }

        public function Autenticar(){
            $sql = "SELECT * FROM suscriptores WHERE nombreSuscriptor = '" . $this -> nombreSuscriptor . "';";
            $resultado = $this -> conexion -> query($sql);
            if($resultado -> num_rows == 0) {
                return false;
            }

            $fila = $resultado -> fetch_all(MYSQLI_ASSOC)[0];
            return $this -> compararPasswords($fila['password']);
        }

        private function compararPasswords($passwordHasheado){
            return password_verify($this -> Password, $passwordHasheado);
        }

    }