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

-- Dumping data for table darul_ulum.d_akun: ~55 rows (approximately)
/*!40000 ALTER TABLE `d_akun` DISABLE KEYS */;
REPLACE INTO `d_akun` (`a_id`, `a_nama`, `a_sekolah`, `a_type_akun`, `a_akun_dka`, `a_aktif`, `a_master_akun`, `a_master_nama`, `a_group_neraca`, `a_group_laba_rugi`, `a_saldo_awal`, `a_tanggal_pembuka`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('111101', 'KAS RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11110', 'KAS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 11:59:29', '2018-11-20 11:59:29'),
	('111102', 'KAS MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11110', 'KAS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 11:59:29', '2018-11-20 11:59:29'),
	('111103', 'KAS MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '11110', 'KAS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 11:59:29', '2018-11-20 11:59:29'),
	('111104', 'KAS SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '11110', 'KAS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 11:59:29', '2018-11-20 11:59:29'),
	('111105', 'KAS YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '11110', 'KAS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 11:59:29', '2018-11-20 11:59:29'),
	('112101', 'PIUTANG USAHA RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:07', '2018-11-20 12:00:07'),
	('112102', 'PIUTANG USAHA MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:07', '2018-11-20 12:00:07'),
	('112103', 'PIUTANG USAHA MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:07', '2018-11-20 12:00:07'),
	('112104', 'PIUTANG USAHA SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:07', '2018-11-20 12:00:07'),
	('112105', 'PIUTANG USAHA YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '11210', 'PIUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:07', '2018-11-20 12:00:07'),
	('112201', 'PIUTANG KARYAWAN RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:38', '2018-11-20 12:00:38'),
	('112202', 'PIUTANG KARYAWAN MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:38', '2018-11-20 12:00:38'),
	('112203', 'PIUTANG KARYAWAN MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:38', '2018-11-20 12:00:38'),
	('112204', 'PIUTANG KARYAWAN SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:38', '2018-11-20 12:00:38'),
	('112205', 'PIUTANG KARYAWAN YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '11220', 'PIUTANG KARYAWAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:00:38', '2018-11-20 12:00:38'),
	('211101', 'HUTANG USAHA RA DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:01', '2018-11-20 12:01:01'),
	('211102', 'HUTANG USAHA MI DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:01', '2018-11-20 12:01:01'),
	('211103', 'HUTANG USAHA MTS DARUL ULUM GRESIK', 3, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:01', '2018-11-20 12:01:01'),
	('211104', 'HUTANG USAHA SMA DARUL ULUM GRESIK', 4, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:01', '2018-11-20 12:01:01'),
	('211105', 'HUTANG USAHA YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'KREDIT', 'Y', '21110', 'HUTANG USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:01', '2018-11-20 12:01:01'),
	('411101', 'PENDAPATAN DANA BOS RA DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:19', '2018-11-20 12:01:19'),
	('411102', 'PENDAPATAN DANA BOS MI DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:19', '2018-11-20 12:01:19'),
	('411103', 'PENDAPATAN DANA BOS MTS DARUL ULUM GRESIK', 3, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:19', '2018-11-20 12:01:19'),
	('411104', 'PENDAPATAN DANA BOS SMA DARUL ULUM GRESIK', 4, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:19', '2018-11-20 12:01:19'),
	('411105', 'PENDAPATAN DANA BOS YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'KREDIT', 'Y', '41110', 'PENDAPATAN DANA BOS', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:19', '2018-11-20 12:01:19'),
	('411201', 'PENDAPATAN SPP RA DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN SPP', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:40', '2018-11-20 12:01:40'),
	('411202', 'PENDAPATAN SPP MI DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN SPP', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:40', '2018-11-20 12:01:40'),
	('411203', 'PENDAPATAN SPP MTS DARUL ULUM GRESIK', 3, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN SPP', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:40', '2018-11-20 12:01:40'),
	('411204', 'PENDAPATAN SPP SMA DARUL ULUM GRESIK', 4, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN SPP', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:40', '2018-11-20 12:01:40'),
	('411205', 'PENDAPATAN SPP YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'KREDIT', 'Y', '41120', 'PENDAPATAN SPP', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:01:40', '2018-11-20 12:01:40'),
	('411301', 'PENDAPATAN USAHA RA DARUL ULUM GRESIK', 1, 'OCF', 'KREDIT', 'Y', '41130', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:01', '2018-11-20 12:02:01'),
	('411302', 'PENDAPATAN USAHA MI DARUL ULUM GRESIK', 2, 'OCF', 'KREDIT', 'Y', '41130', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:01', '2018-11-20 12:02:01'),
	('411303', 'PENDAPATAN USAHA MTS DARUL ULUM GRESIK', 3, 'OCF', 'KREDIT', 'Y', '41130', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:01', '2018-11-20 12:02:01'),
	('411304', 'PENDAPATAN USAHA SMA DARUL ULUM GRESIK', 4, 'OCF', 'KREDIT', 'Y', '41130', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:01', '2018-11-20 12:02:01'),
	('411305', 'PENDAPATAN USAHA YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'KREDIT', 'Y', '41130', 'PENDAPATAN USAHA', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:01', '2018-11-20 12:02:01'),
	('611201', 'BIAYA ATK RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '61120', 'BIAYA ATK', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:43', '2018-11-20 12:02:43'),
	('611202', 'BIAYA ATK MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '61120', 'BIAYA ATK', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:44', '2018-11-20 12:02:44'),
	('611203', 'BIAYA ATK MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '61120', 'BIAYA ATK', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:44', '2018-11-20 12:02:44'),
	('611204', 'BIAYA ATK SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '61120', 'BIAYA ATK', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:44', '2018-11-20 12:02:44'),
	('611205', 'BIAYA ATK YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '61120', 'BIAYA ATK', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:02:44', '2018-11-20 12:02:44'),
	('611301', 'BIAYA PERAWATAN RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '61130', 'BIAYA PERAWATAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:05', '2018-11-20 12:03:05'),
	('611302', 'BIAYA PERAWATAN MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '61130', 'BIAYA PERAWATAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:05', '2018-11-20 12:03:05'),
	('611303', 'BIAYA PERAWATAN MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '61130', 'BIAYA PERAWATAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:05', '2018-11-20 12:03:05'),
	('611304', 'BIAYA PERAWATAN SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '61130', 'BIAYA PERAWATAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:05', '2018-11-20 12:03:05'),
	('611305', 'BIAYA PERAWATAN YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '61130', 'BIAYA PERAWATAN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:05', '2018-11-20 12:03:05'),
	('611401', 'BIAYA LAIN RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '61140', 'BIAYA LAIN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:22', '2018-11-20 12:03:22'),
	('611402', 'BIAYA LAIN MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '61140', 'BIAYA LAIN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:22', '2018-11-20 12:03:22'),
	('611403', 'BIAYA LAIN MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '61140', 'BIAYA LAIN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:22', '2018-11-20 12:03:22'),
	('611404', 'BIAYA LAIN SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '61140', 'BIAYA LAIN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:22', '2018-11-20 12:03:22'),
	('611405', 'BIAYA LAIN YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '61140', 'BIAYA LAIN', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:22', '2018-11-20 12:03:22'),
	('711101', 'DEPRESIASI ASET RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42'),
	('711102', 'DEPRESIASI ASET MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42'),
	('711103', 'DEPRESIASI ASET MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42'),
	('711104', 'DEPRESIASI ASET SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42'),
	('711105', 'DEPRESIASI ASET YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42');
/*!40000 ALTER TABLE `d_akun` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_jurnal
CREATE TABLE IF NOT EXISTS `d_jurnal` (
  `j_id` int(11) NOT NULL,
  `j_tahun` year(4) DEFAULT NULL,
  `j_tanggal` date DEFAULT NULL,
  `j_keterangan` varchar(300) DEFAULT NULL,
  `j_sekolah` int(11) DEFAULT NULL,
  `j_detail` varchar(50) DEFAULT NULL,
  `j_ref` varchar(50) DEFAULT NULL,
  `j_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_jurnal: ~6 rows (approximately)
/*!40000 ALTER TABLE `d_jurnal` DISABLE KEYS */;
REPLACE INTO `d_jurnal` (`j_id`, `j_tahun`, `j_tanggal`, `j_keterangan`, `j_sekolah`, `j_detail`, `j_ref`, `j_type`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(5, '2018', '2018-11-20', '', 3, 'PEMBAYARAN SPP', 'SPP-112018/3/00002', 'KAS MASUK', '2018-11-20 12:04:36', '2018-11-20 12:04:36', 'DASD', 'DASD'),
	(6, '2018', '2018-11-20', '', 2, 'PEMBAYARAN SPP', 'SPP-112018/2/00001', 'KAS MASUK', '2018-11-20 12:04:39', '2018-11-20 12:04:39', 'DASD', 'DASD'),
	(7, '2018', '2018-11-20', '', 3, 'PEMBAYARAN SPP', 'SPP-112018/3/00003', 'KAS MASUK', '2018-11-20 12:04:42', '2018-11-20 12:04:42', 'DASD', 'DASD'),
	(8, '2018', '2018-11-20', '', 2, 'PEMBAYARAN SPP', 'SPP-122018/2/00001', 'KAS MASUK', '2018-11-20 12:10:25', '2018-11-20 12:10:25', 'DASD', 'DASD'),
	(9, '2018', '2018-11-20', '', 3, 'PEMBAYARAN SPP', 'SPP-122018/3/00002', 'KAS MASUK', '2018-11-20 12:10:31', '2018-11-20 12:10:31', 'DASD', 'DASD'),
	(10, '2018', '2018-11-20', '', 3, 'PEMBAYARAN SPP', 'SPP-122018/3/00003', 'KAS MASUK', '2018-11-20 12:10:35', '2018-11-20 12:10:35', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.d_jurnal_dt: ~12 rows (approximately)
/*!40000 ALTER TABLE `d_jurnal_dt` DISABLE KEYS */;
REPLACE INTO `d_jurnal_dt` (`jd_id`, `jd_detail`, `jd_akun`, `jd_keterangan`, `jd_statusdk`, `jd_value`) VALUES
	(5, 1, '111103', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(5, 2, '411203', 'PENDAPATAN SPP MTS DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(6, 1, '111102', 'KAS MI DARUL ULUM GRESIK ', 'DEBET', 300000),
	(6, 2, '411202', 'PENDAPATAN SPP MI DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(7, 1, '111103', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(7, 2, '411203', 'PENDAPATAN SPP MTS DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(8, 1, '111102', 'KAS MI DARUL ULUM GRESIK ', 'DEBET', 300000),
	(8, 2, '411202', 'PENDAPATAN SPP MI DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(9, 1, '111103', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(9, 2, '411203', 'PENDAPATAN SPP MTS DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(10, 1, '111103', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(10, 2, '411203', 'PENDAPATAN SPP MTS DARUL ULUM GRESIK ', 'KREDIT', 300000);
/*!40000 ALTER TABLE `d_jurnal_dt` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;