<?php

    class Viaje {

        //Atributos

        private $codigoViaje;
        private $destino;
        private $cantMaxPasajeros;
        private $arregloInfoPasajeros;
        private $objResponsableV;
        private $costo;
        private $sumaCostosAbonados;

        //Métodos
    
        /**
         * Crea un objeto de la clase Viaje.
         * @param string $codigoViajeC
         * @param string $destinoC
         * @param string $cantMaxPasajerosC
         * @param array $arregloInfoPasajerosC
         * @param object $objResponsableVC
         */
        public function __construct($codigoViajeC, $destinoC, $cantMaxPasajerosC, $arregloInfoPasajerosC, $objResponsableVC, $costoC, $sumaCostosAbonadosC) {
            $this -> codigoViaje = $codigoViajeC;
            $this -> destino = $destinoC;
            $this -> cantMaxPasajeros = $cantMaxPasajerosC;
            $this -> arregloInfoPasajeros = $arregloInfoPasajerosC;
            $this -> objResponsableV = $objResponsableVC;
            $this -> costo = $costoC;
            $this -> sumaCostosAbonados = $sumaCostosAbonadosC;
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
         * Retorna el costo del viaje.
         * @return int
         */
        public function getCosto() {
            return $this -> costo;
        }

        /**
         * Retorna la suma de costos abonados por los pasajeros del viaje.
         * @return int
         */
        public function getSumaCostosAbonados() {
            return $this -> sumaCostosAbonados;
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
         * Modifica el costo del viaje.
         * @param int $costoNuevo
         */
        public function setCosto($costoNuevo) {
            $this -> costo = $costoNuevo;
        }

        /**
         * Modifica la suma de costos abonados por los pasajeros del viaje.
         * @param int $costoNuevo
         */
        public function setSumaCostosAbonados($sumaCostosAbonadosNuevo) {
            $this -> sumaCostosAbonados = $sumaCostosAbonadosNuevo;
        }

        /**
         * Retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros.
         * @return boolean
         */
        public function hayPasajesDisponibles() {
            $comprobacion = false;
            if (count($this -> getArregloInfoPasajeros()) < $this -> getCantMaxPasajeros()) {
                $comprobacion = true;
            }
            return $comprobacion;
        }

        /**
         * Incorpora el pasajero a la colección de pasajeros (si hay espacio disponible en el viaje), actualiza los costos abonados y retorna el costo final que deberá ser abonado por el pasajero.
         * @param object $objPasajero
         * @return int
         */
        public function venderPasaje($objPasajero) {
            $costoFinal = null;
            $arregloInfoPasajerosCarga = $this -> getArregloInfoPasajeros();
            if ($this -> hayPasajesDisponibles() == true) {
                array_push($arregloInfoPasajerosCarga, $objPasajero);
                $this -> setArregloInfoPasajeros($arregloInfoPasajerosCarga);
                $costoFinal = $this -> getCosto() * $objPasajero -> darPorcentajeIncremento();
                $sumaCostosAbonadosCarga = $this -> getSumaCostosAbonados();
                $sumaCostosAbonadosCarga = $sumaCostosAbonadosCarga + $costoFinal;
                $this -> setSumaCostosAbonados($sumaCostosAbonadosCarga);
            }
            return $costoFinal;
        }

        /**
         * Retorna una cadena con la informacion de los pasajeros del viaje.
         * @return string
         */
        public function stringInfoPasajeros() {
            $infoPasajeros = "";
            for ($i = 0; $i < count($this -> getArregloInfoPasajeros()); $i++) {
                $infoPasajeros = $infoPasajeros . 
                " - Pasajero N°" . ($i + 1) . ": \n" . $this -> getArregloInfoPasajeros()[$i] . "\n";
            }
            return $infoPasajeros;
        }

        /**
         * Retorna una cadena con toda la información del viaje.
         * @return string
         */
        public function __toString() {
            $cadena = "\n" . "Información del viaje: \n" . 
            " - Código del viaje: " . $this -> getCodigoViaje() . "\n" . 
            " - Destino del viaje: " . $this -> getDestino() . "\n" . 
            " - Cantidad de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" . 
            $this -> stringInfoPasajeros() . 
            $this -> getObjResponsableV() . 
            " - Costo del viaje: " . $this -> getCosto() . "\n" . 
            " - Suma de costos abonados del viaje: " . $this -> getSumaCostosAbonados() . "\n";
            return $cadena;
        }

    }
?>