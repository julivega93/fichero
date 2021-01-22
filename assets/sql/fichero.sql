-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2021 a las 00:13:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fichero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `empleado_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `pin` int(11) NOT NULL,
  `ultlogin` datetime DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `rol` char(1) NOT NULL DEFAULT 'u'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`empleado_id`, `nombre`, `apellido`, `pin`, `ultlogin`, `estado`, `rol`) VALUES
(1, 'Julian', 'Vega', 10, '2021-01-22 19:41:36', 1, 'u'),
(2, 'Joaquin', 'Ardanza', 11, '2021-01-17 09:47:02', 1, 'u'),
(3, 'Usuario', 'Apellido', 12, '2021-01-22 19:39:00', 1, 'u'),
(18, 'Admin', 'Administrador', 99, NULL, 1, 'a'),
(19, 'Nombre', 'Apellido', 14, '2021-01-17 21:12:05', 1, 'u'),
(20, 'asdasd', 'dsadsa', 22, '2021-01-22 20:11:54', 1, 'u'),
(21, 'zxczxc', 'zxczxc', 23, '2021-01-17 20:58:27', 1, 'u');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `registro_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `entrada` datetime NOT NULL DEFAULT current_timestamp(),
  `salida` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`registro_id`, `empleado_id`, `entrada`, `salida`, `estado`) VALUES
(130, 1, '2021-01-12 19:12:08', '2021-01-12 19:12:10', 1),
(132, 2, '2021-01-12 19:12:21', '2021-01-12 19:12:23', 1),
(133, 3, '2021-01-12 19:12:32', '2021-01-12 19:12:33', 1),
(134, 1, '2021-01-12 19:12:42', '2021-01-12 19:13:01', 1),
(135, 3, '2021-01-12 19:12:57', '2021-01-12 19:13:11', 1),
(136, 1, '2021-01-12 20:22:18', '2021-01-12 20:22:27', 1),
(149, 1, '2021-01-17 09:18:56', '2021-01-17 09:18:57', 1),
(150, 1, '2021-01-17 09:18:58', '2021-01-17 09:18:58', 1),
(151, 1, '2021-01-17 09:18:59', '2021-01-17 09:18:59', 1),
(154, 14, '2021-01-17 09:27:29', '2021-01-17 09:27:54', 1),
(155, 16, '0000-00-00 00:00:00', '2021-01-17 09:42:08', 1),
(156, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(157, 17, '2021-01-17 09:43:21', '2021-01-17 09:43:23', 1),
(158, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(159, 19, '2021-01-17 09:45:28', '2021-01-17 09:45:34', 1),
(160, 1, '2021-01-17 09:45:56', '2021-01-17 09:47:00', 1),
(161, 2, '2021-01-17 09:45:59', '2021-01-17 09:47:03', 1),
(162, 3, '2021-01-17 09:46:02', '2021-01-17 09:47:07', 1),
(163, 19, '2021-01-17 09:46:05', '2021-01-17 09:47:11', 1),
(164, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(165, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(166, 1, '2021-01-17 21:46:10', '2021-01-17 21:46:21', 1),
(167, 1, '2021-01-22 19:38:51', '2021-01-22 19:39:15', 1),
(168, 1, '2021-01-22 19:41:46', '2021-01-22 19:41:49', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empleado_id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`registro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empleado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `registro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
