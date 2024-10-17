-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 01:32:33
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
-- Database: `caninofeliz`
--

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `idCitas` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `lugar` varchar(45) NOT NULL,
  `clientes_idClientes` int(11) NOT NULL,
  `empleados_idEmpleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `citas_has_servicios`
--

CREATE TABLE `citas_has_servicios` (
  `citas_idCitas` int(11) NOT NULL,
  `servicios_idServicios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `nombre`, `apellido`, `correo`, `telefono`, `usuario`, `password`, `estado`) VALUES
(1, 'Pacho', 'Lopez', 'lopez@gmail.com', '312', 'pacho1', '1', 'inactivo'),
(2, 'Diego', 'Valdes', 'bitardos8@gmail.com', '311', 'bits8', '12', 'inactivo'),
(7, 'Alo', 'Sans', 'sans8@gmail.com', '314', 'sans', '12345', 'inactivo'),
(8, 'Diego', 'Valdes', 'bitardos10@gmail.com', '315', 'bits10', '0000', 'inactivo'),
(9, 'Diego1', 'Valdes1', 'bitardos11@gmail.com', '31115', 'bits11', '0000', 'inactivo'),
(10, 'a', 'e', 'assss@gmail.com', '1233333', 'aaaaa', '12345', 'inactivo'),
(11, 'alaverga', 'e', 'ae@gmail.com', '123333', 'diego', '1234', 'activo'),
(12, 'Lopez', 'Veraniego', 'veraniego1@gmail.com', '310', 'veraLo10', '22', 'inactivo'),
(27, 'colombiasas', 'pictures', 'bitardos81@gmail.com', '320', 'bits9', '12345', 'activo');

--
-- Dumping data for table `clientes`
--
-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleados` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `apellido` varchar(55) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomina` int(11) NOT NULL,
  `roles_idRoles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `idMascotas` int(11) NOT NULL,
  `nombreMascota` varchar(45) NOT NULL,
  `razaMascota` varchar(45) NOT NULL,
  `edadMascota` int(11) NOT NULL,
  `comentarioMascota` varchar(200) NOT NULL,
  `clientes_idClientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `titulo_modulo` varchar(50) DEFAULT NULL,
  `descripcion_modulo` text DEFAULT NULL,
  `status_modulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `titulo_modulo` varchar(50) DEFAULT NULL,
  `descripcion_modulo` text DEFAULT NULL,
  `status_modulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modulos`
--
-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `idPagos` int(11) NOT NULL,
  `metodo` varchar(45) NOT NULL,
  `numeroTarjeta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idInventario` int(11) NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `codigoSKU` varchar(30) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idInventario`, `nombreProducto`, `cantidadProducto`, `codigoSKU`, `estado`, `precio`) VALUES
(1, 'Papas', 30, '001001001', '0', 1000),
(2, 'sopas', 0, '101010', '1', 12);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idInventario` int(11) NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `precio` int(11) NOT NULL,
  `codigoSKU` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--
-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) NOT NULL,
  `descripcion_rol` varchar(200) NOT NULL,
  `status_rol` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `idServicios` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `clientes_idClientes` int(11) NOT NULL,
  `empleados_idEmpleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ventas_has_inventario`
--

CREATE TABLE `ventas_has_inventario` (
  `ventas_idVentas` int(11) NOT NULL,
  `inventario_idInventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCitas`),
  ADD KEY `fk_citas_clientes1_idx` (`clientes_idClientes`),
  ADD KEY `fk_citas_empleados1_idx` (`empleados_idEmpleados`);

--
-- Indexes for table `citas_has_servicios`
--
ALTER TABLE `citas_has_servicios`
  ADD PRIMARY KEY (`citas_idCitas`,`servicios_idServicios`),
  ADD KEY `fk_citas_has_servicios_servicios1_idx` (`servicios_idServicios`),
  ADD KEY `fk_citas_has_servicios_citas_idx` (`citas_idCitas`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD UNIQUE KEY `telefono` (`telefono`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleados`),
  ADD UNIQUE KEY `idEmpleados_UNIQUE` (`idEmpleados`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD KEY `fk_empleados_roles1_idx` (`roles_idRoles`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`idMascotas`),
  ADD KEY `fk_mascotas_clientes1_idx` (`clientes_idClientes`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPagos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idInventario`),
  ADD UNIQUE KEY `codigoSKU` (`codigoSKU`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicios`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVentas`),
  ADD KEY `fk_ventas_clientes1_idx` (`clientes_idClientes`),
  ADD KEY `fk_ventas_empleados1_idx` (`empleados_idEmpleados`);

--
-- Indexes for table `ventas_has_inventario`
--
ALTER TABLE `ventas_has_inventario`
  ADD PRIMARY KEY (`ventas_idVentas`,`inventario_idInventario`),
  ADD KEY `fk_ventas_has_inventario_inventario1_idx` (`inventario_idInventario`),
  ADD KEY `fk_ventas_has_inventario_ventas1_idx` (`ventas_idVentas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citas`
--
ALTER TABLE `citas`
  MODIFY `idCitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `idMascotas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVentas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_citas_clientes1` FOREIGN KEY (`clientes_idClientes`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_citas_empleados1` FOREIGN KEY (`empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `citas_has_servicios`
--
ALTER TABLE `citas_has_servicios`
  ADD CONSTRAINT `fk_citas_has_servicios_citas` FOREIGN KEY (`citas_idCitas`) REFERENCES `citas` (`idCitas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_citas_has_servicios_servicios1` FOREIGN KEY (`servicios_idServicios`) REFERENCES `servicios` (`idServicios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_empleados_roles1` FOREIGN KEY (`roles_idRoles`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `fk_mascotas_clientes1` FOREIGN KEY (`clientes_idClientes`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_clientes1` FOREIGN KEY (`clientes_idClientes`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_empleados1` FOREIGN KEY (`empleados_idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ventas_has_inventario`
--
ALTER TABLE `ventas_has_inventario`
  ADD CONSTRAINT `fk_ventas_has_inventario_inventario1` FOREIGN KEY (`inventario_idInventario`) REFERENCES `productos` (`idInventario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_has_inventario_ventas1` FOREIGN KEY (`ventas_idVentas`) REFERENCES `ventas` (`idVentas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
