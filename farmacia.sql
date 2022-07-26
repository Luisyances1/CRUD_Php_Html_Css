-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 06:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmacia`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `telefono`, `direccion`) VALUES
(0, '', 0, ''),
(454, 'diana', 87455, 'cerete'),
(1542, 'luis miguel', 301250137, 'canta claro'),
(3455, 'denis', 2345345, 'monteria'),
(897897, 'vanesa', 541651, 'kjbkjbkj');

-- --------------------------------------------------------

--
-- Table structure for table `entrega`
--

CREATE TABLE `entrega` (
  `codigo_e` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `codigo_medicamento` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `nit` int(10) NOT NULL,
  `encargado` varchar(15) NOT NULL,
  `medicamento` varchar(15) NOT NULL,
  `precio_venta` int(10) NOT NULL,
  `id_c` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genera`
--

CREATE TABLE `genera` (
  `id_factura` int(10) NOT NULL,
  `id_medicamento` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `precio` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gerente`
--

CREATE TABLE `gerente` (
  `id_gerente` int(10) NOT NULL,
  `logro_mensual` int(10) DEFAULT NULL,
  `id_c` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicamento`
--

CREATE TABLE `medicamento` (
  `codigo` int(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `utilidad` varchar(15) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) NOT NULL,
  `nombre_p` varchar(15) NOT NULL,
  `telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(10) NOT NULL,
  `nombre_e` varchar(15) NOT NULL,
  `aguinaldo` int(10) DEFAULT NULL,
  `comision` int(10) DEFAULT NULL,
  `id_c` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nombre_e`, `aguinaldo`, `comision`, `id_c`) VALUES
(435543, 'wret', 3434, NULL, 1542);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `entrega`
--
ALTER TABLE `entrega`
  ADD KEY `codigo_medicamento` (`codigo_medicamento`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`nit`),
  ADD KEY `id_c` (`id_c`);

--
-- Indexes for table `genera`
--
ALTER TABLE `genera`
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_medicamento` (`id_medicamento`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id_gerente`),
  ADD KEY `id_c` (`id_c`);

--
-- Indexes for table `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`),
  ADD KEY `id_c` (`id_c`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`codigo_medicamento`) REFERENCES `medicamento` (`codigo`),
  ADD CONSTRAINT `entrega_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `cliente` (`id_cliente`);

--
-- Constraints for table `genera`
--
ALTER TABLE `genera`
  ADD CONSTRAINT `genera_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`nit`),
  ADD CONSTRAINT `genera_ibfk_2` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`codigo`);

--
-- Constraints for table `gerente`
--
ALTER TABLE `gerente`
  ADD CONSTRAINT `gerente_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `cliente` (`id_cliente`);

--
-- Constraints for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `vendedor_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
