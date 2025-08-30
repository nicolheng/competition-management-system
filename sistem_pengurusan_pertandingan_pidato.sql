-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 03:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem pengurusan pertandingan pidato`
--
CREATE DATABASE IF NOT EXISTS `sistem pengurusan pertandingan pidato` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistem pengurusan pertandingan pidato`;

-- --------------------------------------------------------

--
-- Table structure for table `hakim`
--

CREATE TABLE `hakim` (
  `ID_hakim` varchar(3) NOT NULL,
  `nama_hakim` varchar(50) NOT NULL,
  `psw_hakim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hakim`
--

INSERT INTO `hakim` (`ID_hakim`, `nama_hakim`, `psw_hakim`) VALUES
('H1', 'Siti', 'abc1234'),
('H2', 'Muthu', 'heif1356'),
('H3', 'Ali', 'ali123');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kod_kategori` varchar(1) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kod_kategori`, `nama_kategori`) VALUES
('M', 'menengah'),
('R', 'rendah');

-- --------------------------------------------------------

--
-- Table structure for table `markah`
--

CREATE TABLE `markah` (
  `ID_peserta` varchar(4) NOT NULL,
  `ID_hakim` varchar(3) NOT NULL,
  `skor_isi` int(2) NOT NULL,
  `skor_bahasa` int(2) NOT NULL,
  `skor_gaya` int(2) NOT NULL,
  `skor_etika` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markah`
--

INSERT INTO `markah` (`ID_peserta`, `ID_hakim`, `skor_isi`, `skor_bahasa`, `skor_gaya`, `skor_etika`) VALUES
('M2', 'H1', 35, 35, 21, 5),
('M3', 'H1', 20, 20, 10, 5),
('M4', 'H1', 32, 31, 25, 5),
('M7', 'H1', 34, 32, 24, 5),
('R6', 'H1', 1, 1, 1, 1),
('R8', 'H1', 12, 12, 12, 3),
('M2', 'H2', 40, 35, 25, 5),
('M3', 'H2', 34, 20, 20, 5),
('M4', 'H2', 20, 20, 20, 5),
('M7', 'H2', 2, 2, 2, 2),
('R6', 'H2', 30, 30, 25, 5),
('R8', 'H2', 1, 1, 1, 1),
('M2', 'H3', 30, 30, 25, 5),
('M3', 'H3', 20, 20, 20, 5),
('M4', 'H3', 30, 30, 25, 5),
('M7', 'H3', 20, 20, 20, 5),
('R6', 'H3', 20, 20, 20, 5),
('R8', 'H3', 21, 21, 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `ID_peserta` varchar(4) NOT NULL,
  `kod_kategori` varchar(1) NOT NULL,
  `kod_sekolah` varchar(7) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `no_kp` varchar(12) NOT NULL,
  `no_telefon` varchar(11) NOT NULL,
  `jantina` varchar(1) NOT NULL,
  `psw_peserta` varchar(20) NOT NULL,
  `umur` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`ID_peserta`, `kod_kategori`, `kod_sekolah`, `nama_peserta`, `no_kp`, `no_telefon`, `jantina`, `psw_peserta`, `umur`) VALUES
('M2', 'M', 'ABC1234', 'Mei Ling', '040707070706', '0126548548', 'P', 'aaaaaa123', 18),
('M3', 'M', 'PEB1108', 'nicol', '111111111111', '0123456789', 'P', 'abc123', 17),
('M4', 'M', 'PEB1108', 'Ah Wong', '080229070823', '0196759363', 'L', '0123', 14),
('M7', 'M', 'PBB1234', 'Heng', '050706078292', '0176283822', 'P', '1234', 17),
('M9', 'M', 'PEB1108', 'iven', '222222222222', '0123456789', 'P', 'A', 13),
('R6', 'R', 'ABC1111', 'Renee', '120405070824', '0196399264', 'P', 'asd1234', 10),
('R8', 'R', 'ABC1111', 'Abu', '100101020175', '0199239139', 'L', '123', 12);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `kod_sekolah` varchar(7) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`kod_sekolah`, `nama_sekolah`) VALUES
('ABC1111', 'SK Sungai Nibong'),
('ABC1234', 'SMK ABC'),
('PBB1234', 'SMK Sungai Nibong'),
('PEB1108', 'SMJK Phor Tay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hakim`
--
ALTER TABLE `hakim`
  ADD PRIMARY KEY (`ID_hakim`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kod_kategori`);

--
-- Indexes for table `markah`
--
ALTER TABLE `markah`
  ADD PRIMARY KEY (`ID_hakim`,`ID_peserta`),
  ADD KEY `ID_peserta` (`ID_peserta`),
  ADD KEY `ID_hakim` (`ID_hakim`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`ID_peserta`),
  ADD KEY `kod_kategori` (`kod_kategori`),
  ADD KEY `kod_sekolah` (`kod_sekolah`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`kod_sekolah`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `markah`
--
ALTER TABLE `markah`
  ADD CONSTRAINT `markah_ibfk_1` FOREIGN KEY (`ID_peserta`) REFERENCES `peserta` (`ID_peserta`),
  ADD CONSTRAINT `markah_ibfk_2` FOREIGN KEY (`ID_hakim`) REFERENCES `hakim` (`ID_hakim`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`kod_sekolah`) REFERENCES `sekolah` (`kod_sekolah`),
  ADD CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`kod_kategori`) REFERENCES `kategori` (`kod_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
