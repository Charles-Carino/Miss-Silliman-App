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
  `seqSpeech` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seqTalent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aveTalent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.candidates: ~10 rows (approximately)
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` (`id`, `image`, `fName`, `mName`, `lName`, `college`, `yearLevel`, `SY`, `isTop`, `number`, `seqSpeech`, `seqTalent`, `aveTalent`, `created_at`, `updated_at`) VALUES
	(1, 'public/css/images/CBA.png', 'Mikhaella', '', 'Ponce de Leon', 1, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(2, 'public/css/images/CED.png', 'Shannel', '', 'Vendiola', 2, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(3, 'public/css/images/MED.png', 'Oghogho', '', 'Ovonlen', 3, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(4, 'public/css/images/HS.png', 'Erica', '', 'Villagracia', 4, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(5, 'public/css/images/MC.png', 'Ivy', '', 'Salaum', 5, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(6, 'public/css/images/COPVA.png', 'Chanel', '', 'Pepino', 6, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(7, 'public/css/images/GRAD.png', 'Yihui', '', 'Yuan', 7, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(8, 'public/css/images/CAS.png', 'Christine', '', 'Torcino', 8, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(9, 'public/css/images/IRS.png', 'Amidala', '', 'Quisumbing', 9, '', '', '', '', NULL, NULL, NULL, NULL, NULL),
	(10, 'public/css/images/NURSING.png', 'Gabrielle', '', 'Arrojado', 10, '', '', '', '', NULL, NULL, NULL, NULL, NULL);
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.prepageants: ~101 rows (approximately)
/*!40000 ALTER TABLE `prepageants` DISABLE KEYS */;
INSERT INTO `prepageants` (`id`, `candidate`, `judge`, `SP_RS`, `Talent_Confidence`, `Talent_Mastery`, `Talent_StagePresence`, `Talent_OverallImpact`, `PSpch_Content`, `PSpch_Delivery`, `PSpch_Spontainety`, `PSpch_Defense`, `SP_Prcnt`, `Talent_Prcnt`, `PSpch_Prcnt`, `sub_total`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 0.00, 25.00, 25.00, 25.00, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-13 03:59:00'),
	(2, 2, 1, 0.00, 25.00, 24.00, 20.00, 23.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(3, 3, 1, 0.00, 20.00, 21.00, 23.00, 22.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(4, 4, 1, 0.00, 22.00, 22.00, 20.00, 20.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(5, 5, 1, 0.00, 20.00, 19.00, 23.00, 23.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(6, 6, 1, 0.00, 22.00, 20.00, 22.00, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(7, 7, 1, 0.00, 25.00, 20.00, 19.00, 18.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(8, 8, 1, 0.00, 23.00, 20.00, 24.00, 24.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(9, 9, 1, 0.00, 24.00, 24.00, 20.00, 23.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(10, 10, 1, 0.00, 25.00, 24.00, 23.00, 23.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:48:18'),
	(11, 1, 2, 0.00, 20.00, 21.00, 22.00, 23.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 10:24:24'),
	(12, 2, 2, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:09:09'),
	(13, 3, 2, 0.00, 21.00, 22.00, 23.00, 24.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 10:31:08'),
	(14, 4, 2, 0.00, 21.70, 21.70, 21.70, 21.70, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:09:09'),
	(15, 5, 2, 0.00, 19.00, 19.00, 19.00, 19.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:09:09'),
	(16, 6, 2, 0.00, 19.00, 19.00, 19.00, 19.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:09:09'),
	(17, 7, 2, 0.00, 19.00, 19.00, 19.00, 19.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:09:09'),
	(18, 8, 2, 0.00, 18.00, 18.00, 18.00, 18.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:09:09'),
	(19, 9, 2, 0.00, 22.10, 22.20, 22.30, 22.40, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:09:09'),
	(20, 10, 2, 0.00, 19.00, 18.00, 20.00, 21.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 10:31:29'),
	(21, 1, 3, 0.00, 24.01, 24.02, 24.03, 24.04, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 07:44:51'),
	(22, 2, 3, 0.00, 21.00, 21.01, 21.02, 21.03, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(23, 3, 3, 0.00, 20.00, 20.01, 20.02, 20.03, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(24, 4, 3, 0.00, 23.00, 23.01, 23.02, 23.03, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(25, 5, 3, 0.00, 19.00, 19.00, 19.00, 19.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(26, 6, 3, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(27, 7, 3, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(28, 8, 3, 0.00, 18.00, 18.00, 18.00, 18.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(29, 9, 3, 0.00, 23.00, 23.00, 23.00, 23.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(30, 10, 3, 0.00, 19.00, 18.97, 18.99, 19.01, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, '2018-08-12 05:13:57'),
	(31, 1, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 23.00, 23.00, 23.00, 23.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(32, 2, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 21.00, 21.00, 21.00, 21.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(33, 3, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 22.00, 22.00, 22.00, 22.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(34, 4, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 22.80, 22.80, 22.80, 22.80, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(35, 5, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 19.00, 19.00, 19.00, 19.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(36, 6, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(37, 7, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(38, 8, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 19.00, 19.00, 19.00, 19.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(39, 9, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 22.00, 22.00, 22.00, 22.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(40, 10, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:55'),
	(41, 1, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 19.00, 20.00, 21.00, 22.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 10:34:57'),
	(42, 2, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 25.00, 25.00, 25.00, 25.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:44'),
	(43, 3, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 25.00, 25.00, 5.00, 25.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:44'),
	(44, 4, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 25.00, 25.00, 25.00, 25.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:44'),
	(45, 5, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 25.00, 25.00, 25.00, 25.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:44'),
	(46, 6, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 25.00, 25.00, 25.00, 25.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:44'),
	(47, 7, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 25.00, 25.00, 25.00, 25.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:44'),
	(48, 8, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 25.00, 25.00, 25.00, 25.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:44'),
	(49, 9, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 25.00, 25.00, 25.00, 25.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 04:56:45'),
	(50, 10, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 18.00, 20.00, 21.00, 22.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 10:35:16'),
	(51, 1, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 23.00, 23.00, 23.00, 23.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(52, 2, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 21.00, 21.00, 21.00, 21.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(53, 3, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 21.00, 21.00, 21.00, 21.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(54, 4, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 22.00, 22.00, 22.00, 22.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(55, 5, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(56, 6, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(57, 7, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 20.00, 20.00, 20.00, 20.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(58, 8, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 19.00, 19.00, 19.00, 19.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(59, 9, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 22.80, 22.80, 22.80, 22.80, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(60, 10, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 21.00, 21.00, 21.00, 21.00, 0.00, 0.00, 0.40, 0.00, NULL, '2018-08-12 05:00:58'),
	(61, 1, 7, 92.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(62, 2, 7, 89.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(63, 3, 7, 89.33, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(64, 4, 7, 95.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(65, 5, 7, 88.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(66, 6, 7, 88.90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(67, 7, 7, 88.90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(68, 8, 7, 87.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(69, 9, 7, 91.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(70, 10, 7, 89.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, '2018-08-14 08:27:45'),
	(71, 1, 8, 0.00, 25.00, 25.00, 23.00, 23.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(72, 2, 8, 0.00, 24.00, 23.00, 22.00, 22.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(73, 3, 8, 0.00, 22.00, 22.00, 24.00, 22.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(74, 4, 8, 0.00, 23.00, 23.00, 22.00, 22.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(75, 5, 8, 0.00, 25.00, 22.00, 23.00, 22.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(76, 6, 8, 0.00, 23.00, 21.00, 21.00, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(77, 7, 8, 0.00, 21.00, 23.00, 23.00, 21.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(78, 8, 8, 0.00, 24.00, 23.00, 22.00, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(79, 9, 8, 0.00, 23.00, 25.00, 23.00, 22.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(80, 10, 8, 0.00, 24.00, 23.00, 22.00, 24.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 07:40:50', '2018-08-14 07:46:21'),
	(81, 1, 9, 0.00, 20.00, 22.00, 18.00, -9.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:38:38'),
	(82, 2, 9, 0.00, 22.00, 23.00, 16.00, 15.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:39:35'),
	(83, 3, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:18:48'),
	(84, 4, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:18:48'),
	(85, 5, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:18:48'),
	(86, 6, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:18:48'),
	(87, 7, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:18:48'),
	(88, 8, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:18:48'),
	(89, 9, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:18:48'),
	(90, 10, 9, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:18:48', '2018-08-14 08:18:48'),
	(91, 1, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(92, 2, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(93, 3, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(94, 4, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(95, 5, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(96, 6, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(97, 7, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(98, 8, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(99, 9, 10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(100, 10, 10, 0.00, 12.00, 15.00, 20.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:41:34', '2018-08-14 08:43:00'),
	(101, 1, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 8.11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(102, 2, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 7.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(103, 3, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 8.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(104, 4, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(105, 5, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(106, 6, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(107, 7, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(108, 8, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(109, 9, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(110, 10, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-08-14 08:44:10', '2018-08-14 08:48:38'),
	(111, 1, 16, 92.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(112, 2, 16, 83.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(113, 3, 16, 92.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(114, 4, 16, 90.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(115, 5, 16, 90.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(116, 6, 16, 100.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(117, 7, 16, 99.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(118, 8, 16, 95.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(119, 9, 16, 98.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10'),
	(120, 10, 16, 97.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-08-15 08:11:42', '2018-08-15 08:22:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.press_launches: ~10 rows (approximately)
/*!40000 ALTER TABLE `press_launches` DISABLE KEYS */;
INSERT INTO `press_launches` (`id`, `candidate`, `organizer`, `PL_RS`, `created_at`, `updated_at`) VALUES
	(11, 1, 16, 100, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(12, 2, 16, 99, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(13, 3, 16, 98, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(14, 4, 16, 97, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(15, 5, 16, 96, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(16, 6, 16, 95, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(17, 7, 16, 94, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(18, 8, 16, 93, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(19, 9, 16, 92, '2018-08-15 08:11:42', '2018-08-15 08:27:04'),
	(20, 10, 16, 91, '2018-08-15 08:11:42', '2018-08-15 08:27:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table misssilliman.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fName`, `mName`, `lName`, `userType`, `position`, `event`, `roles`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
	(8, 'Marianne', NULL, 'Yao', 'judge', NULL, 'Talent', NULL, 'marianne', '$2y$10$Vmm1kI/m05PQ3FrF/p9P9uPcEJ7d/0DtUamNe7PLf2wPW4/1.I2p2', '2018-08-14 07:38:50', '2018-08-14 07:38:50', 'QtxTiceiWpqXzB1E3CfjEdZTgBW10gq1SHUMqvW04S99VFOrZqlNR3WqOygT'),
	(9, 'Charles', NULL, 'Carino', 'judge', NULL, 'Talent', NULL, 'charles', '$2y$10$oxorCII/cYOirq8.bxW9Ee9Qz23n1ZB6l.xccfdQLSBpVgTFQ45G2', '2018-08-14 08:18:48', '2018-08-14 08:18:48', 'd2CAGmFJzzPZNdkZudVXukMBRkI2ZM1EZlPHhja7zkE2gAyXDNdGCKiyMsti'),
	(10, 'mari', NULL, 'cruz', 'judge', NULL, 'Talent', NULL, 'mari', '$2y$10$WgQSEO.3vn4ZrKVDP1BtOOogaUAzDqBLvWk2gpIxEdl5pxWoy6scu', '2018-08-14 08:41:34', '2018-08-14 08:41:34', 'fjssAOZY7UQ7a8ATXqB8GRolt0vn5KIPlWjWMwLMIflBpGf8ERlKYSZZqGU3'),
	(11, 'leo', NULL, 'leon', 'judge', NULL, 'Speech', NULL, 'leo', '$2y$10$6r45Opm70wmsDqFfz2o0remCelG.3j/uVQveY6FP7BiRqgLDWKdeG', '2018-08-14 08:44:10', '2018-08-14 08:44:10', 'Si7jTcCqdSjpli85nejMdtKWsQ5jUXKTIjASyvXrC7R0ZwQaNR0eREasqWtH'),
	(16, 'Charles', NULL, 'Carino', 'organizer', 'Chair', NULL, 'admin,judge', 'charlescarino4', '$2y$10$tfbBZV4sT16KS8f1kRxeYOuPFF1Az/bPF//HfxbNRhjlsMOUh/a7y', '2018-08-15 08:11:42', '2018-08-15 08:11:42', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
