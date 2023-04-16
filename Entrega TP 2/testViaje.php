<?php

    include_once ("Pasajero.php");
    include_once ("ResponsableV.php");
    include_once ("Viaje.php");

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
        "6) Cambiar los datos del responsable del viaje. \n" . 
        "7) Volver al menú principal. \n" . 
        "¿Qué desea modificar? Seleccione una opcion: ";
        $resultadoMMV = solicitarNumeroEntre (1, 7);
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
        "3) Cambiar el telefono del pasajero. \n" . 
        "4) Volver al menú modificar viaje. \n" . 
        "¿Qué desea modificar? Seleccione una opcion: ";
        $resultadoMMP = solicitarNumeroEntre (1, 4);
        return $resultadoMMP;
    }

    $existeViaje = false;
    do {
        $opcion = menuPrincipal();
        switch ($opcion) {
            case 1:
                //Menú principal - Cargar información del viaje.
                if ($existeViaje == true) {
                    echo "\n" . "Ya existe información cargada de un viaje, para modificarla dirijase a la opción 2. \n";
                } else {
                    echo "\n" . "Carga de información del Viaje: \n" . 
                    "Ingrese el código del viaje: ";
                    $codigoViajeCarga = trim(fgets(STDIN));
                    echo "Ingrese el destino del viaje: ";
                    $destinoCarga = trim(fgets(STDIN));
                    echo "Ingrese la cantidad máxima de pasajeros del viaje: ";
                    $cantMaxPasajerosCarga = trim(fgets(STDIN));
                    $contadorPasajeros = 1;
                    $arregloInfoPasajerosCarga = [];
                    $i = 0;
                    $comprobacion = false;
                    do {
                        echo "Ingrese el DNI del pasajero: ";
                        $dniCarga = trim(fgets(STDIN));
                        do{
                            if ($arregloInfoPasajerosCarga == null) {
                                echo "\n" . "Ingrese el nombre del pasajero nuevo: ";
                                $nombrePasajeroCarga = trim(fgets(STDIN));
                                echo "Ingrese el apellido del pasajero: ";
                                $apellidoPasajeroCarga = trim(fgets(STDIN));
                                echo "Ingrese el teléfono del pasajero: ";
                                $telefonoCarga = trim(fgets(STDIN));
                                ${"pasajero" . (count($arregloInfoPasajerosCarga) + 1)} = new Pasajero ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga);
                                array_push($arregloInfoPasajerosCarga, ${"pasajero" . (count($arregloInfoPasajerosCarga) + 1)});
                                echo "\n" . "El pasajero se há agregado correctamente al viaje. \n";
                                $comprobacion = true;
                            } elseif ($dniCarga == ($arregloInfoPasajerosCarga[$i] -> getDni())) {
                                echo "\n" . "El pasajero que intenta cargar ya se encuentra en el viaje. \n";
                                $comprobacion = true;
                            } elseif ($i < (count($arregloInfoPasajerosCarga) - 1)) {
                                $i++;
                            } else {
                                echo "\n" . "Ingrese el nombre del pasajero nuevo: ";
                                $nombrePasajeroCarga = trim(fgets(STDIN));
                                echo "Ingrese el apellido del pasajero: ";
                                $apellidoPasajeroCarga = trim(fgets(STDIN));
                                echo "Ingrese el teléfono del pasajero: ";
                                $telefonoCarga = trim(fgets(STDIN));
                                ${"pasajero" . (count($arregloInfoPasajerosCarga) + 1)} = new Pasajero ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga);
                                array_push($arregloInfoPasajerosCarga, ${"pasajero" . (count($arregloInfoPasajerosCarga) + 1)});
                                echo "\n" . "El nuevo pasajero se há agregado correctamente al viaje. \n";
                                $comprobacion = true;
                            }
                        } while ($comprobacion == false);
                        if($contadorPasajeros < $cantMaxPasajerosCarga) {
                            echo "¿Desea ingresar otro pasajero?: Seleccione una opción: \n" . 
                            "1) Si \n" . 
                            "2) No \n";
                            echo "Respuesta: ";
                            $respuesta = trim(fgets(STDIN));
                            if ($respuesta == "1") {
                                $contadorPasajeros++;
                            } else {
                                echo "\n" . "Se ha/n cargado " . $contadorPasajeros . " pasajero/s correctamente. \n \n";
                            }
                        } else {
                            echo "\n" . "Ha llegado a la cantidad máxima de pasajeros del viaje. \n \n";
                            $respuesta = "2";
                        }
                    } while ($respuesta == "1");
                    echo "Ingrese el número de empleado del responsable del viaje: ";
                    $numeroEmpleadoCarga = trim(fgets(STDIN));
                    echo "Ingrese el número de licencia del responsable del viaje: ";
                    $numeroLicenciaCarga = trim(fgets(STDIN));
                    echo "Ingrese el nombre del responsable del viaje: ";
                    $nombreResponsableVCarga = trim(fgets(STDIN));
                    echo "Ingrese el apellido del responsable del viaje: ";
                    $apellidoResponsableVCarga = trim(fgets(STDIN));
                    $objResponsableVCarga = new ResponsableV($numeroEmpleadoCarga, $numeroLicenciaCarga, $nombreResponsableVCarga, $apellidoResponsableVCarga);
                    echo "\n" . "Su viaje a sido cargado correctamente. \n";
                    $viaje = new Viaje($codigoViajeCarga, $destinoCarga, $cantMaxPasajerosCarga, $arregloInfoPasajerosCarga, $objResponsableVCarga);
                    $existeViaje = true;
                }
                break;
            case 2:
                //Menú principal - Modificar el viaje.
                if ($existeViaje == true) {
                    do {
                        $opcion = menuModificarViaje();
                        switch ($opcion) {
                            case 1:
                                //Menú modificar viaje - Cambiar el código del viaje.
                                echo "\n" . "Ingresa el código del viaje: ";
                                $codigoViajeModificado = trim(fgets(STDIN));
                                $viaje -> setCodigoViaje($codigoViajeModificado);
                                echo "El código del viaje se há modificado con éxito. \n";
                                break;
                            case 2:
                                //Menú modificar viaje - Cambiar el destino del viaje.
                                echo "\n" . "Ingresa el destino del viaje: ";
                                $destinoModificado = trim(fgets(STDIN));
                                $viaje -> setDestino($destinoModificado);
                                echo "El destino del viaje se há modificado con éxito. \n";
                                break;
                            case 3:
                                //Menú modificar viaje - Cambiar la cantidad máxima de pasajeros del viaje.
                                echo "\n" . "Ingresa la cantidad máxima de pasajeros del viaje: ";
                                $cantMaxPasajerosModificado = trim(fgets(STDIN));
                                if ($cantMaxPasajerosModificado <= count($viaje -> getArregloInfoPasajeros())) {
                                    echo "\n" . "La cantidad de pasajeros actuales es superior o igual a la ingresada. \n" . 
                                    "Debe ingresar una cantidad máxima de pasajeros mayor a " . count($viaje -> getArregloInfoPasajeros()) . ". \n";
                                } else {
                                    $viaje -> setCantMaxPasajeros($cantMaxPasajerosModificado);
                                    echo "La cantidad máxima de pasajeros del viaje se há modificado con éxito. \n";
                                }
                                break;
                            case 4:
                                //Menú modificar viaje - Cambiar los datos de un pasajero.
                                echo "\n" . "Ingrese el DNI del pasajero que desea modificar: ";
                                $dniPasajero = trim(fgets(STDIN));
                                $arregloInfoPasajerosModificado = $viaje -> getArregloInfoPasajeros();
                                $i = 0;
                                $comprobacion = false;
                                do {
                                    if ($dniPasajero == ($arregloInfoPasajerosModificado[$i] -> getDni())) {
                                        $opcion = menuModificarPasajero();
                                        switch ($opcion) {
                                            case 1:
                                                //Menú modificar pasajero - Cambiar el nombre del pasajero.
                                                echo "\n" . "Ingrese el nombre del pasajero: ";
                                                $nombrePasajeroCarga = trim(fgets(STDIN));
                                                $arregloInfoPasajerosModificado[$i] -> setNombrePasajero($nombrePasajeroCarga);
                                                $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                echo "El nombre del pasajero se há modificado con éxito. \n";
                                                break;
                                            case 2:
                                                //Menú modificar pasajero - Cambiar el apellido del pasajero.
                                                echo "\n" . "Ingrese el apellido del pasajero: ";
                                                $apellidoPasajeroCarga = trim(fgets(STDIN));
                                                $arregloInfoPasajerosModificado[$i] -> setApellidoPasajero($apellidoPasajeroCarga);
                                                $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                echo "El apellido del pasajero se há modificado con éxito. \n";
                                                break;
                                            case 3:
                                                //Menú modificar pasajero - Cambiar el telefono del pasajero.
                                                echo "\n" . "Ingrese el teléfono del pasajero: ";
                                                $telefonoCarga = trim(fgets(STDIN));
                                                $arregloInfoPasajerosModificado[$i] -> setTelefono($telefonoCarga);
                                                $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                echo "El teléfono del pasajero se há modificado con éxito. \n";
                                                break;
                                            case 4:
                                                $comprobacion = true;
                                        }
                                    } elseif ($i < (count($arregloInfoPasajerosModificado) - 1)) {
                                        $i++;
                                    } else {
                                        echo "El DNI ingresado no corresponde a un pasajero. \n";
                                        $comprobacion = true;
                                    }
                                } while ($comprobacion == false);
                                break;
                            case 5:
                                //Menú modificar viaje - Agregar un pasajero nuevo.
                                $arregloInfoPasajerosModificado = $viaje -> getArregloInfoPasajeros();
                                if(count($arregloInfoPasajerosModificado) < $viaje -> getCantMaxPasajeros()) {
                                    echo "Ingrese el DNI del pasajero: ";
                                    $dniCarga = trim(fgets(STDIN));
                                    $i = 0;
                                    $comprobacion = false;
                                    do{
                                        if($dniCarga == ($arregloInfoPasajerosModificado[$i] -> getDni())) {
                                            echo "\n" . "El pasajero que intenta cargar ya se encuentra en el viaje. \n";
                                            $comprobacion = true;
                                        } elseif ($i < (count($arregloInfoPasajerosModificado) - 1)) {
                                            $i++;
                                        } else {
                                            echo "\n" . "Ingrese el nombre del pasajero nuevo: ";
                                            $nombrePasajeroCarga = trim(fgets(STDIN));
                                            echo "Ingrese el apellido del pasajero: ";
                                            $apellidoPasajeroCarga = trim(fgets(STDIN));
                                            echo "Ingrese el teléfono del pasajero: ";
                                            $telefonoCarga = trim(fgets(STDIN));
                                            ${"pasajero" . (count($arregloInfoPasajerosModificado) + 1)} = new Pasajero ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga);
                                            array_push($arregloInfoPasajerosModificado, ${"pasajero" . (count($arregloInfoPasajerosModificado) + 1)});
                                            $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                            echo "\n" . "El nuevo pasajero se há agregado correctamente al viaje. \n";
                                            $comprobacion = true;
                                        }
                                    } while ($comprobacion == false);
                                } else {
                                    echo "\n" . "Ha llegado a la cantidad máxima de pasajeros del viaje. \n";
                                }
                                break;
                            case 6:
                                //Menú modificar viaje - Cambiar los datos del responsable del viaje.
                                $objResponsableVCarga = $viaje -> getObjResponsableV();
                                echo "Ingrese el número de empleado del responsable del viaje: ";
                                $numeroEmpleadoCarga = trim(fgets(STDIN));
                                $objResponsableVCarga -> setNumeroEmpleado($numeroEmpleadoCarga);
                                echo "Ingrese el número de licencia del responsable del viaje: ";
                                $numeroLicenciaCarga = trim(fgets(STDIN));
                                $objResponsableVCarga -> setNumeroLicencia($numeroLicenciaCarga);
                                echo "Ingrese el nombre del responsable del viaje: ";
                                $nombreResponsableVCarga = trim(fgets(STDIN));
                                $objResponsableVCarga -> setNombreResponsableV($nombreResponsableVCarga);
                                echo "Ingrese el apellido del responsable del viaje: ";
                                $apellidoResponsableVCarga = trim(fgets(STDIN));
                                $objResponsableVCarga -> setApellidoResponsableV($apellidoResponsableVCarga);
                                echo "El responsable del viaje se há modificado con éxito. \n";
                                $viaje -> setObjResponsableV($objResponsableVCarga);
                                break;
                        }
                    } while ($opcion != 7);
                } else {
                    echo "\n" . "Su viaje aún no tiene información cargada. \n";
                }
                break;
            case 3:
                //Menú principal - Ver la información del viaje.
                if ($existeViaje == true) {
                    echo $viaje;
                } else {
                    echo "\n" . "Su viaje aún no tiene información cargada. \n";
                }
                break;
            case 4:
                //Menú principal - Finalizar el programa.
                echo "\n" . "El programa há finalizado. \n";
                break;
        }
    } while ($opcion != 4);

?>