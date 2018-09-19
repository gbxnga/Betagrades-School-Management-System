-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 08:32 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idp_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_grades`
--

CREATE TABLE `academic_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `CA 1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CA 2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EXAM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOTAL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_grades`
--

INSERT INTO `academic_grades` (`id`, `student_id`, `subject_id`, `CA 1`, `CA 2`, `EXAM`, `TOTAL`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '45', '22', '55.2', '122.2', '2017-09-12 19:16:54', '2017-09-12 19:16:54'),
(2, 16, 3, '36', '66', '32', '134', '2017-09-12 19:16:54', '2017-09-12 19:16:54'),
(3, 16, 4, '22', '85', '75', '182', '2017-09-12 19:16:54', '2017-09-12 19:16:54'),
(4, 16, 5, '45', '85', '66', '196', '2017-09-12 19:16:54', '2017-09-12 19:16:54'),
(5, 16, 6, '44', '58', '65', '167', '2017-09-12 19:16:54', '2017-09-12 19:16:54'),
(6, 16, 7, '20', '55', '43', '118', '2017-09-12 19:16:54', '2017-09-12 19:16:54'),
(7, 29, 1, '55', '65', '23', '143', '2017-09-21 02:33:22', '2017-09-21 02:33:22'),
(8, 29, 3, '0', '56', '45', '101', '2017-09-21 02:33:22', '2017-09-21 02:33:22'),
(9, 20, 1, '23', '0', '10', '33', '2017-12-16 17:28:05', '2017-12-16 17:28:05'),
(10, 20, 3, '69', '0', '56', '125', '2017-12-16 17:28:05', '2017-12-16 17:28:05'),
(11, 20, 4, '0', '0', '10', '10', '2017-12-16 17:28:05', '2017-12-16 17:28:05'),
(12, 20, 5, '22', '0', '0', '22', '2017-12-16 17:28:05', '2017-12-16 17:28:05'),
(13, 20, 5, '22', '0', '0', '22', '2017-12-16 17:28:05', '2017-12-16 17:28:05'),
(14, 20, 6, '43', '44', '10', '97', '2017-12-16 17:28:05', '2017-12-16 17:28:05'),
(15, 20, 7, '0', '0', '0', '0', '2017-12-16 17:28:05', '2017-12-16 17:28:05'),
(16, 20, 8, NULL, NULL, NULL, '0', '2017-12-16 17:28:05', '2017-12-16 17:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr Administrator', 'admin5', 'iamblizzyy@gmail.com', '$2y$10$HCqq5vfQKIZt8IpJhV2pjuJZAJIewlKUtpd8E/BKJ7QnimYAiVpBe', 'XfIq6d2Oq4QwvBytudnS8tb8LZd4gzblmXmmXs9wVdXQbARt5OS74odpgntM', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `class_id`, `teacher_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(8, 4, 10, 4, '2017-09-08 20:57:58', '2017-09-08 20:57:58'),
(9, 4, 3, 5, '2017-09-08 21:17:12', '2017-09-08 21:17:12'),
(10, 2, 5, 5, '2017-09-08 21:19:19', '2017-09-08 21:19:19'),
(11, 1, 3, 1, '2017-09-09 01:01:47', '2017-09-09 01:01:47'),
(12, 1, 10, 3, '2017-09-09 02:44:23', '2017-09-09 02:44:23'),
(13, 1, 3, 6, '2017-09-09 02:45:22', '2017-09-09 02:45:22'),
(14, 15, 5, 4, '2017-09-09 04:43:00', '2017-09-09 04:43:00'),
(15, 4, 10, 3, '2017-09-09 05:41:14', '2017-09-09 05:41:14'),
(16, 1, 5, 4, '2017-09-11 00:09:00', '2017-09-11 00:09:00'),
(17, 3, 3, 1, '2017-09-11 00:33:30', '2017-09-11 00:33:30'),
(18, 3, 5, 3, '2017-09-11 00:33:39', '2017-09-11 00:33:39'),
(19, 1, 7, 5, '2017-09-11 21:37:46', '2017-09-11 21:37:46'),
(20, 1, 3, 7, '2017-09-12 17:08:51', '2017-09-12 17:08:51'),
(21, 5, 3, 1, '2017-09-13 03:50:00', '2017-09-13 03:50:00'),
(22, 3, 2, 4, '2017-11-22 21:51:57', '2017-11-22 21:51:57'),
(23, 4, 4, 4, '2017-11-22 21:57:04', '2017-11-22 21:57:04'),
(24, 4, 4, 3, '2017-11-22 21:57:14', '2017-11-22 21:57:14'),
(25, 1, 4, 5, '2017-11-23 16:26:25', '2017-11-23 16:26:25'),
(26, 1, 4, 8, '2017-11-23 16:32:38', '2017-11-23 16:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `class_id`, `student_id`, `type`, `attendance_date`, `created_at`, `updated_at`) VALUES
(38, 1, 16, 'A', '2017-09-01', '2017-09-17 10:15:55', '2017-09-17 10:15:55'),
(39, 1, 20, 'L', '2017-09-01', '2017-09-17 10:15:55', '2017-09-17 10:15:55'),
(40, 1, 20, 'A', '2017-09-02', '2017-09-17 10:55:40', '2017-09-17 10:55:40'),
(41, 3, 14, 'LE', '2017-09-06', '2017-09-20 14:54:42', '2017-09-20 14:54:42'),
(42, 3, 26, 'L', '2017-09-06', '2017-09-20 14:54:42', '2017-09-20 14:54:42'),
(43, 3, 29, 'A', '2017-09-06', '2017-09-20 14:54:42', '2017-09-20 14:54:42'),
(44, 3, 14, 'LE', '2017-09-15', '2017-09-21 00:34:03', '2017-09-21 00:34:03'),
(45, 3, 14, 'LE', '2017-09-16', '2017-09-21 00:34:53', '2017-09-21 00:34:53'),
(46, 3, 29, 'A', '2017-09-17', '2017-09-21 00:36:24', '2017-09-21 00:36:24'),
(47, 1, 16, 'A', '2017-11-03', '2017-11-22 21:47:21', '2017-11-22 21:47:21'),
(48, 1, 20, 'A', '2017-11-03', '2017-11-22 21:47:21', '2017-11-22 21:47:21'),
(49, 1, 30, 'A', '2017-11-03', '2017-11-22 21:47:21', '2017-11-22 21:47:21'),
(50, 2, 32, 'L', '2017-11-17', '2017-11-23 02:15:59', '2017-11-23 02:15:59'),
(51, 1, 16, 'LE', '2017-12-29', '2017-12-16 17:37:00', '2017-12-16 17:37:00'),
(52, 1, 20, 'L', '2017-12-29', '2017-12-16 17:37:00', '2017-12-16 17:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allDay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `title`, `start`, `end`, `url`, `allDay`, `created_at`, `updated_at`) VALUES
(2, 'my chieftancy', '2017-09-21 12:00:00', '2017-09-21 12:00:00', NULL, 'false', '2017-09-14 11:14:07', '2017-09-14 11:14:07'),
(3, 'School resumption', '2017-09-01 12:00:00', '2017-09-01 12:00:00', NULL, 'false', '2017-09-14 11:25:45', '2017-09-14 11:25:45'),
(4, 'Hello there', '2017-09-27 12:00:00', '2017-09-27 12:00:00', NULL, 'false', '2017-09-14 11:28:36', '2017-09-14 11:28:36'),
(5, 'PTA Meeting', '2017-10-05 12:00:00', '2017-10-05 12:00:00', NULL, 'false', '2017-09-14 11:31:02', '2017-09-14 11:31:02'),
(6, '2nd term begins', '2017-09-05 12:00:00', '2017-09-05 12:00:00', NULL, 'false', '2017-09-16 00:11:07', '2017-09-16 00:11:07'),
(7, 'PTA Meeting', '2017-11-29 12:00:00', '2017-11-29 12:00:00', NULL, 'false', '2017-11-22 21:45:10', '2017-11-22 21:45:10'),
(8, 'Inter-house sports', '2017-11-02 12:00:00', '2017-11-02 12:00:00', NULL, 'false', '2017-11-23 17:42:01', '2017-11-23 17:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `section` enum('A','B','C','D') DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `section`, `date_created`) VALUES
(1, 'JSS1', 'A', '2017-09-04 17:06:02'),
(2, 'JSS2', 'B', '2017-09-04 17:06:18'),
(3, 'SS1', 'A', '2017-09-04 17:06:18'),
(4, 'JSS1', 'C', '2017-09-04 17:34:52'),
(5, 'JSS1', 'D', '2017-09-04 17:34:52'),
(6, 'SS1', 'B', '2017-09-04 19:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

CREATE TABLE `exam_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_schedules`
--

INSERT INTO `exam_schedules` (`id`, `exam`, `subject_id`, `class_id`, `date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(9, 'CA 1', 1, 1, '2017-11-30', '06:45 AM', '06:45 AM', '2017-09-10 22:04:30', '2017-09-11 18:09:44'),
(10, 'CA 1', 3, 1, '2017-11-30', '04:00 AM', '04:00 AM', '2017-09-10 22:04:30', '2017-09-11 18:09:44'),
(11, 'CA 1', 6, 1, '2017-11-30', '04:00 AM', '04:00 AM', '2017-09-10 22:04:30', '2017-09-11 18:09:44'),
(26, 'CA 2', 1, 1, '2017-10-04', '09:00 AM', '10:15 AM', '2017-09-11 00:25:12', '2017-09-11 00:25:12'),
(27, 'CA 2', 3, 1, '2017-09-04', '09:15 AM', '05:30 AM', '2017-09-11 00:25:12', '2017-09-11 00:25:12'),
(28, 'CA 2', 4, 1, '2017-09-21', '11:15 AM', '12:15 PM', '2017-09-11 00:25:12', '2017-09-11 00:25:12'),
(29, 'CA 2', 6, 1, '1970-01-01', '09:15 AM', '06:30 AM', '2017-09-11 00:25:12', '2017-09-11 00:25:12'),
(30, 'EXAM', 1, 1, '2017-09-26', '12:00 PM', '02:00 PM', '2017-09-11 00:25:49', '2017-09-11 00:25:49'),
(31, 'EXAM', 3, 1, '2017-09-27', '10:00 AM', '11:00 AM', '2017-09-11 00:25:49', '2017-09-11 00:25:49'),
(32, 'EXAM', 4, 1, '2017-10-01', '10:15 AM', '10:15 AM', '2017-09-11 00:25:49', '2017-09-11 00:25:49'),
(33, 'EXAM', 6, 1, '2017-09-28', '01:30 PM', '03:00 PM', '2017-09-11 00:25:49', '2017-09-11 18:11:07'),
(34, 'EXAM', 1, 3, '2017-09-30', '10:30 AM', '10:30 AM', '2017-09-11 00:34:26', '2017-09-21 01:17:34'),
(35, 'EXAM', 3, 3, '2017-09-29', '10:30 AM', '10:30 AM', '2017-09-11 00:34:26', '2017-09-11 00:34:26'),
(38, 'CA 1', 4, 1, '2017-09-26', '04:30 AM', '02:30 AM', '2017-09-12 16:36:46', '2017-09-12 16:37:23'),
(39, 'CA 1', 5, 1, '2017-09-27', '02:30 AM', '04:30 AM', '2017-09-12 16:36:46', '2017-09-12 16:37:23'),
(40, 'CA 1', 7, 1, '2017-09-10', '03:00 AM', '03:00 AM', '2017-09-12 17:10:28', '2017-09-12 17:10:28'),
(41, 'CA 2', 5, 1, '2017-09-28', '03:30 AM', '03:30 AM', '2017-09-12 17:36:59', '2017-09-12 17:36:59'),
(42, 'CA 2', 7, 1, '2017-09-26', '03:30 AM', '03:30 AM', '2017-09-12 17:36:59', '2017-09-12 17:36:59'),
(43, 'EXAM', 5, 1, '2017-09-25', '03:30 AM', '03:30 AM', '2017-09-12 17:37:30', '2017-09-12 17:37:30'),
(44, 'EXAM', 7, 1, '2017-09-07', '03:30 AM', '03:30 AM', '2017-09-12 17:37:30', '2017-09-12 17:37:30'),
(45, 'CA 1', 1, 3, '2017-09-14', '11:15 AM', '11:45 AM', '2017-09-21 01:14:57', '2017-09-21 01:16:14'),
(46, 'CA 1', 3, 3, '2017-09-16', '11:00 AM', '11:00 AM', '2017-09-21 01:14:57', '2017-09-21 01:14:57'),
(47, 'CA 2', 1, 3, '2017-09-15', '12:15 PM', '12:15 PM', '2017-09-21 02:26:34', '2017-09-21 02:26:34'),
(48, 'CA 2', 3, 3, '2017-09-23', '12:15 PM', '12:15 PM', '2017-09-21 02:26:34', '2017-09-21 02:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_schedule_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `mark` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `exam_schedule_id`, `student_id`, `mark`, `created_at`, `updated_at`) VALUES
(13, 30, 16, 55.20, '2017-09-11 17:35:20', '2017-09-11 17:35:20'),
(14, 31, 16, 32.00, '2017-09-11 17:35:20', '2017-09-11 17:35:20'),
(15, 32, 16, 75.00, '2017-09-11 17:35:20', '2017-09-11 17:35:20'),
(16, 33, 16, 65.00, '2017-09-11 17:35:20', '2017-09-11 21:06:34'),
(17, 30, 17, 20.00, '2017-09-11 17:35:20', '2017-09-11 21:07:51'),
(18, 31, 17, 20.00, '2017-09-11 17:35:20', '2017-09-11 21:07:52'),
(19, 32, 17, 44.00, '2017-09-11 17:35:20', '2017-09-11 17:35:20'),
(20, 33, 17, 0.00, '2017-09-11 17:35:20', '2017-09-11 17:35:20'),
(21, 30, 20, 10.00, '2017-09-11 17:35:21', '2017-09-11 21:07:14'),
(22, 31, 20, 56.00, '2017-09-11 17:35:21', '2017-09-11 17:35:21'),
(23, 32, 20, 10.00, '2017-09-11 17:35:21', '2017-09-11 21:07:15'),
(24, 33, 20, 10.00, '2017-09-11 17:35:21', '2017-09-11 21:07:15'),
(25, 26, 16, 22.00, '2017-09-11 20:24:13', '2017-09-11 20:24:13'),
(26, 27, 16, 66.00, '2017-09-11 20:24:13', '2017-09-11 20:24:13'),
(27, 28, 16, 85.00, '2017-09-11 20:24:13', '2017-09-11 20:36:55'),
(28, 29, 16, 58.00, '2017-09-11 20:24:13', '2017-09-11 20:37:13'),
(29, 26, 17, 0.00, '2017-09-11 20:24:13', '2017-09-11 20:24:13'),
(30, 27, 17, 44.00, '2017-09-11 20:24:13', '2017-09-11 20:24:13'),
(31, 28, 17, 33.00, '2017-09-11 20:24:14', '2017-09-11 20:37:48'),
(32, 29, 17, 88.00, '2017-09-11 20:24:14', '2017-09-11 20:24:14'),
(33, 26, 20, 0.00, '2017-09-11 20:24:14', '2017-09-11 20:24:14'),
(34, 27, 20, 0.00, '2017-09-11 20:24:14', '2017-09-11 20:24:14'),
(35, 28, 20, 0.00, '2017-09-11 20:24:14', '2017-09-11 20:24:14'),
(36, 29, 20, 44.00, '2017-09-11 20:24:14', '2017-09-11 20:24:14'),
(37, 9, 16, 45.00, '2017-09-12 05:04:56', '2017-09-12 05:04:56'),
(38, 10, 16, 36.00, '2017-09-12 05:04:56', '2017-09-12 05:04:56'),
(39, 11, 16, 44.00, '2017-09-12 05:04:56', '2017-09-12 05:04:56'),
(40, 9, 17, 67.00, '2017-09-12 05:04:56', '2017-09-12 05:04:56'),
(41, 10, 17, 64.00, '2017-09-12 05:04:56', '2017-09-12 05:04:56'),
(42, 11, 17, 22.00, '2017-09-12 05:04:56', '2017-09-12 05:04:56'),
(43, 9, 20, 23.00, '2017-09-12 05:04:57', '2017-09-12 05:04:57'),
(44, 10, 20, 69.00, '2017-09-12 05:04:57', '2017-09-12 05:04:57'),
(45, 11, 20, 43.00, '2017-09-12 05:04:57', '2017-09-12 05:04:57'),
(48, 38, 16, 22.00, '2017-09-12 16:47:54', '2017-09-12 16:47:54'),
(49, 39, 16, 45.00, '2017-09-12 16:47:54', '2017-09-12 16:59:13'),
(53, 38, 17, 22.00, '2017-09-12 16:47:54', '2017-09-12 16:47:54'),
(54, 39, 17, 0.00, '2017-09-12 16:47:55', '2017-09-12 16:47:55'),
(58, 38, 20, 0.00, '2017-09-12 16:47:55', '2017-09-12 16:47:55'),
(59, 39, 20, 22.00, '2017-09-12 16:47:55', '2017-09-12 16:47:55'),
(61, 40, 16, 20.00, '2017-09-12 17:12:50', '2017-09-12 17:12:50'),
(62, 40, 17, 0.00, '2017-09-12 17:12:50', '2017-09-12 17:12:50'),
(63, 40, 20, 0.00, '2017-09-12 17:12:50', '2017-09-12 17:12:50'),
(64, 41, 16, 85.00, '2017-09-12 17:38:33', '2017-09-12 17:38:33'),
(65, 42, 16, 55.00, '2017-09-12 17:38:33', '2017-09-12 17:38:33'),
(66, 41, 17, 55.00, '2017-09-12 17:38:33', '2017-09-12 17:38:33'),
(67, 42, 17, 6.00, '2017-09-12 17:38:33', '2017-09-12 17:38:33'),
(68, 41, 20, 0.00, '2017-09-12 17:38:33', '2017-09-12 17:38:33'),
(69, 42, 20, 0.00, '2017-09-12 17:38:33', '2017-09-12 17:38:33'),
(70, 43, 16, 66.00, '2017-09-12 17:39:02', '2017-09-12 17:39:02'),
(71, 44, 16, 43.00, '2017-09-12 17:39:02', '2017-09-12 17:39:02'),
(72, 43, 17, 30.00, '2017-09-12 17:39:02', '2017-09-13 03:35:13'),
(73, 44, 17, 0.00, '2017-09-12 17:39:02', '2017-09-12 17:39:02'),
(74, 43, 20, 0.00, '2017-09-12 17:39:02', '2017-09-12 17:39:02'),
(75, 44, 20, 0.00, '2017-09-12 17:39:02', '2017-09-12 17:39:02'),
(76, 30, 30, 0.00, '2017-09-19 04:35:28', '2017-09-19 04:35:28'),
(77, 31, 30, 0.00, '2017-09-19 04:35:28', '2017-09-19 04:35:28'),
(78, 32, 30, 0.00, '2017-09-19 04:35:28', '2017-09-19 04:35:28'),
(79, 43, 30, 0.00, '2017-09-19 04:35:28', '2017-09-19 04:35:28'),
(80, 33, 30, 0.00, '2017-09-19 04:35:29', '2017-09-19 04:35:29'),
(81, 44, 30, 0.00, '2017-09-19 04:35:29', '2017-09-19 04:35:29'),
(82, 34, 14, 15.00, '2017-09-21 01:43:50', '2017-09-21 01:43:50'),
(83, 35, 14, 45.00, '2017-09-21 01:43:50', '2017-09-21 01:43:50'),
(84, 34, 26, 55.00, '2017-09-21 01:43:50', '2017-09-21 01:43:50'),
(85, 35, 26, 66.00, '2017-09-21 01:43:50', '2017-09-21 01:43:50'),
(86, 34, 29, 23.00, '2017-09-21 01:43:50', '2017-09-21 01:43:50'),
(87, 35, 29, 45.00, '2017-09-21 01:43:50', '2017-09-21 02:03:31'),
(88, 45, 14, 33.00, '2017-09-21 02:25:17', '2017-09-21 02:25:17'),
(89, 46, 14, 53.00, '2017-09-21 02:25:17', '2017-09-21 02:25:17'),
(90, 45, 26, 22.00, '2017-09-21 02:25:17', '2017-09-21 02:25:17'),
(91, 46, 26, 44.00, '2017-09-21 02:25:17', '2017-09-21 02:25:17'),
(92, 45, 29, 55.00, '2017-09-21 02:25:17', '2017-09-21 02:25:17'),
(93, 46, 29, 0.00, '2017-09-21 02:25:17', '2017-09-21 02:25:17'),
(94, 47, 14, 44.00, '2017-09-21 02:27:20', '2017-09-21 02:27:20'),
(95, 48, 14, 0.00, '2017-09-21 02:27:20', '2017-09-21 02:27:20'),
(96, 47, 26, 33.00, '2017-09-21 02:27:20', '2017-09-21 02:27:20'),
(97, 48, 26, 44.00, '2017-09-21 02:27:20', '2017-09-21 02:27:20'),
(98, 47, 29, 65.00, '2017-09-21 02:27:21', '2017-09-21 02:27:21'),
(99, 48, 29, 56.00, '2017-09-21 02:27:21', '2017-09-21 02:27:21'),
(100, 9, 30, 77.00, '2017-12-16 17:29:41', '2017-12-16 17:29:41'),
(101, 10, 30, 66.00, '2017-12-16 17:29:42', '2017-12-16 17:29:42'),
(102, 38, 30, 88.00, '2017-12-16 17:29:42', '2017-12-16 17:29:42'),
(103, 39, 30, 0.00, '2017-12-16 17:29:42', '2017-12-16 17:29:42'),
(104, 39, 30, 0.00, '2017-12-16 17:29:42', '2017-12-16 17:29:42'),
(105, 11, 30, 0.00, '2017-12-16 17:29:42', '2017-12-16 17:29:42'),
(106, 40, 30, 0.00, '2017-12-16 17:29:42', '2017-12-16 17:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2017_09_05_122422_create_students_table', 1),
(3, '2017_09_05_132739_create_the_classes_table', 2),
(7, '2017_09_08_085729_create_subjects_table', 4),
(8, '2017_09_08_101037_create_assigns_table', 5),
(10, '2017_09_08_145835_create_timetables_table', 6),
(12, '2017_09_09_093144_create_attendances_table', 7),
(13, '2017_09_10_125524_create_exam_schedules_table', 8),
(14, '2017_09_11_085309_create_marks_table', 9),
(16, '2017_09_12_110837_create_non_academic_grades_table', 11),
(17, '2017_09_12_110227_create_academic_grades_table', 12),
(18, '2017_09_12_161537_create_calendars_table', 13),
(19, '2017_09_14_044051_create_news_table', 14),
(20, '2017_09_16_181038_create_scratch_cards_table', 15),
(22, '2014_10_12_000000_create_users_table', 16),
(23, '2014_10_12_100000_create_password_resets_table', 16),
(25, '2017_09_18_035204_create_school_informations_table', 17),
(26, '2017_09_19_212149_create_admins_table', 18),
(27, '2017_09_20_013831_create_teachers_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `news`, `created_at`, `updated_at`) VALUES
(2, 'Inauguration of New Building', 'The scholl building will be renovated in the second week of the second term.', '2017-09-14 12:10:21', '2017-09-14 12:10:21'),
(5, 'Important Notification for parents', 'Hello John,\r\n\r\nKeffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American Apparel.\r\n\r\nRaw denim McSweeney''s bicycle rights, iPhone trust fund quinoa Neutra VHS kale chips vegan PBR&B literally Thundercats +1. Forage tilde four dollar toast, banjo health goth paleo butcher. Four dollar toast Brooklyn pour-over American Apparel sustainable, lumbersexual listicle gluten-free health goth umami hoodie. Synth Echo Park bicycle rights DIY farm-to-table, retro kogi sriracha dreamcatcher PBR&B flannel hashtag irony Wes Anderson. Lumbersexual Williamsburg Helvetica next level. Cold-pressed slow-carb pop-up normcore Thundercats Portland, cardigan literally meditation lumbersexual crucifix. Wayfarers raw denim paleo Bushwick, keytar Helvetica scenester keffiyeh 8-bit irony mumblecore whatever viral Truffaut.', '2017-11-23 17:16:01', '2017-11-23 17:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `non_academic_grades`
--

CREATE TABLE `non_academic_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attentiveness` int(11) DEFAULT NULL,
  `punctuality` int(11) DEFAULT NULL,
  `leadership` int(11) DEFAULT NULL,
  `class_teacher_remark` text COLLATE utf8mb4_unicode_ci,
  `house_master_remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `non_academic_grades`
--

INSERT INTO `non_academic_grades` (`id`, `student_id`, `attentiveness`, `punctuality`, `leadership`, `class_teacher_remark`, `house_master_remark`, `created_at`, `updated_at`) VALUES
(2, 16, 4, 4, 3, 'A promising child', 'He needs to bridle his tongue', '2017-09-12 19:16:54', '2017-09-12 19:16:54'),
(3, 29, 5, 5, 5, 'good boy.', 'nice', '2017-09-21 02:33:22', '2017-09-21 02:33:22'),
(4, 20, 5, 5, 5, NULL, NULL, '2017-12-16 17:28:05', '2017-12-16 17:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_informations`
--

CREATE TABLE `school_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_informations`
--

INSERT INTO `school_informations` (`id`, `school_name`, `address`, `phone`, `email`, `term`, `session`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Idris Premier College', 'Ilesha Garage', '98747348908', 'idris@gmail.com', '3', '2017-18', NULL, '2017-09-18 13:26:07', '2017-09-21 02:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `scratch_cards`
--

CREATE TABLE `scratch_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scratch_cards`
--

INSERT INTO `scratch_cards` (`id`, `value`, `student_id`, `is_active`, `created_at`, `updated_at`) VALUES
(13, '5360129b1e356db1', 26, 'true', '2017-09-17 03:16:12', '2017-09-17 03:16:12'),
(14, '2ee83306895beee0', 0, 'false', '2017-09-17 03:16:13', '2017-09-17 03:16:13'),
(15, '55808eaf0cf4f5d4', NULL, 'false', '2017-09-17 03:16:13', '2017-09-17 03:16:13'),
(563, '1f5354bc91839aab', NULL, 'false', '2017-09-17 05:10:24', '2017-09-17 05:10:24'),
(564, '4f25e800b874a8a7', NULL, 'false', '2017-09-17 05:10:24', '2017-09-17 05:10:24'),
(565, '3ccb4448f4c52fcd', NULL, 'false', '2017-09-17 05:10:24', '2017-09-17 05:10:24'),
(566, 'c631d718e319a009', NULL, 'false', '2017-09-17 05:10:24', '2017-09-17 05:10:24'),
(567, '3871d8b10ce0fb52', NULL, 'false', '2017-09-17 05:10:24', '2017-09-17 05:10:24'),
(568, 'dfc501cda48ea0ac', NULL, 'false', '2017-09-17 05:10:24', '2017-09-17 05:10:24'),
(569, '3b79b606c1d817fe', NULL, 'false', '2017-09-17 05:10:24', '2017-09-17 05:10:24'),
(570, '2f0f7a9cef1ae130', NULL, 'false', '2017-09-17 05:10:24', '2017-09-17 05:10:24'),
(571, 'a152f1fb8aeea5e8', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(572, '7660f02e3447a5f7', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(573, 'ae6930ddbbdb7203', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(574, '6a671cc157607c08', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(575, 'b0524f5a6a68501c', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(576, '91ecde084d1baa06', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(577, '41bb7ccf5735c79c', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(578, '3c9f3ebe4d7c1e8f', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(579, 'd6b291b407b98a76', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(580, 'bd4febb655d63329', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(581, 'b884077c0f037a32', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(582, '838e0b150986a900', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(583, 'a5939834297feb90', NULL, 'false', '2017-09-17 05:10:25', '2017-09-17 05:10:25'),
(584, 'af22fbada6fd2744', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26'),
(585, '38cc93cb356103d8', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26'),
(586, '8480fd0c781caac5', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26'),
(587, 'c2272cfa74935447', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26'),
(588, '77a2c14772fb6e74', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26'),
(589, '67edac019df6f8e2', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26'),
(590, '37d9933fcebea011', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26'),
(591, '8eeec376b3e4e832', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26'),
(592, 'edcc3a53197e3690', NULL, 'false', '2017-09-17 05:10:26', '2017-09-17 05:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `admission_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` text COLLATE utf8mb4_unicode_ci,
  `category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_is` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_relation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_address` text COLLATE utf8mb4_unicode_ci,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `admission_no`, `admission_date`, `student_type`, `class_id`, `firstname`, `lastname`, `image`, `mobileno`, `email`, `state`, `city`, `religion`, `gender`, `date_of_birth`, `current_address`, `category_id`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `is_active`, `created_at`, `updated_at`) VALUES
(13, 'uyjkjhgj34', '2017', 'Boarding', NULL, 'No name ass nigga', 'coon', '', '', 'nkj', NULL, NULL, '', 'Male', '', '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 13:31:55', '0000-00-00 00:00:00'),
(14, 'lifykjlk', '2017', 'Day', 3, 'Oni', 'Seun Victor', '1511428013.png', '08149090022', 'iamblizzyy@gmail.com', NULL, NULL, 'Christian', 'Male', NULL, 'Zion city estate, FUTA Rd, Akure, Nigeria', '3', 'other', 'Prof Oni', '08149090022', 'lecurer', 'Dr Oni', '08149090022', 'lecturer', 'Prof Oni', 'Father', '08149090022', 'lecturer', 'Zion city estate, FUTA Rd, Akure, Nigeria', NULL, '2017-09-05 03:01:02', '2017-11-23 16:06:53'),
(15, 'REF4GGF3', '2017', 'Day', 6, 'Bada', 'Adetola', '', '08149090022', 'iamblizzyy@gmail.com', NULL, NULL, 'Christian', 'Female', NULL, 'Zion city estate, FUTA Rd, Akure, Nigeria', '3', 'other', NULL, '08149090022', NULL, NULL, '08149090022', NULL, NULL, NULL, '08149090022', NULL, 'address', NULL, '2017-09-05 02:59:12', '2017-09-06 00:22:36'),
(16, 'CVE/13/2345', '2017', 'Day', 1, 'segun', 'Gbengaa', '1511380474.jpg', '08149090022', 'iamblizzyy@gmail.com', NULL, NULL, 'Muslim', 'Male', '09/30/2017', 'Zion city estate, FUTA Rd, Akure, Nigeria', '3', 'other', 'Prof Oni', '08149090022', NULL, 'Dr(Mrs) Oni', '08149090022', NULL, 'Oni Gbenga', 'Brother', '08149090022', 'Business man', NULL, NULL, '2017-09-04 02:40:30', '2017-11-23 02:54:34'),
(17, 'CSE/12/1066', '2017-18', 'Day', 4, 'Tola', 'Gbenga', NULL, '08093353719', 'iamblizzyy@gmail.com', NULL, NULL, NULL, 'Male', '09/16/2017', 'Fayan Street', '3', 'father', NULL, '08093353719', NULL, NULL, '08093353719', NULL, NULL, NULL, '08093353719', NULL, NULL, NULL, '2017-09-04 02:41:38', '2017-09-20 03:23:26'),
(18, '', '2017', 'Boarding', NULL, 'Oni', 'Gbenga', 'logo1.jpg', '08093353719', 'iamblizzyy@gmail.com', NULL, NULL, '', '', '', 'Fayan Street', '3', 'other', '', '08093353719', '', '', '08093353719', '', '', '', '08093353719', '', '', 'no', '2017-09-04 02:43:19', '0000-00-00 00:00:00'),
(19, '', '2017', 'Boarding', NULL, 'Oni', 'Gbenga', 'sfhksfks', '8093353719', 'iamblizzyy@gmail.com', NULL, NULL, '', '', NULL, 'Fayan Street', '3', 'mother', '', '8093353719', '', '', '8093353719', '', 'Oni Gbenga', '', '8093353719', '', '', 'no', '2017-09-04 05:45:51', '0000-00-00 00:00:00'),
(20, 'ncbmbb', '2016/2017', 'Day', 1, 'Oni', 'Gbenga', '1511533699.jpg', '8093353719', 'iamblizzyy@gmail.com', NULL, NULL, 'Christian', 'Male', '11/11/2017', 'Fayan Street', '3', 'other', NULL, '8093353719', NULL, NULL, '8093353719', NULL, 'Oni Gbenga', NULL, '8093353719', NULL, NULL, NULL, '2017-09-04 05:46:59', '2017-11-24 21:31:43'),
(21, '', '2017', 'Boarding', NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 12:43:07', '0000-00-00 00:00:00'),
(22, '', '2017', 'Boarding', NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 12:43:41', '0000-00-00 00:00:00'),
(23, '', '2017', 'Boarding', NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 12:43:56', '0000-00-00 00:00:00'),
(24, '', '2017', 'Boarding', NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 12:44:12', '0000-00-00 00:00:00'),
(25, '', '2017', 'Boarding', NULL, '', '', 'sfhksfks', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 23:35:58', '0000-00-00 00:00:00'),
(26, 'CSC/12/1025', '2017', 'Day', 3, 'kayode', 'Blessing', '', '8093353719', 'iamblizzyy@gmail.com', NULL, NULL, 'Budhist', 'Female', NULL, 'Fayan Street', '3', 'other', 'Prof Oni', '8093353719', '', 'Dr Oni', '8093353719', '', 'Oni Gbenga', '', '8093353719', '', 'Zion city estate, FUTA Rd, Akure, Nigeria', 'no', '2017-09-05 00:30:42', '0000-00-00 00:00:00'),
(27, NULL, '2017', 'Boarding', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-05 23:31:09', '2017-09-05 23:31:09'),
(28, NULL, '2017', 'Boarding', 6, 'Adewale', 'Adesegun', NULL, '08149090022', 'iamblizzyy@gmail.com', NULL, NULL, NULL, 'Male', NULL, 'Zion city estate, FUTA Rd, Akure, Nigeria', NULL, 'other', NULL, '08149090022', NULL, NULL, '08149090022', NULL, NULL, NULL, '08149090022', NULL, 'Fayan Street', NULL, '2017-09-05 23:32:18', '2017-09-05 23:32:18'),
(29, 'CSE/12/1025', '2017', 'Boarding', 3, 'Oni', 'Gbenga Blessing', '1504818836.jpg', '8093353719', 'iamblizzyy@gmail.com', NULL, NULL, NULL, 'Male', '12/22/2017', 'Fayan Street', NULL, 'other', NULL, '8093353719', NULL, NULL, '8093353719', NULL, 'Oni Gbenga', NULL, '8093353719', NULL, NULL, NULL, '2017-09-08 04:13:57', '2017-12-16 17:26:11'),
(30, 'MCB/12/5200', '2017', 'Boarding', 1, 'Kemi', 'Oni', '1505610208.png', '02768653813', 'kxmioni@gmail.com', NULL, NULL, 'Christianity', 'Female', '09/28/2017', 'Zion cresent, Victoria Island, Lagos', NULL, 'other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-13 03:38:12', '2017-09-17 08:03:28'),
(31, 'MCB/12/5201', '2017-18', 'Boarding', NULL, 'Oni', 'Gbenga', '1511378098.png', '8093353719', 'iamblizzyy@gmail.com', NULL, NULL, 'Muslim', NULL, NULL, 'Fayan Street', NULL, 'other', NULL, '8093353719', NULL, NULL, '8093353719', NULL, 'Oni Gbenga', NULL, '8093353719', NULL, NULL, NULL, '2017-11-23 02:14:58', '2017-11-23 02:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `students_old`
--

CREATE TABLE `students_old` (
  `id` int(11) NOT NULL,
  `admission_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Day',
  `class_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobileno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address` text COLLATE utf8_unicode_ci,
  `category_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_is` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_occupation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_relation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_occupation` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_address` text COLLATE utf8_unicode_ci,
  `is_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students_old`
--

INSERT INTO `students_old` (`id`, `admission_no`, `admission_date`, `student_type`, `class_id`, `firstname`, `lastname`, `image`, `mobileno`, `email`, `state`, `city`, `religion`, `gender`, `date_of_birth`, `current_address`, `category_id`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `is_active`, `created_at`, `updated_at`) VALUES
(13, 'uyjkjhgj34', '2017', 'Boarding', NULL, 'No name ass nigga', 'coon', '', '', 'nkj', NULL, NULL, '', 'Male', '', '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 06:31:55', '0000-00-00 00:00:00'),
(14, 'lifykjlk', '2017', 'Day', 6, 'Oni', 'Seunn', '', '08149090022', 'iamblizzyy@gmail.com', NULL, NULL, 'Christian', 'Female', '', 'Zion city estate, FUTA Rd, Akure, Nigeria', '3', 'other', 'Prof Oni', '08149090022', 'lecurer', 'Dr Oni', '08149090022', 'lecturer', 'Prof Oni', 'Father', '08149090022', '', 'Zion city estate, FUTA Rd, Akure, Nigeria', 'no', '2017-09-04 20:01:02', '0000-00-00 00:00:00'),
(15, 'REF4GGF3', '2017', 'Day', 6, 'Bada', 'Adetola', '', '08149090022', 'iamblizzyy@gmail.com', NULL, NULL, 'Christian', 'Female', '', 'Zion city estate, FUTA Rd, Akure, Nigeria', '3', 'other', '', '08149090022', '', '', '08149090022', '', '', '', '08149090022', '', '', 'no', '2017-09-04 19:59:12', '0000-00-00 00:00:00'),
(16, '', '2017', 'Boarding', NULL, 'Oni', 'Gbenga', 'sfhksfks', '08149090022', 'iamblizzyy@gmail.com', NULL, NULL, '', '', '', 'Zion city estate, FUTA Rd, Akure, Nigeria', '3', 'other', '', '08149090022', '', '', '08149090022', '', '', '', '08149090022', '', '', 'no', '2017-09-03 19:40:30', '0000-00-00 00:00:00'),
(17, '', '2017', 'Boarding', NULL, 'Oni', 'Gbenga', 'sfhksfks', '08093353719', 'iamblizzyy@gmail.com', NULL, NULL, '', '', '', 'Fayan Street', '3', 'other', '', '08093353719', '', '', '08093353719', '', '', '', '08093353719', '', '', 'no', '2017-09-03 19:41:38', '0000-00-00 00:00:00'),
(18, '', '2017', 'Boarding', NULL, 'Oni', 'Gbenga', 'logo1.jpg', '08093353719', 'iamblizzyy@gmail.com', NULL, NULL, '', '', '', 'Fayan Street', '3', 'other', '', '08093353719', '', '', '08093353719', '', '', '', '08093353719', '', '', 'no', '2017-09-03 19:43:19', '0000-00-00 00:00:00'),
(19, '', '2017', 'Boarding', NULL, 'Oni', 'Gbenga', 'sfhksfks', '8093353719', 'iamblizzyy@gmail.com', NULL, NULL, '', '', NULL, 'Fayan Street', '3', 'mother', '', '8093353719', '', '', '8093353719', '', 'Oni Gbenga', '', '8093353719', '', '', 'no', '2017-09-03 22:45:51', '0000-00-00 00:00:00'),
(20, 'ncbmbb', '2017', 'Day', NULL, 'Oni', 'Gbenga', 'banner7_edit.jpg', '8093353719', 'iamblizzyy@gmail.com', NULL, NULL, 'Christian', 'Male', NULL, 'Fayan Street', '3', 'other', '', '8093353719', '', '', '8093353719', '', 'Oni Gbenga', '', '8093353719', '', '', 'no', '2017-09-03 22:46:59', '0000-00-00 00:00:00'),
(21, '', '2017', 'Boarding', NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 05:43:07', '0000-00-00 00:00:00'),
(22, '', '2017', 'Boarding', NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 05:43:41', '0000-00-00 00:00:00'),
(23, '', '2017', 'Boarding', NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 05:43:56', '0000-00-00 00:00:00'),
(24, '', '2017', 'Boarding', NULL, '', '', '', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 05:44:12', '0000-00-00 00:00:00'),
(25, '', '2017', 'Boarding', NULL, '', '', 'sfhksfks', '', '', NULL, NULL, '', '', NULL, '', '3', 'other', '', '', '', '', '', '', '', '', '', '', '', 'no', '2017-09-04 16:35:58', '0000-00-00 00:00:00'),
(26, 'CSC/12/1025', '2017', 'Day', 3, 'Oni', 'Blessing', '', '8093353719', 'iamblizzyy@gmail.com', NULL, NULL, 'Budhist', 'Female', NULL, 'Fayan Street', '3', 'other', 'Prof Oni', '8093353719', '', 'Dr Oni', '8093353719', '', 'Oni Gbenga', '', '8093353719', '', 'Zion city estate, FUTA Rd, Akure, Nigeria', 'no', '2017-09-04 17:30:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ECONOMICS', 'None', '2017-09-08 16:31:01', '2017-09-08 17:00:00'),
(3, 'AGRIC SCIENCE', 'Theory', '2017-09-08 16:59:19', '2017-09-13 03:50:40'),
(4, 'BIOLOGY', 'Practical', '2017-09-08 16:59:41', '2017-09-08 16:59:41'),
(5, 'FURTHER MATHS', 'None', '2017-09-08 17:03:33', '2017-09-08 17:03:33'),
(6, 'PHYSICS', 'None', '2017-09-09 02:44:47', '2017-09-09 02:45:05'),
(7, 'MUSIC', 'Theory', '2017-09-09 04:36:07', '2017-09-09 04:36:07'),
(8, 'YORUBA LANGUAGE', 'Theory', '2017-11-22 21:53:14', '2017-11-22 21:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `sex` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `username`, `email`, `address`, `sex`, `phone`, `class_id`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Oni Blessing', 'teacher', 'idris@gmail.com', 'kluyruytui', 'Male', '98747348908', 3, '$2y$10$t12.evZfVbxzxrs8f8i/D.RJI2PjVyUcWaHeUTZ0u4TNM0HSeAA3W', '1511377450.jpg', NULL, '2017-09-20 10:51:47', '2017-11-23 02:04:10'),
(3, 'teacher5', 'teacher5', 'teacher5@idp.com', 'teacher5', 'Male', '5645876897', 1, '$2y$10$36VkZR3/3UddfBM4iEb3k.OfTjM3Ubw2DATb0p3NxPgNM4XDP6dK.', '1511364653.jpg', NULL, '2017-09-21 03:04:16', '2017-11-22 22:30:53'),
(4, 'Olowoboriola Juwon', 'mrjuwon', 'juwon@gmail.com', 'Adegoke street, Ikeja, Lagos    state', 'Male', '08033452653', 4, '$2y$10$4bh85/r3mHRrxQrdEvDcU.OmEzO1AJe9FZtLeDeAtsgMEXInTjgLW', '1511364494.jpeg', NULL, '2017-11-22 21:56:19', '2017-11-22 22:28:14'),
(5, 'Adetunji samuel', 'samuel5', 'samuel@fger.com', 'Heloo', 'Female', '34526425312', 2, '$2y$10$oILiLmc97Qv1ap/sJFCD1.XzE6kXxG5yVWGfxR28q1JXMzka9OnJu', '1511377866.jpg', NULL, '2017-11-23 02:09:53', '2017-11-23 02:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `the_classes`
--

CREATE TABLE `the_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `the_classes`
--

INSERT INTO `the_classes` (`id`, `name`, `section`, `created_at`, `updated_at`) VALUES
(1, 'JSS1', 'A', NULL, NULL),
(2, 'JSS2', 'B', NULL, NULL),
(3, 'SS1', 'A', NULL, NULL),
(4, 'JSS1', 'C', NULL, NULL),
(5, 'JSS1', 'D', NULL, NULL),
(6, 'SS1', 'B', NULL, '2017-09-07 22:48:30'),
(15, 'SSS3', 'A', '2017-09-09 04:42:36', '2017-09-09 04:42:36'),
(16, 'JSS2', 'D', '2017-09-13 03:53:52', '2017-09-13 03:53:52'),
(17, 'SS3', 'B', '2017-11-23 16:08:44', '2017-11-23 16:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `P8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `class_id`, `day`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `P7`, `P8`, `created_at`, `updated_at`) VALUES
(4000000034, 2, 'MON', 'BIOLOGY', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2017-09-18 10:35:20', '2017-09-18 10:35:20'),
(4000000035, 2, 'TUE', 'None', 'ECONOMICS', 'None', 'None', 'None', 'None', 'None', 'BIOLOGY', '2017-09-18 10:35:20', '2017-09-18 10:35:20'),
(4000000036, 2, 'WED', 'None', 'None', 'AGRIC SCIENCE', 'None', 'None', 'None', 'BIOLOGY', 'None', '2017-09-18 10:35:20', '2017-09-18 10:35:20'),
(4000000037, 2, 'THU', 'None', 'None', 'None', 'ECONOMICS', 'None', 'BIOLOGY', 'None', 'None', '2017-09-18 10:35:20', '2017-09-18 10:35:20'),
(4000000038, 2, 'FRI', 'FURTHER MATHS', 'None', 'None', 'None', 'BIOLOGY', 'None', 'None', 'None', '2017-09-18 10:35:20', '2017-09-18 10:35:20'),
(4000000059, 3, 'MON', 'FURTHER MATHS', 'None', 'ECONOMICS', 'None', 'None', 'None', 'None', 'None', '2017-09-21 00:38:12', '2017-09-21 00:38:12'),
(4000000060, 3, 'TUE', 'None', 'None', 'ECONOMICS', 'None', 'AGRIC SCIENCE', 'None', 'None', 'None', '2017-09-21 00:38:12', '2017-09-21 00:38:12'),
(4000000061, 3, 'WED', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2017-09-21 00:38:12', '2017-09-21 00:38:12'),
(4000000062, 3, 'THU', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2017-09-21 00:38:12', '2017-09-21 00:38:12'),
(4000000063, 3, 'FRI', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2017-09-21 00:38:12', '2017-09-21 00:38:12'),
(4000000079, 1, 'MON', 'AGRIC SCIENCE', 'FURTHER MATHS', 'AGRIC SCIENCE', 'None', 'None', 'None', 'None', 'None', '2017-12-16 17:36:03', '2017-12-16 17:36:03'),
(4000000080, 1, 'TUE', 'AGRIC SCIENCE', 'None', 'ECONOMICS', 'None', 'None', 'None', 'None', 'None', '2017-12-16 17:36:03', '2017-12-16 17:36:03'),
(4000000081, 1, 'WED', 'ECONOMICS', 'None', 'FURTHER MATHS', 'None', 'None', 'None', 'None', 'None', '2017-12-16 17:36:03', '2017-12-16 17:36:03'),
(4000000082, 1, 'THU', 'ECONOMICS', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2017-12-16 17:36:03', '2017-12-16 17:36:03'),
(4000000083, 1, 'FRI', 'BIOLOGY', 'None', 'None', 'None', 'None', 'None', 'None', 'None', '2017-12-16 17:36:03', '2017-12-16 17:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oni Gbenga', 'gbxnga', 'iamblizzyy@gmail.com', '$2y$10$Q7qAAObKkHP0UywevwdZGeAjKiAhbz3TyUh00MQRAKbJjfUgUYKqS', 'lqUNlM6v6wDXPw6rapv3z7rdu7mQ9p8ph4qxCdmPcv8wgvh8fbt9Xlq0ncBG', '2017-09-18 09:09:35', '2017-09-18 09:09:35'),
(2, 'Admin3', 'Admin3', 'Admin3@idp.com', '$2y$10$Ap0cpMI0e3xVOgymRw/Z/OHqoij8nEWMV213Wm54lWVzx5y2eTdpO', 'erYNW319d9xWThAOpGVjdkUpFTZmhWBnaGiMo3XtSJ5jlenrGqYPCpfF0tQs', '2017-09-21 02:54:31', '2017-09-21 02:54:31'),
(3, 'admin5', 'admin5', 'admin5@idp.com', '$2y$10$HCqq5vfQKIZt8IpJhV2pjuJZAJIewlKUtpd8E/BKJ7QnimYAiVpBe', 'VFg7iYi2zUUviRrygCeAq3SW9ZhJ1aTMv0euxaMrl7gL6pGAOBVz55sHWuwq', '2017-09-21 03:02:04', '2017-09-21 03:02:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_grades`
--
ALTER TABLE `academic_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_academic_grades`
--
ALTER TABLE `non_academic_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `school_informations`
--
ALTER TABLE `school_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scratch_cards`
--
ALTER TABLE `scratch_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `value` (`value`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `students` ADD FULLTEXT KEY `firstname` (`firstname`,`lastname`,`admission_no`,`father_name`,`mother_name`,`guardian_name`);

--
-- Indexes for table `students_old`
--
ALTER TABLE `students_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_username_unique` (`username`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `the_classes`
--
ALTER TABLE `the_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_grades`
--
ALTER TABLE `academic_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `non_academic_grades`
--
ALTER TABLE `non_academic_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `school_informations`
--
ALTER TABLE `school_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `scratch_cards`
--
ALTER TABLE `scratch_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=593;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `students_old`
--
ALTER TABLE `students_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `the_classes`
--
ALTER TABLE `the_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
