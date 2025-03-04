-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 05:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pundisalestrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_kunjungan`
--

CREATE TABLE `foto_kunjungan` (
  `id_foto_kunjungan` bigint(20) UNSIGNED NOT NULL,
  `id_kunjungan` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_kunjungan`
--

INSERT INTO `foto_kunjungan` (`id_foto_kunjungan`, `id_kunjungan`, `foto`, `created_at`, `updated_at`) VALUES
(8, 5, 'foto_kunjungan/WRiQxyWfGtSqHeN9OLVDCYPS1RQmen28VHswZgbF.png', '2025-02-16 21:42:10', '2025-02-16 21:42:10'),
(9, 5, 'foto_kunjungan/Wm2M9neJYa0jOSTadrk0Pg5WxDSav7Jgpg8wcK1U.jpg', '2025-02-16 21:42:10', '2025-02-16 21:42:10'),
(10, 5, 'foto_kunjungan/xvxNW6WUooMwFg3y6GPZUeHxx1no15G4kjkIgaCb.jpg', '2025-02-16 21:42:10', '2025-02-16 21:42:10'),
(11, 6, 'foto_kunjungan/3j4RlaWdm9cZAViJAgRZZo6igEcPsegOCrFDOeJC.png', '2025-02-17 19:13:55', '2025-02-17 19:13:55'),
(12, 6, 'foto_kunjungan/1avJkkTlNF1h1skncIecL4w66SOCcOkCrU50lRKn.jpg', '2025-02-17 19:13:55', '2025-02-17 19:13:55'),
(13, 6, 'foto_kunjungan/ClcE8px0pq9urdvf5bwysdaNeBp85lmpWNOTEWO5.jpg', '2025-02-17 19:13:55', '2025-02-17 19:13:55'),
(14, 7, 'foto_kunjungan/hYGd7iopoc6NZbZ3633wqjFRsiKTcHfdJ50UKpYp.png', '2025-02-17 19:18:54', '2025-02-17 19:18:54'),
(15, 7, 'foto_kunjungan/NJkAofSDn3TbyqhyA28GWqFO8boA2TNU4FfMBfB9.jpg', '2025-02-17 19:18:54', '2025-02-17 19:18:54'),
(16, 7, 'foto_kunjungan/CKS0FkBoPSjHHBOLGBdlfs2GtAAGObdqQPf7WOEl.jpg', '2025-02-17 19:18:54', '2025-02-17 19:18:54'),
(17, 8, 'foto_kunjungan/p40jA1laUNL5st3xDwomgo7MUwR6WlUKCpvawqC9.png', '2025-02-17 19:56:22', '2025-02-17 19:56:22'),
(18, 8, 'foto_kunjungan/ZVd1KjiUkn1b1cHgrM5uxfnE32b6X40U1YU5sdgQ.jpg', '2025-02-17 19:56:22', '2025-02-17 19:56:22'),
(19, 8, 'foto_kunjungan/sero7bWSNjfsYWIWCBRPPnn5YJGJWIkEEQDCnQuR.jpg', '2025-02-17 19:56:22', '2025-02-17 19:56:22'),
(20, 9, 'foto_kunjungan/rPpbF4TiRVqm9Ml0ED5XqZ2lP4hF99JUjUrhRW4O.png', '2025-02-17 21:03:34', '2025-02-17 21:03:34'),
(21, 9, 'foto_kunjungan/mhZf4yrVp2QB1mJi9YNiae1p6JyR0o7FMAS5u9iG.jpg', '2025-02-17 21:03:34', '2025-02-17 21:03:34'),
(22, 9, 'foto_kunjungan/aw4zpqezgyfs2W7erXumDz61wnO68gPaoexH6UVH.jpg', '2025-02-17 21:03:34', '2025-02-17 21:03:34'),
(23, 10, 'foto_kunjungan/GbNacgBdOlZWdlbKxe9SFyzUqDZ3hIEya0HUhxk3.png', '2025-02-17 21:17:39', '2025-02-17 21:17:39'),
(24, 10, 'foto_kunjungan/zwTtA0guYKFltRptI0eedqfbFHoQ2MCGcgI2iEQO.png', '2025-02-17 21:17:39', '2025-02-17 21:17:39'),
(25, 10, 'foto_kunjungan/EBe9TpHP0JxEZKXRIDLhfTcZPXcZbFwhTqCfizD6.png', '2025-02-17 21:17:39', '2025-02-17 21:17:39'),
(26, 11, 'foto_kunjungan/TgqlazdRZvNoM7bfoy0LfAGu155WpnoImjTuUDdf.jpg', '2025-02-18 19:42:43', '2025-02-18 19:42:43'),
(27, 11, 'foto_kunjungan/oXszzhX0IABT4Mv7JlKSqE4EGF0oolIthuiybPyM.jpg', '2025-02-18 19:42:43', '2025-02-18 19:42:43'),
(28, 11, 'foto_kunjungan/IE1hQuv4UW7wh8F8pVpnJQxEp0Pu0PKxsDP6RNIw.png', '2025-02-18 19:42:43', '2025-02-18 19:42:43'),
(29, 12, 'foto_kunjungan/tMDgCwQRcucAjVysnQ8o0BRg8weyf07DB5XkrjD5.jpg', '2025-02-18 23:18:49', '2025-02-18 23:18:49'),
(30, 12, 'foto_kunjungan/ScKVVeOyK98mvQ2flUnFowPAX3c10xZnIMAafd4x.jpg', '2025-02-18 23:18:49', '2025-02-18 23:18:49'),
(31, 12, 'foto_kunjungan/StjnBIKXcQXs5KWJLoKOaiHUELYjfir94yMSUNpJ.jpg', '2025-02-18 23:18:49', '2025-02-18 23:18:49'),
(32, 13, 'foto_kunjungan/Qq2Ogmig1NAgXe7tibXpVVJpY1tNlVKCeqrJKTl4.png', '2025-02-20 21:54:52', '2025-02-20 21:54:52'),
(33, 13, 'foto_kunjungan/s1FTIi8Rj3jhNSgZeomPsttAQ2fhLXaaKObE2Y4W.png', '2025-02-20 21:54:52', '2025-02-20 21:54:52'),
(34, 13, 'foto_kunjungan/dS1iopqnjGeK8IMtinPZqBBdpCOJJN6R9AEDFWh8.png', '2025-02-20 21:54:52', '2025-02-20 21:54:52'),
(35, 14, 'foto_kunjungan/NvCO0EavNjC833F1X1zB6qLFxSksdawPPOy79QBz.jpg', '2025-02-21 06:24:41', '2025-02-21 06:24:41'),
(36, 14, 'foto_kunjungan/CPLrkfQeDFkChEUifC65xGej9CnXQrub4sXBUPUX.jpg', '2025-02-21 06:24:41', '2025-02-21 06:24:41'),
(37, 14, 'foto_kunjungan/I6WDZm6ogjoJ0VUP31MwnREXbC04veGpaII9IxYb.jpg', '2025-02-21 06:24:41', '2025-02-21 06:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto_produk` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`id_foto_produk`, `id_produk`, `foto`, `created_at`, `updated_at`) VALUES
(50, 20, 'foto_produk/wPYcoI9Zx8H0F1MAZtVw8wBpD9UrWo9E02WHpyQd.png', '2025-02-12 19:07:36', '2025-02-12 19:07:36'),
(51, 20, 'foto_produk/mZWPye5zHfRpKZBGImoRDExGvy9SdA1Z3wO1mqN0.jpg', '2025-02-12 19:07:36', '2025-02-12 19:07:36'),
(52, 20, 'foto_produk/ixlowQlu17B0nPX2zPrOKWilFRxGxBEeD9xwCP8Z.jpg', '2025-02-12 19:07:36', '2025-02-12 19:07:36'),
(53, 21, 'foto_produk/08eaUdZJWCwUWHR3jT7p66jilEpUkIpFhUeyIpZm.jpg', '2025-02-17 21:13:36', '2025-02-17 21:13:36'),
(54, 21, 'foto_produk/3sAgOGDF3UYfZwha0K4BQ3cOK9WSWucejoe4msb8.png', '2025-02-17 21:13:37', '2025-02-17 21:13:37'),
(55, 21, 'foto_produk/091x7yoRBBX8fN88JT3Umy8QfIrXW6Flp9mNetlz.jpg', '2025-02-17 21:13:37', '2025-02-17 21:13:37'),
(56, 22, 'foto_produk/ZoJaOT4ZmT9pqdHJEHQAi0Oawq6v1YN9HT91q2aT.jpg', '2025-02-17 21:14:28', '2025-02-18 18:58:41'),
(57, 22, 'foto_produk/slLcHTQoGKDfp5TZWcBpsd0Xd978cmCFshlbRddf.jpg', '2025-02-17 21:14:28', '2025-02-17 21:14:28'),
(58, 22, 'foto_produk/wmFz8uUmVcK0Dx8A8aBhzQNRpIm60AMMrdQ1edHb.png', '2025-02-17 21:14:28', '2025-02-17 21:14:28'),
(59, 23, 'foto_produk/EES6w9oLnTMvCUceiGGOdGadFppNpNucaiadRPAt.png', '2025-02-18 18:46:46', '2025-02-18 18:46:46'),
(60, 23, 'foto_produk/4XkaXtLHk3wdfvKawJcIWKuY5jgs7ksCsaVgRlk0.png', '2025-02-18 18:46:46', '2025-02-18 18:46:46'),
(61, 23, 'foto_produk/D7YuLxGimykDU95HYVymhUT23GTI5KSMySgLnJ0Y.png', '2025-02-18 18:46:46', '2025-02-18 18:46:46'),
(65, 25, 'foto_produk/UiMAFvM26FqGtxSS76qokbsdiLINo7DbHuUHSpHl.jpg', '2025-02-25 00:49:31', '2025-02-25 00:49:31'),
(66, 25, 'foto_produk/g7293iDWx8LprR0301jpuFhtdSaOIWJukTootdxI.png', '2025-02-25 00:49:31', '2025-02-25 00:49:31'),
(67, 25, 'foto_produk/iM8S6GhrSu9c9zfnC8f0X8tEwpufj30zC3twgN7u.png', '2025-02-25 00:49:31', '2025-02-25 00:49:31'),
(77, 29, 'foto_produk/68GBVW8OnZtGj33hyYvwhnxsbSxQvZojZAzPq5eO.jpg', '2025-02-25 00:53:42', '2025-02-25 00:53:42'),
(78, 29, 'foto_produk/EBu7eU78kq9n0nxu6ndaw0evwc0fHnkldWGzf7nj.png', '2025-02-25 00:53:42', '2025-02-25 00:53:42'),
(79, 29, 'foto_produk/QSusVIPKQIpnk1jrg8At1hsX5tp4xs38BZ8zbn5z.jpg', '2025-02-25 00:53:42', '2025-02-25 00:53:42'),
(80, 30, 'foto_produk/VJijuOra4aEnxOs9xRMzwxecc6jSUtWmGYbv3WYk.png', '2025-02-25 20:15:36', '2025-02-25 20:15:36'),
(81, 30, 'foto_produk/jCsCFIPtpO308hGesWVEROQeFo1DqJg7J6bhXoGO.png', '2025-02-25 20:15:36', '2025-02-25 20:15:36'),
(82, 30, 'foto_produk/1enHvieeGeyj0IkvqVypcG9DfrCiK2X6kmlIEwMH.png', '2025-02-25 20:15:36', '2025-02-25 20:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `deskripsi_jabatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `deskripsi_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Sales Executive', 'Menawarkan produk atau layanan, dan menjalin hubungan dengan pelanggan.', '2025-02-10 19:20:25', '2025-02-11 18:42:48'),
(2, 'Sales Promoter', 'Mendatangi pelanggan potensial secara langsung.', '2025-02-10 20:54:05', '2025-02-10 20:54:05'),
(3, 'Field Sales Supervisor', 'Mengawasi tim sales lapangan serta memberikan arahan kepada timnya', '2025-02-10 20:54:43', '2025-02-10 20:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_tim_sales` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `status` enum('terjadwal','selesai','dibatalkan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_tim_sales`, `id_lokasi`, `tanggal_kunjungan`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2025-02-14', 'selesai', '2025-02-14 00:36:39', '2025-02-20 23:42:08'),
(4, 1, 4, '2025-02-18', 'dibatalkan', '2025-02-17 18:48:13', '2025-02-20 23:41:26'),
(5, 1, 5, '2025-02-18', 'terjadwal', '2025-02-17 21:01:00', '2025-02-17 21:01:00'),
(6, 3, 6, '2025-02-18', 'terjadwal', '2025-02-17 21:15:58', '2025-02-17 21:15:58'),
(7, 4, 7, '2025-02-18', 'terjadwal', '2025-02-17 21:16:14', '2025-02-17 21:16:14'),
(8, 1, 3, '2025-02-19', 'terjadwal', '2025-02-18 23:47:58', '2025-02-18 23:47:58'),
(9, 1, 7, '2025-02-22', 'terjadwal', '2025-02-20 18:04:07', '2025-02-20 18:04:07'),
(10, 1, 4, '2025-02-21', 'terjadwal', '2025-02-20 19:43:50', '2025-02-20 19:43:50'),
(11, 1, 1, '2025-02-21', 'terjadwal', '2025-02-20 20:58:12', '2025-02-20 20:58:12'),
(12, 1, 4, '2025-02-25', 'terjadwal', '2025-02-25 00:58:28', '2025-02-25 00:58:28'),
(13, 1, 1, '2025-02-26', 'terjadwal', '2025-02-25 20:16:48', '2025-02-25 20:16:48'),
(14, 1, 1, '2025-03-03', 'terjadwal', '2025-03-03 19:54:49', '2025-03-03 19:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `nama_klien` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `id_lokasi`, `nama_klien`, `nomor_telepon`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Trio Habel Jonathan', '0812372737', 'kkk@gmail.com', '0000-00-00 00:00:00', '2025-02-13 19:56:48'),
(3, 1, 'Rizal', '123456745464', 'ciaw@gmail.com', '2025-02-13 19:40:50', '2025-02-13 19:57:15'),
(11, 4, 'Davey Samuel', '082366632', 'davey@gmail.com', '2025-02-17 18:47:53', '2025-02-17 18:47:53'),
(12, 5, 'Bentong', '086362636', 'bentong@gmail.com', '2025-02-17 21:01:35', '2025-02-17 21:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` bigint(20) UNSIGNED NOT NULL,
  `id_klien` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `id_profile_sales` bigint(20) UNSIGNED NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `deskripsi_aktivitas` text NOT NULL,
  `status` enum('selesai','negoisasi','gagal') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `id_klien`, `id_jadwal`, `id_produk`, `id_profile_sales`, `waktu_mulai`, `waktu_selesai`, `deskripsi_aktivitas`, `status`, `created_at`, `updated_at`) VALUES
(5, 3, 2, 20, 4, '2025-02-17 11:41:00', '2025-02-18 11:41:00', 'tes 123', 'negoisasi', '2025-02-16 21:42:10', '2025-02-16 21:42:10'),
(6, 3, 4, 20, 11, '2025-02-18 21:13:00', '2025-02-18 22:13:00', 'tes 123', 'negoisasi', '2025-02-17 19:13:55', '2025-02-17 19:13:55'),
(7, 11, 4, 20, 11, '2025-02-18 09:18:00', '2025-02-18 10:18:00', 'Klien tertarik pada produk', 'selesai', '2025-02-17 19:18:54', '2025-02-17 19:18:54'),
(8, 1, 4, 20, 11, '2025-02-19 09:56:00', '2025-02-18 09:59:00', 'Sukses Besar', 'selesai', '2025-02-17 19:56:22', '2025-02-17 19:56:22'),
(9, 12, 5, 20, 12, '2025-02-18 00:02:00', '2025-02-18 02:03:00', 'Sukses total', 'selesai', '2025-02-17 21:03:34', '2025-02-17 21:03:34'),
(10, 12, 6, 21, 13, '2025-02-18 11:16:00', '2025-02-18 03:17:00', 'Sedang Menawarkan produk JovaSoftware', 'selesai', '2025-02-17 21:17:39', '2025-02-17 21:17:39'),
(11, 12, 7, 21, 14, '2025-02-19 09:42:00', '2025-02-20 09:42:00', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'selesai', '2025-02-18 19:42:43', '2025-02-18 19:43:37'),
(12, 11, 2, 22, 4, '2025-02-19 13:17:00', '2025-02-20 13:17:00', 'Tes 12345', 'selesai', '2025-02-18 23:18:48', '2025-02-18 23:18:48'),
(13, 3, 10, 21, 4, '1993-04-29 11:54:00', '2025-02-21 11:54:00', 'gagal mzti', 'gagal', '2025-02-20 21:54:51', '2025-02-20 21:54:51'),
(14, 1, 10, 21, 4, '2025-02-21 20:20:00', '2025-02-21 20:24:00', 'tes 123', 'selesai', '2025-02-21 06:24:40', '2025-02-21 06:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `alamat`, `provinsi`, `kota`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, ' Komplek Tunas 2 Industrial Estate Blok 7D, Berlian, Batam Centre, Belian,', 'Kepuluan Riau', 'Batam', 104.0676286, 1.1141175, NULL, NULL),
(3, 'tes aezakmi2', 'Riau', 'Dumai', 104.0674866472267, 1.1125287579902148, '2025-02-13 18:17:42', '2025-02-13 18:33:58'),
(4, 'Jalan Anggrek Merah No 25A dan 25B', 'Kepulauan Riau', 'Tanjungpinang', 104.06767046441792, 1.1143426165658685, '2025-02-17 18:46:58', '2025-02-17 18:46:58'),
(5, 'Nagoya tamrin', 'kepulaun riau', 'batam', 1234, 1234, '2025-02-17 21:00:40', '2025-02-18 21:37:22'),
(6, 'Nagoya Food Court', 'Kepulauan Riau', 'Batam', 1234, 1234, '2025-02-17 21:15:06', '2025-02-17 21:15:06'),
(7, 'Golden Prown', 'Kepulauan Riau', 'Batam', 12345, 23114, '2025-02-17 21:15:28', '2025-02-17 21:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_06_081142_create_tim_sales_table', 1),
(5, '2025_02_06_090010_create_produk_table', 1),
(6, '2025_02_06_090032_create_lokasi_table', 1),
(7, '2025_02_06_090510_create_klien_table', 1),
(8, '2025_02_10_064924_create_jabatan_table', 1),
(9, '2025_02_11_020257_create_profil_sales_table', 1),
(10, '2025_02_11_021331_alter_profil_sales_table', 1),
(11, '2025_02_12_022928_create_foto_produk_table', 2),
(12, '2025_02_14_014350_create_klien_table', 3),
(13, '2025_02_14_070108_create_jadwal_table', 4),
(14, '2025_02_14_081602_create_kunjungan_table', 5),
(15, '2025_02_17_014412_create_foto_kunjungan_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `harga`, `created_at`, `updated_at`) VALUES
(20, 'Produk A', 'miaw', 50000.00, '2025-02-12 19:07:36', '2025-02-12 19:07:36'),
(21, 'Jova Software', 'Produk Custom', 1000000.00, '2025-02-17 21:13:36', '2025-02-17 21:13:36'),
(22, 'Jova Resto', 'Paket Basic', 208000.00, '2025-02-17 21:14:28', '2025-02-17 21:14:28'),
(23, 'Tes 123', 'tes123', 30000.00, '2025-02-18 18:46:45', '2025-02-18 18:46:45'),
(25, 'Produk AC2', 'tes 1235', 400000.00, '2025-02-25 00:49:31', '2025-02-25 20:11:58'),
(29, 'Produk A23', 'tes12345', 4000000.00, '2025-02-25 00:53:42', '2025-02-25 00:53:42'),
(30, 'VPS 10', 'Core 8, Memory 32GB, Storage 100GB', 1500000.00, '2025-02-25 20:15:34', '2025-02-25 20:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `profil_sales`
--

CREATE TABLE `profil_sales` (
  `id_profile_sales` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tim_sales` bigint(20) UNSIGNED DEFAULT NULL,
  `id_jabatan` bigint(20) UNSIGNED DEFAULT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_sales`
--

INSERT INTO `profil_sales` (`id_profile_sales`, `id_users`, `id_tim_sales`, `id_jabatan`, `foto_profil`, `nama`, `alamat`, `nomor_telepon`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 2, 'foto_profil/PkujuAG2XgtgBOP3k3wa3uvcaEiAGjjmH2MyNOMV.jpg', 'Habib', 'Lorem Ipsum', '081277840552', '2025-02-10 20:55:54', '2025-02-12 19:19:37'),
(7, 1, 1, 3, 'foto_profil/taGMS2arVsaH61BDIHEC8lKg3xD2eh2wFEV93JzW.png', 'Trio Habel Jonathan', 'Lorem Ipsum', '08123474723', '2025-02-11 01:32:49', '2025-02-12 19:19:25'),
(11, 2, 2, 1, 'foto_profil/hh3FvDQ7tNc3v0EVyybjU4yfuybSxkSSFI153gLL.png', 'franklin2', 'tes1234', '123123', '2025-02-17 18:37:58', '2025-02-17 18:48:37'),
(12, 4, 1, 2, 'foto_profil/wC5C8U1DZnwbEo8IstcsKOdqVMRIZbm5nMt8tKrS.png', 'Misriyadi', 'batam', '081277840553', '2025-02-17 20:58:30', '2025-02-17 20:58:58'),
(13, 5, 3, 3, 'foto_profil/v6I6niM3kZRX6WiR4tvVMetjPBMDJWU67Av6GvkC.jpg', 'Sofia', 'Batam', '081234283283', '2025-02-17 21:12:23', '2025-02-17 21:12:23'),
(14, 6, 4, 2, 'foto_profil/qoy0Nn1p67EFAwE439WMT0JlcBHeTbH3GCIK0ihs.jpg', 'Alfia', 'Nagoya', '0823273724', '2025-02-17 21:12:49', '2025-02-17 21:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8FLaOKSSJRhsxm7yT38X6yxZxN2oSG6NtmfXVDhA', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlptbnFNU3Q1UzlpaUZ5YWVaN0JHY01jWWcyTkU2TjJaTUZyWVRjYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9rdW5qdW5nYW4/c2VhcmNoPSZ0YW5nZ2FsX211bGFpPTIwMjUtMDMtMDUmdGFuZ2dhbF9zZWxlc2FpPTIwMjUtMDMtMDMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1741056985),
('R4uiH5J8sDTSB9rNyPN4Vw8N2Fb13Ksb7QIbNpxX', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUI4dUdUVTNtQ0J4ODFCMVVjdGVEMzB4Zk9XanF6dWR5VTVEME1sdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYWxlcy9rdW5qdW5nYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1741059436);

-- --------------------------------------------------------

--
-- Table structure for table `tim_sales`
--

CREATE TABLE `tim_sales` (
  `id_tim_sales` bigint(20) UNSIGNED NOT NULL,
  `nama_tim_sales` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tim_sales`
--

INSERT INTO `tim_sales` (`id_tim_sales`, `nama_tim_sales`, `created_at`, `updated_at`) VALUES
(1, 'Tim Arjuna', '2025-02-10 19:21:39', '2025-02-10 19:21:39'),
(2, 'Tim Fian', '2025-02-10 20:51:41', '2025-02-10 20:51:41'),
(3, 'Tim A JovaSoftware', '2025-02-17 21:11:04', '2025-02-17 21:11:13'),
(4, 'Tim B JovaSoftware', '2025-02-17 21:11:23', '2025-02-17 21:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','sales') NOT NULL DEFAULT 'sales',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'kuzumajonathan@gmail.com', '$2y$12$E.iIFBPgszJC1MEfBJ/S4OHmY7CJeihVaDhvrNfoLcr6DXhnntHxG', 'admin', '2025-02-10 19:15:20', '2025-02-10 19:15:39'),
(2, 'ccc22@gmail.com', '$2y$12$k2bMVtsPyCTyXt0gBMo1yuVRKB5MkzeHuiY2EoItinxedcQ0xD4Vm', 'sales', '2025-02-10 20:49:10', '2025-02-10 20:49:10'),
(3, 'trio2523@gmail.com', '$2y$12$hZUXOKb1VfTZU10Jdm4g4OUjpQy5s2J5Vt9rj1rshMcIYU7T/KVCe', 'sales', '2025-02-10 20:49:22', '2025-02-10 20:49:22'),
(4, 'daffa@gmail.com', '$2y$12$uFCzvMV06YzbLeT2sfeQ1O/NyahYuWcFTPEJyUCAXvhRseYF61.Hq', 'sales', '2025-02-17 20:54:34', '2025-02-17 20:54:34'),
(5, 'sofia@gmail.com', '$2y$12$O.jlfjx.2g188sTaXoIohOVTUppYKZPWq/m6DTvNokpewh0SvPHUi', 'sales', '2025-02-17 21:10:44', '2025-02-17 21:10:44'),
(6, 'alfia@gmail.com', '$2y$12$ADZeETjt1cWcgIv5QgB9uufPcIE0PUzKCoo41/l/wREzF7v0LdtOC', 'sales', '2025-02-17 21:11:45', '2025-02-17 21:11:45'),
(7, 'franklin@gmail.com', '$2y$12$ihTyu7U1ZPRXIFN71xbLZelaqw.Lkrp0y9h61LQ/jLBGcXPPnYQ7q', 'sales', '2025-02-18 22:56:04', '2025-02-18 22:56:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_kunjungan`
--
ALTER TABLE `foto_kunjungan`
  ADD PRIMARY KEY (`id_foto_kunjungan`),
  ADD KEY `foto_kunjungan_id_kunjungan_foreign` (`id_kunjungan`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto_produk`),
  ADD KEY `foto_produk_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_id_tim_sales_foreign` (`id_tim_sales`),
  ADD KEY `jadwal_id_lokasi_foreign` (`id_lokasi`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`),
  ADD UNIQUE KEY `klien_email_unique` (`email`),
  ADD KEY `klien_id_lokasi_foreign` (`id_lokasi`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `kunjungan_id_klien_foreign` (`id_klien`),
  ADD KEY `kunjungan_id_jadwal_foreign` (`id_jadwal`),
  ADD KEY `kunjungan_id_produk_foreign` (`id_produk`),
  ADD KEY `kunjungan_id_profile_sales_foreign` (`id_profile_sales`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `profil_sales`
--
ALTER TABLE `profil_sales`
  ADD PRIMARY KEY (`id_profile_sales`),
  ADD KEY `profil_sales_id_users_foreign` (`id_users`),
  ADD KEY `profil_sales_id_tim_sales_foreign` (`id_tim_sales`),
  ADD KEY `profil_sales_id_jabatan_foreign` (`id_jabatan`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tim_sales`
--
ALTER TABLE `tim_sales`
  ADD PRIMARY KEY (`id_tim_sales`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
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
-- AUTO_INCREMENT for table `foto_kunjungan`
--
ALTER TABLE `foto_kunjungan`
  MODIFY `id_foto_kunjungan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_foto_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `profil_sales`
--
ALTER TABLE `profil_sales`
  MODIFY `id_profile_sales` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tim_sales`
--
ALTER TABLE `tim_sales`
  MODIFY `id_tim_sales` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_kunjungan`
--
ALTER TABLE `foto_kunjungan`
  ADD CONSTRAINT `foto_kunjungan_id_kunjungan_foreign` FOREIGN KEY (`id_kunjungan`) REFERENCES `kunjungan` (`id_kunjungan`) ON DELETE CASCADE;

--
-- Constraints for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD CONSTRAINT `foto_produk_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_id_tim_sales_foreign` FOREIGN KEY (`id_tim_sales`) REFERENCES `tim_sales` (`id_tim_sales`) ON DELETE CASCADE;

--
-- Constraints for table `klien`
--
ALTER TABLE `klien`
  ADD CONSTRAINT `klien_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE;

--
-- Constraints for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE,
  ADD CONSTRAINT `kunjungan_id_klien_foreign` FOREIGN KEY (`id_klien`) REFERENCES `klien` (`id_klien`) ON DELETE CASCADE,
  ADD CONSTRAINT `kunjungan_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `kunjungan_id_profile_sales_foreign` FOREIGN KEY (`id_profile_sales`) REFERENCES `profil_sales` (`id_profile_sales`) ON DELETE CASCADE;

--
-- Constraints for table `profil_sales`
--
ALTER TABLE `profil_sales`
  ADD CONSTRAINT `profil_sales_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE,
  ADD CONSTRAINT `profil_sales_id_tim_sales_foreign` FOREIGN KEY (`id_tim_sales`) REFERENCES `tim_sales` (`id_tim_sales`) ON DELETE CASCADE,
  ADD CONSTRAINT `profil_sales_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
