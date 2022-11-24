-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 18:53:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd_eclipse`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `clave` varchar(255) NOT NULL,
  `telef` varchar(10) DEFAULT NULL,
  `fechaalta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `rol`, `nombre`, `direccion`, `email`, `clave`, `telef`, `fechaalta`) VALUES
(1, 1, 'admin', 'Calle Mesones', 'admin@mail.es', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '640797955', '2022-11-03 17:05:37'),
(2, 2, 'usuario', 'Calle Sin Calle', 'user@gmail.com', '9250e222c4c71f0c58d4c54b50a880a312e9f9fed55d5c3aa0b0e860ded99165', '654356456', '2022-11-22 19:39:22'),
(3, 1, 'luismi', 'Calle de Talavera', 'luismiguelmorales@riberadeltajo.es', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '655555555', '2022-11-24 10:34:01'),
(4, 1, 'israel', 'Calle de Talavera', 'israelElmahDuro@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '666777888', '2022-11-24 10:35:26'),
(5, 1, 'roberto', 'Calle de Talavera', 'robertoAKpildoriñas@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '633222333', '2022-11-24 10:36:16'),
(6, 2, 'pedro', 'Calle de Talavera', 'pedro@gmaiil.com', '9250e222c4c71f0c58d4c54b50a880a312e9f9fed55d5c3aa0b0e860ded99165', '644789987', '2022-11-24 10:37:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(3) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(6) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `precio`, `tipo`) VALUES
(1, 'NVMe PCIe 2TB', 150, 'Disco duro'),
(2, 'Intel Core i7 10700K ', 399, 'Procesador'),
(4, 'Asus ROG Strix B560A', 125, 'Placa Base'),
(5, 'Gigabyte Aorus B560 ', 220, 'Placa base'),
(8, 'Razer Raion', 40, 'Periférico'),
(10, 'Razer Deathadder V2', 80, 'Ratón'),
(13, 'MSI VENTUS 2X GeForce RTX 3060', 430, 'Tarjeta gráfica'),
(15, 'MSI MPG Sekira 100R ARGB', 90, 'Gabinete'),
(16, 'MSI Optix 23.6\"', 180, 'Monitor'),
(17, 'Asus ROG Claymore II MecánicoRGB RX Red', 220, 'Teclado'),
(18, 'Krom Kernel TKL', 60, 'Teclado'),
(19, 'Asus ROG Strix Scope NX TKL Moonlight White RGB', 150, 'Teclado'),
(20, 'Asus TUF GAMING B560-PLUS', 120, 'Placa base'),
(21, 'AMD RYZEN 7 5800X', 500, 'Procesador'),
(22, 'AMD RYZEN 5 3500G', 350, 'Procesador'),
(23, 'Intel Core i5 10600K', 320, 'Procesador'),
(24, 'Intel Core i5 10400F', 140, 'Procesador'),
(25, 'Intel Core i3 11100F', 110, 'Procesador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` int(3) NOT NULL,
  `idcliente` int(3) NOT NULL,
  `fechaventa` timestamp NOT NULL DEFAULT current_timestamp(),
  `observaciones` mediumtext NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `idcliente`, `fechaventa`, `observaciones`, `total`) VALUES
(1, 2, '2022-11-24 10:30:37', 'Intel Core i5 10400F X 1, NVMe PCIe 2TB X 1, Asus ROG Strix B560A X 1, ', 415),
(2, 6, '2022-11-24 10:39:17', 'MSI VENTUS 2X GeForce RTX 3060 X 1, Gigabyte Aorus B560  X 1, ', 650),
(3, 2, '2022-11-24 11:28:06', 'NVMe PCIe 2TB X 5, Intel Core i7 10700K  X 3, ', 1947),
(4, 2, '2022-11-24 14:00:07', 'AMD RYZEN 7 5800X X 4, Gigabyte Aorus B560  X 4, Razer Deathadder V2 X 5, ', 3280),
(5, 2, '2022-11-24 14:07:29', 'NVMe PCIe 2TB X 3, Intel Core i7 10700K  X 2, Asus ROG Strix B560A X 4, ', 1748),
(6, 2, '2022-11-24 17:34:32', 'NVMe PCIe 2TB X 4, Intel Core i7 10700K  X 5, Asus ROG Strix B560A X 1, ', 2720),
(7, 6, '2022-11-24 17:51:16', 'Asus ROG Strix B560A X 3, Intel Core i7 10700K  X 3, MSI MPG Sekira 100R ARGB X 3, ', 1842);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `v_idcliente_fk` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `v_idcliente_fk` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
