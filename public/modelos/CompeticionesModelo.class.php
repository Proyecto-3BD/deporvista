<?php 

    require "../utils/autoload.php";

    class CompeticionModelo extends Modelo {

        public $idCompeticion;
        public $nombre;
        public $pais;
        public $anio;
        

        public function __construct($idCompeticion=""){
            parent::__construct();
            if($idCompeticion != ""){
                $this -> idCompeticion = $idCompeticion;
                $this -> obtener();
            }
        }

        public function guardar(){
            if($this -> idCompeticion == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO competiciones (idCompeticion, nombre, pais, anio) 
            VALUES ('" . $this -> idCompeticion . "',
                    '" . $this -> nombre . "',
                    '" . $this -> pais . "',
                    '" . $this -> anio . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE competiciones SET
            nombre = '" . $this -> nombre . "',
            pais = '" . $this -> pais . "',
            anio = '" . $this -> anio . "',
            WHERE idCompeticion = " . $this -> idCompeticion . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);   
        }

        public function obtener(){
            $sql = "SELECT * FROM  competiciones WHERE competiciones = " . $this -> idCompeticion . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idCompeticion = $fila['idCompeticion'];
            $this -> nombre = $fila['nombre'];
            $this -> pais = $fila['pais'];
            $this -> anio = $fila['anio'];
        }

        public function eliminar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM competiciones 
                WHERE id = " . $this -> idCompeticion . ";";
            $this -> conexion -> query($sql);
        
            $sql = "commit;";
            $this -> conexion -> query($sql);
        }

        public function obtenerTodos(){
            $sql = "select * from competiciones;";
 
             $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
             $resultado = array();
             foreach($filas as $fila){
                 $a = new CompeticionModelo();
                 $a -> idCompeticion = $fila['idCompeticion'];
                 $a -> nombre = $fila['nombre'];
                 $a -> pais = $fila['pais'];
                 $a -> anio = $fila['anio'];
                 
                 array_push($resultado,$a);
             }
             return $resultado;
         }

    }