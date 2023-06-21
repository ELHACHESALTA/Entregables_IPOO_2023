<?php

    include_once '../datos/Persona.php';

    echo "\n" . "VERSION ACTUAL DE PHP." . "\n";
    echo phpversion() . "\n";

    echo "\n" . "CREO UN OBJETO PERSONA." . "\n";
    $obj_Persona = new Persona();

    echo "\n" . "BUSCO TODAS LAS PERSONAS ALMACENADAS EN LA BASE DE DATOS." . "\n";
    $colPersonas = $obj_Persona -> listar();
    foreach ($colPersonas as $unaPersona) {
        echo $unaPersona;
        echo "-------------------------------------------------------";
    }

    echo "\n" . "CARGO LOS DATOS DE UNA PERSONA." . "\n";
    $base = new BaseDatos();
    $consulta = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bd_prueba' AND TABLE_NAME = 'persona'";
    if ($base -> Iniciar()) {
        if ($base -> Ejecutar ($consulta)) {
            if ($row2 = $base -> Registro()) {
                $ultimoId = $row2["AUTO_INCREMENT"];
            }
        };
    }
    $obj_Persona -> cargar ($ultimoId, 27091730, "Pepe", "Suarez", "pepe@mail.com");
    $respuesta = $obj_Persona -> insertar();

    echo "\n" . "INSERTO EL OBJETO PERSONA EN LA BASE DE DATOS." . "\n";
    if ($respuesta == true) {
        echo "\nOP INSERCIÓN:  La persona fue ingresada en la base de datos.";
        $colPersonas = $obj_Persona -> listar();
        foreach ($colPersonas as $unaPersona) {
            echo $unaPersona;
            echo "-------------------------------------------------------";
        }
    } else {
        echo $obj_Persona -> getmensajeoperacion();
    }

    echo "\n" . "MODIFICO LA PERSONA." . "\n";
    $obj_Persona -> setNombre ("Nombre Modificado");
    $respuesta = $obj_Persona -> modificar();
    if ($respuesta == true) {
        echo "\n" . "BUSCO TODAS LAS PERSONAS ALMACENADAS EN LA BASE DE DATOS Y VEO LA MODIFICACIÓN REALIZADA." . "\n";
        $colPersonas = $obj_Persona -> listar();
        echo "\nOP MODIFICACIÓN: Los datos fueron actualizados correctamente.";
        foreach ($colPersonas as $unaPersona) {
            echo $unaPersona;
            echo "-------------------------------------------------------";
        }	
    } else {
        echo $obj_Persona->getmensajeoperacion();
    }

    echo "\n" . "ELIMINO LA PERSONA." . "\n";
    $respuesta = $obj_Persona -> eliminar();
    if ($respuesta == true) {
        echo "\n" . "BUSCO TODAS LAS PERSONAS ALMACENADAS EN LA BASE DE DATOS Y VEO LA MODIFICACIÓN REALIZADA." . "\n";
        echo " \nOP ELIMINACIÓN: Los datos fueron eliminados correctamente.";
        $colPersonas = $obj_Persona -> listar();
        foreach ($colPersonas as $unaPersona) {
            echo $unaPersona;
            echo "-------------------------------------------------------";
        }
    } else {
        echo $obj_Persona -> getmensajeoperacion();
    }

?>