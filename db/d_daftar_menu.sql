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

-- Dumping structure for table atonergi.d_daftar_menu
CREATE TABLE IF NOT EXISTS `d_daftar_menu` (
  `dm_id` int(11) DEFAULT NULL,
  `dm_nama` varchar(50) DEFAULT NULL,
  `dm_group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table atonergi.d_daftar_menu: ~58 rows (approximately)
/*!40000 ALTER TABLE `d_daftar_menu` DISABLE KEYS */;
REPLACE INTO `d_daftar_menu` (`dm_id`, `dm_nama`, `dm_group`) VALUES
	(1, 'SETTING LEVEL ACCOUNT', 1),
	(2, 'SETTING ACCOUNT', 1),
	(3, 'SETTING HAK AKSES', 1),
	(4, 'SETTING DAFTAR MENU', 1),
	(5, 'MASTER DATA VENDOR', 2),
	(6, 'MASTER DATA CUSTOMER', 2),
	(7, 'MASTER DATA PEGAWAI', 2),
	(8, 'MASTER DATA AKUN KEUANGAN', 2),
	(9, 'MASTER DATA TRANSAKSI KEUANGAN', 2),
	(11, 'QUOTATION', 3),
	(12, 'TIM MARKETING', 3),
	(13, 'NILAI PENAWARAN', 3),
	(14, 'KLASIFIKASI PENAWARAN', 3),
	(15, 'PENAWARAN PDF', 3),
	(16, 'PROFORMA INVOICE', 4),
	(17, 'PEMBAYARAN DEPOSIT', 4),
	(18, 'SALES ORDER', 4),
	(19, 'CHECK STOCK', 4),
	(20, 'WORK ORDER', 4),
	(21, 'SALES INVOICE', 4),
	(22, 'CHECKLIST FORM', 4),
	(23, 'PAYMENT ORDER', 4),
	(24, 'RENCANA PEMBELIAN', 5),
	(25, 'BELANJA LANGSUNG', 5),
	(26, 'PURCHASE ORDER', 5),
	(27, 'PENGADAAN BARANG', 6),
	(28, 'PENGIRIMAN BARANG', 6),
	(29, 'PEMASANGAN', 6),
	(30, 'SCHEDULE UJI COBA', 6),
	(31, 'SALES COMMON', 6),
	(32, 'TECHNICIAN FEE', 6),
	(33, 'TANDA TERIMA SERVICE', 7),
	(34, 'KEBUTUHAN BIAYA', 7),
	(35, 'REPAIR ORDER', 7),
	(36, 'RENCANA TINDAKAN', 7),
	(37, 'REPAIR REPORT', 7),
	(38, 'BARANG MASUK', 8),
	(39, 'BARANG KELUAR', 8),
	(40, 'STOCK OPNAME', 8),
	(41, 'MAINTENANCE', 8),
	(42, 'SURAT PINJAM BARANG', 8),
	(43, 'BARCODE SUPPORT', 8),
	(44, 'REKRUITMENT', 9),
	(45, 'PAYROLL', 9),
	(46, 'FREELANCE', 9),
	(47, 'KESEJAHTERAAN', 9),
	(48, 'KPI', 9),
	(49, 'COST MANAJEMEN', 10),
	(50, 'BOOK KEEPING', 10),
	(51, 'REPORTING', 10),
	(52, 'EVALUATING', 10),
	(53, 'IRVENTARISASI', 11),
	(54, 'HISTORY', 11),
	(55, 'PENYUSUTAN', 11),
	(10, 'MASTER DATA BUNDLE ITEM', 2),
	(56, 'QUOTE MARKETING', 3),
	(57, 'MASTER DATA STATUS', 2),
	(58, 'MASTER DATA BANK', 2);
/*!40000 ALTER TABLE `d_daftar_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
