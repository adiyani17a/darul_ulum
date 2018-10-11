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

-- Dumping structure for table darul_ulum.d_siswa_ayah
CREATE TABLE IF NOT EXISTS `d_siswa_ayah` (
  `sa_id` int(11) NOT NULL,
  `sa_nama` int(11) DEFAULT NULL,
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

-- Dumping data for table darul_ulum.d_siswa_ayah: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_ayah` DISABLE KEYS */;
REPLACE INTO `d_siswa_ayah` (`sa_id`, `sa_nama`, `sa_tempat_lahir`, `sa_tanggal_lahir`, `sa_agama`, `sa_kewarganegaraan`, `sa_pendidikan`, `sa_pekerjaan`, `sa_penghasilan`, `sa_alamat`, `sa_telpon`, `sa_status`) VALUES
	(1, 123123, '123123', '2018-10-11', 'KRISTEN', '123123', 'TIDAK SEKOLAH', '123123', 123123, '123123', '123123', 'H'),
	(2, 123123, '123123', '2018-10-11', 'ISLAM', '123123', 'SMP', '123123', 123123, '123123', '123123', 'H');
/*!40000 ALTER TABLE `d_siswa_ayah` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_data_diri
CREATE TABLE IF NOT EXISTS `d_siswa_data_diri` (
  `sdd_id` int(11) NOT NULL,
  `sdd_nomor_induk` int(20) NOT NULL,
  `sdd_nomor_induk_nasional` int(20) NOT NULL,
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
  `sdd_image` varchar(100) NOT NULL,
  `sdd_sekolah` int(11) NOT NULL,
  `sdd_status` varchar(50) DEFAULT 'Released',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`sdd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_data_diri: ~2 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_data_diri` DISABLE KEYS */;
REPLACE INTO `d_siswa_data_diri` (`sdd_id`, `sdd_nomor_induk`, `sdd_nomor_induk_nasional`, `sdd_nama`, `sdd_panggilan`, `sdd_jenis_kelamin`, `sdd_golongan_darah`, `sdd_tempat_lahir`, `sdd_tanggal_lahir`, `sdd_tinggi`, `sdd_berat`, `sdd_agama`, `sdd_urutan_anak`, `sdd_saudara_kandung`, `sdd_saudara_tiri`, `sdd_bahasa`, `sdd_jenjang_sebelumnya`, `sdd_image`, `sdd_sekolah`, `sdd_status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 0, 0, '123123', '123123', 'L', '123123', '123123', '2018-10-11', 123123, 123123, 'ISLAM', 123123, 123123, 0, '123123', 'TK', 'data_siswa_1_.jpg', 2, 'Released', '2018-10-11 21:12:31', '2018-10-11 21:12:31', 'DASD', 'DASD'),
	(2, 0, 0, '123123', '123123', 'L', '123123', '123123', '2018-10-11', 123123, 123123, 'ISLAM', 123123, 123123, 0, '123123', 'KRISTEN', 'data_siswa_2_.jpg', 2, 'Released', '2018-10-11 21:20:36', '2018-10-11 21:20:36', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_siswa_data_diri` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_ibu
CREATE TABLE IF NOT EXISTS `d_siswa_ibu` (
  `si_id` int(11) NOT NULL,
  `si_nama` int(11) DEFAULT NULL,
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

-- Dumping data for table darul_ulum.d_siswa_ibu: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_ibu` DISABLE KEYS */;
REPLACE INTO `d_siswa_ibu` (`si_id`, `si_nama`, `si_tempat_lahir`, `si_tanggal_lahir`, `si_agama`, `si_kewarganegaraan`, `si_pendidikan`, `si_pekerjaan`, `si_penghasilan`, `si_alamat`, `si_telpon`, `si_status`) VALUES
	(1, 123123, '123123', '2018-10-11', 'KRISTEN', '123123', 'TIDAK SEKOLAH', '123123', 123123, '123123', '123123', 'H'),
	(2, 123123, '123123', '2018-10-11', 'ISLAM', '123123', 'SD', '123123', 123123, '123123', '123123', 'H');
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

-- Dumping data for table darul_ulum.d_siswa_kesehatan: ~2 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_kesehatan` DISABLE KEYS */;
REPLACE INTO `d_siswa_kesehatan` (`sk_id`, `sk_detail`, `sk_nama_penyakit`, `sk_keterangan`) VALUES
	(1, 1, 'w', 'wdwsd'),
	(1, 2, 'w', 'wdwsd'),
	(2, 1, 'sd', 'sdfsdfds'),
	(2, 2, 'sd', 'sdfsdfds');
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

-- Dumping data for table darul_ulum.d_siswa_pendidikan: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_pendidikan` DISABLE KEYS */;
REPLACE INTO `d_siswa_pendidikan` (`sp_id`, `sp_detail`, `sp_tingkat_pendidikan`, `sp_nama_sekolah`, `sp_keterangan`, `sp_ijazah`, `sp_tanggal_ijazah`) VALUES
	(1, 1, NULL, '123123', '123123', '123123', '2018-10-11'),
	(2, 1, NULL, '123123', '123123', '123123', '2018-10-11');
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
	(1, '123123', '123123', 'ORANG TUA', 123123),
	(2, '123123', '123123', 'ORANG TUA', 123123);
/*!40000 ALTER TABLE `d_siswa_tempat_tinggal` ENABLE KEYS */;

-- Dumping structure for table darul_ulum.d_siswa_wali
CREATE TABLE IF NOT EXISTS `d_siswa_wali` (
  `sw_id` int(11) NOT NULL,
  `sw_nama` int(11) DEFAULT NULL,
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

-- Dumping data for table darul_ulum.d_siswa_wali: ~0 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_wali` DISABLE KEYS */;
REPLACE INTO `d_siswa_wali` (`sw_id`, `sw_nama`, `sw_tempat_lahir`, `sw_tanggal_lahir`, `sw_agama`, `sw_kewarganegaraan`, `sw_pendidikan`, `sw_pekerjaan`, `sw_penghasilan`, `sw_alamat`, `sw_telpon`, `sw_status`) VALUES
	(1, 123123, '123123', '2018-10-11', 'KATHOLIK', '123123', NULL, '123123', 123123, '123123', '123123', 'H'),
	(2, 123123, '123123', '2018-10-11', 'ISLAM', '123123', NULL, '123123', 123123, '123123', '123123', 'H');
/*!40000 ALTER TABLE `d_siswa_wali` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
