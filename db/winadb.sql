-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 08:09 PM
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
-- Database: `winadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booth`
--

CREATE TABLE `booth` (
  `ID` int(5) NOT NULL,
  `Booth Name` varchar(20) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Monthly Limit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boothservices`
--

CREATE TABLE `boothservices` (
  `BoothName` varchar(10) DEFAULT NULL,
  `ServiceName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boothservices`
--

INSERT INTO `boothservices` (`BoothName`, `ServiceName`) VALUES
('Wina1', 'Airtel Money'),
('Wina1', 'MTN Money'),
('Wina1', 'Zamtel Money'),
('Wina1', 'Zanaco'),
('Wina1', 'FNB'),
('Wina2', 'Airtel Money'),
('Wina2', 'MTN Money'),
('Wina2', 'Zamtel Money'),
('Wina2', 'FNB'),
('Wina3', 'Airtel Money'),
('Wina3', 'MTN Money'),
('Wina3', 'Zamtel Money'),
('Wina3', 'Zanaco'),
('Wina3', 'FNB'),
('Wina4', 'Airtel Money'),
('Wina4', 'MTN Money'),
('Wina4', 'Zamtel Money'),
('Wina5', 'Airtel Money'),
('Wina5', 'MTN Money'),
('Wina5', 'Zanaco'),
('Wina5', 'FNB'),
('Wina6', 'Airtel Money'),
('Wina6', 'MTN Money'),
('Wina6', 'Zamtel Money');

-- --------------------------------------------------------

--
-- Table structure for table `offerings`
--

CREATE TABLE `offerings` (
  `ID` int(11) NOT NULL,
  `Booth` varchar(30) NOT NULL,
  `Airtel Money` tinyint(1) NOT NULL,
  `MTN Money` tinyint(1) NOT NULL,
  `Zamtel Money` tinyint(1) NOT NULL,
  `Zanaco` tinyint(1) NOT NULL,
  `FNB` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offerings`
--

INSERT INTO `offerings` (`ID`, `Booth`, `Airtel Money`, `MTN Money`, `Zamtel Money`, `Zanaco`, `FNB`) VALUES
(1, 'Wina1', 1, 1, 1, 1, 1),
(2, 'Wina2', 1, 1, 1, 0, 1),
(3, 'Wina3', 1, 1, 1, 1, 1),
(4, 'Wina4', 1, 1, 1, 0, 0),
(5, 'Wina5', 1, 1, 0, 1, 1),
(6, 'Wina6', 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ID` int(4) NOT NULL,
  `Service` varchar(50) NOT NULL,
  `Monthly Limit` int(10) NOT NULL,
  `Revenue per Kwanch` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ID`, `Service`, `Monthly Limit`, `Revenue per Kwanch`) VALUES
(1, 'Airtel Money', 350000, 0.05),
(2, 'MTN Money', 160000, 0.06),
(3, 'Zamtel Money', 70000, 0.045),
(4, 'Zanaco', 80000, 0.035),
(5, 'FNB', 80000, 0.04);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `ID` int(5) NOT NULL,
  `TransactionID` varchar(10) NOT NULL,
  `Mobile Booth` varchar(30) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Service` varchar(30) NOT NULL,
  `Revenue Per Kwanch` float NOT NULL,
  `Transaction Amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`ID`, `TransactionID`, `Mobile Booth`, `Location`, `Service`, `Revenue Per Kwanch`, `Transaction Amount`) VALUES
