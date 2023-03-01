-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 06:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train_beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `penerima_beasiswa`
--

CREATE TABLE `penerima_beasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `usia` int(3) NOT NULL,
  `pekerjaan_ortu` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `nilai_raport` varchar(10) NOT NULL,
  `terima_beasiswa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerima_beasiswa`
--

INSERT INTO `penerima_beasiswa` (`id`, `nama`, `usia`, `pekerjaan_ortu`, `status`, `nilai_raport`, `terima_beasiswa`) VALUES
(1, 'richard', 15, 'pns', 'piatu', 'sedang', 'ya'),
(14, 'tepen', 15, 'wiraswasta', 'lengkap', 'tinggi', 'ya'),
(19, 'adeline', 15, 'pns', 'lengkap', 'tinggi', 'tidak'),
(21, 'susanto', 16, 'pedagang', 'lengkap', 'rendah', 'tidak'),
(26, 'agus', 12, 'pedagang', 'yatim', 'tinggi', 'ya'),
(27, 'fahmi', 14, 'petani', 'lengkap', 'tinggi', 'ya'),
(28, 'adit', 13, 'wiraswasta', 'lengkap', 'sedang', 'tidak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
