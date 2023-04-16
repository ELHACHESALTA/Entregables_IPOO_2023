<?php

    class Pasajero {

        //Atributos

        private $nombrePasajero;
        private $apellidoPasajero;
        private $dni;
        private $telefono;

        //Métodos

        /**
         * Crea un objeto de la clase Pasajero.
         * @param string $nombrePasajeroC
         * @param string $apellidoPasajeroC
         * @param string $dniC
         * @param string $telefonoC
         */
        public function __construct($nombrePasajeroC, $apellidoPasajeroC, $dniC, $telefonoC) {
            $this -> nombrePasajero = $nombrePasajeroC;
            $this -> apellidoPasajero = $apellidoPasajeroC;
            $this -> dni = $dniC;
            $this -> telefono = $telefonoC;
        }

        /**
         * Retorna el nombre del pasajero.
         * @return string
         */
        public function getNombrePasajero() {
            return $this -> nombrePasajero;
        }

        /**
         * Retorna el apellido del pasajero.
         * @return string
         */
        public function getApellidoPasajero() {
            return $this -> apellidoPasajero;
        }

        /**
         * Retorna el dni del pasajero.
         * @return string
         */
        public function getDni() {
            return $this -> dni;
        }

        /**
         * Retorna el telefono del pasajero.
         * @return string
         */
        public function getTelefono() {
            return $this -> telefono;
        }

        /**
         * Modifica el nombre del pasajero.
         * @param string $nombrePasajeroNuevo
         */
        public function setNombrePasajero($nombrePasajeroNuevo) {
            $this -> nombrePasajero = $nombrePasajeroNuevo;
        }

        /**
         * Modifica el apellido del pasajero.
         * @param string $apellidoPasajeroNuevo
         */
        public function setApellidoPasajero($apellidoPasajeroNuevo) {
            $this -> apellidoPasajero = $apellidoPasajeroNuevo;
        }

        /**
         * Modifica el dni del pasajero.
         * @param string $dniNuevo
         */
        public function setDni($dniNuevo) {
            $this -> dni = $dniNuevo;
        }

        /**
         * Modifica el telefono del pasajero.
         * @param string $telefonoNuevo
         */
        public function setTelefono($telefonoNuevo) {
            $this -> telefono = $telefonoNuevo;
        }

        /**
         * Retorna una cadena con toda la información del pasajero.
         * @return string
         */
        public function __toString() {
            $cadena = "\n" . "Datos del pasajero: \n" . 
            " - Nombre: " . $this -> getNombrePasajero() . "\n" . 
            " - Apellido: " . $this -> getApellidoPasajero() . "\n" . 
            " - DNI: " . $this -> getDni() . "\n" . 
            " - Teléfono: " . $this -> getTelefono() . "\n";
            return $cadena;
        }

    }

?>