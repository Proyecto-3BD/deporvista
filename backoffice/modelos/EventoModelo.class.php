
<?php 

    require "../utils/autoload.php";

    class EventoModelo extends Modelo {

        public $idEvento;
        public $fechaHora;
        public $resultado;
        public $idDeporte;     
        public $infracciones;
        public $ubicacion;
        public $idLocatario;
        public $idVisitante;
        public $idCompeticion;

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
                    e.idDeporte, e.infracciones, e.ubicacion, eq.nombreEquipo AS locatario, eq.idEquipo AS idLocatario
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
            $sql = "SELECT e.idEvento, eq.nombreEquipo AS visitante, eq.idEquipo AS idVisitante
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
            $sql = "start transaction";
            $this -> conexion -> query($sql);

            $sql = "INSERT INTO eventos (fechaHora, resultado, idDeporte, infracciones, ubicacion) 
            VALUES ('" . $this -> fechaHora . "',
                    '" . $this -> resultado . "',
                    '" . $this -> idDeporte . "',
                    '" . $this -> infracciones . "',
                    '" . $this -> ubicacion . "');";
            $this -> conexion -> query($sql);
            
            $sql = "INSERT INTO equipoLocatarioEvento(idEvento, idEquipo) 
            VALUES ((SELECT max(idEvento) FROM eventos),
                    '" . $this -> idLocatario . "');";
            $this -> conexion -> query($sql);
            
            $sql = "INSERT INTO equipoVisitanteEvento(idEvento, idEquipo) 
            VALUES ((SELECT max(idEvento) FROM eventos),
                    '" . $this -> idVisitante . "');";
            $this -> conexion -> query($sql);
            
            $sql = "INSERT INTO eventoCompeticion(idEvento, idCompeticion) 
            VALUES ((SELECT max(idEvento) FROM eventos),
                    '" . $this -> idCompeticion . "');";
            $this -> conexion -> query($sql);
            
            $sql = "commit";
            $this -> conexion -> query($sql);
            var_dump($this -> conexion -> query($sql));
            
        }

        private function actualizar(){
            $sql = "start transaction";
            $this -> conexion -> query($sql);
            
            $sql = "UPDATE eventos SET
                fechaHora = '" . $this -> fechaHora . "',
                resultado = '" . $this -> resultado . "',
                infracciones = '" . $this -> infracciones . "',
                ubicacion = '" . $this -> ubicacion . "'
                WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);
            
            $sql = "UPDATE equipoLocatarioEvento SET
                idEquipo = '" . $this -> idLocatario. "'
                WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);
            
            $sql = "UPDATE equipoVisitanteEvento SET
                idEquipo = '" . $this -> idVisitante. "'
                WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);
            
            $sql = "UPDATE eventoCompeticion SET
                idCompeticion = '" . $this -> idCompeticion. "'
                WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);
            
            $sql = "commit";
            $this -> conexion -> query($sql);
            
        }

        public function obtener(){
            $sql = "SELECT e.idEvento, e.fechaHora, 
                e.resultado, e.idDeporte, e.infracciones, 
                e.ubicacion, le.idEquipo as idLocatario, 
                ve.idEquipo as idVisitante, ec.idCompeticion 
                FROM eventos as e 
                INNER JOIN equipoLocatarioEvento as le 
                ON e.idEvento = le.idEvento  
                INNER JOIN equipoVisitanteEvento as ve
                ON e.idEvento = ve.idEvento
                INNER JOIN eventoCompeticion as ec
                ON e.idEvento = ec.idEvento
                WHERE e.idEvento = " . $this -> idEvento . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idEvento = $fila['idEvento'];
            $this -> fechaHora = $fila['fechaHora'];
            $this -> resultado = $fila['resultado'];
            $this -> idDeporte = $fila['idDeporte'];
            $this -> infracciones = $fila['infracciones'];
            $this -> ubicacion = $fila['ubicacion'];
            $this -> idLocatario = $fila['idLocatario'];
            $this -> idVisitante = $fila['idVisitante'];
            $this -> idCompeticion = $fila['idCompeticion'];
        }

        public function Eliminar(){
            $sql = "start transaction";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM eventos 
                WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);
            
            $sql = "DELETE FROM equipoLocatarioEquipo 
                WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM equipoVisitanteEquipo 
                WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM eventoCompeticion 
                WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);

            $sql = "commit";
            $this -> conexion -> query($sql);
        }

        public function obtenerTodos(){
            $sql = "select * from eventos;";
 
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            $resultado = [];
            foreach($filas as $fila){
                $a = new EventoModelo();
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