-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 17:04:54
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
-- Base de datos: `proyecto`
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
(1, 1, 'admin', 'Calle Mesones', 'admin@mail.es', '$2y$10$f4eM5T1HJ0i.xT12.glMGOkHYeDWa12xxn7gjI4jfOm0ZNisg5G56', '640797955', '2022-11-03 17:05:37'),
(2, 2, 'usu1', 'Madrid', 'usu1@usu1.es', '$2y$10$J4UCHO4FQ8.Mwm9M.sVwjuLUQQhW8I9BtwwnbkUZG78tSOwCx.iXu', '9123456123', '2020-06-10 20:00:00'),
(3, 2, 'sheila', 'francisco quevedo', 'sheilala6c@gmail.com', '$2y$10$u//XRI4GtJrWcZ.oS.j5J.sTrhsNVdjSa0r1.DagchhX1WcqcIjkC', '711704299', '2022-06-13 20:00:00'),
(4, 2, 'Israel Gutierrez', 'Calle Mesones', 's.israel8567@hotmail.com', '9e7a57692852572cc3d9b506da772136c23f5efa6ba4b1da33c393996c5fd0bf', '640797955', '2022-11-15 19:17:41'),
(5, 1, 'aaa', 'aaa', 'aaa', '9834876dcfb05cb167a5c24953eba58c4ac89b1adf57f28f2f9d09af107ee8f0', '666666666', '2022-11-16 15:46:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
