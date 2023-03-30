<?php
    include_once ("viaje.php");

    /**
     *  Corrobora que un número se encuentre entre un mínimo y un máximo.
     * @param int $minSNE
     * @param int $maxSNE
     * @return string
     */
    function solicitarNumeroEntre($minSNE, $maxSNE) {
        $numSNE = (trim(fgets(STDIN)));
        while ((((int)($numSNE) != $numSNE)) || (!($numSNE >= $minSNE && $numSNE <= $maxSNE))) {
        echo "Debe ingresar un número entre " . $minSNE . " y " . $maxSNE . ": ";
        $numSNE = trim(fgets(STDIN));
        }
        return $numSNE;
    }

    /**
     * Muestra el menu principal, solicita una opcion valida y retorna la misma.
     * @return string
     */
    function menuPrincipal() {
        echo "\n" . "MENÚ PRINCIPAL: \n" . 
        "1) Cargar información del viaje. \n" . 
        "2) Modificar el viaje. \n" . 
        "3) Ver la información del viaje. \n" . 
        "4) Salir. \n" . 
        "¿Qué desea hacer? Seleccione una opcion: ";
        $resultadoMP = solicitarNumeroEntre (1, 4);
        return $resultadoMP;
    }

    /**
     * Muestra el menu modificar viaje, solicita una opcion valida y retorna la misma.
     * @return string
     */
    function menuModificarViaje() {
        echo "\n" . "MENÚ MODIFICAR VIAJE: \n" . 
        "1) Cambiar el código del viaje. \n" . 
        "2) Cambiar el destino del viaje. \n" . 
        "3) Cambiar la cantidad máxima de pasajeros del viaje. \n" . 
        "4) Cambiar los datos de un pasajero. \n" . 
        "5) Agregar un pasajero nuevo. \n" . 
        "6) Volver al menú principal. \n" . 
        "¿Qué desea modificar? Seleccione una opcion: ";
        $resultadoMMV = solicitarNumeroEntre (1, 6);
        return $resultadoMMV;
    }

    /**
     * Muestra el menu modificar pasajero, solicita una opcion valida y retorna la misma.
     * @return string
     */
    function menuModificarPasajero() {
        echo "\n" . "MENÚ MODIFICAR PASAJERO: \n" . 
        "1) Cambiar el nombre del pasajero. \n" . 
        "2) Cambiar el apellido del pasajero. \n" . 
        "3) Cambiar el dni del pasajero. \n" . 
        "4) Volver al menú modificar viaje. \n" . 
        "¿Qué desea modificar? Seleccione una opcion: ";
        $resultadoMMP = solicitarNumeroEntre (1, 4);
        return $resultadoMMP;
    }

    /**
     * Función que solicita todos los valores necesarios y crear un objeto Viaje a partir de estos.
     * @return object $viajeIV
     */
    function infoViaje() {
        echo "\n" . "Carga de información del Viaje: \n" . 
        "Ingrese el código del viaje: ";
        $codigoViajeIV = trim(fgets(STDIN));
        echo "Ingrese el destino del viaje: ";
        $destinoIV = trim(fgets(STDIN));
        echo "Ingrese la cantidad máxima de pasajeros del viaje: ";
        $cantMaxPasajerosIV = trim(fgets(STDIN));
        $contadorPasajerosIV = 1;
        do {
            echo "Ingrese el nombre del pasajero: ";
            $arregloInfoPasajerosIV[$contadorPasajerosIV - 1]["nombre"] = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: ";
            $arregloInfoPasajerosIV[$contadorPasajerosIV - 1]["apellido"] = trim(fgets(STDIN));
            echo "Ingrese el DNI del pasajero: ";
            $arregloInfoPasajerosIV[$contadorPasajerosIV - 1]["dni"] = trim(fgets(STDIN));
            if($contadorPasajerosIV < $cantMaxPasajerosIV) {
                echo "¿Desea ingresar otro pasajero?: Seleccione una opción: \n" . 
                "1) Si \n" . 
                "2) No \n";
                echo "Respuesta: ";
                $respuestaIV = trim(fgets(STDIN));
                if ($respuestaIV == "1") {
                    $contadorPasajerosIV++;
                } else {
                    echo "\n" . "Se ha/n cargado " . $contadorPasajerosIV . " pasajero/s correctamente. \n";
                }
            } else {
                echo "\n" . "Ha llegado a la cantidad máxima de pasajeros del viaje. \n";
                $respuestaIV = "2";
            }
        } while ($respuestaIV == "1");
        echo "\n" . "Su viaje a sido cargado correctamente. \n";
        $viajeIV = new Viaje($codigoViajeIV, $destinoIV, $cantMaxPasajerosIV, $arregloInfoPasajerosIV);
        return $viajeIV;
    }

    $existeViaje = false;
    do {
        $opcion = menuPrincipal();
        switch ($opcion) {
            case 1:
                if ($existeViaje == true) {
                    echo "\n" . "Ya existe información cargada de un viaje, para modificarla dirijase a la opción 2. \n";
                } else {
                    $viaje = infoViaje();
                    $existeViaje = true;
                }
                break;
            case 2:
                if ($existeViaje == true) {
                    do {
                        $opcion = menuModificarViaje();
                        switch ($opcion) {
                            case 1:
                                echo "\n" . "Ingresa el código del viaje: ";
                                $codigoViajeModificado = trim(fgets(STDIN));
                                $viaje -> setCodigoViaje($codigoViajeModificado);
                                echo "El código del viaje se há modificado con éxito. \n";
                                break;
                            case 2:
                                echo "\n" . "Ingresa el destino del viaje: ";
                                $destinoModificado = trim(fgets(STDIN));
                                $viaje -> setDestino($destinoModificado);
                                echo "El destino del viaje se há modificado con éxito. \n";
                                break;
                            case 3:
                                echo "\n" . "Ingresa la cantidad máxima de pasajeros del viaje: ";
                                $cantMaxPasajerosModificado = trim(fgets(STDIN));
                                while ($cantMaxPasajerosModificado <= count($viaje -> getArregloInfoPasajeros())) {
                                    echo "\n" . "La cantidad de pasajeros actuales es superior o igual a la ingresada. \n" . 
                                    "Debe ingresar una cantidad máxima de pasajeros mayor a " . count($viaje -> getArregloInfoPasajeros()) . ": ";
                                    $cantMaxPasajerosModificado = trim(fgets(STDIN));
                                }
                                $viaje -> setCantMaxPasajeros($cantMaxPasajerosModificado);
                                echo "La cantidad máxima de pasajeros del viaje se há modificado con éxito. \n";
                                break;
                            case 4:
                                echo "\n" . "Ingrese el DNI del pasajero que desea modificar: ";
                                $dniPasajero = trim(fgets(STDIN));
                                $arregloInfoPasajerosModificado = $viaje -> getArregloInfoPasajeros();
                                for ($i = 0; $i < count($viaje -> getArregloInfoPasajeros()); $i++) {
                                    if ($dniPasajero == $arregloInfoPasajerosModificado[$i]["dni"]) {
                                        do {
                                            $opcion = menuModificarPasajero();
                                            switch ($opcion) {
                                                case 1:
                                                    echo "\n" . "Ingrese el nombre del pasajero: ";
                                                    $arregloInfoPasajerosModificado[$i]["nombre"] = trim(fgets(STDIN));
                                                    $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                    echo "El nombre del pasajero se há modificado con éxito. \n";
                                                    break;
                                                case 2:
                                                    echo "\n" . "Ingrese el apellido del pasajero: ";
                                                    $arregloInfoPasajerosModificado[$i]["apellido"] = trim(fgets(STDIN));
                                                    $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                    echo "El apellido del pasajero se há modificado con éxito. \n";
                                                    break;
                                                case 3:
                                                    echo "\n" . "Ingrese el DNI del pasajero: ";
                                                    $arregloInfoPasajerosModificado[$i]["dni"] = trim(fgets(STDIN));
                                                    $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                    echo "El DNI del pasajero se há modificado con éxito. \n";
                                                    $opcion = 4;
                                                    break;
                                            }
                                        } while ($opcion != 4);
                                    } else {
                                        echo "El DNI ingresado no corresponde a un pasajero. \n";
                                    }
                                }
                                break;
                            case 5:
                                $arregloInfoPasajerosModificado = $viaje -> getArregloInfoPasajeros();
                                $contadorPasajeros = count($viaje -> getArregloInfoPasajeros());
                                if(count($viaje -> getArregloInfoPasajeros()) < $viaje -> getCantMaxPasajeros()) {
                                    echo "\n" . "Ingrese el nombre del pasajero nuevo: ";
                                    $arregloInfoPasajerosModificado[$contadorPasajeros]["nombre"] = trim(fgets(STDIN));
                                    echo "Ingrese el apellido del pasajero nuevo: ";
                                    $arregloInfoPasajerosModificado[$contadorPasajeros]["apellido"] = trim(fgets(STDIN));
                                    echo "Ingrese el DNI del pasajero nuevo: ";
                                    $arregloInfoPasajerosModificado[$contadorPasajeros]["dni"] = trim(fgets(STDIN));
                                    $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                    echo "\n" . "El nuevo pasajero se há agregado correctamente al viaje. \n";
                                } else {
                                    echo "\n" . "Ha llegado a la cantidad máxima de pasajeros del viaje. \n";
                                }
                                break;
                        }
                    } while ($opcion != 6);
                } else {
                    echo "\n" . "Su viaje aún no tiene información cargada. \n";
                    $viaje = infoViaje();
                    $existeViaje = true;
                }
                break;
            case 3:
                if ($existeViaje == true) {
                    echo $viaje;
                } else {
                    echo "\n" . "Su viaje aún no tiene información cargada. \n";
                    $viaje = infoViaje();
                    $existeViaje = true;
                }
                break;
            case 4:
                echo "\n" . "El programa há finalizado. \n";
                break;
        }
    } while ($opcion != 4);
?>