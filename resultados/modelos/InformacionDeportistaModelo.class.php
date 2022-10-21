<?php

    require "../utils/autoload.php";

    class InformacionDeportistaModelo extends Modelo{
        public $idDeportista;
        public $nombre ;
        public $apellidos ;
        public $rol;
        public $equipo;
        public $paisEquipo;


        public function __construct($idDeportista=""){
            parent::__construct();
            if($idDeportista != ""){
                $this -> idDeportista = $idDeportista;
                $this -> ObtenerEqupoQueJuega();
            }
        }

        public function ObtenerEqupoQueJuega(){
            $sql = "SELECT d.idDeportista, d.nombre, d.apellidos, de.rol, e.nombre, e.pais
                FROM deportistaEquipo AS de  
                INNER JOIN deportistas AS d 
                ON de.idDeportista=d.idDeportista 
                INNER JOIN equipos AS e 
                ON de.idEquipo=e.idEquipo WHERE d.idDeportista=". $this -> idDeportista .";";
            $fila = $this -> conexion -> query($sql);
            //var_dump($fila);
            $this -> idDeportista = $fila['idDeportista'];
            $this -> nombre = $fila['nombre'];
            $this -> apellidos = $fila['apellidos'];
            $this -> equipo = $fila['equipo'];
            $this -> rol = $fila['rol'];
            $this -> paisEquipo = $fila['paisEquipo'];
        }
    }