<?php 

	require "../utils/autoload.php";

	class BannersModelo extends Modelo {
		public $idBanner;
		public $src;
        public $publicado;

		public function __construct($id=""){
			parent::__construct();
			if($id !==""){
				$this -> id = $id;
				$this -> Obtener();
			}
		}

        public function Guardar(){
            if($this -> id === NULL) $this -> insertar();
            else $this -> actualizar();
        }

		public function Obtener(){
            $sql = "SELECT * FROM banners WHERE idBanner = " . $this -> idBanner . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idBanner = $fila['idBanner'];
            $this -> src = $fila['src'];
            $this -> ubicacion = $fila['ubicacion'];
            
        }

        public function Eliminar(){
            $sql = "DELETE FROM banners WHERE idBanner = " . $this -> idBanner;
            $this -> conexion -> query($sql);
        }

        private function insertar(){
            $sql = "INSERT INTO banners (src, publicado) VALUES (
                '" . $this -> src . "',
                '" . $this -> publicado . "'
            );";
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE banners SET 
                    src = '" . $this -> src . "',
                    publicado = '" . $this -> publicado . "', 
                    WHERE idBanner = " . $this -> idBanner . ";";
            $this -> conexion -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM banners;";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $elementos = [];
            foreach($filas as $fila){
                $p = new BannersModelo();
                $p -> idBanner = $fila['idBanner'];
                $p -> src = $fila['src'];
                $p -> publicado = $fila['publicado'];
                array_push($elementos,$p);
            }
            return $elementos;
        }

	}