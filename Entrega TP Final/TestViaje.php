<?php

    include_once ("BaseDatos.php");
    include_once ("Empresa.php");
    include_once ("ResponsableV.php");
    include_once ("Viaje.php");
    include_once ("Pasajero.php");

    /**
     * Corrobora que un número se encuentre entre un mínimo y un máximo.
     * @param int $min
     * @param int $max
     * @return string
     */
    function numeroEntre($min, $max) {
        $num = (trim(fgets(STDIN)));
        while ((((int)($num) != $num)) || (!($num >= $min && $num <= $max))) { echo
            "├──────────────────────────────────┤" . "\n" .
            "│███████ OPCIÓN INCORRECTA ████████│" . "\n" .
            "├────────────────────────────────┬─┤" . "\n" .
            "│ OPCIÓN ELEGIDA                 │"; $num = trim(fgets(STDIN));
        }
        return $num;
    }

    /**
     * Corrobora que el carácter ingresado sea numérico.
     * @param string
     * @return string
     */
    function esNumero($num) {
        while (!(is_numeric($num)) || $num < 0) { echo
            "├──────────────────────────────────┤" . "\n" .
            "│███████ INGRESO NO VÁLIDO ████████│" . "\n" .
            "├────────────────────────────────┬─┤" . "\n" .
            "│ INTENTE OTRA VEZ:              │"; $num = trim(fgets(STDIN));
        }
        return $num;
    }

    /**
     * Muestra el menu del programa, solicita una opción valida y retorna la misma.
     * @return string
     */
    function menu() { echo "\n" .
        "┌──────────────────────────────────┐" . "\n" .
        "│████ TRABAJO FINAL ENTREGABLE ████│" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│  1 » Agregar empresa             │" . "\n" .
        "│  2 » Agregar responsable         │" . "\n" .
        "│  3 » Agregar viaje               │" . "\n" .
        "│  4 » Agregar pasajero            │" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│  5 » Modificar empresa           │" . "\n" .
        "│  6 » Modificar responsable       │" . "\n" .
        "│  7 » Modificar viaje             │" . "\n" .
        "│  8 » Modificar pasajero          │" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│  9 » Eliminar empresa            │" . "\n" .
        "│ 10 » Eliminar responsable        │" . "\n" .
        "│ 11 » Eliminar viaje              │" . "\n" .
        "│ 12 » Eliminar pasajero           │" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│ 13 » Mostrar empresa             │" . "\n" .
        "│ 14 » Mostrar responsables        │" . "\n" .
        "│ 15 » Mostrar viajes              │" . "\n" .
        "│ 16 » Mostrar pasajeros           │" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│ 17 » Cargar BD de prueba         │" . "\n" .
        "│ 18 » Salir                       │" . "\n" .
        "├────────────────────────────────┬─┤" . "\n" .
        "│ OPCIÓN ELEGIDA                 │"; $opcionMenu = numeroEntre (1, 18); echo
        "└────────────────────────────────┴─┘" . "\n";
        return $opcionMenu;
    }

    /**
     * Muestra el menu de modificación de una empresa, solicita una opción valida y retorna la misma.
     * @return string
     */
    function menuModificarEmpresa() { echo "\n" .
        "┌──────────────────────────────────┐" . "\n" .
        "│  1 » Cambiar nombre              │" . "\n" .
        "│  2 » Cambiar dirección           │" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│  3 » Volver al menú principal    │" . "\n" .
        "├────────────────────────────────┬─┤" . "\n" .
        "│ OPCIÓN ELEGIDA                 │"; $opcionMenu = numeroEntre (1, 3); echo
        "└────────────────────────────────┴─┘";
        return $opcionMenu;
    }

    /**
     * Muestra el menu de modificación de responsable, solicita una opción valida y retorna la misma.
     * @return string
     */
    function menuModificarResponsable() { echo "\n" .
        "┌──────────────────────────────────┐" . "\n" .
        "│  1 » Cambiar licencia N°         │" . "\n" .
        "│  2 » Cambiar nombre              │" . "\n" .
        "│  3 » Cambiar apellido            │" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│  4 » Volver al menú principal    │" . "\n" .
        "├────────────────────────────────┬─┤" . "\n" .
        "│ OPCIÓN ELEGIDA                 │"; $opcionMenu = numeroEntre (1, 4); echo
        "└────────────────────────────────┴─┘";
        return $opcionMenu;
    }

    /**
     * Muestra el menu de modificación de viaje, solicita una opción valida y retorna la misma.
     * @return string
     */
    function menuModificarViaje() { echo "\n" .
        "┌──────────────────────────────────┐" . "\n" .
        "│  1 » Cambiar destino             │" . "\n" .
        "│  2 » Cambiar cant. max. pasaj.   │" . "\n" .
        "│  3 » Cambiar empresa             │" . "\n" .
        "│  4 » Cambiar responsable         │" . "\n" .
        "│  5 » Cambiar importe             │" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│  6 » Volver al menú principal    │" . "\n" .
        "├────────────────────────────────┬─┤" . "\n" .
        "│ OPCIÓN ELEGIDA                 │"; $opcionMenu = numeroEntre (1, 6); echo
        "└────────────────────────────────┴─┘";
        return $opcionMenu;
    }

    /**
     * Muestra el menu de modificación de pasajero, solicita una opción valida y retorna la misma.
     * @return string
     */
    function menuModificarPasajero() { echo "\n" .
        "┌──────────────────────────────────┐" . "\n" .
        "│  1 » Cambiar nombre              │" . "\n" .
        "│  2 » Cambiar apellido            │" . "\n" .
        "│  3 » Cambiar teléfono            │" . "\n" .
        "│  4 » Cambiar viaje               │" . "\n" .
        "├──────────────────────────────────┤" . "\n" .
        "│  5 » Volver al menú principal    │" . "\n" .
        "├────────────────────────────────┬─┤" . "\n" .
        "│ OPCIÓN ELEGIDA                 │"; $opcionMenu = numeroEntre (1, 5); echo
        "└────────────────────────────────┴─┘";
        return $opcionMenu;
    }

    /**
     * Retorna una lista con los datos de los objetos ingresados por parámetro.
     * @param array $colObjeto
     * @return string
     */
    function listaObjetos($colObjeto) {
        $listaObjetos = "";
        for($i = 0; $i < count($colObjeto); $i++) {
            if ($i < (count($colObjeto) - 1)) {
                $listaObjetos = $listaObjetos . $colObjeto[$i] . "\n";
            } else {
                $listaObjetos = $listaObjetos . $colObjeto[$i];
            }
        }
        if ($listaObjetos == "") {
            $listaObjetos = $listaObjetos .
            "┌──────────────────────────────────┐" . "\n" . 
            "│█████ NO HAY DATOS CARGADOS  █████│" . "\n" . 
            "└──────────────────────────────────┘";
        }
        return $listaObjetos;
    }

    /**
     * Retorna un mensaje de error de inserción.
     * @return string
     */
    function errorInsercion() { return
        "┌──────────────────────────────────┐" . "\n" .
        "│███ LA INSERCIÓN NO SE REALIZÓ ███│" . "\n" .
        "└──────────────────────────────────┘";
    }

    /**
     * Retorna un mensaje de error de eliminación.
     * @return string
     */
    function errorEliminacion() { return
        "┌──────────────────────────────────┐" . "\n" .
        "│██ LA ELIMINACIÓN NO SE REALIZÓ ██│" . "\n" .
        "└──────────────────────────────────┘";
    }

    /**
     * Retorna un mensaje de error de modificación.
     * @return string
     */
    function errorModificacion() { return
        "┌──────────────────────────────────┐" . "\n" .
        "│██ LA MODIFICACIÓN NO SE REALIZÓ █│" . "\n" .
        "└──────────────────────────────────┘";
    }

    do {
        $opcion = menu();
        switch ($opcion) {
            case 1: // Agregar empresa.
                // Creo un objeto empresa.
                $objEmpresa = new Empresa();
                // Listo todas las empresas de mi base de datos.
                $colEmpresa = $objEmpresa -> listar();
                echo listaObjetos($colEmpresa) . "\n";
                $base = new BaseDatos();
                $consulta = "SELECT count(*) AS cantidad FROM empresa";
                if ($base -> iniciar()) {
                    if ($base -> ejecutar ($consulta)) {
                        $registro = $base -> registro();
                        if ($registro['cantidad'] == 0) {
                            // Solicito los datos de la empresa.
                            echo "\n" .
                            "┌──────────────────────────────────┐" . "\n" .
                            "│ NOMBRE:    "; $enombreC = trim(fgets(STDIN)); echo
                            "│ DIRECCION: "; $edireccionC = trim(fgets(STDIN)); echo
                            "└──────────────────────────────────┘" . "\n";
                            // Cargo los datos de la empresa.
                            $base = new BaseDatos();
                            $consulta = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bdviajes' AND TABLE_NAME = 'empresa'";
                            if ($base -> Iniciar()) {
                                if ($base -> Ejecutar ($consulta)) {
                                    if ($row2 = $base -> Registro()) {
                                        $ultimoId = $row2["AUTO_INCREMENT"];
                                    }
                                };
                            }
                            $objEmpresa -> cargar ($ultimoId, $enombreC, $edireccionC);
                            $respuesta = $objEmpresa -> insertar();
                            if ($respuesta == true) {
                                $colEmpresa = $objEmpresa -> listar();
                                echo listaObjetos($colEmpresa);
                            } else {
                                echo errorInsercion();
                            }
                        } else {
                            echo errorInsercion();
                        }
                    } else {
                        echo errorInsercion();
                    }
                } else {
                    echo errorInsercion();
                }
                break;
            case 2: // Agregar responsable.
                // Creo un objeto responsable.
                $objResponsable = new ResponsableV();
                // Listo todos los responsables de mi base de datos.
                $colResponsable = $objResponsable -> listar();
                echo listaObjetos($colResponsable);
                // Solicito los datos del responsable.
                echo "\n" .
                "┌──────────────────────────────────┐" . "\n" .
                "│ LICENCIA N°: "; esNumero($rnumerolicenciaC = trim(fgets(STDIN))); echo
                "│ NOMBRE:      "; $rnombreC = trim(fgets(STDIN)); echo
                "│ APELLIDO:    "; $rapellidoC = trim(fgets(STDIN)); echo
                "└──────────────────────────────────┘" . "\n";
                // Cargo los datos del responsable.
                $base = new BaseDatos();
                $consulta = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bdviajes' AND TABLE_NAME = 'responsable'";
                if ($base -> Iniciar()) {
                    if ($base -> Ejecutar ($consulta)) {
                        if ($row2 = $base -> Registro()) {
                            $ultimoId = $row2["AUTO_INCREMENT"];
                        }
                    };
                }
                $objResponsable -> cargar ($ultimoId, $rnumerolicenciaC, $rnombreC, $rapellidoC);
                $respuesta = $objResponsable -> insertar();
                if ($respuesta == true) {
                    $colResponsable = $objResponsable -> listar();
                    echo listaObjetos($colResponsable);
                } else {
                    echo errorInsercion();
                }
                break;
            case 3: // Agregar viaje.
                // Creo un objeto viaje.
                $objViaje = new Viaje();
                // Listo todos los viajes de mi base de datos.
                $colViaje = $objViaje -> listar();
                echo listaObjetos($colViaje);
                // Solicito los datos del viaje.
                echo "\n" .
                "┌──────────────────────────────────┐" . "\n" .
                "│ DESTINO:           "; $vdestinoC = trim(fgets(STDIN)); echo
                "│ CANT. MAX. PASAJ.: "; esNumero($vcantmaxpasajerosC = trim(fgets(STDIN))); echo
                "│ IMPORTE:           "; esNumero($vimporteC = trim(fgets(STDIN))); echo
                "└──────────────────────────────────┘" . "\n";
                $objEmpresaC = new Empresa();
                $colEmpresa = $objEmpresaC -> listar();
                echo listaObjetos($colEmpresa);
                echo "\n" .
                "┌──────────────────────────────────┐" . "\n" .
                "│ ID EMPRESA:        "; $idempresaC = trim(fgets(STDIN)); echo
                "└──────────────────────────────────┘" . "\n";
                $base = new BaseDatos();
                $consulta = "SELECT idempresa FROM empresa";
                if ($base -> iniciar()) {
                    if ($base -> ejecutar ($consulta)) {
                        $arregloEmpresa = array();
                        while ($registroEmpresa = $base -> registro()) {
                            array_push ($arregloEmpresa, $registroEmpresa['idempresa']);
                        }
                    } else {
                        echo errorInsercion();
                    }
                } else {
                    echo errorInsercion();
                }
                $comprobacion = true;
                $i = 0;
                while ($i < count($arregloEmpresa) && $comprobacion) {
                    if ($idempresaC == $arregloEmpresa[$i]) {
                        $comprobacion = false;
                    } else {
                        $i++;
                    }
                }
                if ($comprobacion == false) {
                    $objResponsableC = new ResponsableV();
                    $colResponsable = $objResponsableC -> listar();
                    echo listaObjetos($colResponsable);
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ EMPLEADO N°:        "; $rnumeroempleadoC = trim(fgets(STDIN)); echo
                    "└──────────────────────────────────┘" . "\n";
                    // Cargo los datos del viaje.
                    $objEmpresaC -> buscar($idempresaC);
                    $objResponsableC -> buscar($rnumeroempleadoC);
                    $base = new BaseDatos();
                    $consulta = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bdviajes' AND TABLE_NAME = 'viaje'";
                    if ($base -> Iniciar()) {
                        if ($base -> Ejecutar ($consulta)) {
                            if ($row2 = $base -> Registro()) {
                                $ultimoId = $row2["AUTO_INCREMENT"];
                            }
                        };
                    }
                    $objViaje -> cargar ($ultimoId, $vdestinoC, $vcantmaxpasajerosC, $objEmpresaC, $objResponsableC, $vimporteC);
                    $respuesta = $objViaje -> insertar();
                    if ($respuesta == true) {
                        $colViaje = $objViaje -> listar();
                        echo listaObjetos($colViaje);
                    } else {
                        echo errorInsercion();
                    }
                } else {
                    echo errorInsercion();
                }
                break;
            case 4: // Agregar pasajero.
                // Creo un objeto pasajero.
                $objPasajero = new Pasajero();
                // Listo todos los pasajeros de mi base de datos.
                $colPasajero = $objPasajero -> listar();
                echo listaObjetos($colPasajero);
                // Solicito los datos del pasajero.
                echo "\n" .
                "┌──────────────────────────────────┐" . "\n" .
                "│ DOCUMENTO: "; $pdocumentoC = trim(fgets(STDIN));
                $base = new BaseDatos();
                $consulta = "SELECT pdocumento FROM pasajero";
                if ($base -> iniciar()) {
                    if ($base -> ejecutar ($consulta)) {
                        $arregloPasajero = array();
                        while ($registroPasajero = $base -> registro()) {
                            array_push ($arregloPasajero, $registroPasajero['pdocumento']);
                        }
                    } else {
                        echo errorInsercion();
                    }
                } else {
                    echo errorInsercion();
                }
                $comprobacion = true;
                $i = 0;
                while ($i < count($arregloPasajero) && $comprobacion) {
                    if ($pdocumentoC == $arregloPasajero[$i]) { echo
                        "└──────────────────────────────────┘" . "\n";
                        echo errorInsercion();
                        $comprobacion = false;
                    } else {
                        $i++;
                    }
                }
                if ($comprobacion == true) {
                    echo
                    "│ NOMBRE:    "; $pnombreC = trim(fgets(STDIN)); echo
                    "│ APELLIDO:  "; $papellidoC = trim(fgets(STDIN)); echo
                    "│ TELEFONO:  "; esNumero($ptelefonoC = trim(fgets(STDIN))); echo
                    "└──────────────────────────────────┘" . "\n";
                    $objViajeC = new Viaje();
                    $colViaje = $objViajeC -> listar();
                    echo listaObjetos($colViaje);
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ ID VIAJE:  "; $idviajeC = trim(fgets(STDIN)); $objViajeC -> buscar($idviajeC); echo
                    "└──────────────────────────────────┘" . "\n";
                    $base = new BaseDatos();
                    $consulta = "SELECT count(*) AS cantidad FROM pasajero WHERE idviaje = " . $idviajeC;
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $registro = $base -> registro();
                            if ($objViajeC -> getVcantmaxpasajeros() > $registro['cantidad']) {
                                // Cargo los datos del pasajero.
                                $objPasajero -> cargar ($pdocumentoC, $pnombreC, $papellidoC, $ptelefonoC, $objViajeC -> getIdviaje());
                                $respuesta = $objPasajero -> insertar();
                                if ($respuesta == true) {
                                    $colPasajero = $objPasajero -> listar();
                                    echo listaObjetos($colPasajero);
                                } else {
                                    echo errorInsercion();
                                }
                            } else {
                                echo errorInsercion();
                            }
                        } else {
                            echo errorInsercion();
                        }
                    } else {
                        echo errorInsercion();
                    }
                }
                break;
            case 5: // Modificar empresa.
                // Creo un objeto empresa.
                $objEmpresa = new Empresa();
                // Listo todas las empresas de mi base de datos.
                $colEmpresa = $objEmpresa -> listar();
                echo listaObjetos($colEmpresa);
                // Selecciono la empresa que deseo modificar.
                if ($colEmpresa != []) {
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ ID: "; $idempresaBuscar = trim(fgets(STDIN));
                    $base = new BaseDatos();
                    $consulta = "SELECT idempresa FROM empresa";
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $arregloEmpresa = array();
                            while ($registroEmpresa = $base -> registro()) {
                                array_push ($arregloEmpresa, $registroEmpresa['idempresa']);
                            }
                        } else {
                            echo errorModificacion();
                        }
                    } else {
                        echo errorModificacion();
                    }
                    $comprobacion = true;
                    $i = 0;
                    while ($i < count($arregloEmpresa) && $comprobacion) {
                        if ($idempresaBuscar == $arregloEmpresa[$i]) {
                            $comprobacion = false;
                        } else {
                            $i++;
                        }
                    }
                    if ($comprobacion == false) {
                        echo
                        "└──────────────────────────────────┘";
                        $objEmpresa -> buscar ($idempresaBuscar);
                        do {
                            $opcion = menuModificarEmpresa();
                            switch ($opcion) {
                                case 1: // Cambiar nombre.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO NOMBRE: "; $enombreNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objEmpresa -> setEnombre ($enombreNuevo);
                                    $respuesta = $objEmpresa -> modificar();
                                    if ($respuesta == true) {
                                        $colEmpresa = $objEmpresa -> listar();
                                        echo listaObjetos($colEmpresa);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 2: // Cambiar dirección.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVA DIRECCIÓN: "; $edireccionNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objEmpresa -> setEdireccion ($edireccionNuevo);
                                    $respuesta = $objEmpresa -> modificar();
                                    if ($respuesta == true) {
                                        $colEmpresa = $objEmpresa -> listar();
                                        echo listaObjetos($colEmpresa);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                            }
                        } while ($opcion != 3);
                    } else {
                        echo
                        "└──────────────────────────────────┘" . "\n";
                        echo errorModificacion();
                    }
                }
                break;
            case 6: // Modificar responsable.
                // Creo un objeto responsable.
                $objResponsable = new ResponsableV();
                // Listo todos los responsables de mi base de datos.
                $colResponsable = $objResponsable -> listar();
                echo listaObjetos($colResponsable);
                // Selecciono el responsable que deseo modificar.
                if ($colResponsable != []) {
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ EMPLEADO N°: "; $rnumeroempleadoBuscar = trim(fgets(STDIN));
                    $base = new BaseDatos();
                    $consulta = "SELECT rnumeroempleado FROM responsable";
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $arregloResponsable = array();
                            while ($registroResponsable = $base -> registro()) {
                                array_push ($arregloResponsable, $registroResponsable['rnumeroempleado']);
                            }
                        } else {
                            echo errorModificacion();
                        }
                    } else {
                        echo errorModificacion();
                    }
                    $comprobacion = true;
                    $i = 0;
                    while ($i < count($arregloResponsable) && $comprobacion) {
                        if ($rnumeroempleadoBuscar == $arregloResponsable[$i]) {
                            $comprobacion = false;
                        } else {
                            $i++;
                        }
                    }
                    if ($comprobacion == false) {
                        echo
                        "└──────────────────────────────────┘";
                        $objResponsable -> buscar ($rnumeroempleadoBuscar);
                        do {
                            $opcion = menuModificarResponsable();
                            switch ($opcion) {
                                case 1: // Cambiar licencia N°.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVA LICENCIA N°: "; esNumero($rnumerolicenciaNuevo = trim(fgets(STDIN))); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objResponsable -> setRnumerolicencia ($rnumerolicenciaNuevo);
                                    $respuesta = $objResponsable -> modificar();
                                    if ($respuesta == true) {
                                        $colResponsable = $objResponsable -> listar();
                                        echo listaObjetos($colResponsable);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 2: // Cambiar nombre.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO NOMBRE: "; $rnombreNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objResponsable -> setRnombre ($rnombreNuevo);
                                    $respuesta = $objResponsable -> modificar();
                                    if ($respuesta == true) {
                                        $colResponsable = $objResponsable -> listar();
                                        echo listaObjetos($colResponsable);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 3: // Cambiar apellido.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO APELLIDO: "; $rapellidoNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objResponsable -> setRapellido ($rapellidoNuevo);
                                    $respuesta = $objResponsable -> modificar();
                                    if ($respuesta == true) {
                                        $colResponsable = $objResponsable -> listar();
                                        echo listaObjetos($colResponsable);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                            }
                        } while ($opcion != 4);
                    } else {
                        echo
                        "└──────────────────────────────────┘" . "\n";
                        echo errorModificacion();
                    }
                }
                break;
            case 7: // Modificar viaje.
                // Creo un objeto viaje.
                $objViaje = new Viaje();
                // Listo todos los viajes de mi base de datos.
                $colViaje = $objViaje -> listar();
                echo listaObjetos($colViaje);
                // Selecciono el viaje que deseo modificar.
                if ($colViaje != []) {
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ ID: "; $idviajeBuscar = trim(fgets(STDIN));
                    $base = new BaseDatos();
                    $consulta = "SELECT idviaje FROM viaje";
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $arregloViaje = array();
                            while ($registroViaje = $base -> registro()) {
                                array_push ($arregloViaje, $registroViaje['idviaje']);
                            }
                        } else {
                            echo errorModificacion();
                        }
                    } else {
                        echo errorModificacion();
                    }
                    $comprobacion = true;
                    $i = 0;
                    while ($i < count($arregloViaje) && $comprobacion) {
                        if ($idviajeBuscar == $arregloViaje[$i]) {
                            $comprobacion = false;
                        } else {
                            $i++;
                        }
                    }
                    if ($comprobacion == false) {
                        echo
                        "└──────────────────────────────────┘";
                        $objViaje -> buscar ($idviajeBuscar);
                        do {
                            $opcion = menuModificarViaje();
                            switch ($opcion) {
                                case 1: // Cambiar destino.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO DESTINO: "; $vdestinoNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objViaje -> setVdestino ($vdestinoNuevo);
                                    $respuesta = $objViaje -> modificar();
                                    if ($respuesta == true) {
                                        $colViaje = $objViaje -> listar();
                                        echo listaObjetos($colViaje);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 2: // Cambiar cantidad maxima de pasajeros.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVA CANT. MAX. PASAJ.: "; esNumero($vcantmaxpasajerosNuevo = trim(fgets(STDIN))); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $base = new BaseDatos();
                                    $consulta = "SELECT count(*) AS cantidad FROM pasajero WHERE idviaje = " . $idviajeBuscar;
                                    if ($base -> iniciar()) {
                                        if ($base -> ejecutar ($consulta)) {
                                            $registro = $base -> registro();
                                            if ($vcantmaxpasajerosNuevo < $registro['cantidad']) {
                                                echo errorModificacion();
                                            } else {
                                                $objViaje -> setVcantmaxpasajeros ($vcantmaxpasajerosNuevo);
                                                $respuesta = $objViaje -> modificar();
                                                if ($respuesta == true) {
                                                    $colViaje = $objViaje -> listar();
                                                    echo listaObjetos($colViaje);	
                                                } else {
                                                    echo errorModificacion();
                                                }
                                            }
                                        } else {
                                            echo errorModificacion();
                                        }
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 3: // Cambiar empresa.
                                    $objEmpresaNuevo = new Empresa();
                                    $colEmpresa = $objEmpresaNuevo -> listar();
                                    echo "\n" . listaObjetos($colEmpresa);
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO ID EMPRESA: "; $idempresaNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objEmpresaNuevo -> buscar($idempresaNuevo);
                                    $objViaje -> setObjEmpresa ($objEmpresaNuevo);
                                    $respuesta = $objViaje -> modificar();
                                    if ($respuesta == true) {
                                        $colViaje = $objViaje -> listar();
                                        echo listaObjetos($colViaje);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 4: // Cambiar responsable.
                                    $objResponsableNuevo = new ResponsableV();
                                    $colResponsable = $objResponsableNuevo -> listar();
                                    echo "\n" . listaObjetos($colResponsable);
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO EMPLEADO N°: "; $rnumeroempleadoNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objResponsableNuevo -> buscar($rnumeroempleadoNuevo);
                                    $objViaje -> setObjResponsable ($objResponsableNuevo);
                                    $respuesta = $objViaje -> modificar();
                                    if ($respuesta == true) {
                                        $colViaje = $objViaje -> listar();
                                        echo listaObjetos($colViaje);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 5: // Cambiar importe.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO IMPORTE: "; esNumero($vimporteNuevo = trim(fgets(STDIN))); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objViaje -> setVimporte ($vimporteNuevo);
                                    $respuesta = $objViaje -> modificar();
                                    if ($respuesta == true) {
                                        $colViaje = $objViaje -> listar();
                                        echo listaObjetos($colViaje);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                            }
                        } while ($opcion != 6);
                    } else {
                        echo
                        "└──────────────────────────────────┘" . "\n";
                        echo errorModificacion();
                    }
                }
                break;
            case 8: // Modificar pasajero.
                // Creo un objeto pasajero.
                $objPasajero = new Pasajero();
                // Listo todos los pasajeros de mi base de datos.
                $colPasajero = $objPasajero -> listar();
                echo listaObjetos($colPasajero);
                // Selecciono el pasajero que deseo modificar.
                if ($colPasajero != []) {
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ DOCUMENTO: "; $pdocumentoBuscar = trim(fgets(STDIN));
                    $base = new BaseDatos();
                    $consulta = "SELECT pdocumento FROM pasajero";
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $arregloPasajero = array();
                            while ($registroPasajero = $base -> registro()) {
                                array_push ($arregloPasajero, $registroPasajero['pdocumento']);
                            }
                        } else {
                            echo errorModificacion();
                        }
                    } else {
                        echo errorModificacion();
                    }
                    $comprobacion = true;
                    $i = 0;
                    while ($i < count($arregloPasajero) && $comprobacion) {
                        if ($pdocumentoBuscar == $arregloPasajero[$i]) {
                            $comprobacion = false;
                        } else {
                            $i++;
                        }
                    }
                    if ($comprobacion == false) {
                        echo
                        "└──────────────────────────────────┘";
                        $objPasajero -> buscar ($pdocumentoBuscar);
                        do {
                            $opcion = menuModificarPasajero();
                            switch ($opcion) {
                                case 1: // Cambiar nombre.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO NOMBRE: "; $pnombreNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objPasajero -> setPnombre ($pnombreNuevo);
                                    $respuesta = $objPasajero -> modificar();
                                    if ($respuesta == true) {
                                        $colPasajero = $objPasajero -> listar();
                                        echo listaObjetos($colPasajero);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 2: // Cambiar apellido.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO APELLIDO: "; $papellidoNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objPasajero -> setPapellido ($papellidoNuevo);
                                    $respuesta = $objPasajero -> modificar();
                                    if ($respuesta == true) {
                                        $colPasajero = $objPasajero -> listar();
                                        echo listaObjetos($colPasajero);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 3: // Cambiar teléfono.
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO TELÉFONO: "; esNumero($ptelefonoNuevo = trim(fgets(STDIN))); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $objPasajero -> setPtelefono ($ptelefonoNuevo);
                                    $respuesta = $objPasajero -> modificar();
                                    if ($respuesta == true) {
                                        $colPasajero = $objPasajero -> listar();
                                        echo listaObjetos($colPasajero);	
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                                case 4: // Cambiar viaje.
                                    $objViajeNuevo = new Viaje();
                                    $colViaje = $objViajeNuevo -> listar();
                                    echo "\n" .listaObjetos($colViaje);
                                    echo "\n" .
                                    "┌──────────────────────────────────┐" . "\n" .
                                    "│ NUEVO ID VIAJE: "; $idviajeNuevo = trim(fgets(STDIN)); echo
                                    "└──────────────────────────────────┘" . "\n";
                                    $base = new BaseDatos();
                                    $consulta = "SELECT count(*) AS cantidad FROM pasajero WHERE idviaje = " . $idviajeNuevo;
                                    if ($base -> iniciar()) {
                                        if ($base -> ejecutar ($consulta)) {
                                            $registro = $base -> registro();
                                            $objViajeNuevo -> buscar($idviajeNuevo);
                                            if ($objViajeNuevo -> getVcantmaxpasajeros() > $registro['cantidad']) {
                                                $objPasajero -> setIdviaje ($objViajeNuevo -> getIdviaje());
                                                $respuesta = $objPasajero -> modificar();
                                                if ($respuesta == true) {
                                                    $colPasajero = $objPasajero -> listar();
                                                    echo listaObjetos($colPasajero);	
                                                } else {
                                                    echo errorModificacion();
                                                }
                                            } else {
                                                echo errorModificacion();
                                            }
                                        } else {
                                            echo errorModificacion();
                                        }
                                    } else {
                                        echo errorModificacion();
                                    }
                                    break;
                            }
                        } while ($opcion != 5);
                    } else {
                        echo
                        "└──────────────────────────────────┘" . "\n";
                        echo errorModificacion();
                    }
                }
                break;
            case 9: // Eliminar empresa.
                // Creo un objeto empresa.
                $objEmpresa = new Empresa();
                // Listo todas las empresas de mi base de datos.
                $colEmpresa = $objEmpresa -> listar();
                echo listaObjetos($colEmpresa);
                // Selecciono la empresa que deseo eliminar.
                if ($colEmpresa != []) {
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ ID: "; $idempresaBuscar = trim(fgets(STDIN)); echo
                    "└──────────────────────────────────┘" . "\n";
                    $base = new BaseDatos();
                    $consulta = "SELECT idempresa FROM empresa";
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $arregloEmpresa = array();
                            while ($registroEmpresa = $base -> registro()) {
                                array_push ($arregloEmpresa, $registroEmpresa['idempresa']);
                            }
                        } else {
                            echo errorEliminacion();
                        }
                    } else {
                        echo errorEliminacion();
                    }
                    $comprobacion = true;
                    $i = 0;
                    while ($i < count($arregloEmpresa) && $comprobacion) {
                        if ($idempresaBuscar == $arregloEmpresa[$i]) {
                            $comprobacion = false;
                        } else {
                            $i++;
                        }
                    }
                    if ($comprobacion == false) {
                        $objViaje = new Viaje();
                        $colViaje = $objViaje -> listar("idempresa = " . $idempresaBuscar);
                        if (count($colViaje) == 0) {
                            $objEmpresa -> buscar ($idempresaBuscar);
                            $respuesta = $objEmpresa -> eliminar();
                            if ($respuesta == true) {
                                $colEmpresa = $objEmpresa -> listar();
                                echo listaObjetos($colEmpresa);
                            } else {
                                echo errorEliminacion();
                            }
                        } else {
                            echo errorEliminacion();
                        }
                    } else {
                        echo errorEliminacion();
                    }
                }
                break;
            case 10: // Eliminar responsable.
                // Creo un objeto responsable.
                $objResponsable = new ResponsableV();
                // Listo todos los responsables de mi base de datos.
                $colResponsable = $objResponsable -> listar();
                echo listaObjetos($colResponsable);
                // Selecciono el responsable que deseo eliminar.
                if ($colResponsable != []) {
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ EMPLEADO N°: "; $rnumeroempleadoBuscar = trim(fgets(STDIN)); echo
                    "└──────────────────────────────────┘" . "\n";
                    $base = new BaseDatos();
                    $consulta = "SELECT rnumeroempleado FROM responsable";
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $arregloResponsable = array();
                            while ($registroResponsable = $base -> registro()) {
                                array_push ($arregloResponsable, $registroResponsable['rnumeroempleado']);
                            }
                        } else {
                            echo errorEliminacion();
                        }
                    } else {
                        echo errorEliminacion();
                    }
                    $comprobacion = true;
                    $i = 0;
                    while ($i < count($arregloResponsable) && $comprobacion) {
                        if ($rnumeroempleadoBuscar == $arregloResponsable[$i]) {
                            $comprobacion = false;
                        } else {
                            $i++;
                        }
                    }
                    if ($comprobacion == false) {
                        $objViaje = new Viaje();
                        $colViaje = $objViaje -> listar("rnumeroempleado = " . $rnumeroempleadoBuscar);
                        if (count($colViaje) == 0) {
                            $objResponsable -> buscar ($rnumeroempleadoBuscar);
                            $respuesta = $objResponsable -> eliminar();
                            if ($respuesta == true) {
                                $colResponsable = $objResponsable -> listar();
                                echo listaObjetos($colResponsable);
                            } else {
                                echo errorEliminacion();
                            }
                        } else {
                            echo errorEliminacion();
                        }
                    } else {
                        echo errorEliminacion();
                    }
                }
                break;
            case 11: // Eliminar viaje.
                // Creo un objeto viaje.
                $objViaje = new Viaje();
                // Listo todos los viajes de mi base de datos.
                $colViaje = $objViaje -> listar();
                echo listaObjetos($colViaje);
                // Selecciono el viaje que deseo eliminar.
                if ($colViaje != []) {
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ ID: "; $idviajeBuscar = trim(fgets(STDIN)); echo
                    "└──────────────────────────────────┘" . "\n";
                    $base = new BaseDatos();
                    $consulta = "SELECT idviaje FROM viaje";
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $arregloViaje = array();
                            while ($registroViaje = $base -> registro()) {
                                array_push ($arregloViaje, $registroViaje['idviaje']);
                            }
                        } else {
                            echo errorEliminacion();
                        }
                    } else {
                        echo errorEliminacion();
                    }
                    $comprobacion = true;
                    $i = 0;
                    while ($i < count($arregloViaje) && $comprobacion) {
                        if ($idviajeBuscar == $arregloViaje[$i]) {
                            $comprobacion = false;
                        } else {
                            $i++;
                        }
                    }
                    if ($comprobacion == false) {
                        $objPasajero = new Pasajero();
                        $colPasajero = $objPasajero -> listar("idviaje = " . $idviajeBuscar);
                        if (count($colPasajero) == 0) {
                            $objViaje -> buscar ($idviajeBuscar);
                            $respuesta = $objViaje -> eliminar();
                            if ($respuesta == true) {
                                $colViaje = $objViaje -> listar();
                                echo listaObjetos($colViaje);
                            } else {
                                echo errorEliminacion();
                            }
                        } else {
                            echo errorEliminacion();
                        }
                    } else {
                        echo errorEliminacion();
                    }
                }
                break;
            case 12: // Eliminar pasajero.
                // Creo un objeto pasajero.
                $objPasajero = new Pasajero();
                // Listo todos los pasajeros de mi base de datos.
                $colPasajero = $objPasajero -> listar();
                echo listaObjetos($colPasajero);
                // Selecciono el pasajero que deseo eliminar.
                if ($colPasajero != []) {
                    echo "\n" .
                    "┌──────────────────────────────────┐" . "\n" .
                    "│ DOCUMENTO: "; $pdocumentoBuscar = trim(fgets(STDIN)); echo
                    "└──────────────────────────────────┘" . "\n";
                    $base = new BaseDatos();
                    $consulta = "SELECT pdocumento FROM pasajero";
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta)) {
                            $arregloPasajero = array();
                            while ($registroPasajero = $base -> registro()) {
                                array_push ($arregloPasajero, $registroPasajero['pdocumento']);
                            }
                        } else {
                            echo errorEliminacion();
                        }
                    } else {
                        echo errorEliminacion();
                    }
                    $comprobacion = true;
                    $i = 0;
                    while ($i < count($arregloPasajero) && $comprobacion) {
                        if ($pdocumentoBuscar == $arregloPasajero[$i]) {
                            $comprobacion = false;
                        } else {
                            $i++;
                        }
                    }
                    if ($comprobacion == false) {
                        $objPasajero -> buscar ($pdocumentoBuscar);
                        $respuesta = $objPasajero -> eliminar();
                        if ($respuesta == true) {
                            $colPasajero = $objPasajero -> listar();
                            echo listaObjetos($colPasajero);
                        } else {
                            echo errorEliminacion();
                        }
                    } else {
                        echo errorEliminacion();
                    }
                }
                break;
            case 13: // Mostrar empresas.
                $objEmpresa = new Empresa();
                $colEmpresa = $objEmpresa -> listar();
                echo listaObjetos($colEmpresa);
                break;
            case 14: // Mostrar responsables.
                $objResponsable = new ResponsableV();
                $colResponsable = $objResponsable -> listar();
                echo listaObjetos($colResponsable);
                break;
            case 15: // Mostrar viajes.
                $objViaje = new Viaje();
                $colViaje = $objViaje -> listar();
                echo listaObjetos($colViaje);
                break;
            case 16: // Mostrar pasajeros.
                $objPasajero = new Pasajero();
                $colPasajero = $objPasajero -> listar();
                echo listaObjetos($colPasajero);
                break;
            case 17: // Cargar base de datos de prueba.
                $base = new BaseDatos();
                $consulta = [
                    "DROP TABLE IF EXISTS pasajero",
                    "DROP TABLE IF EXISTS viaje",
                    "DROP TABLE IF EXISTS responsable",
                    "DROP TABLE IF EXISTS empresa",
                    "CREATE TABLE empresa (
                        idempresa bigint AUTO_INCREMENT,
                        enombre varchar(150),
                        edireccion varchar(150),
                        PRIMARY KEY (idempresa)
                    ) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1",
                    "CREATE TABLE responsable (
                        rnumeroempleado bigint AUTO_INCREMENT,
                        rnumerolicencia bigint,
                        rnombre varchar(150), 
                        rapellido  varchar(150), 
                        PRIMARY KEY (rnumeroempleado)
                    )ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1",
                    "CREATE TABLE viaje (
                        idviaje bigint AUTO_INCREMENT,
                        vdestino varchar(150),
                        vcantmaxpasajeros int,
                        idempresa bigint,
                        rnumeroempleado bigint,
                        vimporte float,
                        PRIMARY KEY (idviaje),
                        FOREIGN KEY (idempresa) REFERENCES empresa (idempresa),
                        FOREIGN KEY (rnumeroempleado) REFERENCES responsable (rnumeroempleado)
                        ON UPDATE CASCADE
                        ON DELETE CASCADE
                    ) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;",
                    "CREATE TABLE pasajero (
                        pdocumento varchar(15),
                        pnombre varchar(150), 
                        papellido varchar(150), 
                        ptelefono int, 
                        idviaje bigint,
                        PRIMARY KEY (pdocumento),
                        FOREIGN KEY (idviaje) REFERENCES viaje (idviaje)	
                    )ENGINE = InnoDB DEFAULT CHARSET = utf8;",
                    "INSERT INTO empresa (enombre, edireccion) VALUES ('A', 'A')",
                    "INSERT INTO responsable (rnumerolicencia, rnombre, rapellido) VALUES (1, 'A', 'A'), (2, 'B', 'B'), (3, 'C', 'C')",
                    "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) VALUES ('A', 1, 1, 1, 1.1), ('B', 2, 1, 2, 2.1), ('C', 3, 1, 3, 3.1)",
                    "INSERT INTO pasajero (pdocumento, pnombre, papellido, ptelefono, idviaje) VALUES (1, 'A', 'A', 1, 1), (2, 'B', 'B', 2, 2), (3, 'C', 'C', 3, 3)"
                ];
                for ($i = 0; $i < count($consulta); $i++) {
                    if ($base -> iniciar()) {
                        if ($base -> ejecutar ($consulta[$i])) {
                            if ($i == count($consulta) - 1) {
                                echo
                                "┌──────────────────────────────────┐" . "\n" .
                                "│████████ CARGA BD EXITOSA ████████│" . "\n" .
                                "└──────────────────────────────────┘";
                            }
                        }	else {
                            echo $base -> getError();
                        }
                    } else {
                        echo $base -> getError();
                    }
                }
                break;
            case 18: // Salir.
                echo
                "┌──────────────────────────────────┐" . "\n" .
                "│█████████ MUCHAS GRACIAS █████████│" . "\n" .
                "└──────────────────────────────────┘" . "\n";
                break;
        }
    } while ($opcion != 18);

?>