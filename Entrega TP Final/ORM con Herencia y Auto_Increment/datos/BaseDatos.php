﻿<?php

    /* IMPORTANTE !!!! Clase para (PHP 5, PHP 7) */

    class BaseDatos {

        private $HOSTNAME;
        private $BASEDATOS;
        private $USUARIO;
        private $CLAVE;
        private $CONEXION;
        private $QUERY;
        private $RESULT;
        private $ERROR;

        /**
         * Constructor de la clase que inicia ls variables instancias de la clase vinculadas a la conexión con el Servidor de BD.
         */
        public function __construct() {
            $this -> HOSTNAME = "127.0.0.1";
            $this -> BASEDATOS = "bd_prueba";
            $this -> USUARIO = "root";
            $this -> CLAVE = "";
            $this -> RESULT = 0;
            $this -> QUERY = "";
            $this -> ERROR = "";
        }

        /**
         * Función que retorna una cadena con una pequeña descripción del error si lo hubiera.
         * @return string
         */
        public function getError() {
            return "\n" . $this -> ERROR;
        }

        /**
         * Inicia la conexión con el Servidor y la Base Datos Mysql. Retorna true si la conexión con el servidor se pudo establecer y false en caso contrario.
         * @return boolean
         */
        public  function Iniciar() {
            $resp  = false;
            $conexion = mysqli_connect ($this->HOSTNAME, $this->USUARIO, $this->CLAVE, $this->BASEDATOS);
            if ($conexion) {
                if (mysqli_select_db ($conexion, $this -> BASEDATOS)) {
                    $this -> CONEXION = $conexion;
                    unset ($this -> QUERY);
                    unset ($this -> ERROR);
                    $resp = true;
                }  else {
                    $this->ERROR = mysqli_errno ($conexion) . ": " . mysqli_error ($conexion);
                }
            }else{
                $this -> ERROR =  mysqli_errno ($conexion) . ": " . mysqli_error ($conexion);
            }
            return $resp;
        }

        /**
         * Ejecuta una consulta en la Base de Datos. Recibe la consulta en una cadena enviada por parámetro.
         * @param string $consulta
         * @return boolean
         */
        public function Ejecutar($consulta) {
            $resp  = false;
            unset ($this -> ERROR);
            $this -> QUERY = $consulta;
            if( $this -> RESULT = mysqli_query ($this -> CONEXION, $consulta)){
                $resp = true;
            } else {
                $this -> ERROR = mysqli_errno ($this -> CONEXION) . ": " . mysqli_error ($this -> CONEXION);
            }
            return $resp;
        }

        /**
         * Devuelve un registro retornado por la ejecución de una consulta el puntero se desplaza al siguiente registro de la consulta.
         * @return boolean
         */
        public function Registro() {
            $resp = null;
            if ($this -> RESULT) {
                unset ($this -> ERROR);
                if ($temp = mysqli_fetch_assoc ($this -> RESULT)) {
                    $resp = $temp;
                }else{
                    mysqli_free_result ($this -> RESULT);
                }
            }else{
                $this -> ERROR = mysqli_errno ($this -> CONEXION) . ": " . mysqli_error ($this -> CONEXION);
            }
            return $resp ;
        }

        /**
         * Devuelve el id de un campo auto_increment utilizado como clave de una tabla. Retorna el id numérico del registro insertado, devuelve null en caso que la ejecución de la consulta falle.
         * @param string $consulta
         * @return int id de la tupla insertada
         */
        public function devuelveIDInsercion($consulta) {
            $resp = null;
            unset ($this -> ERROR);
            $this -> QUERY = $consulta;
            if ($this -> RESULT = mysqli_query ($this -> CONEXION, $consulta)) {
                $id = mysqli_insert_id ($this -> CONEXION);
                $resp =  $id;
            } else {
                $this -> ERROR = mysqli_errno ($this -> CONEXION) . ": " . mysqli_error ($this -> CONEXION);
            }
        return $resp;
        }

    }

?>