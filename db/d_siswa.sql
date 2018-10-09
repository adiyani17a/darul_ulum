-- --------------------------------------------------------
-- Host:                         www.darululm-gresik.com
-- Server version:               10.1.35-MariaDB-cll-lve - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table darululm_darul_ulum.d_siswa_ayah
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
  PRIMARY KEY (`sa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table darululm_darul_ulum.d_siswa_ayah: 0 rows
/*!40000 ALTER TABLE `d_siswa_ayah` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa_ayah` ENABLE KEYS */;

-- Dumping structure for table darululm_darul_ulum.d_siswa_data_diri
CREATE TABLE IF NOT EXISTS `d_siswa_data_diri` (
  `sdd_id` int(11) NOT NULL,
  `sdd_nama` varchar(50) NOT NULL,
  `sdd_panggilan` varchar(50) NOT NULL,
  `sdd_jenis_kelamin` enum('L','P') NOT NULL,
  `sdd_tempat_lahir` varchar(50) NOT NULL,
  `sdd_tanggal_lahir` date NOT NULL,
  `sdd_tinggi` int(11) NOT NULL,
  `sdd_berat` int(11) NOT NULL,
  `sdd_agama` varchar(50) NOT NULL,
  `sdd_urutan_anak` int(11) NOT NULL,
  `sdd_saudara_kandung` int(11) NOT NULL,
  `sdd_saudara_tiri` int(11) NOT NULL,
  `sdd_bahasa` varchar(50) NOT NULL,
  `sdd_tempat_tinggal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`sdd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table darululm_darul_ulum.d_siswa_data_diri: 0 rows
/*!40000 ALTER TABLE `d_siswa_data_diri` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa_data_diri` ENABLE KEYS */;

-- Dumping structure for table darululm_darul_ulum.d_siswa_ibu
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
  PRIMARY KEY (`si_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table darululm_darul_ulum.d_siswa_ibu: 0 rows
/*!40000 ALTER TABLE `d_siswa_ibu` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa_ibu` ENABLE KEYS */;

-- Dumping structure for table darululm_darul_ulum.d_siswa_kesehatan
CREATE TABLE IF NOT EXISTS `d_siswa_kesehatan` (
  `sk_id` int(11) NOT NULL,
  `sk_detail` int(11) NOT NULL,
  `sk_nama_penyakit` varchar(50) NOT NULL,
  PRIMARY KEY (`sk_id`,`sk_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table darululm_darul_ulum.d_siswa_kesehatan: 0 rows
/*!40000 ALTER TABLE `d_siswa_kesehatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa_kesehatan` ENABLE KEYS */;

-- Dumping structure for table darululm_darul_ulum.d_siswa_pendidikan
CREATE TABLE IF NOT EXISTS `d_siswa_pendidikan` (
  `sp_id` int(11) NOT NULL,
  `sp_detail` int(11) NOT NULL,
  `sp_tingkat_pendidikan` varchar(50) NOT NULL,
  `sp_nama_sekolah` varchar(300) NOT NULL,
  `sp_keterangan` varchar(300) NOT NULL,
  `sp_ijazah` varchar(50) NOT NULL,
  `sp_tanggal_ijazah` date NOT NULL,
  PRIMARY KEY (`sp_id`,`sp_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table darululm_darul_ulum.d_siswa_pendidikan: 0 rows
/*!40000 ALTER TABLE `d_siswa_pendidikan` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa_pendidikan` ENABLE KEYS */;

-- Dumping structure for table darululm_darul_ulum.d_siswa_tempat_tinggal
CREATE TABLE IF NOT EXISTS `d_siswa_tempat_tinggal` (
  `tts_id` int(11) NOT NULL,
  `tts_alamat` varchar(300) DEFAULT NULL,
  `tts_no_telp` varchar(50) DEFAULT NULL,
  `tts_status_tempat_tinggal` varchar(50) DEFAULT NULL,
  `tts_jarak_rumah` int(11) DEFAULT NULL,
  PRIMARY KEY (`tts_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table darululm_darul_ulum.d_siswa_tempat_tinggal: 0 rows
/*!40000 ALTER TABLE `d_siswa_tempat_tinggal` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa_tempat_tinggal` ENABLE KEYS */;

-- Dumping structure for table darululm_darul_ulum.d_siswa_wali
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
  PRIMARY KEY (`sw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table darululm_darul_ulum.d_siswa_wali: 0 rows
/*!40000 ALTER TABLE `d_siswa_wali` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_siswa_wali` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
