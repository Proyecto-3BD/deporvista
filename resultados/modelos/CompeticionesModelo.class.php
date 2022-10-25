<?php 

    require "../utils/autoload.php";

    class CompeticionesModelo extends Modelo {

        public $idCompeticion;
        public $nombreCompeticion;
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
            $sql = "INSERT INTO competiciones (nombreCompeticion, pais, anio) 
            VALUES ('" . $this -> nombreCompeticion . "',
                    '" . $this -> pais . "',
                    '" . $this -> anio . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE competiciones SET
            nombreCompeticion = '" . $this -> nombreCompeticion . "',
            pais = '" . $this -> pais . "',
            anio = '" . $this -> anio . "',
            WHERE idCompeticion = " . $this -> idCompeticion . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);   
        }

        public function obtener(){
            $sql = "SELECT * FROM  competiciones WHERE idCompeticion = " . $this -> idCompeticion . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idCompeticion = $fila['idCompeticion'];
            $this -> nombreCompeticion = $fila['nombreCompeticion'];
            $this -> pais = $fila['pais'];
            $this -> anio = $fila['anio'];
        }

        public function obtenerPorPais(){
            $sql = "SELECT * FROM  competiciones WHERE pais = " . $this -> pais . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idCompeticion = $fila['idCompeticion'];
            $this -> nombreCompeticion = $fila['nombreCompeticion'];
            $this -> pais = $fila['pais'];
            $this -> anio = $fila['anio'];
        }


        public function eliminar(){
            $sql = "DELETE FROM competiciones 
                WHERE idCompeticion = " . $this -> idCompeticion . ";";
            $this -> conexion -> query($sql);
        }

        public function obtenerTodos(){
            $sql = "select * from competiciones;";
 
             $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
             $resultado = [];
             foreach($filas as $fila){
                 $a = new CompeticionesModelo();
                 $a -> idCompeticion = $fila['idCompeticion'];
                 $a -> nombreCompeticion = $fila['nombreCompeticion'];
                 $a -> pais = $fila['pais'];
                 $a -> anio = $fila['anio'];
                 
                 array_push($resultado,$a);
             }
             return $resultado;
         }

    }