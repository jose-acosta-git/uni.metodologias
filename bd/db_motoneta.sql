-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 23:59:38
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_motoneta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadano`
--

CREATE TABLE `ciudadano` (
  `id_ciudadano` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `franja_horaria`
--

CREATE TABLE `franja_horaria` (
  `id_franja_horaria` int(11) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cartonero`
--

CREATE TABLE `pedido_cartonero` (
  `id_ciudadano` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_franja_horaria` int(11) NOT NULL,
  `volumen_id_volumen` int(11) NOT NULL,
  `imagen` varchar(100)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volumen`
--

CREATE TABLE `volumen` (
  `id_volumen` int(11) NOT NULL,
  `volumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`id_ciudadano`);

--
-- Indices de la tabla `franja_horaria`
--
ALTER TABLE `franja_horaria`
  ADD PRIMARY KEY (`id_franja_horaria`);

--
-- Indices de la tabla `pedido_cartonero`
--
ALTER TABLE `pedido_cartonero`
  ADD PRIMARY KEY (`id_ciudadano`,`fecha_pedido`),
  ADD KEY `fk_pedido_cartonero_franja_horaria` (`id_franja_horaria`),
  ADD KEY `fk_pedido_cartonero_volumen` (`volumen_id_volumen`);

--
-- Indices de la tabla `volumen`
--
ALTER TABLE `volumen`
  ADD PRIMARY KEY (`id_volumen`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido_cartonero`
--
ALTER TABLE `pedido_cartonero`
  ADD CONSTRAINT `fk_pedido_cartonero_ciudadano` FOREIGN KEY (`id_ciudadano`) REFERENCES `ciudadano` (`id_ciudadano`),
  ADD CONSTRAINT `fk_pedido_cartonero_franja_horaria` FOREIGN KEY (`id_franja_horaria`) REFERENCES `franja_horaria` (`id_franja_horaria`),
  ADD CONSTRAINT `fk_pedido_cartonero_volumen` FOREIGN KEY (`volumen_id_volumen`) REFERENCES `volumen` (`id_volumen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
