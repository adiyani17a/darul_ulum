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
  `sdd_status_siswa` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `sdd_group_spp` int(11) DEFAULT NULL,
  `sdd_tahun_ajaran` year(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`sdd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table darul_ulum.d_siswa_data_diri: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_data_diri` DISABLE KEYS */;
REPLACE INTO `d_siswa_data_diri` (`sdd_id`, `sdd_nomor_induk`, `sdd_kelas`, `sdd_nama_kelas`, `sdd_jurusan`, `sdd_nomor_induk_nasional`, `sdd_nama`, `sdd_panggilan`, `sdd_jenis_kelamin`, `sdd_golongan_darah`, `sdd_tempat_lahir`, `sdd_tanggal_lahir`, `sdd_tinggi`, `sdd_berat`, `sdd_agama`, `sdd_urutan_anak`, `sdd_saudara_kandung`, `sdd_saudara_tiri`, `sdd_saudara_angkat`, `sdd_bahasa`, `sdd_jenjang_sebelumnya`, `sdd_kewarganegaraan`, `sdd_image`, `sdd_sekolah`, `sdd_status`, `sdd_status_siswa`, `sdd_group_spp`, `sdd_tahun_ajaran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(3, '10000000000000000', '2', 1, '-', '23123123', 'ANYA', '345435435', 'L', 'B', '345454', '2018-10-29', 178, 45, 'ISLAM', 454, 45, 0, 0, 'HGGFH', 'TK', 'INDONESIA', 'data_siswa_3_.jpg', 2, 'Setujui', 'ACTIVE', 1, '2018', '2018-10-19 20:07:14', '2018-10-19 20:07:14', 'DASD', 'DASD'),
	(4, '02323233', '1', 0, '-', '232323233', 'RINA PERMATASARI', 'RINA', 'P', 'B', 'SURABAYA', '2004-02-04', 165, 51, 'ISLAM', 2, 2, 0, 0, 'INDONESIA', 'SMP', 'INDONESIA', 'data_siswa_4_.jpg', 3, 'Setujui', 'ACTIVE', 1, '2018', '2018-10-17 20:17:48', '2018-10-17 20:17:48', 'DASD', 'DASD'),
	(5, '0232323', '', 0, '', '02323232', 'Tes', 'Tes', 'P', 'Tes', 'Tes', '2018-11-05', 232, 2332, 'ISLAM', 1, 1, 0, 0, 'Tes', 'SMP', 'Tes', 'data_siswa_5_.jpg', 3, 'Setujui', 'ACTIVE', 1, '2018', '2018-10-16 23:55:52', '2018-10-16 23:55:52', 'DASD', 'DASD'),
	(6, '0', NULL, NULL, NULL, '0', 'TESSDSDSDSDS', 'TESSDSDSDSDS', 'L', 'TESSDSDSDSDS', 'TESSDSDSDSDS', '2018-09-10', 12312312, 12312312, 'ISLAM', 12312312, 12312312, 0, 12312312, 'TESSDSDSDSDS', 'SMP', 'TESSDSDSDSDS', 'data_siswa_6_.jpg', 2, 'Setujui', 'ACTIVE', NULL, NULL, '2018-10-19 19:48:06', '2018-10-19 19:48:06', 'DASD', 'DASD'),
	(7, '323232', '3', 3, '-', '02323', 'TESSDSDSDSDS', 'TESSDSDSDSDS', 'L', 'TESSDSDSDSDS', 'TESSDSDSDSDS', '2018-10-23', 12312312, 12312312, 'ISLAM', 12312312, 12312312, 12312312, 12312312, 'TESSDSDSDSDS', 'TK', 'TESSDSDSDSDS', 'data_siswa_7_.jpg', 2, 'Printed', 'ACTIVE', 1, '2018', '2018-10-19 20:34:46', '2018-10-19 20:34:46', 'DASD', 'DASD');
/*!40000 ALTER TABLE `d_siswa_data_diri` ENABLE KEYS */;

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

-- Dumping data for table darul_ulum.d_siswa_pendidikan: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_siswa_pendidikan` DISABLE KEYS */;
REPLACE INTO `d_siswa_pendidikan` (`sp_id`, `sp_detail`, `sp_tingkat_pendidikan`, `sp_nama_sekolah`, `sp_keterangan`, `sp_ijazah`, `sp_status`, `sp_tanggal_ijazah`) VALUES
	(3, 1, NULL, '4545', '2323323', '45454', 'SISWA BARU', '2018-10-19'),
	(4, 1, NULL, 'smpn 17 surabaya', '-', '098098909809', '', '2018-10-17'),
	(5, 1, NULL, 'Tes', 'Tes', '2323232', '', '2018-10-16'),
	(6, 1, NULL, 'TESSDSDSDSDS', 'TESSDSDSDSDS', 'TESSDSDSDSDS', 'SISWA BARU', '2018-10-19'),
	(7, 1, NULL, 'tessdsdsdsds', 'tessdsdsdsds', 'tessdsdsdsds', 'SISWA BARU', '2018-10-19');
/*!40000 ALTER TABLE `d_siswa_pendidikan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
