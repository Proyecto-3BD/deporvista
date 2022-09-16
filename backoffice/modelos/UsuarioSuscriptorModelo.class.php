<?php 

    require "../utils/autoload.php";

    class UsuarioSuscriptorModelo extends Modelo{
        public $idUsuario;
        public $nombreUsuario;
        public $email;
        public $password;
        public $idSuscriptor;
        public $documento;
        public $nombre;
        public $apellidos;
        public $telefono;
        public $metodoPago;
        public $fechaAlta;
        

        public function __construct($idUsuario=""){
            parent::__construct();
            if($idUsuario != ""){
                $this -> idUsuario = $idUsuario;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> idUsuario == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql1 = "INSERT INTO usuarios (nombreUsuario, email, password) 
            VALUES ('" . $this -> nombreUsuario . "',
                    '" . $this -> email . "',
                    '" . $this -> hashearPassword($this -> password) . "');";
            $this -> conexion -> query($sql1);
            
            $sql2 = "INSERT INTO suscriptores (idSuscriptor, documento, nombre, apellidos, telefono, metodoPago, fechaAlta) 
                VALUES ((SELECT max(idUsuario) AS idSuscriptor FROM usuarios),
                        '" . $this -> documento . "',
                        '" . $this -> nombre . "',
                        '" . $this -> apellidos . "',
                        '" . $this -> telefono . "',
                        '" . $this -> metodoPago . "',
                        '" . $this -> fechaAlta . "');";
            $this -> conexion -> query($sql2);
        }

        private function hashearPassword($password){
            return password_hash($password,PASSWORD_DEFAULT);
        }

        private function actualizar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE usuarios SET
            nombreUsuario = '" . $this -> nombreUsuario . "',
            email = '" . $this -> email . "'
            password = '" . $this -> password . "'
            WHERE idUsuario = " . $this -> idUsuario . ";";
            $this -> conexion -> query($sql);

            $sql = "UPDATE suscriptores SET
            documento = '" . $this -> documento . "',
            nombre = '" . $this -> nombre . "',
            apellidos = '" . $this -> apellidos . "',
            telefono = '" . $this -> telefono . "',
            metodoPago = '" . $this -> metodoPago . "',
            WHERE idSuscriptor = " . $this -> idUsuario . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);   
        }

        public function Obtener(){
            $sql = "SELECT * FROM usuarios CROSS JOIN suscriptores WHERE usuarios.idUsuario = suscriptores.idSuscriptor AND usuarios.idUsuario = " . $this ->idUsuario . ";";

            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idUsuario = $fila['idUsuario'];
            $this -> nombreUsuario = $fila['nombreUsuario'];
            $this -> email = $fila['email'];
            $this -> idSuscriptor = $fila['idSuscriptor'];
            $this -> documento = $fila['documento'];
            $this -> nombre = $fila['nombre'];
            $this -> apellidos = $fila['apellidos'];
            $this -> telefono = $fila['telefono'];
            $this -> metodoPago = $fila['metodoPago'];
            $this -> fechaAlta = $fila['fechaAlta'];
        }


        public function Eliminar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM usuarios 
                WHERE id = " . $this ->idUsuario . ";";
            $this -> conexion -> query($sql);
        
            $sql = "DELETE FROM suscriptores
                WHERE id = " . $this ->idSuscriptor . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "select * from usuarios cross join suscriptores where usuarios.idUsuario=suscriptores.idSuscriptor;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            $resultado = array();
            foreach($filas as $fila){
                $p = new UsuarioSuscriptorModelo();
                $p -> idUsuario  = $fila['idUsuario'];
                $p -> nombreUsuario = $fila['nombreUsuario'];
                $p -> email = $fila['email'];
                $p -> password = $fila['password'];
                $p -> idSuscriptor = $fila['idSuscriptor'];
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
            $sql = "SELECT * FROM usuarios WHERE nombreUsuario = '" . $this -> nombreUsuario . "';";
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