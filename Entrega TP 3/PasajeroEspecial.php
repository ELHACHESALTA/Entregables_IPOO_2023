<?php

    class PasajeroEspecial extends Pasajero {

        //Atributos

        private $sillaRuedas;
        private $asistencia;
        private $comidaEspecial;

        //Métodos

        /**
         * Crea un objeto de la clase PasajeroEstandar.
         * @param string $nombrePasajeroC
         * @param string $apellidoPasajeroC
         * @param string $dniC
         * @param string $telefonoC
         * @param int $numAsientoC
         * @param int $numTicketC
         * @param boolean $sillaRuedasC;
         * @param boolean $asistenciaC;
         * @param boolean $comidaEspecialC;
         */
        public function __construct($nombrePasajeroC, $apellidoPasajeroC, $dniC, $telefonoC, $numAsientoC, $numTicketC, $sillaRuedasC, $asistenciaC, $comidaEspecialC) {
            parent :: __construct($nombrePasajeroC, $apellidoPasajeroC, $dniC, $telefonoC, $numAsientoC, $numTicketC);
            $this -> sillaRuedas = $sillaRuedasC;
            $this -> asistencia = $asistenciaC;
            $this -> comidaEspecial = $comidaEspecialC;
        }

        /**
         * Retorna si el pasajero especial necesita silla de ruedas.
         * @return boolean
         */
        public function getSillaRuedas() {
            return $this -> sillaRuedas;
        }

        /**
         * Retorna si el pasajero especial necesita asistencia.
         * @return boolean
         */
        public function getAsistencia() {
            return $this -> asistencia;
        }

        /**
         * Retorna si el pasajero especial necesita comida especial.
         * @return boolean
         */
        public function getComidaEspecial() {
            return $this -> comidaEspecial;
        }

        /**
         * Modifica si el pasajero especial necesita silla de ruedas.
         * @param boolean $sillaRuedasNuevo
         */
        public function setSillaRuedas($sillaRuedasNuevo) {
            $this -> sillaRuedas = $sillaRuedasNuevo;
        }

        /**
         * Modifica si el pasajero especial necesita asistencia.
         * @param boolean $asistenciaNuevo
         */
        public function setAsistencia($asistenciaNuevo) {
            $this -> asistencia = $asistenciaNuevo;
        }

        /**
         * Modifica si el pasajero especial necesita comida especial.
         * @param boolean $comidaEspecialNuevo
         */
        public function setComidaEspecial($comidaEspecialNuevo) {
            $this -> comidaEspecial = $comidaEspecialNuevo;
        }

        /**
         * Retorna el porcentaje que debe aplicarse como incremento según las caracteristicas del pasajero.
         * @return float
         */
        public function darPorcentajeIncremento() {
            if ($this -> getSillaRuedas() == true && $this -> getAsistencia() == false && $this -> getComidaEspecial() == false ) {
                $incremento = 1.15;
            } elseif ($this -> getSillaRuedas() == false && $this -> getAsistencia() == true && $this -> getComidaEspecial() == false ) {
                $incremento = 1.15;
            } elseif ($this -> getSillaRuedas() == false && $this -> getAsistencia() == false && $this -> getComidaEspecial() == true ) {
                $incremento = 1.15;
            } else if ($this -> getSillaRuedas() == true && $this -> getAsistencia() == true && $this -> getComidaEspecial() == true ) {
                $incremento = 1.3;
            }
            return $incremento;
        }

        /**
         * Retorna una cadena con una respuesta dependiendo de la necesidad de silla de ruedas del pasajero especial.
         * @return string
         */
        public function stringSillaRuedas() {
            if ($this -> getSillaRuedas() == true) {
                $string = "Si";
            } else {
                $string = "No";
            }
            return $string;
        }

        /**
         * Retorna una cadena con una respuesta dependiendo de la necesidad de asistencia del pasajero especial.
         * @return string
         */
        public function stringAsistencia() {
            if ($this -> getAsistencia() == true) {
                $string = "Si";
            } else {
                $string = "No";
            }
            return $string;
        }

        /**
         * Retorna una cadena con una respuesta dependiendo de la necesidad de comida especial del pasajero especial.
         * @return string
         */
        public function stringComidaEspecial() {
            if ($this -> getComidaEspecial() == true) {
                $string = "Si";
            } else {
                $string = "No";
            }
            return $string;
        }

        /**
         * Retorna una cadena con toda la información del pasajero estandar.
         * @return string
         */
        public function __toString() {
            $cadena = parent :: __toString();
            $cadena = $cadena . " - ¿Necesita silla de ruedas?: " . $this -> stringSillaRuedas() . "\n" . 
            " - ¿Necesita asistencia?: " . $this -> stringAsistencia(). "\n" . 
            " - ¿Necesita comida especial?: " . $this -> stringComidaEspecial(). "\n";
            return $cadena;
        }

    }

?>