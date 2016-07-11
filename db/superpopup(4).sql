-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2016 at 12:16 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_about`, `deskripsi`, `gambar`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'home2_backup2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner_promo`
--

CREATE TABLE `banner_promo` (
  `id_banner_promo` int(11) NOT NULL,
  `alt_image` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_promo`
--

INSERT INTO `banner_promo` (`id_banner_promo`, `alt_image`, `gambar`) VALUES
(1, 'banner promo superpopup', 'home3_backup3.png');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `gambar` varchar(45) DEFAULT NULL,
  `judul` varchar(45) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `harga`, `deskripsi`) VALUES
(1, 60000, 'harga promo');

-- --------------------------------------------------------

--
-- Table structure for table `how_to_order`
--

CREATE TABLE `how_to_order` (
  `id_how_to_order` int(11) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `ucapan_atas` varchar(255) DEFAULT NULL,
  `ucapan_bawah` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `ornamen_atas` varchar(255) DEFAULT NULL,
  `ornamen_bawah` varchar(255) DEFAULT NULL,
  `ornamen_kiri_1` varchar(255) DEFAULT NULL,
  `ornamen_kiri_2` varchar(255) DEFAULT NULL,
  `ornamen_kiri_3` varchar(255) DEFAULT NULL,
  `ornamen_kanan_1` varchar(255) DEFAULT NULL,
  `ornamen_kanan_2` varchar(255) DEFAULT NULL,
  `ornamen_kanan_3` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tranfer_ke` enum('bni','mandiri') DEFAULT NULL,
  `metode` enum('atm','internet','mobile','tranfer') DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `catatan` text,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(45) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `termcondition`
--

CREATE TABLE `termcondition` (
  `id_termcondition` int(11) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `isi_testimoni` text,
  `status` enum('tampil','sembunyi') DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_pesan` datetime DEFAULT NULL,
  `status` enum('0','1','2','3') DEFAULT NULL,
  `no_resi` varchar(45) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tranfer_ke` enum('bni','mandiri') DEFAULT NULL,
  `alamat_kirim` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_voucher` int(11) DEFAULT NULL,
  `id_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `ucapan_atas` varchar(255) DEFAULT NULL,
  `ucapan_bawah` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `ornamen_atas` varchar(255) DEFAULT NULL,
  `ornamen_bawah` varchar(255) DEFAULT NULL,
  `ornamen_kiri_1` varchar(255) DEFAULT NULL,
  `ornamen_kiri_2` varchar(255) DEFAULT NULL,
  `ornamen_kiri_3` varchar(255) DEFAULT NULL,
  `ornamen_kanan_1` varchar(255) DEFAULT NULL,
  `ornamen_kanan_2` varchar(255) DEFAULT NULL,
  `ornamen_kanan_3` varchar(255) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `alamat`, `no_hp`, `gambar`, `level`) VALUES
(1, 'admin', 'admin', 'admin@superpopup.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, 'admin'),
(3, 'rega cahya gumilang', 'regacg', 'rega.blank@gmail.com', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, NULL, 'member'),
(4, 'rega', 'regaa', 'rega@gmail.comm', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, NULL, 'member'),
(5, 'rega', '1002', 'rega@mail.com', '39444744eb44843a6804d37ea223b3e1', NULL, NULL, NULL, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `status` enum('aktif','non-aktif') DEFAULT NULL,
  `persen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `banner_promo`
--
ALTER TABLE `banner_promo`
  ADD PRIMARY KEY (`id_banner_promo`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `how_to_order`
--
ALTER TABLE `how_to_order`
  ADD PRIMARY KEY (`id_how_to_order`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_keranjang_user1_idx` (`id_user`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `fk_konfirmasi_transaksi1_idx` (`id_transaksi`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `termcondition`
--
ALTER TABLE `termcondition`
  ADD PRIMARY KEY (`id_termcondition`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `fk_testimoni_user1_idx` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi_user_idx` (`id_user`),
  ADD KEY `fk_transaksi_voucher1_idx` (`id_voucher`),
  ADD KEY `fk_transaksi_kota1_idx` (`id_kota`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`),
  ADD KEY `fk_transaksi_detail_transaksi2_idx` (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner_promo`
--
ALTER TABLE `banner_promo`
  MODIFY `id_banner_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `how_to_order`
--
ALTER TABLE `how_to_order`
  MODIFY `id_how_to_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `termcondition`
--
ALTER TABLE `termcondition`
  MODIFY `id_termcondition` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `fk_konfirmasi_transaksi1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `fk_testimoni_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_kota1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_voucher1` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id_voucher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_transaksi_detail_transaksi2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
