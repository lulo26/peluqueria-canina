-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: bhgtoc1qausfbocum0f0-mysql.services.clever-cloud.com:3306
-- Generation Time: Nov 01, 2024 at 05:14 AM
-- Server version: 8.0.15-5
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhgtoc1qausfbocum0f0`
--

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `dia_cita` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `lugar_cita` varchar(45) NOT NULL,
  `estado_cita` int(11) NOT NULL,
  `mascotas_idMascotas` int(11) NOT NULL,
  `empleados_id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`id_cita`, `dia_cita`, `hora_inicio`, `hora_final`, `lugar_cita`, `estado_cita`, `mascotas_idMascotas`, `empleados_id_empleado`) VALUES
(2, '2024-10-17', '06:28:00', '20:30:00', 'El sancocho', 0, 3, 10),
(3, '2024-10-17', '06:39:00', '08:39:00', 'Pedro La estacion', 1, 1, 9),
(4, '2024-10-10', '19:06:00', '22:06:00', 'La virgen de la esquina', 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `citas_has_servicios`
--

CREATE TABLE `citas_has_servicios` (
  `citas_id_cita` int(11) NOT NULL,
  `servicios_id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citas_has_servicios`
--

INSERT INTO `citas_has_servicios` (`citas_id_cita`, `servicios_id_servicio`) VALUES
(3, 1),
(4, 1),
(4, 2);

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
  `estado_cliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`idClientes`, `nombre`, `apellido`, `correo`, `telefono`, `usuario`, `password`, `estado_cliente`) VALUES
(7, 'Caldo', 'Pedro', 'c@gmail.com', '318', 'pedro', '123', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(55) NOT NULL,
  `apellido_empleado` varchar(55) NOT NULL,
  `correo_empleado` varchar(100) NOT NULL,
  `usuario_empleado` varchar(55) NOT NULL,
  `password_empleado` varchar(255) NOT NULL,
  `nomina_empleado` int(11) NOT NULL,
  `estado_empleado` int(11) NOT NULL,
  `roles_idRoles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mascotas`
--

CREATE TABLE `mascotas` (
  `idMascotas` int(11) NOT NULL,
  `nombreMascota` varchar(45) NOT NULL,
  `raza_idraza` int(11) NOT NULL,
  `edadMascota` int(11) NOT NULL,
  `comentarioMascota` varchar(200) NOT NULL,
  `clientes_idclientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mascotas`
--

INSERT INTO `mascotas` (`idMascotas`, `nombreMascota`, `raza_idraza`, `edadMascota`, `comentarioMascota`, `clientes_idclientes`) VALUES
(1, 'h', 12, 15, 'g', 7),
(3, 'pom', 14, 3, 'asd', 7);

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `titulo_modulo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion_modulo` text COLLATE utf8mb4_general_ci,
  `status_modulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `titulo_modulo`, `descripcion_modulo`, `status_modulo`) VALUES
(1, 'Dashboard', NULL, 1),
(2, 'Roles', NULL, 1),
(3, 'Permisos', NULL, 1),
(4, 'Usuarios', NULL, 1),
(5, 'Informes', NULL, 1),
(6, 'Ventas', NULL, 1),
(7, 'Categorias', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `idPagos` int(11) NOT NULL,
  `metodo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `r` int(11) NOT NULL DEFAULT '0',
  `w` int(11) NOT NULL DEFAULT '0',
  `u` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `rol_id`, `modulo_id`, `r`, `w`, `u`, `d`) VALUES
(4, 1, 1, 1, 1, 1, 1),
(5, 1, 2, 1, 1, 1, 1),
(6, 1, 3, 1, 1, 1, 1),
(7, 1, 4, 1, 1, 1, 1),
(8, 1, 5, 1, 1, 1, 1),
(9, 1, 6, 1, 1, 1, 1),
(10, 1, 7, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `identificacion` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` int(20) NOT NULL,
  `email_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(75) COLLATE utf8mb4_general_ci NOT NULL,
  `nit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `razon_social` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rol_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id_persona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `razon_social`, `direccion`, `token`, `rol_id`, `date_created`, `status`) VALUES
(1, '1', 'Web Master', 'WM', 1, 'web@master.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, NULL, NULL, NULL, 1, '2024-11-01 00:47:04', 1),
(2, '12321', 'Albertos', 'Perez', 12321, 'albertos@perez.com', '615ed7fb1504b0c724a296d7a69e6c7b2f9ea2c57c1d8206c5afdf392ebdfd25', NULL, NULL, NULL, NULL, 1, '2024-11-01 00:53:34', 1),
(3, '7898797', 'Roberto', 'Alzate', 4654789, 'robert@alzate.co', '72534c4a93ddc043fe3229ed46b1d526c4ccc747febdcd0f284f7f6057a37858', NULL, NULL, NULL, NULL, 1, '2024-11-01 00:54:15', 1),
(4, '45654', 'Andres', 'Carne De Res', 45654, 'donde@hola.com', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', NULL, NULL, NULL, NULL, 2, '2024-11-01 05:00:27', 1);

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

INSERT INTO `productos` (`idInventario`, `nombreProducto`, `cantidadProducto`, `estado`, `precio`, `codigoSKU`) VALUES
(1, 'asd', 0, 1, 123, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `razas_mascota`
--

CREATE TABLE `razas_mascota` (
  `idRaza` int(11) NOT NULL,
  `nombreRaza` varchar(50) NOT NULL,
  `sizeRaza` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `razas_mascota`
--

INSERT INTO `razas_mascota` (`idRaza`, `nombreRaza`, `sizeRaza`) VALUES
(12, 'hola', 'mediano'),
(13, 'Dalmata', 'pequeno'),
(14, 'pomeramia', 'pequeno');

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

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion_rol`, `status_rol`) VALUES
(1, 'Administrador', 'Admin de la pagina', 1),
(2, 'Vendedor', 'venta de cosas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(45) NOT NULL,
  `precio_servicio` int(11) NOT NULL,
  `descripcion_servicio` varchar(255) NOT NULL,
  `estado_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre_servicio`, `precio_servicio`, `descripcion_servicio`, `estado_servicio`) VALUES
(1, 'Lavado de pelo', 12000, 'Un lavado de pelaje a tu canino', 1),
(2, 'Papas', 20000, 'no se', 1);

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
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_citas_mascotas1_idx` (`mascotas_idMascotas`),
  ADD KEY `fk_citas_empleados1_idx` (`empleados_id_empleado`);

--
-- Indexes for table `citas_has_servicios`
--
ALTER TABLE `citas_has_servicios`
  ADD PRIMARY KEY (`citas_id_cita`,`servicios_id_servicio`),
  ADD KEY `fk_citas_has_servicios_servicios1_idx` (`servicios_id_servicio`),
  ADD KEY `fk_citas_has_servicios_citas_idx` (`citas_id_cita`);

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
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `idEmpleados_UNIQUE` (`id_empleado`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo_empleado`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario_empleado`),
  ADD KEY `fk_empleados_roles1_idx` (`roles_idRoles`);

--
-- Indexes for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`idMascotas`),
  ADD KEY `fk_mascotas_razas_mascota_idx` (`raza_idraza`),
  ADD KEY `fk_mascotas_clientes1_idx` (`clientes_idclientes`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPagos`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `modulo_id` (`modulo_id`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idInventario`);

--
-- Indexes for table `razas_mascota`
--
ALTER TABLE `razas_mascota`
  ADD PRIMARY KEY (`idRaza`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD UNIQUE KEY `nombre_servicio` (`nombre_servicio`);

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
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `idMascotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPagos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `razas_mascota`
--
ALTER TABLE `razas_mascota`
  MODIFY `idRaza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVentas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas_has_servicios`
--
ALTER TABLE `citas_has_servicios`
  ADD CONSTRAINT `citas_has_servicios_ibfk_1` FOREIGN KEY (`citas_id_cita`) REFERENCES `citas` (`id_cita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_has_servicios_ibfk_2` FOREIGN KEY (`servicios_id_servicio`) REFERENCES `servicios` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `fk_mascotas_clientes1` FOREIGN KEY (`clientes_idclientes`) REFERENCES `clientes` (`idClientes`),
  ADD CONSTRAINT `fk_mascotas_razas_mascota` FOREIGN KEY (`raza_idraza`) REFERENCES `razas_mascota` (`idRaza`);

--
-- Constraints for table `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
