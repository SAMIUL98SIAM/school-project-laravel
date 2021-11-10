-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 10:25 AM
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
(8, 11, NULL, 3, 1, NULL, NULL, '2021-11-07 01:59:47', '2021-11-07 01:59:47'),
(9, 11, 1, 5, 2, NULL, NULL, '2021-11-07 02:01:17', '2021-11-08 04:17:33'),
(10, 4, 2, 2, 2, NULL, NULL, '2021-11-07 11:34:48', '2021-11-09 13:22:45');

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
(29, 3, 4, 100, 33, 100, '2021-11-05 06:57:26', '2021-11-05 06:57:26');

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
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communicates`
--

INSERT INTO `communicates` (`id`, `fname`, `lname`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Samiul', 'Akib', 'jashim43@gmail.com', 'Leave', 'fdgfhfh', '2021-11-03 13:39:51', '2021-11-03 13:39:51'),
(4, 'Aminul', 'Akib', 'jashim43@gmail.com', 'fdgdfshs', 'hgfdjkhklgj', '2021-11-03 13:41:58', '2021-11-03 13:41:58');

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
(10, 10, 1, 34, '2021-11-07 11:34:48', '2021-11-07 11:34:48');

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
(7, 15, 4000, 5500, 1500, '2022-05-19', '2021-11-10 01:52:13', '2021-11-10 01:52:13');

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
(7, '2021111004091.jpg', 1, 1, '2021-11-09 13:15:16', '2021-11-09 22:09:55');

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
(22, '2021_11_09_152336_create_employee_salary_logs_table', 17);

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
(6, 'Chemistry', '2021-11-05 03:12:55', '2021-11-05 03:12:55');

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
(1, 'admin', 'Samiul', 'samiul89@gmail.com', NULL, '$2y$10$zJy6.jS0597ZONbEprC.F.9mOaupJgGPjRmO7qLse9/T2UTs8xBs2', '01992569682', 'Uttara, Dhaka', 'Male', '202111070450sa.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, '2021-11-06 22:50:13'),
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
(13, 'employee', 'jobbar Mia', NULL, NULL, '$2y$10$A2laHrF74C2zU6Fa.TDxF.wIeqNGeg0sr8QGn/6maiwU2HHS6MJ6.', '019925696821', 'Uttara, Dhaka', 'Male', '202111091842pp.jpg', 'Asad Mia', 'karima khatun', 'Islam', '2021070013', '1987-03-04', '2867', NULL, '2021-11-25', 1, 3000, 1, NULL, '2021-11-09 12:25:33', '2021-11-09 12:42:50'),
(14, 'employee', 'Selina', NULL, NULL, '$2y$10$R0prBCAzPuCPF.c2Mw9IWOC8bZOtdAdGjaLgnu6Mp2.jxsnaDxMZa', '01992569667', 'Vatara', 'Female', '202111091832254957367_10159740357804490_7510412032916547602_n.jpg', 'Kuddus', 'Rina', 'Islam', '2021110014', '1999-02-02', '4477', NULL, '2021-11-10', 3, 3500, 1, NULL, '2021-11-09 12:32:47', '2021-11-10 01:14:42'),
(15, 'employee', 'Salam mia', NULL, NULL, '$2y$10$.QkZm78RCRqgteKFBCBfP.T/hmhq/Gxp0jzaVL2VxU4iTAMn9aYiG', '01992569681', 'Rajshahi', 'Male', '2021111004431.jpg', 'Samad', 'Asma', 'Islam', '2021110015', '1976-02-03', '6589', NULL, '2021-11-08', 3, 5500, 1, NULL, '2021-11-09 22:43:07', '2021-11-10 01:52:13');

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
-- Indexes for table `logos`
--
ALTER TABLE `logos`
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
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `communicates`
--
ALTER TABLE `communicates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
