<?php

    class ResponsableV {

        private $rnumeroempleado;
        private $rnumerolicencia;
        private $rnombre;
        private $rapellido;

        private $mensajeoperacion;

        public function __construct() {
            $this -> rnumeroempleado = 0;
            $this -> rnumerolicencia = null;
            $this -> rnombre = "";
            $this -> rapellido = "";
        }

        public function cargar($rnumeroempleadoC, $rnumerolicenciaC, $rnombreC, $rapellidoC) {
            $this -> setRnumeroempleado($rnumeroempleadoC);
            $this -> setRnumerolicencia($rnumerolicenciaC);
            $this -> setRnombre($rnombreC);
            $this -> setRapellido($rapellidoC);
        }

        public function getRnumeroempleado() {
            return $this -> rnumeroempleado;
        }

        public function getRnumerolicencia() {
            return $this -> rnumerolicencia;
        }

        public function getRnombre() {
            return $this -> rnombre;
        }

        public function getRapellido() {
            return $this -> rapellido;
        }

        public function getMensajeoperacion() {
            return $this -> mensajeoperacion;
        }

        public function setRnumeroempleado($rnumeroempleadoNuevo) {
            $this -> rnumeroempleado = $rnumeroempleadoNuevo;
        }

        public function setRnumerolicencia($rnumerolicenciaNuevo) {
            $this -> rnumerolicencia = $rnumerolicenciaNuevo;
        }

        public function setRnombre($rnombreNuevo) {
            $this -> rnombre = $rnombreNuevo;
        }

        public function setRapellido($rapellidoNuevo) {
            $this -> rapellido = $rapellidoNuevo;
        }

        public function setMensajeoperacion($mensajeoperacionNuevo) {
            $this -> mensajeoperacion = $mensajeoperacionNuevo;
        }

        public function buscar($rnumeroempleadoBuscar) {
            $base = new BaseDatos();
            $consultaResponsable = "SELECT * FROM responsable WHERE rnumeroempleado = " . $rnumeroempleadoBuscar;
            $respuesta = false;
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaResponsable)) {
                    if ($responsableRegistro = $base -> registro()) {
                        $this -> setRnumeroempleado ($rnumeroempleadoBuscar);
                        $this -> setRnumerolicencia ($responsableRegistro['rnumerolicencia']);
                        $this -> setRnombre ($responsableRegistro['rnombre']);
                        $this -> setRapellido ($responsableRegistro['rapellido']);
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
            $arregloResponsable = null;
            $base = new BaseDatos();
            $consultaResponsable = "SELECT * FROM responsable ";
            if ($condicion != "") {
                $consultaResponsable = $consultaResponsable . ' WHERE ' . $condicion;
            }
            $consultaResponsable .= " ORDER BY rnumeroempleado";
            if ($base -> iniciar()) {
                if ($base -> ejecutar ($consultaResponsable)) {
                    $arregloResponsable = array();
                    while ($responsableRegistro = $base -> registro()) {
                        $objResponsable = new ResponsableV();
                        $rnumeroempleadoC = $responsableRegistro['rnumeroempleado'];
                        $rnumerolicenciaC = $responsableRegistro['rnumerolicencia'];
                        $rnombreC = $responsableRegistro['rnombre'];
                        $rapellidoC = $responsableRegistro['rapellido'];
                        $objResponsable -> cargar($rnumeroempleadoC, $rnumerolicenciaC, $rnombreC, $rapellidoC);
                        array_push ($arregloResponsable, $objResponsable);
                    }
                } else {
                    $this -> setmensajeoperacion ($base -> getError());
                }
            } else {
                $this -> setmensajeoperacion ($base -> getError());
            }	
            return $arregloResponsable;
        }

        public function insertar() {
            $base = new BaseDatos();
            $respuesta = false;
            $consultaInsertar = "INSERT INTO responsable (rnumerolicencia, rnombre, rapellido) 
                VALUES ('" . $this -> getRnumerolicencia() .
                "','" . $this -> getRnombre() . "','" . $this->getRapellido() . "')";
            if ($base -> iniciar()) {
                if ($id = $base->devuelveIDInsercion($consultaInsertar)) {
                    $this -> setRnumeroempleado($id);
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
            $consultaModificar = "UPDATE responsable
                SET rnumerolicencia = '" . $this -> getRnumerolicencia() .
                "', rnombre = '" . $this -> getRnombre() .
                "', rapellido = '" . $this -> getRapellido() .
                "' WHERE rnumeroempleado = " . $this -> getRnumeroempleado();
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
                $consultaBorrar = "DELETE FROM responsable
                    WHERE rnumeroempleado = " . $this -> getRnumeroEmpleado();
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
            $cadena = "Empleado N°: " . $this -> getRnumeroempleado() . 
            " │ " . "Licencia N°: " . $this -> getRnumerolicencia() . 
            " │ " . "Nombre: " . $this -> getRnombre() . 
            " │ " . "Apellido: " . $this -> getRapellido();
            return $cadena;
        }

    }

?>