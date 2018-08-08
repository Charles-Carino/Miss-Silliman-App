-- --------------------------------------------------------
-- Host:                         Localhost
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for misssilliman
CREATE DATABASE IF NOT EXISTS `misssilliman` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `misssilliman`;

-- Dumping structure for table misssilliman.candidates
CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_College` int(10) unsigned NOT NULL,
  `C_YearLevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_SY` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_isTop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_Number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_candidates_colleges` (`C_College`),
  CONSTRAINT `FK_candidates_colleges` FOREIGN KEY (`C_College`) REFERENCES `colleges` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.candidates: ~10 rows (approximately)
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` (`id`, `image`, `C_FName`, `C_MName`, `C_LName`, `C_College`, `C_YearLevel`, `C_SY`, `C_isTop`, `C_Number`, `created_at`, `updated_at`) VALUES
	(1, 'public/css/images/CBA.png', 'Mikhaella', '', 'Ponce de Leon', 1, '', '', '', '', NULL, NULL),
	(2, 'public/css/images/CED.png', 'Shannel', '', 'Vendiola', 2, '', '', '', '', NULL, NULL),
	(3, 'public/css/images/MED.png', 'Oghogho', '', 'Ovonlen', 3, '', '', '', '', NULL, NULL),
	(4, 'public/css/images/HS.png', 'Erica', '', 'Villagracia', 4, '', '', '', '', NULL, NULL),
	(5, 'public/css/images/MC.png', 'Ivy', '', 'Salaum', 5, '', '', '', '', NULL, NULL),
	(6, 'public/css/images/COPVA.png', 'Chanel', '', 'Pepino', 6, '', '', '', '', NULL, NULL),
	(7, 'public/css/images/GRAD.png', 'Yihui', '', 'Yuan', 7, '', '', '', '', NULL, NULL),
	(8, 'public/css/images/CAS.png', 'Christine', '', 'Torcino', 8, '', '', '', '', NULL, NULL),
	(9, 'public/css/images/IRS.png', 'Amidala', '', 'Quisumbing', 9, '', '', '', '', NULL, NULL),
	(10, 'public/css/images/NURSING.png', 'Gabrielle', '', 'Arrojado', 10, '', '', '', '', NULL, NULL);
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;

-- Dumping structure for table misssilliman.colleges
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collegeCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.colleges: ~10 rows (approximately)
/*!40000 ALTER TABLE `colleges` DISABLE KEYS */;
INSERT INTO `colleges` (`id`, `collegeName`, `collegeCode`, `created_at`, `updated_at`) VALUES
	(1, 'College of Business Administration', 'CBA', NULL, NULL),
	(2, 'College of Engineering and Design', 'CED', NULL, NULL),
	(3, 'Medical School', 'MS', NULL, NULL),
	(4, 'High School', 'HS', NULL, NULL),
	(5, 'College of Mass Communication', 'MassCom', NULL, NULL),
	(6, 'College of Visual and Performing Arts', 'COPVA', NULL, NULL),
	(7, 'Graduate School', 'GS', NULL, NULL),
	(8, 'College of Arts and Sciences', 'CAS', NULL, NULL),
	(9, 'Institute of Rehabilitative Sciences', 'IRS', NULL, NULL),
	(10, 'College of Nursing', 'CN', NULL, NULL);
/*!40000 ALTER TABLE `colleges` ENABLE KEYS */;

-- Dumping structure for procedure misssilliman.init_prepageant
DELIMITER //
CREATE DEFINER=`SU`@`%` PROCEDURE `init_prepageant`()
BEGIN
	DECLARE j int;
    DECLARE c int;
    
    SET j=1;
    TRUNCATE event_prepageant;
    
    #j1-3 = judges for talent
    #j4-6 = judges for speech
    #j7 = special project c/o organizer
    
    WHILE j <=12  DO
    	SET c=1;
    	IF j<=3 THEN
	    	WHILE c <= 10 DO
	        	INSERT INTO event_prepageant (candidate,judge,Talent_Prcnt) VALUES (c, j,.40);
	        	SET c = c + 1;
	        END WHILE;
        END IF;
               
        IF j>3 AND j<=6 THEN
	        WHILE c <= 10 DO
	        	INSERT INTO event_prepageant (candidate,judge,PSpch_Prcnt) VALUES (c, j,.40);
	        	SET c = c + 1;
	        END WHILE;
		END IF;
		
		IF j=7 THEN
	        WHILE c <= 10 DO
	        	INSERT INTO event_prepageant (candidate,judge,SP_Prcnt) VALUES (c, j,.20);
	        	SET c = c + 1;
	        END WHILE;
		END IF;
		
		
		SET j = j + 1;       
    END WHILE;
    
    SELECT * FROM event_prepageant;
    
END//
DELIMITER ;

-- Dumping structure for table misssilliman.judges
CREATE TABLE IF NOT EXISTS `judges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `J_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_Event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.judges: ~7 rows (approximately)
/*!40000 ALTER TABLE `judges` DISABLE KEYS */;
INSERT INTO `judges` (`id`, `J_FName`, `J_MName`, `J_LName`, `J_Event`, `username`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Judge1', '', '', 'Talent', '', '', NULL, NULL),
	(2, 'Judge2', '', '', 'Talent', '', '', NULL, NULL),
	(3, 'Judge3', '', '', 'Talent', '', '', NULL, NULL),
	(4, 'Judge4', '', '', 'Final', '', '', NULL, NULL),
	(5, 'Judge5', '', '', 'Final', '', '', NULL, NULL),
	(6, 'Judge6', '', '', 'Final', '', '', NULL, NULL),
	(7, 'Judge7', '', '', 'Speech', '', '', NULL, NULL);
/*!40000 ALTER TABLE `judges` ENABLE KEYS */;

-- Dumping structure for table misssilliman.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.migrations: ~10 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2018_08_06_000000_create_candidates_table', 1),
	(3, '2018_08_06_000000_create_colleges_table', 1),
	(4, '2018_08_06_000000_create_event_initialscore_table', 1),
	(5, '2018_08_06_000000_create_event_prepageant_table', 1),
	(6, '2018_08_06_000000_create_event_presslaunch_table', 1),
	(7, '2018_08_06_000000_create_judges_table', 1),
	(8, '2018_08_06_000000_create_organizers_table', 1),
	(9, '2018_08_06_000000_create_users_table', 1),
	(10, '2018_08_07_150250_create_prepageants_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table misssilliman.organizers
CREATE TABLE IF NOT EXISTS `organizers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `O_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_Position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_isAdmin` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.organizers: ~0 rows (approximately)
/*!40000 ALTER TABLE `organizers` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizers` ENABLE KEYS */;

