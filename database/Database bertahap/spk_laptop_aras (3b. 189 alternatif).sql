-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 11:22 AM
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
  `gambar_alternatif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`, `gambar_alternatif`) VALUES
(1, 'A1', 'ASUS M415DAO-FHD321', 'm415da-slate-grey-1.jpg'),
(2, 'A2', 'ASUS M415DAO-FHD322', 'A416MA-silver-2.jpg'),
(3, 'A3', 'ASUS M415DAO-FHD323', 'A416MA-silver-2.jpg'),
(4, 'A4', 'ASUS M415DAO-FHD324', 'm415da-slate-grey-1.jpg'),
(5, 'A5', 'ASUS E1404FA-FHD321', 'asv5.jpg'),
(6, 'A6', 'ASUS E1404FA-FHD322', 'asv2.jpg'),
(7, 'A7', 'ASUS E1404FA-FHD323', 'af.jpg'),
(8, 'A8', 'ASUS M415DAO-FHD351', 'm415da-slate-grey-1.jpg'),
(9, 'A9', 'ASUS M415DAO-FHD352', 'A416MA-silver-2.jpg'),
(10, 'A10', 'ASUS M1403QA-VIPS551', 'avv1.jpg'),
(11, 'A11', 'ASUS M1403QA-VIPS552', 'avv5.jpg'),
(12, 'A12', 'ASUS E1404FA-FHD554', 'avb9.jpg'),
(13, 'A13', 'ASUS E1404FA-FHD556', 'avb10.jpg'),
(14, 'A14', 'ASUS E1404FA-VIPS558', 'avb9.jpg'),
(15, 'A15', 'ASUS E1404FA-VIPS559', 'avb10.jpg'),
(16, 'A16', 'ASUS M1402IA-VIPS751', 'avv1.jpg'),
(17, 'A17', 'ASUS E1404FA-FHD551', 'avb9.jpg'),
(18, 'A18', 'ASUS E1404FA-FHD553', 'avb10.jpg'),
(19, 'A19', 'ASUS M1603QA-VIPS553', 'Asusv3.jpg'),
(20, 'A20', 'ASUS M1603QA-VIPS555', 'asusv6.jpg'),
(21, 'A21', 'ASUS M1403QA-OLEDS552', 'avv6.jpg'),
(22, 'A22', 'ASUS M1403QA-VIPS751', 'avv1.jpg'),
(23, 'A23', 'ASUS M1403QA-VIPS752', 'avv5.jpg'),
(24, 'A24', 'ASUS M1603QA-VIPS753', 'Asusv3.jpg'),
(25, 'A25', 'ASUS M1403QA-OLEDS752', 'avv5.jpg'),
(26, 'A26', 'ASUS M1403QA-OLEDS751', 'avv1.jpg'),
(27, 'A27', 'ASUS M1405YA-VIPS751', '14x2.jpg'),
(28, 'A28', 'ASUS M1405YA-VIPS752', 'Asus-K3405VF-VIPS551-VIPS552-Silver-2.jpg'),
(29, 'A29', 'ASUS A416MAO-FHD425', 'a416-fingerprint-transparent-silver.jpg'),
(30, 'A30', 'ASUS A416MAO-FHD426', 'm415da-slate-grey-1.jpg'),
(31, 'A31', 'ASUS A416MAO-FHD427', 'm415da-slate-grey-1.jpg'),
(32, 'A32', 'ASUS A416MAO-FHD428', 'a416-fingerprint-transparent-silver.jpg'),
(33, 'A33', 'ASUS A1400KA-FHD423', 'as2.jpg'),
(34, 'A34', 'ASUS A1400EA-FHD321', 'as2.jpg'),
(35, 'A35', 'ASUS A1400EA-FHD322', 'A1400-Transparent-Silver.png'),
(36, 'A36', 'ASUS A1400EA-VIPS322', 'A1400-Transparent-Silver.png'),
(37, 'A37', 'ASUS A1400EA-VIPS321', 'as2.jpg'),
(38, 'A38', 'ASUS A1400EA-FHD323', 'as2.jpg'),
(39, 'A39', 'ASUS A1400EA-FHD324', 'A1400-Transparent-Silver.png'),
(40, 'A40', 'ASUS A1400EA-FHD353', 'as2.jpg'),
(41, 'A41', 'ASUS A1400EA-FHD354', 'A1400-Transparent-Silver.png'),
(42, 'A42', 'ASUS A1400EA-VIPS352', 'A1400-Transparent-Silver.png'),
(43, 'A43', 'ASUS E1404GA-FHD324', 'asv6.jpg'),
(44, 'A44', 'ASUS E1404GA-FHD325', 'asv2.jpg'),
(45, 'A45', 'ASUS E1404GA-FHD326', 'af.jpg'),
(46, 'A46', 'ASUS A1400EA-FHD351', 'as2.jpg'),
(47, 'A47', 'ASUS A1400EA-FHD352', 'A1400-Transparent-Silver.png'),
(48, 'A48', 'ASUS E1404GA-FHD321', 'asv6.jpg'),
(49, 'A49', 'ASUS E1404GA-FHD322', 'asv2.jpg'),
(50, 'A50', 'ASUS E1404GA-FHD323', 'af.jpg'),
(51, 'A51', 'ASUS A1400EA-VIPS351', 'as2.jpg'),
(52, 'A52', 'ASUS A1400EA-VIPS353', 'A1400-Transparent-Silver.png'),
(53, 'A53', 'ASUS A1404ZA-IPS321', 'A1404VA-IPS551-5.jpg'),
(54, 'A54', 'ASUS A1404ZA-IPS322', 'A1404VA-IPS552-2.jpg'),
(55, 'A55', 'ASUS A1404ZA-IPS351', 'A1404VA-IPS551-5.jpg'),
(56, 'A56', 'ASUS A1404ZA-IPS352', 'A1404VA-IPS552-2.jpg'),
(57, 'A57', 'ASUS A1404ZA-IPS353', 'A1404ZA-VIPS552-2.jpg'),
(58, 'A58', 'ASUS E1404GA-FHD351', 'asv6.jpg'),
(59, 'A59', 'ASUS E1404GA-FHD352', 'asv2.jpg'),
(60, 'A60', 'ASUS E1404GA-FHD353', 'af.jpg'),
(61, 'A61', 'ASUS A1404VA-VIPS321', 'A1404ZA-VIPS552-2.jpg'),
(62, 'A62', 'ASUS A1404ZA-VIPS354', 'A1404VA-IPS551-5.jpg'),
(63, 'A63', 'ASUS A1502ZA-VIPS352', 'asus1.jpg'),
(64, 'A64', 'ASUS A1502ZA-VIPS351', 'av15.jpg'),
(65, 'A65', 'ASUS A1502ZA-VIPS353', 'asus8.jpg'),
(66, 'A66', 'ASUS K513EA-OLED552', 'K513-OLED-Transparent-Silver-2.jpg'),
(67, 'A67', 'ASUS K513EA-OLED551', 'K513-OLED-Indie-Black-2.jpg'),
(68, 'A68', 'ASUS A1402ZA-IPS551', 'avv1.jpg'),
(69, 'A69', 'ASUS A1402ZA-IPS553', 'avv5.jpg'),
(70, 'A70', 'ASUS A1502ZA-VIPS551', 'av15.jpg'),
(71, 'A71', 'ASUS A1502ZA-VIPS553', 'asus8.jpg'),
(72, 'A72', 'ASUS A1502ZA-VIPS552', 'asus1.jpg'),
(73, 'A73', 'ASUS A1404ZA-VIPS551', 'A1404VA-IPS551-5.jpg'),
(74, 'A74', 'ASUS A1404ZA-VIPS552', 'A1404ZA-VIPS552-2.jpg'),
(75, 'A75', 'ASUS A1404ZA-VIPS553', 'A1404VA-IPS552-2.jpg'),
(76, 'A76', 'ASUS A1504VA-VIPS551', 'Asus-Vivobook-15-A1504VA-VIPS751-IPS752-8.jpg'),
(77, 'A77', 'ASUS A1504VA-VIPS552', 'A1504ZA-VIPS752-2.jpg'),
(78, 'A78', 'ASUS A1404VA-VIPS551', 'A1404VA-IPS551-5.jpg'),
(79, 'A79', 'ASUS A1404VA-VIPS552', 'A1404VA-IPS552-2.jpg'),
(80, 'A80', 'ASUS A1504VAP-VIPS5503', 'Asus-Vivobook-15-A1504VA-VIPS751-IPS752-8.jpg'),
(81, 'A81', 'ASUS A1400EA-VIPS751', 'as2.jpg'),
(82, 'A82', 'ASUS A1400EA-VIPS752', 'A1400-Transparent-Silver.png'),
(83, 'A83', 'ASUS A1404ZA-VIPS751', 'A1404VA-IPS551-5.jpg'),
(84, 'A84', 'ASUS A1404ZA-VIPS752', 'A1404VA-IPS552-2.jpg'),
(85, 'A85', 'ASUS K513EA-OLED751', 'v1.jpg'),
(86, 'A86', 'ASUS K513EA-OLED752', 'K513-OLED-Transparent-Silver-2.jpg'),
(87, 'A87', 'ASUS A1402ZA-VIPS751', 'avv1.jpg'),
(88, 'A88', 'ASUS A1402ZA-VIPS752', 'avv9.jpg'),
(89, 'A89', 'ASUS A1402ZA-VIPS753', 'avv5.jpg'),
(90, 'A90', 'ASUS A1402ZA-IPS751', 'avv1.jpg'),
(91, 'A91', 'ASUS A1402ZA-IPS752', 'avv9.jpg'),
(92, 'A92', 'ASUS A1402ZA-IPS753', 'avv5.jpg'),
(93, 'A93', 'ASUS A1502ZA-VIPS753', 'asus1.jpg'),
(94, 'A94', 'ASUS A1502ZA-VIPS754', 'asus8.jpg'),
(95, 'A95', 'ASUS A1502ZA-VIPS755', 'av15.jpg'),
(96, 'A96', 'ASUS A1403ZA-OLEDS751', 'oled1.jpg'),
(97, 'A97', 'ASUS A1404VA-VIPS751', 'A1404VA-IPS551-5.jpg'),
(98, 'A98', 'ASUS A1404VA-VIPS752', 'A1404VA-IPS552-2.jpg'),
(99, 'A99', 'ASUS A1403ZA-OLEDS753', 'oled1.jpg'),
(100, 'A100', 'ASUS K3402ZA-OLEDS754', 'av11.jpg'),
(101, 'A101', 'ASUS K3402ZA-OLEDS755', 'av6.jpg'),
(102, 'A102', 'ASUS K3402ZA-OLEDS756', 'av2.jpg'),
(103, 'A103', 'ASUS A1404VA-VIPS711', 'A1404VA-IPS551-5.jpg'),
(104, 'A104', 'ASUS K3405VA-OLEDS951', '14x2.jpg'),
(105, 'A105', 'ASUS K3405VA-OLEDS952', 'Asus-K3405VF-VIPS551-VIPS552-Silver-2.jpg'),
(106, 'A106', 'ASUS K5504VA-OLEDS911', 'K5504VA-OLEDS551-6.jpg'),
(107, 'A107', 'ASUS K5504VA-OLEDS912', 'K5504VA-OLEDS551-7.jpg'),
(108, 'A108', 'ASUS FA506NF-R525B6T-O', 'FA506NC-R535B3T-O-2.jpg'),
(109, 'A109', 'ASUS FA506NF-R525BXT-O', 'FA506NC-R535B3T-O-2.jpg'),
(110, 'A110', 'ASUS FA506NF-R525B3T-O', 'FA506NC-R535B3T-O-2.jpg'),
(111, 'A111', 'ASUS FA506NFR-R725B6T-O', 'FA506NC-R535B3T-O-2.jpg'),
(112, 'A112', 'ASUS FA506QM-R736B7T-O11', 'FA506QM-R736B6G-O-1.jpg'),
(113, 'A113', 'ASUS FA507NU-R545KLM-O', 'FA507UV-R946K9M-O-1.jpg'),
(114, 'A114', 'ASUS FA507NU-R545K6M-O', 'FA507UV-R946K9M-O-1.jpg'),
(115, 'A115', 'ASUS FX506HC-I535B6T-O11', 'FA506QM-R736B6G-O-1.jpg'),
(116, 'A116', 'ASUS FX507ZC-I735B6G-O', 'f3.jpg'),
(117, 'A117', 'ASUS FX507ZC-I735B7G-O', 'f3.jpg'),
(118, 'A118', 'ASUS FX507ZU4-I745K6G-O', 'tf1.jpg'),
(119, 'A119', 'ASUS FX507ZR-I737G6G-O', 'f3.jpg'),
(120, 'A120', 'ASUS FX506HF-I525B6T-O', 'FA506QM-R736B6G-O-1.jpg'),
(121, 'A121', 'ASUS FX506HF-I725B6T-O', 'FA506QM-R736B6G-O-1.jpg'),
(122, 'A122', 'ASUS FX507ZC4-I735B6M-O', 'f3.jpg'),
(123, 'A123', 'ASUS FX507VU-I745K6M-O', 'tf1.jpg'),
(124, 'A124', 'ASUS FX517ZC-I535B6T-O', 'Dush4-1.jpg'),
(125, 'A125', 'ASUS FX517ZC-I535B6W-O', 'dush1.jpg'),
(126, 'A126', 'ASUS FX516PC-I535B6T-O', 'FX516PM-I736B6T-O-grey-1.jpg'),
(127, 'A127', 'ASUS T3300KA-OLED621', 'vivobook_13_slate_oled_t3300_product_photo_etail_2400x2400_39_1.jpg'),
(128, 'A128', 'ASUS T3304GA-OLED321', 'ol2.jpg'),
(129, 'A129', 'ASUS T3304GA-OLED323', 'ol2.jpg'),
(130, 'A130', 'ASUS TN3402YA-VIPS557', 'Asus-Vivobook-Flip-TN3402-Silver-2.png'),
(131, 'A131', 'ASUS TN3402YA-VIPS558', 'Vivobook-Flip-TN3402-3.jpg'),
(132, 'A132', 'ASUS TN3402YA-VIPS559', 'Asus-Vivobook-Flip-TN3402-Silver-2.png'),
(133, 'A133', 'ASUS TP3402VA-OLEDS551', 'ass8.jpg'),
(134, 'A134', 'ASUS TP3402VA-OLEDS552', 'ass4.jpg'),
(135, 'A135', 'ASUS TP3402VA-OLEDS753', 'ass8.jpg'),
(136, 'A136', 'ASUS TP3402VA-OLEDS751', 'ass8.jpg'),
(137, 'A137', 'ASUS TP3402VA-OLEDS752', 'ass4.jpg'),
(138, 'A138', 'ASUS UX3402ZA-OLEDS551', 'az5.jpg'),
(139, 'A139', 'ASUS UX3402ZA-OLEDS552', 'Az1.jpg'),
(140, 'A140', 'ASUS UX5401EA-OLED553', 'UX5401EA-2.jpg'),
(141, 'A141', 'ASUS UM3406HA-OLED752', 'UM3406HA-OLED752-3-1.jpg'),
(142, 'A142', 'ASUS UX3402ZA-OLEDS751', 'az5.jpg'),
(143, 'A143', 'ASUS UX3402ZA-OLEDS752', 'Az1.jpg'),
(144, 'A144', 'ASUS UX5401EA-OLED714', 'UX5401EA-2.jpg'),
(145, 'A145', 'ASUS UX3405MA-OLEDS713', 'zenbook_14_oled_ux3405ma_product_photo_3b_ponder_blue_04_indo_no_numpad_2400_1.png'),
(146, 'A146', 'ASUS UX3405MA-OLEDS714', 'UX3405MA-OLEDS714T-3.jpg'),
(147, 'A147', 'ASUS UX3405MA-OLEDS712', 'UX3405MA-OLEDS714T-3.jpg'),
(148, 'A148', 'ASUS UX5401ZAS-OLEDP711', 'old2.jpg'),
(149, 'A149', 'ASUS M3401QC-OLED556', 'M3401QC-Cool-Silver-4.jpg'),
(150, 'A150', 'ASUS M6500QC-OLEDS551', 'oled1.jpg'),
(151, 'A151', 'ASUS M6500QE-OLEDS551', 'oled1.jpg'),
(152, 'A152', 'ASUS M3401QC-OLED758', 'M3401QC-Quite-Blue-3.jpg'),
(153, 'A153', 'ASUS M3401QC-OLED759', 'M3401QC-Cool-Silver-4.jpg'),
(154, 'A154', 'ASUS M3500QC-OLED956', 'K3500PC-OLED755-4.jpg'),
(155, 'A155', 'ASUS M3500QC-OLED955', 'K3500PC-OLED754-4.jpg'),
(156, 'A156', 'ASUS M7400QE-OLED713', 'M7400QE-Black-2.jpg'),
(157, 'A157', 'ASUS M7400QE-OLED714', 'M7400QE-White-2.jpg'),
(158, 'A158', 'ASUS K3500PC-OLED557', 'K3500PC-OLED754-4.jpg'),
(159, 'A159', 'ASUS K3500PC-OLED556', 'K3500PC-OLED755-4.jpg'),
(160, 'A160', 'ASUS K3500PC-OLED559', 'K3500PC-OLED754-4.jpg'),
(161, 'A161', 'ASUS K3500PC-OLED550', 'K3500PC-OLED755-4.jpg'),
(162, 'A162', 'ASUS K6502ZC-OLEDS551', 'oled1.jpg'),
(163, 'A163', 'ASUS K6502ZC-OLEDS552', 'asusv7.jpg'),
(164, 'A164', 'ASUS N7400PC-OLED555', 'Vivobook-Pro-N7400PC-Comet-Grey-5.jpg'),
(165, 'A165', 'ASUS N7400PC-OLED556', 'Vivobook-Pro-N7400PC-Cool-Silver-5.jpg'),
(166, 'A166', 'ASUS N7400PC-OLED557', 'Vivobook-Pro-N7400PC-Comet-Grey-5.jpg'),
(167, 'A167', 'ASUS N7400PC-OLED558', 'Vivobook-Pro-N7400PC-Cool-Silver-5.jpg'),
(168, 'A168', 'ASUS N7401ZE-OLEDS715', 'vivobook_pro_14x_n7401_oled_product_photo_8k_0_x_black_13.jpg'),
(169, 'A169', 'ASUS N7600PC-OLED713', 'N7600PC-Comet-Grey-2.jpg'),
(170, 'A170', 'ASUS N7600PC-OLED714', 'N7600PC-Cool-Silver-2.jpg'),
(171, 'A171', 'ASUS N7600PC-OLED715', 'N7600PC-Comet-Grey-2.jpg'),
(172, 'A172', 'ASUS N7600PC-OLED716', 'N7600PC-Cool-Silver-2.jpg'),
(173, 'A173', 'ASUS K6501ZM-OLEDS751', 'au6.jpg'),
(174, 'A174', 'ASUS K6502HC-OLEDS951', 'K6502HC-OLEDS951.png'),
(175, 'A175', 'ASUS K6502HC-OLEDS952', 'K6502HC-OLEDS952.png'),
(176, 'A176', 'ASUS K3405VC-IPS951', '14x2.jpg'),
(177, 'A177', 'Aspire Lite AL14-31P-C3MH (Silver)', 'acer-aspire-lite-al14-31p-c3mh-silver.jpg'),
(178, 'A178', 'Aspire lite~Al14-31P-C0G4~Silver', 'acer-aspire-lite-al14-31p-c0g4-silver.jpg'),
(179, 'A179', 'ACER A314-36M-36ZH~Silver', 'l1.jpg'),
(180, 'A180', 'ACER A314-23M R7VJ- Silver', 'jjj.jpg'),
(181, 'A181', 'ACER ASPIRE SPIN A3SP14-31PT-37C1 STEEL GRAY', 'aspire-3-spin-14-a3sp14-31pt-non-fingerprint-non-backlit-wallpaper-pure-silver-05-2.jpg'),
(182, 'A182', 'ACER SPIN 3 SP313-51N-548H', 'SP313-51N-548H-8.jpg'),
(183, 'A183', 'ACER ASPIRE 5 SPIN A5SP14-51MTN-58F6 STEEL GREY', 'spin3.jpg'),
(184, 'A184', 'ACER ASPIRE SPIN A5SP14-51MTN-7819 STEEL GREY', 'spin3.jpg'),
(185, 'A185', 'Acer A314-42P-R7E5~Pure Silver', 'l1.jpg'),
(186, 'A186', 'ACER SWIFT GO SFG14', 'web1.jpg'),
(187, 'A187', 'Acer A514-56P-57Q8', 'A514-56P-57Q8-1.jpg'),
(188, 'A188', 'Acer A514-56P-59SK~Gray', 'A514-56P-57Q8-1.jpg'),
(189, 'A189', 'ACER ASPIRE VERO AV14', 'acer-aspire-vero-evo-av14-51-fingerprint-backlit-wallpaper-marianna-blue-02-1.jpg');

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
  `bobot` float NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(51, 8, '< 1.00 kg', 100),
(52, 8, '1.00 - 1.15 kg', 90),
(53, 8, '1.16 - 1.30 kg', 80),
(54, 8, '1.31 - 1.45 kg', 70),
(55, 8, '1.46 - 1.60 kg', 60),
(56, 8, '1.61 - 1.75 kg', 50),
(57, 8, '1.76 - 1.90 kg', 40),
(58, 8, '1.91 - 2.05 kg', 30),
(59, 8, '2.06 - 2.20 kg', 20),
(60, 8, '> 2.20 kg', 10);

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
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

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
