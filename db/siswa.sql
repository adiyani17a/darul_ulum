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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
