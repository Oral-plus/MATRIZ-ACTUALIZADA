-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2023 a las 17:42:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriiz`
--

CREATE TABLE `matriiz` (
  `id1` int(10) NOT NULL,
  `inspector` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `subproceso` varchar(200) NOT NULL,
  `fecha` varchar(200) NOT NULL,
  `hora_inicio` varchar(200) NOT NULL,
  `nreferencias` varchar(200) NOT NULL,
  `unidades_p` varchar(200) NOT NULL,
  `unidades_n` varchar(200) NOT NULL,
  `odservaciones` varchar(200) NOT NULL,
  `fecha_final` varchar(200) NOT NULL,
  `hora_final` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `matriiz`
--

INSERT INTO `matriiz` (`id1`, `inspector`, `area`, `proceso`, `subproceso`, `fecha`, `hora_inicio`, `nreferencias`, `unidades_p`, `unidades_n`, `odservaciones`, `fecha_final`, `hora_final`) VALUES
(15, 'seleccione el inspector', 'Seleccione el area', 'Otros', 'Reunion', '2001', '00:17', '12345', '2', '1', 'mal dispensada', '2023-05-24', '03:24'),
(16, 'Melisa Salsedo', 'Laboratorio', 'Fabricación', 'Preparación de cosmeticos', '2001', '00:30', '0142587', '200', '0', 'NADA', '2023-05-25', '14:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `matriiz`
--
ALTER TABLE `matriiz`
  ADD PRIMARY KEY (`id1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `matriiz`
--
ALTER TABLE `matriiz`
  MODIFY `id1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
