-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for gestion
CREATE DATABASE IF NOT EXISTS `gestion` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `gestion`;

-- Dumping structure for table gestion.categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `desc` char(200) DEFAULT NULL,
  `id_ad` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `id_ad` (`id_ad`),
  KEY `id_cat` (`id_cat`),
  CONSTRAINT `FK_categorie_user` FOREIGN KEY (`id_ad`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion.categorie: ~3 rows (approximately)
DELETE FROM `categorie`;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_cat`, `desc`, `id_ad`) VALUES
	(1, 'yaourt', 2),
	(2, 'electromenager', 2),
	(3, 'fruit', 2);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Dumping structure for table gestion.commande
CREATE TABLE IF NOT EXISTS `commande` (
  `ID_com` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_com` date DEFAULT NULL,
  `id_pro` int(11) unsigned DEFAULT NULL,
  `id_pan` int(11) unsigned DEFAULT NULL,
  `id_client` int(11) unsigned NOT NULL,
  `pay` int(2) unsigned NOT NULL DEFAULT 0,
  `Qte` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_com`),
  KEY `id_pro` (`id_pro`),
  KEY `id_pan` (`id_pan`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `FK_commande_panier_fixe` FOREIGN KEY (`id_pan`) REFERENCES `panier_fixe` (`ID_panier`),
  CONSTRAINT `FK_commande_produit` FOREIGN KEY (`id_pro`) REFERENCES `produit` (`ID_pro`),
  CONSTRAINT `FK_commande_user` FOREIGN KEY (`id_client`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion.commande: ~8 rows (approximately)
DELETE FROM `commande`;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` (`ID_com`, `date_com`, `id_pro`, `id_pan`, `id_client`, `pay`, `Qte`) VALUES
	(28, '2020-05-28', 2, NULL, 3, 0, 19),
	(36, '2020-05-28', 2, NULL, 3, 0, 1),
	(37, '2020-05-28', 1, NULL, 3, 0, 1),
	(38, '2020-05-28', 2, NULL, 3, 0, 19),
	(39, '2020-05-28', 4, NULL, 3, 0, 4),
	(40, '2020-05-28', 3, NULL, 3, 0, 1),
	(45, '2020-05-31', NULL, 2, 3, 0, 1),
	(51, '2020-06-05', 2, NULL, 23, 0, 1),
	(52, '2020-06-05', 41, NULL, 23, 0, 1),
	(53, '2020-06-05', NULL, 1, 23, 0, 1);
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;

-- Dumping structure for table gestion.panier_fixe
CREATE TABLE IF NOT EXISTS `panier_fixe` (
  `ID_panier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date_panier` date DEFAULT NULL,
  `id_ad` int(10) unsigned NOT NULL,
  `prix` int(10) unsigned NOT NULL,
  `nomp` char(50) NOT NULL,
  PRIMARY KEY (`ID_panier`),
  KEY `id_ad` (`id_ad`),
  CONSTRAINT `FK_panier_fixe_user` FOREIGN KEY (`id_ad`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion.panier_fixe: ~2 rows (approximately)
DELETE FROM `panier_fixe`;
/*!40000 ALTER TABLE `panier_fixe` DISABLE KEYS */;
INSERT INTO `panier_fixe` (`ID_panier`, `Date_panier`, `id_ad`, `prix`, `nomp`) VALUES
	(1, '2020-05-28', 2, 130, 'nouvelle promo'),
	(2, '2020-05-28', 2, 3000, 'black friday');
/*!40000 ALTER TABLE `panier_fixe` ENABLE KEYS */;

-- Dumping structure for table gestion.pay
CREATE TABLE IF NOT EXISTS `pay` (
  `ID_pay` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Num_cart` int(25) unsigned NOT NULL,
  `prix_T` int(25) unsigned NOT NULL,
  `Date_exp` date NOT NULL,
  `nom_cart` char(50) NOT NULL,
  `cvv` int(11) unsigned NOT NULL,
  `ID_client` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ID_pay`),
  KEY `ID_client` (`ID_client`),
  CONSTRAINT `FK_pay_user` FOREIGN KEY (`ID_client`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion.pay: ~2 rows (approximately)
DELETE FROM `pay`;
/*!40000 ALTER TABLE `pay` DISABLE KEYS */;
INSERT INTO `pay` (`ID_pay`, `Num_cart`, `prix_T`, `Date_exp`, `nom_cart`, `cvv`, `ID_client`) VALUES
	(12, 0, 7239, '2020-05-31', '', 0, 3),
	(118, 4294967295, 7109, '2020-06-02', 'yahia n3im', 123, 3),
	(119, 4294967295, 7109, '2020-06-04', 'hicham', 123, 3),
	(120, 4294967295, 154, '2020-06-05', 'hicham12boudanes', 123, 23),
	(121, 123456789, 7109, '2020-06-09', 'testhichamboudanes', 123, 3);
/*!40000 ALTER TABLE `pay` ENABLE KEYS */;

-- Dumping structure for table gestion.produit
CREATE TABLE IF NOT EXISTS `produit` (
  `ID_pro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `Qte` int(11) DEFAULT NULL,
  `id_ad` int(11) unsigned NOT NULL,
  `id_ca` int(11) unsigned NOT NULL,
  `prix` int(11) unsigned NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `visible` int(2) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID_pro`),
  KEY `FK_AJOUTE` (`id_ad`),
  KEY `id_ca` (`id_ca`),
  CONSTRAINT `FK_produit_categorie` FOREIGN KEY (`id_ca`) REFERENCES `categorie` (`id_cat`),
  CONSTRAINT `FK_produit_user` FOREIGN KEY (`id_ad`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion.produit: ~5 rows (approximately)
DELETE FROM `produit`;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` (`ID_pro`, `nom`, `Qte`, `id_ad`, `id_ca`, `prix`, `img`, `visible`) VALUES
	(1, 'activia', 123, 2, 1, 3, 'activia.jpg', 1),
	(2, 'danette', 110, 2, 1, 2, 'danette.jpg', 1),
	(3, 'tv samsung 4k', 94, 2, 2, 4000, 'tv samsung 4k.jpg', 1),
	(4, 'orange', 76, 2, 3, 7, 'orange.jpg', 1),
	(41, 'hichamboudanes ', 39, 1, 2, 22, 'centrale.jpg', 0);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

-- Dumping structure for table gestion.produitpn
CREATE TABLE IF NOT EXISTS `produitpn` (
  `id-e` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pan` int(10) unsigned NOT NULL,
  `id_pro` int(10) unsigned NOT NULL,
  `QnT` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id-e`),
  KEY `id_pan` (`id_pan`),
  KEY `id_pro` (`id_pro`),
  CONSTRAINT `FK_produitpn_panier_fixe` FOREIGN KEY (`id_pan`) REFERENCES `panier_fixe` (`ID_panier`),
  CONSTRAINT `FK_produitpn_produit` FOREIGN KEY (`id_pro`) REFERENCES `produit` (`ID_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion.produitpn: ~4 rows (approximately)
DELETE FROM `produitpn`;
/*!40000 ALTER TABLE `produitpn` DISABLE KEYS */;
INSERT INTO `produitpn` (`id-e`, `id_pan`, `id_pro`, `QnT`) VALUES
	(1, 1, 2, 20),
	(2, 1, 4, 3),
	(3, 1, 1, 10),
	(4, 2, 3, 1),
	(5, 2, 2, 20),
	(7, 1, 2, 100);
/*!40000 ALTER TABLE `produitpn` ENABLE KEYS */;

-- Dumping structure for table gestion.role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `des` char(50) NOT NULL,
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion.role: ~3 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `des`) VALUES
	(1, 'admin'),
	(2, 'gestionner'),
	(3, 'client');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table gestion.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `idrole` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  KEY `id_role` (`idrole`) USING BTREE,
  CONSTRAINT `FK_user_role` FOREIGN KEY (`idrole`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table gestion.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `email`, `pass`, `idrole`) VALUES
	(1, 'hichamboudanes', 'hicham.boudanes@gmail.com', '1234567', 1),
	(2, 'nourdine', 'nourdine@gmail.com', '123456', 2),
	(3, 'hicham', 'hicham@boudanes.com', '123456', 3),
	(23, 'hicham1', 'hicham.boudanes@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
