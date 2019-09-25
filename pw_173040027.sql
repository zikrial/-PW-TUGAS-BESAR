-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 05:35 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_173040027`
--
CREATE DATABASE IF NOT EXISTS `pw_173040027` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pw_173040027`;

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id_negara` char(5) NOT NULL,
  `nama_negara` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id_negara`, `nama_negara`) VALUES
('NEG1', 'Amerika Serikat'),
('NEG2', 'Italia'),
('NEG3', 'Inggris'),
('NEG4', 'Prancis'),
('NEG5', 'Belanda'),
('NEG6', 'Rusia'),
('NEG7', 'Jerman'),
('NEG8', 'Spanyol'),
('NEG9', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `penemu_terkenal`
--

CREATE TABLE `penemu_terkenal` (
  `nomor` char(5) NOT NULL,
  `penemu` varchar(30) NOT NULL,
  `temuan` varchar(30) DEFAULT NULL,
  `id_negara` varchar(5) DEFAULT NULL,
  `tahun_ditemukan` int(11) DEFAULT NULL,
  `gambar_penemu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penemu_terkenal`
--

INSERT INTO `penemu_terkenal` (`nomor`, `penemu`, `temuan`, `id_negara`, `tahun_ditemukan`, `gambar_penemu`) VALUES
('01', 'Galileo Galilei', 'Termometer', 'NEG2', 1593, 'GalileoGalilei.jpg'),
('02', 'Guglielmo Marconi', 'Radio', 'NEG2', 1895, 'GuglielmoMarconi.jpg'),
('03', 'J. Lagie Baird', 'Televisi', 'NEG3', 1920, 'J.LagieBaird.jpg'),
('04', 'Samuel F.B. Morse', 'Telegrap', 'NEG1', 1837, 'SamuelMorse.jpg'),
('05', 'Alexander Graham Bell', 'Telepon', 'NEG1', 1876, 'AlexanderGrahamBell.jpg'),
('06', 'Michael Faraday', 'Dinamo', 'NEG3', 1831, 'MichaelFaraday.jpg'),
('07', 'Wilbur dan Wright', 'Pesawat terbang', 'NEG1', 1903, 'OliverdanWilbur.jpg'),
('08', 'Thomas Alfa Edison', 'Bola lampu', 'NEG1', 1868, 'thomasalvaedison.jpg'),
('09', 'Robert Fulton', 'Kapal api', 'NEG1', 1807, 'robertfulton.jpg'),
('10', 'James Watt', 'Mesin uap', 'NEG3', 1765, 'JamesWatt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'adm', 'adm\r\n'),
(4, 'ad', 'ad'),
(5, 'admin', '$2y$10$/Iwd1f6JEvcSkpjzJsLUV.pMpF2NnubDRAkh//YTs84JnbFjnVqzu'),
(6, 'amdin', '$2y$10$rdKIJ1gpZZrzLnMkBjbvhedkvCPLTMm7Y6q8zo3hZYez7IBnU2pOa'),
(7, 'nasep', '$2y$10$zXeVkXtigEIgE56dkw370.M2pL9AlHMkKCerGPV9q94.gLPHa3Zlu'),
(8, 'test', '$2y$10$a7pSEdEIqCUNHTRDvGq0Q.ldiS26oBLg/nznhmheb3IM9orB2xmFm'),
(9, 'ma', '$2y$10$VV96G/eB0UeGkjCWPyjvO.0IBT.Rbk2l6oIpIuZQIBTBE/e02O9tu'),
(10, 'user', '$2y$10$IBSYK03StW.2NEKv5JkZQO3AQAqigTaaupVsVOkpF7xa5gLhKmXY.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- Indexes for table `penemu_terkenal`
--
ALTER TABLE `penemu_terkenal`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_negara` (`id_negara`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penemu_terkenal`
--
ALTER TABLE `penemu_terkenal`
  ADD CONSTRAINT `penemu_terkenal_ibfk_1` FOREIGN KEY (`id_negara`) REFERENCES `negara` (`id_negara`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
