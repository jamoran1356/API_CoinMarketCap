-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-12-2022 a las 19:02:42
-- Versión del servidor: 5.7.40-cll-lve
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pydti_criptomercado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ccat`
--

CREATE TABLE `ccat` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criptomercado`
--

CREATE TABLE `criptomercado` (
  `id` int(21) NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `rank` int(1) NOT NULL,
  `nombre` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `simbolo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `max_supply` int(11) NOT NULL,
  `precio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `volumen24h` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cambio1hr` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `marketcap` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `dominancia` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ccat`
--
ALTER TABLE `ccat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `criptomercado`
--
ALTER TABLE `criptomercado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ccat`
--
ALTER TABLE `ccat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `criptomercado`
--
ALTER TABLE `criptomercado`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
