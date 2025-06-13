-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 05:15 PM
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

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `id_gejala`, `id_kerusakan`) VALUES
(1, 1, 4),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 1, 1),
(6, 2, 1),
(7, 3, 1),
(8, 4, 2),
(9, 5, 2),
(10, 6, 2);

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
(1, 'GJL01', 'AC mati total'),
(2, 'GJL02', 'MCB Trip'),
(3, 'GJL03', 'Suara kompresor berdengung dan bergetar keras sebelum AC mati total'),
(4, 'GJL04', 'LED indikator unit indoor berkedip-kedip'),
(5, 'GJL05', 'Tidak ada hembusan udara yang keluar dari blower AC'),
(6, 'GJL06', 'Blower tidak bekerja sama sekali');

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
(2, 'IDN02', 'Komponen Pendukung'),
(3, 'IDN03', 'Komponen Kelistrikan '),
(4, 'IDN04 ', 'Bahan Pendingin (Refrigerant)');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `solusi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `id_kerusakan`, `solusi`) VALUES
(1, 1, 'Ganti kompresor dengan yang baru'),
(2, 2, 'Motor Blower Rusak'),
(3, 2, 'Bearing kipas outdoor rusak'),
(4, 4, 'Perbaiki kebocoran pipa dengan cara pengelasan');

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
(9, 2, 'fabio ', 'fabio@gmail.com', 'jakarta', '$2y$10$HTLGTQUttNRABFKe9le4seX8MBzzVEJlYKhvFx7.F4VO65gFnm5iC'),
(11, 1, 'stanly karyanto', 'stanly@gmail.com', 'Bekasi', '$2y$10$cdxCPx0TLpmPGOVyo.AZ8O/5en9M0tfvQwLrRIiI6FT65PKabNaTG'),
(12, 1, 'aditya', 'rfaditya@gmail.com', 'Depok', '$2y$10$U0u9EJtcp8Z8uOe8ONN1D.CbZDh.BaeSkqB/xbSdgMZtjgreET3x6'),
(13, 1, 'tester', 'tester@gmail.com', 'depok', '$2y$10$1TnfGnkKXd/nYit32nRVDutz6gGW8Jgzp5aHJKxHeOdyK3.XBqLVO'),
(14, 1, 'user', 'user@gmail.com', 'depok', '$2y$10$z9rwQnHCuvyiMuRzgRDDFe8HT/3Mfqh91YciQwH372P.ir1CbuNm6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

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
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ms_gejala`
--
ALTER TABLE `ms_gejala`
  MODIFY `id_gejala` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ms_kerusakan`
--
ALTER TABLE `ms_kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`id_kerusakan`) REFERENCES `ms_kerusakan` (`id_kerusakan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
