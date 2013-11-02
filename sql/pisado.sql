-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-11-2013 a las 21:22:00
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pisado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `nia_delegado` int(10) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delegado`
--

CREATE TABLE IF NOT EXISTS `delegado` (
  `nia` int(10) NOT NULL DEFAULT '0',
  `titulacion` varchar(50) DEFAULT NULL,
  `curso` smallint(6) DEFAULT NULL,
  `bilingue` tinyint(1) DEFAULT NULL,
  `dele_titulacion` tinyint(1) DEFAULT NULL,
  `dele_centro` tinyint(1) DEFAULT NULL,
  `dele_junta` tinyint(1) DEFAULT NULL,
  `dele_claustro` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`nia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `dept` int(10) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dept`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organo`
--

CREATE TABLE IF NOT EXISTS `organo` (
  `nia` int(10) NOT NULL DEFAULT '0',
  `organo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
