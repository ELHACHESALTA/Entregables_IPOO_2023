<?php

    class Pasajero {

        private $pdocumento;
        private $pnombre;
        private $papellido;
        private $ptelefono;
        private $idviaje;

        private $mensajeoperacion;

        public function __construct() {
            $this -> pdocumento = "";
            $this -> pnombre = "";
            $this -> papellido = "";
            $this -> ptelefono = null;
            $this -> idviaje = null;
        }

        public function cargar($pdocumentoC, $pnombreC, $papellidoC, $ptelefonoC, $idviajeC) {
            $this -> setPdocumento($pdocumentoC);
            $this -> setPnombre($pnombreC);
            $this -> setPapellido($papellidoC);
            $this -> setPtelefono($ptelefonoC);
            $this -> setIdviaje($idviajeC);
        }

        public function getPdocumento() {
            return $this -> pdocumento;
        }

        public function getPnombre() {
            return $this -> pnombre;
        }

        public function getPapellido() {
            return $this -> papellido;
        }

        public function getPtelefono() {
            return $this -> ptelefono;
        }

        public function getIdviaje() {
            return $this -> idviaje;
        }

        public function getMensajeoperacion() {
            return $this -> mensajeoperacion;
        }

        public function setPdocumento($pdocumentoNuevo) {
            $this -> pdocumento = $pdocumentoNuevo;
        }

        public function setPnombre($pnombreNuevo) {
            $this -> pnombre = $pnombreNuevo;
        }

        public function setPapellido($papellidoNuevo) {
            $this -> papellido = $papellidoNuevo;
        }

        public function setPtelefono($ptelefonoNuevo) {
            $this -> ptelefono = $ptelefonoNuevo;
        }

        public function setIdviaje($idviajeNuevo) {
            $this -> idviaje = $idviajeNuevo;
        }

        public function setMensajeoperacion($mensajeoperacionNuevo) {
            $this -> mensajeoperacion = $mensajeoperacionNuevo;
        }

        public function buscar($pdocumentoBuscar) {
            $base = new BaseDatos();
            $consultaPasajero = "SELECT * FROM pasajero WHERE pdocumento = '" . $pdocumentoBuscar . "'";
            $respuesta = false;
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaPasajero)) {
                    if ($pasajeroRegistro = $base -> registro()) {
                        $this -> setPdocumento ($pdocumentoBuscar);
                        $this -> setPnombre ($pasajeroRegistro['pnombre']);
                        $this -> setPapellido ($pasajeroRegistro['papellido']);
                        $this -> setPtelefono ($pasajeroRegistro['ptelefono']);
                        $this -> setIdviaje($pasajeroRegistro['idviaje']);
                        $respuesta = true;
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }
            return $respuesta;
        }

        public function listar($condicion = "") {
            $arregloPasajero = null;
            $base = new BaseDatos();
            $consultaPasajero = "SELECT * FROM pasajero ";
            if ($condicion != "") {
                $consultaPasajero = $consultaPasajero . ' WHERE ' . $condicion;
            }
            $consultaPasajero .= " ORDER BY pdocumento";
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaPasajero)) {
                    $arregloPasajero = array();
                    while ($pasajeroRegistro = $base -> registro()) {
                        $objPasajero = new Pasajero();
                        $pdocumentoC = $pasajeroRegistro['pdocumento'];
                        $pnombreC = $pasajeroRegistro['pnombre'];
                        $papellidoC = $pasajeroRegistro['papellido'];
                        $ptelefonoC = $pasajeroRegistro['ptelefono'];
                        $idviajeC = $pasajeroRegistro['idviaje'];
                        $objPasajero -> cargar($pdocumentoC, $pnombreC, $papellidoC, $ptelefonoC, $idviajeC);
                        array_push ($arregloPasajero, $objPasajero);
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }	
            return $arregloPasajero;
        }

        public function insertar() {
            $base = new BaseDatos();
            $respuesta = false;
            $consultaInsertar = "INSERT INTO pasajero (pdocumento, pnombre, papellido, ptelefono, idviaje) 
                VALUES ('" . $this -> getPdocumento() . "','" . $this -> getPnombre() .
                "','" . $this -> getPapellido() . "','" . $this -> getPtelefono() .
                "','" . $this -> getIdviaje() . "')";
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaInsertar)) {
                    $respuesta = true;
                }	else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }
            return $respuesta;
        }

        public function modificar() {
            $respuesta = false; 
            $base = new BaseDatos();
            $consultaModificar = "UPDATE pasajero
                SET pnombre = '" . $this -> getPnombre() .
                "', papellido = '" . $this -> getPapellido() .
                "', ptelefono = '" . $this -> getPtelefono() .
                "', idviaje = '" . $this -> getIdviaje() .
                "' WHERE pdocumento = '" . $this -> getPdocumento() . "'";
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaModificar)) {
                    $respuesta = true;
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }
            return $respuesta;
        }

        public function eliminar() {
            $base = new BaseDatos();
            $respuesta = false;
            if ($base -> iniciar()) {
                $consultaBorrar = "DELETE FROM pasajero
                    WHERE pdocumento = '" . $this -> getPdocumento() . "'";
                if ($base -> ejecutar ($consultaBorrar)) {
                    $respuesta = true;
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }
            return $respuesta; 
        }

        public function __toString() {
            $cadena = "Documento: " . $this -> getPdocumento() . 
            " │ " . "Nombre: " . $this -> getPnombre() . 
            " │ " . "Apellido: " . $this -> getPapellido() . 
            " │ " . "Teléfono: " . $this -> getPtelefono() . 
            " | " . "ID Viaje: " . $this -> getIdviaje();
            return $cadena;
        }

    }

?>