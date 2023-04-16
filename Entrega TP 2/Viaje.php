<?php

    class Viaje {

        //Atributos

        private $codigoViaje;
        private $destino;
        private $cantMaxPasajeros;
        private $arregloInfoPasajeros;
        private $objResponsableV;

        //Métodos
    
        /**
         * Crea un objeto de la clase Viaje.
         * @param string $codigoViajeC
         * @param string $destinoC
         * @param string $cantMaxPasajerosC
         * @param array $arregloInfoPasajerosC
         * @param object $objResponsableVC
         */
        public function __construct($codigoViajeC, $destinoC, $cantMaxPasajerosC, $arregloInfoPasajerosC, $objResponsableVC) {
            $this -> codigoViaje = $codigoViajeC;
            $this -> destino = $destinoC;
            $this -> cantMaxPasajeros = $cantMaxPasajerosC;
            $this -> arregloInfoPasajeros = $arregloInfoPasajerosC;
            $this -> objResponsableV = $objResponsableVC;
        }

        /**
         * Retorna el código del viaje.
         * @return string
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
         * @return string
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
         * Retorna el objeto del responsable del viaje.
         * @return object
         */
        public function getObjResponsableV() {
            return $this -> objResponsableV;
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
         * Modifica la cantidad máxima de pasajeros del viaje.
         * @param string $cantMaxPasajerosNuevo
         */
        public function setCantMaxPasajeros($cantMaxPasajerosNuevo) {
            $this -> cantMaxPasajeros = $cantMaxPasajerosNuevo;
        }

        /**
         * Modifica el arreglo con la informacion de todos los pasajeros del viaje.
         * @param array $arregloInfoPasajerosNuevo
         */
        public function setArregloInfoPasajeros($arregloInfoPasajerosNuevo) {
            $this -> arregloInfoPasajeros = $arregloInfoPasajerosNuevo;
        }

        /**
         * Modifica el objeto del responsable del viaje.
         * @param object $objResponsableVNuevo
         */
        public function setObjResponsableV($objResponsableVNuevo) {
            $this -> objResponsableV = $objResponsableVNuevo;
        }

        /**
         * Retorna una cadena con toda la información del viaje.
         * @return string
         */
        public function __toString() {
            $infoPasajeros = "";
            for ($i = 0; $i < count($this -> getArregloInfoPasajeros()); $i++) {
                $infoPasajeros = $infoPasajeros . 
                " - Pasajero N°" . ($i + 1) . ": " . $this -> getArregloInfoPasajeros()[$i] -> getNombrePasajero() . 
                " " . $this -> getArregloInfoPasajeros()[$i] -> getApellidoPasajero() . 
                " con DNI " . $this -> getArregloInfoPasajeros()[$i] -> getDni() . 
                " y telefono " . $this -> getArregloInfoPasajeros()[$i] -> getTelefono() . "\n";
            }
            $cadena = "\n" . "Información del viaje: \n" . 
            " - Código del viaje: " . $this -> getCodigoViaje() . "\n" . 
            " - Destino del viaje: " . $this -> getDestino() . "\n" . 
            " - Cantidad de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" . 
            $infoPasajeros . 
            $this -> getObjResponsableV();
            return $cadena;
        }

    }
?>