-- Dumping structure for table misssilliman.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table misssilliman.prepageants
CREATE TABLE IF NOT EXISTS `prepageants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned NOT NULL,
  `judge` int(10) unsigned NOT NULL,
  `SP_RS` double(8,2) unsigned zerofill NOT NULL DEFAULT '00000.00',
  `Talent_RS` double(8,2) NOT NULL DEFAULT '0.00',
  `PSPch_RS` double(8,2) NOT NULL DEFAULT '0.00',
  `SP_Prcnt` double(8,2) NOT NULL DEFAULT '0.00',
  `Talent_Prcnt` double(8,2) NOT NULL DEFAULT '0.00',
  `PSpch_Prcnt` double(8,2) NOT NULL DEFAULT '0.00',
  `sub_total` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prepageants_candidates` (`candidate`),
  KEY `FK_prepageants_judges` (`judge`),
  CONSTRAINT `FK_prepageants_candidates` FOREIGN KEY (`candidate`) REFERENCES `candidates` (`id`),
  CONSTRAINT `FK_prepageants_judges` FOREIGN KEY (`judge`) REFERENCES `judges` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.prepageants: ~80 rows (approximately)
/*!40000 ALTER TABLE `prepageants` DISABLE KEYS */;
INSERT INTO `prepageants` (`id`, `candidate`, `judge`, `SP_RS`, `Talent_RS`, `PSPch_RS`, `SP_Prcnt`, `Talent_Prcnt`, `PSpch_Prcnt`, `sub_total`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(2, 2, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(3, 3, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(4, 4, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(5, 5, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(6, 6, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(7, 7, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(8, 8, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(9, 9, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(10, 10, 1, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(11, 1, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(12, 2, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(13, 3, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(14, 4, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(15, 5, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(16, 6, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(17, 7, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(18, 8, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(19, 9, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(20, 10, 2, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(21, 1, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(22, 2, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(23, 3, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(24, 4, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(25, 5, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(26, 6, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(27, 7, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(28, 8, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(29, 9, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(30, 10, 3, 00000.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
	(31, 1, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(32, 2, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(33, 3, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(34, 4, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(35, 5, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(36, 6, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(37, 7, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(38, 8, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(39, 9, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(40, 10, 4, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(41, 1, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(42, 2, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(43, 3, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(44, 4, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(45, 5, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(46, 6, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(47, 7, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(48, 8, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(49, 9, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(50, 10, 5, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(51, 1, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(52, 2, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(53, 3, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(54, 4, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(55, 5, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(56, 6, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(57, 7, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(58, 8, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(59, 9, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(60, 10, 6, 00000.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
	(61, 1, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(62, 2, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(63, 3, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(64, 4, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(65, 5, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(66, 6, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(67, 7, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(68, 8, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(69, 9, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(70, 10, 7, 00000.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
	(71, 1, 1, 00000.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(72, 2, 1, 00000.00, 1000.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(73, 3, 1, 00000.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(74, 4, 1, 00000.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(75, 5, 1, 00000.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(76, 6, 1, 00000.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(77, 7, 1, 00000.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(78, 8, 1, 00000.00, 10.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(79, 9, 1, 00000.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34'),
	(80, 10, 1, 00000.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 15:39:34', '2018-08-07 15:39:34');
/*!40000 ALTER TABLE `prepageants` ENABLE KEYS */;

-- Dumping structure for table misssilliman.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `U_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `U_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `U_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `U_UserType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `U_Position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `U_Event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `U_Roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
