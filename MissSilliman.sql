-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2018 at 06:39 AM
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
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college` int(10) UNSIGNED NOT NULL,
  `yearLevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SY` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isTop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `image`, `fName`, `mName`, `lName`, `college`, `yearLevel`, `SY`, `isTop`, `number`, `created_at`, `updated_at`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(10) UNSIGNED NOT NULL,
  `collegeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collegeCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `initial_scores`
--

CREATE TABLE `initial_scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate` int(10) UNSIGNED NOT NULL,
  `judge` int(10) UNSIGNED NOT NULL,
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
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `id` int(10) UNSIGNED NOT NULL,
  `J_FName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_MName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_LName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `J_Event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `J_FName`, `J_MName`, `J_LName`, `J_Event`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Judge1', '', '', 'Talent', '', '', NULL, NULL),
(2, 'Judge2', '', '', 'Talent', '', '', NULL, NULL),
(3, 'Judge3', '', '', 'Talent', '', '', NULL, NULL),
(4, 'Judge4', '', '', 'Final', '', '', NULL, NULL),
(5, 'Judge5', '', '', 'Final', '', '', NULL, NULL),
(6, 'Judge6', '', '', 'Final', '', '', NULL, NULL),
(7, 'Judge7', '', '', 'Speech', '', '', NULL, NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_08_06_000000_create_candidates_table', 1),
(3, '2018_08_06_000000_create_colleges_table', 1),
(4, '2018_08_06_000000_create_users_table', 1),
(5, '2018_08_07_150250_create_prepageants_table', 1),
(6, '2018_08_08_041010_create_initial_scores_table', 1);

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
-- Table structure for table `prepageants`
--

CREATE TABLE `prepageants` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate` int(10) UNSIGNED NOT NULL,
  `judge` int(10) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `prepageants`
--

INSERT INTO `prepageants` (`id`, `candidate`, `judge`, `SP_RS`, `Talent_RS`, `PSPch_RS`, `SP_Prcnt`, `Talent_Prcnt`, `PSpch_Prcnt`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(2, 2, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(3, 3, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(4, 4, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(5, 5, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(6, 6, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(7, 7, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(8, 8, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(9, 9, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(10, 10, 1, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(11, 1, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(12, 2, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(13, 3, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(14, 4, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(15, 5, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(16, 6, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(17, 7, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(18, 8, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(19, 9, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(20, 10, 2, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(21, 1, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(22, 2, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(23, 3, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(24, 4, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(25, 5, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(26, 6, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(27, 7, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(28, 8, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(29, 9, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(30, 10, 3, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, 0.00, NULL, NULL),
(31, 1, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(32, 2, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(33, 3, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(34, 4, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(35, 5, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(36, 6, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(37, 7, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(38, 8, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(39, 9, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(40, 10, 4, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(41, 1, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(42, 2, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(43, 3, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(44, 4, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(45, 5, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(46, 6, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(47, 7, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(48, 8, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(49, 9, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(50, 10, 5, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(51, 1, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(52, 2, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(53, 3, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(54, 4, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(55, 5, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(56, 6, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(57, 7, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(58, 8, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(59, 9, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(60, 10, 6, 0.00, 0.00, 0.00, 0.00, 0.00, 0.40, 0.00, NULL, NULL),
(61, 1, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(62, 2, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(63, 3, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(64, 4, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(65, 5, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(66, 6, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(67, 7, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(68, 8, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(69, 9, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(70, 10, 7, 0.00, 0.00, 0.00, 0.20, 0.00, 0.00, 0.00, NULL, NULL),
(71, 1, 1, 0.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(72, 2, 1, 0.00, 1000.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(73, 3, 1, 0.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(74, 4, 1, 0.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(75, 5, 1, 0.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(76, 6, 1, 0.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(77, 7, 1, 0.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(78, 8, 1, 0.00, 10.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(79, 9, 1, 0.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34'),
(80, 10, 1, 0.00, 100.00, 0.00, 0.00, 0.40, 0.00, 0.00, '2018-08-07 07:39:34', '2018-08-07 07:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `initial_scores`
--
ALTER TABLE `initial_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `prepageants`
--
ALTER TABLE `prepageants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `initial_scores`
--
ALTER TABLE `initial_scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prepageants`
--
ALTER TABLE `prepageants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
