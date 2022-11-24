-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 07:32:16
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
(2, 2, 'usuario', 'Calle Sin Calle', 'user@gmail.com', '9250e222c4c71f0c58d4c54b50a880a312e9f9fed55d5c3aa0b0e860ded99165', '654356456', '2022-11-22 19:39:22');

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
(4, 'Asus Rog Strix B550 White', 125, 'Placa Base'),
(5, 'Gigabyte Aorus B560 ', 220, 'Placa base'),
(8, 'Razer Raion', 40, 'Periférico'),
(10, 'Razer Deathadder V2', 80, 'Periférico');

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
(5, 2, '2022-11-24 06:03:51', 'NVMe PCIe 2TB X 3, Intel Core i7 10700K  X 3, Asus Rog Strix B550 White X 5, ', 2272),
(6, 2, '2022-11-24 06:15:05', 'NVMe PCIe 2TB X 4, Intel Core i7 10700K  X 5, Asus Rog Strix B550 White X 5, ', 3220);

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
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
