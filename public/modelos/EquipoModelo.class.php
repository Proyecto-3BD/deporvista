<?php 

    require "../utils/autoload.php";

    class EquiposModelo extends Modelo {

        public $idEquipo;
        public $nombre;
        public $pais;
        public $dt;



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


        public function Eliminar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM equipos 
                WHERE id = " . $this -> idEquipo . ";";
            $this -> conexion -> query($sql);
        
            $sql = "commit;";
            $this -> conexion -> query($sql);
        }






    }