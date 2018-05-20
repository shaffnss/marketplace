-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 09:29 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_produk`) VALUES
(1, 1, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
  `id_detail_pemesanan` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_tim`, `id_pemesanan`) VALUES
(3, 51, 1),
(4, 52, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE IF NOT EXISTS `detail_produk` (
  `id_detail_produk` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail_produk`, `id_tim`, `id_produk`) VALUES
(1, 51, 1),
(2, 52, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tim`
--

CREATE TABLE IF NOT EXISTS `detail_tim` (
  `id_detail_tim` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `posisi_tim` enum('Project Manager','UI/UX Designer','Front End','Back End','Database Analyst') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tim`
--

INSERT INTO `detail_tim` (`id_detail_tim`, `id_tim`, `id_users`, `posisi_tim`) VALUES
(2, 51, 4, 'Project Manager'),
(3, 51, 6, 'UI/UX Designer'),
(4, 52, 4, 'Back End');

-- --------------------------------------------------------

--
-- Table structure for table `info_lowongan`
--

CREATE TABLE IF NOT EXISTS `info_lowongan` (
  `id_info_lowongan` int(11) NOT NULL,
  `deskripsi_info_lowongan` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_lowongan`
--

INSERT INTO `info_lowongan` (`id_info_lowongan`, `deskripsi_info_lowongan`, `id_users`) VALUES
(1, 'dibutuhkan PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `status_pembelian` enum('selesai','proses') NOT NULL,
  `total` int(11) NOT NULL,
  `bukti_terima` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `jumlah_pembelian` int(255) NOT NULL,
  `deadline_instalasi` date NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_pembelian`, `status_pembelian`, `total`, `bukti_terima`, `bukti_pembayaran`, `jumlah_pembelian`, `deadline_instalasi`, `id_users`) VALUES
(1, '2018-04-27', 'selesai', 1000000, 'ini', 'ini', 1, '2018-05-24', 2),
(2, '2018-05-01', 'selesai', 1000000, 'ini', 'ini', 2, '2018-05-17', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `judul_pemesanan` varchar(255) NOT NULL,
  `deskripsi_pemesanan` varchar(255) NOT NULL,
  `business_rules` varchar(255) NOT NULL,
  `jenis_produk` enum('Website','Mobile Apps','Game','Artificial Intelegent(AI)') NOT NULL,
  `status` enum('diterima','proses','ditolak','selesai') NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `deadline` date NOT NULL,
  `harga` int(11) NOT NULL,
  `bukti_terima` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` enum('proses','selesai') NOT NULL,
  `progres` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `judul_pemesanan`, `deskripsi_pemesanan`, `business_rules`, `jenis_produk`, `status`, `tgl_pemesanan`, `deadline`, `harga`, `bukti_terima`, `bukti_pembayaran`, `status_pembayaran`, `progres`, `id_users`) VALUES
(1, 'Sistem TA', 'Sistem pendaftaran tugas akhir', 'bla bla bla', 'Website', 'proses', '2018-04-11', '2018-04-26', 5000, 'file', 'file', 'selesai', '70%', 21),
(2, 'sistem hantu', 'abscjhsfbh', 'sjhdjsbdgs', 'Website', 'proses', '2018-04-28', '2018-05-18', 600, 'ini', 'ini', 'selesai', '70%', 31);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(255) NOT NULL,
  `status` enum('tersedia','tidak_tersedia') NOT NULL,
  `jenis_produk` enum('Website','Mobile Apps','Game','Artificial Intelegent(AI)') NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `file_produk` varchar(255) NOT NULL,
  `mockup_produk` varchar(255) DEFAULT NULL,
  `link_demo` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `status`, `jenis_produk`, `deskripsi_produk`, `file_produk`, `mockup_produk`, `link_demo`, `id_users`) VALUES
(1, 'sistem ta', 1000000, 'tersedia', 'Website', 'sistem pendaftaran tugas akhir                                                            ', 'ini yaa', '', 'www.instagram.com', 4),
(2, 'sistem absensi lab', 2000000, 'tersedia', 'Mobile Apps', 'sistem absensi lab', 'ini', 'ini', 'www.instragram.com', 6),
(14, 'sistem lele', 50000, 'tersedia', 'Website', 'kadnwjfbw', '', 'adminlte3.png', 'www.facebook.com', 4),
(15, 'sistem lele', 5000, 'tersedia', 'Mobile Apps', 'wewwdw', '', 'admin3.png', 'www.facebook.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int(11) NOT NULL,
  `nama_roles` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `nama_roles`) VALUES
(1, 'pengelola'),
(2, 'klien'),
(3, 'anggota'),
(4, 'pelamar');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE IF NOT EXISTS `tim` (
  `id_tim` int(11) NOT NULL,
  `nama_tim` varchar(50) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `nama_tim`, `status`) VALUES
(51, 'tim hore', 'aktif'),
(52, 'tim hayo', 'aktif'),
(56, 'team mawur', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(30) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `posisi` enum('Pengelola','Klien','Anggota') NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `no_telpon` varchar(16) NOT NULL,
  `email` varchar(30) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `status_users` enum('aktif','nonaktif') NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `id_roles`, `posisi`, `jenis_kelamin`, `no_telpon`, `email`, `instansi`, `status_users`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'admin ', 1, 'Pengelola', 'Pria', '0987654662', 'admin@gmail.com', 'sv', '', '1234567', '', '2018-05-07 09:08:26', '0000-00-00 00:00:00'),
(2, 'shafira', 2, 'Klien', 'Wanita', '082138657982', 'shafira@gmail.com', 'Sekolah Vokasi', '', '123456', '', '2018-05-07 09:08:26', '0000-00-00 00:00:00'),
(3, 'fitri', 2, 'Klien', 'Wanita', '0821456789', 'fitri@gmail.com', 'UGM', '', '123456', '', '2018-05-07 09:08:26', '0000-00-00 00:00:00'),
(4, 'afif', 3, 'Anggota', 'Pria', '087659321', 'afif@gmail.com', 'Sekolah Vokasi', 'aktif', '$2y$10$fAYVE53h6HeQNVEmwoiuCuwJp2LypPC2P274GQ6n5CgDasaRDX7hK', '', '2018-05-07 09:08:26', '0000-00-00 00:00:00'),
(6, 'fadli', 3, 'Anggota', 'Pria', '0821456789', 'fadli@gmail.com', 'ugm', 'aktif', '123456', '', '2018-05-07 09:08:26', '0000-00-00 00:00:00'),
(7, 'nisa', 4, '', 'Wanita', '0821456789', 'nisa@gmail.com', 'ugm', '', '12345', '', '2018-05-07 09:08:26', '0000-00-00 00:00:00'),
(8, 'apip', 2, 'Pengelola', 'Pria', '0856173813', 'apip@gamil.com', 'sv', 'aktif', '', '', '2018-05-07 09:08:26', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pembelian_2` (`id_pembelian`),
  ADD KEY `id_produk_2` (`id_produk`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail_produk`),
  ADD KEY `id_team` (`id_tim`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_tim`
--
ALTER TABLE `detail_tim`
  ADD PRIMARY KEY (`id_detail_tim`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_programmer` (`id_users`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_tim_2` (`id_tim`);

--
-- Indexes for table `info_lowongan`
--
ALTER TABLE `info_lowongan`
  ADD PRIMARY KEY (`id_info_lowongan`),
  ADD KEY `id_pengelola` (`id_users`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_roles` (`id_roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_tim`
--
ALTER TABLE `detail_tim`
  MODIFY `id_detail_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `info_lowongan`
--
ALTER TABLE `info_lowongan`
  MODIFY `id_info_lowongan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_tim`
--
ALTER TABLE `detail_tim`
  ADD CONSTRAINT `detail_tim_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_tim_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_lowongan`
--
ALTER TABLE `info_lowongan`
  ADD CONSTRAINT `info_lowongan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
