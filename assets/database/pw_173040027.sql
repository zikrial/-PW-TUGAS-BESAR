-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 06:31 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `penemu_terkenal`
--

CREATE TABLE `penemu_terkenal` (
  `nomor` int(11) NOT NULL,
  `penemu` varchar(40) NOT NULL,
  `temuan` varchar(30) DEFAULT NULL,
  `asal_negara` varchar(30) DEFAULT NULL,
  `tahun_ditemukan` int(11) DEFAULT NULL,
  `gambar_penemu` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penemu_terkenal`
--

INSERT INTO `penemu_terkenal` (`nomor`, `penemu`, `temuan`, `asal_negara`, `tahun_ditemukan`, `gambar_penemu`) VALUES
(1, 'Galileo Galilei', 'Termometer', 'Italia', 1593, 'GalileoGalilei.jpg'),
(2, 'Guglielmo Marconi', 'Radio', 'Italia', 1895, 'GuglielmoMarconi.jpg'),
(3, 'J. Lagie Baird', 'Televisi', 'Inggris', 1920, 'J.LagieBaird.jpg'),
(4, 'Samuel F.B. Morse', 'Telegrap', 'Amerika Serikat', 1837, 'SamuelMorse.jpg'),
(5, 'Alexander Graham Bell', 'Telepon', 'Amerika Serikat', 1876, 'AlexanderGrahamBell.jpg'),
(6, 'Michael Faraday', 'Dinamo', 'Inggris', 1831, 'MichaelFaraday.jpg'),
(7, 'Wilbur dan Wright', 'Pesawat terbang', 'Amerika Serikat', 1903, 'OliverdanWilbur.jpg'),
(8, 'Thomas Alfa Edison', 'Bola lampu', 'Amerika Serikat', 1868, 'thomasalvaedison.jpg'),
(9, 'Robert Fulton', 'Kapal api', 'Amerika Serikat', 1807, 'robertfulton.jpg'),
(10, 'James Watt', 'Mesin uap', 'Inggris', 1765, 'JamesWatt.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penemu_terkenal`
--
ALTER TABLE `penemu_terkenal`
  ADD PRIMARY KEY (`nomor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
