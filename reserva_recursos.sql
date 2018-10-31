-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2018 a las 15:25:22
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reserva_recursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `id_empleado` int(10) NOT NULL COMMENT 'Clave primaria',
  `nombre_empleado` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del empleado',
  `apellidos_empleado` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Apellidos del empleado',
  `DNI_empleado` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'DNI del empleado',
  `nusuario_empleado` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre de usuario del empleado',
  `contrasenya_empleado` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contraseña de acceso del empleado',
  `numtel_empleado` char(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numero de telefono del empleado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los empleados';

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id_empleado`, `nombre_empleado`, `apellidos_empleado`, `DNI_empleado`, `nusuario_empleado`, `contrasenya_empleado`, `numtel_empleado`) VALUES
(1, 'Gemma', 'Marín Ordoñez', '38376144T', 'gmarin', '1234', '626331772'),
(2, 'Laura', 'Lara Almazán', '56565454L', 'llara', '1234', '656515212'),
(3, 'Jordi', 'Martínez Moya', '12487963J', 'jmartinez', '1234', '679640650'),
(4, 'Carlos', 'Dueñas Marín', '23125478M', 'cdueñas', '1234', '678996332');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recurso`
--

CREATE TABLE `tbl_recurso` (
  `id_recurso` int(10) NOT NULL COMMENT 'Clave primaria',
  `nombre_recurso` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del recurso',
  `id_tiporecurso` int(10) DEFAULT NULL COMMENT 'FK del IDTIPORECURSO',
  `reservado` tinyint(1) DEFAULT '0' COMMENT 'Se indica si el recurso esta reservado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de recursos';

--
-- Volcado de datos para la tabla `tbl_recurso`
--

INSERT INTO `tbl_recurso` (`id_recurso`, `nombre_recurso`, `id_tiporecurso`, `reservado`) VALUES
(1, 'Sala Polivalente 1', 1, 0),
(2, 'Sala Polivalente 2', 1, 0),
(3, 'Sala Polivalente 3', 1, 0),
(4, 'Sala Polivalente 4', 1, 0),
(5, 'Sala de reuniones', 1, 0),
(6, 'Sala Informatica 1', 1, 0),
(7, 'Sala Informatica 2', 1, 0),
(8, 'Taller de Cocina', 4, 0),
(9, 'Despacho Entrevistas 1', 3, 0),
(10, 'Despacho Entrevistas 2', 3, 0),
(11, 'Salón de actos 1', 1, 0),
(12, 'Salón de actos 2', 1, 0),
(13, 'Proyector 1', 2, 0),
(14, 'Proyector 2', 2, 0),
(15, 'Portatil 1', 2, 0),
(16, 'Portatil 2', 2, 0),
(17, 'Portatil 3', 2, 0),
(18, 'Movil 1', 2, 0),
(19, 'Movil 2', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(100) NOT NULL COMMENT 'Clave primaria',
  `id_empleado` int(10) DEFAULT NULL COMMENT 'FK del empleado que hace la reserva',
  `id_recurso` int(10) DEFAULT NULL COMMENT 'FK del recurso que se reserva',
  `tipo_recurso` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_recurso` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `horainicio_reserva` time NOT NULL COMMENT 'Fecha y hora a la que se realiza la reserva',
  `horasalida_reserva` time DEFAULT NULL COMMENT 'Fecha y hora a la que se realiza la devolución de la reserva',
  `dia_reserva` date NOT NULL COMMENT 'Fecha a la que se realiza la devolución de la reserva',
  `nombre_usuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de las reservas que se realizan';

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id_reserva`, `id_empleado`, `id_recurso`, `tipo_recurso`, `nombre_recurso`, `horainicio_reserva`, `horasalida_reserva`, `dia_reserva`, `nombre_usuario`) VALUES
(24, NULL, NULL, 'Sala Polivalente 1', 'Sala', '11:11:00', '12:12:00', '2018-10-26', ''),
(25, NULL, NULL, 'Sala', 'Sala Polivalente 2', '11:11:00', '23:11:00', '2018-10-27', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tiporecurso`
--

CREATE TABLE `tbl_tiporecurso` (
  `id_tiporecurso` int(10) NOT NULL COMMENT 'Clave primaria',
  `nombre_tiporecurso` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre del tipo del recurso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de los tipos de recursos';

--
-- Volcado de datos para la tabla `tbl_tiporecurso`
--

INSERT INTO `tbl_tiporecurso` (`id_tiporecurso`, `nombre_tiporecurso`) VALUES
(1, 'Sala'),
(2, 'Dispositivos portatiles'),
(3, 'Despachos'),
(4, 'Talleres');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `id_empleado` (`id_empleado`),
  ADD UNIQUE KEY `DNI_empleado` (`DNI_empleado`);

--
-- Indices de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD PRIMARY KEY (`id_recurso`),
  ADD UNIQUE KEY `id_recurso` (`id_recurso`),
  ADD KEY `FK_id_tiporecurso` (`id_tiporecurso`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`),
  ADD KEY `FK_id_empleado` (`id_empleado`),
  ADD KEY `FK_id_recurso` (`id_recurso`);

--
-- Indices de la tabla `tbl_tiporecurso`
--
ALTER TABLE `tbl_tiporecurso`
  ADD PRIMARY KEY (`id_tiporecurso`),
  ADD UNIQUE KEY `id_tiporecurso` (`id_tiporecurso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  MODIFY `id_recurso` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id_reserva` int(100) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tbl_tiporecurso`
--
ALTER TABLE `tbl_tiporecurso`
  MODIFY `id_tiporecurso` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria', AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD CONSTRAINT `FK_id_tiporecurso` FOREIGN KEY (`id_tiporecurso`) REFERENCES `tbl_tiporecurso` (`id_tiporecurso`);

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `FK_id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `tbl_empleados` (`id_empleado`),
  ADD CONSTRAINT `FK_id_recurso` FOREIGN KEY (`id_recurso`) REFERENCES `tbl_recurso` (`id_recurso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
