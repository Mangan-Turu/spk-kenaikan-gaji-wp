-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for spk_stefan
CREATE DATABASE IF NOT EXISTS `spk_stefan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `spk_stefan`;

-- Dumping structure for table spk_stefan.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `status_karyawan` enum('Tetap','Kontrak','Magang') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Tetap',
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT '1',
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table spk_stefan.karyawan: ~20 rows (approximately)
DELETE FROM `karyawan`;
INSERT INTO `karyawan` (`id`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `email`, `jabatan`, `departemen`, `tanggal_masuk`, `status_karyawan`, `foto`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(97, 'K2RY001', 'Karyawan 1', 'L', 'Jakarta', '1990-03-15', 'Jl. Merdeka No. 1', '081234567891', 'karyawan1@example.com', 'Manager HRD', 'HRD', '2015-06-01', 'Tetap', 'uploads/foto/1.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(98, 'K2RY002', 'Karyawan 2', 'P', 'Bandung', '1991-04-20', 'Jl. Sudirman No. 2', '081234567892', 'karyawan2@example.com', 'Staff HRD', 'HRD', '2016-07-01', 'Tetap', 'uploads/foto/2.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(99, 'K2RY003', 'Karyawan 3', 'L', 'Surabaya', '1989-05-10', 'Jl. Gatot Subroto No. 3', '081234567893', 'karyawan3@example.com', 'Staff IT', 'IT', '2017-08-01', 'Kontrak', 'uploads/foto/3.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(100, 'K2RY004', 'Karyawan 4', 'P', 'Medan', '1992-06-25', 'Jl. Ahmad Yani No. 4', '081234567894', 'karyawan4@example.com', 'Programmer', 'IT', '2018-09-01', 'Tetap', 'uploads/foto/4.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(101, 'K2RY005', 'Karyawan 5', 'L', 'Semarang', '1988-07-30', 'Jl. Diponegoro No. 5', '081234567895', 'karyawan5@example.com', 'Supervisor', 'Finance', '2019-10-01', 'Tetap', 'uploads/foto/5.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(102, 'K2RY006', 'Karyawan 6', 'P', 'Yogyakarta', '1993-08-15', 'Jl. Kaliurang No. 6', '081234567896', 'karyawan6@example.com', 'Staff Finance', 'Finance', '2020-11-01', 'Kontrak', 'uploads/foto/6.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(103, 'K2RY007', 'Karyawan 7', 'L', 'Bekasi', '1994-09-10', 'Jl. Patriot No. 7', '081234567897', 'karyawan7@example.com', 'Staff Marketing', 'Marketing', '2021-01-01', 'Tetap', 'uploads/foto/7.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(104, 'K2RY008', 'Karyawan 8', 'P', 'Bogor', '1995-10-05', 'Jl. Raya Bogor No. 8', '081234567898', 'karyawan8@example.com', 'Manager Marketing', 'Marketing', '2021-03-01', 'Tetap', 'uploads/foto/8.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(105, 'K2RY009', 'Karyawan 9', 'L', 'Depok', '1996-11-01', 'Jl. Margonda No. 9', '081234567899', 'karyawan9@example.com', 'Staff HRD', 'HRD', '2021-05-01', 'Kontrak', 'uploads/foto/9.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(106, 'K2RY010', 'Karyawan 10', 'P', 'Tangerang', '1997-12-12', 'Jl. Gading Serpong No. 10', '081234567900', 'karyawan10@example.com', 'Staff Admin', 'Administrasi', '2021-07-01', 'Tetap', 'uploads/foto/10.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(107, 'K2RY011', 'Karyawan 11', 'L', 'Jakarta', '1990-03-15', 'Jl. Merdeka No. 11', '081234567901', 'karyawan11@example.com', 'Manager HRD', 'HRD', '2015-06-01', 'Tetap', 'uploads/foto/11.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(108, 'K2RY012', 'Karyawan 12', 'P', 'Bandung', '1991-04-20', 'Jl. Sudirman No. 12', '081234567902', 'karyawan12@example.com', 'Staff HRD', 'HRD', '2016-07-01', 'Tetap', 'uploads/foto/12.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(109, 'K2RY013', 'Karyawan 13', 'L', 'Surabaya', '1989-05-10', 'Jl. Gatot Subroto No. 13', '081234567903', 'karyawan13@example.com', 'Staff IT', 'IT', '2017-08-01', 'Kontrak', 'uploads/foto/13.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(110, 'K2RY014', 'Karyawan 14', 'P', 'Medan', '1992-06-25', 'Jl. Ahmad Yani No. 14', '081234567904', 'karyawan14@example.com', 'Programmer', 'IT', '2018-09-01', 'Tetap', 'uploads/foto/14.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(111, 'K2RY015', 'Karyawan 15', 'L', 'Semarang', '1988-07-30', 'Jl. Diponegoro No. 15', '081234567905', 'karyawan15@example.com', 'Supervisor', 'Finance', '2019-10-01', 'Tetap', 'uploads/foto/15.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(112, 'K2RY016', 'Karyawan 16', 'P', 'Yogyakarta', '1993-08-15', 'Jl. Kaliurang No. 16', '081234567906', 'karyawan16@example.com', 'Staff Finance', 'Finance', '2020-11-01', 'Kontrak', 'uploads/foto/16.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(113, 'K2RY017', 'Karyawan 17', 'L', 'Bekasi', '1994-09-10', 'Jl. Patriot No. 17', '081234567907', 'karyawan17@example.com', 'Staff Marketing', 'Marketing', '2021-01-01', 'Tetap', 'uploads/foto/17.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(114, 'K2RY018', 'Karyawan 18', 'P', 'Bogor', '1995-10-05', 'Jl. Raya Bogor No. 18', '081234567908', 'karyawan18@example.com', 'Manager Marketing', 'Marketing', '2021-03-01', 'Tetap', 'uploads/foto/18.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(115, 'K2RY019', 'Karyawan 19', 'L', 'Depok', '1996-11-01', 'Jl. Margonda No. 19', '081234567909', 'karyawan19@example.com', 'Staff HRD', 'HRD', '2021-05-01', 'Kontrak', 'uploads/foto/19.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1),
	(116, 'K2RY020', 'Karyawan 20', 'P', 'Tangerang', '1997-12-12', 'Jl. Gading Serpong No. 20', '081234567910', 'karyawan20@example.com', 'Staff Admin', 'Administrasi', '2021-07-01', 'Tetap', 'uploads/foto/20.jpg', '2025-05-26 17:26:16', '2025-05-26 17:26:16', 1, 1);

-- Dumping structure for table spk_stefan.kriteria
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `atribut` enum('benefit','cost') NOT NULL,
  `bobot` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table spk_stefan.kriteria: ~6 rows (approximately)
DELETE FROM `kriteria`;
INSERT INTO `kriteria` (`id`, `kode`, `nama`, `atribut`, `bobot`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'C1', 'Kinerja', 'benefit', 30, '2025-05-23 18:13:52', '2025-05-23 18:15:29', 1, 1),
	(2, 'C2', 'Presensi', 'benefit', 20, '2025-05-23 18:13:52', '2025-05-23 18:15:29', 1, 1),
	(3, 'C3', 'Lama Bekerja', 'benefit', 15, '2025-05-23 18:13:52', '2025-05-23 18:15:30', 1, 1),
	(4, 'C4', 'Kerja sama tim', 'benefit', 15, '2025-05-23 18:13:52', '2025-05-23 18:15:31', 1, 1),
	(5, 'C5', 'Disiplin & Tanggung Jawab', 'benefit', 10, '2025-05-23 18:13:52', '2025-05-23 18:15:31', 1, 1),
	(6, 'C6', 'Pelayanan', 'benefit', 10, '2025-05-23 18:13:52', '2025-05-23 18:15:32', 1, 1);

-- Dumping structure for table spk_stefan.kriteria_sub
CREATE TABLE IF NOT EXISTS `kriteria_sub` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kriteria_id` int NOT NULL,
  `nilai` int NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kriteria_id` (`kriteria_id`),
  CONSTRAINT `kriteria_sub_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table spk_stefan.kriteria_sub: ~31 rows (approximately)
