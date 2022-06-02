-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 10:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 13, '2021-11', 2900, '2021-11-15 12:06:15', '2021-11-15 12:06:15'),
(3, 14, '2021-11', 3266.6666666667, '2021-11-15 12:06:15', '2021-11-15 12:06:15'),
(4, 12, '2021-12', 3000, '2021-11-15 12:08:16', '2021-11-15 12:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `account_other_costs`
--

CREATE TABLE `account_other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_other_costs`
--

INSERT INTO `account_other_costs` (`id`, `date`, `amount`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2021-11-03', 200, 'market 1 pcs', '202111160921download.png', '2021-11-16 03:09:32', '2021-11-16 03:21:30'),
(2, '2002-11-14', 300, 'Sports Item', '202111161210257100987_413178713805506_6207426460791218958_n.jpg', '2021-11-16 03:21:54', '2021-11-16 06:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 4, 2, '2021-12', 139.26, '2021-11-15 07:15:03', '2021-11-15 07:15:03'),
(4, 2, 2, 10, 2, '2021-11', 139.26, '2021-11-15 10:17:29', '2021-11-15 10:17:29'),
(5, 2, 2, 4, 2, '2021-11', 139.26, '2021-11-15 10:17:29', '2021-11-15 10:17:29'),
(6, 2, 5, 11, 3, '2021-11', 400, '2021-11-15 10:20:14', '2021-11-15 10:20:14'),
(7, 2, 3, 8, 2, '2021-11', 337.26, '2021-11-16 06:27:43', '2021-11-16 06:27:43'),
(8, 2, 1, 5, 1, '2021-11', 132, '2021-11-17 14:17:18', '2021-11-17 14:17:18'),
(9, 2, 1, 16, 1, '2021-11', 158, '2021-11-17 14:17:18', '2021-11-17 14:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, NULL, NULL, '2021-11-06 14:14:33', '2021-11-09 02:59:07'),
(2, 5, 1, 1, 2, NULL, NULL, '2021-11-06 14:15:25', '2021-11-08 00:44:05'),
(3, 6, NULL, 2, 1, NULL, NULL, '2021-11-06 14:16:26', '2021-11-06 14:16:26'),
(4, 7, 1, 6, 1, NULL, NULL, '2021-11-06 14:18:31', '2021-11-09 07:14:57'),
(5, 8, 1, 3, 2, NULL, NULL, '2021-11-06 14:52:09', '2021-11-09 13:23:04'),
(6, 9, NULL, 5, 1, NULL, NULL, '2021-11-06 15:23:30', '2021-11-06 15:23:30'),
(7, 10, 1, 2, 2, NULL, NULL, '2021-11-06 23:57:39', '2021-11-09 13:22:45'),
(8, 11, 1, 3, 1, NULL, NULL, '2021-11-07 01:59:47', '2021-11-12 03:54:54'),
(9, 11, 1, 5, 2, NULL, NULL, '2021-11-07 02:01:17', '2021-11-08 04:17:33'),
(10, 4, 2, 2, 2, NULL, NULL, '2021-11-07 11:34:48', '2021-11-09 13:22:45'),
(12, 16, NULL, 1, 2, NULL, NULL, '2021-11-17 14:16:37', '2021-11-17 14:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `get_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `get_mark`, `created_at`, `updated_at`) VALUES
(4, 6, 2, 100, 50, 100, '2021-11-05 04:31:56', '2021-11-05 04:31:56'),
(5, 6, 4, 100, 50, 100, '2021-11-05 04:31:56', '2021-11-05 04:31:56'),
(6, 6, 5, 100, 50, 100, '2021-11-05 04:31:56', '2021-11-05 04:31:56'),
(7, 6, 6, 100, 50, 100, '2021-11-05 04:31:56', '2021-11-05 04:31:56'),
(9, 2, 2, 100, 33, 100, '2021-11-05 06:14:16', '2021-11-05 06:14:16'),
(10, 2, 4, 100, 33, 100, '2021-11-05 06:14:16', '2021-11-05 06:14:16'),
(17, 1, 1, 100, 33, 100, '2021-11-05 06:54:24', '2021-11-05 06:54:24'),
(18, 1, 2, 100, 33, 100, '2021-11-05 06:54:24', '2021-11-05 06:54:24'),
(19, 1, 4, 100, 33, 100, '2021-11-05 06:54:24', '2021-11-05 06:54:24'),
(28, 3, 1, 100, 33, 100, '2021-11-05 06:57:26', '2021-11-05 06:57:26'),
(29, 3, 4, 100, 33, 100, '2021-11-05 06:57:26', '2021-11-05 06:57:26'),
(30, 7, 1, 100, 50, 100, '2021-11-13 01:23:37', '2021-11-13 01:23:37'),
(31, 7, 2, 100, 50, 100, '2021-11-13 01:23:37', '2021-11-13 01:23:37'),
(33, 7, 4, 100, 50, 100, '2021-11-13 01:23:37', '2021-11-13 01:23:37'),
(36, 7, 3, 100, 50, 100, '2021-11-13 01:26:40', '2021-11-13 01:26:40'),
(37, 1, 7, 100, 33, 100, '2021-11-16 10:10:15', '2021-11-16 10:10:15'),
(38, 2, 1, 100, 33, 100, '2021-11-17 13:15:36', '2021-11-17 13:15:36'),
(39, 2, 7, 100, 33, 100, '2021-11-17 13:15:36', '2021-11-17 13:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `communicates`
--

CREATE TABLE `communicates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communicates`
--

INSERT INTO `communicates` (`id`, `fname`, `lname`, `email`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(3, 'Samiul', 'Akib', 'jashim43@gmail.com', 'Leave', 'fdgfhfh', '2021-11-03 13:39:51', '2021-11-03 13:39:51'),
(4, 'Aminul', 'Akib', 'jashim43@gmail.com', 'fdgdfshs', 'hgfdjkhklgj', '2021-11-03 13:41:58', '2021-11-03 13:41:58'),
(5, 'Aminul', 'Akib', 'samiulsiam89@gmail.com', 'Registration issue', 'dsgfdsgd', '2022-01-14 11:12:31', '2022-01-14 11:12:31'),
(6, 'humayun', 'Hoque', 'samiulsiam59@gmail.com', 'Leave', 'gfdgfj', '2022-01-16 15:50:44', '2022-01-16 15:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Head Teacher', '2021-11-05 08:39:38', '2021-11-05 08:39:38'),
(2, 'Teacher', '2021-11-05 08:39:57', '2021-11-05 08:39:57'),
(3, 'Assistant Teacher', '2021-11-05 08:40:10', '2021-11-05 08:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 34, '2021-11-06 14:14:33', '2021-11-06 14:14:33'),
(2, 2, 1, 34, '2021-11-06 14:15:25', '2021-11-06 14:15:25'),
(3, 3, 1, 90, '2021-11-06 14:16:26', '2021-11-06 14:16:26'),
(4, 4, 1, 34, '2021-11-06 14:18:31', '2021-11-06 14:18:31'),
(5, 5, 1, 34, '2021-11-06 14:52:09', '2021-11-06 14:52:09'),
(6, 6, 1, 34, '2021-11-06 15:23:30', '2021-11-06 15:23:30'),
(7, 7, 1, 34, '2021-11-06 23:57:39', '2021-11-06 23:57:39'),
(8, 8, 1, 32, '2021-11-07 01:59:47', '2021-11-07 01:59:47'),
(9, 9, 1, 0, '2021-11-07 02:01:17', '2021-11-07 02:01:17'),
(10, 10, 1, 34, '2021-11-07 11:34:48', '2021-11-07 11:34:48'),
(12, 12, 1, 21, '2021-11-17 14:16:37', '2021-11-17 14:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendences`
--

CREATE TABLE `employee_attendences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendences`
--

INSERT INTO `employee_attendences` (`id`, `employee_id`, `date`, `attend_status`, `created_at`, `updated_at`) VALUES
(21, 12, '2021-11-12', 'Present', '2021-11-11 16:15:27', '2021-11-11 16:15:27'),
(22, 13, '2021-11-12', 'Present', '2021-11-11 16:15:27', '2021-11-11 16:15:27'),
(23, 14, '2021-11-12', 'Absent', '2021-11-11 16:15:28', '2021-11-11 16:15:28'),
(24, 15, '2021-11-12', 'Present', '2021-11-11 16:15:28', '2021-11-11 16:15:28'),
(25, 12, '2021-11-13', 'Present', '2021-11-11 16:15:54', '2021-11-11 16:15:54'),
(26, 13, '2021-11-13', 'Absent', '2021-11-11 16:15:54', '2021-11-11 16:15:54'),
(27, 14, '2021-11-13', 'Present', '2021-11-11 16:15:54', '2021-11-11 16:15:54'),
(28, 15, '2021-11-13', 'Present', '2021-11-11 16:15:54', '2021-11-11 16:15:54'),
(29, 12, '2021-11-14', 'Present', '2021-11-11 16:16:15', '2021-11-11 16:16:15'),
(30, 13, '2021-11-14', 'Present', '2021-11-11 16:16:15', '2021-11-11 16:16:15'),
(31, 14, '2021-11-14', 'Absent', '2021-11-11 16:16:15', '2021-11-11 16:16:15'),
(32, 15, '2021-11-14', 'Absent', '2021-11-11 16:16:15', '2021-11-11 16:16:15'),
(37, 12, '2021-11-16', 'Present', '2021-11-16 09:38:02', '2021-11-16 09:38:02'),
(38, 13, '2021-11-16', 'Absent', '2021-11-16 09:38:02', '2021-11-16 09:38:02'),
(39, 14, '2021-11-16', 'Present', '2021-11-16 09:38:02', '2021-11-16 09:38:02'),
(40, 15, '2021-11-16', 'Leave', '2021-11-16 09:38:02', '2021-11-16 09:38:02'),
(41, 12, '2021-12-02', 'Present', '2021-11-16 09:38:16', '2021-11-16 09:38:16'),
(42, 13, '2021-12-02', 'Present', '2021-11-16 09:38:16', '2021-11-16 09:38:16'),
(43, 14, '2021-12-02', 'Present', '2021-11-16 09:38:16', '2021-11-16 09:38:16'),
(44, 15, '2021-12-02', 'Present', '2021-11-16 09:38:16', '2021-11-16 09:38:16'),
(49, 12, '2021-11-18', 'Present', '2021-11-17 12:18:01', '2021-11-17 12:18:01'),
(50, 13, '2021-11-18', 'Present', '2021-11-17 12:18:01', '2021-11-17 12:18:01'),
(51, 14, '2021-11-18', 'Present', '2021-11-17 12:18:01', '2021-11-17 12:18:01'),
(52, 15, '2021-11-18', 'Present', '2021-11-17 12:18:01', '2021-11-17 12:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `leave_purpose_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 12, 3, '2021-11-10', '2021-11-10', '2021-11-10 07:16:11', '2021-11-11 03:47:15'),
(2, 13, 1, '2021-11-13', '2021-11-13', '2021-11-10 07:18:33', '2021-11-11 03:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id=user_id',
  `previous_salary` double DEFAULT NULL,
  `present_salary` double DEFAULT NULL,
  `increment_salary` double DEFAULT NULL,
  `effected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_date`, `created_at`, `updated_at`) VALUES
(1, 12, 3000, 3000, 0, '2021-11-04', '2021-11-09 11:11:40', '2021-11-09 11:11:40'),
(2, 13, 3000, 3000, 0, '2021-11-25', '2021-11-09 12:25:34', '2021-11-09 12:25:34'),
(3, 14, 3000, 3000, 0, '2021-11-10', '2021-11-09 12:32:47', '2021-11-09 12:32:47'),
(4, 15, 3000, 3000, 0, '2021-11-08', '2021-11-09 22:43:07', '2021-11-09 22:43:07'),
(5, 15, 3000, 4000, 1000, '2021-11-10', '2021-11-10 01:12:20', '2021-11-10 01:12:20'),
(6, 14, 3000, 3500, 500, '2021-11-11', '2021-11-10 01:14:42', '2021-11-10 01:14:42'),
(7, 15, 4000, 5500, 1500, '2022-05-19', '2021-11-10 01:52:13', '2021-11-10 01:52:13'),
(8, 12, 3000, 3000, 0, '2021-12-03', '2021-11-15 11:38:05', '2021-11-15 11:38:05'),
(9, 13, 3000, 3100, 100, '2021-12-18', '2021-11-17 12:14:55', '2021-11-17 12:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1st Terminal Exam', '2021-11-04 10:37:52', '2021-11-09 06:55:52'),
(2, '2nd Terminal Exam', '2021-11-04 10:38:53', '2021-11-09 06:56:15'),
(3, '3rd Terminal Exam', '2021-11-04 10:58:58', '2021-11-09 06:56:08'),
(4, 'Class Test', '2021-11-05 08:38:34', '2021-11-05 08:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration', '2021-11-03 01:27:00', '2021-11-03 01:31:36'),
(2, 'Monthly Fee', '2021-11-03 01:28:50', '2021-11-09 04:38:28'),
(3, 'Exam Fee', '2021-11-03 01:31:58', '2021-11-03 01:32:10'),
(4, 'Extra Fee + Charge Amount', '2021-11-03 02:58:56', '2021-11-03 02:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(32, 4, 2, 100, '2021-11-05 04:27:50', '2021-11-05 04:27:50'),
(33, 4, 5, 500, '2021-11-05 04:27:50', '2021-11-05 04:27:50'),
(46, 3, 1, 100, '2021-11-09 04:41:12', '2021-11-09 04:41:12'),
(47, 3, 2, 200, '2021-11-09 04:41:12', '2021-11-09 04:41:12'),
(48, 3, 3, 300, '2021-11-09 04:41:12', '2021-11-09 04:41:12'),
(49, 3, 5, 400, '2021-11-09 04:41:12', '2021-11-09 04:41:12'),
(50, 3, 6, 500, '2021-11-09 04:41:12', '2021-11-09 04:41:12'),
(56, 2, 1, 111, '2021-11-09 13:17:09', '2021-11-09 13:17:09'),
(57, 2, 2, 211, '2021-11-09 13:17:09', '2021-11-09 13:17:09'),
(58, 2, 3, 511, '2021-11-09 13:17:09', '2021-11-09 13:17:09'),
(59, 2, 5, 911, '2021-11-09 13:17:09', '2021-11-09 13:17:09'),
(60, 2, 6, 1100, '2021-11-09 13:17:09', '2021-11-09 13:17:09'),
(61, 1, 1, 200, '2021-11-09 13:18:06', '2021-11-09 13:18:06'),
(62, 1, 2, 800, '2021-11-09 13:18:06', '2021-11-09 13:18:06'),
(63, 1, 3, 1000, '2021-11-09 13:18:06', '2021-11-09 13:18:06'),
(64, 1, 5, 1300, '2021-11-09 13:18:06', '2021-11-09 13:18:06'),
(65, 1, 6, 2000, '2021-11-09 13:18:06', '2021-11-09 13:18:06'),
(66, 1, 7, 3000, '2021-11-09 13:18:06', '2021-11-09 13:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2021-11-02 23:51:30', '2021-11-02 23:51:30'),
(2, 'Arts', '2021-11-02 23:55:49', '2021-11-02 23:57:07'),
(3, 'commerce', '2021-11-02 23:55:58', '2021-11-02 23:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Family Problem', NULL, NULL),
(2, 'Personal Problem', NULL, NULL),
(3, 'Physical Problm', '2021-11-10 07:18:32', '2021-11-10 07:18:32'),
(4, 'dummy', '2021-11-10 07:55:01', '2021-11-10 07:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(111) DEFAULT NULL,
  `updated_by` int(111) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, '202111171802257100987_413178713805506_6207426460791218958_n.jpg', 1, NULL, '2021-11-17 12:02:16', '2021-11-17 12:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_marks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks_grades`
--

INSERT INTO `marks_grades` (`id`, `grade_name`, `grade_point`, `start_marks`, `end_marks`, `start_point`, `end_point`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5', '80', '100', '5', '5', 'Excellent', '2021-11-13 06:49:52', '2021-11-17 08:34:33'),
(2, 'A', '4', '70', '79', '4', '4.99', 'Very Good', '2021-11-13 07:01:42', '2021-11-17 08:34:59'),
(3, 'A-', '3.5', '60', '69', '3.5', '3.99', 'Good', '2021-11-17 08:35:32', '2021-11-17 08:36:43'),
(4, 'B', '3', '50', '59', '3', '3.49', 'Average', '2021-11-17 08:36:23', '2021-11-17 08:36:23'),
(5, 'C', '2', '40', '49', '2', '2.99', 'Disappoint', '2021-11-17 08:37:17', '2021-11-17 08:37:17'),
(6, 'D', '1', '33', '39', '1', '1.99', 'Bad', '2021-11-17 08:37:46', '2021-11-17 08:37:46'),
(7, 'F', '0', '00', '32', '0', '0.99', 'Fail', '2021-11-17 08:38:27', '2021-11-17 08:38:27');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_01_112455_create_logos_table', 3),
(7, '2021_11_03_003554_create_student_classes_table', 4),
(8, '2021_11_03_035815_create_years_table', 5),
(9, '2021_11_03_051143_create_groups_table', 6),
(10, '2021_11_03_061207_create_student_shifts_table', 7),
(11, '2021_11_03_065420_create_fee_categories_table', 8),
(12, '2021_11_03_094254_create_fee_category_amounts_table', 9),
(13, '2021_11_03_184523_create_communicates_table', 10),
(15, '2021_11_04_162839_create_exam_types_table', 11),
(16, '2021_11_04_164249_create_subjects_table', 12),
(17, '2021_11_05_083532_create_assign_subjects_table', 13),
(18, '2021_11_05_141544_create_designations_table', 14),
(19, '2014_10_12_000000_create_users_table', 15),
(20, '2021_11_05_165632_create_assign_students_table', 16),
(21, '2021_11_05_165922_create_discount_students_table', 16),
(22, '2021_11_09_152336_create_employee_salary_logs_table', 17),
(23, '2021_11_10_121020_create_leave_purposes_table', 18),
(24, '2021_11_10_121218_create_employee_leaves_table', 18),
(25, '2021_11_11_092053_create_employee_attendences_table', 19),
(26, '2021_11_12_153941_create_student_marks_table', 20),
(27, '2021_11_13_100214_create_marks_grades_table', 21),
(28, '2021_11_14_083700_create_account_student_fees_table', 22),
(29, '2021_11_15_165248_create_account_employee_salaries_table', 23),
(30, '2021_11_16_081330_create_account_other_costs_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'one', '2021-11-02 19:16:49', '2021-11-02 19:16:49'),
(2, 'two', '2021-11-02 19:31:41', '2021-11-02 21:33:26'),
(3, 'three', '2021-11-02 19:54:04', '2021-11-02 19:54:04'),
(5, 'Four', '2021-11-03 07:27:00', '2021-11-03 07:27:00'),
(6, 'Five', '2021-11-03 07:27:07', '2021-11-03 07:27:07'),
(7, 'six', '2021-11-09 13:17:41', '2021-11-09 13:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id=user_id',
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `assign_subject_id`, `exam_type_id`, `marks`, `created_at`, `updated_at`) VALUES
(5, 10, '20200010', 2, 2, 9, 1, 90, '2021-11-13 03:37:16', '2021-11-13 03:37:16'),
(6, 4, '20200001', 2, 2, 9, 1, 80, '2021-11-13 03:37:16', '2021-11-13 03:37:16'),
(7, 5, '20200005', 2, 1, 17, 1, 87, '2021-11-13 23:08:54', '2021-11-13 23:08:54'),
(11, 5, '20200005', 2, 1, 19, 1, 75, '2021-11-16 10:11:13', '2021-11-16 10:11:13'),
(12, 5, '20200005', 2, 1, 37, 1, 81, '2021-11-16 10:12:45', '2021-11-16 10:12:45'),
(13, 10, '20200010', 2, 2, 10, 1, 87, '2021-11-17 08:28:28', '2021-11-17 08:28:28'),
(14, 4, '20200001', 2, 2, 10, 1, 75, '2021-11-17 08:28:28', '2021-11-17 08:28:28'),
(15, 10, '20200010', 2, 2, 38, 1, 55, '2021-11-17 13:17:12', '2021-11-17 13:17:12'),
(16, 4, '20200001', 2, 2, 38, 1, 78, '2021-11-17 13:17:12', '2021-11-17 13:17:12'),
(17, 10, '20200010', 2, 2, 39, 1, 90, '2021-11-17 13:18:02', '2021-11-17 13:18:02'),
(18, 4, '20200001', 2, 2, 39, 1, 45, '2021-11-17 13:18:02', '2021-11-17 13:18:02'),
(20, 16, '20200012', 2, 1, 17, 1, 76, '2021-11-17 14:19:14', '2021-11-17 14:19:14'),
(24, 16, '20200012', 2, 1, 19, 1, 90, '2021-11-17 14:21:20', '2021-11-17 14:21:20'),
(25, 5, '20200005', 2, 1, 18, 1, 80, '2021-11-17 14:21:59', '2021-11-17 14:21:59'),
(26, 16, '20200012', 2, 1, 18, 1, 85, '2021-11-17 14:21:59', '2021-11-17 14:21:59'),
(28, 16, '20200012', 2, 1, 37, 1, 100, '2021-11-17 14:23:10', '2021-11-17 14:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shift A', '2021-11-03 00:31:49', '2021-11-03 01:07:53'),
(2, 'Shift B', '2021-11-03 00:32:15', '2021-11-03 00:32:15'),
(3, 'Shift C', '2021-11-04 10:23:42', '2021-11-04 10:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'English', '2021-11-04 11:01:05', '2021-11-04 11:01:05'),
(2, 'Bangla', '2021-11-04 11:01:15', '2021-11-04 11:01:15'),
(3, 'Higher Math', '2021-11-04 11:01:23', '2021-11-04 11:01:23'),
(4, 'Islamic Studies', '2021-11-05 03:12:32', '2021-11-05 03:12:32'),
(5, 'Physics', '2021-11-05 03:12:41', '2021-11-05 03:12:41'),
(6, 'Chemistry', '2021-11-05 03:12:55', '2021-11-05 03:12:55'),
(7, 'Mathemetics', '2021-11-16 10:10:00', '2021-11-16 10:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'student,employee,admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(1213) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software,operator=computer operator,user = employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Samiul', 'samiulsiam59@gmail.com', NULL, '$2y$10$G5g7hFaIZ/8FhIknkw5SCeYyHDsME0fMRPFP2nJnwojIm9SNR8ZRm', '01992569682', 'Uttara, Dhaka', 'Male', '202111070450sa.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, '2021-11-06 22:50:13'),
(2, 'admin', 'Kabir', 'kabir@gmail.com', NULL, '$2y$10$.wKYubU9AM8KtKgW1oPokuN2FXachNhtkPrbnlovWM2sQbQJSu9bG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5375', 'Operator', NULL, NULL, NULL, 1, NULL, '2021-11-06 14:13:36', '2021-11-06 14:13:36'),
(3, 'admin', 'Usman', 'Usman@gmail.com', NULL, '$2y$10$mUKgP6fCVZENEDbI2ZxsZuhGtw./TuGgtVzSJXnzFrmgUzZ/X0vcm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2353', 'Admin', NULL, NULL, NULL, 1, NULL, '2021-11-06 14:13:50', '2021-11-06 14:13:50'),
(4, 'student', 'Rafiqul Hoque', NULL, NULL, '$2y$10$iBRe1/01xETuj/3EGMANIe66KZnhejtuex8/XJTmJTcQvdGp7ObbW', '01992569682', 'Badda', 'Male', '202111062221istockphoto-1171062918-612x612.jpg', 'Sattar', 'Hasina', 'Islam', '20200001', '2000-10-01', '4702', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-06 14:14:33', '2021-11-08 00:46:05'),
(5, 'student', 'Selima', NULL, NULL, '$2y$10$DrxVuL47SRGyd3idfQU0yefMdHficr.eZ7nLnGvTzAmM5YshXZXZq', '01992569124', 'Badda', 'Female', '2021110620152.jpg', 'humayun', 'yasmin', 'Islam', '20200005', '2006-02-07', '2060', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-06 14:15:25', '2021-11-06 14:15:25'),
(6, 'student', 'Ayon', NULL, NULL, '$2y$10$9j2gTLJzzVp9RddDJm34we04UXNdXkj86jDzUHWMldH82PpFRsqLm', '01992569681', 'Badda', 'Male', '202111062016cvr.jpg', 'dipak', 'Jotii', 'Hindu', '20190006', '2007-02-07', '673', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-06 14:16:26', '2021-11-06 14:16:26'),
(7, 'student', 'irad', NULL, NULL, '$2y$10$b3o1VUY3F9cw6jxzGTZXUethx7a9tXe1JntQ/7o3nHSDnR3.17qjW', '01992569124', 'Vatara', 'Male', '202111062018Untitled-2.jpg', 'Rezul', 'Alima khan', 'Islam', '20190007', '2021-11-05', '3983', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-06 14:18:31', '2021-11-06 14:18:31'),
(8, 'student', 'Md Samiul Hoque', NULL, NULL, '$2y$10$kv3JyGon6VO5eLzb3QzxpORJHBUX3yq5uLy2MzlwagXiUrQZHZOEC', '01992569682', 'Hollan, Uttara, Dhaka', 'Male', '202111071534pic.jpg', 'Mirzui Hoque', 'Rowshan Ara', 'Islam', '20200008', '2005-04-07', '2465', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-06 14:52:09', '2021-11-07 09:34:42'),
(9, 'student', 'Asad', NULL, NULL, '$2y$10$6D1AtzbqDiEs0Tdvm8FFbeuTJz4gt6P3OuwArrp6EwXhRPINkhWbW', '01992569681', 'Monipura', 'Male', '202111062123sign.jpg', 'opu', 'Wridi', 'Islam', '20190009', '2021-11-19', '6688', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-06 15:23:30', '2021-11-06 15:23:30'),
(10, 'student', 'Sadia', NULL, NULL, '$2y$10$RV4qdblAq4kkA9coWQBOruAMY6gewitj/59VX/sDehYRaqgJqz5Y.', '01992569682', 'Miprur', 'Female', '20211107055811.jpg', 'Aminul rahman', 'momotaj', 'Islam', '20200010', '2003-02-12', '4176', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-06 23:57:39', '2021-11-06 23:58:57'),
(11, 'student', 'Sadia', NULL, NULL, '$2y$10$xCesQaUewxFwcMbaBqgGCOEM1IHjc0rNy2BSjQ0AFqMnqYbjAjPu2', '01992569682', 'Uttara, Dhaka', 'Male', '202111070800248792487_10159361662910991_302061953428786528_n.jpg', 'Aminul', 'yasmin', 'Islam', '20190011', '1970-01-01', '9032', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-07 01:59:47', '2021-11-09 13:20:31'),
(12, 'employee', 'Kamal', NULL, NULL, '$2y$10$Wyjc1gBSnZaGj8zoM34I/uIj2zh.q2r96GTsD/FuaTqtzPqghQgtS', '01992569682', 'Kishoreganj', 'Male', '202111091711254957367_10159740357804490_7510412032916547602_n.jpg', 'Jamal', 'Rahima', 'Islam', '2021070001', '1994-02-11', '3652', NULL, '2021-11-04', 2, 3000, 1, NULL, '2021-11-09 11:11:40', '2021-11-09 13:27:14'),
(13, 'employee', 'jobbar Mia', NULL, NULL, '$2y$10$A2laHrF74C2zU6Fa.TDxF.wIeqNGeg0sr8QGn/6maiwU2HHS6MJ6.', '019925696821', 'Uttara, Dhaka', 'Male', '202111091842pp.jpg', 'Asad Mia', 'karima khatun', 'Islam', '2021070013', '1987-03-04', '2867', NULL, '2021-11-25', 1, 3100, 1, NULL, '2021-11-09 12:25:33', '2021-11-17 12:14:55'),
(14, 'employee', 'Selina', NULL, NULL, '$2y$10$R0prBCAzPuCPF.c2Mw9IWOC8bZOtdAdGjaLgnu6Mp2.jxsnaDxMZa', '01992569667', 'Vatara', 'Female', '202111091832254957367_10159740357804490_7510412032916547602_n.jpg', 'Kuddus', 'Rina', 'Islam', '2021110014', '1999-02-02', '4477', NULL, '2021-11-10', 3, 3500, 1, NULL, '2021-11-09 12:32:47', '2021-11-10 01:14:42'),
(15, 'employee', 'Salam mia', NULL, NULL, '$2y$10$.QkZm78RCRqgteKFBCBfP.T/hmhq/Gxp0jzaVL2VxU4iTAMn9aYiG', '01992569681', 'Rajshahi', 'Male', '202111121616sa.jpg', 'Samad', 'Asma', 'Islam', '2021110015', '1976-02-03', '6589', NULL, '2021-11-08', 3, 5500, 1, NULL, '2021-11-09 22:43:07', '2021-11-12 10:16:08'),
(16, 'student', 'Dalim', NULL, NULL, '$2y$10$qqQz6Mtb44W74ZYfMkomhulI8r7DEoKq9ZLNkGOBUV2nryRUgG5Sm', '01992569000', 'Comilla', 'Male', '2021111720165.PNG', 'Chan Mia', 'Nurjahan', 'Islam', '20200012', '2021-11-20', '3947', NULL, NULL, NULL, NULL, 1, NULL, '2021-11-17 14:16:37', '2021-11-17 14:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2019', '2021-11-02 22:53:09', '2021-11-06 00:01:39'),
(2, '2020', '2021-11-02 23:19:15', '2021-11-06 00:01:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communicates`
--
ALTER TABLE `communicates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendences`
--
ALTER TABLE `employee_attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `years_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account_other_costs`
--
ALTER TABLE `account_other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `communicates`
--
ALTER TABLE `communicates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_attendences`
--
ALTER TABLE `employee_attendences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
