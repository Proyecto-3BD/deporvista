<?php 

	require "../utils/autoload.php";

	class EquipoLocatarioEventoModelo extends Modelo {
		public $idEvento;
        public $idEquipo;

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
            $sql = "SELECT * FROM equipoLocatarioEvento 
                WHERE idEvento = " . $this -> idEvento . "
                AND idEquipo = ". $this -> idEquipo .";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            $this -> idEvento = $fila['idEvento'];
            $this -> idEquipo = $fila['idEquipo'];
        }

        public function Eliminar(){
            $sql = "DELETE FROM equipoLocatarioEvento 
                WHERE idEvento = " . $this -> idEvento . "
                AND idEquipo = " . $this -> idEquipo . ";";
            $this -> conexion -> query($sql);
        }

        private function insertar(){
            $sql = "INSERT INTO equipoLocatarioEvento(idEquipo, idEvento) 
                VALUES (
                '" . $this -> idEquipo . "', 
                (SELECT max(idEvento) AS idEvento FROM eventos));";
            echo '</pre>';
            var_dump($sql);
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE equipoLocatarioEvento SET 
                    idEvento = '" . $this -> idEvento . "',
                    idEquipo = '" . $this -> idEquipo . "'
                    WHERE idEvento = " . $this -> idEvento . ";";
            $this -> conexion -> query($sql);

        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM equipoLocatarioEvento;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $elementos = [];
            foreach($filas as $fila){
                $p = new EquipoLocatarioEventoModelo();
                $p -> idEvento = $fila['idEvento'];
                $p -> idEquipo = $fila['idEquipo'];
                array_push($elementos,$p);
            }
            return $elementos;
        }

	}