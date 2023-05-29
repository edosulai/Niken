-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 03:26 PM
-- Server version: 8.0.28
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perkebunan`
--

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personnel_subarea` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi_kerja` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu_establishment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jarak_alamat` int NOT NULL,
  `kinerja` int NOT NULL,
  `ketepatan_waktu` int NOT NULL,
  `komunikasi` int NOT NULL,
  `kreatifitas` int NOT NULL,
  `kehadiran` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `nik`, `nama`, `p_area`, `personnel_subarea`, `bagian`, `job_group`, `posisi_kerja`, `status`, `jenis_kelamin`, `edu_establishment`, `tgl_lahir`, `tgl_masuk`, `jarak_alamat`, `kinerja`, `ketepatan_waktu`, `komunikasi`, `kreatifitas`, `kehadiran`, `created_at`, `updated_at`) VALUES
(1, '6203256', 'Agunarto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Pelayuan', 'PKWT', 'Male', 'SLTA', '1995-09-12', '2021-09-01', 1, 79, 88, 88, 89, 87, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(2, '6203257', 'Agus Priyono', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pengeringan', 'PKWT', 'Male', 'SLTP', '1996-08-05', '2021-09-01', 1, 80, 87, 89, 91, 88, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(3, '6203258', 'Ahmad Ihsan', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'PKWT', 'Male', 'S1', '1990-10-30', '2021-09-01', 1, 80, 85, 87, 88, 92, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(4, '6203259', 'Budi Efantri', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pengepakan', 'PKWT', 'Male', 'S1', '1991-06-28', '2021-09-01', 1, 79, 90, 86, 90, 90, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(5, '6203260', 'Eka Saputra', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'PKWT', 'Male', 'SLTP', '1997-07-05', '2021-09-01', 1, 81, 88, 92, 86, 88, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(6, '6203261', 'Fery Hernando', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'PKWT', 'Male', 'SLTP', '1991-05-12', '2021-09-01', 1, 81, 91, 88, 92, 92, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(7, '6203262', 'Jefri Pranata', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'PKWT', 'Male', 'SLTP', '1996-06-26', '2021-09-01', 1, 80, 89, 91, 89, 89, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(8, '6203265', 'Oky Rifa Yandi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pengepakan', 'PKWT', 'Male', 'S1', '1992-11-13', '2021-09-01', 1, 79, 85, 89, 91, 87, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(9, '6203266', 'Pras Setyia', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Daun Basah', 'PKWT', 'Male', 'SLTP', '1997-09-21', '2021-09-01', 1, 79, 86, 87, 88, 90, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(10, '6203267', 'Rafly Andrean Nugrah', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'PKWT', 'Male', 'SLTP', '2001-10-26', '2021-11-01', 1, 80, 88, 90, 87, 88, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(11, '6233669', 'Safrianto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Turun Daun', 'PKWT', 'Male', 'SLTP', '1993-09-29', '2022-07-01', 1, 78, 86, 86, 90, 91, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(12, '6501271', 'M Iqbal Anshori', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Non Grade', 'Male', 'SLTA', '1996-10-04', '2020-01-01', 1, 78, 90, 90, 86, 92, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(13, '6606108', 'Emrizal', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Turun Daun', 'Band 1', 'Male', 'SLTP', '1967-12-16', '1992-04-27', 1, 85, 86, 92, 92, 89, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(14, '6606123', 'Beni Issumarno', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Tukang', 'Mekanik', 'Band 1', 'Male', 'SLTP', '1968-07-07', '1993-07-21', 2, 90, 87, 89, 92, 87, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(15, '6606274', 'Sarianto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Male', 'SD', '1968-07-01', '1987-01-02', 5, 85, 91, 92, 88, 92, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(16, '6606296', 'Edi Susanto', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Pekerja', 'Petugas Gudang', 'Band 1', 'Male', 'DIPLOMA', '1968-06-01', '1988-10-21', 1, 90, 89, 90, 90, 88, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(17, '6606400', 'Fitriyeni', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Oksidasi Enzimatis', 'Band 1', 'Female', 'SD', '1968-12-10', '1989-09-21', 1, 90, 86, 88, 86, 90, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(18, '6606451', 'Supriyono', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator HE Orthodoks', 'Band 1', 'Male', 'SLTA', '1968-12-03', '1990-07-21', 1, 87, 88, 91, 92, 87, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(19, '6606508', 'Relisma Tambunan', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Female', 'SLTA', '1971-07-07', '1992-05-21', 1, 88, 90, 87, 89, 87, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(20, '6606598', 'Sukamdi S.', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Male', 'SD', '1968-05-11', '1996-09-21', 2, 85, 85, 92, 90, 90, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(21, '6606626', 'Latiffudin', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Male', 'SD', '1968-12-15', '1997-06-21', 1, 86, 89, 89, 87, 88, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(22, '6606634', 'Zarlis Hariadi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pelayuan', 'Band 1', 'Male', 'SD', '1968-05-13', '1998-06-06', 1, 89, 87, 90, 88, 91, '2023-05-18 06:20:18', '2023-05-18 06:20:18'),
(23, '6606854', 'Amirzal', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Male', 'SLTA', '1969-04-01', '1992-09-21', 1, 88, 91, 86, 88, 86, '2023-05-18 06:20:19', '2023-05-18 06:20:19'),
(24, '6606873', 'Idrus', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Pelayuan', 'Band 1', 'Male', 'SLTA', '1969-11-06', '1992-06-21', 2, 87, 90, 88, 90, 92, '2023-05-18 06:20:19', '2023-05-18 06:20:19'),
(25, '6606887', 'Zulfirman', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Male', 'SD', '1969-07-15', '1993-01-04', 2, 86, 88, 90, 92, 89, '2023-05-18 06:20:19', '2023-05-18 06:20:19'),
(26, '6606910', 'Poniran', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Mandor', 'Mandor Bengkel Umum', 'Band 1', 'Male', 'SLTP', '1969-07-01', '1994-05-23', 2, 88, 91, 93, 91, 85, '2023-05-18 06:20:19', '2023-05-18 06:20:19'),
(27, '6606974', 'Darnis', 'F4', 'KB DANAU KEMBAR', 'Bagian Personalia Kebun & Umum', 'Pengamanan', 'Satpam', 'Band 1', 'Male', 'SLTA', '1969-08-03', '1996-01-01', 1, 85, 85, 88, 89, 87, '2023-05-18 06:20:19', '2023-05-18 06:20:19'),
(28, '6607013', 'Kisamudin', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator HE Orthodoks', 'Band 1', 'Male', 'SD', '1969-03-09', '1998-06-21', 1, 85, 90, 87, 90, 88, '2023-05-18 06:20:19', '2023-05-18 06:20:19'),
(29, '6607029', 'Erinna Simanjuntak', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Fermentasi', 'Band 1', 'Female', 'SLTA', '1969-12-07', '1997-03-21', 1, 85, 87, 90, 89, 86, '2023-05-18 06:20:19', '2023-05-18 06:20:19'),
(30, '6607033', 'Mayuris', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator HE Orthodoks', 'Band 1', 'Male', 'SLTP', '1969-04-04', '1999-08-21', 1, 87, 88, 93, 87, 90, '2023-05-18 06:20:19', '2023-05-18 06:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_18_083706_create_employers_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-05-18 06:20:18', '$2y$10$tmNkpGa0wkBegqfUkcjf5ekbe6XhdiQbgCcDhdfxMxTKr7j1ZiE2a', NULL, '2023-05-18 06:20:18', '2023-05-18 06:20:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
