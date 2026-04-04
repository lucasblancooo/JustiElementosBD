-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2026 a las 17:23:12
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
-- Base de datos: `justi_elementos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_cliente` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ID_destino` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_cliente`, `Nombre`, `Apellido`, `telefono`, `ID_destino`) VALUES
(1, 'Celeste', 'Nuñez', '01124072499', 1),
(2, 'Lucas', 'Blanco', '1233434234', 2),
(3, 'dante', 'ramirez', '526534634', 3),
(4, 'Nicolas', 'Meijide', '1154363666', 4),
(5, 'Agustin', 'Jones', '41344', 5),
(6, 'rocco', 'cavalieri', '424131414', 6),
(7, 'Thiago', 'Montenegro', '874444234', 7),
(8, 'Juan', 'Santisi', '50205209', 8),
(9, 'Vito', 'Martin', '9529529', 9),
(10, 'Leon', 'Veraldi', '844212556', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `ID_destino` int(10) UNSIGNED NOT NULL,
  `Nom_destino` varchar(50) NOT NULL,
  `cod_postal` int(50) UNSIGNED NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`ID_destino`, `Nom_destino`, `cod_postal`, `direccion`) VALUES
(1, 'Caracas', 1429, 'Amenabar 3672'),
(2, 'Argentina', 2314, 'Ibera 2312'),
(3, 'Villa Pueyredon', 4444, 'caracas 3213'),
(4, 'Urquiza', 3333, 'Monroe 332'),
(5, 'Saavedra', 4441, 'Hola 4011'),
(6, 'Saavedra', 3123, 'Plaza 4141'),
(7, 'Belgrano', 4211, 'España 3111'),
(8, 'Saavedra', 7535, 'Amenabar 3900'),
(9, 'Nuñez', 7777, 'Monroe 3114'),
(10, 'Carapachay', 8733, 'Gral Paz 3333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `ID_metodo` int(10) UNSIGNED NOT NULL,
  `nom_metodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`ID_metodo`, `nom_metodo`) VALUES
(1, 'Mercado Pago'),
(2, 'Uala'),
(3, 'Efectivo'),
(4, 'BBVA'),
(5, 'PayPal'),
(6, 'Nexo'),
(7, 'Brubank'),
(8, 'RapiPago'),
(9, 'Mastercard'),
(10, 'Santander');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `ID_orden` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_term` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto_total` decimal(10,2) NOT NULL,
  `ID_cliente` int(10) UNSIGNED NOT NULL,
  `ID_prod` int(10) UNSIGNED NOT NULL,
  `ID_metodo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`ID_orden`, `fecha_inicio`, `fecha_term`, `cantidad`, `monto_total`, `ID_cliente`, `ID_prod`, `ID_metodo`) VALUES
(1, '2026-03-31', '2026-04-07', 4, 1332.00, 2, 2, 2),
(2, '2026-04-04', '2026-04-11', 3, 4800000.00, 3, 4, 3),
(3, '2026-04-04', '2026-04-11', 3, 999.00, 3, 2, 2),
(4, '2026-04-04', '2026-04-11', 3, 999.00, 3, 2, 2),
(5, '2026-04-04', '2026-04-11', 2, 10.00, 1, 1, 3),
(6, '2026-04-04', '2026-04-11', 5, 2004.50, 2, 5, 2),
(7, '2026-04-04', '2026-04-11', 4, 4.00, 1, 6, 4),
(8, '2026-04-04', '2026-04-11', 4, 4.00, 1, 6, 4),
(9, '2026-04-04', '2026-04-11', 40, 60.00, 5, 7, 5),
(10, '2026-04-04', '2026-04-11', 2, 20000.00, 8, 9, 7),
(11, '2026-04-04', '2026-04-11', 1, 1600000.00, 2, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_prod` int(10) UNSIGNED NOT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `disponibilidad` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_prod`, `nom_prod`, `precio`, `disponibilidad`) VALUES
(1, 'madera', 5.00, 0),
(2, 'destornillador', 333.00, 0),
(3, 'Martillo', 999.99, 0),
(4, 'Amoladora', 1600000.00, 0),
(5, 'Serrucho', 400.90, 0),
(6, 'tornillo', 1.00, 0),
(7, 'Clavo', 1.50, 0),
(8, 'Escalera de mano', 4500.00, 0),
(9, 'Hacha', 10000.00, 0),
(10, 'Tuerca', 2.50, 0);

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
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`ID_metodo`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`ID_orden`),
  ADD KEY `ID_cliente` (`ID_cliente`),
  ADD KEY `ID_prod` (`ID_prod`),
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
  MODIFY `ID_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `ID_destino` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `ID_metodo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `ID_orden` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_prod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`ID_destino`) REFERENCES `destino` (`ID_destino`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`ID_cliente`) REFERENCES `clientes` (`ID_cliente`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`ID_prod`) REFERENCES `producto` (`ID_prod`),
  ADD CONSTRAINT `orden_ibfk_3` FOREIGN KEY (`ID_metodo`) REFERENCES `metodo_pago` (`ID_metodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
