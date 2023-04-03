-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.byetcluster.com
-- Generation Time: Apr 03, 2023 at 02:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33930732_clean`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordenes_compra`
--

CREATE TABLE `ordenes_compra` (
  `ID` int(8) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_cliente` int(8) NOT NULL,
  `monto` float(6,1) NOT NULL,
  `status` enum('abierta','cerrada') NOT NULL DEFAULT 'abierta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordenes_compra`
--

INSERT INTO `ordenes_compra` (`ID`, `fecha`, `ID_cliente`, `monto`, `status`) VALUES
(1, '2023-04-03 00:28:54', 2, 6.2, 'cerrada'),
(2, '2023-04-03 00:36:39', 2, 11.0, 'cerrada');

-- --------------------------------------------------------

--
-- Table structure for table `ordenes_produccion`
--

CREATE TABLE `ordenes_produccion` (
  `ID` int(8) NOT NULL,
  `fecha_solicitada` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_producto` int(8) NOT NULL,
  `cantidad` float(6,2) NOT NULL,
  `status` enum('activo','Completado y entregado') NOT NULL DEFAULT 'activo',
  `fecha_entregada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordenes_produccion`
--

INSERT INTO `ordenes_produccion` (`ID`, `fecha_solicitada`, `ID_producto`, `cantidad`, `status`, `fecha_entregada`) VALUES
(1, '2023-04-02 17:14:36', 3, 20.00, 'Completado y entregado', '2023-04-02 17:33:46'),
(2, '2023-04-02 18:02:27', 1, 10.00, 'Completado y entregado', '2023-04-02 18:02:58'),
(3, '2023-04-02 18:05:51', 1, 20.00, 'Completado y entregado', '2023-04-02 18:06:08'),
(4, '2023-04-02 18:20:06', 1, 5.00, 'Completado y entregado', '2023-04-02 18:21:04'),
(5, '2023-04-02 18:20:20', 2, 20.00, 'Completado y entregado', '2023-04-02 18:21:17'),
(6, '2023-04-02 18:20:31', 3, 15.00, 'Completado y entregado', '2023-04-02 18:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `ordenes_producto`
--

CREATE TABLE `ordenes_producto` (
  `ID` int(8) NOT NULL,
  `ID_orden` int(8) NOT NULL,
  `ID_producto` int(8) NOT NULL,
  `cantidad` float(6,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordenes_producto`
--

INSERT INTO `ordenes_producto` (`ID`, `ID_orden`, `ID_producto`, `cantidad`) VALUES
(1, 1, 3, 2.0),
(2, 2, 1, 10.0),
(3, 2, 2, 2.0);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `ID` int(8) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `cantidad` float(7,1) NOT NULL,
  `costo` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`ID`, `nombre`, `cantidad`, `costo`) VALUES
(1, 'Jabon Lavaplatos Axion', 75.0, 1.00),
(2, 'Jabon Lavaplatos Generico', 118.0, 0.50),
(3, 'Desinfectante Verde', 103.0, 0.60);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(8) NOT NULL,
  `cedula` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ID`, `cedula`, `nombre`, `apellido`, `direccion`, `correo`, `clave`) VALUES
(4, 123456789, 'Rafael', 'Moreno', 'Calle 1', 'rafa@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordenes_compra`
--
ALTER TABLE `ordenes_compra`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ordenes_produccion`
--
ALTER TABLE `ordenes_produccion`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ordenes_producto`
--
ALTER TABLE `ordenes_producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordenes_compra`
--
ALTER TABLE `ordenes_compra`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordenes_produccion`
--
ALTER TABLE `ordenes_produccion`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordenes_producto`
--
ALTER TABLE `ordenes_producto`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
