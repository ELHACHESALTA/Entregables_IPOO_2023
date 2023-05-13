<?php

    class PasajeroVip extends Pasajero {

        //Atributos

        private $numViajeroFrecuente;
        private $millas;
    
        //Métodos

        /**
         * Crea un objeto de la clase PasajeroVip.
         * @param string $nombrePasajeroC
         * @param string $apellidoPasajeroC
         * @param string $dniC
         * @param string $telefonoC
         * @param int $numAsientoC
         * @param int $numTicketC
         * @param int $numViajeroFrecuenteC;
         * @param int $millasC;
         */
        public function __construct($nombrePasajeroC, $apellidoPasajeroC, $dniC, $telefonoC, $numAsientoC, $numTicketC, $numViajeroFrecuenteC, $millasC) {
            parent :: __construct($nombrePasajeroC, $apellidoPasajeroC, $dniC, $telefonoC, $numAsientoC, $numTicketC);
            $this -> numViajeroFrecuente = $numViajeroFrecuenteC;
            $this -> millas = $millasC;
        }

        /**
         * Retorna el número de pasajero frecuente del pasajero vip.
         * @return int
         */
        public function getNumViajeroFrecuente() {
            return $this -> numViajeroFrecuente;
        }

        /**
         * Retorna la cantidad de millas del pasajero vip.
         * @return int
         */
        public function getMillas() {
            return $this -> millas;
        }

        /**
         * Modifica el número de pasajero frecuente del pasajero vip.
         * @param int $numViajeroFrecuenteNuevo;
         */
        public function setNumViajeroFrecuente($numViajeroFrecuenteNuevo) {
            $this -> numViajeroFrecuente = $numViajeroFrecuenteNuevo;
        }

        /**
         * Modifica la cantidad de millas del pasajero vip.
         * @param int $millasNuevo;
         */
        public function setMillas($millasNuevo) {
            $this -> millas = $millasNuevo;
        }

        /**
         * Retorna el porcentaje que debe aplicarse como incremento según las caracteristicas del pasajero.
         * @return float
         */
        public function darPorcentajeIncremento() {
            if ($this -> getMillas() > 300) {
                $incremento = 1.3;
            } else {
                $incremento = 1.35;
            }
            return $incremento;
        }

        /**
         * Retorna una cadena con toda la información del pasajero vip.
         * @return string
         */
        public function __toString() {
            $cadena = parent :: __toString();
            $cadena = $cadena . " - Número de viajero frecuente: " . $this -> getNumViajeroFrecuente() . "\n" . 
            " - Cantidad de millas: " . $this -> getMillas(). "\n";
            return $cadena;
        }

    }

?>