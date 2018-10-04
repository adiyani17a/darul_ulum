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
/*!40000 ALTER TABLE `d_group_spp` ENABLE KEYS */;

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

-- Dumping structure for table darul_ulum.d_siswa
CREATE TABLE IF NOT EXISTS `d_siswa` (
  `s_id` int(11) NOT NULL,
  `s_nomor_induk_siswa` varchar(50) NOT NULL,
  `s_jenjang_pendidikan` varchar(50) NOT NULL,
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
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
