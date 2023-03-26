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
        "1) Cambiar toda la información del viaje. \n" . 
        "2) Cambiar el código del viaje. \n" . 
        "3) Cambiar el destino del viaje. \n" . 
        "4) Cambiar la cantidad de pasajeros. \n" . 
        "5) Cambiar los datos de un pasajero. \n" . 
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
        "1) Cambiar toda la información del pasajero. \n" . 
        "2) Cambiar el nombre del pasajero. \n" . 
        "3) Cambiar el apellido del pasajero. \n" . 
        "4) Cambiar el dni del pasajero. \n" . 
        "5) Volver al menú modificar viaje. \n" . 
        "¿Qué desea modificar? Seleccione una opcion: ";
        $resultadoMMP = solicitarNumeroEntre (1, 5);
        return $resultadoMMP;
    }

    do {
        $opcion = menuPrincipal();
        switch ($opcion) {
            case 1:
                $viaje = new Viaje();
                break;
            case 2:
                do {
                    $opcion = menuModificarViaje();
                    switch ($opcion) {
                        case 1:
                            $viaje = new Viaje();
                            break;
                        case 2:
                            echo "\n" . "Ingresa el código del viaje: ";
                            $codigoViajeModificado = trim(fgets(STDIN));
                            $viaje -> setCodigoViaje($codigoViajeModificado);
                            echo "El código del viaje se há modificado con éxito. \n";
                            break;
                        case 3:
                            echo "\n" . "Ingresa el destino: ";
                            $destinoModificado = trim(fgets(STDIN));
                            $viaje -> setDestino($destinoModificado);
                            echo "El destino se há modificado con éxito. \n";
                            break;
                        case 4:
                            echo "\n" . "Ingresa la cantidad de pasajeros: ";
                            $cantMaxPasajerosModificado = trim(fgets(STDIN));
                            $viaje -> setCantMaxPasajeros($cantMaxPasajerosModificado);
                            echo "La cantidad de pasajeros se há modificado con éxito, por lo cual debe reingresar los mismos. \n";
                            for ($i = 0; $i < $cantMaxPasajerosModificado; $i++) {
                                echo "Ingrese el nombre del pasajero N°" . ($i + 1) . ": ";
                                $arregloInfoPasajerosModificado[$i]["nombre"] = trim(fgets(STDIN));
                                echo "Ingrese el apellido del pasajero N°" . ($i + 1) . ": ";
                                $arregloInfoPasajerosModificado[$i]["apellido"] = trim(fgets(STDIN));
                                echo "Ingrese el DNI del pasajero N°" . ($i + 1) . ": ";
                                $arregloInfoPasajerosModificado[$i]["dni"] = trim(fgets(STDIN));
                                $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                            }
                            echo "Se ha modificado la información de los pasajeros con éxito. \n";
                            break;
                        case 5:
                            echo "\n" . "Que pasajero desea modificar: ";
                            $numeroPasajero = solicitarNumeroEntre (1, $viaje -> getCantMaxPasajeros());
                            $numeroPasajero = $numeroPasajero - 1;
                            do {
                                $opcion = menuModificarPasajero();
                                switch ($opcion) {
                                    case 1:
                                        for ($i = 0; $i < $viaje -> getCantMaxPasajeros(); $i++) {
                                            if ($i == $numeroPasajero) {
                                                echo "Ingrese el nombre del pasajero N°" . ($i + 1) . ": ";
                                                $arregloInfoPasajerosModificado[$i]["nombre"] = trim(fgets(STDIN));
                                                echo "Ingrese el apellido del pasajero N°" . ($i + 1) . ": ";
                                                $arregloInfoPasajerosModificado[$i]["apellido"] = trim(fgets(STDIN));
                                                echo "Ingrese el DNI del pasajero N°" . ($i + 1) . ": ";
                                                $arregloInfoPasajerosModificado[$i]["dni"] = trim(fgets(STDIN));
                                            } else {
                                                $arregloInfoPasajerosModificado[$i]["nombre"] = $viaje -> getArregloInfoPasajeros()[$i]["nombre"];
                                                $arregloInfoPasajerosModificado[$i]["apellido"] = $viaje -> getArregloInfoPasajeros()[$i]["apellido"];
                                                $arregloInfoPasajerosModificado[$i]["dni"] = $viaje -> getArregloInfoPasajeros()[$i]["dni"];
                                            }
                                        }
                                        $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                        break;
                                    case 2:
                                        for ($i = 0; $i < $viaje -> getCantMaxPasajeros(); $i++) {
                                            if ($i == $numeroPasajero) {
                                                echo "Ingrese el nombre del pasajero N°" . ($i + 1) . ": ";
                                                $arregloInfoPasajerosModificado[$i]["nombre"] = trim(fgets(STDIN));
                                                $arregloInfoPasajerosModificado[$i]["apellido"] = $viaje -> getArregloInfoPasajeros()[$i]["apellido"];
                                                $arregloInfoPasajerosModificado[$i]["dni"] = $viaje -> getArregloInfoPasajeros()[$i]["dni"];
                                            } else {
                                                $arregloInfoPasajerosModificado[$i]["nombre"] = $viaje -> getArregloInfoPasajeros()[$i]["nombre"];
                                                $arregloInfoPasajerosModificado[$i]["apellido"] = $viaje -> getArregloInfoPasajeros()[$i]["apellido"];
                                                $arregloInfoPasajerosModificado[$i]["dni"] = $viaje -> getArregloInfoPasajeros()[$i]["dni"];
                                            }
                                        }
                                        $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                        break;
                                    case 3:
                                        for ($i = 0; $i < $viaje -> getCantMaxPasajeros(); $i++) {
                                            if ($i == $numeroPasajero) {
                                                $arregloInfoPasajerosModificado[$i]["nombre"] = $viaje -> getArregloInfoPasajeros()[$i]["nombre"];
                                                echo "Ingrese el apellido del pasajero N°" . ($i + 1) . ": ";
                                                $arregloInfoPasajerosModificado[$i]["apellido"] = trim(fgets(STDIN));
                                                $arregloInfoPasajerosModificado[$i]["dni"] = $viaje -> getArregloInfoPasajeros()[$i]["dni"];
                                            } else {
                                                $arregloInfoPasajerosModificado[$i]["nombre"] = $viaje -> getArregloInfoPasajeros()[$i]["nombre"];
                                                $arregloInfoPasajerosModificado[$i]["apellido"] = $viaje -> getArregloInfoPasajeros()[$i]["apellido"];
                                                $arregloInfoPasajerosModificado[$i]["dni"] = $viaje -> getArregloInfoPasajeros()[$i]["dni"];
                                            }
                                        }
                                        $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                        break;
                                    case 4:
                                        for ($i = 0; $i < $viaje -> getCantMaxPasajeros(); $i++) {
                                            if ($i == $numeroPasajero) {
                                                $arregloInfoPasajerosModificado[$i]["nombre"] = $viaje -> getArregloInfoPasajeros()[$i]["nombre"];
                                                $arregloInfoPasajerosModificado[$i]["apellido"] = $viaje -> getArregloInfoPasajeros()[$i]["apellido"];
                                                echo "Ingrese el DNI del pasajero N°" . ($i + 1) . ": ";
                                                $arregloInfoPasajerosModificado[$i]["dni"] = trim(fgets(STDIN));
                                            } else {
                                                $arregloInfoPasajerosModificado[$i]["nombre"] = $viaje -> getArregloInfoPasajeros()[$i]["nombre"];
                                                $arregloInfoPasajerosModificado[$i]["apellido"] = $viaje -> getArregloInfoPasajeros()[$i]["apellido"];
                                                $arregloInfoPasajerosModificado[$i]["dni"] = $viaje -> getArregloInfoPasajeros()[$i]["dni"];
                                            }
                                        }
                                        $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                        break;
                                }
                            } while ($opcion != 5);
                            break;
                    }
                } while ($opcion != 6);
                break;
            case 3:
                if (isset($viaje)) {
                    echo $viaje;
                } else {
                    echo "\n" . "Su viaje aún no tiene información cargada. \n";
                    $viaje = new Viaje();
                    echo $viaje;
                }
                break;
            case 4:
                echo "\n" . "El programa há finalizado. \n";
                break;
        }
    } while ($opcion != 4);

?>