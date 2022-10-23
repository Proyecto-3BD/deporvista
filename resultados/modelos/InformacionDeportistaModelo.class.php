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
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            return $fila;
        }


        /*public public function ObtenerCompeticion(){
            $sql = "SELECT dc.idDeportista, c.nombre                 
                    FROM deportistaCompeticion AS dc
                    INNER JOIN deportistas AS d                  
                    ON dc.idDeportista=d.idDeportista
                    INNER JOIN competiciones AS c
                    ON dc.idCompeticion=c.idCompeticion
                    WHERE dc.idDeportista=1;" . $this -> idDeportista . ";";
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            return $fila;
        }*/
    }