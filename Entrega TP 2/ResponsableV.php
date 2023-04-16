<?php

    class ResponsableV {

        //Atributos

        private $numeroEmpleado;
        private $numeroLicencia;
        private $nombreResponsableV;
        private $apellidoResponsableV;

        //Métodos

        /**
         * Crea un objeto de la clase ResponsableV.
         * @param string $numeroEmpleadoC
         * @param string $numeroLicenciaC
         * @param string $nombreResponsableVC
         * @param string $apellidoResponsableC
         */
        public function __construct($numeroEmpleadoC, $numeroLicenciaC, $nombreResponsableVC, $apellidoResponsableVC) {
            $this -> numeroEmpleado = $numeroEmpleadoC;
            $this -> numeroLicencia = $numeroLicenciaC;
            $this -> nombreResponsableV = $nombreResponsableVC;
            $this -> apellidoResponsableV = $apellidoResponsableVC;
        }

        /**
         * Retorna el número de empleado del responsable del viaje.
         * @return string
         */
        public function getNumeroEmpleado() {
            return $this -> numeroEmpleado;
        }

        /**
         * Retorna el número de licencia del responsable del viaje.
         * @return string
         */
        public function getNumeroLicencia() {
            return $this -> numeroLicencia;
        }

        /**
         * Retorna el nombre del responsable del viaje.
         * @return string
         */
        public function getNombreResponsableV() {
            return $this -> nombreResponsableV;
        }

        /**
         * Retorna el apellido del responsable del viaje.
         * @return string
         */
        public function getApellidoResponsableV() {
            return $this -> apellidoResponsableV;
        }

        /**
         * Modifica el número de empleado del responsable del viaje.
         * @param string $numeroEmpleadoNuevo
         */
        public function setNumeroEmpleado($numeroEmpleadoNuevo) {
            $this -> numeroEmpleado = $numeroEmpleadoNuevo;
        }

        /**
         * Modifica el número de licencia del responsable del viaje.
         * @param string $numeroLicenciaNuevo
         */
        public function setNumeroLicencia($numeroLicenciaNuevo) {
            $this -> numeroLicencia = $numeroLicenciaNuevo;
        }

        /**
         * Modifica el nombre del responsable del viaje.
         * @param string $nombreResponsableVNuevo
         */
        public function setNombreResponsableV($nombreResponsableVNuevo) {
            $this -> nombreResponsableV = $nombreResponsableVNuevo;
        }

        /**
         * Modifica el apellido del responsable del viaje.
         * @param string $apellidoResponsableVNuevo
         */
        public function setApellidoResponsableV($apellidoResponsableVNuevo) {
            $this -> apellidoResponsableV = $apellidoResponsableVNuevo;
        }

        /**
         * Retorna una cadena con toda la información del responsable del viaje.
         * @return string
         */
        public function __toString() {
            $cadena = "\n" . "Datos del responsable del viaje: \n" . 
            " - Número de empleado: " . $this -> getNumeroEmpleado() . "\n" . 
            " - Número de licencia: " . $this -> getNumeroLicencia() . "\n" . 
            " - Nombre: " . $this -> getNombreResponsableV() . "\n" . 
            " - Apellido: " . $this -> getApellidoResponsableV() . "\n";
            return $cadena;
        }

    }

?>