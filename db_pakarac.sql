-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 06:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pakarac`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ms_gejala`
--

CREATE TABLE `ms_gejala` (
  `id_gejala` int(20) NOT NULL,
  `kode_gejala` varchar(100) NOT NULL,
  `gejala` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ms_gejala`
--

INSERT INTO `ms_gejala` (`id_gejala`, `kode_gejala`, `gejala`) VALUES
(1, 'GJL01', 'AC Mati Total'),
(2, 'GJL02', 'MCB trip');

-- --------------------------------------------------------

--
-- Table structure for table `ms_kerusakan`
--

CREATE TABLE `ms_kerusakan` (
  `id_kerusakan` int(11) NOT NULL,
  `kode_kerusakan` varchar(15) NOT NULL,
  `kerusakan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ms_kerusakan`
--

INSERT INTO `ms_kerusakan` (`id_kerusakan`, `kode_kerusakan`, `kerusakan`) VALUES
(1, 'IND01', 'Komponen Utama'),
(2, 'IND02', 'Komponen Pendukung'),
(3, 'IND03', 'Komponen Kelistrikan'),
(4, 'IND04', 'Bahan Pendingin (Refrigerant)');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `solusi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `nama`, `email`, `alamat`, `password`) VALUES
(1, 0, 'admin', 'admin@gmail.com', 'depok', '$2y$10$6dJueoreJPdWr8nKHGdaxOGWq4XbCll5enL6.L6yWRkFettWznL0y'),
(2, 1, 'rendy aditya', 'rendy@gmail.com', 'kebagusan', '$2y$10$SaKoVvvr4p0CcMRKv06C0O3DMNU5zEuKNhJ./nyjLpmQZ8fmlijFW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `aturan_ibfk_1` (`id_gejala`),
  ADD KEY `aturan_ibfk_2` (`id_kerusakan`);

--
-- Indexes for table `ms_gejala`
--
ALTER TABLE `ms_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `ms_kerusakan`
--
ALTER TABLE `ms_kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD KEY `solusi_ibfk_1` (`id_kerusakan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_gejala`
--
ALTER TABLE `ms_gejala`
  MODIFY `id_gejala` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_kerusakan`
--
ALTER TABLE `ms_kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `ms_gejala` (`id_gejala`),
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`id_kerusakan`) REFERENCES `ms_kerusakan` (`id_kerusakan`);

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`id_kerusakan`) REFERENCES `ms_kerusakan` (`id_kerusakan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
