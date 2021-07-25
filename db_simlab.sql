-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2021 pada 08.30
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simlab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_logs`
--

CREATE TABLE `berita_logs` (
  `id` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'nilai terbesar adalah data terbaru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_logs`
--

CREATE TABLE `bidang_logs` (
  `id` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bidang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'nilai terbesar adalah data terbaru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `laboran_logs`
--

CREATE TABLE `laboran_logs` (
  `id` int(11) NOT NULL,
  `id_laboran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'nilai terbesar adalah data terbaru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laboratorium_logs`
--

CREATE TABLE `laboratorium_logs` (
  `id` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lab` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_lab` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'nilai terbesar adalah data terbaru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_logs`
--

CREATE TABLE `layanan_logs` (
  `id` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_layanan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'nilai terbesar adalah data terbaru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_03_29_131949_create_notifications_table', 2),
(10, '2021_04_23_100306_create_laboratorium_logs_table', 3),
(11, '2021_04_23_100358_create_bidang_logs_table', 3),
(12, '2021_04_23_100440_create_layanan_logs_table', 3),
(13, '2021_04_23_100455_create_berita_logs_table', 3),
(14, '2021_04_23_100528_create_laboran_logs_table', 3),
(15, '2021_04_23_100534_create_user_logs_table', 3),
(16, '2021_06_26_143356_tb_carts', 4),
(17, '2021_06_26_143356_create_tb_carts', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0f42ebdf-b658-4e5d-96e3-ae7855de4920', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Penambahan Bidang Baru\",\"id_bidang\":11,\"nama_bid\":\"Mobilisasi dan demobilisasi denpasar\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-06-20 06:22:10', '2021-04-13 13:21:28', '2021-06-20 06:22:10'),
('25bbbab8-1348-4c5f-99db-07ebb54a1707', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Pembatalan Pengajuan Bidang bidang 1\",\"id_bidang\":\"51\",\"nama_bid\":\"bidang 1\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-06-20 06:22:10', '2021-04-13 13:21:31', '2021-06-20 06:22:10'),
('2c84bb59-f621-48a4-ac2b-ca9a84c5c072', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Pembatalan Pengajuan Bidang uji coba 13\",\"id_bidang\":\"44\",\"nama_bid\":\"uji coba 13\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-04-13 05:44:31', '2021-04-13 13:21:33', '2021-04-13 05:44:31'),
('2d1aaa6c-f072-4eb3-9811-7f204f9e3b76', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Pembatalan Pengajuan Bidang uji coba 2\",\"id_bidang\":\"50\",\"nama_bid\":\"uji coba 2\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-04-13 05:30:32', '2021-04-05 07:29:28', '2021-04-13 05:30:32'),
('2f5f1ec2-1ed1-43ed-a335-7fd41a0e5b9d', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Penambahan Layanan Pada Bidang Pengujian bahan\",\"id_bidang\":\"2\",\"nama_bid\":\"Pengujian bahan\",\"id_lab\":1,\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"layanan\"}', '2021-04-13 05:30:32', '2021-04-05 07:24:06', '2021-04-13 05:30:32'),
('3c1d8a22-1c4a-4588-916e-7f7f5e98219e', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Penambahan Layanan\",\"id_bidang\":\"2\",\"nama_bid\":\"Pengujian bahan\",\"id_lab\":1,\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"layanan\"}', '2021-04-05 07:24:19', '2021-04-05 07:21:51', '2021-04-05 07:24:19'),
('44c30f56-e7df-4822-8c9d-edccece08a7b', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Pembaharuan Layanan Pada Bidang Pengujian bahan\",\"id_bidang\":\"2\",\"nama_bid\":\"Pengujian bahan\",\"id_lab\":1,\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"layanan\"}', '2021-04-10 02:32:03', '2021-04-05 07:26:49', '2021-04-10 02:32:03'),
('56010375-8014-4256-89a0-9c63bb2b570c', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Penambahan Layanan\",\"id_bidang\":\"2\",\"nama_bid\":\"Pengujian bahan\",\"id_lab\":1,\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"layanan\"}', '2021-04-05 07:24:19', '2021-04-05 07:22:37', '2021-04-05 07:24:19'),
('a5fdddd2-7828-450b-a1ba-dc4decc96b07', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Penambahan Bidang Baru\",\"id_bidang\":11,\"nama_bid\":\"Mobilisasi dan demobilisasi denpasar\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-06-20 06:22:10', '2021-05-24 04:54:32', '2021-06-20 06:22:10'),
('b1835508-49e5-44a0-96dd-6c30ab462731', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Pembatalan Pengajuan Bidang bidang 1\",\"id_bidang\":\"52\",\"nama_bid\":\"bidang 1\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-04-10 02:32:40', '2021-04-10 02:32:27', '2021-04-10 02:32:40'),
('b27541fe-2ce9-4295-97e5-1c882d05029a', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Pembatalan Pengajuan Bidang uji coba 13\",\"id_bidang\":\"44\",\"nama_bid\":\"uji coba 13\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-04-10 02:32:03', '2021-04-05 07:30:14', '2021-04-10 02:32:03'),
('e5c4eae0-73b9-46b7-ae21-2d0b6983657f', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Pembatalan Pengajuan Bidang\",\"id_bidang\":\"73\",\"nama_bid\":\"3\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-04-05 07:24:19', '2021-04-05 07:17:51', '2021-04-05 07:24:19'),
('ea713889-e95b-4bb9-90c7-e2e685d46c0d', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Penambahan Layanan Pada Bidang Pengujian bahan\",\"id_bidang\":\"2\",\"nama_bid\":\"Pengujian bahan\",\"id_lab\":1,\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"layanan\"}', '2021-04-10 02:33:32', '2021-04-10 02:33:20', '2021-04-10 02:33:32'),
('ea73cb49-d3ce-4372-b962-97c2586e5536', 'App\\Notifications\\TeknisiNotification', 'App\\User', 10, '{\"pesan\":\"Teknisi teknisi Mengajukan Pembaharuan Bidang 3\",\"id_bidang\":\"73\",\"nama_bid\":\"3\",\"id_lab\":\"1\",\"nama_lab\":\"Laboratorium struktur dan bahan fakultas teknik\",\"tipe\":\"bidang\"}', '2021-04-05 07:17:41', '2021-04-05 07:17:25', '2021-04-05 07:17:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
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
-- Dumping data untuk tabel `oauth_access_tokens`
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
('21627f90765ce20decaf0fb584e20d6b567ef4aa6afc667935f6e1f4d16b4100218c780add38f427', 9, 1, 'nApp', '[]', 0, '2021-02-23 21:47:53', '2021-02-23 21:47:53', '2021-02-24 21:47:53'),
('242c73e160bbd83589c7fe81de1715a4f398942572b3c7526b4ee6fc3dc461064d25755ff4ac95f2', 1, 1, 'nApp', '[]', 0, '2021-02-02 20:01:05', '2021-02-02 20:01:05', '2021-02-03 20:01:05'),
('263c38047ac9f5be0efffe8952f0d12f8bd18da59789fc63d9ca05e254805f2ba1c2837f7cc759b9', 1, 1, 'nApp', '[]', 0, '2021-02-10 18:07:51', '2021-02-10 18:07:51', '2021-02-11 18:07:51'),
('2e24991ab1aaa243fed506c1e7d1bfa2f95ab97b45cca59fe3ab8235bdff4d04c57da699ef1c0b93', 3, 1, 'nApp', '[]', 0, '2021-02-24 02:25:21', '2021-02-24 02:25:21', '2021-02-25 02:25:21'),
('305871c678fe2325feb283fc046c62b7479c54c17b2385b32fc3210444d0bccec8e67b9c82a41a3a', 9, 1, 'nApp', '[]', 0, '2021-02-23 21:43:36', '2021-02-23 21:43:36', '2021-02-24 21:43:36'),
('34250a6b7d26f425b086b698580e420b38fd74078af4b643ac851993727b056020c1f8344b5b2f82', 3, 1, 'nApp', '[]', 0, '2021-02-16 21:00:28', '2021-02-16 21:00:28', '2021-02-17 21:00:28'),
('342834adb661d98b6e26fbf38fa7995e6ba7ced2c812f1db8b27a61e65f9dedeaabbc558af819d40', 3, 1, 'nApp', '[]', 0, '2021-03-09 11:59:58', '2021-03-09 11:59:58', '2021-03-10 11:59:58'),
('345685d7b87d39a130ad98845e1c929b80be52a12888206e16914305de2b061dea9004afb56c10ee', 9, 1, 'nApp', '[]', 0, '2021-02-27 10:19:58', '2021-02-27 10:19:58', '2021-02-28 10:19:57'),
('34f0a9f3a494b0f9a82a30d4168b4cc001dade94cfca96a53ad49bb86897eefbac486afcf2c9cb6f', 9, 1, 'nApp', '[]', 0, '2021-03-09 13:03:54', '2021-03-09 13:03:54', '2021-03-10 13:03:54'),
('36d456bf2958a138fa9f059bed1f5c3cf6ea5067f1f77b644bd6af1dffd5bdfa794efd66d55c0078', 3, 1, 'nApp', '[]', 0, '2021-02-27 07:13:45', '2021-02-27 07:13:45', '2021-02-28 07:13:45'),
('3830ddf6e8da7fc45a64649a4ce2f53c18d86b59961d3a3ab77d15ed8ec9a56ae3f628f2d28a7808', 1, 1, 'nApp', '[]', 0, '2021-02-02 20:18:34', '2021-02-02 20:18:34', '2021-02-03 20:18:34'),
('3992a81e5cd60e7debc5a61d6ee8f1918ee263dc54e28dd9ab056481d134a0d891e2feb4df6425a5', 3, 1, 'nApp', '[]', 0, '2021-02-16 21:04:00', '2021-02-16 21:04:00', '2021-02-17 21:04:00'),
('3c46510bea192697e4ace3f7551b5454cef79cb30fd7cd50f90465d375155ffc63ad4dbf97adf130', 3, 1, 'nApp', '[]', 0, '2021-02-16 20:41:16', '2021-02-16 20:41:16', '2021-02-17 20:41:16'),
('4036e8f92f74f406c5d8430f1c9260d2eb2c5064c4ad8e4b066fdd29122b69c91ad2dfc741214934', 9, 1, 'nApp', '[]', 0, '2021-02-24 02:26:30', '2021-02-24 02:26:30', '2021-02-25 02:26:29'),
('43f7d5a54ff2f2a442242a9d1214970a08d8f9d89ffd1a0d397412fd69cd5ca3c1f87cd638f51aa7', 9, 1, 'nApp', '[]', 0, '2021-02-16 21:01:20', '2021-02-16 21:01:20', '2021-02-17 21:01:20'),
('444a155960c80ee282a427c50c2b7c3f40749021015ccd17a7116a59242099f34108d88437b7d27c', 9, 1, 'nApp', '[]', 0, '2021-03-08 06:15:31', '2021-03-08 06:15:31', '2021-03-09 06:15:31'),
('4681476110d0e03a1d81d11cb2ef822f7ffecdcc59e7272bf90405f20dd4b15abbf7ff30bf8ad51e', 9, 1, 'nApp', '[]', 0, '2021-02-11 03:15:49', '2021-02-11 03:15:49', '2021-02-12 03:15:48'),
('49786e0c2eb19c416aa38dd299a4e4d592cfd527d78a9bcf60414476592eebfca5ea8504155c99fe', 9, 1, 'nApp', '[]', 0, '2021-02-23 22:29:24', '2021-02-23 22:29:24', '2021-02-24 22:29:24'),
('4d60cce747dc88898987f729d7cd41f716feaff297a7878786da33a31cd8453ca3ace6f0b5a34d80', 4, 1, 'nApp', '[]', 0, '2021-02-04 05:33:00', '2021-02-04 05:33:00', '2021-02-05 05:33:00'),
('4d8f9a6d14f515cc908a5ce11db0f3da35ca3aea1f41170c7e368ac6192e2477579a67b4acdd1837', 3, 1, 'nApp', '[]', 0, '2021-02-18 04:17:08', '2021-02-18 04:17:08', '2021-02-19 04:17:08'),
('506234ce28119b0a671cf30f658a340b57c440d7b2ca6bad9e84b172a88d4095e6b2e2aa1f689001', 3, 1, 'nApp', '[]', 0, '2021-02-18 12:53:42', '2021-02-18 12:53:42', '2021-02-19 12:53:42'),
('5fea57692a4cc81bdefc55d5f37ab4971528ac9b5bd34eeb3672950681371ced85acd924320b87ae', 3, 1, 'nApp', '[]', 0, '2021-02-03 16:47:22', '2021-02-03 16:47:22', '2021-02-04 16:47:21'),
('634a0197487503b1ea59fa8db74129b172bf32cbdbbcc6776f9f3f5b52b620599cf4259dd2ce3d60', 9, 1, 'nApp', '[]', 0, '2021-02-23 21:49:02', '2021-02-23 21:49:02', '2021-02-24 21:49:02'),
('6fc89070eae2bb244d0c7684e18f9ead8cb1d5320fbbb89e259b7215ba50c53312483402f23eaeac', 9, 1, 'nApp', '[]', 0, '2021-03-10 04:04:26', '2021-03-10 04:04:26', '2021-03-11 04:04:26'),
('722dea3aa837373c6354f57ce9dbdebc65cee00876be300f3b7d552dd7cf96e06d0b90f6fe7651f0', 2, 1, 'nApp', '[]', 0, '2021-02-03 16:17:21', '2021-02-03 16:17:21', '2021-02-04 16:17:21'),
('78ba41907f666e3c4f52964d40a1db1fa679d44a6e5189ebcfb75ff00d03304e7460bece1bc8edf1', 3, 1, 'nApp', '[]', 0, '2021-03-09 13:11:12', '2021-03-09 13:11:12', '2021-03-10 13:11:11'),
('99075042f02648eb87040fa90ea4f4af1606ab9a48151326ee4338abe0056e2f9239188341f967e8', 3, 1, 'nApp', '[]', 0, '2021-02-16 20:11:41', '2021-02-16 20:11:41', '2021-02-17 20:11:41'),
('9d164afb4923ef7de83ccda50bad3ccd0d253648aa9237e313cf05d2f1e464f64ddd805d4a6a7ce5', 9, 1, 'nApp', '[]', 0, '2021-02-27 07:41:43', '2021-02-27 07:41:43', '2021-02-28 07:41:43'),
('9fa992b01bee1245f4a324ef6e88d5798eb27ce82013365e00419667ef24b5f7face830ada2a4c58', 3, 1, 'nApp', '[]', 0, '2021-02-03 16:47:54', '2021-02-03 16:47:54', '2021-02-04 16:47:54'),
('a09eef540086f1b595fe2ffb73c4dca313cd7f6db58015400a24b52f9b7da21e21adb1e6362db5bf', 1, 1, 'nApp', '[]', 0, '2021-02-04 06:02:55', '2021-02-04 06:02:55', '2021-02-05 06:02:55'),
('a11da84f199a3e61b94c9a1e1e2ea60e34d5c90a6738175489444995d26e8cf7b117948573684c31', 7, 1, 'nApp', '[]', 0, '2021-02-16 21:04:57', '2021-02-16 21:04:57', '2021-02-17 21:04:57'),
('a6e56ff0d2c841f86f88c2ce3fcc600758e77b863413e1bf6eca7d7148309060e97ac34deffbed04', 3, 1, 'nApp', '[]', 0, '2021-02-16 19:53:50', '2021-02-16 19:53:50', '2021-02-17 19:53:50'),
('b336a4acf13953713ee67db661023ab013031b903b90b08c59a4866606490349721e56ebe1a2a8ec', 3, 1, 'nApp', '[]', 0, '2021-03-05 07:05:00', '2021-03-05 07:05:00', '2021-03-06 07:05:00'),
('bbe95d909506442d714d035f58899e6a23ce33a7f964e015cc8bcf5992fc4fe0639025de8a9bdb90', 9, 1, 'nApp', '[]', 0, '2021-03-08 06:26:25', '2021-03-08 06:26:25', '2021-03-09 06:26:25'),
('c42a1a27b62bf499d427a2a06a99d295b2cfddf8eef740b4fda71a027ebb152a234e26cbcf0e6fa0', 9, 1, 'nApp', '[]', 0, '2021-02-10 18:14:04', '2021-02-10 18:14:04', '2021-02-11 18:14:04'),
('c6b3dee6a0d77a8e06e76af0002ea5c1c56a56342180ef7bf1e4ee5accad44e3d2ea0e23becde1c9', 9, 1, 'nApp', '[]', 0, '2021-03-08 20:32:41', '2021-03-08 20:32:41', '2021-03-09 20:32:41'),
('d1b3bea151f2d4ea36392fe2807c68d4512484b160425301d7bfc4e515e8636c37194bee483018be', 3, 1, 'nApp', '[]', 0, '2021-03-05 12:28:29', '2021-03-05 12:28:29', '2021-03-06 12:28:29'),
('d37277e6c485177adac15883ab06ef740fb9b234708affa02d384fd49ed1ed00735a3a8e44ed8632', 3, 1, 'nApp', '[]', 0, '2021-02-16 21:18:04', '2021-02-16 21:18:04', '2021-02-17 21:18:04'),
('ded8533237af72c6a40ebb78de6a6412eb866ae3101aeb5c985673b3d7b3c0ab0d964da6a56bbbd2', 9, 1, 'nApp', '[]', 0, '2021-02-23 20:23:39', '2021-02-23 20:23:39', '2021-02-24 20:23:39'),
('e096f3fbc02f71c2760012ae706156751b139d1ecb72a2c015144d9a5b41e4a6a15b073a36284451', 3, 1, 'nApp', '[]', 0, '2021-02-16 21:14:07', '2021-02-16 21:14:07', '2021-02-17 21:14:07'),
('f2b2f11238cb0a3732a96602b000758b394c202a89f514f6f6c1bfe2dc6095e528f02f973582dbbc', 3, 1, 'nApp', '[]', 0, '2021-03-11 06:08:25', '2021-03-11 06:08:25', '2021-03-12 06:08:24'),
('f3656506ae2c1cf522191ce2168d36d4a43f1e6a830b3c72105ce96c105dee9f5248a3f0e50b499a', 1, 1, 'nApp', '[]', 0, '2021-02-02 20:00:08', '2021-02-02 20:00:08', '2021-02-03 20:00:08'),
('f630803e955732fe453dfa8184eabfebfe8d813b41ea1cf46422035b116cab632bac2e7c0c66d2a9', 1, 1, 'nApp', '[]', 0, '2021-02-02 17:50:30', '2021-02-02 17:50:30', '2021-02-03 17:50:30'),
('f8b8c8124a36a15d4afd44f0e572e0e29290762b35a6bfabb81a224b8eda4fdf9c6075122f57e317', 9, 1, 'nApp', '[]', 0, '2021-02-16 21:14:46', '2021-02-16 21:14:46', '2021-02-17 21:14:46'),
('fe1f255a6dbfab371cdf8328ca5ffd48ba4ee2735d836e210a9c67422c72848c73126230bbb62d40', 9, 1, 'nApp', '[]', 0, '2021-03-05 12:06:30', '2021-03-05 12:06:30', '2021-03-06 12:06:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
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
-- Struktur dari tabel `oauth_clients`
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
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'hoPi2LcDdO6a3Llzz1sAlInyfjTPwsiH8ePbD2ZY', NULL, 'http://localhost', 1, 0, 0, '2021-01-26 16:49:39', '2021-01-26 16:49:39'),
(2, NULL, 'Laravel Password Grant Client', '7fnh6RsZ39D6Oka2F0vW1xUS1CSkRVLHjaaOlgOB', 'users', 'http://localhost', 0, 1, 0, '2021-01-26 16:49:39', '2021-01-26 16:49:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-26 16:49:39', '2021-01-26 16:49:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `judul` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isi` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `id_laboratorium`, `judul`, `isi`, `timestamp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Diskon Februari', 'Diskon 50% pada bulan Februari untuk semua kalangan', '2021-01-15 00:01:08', '2021-06-15 15:27:35', NULL, NULL),
(2, 2, 'Pelayanan Terbaru', 'Pelayanan lebih ramah dan cepat', '2021-02-12 00:48:28', '2021-06-15 15:27:38', NULL, NULL),
(3, 1, 'Last Diskon Februari', 'Diskon 50% pada bulan Februari untuk semua kalangan', '2021-07-17 15:14:15', '2021-07-17 15:14:18', NULL, NULL),
(4, 4, 'Pelayanan', 'Pelayanan lebih ramah\r\n', '2021-07-18 02:42:52', '2021-07-18 02:42:56', NULL, NULL),
(5, 5, 'Terbaru', 'Pelayanan lebih cepat', '2021-07-18 02:42:49', '2021-07-18 02:42:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_laboratorium` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`, `status`, `id_laboratorium`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pengujian/kajian struktur', 1, 1, NULL, '2021-04-05 02:25:23', NULL),
(2, 'Pengujian bahan', 1, 1, NULL, NULL, NULL),
(3, 'Pengujian agregat', 1, 2, NULL, NULL, NULL),
(4, 'Pengujian aspal emulsi', 1, 2, NULL, NULL, NULL),
(5, 'Pengujian aspal penetrasi', 1, 2, NULL, NULL, NULL),
(6, 'Pembuatan JMD', 1, 2, NULL, NULL, NULL),
(7, 'Uji coba aspal', NULL, 2, NULL, NULL, NULL),
(8, 'Uji lain', NULL, 2, NULL, NULL, NULL),
(9, 'Tes lapangan', NULL, 3, NULL, NULL, NULL),
(10, 'Tes laboratorium', NULL, 3, NULL, NULL, NULL),
(11, 'Mobilisasi dan demobilisasi denpasar', NULL, 3, NULL, NULL, NULL),
(12, 'Mobilisasi dan demobilisasi luar kota', NULL, 3, NULL, NULL, NULL),
(13, 'Mobilisasi dan demobilisasi luar pulau', NULL, 3, NULL, NULL, NULL),
(14, 'akomodasi', NULL, 3, NULL, NULL, NULL),
(15, 'Air kerja', NULL, 3, NULL, NULL, NULL),
(16, 'Analisa teknik kecil', NULL, 3, NULL, NULL, NULL),
(17, 'Analisa teknik sedang', NULL, 3, NULL, NULL, NULL),
(18, 'Analisa teknik besar', NULL, 3, NULL, NULL, NULL),
(19, 'Laporan', NULL, 3, NULL, NULL, NULL),
(20, 'Hot press', NULL, 4, NULL, NULL, NULL),
(21, 'Polessing', NULL, 4, NULL, NULL, NULL),
(22, 'Impac', NULL, 4, NULL, NULL, NULL),
(23, 'Vikers', NULL, 4, NULL, NULL, NULL),
(24, 'Timbangan', NULL, 4, NULL, NULL, NULL),
(25, 'UTM Ingstron (logam)', NULL, 4, NULL, NULL, NULL),
(26, 'Struktur mikro', NULL, 4, NULL, NULL, NULL),
(27, 'Hardness (vikers) mitoyo', NULL, 4, NULL, NULL, NULL),
(28, 'Foto SEM', NULL, 4, NULL, NULL, NULL),
(29, 'UTM tensilon (composit)', NULL, 4, NULL, NULL, NULL),
(30, 'Uji tekan', NULL, 4, NULL, NULL, NULL),
(31, 'Uji mesin ayak', NULL, 4, NULL, NULL, NULL),
(32, 'Analizer gas', NULL, 4, NULL, NULL, NULL),
(33, 'Steren', NULL, 4, NULL, NULL, NULL),
(34, 'Uji mesin milling', NULL, 4, NULL, NULL, NULL),
(35, 'Uji mesin hydrolic', NULL, 4, NULL, NULL, NULL),
(36, 'Uji mesin las TIG', NULL, 4, NULL, NULL, NULL),
(37, 'Uji mesin las MIG', NULL, 4, NULL, NULL, NULL),
(38, 'Proximate analysis', NULL, 5, NULL, NULL, NULL),
(39, 'Ultimate analysis', NULL, 5, NULL, NULL, NULL),
(40, 'Bomb kalori', NULL, 5, NULL, NULL, NULL),
(41, 'Penggunaan alat untuk internal universitas', NULL, 6, NULL, NULL, NULL),
(42, 'Penggunaan alat untuk umum', NULL, 6, NULL, NULL, NULL),
(43, 'Pelayanan lainnya', NULL, 6, NULL, NULL, NULL),
(44, 'uji coba 13', 3, 1, '2021-03-29 05:31:50', '2021-04-05 07:30:14', NULL),
(50, 'uji coba 2', 3, 1, '2021-03-29 05:47:07', '2021-04-05 07:29:28', NULL),
(51, 'bidang 1', 3, 1, '2021-03-30 03:46:29', '2021-04-05 07:29:55', NULL),
(52, 'bidang 1', 3, 1, '2021-03-30 03:49:51', '2021-04-10 02:32:27', NULL),
(53, 'bidang 1', 1, 1, '2021-03-30 03:50:34', '2021-04-04 05:38:23', NULL),
(54, 'bidang 1', 0, 1, '2021-03-30 03:54:05', '2021-04-05 07:09:49', NULL),
(55, 'bidang2', 0, 1, '2021-03-30 03:55:34', '2021-04-05 06:57:48', NULL),
(56, 'bidang 1', 0, 1, '2021-03-30 03:56:21', '2021-03-30 04:04:13', NULL),
(57, 'bidang 1', 0, 1, '2021-03-30 03:57:42', '2021-03-30 03:57:42', NULL),
(58, 'bidang 1', 0, 1, '2021-03-30 03:59:09', '2021-03-30 03:59:09', NULL),
(59, 'bidang 1', 0, 1, '2021-03-30 03:59:23', '2021-03-30 03:59:23', NULL),
(60, '123', 0, 1, '2021-03-30 04:03:07', '2021-03-30 04:03:07', NULL),
(61, '123', 0, 1, '2021-03-30 04:19:18', '2021-03-30 04:19:18', NULL),
(62, '123', 0, 1, '2021-03-30 04:20:05', '2021-03-30 04:20:05', NULL),
(63, 'uji coba 2', 0, 1, '2021-04-04 04:06:56', '2021-04-04 04:06:56', NULL),
(64, 'uji coba 2', 0, 1, '2021-04-04 04:13:04', '2021-04-04 04:13:04', NULL),
(65, 'uji coba 2', 0, 1, '2021-04-04 04:19:43', '2021-04-04 04:19:43', NULL),
(66, 'uji coba 2', 0, 1, '2021-04-04 04:20:09', '2021-04-04 04:20:09', NULL),
(67, 'uji coba 3', 0, 1, '2021-04-04 04:20:18', '2021-04-04 04:20:18', NULL),
(68, 'awdaw', NULL, 2, '2021-04-05 02:57:48', '2021-04-05 02:57:48', NULL),
(69, 'uji coba notifikasi', 0, 1, '2021-04-05 05:52:29', '2021-04-05 05:52:29', NULL),
(70, 'uji coba notifikasi', 0, 1, '2021-04-05 05:53:07', '2021-04-05 05:53:07', NULL),
(71, 'uji coba notifikasi', 0, 1, '2021-04-05 05:53:44', '2021-04-05 05:53:44', NULL),
(72, 'uji notifikasi bidang 2', 0, 1, '2021-04-05 05:54:27', '2021-04-05 05:54:27', NULL),
(73, '3', 3, 1, '2021-04-05 07:14:32', '2021-04-05 07:17:51', NULL),
(74, 'bidang baru', 0, 1, '2021-04-10 02:31:35', '2021-04-10 02:31:35', NULL),
(75, 'bidang 1', 2, 1, '2021-05-24 04:54:31', '2021-05-24 04:55:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_carts`
--

CREATE TABLE `tb_carts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `status` enum('disewa','batal','cart') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_carts`
--

INSERT INTO `tb_carts` (`id`, `id_user`, `id_laboratorium`, `status`, `created_at`, `updated_at`) VALUES
(2, 12, 1, 'disewa', '2021-06-29 12:39:04', '2021-07-09 05:43:43'),
(3, 12, 1, 'disewa', '2021-06-29 12:51:29', '2021-07-09 05:43:43'),
(4, 12, 1, 'disewa', '2021-06-29 12:51:45', '2021-07-09 05:43:43'),
(19, 12, 2, 'disewa', '2021-07-09 05:37:38', '2021-07-09 05:43:43'),
(20, 12, 2, 'disewa', '2021-07-09 05:37:49', '2021-07-09 05:43:43'),
(21, 12, 2, 'disewa', '2021-07-09 05:37:54', '2021-07-09 05:43:43'),
(22, 12, 2, 'disewa', '2021-07-09 05:37:59', '2021-07-09 05:43:43'),
(23, 12, 2, 'batal', '2021-07-09 07:00:32', '2021-07-17 12:41:19'),
(24, 12, 2, 'disewa', '2021-07-10 02:42:49', '2021-07-17 13:16:16'),
(25, 12, 1, 'disewa', '2021-07-10 06:05:54', '2021-07-17 13:16:16'),
(26, 12, 1, 'disewa', '2021-07-10 06:05:56', '2021-07-17 13:16:16'),
(27, 12, 2, 'disewa', '2021-07-17 11:37:52', '2021-07-17 13:16:16'),
(28, 12, 1, 'disewa', '2021-07-17 12:39:24', '2021-07-17 13:16:16'),
(29, 12, 2, 'batal', '2021-07-17 13:22:48', '2021-07-17 15:46:50'),
(30, 12, 2, 'cart', '2021-07-17 13:22:50', '2021-07-17 13:22:50'),
(31, 12, 2, 'cart', '2021-07-17 15:46:37', '2021-07-17 15:46:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laboran`
--

CREATE TABLE `tb_laboran` (
  `id_laboran` int(11) NOT NULL,
  `hak_akses` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_laboratorium` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_laboran`
--

INSERT INTO `tb_laboran` (`id_laboran`, `hak_akses`, `id_user`, `id_laboratorium`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kepala lab', 10, 1, '2021-03-27 00:31:34', '2021-03-27 00:31:39', NULL),
(2, 'teknisi', 11, 1, '2021-03-27 00:31:41', '2021-03-27 00:31:43', NULL),
(3, 'teknisi', 9, 1, '2021-03-29 13:46:05', '2021-03-29 13:46:07', NULL),
(4, 'pimpinan', 7, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laboratorium`
--

CREATE TABLE `tb_laboratorium` (
  `id_laboratorium` int(11) NOT NULL,
  `nama_lab` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `foto_lab` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_laboratorium`
--

INSERT INTO `tb_laboratorium` (`id_laboratorium`, `nama_lab`, `alamat`, `no_telp`, `foto_lab`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laboratorium struktur dan bahan fakultas teknik', 'Jl Jendral Sudirman denpasar', '081235546', '1614408417_biznet.png', NULL, NULL, NULL),
(2, 'Laboratorium jalan raya fakultas teknik', 'Jl dr goris', '08177629372', 'Screenshot_4.jpg', NULL, NULL, NULL),
(3, 'Laboratorium mekanika tanah fakultas teknik', 'Jl Raya Kampus Unud', '08763893572', 'JAV81Er9bICL9bwA2KXc.jpg', NULL, NULL, NULL),
(4, 'Laboratorium metalurgi fakultas teknik', 'Jl Jendral Sudirman', '0852987362', 'chemistry-science-laboratories-hd-wallpaper-preview.jpg', NULL, NULL, NULL),
(5, 'Laboratorium analisa bahan fakultas teknik', 'Jl Raya Kampus Unud', '0361428837', 'technology-physics-and-chemistry-chemistry-hd-wallpaper-preview.jpg', NULL, NULL, NULL),
(6, 'Laboratorium Hidrolika', 'Jl Raya Kampus Unud', '0361428794', 'SUQyeT4ypLkyYnwX0RNJ.jpg', NULL, NULL, NULL),
(7, 'lab a', 'dalung', '0927397', 'fmjt9W83FH1zxkGyC8ON.png', NULL, NULL, NULL),
(8, '121212', '121212', '121212', 'JAV81Er9bICL9bwA2KXc.jpg', '2021-04-05 02:57:39', '2021-04-05 02:57:39', NULL),
(9, 'Laboratorium struktur', 'Jl Jendral Sudirman denpasar', '08177629372', '1614408417_biznet.png', NULL, NULL, NULL),
(10, 'bahan fakultas teknik', 'Jl Jendral Sudirman denpasar', '08177629372', '1614408417_biznet.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) DEFAULT NULL,
  `unit_satuan` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_layanan`
--

INSERT INTO `tb_layanan` (`id_layanan`, `nama_layanan`, `unit_satuan`, `satuan`, `harga`, `id_bidang`, `status`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SEM tanpa coating', NULL, 'sampel', 300000, 2, 1, 'per sampel', NULL, NULL, NULL),
(2, 'SEM dengan coating', NULL, 'sampel', 450000, 2, 1, 'per sampel', NULL, NULL, NULL),
(3, 'kajian kelayakan struktur tanpa perkuatan', NULL, 'per m kuadrat', 20000, 1, 1, 'per m kuadrat', NULL, NULL, NULL),
(4, 'ayakan', NULL, 'sampel', 125000, 3, NULL, 'per sampel', NULL, NULL, NULL),
(7, '1234', NULL, '1', 10000, 2, 2, '123', '2021-04-04 05:54:54', '2021-04-05 07:27:57', NULL),
(8, 'awdwadwa', NULL, 'wadwa', 1, 20, NULL, '123', '2021-04-05 02:58:03', '2021-04-05 02:58:03', NULL),
(9, '1', NULL, '1', 1, 2, 3, '1', '2021-04-05 06:43:25', '2021-07-01 07:16:33', '2021-07-01 07:16:33'),
(10, '1', NULL, '1', 1, 2, 0, '1', '2021-04-05 06:44:00', '2021-04-05 06:44:00', NULL),
(11, '1', NULL, '1', 1, 2, 0, '1', '2021-04-05 06:44:54', '2021-04-05 06:44:54', NULL),
(12, '1', NULL, '1', 1, 2, 0, '1', '2021-04-05 06:45:12', '2021-04-05 06:45:12', NULL),
(13, '1', NULL, '1', 1, 2, 0, '1', '2021-04-05 06:45:33', '2021-04-05 06:45:33', NULL),
(14, '2', NULL, '2', 2, 2, 0, '2', '2021-04-05 06:50:24', '2021-04-05 06:50:24', NULL),
(15, '2', NULL, '2', 2, 2, 0, '2', '2021-04-05 06:51:37', '2021-04-05 06:51:37', NULL),
(16, '3', NULL, '3', 3, 2, 0, '3', '2021-04-05 06:54:43', '2021-04-05 06:54:43', NULL),
(17, '123', NULL, '1', 1, 2, 0, '123', '2021-04-05 07:21:51', '2021-04-05 07:21:51', NULL),
(18, '123', NULL, '1', 1, 2, 0, '123', '2021-04-05 07:22:36', '2021-04-05 07:22:36', NULL),
(19, '1234', NULL, '1', 1, 2, 0, '2', '2021-04-05 07:24:06', '2021-04-05 07:24:42', NULL),
(20, 'Layanan Baru', NULL, 'mg', 1000, 2, 0, '1', '2021-04-10 02:33:20', '2021-04-10 02:33:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
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
  `alasan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_peminjam`, `id_layanan`, `tgl_order`, `tgl_pinjam`, `tgl_selesai`, `jumlah`, `satuan`, `harga`, `total_harga`, `file`, `keterangan`, `alasan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2020-11-27 00:00:00', '2020-11-27', '2020-11-27', 3, 'sampel', 20000, 60000, 'abcdef', 2, NULL, NULL, NULL, NULL),
(2, 1, 1, '2020-11-27 00:00:00', '2020-11-28', '2020-11-28', 2, 'sampel', 20000, 40000, 'ghijklm', 2, NULL, NULL, NULL, NULL),
(3, 1, 1, '2020-11-27 00:00:00', '2020-11-27', '2020-11-28', 1, 'sampel', 20000, 20000, 'abcdef', 3, NULL, NULL, NULL, NULL),
(4, 2, 3, '2020-11-27 00:00:00', '2020-11-27', '2020-11-28', 3, 'per m kuadrat', 20000, 60000, 'ghtyij', 2, NULL, NULL, NULL, NULL),
(5, 1, 2, '2020-12-02 00:00:00', '2020-12-03', '2020-12-04', 2, 'sampel', 450000, 900000, 'abcde', 3, NULL, NULL, NULL, NULL),
(6, 9, 2, '2020-12-04 00:00:00', '2020-12-07', '2020-12-08', 3, 'sampel', 450000, 1350000, 'abcd', 3, NULL, NULL, NULL, NULL),
(10, 9, 3, '2021-02-12 01:41:27', '2021-02-15', '2021-02-16', 2, 'per m kuadrat', 20000, 40000, 'abc', 2, NULL, NULL, NULL, NULL),
(11, 9, 1, '2021-02-15 07:58:00', '2021-02-16', '2021-02-17', 3, 'sampel', 300000, 900000, 'abc', 3, 'file belum lengkap', NULL, NULL, NULL),
(13, 9, 3, '2021-02-23 23:11:33', '2021-02-26', '2021-02-27', 2, 'per m kuadrat', 20000, 40000, 'abc', 2, NULL, NULL, NULL, NULL),
(14, 9, 2, '2021-02-27 07:43:21', '2021-02-27', '2021-02-28', 3, 'sampel', 450000, 1350000, '123\n123', 2, NULL, NULL, '2021-07-01 13:22:07', NULL),
(15, 9, 1, '2021-03-03 22:54:00', '2021-03-12', '2021-03-15', 5, 'sampel', 300000, 1500000, 'avc', 1, NULL, NULL, NULL, NULL),
(16, 9, 2, '2021-03-05 12:11:29', '2021-03-11', '2021-03-15', 3, 'sampel', 450000, 1350000, 'Abcdef', 1, NULL, NULL, NULL, NULL),
(17, 12, 2, '2021-07-09 05:43:43', '2021-07-10', NULL, 10, 'sampel', 450000, 4500000, NULL, NULL, NULL, '2021-07-09 05:43:43', '2021-07-09 05:43:43', NULL),
(18, 12, 1, '2021-07-09 05:43:43', '2021-07-23', NULL, 3, 'sampel', 300000, 900000, NULL, NULL, NULL, '2021-07-09 05:43:43', '2021-07-09 05:43:43', NULL),
(19, 12, 3, '2021-07-09 05:43:43', '2021-07-16', NULL, 1, 'per m kuadrat', 20000, 20000, NULL, NULL, NULL, '2021-07-09 05:43:43', '2021-07-09 05:43:43', NULL),
(20, 12, 4, '2021-07-09 05:43:43', '2021-07-10', NULL, 2, 'sampel', 125000, 250000, NULL, NULL, NULL, '2021-07-09 05:43:43', '2021-07-09 05:43:43', NULL),
(21, 12, 4, '2021-07-09 05:43:43', '2021-08-05', NULL, 1, 'sampel', 125000, 125000, NULL, NULL, NULL, '2021-07-09 05:43:43', '2021-07-09 05:43:43', NULL),
(22, 12, 4, '2021-07-09 05:43:43', '2021-08-07', NULL, 1, 'sampel', 125000, 125000, NULL, NULL, NULL, '2021-07-09 05:43:43', '2021-07-09 05:43:43', NULL),
(23, 12, 4, '2021-07-09 05:43:43', '2021-07-23', NULL, 1, 'sampel', 125000, 125000, NULL, NULL, NULL, '2021-07-09 05:43:43', '2021-07-09 05:43:43', NULL),
(24, 12, 1, '2021-07-17 13:16:16', '2021-07-17', NULL, 1, 'sampel', 300000, 300000, NULL, NULL, NULL, '2021-07-17 13:16:16', '2021-07-17 13:16:16', NULL),
(25, 12, 4, '2021-07-17 13:23:01', '2021-07-17', NULL, 1, 'sampel', 125000, 125000, NULL, NULL, NULL, '2021-07-17 13:23:01', '2021-07-17 13:23:01', NULL),
(26, 12, 4, '2021-07-23 09:57:55', '2021-07-23', NULL, 1, 'sampel', 125000, 125000, NULL, NULL, NULL, '2021-07-23 09:57:55', '2021-07-23 09:57:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `alamat`, `no_hp`, `hak_akses`, `foto_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sonia', 'sonia@gmail.com', NULL, '$2y$10$beHWmNfO2AlszVV.DbpKI.VcQVsDCN7DEEOt7UxvXIjIyA9Y1uZoi', NULL, 'dalung', '0812345', NULL, 'def.png', '2021-02-02 17:50:30', '2021-02-02 17:50:30', NULL),
(2, 'ayu sonia', 'soniaginasari68@gmail.com', NULL, '$2y$10$/kXY/0IpJuMeltxYJcBw/.LFdiZ9aR21FBc6FPY6V.Ps352d0x9..', NULL, NULL, NULL, NULL, 'def.png', '2021-02-02 17:57:05', '2021-02-02 17:57:05', NULL),
(3, 'budi', 'budi@gmail.com', NULL, '$2y$10$8o01Moiencl0gCA/Ea7Yku.yFccMSMdPlRCO2UB.7ELNKGP5zy2K.', NULL, 'jl gatsu barat', '08562348493', 2, 'https://siapbali.000webhostapp.com/php_layanan_lab/images/3x4.jpg', '2021-02-03 16:47:22', '2021-02-03 16:47:22', NULL),
(4, 'gina', 'soniaginasari77@gmail.com', NULL, '$2y$10$YYOPpsM.7GO9rAyaI6dkPOecJ0KySzDxpscx6ioFifAn37SJnxFQ6', NULL, 'jl raya padang luwih', '08113957007', 1, NULL, '2021-02-04 05:33:00', '2021-02-04 05:33:00', NULL),
(5, 'ginasari', 'soniaginasari67@gmail.com', NULL, '$2y$10$FuC0QhSf0mIAahQLQNWvW.yhVQLYWEatE6VF5D0F9KnPoUVwzG8rq', NULL, 'jl raya padang luwih', '08113957007', 1, NULL, '2021-02-04 05:37:18', '2021-02-04 05:37:18', NULL),
(7, 'sonia gina', 'admin@admin.com', NULL, '$2y$10$FuC0QhSf0mIAahQLQNWvW.yhVQLYWEatE6VF5D0F9KnPoUVwzG8rq', NULL, 'gatsu barat', '123', 2, NULL, '2021-02-04 05:44:48', '2021-02-04 05:44:48', NULL),
(9, 'sonia ginasari', 'soniaginasari18@gmail.com', NULL, '$2y$10$FuC0QhSf0mIAahQLQNWvW.yhVQLYWEatE6VF5D0F9KnPoUVwzG8rq', NULL, 'kuta utara', '08113957008', 2, 'https://siapbali.000webhostapp.com/php_layanan_lab/images/3x4.jpg', '2021-02-04 05:51:38', '2021-02-04 05:51:38', NULL),
(10, 'kepalalab1', 'kepalalab1@admin.com', NULL, '$2y$10$FuC0QhSf0mIAahQLQNWvW.yhVQLYWEatE6VF5D0F9KnPoUVwzG8rq', NULL, 'kuta utara', '08113957008', 2, NULL, '2021-03-12 09:51:23', '2021-03-12 09:51:25', NULL),
(11, 'teknisi', 'teknisi@admin.com', NULL, '$2y$10$FuC0QhSf0mIAahQLQNWvW.yhVQLYWEatE6VF5D0F9KnPoUVwzG8rq', NULL, 'kuta utara', '08113957008', 2, 'def.png', '2021-03-27 00:30:29', '2021-03-27 00:30:33', NULL),
(12, 'I KADEK DWIYATNA PRIYOGA', 'ikdyp@gmail.com', NULL, '$2y$10$L6P.Q4wNht8ghWDH85fyKeqqoYi3uf7FDPAs6qV3uL/uRRc5FFUo6', NULL, NULL, '08113957008', 1, 'def.png', '2021-06-18 09:04:09', '2021-06-18 09:04:09', NULL),
(13, 'I KADEK DWIYATNA PRIYOGA', 'kadek@gmail.com', NULL, '$2y$10$DRoqtkfQMPbab19ZWzH1IOVH2xY.s/1Hpuguld1NCwccCCh1dlrxO', NULL, NULL, '08113957008', NULL, 'def.png', '2021-06-19 05:32:52', '2021-06-19 05:32:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `id_user_data` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'nilai terbesar adalah data terbaru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita_logs`
--
ALTER TABLE `berita_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_logs_id_user_foreign` (`id_user`),
  ADD KEY `berita_logs_id_berita_foreign` (`id_berita`);

--
-- Indeks untuk tabel `bidang_logs`
--
ALTER TABLE `bidang_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidang_logs_id_user_foreign` (`id_user`),
  ADD KEY `bidang_logs_id_bidang_foreign` (`id_bidang`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laboran_logs`
--
ALTER TABLE `laboran_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboran_logs_id_user_foreign` (`id_user`),
  ADD KEY `laboran_logs_id_laboran_foreign` (`id_laboran`);

--
-- Indeks untuk tabel `laboratorium_logs`
--
ALTER TABLE `laboratorium_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratorium_logs_id_user_foreign` (`id_user`),
  ADD KEY `laboratorium_logs_id_laboratorium_foreign` (`id_laboratorium`);

--
-- Indeks untuk tabel `layanan_logs`
--
ALTER TABLE `layanan_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_logs_id_user_foreign` (`id_user`),
  ADD KEY `layanan_logs_id_layanan_foreign` (`id_layanan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_laboratorium` (`id_laboratorium`);

--
-- Indeks untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`),
  ADD KEY `id_laboratorium` (`id_laboratorium`);

--
-- Indeks untuk tabel `tb_carts`
--
ALTER TABLE `tb_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_carts_id_user_foreign` (`id_user`),
  ADD KEY `tb_carts_id_laboratorium_foreign` (`id_laboratorium`);

--
-- Indeks untuk tabel `tb_laboran`
--
ALTER TABLE `tb_laboran`
  ADD PRIMARY KEY (`id_laboran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_laboratorium` (`id_laboratorium`);

--
-- Indeks untuk tabel `tb_laboratorium`
--
ALTER TABLE `tb_laboratorium`
  ADD PRIMARY KEY (`id_laboratorium`);

--
-- Indeks untuk tabel `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_peminjam` (`id_peminjam`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logs_id_user_foreign` (`id_user`),
  ADD KEY `user_logs_id_user_data_foreign` (`id_user_data`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita_logs`
--
ALTER TABLE `berita_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bidang_logs`
--
ALTER TABLE `bidang_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laboran_logs`
--
ALTER TABLE `laboran_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laboratorium_logs`
--
ALTER TABLE `laboratorium_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `layanan_logs`
--
ALTER TABLE `layanan_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_carts`
--
ALTER TABLE `tb_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_laboran`
--
ALTER TABLE `tb_laboran`
  MODIFY `id_laboran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_laboratorium`
--
ALTER TABLE `tb_laboratorium`
  MODIFY `id_laboratorium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita_logs`
--
ALTER TABLE `berita_logs`
  ADD CONSTRAINT `berita_logs_id_berita_foreign` FOREIGN KEY (`id_berita`) REFERENCES `tb_berita` (`id_berita`),
  ADD CONSTRAINT `berita_logs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `bidang_logs`
--
ALTER TABLE `bidang_logs`
  ADD CONSTRAINT `bidang_logs_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`),
  ADD CONSTRAINT `bidang_logs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `laboran_logs`
--
ALTER TABLE `laboran_logs`
  ADD CONSTRAINT `laboran_logs_id_laboran_foreign` FOREIGN KEY (`id_laboran`) REFERENCES `tb_laboran` (`id_laboran`),
  ADD CONSTRAINT `laboran_logs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `laboratorium_logs`
--
ALTER TABLE `laboratorium_logs`
  ADD CONSTRAINT `laboratorium_logs_id_laboratorium_foreign` FOREIGN KEY (`id_laboratorium`) REFERENCES `tb_laboratorium` (`id_laboratorium`),
  ADD CONSTRAINT `laboratorium_logs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `layanan_logs`
--
ALTER TABLE `layanan_logs`
  ADD CONSTRAINT `layanan_logs_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `tb_layanan` (`id_layanan`),
  ADD CONSTRAINT `layanan_logs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`id_laboratorium`) REFERENCES `tb_laboratorium` (`id_laboratorium`);

--
-- Ketidakleluasaan untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD CONSTRAINT `tb_bidang_ibfk_1` FOREIGN KEY (`id_laboratorium`) REFERENCES `tb_laboratorium` (`id_laboratorium`);

--
-- Ketidakleluasaan untuk tabel `tb_carts`
--
ALTER TABLE `tb_carts`
  ADD CONSTRAINT `tb_carts_id_laboratorium_foreign` FOREIGN KEY (`id_laboratorium`) REFERENCES `tb_laboratorium` (`id_laboratorium`),
  ADD CONSTRAINT `tb_carts_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_laboran`
--
ALTER TABLE `tb_laboran`
  ADD CONSTRAINT `tb_laboran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tb_laboran_ibfk_2` FOREIGN KEY (`id_laboratorium`) REFERENCES `tb_laboratorium` (`id_laboratorium`);

--
-- Ketidakleluasaan untuk tabel `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD CONSTRAINT `tb_layanan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`);

--
-- Ketidakleluasaan untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `tb_layanan` (`id_layanan`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_3` FOREIGN KEY (`id_peminjam`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_id_user_data_foreign` FOREIGN KEY (`id_user_data`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_logs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
