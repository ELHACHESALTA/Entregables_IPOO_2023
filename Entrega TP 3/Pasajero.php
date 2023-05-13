<?php

    class Pasajero {

        //Atributos

        private $nombrePasajero;
        private $apellidoPasajero;
        private $dni;
        private $telefono;
        private $numAsiento;
        private $numTicket;

        //Métodos

        /**
         * Crea un objeto de la clase Pasajero.
         * @param string $nombrePasajeroC
         * @param string $apellidoPasajeroC
         * @param string $dniC
         * @param string $telefonoC
         * @param int $numAsientoC
         * @param int $numTicketC
         */
        public function __construct($nombrePasajeroC, $apellidoPasajeroC, $dniC, $telefonoC, $numAsientoC, $numTicketC) {
            $this -> nombrePasajero = $nombrePasajeroC;
            $this -> apellidoPasajero = $apellidoPasajeroC;
            $this -> dni = $dniC;
            $this -> telefono = $telefonoC;
            $this -> numAsiento = $numAsientoC;
            $this -> numTicket = $numTicketC;
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
         * Retorna el número de asiento del pasajero.
         * @return int
         */
        public function getNumAsiento() {
            return $this -> numAsiento;
        }

        /**
         * Retorna el número de ticket del pasajero.
         * @return int
         */
        public function getNumTicket() {
            return $this -> numTicket;
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
         * Modifica el número de asiento del pasajero.
         * @param int $numAsientoNuevo
         */
        public function setNumAsiento($numAsientoNuevo) {
            $this -> numAsiento = $numAsientoNuevo;
        }

        /**
         * Modifica el número de ticket del pasajero.
         * @param int $numTicketNuevo
         */
        public function setNumTicket($numTicketNuevo) {
            $this -> numTicket = $numTicketNuevo;
        }

        /**
         * Retorna el porcentaje que debe aplicarse como incremento según las caracteristicas del pasajero.
         * @return float
         */
        public function darPorcentajeIncremento() {
            $incremento = 1.1;
            return $incremento;
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
            " - Teléfono: " . $this -> getTelefono() . "\n" . 
            " - Número de asiento: " . $this -> getNumAsiento() . "\n" . 
            " - Número de ticket: " . $this -> getNumTicket(). "\n";
            return $cadena;
        }

    }

?>