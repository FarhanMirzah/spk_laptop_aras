-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 12:09 PM
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
  `kode_alternatif` varchar(100) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `kategori_alternatif` varchar(255) NOT NULL,
  `gambar_alternatif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`, `kategori_alternatif`, `gambar_alternatif`) VALUES
(1, 'A1', 'ASUS M415DAO-FHD321', 'Notebook', 'm415da-slate-grey-1.jpg'),
(2, 'A2', 'ASUS A416MAO-FHD425', 'Notebook', 'a416-fingerprint-transparent-silver.jpg'),
(3, 'A3', 'ASUS A1400EA-FHD321', 'Notebook', 'as2.jpg'),
(4, 'A4', 'ASUS A1400EA-VIPS751', 'Notebook', 'as2.jpg'),
(5, 'A5', 'ASUS K3405VA-OLEDS951', 'Notebook', '14x2.jpg'),
(6, 'A6', 'ASUS FX506HC-I535B6T-O11', 'Laptop Gaming', 'FA506QM-R736B6G-O-1.jpg'),
(7, 'A7', 'ASUS T3300KA-OLED621', 'Laptop 2-in-1', 'vivobook_13_slate_oled_t3300_product_photo_etail_2400x2400_39_1.jpg'),
(8, 'A8', 'ASUS UX3402ZA-OLEDS551', 'Notebook', 'az5.jpg'),
(9, 'A9', 'ASUS M3401QC-OLED556', 'Notebook', 'M3401QC-Cool-Silver-4.jpg'),
(10, 'A10', 'ASUS N7401ZE-OLEDS715', 'Notebook', 'vivobook_pro_14x_n7401_oled_product_photo_8k_0_x_black_13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai_k` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_kriteria` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `keterangan`, `kode_kriteria`, `jenis`, `bobot`) VALUES
(1, 'Harga', 'C1', 'Cost', 30),
(2, 'Processor / CPU', 'C2', 'Benefit', 15),
(3, 'RAM', 'C3', 'Benefit', 10),
(4, 'Storage', 'C4', 'Benefit', 10),
(5, 'Resolusi Layar', 'C5', 'Benefit', 5),
(6, 'Graphics Card / GPU', 'C6', 'Benefit', 15),
(7, 'Baterai', 'C7', 'Benefit', 10),
(8, 'Berat', 'C8', 'Cost', 5);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_sub_kriteria` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `nilai_sub_kriteria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai_sub_kriteria`) VALUES
(1, 1, 'Rp25.000.000 atau lebih', 100),
(2, 1, 'Rp22.500.000 - Rp24.999.999', 90),
(3, 1, 'Rp20.000.000 - Rp22.499.999', 80),
(4, 1, 'Rp17.500.000 - Rp19.999.999', 70),
(5, 1, 'Rp15.000.000 - Rp17.499.999', 60),
(6, 1, 'Rp12.500.000 - Rp14.999.999', 50),
(7, 1, 'Rp10.000.000 - Rp12.499.999', 40),
(8, 1, 'Rp7.500.000 - Rp9.999.999', 30),
(9, 1, 'Rp5.000.000 - Rp7.499.999', 20),
(10, 1, '< Rp5.000.000', 10),
(11, 2, 'Intel Core i9', 100),
(12, 2, 'AMD Ryzen 9', 100),
(13, 2, 'Intel Core i7', 80),
(14, 2, 'AMD Ryzen 7', 80),
(15, 2, 'Intel Core i5', 60),
(16, 2, 'AMD Ryzen 5', 60),
(17, 2, 'Intel Core i3', 40),
(18, 2, 'AMD Ryzen 3', 40),
(19, 2, 'Intel Processor N', 30),
(20, 2, 'Intel Pentium', 20),
(21, 2, 'Intel Celeron', 10),
(22, 3, '64 GB atau lebih', 100),
(23, 3, '32 GB', 80),
(24, 3, '16 GB', 60),
(25, 3, '8 GB', 40),
(26, 3, '4 GB', 20),
(27, 4, '> 1 TB SSD', 100),
(28, 4, '1 TB SSD', 80),
(29, 4, '512 GB SSD', 60),
(30, 4, '256 GB SSD', 40),
(31, 4, '< 256 GB SSD', 20),
(32, 5, '4K (3840x2400)', 100),
(33, 5, '2.8K (2800x1800)', 80),
(34, 5, 'WQXGA (2560x1600)', 60),
(35, 5, 'WQHD (2560x1440)', 60),
(36, 5, 'WUXGA (1920x1200)', 40),
(37, 5, 'FHD (1920x1080)', 40),
(38, 5, 'HD+ (1600x900)', 30),
(39, 5, 'HD (1366x768)', 20),
(40, 6, 'Dedicated NVIDIA GeForce RTX', 100),
(41, 6, 'Dedicated AMD Radeon RX', 75),
(42, 6, 'Dedicated Intel Arc', 75),
(43, 6, 'Integrated Intel Iris Xe Graphics', 50),
(44, 6, 'Integrated AMD Radeon Graphics', 50),
(45, 6, 'Integrated Intel UHD Graphics', 25),
(46, 7, '85 - 100 Wh', 100),
(47, 7, '69 - 84 Wh', 80),
(48, 7, '53 - 68 Wh', 60),
(49, 7, '37 - 52 Wh', 40),
(50, 7, '36 Wh atau kurang', 20),
(51, 8, '> 2.20 kg', 100),
(52, 8, '2.06 - 2.20 kg', 90),
(53, 8, '1.91 - 2.05 kg', 80),
(54, 8, '1.76 - 1.90 kg', 70),
(55, 8, '1.61 - 1.75 kg', 60),
(56, 8, '1.46 - 1.60 kg', 50),
(57, 8, '1.31 - 1.45 kg', 40),
(58, 8, '1.16 - 1.30 kg', 30),
(59, 8, '1.00 - 1.15 kg', 20),
(60, 8, '< 1.00 kg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 2, 'User', 'user@gmail.com', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
