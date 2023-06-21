-- Active: 1685158897739@@127.0.0.1@3306@bd_prueba
-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/

-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2020 a las 19:29:06
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `bd_prueba`

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `estudiante`

CREATE TABLE `estudiante` (
    `idpersona` bigint(20) UNSIGNED NOT NULL,
    `nrodoc` int(11) NOT NULL,
    `carrera` varchar(150) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `persona`

CREATE TABLE `persona` (
    `idpersona` bigint(20) UNSIGNED NOT NULL,
    `nrodoc` int(11) NOT NULL,
    `apellido` varchar(150) NOT NULL,
    `nombre` varchar(150) NOT NULL,
    `email` varchar(150) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- Indices de la tabla `estudiante`

ALTER TABLE `estudiante`
    ADD PRIMARY KEY (`idpersona`);

-- Indices de la tabla `persona`

ALTER TABLE `persona`
    ADD PRIMARY KEY (`idpersona`),
    ADD UNIQUE KEY `idpersona` (`idpersona`);

-- AUTO_INCREMENT de las tablas volcadas

-- AUTO_INCREMENT de la tabla `persona`

ALTER TABLE `persona`
    MODIFY `idpersona` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 0;
COMMIT;

-- Restricciones para tablas volcadas

-- Filtros para la tabla `estudiante`

ALTER TABLE `estudiante`
    ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;