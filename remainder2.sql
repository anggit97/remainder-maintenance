# Host: localhost  (Version: 5.6.25)
# Date: 2017-09-29 05:55:36
# Generator: MySQL-Front 5.2  (Build 5.66)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

DROP DATABASE IF EXISTS `remainder2`;
CREATE DATABASE `remainder2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `remainder2`;

#
# Source for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL DEFAULT '',
  `nama_admin` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES ('admin1','Laeliyah Admin','$2y$10$hC1QLQKxuKvVLKrRnupt.eqOif.HyrXLRQUuGoh4.ZSjzmWYlvCO.','tangerang','laeli@gmail.com','Administrator'),('administrator','administrator','$2y$10$IvWWnIAI.rSuy86.QWfYye3dETdsD2bVk3i3EzTPEh/ozYFdDeak6','administrator','a@gmail','Administrator'),('agus','agus','$2y$10$seWsSWm0rD.7lMecfaGqoORLs/TqZsxkMnj7LQE0syw/7SQNIxD0K','agus','agus@gmail','Administrator'),('maintenance','Santo','$2y$10$BJRK2pWBU1.EgYqfM.BHMu3uwLv2tDk4wJLk05i.bUNAS2za3q0rK','pondok pinang','santo@gmail.com','Staff Maintenance'),('produksi','Chiko Staff Produksi','$2y$10$BJRK2pWBU1.EgYqfM.BHMu3uwLv2tDk4wJLk05i.bUNAS2za3q0rK','ciledug','chiko@gmail.com','Staff Produksi'),('spv','Firdan SPV','$2y$10$imAX2UB2hUIKK6Ll3tpzJuOsk539Ea1VnDi7Y1IhhLL8cRjiba93a','pondok ranji','fdn@gmail.com','SPV'),('tono','Tono Calan','$2y$10$DuRI7WufoAU4LQmeu7bmNuaGyC4xS2whfHCX4KvJI8WxeQNVeOlEK','pondok kacang','tono@gmail.com','Staff Maintenance');

#
# Source for table "alat"
#

DROP TABLE IF EXISTS `alat`;
CREATE TABLE `alat` (
  `id_alat` char(5) NOT NULL DEFAULT '',
  `nama_alat` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "alat"
#

INSERT INTO `alat` VALUES ('A0001','Mesin 1','Keterangan Alat 1'),('A0002','Mesin 2','Keterangan Alat 2'),('A0003','Mesin 3','Keterangans 3');

#
# Source for table "alat_kerusakan"
#

DROP TABLE IF EXISTS `alat_kerusakan`;
CREATE TABLE `alat_kerusakan` (
  `id_ka` int(11) NOT NULL AUTO_INCREMENT,
  `id_maintenance` char(5) NOT NULL DEFAULT '',
  `id_alat` char(5) DEFAULT NULL,
  `id_kerusakan` char(5) DEFAULT NULL,
  `solusi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ka`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "alat_kerusakan"
#

INSERT INTO `alat_kerusakan` VALUES (1,'M0001','A0001','K0001','Kerusakan 1'),(2,'M0001','A0002','K0002','Kerusakan 2'),(3,'M0001','A0003','K0001','solusi 1'),(4,'M0002','A0001','K0001','belibaru'),(5,'M0002','A0002','K0006','servis'),(6,'M0002','A0003','K0003','Kerusakan Aja'),(7,'M0002','A0002','K0005','servis'),(8,'M0003','A0002','K0002','sd'),(9,'M0003','A0001','K0002','dscd'),(10,'M0004','A0001','K0001','cek1');

#
# Source for table "jadwal"
#

DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal` (
  `id_jadwal` char(5) NOT NULL DEFAULT '',
  `periode` varchar(20) DEFAULT NULL,
  `hari` varchar(6) DEFAULT NULL,
  `waktu_perawatan` int(11) DEFAULT NULL,
  `id_alat` char(5) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "jadwal"
#

INSERT INTO `jadwal` VALUES ('J0001','6','selasa',2,'A0003','2017'),('J0002','1','senin',1,'A0001','2017'),('J0003','3','kamis',2,'A0002','2017');

#
# Source for table "kerusakan"
#

DROP TABLE IF EXISTS `kerusakan`;
CREATE TABLE `kerusakan` (
  `id_kerusakan` char(5) NOT NULL DEFAULT '',
  `nama_kerusakan` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'belum diproses',
  PRIMARY KEY (`id_kerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "kerusakan"
#

INSERT INTO `kerusakan` VALUES ('K0001','Kerusakan 1','Desc Kerusakan 1','belum diproses'),('K0002','Kerusakan 1','Deskripsi 1','belum diproses'),('K0003','Kerusakan 2','Deskripsi 2','belum diproses'),('K0004','Kerusakan 1','Deskripsi 1','belum diproses'),('K0005','Konslet','Beli Aja','belum diproses'),('K0006','Kerusakan 1','Servis 1','belum diproses'),('K0007','Kerusakan 2','','belum diproses');

#
# Source for table "maintenance"
#

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE `maintenance` (
  `id_maintenance` char(5) NOT NULL DEFAULT '',
  `tgl_peng_maintenance` varchar(255) NOT NULL DEFAULT '',
  `id_pegawai` varchar(255) DEFAULT NULL,
  `tgl_maintenance` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_maintenance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "maintenance"
#

INSERT INTO `maintenance` VALUES ('M0001','2017-06-20','Chiko Staff Produksi','2017-06-22','servis'),('M0002','2017-06-21','Chiko Staff Produksi','2017-06-30','servis'),('M0003','2017-08-04','produksi','','Belum Diproses'),('M0004','2017-09-29','produksi','','Belum Diproses');

#
# Source for table "pegawai"
#

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` char(5) NOT NULL DEFAULT '',
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "pegawai"
#

INSERT INTO `pegawai` VALUES ('P0001','Ari Hermawan','Sepatan Timur','0821233312232'),('P0002','Arif ','Ciledug','0287812035533'),('P0003','Pegawai 1','Alamat Pegawai 1','09029129892');

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
