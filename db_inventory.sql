-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 09:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inv`
--

CREATE TABLE `tb_inv` (
  `id_inv` int(150) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `jenis_barang` varchar(150) NOT NULL,
  `stok` int(150) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `serial_number` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_inv`
--

INSERT INTO `tb_inv` (`id_inv`, `nama_barang`, `jenis_barang`, `stok`, `lokasi`, `harga`, `serial_number`) VALUES
(79, 'sukro', 'makanan', 300, 'sidoarjo', '7.000', '1431243'),
(83, 'nutrisari', 'minuman', 10, 'gresik', '3.000', '158667'),
(87, 'mie sedapp', 'makanan', 100, 'sidoarjo', '3.000', '216247'),
(121, 'nutrisari', 'minuman', 100, 'sidoarjo', '3.000', '6327347'),
(123, 'nutrisari', 'minuman', 200, 'sidoarjo', '3.000', '6327347');

-- --------------------------------------------------------

--
-- Table structure for table `tb_storage`
--

CREATE TABLE `tb_storage` (
  `id_storage` int(150) NOT NULL,
  `nama_gudang` varchar(150) NOT NULL,
  `lokasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_storage`
--

INSERT INTO `tb_storage` (`id_storage`, `nama_gudang`, `lokasi`) VALUES
(3, 'gudang gadung', 'sidoarjo'),
(25, 'gudang garam', 'surabaya'),
(27, 'gudang kata', 'malang'),
(28, 'gudang lama', 'gresik'),
(29, 'gudang martin', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `no_id` int(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `kontak` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`no_id`, `nama`, `password`, `kontak`, `email`) VALUES
(1, 'arjuna', '123123', '98147129', 'akukanhebat@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vendor`
--

CREATE TABLE `tb_vendor` (
  `id_vendor` int(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kontak` int(150) NOT NULL,
  `nama_barang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_vendor`
--

INSERT INTO `tb_vendor` (`id_vendor`, `nama`, `kontak`, `nama_barang`) VALUES
(4, 'wingsfood', 765283782, 'mie sedapp'),
(6, 'dua kelinci', 124215325, 'sukro'),
(7, 'nutrinutri', 26436423, 'nutrisari'),
(15, 'indofood', 214124, 'indomie'),
(16, 'nunu', 6781291, 'ichi ocha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inv`
--
ALTER TABLE `tb_inv`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `nama_barang` (`nama_barang`),
  ADD KEY `lokasi` (`lokasi`);

--
-- Indexes for table `tb_storage`
--
ALTER TABLE `tb_storage`
  ADD PRIMARY KEY (`id_storage`),
  ADD KEY `lokasi` (`lokasi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `tb_vendor`
--
ALTER TABLE `tb_vendor`
  ADD PRIMARY KEY (`id_vendor`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_inv`
--
ALTER TABLE `tb_inv`
  MODIFY `id_inv` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tb_storage`
--
ALTER TABLE `tb_storage`
  MODIFY `id_storage` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_vendor`
--
ALTER TABLE `tb_vendor`
  MODIFY `id_vendor` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_inv`
--
ALTER TABLE `tb_inv`
  ADD CONSTRAINT `tb_inv_ibfk_1` FOREIGN KEY (`nama_barang`) REFERENCES `tb_vendor` (`nama_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_inv_ibfk_2` FOREIGN KEY (`lokasi`) REFERENCES `tb_storage` (`lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
