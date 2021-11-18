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
(`id_ciudadano` int
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
  `id_franja_horaria` int
(11) NOT NULL,
  `desde` time NOT NULL,
  `hasta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cartonero`
--

CREATE TABLE `pedido_cartonero`
(
  `id_ciudadano` int
(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_franja_horaria` int
(11) NOT NULL,
  `volumen_id_volumen` int
(11) NOT NULL,
  `imagen` varchar
(100)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volumen`
--

CREATE TABLE `volumen`
(
  `id_volumen` int
(11) NOT NULL,
  `volumen` varchar
(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Estructura de tabla para la tabla `material_aceptado`

CREATE TABLE material_aceptado
(
  id_material int NOT NULL
  AUTO_INCREMENT,
    nombre_material varchar
  (30) NOT NULL,
    condicion_entrega text NOT NULL,
    imagen_material varchar
  (100) NOT NULL,
    CONSTRAINT pk_material_aceptado PRIMARY KEY
  (id_material)
);

  CREATE TABLE `cartonero`
  (
    `cartonero_dni` int NOT NULL,
    `nombre` varchar
  (75) NOT NULL,
    `apellido` varchar
  (75) NOT NULL,
    `direccion` varchar
  (100) NOT NULL,
    `fecha_nacimiento` date NOT NULL,
    `id_vehiculo` int NOT NULL,
    CONSTRAINT `cartonero_pk` PRIMARY KEY
  (`cartonero_dni`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

  -- Table: vehiculo
  CREATE TABLE `vehiculo`
  (
    `id_vehiculo` int NOT NULL,
    `tipo` varchar
  (50) NOT NULL,
    `id_volumen` int NOT NULL,
    CONSTRAINT `vehiculo_pk` PRIMARY KEY
  (`id_vehiculo`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

  CREATE TABLE material_cartonero
  (
    id_material int NOT NULL,
    dni_cartonero int NOT NULL,
    peso float NOT NULL,
    CONSTRAINT pk_material_cartonero PRIMARY KEY (id_material, dni_cartonero)
  );

  -- foreign keys
  ALTER TABLE `material_cartonero`
  ADD CONSTRAINT `fk_material_cartonero_material` FOREIGN KEY
  (`id_material`) REFERENCES `material_aceptado`
  (`id_material`),
  ADD CONSTRAINT `fk_material_cartonero_cartonero` FOREIGN KEY
  (`dni_cartonero`) REFERENCES `cartonero`
  (`cartonero_dni`);


  --
  -- Indices de la tabla `franja_horaria`
  --
  ALTER TABLE `franja_horaria`
  ADD PRIMARY KEY
  (`id_franja_horaria`);

  --
  -- Indices de la tabla `pedido_cartonero`
  --
  ALTER TABLE `pedido_cartonero`
  ADD PRIMARY KEY
  (`id_ciudadano`,`fecha_pedido`),
  ADD KEY `fk_pedido_cartonero_franja_horaria`
  (`id_franja_horaria`),
  ADD KEY `fk_pedido_cartonero_volumen`
  (`volumen_id_volumen`);

  --
  -- Indices de la tabla `volumen`
  --
  ALTER TABLE `volumen`
  ADD PRIMARY KEY
  (`id_volumen`);

  --
  -- Restricciones para tablas volcadas
  --

  --
  -- Filtros para la tabla `pedido_cartonero`
  --
  ALTER TABLE `pedido_cartonero`
  ADD CONSTRAINT `fk_pedido_cartonero_ciudadano` FOREIGN KEY
  (`id_ciudadano`) REFERENCES `ciudadano`
  (`id_ciudadano`),
  ADD CONSTRAINT `fk_pedido_cartonero_franja_horaria` FOREIGN KEY
  (`id_franja_horaria`) REFERENCES `franja_horaria`
  (`id_franja_horaria`),
  ADD CONSTRAINT `fk_pedido_cartonero_volumen` FOREIGN KEY
  (`volumen_id_volumen`) REFERENCES `volumen`
  (`id_volumen`);


  -- foreign keys
  -- Reference: cartonero_vehiculo (table: cartonero)
  ALTER TABLE `cartonero`
  ADD CONSTRAINT `fk_cartonero_vehiculo` FOREIGN KEY
  (`id_vehiculo`)
    REFERENCES `vehiculo`
  (`id_vehiculo`)
    ON
  DELETE RESTRICT
    ON
  UPDATE CASCADE;

  ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_vehiculo_volumen` FOREIGN KEY
  (`id_volumen`)
    REFERENCES `volumen`
  (`id_volumen`);


  /* CORRER PRIMERO LO DE ARRIBA, LUEGO LO DE ABAJO */
INSERT INTO `franja_horaria`( `id_franja_horaria`,
    `desde`,
    `hasta`
)
VALUES(1, '09:00:00', '12:00:00');
INSERT INTO `franja_horaria`(
    `id_franja_horaria`,
    `desde`,
    `hasta`
)
VALUES(2, '13:00:00', '17:00:00');
INSERT INTO `volumen`(`id_volumen`, `volumen`)
VALUES(1, 'Caja');
INSERT INTO `volumen`(`id_volumen`, `volumen`)
VALUES(2, 'Baul de auto');
INSERT INTO `volumen`(`id_volumen`, `volumen`)
VALUES(3, 'Caja de camioneta');
INSERT INTO `volumen`(`id_volumen`, `volumen`)
VALUES(4, 'Camion');
INSERT INTO `material_aceptado`(`nombre_material`,
    `condicion_entrega`,
    `imagen_material`
)
VALUES(
    'Papel',
    'El papel a reciclar debe estar siempre limpio y seco. Además no se acepta papel encerado o parafinado, etiquetas adhesivas, papel higiénico-sanitario, papel alimentación, papel manchado de grasa, papel térmico de fax, papel fotográfico, papeles engomados, papeles de regalo o papeles pegados.',
    './back/images/paper.jpeg'
),(
    'Carton',
    'El cartón debe estar limpio y si es una caja también debe estar desarmada.',
    './back/images/cardboard.jpeg'
),(
    'Envases plasticos',
    'Se acepta cualquier envase que tenga un Código de Identificación Plástico o RIC (Resin Identification Code), a excepción de  los de yogur o queso blanco, los plásticos mezclados con otros materiales o los degradados por el sol.',
    './back/images/plasticBottles.jpeg'
),(
    'Latas de conserva',
    'No deben estar oxidadas.',
    './back/images/cans.jpeg'
),(
    'Tetrabrik',
    'Solo se aceptarán limpios, secos y aplastados.',
    './back/images/boxTetrabrik.jpeg'
),(
    'Envases de aluminio',
    'Deben estar secos, y si son latas también aplastadas. No se aceptarán envases de aluminio oxidados.',
    './back/images/aluminiumContainers.jpeg'
),(
    'Botellas de vidrio',
    'Se aceptarán solo si estan limpias y secas.',
    './back/images/glassBottle.jpeg'
);
INSERT INTO `vehiculo`(
    `id_vehiculo`,
    `tipo`,
    `id_volumen`
)
VALUES(1, "Auto", 2);
INSERT INTO `vehiculo`(
    `id_vehiculo`,
    `tipo`,
    `id_volumen`
)
VALUES(2, "Camioneta", 3);
INSERT INTO `vehiculo`(
    `id_vehiculo`,
    `tipo`,
    `id_volumen`
)
VALUES(3, "Camion", 4);
INSERT INTO `vehiculo`(
    `id_vehiculo`,
    `tipo`,
    `id_volumen`
)
VALUES(999, "Vehiculo buena onda", 4);
INSERT INTO `cartonero`(
    `cartonero_dni`,
    `nombre`,
    `apellido`,
    `direccion`,
    `fecha_nacimiento`,
    `id_vehiculo`
)
VALUES(
    31896843,
    'Cristian',
    'Tisera',
    'Figueroa 1221',
    '1985-4-5',
    1
);
INSERT INTO `cartonero`(
    `cartonero_dni`,
    `nombre`,
    `apellido`,
    `direccion`,
    `fecha_nacimiento`,
    `id_vehiculo`
)
VALUES(
    32698639,
    'Juan',
    'Molfese',
    'Ugalde 1301',
    '1986-6-25',
    2
);
INSERT INTO `cartonero`(
    `cartonero_dni`,
    `nombre`,
    `apellido`,
    `direccion`,
    `fecha_nacimiento`,
    `id_vehiculo`
)
VALUES(
    33125896,
    'Guido',
    'Pisarra',
    'Arana 644',
    '1987-9-2',
    1
);
INSERT INTO `cartonero`(
    `cartonero_dni`,
    `nombre`,
    `apellido`,
    `direccion`,
    `fecha_nacimiento`,
    `id_vehiculo`
)
VALUES(
    34923124,
    'Franco',
    'Bayugar',
    'Garibaldi 98',
    '1988-2-6',
    1
);
INSERT INTO `cartonero`(
    `cartonero_dni`,
    `nombre`,
    `apellido`,
    `direccion`,
    `fecha_nacimiento`,
    `id_vehiculo`
)
VALUES(
    35998634,
    'German',
    'De Francesco',
    'Constitucion 565',
    '1990-4-10',
    2
);
INSERT INTO `cartonero`(
    `cartonero_dni`,
    `nombre`,
    `apellido`,
    `direccion`,
    `fecha_nacimiento`,
    `id_vehiculo`
)
VALUES(
    36532698,
    'Jose',
    'Acosta',
    'Saavedra 76',
    '1991-10-18',
    3
);
INSERT INTO `cartonero`(
    `cartonero_dni`,
    `nombre`,
    `apellido`,
    `direccion`,
    `fecha_nacimiento`,
    `id_vehiculo`
)
VALUES(
    11111111,
    'Ciudadano',
    'Buena Onda',
    'Pinto 399',
    '1974-10-9',
    999
);
INSERT INTO `ciudadano`(
    `id_ciudadano`,
    `nombre`,
    `apellido`,
    `direccion`,
    `telefono`
)
VALUES(
    1,
    'Lucas',
    'Warrior',
    'Calle Falsa 123',
    2983112233
);
INSERT INTO `ciudadano`(
    `id_ciudadano`,
    `nombre`,
    `apellido`,
    `direccion`,
    `telefono`
)
VALUES(
    2,
    'Motoneta',
    'Martinez',
    'Av. Siempre Viva 742',
    2983456789
);
INSERT INTO `ciudadano`(
    `id_ciudadano`,
    `nombre`,
    `apellido`,
    `direccion`,
    `telefono`
)
VALUES(
    3,
    'Juan',
    'Pisarra',
    'Lorem Ipsum 666',
    2983111111
);
INSERT INTO `ciudadano`(
    `id_ciudadano`,
    `nombre`,
    `apellido`,
    `direccion`,
    `telefono`
)
VALUES(
    4,
    'Franca',
    'Molfese',
    'Av. San Martín 567',
    2983222222
);
INSERT INTO `ciudadano`(
    `id_ciudadano`,
    `nombre`,
    `apellido`,
    `direccion`,
    `telefono`
)
VALUES(
    5,
    'Cristina',
    'Tisera',
    'Las Heras 111',
    2983434343
);
INSERT INTO `pedido_cartonero`(
    `id_ciudadano`,
    `fecha_pedido`,
    `id_franja_horaria`,
    `volumen_id_volumen`,
    `imagen`
)
VALUES(1, '2021-11-24', 1, 1, NULL);
INSERT INTO `pedido_cartonero`(
    `id_ciudadano`,
    `fecha_pedido`,
    `id_franja_horaria`,
    `volumen_id_volumen`,
    `imagen`
)
VALUES(1, '2021-11-26', 2, 2, NULL);
INSERT INTO `pedido_cartonero`(
    `id_ciudadano`,
    `fecha_pedido`,
    `id_franja_horaria`,
    `volumen_id_volumen`,
    `imagen`
)
VALUES(2, '2021-11-22', 2, 2, NULL);
INSERT INTO `pedido_cartonero`(
    `id_ciudadano`,
    `fecha_pedido`,
    `id_franja_horaria`,
    `volumen_id_volumen`,
    `imagen`
)
VALUES(3, '2021-11-21', 1, 4, NULL);
INSERT INTO `pedido_cartonero`(
    `id_ciudadano`,
    `fecha_pedido`,
    `id_franja_horaria`,
    `volumen_id_volumen`,
    `imagen`
)
VALUES(4, '2021-11-30', 1, 3, NULL);
INSERT INTO `pedido_cartonero`(
    `id_ciudadano`,
    `fecha_pedido`,
    `id_franja_horaria`,
    `volumen_id_volumen`,
    `imagen`
)
VALUES(5, '2021-11-19', 2, 2, NULL);
