-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2021 at 04:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasir`
--

CREATE TABLE `tb_kasir` (
  `id_kasir` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kasir`
--

INSERT INTO `tb_kasir` (`id_kasir`, `nama`, `password`, `level`) VALUES
('KSR180002', 'manager', 'bWFuYWdlcg==', 'manager'),
('KSR180003', 'kasir', 'a2FzaXI=', 'kasir'),
('KSR210004', 'admin', 'YWRtaW4=', 'kasir'),
('KSR210005', 'chika123', 'chelsi', 'manager'),
('KSR210006', 'kevin', 'a2V2aW4xMjM=', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsumen`
--

CREATE TABLE `tb_konsumen` (
  `id_konsumen` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id_konsumen`, `nama`, `alamat`, `hp`) VALUES
('KON210002', 'Chelsea Chika', 'Pemanikan', '081344380688'),
('KON210003', 'Natalia Permata Sari', 'Jl. Pahlawan, Rantepao, Toraja Utara', '08956789523');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama`, `harga`) VALUES
('PKT180001', 'Cuci', '5000'),
('PKT180002', 'Strika', '8000'),
('PKT180003', 'Cuci & Strika', '10000'),
('PKT210004', 'Cuci Sepatu', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_kasir` varchar(11) NOT NULL,
  `id_konsumen` varchar(11) NOT NULL,
  `id_paket` varchar(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jml_kilo` varchar(11) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_kasir`, `id_konsumen`, `id_paket`, `tgl_transaksi`, `jml_kilo`, `total`) VALUES
('TRA180001', 'KSR180001', 'KON180002', 'PKT180001', '2018-01-03', '10', '50000'),
('TRA180002', 'KSR180003', 'KON180003', 'PKT180003', '2018-01-04', '2.4', '24000'),
('TRA210003', 'KSR180003', 'KON210002', 'PKT180001', '2021-06-05', '4', '20000'),
('TRA210004', 'KSR180003', 'KON210003', 'PKT210004', '2021-06-09', '2', '30000'),
('TRA210005', 'KSR210004', 'KON210003', 'PKT180001', '2021-06-13', '67', '335000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kasir`
--
ALTER TABLE `tb_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
