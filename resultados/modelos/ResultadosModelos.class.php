<?php 

    require "../utils/autoload.php";

    class ResultadosModelo extends Modelo {

        public $idEvento;
        public $fechaHora;
        public $resultado;
        public $infracciones;
        public $ubicacion;



        public function ObtenerEventos(){
            $sql = "SELECT * FROM  eventos WHERE eventos = " . $this -> idEvento . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idEvento = $fila['idEvento'];
            $this -> fechaHora = $fila['fechaHora'];
            $this -> resultado = $fila['resultado'];
            $this -> infracciones = $fila['infracciones'];
            $this -> ubicacion = $fila['ubicacion'];
        }

        public function ObtenerDeportista(){
            $sql = "SELECT * FROM  deportistas WHERE idDeportista = " . $this -> idDeportista . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idAdmin = $fila['idDeportista'];
            $this -> nombre = $fila['nombre'];
            $this -> apellidos = $fila['apellidos'];
            $this -> pais = $fila['pais'];
        }

        public function ObtenerCompeticiones(){
            $sql = "SELECT * FROM  competiciones WHERE competiciones = " . $this -> idCompeticion . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idCompeticion = $fila['idCompeticion'];
            $this -> nombre = $fila['nombre'];
            $this -> pais = $fila['pais'];
            $this -> anio = $fila['anio'];
        }

        public function ObtenerEquipos(){
            $sql = "SELECT * FROM  equipos WHERE idEquipo = " . $this -> idEquipo . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idEquipo = $fila['idEquipo'];
            $this -> nombre = $fila['nombre'];
            $this -> pais = $fila['pais'];
            $this -> dt = $fila['dt'];
        }

        public function ObtenerDeporte(){
            $sql = "SELECT * FROM  deportes WHERE idDeporte = " . $this -> idDeporte . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idDeporte = $fila['idDeporte'];
            $this -> nombreDeporte = $fila['nombreDeporte'];
            $this -> tipoDeporte = $fila['tipoDeporte'];
        }



        public function ObtenerPaginaInicio() {
            
    
    }

    
}