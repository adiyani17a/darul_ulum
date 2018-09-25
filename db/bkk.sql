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
	(1, 'PC-092018/1/001', 0, 'TES', 1, '2018-09-26', 'Released', 'DASD', 'DASD', '2018-09-26 00:21:14', '2018-09-26 00:21:14');
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

-- Dumping data for table darul_ulum.d_bukti_kas_keluar_detail: ~3 rows (approximately)
/*!40000 ALTER TABLE `d_bukti_kas_keluar_detail` DISABLE KEYS */;
REPLACE INTO `d_bukti_kas_keluar_detail` (`bkkd_id`, `bkkd_detail`, `bkkd_pcd_detail`, `bkkd_qty`, `bkkd_harga_awal`, `bkkd_harga`, `bkkd_keterangan`, `bkkd_jenis`, `bkkd_akun`, `bkkd_image`) VALUES
	(1, 1, 1, 1, 30000, 30000, 'TES', 'POSTING', '62100', NULL),
	(1, 2, 2, 1, 23333, 23333, 'TES', 'POSTING', '62100', NULL),
	(1, 3, 3, 1, 323333, 323333, 'TES', 'POSTING', '62600', NULL);
/*!40000 ALTER TABLE `d_bukti_kas_keluar_detail` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
