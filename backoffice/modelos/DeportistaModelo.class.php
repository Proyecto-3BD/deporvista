<?php 

    require "../utils/autoload.php";

    class DeportistaModelo extends Modelo{
        public $idDeportista;
        public $nombreDeportista;
        public $apellidos ;
        public $paisDeportista;
        public $rol;
        public $nombreEquipo;
        public $paisEquipo;
        public $idEquipo;
        public $idCompeticion;
        public $paisCompeticion;


        public function __construct($idDeportista=""){
            parent::__construct();
            if($idDeportista != ""){
                $this -> idDeportista = $idDeportista;
                $this -> Obtener();
            }
        }

        public function listarDepEquipo(){
            $sql = "SELECT d.idDeportista, 
                d.nombreDeportista, d.apellidos, 
                d.paisDeportista, de.rol, 
                e.nombreEquipo, e.idEquipo
                FROM deportistaEquipo AS de  
                INNER JOIN deportistas AS d 
                ON de.idDeportista=d.idDeportista 
                INNER JOIN equipos AS e 
                ON de.idEquipo=e.idEquipo;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            $resultado = [];
            foreach($filas as $fila){
                $a = new DeportistaModelo();
                $a -> idDeportista = $fila['idDeportista'];
                $a -> nombreDeportista = $fila['nombreDeportista'];
                $a -> apellidos = $fila['apellidos'];
                $a -> paisDeportista = $fila['paisDeportista'];
                $a -> rol = $fila['rol'];
                $a -> nombreEquipo = $fila['nombreEquipo'];
                 
                array_push($resultado,$a);
            }
            return $resultado;
        }

        public function deportistaCompeticion(){
            $sql = "SELECT dc.idCompeticion, c.nombreCompeticion 
                FROM deportistaCompeticion AS dc  
                INNER JOIN deportistas AS d 
                ON dc.idDeportista=d.idDeportista 
                INNER JOIN competiciones AS c 
                ON dc.idCompeticion=c.idCompeticion WHERE dc.idDeportista=" . $this -> idDeportista . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            return $fila;   
        }

        public function Guardar(){
            if($this -> idDeportista == NULL) $this -> insertar();
            else $this -> actualizar();
        }   

        private function insertar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);
            
            $sql = "INSERT INTO deportistas (nombreDeportista, apellidos, paisDeportista) 
            VALUES ('" . $this -> nombreDeportista . "',
                    '" . $this -> apellidos . "',
                    '" . $this -> paisDeportista . "');";
            $this -> conexion -> query($sql);

            $sql = "INSERT INTO deportistaEquipo (idDeportista, idEquipo, rol) 
            VALUES ((SELECT max(idDeportista) FROM deportistas),
                    '" . $this -> idEquipo . "',
                    '" . $this -> rol . "');";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);
            
        }

        private function actualizar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE deportistas SET
            nombreDeportista = '" . $this -> nombreDeportista . "',
            apellidos = '" . $this -> apellidos . "',
            paisDeportista = '" . $this -> paisDeportista . "'
            WHERE idDeportista = " . $this -> idDeportista . ";";
            $this -> conexion -> query($sql);
            
            $sql = "UPDATE deportistaEquipo SET
            idDeportista = '" . $this -> idDeportista . "',
            idEquipo = '" . $this -> idEquipo . "',
            rol = '" . $this -> rol . "'
            WHERE idDeportista = " . $this -> idDeportista . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);
        }

        public function Eliminar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);
            
            $sql = "DELETE FROM deportistas 
                WHERE idDeportista = " . $this ->idDeportista . ";";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM deportistaEquipo 
                WHERE idDeportista = " . $this ->idDeportista . ";";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM deportistaEvento 
            WHERE idDeportista = " . $this ->idDeportista . ";";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM deportistaDeporte 
            WHERE idDeportista = " . $this ->idDeportista . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);
        }

        public function Obtener(){
            $sql = "SELECT d.idDeportista, 
            d.nombreDeportista, d.apellidos, 
            d.paisDeportista, de.rol, 
            e.nombreEquipo, e.idEquipo
            FROM deportistaEquipo AS de  
            INNER JOIN deportistas AS d 
            ON de.idDeportista=d.idDeportista 
            INNER JOIN equipos AS e 
            ON de.idEquipo=e.idEquipo
            WHERE d.idDeportista =" . $this -> idDeportista . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idDeportista = $fila['idDeportista'];
            $this -> nombreDeportista = $fila['nombreDeportista'];
            $this -> apellidos = $fila['apellidos'];
            $this -> paisDeportista = $fila['paisDeportista'];
            $this -> rol = $fila['rol'];
            $this -> idEquipo = $fila['idEquipo'];
            $this -> nombreEquipo = $fila['nombreEquipo'];
        }

        public function ObtenerTodos(){
            $sql = "select * from deportistas;";
 
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
            $resultado = [];
            foreach($filas as $fila){
                $a = new DeportistaModelo();
                $a -> idDeportista = $fila['idDeportista'];
                $a -> nombreDeportista = $fila['nombreDeportista'];
                $a -> apellidos = $fila['apellidos'];
                $a -> paisDeportista = $fila['paisDeportista'];
                 
                array_push($resultado,$a);
            }
            return $resultado;
        }    
    }

        