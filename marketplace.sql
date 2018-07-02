-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Jul 2018 pada 06.54
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_anggota`
--

CREATE TABLE IF NOT EXISTS `detail_anggota` (
`id_detail` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `ktm` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian` (
`id_detail_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_produk`, `qty`) VALUES
(21, 21, 22, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_produk`
--

CREATE TABLE IF NOT EXISTS `detail_produk` (
`id_detail_produk` int(11) NOT NULL,
  `status` enum('diterima','ditolak','proses') NOT NULL DEFAULT 'proses',
  `id_tim` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail_produk`, `status`, `id_tim`, `id_produk`) VALUES
(1, 'ditolak', 51, 1),
(2, 'diterima', 52, 2),
(3, 'proses', 55, 1),
(4, 'proses', 55, 1),
(5, 'proses', 53, 1),
(6, 'diterima', 53, 38),
(7, 'proses', 53, 39),
(8, 'proses', 53, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tim`
--

CREATE TABLE IF NOT EXISTS `detail_tim` (
`id_detail_tim` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_tim`
--

INSERT INTO `detail_tim` (`id_detail_tim`, `id_tim`, `id_users`, `id_posisi`) VALUES
(1, 51, 13, 1),
(4, 51, 16, 2),
(9, 52, 13, 3),
(10, 51, 32, 4),
(11, 53, 16, 5),
(12, 53, 13, 1),
(13, 52, 36, 3),
(16, 52, 40, 4),
(17, 55, 41, 1),
(18, 56, 38, 1),
(19, 56, 16, 3),
(20, 56, 36, 4),
(21, 57, 38, 2),
(22, 57, 13, 5),
(24, 59, 42, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
`id_forgot` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `forgot_password`
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
(28, 'c1c336441d6c4fd9220f7c3e118cb2ee', 42, '2018-06-05 16:13:00', '2018-06-05 18:13:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_perjanjian`
--

CREATE TABLE IF NOT EXISTS `kategori_perjanjian` (
`id_kategori` int(11) NOT NULL,
  `nama_perjanjian` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_perjanjian`
--

INSERT INTO `kategori_perjanjian` (`id_kategori`, `nama_perjanjian`, `status`) VALUES
(1, 'Beli Lepas', 'aktif'),
(2, 'Trial', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
`id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status_kategori` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `kode_jenis` char(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `status_kategori`, `kode_jenis`) VALUES
(1, 'Website', 'aktif', 'WB'),
(3, 'Mobile Apps', 'aktif', 'MA'),
(4, 'Game', 'aktif', 'GM'),
(5, 'AI', 'aktif', 'AI'),
(6, 'Desktop', 'aktif', 'DK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
`id_pembelian` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `status_pembelian` enum('selesai','proses') NOT NULL DEFAULT 'proses',
  `bukti_pembayaran` varchar(255) NOT NULL,
  `kode_pembelian` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `bank` varchar(10) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_pembelian`, `status_pembelian`, `bukti_pembayaran`, `kode_pembelian`, `total`, `bank`, `nominal`, `id_users`, `timestamp`) VALUES
(20, '2018-06-24', 'proses', '', 'GM-Y2HAK0', 2147483647, NULL, NULL, 14, '2018-06-24 10:37:57'),
(21, '2018-06-25', 'proses', '', 'WB-H1XHL9', 100000, NULL, NULL, 14, '2018-06-25 15:17:55'),
(22, '2018-06-25', 'proses', '', 'WB-DMVR7U', 19383838, NULL, NULL, 14, '2018-06-25 15:22:20'),
(23, '2018-06-25', 'proses', '', 'WB-VDRLKG', 183475627, NULL, NULL, 14, '2018-06-25 15:23:04'),
(24, '2018-06-25', 'selesai', '161127012658-google-maps-dump-tower-large-169.jpg', 'AI-IWEJLD', 183485627, NULL, NULL, 14, '2018-06-27 11:19:39'),
(25, '2018-06-27', 'selesai', '161127012658-google-maps-dump-tower-large-1691.jpg', 'WB-HX6FFX', 500000, NULL, NULL, 14, '2018-06-27 04:11:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perjanjian`
--

CREATE TABLE IF NOT EXISTS `perjanjian` (
`id_perjanjian` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file_perjanjian` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `status_perjanjian` enum('proses','selesai') NOT NULL DEFAULT 'proses',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_tim`
--

CREATE TABLE IF NOT EXISTS `posisi_tim` (
`id_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(255) NOT NULL,
  `status_posisi` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi_tim`
--

INSERT INTO `posisi_tim` (`id_posisi`, `nama_posisi`, `status_posisi`) VALUES
(1, 'Project Manager', 'aktif'),
(2, 'UI/UX Designer', 'aktif'),
(3, 'Front End Developer', 'aktif'),
(4, 'Back End Developer', 'aktif'),
(5, 'Database Analyst', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'nonaktif',
  `deskripsi_produk` varchar(255) NOT NULL,
  `file_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `link_demo` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `status`, `deskripsi_produk`, `file_produk`, `foto_produk`, `link_demo`, `id_users`, `id_kategori`) VALUES
(19, 'sistem presensi kehadiran1', 50000001, 'aktif', 'bla bla                                                                                             ', '', '10__Halaman_Manage_Produk4.PNG', 'www.facebook.com', 13, 1),
(22, 'sistem pkl', 100000, 'aktif', 'bla', '', 'produk1528102020.PNG', 'www.facebook.com', 41, 1),
(38, 'Sistem Afif', 500000, 'aktif', 'kwknwnfn                                                         ', 'CodeIgniter-3_1_8.zip', '161127012658-google-maps-dump-tower-large-169.jpg', 'https://www.facebook.com', 13, 5),
(40, 'Sistem Toefl Terbaru', 1000000, 'aktif', 'Sistem Toelf                                                                                                                ', 'produk1530361838.zip', NULL, 'https://toefl.com', 13, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id_roles` int(11) NOT NULL,
  `nama_roles` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id_roles`, `nama_roles`) VALUES
(1, 'pengelola'),
(2, 'klien'),
(3, 'anggota'),
(4, 'super pengelola');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim`
--

CREATE TABLE IF NOT EXISTS `tim` (
`id_tim` int(11) NOT NULL,
  `nama_tim` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `status_tim` enum('individu','tim') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tim`
--

INSERT INTO `tim` (`id_tim`, `nama_tim`, `status`, `status_tim`) VALUES
(51, 'KOMSI 15', 'nonaktif', 'individu'),
(52, 'Hore', 'nonaktif', 'tim'),
(53, 'KOMSI 15', 'aktif', 'tim'),
(54, 'icon+', 'nonaktif', 'individu'),
(55, 'anggota', 'nonaktif', 'individu'),
(56, 'BCA', 'aktif', 'tim'),
(57, 'LAB SI', 'aktif', 'tim'),
(58, 'HAYO', 'nonaktif', 'individu'),
(59, 'Izul Fanriza', 'aktif', 'individu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `id_roles`, `jenis_kelamin`, `no_telpon`, `email`, `instansi`, `status_users`, `password`, `foto`, `validasi`, `created_at`, `updated_at`) VALUES
(13, 'Afif Imaduddin', 3, 'Pria', '08213456789', 'afif@gmail.com', 'UGM', 'aktif', '$2y$10$xD2BkpEYssDjWTvhAJBziOBLYNf.3PmXCKqRNOOpUTNXYRWe81mn.', 'index.jpg', 1, '2018-07-01 04:43:39', '2018-07-01 04:43:39'),
(14, 'Fadhilah Hera', 2, 'Wanita', '0856173813', 'hera@gmail.com', 'UGM', 'aktif', '$2y$10$xD2BkpEYssDjWTvhAJBziOBLYNf.3PmXCKqRNOOpUTNXYRWe81mn.', 'avatar.png', 1, '2018-07-01 04:43:37', '2018-07-01 04:43:37'),
(15, 'Muhammad Gorby', 2, 'Wanita', '08945638183', 'gorby@gmail.com', 'SV', 'aktif', '$2y$10$6YxnKPOT9MlZo836obELw.SKZx5oCSCs/HAndsJPklP...', 'index13.png', 0, '2018-05-30 08:52:46', '2018-05-30 08:52:46'),
(16, 'Fitriyanti', 3, 'Wanita', '08231646456', 'fitri@gmail.com', 'UGM', 'aktif', '$2y$10$hB5tGnTmyAT.8aFzN91w5eUNuoiV2JWVMf77yryLgkikVfc.vNKum', 'index.png', 0, '2018-07-01 09:51:49', NULL),
(25, 'diaz', 2, 'Pria', '0856173813', 'diaz@gmail.com', 'UGM', 'aktif', '$2y$10$AWuvd0nov6rybxXJvxxsuuyapJVRAMyBwSyMQMebpm9YiR9XfXVVm', '', 0, '2018-05-11 13:35:36', '2018-05-11 13:35:36'),
(27, 'superadmin', 4, 'Pria', '08561738132', 'superadmin@gmail.com', 'UGM', 'aktif', '$2y$10$Qs86bQGwyb7lPaBspQA2EOE.O4X38sgizsnAfti02R/tNieA08r2C', 'avatar.png', 1, '2018-07-01 07:57:31', '2018-07-01 07:57:31'),
(28, 'pengelola2', 1, 'Wanita', '0856173813', 'pengelola2@gmail.com', 'UGM', 'nonaktif', '$2y$10$ZyZIzlmfSVuPuKNmLmiV8egIbFljzPFsRu/6nHSzYmKtXZBVInRFi', 'index1.png', 0, '2018-05-30 06:44:37', '2018-05-30 06:44:37'),
(30, 'pengelola1', 1, 'Pria', '08231646456', 'pengelola1@gmail.com', 'UGM', 'nonaktif', '$2y$10$nc6sGPa7C.4e84EPfofQhuwyliXxw.Sl6dZOoomjjKMdzMCtz5Mju', '', 0, '2018-06-01 16:33:07', '2018-06-01 16:33:07'),
(31, 'klien', 2, 'Wanita', '08231646456', 'klien@gmail.com', 'UGM', 'aktif', '$2y$10$1gkOl2GHP1yfdCiW1OhMbu3qBP0OFVGTl119BEB6KAi.kxpxT8e6u', '', 0, '2018-05-26 05:35:30', '2018-05-26 05:35:30'),
(32, 'rini', 2, 'Wanita', '08231646456', 'rini@gmail.com', 'UGM', 'aktif', '$2y$10$EoNsWk0/beAv89HSeXkT6OuE0UQP7tM1eFAmk5kDDPVlujBNiL2iC', 'index1.png', 0, '2018-05-19 06:34:54', '2018-05-19 06:34:54'),
(36, 'Fadli', 3, 'Pria', '08231646456', 'fadli@gmail.com', 'UGM', 'aktif', '$2y$10$6YxnKPOT9MlZo836obELw.SKZx5oCSCs/HAndsJPklPeZjkY/.fsC', 'index2.png', 0, '2018-07-01 09:51:58', NULL),
(37, 'test', 1, 'Pria', '08231646456', 'test@gmail.com', 'UGM', 'aktif', '$2y$10$gPMn4BGGsyR54vSmbQNWA.hvfr/ruzuJff4ZsGVXYi67f6EZAUDnC', 'index.png', 0, '2018-05-28 07:33:57', '2018-05-28 07:33:57'),
(38, 'shafira', 3, 'Pria', '', 'shafirafitrianissa02@gmail.com', '', 'aktif', '$2y$10$MXOSIlTj1MWfLyxXpA/eLOv6IUJtRTyrxPPWjyUw8TnFjEx.pzjgW', NULL, 0, '2018-07-01 09:50:37', NULL),
(39, 'haha', 2, 'Pria', '08231646456', 'haha@gmail.com', 'UGMs', 'nonaktif', '$2y$10$C.jfJqQil/EKlwSm0oXyVOzwmu4vx68w6ovf2R/1sAZODP0cYLPRC', 'index15.png', 0, '2018-06-01 16:27:14', '2018-06-01 16:27:14'),
(40, 'hihi', 3, 'Wanita', '08231646456', 'hihi@gmail.com', 'UGM', 'nonaktif', '$2y$10$YiGISALX/7MFij2kEYfhDuCuLmkH3RqPfX9a4wR7yQ/qAP7eZ8Fny', 'index5.png', 0, '2018-06-05 04:43:41', '2018-06-05 04:43:41'),
(41, 'anggota', 3, NULL, NULL, 'anggota@gmail.com', NULL, 'aktif', '$2y$10$3w25VdW/fNbhqdraQPmXMuS.wXI1OWTSdVObHumcrjd4R6kmaMIsO', NULL, 0, '2018-06-04 08:40:59', '2018-06-04 08:40:59'),
(42, 'Izul Fanriza', 3, NULL, NULL, 'izulfanrizaizul@gmail.com', NULL, 'aktif', '$2y$10$cJbweBGyn.BDJKMAyFGsseVHg.u.CnjiqOEj5DHGS2egi7S/DpRcy', NULL, 0, '2018-06-05 09:12:50', '2018-06-05 09:12:50'),
(43, 'abdur', 4, NULL, NULL, 'abdurlele@gmail.com', NULL, 'nonaktif', '$2y$10$CsvEJmK5bgaEkr5dMtFh9ObEoNfM7d4YCBgGoLp1LSlPIbDizqM7.', NULL, 0, '2018-06-05 09:16:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_anggota`
--
ALTER TABLE `detail_anggota`
 ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
 ADD PRIMARY KEY (`id_detail_pembelian`), ADD KEY `id_pembelian` (`id_pembelian`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_pembelian_2` (`id_pembelian`), ADD KEY `id_produk_2` (`id_produk`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
 ADD PRIMARY KEY (`id_detail_produk`), ADD KEY `id_team` (`id_tim`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `detail_tim`
--
ALTER TABLE `detail_tim`
 ADD PRIMARY KEY (`id_detail_tim`), ADD KEY `id_tim` (`id_tim`), ADD KEY `id_programmer` (`id_users`), ADD KEY `id_users` (`id_users`), ADD KEY `id_tim_2` (`id_tim`);

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
 ADD PRIMARY KEY (`id_pembelian`), ADD KEY `id_users` (`id_users`);

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
 ADD PRIMARY KEY (`id_users`), ADD KEY `id_roles` (`id_roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_anggota`
--
ALTER TABLE `detail_anggota`
MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
MODIFY `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
MODIFY `id_detail_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `detail_tim`
--
ALTER TABLE `detail_tim`
MODIFY `id_detail_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
MODIFY `id_forgot` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
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
MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `perjanjian`
--
ALTER TABLE `perjanjian`
MODIFY `id_perjanjian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posisi_tim`
--
ALTER TABLE `posisi_tim`
MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_tim`
--
ALTER TABLE `detail_tim`
ADD CONSTRAINT `detail_tim_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detail_tim_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
