<?php

    class Viaje {

        private $idviaje;
        private $vdestino;
        private $vcantmaxpasajeros;
        private $objEmpresa;
        private $objResponsable;
        private $vimporte;

        private $colPasajeros;

        private $mensajeoperacion;

        public function __construct() {
            $this -> idviaje = 0;
            $this -> vdestino = "";
            $this -> vcantmaxpasajeros = null;
            $this -> objEmpresa = new Empresa();
            $this -> objResponsable = new ResponsableV();
            $this -> vimporte = null;
            $this -> colPasajeros = [];
        }

        public function cargar($idviajeC, $vdestinoC, $vcantmaxpasajerosC, $objEmpresaC, $objResponsableC, $vimporteC) {
            $this -> setIdviaje($idviajeC);
            $this -> setVdestino($vdestinoC);
            $this -> setVcantmaxpasajeros($vcantmaxpasajerosC);
            $this -> setObjEmpresa($objEmpresaC);
            $this -> setObjResponsable($objResponsableC);
            $this -> setVimporte($vimporteC);
        }

        public function getIdviaje() {
            return $this -> idviaje;
        }

        public function getVdestino() {
            return $this -> vdestino;
        }

        public function getVcantmaxpasajeros() {
            return $this -> vcantmaxpasajeros;
        }

        public function getObjEmpresa() {
            return $this -> objEmpresa;
        }

        public function getObjResponsable() {
            return $this -> objResponsable;
        }

        public function getVimporte() {
            return $this -> vimporte;
        }

        public function getColPasajeros() {
            return $this -> colPasajeros;
        }

        public function getMensajeoperacion() {
            return $this -> mensajeoperacion;
        }

        public function setIdviaje($idviajeNuevo) {
            $this -> idviaje = $idviajeNuevo;
        }

        public function setVdestino($vdestinoNuevo) {
            $this -> vdestino = $vdestinoNuevo;
        }

        public function setVcantmaxpasajeros($vcantmaxpasajerosNuevo) {
            $this -> vcantmaxpasajeros = $vcantmaxpasajerosNuevo;
        }

        public function setObjEmpresa($objEmpresaNuevo) {
            $this -> objEmpresa = $objEmpresaNuevo;
        }

        public function setObjResponsable($objResponsableNuevo) {
            $this -> objResponsable = $objResponsableNuevo;
        }

        public function setVimporte($vimporteNuevo) {
            $this -> vimporte = $vimporteNuevo;
        }

        public function setColPasajeros($colPasajerosNuevo) {
            $this -> colPasajeros = $colPasajerosNuevo;
        }

        public function setMensajeoperacion($mensajeoperacionNuevo) {
            $this -> mensajeoperacion = $mensajeoperacionNuevo;
        }

        public function buscar($idviajeBuscar) {
            $base = new BaseDatos();
            $consultaViaje = "SELECT * FROM viaje WHERE idviaje = " . $idviajeBuscar;
            $respuesta = false;
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaViaje)) {
                    if ($viajeRegistro = $base -> registro()) {
                        $this -> setIdviaje ($idviajeBuscar);
                        $this -> setVdestino ($viajeRegistro['vdestino']);
                        $this -> setVcantmaxpasajeros ($viajeRegistro['vcantmaxpasajeros']);
                        $objEmpresaBuscar = new Empresa();
                        $objEmpresaBuscar -> buscar($viajeRegistro['idempresa']);
                        $this -> setObjEmpresa($objEmpresaBuscar);
                        $objResponsableBuscar = new ResponsableV();
                        $objResponsableBuscar -> buscar($viajeRegistro['rnumeroempleado']);
                        $this -> setObjResponsable ($objResponsableBuscar);
                        $this -> setVimporte ($viajeRegistro['vimporte']);
                        $objPasajeroBuscar = new Pasajero();
                        $colPasajerosNuevo = $objPasajeroBuscar -> listar ("idviaje = " . $idviajeBuscar);
                        $this -> setColPasajeros($colPasajerosNuevo);
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
            $arregloViaje = null;
            $base = new BaseDatos();
            $consultaViaje = "SELECT * FROM viaje ";
            if ($condicion != "") {
                $consultaViaje = $consultaViaje . ' WHERE ' . $condicion;
            }
            $consultaViaje .= " ORDER BY idviaje";
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaViaje)) {
                    $arregloViaje = array();
                    while ($viajeRegistro = $base -> registro()) {
                        $objViaje = new Viaje();
                        $idviajeC = $viajeRegistro['idviaje'];
                        $vdestinoC = $viajeRegistro['vdestino'];
                        $vcantmaxpasajerosC = $viajeRegistro['vcantmaxpasajeros'];
                        $objEmpresaC = new Empresa();
                        $objEmpresaC -> buscar($viajeRegistro['idempresa']);
                        $objResponsableC = new ResponsableV();
                        $objResponsableC -> buscar ($viajeRegistro['rnumeroempleado']);
                        $vimporteC = $viajeRegistro['vimporte'];
                        $objViaje -> cargar($idviajeC, $vdestinoC, $vcantmaxpasajerosC, $objEmpresaC, $objResponsableC, $vimporteC);
                        array_push ($arregloViaje, $objViaje);
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }	
            return $arregloViaje;
        }
        // No es necesario enviar el idviaje en el insert.
        public function insertar() {
            $base = new BaseDatos();
            $respuesta = false;
            $consultaInsertar = "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) 
                VALUES ('" . $this -> getVdestino() .
                "','" . $this -> getVcantmaxpasajeros() . "','" . $this -> getObjEmpresa() -> getIdempresa() .
                "','" . $this -> getObjResponsable() -> getRnumeroempleado() . "','" . $this -> getVimporte() . "')";
            if ($base -> iniciar()) {
                if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                    $this -> setIdviaje($id);
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
            $consultaModificar = "UPDATE viaje
                SET vdestino = '" . $this -> getVdestino() .
                "', vcantmaxpasajeros = '" . $this -> getVcantmaxpasajeros() .
                "', idempresa = '" . $this -> getObjEmpresa() -> getIdempresa() .
                "', rnumeroempleado = '" . $this -> getObjResponsable() -> getRnumeroempleado() .
                "', vimporte = '" . $this -> getVimporte() .
                "' WHERE idviaje = " . $this -> getIdviaje();
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
                $consultaBorrar = "DELETE FROM viaje
                    WHERE idviaje = " . $this -> getIdviaje();
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

        public function stringPasajeros() {
            $listaPasajeros = "\n";
            for($i = 0; $i < count($this -> getColPasajeros()); $i++) {
                if ($i < (count($this -> getColPasajeros()) - 1)) {
                    $listaPasajeros = $listaPasajeros . $this -> getColPasajeros()[$i] . "\n";
                } else {
                    $listaPasajeros = $listaPasajeros . $this -> getColPasajeros()[$i];
                }
            }
            if ($listaPasajeros == "\n") {
                $listaPasajeros = $listaPasajeros . "NO HAY PASAJEROS EN EL VIAJE.";
            }
            return $listaPasajeros;
        }

        public function __toString() {
            $cadena = "ID Viaje: " . $this -> getIdviaje() . 
            " │ " . "Destino: " . $this -> getVdestino() . 
            " │ " . "Máximo de Pasajeros: " . $this -> getVcantmaxpasajeros() . 
            " │ " . "Importe: " . $this -> getVimporte() . 
            "\n" . "\t" . "EMPRESA │ " . $this -> getObjEmpresa() . 
            "\n" . "\t" . "RESPONSABLE │ " . $this -> getObjResponsable() . "\n" .
            "┌──────────────────────────────────┐" . "\n" . 
            "│██████ PASAJEROS DEL VIAJE  ██████│" . "\n" . 
            "└──────────────────────────────────┘" . $this -> stringPasajeros() .
            "\n" . "────────────────────────────────────";
            return $cadena;
        }

    }

?>