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


-- Dumping database structure for pendaftaran_sma
DROP DATABASE IF EXISTS `pendaftaran_sma`;
CREATE DATABASE IF NOT EXISTS `pendaftaran_sma` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pendaftaran_sma`;

-- Dumping structure for table pendaftaran_sma.agama
DROP TABLE IF EXISTS `agama`;
CREATE TABLE IF NOT EXISTS `agama` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pendaftaran_sma.agama: ~7 rows (approximately)
REPLACE INTO `agama` (`id`, `nama`) VALUES
	(6, 'Budha'),
	(5, 'Hindu'),
	(1, 'Islam'),
	(4, 'Katolik'),
	(7, 'Konghucu'),
	(2, 'Kristen'),
	(3, 'Lainnya');

-- Dumping structure for table pendaftaran_sma.asal_sekolah
DROP TABLE IF EXISTS `asal_sekolah`;
CREATE TABLE IF NOT EXISTS `asal_sekolah` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `status` enum('negeri','swasta') DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pendaftaran_sma.asal_sekolah: ~2 rows (approximately)
REPLACE INTO `asal_sekolah` (`id`, `nama`, `status`, `alamat`) VALUES
	(1, 'SMP 1 Kapuas', 'negeri', 'Jalan kapuas'),
	(2, 'SMP Muhammadiyah', 'swasta', 'Jalan kapuas');

-- Dumping structure for table pendaftaran_sma.cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.cache: ~2 rows (approximately)
REPLACE INTO `cache` (`key`, `value`, `expiration`) VALUES
	('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1714989668),
	('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1714989668;', 1714989668);

-- Dumping structure for table pendaftaran_sma.cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pendaftaran_sma.calon
DROP TABLE IF EXISTS `calon`;
CREATE TABLE IF NOT EXISTS `calon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nisn` varchar(10) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('l','p') DEFAULT NULL,
  `tempat_kelahiran` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_agama` int DEFAULT NULL,
  `status_dalam_keluarga` enum('kandung','angkat') DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `id_asal_sekolah` int DEFAULT NULL,
  `tahun_lulus` int DEFAULT NULL,
  `created_at` datetime DEFAULT (now()),
  `status` enum('diproses','ditolak','diterima') DEFAULT 'diproses',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nisn` (`nisn`),
  UNIQUE KEY `nik` (`nik`),
  KEY `id_agama` (`id_agama`),
  KEY `id_asal_sekolah` (`id_asal_sekolah`),
  CONSTRAINT `calon_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`),
  CONSTRAINT `calon_ibfk_2` FOREIGN KEY (`id_asal_sekolah`) REFERENCES `asal_sekolah` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pendaftaran_sma.calon: ~7 rows (approximately)
REPLACE INTO `calon` (`id`, `nisn`, `nik`, `nama`, `jenis_kelamin`, `tempat_kelahiran`, `tanggal_lahir`, `id_agama`, `status_dalam_keluarga`, `alamat`, `no_hp`, `id_asal_sekolah`, `tahun_lulus`, `created_at`, `status`) VALUES
	(1, '1234', '1234567', 'Jordi Irawan', 'l', 'Lamunti Baru', '2004-05-20', 1, 'kandung', 'Jalan teuku Umar', '08788', 1, 2023, '2024-05-02 12:30:36', 'ditolak'),
	(4, '12341', '12345671', 'Jordi Irawan', 'l', 'Lamunti Baru', '2004-05-20', 1, 'kandung', 'Jalan teuku Umar', '087881', 1, 2024, '2024-05-01 12:30:36', 'diterima'),
	(5, '123231', '12312345671', 'Jordi Irawan', 'l', 'Lamunti Baru', '2004-05-20', 1, 'kandung', 'Jalan teuku Umar', '0872881', 1, 2024, '2024-05-01 12:30:36', 'diproses'),
	(6, '213213', '2234234', 'asdasd', 'l', 'Lamunti Baru', '2024-05-04', 1, 'kandung', 'Jalan teuku Umar', '13213', 2, 2024, '2024-05-04 14:08:24', 'diterima'),
	(7, '213123', '1231231', 'asdasd', 'p', 'Lamunti Baru', '2024-05-04', 1, 'kandung', 'Jalan teuku Umar', '1312313', 2, 2024, '2024-05-04 14:36:13', 'diproses'),
	(9, '234234', '4234234', 'sdasd', 'p', 'Lamunti Baru', '2024-02-04', 1, 'angkat', 'Jalan teuku Umar', '087884', 2, 2024, '2024-05-04 15:46:44', 'diproses'),
	(10, '1323123', '12312313', 'SADASD', 'p', 'ASDASDASD', '2024-05-20', 1, 'kandung', 'ASDASDASD', '213123213', 2, 2022, '2024-05-04 16:03:14', 'diproses');

-- Dumping structure for view pendaftaran_sma.cek_seleksi
DROP VIEW IF EXISTS `cek_seleksi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `cek_seleksi` (
	`id` INT(10) NOT NULL,
	`nisn` VARCHAR(10) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`nama` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`status` ENUM('diproses','ditolak','diterima') NULL COLLATE 'utf8mb4_0900_ai_ci',
	`asal_sekolah` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`agama` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`jenis_kelamin` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`tanggal_daftar` DATETIME NULL,
	`ibu` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`ayah` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`wali` VARCHAR(255) NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Dumping structure for procedure pendaftaran_sma.create_calon
DROP PROCEDURE IF EXISTS `create_calon`;
DELIMITER //
CREATE PROCEDURE `create_calon`(
    nisn_p varchar(10),
    nik_p varchar(16),
    nama_p varchar(255),
    jenis_kelamin_p enum ('l','p'),
    tempat_kelahiran_p varchar(255),
    tanggal_lahir_p date,
    id_agama_p varchar(10),
    status_dalam_keluarga_p enum ('kandung','angkat'),
    alamat_p varchar(255),
    no_hp_p varchar(255),
    id_asal_sekolah_p varchar(10),
    tahun_lulus_p int
)
begin
    INSERT INTO calon (nisn,
                       nik,
                       nama,
                       jenis_kelamin,
                       tempat_kelahiran,
                       tanggal_lahir,
                       id_agama,
                       status_dalam_keluarga,
                       alamat,
                       no_hp,
                       id_asal_sekolah,
                       tahun_lulus) value
        (
         nisn_p,
         nik_p,
         nama_p,
         jenis_kelamin_p,
         tempat_kelahiran_p,
         tanggal_lahir_p,
         id_agama_p,
         status_dalam_keluarga_p,
         alamat_p,
         no_hp_p,
         id_asal_sekolah_p,
        tahun_lulus_p
            );
end//
DELIMITER ;

-- Dumping structure for procedure pendaftaran_sma.create_ortu_wali
DROP PROCEDURE IF EXISTS `create_ortu_wali`;
DELIMITER //
CREATE PROCEDURE `create_ortu_wali`(
    peran_p enum ('ibu','ayah','wali'),
    ortu_wali_dari_calon_p int,
    nama_p varchar(255),
    id_pendidikan_terakhir_p int,
    id_pekerjaan_p int,
    penghasilan_per_bulan_p double,
    no_hp_p varchar(255)
)
begin
    insert into ortu_wali(peran,
                          ortu_wali_dari_calon,
                          nama,
                          id_pendidikan_terakhir,
                          id_pekerjaan,
                          penghasilan_per_bulan,
                          no_hp) value (
                                        peran_p,
                                        ortu_wali_dari_calon_p,
                                        nama_p,
                                        id_pendidikan_terakhir_p,
                                        id_pekerjaan_p,
                                        penghasilan_per_bulan_p,
                                        no_hp_p
        );
end//
DELIMITER ;

-- Dumping structure for table pendaftaran_sma.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.failed_jobs: ~0 rows (approximately)

-- Dumping structure for function pendaftaran_sma.getAyahByCalonId
DROP FUNCTION IF EXISTS `getAyahByCalonId`;
DELIMITER //
CREATE FUNCTION `getAyahByCalonId`(_calon_id int) RETURNS varchar(255) CHARSET utf8mb4
    DETERMINISTIC
begin
    declare ayah varchar(255);
    select nama into ayah from ortu_wali where ortu_wali_dari_calon = _calon_id and peran = 'ayah';
    return ayah;
end//
DELIMITER ;

-- Dumping structure for function pendaftaran_sma.getCalonIdByNik
DROP FUNCTION IF EXISTS `getCalonIdByNik`;
DELIMITER //
CREATE FUNCTION `getCalonIdByNik`(_nik varchar(16)) RETURNS int
    DETERMINISTIC
begin
    declare calon_id int;
    select id into calon_id from calon where nik = _nik;
    return calon_id;
    end//
DELIMITER ;

-- Dumping structure for function pendaftaran_sma.getIbuByCalonId
DROP FUNCTION IF EXISTS `getIbuByCalonId`;
DELIMITER //
CREATE FUNCTION `getIbuByCalonId`(_calon_id int) RETURNS varchar(255) CHARSET utf8mb4
    DETERMINISTIC
begin
    declare ibu varchar(255);
    select nama into ibu from ortu_wali where ortu_wali_dari_calon = _calon_id and peran = 'ibu';
    return ibu;
end//
DELIMITER ;

-- Dumping structure for function pendaftaran_sma.getJenisKelamin
DROP FUNCTION IF EXISTS `getJenisKelamin`;
DELIMITER //
CREATE FUNCTION `getJenisKelamin`(_jenis_kelamin char(1)) RETURNS varchar(255) CHARSET utf8mb4
    DETERMINISTIC
begin
    if _jenis_kelamin = 'l' then
        return 'Laki-laki';
    else
        return 'Perempuan';
    end if;
end//
DELIMITER ;

-- Dumping structure for function pendaftaran_sma.getWaliByCalonId
DROP FUNCTION IF EXISTS `getWaliByCalonId`;
DELIMITER //
CREATE FUNCTION `getWaliByCalonId`(_calon_id int) RETURNS varchar(255) CHARSET utf8mb4
    DETERMINISTIC
begin
    declare wali varchar(255);
    select nama into wali from ortu_wali where ortu_wali_dari_calon = _calon_id and peran = 'wali';
    return wali;
end//
DELIMITER ;

-- Dumping structure for table pendaftaran_sma.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.jobs: ~0 rows (approximately)

-- Dumping structure for table pendaftaran_sma.job_batches
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.job_batches: ~0 rows (approximately)

-- Dumping structure for table pendaftaran_sma.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.migrations: ~11 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2024_05_02_051113_create_agama_table', 0),
	(2, '2024_05_02_051113_create_asal_sekolah_table', 0),
	(3, '2024_05_02_051113_create_calon_table', 0),
	(4, '2024_05_02_051113_create_ortu_wali_table', 0),
	(5, '2024_05_02_051113_create_pekerjaan_table', 0),
	(6, '2024_05_02_051113_create_pendidikan_table', 0),
	(7, '2024_05_02_051116_add_foreign_keys_to_calon_table', 0),
	(8, '2024_05_02_051116_add_foreign_keys_to_ortu_wali_table', 0),
	(9, '0001_01_01_000000_create_users_table', 1),
	(10, '0001_01_01_000001_create_cache_table', 1),
	(11, '0001_01_01_000002_create_jobs_table', 1);

-- Dumping structure for table pendaftaran_sma.ortu_wali
DROP TABLE IF EXISTS `ortu_wali`;
CREATE TABLE IF NOT EXISTS `ortu_wali` (
  `id` int NOT NULL AUTO_INCREMENT,
  `peran` enum('ibu','ayah','wali') DEFAULT NULL,
  `ortu_wali_dari_calon` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_pendidikan_terakhir` int DEFAULT NULL,
  `id_pekerjaan` int DEFAULT NULL,
  `penghasilan_per_bulan` double DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ortu_wali_dari_calon` (`ortu_wali_dari_calon`),
  KEY `id_pendidikan_terakhir` (`id_pendidikan_terakhir`),
  KEY `id_pekerjaan` (`id_pekerjaan`),
  CONSTRAINT `ortu_wali_ibfk_1` FOREIGN KEY (`ortu_wali_dari_calon`) REFERENCES `calon` (`id`),
  CONSTRAINT `ortu_wali_ibfk_2` FOREIGN KEY (`id_pendidikan_terakhir`) REFERENCES `pendidikan` (`id`),
  CONSTRAINT `ortu_wali_ibfk_3` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pendaftaran_sma.ortu_wali: ~0 rows (approximately)

-- Dumping structure for table pendaftaran_sma.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pendaftaran_sma.pekerjaan
DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pendaftaran_sma.pekerjaan: ~9 rows (approximately)
REPLACE INTO `pekerjaan` (`id`, `nama`) VALUES
	(1, 'Buruh'),
	(2, 'Lainnya'),
	(8, 'Nelayan'),
	(7, 'Perangkat Desa'),
	(5, 'PNS'),
	(9, 'PRogrammer'),
	(3, 'Tani'),
	(6, 'TNI/POLRI'),
	(4, 'Wiraswasta');

-- Dumping structure for table pendaftaran_sma.pendidikan
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pendaftaran_sma.pendidikan: ~8 rows (approximately)
REPLACE INTO `pendidikan` (`id`, `nama`) VALUES
	(8, 'DIPLOMA'),
	(9, 'S1'),
	(10, 'S2'),
	(11, 'S3'),
	(1, 'SD/MI'),
	(7, 'SMA/SMK/MA'),
	(6, 'SMP/MTs'),
	(2, 'Tidak sekolah');

-- Dumping structure for table pendaftaran_sma.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.sessions: ~2 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('5tCFSR5nN09vgnT1ebTo0RFmaomZxSmQkkohKMSx', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQzl5STRWZlJpMkpZV1R2N2czZzB0TURkVEo2emtxOHh5NUU1bVZIayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRNLmZlSUtJSkZkVno1cjBKaENrTHVlQnZ1MFFIc2MvQ04xbTlLenFxS1FpNVV0MmhXVm1heSI7fQ==', 1714993681),
	('nAQU9lBUEoxXYQgtdU0KZ4Dx2Hx1IjflS7Ii5J8b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzU4VGhDdERjdloxSkprUjMweE5WS2NTNWZ4MEE2VnlLa1R4amQ1ZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9sb2dpbiI7fX0=', 1714991117);

-- Dumping structure for procedure pendaftaran_sma.total_status_calon
DROP PROCEDURE IF EXISTS `total_status_calon`;
DELIMITER //
CREATE PROCEDURE `total_status_calon`()
begin
    SELECT count(*) as total_calon, status from calon group by status;
end//
DELIMITER ;

-- Dumping structure for procedure pendaftaran_sma.trend_pendaftaran
DROP PROCEDURE IF EXISTS `trend_pendaftaran`;
DELIMITER //
CREATE PROCEDURE `trend_pendaftaran`()
begin
select DATE(created_at) as date, count(*) as count from calon group by date(created_at) order by date(created_at) asc limit 7  ;

    end//
DELIMITER ;

-- Dumping structure for table pendaftaran_sma.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pendaftaran_sma.users: ~1 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Jordi Irawan', 'jordirwn@gmail.com', NULL, '$2y$12$M.feIKIJFdVz5r0JhCkLueBvu0QHsc/CN1m9KzqqKQi5Ut2hWVmay', 'oHfPCIGtTtAkwmvia9iLvrZ2JucfmekeNyQ2mgXxBHgYluymeA5y0BfgWRpC', '2024-05-01 22:26:44', '2024-05-01 22:26:44');

-- Dumping structure for trigger pendaftaran_sma.delete_calon_with_ortu_wali_
DROP TRIGGER IF EXISTS `delete_calon_with_ortu_wali_`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `delete_calon_with_ortu_wali_` BEFORE DELETE ON `calon` FOR EACH ROW delete from ortu_wali where ortu_wali_dari_calon = OLD.id//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view pendaftaran_sma.cek_seleksi
DROP VIEW IF EXISTS `cek_seleksi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `cek_seleksi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `cek_seleksi` AS select `c`.`id` AS `id`,`c`.`nisn` AS `nisn`,`c`.`nama` AS `nama`,`c`.`status` AS `status`,`asl`.`nama` AS `asal_sekolah`,`a`.`nama` AS `agama`,`getJenisKelamin`(`c`.`jenis_kelamin`) AS `jenis_kelamin`,`c`.`created_at` AS `tanggal_daftar`,`getIbuByCalonId`(`c`.`id`) AS `ibu`,`getAyahByCalonId`(`c`.`id`) AS `ayah`,`getWaliByCalonId`(`c`.`id`) AS `wali` from ((`calon` `c` join `agama` `a` on((`c`.`id_agama` = `a`.`id`))) join `asal_sekolah` `asl` on((`c`.`id_asal_sekolah` = `asl`.`id`))) order by `c`.`created_at` desc;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
