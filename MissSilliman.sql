-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2018 at 08:43 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MissSilliman`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `Cand_ID` int(10) UNSIGNED NOT NULL,
  `C_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_College` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_YearLevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_SY` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_isTop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `C_Number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`Cand_ID`, `C_FName`, `C_MName`, `C_LName`, `C_College`, `C_YearLevel`, `C_SY`, `C_isTop`, `C_Number`, `created_at`, `updated_at`) VALUES
(1, 'MIKHAELLA', '', 'PONCE DE LEON', '1', '', '2018-2019', '', '', NULL, NULL),
(2, 'CHRISTINE', '', 'TORCINO', '2', '', '2018-2019', '', '', NULL, NULL),
(3, 'OGHOGHO', '', 'OVONLEN', '3', '', '2018-2019', '', '', NULL, NULL),
(4, 'ERICA', '', 'VILLAGRACIA', '4', '', '2018-2019', '', '', NULL, NULL),
(5, 'SHANNEL', '', 'VENDIOLA', '5', '', '2018-2019', '', '', NULL, NULL),
(6, 'IVY', '', 'SALAUM', '6', '', '2018-2019', '', '', NULL, NULL),
(7, 'CHANEL', '', 'PEPINO', '7', '', '2018-2019', '', '', NULL, NULL),
(8, 'YIHUI', '', 'YUAN', '8', '', '2018-2019', '', '', NULL, NULL),
(9, 'AMIDALA', '', 'QUISUMBING', '9', '', '2018-2019', '', '', NULL, NULL),
(10, 'GABRIELLE', '', 'ARROJADO', '10', '', '2018-2019', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `Col_ID` int(10) UNSIGNED NOT NULL,
  `Col_Code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Col_Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`Col_ID`, `Col_Code`, `Col_Name`, `created_at`, `updated_at`) VALUES
(1, 'CBA', 'COLLEGE OF BUSINESS ADMINISTRATION', NULL, NULL),
(2, 'CAS', 'COLLEGE OF ARTS AND SCIENCES', NULL, NULL),
(3, 'MedSchool', 'SILLIMAN UNIVERSITY MEDICAL SCHOOL', NULL, NULL),
(4, 'HS', 'SILLIMAN UNIVERSITY HIGH SCHOOL', NULL, NULL),
(5, 'CED', 'COLLEGE OF ENGINEERING AND DESIGN', NULL, NULL),
(6, 'MASSCOMM', 'COLLEGE OF MASS COMMUNICATION', NULL, NULL),
(7, 'COPVA', 'COLLEGE OF PERFORMING AND VISUAL ARTS', NULL, NULL),
(8, 'GRADSCHOOL', 'SILLIMAN UNIVERSITY GRADUATE STUDIES', NULL, NULL),
(9, 'IRS', 'INSTITUTE OF REHABILITATIVE SCIENCES', NULL, NULL),
(10, 'NURSING', 'COLLEGE OF NURSING', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_initialscore`
--

CREATE TABLE `event_initialscore` (
  `F_ID` int(10) UNSIGNED NOT NULL,
  `Cand_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IS_Production_RS` double(8,2) NOT NULL,
  `IS_ThemeWr_RS` double(8,2) NOT NULL,
  `IS_EveGown_RS` double(8,2) NOT NULL,
  `IS_SeqIntrvw_RS` double(8,2) NOT NULL,
  `IS_InitIntrvw_RS` double(8,2) NOT NULL,
  `IS_Production_Prcnt` double(8,2) NOT NULL,
  `IS_ThemeWr_Prcnt` double(8,2) NOT NULL,
  `IS_EveGown_Prcnt` double(8,2) NOT NULL,
  `IS_SeqIntrvw_Prcnt` double(8,2) NOT NULL,
  `IS_InitIntrvw_Prcnt` double(8,2) NOT NULL,
  `IS_SubTotal` double(8,2) NOT NULL,
  `SQ_Content_RS` double(8,2) NOT NULL,
  `SQ_Confidence_RS` double(8,2) NOT NULL,
  `SQ_Wit_RS` double(8,2) NOT NULL,
  `SQ_Content_Prcnt` double(8,2) NOT NULL,
  `SQ_Confidence_Prcnt` double(8,2) NOT NULL,
  `SQ_Wit_Prcnt` double(8,2) NOT NULL,
  `SQ_SubTotal` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_prepageant`
--

CREATE TABLE `event_prepageant` (
  `PP_ID` int(10) UNSIGNED NOT NULL,
  `Cand_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SP_RS` double(8,2) NOT NULL,
  `Talent_RS` double(8,2) NOT NULL,
  `PSPch_RS` double(8,2) NOT NULL,
  `SP_Prcnt` double(8,2) NOT NULL,
  `Talent_Prcnt` double(8,2) NOT NULL,
  `PSpch_Prcnt` double(8,2) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_presslaunch`
--

CREATE TABLE `event_presslaunch` (
  `PL_ID` int(10) UNSIGNED NOT NULL,
  `PL_RS` double(8,2) NOT NULL,
  `Cand_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `J_ID` int(10) UNSIGNED NOT NULL,
  `J_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_Event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_24_153857_create_candidates_table', 1),
(4, '2018_07_24_154500_create_judges_table', 1),
(5, '2018_07_24_154620_create_colleges_table', 1),
(6, '2018_07_24_154658_create_event_presslaunch_table', 1),
(7, '2018_07_24_154724_create_event_initialscore_table', 1),
(8, '2018_07_24_155444_create_organizers_table', 1),
(9, '2018_07_24_160917_create_event_prepageant_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `O_ID` int(10) UNSIGNED NOT NULL,
  `O_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_Position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O_isAdmin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_ID` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`Cand_ID`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`Col_ID`);

--
-- Indexes for table `event_initialscore`
--
ALTER TABLE `event_initialscore`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `event_prepageant`
--
ALTER TABLE `event_prepageant`
  ADD PRIMARY KEY (`PP_ID`);

--
-- Indexes for table `event_presslaunch`
--
ALTER TABLE `event_presslaunch`
  ADD PRIMARY KEY (`PL_ID`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`J_ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`O_ID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `Cand_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `Col_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_initialscore`
--
ALTER TABLE `event_initialscore`
  MODIFY `F_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_prepageant`
--
ALTER TABLE `event_prepageant`
  MODIFY `PP_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_presslaunch`
--
ALTER TABLE `event_presslaunch`
  MODIFY `PL_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `J_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `O_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
