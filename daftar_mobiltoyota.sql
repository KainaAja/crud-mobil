-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 07:06 AM
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
-- Database: `daftar_mobiltoyota`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `ID_MOBIL` int(10) NOT NULL,
  `TYPE_MOBIL` varchar(255) NOT NULL,
  `RATING` decimal(10,1) NOT NULL,
  `HARGA` int(20) NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `FOTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`ID_MOBIL`, `TYPE_MOBIL`, `RATING`, `HARGA`, `DESKRIPSI`, `FOTO`) VALUES
(1, 'Alphard', 10.0, 269800000, 'bagus dan keren', '655c05d715619.png'),
(2, 'avanza', 10.0, 269800000, 'siuuu', '655c075ebc21e.png'),
(3, 'calya', 10.0, 269800000, 'keren sekali', '655c07991d635.png'),
(4, 'dyana', 10.0, 269800000, 'keren sekali', '655c07ce86d3b.png'),
(5, 'raize', 10.0, 269800000, 'bagus dan keren', '655c07e7b17fe.png'),
(6, 'vELLFIRE', 11.0, 200000000, 'bagus', '65618ce26e59b.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`ID_MOBIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `ID_MOBIL` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
