<?php 

    require "../utils/autoload.php";

    class EquiposModelo extends Modelo {

        public $idEquipo;
        public $nombreEquipo;
        public $pais;
        public $dt;

        public function __construct($idEquipo=""){
            parent::__construct();
            if($idEquipo != ""){
                $this -> idEquipo = $idEquipo;
                $this -> obtenerEquipos();
            }
        }

        public function guardar(){
            if($this -> idEquipo == NULL) $this -> insertarEquipo();
            else $this -> actualizarEquipo();
        }

        private function insertarEquipo(){
            $sql = "INSERT INTO equipos (nombreEquipo, pais, dt) 
            VALUES ('" . $this -> nombreEquipo . "',
                    '" . $this -> pais . "',
                    '" . $this -> dt . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizarEquipo(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE equipos SET
            nombreEquipo = '" . $this -> nombreEquipo . "',
            pais = '" . $this -> pais . "',
            dt = '" . $this -> dt . "',
            WHERE idEquipo = " . $this -> idEquipo . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);   
        }

        public function obtenerEquipos(){
            $sql = "SELECT * FROM  equipos WHERE idEquipo = " . $this -> idEquipo . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idEquipo = $fila['idEquipo'];
            $this -> nombreEquipo = $fila['nombreEquipo'];
            $this -> pais = $fila['pais'];
            $this -> dt = $fila['dt'];
        }

        public function eliminarEquipo(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM equipos 
                WHERE idEquipo = " . $this -> idEquipo . ";";
            $this -> conexion -> query($sql);
        
            $sql = "commit;";
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