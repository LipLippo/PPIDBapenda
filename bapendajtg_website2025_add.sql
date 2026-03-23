-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2026 at 03:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bapendajtg_website2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `ppid_kategori`
--

CREATE TABLE `ppid_kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppid_kategori`
--

INSERT INTO `ppid_kategori` (`id`, `nama_kategori`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Informasi Berkala', 'informasi-berkala', 1, '2026-03-12 20:04:29', '2026-03-12 20:04:29'),
(2, 'Informasi Setiap Saat', 'informasi-setiap-saat', 1, '2026-03-12 20:04:29', '2026-03-12 20:04:29'),
(3, 'Informasi Serta Merta', 'informasi-serta-merta', 1, '2026-03-12 20:04:29', '2026-03-12 20:04:29'),
(4, 'Informasi Dikecualikan', 'informasi-dikecualikan', 1, '2026-03-12 20:04:29', '2026-03-12 20:04:29'),
(5, 'Pengadaan Barang/Jasa', 'pengadaan-barang-jasa', 0, '2026-03-12 20:04:29', '2026-03-12 20:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `ppid_konten`
--

CREATE TABLE `ppid_konten` (
  `id` bigint UNSIGNED NOT NULL,
  `ppid_kategori_id` bigint UNSIGNED NOT NULL,
  `ppid_sub_kategori_id` bigint UNSIGNED DEFAULT NULL,
  `judul_isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_link` enum('url','image','pdf') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppid_konten`
--

INSERT INTO `ppid_konten` (`id`, `ppid_kategori_id`, `ppid_sub_kategori_id`, `judul_isi`, `link`, `tipe_link`, `is_active`, `created_at`, `updated_at`) VALUES
(42, 1, 36, 'Sejarah Dinas', '#', 'url', 1, '2026-03-15 05:33:09', '2026-03-15 05:33:09'),
(43, 1, 36, 'Tempat dan kedudukan', '#', 'url', 1, '2026-03-15 05:34:46', '2026-03-15 05:34:46'),
(44, 1, 36, 'Tugas, Fungsi dan  Struktur Organisasi', '#', 'url', 1, '2026-03-15 05:35:00', '2026-03-15 05:35:00'),
(45, 1, 36, 'Visi, Misi dan Program Unggulan', '#', 'url', 1, '2026-03-15 05:35:10', '2026-03-15 05:35:10'),
(46, 1, 36, 'Gambaran Umum  Unit Kerja', '#', 'url', 1, '2026-03-15 05:35:26', '2026-03-15 05:35:26'),
(47, 1, 36, 'Struktur Organisasi', '#', 'url', 1, '2026-03-15 05:35:34', '2026-03-15 05:35:34'),
(48, 1, 36, 'SDM Yang Dimiliki', '#', 'url', 1, '2026-03-15 05:35:42', '2026-03-15 05:35:42'),
(49, 1, 36, 'Profil Kepala Bapenda Prov. Jawa Tengah dan pejabat struktural Eselon III', '#', 'url', 1, '2026-03-15 05:35:52', '2026-03-15 05:35:52'),
(50, 1, 36, 'LHKPN', '#', 'url', 1, '2026-03-15 05:36:01', '2026-03-15 05:36:01'),
(51, 1, 36, 'LHKASN', '#', 'url', 1, '2026-03-15 05:36:23', '2026-03-15 05:36:23'),
(52, 1, 37, 'Kerangka Acuan Kerja (KAK)', '#', 'url', 1, '2026-03-15 05:57:06', '2026-03-15 05:57:06'),
(53, 1, 37, 'Informasi Target dan Realisasi Penerimaan Asli Daerah (PAD) Jawa Tengah', '#', 'url', 1, '2026-03-15 05:57:17', '2026-03-15 05:57:17'),
(54, 1, 37, 'Laporan Tahunan', '#', 'url', 1, '2026-03-15 05:57:26', '2026-03-15 05:57:26'),
(55, 1, 37, 'DPA', '#', 'url', 1, '2026-03-15 05:57:48', '2026-03-15 05:57:48'),
(56, 1, 37, 'RKA', '#', 'url', 1, '2026-03-15 05:57:58', '2026-03-15 05:57:58'),
(57, 1, 37, 'Informasi tentang rekruitmen pegawai', '#', 'url', 1, '2026-03-15 05:58:06', '2026-03-15 05:58:06'),
(59, 1, 38, 'Penilaian kinerja', '#', 'url', 1, '2026-03-15 06:04:49', '2026-03-15 06:04:49'),
(60, 1, 38, 'Informasi Program dan Kegiatan', '#', 'url', 1, '2026-03-15 06:05:13', '2026-03-15 06:05:13'),
(61, 1, 38, 'Laporan seluruh Program', '#', 'url', 1, '2026-03-15 06:05:23', '2026-03-15 06:05:23'),
(62, 1, 38, 'Laporan Umum & Keuangan tahunan', '#', 'url', 1, '2026-03-15 06:05:31', '2026-03-15 06:05:31'),
(63, 1, 38, 'Informasi lain yang menggambarkan akuntabilitas program dan/atau kegiatan', '#', 'url', 1, '2026-03-15 06:05:42', '2026-03-15 06:05:42'),
(64, 1, 38, 'Target dan penyerapan Kegiatan', '#', 'url', 1, '2026-03-15 06:05:49', '2026-03-15 06:05:49'),
(65, 1, 39, 'DPA Tahun 2025', '#', 'url', 1, '2026-03-15 06:06:25', '2026-03-15 06:06:25'),
(66, 1, 39, 'RKA  Tahun 2025', '#', 'url', 1, '2026-03-15 06:06:36', '2026-03-15 06:06:36'),
(67, 1, 39, 'Laporan Keuangan Tahun 2025', '#', 'url', 1, '2026-03-15 06:06:51', '2026-03-15 06:06:51'),
(68, 1, 39, 'LRA Tahun 2025', '#', 'url', 1, '2026-03-15 06:07:01', '2026-03-15 06:07:01'),
(69, 1, 39, 'Neraca Komparatif Tahun 2025', '#', 'url', 1, '2026-03-15 06:07:17', '2026-03-15 06:07:17'),
(70, 1, 39, 'Laporan Operasional 2025', '#', 'url', 1, '2026-03-15 06:07:27', '2026-03-15 06:07:27'),
(71, 1, 39, 'Laporan Perubahan Ekuitas Tahun 2025', '#', 'url', 1, '2026-03-15 06:07:44', '2026-03-15 06:07:44'),
(72, 1, 39, 'Catatan Atas Laporan Keuangan (CALK) Tahun 2025', '#', 'url', 1, '2026-03-15 06:07:56', '2026-03-15 06:07:56'),
(73, 1, 40, 'Jumlah permohonan informasi publik yang diterima', '#', 'url', 1, '2026-03-15 06:08:11', '2026-03-15 06:08:11'),
(74, 1, 40, 'Waktu yang diperlukan dalam memenuhi setiap permohonan informasi publik', '#', 'url', 1, '2026-03-15 06:08:19', '2026-03-15 06:08:19'),
(75, 1, 40, 'Jumlah permohonan informasi publik yang dikabulkan dan yang ditolak', '#', 'url', 1, '2026-03-15 06:08:29', '2026-03-15 06:08:29'),
(76, 1, 40, 'Alasan Penolakan Permohonan Informasi Publik', '#', 'url', 1, '2026-03-15 06:08:37', '2026-03-15 06:08:37'),
(77, 1, 41, 'Mekanisme Permohonan Informasi', '#', 'url', 1, '2026-03-15 06:08:56', '2026-03-15 06:08:56'),
(78, 1, 41, 'Biaya Permohonan Informasi', '#', 'url', 1, '2026-03-15 06:09:05', '2026-03-15 06:09:05'),
(79, 1, 41, 'Form Permohonan Informasi', '#', 'url', 1, '2026-03-15 06:09:15', '2026-03-15 06:09:15'),
(80, 1, 42, 'Mekanisme Pengelolaan Keberatan Informasi', '#', 'url', 1, '2026-03-15 06:09:27', '2026-03-15 06:09:27'),
(81, 1, 42, 'Form Pengajuan Keberatan Atas Informasi Publik', '#', 'url', 1, '2026-03-15 06:09:34', '2026-03-15 06:09:34'),
(82, 1, 42, 'Tata Cara Penyelesaian Sengketa Informasi', '#', 'url', 1, '2026-03-15 06:09:43', '2026-03-15 06:09:43'),
(83, 1, 43, 'Daftar Peraturan dan Keputusa', '#', 'url', 1, '2026-03-15 06:09:59', '2026-03-15 06:09:59'),
(84, 4, 44, 'SK Informasi Dikecualikan', '#', 'url', 1, '2026-03-22 20:18:27', '2026-03-22 20:18:27'),
(85, 4, 45, 'Naskah Uji Konsekuensi', '#', 'url', 1, '2026-03-22 20:18:46', '2026-03-22 20:18:46'),
(86, 3, 46, 'Informasi link /kanal aduan', '#', 'url', 1, '2026-03-22 20:19:05', '2026-03-22 20:19:05'),
(87, 3, 46, 'Informasi Tata Cara/Mekanisme Melakukan Pengaduan', '#', 'url', 1, '2026-03-22 20:19:12', '2026-03-22 20:19:12'),
(88, 3, 47, 'Prosedur Evakuasi Gempa Bumi dan Kebakaran', '#', 'url', 1, '2026-03-22 20:19:24', '2026-03-22 20:19:24'),
(89, 3, 47, 'SOP apabila terjadi kondisi Force Majeure (Kondisi Kahar)', '#', 'url', 1, '2026-03-22 20:19:34', '2026-03-22 20:19:34'),
(90, 3, 48, 'Sarana Prasarana Pelayanan Informasi untuk Penyandang Disabilitas', '#', 'url', 1, '2026-03-22 20:19:45', '2026-03-22 20:19:45'),
(91, 3, 49, 'SOP Penyusunan DIP', '#', 'url', 1, '2026-03-22 20:19:58', '2026-03-22 20:19:58'),
(92, 3, 49, 'SOP Penanganan Sengketa Informasi Publik', '#', 'url', 1, '2026-03-22 20:20:09', '2026-03-22 20:20:09'),
(93, 3, 49, 'SOP Maklumat Pelayanan Informasi Publik', '#', 'url', 1, '2026-03-22 20:20:22', '2026-03-22 20:20:22'),
(94, 3, 49, 'SOP Pelayanan Informasi Publik', '#', 'url', 1, '2026-03-22 20:20:33', '2026-03-22 20:20:33'),
(95, 3, 49, 'SOP Uji Konsekuensi Informasi Publik', '#', 'url', 1, '2026-03-22 20:20:42', '2026-03-22 20:20:42'),
(96, 3, 49, 'SOP Pemeriksaan Akurasi Informasi Publik yang Akan Disampaikan Kepada Publik', '#', 'url', 1, '2026-03-22 20:20:53', '2026-03-22 20:20:53'),
(97, 3, 49, 'SOP Pemungutan Pajak Bahan Bakar Kendaraan Bermotor', '#', 'url', 1, '2026-03-22 20:21:07', '2026-03-22 20:21:07'),
(98, 3, 49, 'SOP Pemungutan Pajak Air Permukaan', '#', 'url', 1, '2026-03-22 20:21:16', '2026-03-22 20:21:16'),
(99, 3, 49, 'SOP Pemungutan Pajak Alat Berat', '#', 'url', 1, '2026-03-22 20:21:26', '2026-03-22 20:21:26'),
(100, 2, 50, 'Daftar Informasi Publik (DIP)', '#', 'url', 1, '2026-03-22 20:22:08', '2026-03-22 20:22:08'),
(101, 2, 51, 'Daftar Peraturan dan Keputusan Yang Terkait dengan Pelayanan Informasi Publik', 'https://website.bapenda.jatengprov.go.id/ppid/page/perundang-undangan', 'url', 1, '2026-03-22 20:22:32', '2026-03-22 20:23:43'),
(102, 2, 51, 'Daftar Peraturan dan Keputusan Yang Telah Ditetapkan Bapenda Prov. Jateng', 'https://website.bapenda.jatengprov.go.id/ppid/page/perundang-undangan', 'url', 1, '2026-03-22 20:24:06', '2026-03-22 20:24:06'),
(103, 2, 52, 'Informasi Wajib Berkala', '#', 'url', 1, '2026-03-22 20:24:41', '2026-03-22 20:24:41'),
(104, 2, 52, 'Informasi Setiap Saat', '#', 'url', 1, '2026-03-22 20:24:52', '2026-03-22 20:24:52'),
(105, 2, 53, 'Profil Pimpinan dan Pejabat Struktural', '#', 'url', 1, '2026-03-22 20:25:09', '2026-03-22 20:25:09'),
(106, 2, 53, 'Informasi Profil PPID', '#', 'url', 1, '2026-03-22 20:25:36', '2026-03-22 20:25:36'),
(107, 2, 53, 'PERGUB Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah', '#', 'url', 1, '2026-03-22 20:25:47', '2026-03-22 20:26:13'),
(108, 2, 53, 'PERGUB Unit Pelaksana Teknis (UPT/UPPD) Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah', '#', 'url', 1, '2026-03-22 20:26:20', '2026-03-22 20:26:20'),
(109, 2, 53, 'Profil Kepegawaian Badan Pengelola Pendapatan Daerah Provinsi Jawa Tengah', '#', 'url', 1, '2026-03-22 20:26:28', '2026-03-22 20:26:28'),
(110, 2, 53, 'Informasi Pendidikan dan Pelatihan Pegawai Bapenda Jawa Tengah', '#', 'url', 1, '2026-03-22 20:26:37', '2026-03-22 20:26:37'),
(111, 2, 53, 'Anggaran Secara Umum/ Khusus Serta Laporan Keuangannya', '#', 'url', 1, '2026-03-22 20:26:46', '2026-03-22 20:26:46'),
(112, 2, 53, 'Dokumen Pelaksanaan Anggaran (DPA)', '#', 'url', 1, '2026-03-22 20:27:08', '2026-03-22 20:27:08'),
(113, 2, 53, 'Rencana Kerja dan Anggaran (RKA)', '#', 'url', 1, '2026-03-22 20:27:13', '2026-03-22 20:27:13'),
(114, 2, 53, 'Rencana Kerja Operasional (RKO)', '#', 'url', 1, '2026-03-22 20:27:23', '2026-03-22 20:27:23'),
(115, 2, 53, 'Kerangka Acuan Kerja (KAK)', '#', 'url', 1, '2026-03-22 20:27:32', '2026-03-22 20:27:32'),
(116, 2, 53, 'Laporan Tahunan Dinas', '#', 'url', 1, '2026-03-22 20:27:40', '2026-03-22 20:27:40'),
(117, 2, 53, 'Laporan Program dan Kegiatan yang telah dijalankan', '#', 'url', 1, '2026-03-22 20:27:48', '2026-03-22 20:27:48'),
(118, 2, 53, 'LHKPN Kepala Dinas dan Pejabat Struktural', '#', 'url', 1, '2026-03-22 20:28:00', '2026-03-22 20:28:00'),
(119, 2, 53, 'Perjanjian Kinerja Kepala Dinas', '#', 'url', 1, '2026-03-22 20:28:08', '2026-03-22 20:28:08'),
(120, 2, 53, 'Perjanjian Kinerja Pejabat Struktural Lainnya', '#', 'url', 1, '2026-03-22 20:28:17', '2026-03-22 20:28:17'),
(121, 2, 53, 'Rencana Kerja (RENJA) Badan Pengelola Pendapatan Daerah Prov. Jawa Tengah', '#', 'url', 1, '2026-03-22 20:28:30', '2026-03-22 20:28:30'),
(122, 2, 53, 'Rencana Strategis (RENSTRA) Badan Pengelola Pendapatan Daerah Prov. Jawa Tengah', '#', 'url', 1, '2026-03-22 20:28:37', '2026-03-22 20:28:37'),
(123, 2, 54, 'Informasi tentang Perjanjian Kerjasama terkait layanan Samsat', '#', 'url', 1, '2026-03-22 20:28:52', '2026-03-22 20:28:52'),
(124, 2, 55, 'Rencana Kebutuhan Pengadaan Barang', '#', 'url', 1, '2026-03-22 20:29:33', '2026-03-22 20:29:33'),
(125, 2, 55, 'Rencana Umum Pengadaan (RUP)', '#', 'url', 1, '2026-03-22 20:29:45', '2026-03-22 20:30:40'),
(126, 2, 55, 'KAK/ Spesifikasi Teknis', '#', 'url', 1, '2026-03-22 20:30:02', '2026-03-22 20:30:02'),
(127, 2, 55, 'Persyaratan Penyedia', '#', 'url', 1, '2026-03-22 20:30:15', '2026-03-22 20:30:15'),
(128, 2, 55, 'Rancangan Kontrak', '#', 'url', 1, '2026-03-22 20:30:28', '2026-03-22 20:30:28'),
(129, 2, 56, 'Surat menyurat terkait pelaksanaan  tugas, fungsi dan wewenang pejabat', '#', 'url', 1, '2026-03-22 20:31:00', '2026-03-22 20:31:00'),
(130, 2, 57, 'Persyaratan perizinan penelitian / magang', '#', 'url', 1, '2026-03-22 20:31:15', '2026-03-22 20:31:15'),
(131, 2, 58, 'Laporan Tahunan Barang Milik Daerah', '#', 'url', 1, '2026-03-22 20:31:31', '2026-03-22 20:31:31'),
(132, 2, 59, 'Informasi Pelanggaran yang Dilaporkan masyarakat', '#', 'url', 1, '2026-03-22 20:31:42', '2026-03-22 20:31:42'),
(133, 2, 60, 'Informasi Pelanggaran yang Ditemukan Dalam Pengawasan Internal', '#', 'url', 1, '2026-03-22 20:31:54', '2026-03-22 20:31:54'),
(134, 2, 61, 'Kegiatan Pelayanan Informasi Publik', '#', 'url', 1, '2026-03-22 20:32:10', '2026-03-22 20:32:10'),
(135, 2, 62, 'Agenda Kerja Dinas', '#', 'url', 1, '2026-03-22 20:32:20', '2026-03-22 20:32:20'),
(136, 2, 63, 'Hasil Penelitian', '#', 'url', 1, '2026-03-22 20:32:36', '2026-03-22 20:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `ppid_sub_kategori`
--

CREATE TABLE `ppid_sub_kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `ppid_kategori_id` bigint UNSIGNED NOT NULL,
  `nama_sub_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppid_sub_kategori`
--

INSERT INTO `ppid_sub_kategori` (`id`, `ppid_kategori_id`, `nama_sub_kategori`, `is_active`, `created_at`, `updated_at`) VALUES
(36, 1, 'Informasi Tentang Profil Badan Publik', 1, '2026-03-15 05:33:09', '2026-03-15 05:33:09'),
(37, 1, 'Ringkasan Program dan Kegiatan Yang Sedang Dijalankan Bapenda Jawa Tengah', 1, '2026-03-15 05:57:06', '2026-03-15 05:57:06'),
(38, 1, 'Ringkasan Program dan Kegiatan Yang Telah Dijalankan Bapenda Jawa Tengah', 1, '2026-03-15 06:04:49', '2026-03-15 06:04:49'),
(39, 1, 'Ringkasan Laporan Keuangan/ Pengelolaan Anggaran (yang telah diaudit)', 1, '2026-03-15 06:06:25', '2026-03-15 06:06:25'),
(40, 1, 'Ringkasan Laporan Akses Informasi Publik', 1, '2026-03-15 06:08:11', '2026-03-15 06:08:11'),
(41, 1, 'Prosedur Memperoleh Informasi Publik', 1, '2026-03-15 06:08:56', '2026-03-15 06:08:56'),
(42, 1, 'Prosedur Pengajuan Keberatan dan Proses Penyelesaian Sengketa Informasi Publik', 1, '2026-03-15 06:09:27', '2026-03-15 06:09:27'),
(43, 1, 'Informasi Tentang Peraturan/Keputusan/Kebijakan Bapenda Jateng yang mengikat atau berdampak bagi publik', 1, '2026-03-15 06:09:59', '2026-03-15 06:09:59'),
(44, 4, 'Informasi yang Dikecualikan', 1, '2026-03-22 20:18:27', '2026-03-22 20:18:27'),
(45, 4, 'Uji Konsekuensi', 1, '2026-03-22 20:18:46', '2026-03-22 20:18:46'),
(46, 3, 'Informasi Tata Cara Pengaduan Penyalahgunaan Wewenang atau Pelanggaran', 1, '2026-03-22 20:19:05', '2026-03-22 20:19:05'),
(47, 3, 'Prosedur Peringatan Dini dan Evakuasi Keadaan Darurat', 1, '2026-03-22 20:19:24', '2026-03-22 20:19:24'),
(48, 3, 'Pelayanan Mendukung Aksesibilitas Bagi Penyandang Disabilitas', 1, '2026-03-22 20:19:45', '2026-03-22 20:19:45'),
(49, 3, 'Standar Operasional Prosedur Pada Bapenda Prov. Jawa Tengah', 1, '2026-03-22 20:19:58', '2026-03-22 20:19:58'),
(50, 2, 'Daftar Informasi Publik', 1, '2026-03-22 20:22:08', '2026-03-22 20:22:08'),
(51, 2, 'Informasi tentang Peraturan, keputusan, dan/atau kebijakan', 1, '2026-03-22 20:22:32', '2026-03-22 20:22:32'),
(52, 2, 'Informasi Lengkap Yang Wajib Diumumkan Berkala Dan Disediakan Setiap Saat', 1, '2026-03-22 20:24:41', '2026-03-22 20:24:41'),
(53, 2, 'Informasi tentang Organisasi, Administrasi Kepegawaian, dan Keuangan', 1, '2026-03-22 20:25:09', '2026-03-22 20:25:09'),
(54, 2, 'Surat Perjanjian dengan Pihak Ketiga', 1, '2026-03-22 20:28:52', '2026-03-22 20:28:52'),
(55, 2, 'Informasi Pengadaan Barang dan Jasa', 1, '2026-03-22 20:29:33', '2026-03-22 20:29:33'),
(56, 2, 'Surat Menyurat Terkait Pelaksanaan Tugas, Fungsi dan Wewenang Pejabat', 1, '2026-03-22 20:31:00', '2026-03-22 20:31:00'),
(57, 2, 'Persyaratan Perizinan dan Izin yang Diterbitkan Bapenda Jawa Tengah', 1, '2026-03-22 20:31:15', '2026-03-22 20:31:15'),
(58, 2, 'Data Aset dan Inventaris Barang', 1, '2026-03-22 20:31:31', '2026-03-22 20:31:31'),
(59, 2, 'Informasi Pelanggaran yang Dilaporkan Masyarakat', 1, '2026-03-22 20:31:42', '2026-03-22 20:31:42'),
(60, 2, 'Informasi Pelanggaran yang Ditemukan Dalam Pengawasan Internal', 1, '2026-03-22 20:31:54', '2026-03-22 20:31:54'),
(61, 2, 'Informasi Kegiatan Pelayanan Informasi Publik', 1, '2026-03-22 20:32:10', '2026-03-22 20:32:10'),
(62, 2, 'Agenda Kerja Dinas', 1, '2026-03-22 20:32:20', '2026-03-22 20:32:20'),
(63, 2, 'Informasi Hasil Penelitian', 1, '2026-03-22 20:32:36', '2026-03-22 20:32:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ppid_kategori`
--
ALTER TABLE `ppid_kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ppid_kategori_slug_unique` (`slug`);

--
-- Indexes for table `ppid_konten`
--
ALTER TABLE `ppid_konten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ppid_konten_ppid_kategori_id_foreign` (`ppid_kategori_id`),
  ADD KEY `ppid_konten_ppid_sub_kategori_id_foreign` (`ppid_sub_kategori_id`);

--
-- Indexes for table `ppid_sub_kategori`
--
ALTER TABLE `ppid_sub_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ppid_sub_kategori_ppid_kategori_id_foreign` (`ppid_kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ppid_kategori`
--
ALTER TABLE `ppid_kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ppid_konten`
--
ALTER TABLE `ppid_konten`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `ppid_sub_kategori`
--
ALTER TABLE `ppid_sub_kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
