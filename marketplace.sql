-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 08:19 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE IF NOT EXISTS `detail_produk` (
  `id_detail_produk` int(11) NOT NULL,
  `status` enum('diterima','ditolak','proses') NOT NULL DEFAULT 'proses',
  `id_tim` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail_produk`, `status`, `id_tim`, `id_produk`) VALUES
(1, 'proses', 51, 1),
(2, 'proses', 52, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tim`
--

CREATE TABLE IF NOT EXISTS `detail_tim` (
  `id_detail_tim` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `posisi_tim` enum('Project Manager','UI/UX Designer','Front End','Back End','Database Analyst') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tim`
--

INSERT INTO `detail_tim` (`id_detail_tim`, `id_tim`, `id_users`, `posisi_tim`) VALUES
(1, 51, 13, 'Project Manager'),
(4, 51, 16, 'UI/UX Designer'),
(9, 52, 13, 'UI/UX Designer'),
(10, 51, 32, 'UI/UX Designer'),
(11, 53, 16, 'Project Manager'),
(12, 53, 13, 'UI/UX Designer');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
  `id_forgot` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id_forgot`, `token`, `id_users`, `created`, `expired`) VALUES
(1, '0f77ea3db64a20b30058c1213ec8fce9', 38, '2018-05-26 14:35:00', '2018-05-26 16:35:00'),
(2, '52745bd854c6511e26e411a73331665a', 38, '2018-05-26 14:36:00', '2018-05-26 16:36:00'),
(3, 'e47878734890f93f13a4880250dfbdcd', 38, '2018-05-26 14:55:00', '2018-05-26 16:55:00'),
(4, '890a66970768027a0eebcbab591fe52b', 38, '2018-05-26 14:56:00', '2018-05-26 16:56:00'),
(5, '3fbc6ca2a47d0bac936b5042da0691be', 38, '2018-05-26 14:59:00', '2018-05-26 16:59:00'),
(6, '348acbac682a1b4dcf5fcb35e8218af8', 38, '2018-05-26 15:06:00', '2018-05-26 17:06:00'),
(7, '8f5a45f51ff13c8d8a477ab1dd00881e', 38, '2018-05-26 15:10:00', '2018-05-26 17:10:00'),
(8, '36a6b62d9b2f361e199f1ea9ab0df6c0', 38, '2018-05-26 15:11:00', '2018-05-26 17:11:00'),
(9, 'bb02a770821f37a3114c1fddd7d3fe83', 38, '2018-05-26 15:12:00', '2018-05-26 17:12:00'),
(10, 'bb02a770821f37a3114c1fddd7d3fe83', 38, '2018-05-26 15:12:00', '2018-05-26 17:12:00'),
(11, '9ba1949953c6f23dc70a8c66c8fcffb9', 38, '2018-05-26 15:13:00', '2018-05-26 17:13:00'),
(12, '9ba1949953c6f23dc70a8c66c8fcffb9', 38, '2018-05-26 15:13:00', '2018-05-26 17:13:00'),
(13, '727d0bc00099414eaf5a42dea8925155', 38, '2018-05-26 15:15:00', '2018-05-26 17:15:00'),
(14, '7deb7dcd4b1dbe49d09523a90994238e', 38, '2018-05-26 15:17:00', '2018-05-26 17:17:00'),
(15, '95dc803d3c88a9b7d44a33286c600185', 38, '2018-05-26 15:18:00', '2018-05-26 17:18:00'),
(16, '7a86f54d702f30d3c8545bed511d2d88', 38, '2018-05-26 15:37:00', '2018-05-26 17:37:00'),
(17, '0933bac12aced98f852453be38a8d46d', 38, '2018-05-26 15:47:00', '2018-05-26 17:47:00'),
(18, '990668ffedfe031709b6d5774d0b298a', 38, '2018-05-26 16:10:00', '2018-05-26 18:10:00'),
(19, '990668ffedfe031709b6d5774d0b298a', 38, '2018-05-26 16:10:00', '2018-05-26 18:10:00'),
(20, 'af58239caed732510db795682f9610e2', 38, '2018-05-26 16:20:00', '2018-05-26 18:20:00'),
(21, 'bd177df1522a62d0baa51d36bd803786', 38, '2018-05-26 16:24:00', '2018-05-26 18:24:00'),
(22, '117da38b01320299a724e2f0b593bc69', 38, '2018-05-26 16:26:00', '2018-05-26 18:26:00'),
(23, '20eec5b7e8c9bff754516c1963676d5e', 38, '2018-05-26 16:27:00', '2018-05-26 18:27:00'),
(24, '07aa71425d978e0b05571a722e9642bb', 38, '2018-05-26 16:29:00', '2018-05-26 18:29:00'),
(25, '7fcf5b43008ca04a668556450c7bb733', 38, '2018-05-26 16:32:00', '2018-05-26 18:32:00'),
(26, '686e29bc9f8c608aba209742dda96885', 38, '2018-05-26 16:42:00', '2018-05-26 18:42:00'),
(27, '3c9f9f4720662b1d1c3c69a440c57565', 38, '2018-05-26 16:45:00', '2018-05-26 18:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_perjanjian`
--

CREATE TABLE IF NOT EXISTS `kategori_perjanjian` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_perjanjian`
--

INSERT INTO `kategori_perjanjian` (`id_kategori`, `nama_kategori`, `status`) VALUES
(1, 'Maintenance', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `status_kategori` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `status_kategori`) VALUES
(1, 'Website', 'aktif'),
(3, 'Mobile Apps', 'aktif'),
(4, 'Game', 'aktif'),
(5, 'AI', 'aktif'),
(6, 'Desktop', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `status_pembelian` enum('selesai','proses') NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `kode_pembelian` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perjanjian`
--

CREATE TABLE IF NOT EXISTS `perjanjian` (
  `id_perjanjian` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file_perjanjian` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(255) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `file_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `link_demo` varchar(255) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `status`, `deskripsi_produk`, `file_produk`, `foto_produk`, `link_demo`, `kode_produk`, `id_users`, `id_kategori`) VALUES
(1, 'sistem ta', 1000000, 'aktif', 'sistem pendaftaran tugas akhir                                                            ', 'ini yaa', '', 'www.instagram.com', '', 4, 3),
(2, 'sistem absensi lab', 2000000, 'aktif', 'sistem absensi lab', 'ini', 'ini', 'www.instragram.com', '', 6, 1),
(14, 'sistem lele', 50000, 'aktif', 'kadnwjfbw', '', 'adminlte3.png', 'www.facebook.com', '', 4, 1),
(15, 'sistem lele', 5000, 'aktif', 'wewwdw', '', 'admin3.png', 'www.facebook.com', '', 4, 1),
(16, 'sistem presensi lab', 1000000, 'aktif', 'bla bla bla', '', NULL, 'www.facebook.com', '', 13, 1);

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
(4, 'super pengelola');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE IF NOT EXISTS `tim` (
  `id_tim` int(11) NOT NULL,
  `nama_tim` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `status_tim` enum('individu','tim') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `nama_tim`, `status`, `status_tim`) VALUES
(51, 'KOMSI 15', 'nonaktif', 'individu'),
(52, 'Hore', 'aktif', 'individu'),
(53, 'KOMSI 15', 'aktif', 'individu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(30) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `no_telpon` varchar(16) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `instansi` varchar(50) DEFAULT NULL,
  `status_users` enum('aktif','nonaktif') NOT NULL DEFAULT 'nonaktif',
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `id_roles`, `jenis_kelamin`, `no_telpon`, `email`, `instansi`, `status_users`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(13, 'Afif Imaduddin', 3, 'Wanita', '08213456789', 'afif@gmail.com', 'UGM', 'aktif', '$2y$10$3BVef0BZKRt6nYu2snM.uuHvXly9IbLgHletB51ZuzeXb3K0341hu', 'index4.png', '2018-05-30 08:45:54', '2018-05-30 08:45:54'),
(14, 'Fadhilah Hera', 2, 'Pria', '0856173813', 'hera@gmail.com', 'UGM', 'nonaktif', '$2y$10$xD2BkpEYssDjWTvhAJBziOBLYNf.3PmXCKqRNOOpUTNXYRWe81mn.', 'index5.png', '2018-05-30 06:46:47', '2018-05-30 06:46:47'),
(15, 'Muhammad Gorby', 2, 'Wanita', '08945638183', 'gorby@gmail.com', 'SV', 'aktif', '$2y$10$6YxnKPOT9MlZo836obELw.SKZx5oCSCs/HAndsJPklP...', 'index13.png', '2018-05-30 08:52:46', '2018-05-30 08:52:46'),
(16, 'Fitriyanti', 3, 'Wanita', '08231646456', 'fitri@gmail.com', 'UGM', 'aktif', '$2y$10$hB5tGnTmyAT.8aFzN91w5eUNuoiV2JWVMf77yryLgkikVfc.vNKum', 'index.png', '2018-05-21 09:55:31', '2018-05-21 09:55:31'),
(25, 'diaz', 2, 'Pria', '0856173813', 'diaz@gmail.com', 'UGM', 'aktif', '$2y$10$AWuvd0nov6rybxXJvxxsuuyapJVRAMyBwSyMQMebpm9YiR9XfXVVm', '', '2018-05-11 13:35:36', '2018-05-11 13:35:36'),
(27, 'superadmin', 4, 'Pria', '08561738132', 'superadmin@gmail.com', 'UGM', 'aktif', '$2y$10$Qs86bQGwyb7lPaBspQA2EOE.O4X38sgizsnAfti02R/tNieA08r2C', '', '2018-05-30 08:50:19', '2018-05-30 08:50:19'),
(28, 'pengelola2', 1, 'Wanita', '0856173813', 'pengelola2@gmail.com', 'UGM', 'nonaktif', '$2y$10$ZyZIzlmfSVuPuKNmLmiV8egIbFljzPFsRu/6nHSzYmKtXZBVInRFi', 'index1.png', '2018-05-30 06:44:37', '2018-05-30 06:44:37'),
(30, 'pengelola1', 1, 'Pria', '08231646456', 'pengelola1@gmail.com', 'UGM', 'aktif', '$2y$10$nc6sGPa7C.4e84EPfofQhuwyliXxw.Sl6dZOoomjjKMdzMCtz5Mju', '', '2018-05-30 06:50:01', '2018-05-30 06:50:01'),
(31, 'klien', 2, 'Wanita', '08231646456', 'klien@gmail.com', 'UGM', 'aktif', '$2y$10$1gkOl2GHP1yfdCiW1OhMbu3qBP0OFVGTl119BEB6KAi.kxpxT8e6u', '', '2018-05-26 05:35:30', '2018-05-26 05:35:30'),
(32, 'rini', 2, 'Wanita', '08231646456', 'rini@gmail.com', 'UGM', 'aktif', '$2y$10$EoNsWk0/beAv89HSeXkT6OuE0UQP7tM1eFAmk5kDDPVlujBNiL2iC', 'index1.png', '2018-05-19 06:34:54', '2018-05-19 06:34:54'),
(36, 'Fadli', 3, 'Pria', '08231646456', 'fadli@gmail.com', 'UGM', 'aktif', '$2y$10$6YxnKPOT9MlZo836obELw.SKZx5oCSCs/HAndsJPklPeZjkY/.fsC', 'index2.png', '2018-05-19 07:10:52', '2018-05-19 07:10:52'),
(37, 'test', 1, 'Pria', '08231646456', 'test@gmail.com', 'UGM', 'aktif', '$2y$10$gPMn4BGGsyR54vSmbQNWA.hvfr/ruzuJff4ZsGVXYi67f6EZAUDnC', 'index.png', '2018-05-28 07:33:57', '2018-05-28 07:33:57'),
(38, 'shafira', 3, 'Pria', '', 'shafirafitrianissa02@gmail.com', '', 'aktif', '$2y$10$MXOSIlTj1MWfLyxXpA/eLOv6IUJtRTyrxPPWjyUw8TnFjEx.pzjgW', NULL, '2018-05-26 09:45:30', '2018-05-26 09:45:30');

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
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id_forgot`);

--
-- Indexes for table `kategori_perjanjian`
--
ALTER TABLE `kategori_perjanjian`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `perjanjian`
--
ALTER TABLE `perjanjian`
  ADD PRIMARY KEY (`id_perjanjian`);

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
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_tim`
--
ALTER TABLE `detail_tim`
  MODIFY `id_detail_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id_forgot` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `kategori_perjanjian`
--
ALTER TABLE `kategori_perjanjian`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perjanjian`
--
ALTER TABLE `perjanjian`
  MODIFY `id_perjanjian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
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
-- Constraints for table `detail_tim`
--
ALTER TABLE `detail_tim`
  ADD CONSTRAINT `detail_tim_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_tim_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

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
