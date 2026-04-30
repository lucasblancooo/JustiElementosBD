-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2026 a las 02:01:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `justi_elementos_v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_cliente` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `ID_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_cliente`, `Nombre`, `Apellido`, `Telefono`, `ID_destino`) VALUES
(1, 'Celeste', 'Nuñez', '0112224434', 1),
(2, 'Dante', 'Ramirez', '1143438553', 2),
(3, 'Lucas', 'Blanco', '123456789', 3),
(4, 'Nicolas', 'Meijide', '987654321', 4),
(5, 'Rocco', 'Cavalieri', '412867832', 5),
(6, 'juan pablo', 'santisi', '1194395224', 6),
(7, 'Ramiro', 'Tatone', '1234587654', 7),
(8, 'Leon', 'Veraldi', '982569432', 8),
(9, 'Santino', 'Moauro', '542369853', 9),
(10, 'Vito', 'Martin', '7654765765', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `ID_destino` int(11) NOT NULL,
  `nom_destino` varchar(100) NOT NULL,
  `cod_postal` varchar(10) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`ID_destino`, `nom_destino`, `cod_postal`, `direccion`) VALUES
(1, 'Saavedra', '1429', 'monroe 988'),
(2, 'Villa Pueyredon', '1444', 'caracas 3213'),
(3, 'Vicente Lopez', '1234', 'gral jose maria paz 4359'),
(4, 'Urquiza', '5432', 'Ibera 2312'),
(5, 'Saavedra', '6543', 'superi 4343'),
(6, 'Nuñez', '1853', 'amenabar 1000'),
(7, 'Saavedra', '6543', 'España 3111'),
(8, 'Carapachay', '1111', 'caracas 800'),
(9, 'Urquiza', '8268', 'Hola 4011'),
(10, 'Villa Pueyredon', '6336', 'Italia 2311');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `ID_detalle` int(11) NOT NULL,
  `ID_orden` int(11) NOT NULL,
  `ID_prod` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL CHECK (`cantidad` > 0),
  `precio_unitario` decimal(10,2) NOT NULL CHECK (`precio_unitario` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`ID_detalle`, `ID_orden`, `ID_prod`, `cantidad`, `precio_unitario`) VALUES
(10, 10, NULL, 1, 500.00),
(11, 11, NULL, 2, 500.00),
(12, 11, NULL, 100, 1.00),
(13, 12, 10, 1, 170.00),
(14, 13, 10, 3, 200.00),
(15, 13, NULL, 50, 122.00),
(16, 13, NULL, 200, 1.75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_de_pago`
--

CREATE TABLE `metodo_de_pago` (
  `ID_metodo` int(11) NOT NULL,
  `nom_metodo` varchar(100) NOT NULL,
  `descuento` decimal(5,2) NOT NULL DEFAULT 0.00 CHECK (`descuento` >= 0 and `descuento` <= 100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_de_pago`
--

INSERT INTO `metodo_de_pago` (`ID_metodo`, `nom_metodo`, `descuento`) VALUES
(1, 'Mercado Pago', 15.00),
(2, 'Uala', 30.00),
(3, 'Mastercard', 20.00),
(4, 'BBVA', 0.00),
(5, 'Santander', 25.00),
(6, 'RapiPago', 5.00),
(7, 'Efectivo', 30.00),
(8, 'Visa', 10.00),
(9, 'Brubank', 15.00),
(10, 'NaranjaX', 20.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `ID_orden` int(11) NOT NULL,
  `Fecha_inicio` date NOT NULL DEFAULT curdate(),
  `Fecha_term` date DEFAULT NULL,
  `monto_total` decimal(12,2) NOT NULL,
  `ID_cliente` int(11) NOT NULL,
  `ID_metodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`ID_orden`, `Fecha_inicio`, `Fecha_term`, `monto_total`, `ID_cliente`, `ID_metodo`) VALUES
(1, '2026-04-28', '2026-05-05', 0.00, 1, 1),
(2, '2026-04-28', '2026-05-05', 0.00, 1, 1),
(3, '2026-04-28', '2026-05-05', 0.00, 1, 1),
(4, '2026-04-28', '2026-05-05', 425.85, 1, 1),
(5, '2026-04-28', '2026-05-05', 1400.00, 1, 2),
(6, '2026-04-28', '2026-05-05', 0.00, 1, 1),
(7, '2026-04-28', '2026-05-05', 0.00, 1, 1),
(8, '2026-04-28', '2026-05-05', 3570.00, 1, 1),
(9, '2026-04-29', '2026-05-06', 13355.20, 1, 1),
(10, '2026-04-29', '2026-05-06', 4083.40, 1, 1),
(11, '2026-04-29', '2026-05-06', 770.00, 1, 2),
(12, '2026-04-29', '2026-05-06', 144.50, 1, 1),
(13, '2026-04-29', '2026-05-06', 5992.50, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_prod` int(11) NOT NULL,
  `nom_prod` varchar(150) NOT NULL,
  `precio` decimal(10,2) NOT NULL CHECK (`precio` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_prod`, `nom_prod`, `precio`) VALUES
(10, 'Escalera de mano', 250.00),
(13, 'destornillador', 450.00),
(15, 'Escalera de mano', 1000.00),
(17, 'Clavo', 4.00),
(18, 'Serrucho', 15000.00),
(19, 'tornillo', 2.00),
(20, 'Amoladora', 6000.00),
(21, 'Casco', 3000.00),
(22, 'bolsa cal 1kg', 1500.00),
(23, 'bolsa arena 1kg', 4000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_cliente`),
  ADD KEY `ID_destino` (`ID_destino`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`ID_destino`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`ID_detalle`),
  ADD KEY `ID_orden` (`ID_orden`),
  ADD KEY `ID_prod` (`ID_prod`);

--
-- Indices de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  ADD PRIMARY KEY (`ID_metodo`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`ID_orden`),
  ADD KEY `ID_cliente` (`ID_cliente`),
  ADD KEY `ID_metodo` (`ID_metodo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_prod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `ID_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `ID_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  MODIFY `ID_metodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `ID_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
ALTER TABLE `detalle_orden` CHANGE `cantidad` `cantidad` INT(11) UNSIGNED NOT NULL;
ALTER TABLE `metodo_de_pago` CHANGE `descuento` `descuento` DECIMAL(5,2) UNSIGNED NOT NULL DEFAULT '0.00';
--

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`ID_destino`) REFERENCES `destino` (`ID_destino`);

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`ID_orden`) REFERENCES `orden` (`ID_orden`),
  ADD CONSTRAINT `fk_detalle_producto` FOREIGN KEY (`ID_prod`) REFERENCES `producto` (`ID_prod`) ON DELETE SET NULL;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`ID_cliente`) REFERENCES `clientes` (`ID_cliente`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`ID_metodo`) REFERENCES `metodo_de_pago` (`ID_metodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
