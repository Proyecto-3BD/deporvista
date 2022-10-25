<?php 

    require "../utils/autoload.php";

    class EventosModelo extends Modelo {

        public $idEvento;
        public $fechaHora;
        public $resultado;
        public $infracciones;
        public $ubicacion;

        public function __construct($idEvento=""){
            parent::__construct();
            if($idEvento != ""){
                $this -> idEvento = $idEvento;
                $this -> obtener();
            }
        }

        public function guardar(){
            if($this -> idEvento == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO eventos (fechaHora, resultado, infracciones, ubicacion) 
            VALUES ('" . $this -> fechaHora . "',
                    '" . $this -> resultado . "',
                    '" . $this -> infracciones . "',
                    '" . $this -> ubicacion . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE eventos SET
            fechaHora = '" . $this -> fechaHora . "',
            resultado = '" . $this -> resultado . "',
            infracciones = '" . $this -> infracciones . "',
            ubicacion = '" . $this -> ubicacion . "',
            WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);   
        }

        public function obtener(){
            $sql = "SELECT * FROM  eventos WHERE eventos = " . $this -> idEvento . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idEvento = $fila['idEvento'];
            $this -> fechaHora = $fila['fechaHora'];
            $this -> resultado = $fila['resultado'];
            $this -> infracciones = $fila['infracciones'];
            $this -> ubicacion = $fila['ubicacion'];
        }

        public function eliminar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM eventos 
                WHERE id = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);
        
            $sql = "commit;";
            $this -> conexion -> query($sql);
        }

        public function obtenerTodos(){
            $sql = "select * from eventos;";
 
             $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
             $resultado = array();
             foreach($filas as $fila){
                 $a = new EventosModelo();
                 $a -> idEvento = $fila['idEvento'];
                 $a -> fechaHora = $fila['fechaHora'];
                 $a -> resultado = $fila['resultado'];
                 $a -> infracciones = $fila['infracciones'];
                 $a -> ubicacion = $fila['ubicacion'];
                 
                 array_push($resultado,$a);
             }
             return $resultado;
         }

    }