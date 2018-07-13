-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 10:40 AM
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
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rekening`, `nama_pemilik`) VALUES
(1, 'BRI', '99883847561', 'Shafira Fi'),
(2, 'BCA', '3882700125', 'Shafira Fitrianissa');

-- --------------------------------------------------------

--
-- Table structure for table `detail_anggota`
--

CREATE TABLE IF NOT EXISTS `detail_anggota` (
  `id_detail` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `ktm` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_anggota`
--

INSERT INTO `detail_anggota` (`id_detail`, `id_users`, `ktm`, `created_at`, `updated_at`) VALUES
(1, 45, 'ktm.jpg', '2018-07-02 07:59:53', NULL),
(2, 49, 'ktm1.jpg', '2018-07-02 10:14:56', NULL),
(3, 50, 'ktm2.jpg', '2018-07-02 10:31:27', NULL),
(4, 58, 'ktm7.jpg', '2018-07-11 10:05:46', NULL),
(5, 59, 'ktm8.jpg', '2018-07-12 07:18:43', NULL),
(6, 60, 'ktm9.jpg', '2018-07-12 07:20:04', NULL),
(7, 61, 'ktm10.jpg', '2018-07-12 07:27:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_produk`, `qty`) VALUES
(1, 26, 45, 1),
(2, 27, 44, 1),
(3, 28, 45, 1),
(4, 29, 45, 1),
(5, 30, 46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE IF NOT EXISTS `detail_produk` (
  `id_detail_produk` int(11) NOT NULL,
  `status` enum('diterima','ditolak','proses') NOT NULL DEFAULT 'proses',
  `id_tim` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail_produk`, `status`, `id_tim`, `id_produk`) VALUES
(1, 'ditolak', 51, 1),
(2, 'proses', 52, 2),
(3, 'proses', 55, 1),
(4, 'proses', 55, 1),
(5, 'proses', 53, 1),
(6, 'proses', 53, 38),
(7, 'proses', 53, 39),
(8, 'ditolak', 53, 40),
(9, 'ditolak', 53, 41),
(10, 'ditolak', 57, 42),
(11, 'proses', 70, 44),
(12, 'diterima', 54, 45),
(13, 'proses', 71, 46),
(14, 'proses', 71, 47),
(15, 'proses', 71, 48),
(16, 'proses', 71, 49),
(17, 'proses', 71, 50),
(18, 'proses', 71, 51),
(19, 'proses', 71, 47),
(20, 'proses', 71, 48);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tim`
--

CREATE TABLE IF NOT EXISTS `detail_tim` (
  `id_detail_tim` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tim`
--

INSERT INTO `detail_tim` (`id_detail_tim`, `id_tim`, `id_users`, `id_posisi`) VALUES
(11, 53, 16, 5),
(32, 70, 60, 1),
(33, 71, 61, 1),
(34, 54, 61, 1),
(35, 54, 60, 2),
(36, 54, 16, 5),
(37, 54, 36, 4),
(38, 54, 58, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
(27, '3c9f9f4720662b1d1c3c69a440c57565', 38, '2018-05-26 16:45:00', '2018-05-26 18:45:00'),
(28, 'c1c336441d6c4fd9220f7c3e118cb2ee', 42, '2018-06-05 16:13:00', '2018-06-05 18:13:00'),
(29, '2752866b016037a6f58f141d7885e36e', 50, '2018-07-05 19:16:00', '2018-07-05 21:16:00'),
(30, 'ee0c3c76b09b6fca26c5c9478e6831c4', 50, '2018-07-10 20:30:00', '2018-07-10 22:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_perjanjian`
--

CREATE TABLE IF NOT EXISTS `kategori_perjanjian` (
  `id_kategori` int(11) NOT NULL,
  `nama_perjanjian` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_perjanjian`
--

INSERT INTO `kategori_perjanjian` (`id_kategori`, `nama_perjanjian`, `status`) VALUES
(1, 'Beli Lepas', 'aktif'),
(2, 'Trial', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status_kategori` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `kode_jenis` char(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `status_kategori`, `kode_jenis`) VALUES
(1, 'Website', 'aktif', 'WB'),
(3, 'Mobile Apps', 'aktif', 'MA'),
(4, 'Game', 'aktif', 'GM'),
(5, 'AI', 'aktif', 'AI'),
(6, 'Desktop', 'aktif', 'DK');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `status_pembelian` enum('selesai','proses') NOT NULL DEFAULT 'proses',
  `bukti_pembayaran` varchar(255) NOT NULL,
  `kode_pembelian` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_pembelian`, `status_pembelian`, `bukti_pembayaran`, `kode_pembelian`, `total`, `id_users`, `timestamp`) VALUES
(20, '2018-06-24', 'selesai', '', 'GM-Y2HAK0', 2147483647, 14, '2018-07-05 06:59:17'),
(21, '2018-06-25', 'selesai', '', 'WB-H1XHL9', 100000, 14, '2018-07-05 06:59:22'),
(22, '2018-06-25', 'selesai', '', 'WB-DMVR7U', 19383838, 14, '2018-07-05 06:59:28'),
(23, '2018-06-25', 'selesai', '', 'WB-VDRLKG', 183475627, 14, '2018-07-05 06:59:35'),
(24, '2018-06-25', 'selesai', '161127012658-google-maps-dump-tower-large-169.jpg', 'AI-IWEJLD', 183485627, 14, '2018-06-27 11:19:39'),
(25, '2018-06-27', 'selesai', '161127012658-google-maps-dump-tower-large-1691.jpg', 'WB-HX6FFX', 500000, 14, '2018-07-05 16:45:51'),
(26, '2018-07-13', 'proses', '', 'WB-H6IMTI', 30000000, 14, '2018-07-13 05:34:56'),
(27, '2018-07-13', 'proses', '', 'WB-9S3A72', 20000000, 14, '2018-07-13 07:00:53'),
(28, '2018-07-13', 'proses', '', 'WB-BPLWFY', 30000000, 14, '2018-07-13 07:01:16'),
(29, '2018-07-13', 'proses', '', 'WB-HNZLKS', 30000000, 14, '2018-07-13 07:03:52'),
(30, '2018-07-13', 'proses', '', 'BY-PYLGJ2', 40000000, 14, '2018-07-13 07:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `perjanjian`
--

CREATE TABLE IF NOT EXISTS `perjanjian` (
  `id_perjanjian` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file_perjanjian` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `status_perjanjian` enum('proses','selesai') NOT NULL DEFAULT 'proses',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perjanjian`
--

INSERT INTO `perjanjian` (`id_perjanjian`, `keterangan`, `file_perjanjian`, `id_kategori`, `id_pembelian`, `status_perjanjian`, `created_at`) VALUES
(1, 'sertakan maintenance', '386086_20172_uts__20180521134015.pdf', 1, 26, 'proses', '2018-07-02 07:45:24'),
(2, 'dengan maintenance', '386086_20172_uts__20180517140630.pdf', 1, 27, 'proses', '2018-07-02 07:56:36'),
(3, 'jabdjabdj', '', 1, 28, 'proses', '2018-07-02 09:58:06'),
(4, 'mabdjabj', '', 1, 29, 'proses', '2018-07-02 10:01:02'),
(5, 'abfja', 'perjanjian.pdf', 1, 30, 'proses', '2018-07-02 14:31:47'),
(6, 'qewrw', 'perjanjian1.pdf', 1, 31, 'proses', '2018-07-05 07:33:36'),
(7, 'sffe', '', 1, 32, 'proses', '2018-07-02 14:42:47'),
(8, 'dgtjyy', '', 1, 33, 'proses', '2018-07-03 03:42:15'),
(9, 'dengan maintenance', 'perjanjian2.pdf', 1, 37, 'proses', '2018-07-11 07:05:44'),
(10, 'jihjbjubj', '', 1, 38, 'proses', '2018-07-11 09:27:53'),
(11, 'o', '', 1, 39, 'proses', '2018-07-11 09:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `posisi_tim`
--

CREATE TABLE IF NOT EXISTS `posisi_tim` (
  `id_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(255) NOT NULL,
  `status_posisi` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi_tim`
--

INSERT INTO `posisi_tim` (`id_posisi`, `nama_posisi`, `status_posisi`) VALUES
(1, 'Project Manager', 'aktif'),
(2, 'UI/UX Designer', 'aktif'),
(3, 'Front End Developer', 'aktif'),
(4, 'Back End Developer', 'aktif'),
(5, 'Database Analyst', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'nonaktif',
  `deskripsi_produk` text NOT NULL,
  `file_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `link_demo` varchar(255) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `status`, `deskripsi_produk`, `file_produk`, `foto_produk`, `link_demo`, `kode_produk`, `id_users`, `id_kategori`) VALUES
(40, 'Sistem Toefl Terbaru', 1000000, 'nonaktif', 'Sistem Toelf                                                                                                                                            ', 'produk1530361838.zip', '8__halaman_admin.PNG', 'https://toefl.com', '', 54, 1),
(41, 'sistem presensi kehadiran', 20000002, 'nonaktif', 'sistem presensi kehadiran', 'produk1530518960.zip', 'produk1530518960.PNG', 'www.facebook.com', '', 54, 1),
(42, 'Sistem homecare', 10000000, 'nonaktif', 'Sistem homecare berbasis web', 'produk1530808234.zip', 'produk1530808234.PNG', 'http://melihatdunia.com/2017/10/31/forgot-password-php-ci/', '', 13, 1),
(44, 'Sistem English Test', 20000000, 'aktif', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris accumsan non lorem at elementum. Mauris volutpat felis nisl, at vestibulum lorem ullamcorper ut. Curabitur in quam sodales justo cursus vulputate eu ut eros. Ut feugiat nulla non lacinia fri', '', 'produk1531380158.JPG', 'http://english.vokasidev.com/', '', 60, 1),
(45, 'Sistem Informasi Pendaftaran Pondok Pesantren', 30000000, 'aktif', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris accumsan non lorem at elementum. Mauris volutpat felis nisl, at vestibulum lorem ullamcorper ut. Curabitur in quam sodales justo cursus vulputate eu ut eros. Ut feugiat nulla non lacinia fringilla. Morbi dictum metus eget ornare tempor. Proin imperdiet malesuada scelerisque. Proin quam quam, elementum ac enim sed, dictum efficitur justo. Vestibulum vulputate erat mattis quam commodo iaculis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque vitae erat nulla.\r\n\r\nNullam finibus nunc massa, sed iaculis lectus placerat sit amet. Fusce euismod, massa ut elementum commodo, eros felis pretium metus, quis consequat felis leo in turpis. Sed eget nunc at ante dapibus finibus eu sit amet nisl. Fusce varius arcu ac ligula viverra iaculis. Fusce mattis accumsan ornare. Aliquam quis maximus augue. Ut a gravida lacus, fermentum ullamcorper odio. Suspendisse et ipsum eget ligula dictum lacinia nec in tellus. Nam facilisis, dui vitae imperdiet imperdiet, libero dui accumsan eros, sit amet pulvinar odio leo et libero. Praesent at ipsum leo. Donec id consequat nisi. Aenean dictum magna a laoreet ultrices.                             ', '', 'produk1531381115.JPG', 'http://ponpes.vokasidev.com/TA/', '', 61, 1),
(46, 'Sistem Presensi dan Penilaian Magang', 40000000, 'aktif', 'Aenean rhoncus, ex vel cursus varius, metus massa vulputate augue, non tempor elit diam nec erat. Sed aliquam mi a leo posuere dapibus vitae et eros. Duis ut posuere libero. Donec blandit dui non quam feugiat, sit amet viverra velit pharetra. Morbi facili                                                        ', '', 'js(1).JPG', 'http://178.128.102.128:8000/login', '', 61, 1),
(47, 'wewrwtw', 100000, 'nonaktif', 'snkgnkwgrerg', 'produk1531469314.zip', 'produk1531469314.JPG', 'www.facebook.com', 'MA-JeKo', 61, 3),
(48, 'wnkfnwkn', 1000000, 'nonaktif', 'sbgreh', 'produk1531469349.zip', 'produk1531469349.JPG', 'www', 'WB-yVYt', 61, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `nama_tim`, `status`, `status_tim`) VALUES
(53, 'KOMSI 15', 'aktif', 'tim'),
(54, 'Ponpes', 'aktif', 'tim'),
(70, 'shafira fitrianissa', 'aktif', 'individu'),
(71, 'afif imaduddin', 'aktif', 'individu');

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
  `validasi` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `id_roles`, `jenis_kelamin`, `no_telpon`, `email`, `instansi`, `status_users`, `password`, `foto`, `validasi`, `created_at`, `updated_at`) VALUES
(14, 'Fadhilah Hera', 2, 'Wanita', '0856173813', 'hera@gmail.com', 'UGM', 'aktif', '$2y$10$xD2BkpEYssDjWTvhAJBziOBLYNf.3PmXCKqRNOOpUTNXYRWe81mn.', 'avatar.png', 1, '2018-07-12 09:27:08', '2018-07-12 09:27:08'),
(15, 'Muhammad Gorby', 2, 'Wanita', '08945638183', 'gorby@gmail.com', 'SV', 'nonaktif', '$2y$10$6YxnKPOT9MlZo836obELw.SKZx5oCSCs/HAndsJPklP...', 'index13.png', 0, '2018-07-11 10:24:21', '2018-07-11 10:24:21'),
(16, 'Fitriyanti', 3, 'Wanita', '08231646456', 'fitri@gmail.com', 'UGM', 'aktif', '$2y$10$hB5tGnTmyAT.8aFzN91w5eUNuoiV2JWVMf77yryLgkikVfc.vNKum', 'index.png', 0, '2018-07-11 10:16:40', '2018-07-11 10:16:40'),
(27, 'superadmin', 4, 'Pria', '08561738132', 'superadmin@gmail.com', 'UGM', 'aktif', '$2y$10$Qs86bQGwyb7lPaBspQA2EOE.O4X38sgizsnAfti02R/tNieA08r2C', 'avatar.png', 1, '2018-07-11 09:25:54', '2018-07-11 09:25:54'),
(36, 'Fadli', 3, 'Pria', '08231646456', 'fadli@gmail.com', 'UGM', 'aktif', '$2y$10$6YxnKPOT9MlZo836obELw.SKZx5oCSCs/HAndsJPklPeZjkY/.fsC', 'index2.png', 0, '2018-07-01 09:51:58', NULL),
(46, 'Pengelola', 1, 'Pria', '08231646456', 'pengelola@gmail.com', 'UGM', 'aktif', '$2y$10$KEio6/68TsLGH1qsbGC21eqaK6MBRuLN0sK73t2j3Uq/D61d0ojOq', 'index1.png', 1, '2018-07-11 10:21:33', '2018-07-11 10:21:33'),
(58, 'lutfi', 3, 'Pria', '08231646456', 'lutfi@gmail.com', NULL, 'nonaktif', '$2y$10$p7jyxBPky0T/nKW1vjIt6uQv4pQNCtd4McCgnQmH2wonTQNHCZB.O', 'foto5.jpg', 1, '2018-07-11 10:16:28', '2018-07-11 10:16:28'),
(60, 'shafira fitrianissa', 3, 'Wanita', '08231646456', 'shafirafitrianissa02@gmail.com', 'UGM', 'aktif', '$2y$10$X2Bl60VDXRDIfM/03h3HY.l2vgBJ1BW1vHlSJKshzp.Iar5ateuYC', NULL, 1, '2018-07-12 07:21:39', '2018-07-12 07:21:39'),
(61, 'afif imaduddin', 3, 'Wanita', '082316464561', 'afifimaduddin2104@gmail.com', 'UGM', 'aktif', '$2y$10$QvV1crzOZpenkJjpC8UXRe6Q8dtEzXyYTmZ259c1.8VHwq0eEIlvK', NULL, 1, '2018-07-13 08:39:24', '2018-07-13 08:39:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `detail_anggota`
--
ALTER TABLE `detail_anggota`
  ADD PRIMARY KEY (`id_detail`);

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
-- Indexes for table `posisi_tim`
--
ALTER TABLE `posisi_tim`
  ADD PRIMARY KEY (`id_posisi`);

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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_anggota`
--
ALTER TABLE `detail_anggota`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id_detail_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `detail_tim`
--
ALTER TABLE `detail_tim`
  MODIFY `id_detail_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id_forgot` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `kategori_perjanjian`
--
ALTER TABLE `kategori_perjanjian`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `perjanjian`
--
ALTER TABLE `perjanjian`
  MODIFY `id_perjanjian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `posisi_tim`
--
ALTER TABLE `posisi_tim`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
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
