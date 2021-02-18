-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kmbarang2
CREATE DATABASE IF NOT EXISTS `kmbarang2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kmbarang2`;

-- Dumping structure for function kmbarang2.cariurutan
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `cariurutan`(`kodeapprove` INT,
	`kodepengaturan` INT
) RETURNS int(11)
BEGIN
  DECLARE terakhir INT DEFAULT 0;
  DECLARE kdjab INT DEFAULT 0;
  SELECT urutan+1 INTO terakhir FROM tbdetailapprove WHERE idapprove = kodeapprove ORDER BY urutan DESC LIMIT 1;
  IF terakhir < 1 THEN
  	SELECT kodejabatan INTO kdjab FROM tbdetailpengaturan WHERE idatur = kodepengaturan AND urutan = 1;
  ELSE
  	SELECT kodejabatan INTO kdjab FROM tbdetailpengaturan WHERE idatur = kodepengaturan AND urutan = terakhir;
  END IF;
  RETURN kdjab;
END//
DELIMITER ;

-- Dumping structure for view kmbarang2.daftarbarangditolak
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `daftarbarangditolak` (
	`iddetailkirim` INT(11) NOT NULL,
	`kodebarang` CHAR(6) NOT NULL COLLATE 'latin1_swedish_ci',
	`namabarang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`jumlahbarang` SMALLINT(5) NOT NULL,
	`satuan` VARCHAR(10) NOT NULL COLLATE 'latin1_swedish_ci',
	`jenisbarang` ENUM('PO','NonPO') NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`idkirim` INT(11) NOT NULL,
	`idpengaturan` INT(11) NOT NULL,
	`statusbarang` ENUM('Baru','Dikirim','Diterima','Ditolak') NOT NULL COLLATE 'latin1_swedish_ci',
	`alasantolak` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`fotobarang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`dokumen` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`keperluan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nopo` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`kdvendor` SMALLINT(5) NULL,
	`namavendor` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`tglkirim` DATE NULL
) ENGINE=MyISAM;

