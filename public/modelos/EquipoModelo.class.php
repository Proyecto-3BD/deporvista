<?php 

    require "../utils/autoload.php";

    class EquiposModelo extends Modelo {

        public $idEquipo;
        public $nombre;
        public $pais;
        public $dt;


        public function guardar(){
            if($this -> idEquipo == NULL) $this -> insertarEquipo();
            else $this -> actualizarEquipo();
        }

        private function insertarEquipo(){
            $sql = "INSERT INTO equipos (idEquipo, nombre, pais, dt) 
            VALUES ('" . $this -> idEquipo . "',
                    '" . $this -> nombre . "',
                    '" . $this -> pais . "',
                    '" . $this -> dt . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizarEquipo(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE equipos SET
            nombre = '" . $this -> nombre . "',
            pais = '" . $this -> pais . "',
            dt = '" . $this -> dt . "',
            WHERE idEquipo = " . $this -> idEquipo . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);   
        }

        public function obtenerEquipos(){
            $sql = "SELECT * FROM  equipos WHERE idAdmin = " . $this -> idEquipo . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idEquipo = $fila['idEquipo'];
            $this -> nombre = $fila['nombre'];
            $this -> pais = $fila['pais'];
            $this -> dt = $fila['dt'];
        }

        public function eliminarEquipo(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM equipos 
                WHERE id = " . $this -> idEquipo . ";";
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
                 $a -> nombre = $fila['nombre'];
                 $a -> pais = $fila['pais'];
                 $a -> dt = $fila['dt'];
                 
                 array_push($resultado,$a);
             }
             return $resultado;
         }

    }