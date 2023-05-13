<?php

    include_once ("Pasajero.php");
    include_once ("PasajeroEstandar.php");
    include_once ("PasajeroVip.php");
    include_once ("PasajeroEspecial.php");
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
        "2) Modificar informacion del viaje. \n" . 
        "3) Ver la información del viaje. \n" . 
        "4) Vender pasaje. \n" .
        "5) Salir. \n" . 
        "¿Qué desea hacer? Seleccione una opcion: ";
        $resultadoMP = solicitarNumeroEntre (1, 5);
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
        "5) Cambiar los datos del responsable del viaje. \n" . 
        "6) Cambiar el costo del viaje. \n" . 
        "7) Cambiar la suma de los costos abonados por los pasajeros del viaje. \n" . 
        "8) Volver al menú principal. \n" . 
        "¿Qué desea modificar? Seleccione una opcion: ";
        $resultadoMMV = solicitarNumeroEntre (1, 8);
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
        "4) Cambiar el número de asiento del pasajero. \n" . 
        "5) Cambiar el número de ticket del pasajero. \n" . 
        "6) Cambiar el número de viajero frecuente del pasajero.   (Solo para pasajeros vip) \n" . 
        "7) Cambiar la cantidad de millas del pasajero.            (Solo para pasajeros vip) \n" . 
        "8) Cambiar la necesidad de sillas de ruedas del pasajero. (Solo para pasajeros con necesidades especiales) \n" . 
        "9) Cambiar la necesidad de asistencia del pasajero.       (Solo para pasajeros con necesidades especiales) \n" . 
        "10) Cambiar la necesidad de comida especial del pasajero. (Solo para pasajeros con necesidades especiales) \n" . 
        "11) Volver al menú modificar viaje. \n" . 
        "¿Qué desea modificar? Seleccione una opcion: ";
        $resultadoMMP = solicitarNumeroEntre (1, 11);
        return $resultadoMMP;
    }

    /**
     * Muestra el menu de selección de tipo de pasajero, solicita una opcion valida y retorna la misma.
     * @return string
     */
    function menuSeleccionTipoPasajero() {
        echo "\n" . "MENÚ DE SELECCIÓN DE TIPO DE PASAJERO: \n" . 
        "1) Pasajero estandar. \n" . 
        "2) Pasajero vip. \n" . 
        "3) Pasajero con necesidades especiales. \n" . 
        "4) Volver al menú principal. \n" . 
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
                    echo "Ingrese el número de empleado del responsable del viaje: ";
                    $numeroEmpleadoCarga = trim(fgets(STDIN));
                    echo "Ingrese el número de licencia del responsable del viaje: ";
                    $numeroLicenciaCarga = trim(fgets(STDIN));
                    echo "Ingrese el nombre del responsable del viaje: ";
                    $nombreResponsableVCarga = trim(fgets(STDIN));
                    echo "Ingrese el apellido del responsable del viaje: ";
                    $apellidoResponsableVCarga = trim(fgets(STDIN));
                    $objResponsableVCarga = new ResponsableV($numeroEmpleadoCarga, $numeroLicenciaCarga, $nombreResponsableVCarga, $apellidoResponsableVCarga);
                    echo "Ingrese el costo del viaje: ";
                    $costoCarga = trim(fgets(STDIN));
                    echo "\n" . "Su viaje a sido cargado correctamente. \n";
                    $viaje = new Viaje($codigoViajeCarga, $destinoCarga, $cantMaxPasajerosCarga, [], $objResponsableVCarga, $costoCarga, 0);
                    $existeViaje = true;
                }
                break;
            case 2:
                //Menú principal - Modificar información del viaje.
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
                                if ($viaje -> getArregloInfoPasajeros() == []) {
                                    echo "\n" . "Aún no se vendió ningún pasaje, por lo cual el viaje aún no cuenta con ningún pasajero. \n";
                                } else {
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
                                                    //Menú modificar pasajero - Cambiar el número de asiento del pasajero.
                                                    echo "\n" . "Ingrese el número de asiento del pasajero: ";
                                                    $numAsientoCarga = trim(fgets(STDIN));
                                                    $arregloInfoPasajerosModificado[$i] -> setNumAsiento($numAsientoCarga);
                                                    $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                    echo "El número de asiento se há modificado con éxito. \n";
                                                case 5:
                                                    //Menú modificar pasajero - Cambiar el número de ticket del pasajero.
                                                    echo "\n" . "Ingrese el número de ticket del pasajero: ";
                                                    $numTicketCarga = trim(fgets(STDIN));
                                                    $arregloInfoPasajerosModificado[$i] -> setNumTicket($numTicketCarga);
                                                    $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                    echo "El número de ticket se há modificado con éxito. \n";
                                                case 6:
                                                    //Menú modificar pasajero - Cambiar el número de viajero frecuente del pasajero.
                                                    if (get_class($arregloInfoPasajerosModificado[$i]) ==  "PasajeroVip") {
                                                        echo "\n" . "Ingrese el número de viajero frecuente del pasajero: ";
                                                        $numViajeroFrecuenteCarga = trim(fgets(STDIN));
                                                        $arregloInfoPasajerosModificado[$i] -> setNumViajeroFrecuente($numViajeroFrecuenteCarga);
                                                        $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                        echo "El número de viajero frecuente se há modificado con éxito. \n";
                                                    } else {
                                                        echo "El pasajero que desea modificar no es un pasajero vip. Por lo cual no puede modificar esta información. \n";
                                                    }
                                                    break;
                                                case 7:
                                                    //Menú modificar pasajero - Cambiar las millas del pasajero.
                                                    if (get_class($arregloInfoPasajerosModificado[$i]) ==  "PasajeroVip") {
                                                        echo "\n" . "Ingrese la cantidad de millas del pasajero: ";
                                                        $millasCarga = trim(fgets(STDIN));
                                                        $arregloInfoPasajerosModificado[$i] -> setMillas($millasCarga);
                                                        $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                        echo "La cantidad de millas se há modificado con éxito. \n";
                                                    } else {
                                                        echo "El pasajero que desea modificar no es un pasajero vip. Por lo cual no puede modificar esta información. \n";
                                                    }
                                                    break;
                                                case 8;
                                                    //Menú modificar pasajero - Cambiar la necesidad de sillas de ruedas del pasajero.
                                                    if (get_class($arregloInfoPasajerosModificado[$i]) ==  "PasajeroEspecial") {
                                                        if ($arregloInfoPasajerosModificado[$i] -> getSillaRuedas() == true) {
                                                            $arregloInfoPasajerosModificado[$i] -> setSillaRuedas(false);
                                                            $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                            echo "Se desactivo la necesidad de silla de ruedas del pasajero. \n";
                                                        } elseif ($arregloInfoPasajerosModificado[$i] -> getSillaRuedas() == false) {
                                                            $arregloInfoPasajerosModificado[$i] -> setSillaRuedas(true);
                                                            $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                            echo "Se activo la necesidad de silla de ruedas del pasajero. \n";
                                                        }
                                                    } else {
                                                        echo "El pasajero que desea modificar no es un pasajero con necesidades especiales. Por lo cual no puede modificar esta información. \n";
                                                    }
                                                    break;
                                                case 9:
                                                    //Menú modificar pasajero - Cambiar la necesidad de asistencia del pasajero.
                                                    if (get_class($arregloInfoPasajerosModificado[$i]) ==  "PasajeroEspecial") {
                                                        if ($arregloInfoPasajerosModificado[$i] -> getAsistencia() == true) {
                                                            $arregloInfoPasajerosModificado[$i] -> setAsistencia(false);
                                                            $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                            echo "Se desactivo la necesidad de asistencia del pasajero. \n";
                                                        } elseif ($arregloInfoPasajerosModificado[$i] -> getAsistencia() == false) {
                                                            $arregloInfoPasajerosModificado[$i] -> setAsistencia(true);
                                                            $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                            echo "Se activo la necesidad de asistencia del pasajero. \n";
                                                        }
                                                    } else {
                                                        echo "El pasajero que desea modificar no es un pasajero con necesidades especiales. Por lo cual no puede modificar esta información. \n";
                                                    }
                                                    break;
                                                case 10;
                                                    //Menú modificar pasajero - Cambiar la necesidad de comida especial del pasajero.
                                                    if (get_class($arregloInfoPasajerosModificado[$i]) ==  "PasajeroEspecial") {
                                                        if ($arregloInfoPasajerosModificado[$i] -> getComidaEspecial() == true) {
                                                            $arregloInfoPasajerosModificado[$i] -> setComidaEspecial(false);
                                                            $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                            echo "Se desactivo la necesidad de comida especial del pasajero. \n";
                                                        } elseif ($arregloInfoPasajerosModificado[$i] -> getComidaEspecial() == false) {
                                                            $arregloInfoPasajerosModificado[$i] -> setComidaEspecial(true);
                                                            $viaje -> setArregloInfoPasajeros($arregloInfoPasajerosModificado);
                                                            echo "Se activo la necesidad de comida especial del pasajero. \n";
                                                        }
                                                    } else {
                                                        echo "El pasajero que desea modificar no es un pasajero con necesidades especiales. Por lo cual no puede modificar esta información. \n";
                                                    }
                                                    break;
                                                case 11:
                                                    $comprobacion = true;
                                            }
                                        } elseif ($i < (count($arregloInfoPasajerosModificado) - 1)) {
                                            $i++;
                                        } else {
                                            echo "El DNI ingresado no corresponde a un pasajero. \n";
                                            $comprobacion = true;
                                        }
                                    } while ($comprobacion == false);
                                }
                                break;
                            case 5:
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
                            case 6:
                                //Menú modificar viaje - Cambiar el costo del viaje.
                                echo "\n" . "Ingresa el costo del viaje: ";
                                $costoModificado = trim(fgets(STDIN));
                                $viaje -> setCosto($costoModificado);
                                echo "El costo del viaje se há modificado con éxito. \n";
                                break;
                            case 7:
                                //Menú modificar viaje - Cambiar la suma de los costos abonados por los pasajeros del viaje.
                                echo "\n" . "Ingresa la suma de los costos abonados por los pasajeros del viaje: ";
                                $sumaCostosAbonadosModificado = trim(fgets(STDIN));
                                $viaje -> setSumaCostosAbonados($sumaCostosAbonadosModificado);
                                echo "La suma de los costos abonados por los pasajeros del viaje se há modificado con éxito. \n";
                                break;
                        }
                    } while ($opcion != 8);
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
                //Menú principal - Vender pasaje.
                do {
                    $opcion = menuSeleccionTipoPasajero();
                    switch ($opcion) {
                        case 1:
                            //Menú de selección de tipo de pasajero  - Pasajero estandar.
                            if ($viaje -> hayPasajesDisponibles() == true) {
                                echo "Ingrese el DNI del pasajero: ";
                                $dniCarga = trim(fgets(STDIN));
                                $comprobacion = false;
                                $i = 0;
                                $arregloInfoPasajerosCarga = $viaje -> getArregloInfoPasajeros();
                                do{
                                    if ($arregloInfoPasajerosCarga == null) {
                                        echo "Ingrese el nombre del pasajero: ";
                                        $nombrePasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el apellido del pasajero: ";
                                        $apellidoPasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el teléfono del pasajero: ";
                                        $telefonoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de asiento del pasajero: ";
                                        $numAsientoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de ticket del pasajero: ";
                                        $numTicketCarga = trim(fgets(STDIN));
                                        $pasajero = new PasajeroEstandar ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga, $numAsientoCarga, $numTicketCarga);
                                        $comprobacion = true;
                                        $viaje -> venderPasaje($pasajero);
                                        echo "\n" . "El viaje se vendió correctamente y el pasajero fue incorporado al viaje. \n";
                                    } elseif ($dniCarga == ($arregloInfoPasajerosCarga[$i] -> getDni())) {
                                        echo "\n" . "El pasajero que intenta cargar ya se encuentra en el viaje. \n";
                                        $comprobacion = true;
                                    } elseif ($i < (count($arregloInfoPasajerosCarga) - 1)) {
                                        $i++;
                                    } else {
                                        echo "Ingrese el nombre del pasajero: ";
                                        $nombrePasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el apellido del pasajero: ";
                                        $apellidoPasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el teléfono del pasajero: ";
                                        $telefonoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de asiento del pasajero: ";
                                        $numAsientoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de ticket del pasajero: ";
                                        $numTicketCarga = trim(fgets(STDIN));
                                        $pasajero = new PasajeroEstandar ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga, $numAsientoCarga, $numTicketCarga);
                                        $comprobacion = true;
                                        $viaje -> venderPasaje($pasajero);
                                        echo "\n" . "El viaje se vendió correctamente y el pasajero fue incorporado al viaje. \n";
                                    }
                                } while ($comprobacion == false);
                            }
                            break;
                        case 2:
                            //Menú de selección de tipo de pasajero  - Pasajero vip.
                            if ($viaje -> hayPasajesDisponibles() == true) {
                                echo "Ingrese el DNI del pasajero: ";
                                $dniCarga = trim(fgets(STDIN));
                                $comprobacion = false;
                                $i = 0;
                                $arregloInfoPasajerosCarga = $viaje -> getArregloInfoPasajeros();
                                do{
                                    if ($arregloInfoPasajerosCarga == null) {
                                        echo "Ingrese el nombre del pasajero: ";
                                        $nombrePasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el apellido del pasajero: ";
                                        $apellidoPasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el teléfono del pasajero: ";
                                        $telefonoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de asiento del pasajero: ";
                                        $numAsientoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de ticket del pasajero: ";
                                        $numTicketCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de viajero frecuente del pasajero: ";
                                        $numViajeroFrecuenteCarga = trim(fgets(STDIN));
                                        echo "Ingrese las millas del pasajero: ";
                                        $millasCarga = trim(fgets(STDIN));
                                        $pasajero = new PasajeroVip ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga, $numAsientoCarga, $numTicketCarga, $numViajeroFrecuenteCarga, $millasCarga);
                                        $comprobacion = true;
                                        $viaje -> venderPasaje($pasajero);
                                        echo "\n" . "El viaje se vendió correctamente y el pasajero fue incorporado al viaje. \n";
                                    } elseif ($dniCarga == ($arregloInfoPasajerosCarga[$i] -> getDni())) {
                                        echo "\n" . "El pasajero que intenta cargar ya se encuentra en el viaje. \n";
                                        $comprobacion = true;
                                    } elseif ($i < (count($arregloInfoPasajerosCarga) - 1)) {
                                        $i++;
                                    } else {
                                        echo "Ingrese el nombre del pasajero: ";
                                        $nombrePasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el apellido del pasajero: ";
                                        $apellidoPasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el teléfono del pasajero: ";
                                        $telefonoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de asiento del pasajero: ";
                                        $numAsientoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de ticket del pasajero: ";
                                        $numTicketCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de viajero frecuente del pasajero: ";
                                        $numViajeroFrecuenteCarga = trim(fgets(STDIN));
                                        echo "Ingrese las millas del pasajero: ";
                                        $millasCarga = trim(fgets(STDIN));
                                        $pasajero = new PasajeroVip ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga, $numAsientoCarga, $numTicketCarga, $numViajeroFrecuenteCarga, $millasCarga);
                                        $comprobacion = true;
                                        $viaje -> venderPasaje($pasajero);
                                        echo "\n" . "El viaje se vendió correctamente y el pasajero fue incorporado al viaje. \n";
                                    }
                                } while ($comprobacion == false);
                            }
                            break;
                        case 3:
                            //Menú de selección de tipo de pasajero  - Pasajero con necesidades especiales.
                            if ($viaje -> hayPasajesDisponibles() == true) {
                                echo "Ingrese el DNI del pasajero: ";
                                $dniCarga = trim(fgets(STDIN));
                                $comprobacion = false;
                                $i = 0;
                                $arregloInfoPasajerosCarga = $viaje -> getArregloInfoPasajeros();
                                do{
                                    if ($arregloInfoPasajerosCarga == null) {
                                        echo "Ingrese el nombre del pasajero: ";
                                        $nombrePasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el apellido del pasajero: ";
                                        $apellidoPasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el teléfono del pasajero: ";
                                        $telefonoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de asiento del pasajero: ";
                                        $numAsientoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de ticket del pasajero: ";
                                        $numTicketCarga = trim(fgets(STDIN));
                                        echo "¿Necesita silla de ruedas?: (1) Si / (2) No\n";
                                        echo "Respuesta: ";
                                        $respuesta1 = solicitarNumeroEntre(1, 2);
                                        if ($respuesta1 == 1) {
                                            $sillaRuedasCarga = true;
                                        } else {
                                            $sillaRuedasCarga = false;
                                        }
                                        echo "¿Necesita asistencia?: (1) Si / (2) No\n";
                                        echo "Respuesta: ";
                                        $respuesta2 = solicitarNumeroEntre(1, 2);
                                        if ($respuesta2 == 1) {
                                            $asistenciaCarga = true;
                                        } else {
                                            $asistenciaCarga = false;
                                        }
                                        echo "¿Necesita comida especial?: (1) Si / (2) No\n";
                                        echo "Respuesta: ";
                                        $respuesta3 = solicitarNumeroEntre(1, 2);
                                        if ($respuesta3 == 1) {
                                            $comidaEspecialCarga = true;
                                        } else {
                                            $comidaEspecialCarga = false;
                                        }
                                        $pasajero = new PasajeroEspecial ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga, $numAsientoCarga, $numTicketCarga, $sillaRuedasCarga, $asistenciaCarga, $comidaEspecialCarga);
                                        $comprobacion = true;
                                        $viaje -> venderPasaje($pasajero);
                                        echo "\n" . "El viaje se vendió correctamente y el pasajero fue incorporado al viaje. \n";
                                    } elseif ($dniCarga == ($arregloInfoPasajerosCarga[$i] -> getDni())) {
                                        echo "\n" . "El pasajero que intenta cargar ya se encuentra en el viaje. \n";
                                        $comprobacion = true;
                                    } elseif ($i < (count($arregloInfoPasajerosCarga) - 1)) {
                                        $i++;
                                    } else {
                                        echo "Ingrese el nombre del pasajero: ";
                                        $nombrePasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el apellido del pasajero: ";
                                        $apellidoPasajeroCarga = trim(fgets(STDIN));
                                        echo "Ingrese el teléfono del pasajero: ";
                                        $telefonoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de asiento del pasajero: ";
                                        $numAsientoCarga = trim(fgets(STDIN));
                                        echo "Ingrese el número de ticket del pasajero: ";
                                        $numTicketCarga = trim(fgets(STDIN));
                                        echo "¿Necesita silla de ruedas?: (1) Si / (2) No\n";
                                        echo "Respuesta: ";
                                        $respuesta1 = solicitarNumeroEntre(1, 2);
                                        if ($respuesta1 == 1) {
                                            $sillaRuedasCarga = true;
                                        } else {
                                            $sillaRuedasCarga = false;
                                        }
                                        echo "¿Necesita asistencia?: (1) Si / (2) No\n";
                                        echo "Respuesta: ";
                                        $respuesta2 = solicitarNumeroEntre(1, 2);
                                        if ($respuesta2 == 1) {
                                            $asistenciaCarga = true;
                                        } else {
                                            $asistenciaCarga = false;
                                        }
                                        echo "¿Necesita comida especial?: (1) Si / (2) No\n";
                                        echo "Respuesta: ";
                                        $respuesta3 = solicitarNumeroEntre(1, 2);
                                        if ($respuesta3 == 1) {
                                            $comidaEspecialCarga = true;
                                        } else {
                                            $comidaEspecialCarga = false;
                                        }
                                        $pasajero = new PasajeroEspecial ($nombrePasajeroCarga, $apellidoPasajeroCarga, $dniCarga, $telefonoCarga, $numAsientoCarga, $numTicketCarga, $sillaRuedasCarga, $asistenciaCarga, $comidaEspecialCarga);
                                        $comprobacion = true;
                                        $viaje -> venderPasaje($pasajero);
                                        echo "\n" . "El viaje se vendió correctamente y el pasajero fue incorporado al viaje. \n";
                                    }
                                } while ($comprobacion == false);
                            }
                            break;
                    }
                } while ($opcion != 4);
                break;
            case 5:
                //Menú principal - Finalizar el programa.
                echo "\n" . "El programa há finalizado. \n";
                break;
        }
    } while ($opcion != 5);

?>