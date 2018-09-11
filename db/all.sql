-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table darul_ulum.d_akun
CREATE TABLE IF NOT EXISTS `d_akun` (
  `a_id` varchar(50) NOT NULL,
  `a_nama` varchar(100) DEFAULT NULL,
  `a_sekolah` int(11) DEFAULT NULL,
  `a_type_akun` varchar(50) DEFAULT NULL,
  `a_akun_dka` varchar(50) DEFAULT 'DEBET',
  `a_aktif` enum('Y','N') DEFAULT 'Y',
  `a_master_akun` varchar(50) DEFAULT NULL,
  `a_master_nama` varchar(300) DEFAULT NULL,
  `a_group_neraca` int(11) DEFAULT NULL,
  `a_group_laba_rugi` int(11) DEFAULT NULL,
  `a_saldo_awal` double DEFAULT NULL,
  `a_tanggal_pembuka` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_akun: ~24 rows (approximately)
/*!40000 ALTER TABLE `d_akun` DISABLE KEYS */;
REPLACE INTO `d_akun` (`a_id`, `a_nama`, `a_sekolah`, `a_type_akun`, `a_akun_dka`, `a_aktif`, `a_master_akun`, `a_master_nama`, `a_group_neraca`, `a_group_laba_rugi`, `a_saldo_awal`, `a_tanggal_pembuka`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('111101', 'KAS SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11110', 'KAS', 1, NULL, 5000000, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:20:33', '2018-09-12 01:20:33'),
	('111102', 'KAS MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11110', 'KAS', 1, NULL, 5000000, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:20:33', '2018-09-12 01:20:33'),
	('111201', 'KAS BANK SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11120', 'KAS BANK', 1, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:21:40', '2018-09-12 01:21:40'),
	('111202', 'KAS BANK MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11120', 'KAS BANK', 1, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:21:40', '2018-09-12 01:21:40'),
	('112101', 'PIUTANG USAHA SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:23:12', '2018-09-12 01:23:12'),
	('112102', 'PIUTANG USAHA MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:23:12', '2018-09-12 01:23:12'),
	('112201', 'PIUTANG KARYAWAN SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', 1, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:23:32', '2018-09-12 01:23:32'),
	('112202', 'PIUTANG KARYAWAN MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', 1, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:23:32', '2018-09-12 01:23:32'),
	('211101', 'HUTANG USAHA SDN DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:24:33', '2018-09-12 01:24:33'),
	('211102', 'HUTANG USAHA MTS DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:24:33', '2018-09-12 01:24:33'),
	('411101', 'PENDAPATAN DANA BOS SDN DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, 2, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:25:58', '2018-09-12 01:25:58'),
	('411102', 'PENDAPATAN DANA BOS MTS DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, 2, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:25:58', '2018-09-12 01:25:58'),
	('411201', 'PENDAPATAN USAHA SDN DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:26:32', '2018-09-12 01:26:32'),
	('411202', 'PENDAPATAN USAHA MTS DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:26:32', '2018-09-12 01:26:32'),
	('610001', 'GAJI STAFF SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '61000', 'GAJI STAFF', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:27:02', '2018-09-12 01:27:02'),
	('610002', 'GAJI STAFF MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '61000', 'GAJI STAFF', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:27:02', '2018-09-12 01:27:02'),
	('621001', 'BIAYA ATK SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '62100', 'BIAYA ATK', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:27:43', '2018-09-12 01:27:43'),
	('621002', 'BIAYA ATK MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '62100', 'BIAYA ATK', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:27:43', '2018-09-12 01:27:43'),
	('624001', 'BIAYA LAIN SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '62400', 'BIAYA LAIN', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:28:12', '2018-09-12 01:28:12'),
	('624002', 'BIAYA LAIN MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '62400', 'BIAYA LAIN', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:28:12', '2018-09-12 01:28:12'),
	('626001', 'BIAYA PERAWATAN SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '62600', 'BIAYA PERAWATAN', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:29:02', '2018-09-12 01:29:02'),
	('626002', 'BIAYA PERAWATAN MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '62600', 'BIAYA PERAWATAN', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:29:02', '2018-09-12 01:29:02'),
	('710001', 'DEPRESIASI ASET SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '71000', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:29:39', '2018-09-12 01:29:39'),
	('710002', 'DEPRESIASI ASET MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '71000', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:29:40', '2018-09-12 01:29:40');
/*!40000 ALTER TABLE `d_akun` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_daftar_menu
CREATE TABLE IF NOT EXISTS `d_daftar_menu` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_nama` varchar(50) NOT NULL,
  `dm_group` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dm_id`,`dm_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_daftar_menu: ~16 rows (approximately)
/*!40000 ALTER TABLE `d_daftar_menu` DISABLE KEYS */;
REPLACE INTO `d_daftar_menu` (`dm_id`, `dm_nama`, `dm_group`, `created_at`, `updated_at`) VALUES
	(1, 'SETTING JABATAN', 1, '2018-09-09 19:46:54', '2018-09-09 20:14:23'),
	(2, 'SETTING USER', 1, '2018-09-09 20:04:24', '2018-09-09 20:14:05'),
	(3, 'SETTING HAK AKSES', 1, '2018-09-09 20:04:33', '2018-09-09 20:14:10'),
	(4, 'SETTING DAFTAR MENU', 1, '2018-09-09 20:04:55', '2018-09-09 20:14:13'),
	(5, 'MASTER SEKOLAH', 2, '2018-09-11 23:01:09', '2018-09-11 23:01:09'),
	(6, 'MASTER POSISI', 2, '2018-09-11 23:01:13', '2018-09-11 23:01:13'),
	(7, 'MASTER STAFF', 2, '2018-09-11 23:01:17', '2018-09-11 23:01:17'),
	(8, 'GROUP AKUN KEUANGAN', 3, '2018-09-11 23:01:28', '2018-09-11 23:01:28'),
	(9, 'MASTER AKUN KEUANGAN', 3, '2018-09-11 23:01:34', '2018-09-11 23:01:34'),
	(10, 'PENERIMAAN SISWA BARU', 4, '2018-09-11 23:01:48', '2018-09-11 23:01:48'),
	(11, 'DATA SISWA', 4, '2018-09-11 23:01:55', '2018-09-11 23:01:55'),
	(12, 'ALUMNI SISWA', 4, '2018-09-11 23:02:01', '2018-09-11 23:02:01'),
	(13, 'PEMASUKAN LAIN', 5, '2018-09-11 23:02:27', '2018-09-11 23:02:27'),
	(14, 'PEMBAYARAN SPP', 5, '2018-09-11 23:02:32', '2018-09-11 23:02:32'),
	(15, 'PETTY CASH', 6, '2018-09-11 23:02:48', '2018-09-11 23:02:48'),
	(16, 'BUKTI KAS KELUAR', 6, '2018-09-11 23:02:52', '2018-09-11 23:02:52');
/*!40000 ALTER TABLE `d_daftar_menu` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_group_akun
CREATE TABLE IF NOT EXISTS `d_group_akun` (
  `ga_id` int(11) DEFAULT NULL,
  `ga_nama` varchar(50) DEFAULT NULL,
  `ga_jenis_group` varchar(50) DEFAULT NULL,
  `ga_jenis_neraca` varchar(50) DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_group_akun: ~2 rows (approximately)
/*!40000 ALTER TABLE `d_group_akun` DISABLE KEYS */;
REPLACE INTO `d_group_akun` (`ga_id`, `ga_nama`, `ga_jenis_group`, `ga_jenis_neraca`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'ASET TETAP', 'neraca', 'A', '2018-09-11 11:48:27', '2018-09-11 20:59:24', 'DASD', 'DASD'),
	(2, 'PENDAPATAN DARI NEGARA', 'labarugi', NULL, '2018-09-11 13:58:56', '2018-09-11 20:59:35', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_group_akun` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_grup_menu
CREATE TABLE IF NOT EXISTS `d_grup_menu` (
  `gm_id` int(11) NOT NULL,
  `gm_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_grup_menu: ~7 rows (approximately)
/*!40000 ALTER TABLE `d_grup_menu` DISABLE KEYS */;
REPLACE INTO `d_grup_menu` (`gm_id`, `gm_nama`) VALUES
	(1, 'SETTING'),
	(2, 'MASTER'),
	(3, 'KEUANGAN'),
	(4, 'KESISWAAN'),
	(5, 'KAS MASUK'),
	(6, 'KAS KELUAR'),
	(7, 'LAPORAN');
/*!40000 ALTER TABLE `d_grup_menu` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_hak_akses
CREATE TABLE IF NOT EXISTS `d_hak_akses` (
  `ha_id` int(11) NOT NULL,
  `ha_dt` int(11) NOT NULL,
  `ha_level` int(11) NOT NULL,
  `ha_menu` varchar(50) DEFAULT NULL,
  `aktif` bit(1) NOT NULL DEFAULT b'0',
  `tambah` bit(1) NOT NULL DEFAULT b'0',
  `ubah` bit(1) NOT NULL DEFAULT b'0',
  `hapus` bit(1) NOT NULL DEFAULT b'0',
  `sekolah` bit(1) NOT NULL DEFAULT b'0',
  `global` bit(1) NOT NULL DEFAULT b'0',
  `print` bit(1) NOT NULL DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ha_id`,`ha_dt`,`ha_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_hak_akses: ~80 rows (approximately)
/*!40000 ALTER TABLE `d_hak_akses` DISABLE KEYS */;
REPLACE INTO `d_hak_akses` (`ha_id`, `ha_dt`, `ha_level`, `ha_menu`, `aktif`, `tambah`, `ubah`, `hapus`, `sekolah`, `global`, `print`, `created_at`, `updated_at`) VALUES
	(5, 1, 1, 'SETTING USER', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:05', '2018-09-11 23:16:04'),
	(5, 2, 2, 'SETTING USER', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:05', '2018-09-11 23:14:58'),
	(5, 3, 3, 'SETTING USER', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:05', '2018-09-09 20:14:05'),
	(5, 4, 4, 'SETTING USER', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:05', '2018-09-09 20:14:05'),
	(5, 5, 5, 'SETTING USER', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:05', '2018-09-09 20:14:05'),
	(6, 1, 1, 'SETTING HAK AKSES', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:10', '2018-09-11 23:16:05'),
	(6, 2, 2, 'SETTING HAK AKSES', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:10', '2018-09-11 23:14:57'),
	(6, 3, 3, 'SETTING HAK AKSES', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:10', '2018-09-09 20:14:10'),
	(6, 4, 4, 'SETTING HAK AKSES', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:10', '2018-09-09 20:14:10'),
	(6, 5, 5, 'SETTING HAK AKSES', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:10', '2018-09-09 20:14:10'),
	(7, 1, 1, 'SETTING DAFTAR MENU', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:13', '2018-09-11 23:16:07'),
	(7, 2, 2, 'SETTING DAFTAR MENU', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:13', '2018-09-11 23:14:58'),
	(7, 3, 3, 'SETTING DAFTAR MENU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:13', '2018-09-09 20:14:13'),
	(7, 4, 4, 'SETTING DAFTAR MENU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:13', '2018-09-09 20:14:13'),
	(7, 5, 5, 'SETTING DAFTAR MENU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:13', '2018-09-09 20:14:13'),
	(8, 1, 1, 'SETTING JABATAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:23', '2018-09-11 23:16:08'),
	(8, 2, 2, 'SETTING JABATAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:23', '2018-09-11 23:14:56'),
	(8, 3, 3, 'SETTING JABATAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:23', '2018-09-09 20:14:23'),
	(8, 4, 4, 'SETTING JABATAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:23', '2018-09-09 20:14:23'),
	(8, 5, 5, 'SETTING JABATAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-09 20:14:23', '2018-09-09 20:14:23'),
	(9, 1, 1, 'MASTER SEKOLAH', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:09', '2018-09-11 23:16:09'),
	(9, 2, 2, 'MASTER SEKOLAH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:09', '2018-09-11 23:01:09'),
	(9, 3, 3, 'MASTER SEKOLAH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:09', '2018-09-11 23:01:09'),
	(9, 4, 4, 'MASTER SEKOLAH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:09', '2018-09-11 23:01:09'),
	(9, 5, 5, 'MASTER SEKOLAH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:09', '2018-09-11 23:01:09'),
	(10, 1, 1, 'MASTER POSISI', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:13', '2018-09-11 23:16:10'),
	(10, 2, 2, 'MASTER POSISI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:13', '2018-09-11 23:01:13'),
	(10, 3, 3, 'MASTER POSISI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:13', '2018-09-11 23:01:13'),
	(10, 4, 4, 'MASTER POSISI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:13', '2018-09-11 23:01:13'),
	(10, 5, 5, 'MASTER POSISI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:13', '2018-09-11 23:01:13'),
	(11, 1, 1, 'MASTER STAFF', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:17', '2018-09-11 23:16:13'),
	(11, 2, 2, 'MASTER STAFF', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:17', '2018-09-11 23:01:17'),
	(11, 3, 3, 'MASTER STAFF', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:17', '2018-09-11 23:01:17'),
	(11, 4, 4, 'MASTER STAFF', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:17', '2018-09-11 23:01:17'),
	(11, 5, 5, 'MASTER STAFF', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:17', '2018-09-11 23:01:17'),
	(12, 1, 1, 'GROUP AKUN KEUANGAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:28', '2018-09-11 23:16:14'),
	(12, 2, 2, 'GROUP AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:28', '2018-09-11 23:01:28'),
	(12, 3, 3, 'GROUP AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:28', '2018-09-11 23:01:28'),
	(12, 4, 4, 'GROUP AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:28', '2018-09-11 23:01:28'),
	(12, 5, 5, 'GROUP AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:28', '2018-09-11 23:01:28'),
	(13, 1, 1, 'MASTER AKUN KEUANGAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:34', '2018-09-11 23:16:15'),
	(13, 2, 2, 'MASTER AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:34', '2018-09-11 23:01:34'),
	(13, 3, 3, 'MASTER AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:34', '2018-09-11 23:01:34'),
	(13, 4, 4, 'MASTER AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:34', '2018-09-11 23:01:34'),
	(13, 5, 5, 'MASTER AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:34', '2018-09-11 23:01:34'),
	(14, 1, 1, 'PENERIMAAN SISWA BARU', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:48', '2018-09-11 23:16:17'),
	(14, 2, 2, 'PENERIMAAN SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:48', '2018-09-11 23:01:48'),
	(14, 3, 3, 'PENERIMAAN SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:48', '2018-09-11 23:01:48'),
	(14, 4, 4, 'PENERIMAAN SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:48', '2018-09-11 23:01:48'),
	(14, 5, 5, 'PENERIMAAN SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:48', '2018-09-11 23:01:48'),
	(15, 1, 1, 'DATA SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:55', '2018-09-11 23:16:18'),
	(15, 2, 2, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:55', '2018-09-11 23:01:55'),
	(15, 3, 3, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:55', '2018-09-11 23:01:55'),
	(15, 4, 4, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:55', '2018-09-11 23:01:55'),
	(15, 5, 5, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:55', '2018-09-11 23:01:55'),
	(16, 1, 1, 'ALUMNI SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:01', '2018-09-11 23:16:19'),
	(16, 2, 2, 'ALUMNI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:01', '2018-09-11 23:02:01'),
	(16, 3, 3, 'ALUMNI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:01', '2018-09-11 23:02:01'),
	(16, 4, 4, 'ALUMNI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:01', '2018-09-11 23:02:01'),
	(16, 5, 5, 'ALUMNI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:01', '2018-09-11 23:02:01'),
	(17, 1, 1, 'PEMASUKAN LAIN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:27', '2018-09-11 23:16:20'),
	(17, 2, 2, 'PEMASUKAN LAIN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:27', '2018-09-11 23:02:27'),
	(17, 3, 3, 'PEMASUKAN LAIN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:27', '2018-09-11 23:02:27'),
	(17, 4, 4, 'PEMASUKAN LAIN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:27', '2018-09-11 23:02:27'),
	(17, 5, 5, 'PEMASUKAN LAIN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:27', '2018-09-11 23:02:27'),
	(18, 1, 1, 'PEMBAYARAN SPP', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:32', '2018-09-11 23:16:22'),
	(18, 2, 2, 'PEMBAYARAN SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:32', '2018-09-11 23:02:32'),
	(18, 3, 3, 'PEMBAYARAN SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:32', '2018-09-11 23:02:32'),
	(18, 4, 4, 'PEMBAYARAN SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:32', '2018-09-11 23:02:32'),
	(18, 5, 5, 'PEMBAYARAN SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:32', '2018-09-11 23:02:32'),
	(19, 1, 1, 'PETTY CASH', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:48', '2018-09-11 23:16:21'),
	(19, 2, 2, 'PETTY CASH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:48', '2018-09-11 23:02:48'),
	(19, 3, 3, 'PETTY CASH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:48', '2018-09-11 23:02:48'),
	(19, 4, 4, 'PETTY CASH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:48', '2018-09-11 23:02:48'),
	(19, 5, 5, 'PETTY CASH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:48', '2018-09-11 23:02:48'),
	(20, 1, 1, 'BUKTI KAS KELUAR', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:52', '2018-09-11 23:16:23'),
	(20, 2, 2, 'BUKTI KAS KELUAR', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:52', '2018-09-11 23:02:52'),
	(20, 3, 3, 'BUKTI KAS KELUAR', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:52', '2018-09-11 23:02:52'),
	(20, 4, 4, 'BUKTI KAS KELUAR', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:52', '2018-09-11 23:02:52'),
	(20, 5, 5, 'BUKTI KAS KELUAR', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:52', '2018-09-11 23:02:52');
/*!40000 ALTER TABLE `d_hak_akses` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_jabatan
CREATE TABLE IF NOT EXISTS `d_jabatan` (
  `j_id` int(11) NOT NULL,
  `j_nama` varchar(50) DEFAULT NULL,
  `j_keterangan` varchar(100) DEFAULT NULL,
  `j_created_at` timestamp NULL DEFAULT NULL,
  `j_updated_at` timestamp NULL DEFAULT NULL,
  `j_created_by` varchar(50) DEFAULT NULL,
  `j_updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_jabatan: ~6 rows (approximately)
/*!40000 ALTER TABLE `d_jabatan` DISABLE KEYS */;
REPLACE INTO `d_jabatan` (`j_id`, `j_nama`, `j_keterangan`, `j_created_at`, `j_updated_at`, `j_created_by`, `j_updated_by`) VALUES
	(1, 'SUPERUSER', 'ADMIN', NULL, NULL, NULL, NULL),
	(2, 'KETUA YAYASAN', 'KETUA YAYASAN', '2018-09-09 20:05:53', '2018-09-09 20:07:56', 'DASD', 'DASD'),
	(3, 'ADMIN YAYASAN', 'ADMIN YAYASAN', '2018-09-09 20:06:08', '2018-09-09 20:07:28', 'DASD', 'DASD'),
	(4, 'KEPALA SEKOLAH', 'KEPALA SEKOLAH', '2018-09-09 20:07:38', '2018-09-09 20:07:38', 'DASD', 'DASD'),
	(5, 'ADMIN SEKOLAH', 'ADMIN SEKOLAH', '2018-09-09 20:07:46', '2018-09-09 20:07:46', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_jabatan` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_jurnal
CREATE TABLE IF NOT EXISTS `d_jurnal` (
  `j_id` int(11) NOT NULL,
  `j_tahun` year(4) DEFAULT NULL,
  `j_tanggal` date DEFAULT NULL,
  `j_keterangan` varchar(300) DEFAULT NULL,
  `j_sekolah` int(11) DEFAULT NULL,
  `j_ref` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`j_id`),
  KEY `FK_d_jurnal_d_petty_cash` (`j_ref`),
  CONSTRAINT `FK_d_jurnal_d_petty_cash` FOREIGN KEY (`j_ref`) REFERENCES `d_petty_cash` (`pc_nota`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_jurnal: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_jurnal` DISABLE KEYS */;
REPLACE INTO `d_jurnal` (`j_id`, `j_tahun`, `j_tanggal`, `j_keterangan`, `j_sekolah`, `j_ref`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, '2018', '2018-09-12', 'TES', 1, 'PC-092018/1/005', '2018-09-12 04:01:42', '2018-09-12 04:01:42', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_jurnal` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_jurnal_dt
CREATE TABLE IF NOT EXISTS `d_jurnal_dt` (
  `jd_id` int(11) NOT NULL,
  `jd_detail` int(11) NOT NULL,
  `jd_akun` varchar(50) DEFAULT NULL,
  `jd_keterangan` varchar(300) DEFAULT NULL,
  `jd_statusdk` varchar(50) DEFAULT NULL,
  `jd_value` double DEFAULT NULL,
  PRIMARY KEY (`jd_id`,`jd_detail`),
  CONSTRAINT `FK_d_jurnal_dt_d_jurnal` FOREIGN KEY (`jd_id`) REFERENCES `d_jurnal` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_jurnal_dt: ~2 rows (approximately)
/*!40000 ALTER TABLE `d_jurnal_dt` DISABLE KEYS */;
REPLACE INTO `d_jurnal_dt` (`jd_id`, `jd_detail`, `jd_akun`, `jd_keterangan`, `jd_statusdk`, `jd_value`) VALUES
	(1, 1, '111101', 'KAS SDN DARUL ULUM GRESIK TES', 'KREDIT', -376666),
	(1, 2, '621001', 'BIAYA ATK SDN DARUL ULUM GRESIK TES', 'DEBET', 30000),
	(1, 3, '621001', 'BIAYA ATK SDN DARUL ULUM GRESIK TES', 'DEBET', 23333),
	(1, 4, '626001', 'BIAYA PERAWATAN SDN DARUL ULUM GRESIK TES', 'DEBET', 323333);
/*!40000 ALTER TABLE `d_jurnal_dt` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_petty_cash
CREATE TABLE IF NOT EXISTS `d_petty_cash` (
  `pc_id` int(11) NOT NULL,
  `pc_nota` varchar(50) DEFAULT NULL,
  `pc_akun_kas` varchar(50) DEFAULT NULL,
  `pc_keterangan` varchar(300) DEFAULT NULL,
  `pc_pemohon` varchar(50) DEFAULT NULL,
  `pc_sekolah` int(11) DEFAULT NULL,
  `pc_status` varchar(50) DEFAULT 'BELUM POSTING',
  `pc_tanggal` date DEFAULT NULL,
  `pc_total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pc_id`),
  UNIQUE KEY `pc_nota` (`pc_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_petty_cash: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_petty_cash` DISABLE KEYS */;
REPLACE INTO `d_petty_cash` (`pc_id`, `pc_nota`, `pc_akun_kas`, `pc_keterangan`, `pc_pemohon`, `pc_sekolah`, `pc_status`, `pc_tanggal`, `pc_total`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'PC-092018/1/005', '11110', 'TES', 'TES', 1, 'BELUM POSTING', '2018-09-12', 376666, '2018-09-12 04:01:42', '2018-09-12 04:01:42', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_petty_cash` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_petty_cash_detail
CREATE TABLE IF NOT EXISTS `d_petty_cash_detail` (
  `pcd_id` int(11) NOT NULL,
  `pcd_detail` int(11) NOT NULL,
  `pcd_akun_biaya` varchar(50) DEFAULT NULL,
  `pcd_keterangan` varchar(300) DEFAULT NULL,
  `pcd_jumlah` double DEFAULT NULL,
  PRIMARY KEY (`pcd_id`,`pcd_detail`),
  CONSTRAINT `FK_d_petty_cash_detail_d_petty_cash` FOREIGN KEY (`pcd_id`) REFERENCES `d_petty_cash` (`pc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_petty_cash_detail: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_petty_cash_detail` DISABLE KEYS */;
REPLACE INTO `d_petty_cash_detail` (`pcd_id`, `pcd_detail`, `pcd_akun_biaya`, `pcd_keterangan`, `pcd_jumlah`) VALUES
	(1, 1, '62100', 'tes', 30000),
	(1, 2, '62100', 'tes', 23333),
	(1, 3, '62600', 'fdf', 323333);
/*!40000 ALTER TABLE `d_petty_cash_detail` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_posisi
CREATE TABLE IF NOT EXISTS `d_posisi` (
  `p_id` int(11) NOT NULL,
  `p_nama` varchar(50) DEFAULT NULL,
  `p_gaji` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_posisi: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_posisi` DISABLE KEYS */;
REPLACE INTO `d_posisi` (`p_id`, `p_nama`, `p_gaji`, `created_at`, `updated_at`) VALUES
	(1, 'KETUA YAYASAN', 5000000, '2018-09-11 03:27:11', '2018-09-11 03:27:11'),
	(2, 'GURU TETAP', 3000000, '2018-09-11 05:18:17', '2018-09-11 05:18:17'),
	(3, 'GURU HONORER', 1000000, '2018-09-11 05:18:33', '2018-09-11 05:18:33'),
	(4, 'KEBERSIHAN', 500000, '2018-09-11 05:18:46', '2018-09-11 05:18:46'),
	(5, 'SATPAM', 2000000, '2018-09-11 05:18:54', '2018-09-11 05:18:54');
/*!40000 ALTER TABLE `d_posisi` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_sekolah
CREATE TABLE IF NOT EXISTS `d_sekolah` (
  `s_id` int(11) NOT NULL,
  `s_nama` varchar(100) DEFAULT NULL,
  `s_telpon` varchar(50) DEFAULT NULL,
  `s_alamat` varchar(300) DEFAULT NULL,
  `s_logo` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_sekolah: ~2 rows (approximately)
/*!40000 ALTER TABLE `d_sekolah` DISABLE KEYS */;
REPLACE INTO `d_sekolah` (`s_id`, `s_nama`, `s_telpon`, `s_alamat`, `s_logo`, `created_at`, `updated_at`) VALUES
	(1, 'SDN DARUL ULUM GRESIK', '9092312321', 'JALAN GRESIK', 'sekolah_1_.png', '2018-09-10 16:13:48', '2018-09-10 16:27:29'),
	(2, 'MTS DARUL ULUM GRESIK', '092738293', 'JL GAJAH MADA', 'sekolah_2_.png', '2018-09-11 13:06:24', '2018-09-11 13:06:24');
/*!40000 ALTER TABLE `d_sekolah` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_staff
CREATE TABLE IF NOT EXISTS `d_staff` (
  `st_id` int(11) NOT NULL,
  `st_nama` varchar(300) DEFAULT NULL,
  `st_alamat` varchar(300) DEFAULT NULL,
  `st_tanggal_lahir` date DEFAULT NULL,
  `st_tempat_lahir` varchar(50) DEFAULT NULL,
  `st_telpon` varchar(50) DEFAULT NULL,
  `st_image` varchar(100) DEFAULT NULL,
  `st_posisi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_staff: ~3 rows (approximately)
/*!40000 ALTER TABLE `d_staff` DISABLE KEYS */;
REPLACE INTO `d_staff` (`st_id`, `st_nama`, `st_alamat`, `st_tanggal_lahir`, `st_tempat_lahir`, `st_telpon`, `st_image`, `st_posisi`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'riani', 'medokan', '1995-07-05', 'surabaya', '09829323', 'staff_2_.jpg', 1, '2018-09-11 03:56:20', '2018-09-11 05:14:25', 'DASD', 'DASD'),
	(2, 'tam', 'medokan', '1995-11-27', 'surabaya', '2321312', 'staff_2_.jpg', 2, '2018-09-11 05:17:53', '2018-09-11 05:19:09', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_staff` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table darul_ulum.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table darul_ulum.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table darul_ulum.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `username`, `email`, `jabatan_id`, `image`, `sekolah_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
	(1, 'DASD', 'superuser', 'dewa17a@gmail.com', 1, 'user_1_.jpg', 1, NULL, '$2y$10$SDTG5S4T7kXCQg.G6r66BuxeW1Ci1kEkH3LNNqHocwIBxn2qrwxsW', 'WTnHyfgSVEjKWhmlqLQrdMJ4tDkJ7VBHaxv2k8Qm1B0dG7Tqx7vfaWzAcWRJ', '2018-09-09 05:09:27', '2018-09-09 18:45:50', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
