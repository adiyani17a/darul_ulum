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

-- Dumping structure for table darul_ulum.d_barang
CREATE TABLE IF NOT EXISTS `d_barang` (
  `b_id` int(11) NOT NULL,
  `b_nama` varchar(50) DEFAULT NULL,
  `b_keterangan` varchar(300) DEFAULT NULL,
  `b_harga_tertinggi` double DEFAULT NULL,
  `b_akun` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_barang: ~3 rows (approximately)
/*!40000 ALTER TABLE `d_barang` DISABLE KEYS */;
REPLACE INTO `d_barang` (`b_id`, `b_nama`, `b_keterangan`, `b_harga_tertinggi`, `b_akun`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'KURSI', 'PEMBELIAN KURSI', 250000, '62100', '2018-09-19 21:57:47', '2018-09-22 20:36:56', 'DASD', 'DASD'),
	(2, 'SAPU', 'PEMBELIAN SAPU', 50000, '62400', '2018-09-19 22:01:26', '2018-09-22 20:38:37', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_barang` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_bukti_kas_keluar
CREATE TABLE IF NOT EXISTS `d_bukti_kas_keluar` (
  `bkk_id` int(11) NOT NULL,
  `bkk_pc_ref` varchar(50) DEFAULT NULL,
  `bkk_sisa_kembali` int(11) DEFAULT NULL,
  `bkk_keterangan` text,
  `bkk_sekolah` int(11) DEFAULT NULL,
  `bkk_tanggal` date DEFAULT NULL,
  `bkk_status_print` enum('Released','Printed') DEFAULT 'Released',
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bkk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_bukti_kas_keluar: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_bukti_kas_keluar` DISABLE KEYS */;
REPLACE INTO `d_bukti_kas_keluar` (`bkk_id`, `bkk_pc_ref`, `bkk_sisa_kembali`, `bkk_keterangan`, `bkk_sekolah`, `bkk_tanggal`, `bkk_status_print`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'PC-092018/2/001', -50000, 'TES', 2, '2018-09-28', 'Released', 'DASD', 'DASD', '2018-09-28 23:27:05', '2018-09-28 23:27:05');
/*!40000 ALTER TABLE `d_bukti_kas_keluar` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_bukti_kas_keluar_detail
CREATE TABLE IF NOT EXISTS `d_bukti_kas_keluar_detail` (
  `bkkd_id` int(11) NOT NULL,
  `bkkd_detail` int(11) NOT NULL,
  `bkkd_pcd_detail` int(11) NOT NULL,
  `bkkd_qty` int(11) NOT NULL,
  `bkkd_harga_awal` double NOT NULL,
  `bkkd_harga` double DEFAULT NULL,
  `bkkd_keterangan` varchar(300) DEFAULT NULL,
  `bkkd_jenis` enum('POSTING','BIAYA') DEFAULT NULL,
  `bkkd_akun` varchar(50) DEFAULT NULL,
  `bkkd_image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bkkd_id`,`bkkd_detail`),
  CONSTRAINT `FK_d_bukti_kas_keluar_detail_d_bukti_kas_keluar` FOREIGN KEY (`bkkd_id`) REFERENCES `d_bukti_kas_keluar` (`bkk_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_bukti_kas_keluar_detail: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_bukti_kas_keluar_detail` DISABLE KEYS */;
REPLACE INTO `d_bukti_kas_keluar_detail` (`bkkd_id`, `bkkd_detail`, `bkkd_pcd_detail`, `bkkd_qty`, `bkkd_harga_awal`, `bkkd_harga`, `bkkd_keterangan`, `bkkd_jenis`, `bkkd_akun`, `bkkd_image`) VALUES
	(1, 1, 1, 10, 2000000, 2000000, '', 'POSTING', '62100', NULL),
	(1, 2, 2, 5, 750000, 750000, '', 'POSTING', '62100', NULL),
	(1, 3, 3, 5, 125000, 150000, '', 'POSTING', '62400', NULL),
	(1, 4, 0, 1, 25000, 25000, 'TES', 'BIAYA', '62400', NULL);
/*!40000 ALTER TABLE `d_bukti_kas_keluar_detail` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_daftar_menu
CREATE TABLE IF NOT EXISTS `d_daftar_menu` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_nama` varchar(50) NOT NULL,
  `dm_group` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dm_id`,`dm_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_daftar_menu: ~19 rows (approximately)
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
	(16, 'BUKTI KAS KELUAR', 6, '2018-09-11 23:02:52', '2018-09-11 23:02:52'),
	(17, 'BARANG', 2, '2018-09-18 20:56:41', '2018-09-18 20:56:41'),
	(18, 'RENCANA PEMBELIAN', 6, '2018-09-18 20:56:49', '2018-09-18 20:57:36'),
	(19, 'KONFIRMASI PENGELUARAN', 6, '2018-09-18 20:57:14', '2018-09-18 20:57:14'),
	(20, 'APPROVE PEMBELIAN', 6, '2018-09-19 23:52:29', '2018-09-19 23:52:29'),
	(21, 'PEMASUKAN KAS', 5, '2018-09-26 06:56:48', '2018-10-03 20:42:09'),
	(22, 'KONFIRMASI SISWA', 4, '2018-10-13 18:07:28', '2018-10-13 18:07:28'),
	(23, 'REKAP SISWA', 4, '2018-10-13 19:48:00', '2018-10-13 19:48:00');
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

-- Dumping data for table darul_ulum.d_group_akun: ~3 rows (approximately)
/*!40000 ALTER TABLE `d_group_akun` DISABLE KEYS */;
REPLACE INTO `d_group_akun` (`ga_id`, `ga_nama`, `ga_jenis_group`, `ga_jenis_neraca`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'ASET TETAP', 'neraca', 'A', '2018-09-11 11:48:27', '2018-09-11 20:59:24', 'DASD', 'DASD'),
	(2, 'PENDAPATAN DARI NEGARA', 'labarugi', NULL, '2018-09-11 13:58:56', '2018-09-11 20:59:35', 'DASD', 'DASD'),
	(3, 'TES', 'labarugi', NULL, '2018-09-18 19:55:29', '2018-09-18 19:55:29', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_group_akun` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_group_spp
CREATE TABLE IF NOT EXISTS `d_group_spp` (
  `gs_id` int(11) NOT NULL,
  `gs_nama` varchar(50) DEFAULT NULL,
  `gs_keterangan` text,
  `gs_nilai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_group_spp: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_group_spp` DISABLE KEYS */;
REPLACE INTO `d_group_spp` (`gs_id`, `gs_nama`, `gs_keterangan`, `gs_nilai`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'GOLONGAN A', 'GOLONGAN ATAS', 300000, '2018-10-04 22:10:59', '2018-10-04 22:10:59', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_group_spp` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_grup_menu
CREATE TABLE IF NOT EXISTS `d_grup_menu` (
  `gm_id` int(11) NOT NULL,
  `gm_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_grup_menu: ~6 rows (approximately)
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

-- Dumping data for table darul_ulum.d_hak_akses: ~95 rows (approximately)
/*!40000 ALTER TABLE `d_hak_akses` DISABLE KEYS */;
REPLACE INTO `d_hak_akses` (`ha_id`, `ha_dt`, `ha_level`, `ha_menu`, `aktif`, `tambah`, `ubah`, `hapus`, `sekolah`, `global`, `print`, `created_at`, `updated_at`) VALUES
	(5, 1, 1, 'SETTING USER', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:05', '2018-09-11 23:16:04'),
	(5, 2, 2, 'SETTING USER', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:05', '2018-10-02 20:30:59'),
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
	(9, 2, 2, 'MASTER SEKOLAH', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:09', '2018-09-18 19:27:54'),
	(9, 3, 3, 'MASTER SEKOLAH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:09', '2018-09-11 23:01:09'),
	(9, 4, 4, 'MASTER SEKOLAH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:09', '2018-09-11 23:01:09'),
	(9, 5, 5, 'MASTER SEKOLAH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:09', '2018-09-11 23:01:09'),
	(10, 1, 1, 'MASTER POSISI', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:13', '2018-09-11 23:16:10'),
	(10, 2, 2, 'MASTER POSISI', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:13', '2018-09-18 19:27:55'),
	(10, 3, 3, 'MASTER POSISI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:13', '2018-09-11 23:01:13'),
	(10, 4, 4, 'MASTER POSISI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:13', '2018-09-11 23:01:13'),
	(10, 5, 5, 'MASTER POSISI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:13', '2018-09-11 23:01:13'),
	(11, 1, 1, 'MASTER STAFF', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:17', '2018-09-11 23:16:13'),
	(11, 2, 2, 'MASTER STAFF', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:17', '2018-09-18 19:27:55'),
	(11, 3, 3, 'MASTER STAFF', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:17', '2018-09-11 23:01:17'),
	(11, 4, 4, 'MASTER STAFF', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:17', '2018-09-11 23:01:17'),
	(11, 5, 5, 'MASTER STAFF', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:17', '2018-09-11 23:01:17'),
	(12, 1, 1, 'GROUP AKUN KEUANGAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:28', '2018-09-11 23:16:14'),
	(12, 2, 2, 'GROUP AKUN KEUANGAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:28', '2018-09-18 19:28:06'),
	(12, 3, 3, 'GROUP AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:28', '2018-09-11 23:01:28'),
	(12, 4, 4, 'GROUP AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:28', '2018-09-11 23:01:28'),
	(12, 5, 5, 'GROUP AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:28', '2018-09-11 23:01:28'),
	(13, 1, 1, 'MASTER AKUN KEUANGAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:34', '2018-09-11 23:16:15'),
	(13, 2, 2, 'MASTER AKUN KEUANGAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:34', '2018-09-18 19:28:07'),
	(13, 3, 3, 'MASTER AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:34', '2018-09-11 23:01:34'),
	(13, 4, 4, 'MASTER AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:34', '2018-09-11 23:01:34'),
	(13, 5, 5, 'MASTER AKUN KEUANGAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:34', '2018-09-11 23:01:34'),
	(14, 1, 1, 'PENERIMAAN SISWA BARU', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:48', '2018-09-11 23:16:17'),
	(14, 2, 2, 'PENERIMAAN SISWA BARU', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:48', '2018-09-18 19:28:22'),
	(14, 3, 3, 'PENERIMAAN SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:48', '2018-09-11 23:01:48'),
	(14, 4, 4, 'PENERIMAAN SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:48', '2018-09-11 23:01:48'),
	(14, 5, 5, 'PENERIMAAN SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:48', '2018-09-11 23:01:48'),
	(15, 1, 1, 'DATA SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:55', '2018-09-11 23:16:18'),
	(15, 2, 2, 'DATA SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:01:55', '2018-09-18 19:28:23'),
	(15, 3, 3, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:55', '2018-09-11 23:01:55'),
	(15, 4, 4, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:55', '2018-09-11 23:01:55'),
	(15, 5, 5, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:01:55', '2018-09-11 23:01:55'),
	(16, 1, 1, 'ALUMNI SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:01', '2018-09-11 23:16:19'),
	(16, 2, 2, 'ALUMNI SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:01', '2018-09-18 19:28:21'),
	(16, 3, 3, 'ALUMNI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:01', '2018-09-11 23:02:01'),
	(16, 4, 4, 'ALUMNI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:01', '2018-09-11 23:02:01'),
	(16, 5, 5, 'ALUMNI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:01', '2018-09-11 23:02:01'),
	(17, 1, 1, 'PEMASUKAN LAIN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:27', '2018-09-11 23:16:20'),
	(17, 2, 2, 'PEMASUKAN LAIN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:27', '2018-09-18 19:28:33'),
	(17, 3, 3, 'PEMASUKAN LAIN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:27', '2018-09-11 23:02:27'),
	(17, 4, 4, 'PEMASUKAN LAIN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:27', '2018-09-11 23:02:27'),
	(17, 5, 5, 'PEMASUKAN LAIN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:27', '2018-09-11 23:02:27'),
	(18, 1, 1, 'PEMBAYARAN SPP', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:32', '2018-09-11 23:16:22'),
	(18, 2, 2, 'PEMBAYARAN SPP', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:32', '2018-09-18 19:28:34'),
	(18, 3, 3, 'PEMBAYARAN SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:32', '2018-09-11 23:02:32'),
	(18, 4, 4, 'PEMBAYARAN SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:32', '2018-09-11 23:02:32'),
	(18, 5, 5, 'PEMBAYARAN SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:32', '2018-09-11 23:02:32'),
	(19, 1, 1, 'PETTY CASH', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:48', '2018-09-11 23:16:21'),
	(19, 2, 2, 'PETTY CASH', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:48', '2018-09-18 19:28:43'),
	(19, 3, 3, 'PETTY CASH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:48', '2018-09-11 23:02:48'),
	(19, 4, 4, 'PETTY CASH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:48', '2018-09-11 23:02:48'),
	(19, 5, 5, 'PETTY CASH', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:48', '2018-09-11 23:02:48'),
	(20, 1, 1, 'BUKTI KAS KELUAR', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:52', '2018-09-11 23:16:23'),
	(20, 2, 2, 'BUKTI KAS KELUAR', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-11 23:02:52', '2018-09-18 19:28:44'),
	(20, 3, 3, 'BUKTI KAS KELUAR', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:52', '2018-09-11 23:02:52'),
	(20, 4, 4, 'BUKTI KAS KELUAR', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:52', '2018-09-11 23:02:52'),
	(20, 5, 5, 'BUKTI KAS KELUAR', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-11 23:02:52', '2018-09-11 23:02:52'),
	(21, 1, 1, 'BARANG', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-18 20:56:41', '2018-09-19 23:52:47'),
	(21, 2, 2, 'BARANG', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:56:41', '2018-09-18 20:56:41'),
	(21, 3, 3, 'BARANG', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:56:41', '2018-09-18 20:56:41'),
	(21, 4, 4, 'BARANG', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:56:41', '2018-09-18 20:56:41'),
	(21, 5, 5, 'BARANG', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:56:41', '2018-09-18 20:56:41'),
	(23, 1, 1, 'KONFIRMASI PENGELUARAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-18 20:57:14', '2018-09-19 23:52:50'),
	(23, 2, 2, 'KONFIRMASI PENGELUARAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:57:14', '2018-09-18 20:57:14'),
	(23, 3, 3, 'KONFIRMASI PENGELUARAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:57:14', '2018-09-18 20:57:14'),
	(23, 4, 4, 'KONFIRMASI PENGELUARAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:57:14', '2018-09-18 20:57:14'),
	(23, 5, 5, 'KONFIRMASI PENGELUARAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:57:14', '2018-09-18 20:57:14'),
	(24, 1, 1, 'RENCANA PEMBELIAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-18 20:57:36', '2018-09-19 22:49:08'),
	(24, 2, 2, 'RENCANA PEMBELIAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:57:36', '2018-09-18 20:57:36'),
	(24, 3, 3, 'RENCANA PEMBELIAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:57:36', '2018-09-18 20:57:36'),
	(24, 4, 4, 'RENCANA PEMBELIAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:57:36', '2018-09-18 20:57:36'),
	(24, 5, 5, 'RENCANA PEMBELIAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-18 20:57:36', '2018-09-18 20:57:36'),
	(25, 1, 1, 'APPROVE PEMBELIAN', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-19 23:52:29', '2018-09-19 23:52:48'),
	(25, 2, 2, 'APPROVE PEMBELIAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-19 23:52:29', '2018-09-19 23:52:29'),
	(25, 3, 3, 'APPROVE PEMBELIAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-19 23:52:29', '2018-09-19 23:52:29'),
	(25, 4, 4, 'APPROVE PEMBELIAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-19 23:52:29', '2018-09-19 23:52:29'),
	(25, 5, 5, 'APPROVE PEMBELIAN', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-09-19 23:52:29', '2018-09-19 23:52:29'),
	(26, 1, 1, 'PEMASUKAN KAS', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-03 20:42:09', '2018-10-03 20:43:55'),
	(26, 2, 2, 'PEMASUKAN KAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-03 20:42:09', '2018-10-03 20:42:09'),
	(26, 3, 3, 'PEMASUKAN KAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-03 20:42:09', '2018-10-03 20:42:09'),
	(26, 4, 4, 'PEMASUKAN KAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-03 20:42:09', '2018-10-03 20:42:09'),
	(26, 5, 5, 'PEMASUKAN KAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-03 20:42:09', '2018-10-03 20:42:09'),
	(27, 1, 1, 'KONFIRMASI SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-13 18:07:29', '2018-10-13 18:07:29'),
	(27, 2, 2, 'KONFIRMASI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 18:07:29', '2018-10-13 18:07:29'),
	(27, 3, 3, 'KONFIRMASI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 18:07:29', '2018-10-13 18:07:29'),
	(27, 4, 4, 'KONFIRMASI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 18:07:29', '2018-10-13 18:07:29'),
	(27, 5, 5, 'KONFIRMASI SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 18:07:29', '2018-10-13 18:07:29'),
	(28, 1, 1, 'REKAP SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-13 19:48:00', '2018-10-13 19:48:00'),
	(28, 2, 2, 'REKAP SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 19:48:00', '2018-10-13 19:48:00'),
	(28, 3, 3, 'REKAP SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 19:48:00', '2018-10-13 19:48:00'),
	(28, 4, 4, 'REKAP SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 19:48:00', '2018-10-13 19:48:00'),
	(28, 5, 5, 'REKAP SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 19:48:00', '2018-10-13 19:48:00');
/*!40000 ALTER TABLE `d_hak_akses` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_history_spp
CREATE TABLE IF NOT EXISTS `d_history_spp` (
  `hs_id` int(11) NOT NULL,
  `hs_detail` int(11) NOT NULL,
  `hs_nota` varchar(50) NOT NULL,
  `hs_bulan` varchar(50) DEFAULT NULL,
  `hs_tahun` year(4) DEFAULT NULL,
  `hs_keterangan` text,
  `hs_akun_kas` varchar(50) DEFAULT NULL,
  `hs_akun` varchar(50) DEFAULT NULL,
  `hs_jumlah` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`hs_id`,`hs_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_history_spp: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_history_spp` DISABLE KEYS */;
REPLACE INTO `d_history_spp` (`hs_id`, `hs_detail`, `hs_nota`, `hs_bulan`, `hs_tahun`, `hs_keterangan`, `hs_akun_kas`, `hs_akun`, `hs_jumlah`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(3, 1, 'SPP-1010/2/00001', 'Oktober', '2018', NULL, '11110', NULL, 300000, '2018-10-16 23:37:21', '2018-10-16 23:37:21', 'DASD', NULL),
	(3, 2, 'SPP-1010/2/00001', 'Oktober', '2018', NULL, '11110', '41130', 300000, '2018-10-16 23:47:19', '2018-10-16 23:47:19', 'DASD', 'DASD'),
	(3, 3, 'SPP-1010/2/00001', 'Oktober', '2018', NULL, '11110', '41130', 300000, '2018-10-16 23:57:11', '2018-10-16 23:57:11', 'DASD', 'DASD'),
	(4, 1, 'SPP-1010/3/00001', 'Oktober', '2018', NULL, '11110', '41130', 300000, '2018-10-16 23:57:56', '2018-10-16 23:57:56', 'DASD', 'DASD'),
	(5, 1, 'SPP-102018/3/00002', 'Oktober', '2018', NULL, '11110', '41130', 300000, '2018-10-17 00:00:28', '2018-10-17 00:00:28', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_history_spp` ENABLE KEYS */;

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
  `j_detail` varchar(50) DEFAULT NULL,
  `j_ref` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_jurnal: ~3 rows (approximately)
/*!40000 ALTER TABLE `d_jurnal` DISABLE KEYS */;
REPLACE INTO `d_jurnal` (`j_id`, `j_tahun`, `j_tanggal`, `j_keterangan`, `j_sekolah`, `j_detail`, `j_ref`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, '2018', '2018-09-28', 'TES', 2, 'ANGGARAN', 'PC-092018/2/001', '2018-09-28 23:21:01', '2018-09-28 23:21:01', 'DASD', 'DASD'),
	(2, '2018', '2018-09-28', 'TES', 2, 'BUKTI KAS KELUAR', 'PC-092018/2/001', '2018-09-28 23:27:05', '2018-09-28 23:27:05', 'DASD', 'DASD'),
	(3, '2018', '2018-10-03', 'TES', 2, 'PEMASUKAN KAS', 'KM-102018/2/001', '2018-10-03 22:05:57', '2018-10-03 22:05:57', 'DASD', 'DASD'),
	(4, '2018', '2018-10-16', '', 2, 'PEMBAYARAN SPP', 'SPP-1010/2/00001', '2018-10-16 23:37:21', '2018-10-16 23:37:21', 'DASD', 'DASD'),
	(5, '2018', '2018-10-16', '', 2, 'PEMBAYARAN SPP', 'SPP-1010/2/00001', '2018-10-16 23:47:19', '2018-10-16 23:47:19', 'DASD', 'DASD'),
	(6, '2018', '2018-10-16', '', 2, 'PEMBAYARAN SPP', 'SPP-1010/2/00001', '2018-10-16 23:57:12', '2018-10-16 23:57:12', 'DASD', 'DASD'),
	(7, '2018', '2018-10-16', '', 3, 'PEMBAYARAN SPP', 'SPP-1010/3/00001', '2018-10-16 23:57:57', '2018-10-16 23:57:57', 'DASD', 'DASD'),
	(8, '2018', '2018-10-17', '', 3, 'PEMBAYARAN SPP', 'SPP-102018/3/00002', '2018-10-17 00:00:28', '2018-10-17 00:00:28', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.d_jurnal_dt: ~8 rows (approximately)
/*!40000 ALTER TABLE `d_jurnal_dt` DISABLE KEYS */;
REPLACE INTO `d_jurnal_dt` (`jd_id`, `jd_detail`, `jd_akun`, `jd_keterangan`, `jd_statusdk`, `jd_value`) VALUES
	(1, 1, '111102', 'KAS MTS DARUL ULUM GRESIK TES', 'KREDIT', -2875000),
	(1, 2, '621002', 'BIAYA ATK MTS DARUL ULUM GRESIK ', 'DEBET', 2000000),
	(1, 3, '621002', 'BIAYA ATK MTS DARUL ULUM GRESIK ', 'DEBET', 750000),
	(1, 4, '624002', 'BIAYA LAIN MTS DARUL ULUM GRESIK ', 'DEBET', 125000),
	(2, 1, '111102', 'KAS MTS DARUL ULUM GRESIK TES', 'KREDIT', -50000),
	(2, 2, '624002', 'BIAYA LAIN MTS DARUL ULUM GRESIK ', 'DEBET', 25000),
	(2, 3, '624002', 'BIAYA LAIN MTS DARUL ULUM GRESIK TES', 'DEBET', 25000),
	(3, 1, '111102', 'KAS MTS DARUL ULUM GRESIK TES', 'DEBET', 2500000),
	(3, 2, '411102', 'PENDAPATAN DANA BOS MTS DARUL ULUM GRESIK TES', 'KREDIT', 2500000),
	(4, 1, '111102', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(4, 2, '411302', 'PENDAPATAN PEMBAYARAN SPP MADRASAH TSANAWIYAH DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(5, 1, '111102', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(5, 2, '411302', 'PENDAPATAN PEMBAYARAN SPP MADRASAH TSANAWIYAH DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(6, 1, '111102', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(6, 2, '411302', 'PENDAPATAN PEMBAYARAN SPP MADRASAH TSANAWIYAH DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(7, 1, '111103', 'KAS SEKOLAH MENENGAH ATAS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(7, 2, '411303', 'PENDAPATAN PEMBAYARAN SPP SEKOLAH MENENGAH ATAS DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(8, 1, '111103', 'KAS SEKOLAH MENENGAH ATAS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(8, 2, '411303', 'PENDAPATAN PEMBAYARAN SPP SEKOLAH MENENGAH ATAS DARUL ULUM GRESIK ', 'KREDIT', 300000);
/*!40000 ALTER TABLE `d_jurnal_dt` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_kas_masuk
CREATE TABLE IF NOT EXISTS `d_kas_masuk` (
  `km_id` int(11) NOT NULL,
  `km_sekolah` int(11) NOT NULL,
  `km_nota` varchar(50) DEFAULT NULL,
  `km_akun_kas` varchar(300) DEFAULT NULL,
  `km_ref` varchar(300) DEFAULT NULL,
  `km_tanggal` date DEFAULT NULL,
  `km_keterangan` text,
  `km_total` double DEFAULT NULL,
  `km_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`km_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_kas_masuk: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_kas_masuk` DISABLE KEYS */;
REPLACE INTO `d_kas_masuk` (`km_id`, `km_sekolah`, `km_nota`, `km_akun_kas`, `km_ref`, `km_tanggal`, `km_keterangan`, `km_total`, `km_status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 2, 'KM-102018/2/001', '11110', NULL, '2018-10-03', 'TES', 2500000, 'RELEASED', '2018-10-03 22:05:57', '2018-10-03 22:05:57', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_kas_masuk` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_kas_masuk_detail
CREATE TABLE IF NOT EXISTS `d_kas_masuk_detail` (
  `kmd_id` int(11) NOT NULL,
  `kmd_detail` int(11) NOT NULL,
  `kmd_total` double NOT NULL,
  `kmd_akun_pendapatan` varchar(50) DEFAULT NULL,
  `kmd_keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kmd_id`,`kmd_detail`),
  CONSTRAINT `FK_d_kas_masuk_detail_d_kas_masuk` FOREIGN KEY (`kmd_id`) REFERENCES `d_kas_masuk` (`km_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_kas_masuk_detail: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_kas_masuk_detail` DISABLE KEYS */;
REPLACE INTO `d_kas_masuk_detail` (`kmd_id`, `kmd_detail`, `kmd_total`, `kmd_akun_pendapatan`, `kmd_keterangan`) VALUES
	(1, 1, 2500000, '41110', 'tes');
/*!40000 ALTER TABLE `d_kas_masuk_detail` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_petty_cash
CREATE TABLE IF NOT EXISTS `d_petty_cash` (
  `pc_id` int(11) NOT NULL,
  `pc_nota` varchar(50) DEFAULT NULL,
  `pc_akun_kas` varchar(50) DEFAULT NULL,
  `pc_keterangan` varchar(300) DEFAULT NULL,
  `pc_pemohon` varchar(50) DEFAULT NULL,
  `pc_sekolah` int(11) DEFAULT NULL,
  `pc_status` varchar(50) DEFAULT 'RELEASED',
  `pc_tanggal` date DEFAULT NULL,
  `pc_total` double DEFAULT NULL,
  `pc_jenis` enum('ANGGARAN','PETTY') DEFAULT NULL,
  `pc_ref` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pc_id`),
  UNIQUE KEY `pc_nota` (`pc_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_petty_cash: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_petty_cash` DISABLE KEYS */;
REPLACE INTO `d_petty_cash` (`pc_id`, `pc_nota`, `pc_akun_kas`, `pc_keterangan`, `pc_pemohon`, `pc_sekolah`, `pc_status`, `pc_tanggal`, `pc_total`, `pc_jenis`, `pc_ref`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'PC-092018/2/001', '11110', 'TES', 'TES', 2, 'POSTING', '2018-09-28', 2875000, 'ANGGARAN', 'RP-092018/2/001', '2018-09-28 23:20:50', '2018-09-28 23:27:05', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_petty_cash` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_petty_cash_detail
CREATE TABLE IF NOT EXISTS `d_petty_cash_detail` (
  `pcd_id` int(11) NOT NULL,
  `pcd_detail` int(11) NOT NULL,
  `pcd_akun_biaya` varchar(50) DEFAULT NULL,
  `pcd_keterangan` varchar(300) DEFAULT NULL,
  `pcd_jumlah` double DEFAULT NULL,
  `pcd_qty` int(11) DEFAULT '1',
  `pcd_rpd_detail` int(11) DEFAULT NULL,
  `pcd_barang` int(11) DEFAULT NULL,
  PRIMARY KEY (`pcd_id`,`pcd_detail`),
  CONSTRAINT `FK_d_petty_cash_detail_d_petty_cash` FOREIGN KEY (`pcd_id`) REFERENCES `d_petty_cash` (`pc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_petty_cash_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `d_petty_cash_detail` DISABLE KEYS */;
REPLACE INTO `d_petty_cash_detail` (`pcd_id`, `pcd_detail`, `pcd_akun_biaya`, `pcd_keterangan`, `pcd_jumlah`, `pcd_qty`, `pcd_rpd_detail`, `pcd_barang`) VALUES
	(1, 1, '62100', NULL, 200000, 10, 1, 1),
	(1, 2, '62100', NULL, 150000, 5, 2, 3),
	(1, 3, '62400', NULL, 25000, 5, 3, 2);
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

-- Dumping structure for table darul_ulum.d_rencana_pembelian
CREATE TABLE IF NOT EXISTS `d_rencana_pembelian` (
  `rp_id` int(11) NOT NULL,
  `rp_kode` varchar(50) NOT NULL,
  `rp_tahun` year(4) DEFAULT NULL,
  `rp_tanggal` date DEFAULT NULL,
  `rp_keterangan` mediumtext,
  `rp_total` double DEFAULT NULL,
  `rp_status` enum('Release','Berjalan','Selesai') DEFAULT 'Release',
  `rp_sekolah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_rencana_pembelian: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_rencana_pembelian` DISABLE KEYS */;
REPLACE INTO `d_rencana_pembelian` (`rp_id`, `rp_kode`, `rp_tahun`, `rp_tanggal`, `rp_keterangan`, `rp_total`, `rp_status`, `rp_sekolah`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'RP-092018/2/001', '2018', '2018-09-28', 'TES', 10000000, 'Berjalan', 2, '2018-09-28 23:20:01', '2018-09-28 23:20:08', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_rencana_pembelian` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_rencana_pembelian_detail
CREATE TABLE IF NOT EXISTS `d_rencana_pembelian_detail` (
  `rpd_id` int(11) NOT NULL,
  `rpd_detail` int(11) NOT NULL,
  `rpd_barang` int(11) DEFAULT NULL,
  `rpd_jumlah` int(11) DEFAULT NULL,
  `rpd_sisa` int(11) DEFAULT NULL,
  PRIMARY KEY (`rpd_id`,`rpd_detail`),
  CONSTRAINT `FK_d_rencana_pembelian_detail_d_rencana_pembelian` FOREIGN KEY (`rpd_id`) REFERENCES `d_rencana_pembelian` (`rp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_rencana_pembelian_detail: ~3 rows (approximately)
/*!40000 ALTER TABLE `d_rencana_pembelian_detail` DISABLE KEYS */;
REPLACE INTO `d_rencana_pembelian_detail` (`rpd_id`, `rpd_detail`, `rpd_barang`, `rpd_jumlah`, `rpd_sisa`) VALUES
	(1, 1, 1, 20, 10),
	(1, 2, 3, 20, 15),
	(1, 3, 2, 20, 15);
/*!40000 ALTER TABLE `d_rencana_pembelian_detail` ENABLE KEYS */;

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

-- Dumping data for table darul_ulum.d_sekolah: ~3 rows (approximately)
/*!40000 ALTER TABLE `d_sekolah` DISABLE KEYS */;
REPLACE INTO `d_sekolah` (`s_id`, `s_nama`, `s_telpon`, `s_alamat`, `s_logo`, `created_at`, `updated_at`) VALUES
	(1, 'SDN DARUL ULUM GRESIK', '9092312321', 'JALAN GRESIK', 'sekolah_1_.png', '2018-09-10 16:13:48', '2018-09-10 16:27:29'),
	(2, 'MADRASAH TSANAWIYAH DARUL ULUM GRESIK', '092738293', 'JL. MOJOSARIREJO NO .1 GRESIK 61177', 'sekolah_2_.png', '2018-09-11 13:06:24', '2018-09-26 06:42:30'),
	(3, 'SEKOLAH MENENGAH ATAS DARUL ULUM GRESIK', '09008098', 'JL. MOJOSARIREJO NO .1 GRESIK 61177', 'sekolah_3_.jpeg', '2018-09-26 06:44:29', '2018-09-26 06:45:11');
/*!40000 ALTER TABLE `d_sekolah` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa
CREATE TABLE IF NOT EXISTS `d_siswa` (
  `s_id` int(11) NOT NULL,
  `s_nomor_induk_siswa` varchar(50) NOT NULL,
  `s_jenjang_pendidikan` varchar(50) NOT NULL,
  `s_group_spp` int(11) NOT NULL,
  `s_sekolah` int(11) NOT NULL,
  `s_nama` varchar(50) DEFAULT NULL,
  `s_nomor_induk_nasional` varchar(50) DEFAULT NULL,
  `s_jenis_kelamin` enum('L','P') DEFAULT NULL,
  `s_tempat_lahir` varchar(50) DEFAULT NULL,
  `s_tanggal_lahir` date DEFAULT NULL,
  `s_agama` varchar(50) DEFAULT NULL,
  `s_urutan_anak` int(11) DEFAULT NULL,
  `s_jumlah_saudara_kandung` int(11) DEFAULT NULL,
  `s_alamat` varchar(50) DEFAULT NULL,
  `Column 11` varchar(50) DEFAULT NULL,
  `s_tinggi` int(11) DEFAULT NULL,
  `s_berat` int(11) DEFAULT NULL,
  `s_asal_sekolah` varchar(50) DEFAULT NULL,
  `s_ijazah_sd` varchar(50) DEFAULT NULL,
  `s_ijazah_smp` varchar(50) DEFAULT NULL,
  `s_ijazah_sma` varchar(50) DEFAULT NULL,
  `s_nama_ibu` varchar(50) DEFAULT NULL,
  `s_pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `s_nama_ayah` varchar(50) DEFAULT NULL,
  `s_pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `s_alamat_orang_tua` varchar(50) DEFAULT NULL,
  `s_nama_wali` varchar(50) DEFAULT NULL,
  `s_pekerjaan_wali` varchar(50) DEFAULT NULL,
  `s_alamat_wali` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`s_id`),
  KEY `FK_d_siswa_d_sekolah` (`s_sekolah`),
  KEY `FK_d_siswa_d_group_spp` (`s_group_spp`),
  CONSTRAINT `FK_d_siswa_d_group_spp` FOREIGN KEY (`s_group_spp`) REFERENCES `d_group_spp` (`gs_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_d_siswa_d_sekolah` FOREIGN KEY (`s_sekolah`) REFERENCES `d_sekolah` (`s_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_ayah
CREATE TABLE IF NOT EXISTS `d_siswa_ayah` (
  `sa_id` int(11) NOT NULL,
  `sa_nama` varchar(50) DEFAULT NULL,
  `sa_tempat_lahir` varchar(50) DEFAULT NULL,
  `sa_tanggal_lahir` date DEFAULT NULL,
  `sa_agama` varchar(50) DEFAULT NULL,
  `sa_kewarganegaraan` varchar(50) DEFAULT NULL,
  `sa_pendidikan` varchar(50) DEFAULT NULL,
  `sa_pekerjaan` varchar(50) DEFAULT NULL,
  `sa_penghasilan` double DEFAULT NULL,
  `sa_alamat` varchar(50) DEFAULT NULL,
  `sa_telpon` varchar(50) DEFAULT NULL,
  `sa_status` enum('H','M') DEFAULT NULL,
  PRIMARY KEY (`sa_id`),
  CONSTRAINT `FK_d_siswa_ayah_d_siswa_data_diri` FOREIGN KEY (`sa_id`) REFERENCES `d_siswa_data_diri` (`sdd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table darul_ulum.d_siswa_ayah: ~2 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_ayah` DISABLE KEYS */;
REPLACE INTO `d_siswa_ayah` (`sa_id`, `sa_nama`, `sa_tempat_lahir`, `sa_tanggal_lahir`, `sa_agama`, `sa_kewarganegaraan`, `sa_pendidikan`, `sa_pekerjaan`, `sa_penghasilan`, `sa_alamat`, `sa_telpon`, `sa_status`) VALUES
	(3, '3232', 'fdsfds', '2018-10-31', 'ISLAM', '433', 'SARJANA', '223', 23223333, '3232', '323232', 'H'),
	(4, 'Asgard', 'Asgard', '2018-10-30', 'ISLAM', 'Asgard', 'SARJANA', 'Asgard', 10000000, 'Asgard', '09090909', 'H'),
	(5, 'Tes', 'Tes', '2018-10-29', 'ISLAM', 'Tes', 'SARJANA', 'Tes', 23232, 'Tes', '23232', 'H');
/*!40000 ALTER TABLE `d_siswa_ayah` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_data_diri
CREATE TABLE IF NOT EXISTS `d_siswa_data_diri` (
  `sdd_id` int(11) NOT NULL,
  `sdd_nomor_induk` varchar(50) NOT NULL,
  `sdd_nomor_induk_nasional` varchar(50) NOT NULL,
  `sdd_nama` varchar(50) NOT NULL,
  `sdd_panggilan` varchar(50) NOT NULL,
  `sdd_jenis_kelamin` enum('L','P') NOT NULL,
  `sdd_golongan_darah` varchar(50) NOT NULL,
  `sdd_tempat_lahir` varchar(50) NOT NULL,
  `sdd_tanggal_lahir` date NOT NULL,
  `sdd_tinggi` int(11) NOT NULL,
  `sdd_berat` int(11) NOT NULL,
  `sdd_agama` varchar(50) NOT NULL,
  `sdd_urutan_anak` int(11) NOT NULL,
  `sdd_saudara_kandung` int(11) NOT NULL,
  `sdd_saudara_tiri` int(11) NOT NULL,
  `sdd_bahasa` varchar(50) NOT NULL,
  `sdd_jenjang_sebelumnya` varchar(100) NOT NULL,
  `sdd_kewarganegaraan` varchar(100) NOT NULL,
  `sdd_image` varchar(100) NOT NULL,
  `sdd_sekolah` int(11) NOT NULL,
  `sdd_status` varchar(50) DEFAULT 'Released',
  `sdd_status_siswa` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `sdd_group_spp` int(11) DEFAULT NULL,
  `sdd_tahun_ajaran` year(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`sdd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_data_diri: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_data_diri` DISABLE KEYS */;
REPLACE INTO `d_siswa_data_diri` (`sdd_id`, `sdd_nomor_induk`, `sdd_nomor_induk_nasional`, `sdd_nama`, `sdd_panggilan`, `sdd_jenis_kelamin`, `sdd_golongan_darah`, `sdd_tempat_lahir`, `sdd_tanggal_lahir`, `sdd_tinggi`, `sdd_berat`, `sdd_agama`, `sdd_urutan_anak`, `sdd_saudara_kandung`, `sdd_saudara_tiri`, `sdd_bahasa`, `sdd_jenjang_sebelumnya`, `sdd_kewarganegaraan`, `sdd_image`, `sdd_sekolah`, `sdd_status`, `sdd_status_siswa`, `sdd_group_spp`, `sdd_tahun_ajaran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(3, '10000000000000000', '23123123', 'anya', '345435435', 'L', 'b', '345454', '2018-10-29', 178, 45, 'ISLAM', 454, 45, 0, 'hggfh', 'TK', 'INDONESIA', 'data_siswa_3_.jpg', 2, 'Setujui', 'ACTIVE', 1, '2017', '2018-10-16 11:57:53', '2018-10-16 11:57:53', 'DASD', 'DASD'),
	(4, '02323233', '232323233', 'Rina Permatasari', 'Rina', 'P', 'B', 'surabaya', '2004-02-04', 165, 51, 'ISLAM', 2, 2, 0, 'indonesia', 'SMP', 'indonesia', 'data_siswa_4_.jpg', 3, 'Setujui', 'ACTIVE', 1, '2018', '2018-10-16 23:52:13', '2018-10-16 23:52:13', 'DASD', 'DASD'),
	(5, '0232323', '02323232', 'Tes', 'Tes', 'P', 'Tes', 'Tes', '2018-11-05', 232, 2332, 'ISLAM', 1, 1, 0, 'Tes', 'SMP', 'Tes', 'data_siswa_5_.jpg', 3, 'Setujui', 'ACTIVE', 1, '2018', '2018-10-16 23:55:52', '2018-10-16 23:55:52', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_siswa_data_diri` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_ibu
CREATE TABLE IF NOT EXISTS `d_siswa_ibu` (
  `si_id` int(11) NOT NULL,
  `si_nama` varchar(50) DEFAULT NULL,
  `si_tempat_lahir` varchar(50) DEFAULT NULL,
  `si_tanggal_lahir` date DEFAULT NULL,
  `si_agama` varchar(50) DEFAULT NULL,
  `si_kewarganegaraan` varchar(50) DEFAULT NULL,
  `si_pendidikan` varchar(50) DEFAULT NULL,
  `si_pekerjaan` varchar(50) DEFAULT NULL,
  `si_penghasilan` double DEFAULT NULL,
  `si_alamat` varchar(50) DEFAULT NULL,
  `si_telpon` varchar(50) DEFAULT NULL,
  `si_status` enum('H','M') DEFAULT NULL,
  PRIMARY KEY (`si_id`),
  CONSTRAINT `FK_d_siswa_ibu_d_siswa_data_diri` FOREIGN KEY (`si_id`) REFERENCES `d_siswa_data_diri` (`sdd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_ibu: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_ibu` DISABLE KEYS */;
REPLACE INTO `d_siswa_ibu` (`si_id`, `si_nama`, `si_tempat_lahir`, `si_tanggal_lahir`, `si_agama`, `si_kewarganegaraan`, `si_pendidikan`, `si_pekerjaan`, `si_penghasilan`, `si_alamat`, `si_telpon`, `si_status`) VALUES
	(3, 'dfdf', 'dfdfd', '2018-10-11', 'ISLAM', '434', 'SARJANA', '2323', 23232323, '323', '2232', 'H'),
	(4, 'Hera', 'Asgard', '2018-11-07', 'ISLAM', 'Asgard', 'SARJANA', 'Asgard', 30300000, 'Asgard', '23232323', 'H'),
	(5, 'Tes', 'Tes', '2018-10-16', 'ISLAM', 'Tes', 'SARJANA', 'Tes', 232323, 'Tes', '23232', 'H');
/*!40000 ALTER TABLE `d_siswa_ibu` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_kesehatan
CREATE TABLE IF NOT EXISTS `d_siswa_kesehatan` (
  `sk_id` int(11) NOT NULL,
  `sk_detail` int(11) NOT NULL,
  `sk_nama_penyakit` varchar(50) NOT NULL,
  `sk_keterangan` varchar(300) NOT NULL,
  PRIMARY KEY (`sk_id`,`sk_detail`),
  CONSTRAINT `FK_d_siswa_kesehatan_d_siswa_data_diri` FOREIGN KEY (`sk_id`) REFERENCES `d_siswa_data_diri` (`sdd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_kesehatan: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_kesehatan` DISABLE KEYS */;
REPLACE INTO `d_siswa_kesehatan` (`sk_id`, `sk_detail`, `sk_nama_penyakit`, `sk_keterangan`) VALUES
	(5, 1, '-', '-');
/*!40000 ALTER TABLE `d_siswa_kesehatan` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_pendidikan
CREATE TABLE IF NOT EXISTS `d_siswa_pendidikan` (
  `sp_id` int(11) NOT NULL,
  `sp_detail` int(11) NOT NULL,
  `sp_tingkat_pendidikan` varchar(50) DEFAULT NULL,
  `sp_nama_sekolah` varchar(300) NOT NULL,
  `sp_keterangan` varchar(300) NOT NULL,
  `sp_ijazah` varchar(50) NOT NULL,
  `sp_tanggal_ijazah` date NOT NULL,
  PRIMARY KEY (`sp_id`,`sp_detail`),
  CONSTRAINT `FK_d_siswa_pendidikan_d_siswa_data_diri` FOREIGN KEY (`sp_id`) REFERENCES `d_siswa_data_diri` (`sdd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_pendidikan: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_pendidikan` DISABLE KEYS */;
REPLACE INTO `d_siswa_pendidikan` (`sp_id`, `sp_detail`, `sp_tingkat_pendidikan`, `sp_nama_sekolah`, `sp_keterangan`, `sp_ijazah`, `sp_tanggal_ijazah`) VALUES
	(3, 1, NULL, '4545', '2323323', '45454', '2018-10-16'),
	(4, 1, NULL, 'smpn 17 surabaya', '-', '098098909809', '2018-10-16'),
	(5, 1, NULL, 'Tes', 'Tes', '2323232', '2018-10-16');
/*!40000 ALTER TABLE `d_siswa_pendidikan` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_tempat_tinggal
CREATE TABLE IF NOT EXISTS `d_siswa_tempat_tinggal` (
  `stt_id` int(11) NOT NULL,
  `stt_alamat` varchar(300) DEFAULT NULL,
  `stt_no_telp` varchar(50) DEFAULT NULL,
  `stt_status_tempat_tinggal` varchar(50) DEFAULT NULL,
  `stt_jarak_rumah` int(11) DEFAULT NULL,
  PRIMARY KEY (`stt_id`),
  CONSTRAINT `FK_d_siswa_tempat_tinggal_d_siswa_data_diri` FOREIGN KEY (`stt_id`) REFERENCES `d_siswa_data_diri` (`sdd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_tempat_tinggal: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_tempat_tinggal` DISABLE KEYS */;
REPLACE INTO `d_siswa_tempat_tinggal` (`stt_id`, `stt_alamat`, `stt_no_telp`, `stt_status_tempat_tinggal`, `stt_jarak_rumah`) VALUES
	(3, 'ghfghfg', '4545454', 'ORANG TUA', 4545),
	(4, '-', '0898989', 'ORANG TUA', 12),
	(5, 'Tes', '23232', 'ORANG TUA', 23);
/*!40000 ALTER TABLE `d_siswa_tempat_tinggal` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_wali
CREATE TABLE IF NOT EXISTS `d_siswa_wali` (
  `sw_id` int(11) NOT NULL,
  `sw_nama` varchar(50) DEFAULT NULL,
  `sw_tempat_lahir` varchar(50) DEFAULT NULL,
  `sw_tanggal_lahir` date DEFAULT NULL,
  `sw_agama` varchar(50) DEFAULT NULL,
  `sw_kewarganegaraan` varchar(50) DEFAULT NULL,
  `sw_pendidikan` varchar(50) DEFAULT NULL,
  `sw_pekerjaan` varchar(50) DEFAULT NULL,
  `sw_penghasilan` double DEFAULT NULL,
  `sw_alamat` varchar(50) DEFAULT NULL,
  `sw_telpon` varchar(50) DEFAULT NULL,
  `sw_status` enum('H','M') DEFAULT NULL,
  PRIMARY KEY (`sw_id`),
  CONSTRAINT `FK_d_siswa_wali_d_siswa_data_diri` FOREIGN KEY (`sw_id`) REFERENCES `d_siswa_data_diri` (`sdd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table darul_ulum.d_siswa_wali: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_wali` DISABLE KEYS */;
REPLACE INTO `d_siswa_wali` (`sw_id`, `sw_nama`, `sw_tempat_lahir`, `sw_tanggal_lahir`, `sw_agama`, `sw_kewarganegaraan`, `sw_pendidikan`, `sw_pekerjaan`, `sw_penghasilan`, `sw_alamat`, `sw_telpon`, `sw_status`) VALUES
	(3, '3213', '123213', '2018-10-11', 'ISLAM', '2323', 'SD', 'wfewfew', 23333333, '2323', '232323', 'H'),
	(4, 'Asgard', 'Asgard', '2018-11-06', 'ISLAM', 'Asgard', 'SARJANA', 'Asgard', 23232323, 'Asgard', 'Asgard', 'H'),
	(5, 'Tes', 'Tes', '2018-10-16', 'ISLAM', 'Tes', 'SARJANA', 'Tes', 12323232, 'Tes', '23232', 'H');
/*!40000 ALTER TABLE `d_siswa_wali` ENABLE KEYS */;

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
  `st_sekolah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_staff: ~3 rows (approximately)
/*!40000 ALTER TABLE `d_staff` DISABLE KEYS */;
REPLACE INTO `d_staff` (`st_id`, `st_nama`, `st_alamat`, `st_tanggal_lahir`, `st_tempat_lahir`, `st_telpon`, `st_image`, `st_posisi`, `st_sekolah`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'riani', 'medokan', '1995-07-05', 'surabaya', '09829323', 'staff_2_.jpg', 1, 2, '2018-09-11 03:56:20', '2018-09-18 19:38:36', 'DASD', 'DASD'),
	(2, 'tam', 'medokan', '1995-11-27', 'surabaya', '2321312', 'staff_2_.jpg', 2, 1, '2018-09-11 05:17:53', '2018-09-11 05:19:09', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `username`, `email`, `jabatan_id`, `image`, `sekolah_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
	(1, 'DASD', 'superuser', 'dewa17a@gmail.com', 1, 'user_1_.jpg', 2, NULL, '$2y$10$cVM5X9ul9anYahkLdxWWwOblwyXA5dpsDcdg6Iha6wysxoE79j.ri', 'A8YetrKrdf7EaFpPCSzfix5eD2Y1PQmhyu6fJbiuKOPlyOjOwMpq5eRHfc5L', '2018-09-09 05:09:27', '2018-09-18 15:33:34', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
