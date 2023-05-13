<?php

    class PasajeroEstandar extends Pasajero {

        //Atributos

        //Métodos

        /**
         * Crea un objeto de la clase PasajeroEstandar.
         * @param string $nombrePasajeroC
         * @param string $apellidoPasajeroC
         * @param string $dniC
         * @param string $telefonoC
         * @param int $numAsientoC
         * @param int $numTicketC
         */
        public function __construct($nombrePasajeroC, $apellidoPasajeroC, $dniC, $telefonoC, $numAsientoC, $numTicketC) {
            parent :: __construct($nombrePasajeroC, $apellidoPasajeroC, $dniC, $telefonoC, $numAsientoC, $numTicketC);
        }

        /**
         * Retorna una cadena con toda la información del pasajero estandar.
         * @return string
         */
        public function __toString() {
            $cadena = parent :: __toString();
            return $cadena;
        }

    }

?>