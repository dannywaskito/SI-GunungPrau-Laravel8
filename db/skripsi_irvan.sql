-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 03:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_irvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_28_154040_add_last_login_at_to_users', 1),
(6, '2021_11_26_175218_create_kritiks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `foto_berita` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul`, `isi`, `foto_berita`) VALUES
(1, 'wkwkwkwk', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi dolore omnis aliquam illum magni, placeat. Voluptatibus eius et quia atque magni. Explicabo impedit ad laudantium mollitia excepturi, quam itaque voluptatum.', 'tes123.jpg'),
(2, 'yahahha hayuk', 'wwwwwwwwwwwww', '1627964817040.jpg'),
(3, 'yahahha hayuk', 'yahahaha hahahay', '1627964817040.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id_contact` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notelp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id_contact`, `email`, `notelp`) VALUES
(1, 'hi@muhdannywaskito.cpom', '089502516131');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `foto_kegiatan` varchar(255) DEFAULT NULL,
  `id_kecamatan` int(2) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `jml_anggota` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `foto_kegiatan`, `id_kecamatan`, `alamat`, `posisi`, `ket`, `jml_anggota`, `waktu`, `created_at`) VALUES
(3, 'Gotong Royong', 'after-work-american-bar-beard-bearded-blond-1452979-pxhere.com1_-1.jpg', 5, 'hahaha', '-6.413395505931607,106.88941955566408', 'oke Jos gan', '10', '2021-10-31', '2021-11-14 15:37:00'),
(4, 'wkwkww', 'approval.jpg', 6, 'jalan haha hihi huhu', '-6.412969038025572,106.8636703491211', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '10', '2021-11-12', '2021-11-12 09:21:40'),
(5, 'Gunung bendera padalarang bandung', 'IMG-20211005-WA0004.jpg', 1, 'Kampung Pojok Desa, Jayamekar, Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553', '-6.852975057923971,107.46894836425783', 'kegiatan pengibaran bendera merah putih pada tanggal 14 - 17 agustus 2020 di gunung bendera bandung barat. diikuti oleh 2 anggota muda IMAPALA UHAMKA yaitu rahmat aditia dan abdillah azam kamil, dengan pendamping 4 orang Pengurus aktif yaitu refi wisnu pradana, syaifullah, melianita qurrota\'ayun dan zuz dzulfarqo. kegiatan ini bertujuan sebagai tanda cinta tanah air kita dalam memperingati hari kemerdekaan indonesia. didalam kegiatan ini juga bertujuan untuk meningkatkan dan mengembangkan skill navigasi darat anggota muda IMAPALA UHAMKA.', '5', '2020-08-14', '2021-11-14 16:36:25'),
(6, 'yahahha hayuk', '1627964817040.jpg', 5, 'jjjj', '-6.413224918812003,106.88924789428712', 'yoooo', '10', '2021-11-16', '2021-11-15 17:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaki`
--

CREATE TABLE `tbl_pendaki` (
  `id_pendakian` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pendakian` varchar(255) DEFAULT NULL,
  `akhir_pendakian` varchar(255) DEFAULT NULL,
  `nik_ketua` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `handphone` varchar(255) DEFAULT NULL,
  `telp_rumah` varchar(12) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `anggota_pendaki` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendaki`
--

INSERT INTO `tbl_pendaki` (`id_pendakian`, `user_id`, `tgl_pendakian`, `akhir_pendakian`, `nik_ketua`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `handphone`, `telp_rumah`, `pekerjaan`, `anggota_pendaki`, `created_at`, `updated_at`) VALUES
(1, 2, '2 Agustus 2020', '3 September 2020', '121212121212', 'Laki-Laki', '16 April 1996', 'Depok', '0213215899213', '021321589921', 'freelancer', 'budi\r\nbono\r\ndudu', NULL, NULL),
(3, 4, '2021-12-23', '2021-12-23', '1212121212', 'Laki-Laki', '2021-12-23', 'depok', '1212121212121', '12212121212', 'mhs', 'budi\r\ndony\r\ndodi', '2021-12-22 10:03:02', '2021-12-22 10:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyewaan`
--

CREATE TABLE `tbl_penyewaan` (
  `id_penyewaan` int(11) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `sleeping_bag` varchar(255) DEFAULT NULL,
  `tenda` varchar(255) DEFAULT NULL,
  `matras` varchar(255) DEFAULT NULL,
  `nesting` varchar(255) DEFAULT NULL,
  `kompor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penyewaan`
--

INSERT INTO `tbl_penyewaan` (`id_penyewaan`, `user_id`, `no_ktp`, `sleeping_bag`, `tenda`, `matras`, `nesting`, `kompor`) VALUES
(1, 2, '12121212121', '2', '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `current_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `bio`, `email`, `no_hp`, `role`, `picture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login_at`, `current_login_at`) VALUES
(1, 'Irvan Fahmi Rudy', 'Aing Macan  auuu', 'irvanfahmi58@gmail.com', '081808883724', 1, 'UIMG_2021120161a7a8931bff5.jpg', NULL, '$2y$10$Eu2U9i/iRx.X2p0iEZ8DUevzPsC2LVmTg1wAuuaWS8VRiA5OIvsJK', NULL, '2021-10-04 08:20:36', '2021-12-01 09:55:03', '2021-11-15 05:45:50', '2021-12-01 09:51:39'),
(2, 'User', NULL, 'waskitodanny14@gmail.com', '089502516131', 2, '', NULL, '$2y$10$2aiKN3oNCxMGqEv6ofSwTeRWUatoVJoeBX2nNvWhQkWoQTTSw9krC', NULL, '2021-10-04 08:20:36', '2021-12-20 08:57:09', '2021-12-10 23:36:06', '2021-12-20 08:57:09'),
(3, 'M Danny Waskito', 'Life is never flat!', 'hi@muhdannywaskito.com', NULL, 1, 'UIMG_202110256176e6eb1c752.jpg', NULL, '$2y$10$bSRx/oRykv8C4oN6WZb1F.xOSnHNHZqlK4Eg7ba5iV3QjktsR/yPS', NULL, '2021-10-25 10:17:17', '2021-12-22 10:09:38', '2021-12-18 09:22:36', '2021-12-22 10:09:38'),
(4, 'Muh Danny Waskito', NULL, 'dannywaskito64@gmail.com', NULL, 2, NULL, NULL, '$2y$10$Dm7dNhzS/6tmGnefOXLpWOdEuQ.oA1HhAALnC9THhGobJ4wMMBUD.', NULL, '2021-12-18 09:07:40', '2021-12-22 09:21:02', '2021-12-20 08:58:47', '2021-12-22 09:21:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_pendaki`
--
ALTER TABLE `tbl_pendaki`
  ADD PRIMARY KEY (`id_pendakian`);

--
-- Indexes for table `tbl_penyewaan`
--
ALTER TABLE `tbl_penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pendaki`
--
ALTER TABLE `tbl_pendaki`
  MODIFY `id_pendakian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_penyewaan`
--
ALTER TABLE `tbl_penyewaan`
  MODIFY `id_penyewaan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
