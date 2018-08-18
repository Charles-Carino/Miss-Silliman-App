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
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college` int(10) unsigned NOT NULL,
  `yearLevel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SY` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isTop` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seqSpeech` int(11) DEFAULT NULL,
  `seqTalent` int(11) DEFAULT NULL,
  `aveTalent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.candidates: ~10 rows (approximately)
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` (`id`, `image`, `fName`, `mName`, `lName`, `college`, `yearLevel`, `SY`, `isTop`, `number`, `seqSpeech`, `seqTalent`, `aveTalent`, `created_at`, `updated_at`) VALUES
	(1, 'public/css/images/CBA.png', 'Mikhaella', '', 'Ponce de Leon', 1, '', '', '', '', 6, 1, NULL, NULL, NULL),
	(2, 'public/css/images/CED.png', 'Shannel', '', 'Vendiola', 2, '', '', '', '', 7, 2, NULL, NULL, NULL),
	(3, 'public/css/images/MED.png', 'Oghogho', '', 'Ovonlen', 3, '', '', '', '', 8, 3, NULL, NULL, NULL),
	(4, 'public/css/images/HS.png', 'Erica', '', 'Villagracia', 4, '', '', '', '', 9, 4, NULL, NULL, NULL),
	(5, 'public/css/images/MC.png', 'Ivy', '', 'Salaum', 5, '', '', '', '', 10, 5, NULL, NULL, NULL),
	(6, 'public/css/images/COPVA.png', 'Chanel', '', 'Pepino', 6, '', '', '', '', 5, 10, NULL, NULL, NULL),
	(7, 'public/css/images/GRAD.png', 'Yihui', '', 'Yuan', 7, '', '', '', '', 4, 9, NULL, NULL, NULL),
	(8, 'public/css/images/CAS.png', 'Christine', '', 'Torcino', 8, '', '', '', '', 2, 7, NULL, NULL, NULL),
	(9, 'public/css/images/IRS.png', 'Amidala', '', 'Quisumbing', 9, '', '', '', '', 3, 8, NULL, NULL, NULL),
	(10, 'public/css/images/NURSING.png', 'Gabrielle', '', 'Arrojado', 10, '', '', '', '', 1, 6, NULL, NULL, NULL);
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;

-- Dumping structure for table misssilliman.colleges
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collegeCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

-- Dumping structure for table misssilliman.initial_scores
CREATE TABLE IF NOT EXISTS `initial_scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned DEFAULT NULL,
  `judge` int(10) unsigned DEFAULT NULL,
  `IS_Production_Confidence` double(8,2) DEFAULT '0.00',
  `IS_Production_Mastery` double(8,2) DEFAULT NULL,
  `IS_Production_StagePresence` double(8,2) DEFAULT NULL,
  `IS_Production_OverallImpact` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Grace` double(8,2) DEFAULT '0.00',
  `IS_ThemeWr_Projection` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Poise` double(8,2) DEFAULT NULL,
  `IS_ThemeWr_Relevance` double(8,2) DEFAULT NULL,
  `IS_EveGown_Grace` double(8,2) DEFAULT '0.00',
  `IS_EveGown_Projection` double(8,2) DEFAULT NULL,
  `IS_EveGown_Poise` double(8,2) DEFAULT NULL,
  `IS_EveGown_Regal` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Content` double(8,2) DEFAULT '0.00',
  `IS_SeqIntrvw_Wit` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Delivery` double(8,2) DEFAULT NULL,
  `IS_SeqIntrvw_Confidence` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Content` double(8,2) DEFAULT '0.00',
  `IS_InitIntrvw_Wit` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Delivery` double(8,2) DEFAULT NULL,
  `IS_InitIntrvw_Confidence` double(8,2) DEFAULT NULL,
  `IS_Production_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_ThemeWr_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_EveGown_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_SeqIntrvw_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_InitIntrvw_Prcnt` double(8,2) DEFAULT '0.00',
  `IS_SubTotal` double(8,2) DEFAULT '0.00',
  `SQ_Content` double(8,2) DEFAULT '0.00',
  `SQ_Confidence` double(8,2) DEFAULT '0.00',
  `SQ_Wit` double(8,2) DEFAULT '0.00',
  `SQ_Content_Prcnt` double(8,2) DEFAULT '0.00',
  `SQ_Confidence_Prcnt` double(8,2) DEFAULT '0.00',
  `SQ_Wit_Prcnt` double(8,2) DEFAULT '0.00',
  `SQ_SubTotal` double(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.initial_scores: ~0 rows (approximately)
/*!40000 ALTER TABLE `initial_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `initial_scores` ENABLE KEYS */;

-- Dumping structure for procedure misssilliman.init_prepageant
DELIMITER //
CREATE DEFINER=`SU`@`%` PROCEDURE `init_prepageant`()
BEGIN
	DECLARE j int;
    DECLARE c int;
    
    SET j=1;
    TRUNCATE prepageants;
    
    #j1-3 = judges for talent
    #j4-6 = judges for speech
    #j7 = special project c/o organizer
    
    WHILE j <=12  DO
    	SET c=1;
    	IF j<=3 THEN
	    	WHILE c <= 10 DO
	        	INSERT INTO prepageants (candidate,judge,Talent_Prcnt) VALUES (c, j,.40);
	        	SET c = c + 1;
	        END WHILE;
        END IF;
               
        IF j>3 AND j<=6 THEN
	        WHILE c <= 10 DO
	        	INSERT INTO prepageants (candidate,judge,PSpch_Prcnt) VALUES (c, j,.40);
	        	SET c = c + 1;
	        END WHILE;
		END IF;
		
		IF j=7 THEN
	        WHILE c <= 10 DO
	        	INSERT INTO prepageants (candidate,judge,SP_Prcnt) VALUES (c, j,.20);
	        	SET c = c + 1;
	        END WHILE;
		END IF;
		
		
		SET j = j + 1;       
    END WHILE;
    
    SELECT * FROM prepageants;
    
END//
DELIMITER ;

-- Dumping structure for table misssilliman.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2018_08_06_000000_create_candidates_table', 1),
	(3, '2018_08_06_000000_create_colleges_table', 1),
	(4, '2018_08_06_000000_create_organizers_table', 1),
	(5, '2018_08_06_000000_create_users_table', 1),
	(7, '2018_08_08_041010_create_initial_scores_table', 1),
	(8, '2018_08_07_150250_create_prepageants_table', 1),
	(10, '2018_08_15_062236_create_press_launches_table', 2);
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
  `SP_RS` decimal(8,2) DEFAULT NULL,
  `Talent_Confidence` decimal(8,2) DEFAULT NULL,
  `Talent_Mastery` decimal(8,2) DEFAULT NULL,
  `Talent_StagePresence` decimal(8,2) DEFAULT NULL,
  `Talent_OverallImpact` decimal(8,2) DEFAULT NULL,
  `PSpch_Content` decimal(8,2) DEFAULT NULL,
  `PSpch_Delivery` decimal(8,2) DEFAULT NULL,
  `PSpch_Spontainety` decimal(8,2) DEFAULT NULL,
  `PSpch_Defense` decimal(8,2) DEFAULT NULL,
  `SP_Prcnt` decimal(8,2) DEFAULT NULL,
  `Talent_Prcnt` decimal(8,2) DEFAULT NULL,
  `PSpch_Prcnt` decimal(8,2) DEFAULT NULL,
  `sub_total` decimal(8,2) DEFAULT NULL,
  `read` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.prepageants: ~19 rows (approximately)
/*!40000 ALTER TABLE `prepageants` DISABLE KEYS */;
INSERT INTO `prepageants` (`id`, `candidate`, `judge`, `SP_RS`, `Talent_Confidence`, `Talent_Mastery`, `Talent_StagePresence`, `Talent_OverallImpact`, `PSpch_Content`, `PSpch_Delivery`, `PSpch_Spontainety`, `PSpch_Defense`, `SP_Prcnt`, `Talent_Prcnt`, `PSpch_Prcnt`, `sub_total`, `read`, `created_at`, `updated_at`) VALUES
	(1, 1, 19, NULL, 23.00, 20.00, 18.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:59:29'),
	(2, 2, 19, NULL, 25.00, 23.00, 20.00, 16.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(3, 3, 19, NULL, 20.00, 23.00, 25.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(4, 4, 19, NULL, 25.00, 20.00, 17.00, 18.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(5, 5, 19, NULL, 20.00, 19.00, 17.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(6, 6, 19, NULL, 25.00, 23.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(7, 7, 19, NULL, 18.00, 22.00, 20.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(8, 8, 19, NULL, 18.00, 22.00, 21.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(9, 9, 19, NULL, 25.00, 22.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(10, 10, 19, NULL, 22.00, 20.00, 18.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:13', '2018-08-15 09:58:35'),
	(11, 1, 20, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 12.00, 13.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(12, 2, 20, NULL, NULL, NULL, NULL, NULL, 15.00, 23.00, 25.00, 19.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(13, 3, 20, NULL, NULL, NULL, NULL, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(14, 4, 20, NULL, NULL, NULL, NULL, NULL, 12.00, 23.00, 7.00, 8.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(15, 5, 20, NULL, NULL, NULL, NULL, NULL, 23.00, 1.00, 17.00, 5.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(16, 6, 20, NULL, NULL, NULL, NULL, NULL, 10.00, 19.00, 7.00, 16.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(17, 7, 20, NULL, NULL, NULL, NULL, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(18, 8, 20, NULL, NULL, NULL, NULL, NULL, 20.00, 10.00, 13.00, 8.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(19, 9, 20, NULL, NULL, NULL, NULL, NULL, 18.00, 13.00, 2.00, 19.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(20, 10, 20, NULL, NULL, NULL, NULL, NULL, 25.00, 10.00, 1.00, 8.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:27:28', '2018-08-15 09:58:31'),
	(21, 1, 21, NULL, 25.00, 24.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(22, 2, 21, NULL, 25.00, 24.00, 23.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(23, 3, 21, NULL, 22.00, 23.00, 24.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(24, 4, 21, NULL, 22.00, 23.00, 24.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(25, 5, 21, NULL, 25.00, 25.00, 24.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(26, 6, 21, NULL, 25.00, 25.00, 24.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(27, 7, 21, NULL, 25.00, 25.00, 24.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(28, 8, 21, NULL, 25.00, 25.00, 24.00, 24.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(29, 9, 21, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(30, 10, 21, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-15 09:28:18', '2018-08-16 16:05:46'),
	(31, 1, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(32, 2, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(33, 3, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(34, 4, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(35, 5, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(36, 6, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(37, 7, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(38, 8, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(39, 9, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(40, 10, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:28:21', '2018-08-15 09:28:21'),
	(41, 1, 23, NULL, NULL, NULL, NULL, NULL, 20.00, 18.00, 22.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(42, 2, 23, NULL, NULL, NULL, NULL, NULL, 18.00, 20.00, 20.00, 22.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(43, 3, 23, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(44, 4, 23, NULL, NULL, NULL, NULL, NULL, 22.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(45, 5, 23, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(46, 6, 23, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(47, 7, 23, NULL, NULL, NULL, NULL, NULL, 23.00, 18.00, 20.00, 23.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(48, 8, 23, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 18.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(49, 9, 23, NULL, NULL, NULL, NULL, NULL, 20.00, 21.00, 19.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(50, 10, 23, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:30:07', '2018-08-15 09:59:25'),
	(51, 1, 24, NULL, 23.00, 22.00, 23.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(52, 2, 24, NULL, 22.00, 18.00, 19.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(53, 3, 24, NULL, 23.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(54, 4, 24, NULL, 18.00, 19.00, 22.00, 19.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(55, 5, 24, NULL, 23.00, 21.00, 19.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(56, 6, 24, NULL, 23.00, 19.00, 19.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(57, 7, 24, NULL, 23.00, 19.00, 20.00, 21.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(58, 8, 24, NULL, 22.00, 22.00, 22.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(59, 9, 24, NULL, 25.00, 24.00, 24.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(60, 10, 24, NULL, 21.00, 23.00, 24.00, 22.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:20', '2018-08-15 09:58:36'),
	(61, 1, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(62, 2, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(63, 3, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(64, 4, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(65, 5, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(66, 6, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(67, 7, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(68, 8, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(69, 9, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(70, 10, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:31:53', '2018-08-15 09:31:53'),
	(71, 1, 26, NULL, NULL, NULL, NULL, NULL, 25.00, 25.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(72, 2, 26, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(73, 3, 26, NULL, NULL, NULL, NULL, NULL, 21.00, 20.00, 25.00, 25.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(74, 4, 26, NULL, NULL, NULL, NULL, NULL, 20.00, 18.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(75, 5, 26, NULL, NULL, NULL, NULL, NULL, 15.00, 20.00, 20.00, 15.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(76, 6, 26, NULL, NULL, NULL, NULL, NULL, 25.00, 25.00, 20.00, 25.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(77, 7, 26, NULL, NULL, NULL, NULL, NULL, 25.00, 20.00, 20.00, 25.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(78, 8, 26, NULL, NULL, NULL, NULL, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(79, 9, 26, NULL, NULL, NULL, NULL, NULL, 25.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(80, 10, 26, NULL, NULL, NULL, NULL, NULL, 25.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, '2018-08-15 09:33:31', '2018-08-15 09:58:54'),
	(81, 1, 27, NULL, 4.00, 4.00, 4.00, 4.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(82, 2, 27, NULL, 4.00, 23.00, 4.00, 4.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(83, 3, 27, NULL, 4.00, 4.00, 4.00, 4.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(84, 4, 27, NULL, 5.00, 5.00, 5.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(85, 5, 27, NULL, 4.00, 4.00, 4.00, 4.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(86, 6, 27, NULL, 23.00, 24.00, 22.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(87, 7, 27, NULL, 23.00, 22.00, 21.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(88, 8, 27, NULL, 20.00, 20.00, 20.00, 20.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(89, 9, 27, NULL, 23.00, 23.00, 23.00, 23.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35'),
	(90, 10, 27, NULL, 10.00, 10.00, 10.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'readonly', '2018-08-16 17:20:36', '2018-08-17 08:56:35');
/*!40000 ALTER TABLE `prepageants` ENABLE KEYS */;

-- Dumping structure for table misssilliman.press_launches
CREATE TABLE IF NOT EXISTS `press_launches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `candidate` int(10) unsigned NOT NULL,
  `organizer` int(10) unsigned NOT NULL,
  `PL_RS` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.press_launches: ~30 rows (approximately)
/*!40000 ALTER TABLE `press_launches` DISABLE KEYS */;
INSERT INTO `press_launches` (`id`, `candidate`, `organizer`, `PL_RS`, `created_at`, `updated_at`) VALUES
	(11, 1, 16, 100, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(12, 2, 16, 99, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(13, 3, 16, 98, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(14, 4, 16, 97, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(15, 5, 16, 96, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(16, 6, 16, 95, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(17, 7, 16, 94, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(18, 8, 16, 93, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(19, 9, 16, 92, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(20, 10, 16, 91, '2018-08-15 08:11:42', '2018-08-15 09:37:15'),
	(21, 1, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(22, 2, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(23, 3, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(24, 4, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(25, 5, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(26, 6, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(27, 7, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(28, 8, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(29, 9, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(30, 10, 17, NULL, '2018-08-15 09:21:41', '2018-08-15 09:21:41'),
	(31, 1, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(32, 2, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(33, 3, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(34, 4, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(35, 5, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(36, 6, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(37, 7, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(38, 8, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(39, 9, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58'),
	(40, 10, 18, NULL, '2018-08-15 09:22:58', '2018-08-15 09:22:58');
/*!40000 ALTER TABLE `press_launches` ENABLE KEYS */;

-- Dumping structure for table misssilliman.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.users: ~11 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fName`, `mName`, `lName`, `userType`, `position`, `event`, `roles`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
	(16, 'Charles', NULL, 'Carino', 'organizer', 'Chair', NULL, 'admin', 'charlescarino4', '$2y$10$tfbBZV4sT16KS8f1kRxeYOuPFF1Az/bPF//HfxbNRhjlsMOUh/a7y', '2018-08-15 08:11:42', '2018-08-15 08:11:42', '3EWrW8EMLK375U1cdYuGUYUcBgiveHVMNjAPVSMNcFmoytVATJ3nW4dSDJV2'),
	(17, 'Ginno', NULL, 'Bacang', 'organizer', 'Committee Head', NULL, 'admin,judge', 'Babygirl123', '$2y$10$aKR4tV0MHkKHh1Q/528ate9MO5NsDGzu6thrOpb7SzM3x/gLjDvKe', '2018-08-15 09:21:41', '2018-08-15 09:21:41', '7SswW2br6wC98e7GIQKjehucXAA5PWJoDNMXvTg6oxebt1H1FyxB7xAM8hFJ'),
	(18, 'Jovelyn', NULL, 'Teramoto', 'organizer', 'Others', NULL, 'admin,judge', 'Pabibo123', '$2y$10$SSA5Z9RyhY3k7NV5EK6Fl.stsJ.wOfwlMn06O.tYHsg4gSpHFTUAq', '2018-08-15 09:22:58', '2018-08-15 09:22:58', 'nwmTPBNNTjSSaa0gsceHOTNgGLKh8ZzfND1oA7B8YTJrdVXxAINbmsVajupO'),
	(19, 'Julia', NULL, 'Baretto', 'judge', NULL, 'Talent', 'judge', 'JuliaB', '$2y$10$Hwd3UN27JJjV29N.53X41e0cWazMR/PMkQE7pfClkG1zqc641pRve', '2018-08-15 09:27:13', '2018-08-15 09:27:13', NULL),
	(20, 'Rudy', NULL, 'Duterte', 'judge', NULL, 'Speech', NULL, 'Rudyboi', '$2y$10$ESQkm1FRg49uhsN0ktCph.FNgEJvXbO0toypMVWVO0JNVpqgmn.N6', '2018-08-15 09:27:28', '2018-08-15 09:27:28', 'u3uxBnlNmonJi5rlYcYdkuVi6Ftz1Nt3QmckL2KNhyHOctVbY9JwywrkxOKM'),
	(21, 'Dana', NULL, 'Chua', 'judge', NULL, 'Talent', 'judge', 'Dana123', '$2y$10$OWTHdmgvEBiEvHApTds.huRXwdEyDNxcIgGZopB7TrCk9KRmnx7ES', '2018-08-15 09:28:18', '2018-08-15 09:28:18', 'Sz23Tfqf29MTOuklcEkiDRAFBDW8VTttvglW4LZ626ZmEq9mByACMQPgk2UV'),
	(22, 'Joshua', NULL, 'Garcia', 'judge', NULL, 'Talent', 'judge', 'JoshuaG', '$2y$10$FAJDFYvonVfGccvyTYXSxuJ8H1OHLm.UNpqwpGSDe8YR0ls.pOqHi', '2018-08-15 09:28:21', '2018-08-15 09:28:21', NULL),
	(23, 'Chloe', NULL, 'Moretz', 'judge', NULL, 'Speech', NULL, 'ChloeM', '$2y$10$xgnrTz0ux3NXcIKqGFx1CekBGl1LCj9DccZksI0F5rgW8qHeX1IXi', '2018-08-15 09:30:07', '2018-08-15 09:30:07', NULL),
	(24, 'Jun', NULL, 'Fortun', 'judge', NULL, 'Talent', NULL, 'Veryfortunate', '$2y$10$QD0kEl8Fh2b2a4VrLHEhFu3E8VsehBY2fCb8Fb80hCQ0zVxVNU.JO', '2018-08-15 09:31:20', '2018-08-15 09:31:20', NULL),
	(25, 'Bernard', NULL, 'Tolip', 'judge', NULL, 'Speech', NULL, 'Bernard123', '$2y$10$ttlCC2z1EqH85fpd5k.8KexX/WXU8CTTWibHT./A7mCW9RPVE9Bva', '2018-08-15 09:31:53', '2018-08-15 09:31:53', NULL),
	(26, 'Cardo', NULL, 'Dalisay', 'judge', NULL, 'Speech', NULL, 'Angprobinsyano', '$2y$10$6RTw2LYQKgG6VRhwD9rszOsshhLrMovB0SdldJfkSgrDzJdFFFtsG', '2018-08-15 09:33:31', '2018-08-15 09:33:31', NULL),
	(27, 'Lorem', NULL, 'Ipsum', 'judge', NULL, 'Talent', NULL, 'lorem', '$2y$10$bOSAY.zeW8.zA58do9Qlg.U0mJ.2Mj5Uu8JvTxEuT9aB5Of32i142', '2018-08-16 17:20:36', '2018-08-16 17:20:36', 'VO4OVtFgal365eXJmbgErSrmDvcXi8I9VyAFgyyx2YeI8Prq2eVQIYJhRLOY');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