(1, 'WB0000001', 'Wina1', 'Lusaka CPD', 'Airtel Money', 0.05, 964),
(2, 'WB0000002', 'Wina1', 'Lusaka CPD', 'MTN Money', 0.06, 220),
(3, 'WB0000003', 'Wina2', 'Libala', 'MTN Money', 0.06, 582),
(4, 'WB0000004', 'Wina3', 'Kabwata', 'Zamtel Money', 0.045, 349),
(5, 'WB0000005', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 328),
(6, 'WB0000006', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 192),
(7, 'WB0000007', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1519),
(8, 'WB0000008', 'Wina4', 'Mandevu', 'Zamtel Money', 0.045, 1113),
(9, 'WB0000009', 'Wina1', 'Lusaka CPD', 'FNB', 0.04, 1999),
(10, 'WB0000010', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3810),
(11, 'WB0000011', 'Wina6', 'Matero East', 'Zamtel Money', 0.045, 3270),
(12, 'WB0000012', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1092),
(13, 'WB0000013', 'Wina2', 'Libala', 'Airtel Money', 0.05, 1056),
(14, 'WB0000014', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 509),
(15, 'WB0000015', 'Wina5', 'Woodlands', 'FNB', 0.04, 34),
(16, 'WB0000016', 'Wina2', 'Libala', 'MTN Money', 0.06, 1658),
(17, 'WB0000017', 'Wina5', 'Woodlands', 'Zamtel Money', 0.045, 2167),
(18, 'WB0000018', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2594),
(19, 'WB0000019', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 3656),
(20, 'WB0000020', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 4030),
(21, 'WB0000021', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 989),
(22, 'WB0000022', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 4081),
(23, 'WB0000023', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 925),
(24, 'WB0000024', 'Wina2', 'Libala', 'MTN Money', 0.06, 2312),
(25, 'WB0000025', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 3280),
(26, 'WB0000026', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 90),
(27, 'WB0000027', 'Wina5', 'Woodlands', 'FNB', 0.04, 2556),
(28, 'WB0000028', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 673),
(29, 'WB0000029', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 4185),
(30, 'WB0000030', 'Wina1', 'Lusaka CPD', 'Zanaco', 0.035, 412),
(31, 'WB0000031', 'Wina1', 'Lusaka CPD', 'MTN Money', 0.06, 310),
(32, 'WB0000032', 'Wina2', 'Libala', 'MTN Money', 0.06, 4248),
(33, 'WB0000033', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 4105),
(34, 'WB0000034', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1147),
(35, 'WB0000035', 'Wina3', 'Kabwata', 'Zamtel Money', 0.045, 1815),
(36, 'WB0000036', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1653),
(37, 'WB0000037', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1045),
(38, 'WB0000038', 'Wina1', 'Lusaka CPD', 'FNB', 0.04, 4364),
(39, 'WB0000039', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 2822),
(40, 'WB0000040', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 2046),
(41, 'WB0000041', 'Wina3', 'Kabwata', 'Zamtel Money', 0.045, 1985),
(42, 'WB0000042', 'Wina2', 'Libala', 'MTN Money', 0.06, 3023),
(43, 'WB0000043', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3728),
(44, 'WB0000044', 'Wina5', 'Woodlands', 'MTN Money', 0.06, 58),
(45, 'WB0000045', 'Wina2', 'Libala', 'Airtel Money', 0.05, 2744),
(46, 'WB0000046', 'Wina5', 'Woodlands', 'FNB', 0.04, 1654),
(47, 'WB0000047', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1331),
(48, 'WB0000048', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 801),
(49, 'WB0000049', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 967),
(50, 'WB0000050', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 1988),
(51, 'WB0000051', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3646),
(52, 'WB0000052', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 54),
(53, 'WB0000053', 'Wina2', 'Libala', 'Zamtel Money', 0.045, 2121),
(54, 'WB0000054', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 564),
(55, 'WB0000055', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1011),
(56, 'WB0000056', 'Wina5', 'Woodlands', 'FNB', 0.04, 2950),
(57, 'WB0000057', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 57),
(58, 'WB0000058', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 2382),
(59, 'WB0000059', 'Wina1', 'Lusaka CPD', 'MTN Money', 0.06, 349),
(60, 'WB0000060', 'Wina1', 'Lusaka CPD', 'Airtel Money', 0.05, 2479),
(61, 'WB0000061', 'Wina2', 'Libala', 'Airtel Money', 0.05, 1537),
(62, 'WB0000062', 'Wina3', 'Kabwata', 'Zamtel Money', 0.045, 2802),
(63, 'WB0000063', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1290),
(64, 'WB0000064', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 4331),
(65, 'WB0000065', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1338),
(66, 'WB0000066', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1477),
(67, 'WB0000067', 'Wina1', 'Lusaka CPD', 'Airtel Money', 0.05, 3430),
(68, 'WB0000068', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 451),
(69, 'WB0000069', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 80),
(70, 'WB0000070', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 2002),
(71, 'WB0000071', 'Wina2', 'Libala', 'Airtel Money', 0.05, 3235),
(72, 'WB0000072', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 4156),
(73, 'WB0000073', 'Wina5', 'Woodlands', 'Airtel Money', 0.05, 22),
(74, 'WB0000074', 'Wina2', 'Libala', 'Airtel Money', 0.05, 2156),
(75, 'WB0000075', 'Wina5', 'Woodlands', 'MTN Money', 0.06, 2267),
(76, 'WB0000076', 'Wina3', 'Kabwata', 'Zamtel Money', 0.045, 2419),
(77, 'WB0000077', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1691),
(78, 'WB0000078', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2736),
(79, 'WB0000079', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 4282),
(80, 'WB0000080', 'Wina3', 'Kabwata', 'Zamtel Money', 0.045, 2331),
(81, 'WB0000081', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1405),
(82, 'WB0000082', 'Wina2', 'Libala', 'Airtel Money', 0.05, 945),
(83, 'WB0000083', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 688),
(84, 'WB0000084', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 189),
(85, 'WB0000085', 'Wina5', 'Woodlands', 'FNB', 0.04, 3787),
(86, 'WB0000086', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 3407),
(87, 'WB0000087', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1105),
(88, 'WB0000088', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 174),
(89, 'WB0000089', 'Wina2', 'Libala', 'MTN Money', 0.06, 1440),
(90, 'WB0000090', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 3344),
(91, 'WB0000091', 'Wina2', 'Libala', 'Airtel Money', 0.05, 2676),
(92, 'WB0000092', 'Wina2', 'Libala', 'Airtel Money', 0.05, 812),
(93, 'WB0000093', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 4224),
(94, 'WB0000094', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 592),
(95, 'WB0000095', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1662),
(96, 'WB0000096', 'Wina2', 'Libala', 'Airtel Money', 0.05, 1915),
(97, 'WB0000097', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1866),
(98, 'WB0000098', 'Wina6', 'Matero East', 'MTN Money', 0.06, 4320),
(99, 'WB0000099', 'Wina2', 'Libala', 'Airtel Money', 0.05, 228),
(100, 'WB0000100', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 3318),
(101, 'WB0000101', 'Wina2', 'Libala', 'Airtel Money', 0.05, 3615),
(102, 'WB0000102', 'Wina2', 'Libala', 'Airtel Money', 0.05, 4156),
(103, 'WB0000103', 'Wina3', 'Kabwata', 'Zamtel Money', 0.045, 1401),
(104, 'WB0000104', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2014),
(105, 'WB0000105', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 3475),
(106, 'WB0000106', 'Wina2', 'Libala', 'MTN Money', 0.06, 2452),
(107, 'WB0000107', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1720),
(108, 'WB0000108', 'Wina2', 'Libala', 'Airtel Money', 0.05, 118),
(109, 'WB0000109', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 779),
(110, 'WB0000110', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1623),
(111, 'WB0000111', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2679),
(112, 'WB0000112', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1976),
(113, 'WB0000113', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 974),
(114, 'WB0000114', 'Wina1', 'Lusaka CPD', 'Airtel Money', 0.05, 2911),
(115, 'WB0000115', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 279),
(116, 'WB0000116', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 3646),
(117, 'WB0000117', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 855),
(118, 'WB0000118', 'Wina2', 'Libala', 'Airtel Money', 0.05, 1412),
(119, 'WB0000119', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2137),
(120, 'WB0000120', 'Wina5', 'Woodlands', 'FNB', 0.04, 1800),
(121, 'WB0000121', 'Wina2', 'Libala', 'Airtel Money', 0.05, 1219),
(122, 'WB0000122', 'Wina5', 'Woodlands', 'FNB', 0.04, 3582),
(123, 'WB0000123', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 760),
(124, 'WB0000124', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 2308),
(125, 'WB0000125', 'Wina1', 'Lusaka CPD', 'Zamtel Money', 0.045, 1941),
(126, 'WB0000126', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2068),
(127, 'WB0000127', 'Wina6', 'Matero East', 'MTN Money', 0.06, 4242),
(128, 'WB0000128', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2587),
(129, 'WB0000129', 'Wina2', 'Libala', 'Zamtel Money', 0.045, 4196),
(130, 'WB0000130', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1463),
(131, 'WB0000131', 'Wina5', 'Woodlands', 'FNB', 0.04, 2199),
(132, 'WB0000132', 'Wina2', 'Libala', 'Airtel Money', 0.05, 2956),
(133, 'WB0000133', 'Wina5', 'Woodlands', 'FNB', 0.04, 1663),
(134, 'WB0000134', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2525),
(135, 'WB0000135', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 4404),
(136, 'WB0000136', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 1012),
(137, 'WB0000137', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 69),
(138, 'WB0000138', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 4241),
(139, 'WB0000139', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 3379),
(140, 'WB0000140', 'Wina2', 'Libala', 'MTN Money', 0.06, 3255),
(141, 'WB0000141', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1705),
(142, 'WB0000142', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1039),
(143, 'WB0000143', 'Wina5', 'Woodlands', 'FNB', 0.04, 254),
(144, 'WB0000144', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 870),
(145, 'WB0000145', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 772),
(146, 'WB0000146', 'Wina1', 'Lusaka CPD', 'Zamtel Money', 0.045, 1791),
(147, 'WB0000147', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3320),
(148, 'WB0000148', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 4185),
(149, 'WB0000149', 'Wina1', 'Lusaka CPD', 'MTN Money', 0.06, 100),
(150, 'WB0000150', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 3794),
(151, 'WB0000151', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 498),
(152, 'WB0000152', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2566),
(153, 'WB0000153', 'Wina2', 'Libala', 'Airtel Money', 0.05, 4459),
(154, 'WB0000154', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3916),
(155, 'WB0000155', 'Wina5', 'Woodlands', 'FNB', 0.04, 528),
(156, 'WB0000156', 'Wina2', 'Libala', 'FNB', 0.04, 2067),
(157, 'WB0000157', 'Wina5', 'Woodlands', 'FNB', 0.04, 1119),
(158, 'WB0000158', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1209),
(159, 'WB0000159', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1950),
(160, 'WB0000160', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 1268),
(161, 'WB0000161', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1066),
(162, 'WB0000162', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 4419),
(163, 'WB0000163', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 2065),
(164, 'WB0000164', 'Wina2', 'Libala', 'FNB', 0.04, 2663),
(165, 'WB0000165', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2075),
(166, 'WB0000166', 'Wina4', 'Mandevu', 'Zamtel Money', 0.045, 3284),
(167, 'WB0000167', 'Wina5', 'Woodlands', 'Airtel Money', 0.05, 425),
(168, 'WB0000168', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1856),
(169, 'WB0000169', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 405),
(170, 'WB0000170', 'Wina1', 'Lusaka CPD', 'FNB', 0.04, 608),
(171, 'WB0000171', 'Wina1', 'Lusaka CPD', 'Zamtel Money', 0.045, 4143),
(172, 'WB0000172', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 681),
(173, 'WB0000173', 'Wina6', 'Matero East', 'MTN Money', 0.06, 4405),
(174, 'WB0000174', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3980),
(175, 'WB0000175', 'Wina2', 'Libala', 'Zamtel Money', 0.045, 2510),
(176, 'WB0000176', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2807),
(177, 'WB0000177', 'Wina5', 'Woodlands', 'FNB', 0.04, 474),
(178, 'WB0000178', 'Wina2', 'Libala', 'Airtel Money', 0.05, 75),
(179, 'WB0000179', 'Wina5', 'Woodlands', 'FNB', 0.04, 2581),
(180, 'WB0000180', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3938),
(181, 'WB0000181', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 3419),
(182, 'WB0000182', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 1047),
(183, 'WB0000183', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 205),
(184, 'WB0000184', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 495),
(185, 'WB0000185', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 3107),
(186, 'WB0000186', 'Wina2', 'Libala', 'MTN Money', 0.06, 2597),
(187, 'WB0000187', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 3049),
(188, 'WB0000188', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 2713),
(189, 'WB0000189', 'Wina5', 'Woodlands', 'FNB', 0.04, 1727),
(190, 'WB0000190', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 2060),
(191, 'WB0000191', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 268),
(192, 'WB0000192', 'Wina1', 'Lusaka CPD', 'Zamtel Money', 0.045, 2327),
(193, 'WB0000193', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3027),
(194, 'WB0000194', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 897),
(195, 'WB0000195', 'Wina1', 'Lusaka CPD', 'MTN Money', 0.06, 2275),
(196, 'WB0000196', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 1246),
(197, 'WB0000197', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 2768),
(198, 'WB0000198', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3082),
(199, 'WB0000199', 'Wina2', 'Libala', 'Airtel Money', 0.05, 4307),
(200, 'WB0000200', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3664),
(201, 'WB0000201', 'Wina5', 'Woodlands', 'FNB', 0.04, 3274),
(202, 'WB0000202', 'Wina2', 'Libala', 'FNB', 0.04, 2854),
(203, 'WB0000203', 'Wina5', 'Woodlands', 'FNB', 0.04, 1253),
(204, 'WB0000204', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 812),
(205, 'WB0000205', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 962),
(206, 'WB0000206', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 2219),
(207, 'WB0000207', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 4407),
(208, 'WB0000208', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3825),
(209, 'WB0000209', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 2162),
(210, 'WB0000210', 'Wina2', 'Libala', 'FNB', 0.04, 883),
(211, 'WB0000211', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1506),
(212, 'WB0000212', 'Wina4', 'Mandevu', 'Zamtel Money', 0.045, 394),
(213, 'WB0000213', 'Wina5', 'Woodlands', 'Airtel Money', 0.05, 4272),
(214, 'WB0000214', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 4187),
(215, 'WB0000215', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 913),
(216, 'WB0000216', 'Wina1', 'Lusaka CPD', 'FNB', 0.04, 3651),
(217, 'WB0000217', 'Wina1', 'Lusaka CPD', 'Zamtel Money', 0.045, 1000),
(218, 'WB0000218', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 839),
(219, 'WB0000219', 'Wina6', 'Matero East', 'MTN Money', 0.06, 1851),
(220, 'WB0000220', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1341),
(221, 'WB0000221', 'Wina2', 'Libala', 'Zamtel Money', 0.045, 3150),
(222, 'WB0000222', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3050),
(223, 'WB0000223', 'Wina5', 'Woodlands', 'FNB', 0.04, 4489),
(224, 'WB0000224', 'Wina2', 'Libala', 'Airtel Money', 0.05, 3432),
(225, 'WB0000225', 'Wina5', 'Woodlands', 'FNB', 0.04, 136),
(226, 'WB0000226', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2318),
(227, 'WB0000227', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 4327),
(228, 'WB0000228', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 1653),
(229, 'WB0000229', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 20),
(230, 'WB0000230', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1219),
(231, 'WB0000231', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 1508),
(232, 'WB0000232', 'Wina2', 'Libala', 'MTN Money', 0.06, 1205),
(233, 'WB0000233', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1589),
(234, 'WB0000234', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 1280),
(235, 'WB0000235', 'Wina5', 'Woodlands', 'FNB', 0.04, 335),
(236, 'WB0000236', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 2268),
(237, 'WB0000237', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 2815),
(238, 'WB0000238', 'Wina1', 'Lusaka CPD', 'Zamtel Money', 0.045, 4414),
(239, 'WB0000239', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 654),
(240, 'WB0000240', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 2180),
(241, 'WB0000241', 'Wina1', 'Lusaka CPD', 'MTN Money', 0.06, 2869),
(242, 'WB0000242', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 3757),
(243, 'WB0000243', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 2038),
(244, 'WB0000244', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1344),
(245, 'WB0000245', 'Wina2', 'Libala', 'Airtel Money', 0.05, 526),
(246, 'WB0000246', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 192),
(247, 'WB0000247', 'Wina5', 'Woodlands', 'FNB', 0.04, 866),
(248, 'WB0000248', 'Wina2', 'Libala', 'FNB', 0.04, 3568),
(249, 'WB0000249', 'Wina5', 'Woodlands', 'FNB', 0.04, 729),
(250, 'WB0000250', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3331),
(251, 'WB0000251', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 336),
(252, 'WB0000252', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 976),
(253, 'WB0000253', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 89),
(254, 'WB0000254', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 630),
(255, 'WB0000255', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 3161),
(256, 'WB0000256', 'Wina2', 'Libala', 'FNB', 0.04, 4200),
(257, 'WB0000257', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3887),
(258, 'WB0000258', 'Wina4', 'Mandevu', 'Zamtel Money', 0.045, 4421),
(259, 'WB0000259', 'Wina5', 'Woodlands', 'Airtel Money', 0.05, 1863),
(260, 'WB0000260', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 2465),
(261, 'WB0000261', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 3775),
(262, 'WB0000262', 'Wina1', 'Lusaka CPD', 'FNB', 0.04, 2897),
(263, 'WB0000263', 'Wina1', 'Lusaka CPD', 'Zamtel Money', 0.045, 3994),
(264, 'WB0000264', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 586),
(265, 'WB0000265', 'Wina6', 'Matero East', 'MTN Money', 0.06, 2562),
(266, 'WB0000266', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3867),
(267, 'WB0000267', 'Wina2', 'Libala', 'Zamtel Money', 0.045, 4208),
(268, 'WB0000268', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 4471),
(269, 'WB0000269', 'Wina5', 'Woodlands', 'FNB', 0.04, 303),
(270, 'WB0000270', 'Wina2', 'Libala', 'Airtel Money', 0.05, 4261),
(271, 'WB0000271', 'Wina5', 'Woodlands', 'FNB', 0.04, 1122),
(272, 'WB0000272', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1396),
(273, 'WB0000273', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 905),
(274, 'WB0000274', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 4002),
(275, 'WB0000275', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 1591),
(276, 'WB0000276', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3353),
(277, 'WB0000277', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 3364),
(278, 'WB0000278', 'Wina2', 'Libala', 'MTN Money', 0.06, 4129),
(279, 'WB0000279', 'Wina3', 'Kabwata', 'Zanaco', 0.035, 1003),
(280, 'WB0000280', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 2475),
(281, 'WB0000281', 'Wina5', 'Woodlands', 'FNB', 0.04, 3597),
(282, 'WB0000282', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 1659),
(283, 'WB0000283', 'Wina4', 'Mandevu', 'MTN Money', 0.06, 4163),
(284, 'WB0000284', 'Wina1', 'Lusaka CPD', 'Zamtel Money', 0.045, 487),
(285, 'WB0000285', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3790),
(286, 'WB0000286', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 2186),
(287, 'WB0000287', 'Wina1', 'Lusaka CPD', 'MTN Money', 0.06, 1894),
(288, 'WB0000288', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 1458),
(289, 'WB0000289', 'Wina6', 'Matero East', 'Airtel Money', 0.05, 875),
(290, 'WB0000290', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 189),
(291, 'WB0000291', 'Wina2', 'Libala', 'Airtel Money', 0.05, 4479),
(292, 'WB0000292', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 3733),
(293, 'WB0000293', 'Wina5', 'Woodlands', 'FNB', 0.04, 640),
(294, 'WB0000294', 'Wina2', 'Libala', 'FNB', 0.04, 413),
(295, 'WB0000295', 'Wina5', 'Woodlands', 'FNB', 0.04, 880),
(296, 'WB0000296', 'Wina3', 'Kabwata', 'Airtel Money', 0.05, 2921),
(297, 'WB0000297', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 3428),
(298, 'WB0000298', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 4103),
(342, 'WB000299', 'Wina4', 'Mandevu', 'Airtel Money', 0.05, 2345),
(343, 'WB0000300', 'Wina2', 'Libala', 'Airtel Money', 0.05, 3452),
(344, 'WB0000301', 'Wina3', 'Kabwata', 'MTN Money', 0.06, 2457),
(345, 'WB0000302', 'Wina2', 'Libala', 'MTN Money', 0.06, 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booth`
--
ALTER TABLE `booth`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `offerings`
--
ALTER TABLE `offerings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booth`
--
ALTER TABLE `booth`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offerings`
--
ALTER TABLE `offerings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
