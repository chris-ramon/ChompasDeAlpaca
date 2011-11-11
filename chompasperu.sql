-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2011 a las 03:17:05
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `chompasperu`
--
CREATE DATABASE `chompasperu` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `chompasperu`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chompas`
--

CREATE TABLE IF NOT EXISTS `chompas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_insumo` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `stock_minimo` int(10) NOT NULL,
  `stock_actual` int(10) NOT NULL,
  `unidades_pedido` int(3) NOT NULL,
  `imagen` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(10) NOT NULL,
  `cantidad_pendiente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_insumo` (`id_insumo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `chompas`
--

INSERT INTO `chompas` (`id`, `id_insumo`, `nombre`, `stock_minimo`, `stock_actual`, `unidades_pedido`, `imagen`, `precio`, `cantidad_pendiente`) VALUES
(1, 1, 'Office', 100, 191, 200, 'chompa1.jpg', 200, 0),
(2, 2, 'Mid Season', 80, 100, 100, 'chompa2.jpg', 222, 0),
(3, 1, 'Holmes', 80, 130, 100, 'chompa3.jpg', 321, 0),
(4, 3, 'Girardo', 120, 270, 180, 'chompa4.jpg', 180, 0),
(5, 1, 'Anton', 100, 100, 150, 'chompa5.jpg', 170, 0),
(6, 3, 'L Blanc', 150, 150, 200, 'chompa6.jpg', 490, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE IF NOT EXISTS `insumos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id`, `nombre`) VALUES
(1, 'Classic'),
(2, 'Modern'),
(3, 'Elegant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_insumo` int(11) NOT NULL,
  `id_chompa` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `fecha_llegada` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_insumo` (`id_insumo`),
  KEY `id_chompa` (`id_chompa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=32 ;

--
-- Volcar la base de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_insumo`, `id_chompa`, `estado`, `cantidad`, `fecha_envio`, `fecha_llegada`) VALUES
(27, 1, 1, 'recibido', 1, '2011-11-09 11:21:35', '2011-11-09 11:22:04'),
(28, 2, 2, 'recibido', 1, '2011-11-09 11:22:57', '2011-11-09 11:23:18'),
(29, 1, 3, 'recibido', 1, '2011-11-09 11:22:57', '2011-11-09 11:23:21'),
(30, 3, 4, 'recibido', 1, '2011-11-09 11:24:37', '2011-11-09 11:25:23'),
(31, 1, 1, 'recibido', 1, '2011-11-09 11:46:03', '2011-11-10 09:31:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol`) VALUES
(1, 'system', '0be5a6c82893ecaa8bb29bd36831e457', 'admin');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `chompas`
--
ALTER TABLE `chompas`
  ADD CONSTRAINT `chompas_ibfk_1` FOREIGN KEY (`id_insumo`) REFERENCES `insumos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_insumo`) REFERENCES `insumos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_chompa`) REFERENCES `chompas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
