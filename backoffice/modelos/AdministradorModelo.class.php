<?php 

    require "../utils/autoload.php";

    class AdministradorModelo extends Modelo{
        public $idUsuario;
        public $nombreUsuario;
        public $email;
        public $password;
        public $idAdmin;
        
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
            $sql2 = "INSERT INTO administradores (idAdmin) 
                VALUES ((SELECT max(idUsuario) AS idAdmin FROM usuarios));";
            $this -> conexion -> query($sql2);
        }

        private function hashearPassword($password){
            return password_hash($password,PASSWORD_DEFAULT);
        }

        private function actualizar(){
            $sql = "UPDATE usuarios SET
            nombreUsuario = '" . $this -> nombreUsuario . "',
            email = '" . $this -> email . "',
            password = '" . $this -> password . "'
            WHERE idUsuario = " . $this -> idUsuario . ";";
            $this -> conexion -> query($sql);   
        }

        public function Obtener(){
            $sql = "SELECT * FROM usuarios CROSS JOIN administradores WHERE usuarios.idUsuario = administradores.idAdmin AND usuarios.idUsuario = " . $this ->idUsuario . ";";

            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idUsuario = $fila['idUsuario'];
            $this -> nombreUsuario = $fila['nombreUsuario'];
            $this -> email = $fila['email'];
            $this -> password = $fila['password'];
            $this -> idAdmin = $fila['idAdmin'];
        }


        public function Eliminar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM usuarios 
                WHERE id = " . $this ->idUsuario . ";";
            $this -> conexion -> query($sql);
        
            $sql = "DELETE FROM administradores
                WHERE id = " . $this ->idUsuario . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);
        }

        public function ObtenerTodos(){
           $sql = "select * from usuarios cross join administradores where usuarios.idUsuario=administradores.idAdmin;";

            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            $resultado = array();
            foreach($filas as $fila){
                $a = new AdministradorModelo();
                $a -> idUsuario  = $fila['idUsuario'];
                $a -> nombreUsuario = $fila['nombreUsuario'];
                $a -> email = $fila['email'];
                $a -> password = $fila['password'];
                $a -> idAdmin = $fila['idAdmin'];
                array_push($resultado,$a);
            }
            return $resultado;
        }

        public function Autenticar(){
            $sql = "SELECT * FROM usuarios CROSS JOIN administradores WHERE usuarios.idUsuario = administradores.idAdmin AND usuarios.nombreUsuario= '" . $this -> nombreUsuario . "';";
            $resultado = $this -> conexion -> query($sql);
            if($resultado -> num_rows == 0) {
                return false;
            }

            $fila = $resultado -> fetch_all(MYSQLI_ASSOC)[0];
            return $this -> compararPasswords($fila['password']);
        }

        private function compararPasswords($passwordHasheado){
            return password_verify($this -> password, $passwordHasheado);
        }

    }