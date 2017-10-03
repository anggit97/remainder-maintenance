# Host: localhost  (Version 5.6.21)
# Date: 2017-10-03 20:47:31
# Generator: MySQL-Front 5.3  (Build 5.39)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "admin"
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

INSERT INTO `admin` VALUES ('admin1','Laeliyah Admin','$2y$10$hC1QLQKxuKvVLKrRnupt.eqOif.HyrXLRQUuGoh4.ZSjzmWYlvCO.','tangerang','laeli@gmail.com','Administrator'),('administrator','administrator','$2y$10$IvWWnIAI.rSuy86.QWfYye3dETdsD2bVk3i3EzTPEh/ozYFdDeak6','administrator','a@gmail','Administrator'),('agus','agus','$2y$10$seWsSWm0rD.7lMecfaGqoORLs/TqZsxkMnj7LQE0syw/7SQNIxD0K','agus','agus@gmail','Administrator'),('apw22','Apw','$2y$10$rcvBePgCnYo53NIJJtFA0u.25LQwyKe.MPtzSNgKc.5Ga7Cz2B6kO','Tangeran','apw22@gmail.com','Staff Produksi'),('apw_maintenance','apw maintenance','$2y$10$KVSn1QiNkaEAb.l6M/46UOdXXWwuN3axIHSr1wvFfavizoDOe1kbi','tangerang','apw@gmail.com','Staff Maintenance'),('apw_spv','apw_spv','$2y$10$8CEkRipuqeMnKbAS2/tizeCaUZB9y4KLVt9T9N/4S79NCa.sLOxDy','tangerang','apw22@gmail.com','SPV'),('maintenance','Santo','$2y$10$BJRK2pWBU1.EgYqfM.BHMu3uwLv2tDk4wJLk05i.bUNAS2za3q0rK','pondok pinang','santo@gmail.com','Staff Maintenance'),('mnt','mnt','$2y$10$I.4cV4bKgUuxhkvDAdJK1ObGW.J9ZMt2g5nFf6UgCQgdwHalU/iSK','mnt','mnt@gmail.com','Staff Maintenance'),('produksi','Chiko Staff Produksi','$2y$10$BJRK2pWBU1.EgYqfM.BHMu3uwLv2tDk4wJLk05i.bUNAS2za3q0rK','ciledug','chiko@gmail.com','Staff Produksi'),('spv','Firdan SPV','$2y$10$imAX2UB2hUIKK6Ll3tpzJuOsk539Ea1VnDi7Y1IhhLL8cRjiba93a','pondok ranji','fdn@gmail.com','SPV'),('tono','Tono Calan','$2y$10$DuRI7WufoAU4LQmeu7bmNuaGyC4xS2whfHCX4KvJI8WxeQNVeOlEK','pondok kacang','tono@gmail.com','Staff Maintenance');

#
# Structure for table "alat"
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

INSERT INTO `alat` VALUES ('A0001','Mesin 1','Keterangan Alat 1'),('A0002','Mesin 2','Keterangan Alat 2'),('A0003','Mesin 3','Keterangans 3'),('A0004','Alat4','Keterangan Alat4'),('A0005','Alat 5','Keterangan alat 5');

#
# Structure for table "alat_kerusakan"
#

DROP TABLE IF EXISTS `alat_kerusakan`;
CREATE TABLE `alat_kerusakan` (
  `id_ka` int(11) NOT NULL AUTO_INCREMENT,
  `id_maintenance` char(5) NOT NULL DEFAULT '',
  `id_alat` char(5) DEFAULT NULL,
  `id_kerusakan` int(5) DEFAULT NULL,
  `solusi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ka`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "alat_kerusakan"
#

INSERT INTO `alat_kerusakan` VALUES (29,'M0001','A0001',0,'servis'),(30,'M0001','A0002',0,'belibaru'),(31,'M0002','A0001',9,'servis'),(32,'M0002','A0002',9,'belibaru');

#
# Structure for table "jadwal"
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

INSERT INTO `jadwal` VALUES ('J0001','Per 1 Bulan','senin',2,'A0001','2017');

#
# Structure for table "kerusakan"
#

DROP TABLE IF EXISTS `kerusakan`;
CREATE TABLE `kerusakan` (
  `id_kerusakan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kerusakan` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'belum diproses',
  PRIMARY KEY (`id_kerusakan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "kerusakan"
#

INSERT INTO `kerusakan` VALUES (9,'Kerusakan 1','Desc Kerusakan 1','');

#
# Structure for table "maintenance"
#

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE `maintenance` (
  `id_maintenance` char(5) NOT NULL DEFAULT '',
  `tgl_peng_maintenance` varchar(255) NOT NULL DEFAULT '',
  `id_pegawai` varchar(255) DEFAULT NULL,
  `tgl_maintenance` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_jadwal` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_maintenance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "maintenance"
#

INSERT INTO `maintenance` VALUES ('M0001','2017-10-03','apw_maintenance','2017-10-20','servis','J0001'),('M0002','2017-10-03','admin1','2017-10-19','servis','J0001');

#
# Structure for table "pegawai"
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
