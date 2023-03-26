<?php

    class Viaje {

        //Atributos

        private $codigoViaje;
        private $destino;
        private $cantMaxPasajeros;
        private $arregloInfoPasajeros;

        //Métodos
    
        /**
         * Crea un objeto de la clase Viaje y va solicitando sus atributos para ingresarlos por teclado.
         */
        public function __construct() {
            echo "\n" . "Carga de información del Viaje: \n" . 
            "Ingrese el código del viaje: ";
            $this -> codigoViaje = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $this -> destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad de pasajeros: ";
            $cantPasajeros = trim(fgets(STDIN));
            $this -> cantMaxPasajeros = $cantPasajeros;
            for ($i = 0; $i < $cantPasajeros; $i++) {
                echo "Ingrese el nombre del pasajero N°" . ($i + 1) . ": ";
                $this -> arregloInfoPasajeros[$i]["nombre"] = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero N°" . ($i + 1) . ": ";
                $this -> arregloInfoPasajeros[$i]["apellido"] = trim(fgets(STDIN));
                echo "Ingrese el DNI del pasajero N°" . ($i + 1) . ": ";
                $this -> arregloInfoPasajeros[$i]["dni"] = trim(fgets(STDIN));
            }
        }

        /**
         * Retorna el código del viaje.
         * @return int
         */
        public function getCodigoViaje() {
            return $this -> codigoViaje;
        }

        /**
         * Retorna el destino del viaje.
         * @return string
         */
        public function getDestino() {
            return $this -> destino;
        }

        /**
         * Retorna la cantidad máxima de pasajeros del viaje.
         * @return int
         */
        public function getCantMaxPasajeros() {
            return $this -> cantMaxPasajeros;
        }

        /**
         * Retorna el arreglo con la informacion de todos los pasajeros del viaje.
         * @return array
         */
        public function getArregloInfoPasajeros() {
            return $this -> arregloInfoPasajeros;
        }

        /**
         * Modifica el código del viaje.
         * @param string $codigoViajeNuevo
         */
        public function setCodigoViaje($codigoViajeNuevo) {
            $this -> codigoViaje = $codigoViajeNuevo;
        }

        /**
         * Modifica el destino del viaje.
         * @param string $destinoNuevo
         */
        public function setDestino($destinoNuevo) {
            $this -> destino = $destinoNuevo;
        }

        /**
         * Modifica la cantidad de pasajeros del viaje.
         * @param string $cantMaxPasajerosNuevo
         */
        public function setCantMaxPasajeros($cantMaxPasajerosNuevo) {
            $this -> cantMaxPasajeros = $cantMaxPasajerosNuevo;
        }

        /**
         * Modifica la informacion de los pasajeros del viaje.
         * @param string $arregloInfoPasajerosNuevo
         */
        public function setArregloInfoPasajeros($arregloInfoPasajerosNuevo) {
            $this -> arregloInfoPasajeros = $arregloInfoPasajerosNuevo;
        }

        /**
         * Retorna un string con toda la información del viaje.
         * @return string
         */
        public function __toString() {
            $infoPasajeros = "";
            for ($i = 0; $i < $this -> getCantMaxPasajeros(); $i++) {
                $infoPasajeros = $infoPasajeros . 
                "Pasajero N°" . ($i + 1) . ": " . $this -> getArregloInfoPasajeros()[$i]["nombre"] . 
                " " . $this -> getArregloInfoPasajeros()[$i]["apellido"] . 
                " con DNI " . $this -> getArregloInfoPasajeros()[$i]["dni"] . "\n";
            }
            return "\n" . "Información del viaje: \n" . 
            "Código del viaje: " . $this -> getCodigoViaje() . "\n" . 
            "Destino del viaje: " . $this -> getDestino() . "\n" . 
            "Cantidad de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" . 
            $infoPasajeros;
        }

    }
?>