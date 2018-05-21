-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 05:36 AM
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
  `status` enum('diterima','ditolak') NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail_produk`, `status`, `id_tim`, `id_produk`) VALUES
(1, 'diterima', 51, 1),
(2, 'diterima', 52, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tim`
--

CREATE TABLE IF NOT EXISTS `detail_tim` (
  `id_detail_tim` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `posisi_tim` enum('Project Manager','UI/UX Designer','Front End','Back End','Database Analyst') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tim`
--

INSERT INTO `detail_tim` (`id_detail_tim`, `id_tim`, `id_users`, `posisi_tim`) VALUES
(1, 51, 13, 'Project Manager'),
(4, 51, 16, 'UI/UX Designer'),
(9, 52, 13, 'UI/UX Designer'),
(10, 51, 32, 'UI/UX Designer');

-- --------------------------------------------------------

--
-- Table structure for table `info_lowongan`
--

CREATE TABLE IF NOT EXISTS `info_lowongan` (
  `id_info_lowongan` int(11) NOT NULL,
  `deskripsi_info_lowongan` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `status_kategori` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `status_kategori`) VALUES
(1, 'Website', 'nonaktif'),
(3, 'Mobile Apps', 'aktif'),
(4, 'Game', 'aktif');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `deskripsi_produk` varchar(255) NOT NULL,
  `file_produk` varchar(255) NOT NULL,
  `mockup_produk` varchar(255) DEFAULT NULL,
  `link_demo` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `status`, `deskripsi_produk`, `file_produk`, `mockup_produk`, `link_demo`, `id_users`, `id_kategori`) VALUES
(1, 'sistem ta', 1000000, 'tersedia', 'sistem pendaftaran tugas akhir                                                            ', 'ini yaa', '', 'www.instagram.com', 4, 0),
(2, 'sistem absensi lab', 2000000, 'tersedia', 'sistem absensi lab', 'ini', 'ini', 'www.instragram.com', 6, 0),
(14, 'sistem lele', 50000, 'tersedia', 'kadnwjfbw', '', 'adminlte3.png', 'www.facebook.com', 4, 0),
(15, 'sistem lele', 5000, 'tersedia', 'wewwdw', '', 'admin3.png', 'www.facebook.com', 4, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `nama_tim`, `status`, `status_tim`) VALUES
(51, 'KOMSI 15', 'nonaktif', 'individu'),
(52, 'Hore', 'aktif', 'individu');

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
  `posisi` enum('mahasiswa','alumni','klien','pengelola','superpengelola') NOT NULL DEFAULT 'klien',
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `id_roles`, `jenis_kelamin`, `no_telpon`, `email`, `instansi`, `status_users`, `posisi`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(13, 'Afif Imaduddin', 3, 'Wanita', '08213456789', 'afif@gmail.com', 'UGM', 'aktif', 'alumni', '$2y$10$xD2BkpEYssDjWTvhAJBziOBLYNf.3PmXCKqRNOOpUTNXYRWe81mn.', 'index.jpg', '2018-05-19 06:34:29', '2018-05-19 06:34:29'),
(14, 'Fadhilah Hera', 2, 'Wanita', '0856173813', 'hera@gmail.com', 'UGM', 'aktif', 'klien', '$2y$10$xD2BkpEYssDjWTvhAJBziOBLYNf.3PmXCKqRNOOpUTNXYRWe81mn.', 'index5.png', '2018-05-19 06:06:34', '2018-05-19 06:06:34'),
(15, 'Muhammad Gorby', 2, 'Pria', '08945638183', 'gorby@gmail.com', 'SV', 'aktif', 'klien', '$2y$10$xD2BkpEYssDjWTvhAJBziOBLYNf.3PmXCKqRNOOpUTNXYRWe81mn.', 'index6.png', '2018-05-19 06:07:12', '2018-05-19 06:07:12'),
(16, 'Fitriyanti', 3, 'Wanita', '08231646456', 'fitri@gmail.com', 'UGM', 'aktif', 'mahasiswa', '$2y$10$s/wPro8T83wCfcpMXTnEbu1KKDRD.q2zMlbzzXQoOVqxMJfJdV2Yq', 'index.png', '2018-05-19 06:34:38', '2018-05-19 06:34:38'),
(25, 'diaz', 2, 'Pria', '0856173813', 'diaz@gmail.com', 'UGM', 'aktif', 'klien', '$2y$10$AWuvd0nov6rybxXJvxxsuuyapJVRAMyBwSyMQMebpm9YiR9XfXVVm', '', '2018-05-11 13:35:36', '2018-05-11 13:35:36'),
(27, 'superadmin', 4, 'Pria', '0856173813', 'superadmin@gmail.com', 'UGM', 'aktif', 'superpengelola', '$2y$10$TNSeOmYZrNXchkyBD7FZhuQz/Kg98g4pROwTs8zAtTXZaEg5iyNUC', '', '2018-05-12 07:35:22', '2018-05-12 07:35:22'),
(28, 'pengelola2', 1, 'Wanita', '0856173813', 'pengelola2@gmail.com', 'UGM', 'aktif', 'pengelola', '$2y$10$ZyZIzlmfSVuPuKNmLmiV8egIbFljzPFsRu/6nHSzYmKtXZBVInRFi', 'index1.png', '2018-05-19 07:51:49', '2018-05-19 07:51:49'),
(30, 'pengelola1', 1, 'Pria', '08231646456', 'pengelola1@gmail.com', 'UGM', 'aktif', 'pengelola', '$2y$10$k/d/rq/obzxyrG6PN9o93OH1dh5jYdlphRc.kP3nlidO0WuZnOmm6', '', '2018-05-12 07:31:56', NULL),
(31, 'klien', 2, 'Wanita', '08231646456', 'klien@gmail.com', 'UGM', 'aktif', 'klien', '$2y$10$EkBLVelC07hd5QDOqkzsZeoz0KbLfCMNgiFyYjjwaaOmoh.0NKg2K', '', '2018-05-12 07:46:51', NULL),
(32, 'rini', 2, 'Wanita', '08231646456', 'rini@gmail.com', 'UGM', 'aktif', 'alumni', '$2y$10$EoNsWk0/beAv89HSeXkT6OuE0UQP7tM1eFAmk5kDDPVlujBNiL2iC', 'index1.png', '2018-05-19 06:34:54', '2018-05-19 06:34:54'),
(36, 'Fadli', 3, 'Pria', '08231646456', 'fadli@gmail.com', 'UGM', 'aktif', 'alumni', '$2y$10$6YxnKPOT9MlZo836obELw.SKZx5oCSCs/HAndsJPklPeZjkY/.fsC', 'index2.png', '2018-05-19 07:10:52', '2018-05-19 07:10:52'),
(37, 'test', 1, 'Pria', '08231646456', 'test@gmail.com', 'UGM', 'nonaktif', 'pengelola', '$2y$10$gPMn4BGGsyR54vSmbQNWA.hvfr/ruzuJff4ZsGVXYi67f6EZAUDnC', 'index.png', '2018-05-19 07:48:01', NULL);

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
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_tim`
--
ALTER TABLE `detail_tim`
  MODIFY `id_detail_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `info_lowongan`
--
ALTER TABLE `info_lowongan`
  MODIFY `id_info_lowongan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
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
