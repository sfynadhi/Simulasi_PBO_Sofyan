-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2026 at 03:06 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_1a_sofyanapriadhin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Andi Wijaya', 'SMAN 1 Jakarta', '85.50', '200000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 3 Bandung', '78.00', '200000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMA Kristen Yusuf', '92.25', '200000.00', 'Reguler', 'Kedokteran', 'Kampus Barat', NULL, NULL, NULL, NULL),
(4, 'Dedi Setiawan', 'MAN 2 Kebumen', '80.00', '200000.00', 'Reguler', 'Teknik Sipil', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMKN 1 Surabaya', '88.75', '200000.00', 'Reguler', 'Akuntansi', 'Kampus Selatan', NULL, NULL, NULL, NULL),
(6, 'Fajar Nugroho', 'SMAN 5 Yogyakarta', '75.50', '200000.00', 'Reguler', 'Manajemen', 'Kampus Selatan', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 1 Cilacap', '83.40', '200000.00', 'Reguler', 'Psikologi', 'Kampus Barat', NULL, NULL, NULL, NULL),
(8, 'Hendra Gunawan', 'SMAN 2 Semarang', '90.00', '150000.00', 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Sari', 'SMA Taruna Nusantara', '94.50', '150000.00', 'Prestasi', 'Hubungan Internasional', 'Kampus Utama', 'Debat Bahasa Inggris', 'Internasional', NULL, NULL),
(10, 'Joko Susilo', 'SMAN 1 Surakarta', '82.00', '150000.00', 'Prestasi', 'Ilmu Komunikasi', 'Kampus Selatan', 'Futsal', 'Provinsi', NULL, NULL),
(11, 'Kurniawan', 'SMAN 8 Jakarta', '89.10', '150000.00', 'Prestasi', 'Teknik Elektro', 'Kampus Utama', 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
(12, 'Larasati', 'SMA Stella Duce', '91.00', '150000.00', 'Prestasi', 'Desain Komunikasi Visual', 'Kampus Barat', 'Seni Lukis', 'Nasional', NULL, NULL),
(13, 'Muhammad Risky', 'MAN 1 Medan', '86.30', '150000.00', 'Prestasi', 'Hukum', 'Kampus Barat', 'Tahfidz Al-Quran', 'Nasional', NULL, NULL),
(14, 'Nadia Utami', 'SMAN 3 Malang', '95.00', '150000.00', 'Prestasi', 'Farmasi', 'Kampus Utama', 'Olimpiade Kimia', 'Internasional', NULL, NULL),
(15, 'Oki Pratama', 'SMAN 1 Denpasar', '87.00', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-990/KEDINASAN/2026', 'Kementerian Perhubungan'),
(16, 'Putri Ayu', 'SMAN 1 Makassar', '84.50', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-214/STIS/2026', 'Badan Pusat Statistik'),
(17, 'Qomaruddin', 'MAN 3 Palembang', '81.20', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-881/STAN/2026', 'Kementerian Keuangan'),
(18, 'Rini Amalia', 'SMAN 2 Padang', '89.80', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-552/IPDN/2026', 'Kementerian Dalam Negeri'),
(19, 'Sultan Malik', 'SMA Balikpapan', '83.00', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-102/KEDINASAN/2026', 'Badan Meteorologi Klimatologi dan Geofisika'),
(20, 'Taufik Hidayat', 'SMAN 1 Pontianak', '86.00', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-404/SIBER/2026', 'Badan Siber dan Sandi Negara'),
(21, 'Vina Panduwinata', 'SMAN 70 Jakarta', '90.50', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-707/MENPAN/2026', 'Kementerian PANRB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