DELETE FROM `kriteria_sub`;
INSERT INTO `kriteria_sub` (`id`, `kriteria_id`, `nilai`, `deskripsi`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(195, 1, 1, 'masukan nilai', '2025-05-23 22:11:21', '2025-05-26 14:36:20', 1, 1),
	(196, 1, 2, 'Kurang', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(197, 1, 3, 'Cukup', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(198, 1, 4, 'Baik', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(199, 1, 5, 'Sangat Baik', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(200, 2, 1, 'masukan nilai', '2025-05-23 22:11:21', '2025-05-23 23:11:40', 1, 1),
	(201, 2, 2, '85-89%', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(202, 2, 3, '90-94%', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(203, 2, 4, '95-97%', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(204, 2, 5, '>98%', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(205, 3, 1, 'masukan nilai', '2025-05-23 22:11:21', '2025-05-23 23:11:51', 1, 1),
	(206, 3, 2, '1-2 Tahun', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(207, 3, 3, '2-3 Tahun', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(208, 3, 4, '3-4 Tahun', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(209, 3, 5, '>5 Tahun', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(210, 4, 1, 'Sangat Kurang', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(211, 4, 2, 'Kurang', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(212, 4, 3, 'masukan nilai', '2025-05-23 22:11:21', '2025-05-26 14:36:51', 1, 1),
	(213, 4, 4, 'Baik', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(214, 4, 5, 'Sangat Baik', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(215, 5, 1, 'Sangat Kurang', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(216, 5, 2, 'Kurang', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(217, 5, 3, 'Cukup', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(218, 5, 4, 'Baik', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(219, 5, 5, 'Sangat Baik', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(220, 6, 1, 'Sangat Kurang', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(221, 6, 2, 'Kurang', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(222, 6, 3, 'Cukup', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(223, 6, 4, 'Baik', '2025-05-23 22:11:21', '2025-05-23 22:11:21', 1, 1),
	(224, 6, 5, 'masukan nilai', '2025-05-23 22:11:21', '2025-05-26 14:36:59', 1, 1),
	(225, 1, 6, 'masukan nilai', '2025-05-23 22:38:31', '2025-05-26 14:36:30', 1, 1);

-- Dumping structure for table spk_stefan.penilaian
CREATE TABLE IF NOT EXISTS `penilaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `karyawan_id` int NOT NULL,
  `kriteria_id` int NOT NULL,
  `kriteria_sub_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `karyawan_id` (`karyawan_id`),
  KEY `kriteria_id` (`kriteria_id`),
  KEY `kriteria_sub_id` (`kriteria_sub_id`),
  CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`kriteria_sub_id`) REFERENCES `kriteria_sub` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=491 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table spk_stefan.penilaian: ~120 rows (approximately)
DELETE FROM `penilaian`;
INSERT INTO `penilaian` (`id`, `karyawan_id`, `kriteria_id`, `kriteria_sub_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(352, 97, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(353, 97, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(354, 97, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(355, 97, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(356, 97, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(357, 97, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(359, 98, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(360, 98, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(361, 98, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(362, 98, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(363, 98, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(364, 98, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(366, 99, 1, 195, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(367, 99, 2, 201, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(368, 99, 3, 208, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(369, 99, 4, 213, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(370, 99, 5, 218, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(371, 99, 6, 223, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(373, 100, 1, 197, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(374, 100, 2, 201, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(375, 100, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(376, 100, 4, 213, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(377, 100, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(378, 100, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(380, 101, 1, 195, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(381, 101, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(382, 101, 3, 208, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(383, 101, 4, 213, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(384, 101, 5, 217, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(385, 101, 6, 222, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(387, 102, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(388, 102, 2, 203, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(389, 102, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(390, 102, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(391, 102, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(392, 102, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(394, 103, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(395, 103, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(396, 103, 3, 205, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(397, 103, 4, 211, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(398, 103, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(399, 103, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(401, 104, 1, 195, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(402, 104, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(403, 104, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(404, 104, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(405, 104, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(406, 104, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(408, 105, 1, 195, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(409, 105, 2, 203, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(410, 105, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(411, 105, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(412, 105, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(413, 105, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(415, 106, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(416, 106, 2, 201, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(417, 106, 3, 206, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(418, 106, 4, 210, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(419, 106, 5, 216, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(420, 106, 6, 223, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(422, 107, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(423, 107, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(424, 107, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(425, 107, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(426, 107, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(427, 107, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(429, 108, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(430, 108, 2, 203, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(431, 108, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(432, 108, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(433, 108, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(434, 108, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(436, 109, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(437, 109, 2, 203, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(438, 109, 3, 207, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(439, 109, 4, 213, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(440, 109, 5, 218, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(441, 109, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(443, 110, 1, 225, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(444, 110, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(445, 110, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(446, 110, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(447, 110, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(448, 110, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(450, 111, 1, 197, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(451, 111, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(452, 111, 3, 207, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(453, 111, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(454, 111, 5, 218, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(455, 111, 6, 223, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(457, 112, 1, 195, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(458, 112, 2, 203, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(459, 112, 3, 206, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(460, 112, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(461, 112, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(462, 112, 6, 223, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(464, 113, 1, 196, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(465, 113, 2, 202, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(466, 113, 3, 208, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(467, 113, 4, 213, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(468, 113, 5, 217, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(469, 113, 6, 223, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(471, 114, 1, 195, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(472, 114, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(473, 114, 3, 208, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(474, 114, 4, 213, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(475, 114, 5, 218, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(476, 114, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(478, 115, 1, 199, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(479, 115, 2, 204, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(480, 115, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(481, 115, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(482, 115, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(483, 115, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(485, 116, 1, 196, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(486, 116, 2, 202, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(487, 116, 3, 209, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(488, 116, 4, 214, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(489, 116, 5, 219, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1),
	(490, 116, 6, 224, '2025-05-26 17:26:16', '2025-05-26 10:31:27', 1, 1);

-- Dumping structure for table spk_stefan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table spk_stefan.users: ~1 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Abdullah Faza Farhan', 'admin@mail.com', '$2y$10$2ORR5mV0cmqcwB1WVyE1C.Ik/gnF5jZ/jvNYUz0XuFVxF9hFGL9xe', 'admin', '2025-05-08 16:10:01', NULL);

-- Dumping structure for trigger spk_stefan.after_insert_karyawan
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `after_insert_karyawan` AFTER INSERT ON `karyawan` FOR EACH ROW BEGIN
  INSERT INTO penilaian (karyawan_id, kriteria_id, kriteria_sub_id, created_by, updated_by)
  SELECT NEW.id, k.id, NULL, NEW.created_by, NEW.created_by
  FROM kriteria k;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
