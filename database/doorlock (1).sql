-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 06:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doorlock`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_log`
--

CREATE TABLE `card_log` (
  `id` bigint(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `rssi` float NOT NULL,
  `snr` float NOT NULL,
  `macAddr` varchar(255) NOT NULL,
  `uidCard` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_log`
--

INSERT INTO `card_log` (`id`, `timestamp`, `rssi`, `snr`, `macAddr`, `uidCard`, `nip`) VALUES
(1, '2022-05-28 09:27:56', -63, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(2, '2022-05-28 09:28:01', -64, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(3, '2022-05-28 09:28:08', -63, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(4, '2022-05-28 09:28:14', -63, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(5, '2022-05-28 09:28:21', -63, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(6, '2022-05-28 09:28:28', -63, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(7, '2022-05-28 09:42:47', -63, 10, '24:62:AB:FF:7E:1C', '29da66e', '000000000000010001'),
(8, '2022-05-28 09:43:28', -64, 11, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(9, '2022-05-28 09:44:09', -64, 6, '24:62:AB:FF:7E:1C', '29da66e', '000000000000010001'),
(10, '2022-05-28 09:44:29', -64, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(11, '2022-05-28 09:45:04', -64, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002'),
(12, '2022-05-28 09:51:59', -65, 9, '24:62:AB:FF:7E:1C', 'a9c31ce5', '000000000000010002');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `macAddr` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `lastOnline` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `keterangan`, `macAddr`, `status`, `lastOnline`) VALUES
(1, 'Esp', '24:62:AB:FF:7E:1C', 1, '2022-05-28 09:55:48'),
(2, 'Raspi', 'dc:a6:32:bb:af:e1', 1, '2022-05-28 09:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `uidCard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `nama`, `uidCard`) VALUES
(1, '1234567890', 'Mashabi', '29da66e'),
(2, '111112222', 'Budiman', 'a9c31ce5');

-- --------------------------------------------------------

--
-- Table structure for table `koneksi`
--

CREATE TABLE `koneksi` (
  `id` int(11) NOT NULL,
  `nama_perangkat` varchar(250) CHARACTER SET latin1 NOT NULL,
  `id_perangkat` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'kasbi', '0101', 'kasbi@gmail.com', 'default.jpg', '$2y$10$NyixJpOSyiceyU.HksCpWuvCuZCin4712FMCCSEBt.KfQpq8f9BfS', 1, 1, 1647018695),
(2, 'bli', '0001', 'bliandika@gmail.com', 'default.jpg', '$2y$10$PcmFrjONPmkO8Wz0KYW6Guq3gxBIHJ.XKuQYmLrv2.MB0GLlBGQBe', 2, 0, 1647404327),
(3, 'arya', '000001', 'arya@gmail.com', 'default.jpg', '$2y$10$zRTnH.GxTQ.bi/Efp0whaumISJfcY6f.UpoSon5xaVDaeNfeF9APO', 2, 1, 1652081595);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_log`
--
ALTER TABLE `card_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koneksi`
--
ALTER TABLE `koneksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_log`
--
ALTER TABLE `card_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `koneksi`
--
ALTER TABLE `koneksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
