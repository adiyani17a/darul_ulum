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

-- Dumping data for table darul_ulum.d_akun: ~28 rows (approximately)
/*!40000 ALTER TABLE `d_akun` DISABLE KEYS */;
REPLACE INTO `d_akun` (`a_id`, `a_nama`, `a_sekolah`, `a_type_akun`, `a_akun_dka`, `a_aktif`, `a_master_akun`, `a_master_nama`, `a_group_neraca`, `a_group_laba_rugi`, `a_saldo_awal`, `a_tanggal_pembuka`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('111101', 'KAS SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11110', 'KAS', 1, 3, 5000000, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:20:33', '2018-09-18 19:55:29'),
	('111102', 'KAS MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11110', 'KAS', 1, 3, 5000000, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:20:33', '2018-09-18 19:55:29'),
	('111103', 'KAS SEKOLAH MENENGAH ATAS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '11110', 'KAS', NULL, NULL, 0, '2018-10-01', 'DASD', 'DASD', '2018-10-16 23:57:35', '2018-10-16 23:57:35'),
	('111201', 'KAS BANK SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11120', 'KAS BANK', 1, 3, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:21:40', '2018-09-18 19:55:29'),
	('111202', 'KAS BANK MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11120', 'KAS BANK', 1, 3, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:21:40', '2018-09-18 19:55:29'),
	('112101', 'PIUTANG USAHA SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, 3, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:23:12', '2018-09-18 19:55:29'),
	('112102', 'PIUTANG USAHA MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, 3, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:23:12', '2018-09-18 19:55:29'),
	('112201', 'PIUTANG KARYAWAN SDN DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', 1, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:23:32', '2018-09-12 01:23:32'),
	('112202', 'PIUTANG KARYAWAN MTS DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', 1, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:23:32', '2018-09-12 01:23:32'),
	('211101', 'HUTANG USAHA SDN DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:24:33', '2018-09-12 01:24:33'),
	('211102', 'HUTANG USAHA MTS DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:24:33', '2018-09-12 01:24:33'),
	('411101', 'PENDAPATAN DANA BOS SDN DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, 2, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:25:58', '2018-09-12 01:25:58'),
	('411102', 'PENDAPATAN DANA BOS MTS DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, 2, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:25:58', '2018-09-12 01:25:58'),
	('411201', 'PENDAPATAN USAHA SDN DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:26:32', '2018-09-12 01:26:32'),
	('411202', 'PENDAPATAN USAHA MTS DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-09-12', 'DASD', 'DASD', '2018-09-12 01:26:32', '2018-09-12 01:26:32'),
	('411301', 'PENDAPATAN PEMBAYARAN SPP SDN DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '41130', 'PENDAPATAN PEMBAYARAN SPP', NULL, NULL, 0, '2018-10-01', 'DASD', 'DASD', '2018-10-16 16:01:41', '2018-10-16 16:01:41'),
	('411302', 'PENDAPATAN PEMBAYARAN SPP MADRASAH TSANAWIYAH DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '41130', 'PENDAPATAN PEMBAYARAN SPP', NULL, NULL, 0, '2018-10-01', 'DASD', 'DASD', '2018-10-16 16:01:41', '2018-10-16 16:01:41'),
	('411303', 'PENDAPATAN PEMBAYARAN SPP SEKOLAH MENENGAH ATAS DARUL ULUM GRESIK', 3, 'OCF', 'KREDIT', 'Y', '41130', 'PENDAPATAN PEMBAYARAN SPP', NULL, NULL, 0, '2018-10-01', 'DASD', 'DASD', '2018-10-16 16:01:41', '2018-10-16 16:01:41'),
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
