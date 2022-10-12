<?php 

    require "../utils/autoload.php";

    class BannerModelo extends Modelo {

        public $idBanner;
        public $src;
        public $publicado;
        

        public function __construct($idBanner=""){
            parent::__construct();
            if($idBanner != ""){
                $this -> idBanner = $idBanner;
                $this -> obtener();
            }
        }

        public function guardar(){
            if($this -> idBanner == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO banners (idBanner, src, publicado) 
            VALUES ('" . $this -> idBanner . "',
                    '" . $this -> src . "',
                    '" . $this -> publicado . "');";
            $this -> conexion -> query($sql);
        }

        private function actualizar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "UPDATE banners SET
            src = '" . $this -> src . "',
            publicado = '" . $this -> publicado . "',
            WHERE idBanner = " . $this -> idBanner . ";";
            $this -> conexion -> query($sql);

            $sql = "commit;";
            $this -> conexion -> query($sql);   
        }

        public function obtener(){
            $sql = "SELECT * FROM  banners WHERE banners = " . $this -> idBanner . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> idBanner = $fila['idBanner'];
            $this -> src = $fila['src'];
            $this -> publicado = $fila['publicado'];
        }

        public function eliminar(){
            $sql = "start transaction;";
            $this -> conexion -> query($sql);

            $sql = "DELETE FROM competiciones 
                WHERE id = " . $this -> idCompeticion . ";";
            $this -> conexion -> query($sql);
        
            $sql = "commit;";
            $this -> conexion -> query($sql);
        }

        public function obtenerTodos(){
            $sql = "select * from banners;";
 
             $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
             $resultado = array();
             foreach($filas as $fila){
                 $a = new BannerModelo();
                 $a -> idBanner = $fila['idBanner'];
                 $a -> src = $fila['src'];
                 $a -> pais = $fila['pais'];
                 
                 array_push($resultado,$a);
             }
             return $resultado;
         }

    }