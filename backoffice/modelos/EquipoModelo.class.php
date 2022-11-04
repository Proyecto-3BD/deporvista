<?php 

    require "../utils/autoload.php";

    class EquipoModelo extends Modelo {

        public $idEquipo;
        public $nombreEquipo;
        public $paisEquipo;
        public $dt;
        
        public function __construct($idEquipo=""){
            parent::__construct();
            if($idEquipo != ""){
                $this -> idEquipo = $idEquipo;
                $this -> obtener();
            }
        }

        public function guardar(){
            if($this -> idEquipo == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO equipos (nombreEquipo, paisEquipo, dt) 
            VALUES ('" . $this -> nombreEquipo . "',
                    '" . $this -> paisEquipo . "',
                    '" . $this -> dt . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE equipos SET
            nombreEquipo = '" . $this -> nombreEquipo . "',
            paisEquipo = '" . $this -> paisEquipo . "',
            dt = '" . $this -> dt . "',
            WHERE idEquipo = " . $this -> idEquipo . ";";
            $this -> conexion -> query($sql);   
        }

        public function obtener(){
            $sql = "SELECT * FROM  equipos WHERE idEquipo = " . $this -> idEquipo . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idEquipo = $fila['idEquipo'];
            $this -> nombreEquipo = $fila['nombreEquipo'];
            $this -> paisEquipo = $fila['paisEquipo'];
            $this -> dt = $fila['dt'];
        }

        public function eliminar(){
            $sql = "DELETE FROM equipos 
                WHERE idEquipo = " . $this -> idEquipo . ";";
            $this -> conexion -> query($sql);

        }

        public function obtenerTodos(){
            $sql = "select * from equipos;";
 
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            $resultado = array();
            foreach($filas as $fila){
                $a = new EquiposModelo();
                $a -> idEquipo = $fila['idEquipo'];
                $a -> nombreEquipo = $fila['nombreEquipo'];
                $a -> pais = $fila['pais'];
                $a -> dt = $fila['dt'];
                 
                array_push($resultado,$a);
             }
             return $resultado;
         }

    }