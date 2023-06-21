<?php

    class Empresa {

        private $idempresa;
        private $enombre;
        private $edireccion;

        private $mensajeoperacion;

        public function __construct() {
            $this -> idempresa = 0;
            $this -> enombre = "";
            $this -> edireccion = "";
        }

        public function cargar($idempresaC, $enombreC, $edireccionC) {
            $this -> setIdempresa($idempresaC);
            $this -> setEnombre($enombreC);
            $this -> setEdireccion($edireccionC);
        }

        public function getIdempresa() {
            return $this -> idempresa;
        }

        public function getEnombre() {
            return $this -> enombre;
        }

        public function getEdireccion() {
            return $this -> edireccion;
        }

        public function getMensajeoperacion() {
            return $this -> mensajeoperacion;
        }

        public function setIdempresa($idempresaNuevo) {
            $this -> idempresa = $idempresaNuevo;
        }

        public function setEnombre($enombreNuevo) {
            $this -> enombre = $enombreNuevo;
        }

        public function setEdireccion($edireccionNuevo) {
            $this -> edireccion = $edireccionNuevo;
        }

        public function setMensajeoperacion($mensajeoperacionNuevo) {
            $this -> mensajeoperacion = $mensajeoperacionNuevo;
        }

        public function buscar($idempresaBuscar) {
            $base = new BaseDatos();
            $consultaEmpresa = "SELECT * FROM empresa WHERE idempresa = " . $idempresaBuscar;
            $respuesta = false;
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaEmpresa)) {
                    if ($empresaRegistro = $base -> registro()) {
                        $this -> setIdempresa ($idempresaBuscar);
                        $this -> setEnombre ($empresaRegistro['enombre']);
                        $this -> setEdireccion ($empresaRegistro['edireccion']);
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
            $arregloEmpresa = null;
            $base = new BaseDatos();
            $consultaEmpresa = "SELECT * FROM empresa ";
            if ($condicion != "") {
                $consultaEmpresa = $consultaEmpresa . ' WHERE ' . $condicion;
            }
            $consultaEmpresa .= " ORDER BY idempresa";
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaEmpresa)) {
                    $arregloEmpresa = array();
                    while ($empresaRegistro = $base -> registro()) {
                        $objEmpresa = new Empresa();
                        $idempresaC = $empresaRegistro['idempresa'];
                        $enombreC = $empresaRegistro['enombre'];
                        $edireccionC = $empresaRegistro['edireccion'];
                        $objEmpresa -> cargar($idempresaC, $enombreC, $edireccionC);
                        array_push ($arregloEmpresa, $objEmpresa);
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }	
            return $arregloEmpresa;
        }

        public function insertar() {
            $base = new BaseDatos();
            $respuesta = false;
            $consultaInsertar = "INSERT INTO empresa (enombre, edireccion) 
                VALUES ('" . $this -> getEnombre() . "','" . $this -> getEdireccion() . "')";
            if ($base -> iniciar()) {
                if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                    $this -> setIdempresa($id);
                    $respuesta = true;
                } else {
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
            $consultaModificar = "UPDATE empresa
                SET enombre = '" . $this -> getEnombre() .
                "', edireccion = '" . $this -> getEdireccion() .
                "' WHERE idempresa = " . $this -> getIdempresa();
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
                $consultaBorrar = "DELETE FROM empresa 
                    WHERE idempresa = " . $this -> getIdempresa();
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
            $cadena = "ID Empresa: " . $this -> getIdempresa() . 
            " │ " . "Nombre: " . $this -> getEnombre() . 
            " │ " . "Direccion: " . $this -> getEdireccion();
            return $cadena;
        }

    }

?>