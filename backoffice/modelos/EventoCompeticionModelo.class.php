<?php 

	require "../utils/autoload.php";

	class EventoCompeticionModelo extends Modelo {
		public $idEvento;
        public $idCompeticion;

		public function __construct($idEvento=""){
			parent::__construct();
			if($idEvento !==""){
				$this -> idEvento = $idEvento;
				$this -> Obtener();
			}
		}

        public function Guardar(){
            if($this -> idEvento === NULL) $this -> insertar();
            else $this -> actualizar();
        }

		public function Obtener(){
            $sql = "SELECT * FROM equipoVisitanteEvento 
                WHERE idEvento = " . $this -> idEvento . "
                AND idCompeticion = ". $this -> idCompeticion .";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            $this -> idEvento = $fila['idEvento'];
            $this -> idCompeticion = $fila['idCompeticion'];
        }

        public function Eliminar(){
            $sql = "DELETE FROM equipoVisitanteEvento 
                WHERE idEvento = " . $this -> idEvento . "
                AND idCompeticion = " . $this -> idCompeticion . ";";
            $this -> conexion -> query($sql);
        }

        private function insertar(){
            $sql = "INSERT INTO equipoVisitanteEvento(idCompeticion, idEvento) 
                VALUES (
                '" . $this -> idCompeticion . "', 
                (SELECT max(idEvento) AS idEvento FROM eventos));";
            echo '</pre>';
            var_dump($sql);
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE equipoVisitanteEvento SET 
                    idEvento = '" . $this -> idEvento . "',
                    idCompeticion = '" . $this -> idCompeticion . "'
                    WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);

        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM equipoVisitanteEvento;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $elementos = [];
            foreach($filas as $fila){
                $p = new EventoCompeticionModelo();
                $p -> idEvento = $fila['idEvento'];
                $p -> idCompeticion = $fila['idCompeticion'];
                array_push($elementos,$p);
            }
            return $elementos;
        }

	}