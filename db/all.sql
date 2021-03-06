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

-- Dumping data for table darul_ulum.d_akun: ~52 rows (approximately)
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
	('611501', 'BIAYA GAJI KARYAWAN RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '61150', 'BIAYA GAJI KARYAWAN', NULL, NULL, 0, '2018-12-01', 'DASD', 'DASD', '2018-12-14 20:28:56', '2018-12-14 20:28:56'),
	('611502', 'BIAYA GAJI KARYAWAN MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '61150', 'BIAYA GAJI KARYAWAN', NULL, NULL, 0, '2018-12-01', 'DASD', 'DASD', '2018-12-14 20:28:57', '2018-12-14 20:28:57'),
	('611503', 'BIAYA GAJI KARYAWAN MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '61150', 'BIAYA GAJI KARYAWAN', NULL, NULL, 0, '2018-12-01', 'DASD', 'DASD', '2018-12-14 20:28:57', '2018-12-14 20:28:57'),
	('611504', 'BIAYA GAJI KARYAWAN SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '61150', 'BIAYA GAJI KARYAWAN', NULL, NULL, 0, '2018-12-01', 'DASD', 'DASD', '2018-12-14 20:28:57', '2018-12-14 20:28:57'),
	('611505', 'BIAYA GAJI KARYAWAN YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '61150', 'BIAYA GAJI KARYAWAN', NULL, NULL, 0, '2018-12-01', 'DASD', 'DASD', '2018-12-14 20:28:57', '2018-12-14 20:28:57'),
	('711101', 'DEPRESIASI ASET RA DARUL ULUM GRESIK', 1, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42'),
	('711102', 'DEPRESIASI ASET MI DARUL ULUM GRESIK', 2, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42'),
	('711103', 'DEPRESIASI ASET MTS DARUL ULUM GRESIK', 3, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42'),
	('711104', 'DEPRESIASI ASET SMA DARUL ULUM GRESIK', 4, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42'),
	('711105', 'DEPRESIASI ASET YAYASAN DARUL ULUM GRESIK', 5, 'OCF', 'DEBET', 'Y', '71110', 'DEPRESIASI ASET', NULL, NULL, 0, '2018-11-01', 'DASD', 'DASD', '2018-11-20 12:03:42', '2018-11-20 12:03:42');
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

-- Dumping data for table darul_ulum.d_barang: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_barang` DISABLE KEYS */;
REPLACE INTO `d_barang` (`b_id`, `b_nama`, `b_keterangan`, `b_harga_tertinggi`, `b_akun`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'KURSI', 'PEMBELIAN KURSI', 250000, '62100', '2018-09-19 21:57:47', '2018-09-22 20:36:56', 'DASD', 'DASD'),
	(2, 'SAPU', 'PEMBELIAN SAPU', 50000, '62400', '2018-09-19 22:01:26', '2018-09-22 20:38:37', 'DASD', 'DASD'),
	(3, 'PAPAN TULIS', 'PAPAN TULIS', 200000, '62100', '2018-09-22 20:38:56', '2018-09-22 20:38:56', 'DASD', 'DASD'),
	(4, 'BUKU PAKET', 'UNTUK KELAS 6 - RA DARUL ULUM', 55000, '62400', '2018-10-01 01:10:21', '2018-10-01 01:10:21', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.d_bukti_kas_keluar: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_bukti_kas_keluar` DISABLE KEYS */;
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

-- Dumping data for table darul_ulum.d_bukti_kas_keluar_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_bukti_kas_keluar_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_bukti_kas_keluar_detail` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_daftar_menu
CREATE TABLE IF NOT EXISTS `d_daftar_menu` (
  `dm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_nama` varchar(50) NOT NULL,
  `dm_group` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dm_id`,`dm_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_daftar_menu: ~29 rows (approximately)
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
	(21, 'PEMASUKAN KAS', 5, '2018-10-04 22:05:04', '2018-10-04 22:05:04'),
	(22, 'KONFIRMASI SISWA', 4, '2018-10-13 18:07:28', '2018-10-13 18:07:28'),
	(22, 'KONFIRMASI SISWA BARU', 4, '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(23, 'DATA SISWA', 4, '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(23, 'REKAP SISWA', 4, '2018-10-13 19:48:00', '2018-10-13 19:48:00'),
	(24, 'MASTER GROUP SPP', 2, '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(25, 'MASTER KELAS', 2, '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(26, 'LAPORAN REGISTER JURNAL', 7, '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(27, 'LAPORAN LABA RUGI', 7, '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(28, 'LAPORAN REGISTER JURNAL', 7, '2018-10-27 08:49:36', '2018-10-27 08:49:36'),
	(29, 'KELAS', 4, '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(30, 'SPP', 4, '2018-11-17 12:53:05', '2018-11-17 12:53:05');
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

-- Dumping data for table darul_ulum.d_group_akun: ~6 rows (approximately)
/*!40000 ALTER TABLE `d_group_akun` DISABLE KEYS */;
REPLACE INTO `d_group_akun` (`ga_id`, `ga_nama`, `ga_jenis_group`, `ga_jenis_neraca`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'ASET TETAP', 'neraca', 'A', '2018-09-11 11:48:27', '2018-09-11 20:59:24', 'DASD', 'DASD'),
	(2, 'PENDAPATAN DARI NEGARA', 'labarugi', NULL, '2018-09-11 13:58:56', '2018-09-11 20:59:35', 'DASD', 'DASD'),
	(3, 'TES', 'labarugi', NULL, '2018-09-18 19:55:29', '2018-09-18 19:55:29', 'DASD', 'DASD'),
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

-- Dumping data for table darul_ulum.d_group_spp: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_group_spp` DISABLE KEYS */;
REPLACE INTO `d_group_spp` (`gs_id`, `gs_nama`, `gs_keterangan`, `gs_nilai`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'GOLONGAN A', 'GOLONGAN ATAS', 300000, '2018-10-04 22:07:27', '2018-10-04 22:07:36', 'DASD', 'DASD'),
	(2, 'GOLONGAN B', 'GOLONGAN B', 300000, '2018-11-17 13:55:06', '2018-11-17 13:55:06', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.d_hak_akses: ~175 rows (approximately)
/*!40000 ALTER TABLE `d_hak_akses` DISABLE KEYS */;
REPLACE INTO `d_hak_akses` (`ha_id`, `ha_dt`, `ha_level`, `ha_menu`, `aktif`, `tambah`, `ubah`, `hapus`, `sekolah`, `global`, `print`, `created_at`, `updated_at`) VALUES
	(5, 1, 1, 'SETTING USER', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:05', '2018-09-11 23:16:04'),
	(5, 2, 2, 'SETTING USER', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-09-09 20:14:05', '2018-10-02 20:30:59'),
	(5, 3, 3, 'SETTING USER', b'1', b'1', b'1', b'1', b'0', b'0', b'0', '2018-09-09 20:14:05', '2018-10-23 18:53:39'),
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
	(28, 5, 5, 'REKAP SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-13 19:48:00', '2018-10-13 19:48:00'),
	(29, 1, 1, 'KONFIRMASI SISWA BARU', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 2, 2, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 3, 3, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 4, 4, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 5, 5, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 6, 6, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 7, 7, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 8, 8, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 9, 9, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(29, 10, 10, 'KONFIRMASI SISWA BARU', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:51:50', '2018-10-23 18:51:50'),
	(30, 1, 1, 'DATA SISWA', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 2, 2, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 3, 3, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 4, 4, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 5, 5, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 6, 6, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 7, 7, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 8, 8, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 9, 9, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(30, 10, 10, 'DATA SISWA', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:52:40', '2018-10-23 18:52:40'),
	(31, 1, 1, 'MASTER GROUP SPP', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 2, 2, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 3, 3, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 4, 4, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 5, 5, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 6, 6, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 7, 7, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 8, 8, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 9, 9, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(31, 10, 10, 'MASTER GROUP SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:57:57', '2018-10-23 18:57:57'),
	(32, 1, 1, 'MASTER KELAS', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 2, 2, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 3, 3, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 4, 4, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 5, 5, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 6, 6, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 7, 7, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 8, 8, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 9, 9, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(32, 10, 10, 'MASTER KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 18:58:25', '2018-10-23 18:58:25'),
	(33, 1, 1, 'LAPORAN REGISTER JURNAL', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 2, 2, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 3, 3, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 4, 4, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 5, 5, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 6, 6, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 7, 7, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 8, 8, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 9, 9, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(33, 10, 10, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:03:36', '2018-10-23 19:03:36'),
	(34, 1, 1, 'LAPORAN LABA RUGI', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 2, 2, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 3, 3, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 4, 4, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 5, 5, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 6, 6, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 7, 7, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 8, 8, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 9, 9, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(34, 10, 10, 'LAPORAN LABA RUGI', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-23 19:05:48', '2018-10-23 19:05:48'),
	(35, 1, 1, 'LAPORAN REGISTER JURNAL', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-10-27 08:49:36', '2018-10-27 08:49:36'),
	(35, 2, 2, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:36', '2018-10-27 08:49:36'),
	(35, 3, 3, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:37', '2018-10-27 08:49:37'),
	(35, 4, 4, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:37', '2018-10-27 08:49:37'),
	(35, 5, 5, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:37', '2018-10-27 08:49:37'),
	(35, 6, 6, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:37', '2018-10-27 08:49:37'),
	(35, 7, 7, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:37', '2018-10-27 08:49:37'),
	(35, 8, 8, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:37', '2018-10-27 08:49:37'),
	(35, 9, 9, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:37', '2018-10-27 08:49:37'),
	(35, 10, 10, 'LAPORAN REGISTER JURNAL', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-10-27 08:49:37', '2018-10-27 08:49:37'),
	(36, 1, 1, 'KELAS', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 2, 2, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 3, 3, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 4, 4, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 5, 5, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 6, 6, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 7, 7, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 8, 8, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 9, 9, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(36, 10, 10, 'KELAS', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-13 22:01:14', '2018-11-13 22:01:14'),
	(37, 1, 1, 'SPP', b'1', b'1', b'1', b'1', b'1', b'1', b'1', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 2, 2, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 3, 3, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 4, 4, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 5, 5, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 6, 6, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 7, 7, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 8, 8, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 9, 9, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05'),
	(37, 10, 10, 'SPP', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '2018-11-17 12:53:05', '2018-11-17 12:53:05');
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

-- Dumping data for table darul_ulum.d_history_spp: ~6 rows (approximately)
/*!40000 ALTER TABLE `d_history_spp` DISABLE KEYS */;
REPLACE INTO `d_history_spp` (`hs_id`, `hs_detail`, `hs_nota`, `hs_bulan`, `hs_tahun`, `hs_keterangan`, `hs_akun_kas`, `hs_akun`, `hs_jumlah`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(3, 1, 'SPP-112018/2/00001', 'November', '2018', NULL, '11110', '41120', 300000, '2018-11-20 12:04:12', '2018-11-20 12:04:39', 'DASD', 'DASD'),
	(3, 2, 'SPP-122018/2/00001', 'Desember', '2018', NULL, '11110', '41120', 300000, '2018-11-20 12:10:25', '2018-11-20 12:10:25', 'DASD', 'DASD'),
	(3, 3, 'SPP-012018/2/00001', 'Januari', '2018', 'tes', '11110', '41120', 300000, '2018-12-14 20:26:00', '2018-12-14 20:26:00', 'DASD', 'DASD'),
	(4, 1, 'SPP-112018/3/00002', 'November', '2018', NULL, '11110', '41120', 300000, '2018-11-20 12:04:16', '2018-11-20 12:04:36', 'DASD', 'DASD'),
	(4, 2, 'SPP-122018/3/00002', 'Desember', '2018', NULL, '11110', '41120', 300000, '2018-11-20 12:10:31', '2018-11-20 12:10:31', 'DASD', 'DASD'),
	(4, 3, 'SPP-012018/3/00002', 'Januari', '2018', NULL, '11110', '41120', 300000, '2018-12-14 20:26:09', '2018-12-14 20:26:09', 'DASD', 'DASD'),
	(5, 1, 'SPP-112018/3/00003', 'November', '2018', NULL, '11110', '41120', 300000, '2018-11-20 12:04:20', '2018-11-20 12:04:42', 'DASD', 'DASD'),
	(5, 2, 'SPP-122018/3/00003', 'Desember', '2018', NULL, '11110', '41120', 300000, '2018-11-20 12:10:35', '2018-11-20 12:10:35', 'DASD', 'DASD'),
	(5, 3, 'SPP-012018/3/00003', 'Januari', '2018', NULL, '11110', '41120', 300000, '2018-12-14 20:26:13', '2018-12-14 20:26:13', 'DASD', 'DASD'),
	(6, 1, 'SPP-122018/2/00004', 'Desember', '2018', 'yrd', '11110', '41120', 300000, '2018-12-12 19:42:46', '2018-12-12 19:42:46', 'DASD', 'DASD'),
	(6, 2, 'SPP-012018/2/00004', 'Januari', '2018', NULL, '11110', '41120', 300000, '2018-12-14 20:26:16', '2018-12-14 20:26:16', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.d_jabatan: ~10 rows (approximately)
/*!40000 ALTER TABLE `d_jabatan` DISABLE KEYS */;
REPLACE INTO `d_jabatan` (`j_id`, `j_nama`, `j_keterangan`, `j_created_at`, `j_updated_at`, `j_created_by`, `j_updated_by`) VALUES
	(1, 'SUPERUSER', 'ADMIN', NULL, NULL, NULL, NULL),
	(2, 'PEMBINA YAYASAN', 'PEMBINA YAYASAN DARUL ULUM  GRESIK', '2018-10-01 01:25:52', '2018-10-01 01:25:52', 'DASD', 'DASD'),
	(3, 'KETUA YAYASAN', 'KETUA YAYASAN DARUL ULUM GRESIK', '2018-10-01 01:27:23', '2018-10-01 01:27:42', 'DASD', 'DASD'),
	(4, 'WAKIL KETUA YAYASAN', 'WAKIL KETUA YAYASAN DARUL ULUM GRESIK', '2018-10-01 01:28:15', '2018-10-01 01:28:15', 'DASD', 'DASD'),
	(5, 'ADMIN YAYASAN', 'ADMIN YAYASAN DARUL ULUM GRESIK', '2018-10-01 01:28:49', '2018-10-01 01:28:49', 'DASD', 'DASD'),
	(6, 'KEPALA SEKOLAH SMA', 'KEPALA SEKOLAH SMA DARUL ULUM GRESIK', '2018-10-01 01:29:34', '2018-10-01 01:29:34', 'DASD', 'DASD'),
	(7, 'KEPALA SEKOLAH MTS', 'KEPALA SEKOLAH MTS DARUL ULUM GRESIK', '2018-10-01 01:30:06', '2018-10-01 01:30:06', 'DASD', 'DASD'),
	(8, 'KEPALA SEKOLAH MI', 'KEPALA SEKOLAH MI DARUL ULUM GRESIK', '2018-10-01 01:30:36', '2018-10-01 01:30:36', 'DASD', 'DASD'),
	(9, 'KEPALA SEKOLAH RA', 'KEPALA SEKOLAH RA DARUL ULUM GRESIK', '2018-10-01 01:31:00', '2018-10-01 01:31:00', 'DASD', 'DASD'),
	(10, 'ADMIN SEKOLAH SMA', 'ADMIN SEKOLAH SMA DARUL ULUM GRESIK', '2018-10-01 01:31:38', '2018-10-01 01:31:38', 'DASD', 'DASD');
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
	(10, '2018', '2018-11-20', '', 3, 'PEMBAYARAN SPP', 'SPP-122018/3/00003', 'KAS MASUK', '2018-11-20 12:10:35', '2018-11-20 12:10:35', 'DASD', 'DASD'),
	(11, '2018', '2018-12-12', 'YRD', 2, 'PEMBAYARAN SPP', 'SPP-122018/2/00004', 'KAS MASUK', '2018-12-12 19:42:46', '2018-12-12 19:42:46', 'DASD', 'DASD'),
	(12, '2018', '2018-12-14', 'BBM', 2, 'PETTY CASH', 'PC-122018/2/001', 'KAS KELUAR', '2018-12-14 19:39:58', '2018-12-14 19:39:58', 'DASD', 'DASD'),
	(13, '2018', '2018-12-14', 'TES', 2, 'PEMBAYARAN SPP', 'SPP-012018/2/00001', 'KAS MASUK', '2018-12-14 20:26:00', '2018-12-14 20:26:00', 'DASD', 'DASD'),
	(14, '2018', '2018-12-14', '', 3, 'PEMBAYARAN SPP', 'SPP-012018/3/00002', 'KAS MASUK', '2018-12-14 20:26:09', '2018-12-14 20:26:09', 'DASD', 'DASD'),
	(15, '2018', '2018-12-14', '', 3, 'PEMBAYARAN SPP', 'SPP-012018/3/00003', 'KAS MASUK', '2018-12-14 20:26:13', '2018-12-14 20:26:13', 'DASD', 'DASD'),
	(16, '2018', '2018-10-14', '', 2, 'PEMBAYARAN SPP', 'SPP-012018/2/00004', 'KAS MASUK', '2018-12-14 20:26:16', '2018-12-14 20:26:16', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.d_jurnal_dt: ~11 rows (approximately)
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
	(10, 2, '411203', 'PENDAPATAN SPP MTS DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(11, 1, '111102', 'KAS MI DARUL ULUM GRESIK YRD', 'DEBET', 300000),
	(11, 2, '411202', 'PENDAPATAN SPP MI DARUL ULUM GRESIK YRD', 'KREDIT', 300000),
	(12, 1, '111102', 'KAS MI DARUL ULUM GRESIK BBM', 'KREDIT', -50000),
	(12, 2, '611402', 'BIAYA LAIN MI DARUL ULUM GRESIK BIAYA BBM', 'DEBET', 50000),
	(13, 1, '111102', 'KAS MI DARUL ULUM GRESIK TES', 'DEBET', 300000),
	(13, 2, '411202', 'PENDAPATAN SPP MI DARUL ULUM GRESIK TES', 'KREDIT', 300000),
	(14, 1, '111103', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(14, 2, '411203', 'PENDAPATAN SPP MTS DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(15, 1, '111103', 'KAS MTS DARUL ULUM GRESIK ', 'DEBET', 300000),
	(15, 2, '411203', 'PENDAPATAN SPP MTS DARUL ULUM GRESIK ', 'KREDIT', 300000),
	(16, 1, '111102', 'KAS MI DARUL ULUM GRESIK ', 'DEBET', 300000),
	(16, 2, '411202', 'PENDAPATAN SPP MI DARUL ULUM GRESIK ', 'KREDIT', 300000);
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

-- Dumping data for table darul_ulum.d_kas_masuk: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_kas_masuk` DISABLE KEYS */;
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

-- Dumping data for table darul_ulum.d_kas_masuk_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_kas_masuk_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_kas_masuk_detail` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_kelas
CREATE TABLE IF NOT EXISTS `d_kelas` (
  `k_id` int(11) NOT NULL,
  `k_nama` varchar(50) DEFAULT NULL,
  `k_keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`k_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_kelas: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_kelas` DISABLE KEYS */;
REPLACE INTO `d_kelas` (`k_id`, `k_nama`, `k_keterangan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'A', 'A', '2018-10-19 19:57:36', '2018-10-19 19:57:36', 'DASD', 'DASD'),
	(2, 'B', 'B', '2018-10-19 19:57:39', '2018-10-19 19:57:39', 'DASD', 'DASD'),
	(3, 'C', 'C', '2018-10-19 19:57:41', '2018-10-19 19:57:41', 'DASD', 'DASD'),
	(4, 'D', 'D', '2018-10-19 19:57:44', '2018-10-19 19:57:44', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_kelas` ENABLE KEYS */;

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
	(1, 'PC-122018/2/001', '11110', 'BBM', 'SUPRI', 2, 'APPROVED', '2018-12-14', 50000, 'PETTY', NULL, '2018-12-14 19:37:36', '2018-12-14 19:39:58', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.d_petty_cash_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_petty_cash_detail` DISABLE KEYS */;
REPLACE INTO `d_petty_cash_detail` (`pcd_id`, `pcd_detail`, `pcd_akun_biaya`, `pcd_keterangan`, `pcd_jumlah`, `pcd_qty`, `pcd_rpd_detail`, `pcd_barang`) VALUES
	(1, 1, '61140', 'biaya bbm', 50000, 1, NULL, NULL);
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

-- Dumping data for table darul_ulum.d_posisi: ~12 rows (approximately)
/*!40000 ALTER TABLE `d_posisi` DISABLE KEYS */;
REPLACE INTO `d_posisi` (`p_id`, `p_nama`, `p_gaji`, `created_at`, `updated_at`) VALUES
	(1, 'PEMBINA YAYASAN', 0, '2018-09-30 23:40:35', '2018-09-30 23:40:35'),
	(2, 'KETUA YAYASAN', 0, '2018-09-30 23:42:17', '2018-09-30 23:42:17'),
	(3, 'WAKIL KETUA YAYASAN', 0, '2018-09-30 23:42:57', '2018-09-30 23:42:57'),
	(4, 'ADMIN YAYASAN', 0, '2018-09-30 23:43:14', '2018-09-30 23:43:14'),
	(5, 'KEPALA SEKOLAH RA', 0, '2018-09-30 23:43:37', '2018-09-30 23:45:14'),
	(6, 'KEPALA SEKOLAH MI', 0, '2018-09-30 23:49:22', '2018-09-30 23:49:22'),
	(7, 'KEPALA SEKOLAH MTS', 0, '2018-09-30 23:49:49', '2018-09-30 23:49:49'),
	(8, 'KEPALA SEKOLAH SMA', 0, '2018-09-30 23:51:54', '2018-09-30 23:52:03'),
	(9, 'ADMIN RA', 0, '2018-09-30 23:53:21', '2018-09-30 23:53:21'),
	(10, 'ADMIN MI', 0, '2018-09-30 23:53:34', '2018-09-30 23:53:34'),
	(11, 'ADMIN MTS', 0, '2018-09-30 23:53:46', '2018-09-30 23:53:46'),
	(12, 'ADMIN SMA', 0, '2018-09-30 23:53:52', '2018-09-30 23:53:52');
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

-- Dumping data for table darul_ulum.d_rencana_pembelian: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_rencana_pembelian` DISABLE KEYS */;
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

-- Dumping data for table darul_ulum.d_rencana_pembelian_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_rencana_pembelian_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_rencana_pembelian_detail` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_sekolah
CREATE TABLE IF NOT EXISTS `d_sekolah` (
  `s_id` int(11) NOT NULL,
  `s_nama` varchar(100) DEFAULT NULL,
  `s_telpon` varchar(50) DEFAULT NULL,
  `s_alamat` varchar(300) DEFAULT NULL,
  `s_logo` varchar(50) DEFAULT NULL,
  `s_nss` varchar(50) DEFAULT NULL,
  `s_npsn` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_sekolah: ~5 rows (approximately)
/*!40000 ALTER TABLE `d_sekolah` DISABLE KEYS */;
REPLACE INTO `d_sekolah` (`s_id`, `s_nama`, `s_telpon`, `s_alamat`, `s_logo`, `s_nss`, `s_npsn`, `created_at`, `updated_at`) VALUES
	(1, 'RA DARUL ULUM GRESIK', '031 - 22334455', 'JALAN MOJOSARI REJO RT.09 RW.03 - GRESIK 61177', 'sekolah_1_.png', NULL, NULL, '2018-09-10 16:13:48', '2018-09-30 23:09:05'),
	(2, 'MI DARUL ULUM GRESIK', '031 - 22334455', 'JALAN MOJOSARI REJO RT.09 RW.03 - GRESIK 61177', 'sekolah_2_.png', NULL, NULL, '2018-09-11 13:06:24', '2018-09-30 23:10:46'),
	(3, 'MTS DARUL ULUM GRESIK', '031 - 22334455', 'JALAN RAYA MOJOSARI REJO NO.01 - GRESIK 61177', 'sekolah_3_.png', NULL, NULL, '2018-09-30 23:17:11', '2018-09-30 23:17:11'),
	(4, 'SMA DARUL ULUM GRESIK', '031 - 22334455', 'JALAN RAYA MOJOSARI REJO NO.01 - GRESIK 61177', 'sekolah_4_.png', NULL, NULL, '2018-09-30 23:29:26', '2018-09-30 23:30:57'),
	(5, 'YAYASAN DARUL ULUM GRESIK', '031 - 22334455', 'JALAN RAYA MOJOSARI REJO NO.269 - GRESIK 61177', 'sekolah_5_.png', NULL, NULL, '2018-09-30 23:30:28', '2018-09-30 23:30:28');
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

-- Dumping data for table darul_ulum.d_siswa_ayah: ~5 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_ayah` DISABLE KEYS */;
REPLACE INTO `d_siswa_ayah` (`sa_id`, `sa_nama`, `sa_tempat_lahir`, `sa_tanggal_lahir`, `sa_agama`, `sa_kewarganegaraan`, `sa_pendidikan`, `sa_pekerjaan`, `sa_penghasilan`, `sa_alamat`, `sa_telpon`, `sa_status`) VALUES
	(3, '3232', 'fdsfds', '2018-10-31', 'ISLAM', '433', 'SARJANA', '223', 23223333, '3232', '323232', 'H'),
	(4, 'Asgard', 'Asgard', '2018-10-30', 'ISLAM', 'Asgard', 'SARJANA', 'Asgard', 10000000, 'Asgard', '09090909', 'H'),
	(5, 'Tes', 'Tes', '2018-10-29', 'ISLAM', 'Tes', 'SARJANA', 'Tes', 23232, 'Tes', '23232', 'H'),
	(6, 'tessdsdsdsds', 'tessdsdsdsds', '2018-10-23', 'ISLAM', 'tessdsdsdsds', 'SMA', 'tessdsdsdsds', 2322222, 'tessdsdsdsds', '12312312', 'H'),
	(7, 'fdsf', 'dfddfsd', '2018-11-13', 'ISLAM', 'sadas', 'SMP', 'sdsa', 3232323, 'dsfdsfd', '3232', 'H');
/*!40000 ALTER TABLE `d_siswa_ayah` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_data_diri
CREATE TABLE IF NOT EXISTS `d_siswa_data_diri` (
  `sdd_id` int(11) NOT NULL,
  `sdd_nomor_induk` varchar(50) DEFAULT NULL,
  `sdd_kelas` varchar(50) DEFAULT NULL,
  `sdd_nama_kelas` int(11) DEFAULT NULL,
  `sdd_jurusan` varchar(50) DEFAULT NULL,
  `sdd_nomor_induk_nasional` varchar(50) DEFAULT NULL,
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
  `sdd_saudara_angkat` int(11) NOT NULL,
  `sdd_bahasa` varchar(50) NOT NULL,
  `sdd_jenjang_sebelumnya` varchar(100) NOT NULL,
  `sdd_kewarganegaraan` varchar(100) NOT NULL,
  `sdd_image` varchar(100) NOT NULL,
  `sdd_sekolah` int(11) NOT NULL,
  `sdd_status` varchar(50) DEFAULT 'Released',
  `sdd_kartu_sosial` varchar(50) DEFAULT NULL,
  `sdd_status_siswa` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `sdd_group_spp` int(11) DEFAULT NULL,
  `sdd_tahun_ajaran` year(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`sdd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_data_diri: ~5 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_data_diri` DISABLE KEYS */;
REPLACE INTO `d_siswa_data_diri` (`sdd_id`, `sdd_nomor_induk`, `sdd_kelas`, `sdd_nama_kelas`, `sdd_jurusan`, `sdd_nomor_induk_nasional`, `sdd_nama`, `sdd_panggilan`, `sdd_jenis_kelamin`, `sdd_golongan_darah`, `sdd_tempat_lahir`, `sdd_tanggal_lahir`, `sdd_tinggi`, `sdd_berat`, `sdd_agama`, `sdd_urutan_anak`, `sdd_saudara_kandung`, `sdd_saudara_tiri`, `sdd_saudara_angkat`, `sdd_bahasa`, `sdd_jenjang_sebelumnya`, `sdd_kewarganegaraan`, `sdd_image`, `sdd_sekolah`, `sdd_status`, `sdd_kartu_sosial`, `sdd_status_siswa`, `sdd_group_spp`, `sdd_tahun_ajaran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(3, '10000000000000000', '6', 1, '-', '23123123', 'ANYA', '345435435', 'L', 'B', '345454', '2018-10-29', 178, 45, 'ISLAM', 454, 45, 0, 0, 'HGGFH', 'TK', 'INDONESIA', 'data_siswa_3_.jpg', 2, 'Setujui', 'Released', 'ACTIVE', 2, '2018', '2018-12-11 19:14:49', '2018-12-11 19:14:49', 'DASD', 'DASD'),
	(4, '02323233', '5', 1, '-', '232323233', 'RINA PERMATASARI', 'RINA', 'P', 'B', 'SURABAYA', '2004-02-04', 165, 51, 'ISLAM', 2, 2, 0, 0, 'INDONESIA', 'SMP', 'INDONESIA', 'data_siswa_4_.jpg', 3, 'Setujui', 'RELEASED', 'ACTIVE', 2, '2018', '2018-12-04 20:11:53', '2018-12-04 20:11:53', 'DASD', 'DASD'),
	(5, '0232323', '5', 1, '-', '02323232', 'TES', 'TES', 'P', 'TES', 'TES', '2018-11-05', 232, 2332, 'ISLAM', 1, 1, 0, 0, 'TES', 'SMP', 'TES', 'data_siswa_5_.jpg', 3, 'Setujui', 'Released', 'ACTIVE', 2, '2018', '2018-12-04 20:11:53', '2018-12-04 20:11:53', 'DASD', 'DASD'),
	(6, '3223232', '4', 1, '-', 'FSDFSDFSDD', 'TESSDSDSDSDS', 'TESSDSDSDSDS', 'L', 'TESSDSDSDSDS', 'TESSDSDSDSDS', '2018-09-10', 12312312, 12312312, 'ISLAM', 12312312, 12312312, 0, 12312312, 'TESSDSDSDSDS', 'SMP', 'TESSDSDSDSDS', 'data_siswa_6_.jpg', 2, 'Setujui', 'RELEASED', 'ACTIVE', 1, '2018', '2018-12-04 19:49:34', '2018-12-04 19:49:34', 'DASD', 'DASD'),
	(7, '0', NULL, NULL, NULL, '0', 'RINUA', 'RINUA', 'L', 'B', 'SDSDS', '2018-11-26', 200, 87, 'ISLAM', 3, 3, 0, 2, 'IDN', 'SD', 'SDSAD', 'data_siswa_7_.png', 2, 'Released', 'fghfghfgh564thtryhfg', 'ACTIVE', NULL, NULL, '2018-11-17 14:56:01', '2018-11-17 14:56:01', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_siswa_data_diri` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_data_diri_copy
CREATE TABLE IF NOT EXISTS `d_siswa_data_diri_copy` (
  `sdd_id` int(11) NOT NULL,
  `sdd_nomor_induk` varchar(50) DEFAULT NULL,
  `sdd_kelas` varchar(50) DEFAULT NULL,
  `sdd_nama_kelas` int(11) DEFAULT NULL,
  `sdd_jurusan` varchar(50) DEFAULT NULL,
  `sdd_nomor_induk_nasional` varchar(50) DEFAULT NULL,
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
  `sdd_saudara_angkat` int(11) NOT NULL,
  `sdd_bahasa` varchar(50) NOT NULL,
  `sdd_jenjang_sebelumnya` varchar(100) NOT NULL,
  `sdd_kewarganegaraan` varchar(100) NOT NULL,
  `sdd_image` varchar(100) NOT NULL,
  `sdd_sekolah` int(11) NOT NULL,
  `sdd_status` varchar(50) DEFAULT 'Released',
  `sdd_kartu_sosial` varchar(50) DEFAULT NULL,
  `sdd_status_siswa` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `sdd_group_spp` int(11) DEFAULT NULL,
  `sdd_tahun_ajaran` year(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`sdd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table darul_ulum.d_siswa_data_diri_copy: ~5 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_data_diri_copy` DISABLE KEYS */;
REPLACE INTO `d_siswa_data_diri_copy` (`sdd_id`, `sdd_nomor_induk`, `sdd_kelas`, `sdd_nama_kelas`, `sdd_jurusan`, `sdd_nomor_induk_nasional`, `sdd_nama`, `sdd_panggilan`, `sdd_jenis_kelamin`, `sdd_golongan_darah`, `sdd_tempat_lahir`, `sdd_tanggal_lahir`, `sdd_tinggi`, `sdd_berat`, `sdd_agama`, `sdd_urutan_anak`, `sdd_saudara_kandung`, `sdd_saudara_tiri`, `sdd_saudara_angkat`, `sdd_bahasa`, `sdd_jenjang_sebelumnya`, `sdd_kewarganegaraan`, `sdd_image`, `sdd_sekolah`, `sdd_status`, `sdd_kartu_sosial`, `sdd_status_siswa`, `sdd_group_spp`, `sdd_tahun_ajaran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(3, '10000000000000000', '2', 1, '-', '23123123', 'ANYA', '345435435', 'L', 'B', '345454', '2018-10-29', 178, 45, 'ISLAM', 454, 45, 0, 0, 'HGGFH', 'TK', 'INDONESIA', 'data_siswa_3_.jpg', 2, 'Setujui', NULL, 'ACTIVE', 1, '2018', '2018-10-19 20:07:14', '2018-10-19 20:07:14', 'DASD', 'DASD'),
	(4, '02323233', '4', 2, '-', '232323233', 'RINA PERMATASARI', 'RINA', 'P', 'B', 'SURABAYA', '2004-02-04', 165, 51, 'ISLAM', 2, 2, 0, 0, 'INDONESIA', 'SMP', 'INDONESIA', 'data_siswa_4_.jpg', 3, 'Setujui', 'RELEASED', 'ACTIVE', 2, '2018', '2018-12-04 19:55:16', '2018-12-04 19:55:16', 'DASD', 'DASD'),
	(5, '0232323', '2', 2, '-', '02323232', 'TES', 'TES', 'P', 'TES', 'TES', '2018-11-05', 232, 2332, 'ISLAM', 1, 1, 0, 0, 'TES', 'SMP', 'TES', 'data_siswa_5_.jpg', 3, 'Setujui', NULL, 'ACTIVE', 1, '2018', '2018-11-17 12:29:45', '2018-11-17 12:29:45', 'DASD', 'DASD'),
	(6, '3223232', '3', 1, '-', 'FSDFSDFSDD', 'TESSDSDSDSDS', 'TESSDSDSDSDS', 'L', 'TESSDSDSDSDS', 'TESSDSDSDSDS', '2018-09-10', 12312312, 12312312, 'ISLAM', 12312312, 12312312, 0, 12312312, 'TESSDSDSDSDS', 'SMP', 'TESSDSDSDSDS', 'data_siswa_6_.jpg', 2, 'Setujui', 'RELEASED', 'ACTIVE', 1, '2018', '2018-12-04 19:49:03', '2018-12-04 19:49:03', 'DASD', 'DASD'),
	(7, '0', NULL, NULL, NULL, '0', 'RINUA', 'RINUA', 'L', 'B', 'SDSDS', '2018-11-26', 200, 87, 'ISLAM', 3, 3, 0, 2, 'IDN', 'SD', 'SDSAD', 'data_siswa_7_.png', 2, 'Released', 'fghfghfgh564thtryhfg', 'ACTIVE', NULL, NULL, '2018-11-17 14:56:02', '2018-11-17 14:56:02', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_siswa_data_diri_copy` ENABLE KEYS */;

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

-- Dumping data for table darul_ulum.d_siswa_ibu: ~5 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_ibu` DISABLE KEYS */;
REPLACE INTO `d_siswa_ibu` (`si_id`, `si_nama`, `si_tempat_lahir`, `si_tanggal_lahir`, `si_agama`, `si_kewarganegaraan`, `si_pendidikan`, `si_pekerjaan`, `si_penghasilan`, `si_alamat`, `si_telpon`, `si_status`) VALUES
	(3, 'dfdf', 'dfdfd', '2018-10-11', 'ISLAM', '434', 'SARJANA', '2323', 23232323, '323', '2232', 'H'),
	(4, 'Hera', 'Asgard', '2018-11-07', 'ISLAM', 'Asgard', 'SARJANA', 'Asgard', 30300000, 'Asgard', '23232323', 'H'),
	(5, 'Tes', 'Tes', '2018-10-16', 'ISLAM', 'Tes', 'SARJANA', 'Tes', 232323, 'Tes', '23232', 'H'),
	(6, 'tessdsdsdsds', 'tessdsdsdsds', '2018-11-04', 'ISLAM', 'tessdsdsdsds', 'SMA', 'tessdsdsdsds', 2232323, 'tessdsdsdsds', '12312312', 'H'),
	(7, 'sadasdsa', 'sdsadasd', '2018-11-13', 'ISLAM', 'sadsa', 'SMP', 'saddsads2', 323232, 'dsfdsf', '2323', 'H');
/*!40000 ALTER TABLE `d_siswa_ibu` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_kesehatan
CREATE TABLE IF NOT EXISTS `d_siswa_kesehatan` (
  `sk_id` int(11) NOT NULL,
  `sk_detail` int(11) NOT NULL,
  `sk_nama_penyakit` varchar(50) DEFAULT NULL,
  `sk_keterangan` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sk_id`,`sk_detail`),
  CONSTRAINT `FK_d_siswa_kesehatan_d_siswa_data_diri` FOREIGN KEY (`sk_id`) REFERENCES `d_siswa_data_diri` (`sdd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_kesehatan: ~1 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_kesehatan` DISABLE KEYS */;
REPLACE INTO `d_siswa_kesehatan` (`sk_id`, `sk_detail`, `sk_nama_penyakit`, `sk_keterangan`) VALUES
	(4, 1, NULL, NULL);
/*!40000 ALTER TABLE `d_siswa_kesehatan` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_pendidikan
CREATE TABLE IF NOT EXISTS `d_siswa_pendidikan` (
  `sp_id` int(11) NOT NULL,
  `sp_detail` int(11) NOT NULL,
  `sp_tingkat_pendidikan` varchar(50) DEFAULT NULL,
  `sp_nama_sekolah` varchar(300) NOT NULL,
  `sp_keterangan` varchar(300) NOT NULL,
  `sp_ijazah` varchar(50) NOT NULL,
  `sp_status` varchar(50) NOT NULL,
  `sp_tanggal_ijazah` date NOT NULL,
  PRIMARY KEY (`sp_id`,`sp_detail`),
  CONSTRAINT `FK_d_siswa_pendidikan_d_siswa_data_diri` FOREIGN KEY (`sp_id`) REFERENCES `d_siswa_data_diri` (`sdd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_pendidikan: ~5 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_pendidikan` DISABLE KEYS */;
REPLACE INTO `d_siswa_pendidikan` (`sp_id`, `sp_detail`, `sp_tingkat_pendidikan`, `sp_nama_sekolah`, `sp_keterangan`, `sp_ijazah`, `sp_status`, `sp_tanggal_ijazah`) VALUES
	(3, 1, NULL, '4545', '2323323', '45454', 'SISWA BARU', '2018-10-19'),
	(4, 1, NULL, 'smpn 17 surabaya', '-', '098098909809', 'SISWA BARU', '2018-12-04'),
	(5, 1, NULL, 'Tes', 'Tes', '2323232', 'PINDAHAN', '2018-11-17'),
	(6, 1, NULL, 'TESSDSDSDSDS', 'TESSDSDSDSDS', 'TESSDSDSDSDS', 'SISWA BARU', '2018-12-04'),
	(7, 1, NULL, 'MAKE', 'TES', '2323232', 'SISWA BARU', '2018-11-17');
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

-- Dumping data for table darul_ulum.d_siswa_tempat_tinggal: ~5 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_tempat_tinggal` DISABLE KEYS */;
REPLACE INTO `d_siswa_tempat_tinggal` (`stt_id`, `stt_alamat`, `stt_no_telp`, `stt_status_tempat_tinggal`, `stt_jarak_rumah`) VALUES
	(3, 'ghfghfg', '4545454', 'ORANG TUA', 4545),
	(4, '-', '0898989', 'ORANG TUA', 12),
	(5, 'Tes', '23232', 'ORANG TUA', 23),
	(6, 'tessdsdsdsds', '12312312', 'ORANG TUA', 12312312),
	(7, 'asdas', '232323', 'ORANG TUA', 12);
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

-- Dumping data for table darul_ulum.d_siswa_wali: ~5 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_wali` DISABLE KEYS */;
REPLACE INTO `d_siswa_wali` (`sw_id`, `sw_nama`, `sw_tempat_lahir`, `sw_tanggal_lahir`, `sw_agama`, `sw_kewarganegaraan`, `sw_pendidikan`, `sw_pekerjaan`, `sw_penghasilan`, `sw_alamat`, `sw_telpon`, `sw_status`) VALUES
	(3, '3213', '123213', '2018-10-11', 'ISLAM', '2323', 'SD', 'wfewfew', 23333333, '2323', '232323', 'H'),
	(4, 'Asgard', 'Asgard', '2018-11-06', 'ISLAM', 'Asgard', 'SARJANA', 'Asgard', 23232323, 'Asgard', 'Asgard', 'H'),
	(5, 'Tes', 'Tes', '2018-10-16', 'ISLAM', 'Tes', 'SARJANA', 'Tes', 12323232, 'Tes', '23232', 'H'),
	(6, 'tessdsdsdsds', 'tessdsdsdsds', '2018-10-09', 'ISLAM', 'tessdsdsdsds', 'SMA', 'tessdsdsdsds', 222222, 'tessdsdsdsds', '12312312', 'H'),
	(7, 'dsfdsf', 'dssdfsd', '2018-11-20', 'ISLAM', 'dfsdfsd', 'SMP', 'sdfsdf', 23223233, 'dsfdsfsd', '2323', 'H');
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
  `st_pendidikan` varchar(50) DEFAULT NULL,
  `st_nama_sekolah` varchar(100) DEFAULT NULL,
  `st_sekolah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_staff: ~16 rows (approximately)
/*!40000 ALTER TABLE `d_staff` DISABLE KEYS */;
REPLACE INTO `d_staff` (`st_id`, `st_nama`, `st_alamat`, `st_tanggal_lahir`, `st_tempat_lahir`, `st_telpon`, `st_image`, `st_posisi`, `st_pendidikan`, `st_nama_sekolah`, `st_sekolah`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'Ibu Pembina', 'JALAN RAYA MOJOSARI REJO NO.269 - GRESIK 61177', '1990-07-07', 'Gresik', '031 - 22334455', 'staff_1_.png', 1, NULL, NULL, 5, '2018-10-01 00:22:27', '2018-10-01 00:22:27', 'DASD', 'DASD'),
	(2, 'BAPAK AHMADI', 'JALAN RAYA MOJOSARI REJO NO.269 - GRESIK 61177', '1990-07-07', 'Gresik', '031 - 22334455', 'staff_2_.png', 2, NULL, NULL, 5, '2018-10-01 00:23:49', '2018-10-01 00:25:28', 'DASD', 'DASD'),
	(3, 'BAPAK EFENDI', 'JALAN RAYA MOJOSARI REJO NO.269 - GRESIK 61177', '1990-07-07', 'Gresik', '031 - 22334455', 'staff_3_.png', 3, NULL, NULL, 5, '2018-10-01 00:24:59', '2018-10-01 00:25:43', 'DASD', 'DASD'),
	(4, 'IBU ADMIN YAYASAN', 'JALAN RAYA MOJOSARI REJO NO.269 - GRESIK 61177', '1990-07-07', 'GRESIK', '031 -22334455', 'staff_4_.png', 4, NULL, NULL, 5, '2018-10-01 00:27:04', '2018-10-01 00:27:04', 'DASD', 'DASD'),
	(5, 'BAPAK KEPALA SEKOLAH SMA', 'JALAN RAYA MOJOSARI REJO No. 1 - GRESIK 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_5_.png', 8, NULL, NULL, 4, '2018-10-01 00:31:16', '2018-10-01 00:35:31', 'DASD', 'DASD'),
	(6, 'BAPAK KEPALA SEKOLAH MTS', 'JALAN RAYA MOJOSARI REJO No. 1 - GRESIK 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_6_.png', 7, NULL, NULL, 3, '2018-10-01 00:35:13', '2018-10-01 00:35:13', 'DASD', 'DASD'),
	(7, 'BAPAK KEPALA SEKOLAH MI', 'Jalan Mojosarirejo RT.9 RW.3 - Gresik 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_7_.png', 6, NULL, NULL, 2, '2018-10-01 00:37:58', '2018-10-01 00:37:58', 'DASD', 'DASD'),
	(8, 'BAPAK KEPALA SEKOLAH RA', 'Jalan Mojosarirejo RT.9 RW.3 - Gresik 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_8_.png', 5, NULL, NULL, 1, '2018-10-01 00:41:02', '2018-10-01 00:41:02', 'DASD', 'DASD'),
	(9, 'IBU ADMIN SEKOLAH SMA', 'JALAN RAYA MOJOSARI REJO No. 1 - GRESIK 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_9_.png', 12, NULL, NULL, 4, '2018-10-01 00:45:30', '2018-10-01 00:45:30', 'DASD', 'DASD'),
	(10, 'IBU ADMIN SEKOLAH SMA 2', 'JALAN RAYA MOJOSARI REJO No. 1 - GRESIK 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_10_.png', 12, NULL, NULL, 4, '2018-10-01 00:50:49', '2018-10-01 00:50:49', 'DASD', 'DASD'),
	(11, 'IBU ADMIN SEKOLAH MTS 1', 'JALAN RAYA MOJOSARI REJO No. 1 - GRESIK 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_11_.png', 11, NULL, NULL, 3, '2018-10-01 00:52:51', '2018-10-01 00:55:01', 'DASD', 'DASD'),
	(12, 'IBU ADMIN SEKOLAH MTS 2', 'JALAN RAYA MOJOSARI REJO No. 1 - GRESIK 61177', '1990-07-07', 'GRESIK', '031 - 2233445566', 'staff_12_.png', 11, NULL, NULL, 3, '2018-10-01 00:54:15', '2018-10-01 00:54:44', 'DASD', 'DASD'),
	(13, 'IBU ADMIN SEKOLAH MI 1', 'Jalan Mojosarirejo RT.9 RW.3 - Gresik 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_13_.png', 10, NULL, NULL, 2, '2018-10-01 00:56:47', '2018-10-01 00:56:47', 'DASD', 'DASD'),
	(14, 'IBU ADMIN SEKOLAH MI 2', 'Jalan Mojosarirejo RT.9 RW.3 - Gresik 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_14_.png', 10, NULL, NULL, 2, '2018-10-01 00:57:42', '2018-10-01 00:57:57', 'DASD', 'DASD'),
	(15, 'IBU ADMIN SEKOLAH RA 1', 'Jalan Mojosarirejo RT.9 RW.3 - Gresik 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_15_.png', 9, NULL, NULL, 1, '2018-10-01 00:59:26', '2018-10-01 00:59:26', 'DASD', 'DASD'),
	(16, 'IBU ADMIN SEKOLAH RA 2', 'Jalan Mojosarirejo RT.9 RW.3 - Gresik 61177', '1990-07-07', 'GRESIK', '031 - 22334455', 'staff_16_.png', 9, NULL, NULL, 1, '2018-10-01 01:00:20', '2018-10-01 01:00:20', 'DASD', 'DASD');
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

-- Dumping data for table darul_ulum.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `username`, `email`, `jabatan_id`, `image`, `sekolah_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
	(1, 'DASD', 'superuser', 'dewa17a@gmail.com', 1, 'user_1_.jpg', 2, NULL, '$2y$10$cVM5X9ul9anYahkLdxWWwOblwyXA5dpsDcdg6Iha6wysxoE79j.ri', 'it9xfBL0a8EUbyKe6o1fgHKCqf32MMv0Jelzg9glUDaw6XTqUhDy4xltq1Fl', '2018-09-09 05:09:27', '2018-09-18 15:33:34', NULL),
	(2, 'PEMBINA DARUL ULUM', 'pembina', 'ina.nararia@darululm-gresik.com', 2, 'user_2_.png', 5, NULL, '$2y$10$GMNgjpSlm9Cu5wqzvK9vD.7TKAizjUuaVlae4T1e7YNFkqcfr29mi', 'v7EtOkd8yh8rO25Jrtl3s1iiYnVUIzbwPlCh0UpaP1dC8wKSHHDJazycdodq', '2018-10-01 01:34:45', '2018-10-13 11:08:42', NULL),
	(3, 'KETUA YAYASAN DARUL ULUM GRESIK', 'ketua', 'ahmadi@darululm-gresik.com', 3, 'user_3_.png', 5, NULL, '$2y$10$mL9qmi5lfxcpTLiZqWkDr.lsBEbgECEqixc0ZB2hJGvrR8wKR10mW', 'Im9rualnOV7tZBpuSDpJsVRasEnSmR1bfMPV4IBC6x5rn0WVmCUf5swyNJhQ', '2018-10-01 01:36:21', '2018-10-13 11:11:11', NULL),
	(4, 'WAKIL KETUA YAYASAN DARUL ULUM', 'wakilketua', 'wakilketua@darululm-gresik.com', 4, 'user_4_.png', 5, NULL, '$2y$10$wBj3QAwkSoK6XpEguIDMgeUa79e4LI6f8l4DH9J9hF9SKj/Wf.4LC', '4c821419381f47dfc0e178dca9f84d57f4a93663adb154aeea72491c2342', '2018-10-01 01:38:18', '2018-10-03 06:33:49', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
