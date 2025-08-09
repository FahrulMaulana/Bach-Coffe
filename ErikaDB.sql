/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ErikaDB
-- ------------------------------------------------------
-- Server version	11.8.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'2025_01_10_164608_create_all_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_admin` (
  `id_admin` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `tbl_admin_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tbl_admin` VALUES
(123,'admin','$2y$12$W1rIjcO7x4GLc0skefduculE7.4tPmU/uJS1VNj.yIaJk33wimo4e','Erika',NULL,NULL);
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_detail_transaksi`
--

DROP TABLE IF EXISTS `tbl_detail_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_detail_transaksi` (
  `id_detail_transaksi` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_transaksi` bigint(20) unsigned NOT NULL,
  `id_produk` bigint(20) unsigned NOT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `subtotal` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_transaksi`),
  KEY `tbl_detail_transaksi_tbl_transaksi_FK` (`id_transaksi`),
  KEY `tbl_detail_transaksi_tbl_produk_FK` (`id_produk`),
  CONSTRAINT `tbl_detail_transaksi_tbl_produk_FK` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`),
  CONSTRAINT `tbl_detail_transaksi_tbl_transaksi_FK` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_detail_transaksi`
--

LOCK TABLES `tbl_detail_transaksi` WRITE;
/*!40000 ALTER TABLE `tbl_detail_transaksi` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tbl_detail_transaksi` VALUES
(15,15,1,6,10000,60000,'2025-02-03 23:49:18','2025-02-03 23:49:18'),
(16,15,2,6,15000,90000,'2025-02-03 23:49:18','2025-02-03 23:49:18'),
(17,16,1,5,10000,50000,'2025-02-04 20:47:58','2025-02-04 20:47:58'),
(18,17,1,2,10000,20000,'2025-02-04 21:06:03','2025-02-04 21:06:03'),
(19,18,1,10,10000,100000,'2025-02-04 21:07:35','2025-02-04 21:07:35'),
(20,18,2,10,15000,150000,'2025-02-04 21:07:35','2025-02-04 21:07:35'),
(21,19,2,5,15000,75000,'2025-02-04 21:12:03','2025-02-04 21:12:03'),
(22,20,1,1,10000,10000,'2025-02-04 21:12:54','2025-02-04 21:12:54'),
(23,21,1,1,10000,10000,'2025-02-04 21:14:15','2025-02-04 21:14:15'),
(24,22,2,1,15000,15000,'2025-02-04 21:16:58','2025-02-04 21:16:58'),
(25,23,1,3,10000,30000,'2025-02-04 21:18:41','2025-02-04 21:18:41'),
(26,24,1,2,10000,20000,'2025-02-04 21:22:05','2025-02-04 21:22:05'),
(27,25,1,5,10000,50000,'2025-07-28 08:05:48','2025-07-28 08:05:48'),
(28,26,2,6,15000,90000,'2025-07-28 08:07:03','2025-07-28 08:07:03'),
(29,27,5,3,20000,60000,'2025-08-07 23:15:02','2025-08-07 23:15:02');
/*!40000 ALTER TABLE `tbl_detail_transaksi` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_histori_transaksi`
--

DROP TABLE IF EXISTS `tbl_histori_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_histori_transaksi` (
  `id_histori` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_member` bigint(20) unsigned NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_transaksi` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_histori`),
  KEY `tbl_histori_transaksi_id_member_foreign` (`id_member`),
  KEY `tbl_histori_transaksi_tbl_transaksi_FK` (`id_transaksi`),
  CONSTRAINT `tbl_histori_transaksi_id_member_foreign` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id_member`) ON DELETE CASCADE,
  CONSTRAINT `tbl_histori_transaksi_tbl_transaksi_FK` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_histori_transaksi`
--

LOCK TABLES `tbl_histori_transaksi` WRITE;
/*!40000 ALTER TABLE `tbl_histori_transaksi` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `tbl_histori_transaksi` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_member` (
  `id_member` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_hp` varchar(15) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total_poin` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `tbl_member_nomor_hp_unique` (`nomor_hp`),
  UNIQUE KEY `tbl_member_email_unique` (`email`),
  UNIQUE KEY `tbl_member_unique` (`id_user`),
  CONSTRAINT `tbl_member_tbl_user_FK` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_member`
--

LOCK TABLES `tbl_member` WRITE;
/*!40000 ALTER TABLE `tbl_member` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tbl_member` VALUES
(10,'081212154012','CAKIL aja','cakil@gmail.com',300,'2025-02-02 22:17:18','2025-02-04 21:14:15',3),
(15,'0812121540432','Erika','test@example.com',2400,'2025-02-03 20:46:50','2025-02-04 21:16:58',9),
(17,'088223811208','testing','cakil12@gmail.com',10000,'2025-07-28 07:53:48','2025-07-28 08:12:17',16),
(19,'081212154029','cakil','fahruluyah12@gmail.com',10000,'2025-08-07 20:59:03','2025-08-08 00:03:46',18);
/*!40000 ALTER TABLE `tbl_member` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_notifikasi`
--

DROP TABLE IF EXISTS `tbl_notifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_notifikasi` (
  `id_notifikasi` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_member` bigint(20) unsigned NOT NULL,
  `pesan_notifikasi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_notifikasi`),
  KEY `tbl_notifikasi_id_member_foreign` (`id_member`),
  CONSTRAINT `tbl_notifikasi_id_member_foreign` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id_member`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_notifikasi`
--

LOCK TABLES `tbl_notifikasi` WRITE;
/*!40000 ALTER TABLE `tbl_notifikasi` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `tbl_notifikasi` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_produk`
--

DROP TABLE IF EXISTS `tbl_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_produk` (
  `id_produk` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` double NOT NULL,
  `promo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produk`
--

LOCK TABLES `tbl_produk` WRITE;
/*!40000 ALTER TABLE `tbl_produk` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tbl_produk` VALUES
(1,'Kopi',10000,'0','2025-01-12 01:52:31','2025-08-07 23:30:26','1754634626_kopi.jpeg'),
(2,'Jagung Bakar',15000,'0','2025-01-12 01:57:46','2025-08-07 23:31:13','1754634673_jagung.jpeg'),
(5,'Cappucino',20000,'0','2025-02-05 13:00:28','2025-02-05 13:00:28','1738785628_anubhav-arora-RFLDagtOsMM-unsplash.jpg');
/*!40000 ALTER TABLE `tbl_produk` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_reset_password`
--

DROP TABLE IF EXISTS `tbl_reset_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_reset_password` (
  `id_reset` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_hp` varchar(15) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `tanggal_expired` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_reset`),
  KEY `tbl_reset_password_nomor_hp_foreign` (`nomor_hp`),
  CONSTRAINT `tbl_reset_password_nomor_hp_foreign` FOREIGN KEY (`nomor_hp`) REFERENCES `tbl_member` (`nomor_hp`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reset_password`
--

LOCK TABLES `tbl_reset_password` WRITE;
/*!40000 ALTER TABLE `tbl_reset_password` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `tbl_reset_password` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_role` (
  `id_level` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_level`),
  UNIQUE KEY `tbl_role_unique` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_role`
--

LOCK TABLES `tbl_role` WRITE;
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tbl_role` VALUES
(1,'ADMIN'),
(3,'CUSTOMER'),
(2,'KASIR');
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_transaksi`
--

DROP TABLE IF EXISTS `tbl_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_transaksi` (
  `id_transaksi` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_member` bigint(20) unsigned DEFAULT NULL,
  `id_user` bigint(20) unsigned NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_harga` double NOT NULL,
  `poin_didapat` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_member` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `tbl_transaksi_id_member_foreign` (`id_member`),
  KEY `tbl_transaksi_tbl_user_FK` (`id_user`),
  CONSTRAINT `tbl_transaksi_id_member_foreign` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id_member`) ON DELETE CASCADE,
  CONSTRAINT `tbl_transaksi_tbl_user_FK` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaksi`
--

LOCK TABLES `tbl_transaksi` WRITE;
/*!40000 ALTER TABLE `tbl_transaksi` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tbl_transaksi` VALUES
(15,15,8,'2025-02-03 23:49:18',150000,1500,'2025-02-03 23:49:18','2025-02-03 23:49:18',1),
(16,NULL,8,'2025-02-04 20:47:58',50000,500,'2025-02-04 20:47:58','2025-02-04 20:47:58',0),
(17,10,8,'2025-02-04 21:06:03',20000,200,'2025-02-04 21:06:03','2025-02-04 21:06:03',1),
(18,NULL,8,'2025-02-04 21:07:35',250000,2500,'2025-02-04 21:07:35','2025-02-04 21:07:35',0),
(19,15,8,'2025-02-04 21:12:03',75000,750,'2025-02-04 21:12:03','2025-02-04 21:12:03',1),
(20,NULL,8,'2025-02-04 21:12:54',10000,100,'2025-02-04 21:12:54','2025-02-04 21:12:54',0),
(21,10,8,'2025-02-04 21:14:15',10000,100,'2025-02-04 21:14:15','2025-02-04 21:14:15',1),
(22,15,8,'2025-02-04 21:16:58',15000,150,'2025-02-04 21:16:58','2025-02-04 21:16:58',1),
(23,NULL,8,'2025-02-04 21:18:41',30000,300,'2025-02-04 21:18:41','2025-02-04 21:18:41',0),
(24,NULL,8,'2025-02-04 21:22:05',20000,200,'2025-02-04 21:22:05','2025-02-04 21:22:05',0),
(25,17,8,'2025-07-28 08:05:48',50000,500,'2025-07-28 08:05:48','2025-07-28 08:05:48',1),
(26,17,8,'2025-07-28 08:07:03',90000,900,'2025-07-28 08:07:03','2025-07-28 08:07:03',1),
(27,NULL,16,'2025-08-07 23:15:02',60000,600,'2025-08-07 23:15:02','2025-08-07 23:15:02',0);
/*!40000 ALTER TABLE `tbl_transaksi` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id_user` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `id_level` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `tbl_user_unique` (`username`),
  KEY `tbl_user_tbl_role_FK` (`id_level`),
  CONSTRAINT `tbl_user_tbl_role_FK` FOREIGN KEY (`id_level`) REFERENCES `tbl_role` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tbl_user` VALUES
(2,'kasir','$2y$12$..gc.IHf0Mh1LBAvIbLEWOhrX7neclFB/t34H1Q5807e0MFRDQgDy','Erika',2,'2025-02-02 21:49:44','2025-02-02 21:49:44'),
(3,'cakil@gmail.com','$2y$12$jBjnt/oZxx1giq7TLuc2ruHpUIrQ3GoaE08zi4PqJrC5V0Q9iBSjm','CAKIL',3,'2025-02-02 22:17:18','2025-02-02 22:17:18'),
(8,'admin','$2y$12$5QGdtNtydzCyZGxuYUya4egFcVI6IUy4BXwq7swAM1uiRJ2T.vriS','Jebel',1,'2025-02-02 21:49:44','2025-02-02 21:49:44'),
(9,'test@example.com','$2y$12$mJnduiC7u79jSUVf140VfutdIGWfoczO.tyxwyf/ylCnnSbH7b4Qq','Erika2',3,'2025-02-03 20:46:50','2025-02-03 20:46:50'),
(10,'kasir2','$2y$12$4k6tTNdJ8WLXGHLoKi3fUu9zKhNSHlOa6ldLguuqromA0fbZPDM5W','jamal',2,'2025-02-05 13:13:50','2025-02-05 13:13:50'),
(11,'kasir3','$2y$12$EFgRNocgi5/sFcaZepNMbeR7yV9r5LZtiwjyq9x9ZgkN3FBvWdOxO','Ahmad',2,'2025-02-05 13:14:15','2025-02-05 13:14:15'),
(12,'kasir4','$2y$12$icnWvavRwnDXvbhNDz0ymOB5/4qbwJHmqko4qiN6wDSjnoQJoyGiu','Jebel',2,'2025-02-05 13:14:42','2025-02-05 13:14:42'),
(13,'customer','$2y$12$6YqN8L3TwM7OY2wYAL6lUOiOHMXL9l.SlPdc1HFoeeFXwLEHWAWxi','Erika',3,'2025-02-13 17:23:16','2025-02-13 17:23:16'),
(14,'cakil','$2y$12$RJoBixdp7fXolxOtZJv79.heyc0ejUbTW8CY6LyqwVtz3rsaMQrYC','testing',3,'2025-07-28 07:53:20','2025-07-28 07:53:20'),
(16,'cakil12','$2y$12$5QGdtNtydzCyZGxuYUya4egFcVI6IUy4BXwq7swAM1uiRJ2T.vriS','testing12',1,'2025-07-28 07:53:48','2025-07-28 07:53:48'),
(18,'cakil123','$2y$12$RJoBixdp7fXolxOtZJv79.heyc0ejUbTW8CY6LyqwVtz3rsaMQrYC','cakil',3,'2025-08-07 20:59:03','2025-08-07 20:59:03');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `tbl_voucher`
--

DROP TABLE IF EXISTS `tbl_voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_voucher` (
  `id_voucher` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_member` bigint(20) unsigned NOT NULL,
  `kode_voucher` varchar(50) NOT NULL,
  `poin_terpakai` int(11) NOT NULL,
  `status_voucher` varchar(50) DEFAULT NULL,
  `tanggal_klaim` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_voucher`),
  UNIQUE KEY `tbl_voucher_kode_voucher_unique` (`kode_voucher`),
  KEY `tbl_voucher_id_member_foreign` (`id_member`),
  CONSTRAINT `tbl_voucher_id_member_foreign` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id_member`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_voucher`
--

LOCK TABLES `tbl_voucher` WRITE;
/*!40000 ALTER TABLE `tbl_voucher` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `tbl_voucher` VALUES
(1,17,'VCR931',10000,'Terverifikasi','2025-07-28 08:11:41','2025-07-28 08:11:41','2025-07-28 08:12:01'),
(2,17,'VCR791',10000,'Ditolak','2025-07-28 08:12:11','2025-07-28 08:12:11','2025-07-28 08:12:17'),
(3,19,'VCR745',10000,'Terverifikasi','2025-08-08 00:03:46','2025-08-08 00:03:46','2025-08-08 00:04:54');
/*!40000 ALTER TABLE `tbl_voucher` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-08-09 10:02:52
