-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 10:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_detail`, `nama`, `nik`, `nip`, `tempat_lahir`, `tanggal_lahir`, `gender`, `telp`, `kecamatan`, `kelurahan`, `kota`, `provinsi`, `alamat`, `ktp`, `created_at`, `updated_at`) VALUES
(1, 'toho', 1671050707970003, NULL, 'M.Enim', '1997-07-07', 'L', '8117807970', 'Sukarami', 'Sukajaya', 'Palembang', 'Sumatera Selatan', 'Perum. Griya Buana Indah 1 No A 7', 'ezgif-1-c717be194d.jpg', '2022-12-20 10:41:02', '2023-01-01 20:43:48'),
(2, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 04:24:14', '2022-12-22 04:24:14'),
(3, 'rizki ratih purwasihi', 16710507079700030, 9283923400, 'babat supat', '1997-07-07', 'P', '08117807970', NULL, NULL, NULL, NULL, 'jl. babat supat jambi', NULL, '2022-12-23 03:08:41', '2022-12-30 08:14:56'),
(4, 'viky prasetyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-31 05:13:50', '2022-12-31 05:13:50'),
(5, 'mihak', 1671050707970003, NULL, 'babat supat', '1997-07-07', 'L', '0198232837823', 'babat supat', 'sukarame', 'Kota Palembang', 'Sumatera Selatan', 'suka bangun2', 'buku.jpeg', '2023-01-01 21:01:04', '2023-01-01 21:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_survey`
--

CREATE TABLE `jadwal_survey` (
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_survey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_survey` date DEFAULT NULL,
  `hasil_survey` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_survey` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_survey`
--

INSERT INTO `jadwal_survey` (`id_jadwal`, `id_pengajuan`, `id_user`, `status_survey`, `tanggal_survey`, `hasil_survey`, `dokumen_survey`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ditolak', '2022-12-30', 'salakslkldjoksdsd', 'hasil_survey.pdf', '2022-12-27 15:03:54', '2022-12-30 05:48:45'),
(2, 2, 1, 'diterima', '2022-12-31', 'sangat layak', 'hasil_survey.pdf', '2022-12-30 08:49:31', '2022-12-30 17:07:08');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_12_17_130337_create_detail_user_table', 1),
(18, '2022_12_20_223241_create_pengajuan_table', 2),
(21, '2022_12_27_151717_create_jadwal_survey_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_usaha` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_usaha` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permohonan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `akta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keuangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `legalitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama_usaha`, `jenis_usaha`, `bentuk_usaha`, `kecamatan_usaha`, `kelurahan_usaha`, `kota_usaha`, `provinsi_usaha`, `alamat_usaha`, `foto_usaha`, `no_npwp`, `npwp`, `permohonan`, `proposal`, `akta`, `keuangan`, `legalitas`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'rumah makan selero minang', 'rumah makan padang', 'UMKM', 'Sukarami', 'Sukajaya', 'Palembang', 'Sumatera Selatan', 'jl. babat supat', 'large-rm-makan-padang-dd4adb693d0d48e70773ec0725d733e4.jpg', '01.02.65.032', 'npwp.jpeg', 'permohonan.pdf', 'proposal.pdf', 'akta.pdf', 'keuangan.pdf', 'legalitas.pdf', 'suspend', 'file saya', '2022-12-26 13:07:19', '2022-12-30 05:48:45'),
(2, 1, 'Rumah Kue', 'Toko Kue', 'UMKM', 'sukatani', 'suka makmur', 'palembang', 'sumatera selatan', 'jl.soak simpur', 'WhatsApp Image 2022-10-16 at 20.07.15.jpeg', '1237923901', 'npwp.jpeg', 'permohonan.pdf', 'proposal.pdf', 'akta.pdf', 'keuangan.pdf', 'legalitas.pdf', 'pengajuan_berhasil', NULL, '2022-12-27 16:06:13', '2022-12-30 17:07:08'),
(3, 5, 'rumah makan selero minang', 'warung internet', 'PT', 'babat supat', 'babat supat', 'Palembang', 'Sumatera Selatan', 'jl. suka bangun 2', 'WhatsApp Image 2022-10-16 at 20.07.15.jpeg', '01.02.65.032', 'npwp.jpeg', 'permohonan.pdf', 'proposal.pdf', 'akta.pdf', 'keuangan.pdf', 'legalitas.pdf', 'ditinjau', NULL, '2023-01-01 21:14:10', '2023-01-01 21:14:15');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `type`, `status`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'toho', 'aridwiantoro09@gmail.com', NULL, '$2y$10$a29x3I/6sKYwriEZ5mviG.tYZsEGFkK/3OJWnJ3/iyOTgoV.sD1Gq', 'masyarakat', NULL, '086593900_1553668873-LISA_BLACKPINK_1.jpg', NULL, '2022-12-20 10:41:02', '2023-01-01 20:43:48'),
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$Vt4MXmChznQpwHaijqsqJ.gSY8rPSBdO//6HiFlgHCmmZwv1FPcTu', 'pegawai', NULL, NULL, NULL, '2022-12-22 04:24:15', '2022-12-22 04:24:15'),
(3, 'rizki ratih purwasihi', 'rizkiratih@gmail.com', NULL, '$2y$10$INyuDjQF8ObJRFuUWvrI3.i4exkEpu0UWmseFGnQgnhqMfPRTpl2C', 'survey', NULL, '086593900_1553668873-LISA_BLACKPINK_1.jpg', NULL, '2022-12-23 03:08:41', '2022-12-30 08:29:21'),
(4, 'viky prasetyo', 'vikyprasetyo@gmail.com', NULL, '$2y$10$OkbNaTeLTZfANi0k2R9Dze9.KRk7bIVfAW4YhRkkRsN0jrUfWf2Fi', 'masyarakat', NULL, NULL, NULL, '2022-12-31 05:13:50', '2022-12-31 05:13:50'),
(5, 'mihak', 'mihak@mihak', NULL, '$2y$10$qFw8GQNvBWXQQUQGpRh87OzAMOvUTf0QNVhBwq0ofDmN2uLhq6aA.', 'masyarakat', NULL, '2.jpeg', NULL, '2023-01-01 21:01:04', '2023-01-01 21:01:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jadwal_survey`
--
ALTER TABLE `jadwal_survey`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_survey`
--
ALTER TABLE `jadwal_survey`
  MODIFY `id_jadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
