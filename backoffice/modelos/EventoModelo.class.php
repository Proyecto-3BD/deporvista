
<?php 

    require "../utils/autoload.php";

    class EventoModelo extends Modelo {

        public $idEvento;
        public $fechaHora;
        public $resultado;
        public $idDeporte;
        public $nombreDeporte;
        public $infracciones;
        public $ubicacion;
        public $idLocatario;
        public $locatario;
        public $idVisitante;
        public $visitante;
        public $idCompeticion;
        public $nombreCompeticion;
  
        public function __construct($idEvento=""){
            parent::__construct();
            if($idEvento != ""){
                $this -> idEvento = $idEvento;
                $this -> obtener();
            }
        }


        public function Evento(){
            $sql = "SELECT e.idEvento, e.fechaHora, e.resultado, e.idDeporte, 
                    d.nombreDeporte, e.infracciones, e.ubicacion, 
                    ve.idEquipo AS idVisitante,
                    eq.nombreEquipo AS visitante,  
                    le.idEquipo AS idLocatario, 
                    eq.nombreEquipo AS locatario,
                    ec.idCompeticion, c.nombreCompeticion
                    FROM equipoVisitanteEvento AS ve 
                    INNER JOIN eventos AS e  
                    ON e.idEvento=ve.idEvento
                    INNER JOIN equipoLocatarioEvento AS le 
                    ON e.idEvento=le.idEvento 
                    INNER JOIN equipos AS eq 
                    ON le.idEquipo=eq.idEquipo
                    INNER JOIN eventoCompeticion AS ec
                    ON e.idEvento=ec.idEvento
                    INNER JOIN competiciones as c
                    ON ec.idCompeticion=c.idCompeticion
                    INNER JOIN deportes as d
                    ON e.idDeporte=d.idDeporte
                    ORDER BY e.idEvento ASC;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            return $filas;

            $resultado = [];
            foreach($filas as $fila){
                $a = new EventoModelo();
                $a -> idEvento = $fila['idEvento'];
                $a -> fechaHora = $fila['fechaHora'];
                $a -> resultado = $fila['resultado'];
                $a -> idDeporte = $fila['idDeporte'];
                $a -> nombreDeporte = $fila['nombreDeporte'];
                $a -> infracciones = $fila['infracciones'];
                $a -> ubicacion = $fila['ubicacion'];

                $a -> idLocatario = $fila['idLocatario'];
                $a -> locatario = $fila['locatario'];

                $a -> idVisitante = $fila['idVisitante'];
                $a -> visitante = $fila['visitante'];
                $a -> idCompeticion = $fila['idCompeticion'];
                $a -> nombreCompeticion = $fila['nombreCompeticion'];

                array_push($resultado,$a);
            }
            return $resultado;
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
            $sql = "SELECT e.idEvento, e.fechaHora, e.resultado, e.idDeporte, 
                d.nombreDeporte, e.infracciones, e.ubicacion, 
                ve.idEquipo AS idVisitante,
                eq.nombreEquipo AS visitante,  
                le.idEquipo AS idLocatario, 
                eq.nombreEquipo AS locatario,
                ec.idCompeticion, c.nombreCompeticion
                FROM equipoVisitanteEvento AS ve 
                INNER JOIN eventos AS e  
                ON e.idEvento=ve.idEvento
                INNER JOIN equipoLocatarioEvento AS le 
                ON e.idEvento=le.idEvento 
                INNER JOIN equipos AS eq 
                ON le.idEquipo=eq.idEquipo
                INNER JOIN eventoCompeticion AS ec
                ON e.idEvento=ec.idEvento
                INNER JOIN competiciones as c
                ON ec.idCompeticion=c.idCompeticion
                INNER JOIN deportes as d
                ON e.idDeporte=d.idDeporte
                WHERE e.idEvento = " . $this -> idEvento . ";";
            
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            
            $this -> idEvento = $fila['idEvento'];
            $this -> fechaHora = $fila['fechaHora'];
            $this -> resultado = $fila['resultado'];
            $this -> idDeporte = $fila['idDeporte'];
            $this -> infracciones = $fila['infracciones'];
            $this -> ubicacion = $fila['ubicacion'];
            $this -> idLocatario = $fila['idLocatario'];
            $this -> locatario = $fila['locatario'];
            $this -> idVisitante = $fila['idVisitante'];
            $this -> visitante = $fila['visitante'];
            $this -> idCompeticion = $fila['idCompeticion'];
            $this -> nombreCompeticion = $fila['nombreCompeticion'];
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
                $a -> idDeporte = $fila['idDeporte'];
                $a -> infracciones = $fila['infracciones'];
                $a -> ubicacion = $fila['ubicacion'];
                 
                array_push($resultado,$a);
            }
            return $resultado;
        }

    }