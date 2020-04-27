-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-02-2020 a las 12:52:47
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tickets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(3) NOT NULL,
  `Fecha_inicio` date DEFAULT NULL,
  `Tecnico` varchar(30) DEFAULT NULL,
  `Cliente` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(300) DEFAULT NULL,
  `Clasificacion` enum('Software','PC','Correo','otro') DEFAULT NULL,
  `Estado` enum('Abierta','Cerrada','Assignada') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `Fecha_inicio`, `Tecnico`, `Cliente`, `Descripcion`, `Clasificacion`, `Estado`) VALUES
(1, '2019-12-18', 'jmoral', 'IMIM', 'no me va el pc', 'PC', 'Abierta'),
(2, '2019-12-18', 'jendrino', 'isglobal', '210', 'Correo', 'Abierta'),
(3, '2019-12-21', 'egarcia', 'eskape', 'Buenas tardes tengo un problema con mi psss', 'Software', 'Cerrada'),
(226, '2020-02-01', 'jmoral', 'montalban', 'buaaa no puedo trabajar desde ayer', 'PC', 'Abierta'),
(234, '2020-02-02', 'jmoral', 'amor de dios', 'no me va el pc de el oficinista', 'PC', 'Abierta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `rol` enum('admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `clave`, `rol`) VALUES
(1, 'jmoral', '1234', 'admin'),
(2, 'jendrino', '1234', 'usuario'),
(4, 'ebranas', '1234', 'usuario'),
(5, 'admin', '1234', 'admin'),
(7, 'user', '1234', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
