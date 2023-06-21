<?php

    include_once '../datos/Persona.php';
    include_once '../datos/Estudiante.php';

    echo "\n" . "VERSION ACTUAL DE PHP." . "\n";
    echo phpversion() . "\n";

    echo "\n" . "CREO UN OBJETO ESTUDIANTE." . "\n";
    $obj = new Estudiante();

    echo "\n" . "BUSCO TODOS LOS ESTUDIANTES ALMACENADOS EN LA BASE DE DATOS." . "\n";
    $coleccion = $obj -> listar();
    foreach ($coleccion as $un) {
        echo $un;
        echo "-------------------------------------------------------";
    }

    echo "\n" . "CARGO LOS DATOS DE UN ESTUDIANTE." . "\n";
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $nombre = substr (str_shuffle ($permitted_chars), 0, 16);
    $apellido = substr (str_shuffle ($permitted_chars), 0, 16);
    $nrodoc = rand (8212412,58212412);
    echo " Voy a insertar el DNI: ".$nrodoc;
    $base = new BaseDatos();
    $consulta = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bd_prueba' AND TABLE_NAME = 'persona'";
    if ($base -> Iniciar()) {
        if ($base -> Ejecutar ($consulta)) {
            if ($row2 = $base -> Registro()) {
                $ultimoId = $row2["AUTO_INCREMENT"];
            }
        };
    }
    $obj -> cargar ($ultimoId, $nrodoc, $nombre, $apellido, "yo@mail.com", "IPOO");
    $respuesta = $obj -> insertar();

    echo "\n" . "INSERTO EL OBJETO ESTUDIANTE EN LA BASE DE DATOS." . "\n";
    if ($respuesta == true) {
        echo "\nOP INSERCIÓN:  La persona fue ingresada en la base de datos.";
        $coleccion = $obj -> listar();
        foreach ($coleccion as $un) {
            echo $un;
            echo "-------------------------------------------------------";
        }
    } else {
        echo $obj->getmensajeoperacion();
    }

    echo "\n" . "MODIFICO EL ESTUDIANTE." . "\n";
    $obj -> setNombre ("Nombre Modificado");
    $obj -> setCarrera ("IP");
    $respuesta = $obj -> modificar();
    if ($respuesta == true) {
        echo "\nOP MODIFICACIÓN: Los datos fueron actualizados correctamente.";
        $coleccion = $obj -> listar();
        foreach ($coleccion as $un) {
            echo $un;
            echo "-------------------------------------------------------";
        }
    } else {
        echo $obj -> getmensajeoperacion();
    }

    echo "\n" . "ELIMINO EL ESTUDIANTE." . "\n";
    $respuesta = $obj -> eliminar();
    if ($respuesta == true) {
        echo "\n" . "BUSCO TODOS LOS ESTUDIANTES ALMACENADOS EN LA BASE DE DATOS Y VEO LA MODIFICACIÓN REALIZADA." . "\n";
        echo "\nOP ELIMINACIÓN: Los datos fueron eliminados correctamente";
        $coleccion = $obj -> listar();
        foreach ($coleccion as $un) {
            echo $un;
            echo "-------------------------------------------------------";
        }
    } else {
        echo $obj->getmensajeoperacion();
    }

?>