-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2021 at 07:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15993447_db_labook`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('063d2b68127f931c29ccf61300a60878ca4afce264a494a5f2ce46e0a87f64b610d4ff245e100fb5', 1, 1, 'nApp', '[]', 0, '2021-02-02 18:06:30', '2021-02-02 18:06:30', '2021-02-03 18:06:30'),
('0c713b874028548eb9461804f5d3743bb59a133a3acab0d535322f7c59d3a232e27f339a03dc7377', 1, 1, 'nApp', '[]', 0, '2021-02-02 20:19:36', '2021-02-02 20:19:36', '2021-02-03 20:19:36'),
('14a9d259140ca9d2fa87f8625137ff8aa2d9e1d71085121414ce40ed1bdc5ec81deb5cdd3c8515aa', 1, 1, 'nApp', '[]', 0, '2021-02-03 16:15:48', '2021-02-03 16:15:48', '2021-02-04 16:15:48'),
('14d6650e4f92e0223bc8aac4da182a0523a004d29392dc3f56daa3d32fc5b38fdf16c9d39475e145', 3, 1, 'nApp', '[]', 0, '2021-02-16 19:30:09', '2021-02-16 19:30:09', '2021-02-17 19:30:09'),
('17435cd7eba33cd0d458ab795e34f6bc91e6de21873d8a0b6f6f101a5fc229de465e1411d76ca7c7', 2, 1, 'nApp', '[]', 0, '2021-02-02 17:57:05', '2021-02-02 17:57:05', '2021-02-03 17:57:04'),
('19386b6d88c0f0b30eb1d8a806224d97c976f3b810ffe858cf68a29fe483d831da8ffa3238508a21', 9, 1, 'nApp', '[]', 0, '2021-02-18 12:34:54', '2021-02-18 12:34:54', '2021-02-19 12:34:54'),
('1955045830473ddce3e53773639c93c1b7011bcc219bedf1181e1c94651f901fc53b46903c88dc67', 2, 1, 'nApp', '[]', 0, '2021-02-02 20:20:07', '2021-02-02 20:20:07', '2021-02-03 20:20:07'),
('1db5b1c79dca5b82b624a0a71ca2c2c09de3c493d1fde9a58d7740697d1ea7a63399affd079e891a', 3, 1, 'nApp', '[]', 0, '2021-02-16 19:56:37', '2021-02-16 19:56:37', '2021-02-17 19:56:37'),
('1ff077d034eb43379e3b1e04448319b7f0d8b73061ed98e3f561aaf50cc703715787ad50292d9e74', 9, 1, 'nApp', '[]', 0, '2021-02-16 21:18:36', '2021-02-16 21:18:36', '2021-02-17 21:18:36'),
('242c73e160bbd83589c7fe81de1715a4f398942572b3c7526b4ee6fc3dc461064d25755ff4ac95f2', 1, 1, 'nApp', '[]', 0, '2021-02-02 20:01:05', '2021-02-02 20:01:05', '2021-02-03 20:01:05'),
('263c38047ac9f5be0efffe8952f0d12f8bd18da59789fc63d9ca05e254805f2ba1c2837f7cc759b9', 1, 1, 'nApp', '[]', 0, '2021-02-10 18:07:51', '2021-02-10 18:07:51', '2021-02-11 18:07:51'),
('34250a6b7d26f425b086b698580e420b38fd74078af4b643ac851993727b056020c1f8344b5b2f82', 3, 1, 'nApp', '[]', 0, '2021-02-16 21:00:28', '2021-02-16 21:00:28', '2021-02-17 21:00:28'),
('3830ddf6e8da7fc45a64649a4ce2f53c18d86b59961d3a3ab77d15ed8ec9a56ae3f628f2d28a7808', 1, 1, 'nApp', '[]', 0, '2021-02-02 20:18:34', '2021-02-02 20:18:34', '2021-02-03 20:18:34'),
('3992a81e5cd60e7debc5a61d6ee8f1918ee263dc54e28dd9ab056481d134a0d891e2feb4df6425a5', 3, 1, 'nApp', '[]', 0, '2021-02-16 21:04:00', '2021-02-16 21:04:00', '2021-02-17 21:04:00'),
('3c46510bea192697e4ace3f7551b5454cef79cb30fd7cd50f90465d375155ffc63ad4dbf97adf130', 3, 1, 'nApp', '[]', 0, '2021-02-16 20:41:16', '2021-02-16 20:41:16', '2021-02-17 20:41:16'),
('43f7d5a54ff2f2a442242a9d1214970a08d8f9d89ffd1a0d397412fd69cd5ca3c1f87cd638f51aa7', 9, 1, 'nApp', '[]', 0, '2021-02-16 21:01:20', '2021-02-16 21:01:20', '2021-02-17 21:01:20'),
('4681476110d0e03a1d81d11cb2ef822f7ffecdcc59e7272bf90405f20dd4b15abbf7ff30bf8ad51e', 9, 1, 'nApp', '[]', 0, '2021-02-11 03:15:49', '2021-02-11 03:15:49', '2021-02-12 03:15:48'),
('4d60cce747dc88898987f729d7cd41f716feaff297a7878786da33a31cd8453ca3ace6f0b5a34d80', 4, 1, 'nApp', '[]', 0, '2021-02-04 05:33:00', '2021-02-04 05:33:00', '2021-02-05 05:33:00'),
('4d8f9a6d14f515cc908a5ce11db0f3da35ca3aea1f41170c7e368ac6192e2477579a67b4acdd1837', 3, 1, 'nApp', '[]', 0, '2021-02-18 04:17:08', '2021-02-18 04:17:08', '2021-02-19 04:17:08'),
('506234ce28119b0a671cf30f658a340b57c440d7b2ca6bad9e84b172a88d4095e6b2e2aa1f689001', 3, 1, 'nApp', '[]', 0, '2021-02-18 12:53:42', '2021-02-18 12:53:42', '2021-02-19 12:53:42'),
('5fea57692a4cc81bdefc55d5f37ab4971528ac9b5bd34eeb3672950681371ced85acd924320b87ae', 3, 1, 'nApp', '[]', 0, '2021-02-03 16:47:22', '2021-02-03 16:47:22', '2021-02-04 16:47:21'),
('722dea3aa837373c6354f57ce9dbdebc65cee00876be300f3b7d552dd7cf96e06d0b90f6fe7651f0', 2, 1, 'nApp', '[]', 0, '2021-02-03 16:17:21', '2021-02-03 16:17:21', '2021-02-04 16:17:21'),
('99075042f02648eb87040fa90ea4f4af1606ab9a48151326ee4338abe0056e2f9239188341f967e8', 3, 1, 'nApp', '[]', 0, '2021-02-16 20:11:41', '2021-02-16 20:11:41', '2021-02-17 20:11:41'),
('9fa992b01bee1245f4a324ef6e88d5798eb27ce82013365e00419667ef24b5f7face830ada2a4c58', 3, 1, 'nApp', '[]', 0, '2021-02-03 16:47:54', '2021-02-03 16:47:54', '2021-02-04 16:47:54'),
('a09eef540086f1b595fe2ffb73c4dca313cd7f6db58015400a24b52f9b7da21e21adb1e6362db5bf', 1, 1, 'nApp', '[]', 0, '2021-02-04 06:02:55', '2021-02-04 06:02:55', '2021-02-05 06:02:55'),
('a11da84f199a3e61b94c9a1e1e2ea60e34d5c90a6738175489444995d26e8cf7b117948573684c31', 7, 1, 'nApp', '[]', 0, '2021-02-16 21:04:57', '2021-02-16 21:04:57', '2021-02-17 21:04:57'),
('a6e56ff0d2c841f86f88c2ce3fcc600758e77b863413e1bf6eca7d7148309060e97ac34deffbed04', 3, 1, 'nApp', '[]', 0, '2021-02-16 19:53:50', '2021-02-16 19:53:50', '2021-02-17 19:53:50'),
('c42a1a27b62bf499d427a2a06a99d295b2cfddf8eef740b4fda71a027ebb152a234e26cbcf0e6fa0', 9, 1, 'nApp', '[]', 0, '2021-02-10 18:14:04', '2021-02-10 18:14:04', '2021-02-11 18:14:04'),
('d37277e6c485177adac15883ab06ef740fb9b234708affa02d384fd49ed1ed00735a3a8e44ed8632', 3, 1, 'nApp', '[]', 0, '2021-02-16 21:18:04', '2021-02-16 21:18:04', '2021-02-17 21:18:04'),
('e096f3fbc02f71c2760012ae706156751b139d1ecb72a2c015144d9a5b41e4a6a15b073a36284451', 3, 1, 'nApp', '[]', 0, '2021-02-16 21:14:07', '2021-02-16 21:14:07', '2021-02-17 21:14:07'),
('f3656506ae2c1cf522191ce2168d36d4a43f1e6a830b3c72105ce96c105dee9f5248a3f0e50b499a', 1, 1, 'nApp', '[]', 0, '2021-02-02 20:00:08', '2021-02-02 20:00:08', '2021-02-03 20:00:08'),
('f630803e955732fe453dfa8184eabfebfe8d813b41ea1cf46422035b116cab632bac2e7c0c66d2a9', 1, 1, 'nApp', '[]', 0, '2021-02-02 17:50:30', '2021-02-02 17:50:30', '2021-02-03 17:50:30'),
('f8b8c8124a36a15d4afd44f0e572e0e29290762b35a6bfabb81a224b8eda4fdf9c6075122f57e317', 9, 1, 'nApp', '[]', 0, '2021-02-16 21:14:46', '2021-02-16 21:14:46', '2021-02-17 21:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'hoPi2LcDdO6a3Llzz1sAlInyfjTPwsiH8ePbD2ZY', NULL, 'http://localhost', 1, 0, 0, '2021-01-26 16:49:39', '2021-01-26 16:49:39'),
(2, NULL, 'Laravel Password Grant Client', '7fnh6RsZ39D6Oka2F0vW1xUS1CSkRVLHjaaOlgOB', 'users', 'http://localhost', 0, 1, 0, '2021-01-26 16:49:39', '2021-01-26 16:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-26 16:49:39', '2021-01-26 16:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `judul` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isi` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `id_laboratorium`, `judul`, `isi`, `timestamp`) VALUES
(1, 1, 'Diskon Februari', 'Diskon 50% pada bulan Februari untuk semua kalangan', '2021-01-15 00:01:08'),
(2, 2, 'Pelayanan Terbaru', 'Pelayanan lebih ramah dan cepat', '2021-02-12 00:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(255) DEFAULT NULL,
  `id_laboratorium` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`, `id_laboratorium`) VALUES
(1, 'Pengujian/kajian struktur', 1),
(2, 'Pengujian bahan', 1),
(3, 'Pengujian agregat', 2),
(4, 'Pengujian aspal emulsi', 2),
(5, 'Pengujian aspal penetrasi', 2),
(6, 'Pembuatan JMD', 2),
(7, 'Uji coba aspal', 2),
(8, 'Uji lain', 2),
(9, 'Tes lapangan', 3),
(10, 'Tes laboratorium', 3),
(11, 'Mobilisasi dan demobilisasi denpasar', 3),
(12, 'Mobilisasi dan demobilisasi luar kota', 3),
(13, 'Mobilisasi dan demobilisasi luar pulau', 3),
(14, 'akomodasi', 3),
(15, 'Air kerja', 3),
(16, 'Analisa teknik kecil', 3),
(17, 'Analisa teknik sedang', 3),
(18, 'Analisa teknik besar', 3),
(19, 'Laporan', 3),
(20, 'Hot press', 4),
(21, 'Polessing', 4),
(22, 'Impac', 4),
(23, 'Vikers', 4),
(24, 'Timbangan', 4),
(25, 'UTM Ingstron (logam)', 4),
(26, 'Struktur mikro', 4),
(27, 'Hardness (vikers) mitoyo', 4),
(28, 'Foto SEM', 4),
(29, 'UTM tensilon (composit)', 4),
(30, 'Uji tekan', 4),
(31, 'Uji mesin ayak', 4),
(32, 'Analizer gas', 4),
(33, 'Steren', 4),
(34, 'Uji mesin milling', 4),
(35, 'Uji mesin hydrolic', 4),
(36, 'Uji mesin las TIG', 4),
(37, 'Uji mesin las MIG', 4),
(38, 'Proximate analysis', 5),
(39, 'Ultimate analysis', 5),
(40, 'Bomb kalori', 5),
(41, 'Penggunaan alat untuk internal universitas', 6),
(42, 'Penggunaan alat untuk umum', 6),
(43, 'Pelayanan lainnya', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelola_lab`
--

CREATE TABLE `tb_kelola_lab` (
  `id_kelola_lab` int(11) NOT NULL,
  `id_laboran` int(11) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelola_lab`
--

INSERT INTO `tb_kelola_lab` (`id_kelola_lab`, `id_laboran`, `id_bidang`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laboran`
--

CREATE TABLE `tb_laboran` (
  `id_laboran` int(11) NOT NULL,
  `hak_akses` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laboran`
--

INSERT INTO `tb_laboran` (`id_laboran`, `hak_akses`, `id_user`) VALUES
(1, 'kepala lab', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laboratorium`
--

CREATE TABLE `tb_laboratorium` (
  `id_laboratorium` int(11) NOT NULL,
  `nama_lab` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `foto_lab` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laboratorium`
--

INSERT INTO `tb_laboratorium` (`id_laboratorium`, `nama_lab`, `alamat`, `no_telp`, `foto_lab`) VALUES
(1, 'Laboratorium struktur dan bahan fakultas teknik', 'Jl Jendral Sudirman denpasar', '081235546', 'https://siapbali.000webhostapp.com/php_layanan_lab/images/ekyws7r3ca811cjxaat4.png'),
(2, 'Laboratorium jalan raya fakultas teknik', 'Jl dr goris', '08177629372', 'https://siapbali.000webhostapp.com/php_layanan_lab/images/bfs6q9gv7jjnhh6r2uj1.png'),
(3, 'Laboratorium mekanika tanah fakultas teknik', 'Jl Raya Kampus Unud', '08763893572', 'https://siapbali.000webhostapp.com/php_layanan_lab/images/w29i9a9tzzxzrq721ujf.png'),
(4, 'Laboratorium metalurgi fakultas teknik', 'Jl Jendral Sudirman', '0852987362', 'https://siapbali.000webhostapp.com/php_layanan_lab/images/bi0417trt9h9cmi4ekds.png'),
(5, 'Laboratorium analisa bahan fakultas teknik', 'Jl Raya Kampus Unud', '0361428837', 'https://siapbali.000webhostapp.com/php_layanan_lab/images/ikhuhmtk1a5pugsu4jrm.png'),
(6, 'Laboratorium Hidrolika', 'Jl Raya Kampus Unud', '0361428794', 'https://siapbali.000webhostapp.com/php_layanan_lab/images/ikhuhmtk1a5pugsu4jrm.png'),
(7, 'lab a', 'dalung', '0927397', 'https://siapbali.000webhostapp.com/php_layanan_lab/images/ikhuhmtk1a5pugsu4jrm.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) DEFAULT NULL,
  `unit_satuan` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_layanan`
--

INSERT INTO `tb_layanan` (`id_layanan`, `nama_layanan`, `unit_satuan`, `satuan`, `harga`, `id_bidang`, `keterangan`) VALUES
(1, 'SEM tanpa coating', NULL, 'sampel', 300000, 2, 'per sampel'),
(2, 'SEM dengan coating', NULL, 'sampel', 450000, 2, 'per sampel'),
(3, 'kajian kelayakan struktur tanpa perkuatan', NULL, 'per m kuadrat', 20000, 1, 'per m kuadrat'),
(4, 'ayakan', NULL, 'sampel', 125000, 3, 'per sampel');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `id_layanan` int(11) DEFAULT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `keterangan` int(11) DEFAULT NULL COMMENT '1=menunggu konfirmasi, 2=diterima, 3=ditolak',
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_peminjam`, `id_layanan`, `tgl_order`, `tgl_pinjam`, `tgl_selesai`, `jumlah`, `satuan`, `harga`, `total_harga`, `file`, `keterangan`, `alasan`) VALUES
(1, 1, 1, '2020-11-27 00:00:00', '2020-11-27', '2020-11-27', 3, 'sampel', 20000, 60000, 'abcdef', 2, NULL),
(2, 1, 1, '2020-11-27 00:00:00', '2020-11-28', '2020-11-28', 2, 'sampel', 20000, 40000, 'ghijklm', 2, NULL),
(3, 1, 1, '2020-11-27 00:00:00', '2020-11-27', '2020-11-28', 1, 'sampel', 20000, 20000, 'abcdef', 3, NULL),
(4, 2, 3, '2020-11-27 00:00:00', '2020-11-27', '2020-11-28', 3, 'per m kuadrat', 20000, 60000, 'ghtyij', 2, NULL),
(5, 1, 2, '2020-12-02 00:00:00', '2020-12-03', '2020-12-04', 2, 'sampel', 450000, 900000, 'abcde', 3, NULL),
(6, 9, 2, '2020-12-04 00:00:00', '2020-12-07', '2020-12-08', 3, 'sampel', 450000, 1350000, 'abcd', 3, NULL),
(7, 9, 3, '2020-12-23 00:00:00', '2020-12-23', '2020-12-24', 20, 'per m kuadrat', 20000, 400000, 'abc', 1, NULL),
(9, 9, 2, '2021-02-12 00:03:57', '2021-02-12', '2021-02-13', 3, 'sampel', 50000, 125000, 'abc', 3, 'file belum lengkap'),
(10, 9, 3, '2021-02-12 01:41:27', '2021-02-15', '2021-02-16', 2, 'per m kuadrat', 20000, 40000, 'abc', 2, NULL),
(11, 9, 1, '2021-02-15 07:58:00', '2021-02-16', '2021-02-17', 3, 'sampel', 300000, 900000, 'abc', 3, 'file belum lengkap'),
(12, 9, 2, '2021-02-18 12:48:37', '2021-02-20', '2021-02-21', 3, 'sampel', 450000, 1350000, 'abc', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hak_akses` enum('1','2') DEFAULT NULL COMMENT '1=peminjam, 2=laboran',
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `alamat`, `no_hp`, `jenis_kelamin`, `username`, `password`, `hak_akses`, `email`) VALUES
(1, 'sonia', 'jl Raya Padang Luwih no 145', '08113957007', 'perempuan', 'sonia', '123', '1', NULL),
(2, 'ayu gina', 'jl raya semer no 145', '0811234567', 'perempuan', 'ayu', '123', '1', NULL),
(3, 'alit', 'jl kebo iwa', '0874962966', 'laki-laki', 'alit', '123', '1', NULL),
(4, 'kapi', 'jl raya dalung', '0812535889', 'laki-laki', 'kapi', '123', '2', NULL),
(5, 'ditha', 'jl kebo iwa utara', '08123584917', 'perempuan', 'ditha', '123', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hak_akses` int(11) DEFAULT NULL COMMENT '1=peminjam,2=laboran,3=admin',
  `foto_user` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `alamat`, `no_hp`, `hak_akses`, `foto_user`, `created_at`, `updated_at`) VALUES
(1, 'sonia', 'soniaginasari@gmail.com', NULL, '$2y$10$beHWmNfO2AlszVV.DbpKI.VcQVsDCN7DEEOt7UxvXIjIyA9Y1uZoi', NULL, NULL, NULL, NULL, NULL, '2021-02-02 17:50:30', '2021-02-02 17:50:30'),
(2, 'ayu sonia', 'soniaginasari68@gmail.com', NULL, '$2y$10$/kXY/0IpJuMeltxYJcBw/.LFdiZ9aR21FBc6FPY6V.Ps352d0x9..', NULL, NULL, NULL, NULL, NULL, '2021-02-02 17:57:05', '2021-02-02 17:57:05'),
(3, 'budi', 'budi@gmail.com', NULL, '$2y$10$8o01Moiencl0gCA/Ea7Yku.yFccMSMdPlRCO2UB.7ELNKGP5zy2K.', NULL, 'jl gatsu barat', '08562348493', 2, 'https://siapbali.000webhostapp.com/php_layanan_lab/images/3x4.jpg', '2021-02-03 16:47:22', '2021-02-03 16:47:22'),
(4, 'gina', 'soniaginasari77@gmail.com', NULL, '$2y$10$YYOPpsM.7GO9rAyaI6dkPOecJ0KySzDxpscx6ioFifAn37SJnxFQ6', NULL, 'jl raya padang luwih', '08113957007', 1, NULL, '2021-02-04 05:33:00', '2021-02-04 05:33:00'),
(5, 'ginasari', 'soniaginasari67@gmail.com', NULL, '$2y$10$h2pdtzOqATOt3ERqcVNOUuvjy1uFEq1Sb9G1DkqtpnjVRjWeqvb..', NULL, 'jl raya padang luwih', '08113957007', 1, NULL, '2021-02-04 05:37:18', '2021-02-04 05:37:18'),
(7, 'sonia gina', 'soniaginasari20@gmail.com', NULL, '$2y$10$75k/Ce29HRyrSO03CT.r1eHEoZl84W5XZ9RZXmZrFlryiIwqIlLHi', NULL, 'gatsu barat', '123', 1, NULL, '2021-02-04 05:44:48', '2021-02-04 05:44:48'),
(9, 'sonia ginasari', 'soniaginasari18@gmail.com', NULL, '$2y$10$lf7/G2HYOjmdC8EZa2Ew4euK/qUrS5LvY1atfQH5oq1McJh.Fq7ey', NULL, 'gatsu barat', '123', 1, 'https://siapbali.000webhostapp.com/php_layanan_lab/images/3x4.jpg', '2021-02-04 05:51:38', '2021-02-04 05:51:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_laboratorium` (`id_laboratorium`);

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`),
  ADD KEY `id_laboratorium` (`id_laboratorium`);

--
-- Indexes for table `tb_kelola_lab`
--
ALTER TABLE `tb_kelola_lab`
  ADD PRIMARY KEY (`id_kelola_lab`),
  ADD KEY `id_laboran` (`id_laboran`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `tb_laboran`
--
ALTER TABLE `tb_laboran`
  ADD PRIMARY KEY (`id_laboran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_laboratorium`
--
ALTER TABLE `tb_laboratorium`
  ADD PRIMARY KEY (`id_laboratorium`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_peminjam` (`id_peminjam`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_kelola_lab`
--
ALTER TABLE `tb_kelola_lab`
  MODIFY `id_kelola_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_laboran`
--
ALTER TABLE `tb_laboran`
  MODIFY `id_laboran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_laboratorium`
--
ALTER TABLE `tb_laboratorium`
  MODIFY `id_laboratorium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`id_laboratorium`) REFERENCES `tb_laboratorium` (`id_laboratorium`);

--
-- Constraints for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD CONSTRAINT `tb_bidang_ibfk_1` FOREIGN KEY (`id_laboratorium`) REFERENCES `tb_laboratorium` (`id_laboratorium`);

--
-- Constraints for table `tb_kelola_lab`
--
ALTER TABLE `tb_kelola_lab`
  ADD CONSTRAINT `tb_kelola_lab_ibfk_1` FOREIGN KEY (`id_laboran`) REFERENCES `tb_laboran` (`id_laboran`),
  ADD CONSTRAINT `tb_kelola_lab_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`);

--
-- Constraints for table `tb_laboran`
--
ALTER TABLE `tb_laboran`
  ADD CONSTRAINT `tb_laboran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD CONSTRAINT `tb_layanan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`);

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `tb_layanan` (`id_layanan`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_3` FOREIGN KEY (`id_peminjam`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
