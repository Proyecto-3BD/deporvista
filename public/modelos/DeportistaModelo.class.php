<?php 

    require "../utils/autoload.php";

    class DeportistaModelo extends Modelo{
        public $idDeportista;
        public $nombre ;
        public $apellido ;
        public $pais ;


        public function __construct($idDeportista=""){
            parent::__construct();
            if($idDeportista != ""){
                $this -> idDeportista = $idDeportista;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> idDeportista == NULL) $this -> insertar();
            else $this -> actualizar();
        }   


        private function insertar(){
            
            $sql1 = "INSERT INTO deportistas (nombre, apellidos, pais) 
            VALUES ('" . $this -> nombre . "',
                    '" . $this -> apellidos . "',
                    '" . $this -> pais . "');";
            $this -> conexion -> query($sql1);
        }

        private function actualizar(){
            $sql = "UPDATE deportistas SET
            nombre = '" . $this -> nombre . "',
            apellidos = '" . $this -> apellidos . "',
            pais = '" . $this -> pais . "'
            WHERE idDeportista = " . $this -> idDeportista . ";";
            $this -> conexion -> query($sql);   
        }


        public function Obtener(){
            $sql = "SELECT * FROM  deportistas WHERE idDeportista = " . $this -> idDeportista . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idAdmin = $fila['idDeportista'];
            $this -> nombre = $fila['nombre'];
            $this -> apellidos = $fila['apellidos'];
            $this -> pais = $fila['pais'];
        }


        public function Eliminar(){
            $sql = "DELETE FROM deportistas 
                WHERE idDeportista = " . $this ->idDeportista . ";";
            $this -> conexion -> query($sql);
        }


        public function ObtenerTodos(){
            $sql = "select * from deportistas;";
 
             $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
             $resultado = array();
             foreach($filas as $fila){
                 $a = new DeportistaModelo();
                 $a -> idDeportista = $fila['idDeportista'];
                 $a -> nombre = $fila['nombre'];
                 $a -> apellidos = $fila['apellidos'];
                 $a -> pais = $fila['pais'];
                 
                 array_push($resultado,$a);
             }
             return $resultado;
         }

    }