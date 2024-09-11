-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 04:43 PM
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
  `kode_alternatif` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `nama_alternatif` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`) VALUES
(1, 'A1', 'ASUS M415DAO-FHD321'),
(2, 'A2', 'ASUS A416MAO-FHD425'),
(3, 'A3', 'ASUS A1400EA-FHD321'),
(4, 'A4', 'ASUS A1400EA-VIPS751'),
(5, 'A5', 'ASUS K3405VA-OLEDS951'),
(6, 'A6', 'ASUS FX506HC-I535B6T-O11'),
(7, 'A7', 'ASUS T3300KA-OLED621'),
(8, 'A8', 'ASUS UX3402ZA-OLEDS551'),
(9, 'A9', 'ASUS M3401QC-OLED556'),
(10, 'A10', 'ASUS N7401ZE-OLEDS715');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai_k` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai_k`) VALUES
(1, 1, 0.4217),
(2, 2, 0.3404),
(3, 3, 0.3841),
(4, 4, 0.5716),
(5, 5, 0.7398),
(6, 6, 0.696),
(7, 7, 0.3926),
(8, 8, 0.662),
(9, 9, 0.6575),
(10, 10, 0.9053);

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
(1, 'Harga', 'C1', 0.3, 'Cost'),
(2, 'Processor / CPU', 'C2', 0.15, 'Benefit'),
(3, 'RAM', 'C3', 0.1, 'Benefit'),
(4, 'Storage', 'C4', 0.1, 'Benefit'),
(5, 'Resolusi Layar', 'C5', 0.05, 'Benefit'),
(6, 'Graphics Card / GPU', 'C6', 0.15, 'Benefit'),
(7, 'Baterai', 'C7', 0.1, 'Benefit'),
(8, 'Berat', 'C8', 0.05, 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_sub_kriteria` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `id_sub_kriteria`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 18),
(3, 1, 3, 25),
(4, 1, 4, 29),
(5, 1, 5, 36),
(6, 1, 6, 43),
(7, 1, 7, 48),
(8, 1, 8, 54),
(9, 2, 1, 1),
(10, 2, 2, 19),
(11, 2, 3, 25),
(12, 2, 4, 29),
(13, 2, 5, 36),
(14, 2, 6, 44),
(15, 2, 7, 48),
(16, 2, 8, 54),
(17, 3, 1, 2),
(18, 3, 2, 17),
(19, 3, 3, 25),
(20, 3, 4, 29),
(21, 3, 5, 36),
(22, 3, 6, 44),
(23, 3, 7, 48),
(24, 3, 8, 54),
(25, 4, 1, 4),
(26, 4, 2, 13),
(27, 4, 3, 24),
(28, 4, 4, 28),
(29, 4, 5, 36),
(30, 4, 6, 42),
(31, 4, 7, 48),
(32, 4, 8, 54),
(33, 5, 1, 6),
(34, 5, 2, 11),
(35, 5, 3, 23),
(36, 5, 4, 28),
(37, 5, 5, 32),
(38, 5, 6, 42),
(39, 5, 7, 47),
(40, 5, 8, 53),
(41, 6, 1, 4),
(42, 6, 2, 15),
(43, 6, 3, 24),
(44, 6, 4, 28),
(45, 6, 5, 36),
(46, 6, 6, 39),
(47, 6, 7, 48),
(48, 6, 8, 59),
(49, 7, 1, 3),
(50, 7, 2, 20),
(51, 7, 3, 24),
(52, 7, 4, 29),
(53, 7, 5, 36),
(54, 7, 6, 44),
(55, 7, 7, 48),
(56, 7, 8, 50),
(57, 8, 1, 5),
(58, 8, 2, 15),
(59, 8, 3, 23),
(60, 8, 4, 28),
(61, 8, 5, 32),
(62, 8, 6, 42),
(63, 8, 7, 46),
(64, 8, 8, 53),
(65, 9, 1, 4),
(66, 9, 2, 16),
(67, 9, 3, 24),
(68, 9, 4, 28),
(69, 9, 5, 32),
(70, 9, 6, 39),
(71, 9, 7, 47),
(72, 9, 8, 53),
(73, 10, 1, 7),
(74, 10, 2, 13),
(75, 10, 3, 23),
(76, 10, 4, 27),
(77, 10, 5, 32),
(78, 10, 6, 39),
(79, 10, 7, 46),
(80, 10, 8, 57);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `nilai_sub_kriteria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai_sub_kriteria`) VALUES
(1, 1, '< Rp5.000.000', 100),
(2, 1, 'Rp5.000.000 - Rp7.499.000', 90),
(3, 1, 'Rp7.500.000 - Rp9.999.000', 80),
(4, 1, 'Rp10.000.000 - Rp12.499.000', 70),
(5, 1, 'Rp12.500.000 - Rp14.999.000', 60),
(6, 1, 'Rp15.000.000 - Rp17.499.000', 50),
(7, 1, 'Rp17.500.000 - Rp19.999.000', 40),
(8, 1, 'Rp20.000.000 - Rp22.499.000', 30),
(9, 1, 'Rp22.500.000 - Rp24.999.000', 20),
(10, 1, 'Rp25.000.000 atau lebih', 10),
(11, 2, 'Intel Core i9', 100),
(12, 2, 'AMD Ryzen 9', 100),
(13, 2, 'Intel Core i7', 80),
(14, 2, 'AMD Ryzen 7', 80),
(15, 2, 'Intel Core i5', 60),
(16, 2, 'AMD Ryzen 5', 60),
(17, 2, 'Intel Core i3', 40),
(18, 2, 'AMD Ryzen 3', 40),
(19, 2, 'Intel Celeron', 20),
(20, 2, 'Intel Pentium', 20),
(21, 3, '64 GB atau lebih', 100),
(22, 3, '32 GB', 80),
(23, 3, '16 GB', 60),
(24, 3, '8 GB', 40),
(25, 3, '4 GB', 20),
(26, 4, '> 1 TB SSD', 100),
(27, 4, '1 TB SSD', 80),
(28, 4, '512 GB SSD', 60),
(29, 4, '256 GB SSD', 40),
(30, 4, '< 256 GB SSD', 20),
(31, 5, '4K (3840x2400)', 100),
(32, 5, '2.8K (2800x1800)', 80),
(33, 5, 'WQXGA (2560x1600)', 60),
(34, 5, 'WQHD (2560x1440)', 60),
(35, 5, 'WUXGA (1920x1200)', 40),
(36, 5, 'FHD (1920x1080)', 40),
(37, 5, 'HD+ (1600x900)', 30),
(38, 5, 'HD (1366x768)', 20),
(39, 6, 'Dedicated NVIDIA GeForce RTX', 100),
(40, 6, 'Dedicated AMD Radeon RX', 75),
(41, 6, 'Dedicated Intel Arc', 75),
(42, 6, 'Integrated Intel Iris Xe Graphics', 50),
(43, 6, 'Integrated AMD Radeon Graphics', 50),
(44, 6, 'Integrated Intel UHD Graphics', 25),
(45, 7, '85 - 100 Wh', 100),
(46, 7, '69 - 84 Wh', 80),
(47, 7, '53 - 68 Wh', 60),
(48, 7, '37 - 52 Wh', 40),
(49, 7, '36 Wh atau kurang', 20),
(50, 8, '< 1.00 kg', 100),
(51, 8, '1.00 - 1.15 kg', 90),
(52, 8, '1.16 - 1.30 kg', 80),
(53, 8, '1.31 - 1.45 kg', 70),
(54, 8, '1.46 - 1.60 kg', 60),
(55, 8, '1.61 - 1.75 kg', 50),
(56, 8, '1.76 - 1.90 kg', 40),
(57, 8, '1.91 - 2.05 kg', 30),
(58, 8, '2.06 - 2.20 kg', 20),
(59, 8, '> 2.20 kg', 10);

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
  ADD KEY `id_sub_kriteria` (`id_sub_kriteria`);

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
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_sub_kriteria`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

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
