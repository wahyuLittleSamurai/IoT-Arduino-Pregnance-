-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2018 at 08:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5395856_dbbumil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `nama`, `password`) VALUES
(1, 'root', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbldaftarbumil`
--

CREATE TABLE `tbldaftarbumil` (
  `id` int(11) NOT NULL,
  `rfid` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nikIstri` varchar(50) NOT NULL,
  `namaSuami` varchar(50) NOT NULL,
  `nikSuami` varchar(50) NOT NULL,
  `usia` varchar(5) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbldaftarbumil`
--

INSERT INTO `tbldaftarbumil` (`id`, `rfid`, `nama`, `nikIstri`, `namaSuami`, `nikSuami`, `usia`, `alamat`, `waktu`) VALUES
(21, '10,157,229,182', 'Safrilia', '12345', 'Eko Wahyudi', '12367', '36', 'Jl MT Haryono Gang 11 B No 405', '2018-06-07 10:48:37'),
(22, '186,166,215,182', 'Siska', '123', 'Geral', '1234', '27', 'Graha Dewata NN 3 no 2', '2018-06-07 11:22:23'),
(23, '90,109,211,182', 'Okta', '15678', 'Dede', '19876', '34', 'Areng-areng Dedeprejo', '2018-06-07 11:39:18'),
(24, '58,142,213,182', 'Aprilita Orizawati', '123579', 'Niko Aditya Pratama', '123578', '18', 'Jl. Joyo Tamansari', '2018-06-07 11:58:45'),
(25, '125,134,57,4', 'Sri Wiluji', '1234567', 'Suroso', '1234568', '33', 'Jl. Kanjuruan', '2018-07-02 07:43:54'),
(26, '170,60,213,182', 'Siti Abaatin', '1234', 'No', '1236', '22', 'Jl. Setia budi no 3', '2018-07-02 08:00:06'),
(27, '148,171,102,30', 'Elna Aprianti', '122221', 'Wawan Gunawan', '133211', '23', 'Jl. Telaga Warna Blok C', '2018-07-02 08:10:45'),
(28, '173,231,53,4', 'Oktarianti', '12344', 'Ariawa', '12355', '30', 'Jl. Kemangi No 14', '2018-07-02 09:50:52'),
(31, '109,35,248,95', 'Arni Puspitasari', '23333', 'Arif Efendi', '43353555', '32', 'jl. Bantaran Terusan 2', '2018-07-02 10:17:12'),
(32, '61,142,61,96', 'Suprapti', '666666', 'Sucipto', '7777777', '38', 'J;. Semanggi Barat No 5C', '2018-07-02 10:34:55'),
(33, '189,249,104,95', 'Dwi Wahyuni', '132435', 'Deni Amijaya', '243556', '34', 'Jl.  Kuping Gajah No 38 B', '2018-07-02 10:49:22'),
(34, '93,220,59,4', 'Sri Astutik', '6666', 'Id bAGUS', '76453', '37', 'Jl. Bantaran No V', '2018-07-02 11:04:42'),
(35, '29,25,59,96', 'Siti Fatimah', '33333', 'Lukman', '44444', '27', 'Jl. Kenanga Indah No 9', '2018-07-02 11:11:39'),
(36, '61,226,56,96', 'Rosidah Akhrisma', '9898088', 'Sigit', '7879799', '31', 'Jl. Manggar No. 50', '2018-07-02 11:25:06'),
(37, '29,113,105,95', 'Winda Ningtias', '232423', 'Aris Sutanto', '434353', '29', 'Jl. kendalsari 3', '2018-07-02 11:31:02'),
(38, '125,200,114,95', 'Fitria Nur', '786855', 'Adi Hermanto', '456396', '36', 'Jl. Cengger Ayam Dalam', '2018-07-02 11:58:00'),
(39, '13,80,64,4', 'Devi Shinta', '565473', 'Abdul Ghofur', '565656', '31', 'Jl. Selorejo 20', '2018-07-02 12:10:29'),
(40, '13,16,93,95', 'Suliana', '1234444', 'Agus Subagyo', '4222333', '24', 'Jl. Mawar I / 104 A', '2018-07-04 10:52:44'),
(41, '125,99,107,95', 'Meilany', '2121213', 'Teguh Catur', '4355554', '32', 'Jl. Kenanga Indah No 25 A', '2018-07-04 11:44:11'),
(42, '221,114,127,95', 'Sri Wahyuni', '999', 'Dodik', '888', '27', 'Jl. Vinolia ', '2018-07-17 12:36:34'),
(43, '45,99,127,95', 'Dewi Nuraini', '33', 'Suyono', '55', '30', 'Jl. Setia budi no 3', '2018-07-17 14:01:51'),
(44, '45,160,93,95', 'Nur Cahyaningsih', '122', 'Deni ', '221', '32', 'Jl. Manggar gang 10', '2018-07-17 14:08:52'),
(45, '109,249,57,4', 'Dwi Septi', '142', 'Surya2', '213', '31', 'Jl. Kendalsari 3', '2018-07-17 14:16:20'),
(46, '189,76,18,14', 'Aprilia Putri', '9099', 'Wahyu', '9800', '34', 'jl. Bantaran Terusan 3B', '2018-07-17 14:21:20'),
(47, '45,120,68,4', 'Suci Indira', '6868', 'Aditya Eko', '88797', '25', 'Jl. Candi Mendut Selatan', '2018-07-17 14:25:16'),
(48, '109,154,105,95', 'Suratin', '798', 'Prayitno', '099', '36', 'Jl. Terusan Kenikir', '2018-07-17 14:32:11'),
(49, '237,28,79,14', 'Septia Nur', '2341', 'Muhammad Alul', '6231', '25', 'Jl. Mawar 4', '2018-07-17 14:38:02'),
(50, '93,171,114,95', 'Siti Patonah', '1212', 'Sutiman', '4231', '35', 'Jl. Selorejo Gg Masjid', '2018-07-17 14:43:33'),
(51, '93,44,96,95', 'Nur Wahyuni', '909', 'Bambang', '787', '31', 'Jl. Setia budi no 3', '2018-07-17 14:55:47'),
(52, '182,88,155,229', 'Mirasih', '888777', 'Bagus ', '777888', '28', 'Jl. Abdul Qodir Jaelani No. 7', '2018-07-18 11:25:49'),
(53, '141,200,245,95', 'Fatimah', '555666', 'Darmawan', '666555', '28', 'Jl. Jupiter', '2018-07-18 11:41:28'),
(54, '246,91,155,229', 'Laelani', '232323', 'Yusuf', '323232', '36', 'Jl. Candi Bima 1', '2018-07-18 11:53:08'),
(55, '237,100,31,14', 'Ginarsih', '345678', 'Sinarto', '876543', '37', 'Jl. Bantaran Barat 3', '2018-07-18 12:05:06'),
(56, '157,35,102,95', 'Siti Nurrohmah', '555444', 'Hartono', '444777', '36', 'Jl. Candi Agung 4', '2018-07-18 12:15:56'),
(59, '253,165,62,96', 'Lailatul Badriyah', '6676', 'Ahmad', '0768', '22', 'Jl. Bantaran Barat IV', '2018-07-19 19:59:33'),
(60, '125,176,108,95', 'Siti', '12344', 'Sarno', '12222', '23', 'Jl. Senggani', '2018-07-20 12:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblgetrfid`
--

CREATE TABLE `tblgetrfid` (
  `id` int(11) NOT NULL,
  `rfid` varchar(20) NOT NULL,
  `time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `tblgetrfid`
--

INSERT INTO `tblgetrfid` (`id`, `rfid`, `time`) VALUES
(85, '109,254,108,95', '07:49:26 2018/07/19');

-- --------------------------------------------------------

--
-- Table structure for table `tblgetrfidukur`
--

CREATE TABLE `tblgetrfidukur` (
  `id` int(11) NOT NULL,
  `rfid` varchar(20) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tblpengukuran`
--

CREATE TABLE `tblpengukuran` (
  `id` int(11) NOT NULL,
  `rfid` varchar(20) NOT NULL,
  `hamilke` varchar(5) NOT NULL,
  `usiakandungan` varchar(10) NOT NULL,
  `beratbadan` varchar(5) NOT NULL,
  `tensi` varchar(5) NOT NULL,
  `goldar` varchar(5) NOT NULL,
  `lingkarlengan` varchar(5) NOT NULL,
  `tinggibadan` varchar(5) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tblpengukuran`
--

INSERT INTO `tblpengukuran` (`id`, `rfid`, `hamilke`, `usiakandungan`, `beratbadan`, `tensi`, `goldar`, `lingkarlengan`, `tinggibadan`, `waktu`) VALUES
(16, '123,227,94,131', '3', '4', '90', '77', 'a', '34', '35', '2018-05-23 14:05:38'),
(21, '123,227,94,131', '3', '4', '78', '33', 'a', '34', '35', '5/3/18 16:11'),
(22, '123,227,94,131', '3', '4', '90', '55', 'ab', '34', '35', '5/23/18 14:05'),
(26, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '2018-05-31 11:22:20'),
(27, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/3/18 16:11'),
(28, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(29, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '3/5/18 16:11'),
(30, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(32, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(33, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/31/18 11:22'),
(34, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/3/18 16:11'),
(35, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(36, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '3/5/18 16:11'),
(37, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(38, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '3/5/18 16:11'),
(39, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(40, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/31/18 11:22'),
(41, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '3/5/18 16:11'),
(42, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(43, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/3/18 16:11'),
(44, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(45, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/3/18 16:11'),
(46, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/23/18 14:05'),
(47, '123,227,94,131', '3', '4', '90', '55', 'a', '34', '35', '5/31/18 11:22'),
(48, '123,227,94,132', '3', '4', '6.69', '34', 'a', '34', '35', '5/31/18 11:23'),
(59, '10,157,229,182', '4', '36', '97.27', '120/6', 'B+', '36,5', '155', '2018-06-07 11:18:55'),
(60, '186,166,215,182', '3', '16', '65.83', '119', 'A', '26', '162', '2018-06-07 11:36:38'),
(61, '90,109,211,182', '1', '38', '63.22', '109', 'A', '31', '150', '2018-06-07 11:42:24'),
(62, '58,142,213,182', '1', '11', '76.91', '119', 'AB', '31,5', '156', '2018-06-07 12:00:15'),
(63, '125,134,57,4', '1', '16', '60.40', '109', 'O', '25', '157', '2018-07-02 07:45:24'),
(64, '170,60,213,182', '4', '34', '55.28', '124', 'O', '24', '150', '2018-07-02 08:02:29'),
(65, '148,171,102,30', '2', '38', '66.34', '119/4', 'O', '27', '157', '2018-07-02 08:12:51'),
(66, '173,231,53,4', '3', '17', '60.49', '105/6', 'B+', '23', '158', '2018-07-02 10:06:00'),
(67, '109,35,248,95', '1', '24', '101.2', '105/7', 'O', '43', '150', '2018-07-02 10:33:18'),
(68, '61,142,61,96', '4', '18', '44.98', '103/6', 'O', '21', '151', '2018-07-02 10:47:53'),
(69, '189,249,104,95', '3', '35', '83.40', '119/7', 'B', '28', '158', '2018-07-02 11:02:49'),
(70, '93,220,59,4', '3', '19', '53.01', '113/6', 'B', '25', '165', '2018-07-02 11:05:52'),
(71, '29,25,59,96', '3', '23', '60.19', '106/6', 'A', '19', '150', '2018-07-02 11:14:49'),
(72, '29,113,105,95', '3', '34', '56.38', '107/6', 'B+', '28', '150', '2018-07-02 11:32:24'),
(73, '125,200,114,95', '2', '33', '64.40', '112/7', 'O+', '25', '147', '2018-07-02 12:00:36'),
(74, '13,80,64,4', '1', '31', '42.10', '109/7', 'AB+', '18', '143', '2018-07-02 12:17:10'),
(75, '13,16,93,95', '2', '20', '53.97', '120/7', 'O+', '27', '145', '2018-07-04 10:54:05'),
(76, '61,226,56,96', '2', '21', '54.30', '109/7', 'O', '23', '155', '2018-07-04 10:57:44'),
(77, '125,99,107,95', '3', '20', '82.2', '125/7', 'B', '31', '153', '2018-07-04 11:56:08'),
(78, '221,114,127,95', '1', '22', '63.21', '106/6', 'B', '23', '153', '2018-07-17 12:39:14'),
(79, '45,99,127,95', '2', '35', '67.98', '119/7', 'O', '26', '155', '2018-07-17 14:03:39'),
(80, '45,160,93,95', '1', '18', '62.20', '103/6', 'O', '25', '157', '2018-07-17 14:12:28'),
(81, '109,249,57,4', '3', '27', '71.31', '125/7', 'AB', '27', '153', '2018-07-17 14:18:47'),
(82, '189,76,18,14', '2', '22', '68.91', '120/6', 'O', '25', '148', '2018-07-17 14:22:37'),
(83, '45,120,68,4', '1', '24', '68.98', '112/7', 'O', '24', '158', '2018-07-17 14:27:07'),
(84, '109,154,105,95', '4', '30', '72.10', '125/7', 'A', '31', '160', '2018-07-17 14:33:56'),
(85, '237,28,79,14', '1', '19', '73.69', '106/7', 'B', '28', '162', '2018-07-17 14:39:25'),
(86, '93,171,114,95', '4', '26', '78.31', '120/4', 'B', '27', '158', '2018-07-17 14:46:47'),
(87, '93,44,96,95', '2', '24', '69.98', '106/7', 'O', '24', '150', '2018-07-17 14:57:15'),
(88, '182,88,155,229', '1', '12', '62.10', '120/7', 'B+', '26', '157', '2018-07-18 11:35:25'),
(89, '141,200,245,95', '1', '15', '61.00', '119/7', 'O+', '27', '154', '2018-07-18 11:46:12'),
(90, '246,91,155,229', '2', '13', '59.62', '112/7', 'B', '24', '156', '2018-07-18 12:00:14'),
(91, '237,100,31,14', '3', '17', '70.76', '119/9', 'O', '28', '163', '2018-07-18 12:08:20'),
(92, '157,35,102,95', '2', '14', '64.18', '119/4', 'O+', '24', '152', '2018-07-18 12:21:12'),
(94, '125,176,108,95', '2', '24', '60.05', '106/7', 'O', '23', '160', '2018-07-20 12:24:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldaftarbumil`
--
ALTER TABLE `tbldaftarbumil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgetrfid`
--
ALTER TABLE `tblgetrfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgetrfidukur`
--
ALTER TABLE `tblgetrfidukur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpengukuran`
--
ALTER TABLE `tblpengukuran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldaftarbumil`
--
ALTER TABLE `tbldaftarbumil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tblgetrfid`
--
ALTER TABLE `tblgetrfid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tblgetrfidukur`
--
ALTER TABLE `tblgetrfidukur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tblpengukuran`
--
ALTER TABLE `tblpengukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
