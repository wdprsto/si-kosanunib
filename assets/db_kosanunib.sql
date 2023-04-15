/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.18-MariaDB : Database - db_kosanunib
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kosanunib` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_kosanunib`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp_admin` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `login_status` char(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `no_hp_admin` (`no_hp_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`admin_id`,`nama_admin`,`email`,`no_hp_admin`,`password`,`level`,`login_status`) values 
(1,'Wahyu Dwi Prasetio','adminsuper@admin.com','0713344565','8cb2237d0679ca88db6464eac60da96345513964','1','1'),
(26,'Admin Bayar','adminbayar@gmail.com','01012004012','8cb2237d0679ca88db6464eac60da96345513964','2','');

/*Table structure for table `tb_kamarkosan` */

DROP TABLE IF EXISTS `tb_kamarkosan`;

CREATE TABLE `tb_kamarkosan` (
  `kamarkosan_id_kosan` int(11) NOT NULL,
  `id_kamarkosan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kamar` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `kapasitas_total` int(3) unsigned NOT NULL,
  `biaya_kamar` int(3) unsigned NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kapasitas_terhuni` int(3) unsigned NOT NULL,
  PRIMARY KEY (`id_kamarkosan`,`kamarkosan_id_kosan`),
  KEY `hostel_room_ibfk_1` (`kamarkosan_id_kosan`),
  CONSTRAINT `tb_kamarkosan_ibfk_1` FOREIGN KEY (`kamarkosan_id_kosan`) REFERENCES `tb_kosan` (`id_kosan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11284370 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_kamarkosan` */

insert  into `tb_kamarkosan`(`kamarkosan_id_kosan`,`id_kamarkosan`,`nama_kamar`,`kapasitas_total`,`biaya_kamar`,`deskripsi`,`kapasitas_terhuni`) values 
(19,1128417,'Dep1',1,300000,'Bagus',1),
(19,1128418,'Dep2',1,300000,'',1),
(19,1128419,'Dep3',1,300000,'',1),
(19,1128420,'Dep4',1,300000,'',1),
(19,1128421,'Dep5',1,300000,'',1),
(19,1128422,'Dep6',1,300000,'',0),
(19,1128423,'Dep7',1,300000,'',0),
(19,1128424,'Dep8',1,300000,'',0),
(19,1128425,'Dep9',1,300000,'',0),
(19,1128426,'Dep10',1,300000,'',0),
(20,1128427,'A1',1,300000,'',1),
(20,1128428,'A2',1,300000,'',1),
(20,1128429,'A3',1,300000,'',1),
(20,1128430,'A4',1,300000,'',1),
(20,1128431,'A5',1,300000,'',1),
(20,1128432,'A6',1,300000,'',0),
(20,1128433,'A7',1,300000,'',0),
(20,1128434,'A8',1,300000,'',0),
(20,1128435,'A9',1,300000,'',0),
(21,1128437,'2',2,500000,'Dapur tersedia dikamar masing-masing',1),
(21,1128438,'3',2,500000,'Dapur tersedia didalam kamar',1),
(21,1128439,'4',1,500000,'Berwarna pink muda dan abu-abu',1),
(21,1128440,'5',2,500000,'Berwarna pink muda dan abu-abu',1),
(21,1128441,'6',2,500000,'Berwarna pink muda dan abu-abu',0),
(21,1128442,'7',2,500000,'Berwarna pink muda dan abu-abu',0),
(21,1128443,'8',2,500000,'Berwarna pink muda dan abu-abu',0),
(21,1128444,'9',2,500000,'Berwarna pink muda dan abu-abu',0),
(21,1128445,'10',2,500000,'Berwarna pink muda dan abu-abu',0),
(22,1128446,'G1',1,550000,'Biaya air gratis dan terdapat satu kasur',1),
(22,1128447,'G2',1,550000,'Biaya air gratis dan terdapat satu kasur',1),
(22,1128448,'G3',1,550000,'Biaya air gratis dan terdapat satu kasur',1),
(22,1128449,'G4',1,550000,'Biaya air gratis dan terdapat satu kasur',1),
(22,1128450,'G5',1,550000,'Biaya air gratis dan terdapat satu kasur',1),
(22,1128451,'G6',1,550000,'Biaya air gratis dan terdapat satu kasur',1),
(22,1128452,'G7',1,550000,'Biaya air gratis dan terdapat satu kasur',0),
(22,1128453,'G8',1,550000,'Biaya air gratis dan terdapat satu kasur',0),
(22,1128454,'G9',1,550000,'Biaya air gratis dan terdapat satu kasur',0),
(22,1128455,'G10',1,550000,'Biaya air gratis dan terdapat satu kasur',0),
(23,1128455,'1',2,375000,'',1),
(23,1128456,'2',2,375000,'',1),
(23,1128457,'3',2,375000,'',1),
(23,1128458,'4',2,375000,'',1),
(23,1128459,'5',2,375000,'',1),
(23,1128460,'6',1,300000,'',0),
(23,1128461,'7',1,300000,'',0),
(23,1128462,'8',1,300000,'',0),
(23,1128463,'9',1,300000,'',0),
(23,1128464,'10',1,300000,'',0),
(24,1128465,'Alpha',1,425000,'',1),
(24,1128466,'Beta',1,425000,'',1),
(24,1128467,'Charlie',1,425000,'',1),
(24,1128468,'Delta',1,425000,'',1),
(24,1128469,'Epsilon',1,425000,'',1),
(24,1128470,'Freya',1,425000,'',0),
(24,1128471,'Gamma',1,475000,'',0),
(24,1128472,'Hares',1,475000,'',0),
(24,1128473,'Iota',1,475000,'',0),
(24,1128474,'Mu',1,475000,'',0),
(20,11284361,'A10',1,300000,'',0),
(21,11284362,'Dep10',2,500000,'Dapur tersedia , biaya air gratis',1),
(25,11284363,'AA1',1,1000000,'Lengkap',0),
(21,11284364,'11111111',5,800000,'Berwarna pink muda dan abu-abu',0),
(21,11284365,'1',1,500000,'7',0),
(19,11284366,'Dep11',1,1,'f',0);

/*Table structure for table `tb_kosan` */

DROP TABLE IF EXISTS `tb_kosan`;

CREATE TABLE `tb_kosan` (
  `id_kosan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kosan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_kosan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `deskripsi_kosan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kosan`),
  UNIQUE KEY `name` (`nama_kosan`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_kosan` */

insert  into `tb_kosan`(`id_kosan`,`nama_kosan`,`alamat_kosan`,`deskripsi_kosan`) values 
(19,'Pondokan DEPURINA','Gang 3 Unib Belakang','Kebersihan, Kenyamanan Dan Keamanan Diutamakan. PUTRA / PUTRI'),
(20,'Pondokan Aisyah','Gang 3 JL.Panglima','Kebersihan Dan Keamanan Diutamakan. PUTRA / PUTRI'),
(21,'Pondokan siti','Gang melati ','Berwarna pink muda dan abu-abu'),
(22,'Pondokan Gite','Gang juwita kanan','Pagar besi tinggi warna hitam , terdapat halaman parkir motor'),
(23,'Kosan Amanah','Gang Juwita','AMAN,NYAMAN,LUAS'),
(24,'Kos Ong','Gang Damai','Khusus Putra'),
(25,'Kosan Abang Adek','Jalan abang adek','Kebersihan, Kenyamanan Dan Keamanan Diutamakan. PUTRA / PUTRI');

/*Table structure for table `tb_pengelola` */

DROP TABLE IF EXISTS `tb_pengelola`;

CREATE TABLE `tb_pengelola` (
  `pengelola_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengelola` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk_pengelola` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goldar` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat_pengelola` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_hp_pengelola` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login_status` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `pengelola_id_kosan` int(11) NOT NULL,
  PRIMARY KEY (`pengelola_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `no_hp_pengelola` (`no_hp_pengelola`),
  KEY `hostel_ibfk_1` (`pengelola_id_kosan`),
  CONSTRAINT `tb_pengelola_ibfk_1` FOREIGN KEY (`pengelola_id_kosan`) REFERENCES `tb_kosan` (`id_kosan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_pengelola` */

insert  into `tb_pengelola`(`pengelola_id`,`nama_pengelola`,`tgl_lahir`,`jk_pengelola`,`agama`,`goldar`,`alamat_pengelola`,`no_hp_pengelola`,`email`,`password`,`login_status`,`pengelola_id_kosan`) values 
(29,'Joko Susilo','1976-10-10','lk','Protestan','A','Gang 3 Unib Belakang ','085357767994','jokosusilo11@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','',19),
(30,'Eko Harianto','1975-10-09','lk','Islam','A','Gang 3 JL.Panglima','082374757677','ekoh11@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','',20),
(32,'Rasya ratu','0000-00-00','pr','Islam','A','Jl. s parman gang damai no.84','89650816575','rasyaratu16@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','1',21),
(33,'Sukma','0000-00-00','pr','Islam','A','Jl. manggis no 21','8957081527','sukma@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','',21),
(34,'Nurmadi Ananta','2010-09-10','lk','Islam','A','Jl.Kelapa barat no.143','81243678213','Nurmadi@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','',22),
(35,'Murfid Aqil','2002-04-22','lk','Islam','A','Jl.Aja Dulu','82182708791','murfidaqil8@gmail.com','0455de65222fcbfdf72f2d1278be855783a352af','',23),
(36,'Ervito Wijaya','2002-06-09','lk','Islam','A','Jl.Kancil 5','81234567890','ervitowijaya9@gmail.com','0455de65222fcbfdf72f2d1278be855783a352af','',24);

/*Table structure for table `tb_penghuni` */

DROP TABLE IF EXISTS `tb_penghuni`;

CREATE TABLE `tb_penghuni` (
  `penghuni_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penghuni` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jk_penghuni` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `goldar` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_asal` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp_penghuni` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ayah` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp_ortu` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `no_ktp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `login_status` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `penghuni_id_kosan` int(11) NOT NULL,
  `penghuni_id_kamarkosan` int(11) NOT NULL,
  PRIMARY KEY (`penghuni_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `no_ktp` (`no_ktp`),
  UNIQUE KEY `no_hp_penghuni` (`no_hp_penghuni`),
  UNIQUE KEY `no_hp_ortu` (`no_hp_ortu`),
  KEY `student_ibfk_2` (`penghuni_id_kamarkosan`),
  KEY `student_ibfk_3` (`penghuni_id_kosan`),
  CONSTRAINT `tb_penghuni_ibfk_1` FOREIGN KEY (`penghuni_id_kamarkosan`) REFERENCES `tb_kamarkosan` (`id_kamarkosan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_penghuni_ibfk_2` FOREIGN KEY (`penghuni_id_kosan`) REFERENCES `tb_kosan` (`id_kosan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_penghuni` */

insert  into `tb_penghuni`(`penghuni_id`,`nama_penghuni`,`tgl_lahir`,`tempat_lahir`,`jk_penghuni`,`agama`,`goldar`,`alamat_asal`,`no_hp_penghuni`,`email`,`password`,`nama_ayah`,`nama_ibu`,`no_hp_ortu`,`no_ktp`,`tgl_masuk`,`login_status`,`penghuni_id_kosan`,`penghuni_id_kamarkosan`) values 
(63,'Alfath arif rizkullah','2001-10-02','Lawang Agung','lk','Islam','A','Kab.MURATARA-SUMSEL','081271731733','alfath@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Eko Supardi','Titin Sumarni','082374740908','09180337682','2020-12-10','1',19,1128417),
(64,'Dandi Saputra','2000-10-10','Bengkulu','lk','Islam','B','Bengkulu Selatan','081271731876','dandi@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Rudi Hartono','Susi Astuti','085357788999','091803378788','2020-12-10','',19,1128418),
(65,'Ruli Harianto','1998-10-20','Lubuk Linggau','lk','Islam','A','Lubuk Linggau-SUMSEL','081271727311','ruli@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Sarif Hidayat','Lia Sarif','087677887176','09180337988','2020-12-10','',19,1128419),
(66,'Rolin Sanjaya T','1999-02-12','Lubuk Linggau','lk','Islam','A','Lubuk Linggau-SUMSEL','081271738888','rolin@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Devi S','Rita S','085357788001','09180337632','2020-12-10','0',19,1128420),
(67,'Rio Mahendra','1997-09-19','Lampung','lk','Islam','A','Lampung','085357789900','riom@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Yopi','Yuli','081532342995','091803376345','2020-12-10','0',19,1128421),
(68,'Gibran','1991-01-20','Jakarta','lk','Islam','B','Jakarta','081234340102','gibran@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Handrian Susanto','Neli Susiana','082177711733','091803376346','2020-12-11','',20,1128427),
(69,'Bintang Cahaya','1999-03-11','Kayu Agung','lk','Islam','A','Palembang-SUMSEL','081333341209','bintang@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Ali Kasan','Maryani','081334321100','091803376377','2020-12-11','',20,1128428),
(70,'Heru Andika','2000-02-14','Lawang Agung','lk','Islam','B','Kab.MURATARA-SUMSEL','081202120000','heru@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Hermanto','Yance','081234356602','0918033763092','2020-12-11','',20,1128429),
(71,'Diana Puspita','2001-04-12','Lawang Agung','pr','Islam','A','Kab. MURATARA-SUMSEL','081271731101','dianas@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Doni Seprian','Yati Suana','085357788902','0918033763121','2020-12-11','',20,1128430),
(72,'Lusiana Febrianti','1991-03-12','Lubuk Linggau','pr','Islam','A','Lubuk Linggau-SUMSEL','081321210302','lusianan@gmailcom','8cb2237d0679ca88db6464eac60da96345513964','Dodi Suandi','Yana Mai','082133210111','091803379123','2020-12-11','0',20,1128431),
(73,'Murfid Aqil','2000-01-12','Bekasi','lk','Islam','A','Jl.Hibrida no 2','81201928012','aqilimut@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Sugiato','Ani','8228490010','22029029283399','2020-12-10','',21,11284361),
(74,'Salma Putri','1999-11-01','Lahat','pr','Islam','A','Jl.Panjaitan no.23','8221123435','Salma@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Bambang','Asih','82374891221','3201435687542210','2020-12-10','',21,1128437),
(75,'Galih sati','1999-11-11','Bengkulu','lk','Islam','A','Jl.Tomang No.33','89568261234','galih12@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Jarto adin','Sakinah ','82167123278','220290277281282','2020-12-12','',21,1128438),
(76,'Fitri Ayu','2000-05-22','Jambi','pr','Islam','A','Jl.Cinangan no.12','81243144390','fitri112@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Rahmat Jardi','Tri Mirna','82256810273','32011213443433000','2020-12-10','',21,1128439),
(77,'Suci Aminah','1999-02-18','Bengkulu Utara','pr','Islam','A','Jl.Tubunu no.31','85643728192','Suci@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Dalang Kani','Atinah Mirna','82198821191','2202902416246170','2020-12-11','',21,1128440),
(78,'Syafira','2000-11-09','Bengkulu Utara','pr','Islam','A','Jalan Tanah abang no.121','8123457312','syafira00@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Budi Purnomo','Ghina Anjani','82291202839','3257192000990710','2020-12-11','',22,1128446),
(79,'Agnes Fasyah','2000-10-07','Lahat','pr','Islam','A','Jl.Semingko no.334','89689072534','agnesii@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Sujarto Malik','Yheni Sari','82153837390','320143500000120','2020-12-11','',22,1128447),
(80,'Bella Syirah','1997-09-08','Bekasi','pr','Islam','A','Jl.Muwardi no.88','896890725345','bella@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Padira Ahmad','Siti Markonah','82176483920','18292822200002','2020-12-15','',22,1128448),
(81,'Zahra Kusumah','2000-11-19','Curup','pr','Islam','A','Jl.SalmaRayo no.191','8117373829','zahra@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Hijazih Anwar','Aminah','82156829182','18292821290000','2020-12-11','',22,1128449),
(82,'Amanda Melati','1999-08-03','Curup','pr','Islam','A','Air rambai gang lurah no.221','8992728127','amanda119@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Taufik Sigrah','Lindawati','8119292891','22912920002100','2020-12-11','',22,1128450),
(83,'Parel Wiliam','2001-07-19','Jakarta','lk','Protestan','A','Jl.Beo 12','82298803126','parelkerenzz@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Anggi','Pertiwi','811223344','17712771376332200','2020-12-10','',23,1128455),
(84,'Jastin Biber','2001-08-24','NTT','lk','Katholik','A','Jl.Cihuahua 31','82221234567','jastinnaja@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Adit','Nurul','89773121281','230202327475','2021-02-14','',23,1128456),
(85,'Selena Gemez','2003-04-10','Bekasi','pr','Islam','A','Jl.Kenari 10','8229880312','selenaahhh@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Dian','Eka','87723785866','18821019287122800','2021-01-01','0',23,1128457),
(86,'Hercules','2001-09-06','Bengkulu','lk','Buddha','A','Jl.Beo 9','89812346780','kuatsehat@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Indra','Gita','83890423041','124459243422','2020-12-29','',23,1128458),
(87,'Ari Ana','2003-07-10','Jakarta','pr','Protestan','A','Jl.Sendu 5','81143225643','grandeala@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Bima','Fitri','853708311','431342321975','2021-01-07','',23,1128459),
(88,'John Mitos','2000-12-10','Kediri','lk','Islam','A','Jl.Pari 2','85369002598','aiijohn@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Wahyu','Rini','829498491','9817982919821','2021-01-02','',24,1128465),
(89,'Adele Lele','2002-02-20','Tj Perak','pr','Katholik','A','Jl.Asahan 4','87762143135','adeleah@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Dwi','Tri','8995421411','8756756421','2021-04-22','',24,1128466),
(90,'Vin Solar','2002-02-13','Depok','lk','Protestan','A','Jl.New York 2','87809938112','balapvin@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Abdul','Amel','89824134539','879856576346','2021-01-01','',24,1128467),
(91,'Sapi Derman','2002-07-17','Makassar','lk','Islam','A','Jl.Kutilang 112','811735970','sapiku@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Joni','Hani','877545485409','95865454521','2021-10-20','',24,1128468),
(92,'Bedman','2000-03-22','Tambun','lk','Buddha','A','Jl.Batu 3','858982391','sayanakal@gmail.com','8cb2237d0679ca88db6464eac60da96345513964','Agus','Julia','89821456842','756543592141','2021-06-17','',24,1128469),
(93,'Wahyu Dwi Prasetio','2001-06-29','Bengkulu','lk','Islam','A','Jalan Sesama','05384652354','siti@siti.siti.com','8cb2237d0679ca88db6464eac60da96345513964','Ayah','Ibu','010239192412412','85834295890234559','2020-12-11','1',22,1128451);

/*Table structure for table `tb_roleadmin` */

DROP TABLE IF EXISTS `tb_roleadmin`;

CREATE TABLE `tb_roleadmin` (
  `admin_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `dashboard` int(11) NOT NULL,
  `kelola_pengelola` int(11) NOT NULL,
  `kelola_penghuni` int(11) NOT NULL,
  `kelola_kosan` int(11) NOT NULL,
  `kelola_tagihan` int(11) NOT NULL,
  PRIMARY KEY (`admin_role_id`),
  KEY `tb_roleadmin_ibfk_1` (`admin_id`),
  CONSTRAINT `tb_roleadmin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_roleadmin` */

insert  into `tb_roleadmin`(`admin_role_id`,`admin_id`,`dashboard`,`kelola_pengelola`,`kelola_penghuni`,`kelola_kosan`,`kelola_tagihan`) values 
(4,1,1,1,1,1,1),
(25,26,1,0,0,0,0);

/*Table structure for table `tb_setting` */

DROP TABLE IF EXISTS `tb_setting`;

CREATE TABLE `tb_setting` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_setting` */

insert  into `tb_setting`(`settings_id`,`type`,`description`) values 
(1,'system_name','Sistem Informasi Kosan'),
(2,'system_title','Sistem Informasi KU'),
(3,'address','Jl. Sesama'),
(4,'phone','0123456789'),
(6,'currency','Rp'),
(7,'system_email','koskosanunib@gmail.com'),
(16,'skin_colour','blue');

/*Table structure for table `tb_tagihan` */

DROP TABLE IF EXISTS `tb_tagihan`;

CREATE TABLE `tb_tagihan` (
  `tagihan_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_tagihan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` date NOT NULL,
  `tagihan_id_penghuni` int(11) NOT NULL,
  `nama_tagihan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi_tagihan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jatuh_tempo` date NOT NULL,
  `status` enum('l','bl','mk') CHARACTER SET latin1 NOT NULL,
  `durasi_kos` int(3) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `tagihan_id_admin` int(11) NOT NULL,
  `tgl_berlakusd` date DEFAULT NULL,
  `nama_file` blob DEFAULT NULL,
  PRIMARY KEY (`tagihan_id`),
  UNIQUE KEY `no_tagihan` (`no_tagihan`),
  KEY `tb_tagihan_ibfk_1` (`tagihan_id_penghuni`),
  KEY `tb_tagihan_ibfk_2` (`tagihan_id_admin`),
  CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`tagihan_id_penghuni`) REFERENCES `tb_penghuni` (`penghuni_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`tagihan_id_admin`) REFERENCES `tb_admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_tagihan` */

insert  into `tb_tagihan`(`tagihan_id`,`no_tagihan`,`creation_timestamp`,`tagihan_id_penghuni`,`nama_tagihan`,`deskripsi_tagihan`,`jatuh_tempo`,`status`,`durasi_kos`,`total_tagihan`,`tgl_bayar`,`tagihan_id_admin`,`tgl_berlakusd`,`nama_file`) values 
(43,'20201210INV31496','2020-12-10',64,'PEMBAYARAN DANDI SAPUTRA DECEMBER 2020            ','','2020-12-10','l',12,3600000,'2020-12-10',1,'2021-12-10',NULL),
(44,'20201210INV44265','2020-12-10',63,'PEMBAYARAN ALFATH ARIF RIZKULLA DECEMBER 2020     ','','2021-06-10','l',6,1800000,'2020-12-10',1,'2021-12-10',NULL),
(45,'20201210INV66786','2020-12-10',65,'PEMBAYARAN RULI HARIANTO DECEMBER 2020            ','','2021-12-10','l',12,3600000,'2020-12-10',1,'2022-12-10',NULL),
(46,'20201210INV51978','2020-12-10',67,'PEMBAYARAN RIO MAHENDRA DECEMBER 2020             ','','2020-12-10','mk',12,3600000,NULL,1,NULL,'bukti_2020_12_11_084041_'),
(47,'20201210INV77856','2020-12-10',66,'PEMBAYARAN ROLIN SANJAYA T DECEMBER 2020          ','','2020-12-20','bl',6,1800000,NULL,1,NULL,NULL),
(48,'20201211INV13059','2020-12-11',69,'PEMBAYARAN BINTANG CAHAYA DECEMBER 2020           ','','2020-12-11','l',12,3600000,'2020-12-11',1,'2021-12-11',NULL),
(49,'20201211INV69487','2020-12-11',70,'PEMBAYARAN HERU ANDIKA DECEMBER 2020              ','','2020-12-11','l',24,7200000,'2020-12-11',1,'2022-12-11',NULL),
(50,'20201211INV55709','2020-12-11',68,'PEMBAYARAN GIBRAN DECEMBER 2020                   ','','2020-12-11','l',6,1800000,'2020-12-11',1,'2021-06-11',NULL),
(51,'20201211INV33541','2020-12-11',72,'PEMBAYARAN LUSIANA FEBRIANTI DECEMBER 2020        ','','2020-12-11','l',12,3600000,'2021-01-20',1,'2021-12-11','bukti_2020_12_11_081927_1.PNG'),
(52,'20201211INV49984','2020-12-11',71,'PEMBAYARAN DIANA PUSPITA DECEMBER 2020            ','','2020-12-13','bl',12,3600000,NULL,1,NULL,NULL),
(54,'20201210INV40584','2020-12-10',73,'PEMBAYARAN MURFID AQIL DECEMBER 2020              ','','2021-06-10','l',6,3000000,'2020-12-10',1,'2021-12-10',NULL),
(55,'20201210INV91898','2020-12-10',74,'PEMBAYARAN SALMA PUTRI DECEMBER 2020              ','','2021-12-20','l',12,6000000,'2020-12-10',1,'2022-12-20',NULL),
(56,'20201210INV65670','2020-12-10',75,'PEMBAYARAN GALIH SATI DECEMBER 2020               ','','2021-12-20','bl',6,3000000,NULL,1,NULL,NULL),
(57,'20201210INV41110','2020-12-10',76,'PEMBAYARAN FITRI AYU DECEMBER 2020                ','','2022-06-20','l',18,9000000,'2020-12-10',1,'2023-12-20',NULL),
(58,'20201211INV49270','2020-12-11',77,'PEMBAYARAN SUCI AMINAH DECEMBER 2020              ','','2021-06-21','l',6,3000000,'2020-12-11',1,'2021-12-21',NULL),
(59,'20201211INV68051','2020-12-11',78,'PEMBAYARAN SYAFIRA DECEMBER 2020                  ','','2021-06-21','l',6,3300000,'2020-12-11',1,'2021-12-21',NULL),
(60,'20201211INV39012','2020-12-11',79,'PEMBAYARAN AGNES FASYAH DECEMBER 2020             ','','2021-12-21','l',12,6600000,'2020-12-11',1,'2022-12-21',NULL),
(61,'20201211INV86154','2020-12-11',80,'PEMBAYARAN BELLA SYIRAH DECEMBER 2020             ','','2022-12-21','bl',24,13200000,NULL,1,NULL,NULL),
(62,'20201211INV91131','2020-12-11',81,'PEMBAYARAN ZAHRA KUSUMAH DECEMBER 2020            ','','2021-06-21','l',6,3300000,'2020-12-11',1,'2021-12-21',NULL),
(63,'20201211INV50222','2020-12-11',82,'PEMBAYARAN AMANDA MELATI DECEMBER 2020            ','','2021-12-21','l',12,6600000,'2020-12-11',1,'2022-12-21',NULL),
(64,'20201211INV56284','2020-12-11',75,'PEMBAYARAN GALIH SATI DECEMBER 2020               ','','2020-12-21','bl',24,12000000,NULL,1,NULL,NULL),
(65,'20201211INV16539','2020-12-11',68,'PEMBAYARAN GIBRAN DECEMBER 2020                   ','','2021-06-21','l',24,7200000,'2020-12-11',1,'2023-06-21',NULL),
(66,'20201211INV63595','2020-12-11',64,'PEMBAYARAN DANDI SAPUTRA DECEMBER 2020            ','','2021-12-20','l',24,7200000,'2020-12-11',1,'2023-12-20',NULL),
(67,'20210405INV38987','2021-04-05',66,'PEMBAYARAN ROLIN SANJAYA T APRIL 2021             ','','2021-04-15','bl',24,7200000,NULL,1,NULL,NULL),
(68,'20210405INV53344','2021-04-05',88,'PEMBAYARAN JOHN MITOS APRIL 2021                  ','','2021-04-15','bl',24,10200000,NULL,1,NULL,NULL),
(69,'20210405INV30735','2021-04-05',93,'PEMBAYARAN WAHYU DWI PRASETIO APRIL 2021          ','','2021-04-15','mk',6,3300000,NULL,1,NULL,'bukti_2021_04_05_191225_'),
(70,'20211123INV85057','2021-11-23',86,'PEMBAYARAN HERCULES NOVEMBER 2021                 ','','2021-12-03','bl',6,2250000,NULL,1,NULL,NULL),
(71,'20220715INV18055','2022-07-15',63,'PEMBAYARAN ALFATH ARIF RIZKULLA JULY 2022         ','','2021-12-20','mk',24,7200000,NULL,1,NULL,'bukti_2022_07_15_172250_redeem-tf.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
