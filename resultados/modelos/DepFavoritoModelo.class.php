<?php 

    require "../utils/autoload.php";

    class DepFavoritoModelo extends Modelo{
        public $idSuscriptor;
        public $idDeporte;


        public function __construct($idSuscriptor=""){
            parent::__construct();
            if($idSuscriptor != ""){
                $this -> idSuscriptor = $idSuscriptor;
                $this -> obtener();
            }
        }

        public function Guardar(){
            if($this -> idSuscriptor == NULL) $this -> insertar();
            else $this -> actualizar();
        }   


        private function insertar(){
            
            $sql = "INSERT INTO deporteFavorito (idSuscriptor, idDeporte) 
            VALUES ('" . $this -> idSuscriptor . "',
                    '" . $this -> idDeporte . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE deporteFavorito SET
            idSuscriptor = '" . $this -> idSuscriptor . "',
            idDeporte = '" . $this -> idDeporte . "'
            WHERE idSuscriptor = " . $this -> idSuscriptor . ";";
            $this -> conexion -> query($sql);   
        }

        public function Alta(){
            
            $sql = "INSERT INTO deporteFavorito (idSuscriptor, idDeporte) 
            VALUES ('" . $this -> idSuscriptor . "',
                    '" . $this -> idDeporte . "');";
            
            $this -> conexion -> query($sql);
        }

        public function obtener(){
            $sql = "SELECT * FROM  deporteFavorito WHERE idSuscriptor = " . $this -> idSuscriptor . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idSuscriptor = $fila['idSuscriptor'];
            $this -> idDeporte = $fila['idDeporte'];
        }


        public function Eliminar(){
            $sql = "DELETE FROM deporteFavorito 
                WHERE idSuscriptor = " . $this ->idSuscriptor . ";";
            $this -> conexion -> query($sql);
        }


        public function ObtenerTodos(){
            $sql = "select * from deporteFavorito;";
 
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            $resultado = array();
            foreach($filas as $fila){
                $a = new DeporteModelo();
                $a -> idSuscriptor = $fila['idSuscriptor'];
                $a -> idDeporte = $fila['idDeporte'];
                 
                array_push($resultado,$a);
            }
            return $resultado;
        }      
    }