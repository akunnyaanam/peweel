/*
SQLyog - Free MySQL GUI v5.02
Host - 5.5.5-10.4.19-MariaDB : Database - dborder
*********************************************************************
Server version : 5.5.5-10.4.19-MariaDB
*/


create database if not exists `dborder`;

USE `dborder`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `hrg` double DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert into `barang` values 
(1,'aglonema Suksom',45000,10,'-','aglonemaSuksom.jpg'),
(2,'aglonema Rotundum Aceh',30000,10,'-','aglonemaRotundumAceh.jpg'),
(3,'aglonemaRoDudAnjamani',75000,10,'-','aglonemaRoDudAnjamani.jpg'),
(4,'aglonemaSnowWhiteRemaja',77,10,'-','aglonemaSnowWhiteRemaja.jpg'),
(5,'aglonemaSuperWhite',90000,50,'-','aglonemaSuperWhite.jpg'),
(6,'aglonemaVenus',90000,10,'77','aglonemaVenus.jpg'),
(7,'aglonemaRedAnjamaniDewasa',75000,10,'-','aglonemaRedAnjamaniDewasa.jpg');

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama_member` varchar(40) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `alamat` varchar(60) DEFAULT NULL,
  `kota` varchar(40) DEFAULT NULL,
  `provinsi` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `member` */

insert into `member` values 
(1,'agus','agus@gmail.com','1234','j semarang','semarang','jateng','1','agus','123');

/*Table structure for table `tborder` */

DROP TABLE IF EXISTS `tborder`;

CREATE TABLE `tborder` (
  `id` int(10) unsigned NOT NULL,
  `idmember` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `jenisByr` varchar(20) DEFAULT NULL,
  `bank` varchar(40) DEFAULT NULL,
  `norek` varchar(40) DEFAULT NULL,
  `biayaKirim` double DEFAULT NULL,
  `pembelian` double DEFAULT NULL,
  `totalByr` double DEFAULT NULL,
  `jenisKirim` varchar(40) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tborder` */

insert into `tborder` values 
(1,1,'2021-08-23','tf','123','BCA',12332,0,0,'cod',0),
(2,2,'2021-08-23','kk','BCA','1234',10000,0,0,'cod',0),
(3,1,'2021-08-23','tf','BCA','BCA',123,0,0,'cod',0),
(4,1,'2021-08-23','tf','BCA','BCA',123,0,0,'cod',0),
(5,1,'2021-08-23','tf','BCA','1234',12332,0,0,'vaMandiri',0),
(6,1,'2021-08-23','tf','BCA','1234',12332,0,0,'vaMandiri',0),
(7,1,'2021-08-23','tf','BCA','1234',12332,0,0,'vaMandiri',0),
(8,1,'2021-08-23','tf','BCA','1234',12332,0,0,'vaMandiri',0),
(9,1,'2021-08-23','tf','BCA','1234',12332,0,0,'vaMandiri',0),
(10,1,'2021-08-23','tf','BCA','123',1233,0,0,'cod',0),
(11,1,'2021-08-23','tf','BCA','123',1233,0,0,'cod',0),
(12,1,'2021-08-23','tf','BCA','123',1233,0,0,'cod',0),
(13,1,'2021-08-23','kk','BCA','1234',1233,0,0,'cod',0),
(14,1,'2021-08-23','tf','BCA','123',1,0,0,'cod',0),
(15,1,'2021-08-24','kk','BCA','123',1233,0,0,'ovo',0);

/*Table structure for table `tborderdetail` */

DROP TABLE IF EXISTS `tborderdetail`;

CREATE TABLE `tborderdetail` (
  `idBarang` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `jml` float NOT NULL,
  `hrg` int(11) NOT NULL,
  PRIMARY KEY (`idBarang`,`idorder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tborderdetail` */

insert into `tborderdetail` values 
(1,1,2,45000),
(1,2,1,45000),
(1,3,3,45000),
(1,5,1,45000),
(1,6,1,45000),
(1,7,1,45000),
(1,8,1,45000),
(1,10,1,45000),
(1,13,1,45000),
(1,14,1,45000),
(1,15,1,45000),
(2,1,1,30000),
(2,2,1,30000),
(2,7,1,30000),
(2,8,1,30000),
(2,10,1,30000),
(2,13,1,30000),
(2,14,2,30000),
(2,15,1,30000),
(3,2,2,75000),
(3,7,1,75000),
(3,8,1,75000),
(3,10,1,75000),
(3,13,1,75000),
(3,14,1,75000),
(4,7,1,77),
(4,8,1,77),
(4,14,2,77);
