-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 23:59:38
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


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

CREATE TABLE `ciudadano`
(
  `id_ciudadano` int
(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar
(30) NOT NULL,
  `apellido` varchar
(30) NOT NULL,
  `direccion` varchar
(50) NOT NULL,
  `telefono` int
(11) NOT NULL,
    PRIMARY KEY
(id_ciudadano)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `franja_horaria`
--

CREATE TABLE `franja_horaria`
(
  `id_franja_horaria` int(11) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cartonero`
--

CREATE TABLE `pedido_cartonero`
(
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

CREATE TABLE `volumen`
(
  `id_volumen` int(11) NOT NULL,
  `volumen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Estructura de tabla para la tabla `material_aceptado`

CREATE TABLE material_aceptado (
    id_material int NOT NULL AUTO_INCREMENT,
    nombre_material varchar(30) NOT NULL,
    condicion_entrega text NOT NULL,
    imagen_material varchar(100) NOT NULL,
    CONSTRAINT pk_material_aceptado PRIMARY KEY (id_material)
);

CREATE TABLE `cartonero` (
    `cartonero_dni` int NOT NULL,
    `nombre` varchar(75) NOT NULL,
    `apellido` varchar(75) NOT NULL,
    `direccion` varchar(100) NOT NULL,
    `fecha_nacimiento` date NOT NULL,
    `id_vehiculo` int NOT NULL,
    CONSTRAINT `cartonero_pk` PRIMARY KEY (`cartonero_dni`)
);

-- Table: vehiculo
CREATE TABLE `vehiculo` (
    `id_vehiculo` int NOT NULL,
    `tipo` varchar(50) NOT NULL,
    `id_volumen` int NOT NULL,
    CONSTRAINT `vehiculo_pk` PRIMARY KEY (`id_vehiculo`)
);


--
-- Indices de la tabla `franja_horaria`
--
ALTER TABLE `franja_horaria`
ADD PRIMARY KEY(`id_franja_horaria`);

--
-- Indices de la tabla `pedido_cartonero`
--
ALTER TABLE `pedido_cartonero`
ADD PRIMARY KEY(`id_ciudadano`,`fecha_pedido`),
ADD KEY `fk_pedido_cartonero_franja_horaria`(`id_franja_horaria`),
ADD KEY `fk_pedido_cartonero_volumen`(`volumen_id_volumen`);

--
-- Indices de la tabla `volumen`
--
ALTER TABLE `volumen`
    ADD PRIMARY KEY(`id_volumen`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido_cartonero`
--
ALTER TABLE `pedido_cartonero`
    ADD CONSTRAINT `fk_pedido_cartonero_ciudadano` FOREIGN KEY(`id_ciudadano`) REFERENCES `ciudadano`(`id_ciudadano`),
    ADD CONSTRAINT `fk_pedido_cartonero_franja_horaria` FOREIGN KEY(`id_franja_horaria`) REFERENCES `franja_horaria`(`id_franja_horaria`),
    ADD CONSTRAINT `fk_pedido_cartonero_volumen` FOREIGN KEY(`volumen_id_volumen`) REFERENCES `volumen`(`id_volumen`);
COMMIT;

-- foreign keys
-- Reference: cartonero_vehiculo (table: cartonero)
ALTER TABLE `cartonero`
 ADD CONSTRAINT `fk_cartonero_vehiculo` FOREIGN KEY (`id_vehiculo`)
    REFERENCES `vehiculo` (`id_vehiculo`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;

    ALTER TABLE `vehiculo`
 ADD CONSTRAINT `fk_vehiculo_volumen` FOREIGN KEY (`id_volumen`)
    REFERENCES `volumen` (`id_volumen`)
    COMMIT;

/* CORRER PRIMERO LO DE ARRIBA, LUEGO LO DE ABAJO */

INSERT INTO `franja_horaria`(`id_franja_horaria`,`desde`, `hasta`) VALUES (1,'09:00:00','12:00:00');
INSERT INTO `franja_horaria`(`id_franja_horaria`,`desde`, `hasta`) VALUES (2,'13:00:00','17:00:00');

INSERT INTO `volumen`(`id_volumen`,`volumen`) VALUES(1,'Caja');
INSERT INTO `volumen`(`id_volumen`,`volumen`) VALUES(2,'Baul de auto');
INSERT INTO `volumen`(`id_volumen`,`volumen`) VALUES(3,'Caja de camioneta');
INSERT INTO `volumen`(`id_volumen`,`volumen`) VALUES(4,'Camion');

INSERT INTO `material_aceptado` (`nombre_material`, `condicion_entrega`, `imagen_material`) VALUES
('Papel', 'El papel a reciclar debe estar siempre limpio y seco. Además no se acepta papel encerado o parafinado, etiquetas adhesivas, papel higiénico-sanitario, papel alimentación, papel manchado de grasa, papel térmico de fax, papel fotográfico, papeles engomados, papeles de regalo o papeles pegados.', './front/images/paper.jpeg'),
('Carton', 'El cartón debe estar limpio y si es una caja también debe estar desarmada.', './front/images/cardboard.jpeg'),
('Envases plasticos', 'Se acepta cualquier envase que tenga un Código de Identificación Plástico o RIC (Resin Identification Code), a excepción de  los de yogur o queso blanco, los plásticos mezclados con otros materiales o los degradados por el sol.', './front/images/plasticBottles.jpeg'),
('Latas de conserva', 'No deben estar oxidadas.', './front/images/cans.jpeg'),
('Tetrabrik', 'Solo se aceptarán limpios, secos y aplastados.', './front/images/boxTetrabrik.jpeg'),
('Envases de aluminio', 'Deben estar secos, y si son latas también aplastadas. No se aceptarán envases de aluminio oxidados.', './front/images/aluminiumContainers.jpeg'),
('Botellas de vidrio', 'Se aceptarán solo si estan limpias y secas.', './front/images/glassBottle.jpeg');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
