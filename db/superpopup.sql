-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2016 at 12:59 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superpopup`
--

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nama_penduduk` varchar(25) NOT NULL,
  `nomerkk` int(5) NOT NULL,
  `umur` int(10) NOT NULL,
  `status` int(3) NOT NULL,
  `nik` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama_penduduk`, `nomerkk`, `umur`, `status`, `nik`) VALUES
(3, 'bambang', 1231240, 14, 1, 12345),
(4, 'tono', 235, 14, 2, 123456),
(5, 'toni', 324, 12, 2, 1243),
(6, 'doni', 2352, 11, 2, 1260),
(7, 'bambang', 1231240, 12, 1, 1123),
(8, 'bambang', 213, 15, 2, 123770);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL,
  `gambar` varchar(45) DEFAULT NULL,
  `level` enum('member','admin') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `alamat`, `no_hp`, `gambar`, `level`) VALUES
(1, 'admin', 'admin', 'admin@superpopup.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, 'admin'),
(3, 'rega cahya gumilang', 'regacg', 'rega.blank@gmail.com', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, NULL, 'member'),
(4, 'rega', 'regaa', 'rega@gmail.comm', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, NULL, 'member'),
(5, 'rega', '1002', 'rega@mail.com', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, NULL, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
