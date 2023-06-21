<?php

    include_once "BaseDatos.php";

    class Estudiante extends Persona {

        private $carrera;

        public function __construct() {
            parent :: __construct();
            $this -> carrera = "";
        }

        public function cargar($NroD, $Nom, $Ape, $mail, $carrera = null) {
            parent :: cargar ($NroD, $Nom, $Ape, $mail);
            $this -> setCarrera($carrera);
        }

        public function setCarrera($carrera) {
            $this -> carrera = $carrera;
        }

        public function getCarrera() {
            return $this -> carrera;
        }

        /**
         * Recupera los datos de una persona por dni. Retorna true en caso de encontrar los datos, false en caso contrario.
         * @param int $dni
         * @return boolean 
         */		
        public function Buscar($dni) {
            $base = new BaseDatos();
            $consulta = "SELECT * FROM estudiante WHERE nrodoc = " . $dni;
            $resp = false;
            if ($base -> Iniciar()) {
                if ($base -> Ejecutar($consulta)) {
                    if ($row2 = $base -> Registro()) {	
                        parent :: Buscar($dni);
                        $this -> setCarrera ($row2['carrera']);
                        $resp = true;
                    }				
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }		
            return $resp;
        }

        public function listar($condicion = "") {
            $arreglo = null;
            $base = new BaseDatos();
            $consulta = "SELECT * FROM estudiante ";
            if ($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }
            $consulta .= " ORDER BY carrera";
            //echo $consultaPersonas;
            if ($base -> Iniciar()) {
                if ($base -> Ejecutar($consulta)) {
                    $arreglo = array();
                    while ($row2 = $base -> Registro()) {
                        $obj = new Estudiante();
                        $obj -> Buscar($row2['nrodoc']);
                        array_push ($arreglo, $obj);
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }	
            return $arreglo;
        }

        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            if (parent :: insertar()) {
                $consultaInsertar = "INSERT INTO estudiante (nrodoc, carrera) VALUES (" . $this -> getNrodoc() . ",'" . $this -> getCarrera() . "')";
                if ($base -> Iniciar()) {
                    if ($base -> Ejecutar ($consultaInsertar)) {
                        $resp = true;
                    } else {
                        $this -> setmensajeoperacion ($base -> getError());
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            }
            return $resp;
        }

        public function modificar() {
            $resp = false; 
            $base = new BaseDatos();
            if (parent :: modificar()) {
                $consultaModificar = "UPDATE estudiante SET carrera = '" . $this -> getCarrera() . "' WHERE nrodoc = " . $this -> getNrodoc();
                if ($base -> Iniciar()) {
                    if ($base -> Ejecutar ($consultaModificar)) {
                        $resp = true;
                    } else {
                        $this -> setmensajeoperacion ($base -> getError());
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            }
            return $resp;
        }

        public function eliminar() {
            $base = new BaseDatos();
            $resp = false;
            if ($base -> Iniciar()) {
                $consultaBorrar = "DELETE FROM estudiante WHERE nrodoc = " . $this -> getNrodoc();
                if ($base -> Ejecutar ($consultaBorrar)) {
                    if (parent :: eliminar()) {
                        $resp = true;
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }
            return $resp; 
        }

        public function __toString(){
            return parent :: __toString() . "\n Carrera: " . $this -> getCarrera() . "\n";
        }

    }

?>