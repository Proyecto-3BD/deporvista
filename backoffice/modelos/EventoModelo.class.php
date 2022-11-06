
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
        public $idCompeticion;
        public $nombreCompeticion;
        public $anio;

        public function __construct($idEvento=""){
            parent::__construct();
            if($idEvento != ""){
                $this -> idEvento = $idEvento;
                $this -> obtener();
            }
        }

        public function EventoCompeticion(){
            $sql = "SELECT e.idEvento, 
                    c.nombreCompeticion AS competicion
                    FROM eventoCompeticion AS ec 
                    INNER JOIN competiciones AS c
                    ON c.idCompeticion=ec.idCompeticion 
                    INNER JOIN eventos AS e 
                    ON ec.idEvento=e.idEvento
                    ORDER BY e.idEvento ASC;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            return $filas;
        }

        public function LocatarioEvento(){

            $sql = "SELECT e.idEvento, e.fechaHora, e.resultado, 
                    e.idDeporte, e.infracciones, e.ubicacion, eq.nombreEquipo AS locatario 
                    FROM equipoLocatarioEvento AS le 
                    INNER JOIN eventos AS e  
                    ON e.idEvento=le.idEvento 
                    INNER JOIN equipos AS eq  
                    ON le.idEquipo=eq.idEquipo
                    ORDER BY e.idEvento ASC;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            
            return $filas;
        }

        public function VisitanteEvento(){
            $sql = "SELECT e.idEvento, eq.nombreEquipo AS visitante
                    FROM equipoVisitanteEvento AS ve 
                    INNER JOIN eventos AS e  
                    ON e.idEvento=ve.idEvento 
                    INNER JOIN equipos AS eq 
                    ON ve.idEquipo=eq.idEquipo
                    ORDER BY e.idEvento ASC;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            return $filas;
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
            $sql = "UPDATE eventos SET
            fechaHora = '" . $this -> fechaHora . "',
            resultado = '" . $this -> resultado . "',
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
            $resultado = [];
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