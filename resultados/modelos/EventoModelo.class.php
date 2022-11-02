
<?php 

    require "../utils/autoload.php";

    class EventoModelo extends Modelo {

        public $idEvento;
        public $fechaHora;
        public $resultado;
        public $idDeporte;
        public $infracciones;
        public $ubicacion;
        public $locatario;
        public $visitante;

        public function __construct($idEvento=""){
            parent::__construct();
            if($idEvento != ""){
                $this -> idEvento = $idEvento;
                $this -> obtener();
            }
        }

        public function LocatarioEvento(){

            $sql = "SELECT e.idEvento, e.fechaHora, e.resultado, 
                    e.idDeporte, e.infracciones, e.ubicacion, eq.nombreEquipo AS locatario 
                    FROM equipoLocatarioEvento AS le 
                    INNER JOIN eventos AS e  
                    ON e.idEvento=le.idEvento 
                    INNER JOIN equipos AS eq  
                    ON le.idEquipo=eq.idEquipo
                    ORDER BY eq.idEquipo DESC;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            
            return $filas;
        }

        public function VisitanteEvento(){
            $sql = "SELECT eq.nombreEquipo AS visitante
                    FROM equipoVisitanteEvento AS ve 
                    INNER JOIN eventos AS e  
                    ON e.idEvento=ve.idEvento 
                    INNER JOIN equipos AS eq 
                    ON ve.idEquipo=eq.idEquipo
                    ORDER BY eq.idEquipo DESC;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            
            return $filas;
        }


        public function guardar(){
            if($this -> idEvento == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO eventos (fechaHora, resultado,idDeporte ,infracciones, ubicacion) 
            VALUES ('" . $this -> fechaHora . "',
                    '" . $this -> resultado . "',
                    '" . $this -> idDeporte . "',
                    '" . $this -> infracciones . "',
                    '" . $this -> ubicacion . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            
            $sql = "UPDATE eventos SET
            fechaHora = '" . $this -> fechaHora . "',
            resultado = '" . $this -> resultado . "',
            idDeporte = '" . $this -> idDeporte . "',
            infracciones = '" . $this -> infracciones . "',
            ubicacion = '" . $this -> ubicacion . "',
            WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);

        }

        public function obtener(){
            $sql = "SELECT * FROM  eventos WHERE eventos = " . $this -> idEvento . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idEvento = $fila['idEvento'];
            $this -> fechaHora = $fila['fechaHora'];
            $this -> resultado = $fila['resultado'];
            $this -> idDeporte = $fila['idDeporte'];
            $this -> infracciones = $fila['infracciones'];
            $this -> ubicacion = $fila['ubicacion'];
        }

        public function eliminar(){

            $sql = "DELETE FROM eventos 
                WHERE id = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);
        
        }

        public function obtenerTodos(){
            $sql = "select * from eventos;";
 
             $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
             $resultado = array();
             foreach($filas as $fila){
                 $a = new EventoModelo();
                 $a -> idEvento = $fila['idEvento'];
                 $a -> fechaHora = $fila['fechaHora'];
                 $a -> resultado = $fila['resultado'];
                 $a -> idDeporte = $fila['idDeporte'];
                 $a -> infracciones = $fila['infracciones'];
                 $a -> ubicacion = $fila['ubicacion'];
                 
                 array_push($resultado,$a);
             }
             return $resultado;
         }

    }