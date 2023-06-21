<?php

    include_once "BaseDatos.php";

    class Persona {

        private $idpersona;
        private $nrodoc;
        private $nombre;
        private $apellido;
        private $email;
        private $mensajeoperacion;

        public function __construct() {
            $this -> idpersona = 0;
            $this ->nrodoc = "";
            $this -> nombre = "";
            $this -> apellido = "";
            $this -> email = "";
        }

        public function cargar($idpersona, $NroD, $Nom, $Ape, $mail) {
            $this -> setIdPersona($idpersona);
            $this -> setNrodoc($NroD);
            $this -> setNombre($Nom);
            $this -> setApellido($Ape);
            $this -> setEmail($mail);
        }

        public function setIdPersona($idpersona) {
            $this -> idpersona = $idpersona;
        }

        public function setNrodoc($NroDNI) {
            $this -> nrodoc = $NroDNI;
        }

        public function setNombre($Nom) {
            $this -> nombre = $Nom;
        }

        public function setApellido($Ape) {
            $this -> apellido = $Ape;
        }

        public function setEmail($mail) {
            $this -> email = $mail;
        }

        public function setmensajeoperacion($mensajeoperacion) {
            $this -> mensajeoperacion = $mensajeoperacion;
        }

        public function getIdPersona() {
            return $this -> idpersona;
        }

        public function getNrodoc() {
            return $this -> nrodoc;
        }

        public function getNombre() {
            return $this -> nombre ;
        }

        public function getApellido() {
            return $this -> apellido ;
        }

        public function getEmail() {
            return $this -> email ;
        }

        public function getmensajeoperacion() {
            return $this -> mensajeoperacion ;
        }	

        /**
         * Recupera los datos de una persona por dni. Retorna true en caso de encontrar los datos, false en caso contrario.
         * @param int $dni
         * @return boolean
         */	
        public function Buscar($dni) {
            $base = new BaseDatos();
            $consultaPersona = "SELECT * FROM persona WHERE nrodoc = " . $dni;
            $resp = false;
            if ($base -> Iniciar()) {
                if ($base -> Ejecutar ($consultaPersona)) {
                    if ($row2 = $base -> Registro()) {
                        $this -> setIdPersona ($row2['idpersona']);
                        $this -> setNrodoc ($dni);
                        $this -> setNombre ($row2['nombre']);
                        $this -> setApellido ($row2['apellido']);
                        $this -> setEmail ($row2['email']);
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

        public function listar($condicion = "") {
            $arregloPersona = null;
            $base = new BaseDatos();
            $consultaPersonas = "SELECT * FROM persona ";
            if ($condicion != "") {
                $consultaPersonas = $consultaPersonas . ' WHERE ' . $condicion;
            }
            $consultaPersonas .= " ORDER BY apellido";
            //echo $consultaPersonas;
            if ($base -> Iniciar()) {
                if ($base -> Ejecutar ($consultaPersonas)) {
                    $arregloPersona = array();
                    while ($row2 = $base -> Registro()) {
                        $id = $row2['idpersona'];
                        $NroDoc = $row2['nrodoc'];
                        $Nombre = $row2['nombre'];
                        $Apellido = $row2['apellido'];
                        $Email = $row2['email'];
                        $perso = new Persona();
                        $perso -> cargar ($id, $NroDoc, $Nombre, $Apellido, $Email);
                        array_push ($arregloPersona, $perso);
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }	
            return $arregloPersona;
        }	

        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            $consultaInsertar = "INSERT INTO persona (nrodoc, apellido, nombre,  email) VALUES (" . $this -> getNrodoc() . ",'" . $this -> getApellido() . "','" . $this -> getNombre() . "','" . $this->getEmail() . "')";
            if ($base -> Iniciar()) {
                if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                    $this -> setIdPersona($id);
                    $resp = true;
                }	else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }
            return $resp;
        }

        public function modificar() {
            $resp =false; 
            $base = new BaseDatos();
            $consultaModificar = "UPDATE persona SET apellido = '" . $this -> getApellido() . "', nombre = '" . $this -> getNombre() . "', email = '" . $this -> getEmail() . "', nrodoc = ". $this -> getNrodoc() . " WHERE idpersona = " . $this -> getIdPersona();
            if ($base -> Iniciar()) {
                if ($base -> Ejecutar ($consultaModificar)) {
                    $resp = true;
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }
            return $resp;
        }

        public function eliminar() {
            $base = new BaseDatos();
            $resp = false;
            if ($base -> Iniciar()) {
                $consultaBorrar = "DELETE FROM persona WHERE idpersona = " . $this -> getIdPersona();
                if ($base -> Ejecutar ($consultaBorrar)) {
                    $resp = true;
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }
            return $resp; 
        }

        public function __toString() {
            return "\nNombre: " . $this -> getNombre() . "\n Apellido: " . $this -> getApellido() . "\n DNI: " . $this -> getNrodoc() . "\n";
        }

    }

?>