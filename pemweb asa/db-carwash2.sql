-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 04:33 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-carwash2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbpaketcuci`
--

CREATE TABLE `tbpaketcuci` (
  `idpaket` int(11) NOT NULL,
  `namapaket` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpaketcuci`
--

INSERT INTO `tbpaketcuci` (`idpaket`, `namapaket`, `deskripsi`, `harga`) VALUES
(1, 'Cuci mobil kecil', 'Agya,Ayla,Jazz,Swift', 40000),
(2, 'Cuci mobil sedang', 'CRV,HRV,Mobilio,Civic', 45000),
(3, 'Cuci mobil besar', 'Fortuner,Pajero,Rubicorn', 50000),
(4, 'Cuci mobil sangat besar', 'Alphard,Lexus,Vellfire\r\n                                                                                                                                                  ', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpaketcuci` int(11) NOT NULL,
  `namapakettambahan` varchar(100) NOT NULL,
  `totalharga` int(50) NOT NULL,
  `pembayaran` int(50) NOT NULL,
  `kembalian` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `tgltransaksi`, `iduser`, `idpaketcuci`, `namapakettambahan`, `totalharga`, `pembayaran`, `kembalian`) VALUES
(1, '0000-00-00', 1, 1, 'Fogging', 60000, 70000, 10000),
(2, '2022-03-19', 1, 1, 'Fogging', 60000, 100000, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `username`, `password`) VALUES
(1, 'asa', 'asa'),
(2, 'asa', 'asa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbpaketcuci`
--
ALTER TABLE `tbpaketcuci`
  ADD PRIMARY KEY (`idpaket`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idpaketcuci` (`idpaketcuci`),
  ADD KEY `iduser_2` (`iduser`,`idpaketcuci`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbpaketcuci`
--
ALTER TABLE `tbpaketcuci`
  MODIFY `idpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD CONSTRAINT `tbtransaksi_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tbuser` (`iduser`),
  ADD CONSTRAINT `tbtransaksi_ibfk_2` FOREIGN KEY (`idpaketcuci`) REFERENCES `tbpaketcuci` (`idpaket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
