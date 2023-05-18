-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 05:08 PM
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
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
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
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `p_area`, `personnel_subarea`, `bagian`, `job_group`, `posisi_kerja`, `status`, `jenis_kelamin`, `edu_establishment`, `tgl_lahir`, `tgl_masuk`, `jarak_alamat`, `kinerja`, `ketepatan_waktu`, `komunikasi`, `kreatifitas`, `kehadiran`, `created_at`, `updated_at`) VALUES
(1, '6203256', 'Agunarto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Pelayuan', 'PKWT', 'Male', 'SLTA', '1995-09-12', '2021-09-01', 1, 79, 88, 88, 89, 87, '2023-05-04 06:14:41', '2023-05-04 06:14:41'),
(2, '6203257', 'Agus Priyono', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pengeringan', 'PKWT', 'Male', 'SLTP', '1996-08-05', '2021-09-01', 1, 80, 87, 89, 91, 88, '2023-05-04 06:14:41', '2023-05-04 06:14:41'),
(3, '6203258', 'Ahmad Ihsan', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'PKWT', 'Male', 'S1', '1990-10-30', '2021-09-01', 1, 80, 85, 87, 88, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(4, '6203259', 'Budi Efantri', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pengepakan', 'PKWT', 'Male', 'S1', '1991-06-28', '2021-09-01', 1, 79, 90, 86, 90, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(5, '6203260', 'Eka Saputra', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'PKWT', 'Male', 'SLTP', '1997-07-05', '2021-09-01', 1, 81, 88, 92, 86, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(6, '6203261', 'Fery Hernando', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'PKWT', 'Male', 'SLTP', '1991-05-12', '2021-09-01', 1, 81, 91, 88, 92, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(7, '6203262', 'Jefri Pranata', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'PKWT', 'Male', 'SLTP', '1996-06-26', '2021-09-01', 1, 80, 89, 91, 89, 89, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(8, '6203265', 'Oky Rifa Yandi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pengepakan', 'PKWT', 'Male', 'S1', '1992-11-13', '2021-09-01', 1, 79, 85, 89, 91, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(9, '6203266', 'Pras Setyia', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Daun Basah', 'PKWT', 'Male', 'SLTP', '1997-09-21', '2021-09-01', 1, 79, 86, 87, 88, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(10, '6203267', 'Rafly Andrean Nugrah', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'PKWT', 'Male', 'SLTP', '2001-10-26', '2021-11-01', 1, 80, 88, 90, 87, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(11, '6233669', 'Safrianto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Turun Daun', 'PKWT', 'Male', 'SLTP', '1993-09-29', '2022-07-01', 1, 78, 86, 86, 90, 91, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(12, '6501271', 'M Iqbal Anshori', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Non Grade', 'Male', 'SLTA', '1996-10-04', '2020-01-01', 1, 78, 90, 90, 86, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(13, '6606108', 'Emrizal', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Turun Daun', 'Band 1', 'Male', 'SLTP', '1967-12-16', '1992-04-27', 1, 85, 86, 92, 92, 89, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(14, '6606123', 'Beni Issumarno', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Tukang', 'Mekanik', 'Band 1', 'Male', 'SLTP', '1968-07-07', '1993-07-21', 2, 90, 87, 89, 92, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(15, '6606274', 'Sarianto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Male', 'SD', '1968-07-01', '1987-01-02', 5, 85, 91, 92, 88, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(16, '6606296', 'Edi Susanto', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Pekerja', 'Petugas Gudang', 'Band 1', 'Male', 'DIPLOMA', '1968-06-01', '1988-10-21', 1, 90, 89, 90, 90, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(17, '6606400', 'Fitriyeni', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Oksidasi Enzimatis', 'Band 1', 'Female', 'SD', '1968-12-10', '1989-09-21', 1, 90, 86, 88, 86, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(18, '6606451', 'Supriyono', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator HE Orthodoks', 'Band 1', 'Male', 'SLTA', '1968-12-03', '1990-07-21', 1, 87, 88, 91, 92, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(19, '6606508', 'Relisma Tambunan', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Female', 'SLTA', '1971-07-07', '1992-05-21', 1, 88, 90, 87, 89, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(20, '6606598', 'Sukamdi S.', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Male', 'SD', '1968-05-11', '1996-09-21', 2, 85, 85, 92, 90, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(21, '6606626', 'Latiffudin', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Male', 'SD', '1968-12-15', '1997-06-21', 1, 86, 89, 89, 87, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(22, '6606634', 'Zarlis Hariadi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pelayuan', 'Band 1', 'Male', 'SD', '1968-05-13', '1998-06-06', 1, 89, 87, 90, 88, 91, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(23, '6606854', 'Amirzal', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Male', 'SLTA', '1969-04-01', '1992-09-21', 1, 88, 91, 86, 88, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(24, '6606873', 'Idrus', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Pelayuan', 'Band 1', 'Male', 'SLTA', '1969-11-06', '1992-06-21', 2, 87, 90, 88, 90, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(25, '6606887', 'Zulfirman', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Male', 'SD', '1969-07-15', '1993-01-04', 2, 86, 88, 90, 92, 89, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(26, '6606910', 'Poniran', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Mandor', 'Mandor Bengkel Umum', 'Band 1', 'Male', 'SLTP', '1969-07-01', '1994-05-23', 2, 88, 91, 93, 91, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(27, '6606974', 'Darnis', 'F4', 'KB DANAU KEMBAR', 'Bagian Personalia Kebun & Umum', 'Pengamanan', 'Satpam', 'Band 1', 'Male', 'SLTA', '1969-08-03', '1996-01-01', 1, 85, 85, 88, 89, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(28, '6607013', 'Kisamudin', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator HE Orthodoks', 'Band 1', 'Male', 'SD', '1969-03-09', '1998-06-21', 1, 85, 90, 87, 90, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(29, '6607029', 'Erinna Simanjuntak', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Fermentasi', 'Band 1', 'Female', 'SLTA', '1969-12-07', '1997-03-21', 1, 85, 87, 90, 89, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(30, '6607033', 'Mayuris', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator HE Orthodoks', 'Band 1', 'Male', 'SLTP', '1969-04-04', '1999-08-21', 1, 87, 88, 93, 87, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(31, '6607037', 'Rosikun', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Male', 'SLTA', '1969-08-18', '1999-09-21', 5, 89, 91, 88, 88, 93, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(32, '6607049', 'Islami Mahdi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pelayuan', 'Band 1', 'Male', 'S1', '1969-11-30', '2000-05-21', 2, 90, 92, 86, 86, 91, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(33, '6607085', 'Haryati 1', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Fermentasi', 'Band 1', 'Female', 'SD', '1970-04-24', '1989-06-28', 1, 90, 90, 85, 85, 93, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(34, '6607141', 'Daliya Waruwu', 'F4', 'KB DANAU KEMBAR', 'Bagian Personalia Kebun & Umum', 'Pengamanan', 'Satpam', 'Band 1', 'Male', 'SD', '1970-02-25', '1991-08-06', 2, 88, 93, 87, 90, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(35, '6607307', 'Afrizal B', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pelayuan', 'Band 1', 'Male', 'SD', '1970-03-10', '1997-06-21', 2, 90, 90, 90, 86, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(36, '6607322', 'Paisan', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Male', 'SD', '1970-08-06', '1997-03-21', 2, 89, 85, 86, 91, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(37, '6607358', 'Peimin', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Male', 'SD', '1970-11-13', '1999-04-06', 2, 87, 93, 93, 87, 89, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(38, '6607370', 'Zul Asril', 'F4', 'KB DANAU KEMBAR', 'Bagian Personalia Kebun & Umum', 'Pengamanan', 'Satpam', 'Band 1', 'Male', 'SLTP', '1970-10-10', '2000-03-21', 2, 90, 91, 91, 93, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(39, '6607392', 'Ernida Yasin', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Penggulungan', 'Band 1', 'Female', 'SD', '1971-12-12', '1989-02-21', 2, 89, 88, 89, 88, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(40, '6607444', 'Nofrida', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Female', 'SLTA', '1971-11-29', '1992-11-21', 1, 87, 86, 93, 86, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(41, '6607446', 'Ade Susanto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggulungan Orthodoks', 'Band 1', 'Male', 'SLTP', '1971-12-11', '1992-05-21', 1, 85, 85, 89, 92, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(42, '6607464', 'Neneng Misnah', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Female', 'SD', '1971-01-05', '1994-03-07', 1, 90, 93, 90, 86, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(43, '6607479', 'Ribut Wahidi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggulungan Orthodoks', 'Band 1', 'Male', 'SD', '1971-09-14', '1994-03-07', 2, 91, 91, 86, 86, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(44, '6607491', 'Suwandi II H.', 'F4', 'KB DANAU KEMBAR', 'Bagian Personalia Kebun & Umum', 'Pengawas', 'Danton', 'Band 1', 'Male', 'SLTA', '1971-05-26', '1995-04-21', 2, 88, 92, 88, 90, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(45, '6607503', 'Driyanto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Male', 'SLTP', '1971-09-30', '1995-08-01', 1, 87, 87, 89, 87, 93, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(46, '6607550', 'Yessi Nusva', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggulungan Orthodoks', 'Band 1', 'Female', 'SLTA', '1971-12-05', '1996-01-01', 1, 85, 88, 91, 89, 89, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(47, '6607553', 'Tarsiem', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pembeberan', 'Band 1', 'Male', 'SD', '1971-03-05', '1997-01-06', 1, 87, 93, 87, 88, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(48, '6607566', 'Nursidi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Male', 'SD', '1971-12-12', '1997-06-21', 2, 89, 86, 90, 93, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(49, '6607577', 'Abdul Hasim', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Krani', 'Admin Gudang', 'Band 1', 'Male', 'SLTA', '1971-12-25', '1998-06-01', 1, 87, 90, 85, 91, 91, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(50, '6607603', 'Jasnar', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Operator', 'Operator Mesin Rumput', 'Band 1', 'Male', 'SLTP', '1972-01-17', '1989-09-21', 2, 85, 85, 88, 93, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(51, '6607620', 'Timur Matondang', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggulungan Orthodoks', 'Band 1', 'Female', 'SLTP', '1972-04-24', '1990-09-21', 1, 88, 91, 93, 85, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(52, '6607628', 'Endang Saputra', 'F4', 'KB DANAU KEMBAR', 'Bagian Personalia Kebun & Umum', 'Pengawas', 'Danton', 'Band 1', 'Male', 'SLTA', '1972-12-21', '1990-04-21', 1, 90, 88, 91, 90, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(53, '6607655', 'Mahrizal', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Pembeberan', 'Band 1', 'Male', 'SD', '1972-04-06', '1992-06-21', 5, 92, 85, 87, 89, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(54, '6607659', 'P. Sembiring', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Mandor', 'Mandor Listrik dan Pembangkit', 'Band 1', 'Male', 'SLTA', '1972-06-25', '1992-11-21', 2, 94, 86, 85, 87, 81, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(55, '6607671', 'Sugiah', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator Dryer Orthodoks', 'Band 1', 'Female', 'SD', '1972-10-01', '1992-10-21', 1, 88, 91, 92, 85, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(56, '6607712', 'Yondri Antoni', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Tukang', 'Mekanik Mesin Orthodoks', 'Band 1', 'Male', 'SLTA', '1972-01-19', '1995-02-21', 2, 87, 90, 89, 87, 82, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(57, '6607775', 'Sarifah Ainun Br. Harahap', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pembeberan', 'Band 1', 'Female', 'SLTA', '1972-08-25', '1996-06-21', 1, 89, 87, 85, 86, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(58, '6607789', 'Nanang Kuswoyo', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pelayuan', 'Band 1', 'Male', 'SLTP', '1972-03-13', '1997-01-06', 1, 91, 85, 89, 81, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(59, '6607811', 'Tarsan B', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Sortasi', 'Band 1', 'Male', 'SD', '1972-09-05', '1997-06-21', 2, 89, 89, 86, 85, 91, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(60, '6607823', 'Zurniati', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Female', 'SD', '1972-06-12', '1998-06-21', 2, 90, 92, 81, 91, 83, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(61, '6607836', 'Desri Yoza', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Tukang', 'Mekanik', 'Band 1', 'Male', 'DIPLOMA', '1972-12-18', '1998-04-21', 2, 86, 86, 85, 89, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(62, '6607918', 'Welni Gusrita', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Tester', 'Band 1', 'Female', 'SLTA', '1973-04-05', '1994-04-21', 2, 87, 83, 92, 92, 89, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(63, '6608019', 'Herman', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Male', 'SLTP', '1973-11-11', '1997-01-06', 1, 91, 87, 81, 90, 81, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(64, '6608024', 'Syahruddin P', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Turun Layu', 'Band 1', 'Male', 'SLTA', '1973-04-24', '1998-03-21', 1, 92, 85, 91, 82, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(65, '6608053', 'Ide Sidik Mandrofa', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Pengepakan', 'Band 1', 'Male', 'SLTP', '1973-11-11', '1999-01-21', 1, 90, 84, 90, 87, 82, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(66, '6608072', 'Ali Mandra Putra', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Male', 'SLTP', '1974-05-17', '1993-01-04', 1, 89, 90, 82, 85, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(67, '6608102', 'Zainal Colombo', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pelayuan', 'Band 1', 'Male', 'SLTA', '1974-02-25', '1995-06-21', 2, 88, 80, 87, 85, 83, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(68, '6608116', 'Soleh M', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Pengolahan', 'Band 1', 'Male', 'SLTA', '1974-07-03', '1995-06-21', 1, 87, 86, 82, 83, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(69, '6608133', 'Arifin Siregar', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Operator', 'Instalasi Air', 'Band 1', 'Male', 'SLTP', '1974-03-08', '1996-07-22', 1, 89, 89, 85, 89, 81, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(70, '6608198', 'Affendi Yanto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Male', 'SD', '1974-09-14', '1998-06-21', 2, 86, 90, 83, 87, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(71, '6608205', 'Robert Bagariang', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Tukang', 'Tukang Listrik', 'Band 1', 'Male', 'SLTA', '1974-08-30', '1999-08-21', 2, 87, 91, 89, 86, 81, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(72, '6608231', 'Mulyantinah', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Female', 'SD', '1975-03-14', '1994-03-07', 2, 90, 89, 86, 80, 89, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(73, '6608253', 'Hidayatul Mustaufit', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Operator', 'Operator SPTL', 'Band 1', 'Male', 'SLTA', '1975-04-10', '1995-02-21', 1, 89, 87, 92, 87, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(74, '6608299', 'Beni Siburian', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Operator', 'Analisa Pucuk', 'Band 1', 'Female', 'SLTA', '1975-05-14', '1996-01-01', 1, 91, 85, 83, 81, 80, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(75, '6608323', 'Helmita', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Quality Assurance', 'Band 1', 'Female', 'SD', '1975-05-11', '1997-04-21', 1, 90, 87, 82, 90, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(76, '6608332', 'Kasmidawati', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Female', 'SLTP', '1975-08-10', '1997-03-21', 2, 90, 92, 92, 83, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(77, '6608350', 'Partini', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Female', 'SD', '1975-05-01', '1998-06-21', 1, 89, 90, 85, 87, 82, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(78, '6608351', 'Muklis', 'F4', 'KB DANAU KEMBAR', 'Bagian Personalia Kebun & Umum', 'Pengamanan', 'Satpam', 'Band 1', 'Male', 'SLTA', '1969-05-10', '1993-03-05', 2, 88, 80, 83, 85, 91, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(79, '6608364', 'Jamalus', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Pengeringan Orthodoks', 'Band 1', 'Male', 'SD', '1975-01-05', '1999-01-21', 1, 87, 85, 92, 82, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(80, '6608388', 'Asril', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Penggulungan Oksidasi Enzimatis', 'Band 1', 'Male', 'SD', '1976-07-01', '1993-04-21', 5, 88, 80, 85, 85, 81, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(81, '6608422', 'Waris Sardi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pembeberan', 'Band 1', 'Male', 'SD', '1976-04-07', '1996-09-21', 1, 86, 85, 81, 88, 80, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(82, '6608429', 'Zulwendri', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator Dryer Orthodoks', 'Band 1', 'Male', 'S1', '1976-07-07', '1996-04-21', 1, 88, 90, 80, 82, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(83, '6608442', 'Rosita Hutagalung', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Penggilingan Oksidasi Enzimati', 'Band 1', 'Female', 'SLTP', '1976-02-22', '1997-03-21', 1, 85, 81, 82, 87, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(84, '6608443', 'Sumitri', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Juru Analisa Pucuk', 'Band 1', 'Female', 'SD', '1976-02-10', '1997-03-21', 1, 84, 80, 88, 80, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(85, '6608451', 'Margonoto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pembeberan / Daun Basah', 'Band 1', 'Male', 'SLTA', '1976-06-16', '1997-03-21', 2, 85, 82, 81, 83, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(86, '6608477', 'Parmayati', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Female', 'SD', '1976-05-19', '1998-03-21', 1, 86, 85, 90, 85, 83, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(87, '6608480', 'Abet Nego Sinaga', 'F4', 'KB DANAU KEMBAR', 'Bagian Teknik', 'Tukang', 'Mekanik Mesin Orthodoks', 'Band 1', 'Male', 'SLTA', '1976-06-19', '1998-02-21', 2, 88, 81, 83, 83, 80, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(88, '6608488', 'Hendra Rusman', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Mandor', 'Mandor Teknik', 'Band 1', 'Male', 'SLTA', '1976-01-26', '1999-08-21', 1, 90, 88, 87, 80, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(89, '6608562', 'Tugino', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Male', 'SD', '1977-09-03', '1997-06-21', 1, 84, 87, 85, 86, 82, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(90, '6608603', 'Yulista', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Petugas / Pelayan', 'Petugas Pengiriman', 'Band 1', 'Female', 'SLTA', '1977-11-25', '1999-04-21', 1, 87, 80, 86, 85, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(91, '6608614', 'Nofrita Likeria', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Krani', 'Admin I Pengolahan', 'Band 1', 'Female', 'SLTA', '1977-11-20', '2000-03-21', 1, 86, 83, 88, 90, 80, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(92, '6608622', 'Suryanto', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator HE Orthodoks', 'Band 1', 'Male', 'SD', '1978-01-13', '1996-05-21', 1, 90, 87, 80, 84, 86, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(93, '6608623', 'Jamiatun', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Petugas / Pelayan', 'Pelayan Kantor', 'Band 1', 'Female', 'SD', '1978-03-13', '1996-05-21', 2, 88, 81, 86, 84, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(94, '6608639', 'Sumi B', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Sortasi', 'Band 1', 'Female', 'SD', '1978-07-01', '1997-04-21', 2, 90, 85, 86, 82, 80, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(95, '6608655', 'Darsito', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Tukang', 'Mekanik', 'Band 1', 'Male', 'SD', '1978-04-08', '1998-06-21', 2, 86, 82, 85, 80, 81, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(96, '6608659', 'Mesra Siregar', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Sortasi', 'Band 1', 'Female', 'SD', '1978-06-12', '1998-01-21', 1, 90, 90, 81, 83, 84, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(97, '6608674', 'Dewarni Br. Harahap', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Operator', 'Analisa Pucuk', 'Band 1', 'Female', 'SLTA', '1978-03-13', '1999-01-21', 1, 84, 85, 83, 86, 80, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(98, '6608691', 'Efendi', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Mandor', 'Mandor Sortasi', 'Band 1', 'Male', 'SLTA', '1978-01-01', '2000-03-21', 1, 88, 88, 80, 88, 87, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(99, '6608696', 'Khairil Indra', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Tukang', 'Mekanik Mesin Orthodoks', 'Band 1', 'Male', 'SLTA', '1978-08-16', '2000-03-21', 2, 88, 90, 83, 80, 83, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(100, '6608701', 'Triwidiyanto', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Mandor', 'Mandor Teknik', 'Band 1', 'Male', 'SLTA', '1979-09-10', '1996-09-21', 1, 87, 80, 82, 87, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(101, '6608716', 'Yoko', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pelaksana Pengepakan', 'Band 1', 'Male', 'SD', '1979-11-18', '1998-03-21', 1, 90, 86, 90, 85, 81, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(102, '6608729', 'Sosilawati', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Pekerja', 'Pekerja Sortasi', 'Band 1', 'Female', 'SD', '1979-04-12', '1998-02-21', 1, 84, 88, 85, 88, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(103, '6609074', 'Antoni', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Operator', 'Operator Timbang IT3B', 'Band 1', 'Male', 'SLTA', '1976-03-24', '2001-08-21', 1, 86, 90, 81, 90, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(104, '6609082', 'Juliswar', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator Timbang Daun Basah', 'Band 1', 'Male', 'SLTA', '1974-06-02', '2001-05-21', 1, 88, 82, 88, 86, 91, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(105, '6609504', 'M. Rifad, S.Sos.', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Krani', 'Admin L.O Padang', 'Band 1', 'Male', 'S1', '1982-12-17', '2011-01-01', 1, 90, 81, 90, 89, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(106, '6609776', 'Roka Shyusya Batubara', 'F4', 'PB DANAU KEMBAR', 'Bagian Pengolahan Shift I', 'Operator', 'Operator Heat Exchanger Pengeringan', 'Band 1', 'Male', 'S1', '1993-08-11', '2020-03-01', 1, 86, 85, 89, 81, 85, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(107, '6609915', 'Ahmad Alfandi', 'F4', 'KB DANAU KEMBAR', 'Bagian Personalia Kebun & Umum', 'Krani', 'Krani Umum, Sekretariat & Sertifikasi', 'Band 1', 'Male', 'S1', '1997-03-25', '2021-11-15', 1, 87, 90, 90, 91, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(108, '6609934', 'Indah Febria', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Krani', 'Krani Akuntansi', 'Band 1', 'Female', 'DIPLOMA', '2000-02-01', '2021-11-15', 1, 88, 87, 87, 92, 92, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(109, '6609936', 'M. Iqbal Qasthari', 'F4', 'PB DANAU KEMBAR', 'Bagian Teknik', 'Krani', 'Krani Teknik', 'Band 1', 'Male', 'DIPLOMA', '1996-09-18', '2021-11-15', 1, 88, 88, 81, 81, 91, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(110, '6609942', 'Muhammad Iqbal', 'F4', 'KB DANAU KEMBAR', 'Bagian Tata Usaha', 'Krani', 'Krani Keuangan & Anggaran', 'Band 1', 'Male', 'DIPLOMA', '1995-11-06', '2021-11-15', 1, 86, 89, 81, 88, 90, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(111, '6609944', 'Muhammad Rendy', 'F4', 'KB DANAU KEMBAR', 'Bagian Kantor Tanaman', 'Krani', 'Admin KAP Produksi', 'Band 1', 'Male', 'DIPLOMA', '1996-12-25', '2021-11-15', 1, 85, 90, 86, 90, 88, '2023-05-04 06:14:42', '2023-05-04 06:14:42'),
(112, '6610108', 'Suhendrat', 'F4', 'KB DANAU KEMBAR', 'Bagian Teknik', 'Operator', 'Analisa Labor IT3B', 'Non Grade', 'Male', 'SLTP', '1992-06-10', '2022-08-27', 1, 85, 88, 90, 85, 81, '2023-05-04 06:14:42', '2023-05-04 06:14:42');

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
(1, '2014_10_12_000000_create_admin_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_18_083706_create_karyawan_table', 1);

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-05-04 06:14:41', '$2y$10$R5fdmCpf8pfD0UJnnh0AgeY89sJGctWrncfowg5OO656MfoG2xRle', 'IoJnLbetbq3be5iVDSwiEUSqipHbmCR5ubyLeyLmfPKvMFYOpR5WnvRdpJ1N', '2023-05-04 06:14:41', '2023-05-04 06:14:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