-- Dumping structure for view kmbarang2.daftarkaryawan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `daftarkaryawan` (
	`idKaryawan` INT(11) NOT NULL,
	`namaKaryawan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idJabatan` TINYINT(2) NULL,
	`jabatan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view kmbarang2.daftarmansimip
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `daftarmansimip` (
	`idKaryawan` INT(11) NOT NULL,
	`namaKaryawan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idJabatan` TINYINT(2) NULL,
	`jabatan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view kmbarang2.daftarpengiriman
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `daftarpengiriman` (
	`idapprove` INT(5) NOT NULL,
	`kodekirim` INT(7) NULL,
	`kodevendor` SMALLINT(5) NULL,
	`keperluan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tglbuat` DATETIME NULL,
	`tglkirim` DATE NULL,
	`tglmasuk` DATETIME NULL,
	`tglkeluar` DATETIME NULL,
	`nopo` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`statuskiriman` ENUM('Mengatur','Meminta Gudang','Diterima Gudang','Ditolak Gudang','Diterima Pos','Proses Approve','Selesai') NULL COLLATE 'latin1_swedish_ci',
	`idpengaturan` TINYINT(2) NULL,
	`tujuan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`berkas` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`status` ENUM('PO','NonPO') NULL COLLATE 'latin1_swedish_ci',
	`pos` SMALLINT(3) NULL,
	`loby` SMALLINT(3) NULL,
	`gudang` SMALLINT(3) NULL,
	`areakhusus` ENUM('Y','N') NULL COLLATE 'latin1_swedish_ci',
	`namavendor` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`kdvendor` SMALLINT(5) NULL,
	`selanjutnya` INT(11) NULL,
	`k3` INT(11) NULL,
	`manager` INT(11) NULL,
	`kodesimip` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view kmbarang2.daftarsimip
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `daftarsimip` (
	`idapprove` INT(5) NOT NULL,
	`idsimip` INT(6) NULL COMMENT 'jika tamu simip',
	`status` ENUM('Selesai','Proses') NULL COLLATE 'latin1_swedish_ci',
	`idtamu` INT(11) NULL,
	`kepentingan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tglsimip` DATETIME NULL,
	`pendamping` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`statuspossimip` ENUM('Diterima') NULL COLLATE 'latin1_swedish_ci',
	`k3` INT(11) NULL,
	`manager` INT(11) NULL,
	`smanager` TINYINT(1) NULL,
	`sk3` TINYINT(1) NULL,
	`idpengiriman` INT(6) NULL,
	`tujuan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`perusahaan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idpengaturan` INT(2) NULL,
	`selanjutnya` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for table kmbarang2.tbapprove
CREATE TABLE IF NOT EXISTS `tbapprove` (
  `idapprove` int(5) NOT NULL AUTO_INCREMENT,
  `tglapprove` datetime DEFAULT NULL,
  `jenisapprove` enum('Barang','Simip','Tamu') DEFAULT NULL,
  `idtamu` int(6) DEFAULT NULL COMMENT 'jika tamu yang masuk',
  `idpengiriman` int(6) DEFAULT NULL COMMENT 'jika pengiriman barang',
  `idsimip` int(6) DEFAULT NULL COMMENT 'jika tamu simip',
  `idkeluar` int(6) DEFAULT NULL COMMENT 'jika keluar',
  `status` enum('Selesai','Proses') DEFAULT 'Proses',
  PRIMARY KEY (`idapprove`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbapprove: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbapprove` DISABLE KEYS */;
INSERT INTO `tbapprove` (`idapprove`, `tglapprove`, `jenisapprove`, `idtamu`, `idpengiriman`, `idsimip`, `idkeluar`, `status`) VALUES
	(9, '2021-02-04 13:27:19', 'Barang', NULL, 13, NULL, NULL, 'Proses'),
	(10, '2021-02-04 13:28:57', 'Simip', NULL, NULL, 8, NULL, 'Proses'),
	(11, '2021-02-04 14:02:31', 'Barang', NULL, 14, NULL, NULL, 'Proses'),
	(12, '2021-02-04 14:02:59', 'Barang', NULL, 15, NULL, NULL, 'Proses'),
	(13, '2021-02-04 14:06:23', 'Simip', NULL, NULL, 10, NULL, 'Proses'),
	(14, '2021-02-04 14:10:42', 'Simip', NULL, NULL, 11, NULL, 'Proses');
/*!40000 ALTER TABLE `tbapprove` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbblokiremail
CREATE TABLE IF NOT EXISTS `tbblokiremail` (
  `idblokir` int(4) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `tglblok` datetime NOT NULL,
  PRIMARY KEY (`idblokir`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbblokiremail: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbblokiremail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbblokiremail` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbdetailapprove
CREATE TABLE IF NOT EXISTS `tbdetailapprove` (
  `iddetailapprove` int(11) NOT NULL AUTO_INCREMENT,
  `idapprove` int(11) DEFAULT NULL,
  `idkaryawan` int(11) DEFAULT NULL,
  `idjabatan` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetailapprove`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbdetailapprove: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbdetailapprove` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbdetailapprove` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbdetailkeluar
CREATE TABLE IF NOT EXISTS `tbdetailkeluar` (
  `iddetailkeluar` int(6) NOT NULL AUTO_INCREMENT,
  `idkeluar` int(6) DEFAULT NULL,
  `namabarang` varchar(50) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `jumlah` mediumint(4) DEFAULT NULL,
  `fotobarang` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iddetailkeluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbdetailkeluar: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbdetailkeluar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbdetailkeluar` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbdetailpengaturan
CREATE TABLE IF NOT EXISTS `tbdetailpengaturan` (
  `iddetailatur` int(5) NOT NULL AUTO_INCREMENT,
  `idatur` tinyint(2) NOT NULL DEFAULT 0,
  `urutan` tinyint(2) NOT NULL DEFAULT 0,
  `kodejabatan` int(4) NOT NULL,
  PRIMARY KEY (`iddetailatur`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbdetailpengaturan: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbdetailpengaturan` DISABLE KEYS */;
INSERT INTO `tbdetailpengaturan` (`iddetailatur`, `idatur`, `urutan`, `kodejabatan`) VALUES
	(5, 3, 1, 1),
	(6, 3, 2, 6),
	(7, 4, 1, 2),
	(8, 4, 2, 26),
	(9, 4, 3, 33),
	(10, 5, 1, 2),
	(11, 5, 2, 14),
	(12, 6, 1, 2),
	(13, 6, 2, 14),
	(14, 6, 3, 26);
/*!40000 ALTER TABLE `tbdetailpengaturan` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbdetailpengiriman
CREATE TABLE IF NOT EXISTS `tbdetailpengiriman` (
  `iddetailkirim` int(11) NOT NULL AUTO_INCREMENT,
  `kodebarang` char(6) NOT NULL DEFAULT '',
  `namabarang` varchar(50) NOT NULL,
  `jumlahbarang` smallint(5) NOT NULL DEFAULT 0,
  `satuan` varchar(10) NOT NULL DEFAULT '0',
  `jenisbarang` enum('PO','NonPO') NOT NULL,
  `keterangan` text NOT NULL DEFAULT '0',
  `idkirim` int(11) NOT NULL,
  `idpengaturan` int(11) NOT NULL DEFAULT 1,
  `statusbarang` enum('Baru','Dikirim','Diterima','Ditolak') NOT NULL,
  `alasantolak` varchar(50) DEFAULT NULL,
  `fotobarang` varchar(50) NOT NULL,
  `dokumen` varchar(50) NOT NULL,
  PRIMARY KEY (`iddetailkirim`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbdetailpengiriman: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbdetailpengiriman` DISABLE KEYS */;
INSERT INTO `tbdetailpengiriman` (`iddetailkirim`, `kodebarang`, `namabarang`, `jumlahbarang`, `satuan`, `jenisbarang`, `keterangan`, `idkirim`, `idpengaturan`, `statusbarang`, `alasantolak`, `fotobarang`, `dokumen`) VALUES
	(20, 'gmknwa', 'Masker', 400, 'Box', 'PO', 'Masker Ply Standart BNPB Warna Biru Ear Pass', 13, 1, 'Baru', NULL, 'Gambar20210204132505.jpeg', 'Berkas20210204132505.jpeg'),
	(21, 'ldlfum', 'Sodium Bisulfate', 600, 'Kg', 'PO', 'Kuriflot SB', 14, 1, 'Baru', NULL, 'Gambar20210204135617.JPG', 'Berkas20210204135617.JPG'),
	(22, 'hquyjn', 'Kawat Las', 40, 'KG', 'PO', 'Type: Hard Sufacing', 15, 1, 'Baru', NULL, 'Gambar20210204135958.jpeg', 'Berkas20210204135958.jpeg');
/*!40000 ALTER TABLE `tbdetailpengiriman` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbdetailtamu
CREATE TABLE IF NOT EXISTS `tbdetailtamu` (
  `iddetailtamu` int(11) NOT NULL AUTO_INCREMENT,
  `namatamu` varchar(50) DEFAULT NULL,
  `pengenal` varchar(10) DEFAULT NULL,
  `nopengenal` varchar(30) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `notlptamu` varchar(15) DEFAULT NULL,
  `alamattamu` varchar(100) DEFAULT NULL,
  `fototamu` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iddetailtamu`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbdetailtamu: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbdetailtamu` DISABLE KEYS */;
INSERT INTO `tbdetailtamu` (`iddetailtamu`, `namatamu`, `pengenal`, `nopengenal`, `jabatan`, `notlptamu`, `alamattamu`, `fototamu`) VALUES
	(14, 'Bayu Santoso', 'KTP', '351982335875', 'Pengirim', '082334161787', 'Paiton', 'tamu20210130032219.png'),
	(15, 'Gatot Suherman', 'KTP', '34567', 'Programer', '082334556117', 'Alastengah', 'tamu20210201053414.png'),
	(16, 'Toso', 'KTP', '351908765282776001', 'Pengirim', '0813452627', 'Paiton', 'tamu20210204012755.png'),
	(17, 'Agel', 'KTP', '3519272687364', 'Main Game', '0868474651', 'Alastengah', 'tamu20210204013105.png'),
	(18, 'Rapli', 'KTP', '3517892827262', 'Main Game', '09383368474', 'Alastengah', 'tamu20210204013304.png'),
	(19, 'Bilal', 'KTP', '3528958945849', 'Pengirim', '093489328', 'Karawang', 'tamu20210204020333.png'),
	(20, 'Ceria', 'SIM', '0954534866', 'Ekspedisi', '09999', 'Surabaya', 'tamu20210204021017.png');
/*!40000 ALTER TABLE `tbdetailtamu` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbhak
CREATE TABLE IF NOT EXISTS `tbhak` (
  `idhak` int(6) NOT NULL AUTO_INCREMENT,
  `idjabatan` int(5) DEFAULT NULL,
  `admin` varchar(5) DEFAULT NULL,
  `approver` varchar(10) DEFAULT NULL,
  `pos` varchar(5) DEFAULT NULL,
  `gudang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idhak`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbhak: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbhak` DISABLE KEYS */;
INSERT INTO `tbhak` (`idhak`, `idjabatan`, `admin`, `approver`, `pos`, `gudang`) VALUES
	(1, 2, 'Admin', 'Approver', NULL, NULL),
	(2, 43, NULL, NULL, 'Pos', NULL);
/*!40000 ALTER TABLE `tbhak` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbhistorikendaraan
CREATE TABLE IF NOT EXISTS `tbhistorikendaraan` (
  `idhistorikend` int(6) NOT NULL AUTO_INCREMENT,
  `idtamu` int(6) DEFAULT NULL,
  `jenis` enum('Pengiriman','Simip','Tamu') DEFAULT NULL,
  `tglmasuk` datetime DEFAULT NULL,
  `idkendaraan` int(6) DEFAULT NULL,
  `nogate` varchar(5) DEFAULT NULL,
  `kdvendor` int(6) DEFAULT NULL,
  PRIMARY KEY (`idhistorikend`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kmbarang2.tbhistorikendaraan: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbhistorikendaraan` DISABLE KEYS */;
INSERT INTO `tbhistorikendaraan` (`idhistorikend`, `idtamu`, `jenis`, `tglmasuk`, `idkendaraan`, `nogate`, `kdvendor`) VALUES
	(6, 13, 'Pengiriman', '2021-02-04 13:26:04', 13, NULL, 11),
	(7, 14, 'Pengiriman', '2021-02-04 13:57:03', 14, '40', 12),
	(8, 15, 'Pengiriman', '2021-02-04 14:01:33', 15, NULL, 13);
/*!40000 ALTER TABLE `tbhistorikendaraan` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbhistoritamu
CREATE TABLE IF NOT EXISTS `tbhistoritamu` (
  `idhistori` int(6) NOT NULL AUTO_INCREMENT,
  `iddetailtamu` int(6) NOT NULL,
  `idtamu` int(6) NOT NULL,
  `jenis` enum('Simip','Pengiriman','Tamu','Keluar') NOT NULL,
  `tgltamu` datetime NOT NULL,
  `nopass` varchar(6) DEFAULT NULL,
  `nopassa` varchar(6) DEFAULT NULL,
  `kdvendor` int(6) DEFAULT NULL,
  PRIMARY KEY (`idhistori`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kmbarang2.tbhistoritamu: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbhistoritamu` DISABLE KEYS */;
INSERT INTO `tbhistoritamu` (`idhistori`, `iddetailtamu`, `idtamu`, `jenis`, `tgltamu`, `nopass`, `nopassa`, `kdvendor`) VALUES
	(8, 16, 13, 'Pengiriman', '2021-02-04 13:25:42', NULL, '30', 11),
	(9, 17, 4, 'Tamu', '2021-02-04 13:31:05', '40', NULL, NULL),
	(10, 18, 9, 'Simip', '2021-02-04 13:33:04', '30', NULL, NULL),
	(11, 19, 14, 'Pengiriman', '2021-02-04 13:56:44', NULL, '34', 12),
	(12, 20, 15, 'Pengiriman', '2021-02-04 14:00:38', NULL, '20', 13);
/*!40000 ALTER TABLE `tbhistoritamu` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbhistorivendor
CREATE TABLE IF NOT EXISTS `tbhistorivendor` (
  `idhistoriv` int(5) NOT NULL AUTO_INCREMENT,
  `kdvendor` int(4) NOT NULL,
  `kdkaryawan` int(3) DEFAULT NULL,
  `tgltt` datetime NOT NULL,
  `alasan` text DEFAULT NULL,
  `status` enum('Terima','Tolak','Aktif','Meminta') NOT NULL,
  `keterangan` enum('Minta Kirim','Minta Vendor','Ubah Password') DEFAULT NULL,
  `idkirim` int(11) DEFAULT NULL COMMENT 'terisi kodepengiriman jika ditolak atau diterima kirimannya',
  PRIMARY KEY (`idhistoriv`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COMMENT='berisi data histori penerimaan vendor';

-- Dumping data for table kmbarang2.tbhistorivendor: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbhistorivendor` DISABLE KEYS */;
INSERT INTO `tbhistorivendor` (`idhistoriv`, `kdvendor`, `kdkaryawan`, `tgltt`, `alasan`, `status`, `keterangan`, `idkirim`) VALUES
	(28, 11, 1, '2021-01-27 13:46:28', 'Terim kasih', 'Aktif', 'Minta Vendor', NULL),
	(31, 11, NULL, '2021-01-30 15:20:57', 'Meminta kiriman', 'Meminta', 'Minta Kirim', 12),
	(32, 11, 1, '2021-01-30 15:21:37', 'Kirim ga tuh', 'Terima', 'Minta Kirim', 12),
	(33, 11, NULL, '2021-02-04 13:26:32', 'Meminta kiriman', 'Meminta', 'Minta Kirim', 13),
	(34, 11, 1, '2021-02-04 13:27:19', 'Kirim', 'Terima', 'Minta Kirim', 13),
	(35, 12, NULL, '2021-02-04 13:57:30', 'Meminta kiriman', 'Meminta', 'Minta Kirim', 14),
	(36, 13, NULL, '2021-02-04 14:01:37', 'Meminta kiriman', 'Meminta', 'Minta Kirim', 15),
	(37, 12, 1, '2021-02-04 14:02:31', NULL, 'Terima', 'Minta Kirim', 14),
	(38, 13, 1, '2021-02-04 14:02:59', 'Kirim', 'Terima', 'Minta Kirim', 15);
/*!40000 ALTER TABLE `tbhistorivendor` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbjabatan
CREATE TABLE IF NOT EXISTS `tbjabatan` (
  `idJabatan` tinyint(2) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idJabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbjabatan: ~41 rows (approximately)
/*!40000 ALTER TABLE `tbjabatan` DISABLE KEYS */;
INSERT INTO `tbjabatan` (`idJabatan`, `jabatan`) VALUES
	(1, 'GENERAL MANAGER UBJOM PLTU PAITON'),
	(2, 'MANAJER OPERASI'),
	(3, 'SPV SENIOR RENDAL OPERASI'),
	(4, 'SPV SENIOR NIAGA & BAHAN BAKAR'),
	(5, 'SPV SENIOR KIMIA & LABORATORIUM'),
	(6, 'SPV SENIOR PRODUKSI DINAS'),
	(10, 'SPV COAL & ASH HANDLING A'),
	(11, 'SPV COAL & ASH HANDLING B'),
	(12, 'SPV COAL & ASH HANDLING C'),
	(13, 'SPV COAL & ASH HANDLING D'),
	(14, 'MANAJER PEMELIHARAAN'),
	(15, 'SPV SENIOR RENDAL PEMELIHARAAN'),
	(16, 'STAFF RENDALHAR'),
	(17, 'SPV SENIOR OUTAGE MANAGEMENT'),
	(18, 'STAFF OUTAGE'),
	(19, 'SPV SENIOR HAR LISTRIK'),
	(20, 'SPV SENIOR HAR KONIN'),
	(21, 'SPV SENIOR HAR MESIN 1 (B,T & AAB)'),
	(22, 'SPV SENIOR HAR MESIN 2 (SIST.BB & ABU)'),
	(23, 'SPV SENIOR SARANA'),
	(24, 'SPV SENIOR K3'),
	(25, 'SPV SENIOR LINGKUNGAN'),
	(26, 'MANAJER ENJINERING'),
	(27, 'SPV SENIOR SO TURBINE & AUX'),
	(28, 'SPV SENIOR SO BOILER & AUX'),
	(29, 'SPV SENIOR SO COMMON AUX'),
	(30, 'SPV SENIOR CONDITION BASED MAINTENANCE'),
	(31, 'SPV SENIOR MANAJEMEN MUTU & RISIKO'),
	(32, 'STAF MMR'),
	(33, 'MANAJER ADMINISTRASI'),
	(34, 'SPV SENIOR KEUANGAN'),
	(35, 'SPV SENIOR SDM'),
	(36, 'SPV SENIOR UMUM & CSR'),
	(37, 'STAFF UMUM & CSR'),
	(38, 'MANAJER LOGISTIK'),
	(39, 'SPV SENIOR PENGADAAN'),
	(40, 'SPV SENIOR ADMIN. GUDANG'),
	(41, 'STAFF GUDANG'),
	(42, 'SPV SENIOR INVENTORI KTRL & KATALOGER'),
	(43, 'DANRU'),
	(47, 'PKD');
/*!40000 ALTER TABLE `tbjabatan` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbkaryawan
CREATE TABLE IF NOT EXISTS `tbkaryawan` (
  `idKaryawan` int(11) NOT NULL AUTO_INCREMENT,
  `namaKaryawan` varchar(50) DEFAULT NULL,
  `tlpKaryawan` char(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamatKaryawan` tinytext DEFAULT NULL,
  `idJabatan` tinyint(2) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  `android` enum('Y','T') DEFAULT NULL,
  `web` enum('Y','T') DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `ttd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idKaryawan`),
  KEY `jabatan` (`idJabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbkaryawan: ~65 rows (approximately)
/*!40000 ALTER TABLE `tbkaryawan` DISABLE KEYS */;
INSERT INTO `tbkaryawan` (`idKaryawan`, `namaKaryawan`, `tlpKaryawan`, `email`, `alamatKaryawan`, `idJabatan`, `status`, `android`, `web`, `password`, `ttd`) VALUES
	(1, 'JUNAIDI ABDI 1', '08567886641', '7603019JA', 'Paiton', 1, 'Y', 'Y', 'Y', '74553ac5820f21af17fbce4108611d77', NULL),
	(2, 'DWI WIDODO', '08123456789', '7093025JA', 'Paiton', 2, 'Y', 'Y', 'Y', '22f13b6ea0330176041137f3be76fbd8', 'TTD20190627101745.png'),
	(3, 'INDAR JANUHARTOKO', '08', '7393234JA', 'Paiton', 3, 'Y', 'Y', 'Y', '9a01794bb1e70a55e04d175d1c6a4fd8', NULL),
	(4, 'AKHSANUL KHOLIQIN', '08', '7293013JA', 'Paiton', 4, 'Y', 'T', 'Y', '714057d71c8604c44c68e2eb9e52fc4e', NULL),
	(5, 'ALI MUSTOFA', '08', '8008041JA', 'Paiton', 5, 'Y', 'T', 'Y', '0b41c6f23a482f687c9c1fb8aea0e833', NULL),
	(6, 'YULIAWAN AGUNG WIDIATMOKO', '08', '7494042JA', 'Paiton', 6, 'Y', 'T', 'Y', 'aa05feabbccf8643458cb4be4eae0177', NULL),
	(10, 'TITO KURNIAWAN ', '08', '8309051PT', 'Paiton', 10, 'Y', 'T', 'Y', '37ac136c819bb20ba0285c38bd97a1ae', NULL),
	(11, 'DEDY PRASETYO', '08', '8110223PT', 'Paiton', 11, 'Y', 'T', 'Y', 'f9304f897e48b7cbcc39d07b3105c983', NULL),
	(12, 'SIH NOVAN IRAWAN', '08', '8110329PT', 'Paiton', 12, 'Y', 'T', 'Y', '5bf58ddee96cad684d23d3fc9cdb5332', NULL),
	(13, 'ISA CATUR PUTRA', '08', '8410323PT', 'Paiton', 13, 'Y', 'T', 'Y', '1684c63ed415dcbb2e73a56106fec710', NULL),
	(14, 'SUYANTO', '08123456789', '6993092JA', 'Paiton', 14, 'Y', 'Y', 'Y', '882167c8940e203d1437c0f8b04aa95c', 'TTD20190627101847.png'),
	(15, 'SETYO IRNANTO', '085212345678', '7194040JA', 'Paiton', 15, 'Y', 'Y', 'Y', '9a152f54ccb3c1d248e6e907045e4dfa', NULL),
	(16, 'JOKO DWI PRASETYA', '08', '8513013PT', 'Paiton', 16, 'Y', 'T', 'Y', 'c4b435fa02285d1fa4d6517ca04e7031', NULL),
	(17, 'HARIYADI BUDIWAN', '085212345678', '8813018PT', 'Paiton', 16, 'Y', 'Y', 'Y', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL),
	(18, 'ARNOLD', '08', '9216108PT', 'Paiton', 16, 'Y', 'T', 'Y', '7ffcf240e83783f120125c3b8680d272', NULL),
	(19, 'ENDY FRIYANDI PUTRA', '08', '9216109PT', 'Paiton', 16, 'Y', 'T', 'Y', 'b498c919d5e92a2d6f72ebf7fd75ffcd', NULL),
	(20, 'ANDRI PURWASITO', '08', '8310219PT', 'Paiton', 16, 'Y', 'T', 'Y', '1a99be2359a345b3690356cf738c6b7e', NULL),
	(21, 'SEPTAFIAN ADHE PERMANA', '08', '8915049PT', 'Paiton', 16, 'Y', 'T', 'Y', 'e42b43a07e6adb301e0ccf4c52db16f2', NULL),
	(22, 'SINAR PRASETYASRINI', '08', '8915098PT', 'Paiton', 16, 'Y', 'T', 'Y', '49c5dfe8f8df9f9c67a22a2e55f01a8c', NULL),
	(23, 'CHANDRA SAGITA UTAMA', '08', '841510PT', 'Paiton', 16, 'Y', 'T', 'Y', 'dfaa54212bd7d9af2d805d8681f43bd2', NULL),
	(24, 'HENDRA GUNAWAN', '08', '8415047PT', 'Paiton', 16, 'Y', 'T', 'Y', '2ab0d72c457fcead39eb15cbceb62892', NULL),
	(25, 'BAKIR SANTOSO', '08', '7493003JA', 'Paiton', 17, 'Y', 'T', 'Y', '57c58e7cc39873cf122a8c3f77ce1006', NULL),
	(26, 'AGUS ROHMANSYAH', '08', '8510217PT', 'Paiton', 18, 'Y', 'T', 'Y', 'aff60e117b8d746be6779faf3e3b8638', NULL),
	(27, 'RADEN SALI FALIANTO', '08', '8716107PT', 'Paiton', 18, 'Y', 'T', 'Y', '134860297b35861ac38023cdde13be2d', NULL),
	(28, 'MOCHAMMAD BAMBANG IRAWAN', '08', '9216117PT', 'Paiton', 18, 'Y', 'T', 'Y', '8f9a08e9681ede0a698055fd14c22df7', NULL),
	(29, 'EKA ANGGA NOVIANTO', '08', '8513010PT', 'Paiton', 18, 'Y', 'T', 'Y', '84b84e9a9d70449429282b259946ade0', NULL),
	(30, 'YOGANTHA ANGGORANDA', '08', '9016115PT', 'Paiton', 18, 'Y', 'T', 'Y', '25b0a2087f30ca9fd39d40ee1060ad6d', NULL),
	(31, 'ARIEF SETIABUDI', '08', '8509018JA', 'Paiton', 19, 'Y', 'T', 'Y', '589da8f68636003dbe62fd812787a340', NULL),
	(32, 'JOKO PURWANTO', '08', '7494049JA', 'Paiton', 20, 'Y', 'T', 'Y', '0d30f2bfaee50cbd2d89b0e68577a891', NULL),
	(33, 'WAWANTO', '08', '7394125JA', 'Paiton', 21, 'Y', 'T', 'Y', 'b7709332d53369a50a70a0c54ed92c91', NULL),
	(34, 'BUDI  HARTONO', '08', '7394108JA', 'Paiton', 22, 'Y', 'T', 'Y', 'd65a94d8763145cf3eeb23cb81c81b9b', NULL),
	(35, 'HARI SISWANTO', '08', '7293200JA', 'Paiton', 23, 'Y', 'T', 'Y', 'd17556747faf853cb6855f641cb09fb2', NULL),
	(36, 'MUHAMMAD RAIZA', '08999970097', '8815079AM', 'Paiton', 24, 'Y', 'Y', 'Y', 'f0a44400958d8161cafe3c6b5e8d3796', NULL),
	(37, 'MAYA MAHARANI', '085212345678', '8610055JA', 'Paiton', 25, 'Y', 'Y', 'Y', '0e8b8fad865569d85d79ab2b69e91ba3', NULL),
	(38, 'EKO WIJANARTO', '08123456789', '8106126JA', 'Paiton', 26, 'Y', 'Y', 'Y', 'c17b9c741055bbcc4ed4bf5c0b717ba1', 'TTD20190627101821.png'),
	(39, 'TRI LEKSONO', '08', '7594121JA', 'Paiton', 27, 'Y', 'T', 'Y', '1ee1c4ac36a7e33baba05618996d49f8', NULL),
	(40, 'QOMARI', '08', '7093044JA', 'Paiton', 28, 'Y', 'T', 'Y', '4e7b9cc4925061d14cf8d8fba03bf13a', NULL),
	(41, 'HARYANTO', '08', '7394107JA', 'Paiton', 29, 'Y', 'T', 'Y', 'f81eecfb672b921bd0fbc0830c7f7693', NULL),
	(42, 'DIDIK SUSANTO', '08', '6893093JA', 'Paiton', 30, 'Y', 'T', 'Y', '811ade3d0450e461d7aa0ef29e70c15f', NULL),
	(43, 'FAISAL RIZA', '08', '8108082JA', 'Paiton', 31, 'Y', 'T', 'Y', '175c5c7d789d8e8598f498184c3904cf', NULL),
	(44, 'HERI PURNOMO', '08', '8312771PT', 'Paiton', 32, 'Y', 'T', 'Y', '202cb962ac59075b964b07152d234b70', NULL),
	(45, 'AKHMAD SYAKIR', '08', '9214080TA', 'Paiton', 32, 'Y', 'T', 'Y', 'af0b22c7724a5a468fc8d52a41ca860e', NULL),
	(46, 'SAMSUL EFENDI', '089876557886', '6787013JA', 'Paiton', 33, 'Y', 'Y', 'Y', 'd96254236c7212ef8ef453d5e9ce0e92', 'TTD20190624124339.jpeg'),
	(47, 'CITRA MASHITA', '08', '8511082JA', 'Paiton', 34, 'Y', 'T', 'Y', '63a244ca117aafcd14efad263e11ead0', NULL),
	(48, 'SARIFUDIN', '08', '7293024JA', 'Paiton', 35, 'Y', 'T', 'Y', '0acbea128e90999d344af78fb27244d2', NULL),
	(49, 'SUKRISNO', '089876557886', '6993230JA', 'Paiton', 36, 'Y', 'Y', 'Y', 'd5a6f9db283aab0c3a93bae40aaa86a7', 'TTD20190624124445.jpeg'),
	(50, 'ANITA RAHMAWATI', '08', '9413032PT', 'Paiton', 37, 'Y', 'T', 'Y', '3008b8719fd288d12a2e142737a950b7', NULL),
	(51, 'ADE VICKTOR CINDY', '085257372419', '9116106PT', 'Paiton', 37, 'Y', 'Y', 'Y', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
	(52, 'ARMAN EFFENDI', '08987635698', '7906010JA', 'Paiton', 38, 'Y', 'Y', 'Y', '364365a4701d3d1511bcda54076600c0', 'TTD20190624124410.jpeg'),
	(53, 'MUSLIM', '08', '7394132JA', 'Paiton', 39, 'Y', 'T', 'Y', '06ec990713e372ad34cf00c32b185fdd', NULL),
	(54, 'HARTO', '088888888888', '7294124JA', 'Paiton', 40, 'Y', 'Y', 'Y', 'ff03db415e9242be0d7b6dae84645c16', NULL),
	(55, 'IRWAN PRASETYOBUDI', '08', '8814040PT', 'Paiton', 41, 'Y', 'T', 'Y', '52d3d9fcdff22269495774ddd7f46750', NULL),
	(56, 'MIFTACHUL SAIFUL ANAM', '08', '9014034PT', 'Paiton', 41, 'Y', 'T', 'Y', '5f1b8ee7b8e55f5f6270c015d5ad52bc', NULL),
	(57, 'AMINUDIN', '08', '9113840PT', 'Paiton', 41, 'Y', 'T', 'Y', '4794d162ef6f7f1bee614d10d0d0456e', NULL),
	(58, 'MOH. HIDAYATUL ULUM', '08', '9215207TA', 'Paiton', 41, 'Y', 'T', 'Y', 'f1a26b0fae19e7ef27b449f3082b46d3', NULL),
	(59, 'MOCH. SAMSUL ARIEF', '08', '6888019JA', 'Paiton', 42, 'Y', 'T', 'Y', 'be89afe67527158008fd41b345f75d6d', NULL),
	(60, 'MOH. AMIN', '08512345678', '19890702', 'Paiton', 43, 'Y', 'Y', 'Y', '827ccb0eea8a706c4c34a16891f84e7b', 'TTD20190626110507.png'),
	(61, 'HARIYANTO', '0851234567', '19790803', 'Paiton', 43, 'Y', 'Y', 'Y', '64a307c9ed3c1ebfd5767ad1851bc4ad', NULL),
	(62, 'ADI SUPRIONO', '0851234567', '19821204', 'Paiton', 43, 'Y', 'Y', 'Y', '420ec7430630b38d9a25d74ab4b5aea4', NULL),
	(63, 'NANANG HARIYANTO', '0851234567', '19821005', 'Paiton', 43, 'Y', 'Y', 'Y', 'b98d68a798b428991f9a0f6616cfbcb4', NULL),
	(64, 'BAHRUL ULUM', '0851234567', '19901106', 'Paiton', 47, 'Y', 'Y', 'Y', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
	(65, 'SUFYAN HADI', '0851234567', '19811107', 'Paiton', 47, 'Y', 'Y', 'Y', 'b6e9359915b41b7537ebf917079d128e', NULL),
	(66, 'EKO WAHYUDI', '0851234567', '19891108', 'Paiton', 47, 'Y', 'Y', 'Y', '5f59c33c2d47c93fcf6665573ed89bce', NULL),
	(67, 'LUTFIL AMIN', '0851234567', '19881209', 'Paiton', 47, 'Y', 'Y', 'Y', 'e42b08805c82650fdea0837f5b87ed9d', NULL),
	(68, 'AGUS RIYANTO', '08520000', '7493023JA', 'JALAN abcd', 6, 'Y', 'Y', 'Y', '3a481ff1ed0cd13b6beca6706ac91638', '');
/*!40000 ALTER TABLE `tbkaryawan` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbkeluar
CREATE TABLE IF NOT EXISTS `tbkeluar` (
  `idkeluar` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` datetime DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `tglkembali` date DEFAULT NULL,
  `jenisbarang` enum('Milik Sendiri','Pinjam','Repair','Kontrak') DEFAULT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `status` enum('Mengatur','Proses','Selesai') DEFAULT 'Mengatur',
  `dokumen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idkeluar`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbkeluar: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbkeluar` DISABLE KEYS */;
INSERT INTO `tbkeluar` (`idkeluar`, `tgl`, `tujuan`, `tglkembali`, `jenisbarang`, `keperluan`, `status`, `dokumen`) VALUES
	(2, '2021-02-08 19:00:34', 'Bengkel ahass', NULL, 'Milik Sendiri', 'Service Mobil Rutin', 'Mengatur', NULL);
/*!40000 ALTER TABLE `tbkeluar` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbkendaraan
CREATE TABLE IF NOT EXISTS `tbkendaraan` (
  `idkendaraan` int(6) NOT NULL AUTO_INCREMENT,
  `jeniskendaraan` varchar(50) DEFAULT NULL,
  `namakendaraan` varchar(50) DEFAULT NULL,
  `plat` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idkendaraan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbkendaraan: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbkendaraan` DISABLE KEYS */;
INSERT INTO `tbkendaraan` (`idkendaraan`, `jeniskendaraan`, `namakendaraan`, `plat`) VALUES
	(12, 'Motor', 'Roda 3', 'N 10 BH'),
	(13, 'Pick up', 'Dino Dutro', 'N 990 PM'),
	(14, 'Pick up', 'Dino', 'D 09 BN'),
	(15, 'Motor', 'Ekspedisi', '0000');
/*!40000 ALTER TABLE `tbkendaraan` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbpengaturan
CREATE TABLE IF NOT EXISTS `tbpengaturan` (
  `kodeatur` tinyint(2) NOT NULL AUTO_INCREMENT,
  `tglbuat` datetime NOT NULL,
  `tglakhir` datetime DEFAULT NULL,
  `jenis` enum('Masuk','Simip','Keluar') NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`kodeatur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbpengaturan: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbpengaturan` DISABLE KEYS */;
INSERT INTO `tbpengaturan` (`kodeatur`, `tglbuat`, `tglakhir`, `jenis`, `status`) VALUES
	(3, '2020-12-13 15:18:12', NULL, 'Masuk', 'Y'),
	(4, '2021-01-29 08:53:10', NULL, 'Simip', 'N'),
	(5, '2021-01-29 08:54:50', NULL, 'Keluar', 'Y'),
	(6, '2021-01-29 08:55:36', NULL, 'Simip', 'Y');
/*!40000 ALTER TABLE `tbpengaturan` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbpengiriman
CREATE TABLE IF NOT EXISTS `tbpengiriman` (
  `kodekirim` int(7) NOT NULL AUTO_INCREMENT,
  `kodevendor` smallint(5) DEFAULT NULL,
  `keperluan` varchar(50) DEFAULT NULL,
  `tglbuat` datetime DEFAULT NULL,
  `tglkirim` date DEFAULT NULL,
  `tglmasuk` datetime DEFAULT NULL,
  `tglkeluar` datetime DEFAULT NULL,
  `nopo` varchar(10) DEFAULT NULL,
  `statuskiriman` enum('Mengatur','Meminta Gudang','Diterima Gudang','Ditolak Gudang','Diterima Pos','Proses Approve','Selesai') DEFAULT 'Mengatur',
  `idpengaturan` tinyint(2) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `berkas` varchar(100) DEFAULT NULL,
  `status` enum('PO','NonPO') DEFAULT NULL,
  `pos` smallint(3) DEFAULT NULL,
  `loby` smallint(3) DEFAULT NULL,
  `gudang` smallint(3) DEFAULT NULL,
  `areakhusus` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`kodekirim`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbpengiriman: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbpengiriman` DISABLE KEYS */;
INSERT INTO `tbpengiriman` (`kodekirim`, `kodevendor`, `keperluan`, `tglbuat`, `tglkirim`, `tglmasuk`, `tglkeluar`, `nopo`, `statuskiriman`, `idpengaturan`, `tujuan`, `berkas`, `status`, `pos`, `loby`, `gudang`, `areakhusus`) VALUES
	(13, 11, 'Pengadaan Masker Ply', '2021-02-04 13:24:06', '2021-02-05', '2021-02-04 13:28:57', NULL, 'IK0098', 'Diterima Pos', 3, 'Gudang', '20210204132625.jpeg', 'PO', 1, NULL, NULL, 'Y'),
	(14, 12, 'DD VI Kontrak Payung Chemical', '2021-02-04 13:54:58', '2021-02-04', '2021-02-04 14:06:23', NULL, 'OK0842', 'Diterima Pos', 3, 'Gudang', '20210204135723.JPG', 'PO', 1, NULL, NULL, 'Y'),
	(15, 13, 'Pengadaan kawat chemical outage', '2021-02-04 13:58:54', '2021-02-04', '2021-02-04 14:10:42', NULL, 'OL0007', 'Diterima Pos', 3, 'Gudang', '20210204140106.JPG', 'PO', 1, NULL, NULL, 'Y');
/*!40000 ALTER TABLE `tbpengiriman` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbsimip
CREATE TABLE IF NOT EXISTS `tbsimip` (
  `idtamu` int(11) NOT NULL AUTO_INCREMENT,
  `kepentingan` varchar(50) NOT NULL,
  `tglsimip` datetime DEFAULT NULL,
  `pendamping` varchar(50) DEFAULT NULL,
  `statuspossimip` enum('Diterima') DEFAULT NULL,
  `k3` int(11) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `smanager` tinyint(1) DEFAULT NULL,
  `sk3` tinyint(1) DEFAULT NULL,
  `idpengiriman` int(6) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `perusahaan` varchar(50) DEFAULT NULL,
  `idpengaturan` int(2) DEFAULT NULL,
  `tglkeluar` datetime DEFAULT NULL,
  `kendaraan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtamu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbsimip: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbsimip` DISABLE KEYS */;
INSERT INTO `tbsimip` (`idtamu`, `kepentingan`, `tglsimip`, `pendamping`, `statuspossimip`, `k3`, `manager`, `smanager`, `sk3`, `idpengiriman`, `tujuan`, `perusahaan`, `idpengaturan`, `tglkeluar`, `kendaraan`) VALUES
	(8, 'Pengiriman Barang', '2021-02-04 13:27:40', NULL, 'Diterima', NULL, 52, NULL, NULL, 13, NULL, NULL, 6, NULL, NULL),
	(9, 'Study lingkngan', '2021-02-04 13:32:29', 'PAndi', 'Diterima', NULL, 14, NULL, NULL, NULL, 'Lab Kimia', 'Kopo', 6, NULL, NULL),
	(10, 'Pengiriman Barang', '2021-02-04 14:03:21', 'Gudang', 'Diterima', 36, 52, NULL, NULL, 14, NULL, NULL, 6, NULL, 'Roda 4'),
	(11, 'Pengiriman Barang', '2021-02-04 14:09:32', 'Gudang', 'Diterima', NULL, 52, NULL, NULL, 15, NULL, NULL, 6, NULL, 'Roda 4');
/*!40000 ALTER TABLE `tbsimip` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbtamu
CREATE TABLE IF NOT EXISTS `tbtamu` (
  `kodetamu` int(5) NOT NULL AUTO_INCREMENT,
  `keperluan` varchar(50) DEFAULT NULL,
  `tglmasuk` datetime DEFAULT NULL,
  `perusahaan` varchar(50) DEFAULT NULL,
  `tglkeluar` datetime DEFAULT NULL,
  `janji` enum('Y','N') DEFAULT NULL,
  `bertemu` varchar(50) DEFAULT NULL,
  `kodepos` int(2) DEFAULT NULL,
  `kendaraan` varchar(20) DEFAULT NULL,
  `noplat` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kodetamu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbtamu: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbtamu` DISABLE KEYS */;
INSERT INTO `tbtamu` (`kodetamu`, `keperluan`, `tglmasuk`, `perusahaan`, `tglkeluar`, `janji`, `bertemu`, `kodepos`, `kendaraan`, `noplat`) VALUES
	(4, 'Main ML', '2021-02-04 13:31:05', 'Kopo', NULL, 'Y', '45', 1, 'Beat', '-');
/*!40000 ALTER TABLE `tbtamu` ENABLE KEYS */;

-- Dumping structure for table kmbarang2.tbvendor
CREATE TABLE IF NOT EXISTS `tbvendor` (
  `kdvendor` smallint(5) NOT NULL AUTO_INCREMENT,
  `namavendor` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` enum('Aktif','Meminta','Blokir','Ditolak') DEFAULT 'Meminta',
  PRIMARY KEY (`kdvendor`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table kmbarang2.tbvendor: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbvendor` DISABLE KEYS */;
INSERT INTO `tbvendor` (`kdvendor`, `namavendor`, `email`, `telepon`, `password`, `alamat`, `status`) VALUES
	(11, 'Kopkar Mitra Energi Sejahtera', 'gatotkoco419@gmail.com', '087653433231', 'cda5af8eedb5939e10c66a56e997b8e1', 'Jl. Raya Rurabaya - Situbondo KM. 141 Paiton - Probolinggo', 'Aktif'),
	(12, 'PT Kurita Indonesia', 'kurita@gmail.com', '083673489847', '202cb962ac59075b964b07152d234b70', 'Jl. ', 'Aktif'),
	(13, 'PT Mitra Energi Sembilan', 'energi@gmail.com', '094985347548', '202cb962ac59075b964b07152d234b70', 'Jl.', 'Aktif');
/*!40000 ALTER TABLE `tbvendor` ENABLE KEYS */;

-- Dumping structure for view kmbarang2.urutanaprove
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `urutanaprove` (
	`kodeatur` TINYINT(2) NOT NULL,
	`tglbuat` DATETIME NOT NULL,
	`tglakhir` DATETIME NULL,
	`jenis` ENUM('Masuk','Simip','Keluar') NOT NULL COLLATE 'latin1_swedish_ci',
	`status` ENUM('Y','N') NOT NULL COLLATE 'latin1_swedish_ci',
	`iddetailatur` INT(5) NOT NULL,
	`idatur` TINYINT(2) NOT NULL,
	`urutan` TINYINT(2) NOT NULL,
	`kodejabatan` INT(4) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for trigger kmbarang2.pengaturankirim
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `pengaturankirim` AFTER INSERT ON `tbpengiriman` FOR EACH ROW BEGIN
	DECLARE kode INT DEFAULT 0;
	SELECT kodeatur INTO kode FROM tbpengaturan WHERE status = 'Y' AND jenis = 'Masuk';
	UPDATE tbpengiriman SET idpengaturan = kode WHERE kodekirim = NEW.kodekirim;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger kmbarang2.pengaturansimip
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `pengaturansimip` AFTER INSERT ON `tbsimip` FOR EACH ROW BEGIN
	DECLARE kode INT DEFAULT 0;
	SELECT kodeatur INTO kode FROM tbpengaturan WHERE status = 'Y' AND jenis = 'Simip';
	UPDATE tbsimip SET idpengaturan = kode WHERE idtamu = NEW.idtamu;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view kmbarang2.daftarbarangditolak
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `daftarbarangditolak`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftarbarangditolak` AS SELECT dp.*, p.keperluan, p.nopo, v.kdvendor, v.namavendor, p.tglkirim FROM tbdetailpengiriman dp left join tbpengiriman p ON dp.idkirim = p.kodekirim LEFT JOIN tbvendor v ON p.kodevendor = v.kdvendor WHERE dp.statusbarang = 'Ditolak' ;

-- Dumping structure for view kmbarang2.daftarkaryawan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `daftarkaryawan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftarkaryawan` AS SELECT k.idKaryawan, k.namaKaryawan, k.idJabatan, j.jabatan FROM tbkaryawan k JOIN tbjabatan j ON k.idJabatan = j.idJabatan ;

-- Dumping structure for view kmbarang2.daftarmansimip
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `daftarmansimip`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftarmansimip` AS SELECT k.idKaryawan, k.namaKaryawan, k.idJabatan, j.jabatan FROM tbkaryawan k JOIN tbjabatan j ON k.idJabatan = j.idJabatan WHERE j.jabatan LIKE '%K3%' OR j.jabatan LIKE '%MANAJER%' ;

-- Dumping structure for view kmbarang2.daftarpengiriman
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `daftarpengiriman`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftarpengiriman` AS select a.idapprove AS idapprove,p.kodekirim AS kodekirim,p.kodevendor AS kodevendor,p.keperluan AS keperluan,p.tglbuat AS tglbuat,p.tglkirim AS tglkirim,p.tglmasuk AS tglmasuk,p.tglkeluar AS tglkeluar,p.nopo AS nopo,p.statuskiriman AS statuskiriman,p.idpengaturan AS idpengaturan,p.tujuan AS tujuan,p.berkas AS berkas,p.status AS status,p.pos AS pos,p.loby AS loby,p.gudang AS gudang,p.areakhusus AS areakhusus,v.namavendor AS namavendor,v.kdvendor AS kdvendor, cariurutan(a.idapprove, p.idpengaturan) AS selanjutnya, ts.k3, ts.manager, ts.idtamu AS kodesimip from ((tbapprove a left join tbpengiriman p on(a.idpengiriman = p.kodekirim)) left join tbvendor v on(p.kodevendor = v.kdvendor) LEFT JOIN tbsimip ts ON(p.kodekirim = ts.idpengiriman)) where a.jenisapprove = 'Barang' and a.status = 'Proses' ;

-- Dumping structure for view kmbarang2.daftarsimip
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `daftarsimip`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftarsimip` AS SELECT a.idapprove, a.idsimip, a.`status`, s.*, cariurutan(a.idapprove, s.idpengaturan)AS selanjutnya FROM tbapprove a LEFT JOIN tbsimip s ON a.idsimip = s.idtamu WHERE a.`status` = 'Proses' AND a.jenisapprove = 'Simip' ;

-- Dumping structure for view kmbarang2.urutanaprove
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `urutanaprove`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `urutanaprove` AS SELECT *FROM tbpengaturan
INNER JOIN tbdetailpengaturan ON tbpengaturan.kodeatur=tbdetailpengaturan.idatur ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
