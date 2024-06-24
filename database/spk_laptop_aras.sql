-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 12:26 PM
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
-- Database: `spk_laptop_aras`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`) VALUES
(1, 'Apple MacBook Air M1 256GB Space Gray'),
(2, 'MSI Stealth 17 Studio A13VI-013 - Intel Core i9 13900H / 2.6 GHz - Win 11 Home - GeForce RTX 4090 - 64 GB RAM - 4 TB SSD NVMe'),
(3, 'MSI Summit E14 FlipEvo A12MT-049 i7-1260P/16GB/1TB W11H'),
(4, 'LENOVO TP X1 CARBON G11 I7-1355U 16GB 512GB SSD 14.0 WUXGA W11P'),
(5, 'Apple MacBook Air M2 Chip 8-Core CPU und 8-Core GPU 8GB gem. RAM 256GB SSD DE - Mitternacht'),
(6, 'Lenovo ThinkPad E16 AMD G1 R7-7730U 16/512 SSD WUXGA W11P'),
(7, 'ACER CHROMEBOOK SPIN 714 CP714-2WN-36G6'),
(8, 'Fujitsu Lifebook U7411 FHD i7-1165G7'),
(9, 'Lenovo ThinkPad E16 G1 i5-1335U 16/512 SSD WUXGA IPS W11P'),
(10, 'LENOVO TP L15 G4 I5-1335U 16GB 512GB SSD 15.6 FHD W11P');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `kode_kriteria` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `bobot` float NOT NULL,
  `jenis` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `keterangan`, `kode_kriteria`, `bobot`, `jenis`) VALUES
(1, 'Harga', 'C1', 0.25, 'Cost'),
(2, 'Sistem Operasi', 'C2', 0.05, 'Benefit'),
(3, 'Processor', 'C3', 0.15, 'Benefit'),
(4, 'Graphics Card', 'C4', 0.15, 'Benefit'),
(5, 'Kapasitas RAM', 'C5', 0.1, 'Benefit'),
(6, 'Kapasitas Storage', 'C6', 0.1, 'Benefit'),
(7, 'Kapasitas Baterai', 'C7', 0.1, 'Benefit'),
(8, 'Resolusi Layar', 'C8', 0.05, 'Benefit'),
(9, 'Berat', 'C10', 0.05, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(1, 1, '> 90 juta rupiah', 100),
(2, 1, '80 - 90 juta rupiah', 90),
(3, 1, '70 - 80 juta rupiah', 80),
(4, 1, '60 - 70 juta rupiah', 70),
(5, 1, '50 - 60 juta rupiah', 60),
(6, 1, '40 - 50 juta rupiah', 50),
(7, 1, '30 - 40 juta rupiah', 40),
(8, 1, '20 - 30 juta rupiah', 30),
(9, 1, '10 - 20 juta rupiah', 20),
(10, 1, '< 10 juta rupiah', 10),
(11, 2, 'Windows', 100),
(12, 2, 'macOS', 50),
(13, 2, 'Linux', 25),
(14, 2, 'ChromeOS', 25),
(15, 2, 'OS Lainnya', 10),
(16, 3, 'Intel Core i9', 100),
(17, 3, 'AMD Ryzen 9', 100),
(18, 3, 'Intel Core i7', 75),
(19, 3, 'AMD Ryzen 7', 75),
(20, 3, 'Apple M2', 75),
(21, 3, 'Intel Core i5', 50),
(22, 3, 'AMD Ryzen 5', 50),
(23, 3, 'Apple M1', 50),
(24, 3, 'Intel Core i3', 25),
(25, 3, 'AMD Ryzen 3', 25),
(26, 4, 'Dedicated NVIDIA GeForce', 100),
(27, 4, 'Dedicated Radeon RX', 100),
(28, 4, 'Dedicated Intel Arc', 100),
(29, 4, 'Integrated Intel Iris Xe', 75),
(30, 4, 'Integrated AMD Radeon', 75),
(31, 4, 'Integrated Apple GPU', 75),
(32, 4, 'Integrated Intel UHD', 50),
(33, 5, '64 GB', 100),
(34, 5, '32 GB', 75),
(35, 5, '16 GB', 50),
(36, 5, '8 GB', 25),
(37, 6, '2 TB SSD atau lebih', 100),
(38, 6, '1 TB SSD', 80),
(39, 6, '512 GB SSD', 60),
(40, 6, '256 GB SSD', 40),
(41, 6, '128 GB SSD', 20),
(42, 7, '80 - 100 Wh', 100),
(43, 7, '65 - 80 Wh', 75),
(44, 7, '50 - 65 Wh', 50),
(45, 7, '35 - 50 Wh', 25),
(46, 8, '2160p', 100),
(47, 8, '1440p', 75),
(48, 8, '1080p', 50),
(49, 8, '720p', 25),
(50, 9, '> 3.5 kg', 100),
(51, 9, '3,0 - 3.5 kg', 85),
(52, 9, '2.5 - 3,0 kg', 70),
(53, 9, '2 - 2,5 kg', 55),
(54, 9, '1.5 - 2 kg', 40),
(55, 9, '1 - 1,5 kg', 25),
(56, 9, '< 1 kg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 2, 'User', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `nilai` (`nilai`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`nilai`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
