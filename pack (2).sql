-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 12-03-2022 a las 13:55:47
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pack`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bulto`
--

CREATE TABLE `bulto` (
  `id_bulto` int(11) NOT NULL,
  `guia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_pais`
--

CREATE TABLE `cod_pais` (
  `id_pais` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `zona` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cod_pais`
--

INSERT INTO `cod_pais` (`id_pais`, `codigo`, `descripcion`, `zona`) VALUES
(1, 'ARG', 'Argentina', 'E'),
(2, 'BOL', 'Bolivia', 'D'),
(3, 'CHL', 'Chile', 'D'),
(4, 'COL', 'Colombia', 'C'),
(5, 'CRL', 'Costa Rica', 'B'),
(6, 'CUB', 'Cuba', 'F'),
(7, 'ECU', 'Ecuador', 'D'),
(8, 'SLV', 'El Salvador', 'B'),
(9, 'GTM', 'Guatemala', 'B'),
(10, 'HND', 'Honduras', 'B'),
(11, 'MEX', 'México', 'B'),
(12, 'NIC', 'Nicaragua', 'B'),
(13, 'PAN', 'Panamá', 'B'),
(14, 'PRY', 'Paraguay', 'D'),
(15, 'PER', 'Perú', 'D'),
(16, 'PRI', 'Puerto Rico', 'F'),
(17, 'DOM', 'República Dominicana', 'C'),
(18, 'URY', 'Uruguay', 'E'),
(19, 'VEN', 'Venezuela', 'E'),
(20, 'MIA', 'Miami', 'A'),
(21, 'BRA', 'Brasil', 'E'),
(22, 'USA', 'EE UU', 'E'),
(23, 'STM', 'St.Marteen', 'E'),
(24, 'Haití', 'HAI', 'E'),
(25, 'CUR', 'Curacao', 'E'),
(26, 'SMT', 'Saint Martin', 'E'),
(27, 'ARB', 'Aruba', 'D'),
(28, 'JAM', 'Jamaica', 'D'),
(29, 'TTB', 'T.Tobago', 'D'),
(30, 'BAH', 'Bahamas', 'F'),
(31, 'BRM', 'Bermudas', 'F'),
(32, 'GUD', 'Guadalupe', 'F'),
(33, 'ISM', 'Islas Minor', 'F'),
(34, 'MAR', 'Martinica', 'F'),
(35, 'ROT', 'Road Town', 'F'),
(36, 'SJA', 'St.Jean ARPT', 'F'),
(37, 'STK', 'St.Kitts', 'F'),
(38, 'WAL', 'Wallis y Fortuna', 'F'),
(39, 'AYB', 'Antigua y Barbuda', 'F'),
(40, 'BAR', 'Barbados', 'F'),
(41, 'BON', 'Bonaire', 'F'),
(42, 'DOM', 'Dominica', 'F'),
(43, 'ISC', 'Islas Caiman', 'F'),
(44, 'ISV', 'Islas Virgenes', 'F'),
(45, 'MON', 'Montserrat', 'F'),
(46, 'ROO', 'Roosevelt Field', 'F'),
(47, 'STT', 'St.Thomas', 'F'),
(48, 'STV', 'St.Vincent', 'F'),
(49, 'ATH', 'Antillas Holandesas', 'F'),
(50, 'BEL', 'Belice', 'F'),
(51, 'CND', 'Canadá', 'F'),
(52, 'GRN', 'Granada', 'F'),
(53, 'ISM', 'Islas Marianas', 'F'),
(54, 'IVR', 'Islas Virginias AM', 'F'),
(55, 'SNL', 'Santa Lucia', 'F'),
(56, 'PRC', 'Puerto Rico', 'F'),
(57, 'TYC', 'Turcas y Caicos', 'F'),
(58, 'ALE', 'Alemania', 'G'),
(59, 'ESP', 'España', 'G'),
(60, 'PSB', 'Holanda', 'G'),
(61, 'LIE', 'Lienchestein', 'G'),
(62, 'MON', 'Montenegro', 'G'),
(63, 'MON', 'Montenegro', 'G'),
(64, 'SMR', 'San Marino', 'G'),
(65, 'BEL', 'Bélgica', 'G'),
(66, 'FRN', 'Francia', 'G'),
(67, 'ITL', 'Italia', 'G'),
(68, 'LND', 'London', ''),
(69, 'PRT', 'Portugal', 'G'),
(70, 'SRB', 'Serbia', 'G'),
(71, 'SUI', 'Suiza', 'G'),
(72, 'CVT', 'C.Vaticano', 'G'),
(73, 'HEA', 'Heathrow', 'G'),
(74, 'LTN', 'Letonia', 'G'),
(75, 'LUX', 'Luxemburgo', 'G'),
(76, 'RUN', 'Reino Unido', 'G'),
(77, 'SRM', 'Serbia Montenegro', 'G'),
(78, 'ADR', 'Andorra', 'H'),
(79, 'AUS', 'Austria', 'H'),
(80, 'BLA', 'Banja Luka ARPT', 'H'),
(81, 'BIR', 'Birmania', 'H'),
(82, 'CAM', 'Camboya', 'H'),
(83, 'CDS', 'Corea del Sur', 'H'),
(84, 'ESL', 'Eslovaquia', 'H'),
(85, 'FIL', 'Filipinas', 'H'),
(86, 'GIB', 'Gibraltar', 'H'),
(87, 'GEC', 'Guinea Ecuatorial', 'H'),
(88, 'IND', 'Indonesia', 'H'),
(89, 'ISL', 'Islandia', 'H'),
(90, 'ISS', 'Islas Salomon', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_bulto`
--

CREATE TABLE `detalles_bulto` (
  `id_detalle` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` float NOT NULL,
  `bulto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `precio_tipo` decimal(25,2) NOT NULL DEFAULT 0.07,
  `importe_tipo` decimal(25,2) NOT NULL,
  `importe_empaquetado` decimal(25,2) NOT NULL DEFAULT 0.00,
  `importe_tarifario` decimal(25,2) NOT NULL,
  `precio_excedenteKg` decimal(25,2) NOT NULL,
  `dif_x_peso` decimal(25,2) NOT NULL,
  `guia_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `fecha`, `precio_tipo`, `importe_tipo`, `importe_empaquetado`, `importe_tarifario`, `precio_excedenteKg`, `dif_x_peso`, `guia_id`, `usuario_id`) VALUES
(36, '2021-12-10', '0.07', '42.84', '3.56', '612.04', '23.00', '69.00', 129, 1),
(37, '2022-01-05', '100.00', '100.00', '0.00', '350.00', '0.00', '0.00', 135, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_embarque`
--

CREATE TABLE `guia_embarque` (
  `id_guia` int(11) NOT NULL,
  `cod_origen` int(11) NOT NULL,
  `cod_destino` int(11) NOT NULL,
  `fecha_emb` date NOT NULL,
  `valor_mercancia` decimal(10,0) NOT NULL,
  `peso_real` float NOT NULL,
  `tipo_bulto` varchar(20) NOT NULL,
  `cantidad_bulto` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `empaquetado` char(2) NOT NULL,
  `peso_volumetrico` float NOT NULL,
  `incotem` varchar(25) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `personasEnv_id` int(11) NOT NULL,
  `personasDest_id` int(11) NOT NULL,
  `estado_id` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `guia_embarque`
--

INSERT INTO `guia_embarque` (`id_guia`, `cod_origen`, `cod_destino`, `fecha_emb`, `valor_mercancia`, `peso_real`, `tipo_bulto`, `cantidad_bulto`, `descripcion`, `empaquetado`, `peso_volumetrico`, `incotem`, `fecha`, `personasEnv_id`, `personasDest_id`, `estado_id`) VALUES
(129, 15, 16, '2021-12-10', '421', 33, 'APX', 2, 'Documentos', '1', 8, 'DDP', '2022-03-05 12:52:37', 9, 8, 2),
(130, 15, 16, '2021-12-03', '41', 41, 'APX', 0, 'Equipaje no acompaña', 'Si', 41, 'DDU', '2022-03-06 13:36:50', 9, 8, 2),
(131, 13, 2, '2021-12-02', '41', 41, 'CAR', 0, 'Documentos', 'Si', 41, 'DDU', '2022-03-05 01:32:30', 9, 8, 1),
(132, 16, 4, '2021-12-23', '2500', 1.2, 'CAR', 0, 'Documentos', 'Si', 2, 'DDU', '2022-01-13 12:44:09', 9, 8, 1),
(133, 15, 45, '2021-12-15', '18000', 12, 'APX', 0, 'Medicamentos', 'Si', 12, 'DDU', '2022-01-13 12:44:13', 9, 8, 1),
(135, 16, 16, '2022-01-05', '12', 12, 'ENA', 0, 'Documentos', 'Si', 12, 'DDP', '2022-03-06 13:52:36', 9, 8, 2),
(136, 16, 1, '2022-01-04', '12', 32, 'DOX', 0, 'Documentos', 'Si', 0.2, 'DDU', '2022-01-13 13:05:31', 8, 8, 1),
(137, 1, 1, '2022-01-20', '50000', 56, 'APX', 0, 'Efectos Personales', 'Si', 3.0912, 'DDP', '2022-01-15 18:22:24', 8, 9, 1),
(138, 1, 2, '2022-01-18', '45', 89, 'APX', 0, 'Efectos Personales', 'Si', 16.1656, 'DDP', '2022-03-05 01:33:20', 8, 9, 1),
(139, 15, 16, '2022-01-05', '565', 4, 'DOX', 0, 'Efectos Personales', 'Si', 0.405, 'DDP', '2022-03-06 13:36:51', 8, 9, 2),
(142, 2, 1, '2022-01-12', '456', 30, 'APX', 1, 'Efectos Personales', 'Si', 64.8, 'DDP', '2022-01-17 22:12:19', 8, 9, 1),
(143, 1, 2, '2022-01-12', '45', 10, 'APX', 1, 'Efectos Personales', 'Si', 20.502, 'DDP', '2022-03-05 01:31:25', 8, 9, 1),
(144, 2, 5, '2022-02-17', '12', 33, 'APX', 2, 'Efectos Personales', 'Si', 58.48, 'DDP', '2022-02-12 22:56:41', 8, 9, 1),
(145, 1, 4, '2022-02-12', '7', 23, 'APX', 6, 'Documentos', 'Si', 53.064, 'DDP', '2022-02-13 02:09:14', 8, 9, 1),
(146, 15, 16, '2022-02-13', '78', 56, 'DOX', 1, 'Efectos Personales', 'Si', 1.9968, 'DDP', '2022-03-05 01:30:38', 9, 8, 1),
(147, 1, 3, '2022-03-03', '121', 23, 'APX', 2, 'Efectos Personales', 'Si', 80.3724, 'DDP', '2022-03-05 01:21:36', 8, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manifiesto`
--

CREATE TABLE `manifiesto` (
  `id_manifiesto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vuelo` varchar(11) NOT NULL,
  `cod_origen` int(11) NOT NULL,
  `cod_destino` int(11) NOT NULL,
  `expedidor` varchar(1000) NOT NULL,
  `consignatario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `manifiesto`
--

INSERT INTO `manifiesto` (`id_manifiesto`, `fecha`, `vuelo`, `cod_origen`, `cod_destino`, `expedidor`, `consignatario`) VALUES
(17, '2022-02-14', 'eerttree', 1, 6, '234422', '34445555'),
(18, '2022-02-14', 'uu', 1, 6, 'conferry', 'ferriban'),
(19, '2022-02-14', 'ttrtrtrtrt', 1, 6, 'trtrtrtrtrtr', 'edredfrdrdr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manif_embarq`
--

CREATE TABLE `manif_embarq` (
  `manifiesto_id` int(11) NOT NULL,
  `guia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `manif_embarq`
--

INSERT INTO `manif_embarq` (`manifiesto_id`, `guia_id`) VALUES
(17, 129),
(18, 130),
(18, 139),
(19, 135);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `pais` int(11) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `cod_postal` int(11) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `dni`, `nombre`, `apellidos`, `direccion`, `tel`, `pais`, `departamento`, `cod_postal`, `correo`) VALUES
(8, 566, 'luis', 'Perez Bolivar', 'Av. Alirio Ugarte Pelayo, casa Nro 56', '5666', 2, 'Florida', 6201, 'uu@gmail.com'),
(9, 104356456, 'Maria', 'Bello', 'rtrrt', '4164522883', 1, 'Buenos Aires', 43, 'yyy@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifario`
--

CREATE TABLE `tarifario` (
  `kg` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `zona` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifario`
--

INSERT INTO `tarifario` (`kg`, `precio`, `zona`) VALUES
('0.00', '23.00', 'F'),
('0.50', '52.00', 'F'),
('1.00', '54.00', 'F'),
('1.50', '69.00', 'F'),
('2.00', '75.00', 'F'),
('2.50', '85.00', 'F'),
('3.00', '101.00', 'F'),
('3.50', '112.00', 'F'),
('4.00', '122.00', 'F'),
('4.50', '133.00', 'F'),
('5.00', '144.00', 'F'),
('5.50', '151.00', 'F'),
('6.00', '164.00', 'F'),
('6.50', '171.00', 'F'),
('7.00', '179.00', 'F'),
('7.50', '186.00', 'F'),
('8.00', '194.00', 'F'),
('8.50', '202.00', 'F'),
('9.00', '214.00', 'F'),
('9.50', '223.00', 'F'),
('10.00', '228.00', 'F'),
('10.50', '256.80', 'F'),
('11.00', '264.29', 'F'),
('11.50', '276.06', 'F'),
('12.00', '280.27', 'F'),
('12.50', '294.97', 'F'),
('13.00', '297.50', 'F'),
('13.50', '313.84', 'F'),
('14.00', '319.48', 'F'),
('14.50', '324.67', 'F'),
('15.00', '338.25', 'F'),
('15.50', '348.16', 'F'),
('16.00', '355.94', 'F'),
('16.50', '372.27', 'F'),
('17.00', '377.91', 'F'),
('17.50', '383.55', 'F'),
('18.00', '399.89', 'F'),
('18.50', '409.81', 'F'),
('19.00', '418.66', 'F'),
('19.50', '437.14', 'F'),
('20.00', '442.78', 'F'),
('20.50', '484.40', 'F'),
('21.00', '454.04', 'F'),
('21.50', '459.68', 'F'),
('22.00', '465.32', 'F'),
('22.50', '479.52', 'F'),
('23.00', '498.00', 'F'),
('23.50', '503.64', 'F'),
('24.00', '509.28', 'F'),
('24.50', '514.92', 'F'),
('25.00', '520.56', 'F'),
('26.00', '536.95', 'F'),
('27.00', '558.15', 'F'),
('28.00', '575.30', 'F'),
('29.00', '588.29', 'F'),
('30.00', '612.04', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `roll` varchar(20) DEFAULT NULL,
  `personas_id` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `pass`, `roll`, `personas_id`, `imagen`) VALUES
(1, 'desarrollo', '123', 'administrador', 8, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bulto`
--
ALTER TABLE `bulto`
  ADD PRIMARY KEY (`id_bulto`),
  ADD KEY `guia_id` (`guia_id`);

--
-- Indices de la tabla `cod_pais`
--
ALTER TABLE `cod_pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `detalles_bulto`
--
ALTER TABLE `detalles_bulto`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `bulto_id` (`bulto_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `factura_usuario` (`usuario_id`),
  ADD KEY `guia_id` (`guia_id`);

--
-- Indices de la tabla `guia_embarque`
--
ALTER TABLE `guia_embarque`
  ADD PRIMARY KEY (`id_guia`),
  ADD KEY `cod_origen` (`cod_origen`),
  ADD KEY `personas_id` (`personasEnv_id`),
  ADD KEY `personasDest_id` (`personasDest_id`),
  ADD KEY `cod_destino` (`cod_destino`);

--
-- Indices de la tabla `manifiesto`
--
ALTER TABLE `manifiesto`
  ADD PRIMARY KEY (`id_manifiesto`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `pais` (`pais`);

--
-- Indices de la tabla `tarifario`
--
ALTER TABLE `tarifario`
  ADD PRIMARY KEY (`kg`,`zona`),
  ADD KEY `pais_id` (`zona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `personas_usuario` (`personas_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bulto`
--
ALTER TABLE `bulto`
  MODIFY `id_bulto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `guia_embarque`
--
ALTER TABLE `guia_embarque`
  MODIFY `id_guia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `manifiesto`
--
ALTER TABLE `manifiesto`
  MODIFY `id_manifiesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bulto`
--
ALTER TABLE `bulto`
  ADD CONSTRAINT `bulto_guia` FOREIGN KEY (`guia_id`) REFERENCES `guia_embarque` (`id_guia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_bulto`
--
ALTER TABLE `detalles_bulto`
  ADD CONSTRAINT `detalle_bulto` FOREIGN KEY (`bulto_id`) REFERENCES `bulto` (`id_bulto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`guia_id`) REFERENCES `guia_embarque` (`id_guia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `guia_embarque`
--
ALTER TABLE `guia_embarque`
  ADD CONSTRAINT `destinatario` FOREIGN KEY (`personasDest_id`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remitente` FOREIGN KEY (`personasEnv_id`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_pais` FOREIGN KEY (`pais`) REFERENCES `cod_pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `personas_usuario` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personas_usuarios` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
