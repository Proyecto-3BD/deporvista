<?php 

    require "../utils/autoload.php";

    class DeporteModelo extends Modelo{
        public $idDeporte;
        public $nombreDeporte ;
        public $tipoDeporte;


        public function __construct($idDeporte=""){
            parent::__construct();
            if($idDeporte != ""){
                $this -> idDeporte = $idDeporte;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> idDeporte == NULL) $this -> insertar();
            else $this -> actualizar();
        }   


        private function insertar(){
            
            $sql1 = "INSERT INTO  (nombreDeporte, tipoDeporte) 
            VALUES ('" . $this -> nombreDeporte . "',
                    '" . $this -> tipoDeporte . "');";
            $this -> conexion -> query($sql1);
        }

        private function actualizar(){
            $sql = "UPDATE deportes SET
            nombreDeporte = '" . $this -> nombreDeporte . "',
            tipoDeporte = '" . $this -> tipoDeporte . "'
            WHERE idDeporte = " . $this -> idDeporte . ";";
            $this -> conexion -> query($sql);   
        }


        public function Obtener(){
            $sql = "SELECT * FROM  deportes WHERE idDeporte = " . $this -> idDeporte . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idDeporte = $fila['idDeporte'];
            $this -> nombreDeporte = $fila['nombreDeporte'];
            $this -> tipoDeporte = $fila['tipoDeporte'];
        }


        public function Eliminar(){
            $sql = "DELETE FROM deportes 
                WHERE idDeporte = " . $this ->idDeporte . ";";
            $this -> conexion -> query($sql);
        }


        public function ObtenerTodos(){
            $sql = "select * from deportes;";
 
             $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
             $resultado = array();
             foreach($filas as $fila){
                 $a = new DeportesModelo();
                 $a -> idDeporte = $fila['idDeporte'];
                 $a -> nombreDeporte = $fila['nombreDeporte'];
                 $a -> tipoDeporte = $fila['tipoDeporte'];
                 
                 array_push($resultado,$a);
             }
             return $resultado;
         }

    }