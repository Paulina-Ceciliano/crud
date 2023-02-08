-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2023 a las 17:09:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Alumno'),
(3, 'Alumno'),
(4, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `idRol` int(11) NOT NULL,
  `estatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `username`, `correo`, `password`, `fecha`, `idRol`, `estatus`) VALUES
(20, 'Juan', 'Perez', 'juanperez', 'juanp@mail.com', '123456', '2020-01-01', 1, 'Activo'),
(33, 'Prueba', 'Prueba', 'Prueba', 'prb@mail.com', 'azsdasdasd', 'fecha', 1, 'Inactivo'),
(35, 'Prueba 2', 'Prueba 2', 'prb 2', 'prb2@mail.com', '12345', 'Fecha', 1, 'Inactivo'),
(36, 'Prueba 3', 'Prueba 3', 'prb 3', 'prb3@gmail.com', 'asdasdasd', '06-02-2023', 1, 'Inactivo'),
(37, 'Adrian', 'Arroyo', 'GibAdrian', 'adrian@clico.mx', 'QWERTY12345', '06-02-2023', 1, 'Inactivo'),
(38, 'Paulina', 'Ceciliano', 'Pau', 'pau@mail.com', '123123123', '06-02-2023', 1, 'Inactivo'),
(39, 'md5', 'md5', 'md5', 'md5@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', '06-02-2023', 1, 'Inactivo'),
(40, 'nuevo', 'nuevo', 'nuevo', 'new@mail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '06-02-2023', 1, 'Inactivo'),
(41, 'Paulina', 'Ceciliano', 'Ceci2', 'ceci@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '07-02-2023', 2, 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
