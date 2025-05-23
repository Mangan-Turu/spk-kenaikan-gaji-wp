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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table spk_stefan.kriteria: ~6 rows (approximately)
DELETE FROM `kriteria`;
INSERT INTO `kriteria` (`id`, `kode`, `nama`, `atribut`, `bobot`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'C1', 'Kinerja', 'benefit', 30, '2025-05-23 16:14:44', '2025-05-23 16:14:44', 1, 1),
	(2, 'C2', 'Presensi', 'benefit', 20, '2025-05-23 16:14:44', '2025-05-23 16:14:44', 1, 1),
	(3, 'C3', 'Lama Bekerja', 'benefit', 15, '2025-05-23 16:14:44', '2025-05-23 16:14:44', 1, 1),
	(4, 'C4', 'Kerja sama tim', 'benefit', 15, '2025-05-23 16:14:44', '2025-05-23 16:14:44', 1, 1),
	(5, 'C5', 'Disiplin & Tanggung Jawab', 'benefit', 10, '2025-05-23 16:14:44', '2025-05-23 16:14:44', 1, 1),
	(6, 'C6', 'Pelayanan', 'benefit', 10, '2025-05-23 16:14:44', '2025-05-23 16:30:43', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table spk_stefan.kriteria_sub: ~25 rows (approximately)
DELETE FROM `kriteria_sub`;
INSERT INTO `kriteria_sub` (`id`, `kriteria_id`, `nilai`, `deskripsi`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 1, 1, 'Sangat Kurang', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(2, 1, 2, 'Kurang', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(3, 1, 3, 'Cukup', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(4, 1, 4, 'Baik', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(5, 1, 5, 'Sangat Baik', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(6, 2, 1, '<85%', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(7, 2, 2, '85-89%', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(8, 2, 3, '90-94%', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(9, 2, 4, '95-97%', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(10, 2, 5, '>98%', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(11, 3, 1, '<1 Tahun', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(12, 3, 2, '1-2 Tahun', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(13, 3, 3, '2-3 Tahun', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(14, 3, 4, '3-4 Tahun', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(15, 3, 5, '>5 Tahun', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(16, 4, 1, 'Sangat Kurang', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(17, 4, 2, 'Kurang', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(18, 4, 3, 'Cukup', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(19, 4, 4, 'Baik', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(20, 4, 5, 'Sangat Baik', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(21, 5, 1, 'Sangat Kurang', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(22, 5, 2, 'Kurang', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(23, 5, 3, 'Cukup', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(24, 5, 4, 'Baik', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1),
	(25, 5, 5, 'Sangat Baik', '2025-05-23 16:42:57', '2025-05-23 16:42:57', 1, 1);

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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
