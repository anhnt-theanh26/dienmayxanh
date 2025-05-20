-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 16, 2025 lúc 08:36 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dienmayxanh`
--
CREATE DATABASE IF NOT EXISTS `dienmayxanh` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `dienmayxanh`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Loại máy lạnh', 'loai-may-lanh', NULL, '2025-05-08 02:21:28', '2025-05-08 02:21:28'),
(2, 'Công suất làm lạnh', 'cong-suat-lam-lanh', NULL, '2025-05-08 02:21:37', '2025-05-08 02:21:37'),
(3, 'Diện tích phù hợp', 'dien-tich-phu-hop', NULL, '2025-05-08 02:21:58', '2025-05-08 02:21:58'),
(4, 'Mức tiêu thụ điện năng', 'muc-tieu-thu-dien-nang', NULL, '2025-05-08 02:22:07', '2025-05-08 02:22:07'),
(5, 'Chế độ tiết kiệm năng lượng', 'che-do-tiet-kiem-nang-luong', NULL, '2025-05-08 02:22:17', '2025-05-08 02:22:17'),
(6, 'Kích thước màn hình', 'kich-thuoc-man-hinh', NULL, '2025-05-08 02:22:31', '2025-05-08 02:22:31'),
(7, 'Độ phân giải màn hình', 'do-phan-giai-man-hinh', NULL, '2025-05-08 02:22:41', '2025-05-08 02:22:41'),
(8, 'Loại màn hình', 'loai-man-hinh', NULL, '2025-05-08 02:22:52', '2025-05-08 02:22:52'),
(9, 'Công suất', 'cong-suat', NULL, '2025-05-08 02:23:02', '2025-05-08 02:23:02'),
(10, 'Loại điều hòa', 'loai-dieu-hoa', NULL, '2025-05-08 02:23:10', '2025-05-08 02:23:10'),
(11, 'Loại gas làm lạnh', 'loai-gas-lam-lanh', NULL, '2025-05-08 02:23:17', '2025-05-08 02:23:17'),
(12, 'Màn hình', 'man-hinh', NULL, '2025-05-08 02:23:26', '2025-05-08 02:23:26'),
(13, 'RAM', 'ram', NULL, '2025-05-08 02:23:36', '2025-05-08 02:23:36'),
(14, 'Camera', 'camera', NULL, '2025-05-08 02:23:44', '2025-05-08 02:23:44'),
(15, 'Màu sắc', 'mau-sac', NULL, '2025-05-08 02:23:52', '2025-05-08 02:23:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authentication_log`
--

CREATE TABLE `authentication_log` (
  `id` bigint UNSIGNED NOT NULL,
  `authenticatable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticatable_id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `authentication_log`
--

INSERT INTO `authentication_log` (`id`, `authenticatable_type`, `authenticatable_id`, `ip_address`, `user_agent`, `login_at`, `logout_at`) VALUES
(1, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-08 01:04:45', NULL),
(2, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-08 06:33:34', '2025-05-08 09:52:06'),
(3, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-08 10:07:14', NULL),
(4, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-09 01:08:16', NULL),
(5, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-09 01:08:51', NULL),
(6, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-09 06:39:57', NULL),
(7, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-12 01:03:44', NULL),
(8, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-12 06:34:05', '2025-05-12 06:34:07'),
(9, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-12 06:34:27', '2025-05-12 06:34:29'),
(10, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-12 06:35:32', '2025-05-12 06:35:34'),
(11, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-12 06:36:49', '2025-05-12 06:36:50'),
(12, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-12 06:39:29', '2025-05-12 06:47:22'),
(13, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-12 06:52:35', '2025-05-12 08:21:51'),
(14, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-12 08:22:01', NULL),
(15, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 01:17:29', NULL),
(16, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 07:48:53', NULL),
(17, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 07:53:23', NULL),
(18, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 07:53:56', '2025-05-13 08:01:19'),
(19, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:01:53', NULL),
(20, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:07:48', '2025-05-13 08:13:39'),
(21, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:13:59', NULL),
(22, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:15:25', NULL),
(23, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:17:24', '2025-05-13 08:17:34'),
(24, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:18:04', NULL),
(25, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:19:15', NULL),
(26, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:19:25', NULL),
(27, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:29:18', '2025-05-13 08:31:33'),
(28, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:31:47', NULL),
(29, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:32:14', NULL),
(30, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:35:30', NULL),
(31, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:35:42', '2025-05-13 08:35:50'),
(32, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:35:58', NULL),
(33, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:36:17', NULL),
(34, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-13 08:36:24', NULL),
(35, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 00:59:57', '2025-05-15 02:22:07'),
(36, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:22:18', '2025-05-15 02:24:28'),
(37, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:32:14', '2025-05-15 02:32:14'),
(38, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:32:51', '2025-05-15 02:32:51'),
(39, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:33:04', NULL),
(40, 'App\\Models\\User', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:42:24', '2025-05-15 02:42:24'),
(41, 'App\\Models\\User', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:43:12', '2025-05-15 02:43:12'),
(42, 'App\\Models\\User', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:43:54', '2025-05-15 02:43:54'),
(43, 'App\\Models\\User', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:44:37', '2025-05-15 02:44:37'),
(44, 'App\\Models\\User', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:45:40', '2025-05-15 02:45:40'),
(45, 'App\\Models\\User', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:46:46', '2025-05-15 02:46:46'),
(46, 'App\\Models\\User', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:56:45', '2025-05-15 02:56:53'),
(47, 'App\\Models\\User', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 02:59:32', '2025-05-15 02:59:32'),
(48, 'App\\Models\\User', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 03:04:22', '2025-05-15 03:04:22'),
(49, 'App\\Models\\User', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 03:08:36', '2025-05-15 03:08:36'),
(50, 'App\\Models\\User', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 03:11:27', '2025-05-15 03:11:27'),
(51, 'App\\Models\\User', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 03:12:05', '2025-05-15 03:12:05'),
(52, 'App\\Models\\User', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 03:48:40', '2025-05-15 03:48:45'),
(53, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 07:42:32', NULL),
(54, 'App\\Models\\User', 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 09:14:00', NULL),
(55, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 09:17:46', '2025-05-15 09:18:27'),
(56, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 09:18:39', '2025-05-15 09:18:39'),
(57, 'App\\Models\\User', 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 09:28:26', NULL),
(58, 'App\\Models\\User', 23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 09:32:21', NULL),
(59, 'App\\Models\\User', 24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 09:44:02', '2025-05-15 09:45:46'),
(60, 'App\\Models\\User', 24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 09:46:05', '2025-05-15 09:46:05'),
(61, 'App\\Models\\User', 29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:05:21', NULL),
(62, 'App\\Models\\User', 29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:09:21', NULL),
(63, 'App\\Models\\User', 30, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:18:25', NULL),
(64, 'App\\Models\\User', 31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:22:39', NULL),
(65, 'App\\Models\\User', 31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:23:31', NULL),
(66, 'App\\Models\\User', 32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:24:36', NULL),
(67, 'App\\Models\\User', 32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:24:54', NULL),
(68, 'App\\Models\\User', 32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:26:22', '2025-05-15 10:26:52'),
(69, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:27:06', '2025-05-15 10:27:06'),
(70, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:27:16', '2025-05-15 10:27:43'),
(71, 'App\\Models\\User', 32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:27:51', '2025-05-15 10:27:51'),
(72, 'App\\Models\\User', 32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-15 10:30:00', NULL),
(73, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 01:12:59', '2025-05-16 01:14:24'),
(74, 'App\\Models\\User', 34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 01:15:54', '2025-05-16 01:15:54'),
(75, 'App\\Models\\User', 34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 01:16:08', '2025-05-16 01:16:08'),
(76, 'App\\Models\\User', 36, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 01:37:44', '2025-05-16 01:37:51'),
(77, 'App\\Models\\User', 38, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 01:42:36', '2025-05-16 01:42:47'),
(78, 'App\\Models\\User', 38, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 01:43:37', '2025-05-16 01:43:37'),
(79, 'App\\Models\\User', 38, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 01:43:50', '2025-05-16 01:43:50'),
(80, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 02:16:17', '2025-05-16 02:18:13'),
(81, 'App\\Models\\User', 44, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 02:33:40', NULL),
(82, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 02:41:45', '2025-05-16 03:00:00'),
(83, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 03:00:51', '2025-05-16 03:01:00'),
(84, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 03:13:09', '2025-05-16 03:26:13'),
(85, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 03:29:03', NULL),
(86, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-05-16 06:55:30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bannermenuitems`
--

CREATE TABLE `bannermenuitems` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` int DEFAULT NULL,
  `bannermenu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bannermenuitems`
--

INSERT INTO `bannermenuitems` (`id`, `image`, `link`, `location`, `bannermenu_id`, `created_at`, `updated_at`) VALUES
(6, 'http://127.0.0.1:8000/storage/photos/2/607e0cd2ba3a68161bcbc99e71179c24.png', 'http://127.0.0.1:8000/admin/bannermenuitem/2/create', 1, 2, '2025-05-12 03:00:48', '2025-05-13 01:21:34'),
(7, 'http://127.0.0.1:8000/storage/photos/2/e1123f3241680e57094af88bd1c6675b.png', 'http://127.0.0.1:8000/admin/bannermenuitem/3/create', 1, 3, '2025-05-12 03:37:34', '2025-05-13 01:29:03'),
(9, 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 'http://127.0.0.1:8000/admin/bannermenuitem/4/create', 1, 4, '2025-05-12 03:49:41', '2025-05-13 01:34:50'),
(10, 'http://127.0.0.1:8000/storage/photos/2/12f861c7db39be62e4cb27fbe8aaa459.png', 'http://127.0.0.1:8000/admin/bannermenuitem/4/create', 2, 4, '2025-05-12 03:49:41', '2025-05-13 01:28:00'),
(11, 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 'http://127.0.0.1:8000/admin/bannermenuitem/5/create', 1, 5, '2025-05-12 04:03:04', '2025-05-13 01:52:19'),
(12, 'http://127.0.0.1:8000/storage/photos/2/9924377b70eebde3615863d508ff352e.png', 'http://127.0.0.1:8000/admin/bannermenuitem/6/create', 1, 6, '2025-05-12 04:11:53', '2025-05-13 01:52:50'),
(13, 'http://127.0.0.1:8000/storage/photos/2/6266e05f03ab28d1af9f6dcab5de6c6c.png', 'http://127.0.0.1:8000/1', 1, 7, '2025-05-12 04:12:59', '2025-05-13 01:55:57'),
(14, 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', 'http://127.0.0.1:8000/2', 2, 7, '2025-05-12 04:12:59', '2025-05-13 01:55:57'),
(15, 'http://127.0.0.1:8000/storage/photos/2/c5d3883a7a8533d3172a6386bbf87b84.png', 'http://127.0.0.1:8000/3', 3, 7, '2025-05-12 04:12:59', '2025-05-13 01:55:57'),
(16, 'http://127.0.0.1:8000/storage/photos/2/e1e79e4c6294b601281013b2fb99433b.png', 'http://127.0.0.1:8000/4', 4, 7, '2025-05-12 04:12:59', '2025-05-13 01:55:57'),
(18, 'http://127.0.0.1:8000/storage/photos/2/e1123f3241680e57094af88bd1c6675b.png', 'http://127.0.0.1:8000/4', 1, 1, '2025-05-12 09:09:19', '2025-05-13 01:19:44'),
(19, 'http://127.0.0.1:8000/storage/photos/2/12f861c7db39be62e4cb27fbe8aaa459.png', 'http://127.0.0.1:8000/admin/bannermenuitem/3/create', 2, 3, '2025-05-13 01:26:32', '2025-05-13 01:26:32'),
(20, 'http://127.0.0.1:8000/storage/photos/2/197e8e38f558b24af8e415c2cc7dba8d.png', 'http://127.0.0.1:8000/admin/bannermenuitem/3/create', 3, 3, '2025-05-13 01:26:32', '2025-05-13 01:26:32'),
(21, 'http://127.0.0.1:8000/storage/photos/2/92606e36fe0b41c33b95e18550cfa673.png', 'http://127.0.0.1:8000/admin/bannermenuitem/3/create', 4, 3, '2025-05-13 01:26:32', '2025-05-13 01:26:32'),
(22, 'http://127.0.0.1:8000/storage/photos/2/e1123f3241680e57094af88bd1c6675b.png', 'http://127.0.0.1:8000/admin/bannermenuitem/3/create', 3, 4, '2025-05-13 01:28:32', '2025-05-13 01:34:50'),
(23, 'http://127.0.0.1:8000/storage/photos/2/gratisography-augmented-reality-800x525.jpg', 'http://127.0.0.1:8000/admin/bannermenuitem/3/create', 4, 4, '2025-05-13 01:28:32', '2025-05-13 01:34:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bannermenus`
--

CREATE TABLE `bannermenus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locationbannermenu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bannermenus`
--

INSERT INTO `bannermenus` (`id`, `name`, `slug`, `locationbannermenu_id`, `created_at`, `updated_at`) VALUES
(1, 'banner header top', 'banner-header-top-update-123', 1, '2025-05-09 06:40:30', '2025-05-12 01:51:01'),
(2, '2134', '2134', 2, '2025-05-12 03:00:18', '2025-05-12 03:00:18'),
(3, 'main 2', 'main-2', 3, '2025-05-12 03:37:12', '2025-05-12 03:37:12'),
(4, 'main 3', 'main-3', 4, '2025-05-12 03:40:29', '2025-05-12 03:40:29'),
(5, 'main 4', 'main-4', 5, '2025-05-12 04:02:41', '2025-05-12 04:02:41'),
(6, 'Khuyến mãi hot', 'khuyen-mai-hot', 6, '2025-05-12 04:11:13', '2025-05-12 04:11:13'),
(7, 'Gian hàng ưu đãi', 'gian-hang-uu-dai', 7, '2025-05-12 04:11:26', '2025-05-12 04:11:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `category_parent_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `is_hot`, `category_parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Flash sale giảm đến 50%++', 'flash-sale-giam-den-50', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 1, NULL, '2025-05-08 02:01:29', '2025-05-08 02:02:46'),
(2, 'Hàng cao cấp giảm đến 50%', 'hang-cao-cap-giam-den-50', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, NULL, '2025-05-08 02:01:44', '2025-05-08 02:02:33'),
(3, 'Mua máy lạnh giá chỉ 5.490.000đ', 'mua-may-lanh-gia-chi-5490000d', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 1, NULL, '2025-05-08 02:02:09', '2025-05-08 02:02:09'),
(4, 'Mua lọc nước, tặng lõi lọc', 'mua-loc-nuoc-tang-loi-loc', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, NULL, '2025-05-08 02:02:58', '2025-05-08 02:02:58'),
(5, 'Máy lạnh', 'may-lanh', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 2, NULL, '2025-05-08 02:03:28', '2025-05-08 02:50:33'),
(6, 'Tủ lạnh', 'tu-lanh', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 2, NULL, '2025-05-08 02:03:47', '2025-05-08 02:03:47'),
(7, 'Tivi', 'tivi', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 2, NULL, '2025-05-08 02:04:01', '2025-05-08 02:51:29'),
(8, 'Quạt điều hòa', 'quat-dieu-hoa', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 3, NULL, '2025-05-08 02:04:45', '2025-05-08 02:52:49'),
(9, 'Quạt', 'quat', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 3, NULL, '2025-05-08 02:05:09', '2025-05-08 02:51:14'),
(10, 'Máy xay sinh tố', 'may-xay-sinh-to', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 3, NULL, '2025-05-08 02:05:27', '2025-05-08 02:05:27'),
(11, 'Điện thoại', 'dien-thoai', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 4, NULL, '2025-05-08 02:05:52', '2025-05-08 02:51:56'),
(12, 'Laptop', 'laptop', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 4, NULL, '2025-05-08 02:06:07', '2025-05-08 02:06:07'),
(13, 'Tablet', 'tablet', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 4, NULL, '2025-05-08 02:06:22', '2025-05-08 02:06:22'),
(14, 'Đồng hồ thông minh', 'dong-ho-thong-minh', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 4, NULL, '2025-05-08 02:06:46', '2025-05-08 02:51:01'),
(15, 'Bộ lau nhà', 'bo-lau-nha', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 5, NULL, '2025-05-08 02:07:30', '2025-05-08 02:07:30'),
(16, 'Nồi, bộ nồi', 'noi-bo-noi', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 5, NULL, '2025-05-08 02:07:48', '2025-05-08 02:07:48'),
(17, 'Chảo các loại', 'chao-cac-loai', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 5, NULL, '2025-05-08 02:08:15', '2025-05-08 02:52:15'),
(18, 'Sạc dự phòng', 'sac-du-phong', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 6, NULL, '2025-05-08 02:09:13', '2025-05-08 02:09:13'),
(19, 'Tai nghe', 'tai-nghe', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 6, NULL, '2025-05-08 02:09:25', '2025-05-08 02:09:25'),
(20, 'Loa', 'loa', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 6, NULL, '2025-05-08 02:09:37', '2025-05-08 02:50:48'),
(21, 'Tivi', 'tivi-1', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 7, NULL, '2025-05-08 02:10:07', '2025-05-08 02:10:21'),
(22, 'Máy lạnh', 'may-lanh-1', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 7, NULL, '2025-05-08 02:10:43', '2025-05-08 02:10:43'),
(23, 'Máy giặt', 'may-giat', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 7, NULL, '2025-05-08 02:11:00', '2025-05-08 02:11:00'),
(24, 'Tủ lạnh', 'tu-lanh-1', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 7, NULL, '2025-05-08 02:11:42', '2025-05-08 02:11:42'),
(25, 'Đồng hồ thời trang', 'dong-ho-thoi-trang', NULL, 0, 8, NULL, '2025-05-08 02:12:06', '2025-05-08 02:12:06'),
(26, 'Xe đạp', 'xe-dap', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 8, NULL, '2025-05-08 02:12:16', '2025-05-08 02:12:16'),
(27, 'Camera', 'camera', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 8, NULL, '2025-05-08 02:12:25', '2025-05-08 02:12:25'),
(28, 'Mũ bảo hiểm', 'mu-bao-hiem', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 8, NULL, '2025-05-08 02:12:37', '2025-05-08 02:12:37'),
(29, 'Tư vấn chọn mua', 'tu-van-chon-mua', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 9, NULL, '2025-05-08 02:13:09', '2025-05-08 02:13:09'),
(30, 'Khuyến mãi', 'khuyen-mai', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 9, NULL, '2025-05-08 02:13:19', '2025-05-08 02:13:19'),
(31, 'Tìm địa chỉ cửa hàng', 'tim-dia-chi-cua-hang', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 9, NULL, '2025-05-08 02:13:28', '2025-05-08 02:13:28'),
(32, 'Vệ sinh máy lạnh', 've-sinh-may-lanh', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 10, NULL, '2025-05-08 02:13:51', '2025-05-08 02:13:51'),
(33, 'Thay lõi lọc nước', 'thay-loi-loc-nuoc', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 10, NULL, '2025-05-08 02:14:00', '2025-05-08 03:15:21'),
(34, 'Bảo hiểm Ô tô - Xe máy', 'bao-hiem-o-to-xe-may', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 10, NULL, '2025-05-08 02:14:09', '2025-05-08 03:14:56'),
(35, '1234 update', '1234-update', 'http://127.0.0.1:8000/storage/photos/1/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 1, NULL, '2025-05-12 06:59:00', '2025-05-12 07:02:01'),
(36, '123', '123', 'http://127.0.0.1:8000/storage/photos/1/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 7, NULL, '2025-05-12 07:32:14', '2025-05-12 07:32:14'),
(37, '123', '123-1', 'http://127.0.0.1:8000/storage/photos/shares/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 10, NULL, '2025-05-12 08:37:54', '2025-05-12 08:37:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_parents`
--

CREATE TABLE `category_parents` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_parents`
--

INSERT INTO `category_parents` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Chương trình hot', 'chuong-trinh-hot', NULL, '2025-05-08 01:05:35', '2025-05-08 01:05:35'),
(2, 'Điện tử, điện máy', 'dien-tu-dien-may', NULL, '2025-05-08 01:05:47', '2025-05-08 01:05:47'),
(3, 'Điện gia dụng', 'dien-gia-dung', NULL, '2025-05-08 01:05:56', '2025-05-08 01:05:56'),
(4, 'Điện tử, Viễn thông', 'dien-tu-vien-thong', NULL, '2025-05-08 01:14:10', '2025-05-08 01:14:10'),
(5, 'Đồ gia dụng', 'do-gia-dung', NULL, '2025-05-08 01:14:27', '2025-05-08 01:14:27'),
(6, 'Phụ kiện', 'phu-kien', NULL, '2025-05-08 01:14:36', '2025-05-08 01:14:36'),
(7, 'Máy cũ, trưng bày', 'may-cu-trung-bay', NULL, '2025-05-08 01:14:47', '2025-05-08 01:14:47'),
(8, 'Sản phẩm khác', 'san-pham-khac', NULL, '2025-05-08 01:14:56', '2025-05-08 01:14:56'),
(9, 'Thông tin', 'thong-tin', NULL, '2025-05-08 01:15:05', '2025-05-08 01:15:05'),
(10, 'Dịch vụ tiện ích', 'dich-vu-tien-ich', NULL, '2025-05-08 01:15:23', '2025-05-08 01:15:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locationbannermenus`
--

CREATE TABLE `locationbannermenus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `locationbannermenus`
--

INSERT INTO `locationbannermenus` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'banner header top', 'banner-header-top', '1', '2025-05-09 04:22:50', '2025-05-12 03:33:07'),
(2, 'banner main 1', 'banner-main-1', '1', '2025-05-09 06:48:02', '2025-05-12 03:33:25'),
(3, 'banner main 2', 'banner-main-2', '1', '2025-05-12 03:33:39', '2025-05-12 03:33:39'),
(4, 'banner main 3', 'banner-main-3', '1', '2025-05-12 03:33:52', '2025-05-12 03:33:52'),
(5, 'banner main 4', 'banner-main-4', '1', '2025-05-12 03:34:17', '2025-05-12 03:34:30'),
(6, 'banner main 5', 'banner-main-5', '1', '2025-05-12 03:34:47', '2025-05-12 03:34:47'),
(7, 'banner main 6', 'banner-main-6', '1', '2025-05-12 03:35:01', '2025-05-12 03:35:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locationmenus`
--

CREATE TABLE `locationmenus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `locationmenus`
--

INSERT INTO `locationmenus` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'header', 'header', '1', '2025-05-08 02:28:30', '2025-05-08 02:55:32'),
(2, 'main', 'main', '1', '2025-05-08 02:31:56', '2025-05-08 02:31:56'),
(3, 'footer 1', 'footer-1', '1', '2025-05-08 02:32:24', '2025-05-08 06:37:34'),
(4, 'footer 2', 'footer-2', '1', '2025-05-08 06:38:28', '2025-05-08 06:38:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locationproductmenus`
--

CREATE TABLE `locationproductmenus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `locationproductmenus`
--

INSERT INTO `locationproductmenus` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'product 1', 'product-1', '1', '2025-05-08 04:16:30', '2025-05-08 10:09:21'),
(2, 'product 2', 'product-2', '1', '2025-05-08 04:16:49', '2025-05-08 10:09:41'),
(3, 'product 3', 'product-3', '1', '2025-05-08 04:17:05', '2025-05-08 10:09:54'),
(4, 'Chủ đề', 'chu-de', '1', '2025-05-08 10:09:01', '2025-05-09 02:16:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menuitems`
--

CREATE TABLE `menuitems` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` int DEFAULT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menuitems`
--

INSERT INTO `menuitems` (`id`, `name`, `link`, `location`, `menu_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'tư vấn chọn mua', '/category/tu-van-chon-mua', 1, 1, 29, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(2, 'khuyến mãi', '/category/khuyen-mai', 2, 1, 30, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(3, 'tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 3, 1, 31, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(4, 'mũ bảo hiểm', '/category/mu-bao-hiem', 4, 1, 28, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(5, 'tivi', '/category/tivi-1', 5, 1, 21, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(6, 'máy lạnh', '/category/may-lanh-1', 6, 1, 22, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(7, 'tai nghe', '/category/tai-nghe', 7, 1, 19, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(8, 'Điện thoại', '/category/dien-thoai', 8, 1, 11, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(9, 'laptop', '/category/laptop', 9, 1, 12, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(10, 'tablet', '/category/tablet', 10, 1, 13, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(11, 'Đồng hồ thông minh', '/category/dong-ho-thong-minh', 11, 1, 14, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(12, 'máy lạnh', '/category/may-lanh', 12, 1, 5, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(13, 'tủ lạnh', '/category/tu-lanh', 13, 1, 6, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(14, 'tivi', '/category/tivi', 14, 1, 7, '2025-05-08 02:36:46', '2025-05-08 02:36:46'),
(15, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 1, 2, 25, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(16, 'Xe đạp', '/category/xe-dap', 2, 2, 26, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(17, 'Camera', '/category/camera', 3, 2, 27, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(18, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 4, 2, 28, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(19, 'Tai nghe', '/category/tai-nghe', 5, 2, 19, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(20, 'Loa', '/category/loa', 6, 2, 20, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(21, 'Bộ lau nhà', '/category/bo-lau-nha', 7, 2, 15, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(22, 'Nồi, bộ nồi', '/category/noi-bo-noi', 8, 2, 16, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(23, 'Điện thoại', '/category/dien-thoai', 9, 2, 11, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(24, 'Laptop', '/category/laptop', 10, 2, 12, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(25, 'Đồng hồ thông minh', '/category/dong-ho-thong-minh', 11, 2, 14, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(26, 'Quạt điều hòa', '/category/quat-dieu-hoa', 12, 2, 8, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(27, 'Quạt', '/category/quat', 13, 2, 9, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(28, 'Máy lạnh', '/category/may-lanh', 14, 2, 5, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(29, 'Tủ lạnh', '/category/tu-lanh', 15, 2, 6, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(30, 'Tivi', '/category/tivi', 16, 2, 7, '2025-05-08 02:58:07', '2025-05-08 02:58:07'),
(31, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 3, 32, '2025-05-08 03:46:56', '2025-05-08 03:46:56'),
(32, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 3, 33, '2025-05-08 03:46:56', '2025-05-08 03:46:56'),
(33, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 3, 34, '2025-05-08 03:46:56', '2025-05-08 03:46:56'),
(34, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 4, 3, 29, '2025-05-08 03:46:56', '2025-05-08 03:46:56'),
(35, 'Khuyến mãi', '/category/khuyen-mai', 5, 3, 30, '2025-05-08 03:46:56', '2025-05-08 03:46:56'),
(36, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 6, 3, 31, '2025-05-08 03:46:56', '2025-05-08 03:46:56'),
(37, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 1, 4, 25, '2025-05-08 03:47:18', '2025-05-08 03:47:18'),
(38, 'Xe đạp', '/category/xe-dap', 2, 4, 26, '2025-05-08 03:47:18', '2025-05-08 03:47:18'),
(39, 'Camera', '/category/camera', 3, 4, 27, '2025-05-08 03:47:18', '2025-05-08 03:47:18'),
(40, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 4, 4, 28, '2025-05-08 03:47:18', '2025-05-08 03:47:18'),
(41, 'Tivi', '/category/tivi-1', 5, 4, 21, '2025-05-08 03:47:18', '2025-05-08 03:47:18'),
(42, 'Máy lạnh', '/category/may-lanh-1', 6, 4, 22, '2025-05-08 03:47:18', '2025-05-08 03:47:18'),
(43, 'Máy giặt', '/category/may-giat', 7, 4, 23, '2025-05-08 03:47:18', '2025-05-08 03:47:18'),
(44, 'Tủ lạnh', '/category/tu-lanh-1', 8, 4, 24, '2025-05-08 03:47:18', '2025-05-08 03:47:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locationmenu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `locationmenu_id`, `created_at`, `updated_at`) VALUES
(1, 'Header', 'header', 1, '2025-05-08 02:29:51', '2025-05-08 02:29:51'),
(2, 'Category Main', 'category-main', 2, '2025-05-08 02:56:32', '2025-05-08 02:56:32'),
(3, 'Về công ty', 've-cong-ty', 3, '2025-05-08 03:46:13', '2025-05-08 03:46:13'),
(4, 'Thông tin khác', 'thong-tin-khac', 4, '2025-05-08 03:46:28', '2025-05-08 06:39:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(57, '2014_10_12_000000_create_users_table', 1),
(58, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(59, '2017_09_01_000000_create_authentication_log_table', 1),
(60, '2019_08_19_000000_create_failed_jobs_table', 1),
(61, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(62, '2025_04_15_093417_create_category_parents_table', 1),
(63, '2025_04_15_093440_create_categories_table', 1),
(64, '2025_04_15_093518_create_posts_table', 1),
(65, '2025_04_15_093603_create_attributes_table', 1),
(66, '2025_04_15_093624_create_products_table', 1),
(67, '2025_04_15_093646_create_product_attribute_values_table', 1),
(68, '2025_04_15_093659_create_product_images_table', 1),
(69, '2025_04_15_093709_create_product_variants_table', 1),
(70, '2025_04_15_093728_create_reviews_table', 1),
(71, '2025_04_15_100833_create_orders_table', 1),
(72, '2025_04_15_100928_create_order_items_table', 1),
(73, '2025_04_15_101052_create_payments_table', 1),
(74, '2025_04_25_080342_create_permission_tables', 1),
(75, '2025_05_05_095637_create_locationmenus_table', 1),
(76, '2025_05_05_100355_create_menus_table', 1),
(77, '2025_05_05_112325_create_menuitems_table', 1),
(78, '2025_05_06_084413_create_locationproductmenus_table', 1),
(79, '2025_05_06_084429_create_productmenus_table', 1),
(80, '2025_05_06_084444_create_productmenuitems_table', 1),
(82, '2025_05_08_161906_create_searchs_table', 2),
(83, '2025_05_09_101937_create_locationbannermenus_table', 3),
(84, '2025_05_09_102144_create_bannermenus_table', 3),
(85, '2025_05_09_102201_create_bannermenuitems_table', 3),
(86, '2025_05_15_102632_add_secret_code_to_users', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(15,0) NOT NULL,
  `status` enum('pending','processing','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` enum('pending','paid','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` enum('cod','paypal','credit_card') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `status_review` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(15,0) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','successful','failed','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `method` enum('cod','paypal','credit_card','bank_transfer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `display_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'index dashboard', 'web', 'Read', 'Dashboard', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(2, 'index category parent', 'web', 'Read', 'Category Parent', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(3, 'create category parent', 'web', 'Create', 'Category Parent', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(4, 'edit category parent', 'web', 'Edit', 'Category Parent', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(5, 'delete category parent', 'web', 'Delete', 'Category Parent', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(6, 'index category', 'web', 'Read', 'Category', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(7, 'create category', 'web', 'Create', 'Category', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(8, 'edit category', 'web', 'Edit', 'Category', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(9, 'delete category', 'web', 'Delete', 'Category', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(10, 'index post', 'web', 'Read', 'Post', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(11, 'create post', 'web', 'Create', 'Post', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(12, 'edit post', 'web', 'Edit', 'Post', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(13, 'delete post', 'web', 'Delete', 'Post', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(14, 'index attribute', 'web', 'Read', 'Attribute', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(15, 'create attribute', 'web', 'Create', 'Attribute', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(16, 'edit attribute', 'web', 'Edit', 'Attribute', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(17, 'delete attribute', 'web', 'Delete', 'Attribute', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(18, 'index product', 'web', 'Read', 'Product', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(19, 'create product', 'web', 'Create', 'Product', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(20, 'edit product', 'web', 'Edit', 'Product', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(21, 'delete product', 'web', 'Delete', 'Product', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(22, 'index image', 'web', 'Read', 'Image', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(23, 'index user', 'web', 'Read', 'User', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(24, 'create user', 'web', 'Create', 'User', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(25, 'edit user', 'web', 'Edit', 'User', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(26, 'delete user', 'web', 'Delete', 'User', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(27, 'index role permission', 'web', 'Read', 'Role Permission', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(28, 'create role permission', 'web', 'Create', 'Role Permission', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(29, 'edit role permission', 'web', 'Edit', 'Role Permission', '2025-05-08 01:04:24', '2025-05-08 01:04:24'),
(30, 'delete role permission', 'web', 'Delete', 'Role Permission', '2025-05-08 01:04:24', '2025-05-08 01:04:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` bigint NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `published_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `excerpt`, `content`, `slug`, `image`, `view_count`, `is_hot`, `status`, `published_at`, `category_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Chat GPT là gì? Lợi ích và cách sử dụng ChatGPT tối ưu hiệu quả', 'Chat GPT làm một công cụ trợ lý trên điện thoại hay laptop tương tự như: Siri, Google Assitant,... và được phát triển bởi OpenAI.', '<h3>1Chat GPT l&agrave; g&igrave;?</h3>\r\n\r\n<p>ChatGPT (Chat Generative Pre-training Transformer) l&agrave; một Chatbot do OpenAI ph&aacute;t triển dựa tr&ecirc;n m&ocirc; h&igrave;nh Transformer của Google. Đ&acirc;y l&agrave; một AI (<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/cong-nghe-ai-tren-cac-bi-dien-tu-1238818\" target=\"_blank\">tr&iacute; tuệ nh&acirc;n tạo</a>) gi&uacute;p bạn tạo c&aacute;c cuộc tr&ograve; chuyện tự động v&agrave; trả lời c&aacute;c c&acirc;u hỏi về nhiều chủ đề v&agrave; lĩnh vực kh&aacute;c nhau. Điểm nổi bật l&agrave; khả năng tương t&aacute;c hội thoại tự nhi&ecirc;n.</p>\r\n\r\n<p><img alt=\"ChatGPT sẽ tạo ra tương tác hội thoại như khi bạn nói chuyện với bạn bè\" src=\"https://cdn.tgdd.vn//News/0//Baiviet(2)-730x410.jpg\" /></p>\r\n\r\n<p>ChatGPT sẽ tạo ra tương t&aacute;c hội thoại như khi bạn n&oacute;i chuyện với bạn b&egrave;</p>\r\n\r\n<p>Phi&ecirc;n bản mới nhất của Chat GPT từ OpenAI đ&atilde; c&oacute; những cải tiến vượt trội trong việc hiểu v&agrave; phản hồi ng&ocirc;n ngữ tự nhi&ecirc;n. M&ocirc; h&igrave;nh n&agrave;y đa năng, c&oacute; thể trả lời c&acirc;u hỏi, viết, t&oacute;m tắt, dịch thuật v&agrave; s&aacute;ng tạo nội dung (thơ, code...). Chat GPT đ&oacute;ng vai tr&ograve; quan trọng nhờ khả năng nắm bắt ngữ cảnh, tạo c&acirc;u trả lời mạch lạc v&agrave; kh&ocirc;ng ngừng học hỏi từ người d&ugrave;ng.</p>\r\n\r\n<p>Được đ&agrave;o tạo từ h&agrave;ng triệu văn bản c&ocirc;ng khai, ChatGPT học s&acirc;u về ng&ocirc;n ngữ v&agrave; ngữ nghĩa. Chat GPT được coi l&agrave; một trong những m&ocirc; h&igrave;nh ng&ocirc;n ngữ ti&ecirc;n tiến nhất hiện nay với khả năng tự động học v&agrave; l&agrave;m việc với c&aacute;c loại dữ liệu lớn. Chat GPT đảm nhận tất cả c&aacute;c nhiệm vụ s&aacute;ng tạo v&agrave; nghệ thuật, thiết kế v&agrave; thậm ch&iacute; tạo hoặc gỡ lỗi trong lập tr&igrave;nh.</p>\r\n\r\n<p><img alt=\"Chat GPT tổng hợp thông tin từ vô vàn các nguồn khác nhau và tự đào sâu tìm hiểu nhiều tầng nghĩa từ những thông tin đó\" src=\"https://cdn.tgdd.vn//News/1518107//730x408-730x408.jpg\" /></p>\r\n\r\n<p>Chat GPT tổng hợp th&ocirc;ng tin từ v&ocirc; v&agrave;n c&aacute;c nguồn kh&aacute;c nhau v&agrave; tự đ&agrave;o s&acirc;u t&igrave;m hiểu nhiều tầng nghĩa từ những th&ocirc;ng tin đ&oacute;</p>\r\n\r\n<h3>2C&aacute;ch thức hoạt động của Chat GPT</h3>\r\n\r\n<p>Chat GPT được tinh chỉnh từ GPT-3.5 (hiện tại đ&atilde; c&oacute; phi&ecirc;n bản GPT-4), một m&ocirc; h&igrave;nh ng&ocirc;n ngữ tạo văn bản. N&oacute; đ&atilde; được tối ưu h&oacute;a cho cuộc đối thoại qua việc sử dụng&nbsp;<strong>Học tăng cường từ phản hồi của con người</strong>&nbsp;(Reinforcement Learning from Human Feedback - RLHF) - một phương ph&aacute;p sử dụng c&aacute;c v&iacute; dụ của con người để hướng dẫn m&ocirc; h&igrave;nh đến h&agrave;nh vi mong muốn.</p>\r\n\r\n<p>Chat GPT sử dụng c&aacute;c phương ph&aacute;p ti&ecirc;u d&ugrave;ng hạ tầng, đồng thời n&oacute; cũng lấy dữ liệu từ Internet n&acirc;ng kh&ocirc;ng gian lưu trữ l&ecirc;n&nbsp;<strong>570GB</strong>&nbsp;với v&ocirc; số th&ocirc;ng tin v&agrave;&nbsp;<strong>300 tỷ từ</strong>&nbsp;được &ldquo;kết nạp&rdquo; v&agrave;o hệ thống. Bạn c&oacute; thể hiểu đơn giản như sau:</p>\r\n\r\n<p>Khi bạn đặt c&acirc;u hỏi đầu v&agrave;o cho m&ocirc; h&igrave;nh rằng &ldquo;Một năm c&oacute; bao nhi&ecirc;u th&aacute;ng?&rdquo;, nếu m&ocirc; h&igrave;nh phản hồi sai th&igrave;&nbsp;<strong>đ&aacute;p &aacute;n đ&uacute;ng sẽ được update ngay lập tức</strong>. Từ những th&iacute; nghiệm nhỏ n&agrave;y sẽ gi&uacute;p hệ thống được củng cố v&agrave; dẫn trở n&ecirc;n chuẩn x&aacute;c hơn.</p>\r\n\r\n<p><img alt=\"Cấu trúc hoạt động của ChatGPT vô cùng phức tạp\" src=\"https://cdn.tgdd.vn//News/0//Baiviet(3)-730x410.jpg\" /></p>\r\n\r\n<p>Cấu tr&uacute;c hoạt động của ChatGPT v&ocirc; c&ugrave;ng phức tạp</p>\r\n\r\n<h3>3C&aacute;ch d&ugrave;ng Chat GPT tại Việt Nam hiệu quả</h3>\r\n\r\n<p>Chat GPT đ&atilde; ch&iacute;nh thức hoạt động được ở Việt Nam. Từ ng&agrave;y 02/11/2023, bạn c&oacute; thể đăng k&yacute; v&agrave; sử dụng miễn ph&iacute; ChatGPT tại Việt Nam tr&ecirc;n nền tảng website&nbsp;<a href=\"https://chat.openai.com/auth/login\" target=\"_blank\">chat.openai.com</a>, ứng dụng ChatGPT tr&ecirc;n Android, iOS.</p>\r\n\r\n<p><strong>Tải ứng dụng ChatGPT:</strong></p>\r\n\r\n<ul>\r\n	<li><a href=\"https://play.google.com/store/apps/details?id=com.openai.chatgpt&amp;hl=vi&amp;pli=1\" target=\"_blank\">Android</a></li>\r\n	<li><a href=\"https://apps.apple.com/us/app/chatgpt/id6448311069?l=vi\" target=\"_blank\">iOS</a></li>\r\n</ul>\r\n\r\n<p><strong>Đăng k&yacute; v&agrave; đăng nhập v&agrave;o Chat GPT miễn ph&iacute;</strong></p>\r\n\r\n<p>Bước 1: Truy cập trang web ch&iacute;nh thức của OpenAI tại chat.openai.com</p>\r\n\r\n<p>Bước 2: Nhấp v&agrave;o n&uacute;t &quot;Sign up&quot; v&agrave; điền th&ocirc;ng tin c&aacute; nh&acirc;n bao gồm email v&agrave; mật khẩu</p>\r\n\r\n<p>Bước 3: X&aacute;c nhận email th&ocirc;ng qua li&ecirc;n kết được gửi đến hộp thư</p>\r\n\r\n<p>Bước 4: Ho&agrave;n tất th&ocirc;ng tin c&aacute; nh&acirc;n bổ sung nếu được y&ecirc;u cầu</p>\r\n\r\n<p>Lưu &yacute; cho người d&ugrave;ng Việt Nam: Nếu gặp kh&oacute; khăn khi truy cập, h&atilde;y sử dụng VPN để vượt qua giới hạn địa l&yacute;. Sau khi đăng nhập th&agrave;nh c&ocirc;ng, bạn c&oacute; thể bắt đầu kh&aacute;m ph&aacute; Chat GPT ngay trong giao diện tr&ograve; chuyện trực quan.</p>\r\n\r\n<p><strong>Xem th&ecirc;m:</strong>&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/chat-gpt-la-gi-cach-dang-ky-su-dung-chat-gpt-1518194\" target=\"_blank\">C&aacute;ch đăng k&yacute;, sử dụng Chat GPT tại Việt Nam miễn ph&iacute;</a></p>\r\n\r\n<p><img alt=\"Chat GPT có khả năng \" src=\"https://cdn.tgdd.vn//News/1518107//730x408-1-730x408.jpg\" /></p>\r\n\r\n<p>Chat GPT c&oacute; thể d&ugrave;ng miễn ph&iacute; tại Việt Nam</p>\r\n\r\n<p><strong>C&aacute;ch d&ugrave;ng Prompt Engineering để tối ưu sức mạnh Chat GPT</strong></p>\r\n\r\n<p>Để khai th&aacute;c tối đa sức mạnh của Chat GPT, kỹ thuật đặt c&acirc;u hỏi (Prompt Engineering) rất quan trọng. Vệc x&acirc;y dựng prompt chi tiết v&agrave; r&otilde; r&agrave;ng sẽ mở ra c&aacute;nh cửa đến những phản hồi s&acirc;u sắc v&agrave; hữu &iacute;ch hơn.</p>\r\n\r\n<p><strong>X&aacute;c định r&otilde; bối cảnh:</strong>&nbsp;H&atilde;y cung cấp cho Chat GPT một bức tranh to&agrave;n cảnh về vấn đề bạn đang quan t&acirc;m. Điều n&agrave;y bao gồm lĩnh vực, ng&agrave;nh nghề, mục ti&ecirc;u bạn muốn đạt được, v&agrave; bất kỳ th&ocirc;ng tin nền tảng n&agrave;o li&ecirc;n quan.</p>\r\n\r\n<p><strong>N&ecirc;u r&otilde; y&ecirc;u cầu cụ thể:</strong>&nbsp;Bạn mong đợi Chat GPT sẽ l&agrave;m g&igrave; với th&ocirc;ng tin đ&oacute;? Viết một b&agrave;i luận, t&oacute;m tắt một đoạn văn, so s&aacute;nh c&aacute;c lựa chọn, đưa ra lời khuy&ecirc;n, hay giải th&iacute;ch một kh&aacute;i niệm phức tạp? Sử dụng động từ mạnh mẽ v&agrave; chỉ định r&otilde; h&agrave;nh động bạn muốn AI thực hiện.</p>\r\n\r\n<p><strong>Chỉ định định dạng đầu ra:</strong>&nbsp;Bạn muốn c&acirc;u trả lời được tr&igrave;nh b&agrave;y như thế n&agrave;o? Một danh s&aacute;ch đ&aacute;nh số dễ theo d&otilde;i, một bảng so s&aacute;nh trực quan, c&aacute;c đoạn văn ngắn gọn, hay một hướng dẫn từng bước chi tiết? Việc chỉ định định dạng gi&uacute;p Chat GPT cấu tr&uacute;c th&ocirc;ng tin một c&aacute;ch dễ hiểu v&agrave; ph&ugrave; hợp với mục đ&iacute;ch sử dụng của bạn.</p>\r\n\r\n<p><strong>Điều chỉnh độ s&acirc;u th&ocirc;ng tin:</strong>&nbsp;Sử dụng c&aacute;c cụm từ như &quot;giải th&iacute;ch chi tiết&quot;, &quot;ph&acirc;n t&iacute;ch chuy&ecirc;n s&acirc;u&quot;, &quot;so s&aacute;nh to&agrave;n diện&quot; để y&ecirc;u cầu Chat GPT cung cấp th&ocirc;ng tin ở mức độ bạn mong muốn. Ngược lại, nếu bạn chỉ cần một c&aacute;i nh&igrave;n tổng quan, h&atilde;y sử dụng c&aacute;c cụm từ như &quot;t&oacute;m tắt ngắn gọn&quot;, &quot;giới thiệu chung&quot;.</p>\r\n\r\n<p>V&iacute; dụ:</p>\r\n\r\n<p>Prompt k&eacute;m hiệu quả: &quot;Marketing l&agrave; g&igrave;?&quot;</p>\r\n\r\n<p>Prompt hiệu quả: &quot;Giải th&iacute;ch kh&aacute;i niệm &#39;marketing du k&iacute;ch&#39; l&agrave; g&igrave; v&agrave; cho ba v&iacute; dụ cụ thể về c&aacute;c chiến dịch marketing du k&iacute;ch th&agrave;nh c&ocirc;ng của c&aacute;c c&ocirc;ng ty khởi nghiệp trong lĩnh vực c&ocirc;ng nghệ tại Đ&ocirc;ng Nam &Aacute; trong 2 năm gần đ&acirc;y.&quot;</p>\r\n\r\n<p><img alt=\"ChatGPT đã khả dụng tại Việt Nam từ ngày 11/2 với phiên bản ChatGPT Plus\" src=\"https://cdn.tgdd.vn//News/0//Baiviet(4)-730x410.jpg\" /></p>\r\n\r\n<p>Chat GPT đ&atilde; khả dụng tại Việt Nam từ ng&agrave;y 11/2 với g&oacute;i ChatGPT Plus</p>\r\n\r\n<h3>4Ứng dụng của Chat GPT</h3>\r\n\r\n<p><strong>- Nh&acirc;n c&aacute;ch h&oacute;a cuộc tr&ograve; chuyện:</strong>&nbsp;Chat GPT được thiết kế để hiểu ng&ocirc;n ngữ giao tiếp v&agrave; tham gia v&agrave;o cuộc tr&ograve; chuyện giữa người v&agrave; người. Điều n&agrave;y mang đến trải nghiệm&nbsp;<strong>tương t&aacute;c v&agrave; c&aacute; nh&acirc;n h&oacute;a hơn</strong>&nbsp;so với việc bạn nhập t&igrave;m kiếm tr&ecirc;n Google.</p>\r\n\r\n<p><strong>- Cung cấp c&acirc;u trả lời chuy&ecirc;n s&acirc;u:</strong>&nbsp;Mặc d&ugrave; Google dễ d&agrave;ng cung cấp c&acirc;u trả lời cực nhanh ch&oacute;ng cho c&aacute;c c&acirc;u hỏi thực tế nhưng Chat GPT c&oacute; thể cung cấp c&acirc;u trả lời&nbsp;<strong>chuy&ecirc;n s&acirc;u hơn</strong>&nbsp;để giải th&iacute;ch c&aacute;c chủ đề phức tạp theo c&aacute;ch dễ hiểu.</p>\r\n\r\n<p><strong>- Đưa ra c&aacute;c đề xuất:</strong>&nbsp;Chat GPT c&oacute; thể đưa ra những đề xuất dựa tr&ecirc;n t&ugrave;y chọn v&agrave; mối quan t&acirc;m của người d&ugrave;ng, điều n&agrave;y đặc biệt hữu &iacute;ch với nhu cầu t&igrave;m s&aacute;ch hay phim.</p>\r\n\r\n<p><strong>- S&aacute;ng tạo nội dung:</strong>&nbsp;Chat GPT c&ograve;n hỗ trợ t&igrave;m kiếm nguồn cảm hứng hoặc &yacute; tưởng mới cho c&aacute;c c&ocirc;ng việc li&ecirc;n quan đến s&aacute;ng tạo như l&agrave;m thơ, viết văn, s&aacute;ng t&aacute;c nhạc, thiết kế đồ họa, kiến tr&uacute;c,...</p>\r\n\r\n<p><strong>- Hỗ trợ học ngoại ngữ:</strong>&nbsp;Chat GPT c&oacute; thể hỗ trợ bạn học ngoại ngữ bằng c&aacute;ch tham gia v&agrave;o cuộc tr&ograve; chuyện với bạn bằng ng&ocirc;n ngữ m&agrave; bạn lựa chọn, cung cấp c&aacute;c b&agrave;i học ngữ ph&aacute;p, từ vựng, đồng thời đưa ra phản hồi v&agrave; chỉnh sửa.</p>\r\n\r\n<p><strong>- Dịch thuật:</strong>&nbsp;Chat GPT c&oacute; thể hỗ trợ dịch ng&ocirc;n ngữ trong thời gian thực, cho ph&eacute;p bạn giao tiếp với những người n&oacute;i c&aacute;c ng&ocirc;n ngữ kh&aacute;c nhau th&ocirc;ng qua giao diện tr&ograve; chuyện.</p>\r\n\r\n<p><strong>- Hỗ trợ đưa ra c&aacute;c chẩn đo&aacute;n y tế:</strong>&nbsp;Chat GPT c&oacute; thể hỗ trợ chẩn đo&aacute;n y tế bằng c&aacute;ch đặt c&aacute;c c&acirc;u hỏi c&oacute; li&ecirc;n quan v&agrave; cung cấp th&ocirc;ng tin chi tiết, cũng như đề xuất dựa tr&ecirc;n c&aacute;c triệu chứng v&agrave; tiền sử bệnh của người d&ugrave;ng.</p>\r\n\r\n<p><strong>- Sử dụng cho mục đ&iacute;ch giải tr&iacute;:</strong>&nbsp;Chat GPT cũng dễ d&agrave;ng đưa ra c&aacute;c tr&ograve; chơi, kể chuyện cười hoặc cung cấp c&acirc;u đố đ&aacute;p ứng nhu cầu giải tr&iacute;, thư gi&atilde;n của người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"Bạn có thể hỏi ChatGPT về công thức nấu ăn\" src=\"https://cdn.tgdd.vn//News/0//Baiviet-730x410.jpg\" /></p>\r\n\r\n<p>Bạn c&oacute; thể hỏi Chat GPT về c&ocirc;ng thức nấu ăn</p>\r\n\r\n<h3>5Ưu điểm của Chat GPT</h3>\r\n\r\n<p>Lợi &iacute;ch của Chat GPT</p>\r\n\r\n<p><strong>- Tr&igrave;nh triển khai:</strong>&nbsp;Chat GPT c&oacute; khả năng triển khai tr&ecirc;n nhiều nền tảng, bao gồm cả web, mobile v&agrave; c&aacute;c nền tảng kh&aacute;c.</p>\r\n\r\n<p><strong>- Hỗ trợ nhiều ng&ocirc;n ngữ:</strong>&nbsp;Chat GPT được huấn luyện tr&ecirc;n nhiều ng&ocirc;n ngữ, cho ph&eacute;p hỗ trợ người d&ugrave;ng tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p><strong>- Giải đ&aacute;p c&aacute;c thắc mắc trong mọi lĩnh vực:</strong>&nbsp;Chat GPT c&oacute; thể trả lời hầu hết c&aacute;c c&acirc;u hỏi của người d&ugrave;ng với đa dạng chủ đề kh&aacute;c nhau, bao gồm kiến thức, địa l&yacute;, lịch sử, kinh tế, ch&iacute;nh trị, văn h&oacute;a v&agrave; nhiều hơn thế nữa.</p>\r\n\r\n<p><strong>- Tạo nội dung tự động:</strong>&nbsp;Chat GPT c&oacute; thể sử dụng cho việc tạo nội dung tự động, bao gồm viết b&agrave;i, tạo c&acirc;u chuyện v&agrave; tạo ra c&aacute;c loại nội dung kh&aacute;c.</p>\r\n\r\n<p><strong>- Giải quyết vấn đề hỗ trợ kh&aacute;ch h&agrave;ng:</strong>&nbsp;Chat GPT c&oacute; thể sử dụng để giải quyết vấn đề hỗ trợ kh&aacute;ch h&agrave;ng v&agrave; cung cấp th&ocirc;ng tin cho người d&ugrave;ng một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c, từ đ&oacute; n&acirc;ng cao chất lượng dịch vụ.</p>\r\n\r\n<p><strong>- Tự động ho&aacute; c&aacute;c quy tr&igrave;nh:</strong>&nbsp;Chat GPT c&oacute; thể sử dụng để tự động ho&aacute; v&agrave; giải quyết c&aacute;c t&aacute;c vụ thủ c&ocirc;ng từ đ&oacute; gi&uacute;p tăng năng suất v&agrave; hiệu quả của c&aacute;c doanh nghiệp v&agrave; tổ chức.</p>\r\n\r\n<p><strong>- Ph&acirc;n t&iacute;ch dữ liệu v&agrave; thống k&ecirc;:</strong>&nbsp;Chat GPT c&oacute; thể sử dụng để ph&acirc;n t&iacute;ch dữ liệu v&agrave; thống k&ecirc;, gi&uacute;p c&aacute;c doanh nghiệp v&agrave; tổ chức cải thiện hoạt động v&agrave; quản l&yacute; dữ liệu một c&aacute;ch hiệu quả.</p>\r\n\r\n<p><strong>- Tạo ra c&aacute;c trải nghiệm người d&ugrave;ng tốt hơn:</strong>&nbsp;Chat GPT c&oacute; thể gi&uacute;p tạo ra c&aacute;c trải nghiệm người d&ugrave;ng tốt hơn bằng c&aacute;ch cung cấp th&ocirc;ng tin ch&iacute;nh x&aacute;c v&agrave; nhanh ch&oacute;ng cho người d&ugrave;ng.</p>\r\n\r\n<p><img alt=\"ChatGPT thậm chí có thể giải thích theo nhiều ngữ cảnh và độ tuổi của người sử dụng\" src=\"https://cdn.tgdd.vn//News/0//Baiviet(1)-730x410.jpg\" /></p>\r\n\r\n<p>Chat GPT thậm ch&iacute; c&oacute; thể giải th&iacute;ch theo nhiều ngữ cảnh v&agrave; độ tuổi của người sử dụng</p>\r\n\r\n<p>Nhược điểm của Chat GPT</p>\r\n\r\n<p><strong>- Sự xuất hiện của c&aacute;c phần mềm lừa đảo:</strong>&nbsp;Khi Chat GPT ra đời, một số người d&ugrave;ng c&oacute; &yacute; đồ xấu, đ&atilde; sử dụng khả năng lập tr&igrave;nh của chatbot để tạo ra phần mềm giả mạo với mục đ&iacute;ch tấn c&ocirc;ng v&agrave; đ&aacute;nh cắp th&ocirc;ng tin. Thậm ch&iacute;, Chat GPT c&oacute; thể sử dụng code do ch&iacute;nh m&igrave;nh tạo ra để thực hiện c&aacute;c phương thức lừa đảo tinh vi hơn.</p>\r\n\r\n<p><strong>- Thiếu ch&iacute;nh x&aacute;c:</strong>&nbsp;Chat GPT được huấn luyện tr&ecirc;n cơ sở dữ liệu lớn nhưng vẫn c&ograve;n thiếu ch&iacute;nh x&aacute;c trong một số trường hợp.</p>\r\n\r\n<p><strong>- Xuy&ecirc;n tạc th&ocirc;ng tin:</strong>&nbsp;Chat GPT c&oacute; thể xuy&ecirc;n tạc hoặc sai lầm th&ocirc;ng tin, đặc biệt l&agrave; khi được huấn luyện tr&ecirc;n dữ liệu cũ hoặc kh&ocirc;ng ch&iacute;nh x&aacute;c.</p>\r\n\r\n<p><strong>- Cản trở s&aacute;ng tạo:</strong>&nbsp;Sử dụng Chat GPT c&oacute; thể giảm s&aacute;ng tạo của con người v&igrave; họ c&oacute; thể trở n&ecirc;n qu&aacute; phụ thuộc v&agrave;o m&aacute;y t&iacute;nh để giải quyết c&aacute;c vấn đề.</p>\r\n\r\n<p><strong>- T&aacute;c động đến việc t&igrave;m kiếm th&ocirc;ng tin:</strong>&nbsp;Chat GPT c&oacute; thể t&aacute;c động đến việc t&igrave;m kiếm th&ocirc;ng tin của con người v&igrave; họ c&oacute; thể dễ d&agrave;ng nhận được c&acirc;u trả lời m&agrave; kh&ocirc;ng phải tham gia qu&aacute; tr&igrave;nh t&igrave;m kiếm th&ocirc;ng tin tự nhi&ecirc;n.</p>\r\n\r\n<p><strong>- Tiềm ẩn nguy cơ thay thế một số ng&agrave;nh nghề:</strong>&nbsp;Năng lực bi&ecirc;n tập đ&aacute;ng sợ của Chat GPT v&agrave; c&aacute;c c&ocirc;ng cụ chatbot hiện đại c&oacute; thể dễ d&agrave;ng đe dọa c&ocirc;ng việc của một số ng&agrave;nh như: copywriter, lập tr&igrave;nh vi&ecirc;n, bi&ecirc;n tập vi&ecirc;n, bi&ecirc;n kịch, thiết kế đồ họa,...</p>\r\n\r\n<p><img alt=\"Bạn cũng cần cẩn trọng và kiểm tra lại thông tin khi sử dụng ChatGPT\" src=\"https://cdn.tgdd.vn//News/0//Baiviet(5)-730x410.jpg\" /></p>\r\n\r\n<p>Bạn cũng cần cẩn trọng v&agrave; kiểm tra lại th&ocirc;ng tin khi sử dụng ChatGPT</p>\r\n\r\n<h3>6Sự kh&aacute;c biệt giữa Chat GPT so với c&aacute;c c&ocirc;ng cụ chat bot kh&aacute;c</h3>\r\n\r\n<p>Một số c&ocirc;ng cụ t&igrave;m kiếm kh&aacute;c như&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/google-bard-la-gi-tim-hieu-ve-google-bard-1544092\" target=\"_blank\">Google Bard</a>,&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/google-gemini-la-gi-thong-tin-ve-ai-moi-nhat-cua-1564006\" target=\"_blank\">Gemini AI</a>,&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/copilot-la-gi-lam-duoc-gi-1574847\" target=\"_blank\">Copilot</a>... phản hồi nhu cầu người d&ugrave;ng bằng c&aacute;ch lập chỉ mục c&aacute;c trang web tr&ecirc;n Internet để gi&uacute;p người d&ugrave;ng t&igrave;m được th&ocirc;ng tin m&agrave; m&igrave;nh muốn. Trong khi, Chat GPT sẽ&nbsp;<strong>kh&ocirc;ng c&oacute; khả năng t&igrave;m kiếm nguồn th&ocirc;ng tin tr&ecirc;n Internet</strong>.</p>\r\n\r\n<p>Thay v&agrave;o đ&oacute;, n&oacute; sẽ tận dụng những g&igrave; m&agrave; m&igrave;nh đ&atilde; học được trong qu&aacute; tr&igrave;nh được đ&agrave;o tạo, nghi&ecirc;n cứu để phản hồi lại người d&ugrave;ng. Tuy nhi&ecirc;n, điều n&agrave;y cũng c&oacute; thể xảy ra lỗi v&agrave; độ ch&iacute;nh x&aacute;c kh&ocirc;ng đạt tuyệt đối.</p>\r\n\r\n<p>Điểm kh&aacute;c biệt kh&aacute;c c&oacute; thể kể đến l&agrave; c&aacute;ch m&agrave;&nbsp;<strong>Chat GPT được đ&agrave;o tạo chuy&ecirc;n biệt</strong>. N&oacute; c&oacute; thể hiểu được mong muốn của con người th&ocirc;ng qua c&acirc;u hỏi v&agrave; c&oacute; những c&acirc;u trả lời hữu &iacute;ch, trung thực.</p>\r\n\r\n<h3>7T&aacute;c hại của Chat GPT đối với đời sống</h3>\r\n\r\n<p>Mặc d&ugrave; ChatGPT v&agrave; c&aacute;c m&ocirc; h&igrave;nh ng&ocirc;n ngữ lớn kh&aacute;c mang lại nhiều lợi &iacute;ch, ch&uacute;ng cũng tiềm ẩn một số t&aacute;c hại cần được c&acirc;n nhắc:</p>\r\n\r\n<p>1. Th&ocirc;ng tin sai lệch v&agrave; thiếu ch&iacute;nh x&aacute;c: ChatGPT c&oacute; thể tạo ra th&ocirc;ng tin kh&ocirc;ng ch&iacute;nh x&aacute;c hoặc bịa đặt, đặc biệt khi được hỏi về c&aacute;c chủ đề phức tạp hoặc kh&ocirc;ng c&oacute; đủ dữ liệu huấn luyện. Người d&ugrave;ng cần kiểm chứng th&ocirc;ng tin từ c&aacute;c nguồn đ&aacute;ng tin cậy kh&aacute;c.</p>\r\n\r\n<p>2. Mối lo ngại về đạo văn: Do khả năng tạo văn bản giống con người, ChatGPT c&oacute; thể bị lạm dụng để đạo văn. Sinh vi&ecirc;n c&oacute; thể sử dụng n&oacute; để viết b&agrave;i luận, l&agrave;m b&agrave;i tập về nh&agrave; m&agrave; kh&ocirc;ng thực sự hiểu b&agrave;i.</p>\r\n\r\n<p>3. Thi&ecirc;n kiến v&agrave; ph&acirc;n biệt đối xử: V&igrave; được huấn luyện tr&ecirc;n dữ liệu từ internet, ChatGPT c&oacute; thể học v&agrave; t&aacute;i tạo c&aacute;c định kiến x&atilde; hội, dẫn đến ph&acirc;n biệt đối xử về chủng tộc, giới t&iacute;nh, t&ocirc;n gi&aacute;o, ...</p>\r\n\r\n<p>4. Mất việc l&agrave;m: Sự ph&aacute;t triển của c&aacute;c m&ocirc; h&igrave;nh ng&ocirc;n ngữ lớn như ChatGPT c&oacute; thể dẫn đến mất việc l&agrave;m trong một số ng&agrave;nh nghề, đặc biệt l&agrave; những c&ocirc;ng việc li&ecirc;n quan đến viết l&aacute;ch, dịch thuật, v&agrave; nhập liệu.</p>\r\n\r\n<p>5. Lạm dụng: ChatGPT c&oacute; thể bị lạm dụng để tạo ra tin giả, th&ocirc;ng tin sai lệch, tuy&ecirc;n truyền, hoặc thậm ch&iacute; lừa đảo. Việc qu&aacute; phụ thuộc v&agrave;o ChatGPT c&oacute; thể l&agrave;m giảm khả năng tư duy, s&aacute;ng tạo v&agrave; giải quyết vấn đề của con người.</p>\r\n\r\n<p>6. Hạn chế về hiểu biết s&acirc;u: ChatGPT chỉ c&oacute; thể xử l&yacute; th&ocirc;ng tin dựa tr&ecirc;n dữ liệu đ&atilde; được huấn luyện. N&oacute; kh&ocirc;ng c&oacute; khả năng hiểu biết s&acirc;u sắc về thế giới thực, cảm x&uacute;c, hoặc &yacute; thức như con người.</p>\r\n\r\n<p>7. Kh&oacute; khăn trong việc x&aacute;c định nguồn gốc th&ocirc;ng tin: Do ChatGPT c&oacute; thể tạo ra nội dung giống con người, n&ecirc;n rất kh&oacute; để ph&acirc;n biệt giữa nội dung do con người tạo ra v&agrave; nội dung do ChatGPT tạo ra. Điều n&agrave;y c&oacute; thể g&acirc;y kh&oacute; khăn trong việc kiểm chứng th&ocirc;ng tin v&agrave; x&aacute;c định nguồn gốc.</p>\r\n\r\n<p>8. Vấn đề bảo mật: Dữ liệu được sử dụng để huấn luyện v&agrave; tương t&aacute;c với ChatGPT c&oacute; thể gặp rủi ro về bảo mật v&agrave; quyền ri&ecirc;ng tư.</p>\r\n\r\n<p>Để giảm thiểu t&aacute;c hại của ChatGPT, người d&ugrave;ng cần sử dụng một c&aacute;ch c&oacute; tr&aacute;ch nhiệm, kiểm chứng th&ocirc;ng tin từ nhiều nguồn, v&agrave; nhận thức r&otilde; về những hạn chế của c&ocirc;ng nghệ n&agrave;y. C&aacute;c nh&agrave; ph&aacute;t triển cũng cần nỗ lực để cải thiện m&ocirc; h&igrave;nh, giảm thiểu thi&ecirc;n kiến, v&agrave; tăng cường t&iacute;nh bảo mật.</p>', 'chat-gpt-la-gi-loi-ich-va-cach-su-dung-chatgpt-toi-uu-hieu-qua', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, 'published', '2025-05-08 12:00:00', 30, 1, NULL, '2025-05-08 02:18:07', '2025-05-13 02:01:53'),
(2, 'Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', 'Máy xay đậu nành là thiết bị hữu ích giúp người dùng chế biến được nhiều thức uống bổ dưỡng như các loại sữa hạt, sữa ngũ cốc, xay sinh tố, nấu cháo, nấu súp,...', '<h3>1<a href=\"https://dienmayxanh.com/may-lam-sua-hat/bluestone-blb-6031?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=titleproduct\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt đa năng BlueStone BLB-6031</a>&nbsp;</h3>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt đa năng BlueStone BLB-6031 sở hữu thiết kế hiện đại, m&agrave;u sắc trang nh&atilde;, ph&ugrave; hợp với nhiều kh&ocirc;ng gian bếp Việt. Sản phẩm nổi bật với c&ocirc;ng suất xay 800W v&agrave; c&ocirc;ng suất nấu 800W, kết hợp lưỡi dao inox 8 c&aacute;nh sắc b&eacute;n, tốc độ quay mạnh mẽ gi&uacute;p xay nhuyễn thực phẩm dễ d&agrave;ng, kể cả c&aacute;c loại hạt cứng.</p>\r\n\r\n<p>Cối xay bằng thủy tinh borosilicate cao cấp, chịu nhiệt tốt, dung t&iacute;ch sử dụng 1.75 l&iacute;t th&iacute;ch hợp để nấu sữa hạt cho gia đ&igrave;nh 2 - 4 người. M&aacute;y c&ograve;n t&iacute;ch hợp 9 chương tr&igrave;nh nấu tự động như: sữa đậu n&agrave;nh, ch&aacute;o, sinh tố, hầm canh... v&agrave; 9 mức tốc độ xay linh hoạt, k&egrave;m chức năng hẹn giờ l&ecirc;n đến 12 tiếng tiện lợi.</p>\r\n\r\n<p>Bảng điều khiển cảm ứng hiện đại với m&agrave;n h&igrave;nh LED, hướng dẫn tiếng Việt r&otilde; r&agrave;ng, dễ thao t&aacute;c cho cả người lớn tuổi. Ngo&agrave;i ra,&nbsp;<a href=\"https://www.dienmayxanh.com/may-lam-sua-hat-bluestone\" target=\"_blank\">m&aacute;y l&agrave;m sữa hạt BlueStone</a>&nbsp;c&ograve;n c&oacute; t&iacute;nh năng tự vệ sinh v&agrave; ch&acirc;n đế chống trượt, đảm bảo an to&agrave;n trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/2322/303381/Slider/bluestone-blb-6031638212985105229234.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/303381/Slider/bluestone-blb-6031638212985106628751.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/303381/Slider/bluestone-blb-6031638212985107578723.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/303381/Slider/bluestone-blb-6031638212985111358792.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/303381/Slider/bluestone-blb-6031638212985113318692.jpg\" style=\"height:60px; width:90px\" />\r\n	<p>Xem th&ecirc;m<br />\r\n	7&nbsp;h&igrave;nh</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat/bluestone-blb-6031?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=303381\"><img alt=\"Máy làm sữa hạt đa năng BlueStone BLB-6031\" src=\"https://cdn.tgdd.vn/Products/Images/2322/303381/bluestone-blb-6031-040423-104702-600x600.jpg\" /></a></p>\r\n\r\n<p><img alt=\"label template\" src=\"https://cdnv2.tgdd.vn/mwg-static/common/Campaign/f9/be/f9be92f4b97a04f236a8d404ec6989d0.png\" style=\"height:20px; width:20px\" />Trả chậm 3 th&aacute;ng</p>\r\n\r\n<h3>M&aacute;y l&agrave;m sữa hạt đa năng BlueStone BLB-6031</h3>\r\n\r\n<p>1.890.000₫</p>\r\n\r\n<p>2.599.000₫</p>\r\n\r\n<p>&nbsp;-27%</p>\r\n\r\n<p>Qu&agrave;&nbsp;<strong>300.000₫</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat/bluestone-blb-6031?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=303381\" target=\"_blank\">Xem chi tiết</a></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>❝</strong>X&acirc;y cực nhuyễn, ko thấy x&aacute;c hạt. M&aacute;y x&acirc;y v&agrave; nghỉ theo chu k&igrave; n&ecirc;n &iacute;t ồn<strong>❞</strong></p>\r\n\r\n<p><strong>Tri Nguyen</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&igrave;nh mới sử dụng được thời gian &iacute;t n&ecirc;n chưa đ&aacute;nh gi&aacute; ch&iacute;nh x&aacute;c được. Hiện tại d&ugrave;ng thấy cũng ổn<strong>❞</strong></p>\r\n\r\n<p><strong>C&ocirc; Hiền</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>Ok<strong>❞</strong></p>\r\n\r\n<p><strong>Phung Dang</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&igrave;nh mua m&aacute;y l&uacute;c sales n&ecirc;n rẻ được một t&iacute;. Ship h&agrave;ng rất nhanh. Nh&igrave;n chung trải nghiệm tốt, chất lượng xứng đ&aacute;ng với tầm gi&aacute; rẻ so với nhiều mẫu kh&aacute;c.Nhiều b&aacute;c cứ bảo m&aacute;y ồn nhưng m&igrave;nh thấy n&oacute; chạy như m&aacute;y sinh tố th&ocirc;i m&agrave;. Bật l&ecirc;n cho n&oacute; tự chạy xong m&igrave;nh đi l&agrave;m việc kh&aacute;c thấy kh&aacute; nh&agrave;n. Cực khoản vệ sinh m&aacute;y th&ocirc;i.M&igrave;nh thử c&aacute;c chức năng th&igrave; thấy chức năng l&agrave;m sữa hạt xay kĩ v&agrave; mịn hơn chức năng l&agrave;m sữa đậu n&agrave;nh. Nh&igrave;n chung sản phầm tốt. C&oacute; vấn đề g&igrave; sẽ quay lại đ&acirc;y viết tiếp<strong>❞</strong></p>\r\n\r\n<p><strong>Hanh Hoang</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>X&acirc;y cực nhuyễn, ko thấy x&aacute;c hạt. M&aacute;y x&acirc;y v&agrave; nghỉ theo chu k&igrave; n&ecirc;n &iacute;t ồn<strong>❞</strong></p>\r\n\r\n<p><strong>Tri Nguyen</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&igrave;nh mới sử dụng được thời gian &iacute;t n&ecirc;n chưa đ&aacute;nh gi&aacute; ch&iacute;nh x&aacute;c được. Hiện tại d&ugrave;ng thấy cũng ổn<strong>❞</strong></p>\r\n\r\n<p><strong>C&ocirc; Hiền</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>Ok<strong>❞</strong></p>\r\n\r\n<p><strong>Phung Dang</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&igrave;nh mua m&aacute;y l&uacute;c sales n&ecirc;n rẻ được một t&iacute;. Ship h&agrave;ng rất nhanh. Nh&igrave;n chung trải nghiệm tốt, chất lượng xứng đ&aacute;ng với tầm gi&aacute; rẻ so với nhiều mẫu kh&aacute;c.Nhiều b&aacute;c cứ bảo m&aacute;y ồn nhưng m&igrave;nh thấy n&oacute; chạy như m&aacute;y sinh tố th&ocirc;i m&agrave;. Bật l&ecirc;n cho n&oacute; tự chạy xong m&igrave;nh đi l&agrave;m việc kh&aacute;c thấy kh&aacute; nh&agrave;n. Cực khoản vệ sinh m&aacute;y th&ocirc;i.M&igrave;nh thử c&aacute;c chức năng th&igrave; thấy chức năng l&agrave;m sữa hạt xay kĩ v&agrave; mịn hơn chức năng l&agrave;m sữa đậu n&agrave;nh. Nh&igrave;n chung sản phầm tốt. C&oacute; vấn đề g&igrave; sẽ quay lại đ&acirc;y viết tiếp<strong>❞</strong></p>\r\n\r\n<p><strong>Hanh Hoang</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>2<a href=\"https://dienmayxanh.com/may-lam-sua-hat/tefal-bl967b66?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=titleproduct\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt đa năng Tefal BL967B66</a>&nbsp;</h3>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt đa năng Tefal BL967B66 c&oacute; thiết kế hiện đại, sắc x&aacute;m đậm tinh tế mang đậm phong c&aacute;ch ch&acirc;u &Acirc;u, l&agrave; điểm nhấn nổi bật cho kh&ocirc;ng gian bếp. M&aacute;y hoạt động mạnh mẽ với c&ocirc;ng suất xay 1000W, c&ocirc;ng suất nấu 1300W, t&iacute;ch hợp lưỡi dao th&eacute;p kh&ocirc;ng gỉ 6 c&aacute;nh ứng dụng c&ocirc;ng nghệ Powelix, gi&uacute;p xay nhuyễn mịn c&aacute;c loại hạt, kể cả hạt cứng v&agrave; thực phẩm đ&ocirc;ng lạnh.</p>\r\n\r\n<p>Cối xay l&agrave;m bằng thủy tinh chịu nhiệt cao cấp, dung t&iacute;ch tổng 1.75 l&iacute;t, ph&ugrave; hợp để nấu sữa hoặc s&uacute;p cho gia đ&igrave;nh từ 4 - 5 người. Chất liệu cối gi&uacute;p dễ vệ sinh, kh&ocirc;ng b&aacute;m m&ugrave;i thực phẩm v&agrave; chịu nhiệt tốt khi sử dụng ở c&ocirc;ng suất cao.</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat-tefal\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt Tefal</a>&nbsp;được t&iacute;ch hợp đến 12 chương tr&igrave;nh nấu tự động như: sữa đậu n&agrave;nh, sinh tố, kem, s&uacute;p n&oacute;ng, tr&agrave; thảo mộc,&hellip; Đối với chương tr&igrave;nh l&agrave;m sữa đậu n&agrave;nh, chỉ n&ecirc;n sử dụng tối đa 1 l&iacute;t nước với &lt;= 70 gr hạt đậu n&agrave;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/2322/247536/Slider/vi-vn-tefal-bl967b66-270821-0514-1020x570-1020x570.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/247536/Slider/tefal-bl967b66-270821-0514303.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/247536/Slider/tefal-bl967b66-270821-0514304.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/247536/Slider/tefal-bl967b66-270821-0514305.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/247536/Slider/tefal-bl967b66-270821-0514316.jpg\" style=\"height:60px; width:90px\" />\r\n	<p>Xem th&ecirc;m<br />\r\n	5&nbsp;h&igrave;nh</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat/tefal-bl967b66?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=247536\"><img alt=\"Máy làm sữa hạt đa năng Tefal BL967B66\" src=\"https://cdn.tgdd.vn/Products/Images/2322/247536/tefal-bl967b66-151021-114713-600x600.jpg\" /></a></p>\r\n\r\n<p><img alt=\"label template\" src=\"https://cdnv2.tgdd.vn/mwg-static/common/Campaign/40/40/40409df50151a792be44c25b647323e3.png\" style=\"height:20px; width:20px\" />Tặng m&aacute;y vắt cam</p>\r\n\r\n<h3>M&aacute;y l&agrave;m sữa hạt đa năng Tefal BL967B66</h3>\r\n\r\n<p>2.690.000₫</p>\r\n\r\n<p>3.500.000₫</p>\r\n\r\n<p>&nbsp;-23%</p>\r\n\r\n<p>Qu&agrave;&nbsp;<strong>300.000₫</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat/tefal-bl967b66?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=247536\" target=\"_blank\">Xem chi tiết</a></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>❝</strong>Tốt<strong>❞</strong></p>\r\n\r\n<p><strong>Phạm Minh Ho&agrave;ng</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&aacute;y l&agrave;m hạt ok nha mn, n&ecirc;n mua, sữa l&agrave;m ra mịn uống thơm ngon<strong>❞</strong></p>\r\n\r\n<p><strong>Nga</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>X&acirc;y rất mịn, hoạt động tốt<strong>❞</strong></p>\r\n\r\n<p><strong>Linh</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&aacute;y chạy tốt, xay hạt min, sữa ngon<strong>❞</strong></p>\r\n\r\n<p><strong>C&ocirc; Thắm</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>Tốt<strong>❞</strong></p>\r\n\r\n<p><strong>Phạm Minh Ho&agrave;ng</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&aacute;y l&agrave;m hạt ok nha mn, n&ecirc;n mua, sữa l&agrave;m ra mịn uống thơm ngon<strong>❞</strong></p>\r\n\r\n<p><strong>Nga</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>X&acirc;y rất mịn, hoạt động tốt<strong>❞</strong></p>\r\n\r\n<p><strong>Linh</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&aacute;y chạy tốt, xay hạt min, sữa ngon<strong>❞</strong></p>\r\n\r\n<p><strong>C&ocirc; Thắm</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>3<a href=\"https://dienmayxanh.com/may-lam-sua-hat/may-lam-sua-hat-da-nang-rapido-rhb-800dm?utm_flashsale=1?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=titleproduct\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt đa năng Rapido RHB-800DM</a>&nbsp;</h3>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt đa năng Rapido RHB-800DM sở hữu thiết kế nhỏ gọn, trọng lượng nhẹ chỉ 1.62 kg c&ugrave;ng tay cầm chắc chắn, dễ d&agrave;ng di chuyển v&agrave; ph&ugrave; hợp với nhiều kh&ocirc;ng gian bếp hiện đại. M&aacute;y hoạt động với c&ocirc;ng suất xay 150W v&agrave; c&ocirc;ng suất nấu 800W, kết hợp lưỡi dao inox 304 sắc b&eacute;n, gi&uacute;p xay nhuyễn mịn c&aacute;c loại hạt v&agrave; thực phẩm một c&aacute;ch hiệu quả.</p>\r\n\r\n<p>Cối xay được l&agrave;m từ th&eacute;p kh&ocirc;ng gỉ bền đẹp, dung t&iacute;ch 1.2 l&iacute;t, ph&ugrave; hợp để nấu sữa hoặc s&uacute;p cho gia đ&igrave;nh nhỏ từ 2&ndash;3 người. Chất liệu cối gi&uacute;p dễ vệ sinh, kh&ocirc;ng b&aacute;m m&ugrave;i thực phẩm v&agrave; an to&agrave;n cho sức khỏe.</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat-rapido\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt Rapido</a>&nbsp;t&iacute;ch hợp 8 chương tr&igrave;nh nấu tự động như: sữa đậu n&agrave;nh, sinh tố, ch&aacute;o dinh dưỡng, nấu chậm, giữ ấm, đun nước, c&ugrave;ng chức năng tự l&agrave;m sạch, đ&aacute;p ứng đa dạng nhu cầu chế biến của người d&ugrave;ng.</p>\r\n\r\n<p>Lưu &yacute;: Để sữa nấu sữa đậu n&agrave;nh được mịn hơn n&ecirc;n sơ chế trước khi tiến h&agrave;nh nấu bằng c&aacute;ch t&aacute;ch vỏ hạt v&agrave; c&oacute; thời gian ng&acirc;m ủ cho hạt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/2322/323129/Slider/323129-1020x570.jpg\" /><img src=\"https://cdn.tgdd.vn/dmx2016/Content/images/icon-yt.png\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/323129/Slider/may-lam-sua-hat-da-nang-rapido-rhb-800dm638527482564090968-1020x570.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/323129/Slider/may-lam-sua-hat-da-nang-rapido-rhb-800dm638527482562920964.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/323129/Slider/may-lam-sua-hat-da-nang-rapido-rhb-800dm638527482565050957.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/323129/Slider/may-lam-sua-hat-da-nang-rapido-rhb-800dm638527482566091011.jpg\" style=\"height:60px; width:90px\" />\r\n	<p>Xem th&ecirc;m<br />\r\n	7&nbsp;h&igrave;nh</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat/may-lam-sua-hat-da-nang-rapido-rhb-800dm?utm_flashsale=1?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=323129\"><img alt=\"Máy làm sữa hạt đa năng Rapido RHB-800DM\" src=\"https://cdn.tgdd.vn/Products/Images/2322/323129/may-lam-sua-hat-da-nang-rapido-rhb-800dm-060824-114335-600x600.jpg\" /></a></p>\r\n\r\n<p><img alt=\"label template\" src=\"https://cdnv2.tgdd.vn/mwg-static/common/Campaign/f9/be/f9be92f4b97a04f236a8d404ec6989d0.png\" style=\"height:20px; width:20px\" />Trả chậm 3 th&aacute;ng</p>\r\n\r\n<h3>M&aacute;y l&agrave;m sữa hạt đa năng Rapido RHB-800DM</h3>\r\n\r\n<p>1.090.000₫</p>\r\n\r\n<p>1.560.000₫</p>\r\n\r\n<p>&nbsp;-30%</p>\r\n\r\n<p>Qu&agrave;&nbsp;<strong>300.000₫</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat/may-lam-sua-hat-da-nang-rapido-rhb-800dm?utm_flashsale=1?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=323129\" target=\"_blank\">Xem chi tiết</a></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>❝</strong>L&agrave;m sữa mịn<strong>❞</strong></p>\r\n\r\n<p><strong>Chi Thường</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>Sản phẩm tốt dễ sử dụng<strong>❞</strong></p>\r\n\r\n<p><strong>Đạt</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&aacute;y tốt, dễ sử dụng<strong>❞</strong></p>\r\n\r\n<p><strong>Nguyễn Thiphương Th&uacute;y</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>Rất tốt<strong>❞</strong></p>\r\n\r\n<p><strong>Anh Th&agrave;nh</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>L&agrave;m sữa mịn<strong>❞</strong></p>\r\n\r\n<p><strong>Chi Thường</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>Sản phẩm tốt dễ sử dụng<strong>❞</strong></p>\r\n\r\n<p><strong>Đạt</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>M&aacute;y tốt, dễ sử dụng<strong>❞</strong></p>\r\n\r\n<p><strong>Nguyễn Thiphương Th&uacute;y</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><strong>❝</strong>Rất tốt<strong>❞</strong></p>\r\n\r\n<p><strong>Anh Th&agrave;nh</strong>&nbsp;- InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>4<a href=\"https://dienmayxanh.com/may-lam-sua-hat/may-lam-sua-hat-da-nang-sunhouse-shd5261?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=titleproduct\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt đa năng Sunhouse SHD5261</a>&nbsp;</h3>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt đa năng Sunhouse SHD5261 sở hữu thiết kế nhỏ gọn, hiện đại với t&ocirc;ng m&agrave;u trắng - x&aacute;m trang nh&atilde;, ph&ugrave; hợp với nhiều kh&ocirc;ng gian bếp. M&aacute;y hoạt động với c&ocirc;ng suất 400W, t&iacute;ch hợp lưỡi dao 8 c&aacute;nh bằng th&eacute;p kh&ocirc;ng gỉ sắc b&eacute;n, gi&uacute;p xay nhuyễn mịn c&aacute;c loại hạt v&agrave; thực phẩm.</p>\r\n\r\n<p>Cối xay được l&agrave;m từ thủy tinh chịu lực v&agrave; chịu nhiệt tốt, dung t&iacute;ch 1 l&iacute;t, ph&ugrave; hợp để nấu sữa hoặc s&uacute;p cho gia đ&igrave;nh nhỏ từ 2 - 3 người. Chất liệu cối gi&uacute;p dễ vệ sinh, kh&ocirc;ng b&aacute;m m&ugrave;i thực phẩm v&agrave; an to&agrave;n cho sức khỏe.</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat-sunhouse\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt Sunhouse</a>&nbsp;t&iacute;ch hợp 8 chương tr&igrave;nh nấu tự động như ngũ cốc, sữa đậu, ch&aacute;o hạt, s&uacute;p, tr&agrave;, giữ ấm, sữa lắc v&agrave; sinh tố đ&aacute;p ứng đa dạng nhu cầu chế biến của người d&ugrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/2322/325224/Slider/may-lam-sua-hat-da-nang-sunhouse-shd5261638672883384362380.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/325224/Slider/may-lam-sua-hat-da-nang-sunhouse-shd5261638672883385472389.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/325224/Slider/may-lam-sua-hat-da-nang-sunhouse-shd5261638672883386362390.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/325224/Slider/may-lam-sua-hat-da-nang-sunhouse-shd5261638672883387262393.jpg\" style=\"height:60px; width:90px\" /></li>\r\n	<li><img src=\"https://cdn.tgdd.vn/Products/Images/2322/325224/Slider/may-lam-sua-hat-da-nang-sunhouse-shd5261638672883389262402.jpg\" style=\"height:60px; width:90px\" />\r\n	<p>Xem th&ecirc;m<br />\r\n	7&nbsp;h&igrave;nh</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat/may-lam-sua-hat-da-nang-sunhouse-shd5261?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=325224\"><img alt=\"Máy làm sữa hạt đa năng Sunhouse SHD5261\" src=\"https://cdn.tgdd.vn/Products/Images/2322/325224/may-lam-sua-hat-da-nang-sunhouse-shd5261-090724-103920-600x600.jpg\" /></a></p>\r\n\r\n<p><img alt=\"label template\" src=\"https://cdnv2.tgdd.vn/mwg-static/common/Campaign/f9/be/f9be92f4b97a04f236a8d404ec6989d0.png\" style=\"height:20px; width:20px\" />Trả chậm 3 th&aacute;ng</p>\r\n\r\n<h3>M&aacute;y l&agrave;m sữa hạt đa năng Sunhouse SHD5261</h3>\r\n\r\n<p>1.490.000₫</p>\r\n\r\n<p>1.860.000₫</p>\r\n\r\n<p>&nbsp;-19%</p>\r\n\r\n<p>Qu&agrave;&nbsp;<strong>300.000₫</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Xem đặc điểm nổi bật</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat/may-lam-sua-hat-da-nang-sunhouse-shd5261?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=325224\" target=\"_blank\">Xem chi tiết</a></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h3>5<a href=\"https://dienmayxanh.com/may-lam-sua-hat/may-xay-nau-da-nang-kangaroo-kg175hb1?itm_source=knh&amp;itm_medium=shortcode&amp;itm_content=titleproduct\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt đa năng Kangaroo KG175HB1</a>&nbsp;</h3>\r\n\r\n<p>M&aacute;y xay nấu đa năng Kangaroo KG175HB1 sở hữu thiết kế chắc chắn, sang trọng. M&aacute;y được trang bị lưỡi dao 3 lớp 8 c&aacute;nh bằng th&eacute;p kh&ocirc;ng gỉ, c&ocirc;ng suất xay 800W, c&ocirc;ng suất nấu 900W, động cơ mạnh mẽ với lực xoắn v&agrave; tốc độ l&ecirc;n tới 28.000 v&ograve;ng/ph&uacute;t, gi&uacute;p xay nhuyễn mịn c&aacute;c loại thực phẩm một c&aacute;ch nhanh ch&oacute;ng v&agrave; hiệu quả.</p>\r\n\r\n<p>Cối xay bằng thủy tinh cao cấp, dung t&iacute;ch tổng 1.75 l&iacute;t, ph&ugrave; hợp để nấu sữa hoặc s&uacute;p cho gia đ&igrave;nh từ 4 - 5 người. Chất liệu cối gi&uacute;p dễ vệ sinh, kh&ocirc;ng b&aacute;m m&ugrave;i thực phẩm v&agrave; an to&agrave;n cho sức khỏe.</p>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lam-sua-hat-kangaroo\" target=\"_blank\">M&aacute;y l&agrave;m sữa hạt Kangaroo</a>&nbsp;t&iacute;ch hợp 11 chương tr&igrave;nh nấu tự động v&agrave; 9 tốc độ xay, đ&aacute;p ứng đa dạng nhu cầu chế biến của người d&ugrave;ng. Ngo&agrave;i ra, m&aacute;y c&ograve;n hỗ trợ chức năng hẹn giờ l&ecirc;n đến 12 tiếng, tiện lợi cho việc chuẩn bị m&oacute;n ăn theo lịch tr&igrave;nh c&aacute; nh&acirc;n.</p>\r\n\r\n<p>M&aacute;y được trang bị bảng điều khiển cảm ứng hiện đại với m&agrave;n h&igrave;nh LED, hỗ trợ ng&ocirc;n ngữ Anh - Việt, gi&uacute;p người d&ugrave;ng dễ d&agrave;ng thao t&aacute;c v&agrave; t&ugrave;y chỉnh c&aacute;c chức năng. Ngo&agrave;i ra, sản phẩm c&ograve;n c&oacute; t&iacute;nh năng chỉ hoạt động khi cối được lắp đ&uacute;ng khớp với th&acirc;n m&aacute;y v&agrave; ch&acirc;n đế chống trượt, đảm bảo an to&agrave;n trong qu&aacute; tr&igrave;nh sử dụng.</p>', 'may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 1, 'published', '2025-05-08 12:00:00', 34, 1, NULL, '2025-05-08 02:19:20', '2025-05-08 02:19:20'),
(3, 'Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', '1', '<p>`1234567890</p>', '1', NULL, 0, 1, 'published', '2025-05-09 12:00:00', 30, 1, NULL, '2025-05-09 01:11:05', '2025-05-09 01:11:05'),
(4, '12345', '12345', '<p>123456</p>', '12345', NULL, 0, 1, 'published', '2025-05-10 12:00:00', 34, 1, NULL, '2025-05-09 01:11:32', '2025-05-09 01:11:32'),
(5, '1234', '324', '2132132', '1234', NULL, 0, 1, 'published', '2025-06-04 12:00:00', 30, 1, NULL, '2025-05-12 07:03:44', '2025-05-12 07:03:44'),
(6, '123321', '212132', '<p>1232</p>', '123321', NULL, 0, 1, 'published', '2025-06-04 12:00:00', 34, 2, NULL, '2025-05-12 08:39:47', '2025-05-12 08:39:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productmenuitems`
--

CREATE TABLE `productmenuitems` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` int DEFAULT NULL,
  `productmenu_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productmenuitems`
--

INSERT INTO `productmenuitems` (`id`, `name`, `link`, `location`, `productmenu_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 1, 1, 25, '2025-05-08 04:19:08', '2025-05-08 04:19:08'),
(2, 'Xe đạp', '/category/xe-dap', 2, 1, 26, '2025-05-08 04:19:08', '2025-05-08 04:19:08'),
(3, 'Camera', '/category/camera', 3, 1, 27, '2025-05-08 04:19:09', '2025-05-08 04:19:09'),
(4, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 4, 1, 28, '2025-05-08 04:19:09', '2025-05-08 04:19:09'),
(5, 'Sạc dự phòng', '/category/sac-du-phong', 5, 1, 18, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(6, 'Tai nghe', '/category/tai-nghe', 6, 1, 19, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(7, 'Loa', '/category/loa', 7, 1, 20, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(8, 'Bộ lau nhà', '/category/bo-lau-nha', 8, 1, 15, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(9, 'Nồi, bộ nồi', '/category/noi-bo-noi', 9, 1, 16, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(10, 'Chảo các loại', '/category/chao-cac-loai', 10, 1, 17, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(11, 'Điện thoại', '/category/dien-thoai', 11, 1, 11, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(12, 'Laptop', '/category/laptop', 12, 1, 12, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(13, 'Tablet', '/category/tablet', 13, 1, 13, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(14, 'Đồng hồ thông minh', '/category/dong-ho-thong-minh', 14, 1, 14, '2025-05-08 04:20:24', '2025-05-08 04:20:24'),
(15, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 1, 2, 25, '2025-05-08 07:02:44', '2025-05-08 07:02:44'),
(16, 'Xe đạp', '/category/xe-dap', 2, 2, 26, '2025-05-08 07:02:44', '2025-05-08 07:02:44'),
(17, 'Camera', '/category/camera', 3, 2, 27, '2025-05-08 07:02:44', '2025-05-08 07:02:44'),
(18, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 4, 2, 28, '2025-05-08 07:02:44', '2025-05-08 07:02:44'),
(19, 'Tivi', '/category/tivi-1', 9, 2, 21, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(20, 'Máy lạnh', '/category/may-lanh-1', 10, 2, 22, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(21, 'Máy giặt', '/category/may-giat', 11, 2, 23, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(22, 'Tủ lạnh', '/category/tu-lanh-1', 12, 2, 24, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(23, 'Sạc dự phòng', '/category/sac-du-phong', 13, 2, 18, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(24, 'Tai nghe', '/category/tai-nghe', 14, 2, 19, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(25, 'Loa', '/category/loa', 15, 2, 20, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(26, 'Bộ lau nhà', '/category/bo-lau-nha', 16, 2, 15, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(27, 'Nồi, bộ nồi', '/category/noi-bo-noi', 17, 2, 16, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(28, 'Chảo các loại', '/category/chao-cac-loai', 18, 2, 17, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(29, 'Điện thoại', '/category/dien-thoai', 19, 2, 11, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(30, 'Laptop', '/category/laptop', 20, 2, 12, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(31, 'Tablet', '/category/tablet', 21, 2, 13, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(32, 'Đồng hồ thông minh', '/category/dong-ho-thong-minh', 22, 2, 14, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(33, 'Quạt điều hòa', '/category/quat-dieu-hoa', 23, 2, 8, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(34, 'Quạt', '/category/quat', 24, 2, 9, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(35, 'Máy xay sinh tố', '/category/may-xay-sinh-to', 25, 2, 10, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(36, 'Máy lạnh', '/category/may-lanh', 26, 2, 5, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(37, 'Tủ lạnh', '/category/tu-lanh', 27, 2, 6, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(38, 'Tivi', '/category/tivi', 28, 2, 7, '2025-05-08 07:03:52', '2025-05-08 07:03:52'),
(39, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 29, 2, 32, '2025-05-08 07:04:13', '2025-05-08 07:04:13'),
(40, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 30, 2, 33, '2025-05-08 07:04:13', '2025-05-08 07:04:13'),
(41, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 31, 2, 34, '2025-05-08 07:04:13', '2025-05-08 07:04:13'),
(42, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 35, 2, 29, '2025-05-08 07:04:49', '2025-05-08 07:04:49'),
(43, 'Khuyến mãi', '/category/khuyen-mai', 36, 2, 30, '2025-05-08 07:04:49', '2025-05-08 07:04:49'),
(44, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 37, 2, 31, '2025-05-08 07:04:49', '2025-05-08 07:04:49'),
(45, 'Flash sale giảm đến 50%++', '/category/flash-sale-giam-den-50', 62, 2, 1, '2025-05-08 07:04:49', '2025-05-08 07:04:49'),
(46, 'Hàng cao cấp giảm đến 50%', '/category/hang-cao-cap-giam-den-50', 63, 2, 2, '2025-05-08 07:04:49', '2025-05-08 07:04:49'),
(47, 'Mua máy lạnh giá chỉ 5.490.000đ', '/category/mua-may-lanh-gia-chi-5490000d', 64, 2, 3, '2025-05-08 07:04:49', '2025-05-08 07:04:49'),
(48, 'Mua lọc nước, tặng lõi lọc', '/category/mua-loc-nuoc-tang-loi-loc', 65, 2, 4, '2025-05-08 07:04:49', '2025-05-08 07:04:49'),
(49, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 1, 3, 25, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(50, 'Xe đạp', '/category/xe-dap', 2, 3, 26, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(51, 'Camera', '/category/camera', 3, 3, 27, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(52, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 4, 3, 28, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(53, 'Tivi', '/category/tivi-1', 5, 3, 21, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(54, 'Máy lạnh', '/category/may-lanh-1', 6, 3, 22, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(55, 'Máy giặt', '/category/may-giat', 7, 3, 23, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(56, 'Tủ lạnh', '/category/tu-lanh-1', 8, 3, 24, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(57, 'Sạc dự phòng', '/category/sac-du-phong', 9, 3, 18, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(58, 'Tai nghe', '/category/tai-nghe', 10, 3, 19, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(59, 'Loa', '/category/loa', 11, 3, 20, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(60, 'Bộ lau nhà', '/category/bo-lau-nha', 12, 3, 15, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(61, 'Nồi, bộ nồi', '/category/noi-bo-noi', 13, 3, 16, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(62, 'Chảo các loại', '/category/chao-cac-loai', 14, 3, 17, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(63, 'Quạt điều hòa', '/category/quat-dieu-hoa', 15, 3, 8, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(64, 'Quạt', '/category/quat', 16, 3, 9, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(65, 'Máy xay sinh tố', '/category/may-xay-sinh-to', 17, 3, 10, '2025-05-08 08:51:42', '2025-05-08 08:51:42'),
(66, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 1, 4, 34, '2025-05-08 10:11:58', '2025-05-08 10:11:58'),
(67, 'Khuyến mãi', '/category/khuyen-mai', 2, 4, 30, '2025-05-08 10:11:58', '2025-05-08 10:11:58'),
(68, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 1, 5, 34, '2025-05-08 10:17:41', '2025-05-08 10:17:41'),
(69, 'Khuyến mãi', '/category/khuyen-mai', 2, 5, 30, '2025-05-08 10:17:41', '2025-05-08 10:17:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productmenus`
--

CREATE TABLE `productmenus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locationproductmenu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productmenus`
--

INSERT INTO `productmenus` (`id`, `name`, `slug`, `locationproductmenu_id`, `created_at`, `updated_at`) VALUES
(1, 'Khuyến mãi Online', 'khuyen-mai-online', 1, '2025-05-08 04:17:43', '2025-05-08 04:17:43'),
(2, 'Gợi ý cho bạn', 'goi-y-cho-ban', 2, '2025-05-08 04:17:57', '2025-05-08 04:17:57'),
(3, 'Sản Phẩm Đặc Quyền', 'san-pham-dac-quyen', 3, '2025-05-08 04:18:07', '2025-05-08 06:48:39'),
(4, 'Khuyễn mãi', 'khuyen-mai', 4, '2025-05-08 10:10:23', '2025-05-08 10:16:40'),
(5, 'Mạng xã hội Điện máy XANH', 'mang-xa-hoi-dien-may-xanh', 4, '2025-05-08 10:16:55', '2025-05-08 10:16:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold` int UNSIGNED NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `category_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `slug`, `image`, `sold`, `is_hot`, `description`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'NIS-C09R2T28', 'Máy lạnh Nagakawa Inverter 1 HP NIS-C09R2T28', 'nis-c09r2t28', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, '<p>Đ&aacute;nh gi&aacute; chi tiết m&aacute;y lạnh Nagakawa Inverter 1 HP NIS-C09R2T28<br />\r\nM&aacute;y lạnh Nagakawa Inverter 1 HP NIS-C09R2T28&nbsp;c&oacute; khả năng l&agrave;m lạnh nhanh nhưng vẫn đảm bảo được hiệu quả tiết kiệm điện. Hơn nữa, mẫu m&aacute;y lạnh n&agrave;y c&ograve;n c&oacute; thể h&uacute;t ẩm độc lập, gi&uacute;p căn ph&ograve;ng trở n&ecirc;n kh&ocirc; tho&aacute;ng cho những ng&agrave;y trời ẩm ướt.</p>\r\n\r\n<p>Thiết kế<br />\r\nD&agrave;n lạnh:</p>\r\n\r\n<p>Được thiết kế&nbsp;h&igrave;nh chữ nhật nằm ngang&nbsp;quen thuộc với chất liệu vỏ nhựa cao cấp v&agrave; sở hữu gam&nbsp;m&agrave;u trắng tinh tế.</p>\r\n\r\n<p>D&agrave;n n&oacute;ng:</p>\r\n\r\n<p>- Được thiết kế&nbsp;h&igrave;nh hộp chữ nhật&nbsp;với chất liệu vỏ nhựa bền bỉ.</p>\r\n\r\n<p>-&nbsp;L&aacute; tản nhiệt bằng nh&ocirc;m được phủ lớp Golden Fin&nbsp;c&oacute; khả năng chống ăn m&ograve;n tốt, gi&uacute;p tăng độ bền cho m&aacute;y trong suốt thời gian hoạt động.</p>\r\n\r\n<p>- Cả d&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng của&nbsp;m&aacute;y lạnh Nagakawa&nbsp;đều&nbsp;sử dụng ống dẫn gas được l&agrave;m bằng đồng, cho khả năng l&agrave;m lạnh nhanh v&agrave; s&acirc;u.</p>\r\n\r\n<p>- M&aacute;y lạnh&nbsp;sử dụng gas R32&nbsp;th&acirc;n thiện với m&ocirc;i trường v&agrave; mang lại hiệu quả l&agrave;m m&aacute;t tối ưu.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>C&ocirc;ng nghệ l&agrave;m lạnh<br />\r\n-&nbsp;M&aacute;y lạnh&nbsp;sở hữu&nbsp;c&ocirc;ng suất 1 HP, đ&aacute;p ứng khả năng l&agrave;m lạnh cho những căn ph&ograve;ng c&oacute; diện t&iacute;ch&nbsp;dưới 15m&sup2;.</p>\r\n\r\n<p>-&nbsp;Chế độ l&agrave;m lạnh nhanh Turbo: Động cơ m&aacute;y n&eacute;n sẽ hoạt động với c&ocirc;ng suất tối đa, gi&uacute;p nhiệt độ trong căn ph&ograve;ng được hạ nhanh ch&oacute;ng đến mức nhiệt độ m&agrave; người d&ugrave;ng c&agrave;i đặt, nhờ đ&oacute; người d&ugrave;ng&nbsp;cảm thấy m&aacute;t lạnh gần như ngay lập tức&nbsp;sau khi k&iacute;ch hoạt chế độ n&agrave;y.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>Cơ chế thổi gi&oacute;<br />\r\nCảm biến nhiệt độ I Feel: Cho ph&eacute;p người d&ugrave;ng c&oacute; thể tự động điều chỉnh chế độ hoạt động của m&aacute;y lạnh tại vị tr&iacute; remote nhờ bộ phận cảm biến được t&iacute;ch hợp, từ đ&oacute; gi&uacute;p người d&ugrave;ng&nbsp;cảm thấy m&aacute;t mẻ v&agrave; thoải m&aacute;i d&ugrave; ngồi bất k&igrave; vị tr&iacute; n&agrave;o gần remote m&aacute;y lạnh&nbsp;trong căn ph&ograve;ng.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>C&aacute;c c&ocirc;ng nghệ tiết kiệm điện<br />\r\n-&nbsp;C&ocirc;ng nghệ Inverter: C&oacute; khả năng điều chỉnh linh hoạt v&ograve;ng quay m&aacute;y n&eacute;n, gi&uacute;p m&aacute;y lạnh&nbsp;duy tr&igrave; nhiệt độ ổn định&nbsp;b&ecirc;n trong căn ph&ograve;ng m&agrave; vẫn&nbsp;ti&ecirc;u thụ điện năng &iacute;t nhất&nbsp;c&oacute; thể.</p>\r\n\r\n<p>-&nbsp;Chức năng tiết kiệm năng lượng (Economy): Hỗ trợ m&aacute;y lạnh c&oacute; khả năng&nbsp;tiết kiệm điện đến mức tối ưu, g&oacute;p phần l&agrave;m giảm chi ph&iacute; tiền điện mỗi th&aacute;ng cho người sử dụng.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>Khả năng lọc kh&ocirc;ng kh&iacute; - sức khoẻ<br />\r\nM&agrave;ng lọc 6 trong 1: Được cấu tạo từ 6 tấm lọc gồm c&oacute; Photocatalyst, Ion Silver, Active Carbon, Catechin, Vitamin C v&agrave; Catalyst, nhờ đ&oacute; mang lại khả năng&nbsp;lọc sạch bụi bẩn v&agrave; c&aacute;c chất g&acirc;y dị ứng tối ưu, đồng thời&nbsp;khử m&ugrave;i h&ocirc;i hiệu quả, trả lại&nbsp;bầu kh&ocirc;ng kh&iacute; tươi m&aacute;t&nbsp;cho căn ph&ograve;ng, thậm ch&iacute; c&ograve;n&nbsp;hỗ trợ l&agrave;m đẹp da&nbsp;cho người sử dụng.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>Tiện &iacute;ch<br />\r\n-&nbsp;Hẹn giờ bật tắt m&aacute;y: C&oacute; khả năng hẹn giờ bật hoặc tắt m&aacute;y l&ecirc;n đến 24 tiếng, gi&uacute;p người d&ugrave;ng&nbsp;kiểm so&aacute;t thời gian sử dụng m&aacute;y lạnh, tiện lợi cho việc sử dụng v&agrave;o ban đ&ecirc;m.</p>\r\n\r\n<p>-&nbsp;Tự khởi động lại khi c&oacute; điện: C&oacute; khả năng tự khởi động lại khi xảy ra t&igrave;nh trạng c&uacute;p điện đột ngột, m&agrave; người d&ugrave;ng kh&ocirc;ng cần phải c&agrave;i đặt lại chế độ l&agrave;m lạnh như ban đầu.</p>\r\n\r\n<p>-&nbsp;Chế độ c&agrave;i đặt y&ecirc;u th&iacute;ch I-set:&nbsp;M&aacute;y lạnh Nagakawa Inverter&nbsp;n&agrave;y c&oacute; khả năng ghi nhớ c&agrave;i đặt y&ecirc;u th&iacute;ch của người sử dụng, từ đ&oacute;&nbsp;giảm bớt thao t&aacute;c v&agrave; thời gian c&agrave;i đặt&nbsp;m&aacute;y lạnh mỗi khi d&ugrave;ng.</p>\r\n\r\n<p>-&nbsp;Chế độ vận h&agrave;nh khi ngủ:&nbsp;M&aacute;y lạnh Nagakawa 1 HP&nbsp;n&agrave;y c&oacute; thể tự động tăng nhiệt độ v&agrave;o ban đ&ecirc;m,&nbsp;tr&aacute;nh g&acirc;y cảm gi&aacute;c lạnh buốt&nbsp;v&agrave; gi&uacute;p cho người d&ugrave;ng c&oacute; được giấc ngủ ngon hơn.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>T&oacute;m lại, m&aacute;y lạnh Nagakawa Inverter 1 HP NIS-C09R2T28 ph&ugrave; hợp cho mọi gia đ&igrave;nh hiện nay khi c&oacute; nhu cầu l&agrave;m m&aacute;t trong căn ph&ograve;ng nhỏ diện t&iacute;ch dưới 15m&sup2;. Hơn nữa, chiếc m&aacute;y lạnh n&agrave;y rất th&iacute;ch hợp cho những ai c&oacute; sức khỏe nhạy cảm khi nằm trong ph&ograve;ng m&aacute;y lạnh nhờ trang bị chế độ hoạt động khi ngủ v&agrave; bộ lọc 6 trong 1.&nbsp;</p>', 26, NULL, '2025-05-08 02:27:41', '2025-05-16 04:05:01'),
(2, 'GC-12IS35', 'Máy lạnh Casper Inverter 1.5 HP GC-12IS35', 'gc-12is35', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 1, '<p><em>19.990.00019.990.000</em></p>', 25, NULL, '2025-05-08 03:54:05', '2025-05-08 03:56:33'),
(3, '1', '1', '1', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 1, '<p>1</p>', 25, NULL, '2025-05-08 03:55:45', '2025-05-08 04:05:42'),
(4, '2', '2', '2', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, '<p>2</p>', 25, NULL, '2025-05-08 03:56:14', '2025-05-08 04:05:11'),
(5, '3', '3', '3', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>3</p>', 25, NULL, '2025-05-08 03:57:59', '2025-05-08 03:57:59'),
(6, '4', '4', '4', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, '<p>4</p>', 25, NULL, '2025-05-08 03:58:58', '2025-05-08 03:58:58'),
(7, '5', '5', '5', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>5</p>', 25, NULL, '2025-05-08 03:59:33', '2025-05-08 03:59:33'),
(8, '6', '6', '6', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 0, NULL, 25, NULL, '2025-05-08 04:00:13', '2025-05-08 04:00:13'),
(9, '7', '7', '7', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>7</p>', 25, NULL, '2025-05-08 04:00:51', '2025-05-08 04:00:51'),
(10, '8', '8', '8', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>8</p>', 25, NULL, '2025-05-08 04:01:32', '2025-05-08 04:01:32'),
(11, '9', '9', '9', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 0, '<p>9</p>', 25, NULL, '2025-05-08 04:02:18', '2025-05-08 04:02:18'),
(12, '10', '10', '10', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 1, '<p>10</p>', 25, NULL, '2025-05-08 04:03:04', '2025-05-08 04:03:04'),
(13, '11', '11', '11', 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', 0, 0, '<p>11</p>', 25, NULL, '2025-05-08 04:03:50', '2025-05-13 04:47:09'),
(14, '12', '12', '12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>12</p>', 25, NULL, '2025-05-08 04:04:48', '2025-05-08 04:04:48'),
(15, '13', '13 Đồng hồ thời trang Đồng hồ thời trang Đồng hồ thời trang Đồng hồ thời trang Đồng hồ thời trang', '13', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>13</p>', 25, NULL, '2025-05-08 04:48:27', '2025-05-08 09:12:12'),
(16, '23', '232', '23', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>123</p>', 20, NULL, '2025-05-12 07:51:49', '2025-05-16 04:08:33'),
(17, '123', 'anhntph43180@fpt.edu12341243125245.vn', '123', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, '<p>123r</p>', 24, NULL, '2025-05-12 08:02:03', '2025-05-16 04:09:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `product_id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 3, 14, '12', '2025-05-08 03:55:45', '2025-05-08 04:05:42'),
(2, 2, 15, 'do', '2025-05-08 03:56:33', '2025-05-08 03:56:33'),
(3, 1, 13, '12', '2025-05-08 03:57:07', '2025-05-16 04:05:01'),
(4, 5, 12, '3', '2025-05-08 03:57:59', '2025-05-08 03:57:59'),
(5, 7, 13, '5', '2025-05-08 03:59:33', '2025-05-08 03:59:33'),
(6, 8, 1, '6', '2025-05-08 04:00:13', '2025-05-08 04:00:13'),
(7, 9, 12, '7', '2025-05-08 04:00:51', '2025-05-08 04:00:51'),
(8, 11, 15, '9', '2025-05-08 04:02:18', '2025-05-08 04:02:18'),
(9, 13, 13, '11', '2025-05-08 04:03:50', '2025-05-13 04:47:09'),
(10, 14, 12, '12', '2025-05-08 04:04:48', '2025-05-08 04:04:48'),
(11, 15, 13, '13', '2025-05-08 04:48:27', '2025-05-08 09:12:12'),
(12, 16, 14, '1231', '2025-05-12 07:51:49', '2025-05-16 04:08:33'),
(13, 17, 14, '1234', '2025-05-12 08:02:03', '2025-05-16 04:09:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525.jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525(1).jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525(2).jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 1, '2025-05-08 02:27:41', '2025-05-08 02:27:41'),
(2, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525.jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525(1).jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525(2).jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 2, '2025-05-08 03:54:47', '2025-05-08 03:54:47'),
(3, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 3, '2025-05-08 03:55:45', '2025-05-08 03:55:45'),
(4, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 4, '2025-05-08 03:56:14', '2025-05-08 03:56:14'),
(5, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525.jpg\"]', 5, '2025-05-08 03:57:59', '2025-05-08 03:57:59'),
(6, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 6, '2025-05-08 03:58:58', '2025-05-08 03:58:58'),
(7, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 15, '2025-05-08 04:48:27', '2025-05-08 04:48:27'),
(8, '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/pngtree-flower-jpg-vector-png-image_6886192.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/gratisography-augmented-reality-800x525.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1e79e4c6294b601281013b2fb99433b.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/c5d3883a7a8533d3172a6386bbf87b84.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1123f3241680e57094af88bd1c6675b.png\"]', 17, '2025-05-12 08:02:03', '2025-05-16 04:09:20'),
(9, '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/607e0cd2ba3a68161bcbc99e71179c24.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/197e8e38f558b24af8e415c2cc7dba8d.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/9924377b70eebde3615863d508ff352e.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/92606e36fe0b41c33b95e18550cfa673.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/pngtree-flower-jpg-vector-png-image_6886192.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/gratisography-augmented-reality-800x525.jpg\"]', 13, '2025-05-13 04:43:35', '2025-05-13 04:47:09'),
(10, '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/9924377b70eebde3615863d508ff352e.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/c5d3883a7a8533d3172a6386bbf87b84.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1123f3241680e57094af88bd1c6675b.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/pngtree-flower-jpg-vector-png-image_6886192.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/gratisography-augmented-reality-800x525.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1e79e4c6294b601281013b2fb99433b.png\"]', 16, '2025-05-16 04:08:33', '2025-05-16 04:08:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `price_old` decimal(20,0) NOT NULL,
  `stock_quantity` int UNSIGNED DEFAULT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `product_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`id`, `name`, `price`, `price_old`, `stock_quantity`, `status`, `product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1 hp', 4990000, 8990000, 10, 'published', 1, NULL, '2025-05-08 02:27:41', '2025-05-16 04:05:01'),
(2, '2 hp', 6990000, 10990000, 11, 'published', 1, NULL, '2025-05-08 02:27:41', '2025-05-16 04:05:01'),
(3, '1 hp', 6590000, 9290000, 11, 'published', 2, NULL, '2025-05-08 03:54:05', '2025-05-08 03:56:33'),
(4, '2.5 hp', 15390000, 19990000, 12, 'published', 2, NULL, '2025-05-08 03:54:05', '2025-05-08 03:56:33'),
(5, '1', 1, 1, 1, 'draft', 3, NULL, '2025-05-08 03:55:45', '2025-05-08 04:05:42'),
(6, '2', 2, 2, 2, 'draft', 4, NULL, '2025-05-08 03:56:14', '2025-05-08 04:05:11'),
(7, '3', 3, 3, 3, 'draft', 5, NULL, '2025-05-08 03:57:59', '2025-05-08 03:57:59'),
(8, '4', 4, 4, 4, 'draft', 6, NULL, '2025-05-08 03:58:58', '2025-05-08 03:58:58'),
(9, '5', 5, 5, 5, 'draft', 7, NULL, '2025-05-08 03:59:33', '2025-05-08 03:59:33'),
(10, '6', 6, 6, 6, 'draft', 8, NULL, '2025-05-08 04:00:13', '2025-05-08 04:00:13'),
(11, '7', 7, 7, 7, 'draft', 9, NULL, '2025-05-08 04:00:51', '2025-05-08 04:00:51'),
(12, '8', 8, 8, 8, 'draft', 10, NULL, '2025-05-08 04:01:32', '2025-05-08 04:01:32'),
(13, '9', 9, 9, 9, 'draft', 11, NULL, '2025-05-08 04:02:18', '2025-05-08 04:02:18'),
(14, '10', 110, 10, 10, 'draft', 12, NULL, '2025-05-08 04:03:04', '2025-05-08 04:03:04'),
(15, '11', 11, 11, 11, 'published', 13, NULL, '2025-05-08 04:03:50', '2025-05-13 04:47:09'),
(16, '12', 12, 12, 12, 'draft', 14, NULL, '2025-05-08 04:04:48', '2025-05-08 04:04:48'),
(17, '13', 13, 13, 13, 'draft', 15, NULL, '2025-05-08 04:48:27', '2025-05-08 09:12:12'),
(18, '123', 321, 123, 123, 'published', 16, NULL, '2025-05-12 07:51:49', '2025-05-16 04:08:33'),
(19, '123', 32, 123, 32, 'published', 17, NULL, '2025-05-12 08:02:03', '2025-05-16 04:09:20'),
(20, '342', 432, 43, 234, 'published', 13, NULL, '2025-05-13 04:43:35', '2025-05-13 04:47:09'),
(21, '234', 43, 234, 43, 'published', 13, NULL, '2025-05-13 04:43:35', '2025-05-13 04:47:09'),
(22, '321', 123, 1000000000000, 123, 'draft', 17, NULL, '2025-05-16 03:49:41', '2025-05-16 04:09:20'),
(23, '222', 123, 32132, 123, 'published', 17, NULL, '2025-05-16 03:56:06', '2025-05-16 04:09:20'),
(24, '12333', 123, 321123, 123321, 'draft', 17, NULL, '2025-05-16 03:56:06', '2025-05-16 04:09:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-05-08 01:04:24', '2025-05-08 01:04:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `searchs`
--

CREATE TABLE `searchs` (
  `id` bigint UNSIGNED NOT NULL,
  `search` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `searchs`
--

INSERT INTO `searchs` (`id`, `search`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'tim kiem', 1, '2025-05-08 09:44:10', '2025-05-08 09:44:10'),
(2, '123', 1, '2025-05-08 09:46:04', '2025-05-08 09:46:04'),
(3, '123456', NULL, '2025-05-08 09:46:04', '2025-05-08 09:46:04'),
(4, '1345', NULL, '2025-05-08 09:55:37', '2025-05-08 09:55:37'),
(5, '12346', NULL, '2025-05-08 10:00:58', '2025-05-08 10:00:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `image`, `phone`, `birthday`, `remember_token`, `secret_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '2025-05-16 01:09:59', '$2y$10$qhx7ZlobqFJ11Nh9AFrTH.xWtAYHR5NwQBy1P5IaAhWb6teZ.1S2W', NULL, 'http://127.0.0.1:8000/storage/photos/shares/gratisography-augmented-reality-800x525.jpg', NULL, NULL, NULL, NULL, NULL, '2025-05-08 01:04:25', '2025-05-15 02:40:24'),
(2, 'anhnt', 'anhnt@gmail.com', '2025-05-15 09:30:14', '$2y$10$Bg6e62TlfTlCvDHX2HAIZe7rQcOLYVSSyQ/PveJYMAOsBfteNKI3u', 'Tiên Phương, Chương Mỹ, Hà Nội', 'http://127.0.0.1:8000/storage/photos/1/pngtree-flower-jpg-vector-png-image_6886192.png', '0348022004', '2025-05-12', 'Xek1bSFVWjkPF7XBQdeJvGgR4fQzRaaoD1MA1G3D9oFnrdeN8a5pnyBcL2dP', NULL, NULL, '2025-05-12 08:21:24', '2025-05-12 08:21:24'),
(44, 'Nguyễn Thế Anh', 'nguyentheanh260204@gmail.com', '2025-05-16 02:33:50', '$2y$10$Qhuf6mkqHibrfV5qXOeWcO8RYsfXiUDQaFsVe2y6hcMIetHCfoRPm', 'Tiên Phương, Chương Mỹ, Hà Nội', 'storage/avatar/TCPtCmKloQHFGrRAKvxHhIxT3HH5HR0fM27tvXT2.png', '0348022004', '2025-05-01', NULL, NULL, '2025-05-16 03:32:15', '2025-05-16 02:33:34', '2025-05-16 03:32:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `authentication_log`
--
ALTER TABLE `authentication_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authentication_log_authenticatable_type_authenticatable_id_index` (`authenticatable_type`,`authenticatable_id`);

--
-- Chỉ mục cho bảng `bannermenuitems`
--
ALTER TABLE `bannermenuitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bannermenuitems_bannermenu_id_foreign` (`bannermenu_id`);

--
-- Chỉ mục cho bảng `bannermenus`
--
ALTER TABLE `bannermenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bannermenus_locationbannermenu_id_foreign` (`locationbannermenu_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_category_parent_id_foreign` (`category_parent_id`);

--
-- Chỉ mục cho bảng `category_parents`
--
ALTER TABLE `category_parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_parents_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `locationbannermenus`
--
ALTER TABLE `locationbannermenus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `locationmenus`
--
ALTER TABLE `locationmenus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `locationproductmenus`
--
ALTER TABLE `locationproductmenus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menuitems_menu_id_foreign` (`menu_id`),
  ADD KEY `menuitems_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_locationmenu_id_foreign` (`locationmenu_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `productmenuitems`
--
ALTER TABLE `productmenuitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productmenuitems_productmenu_id_foreign` (`productmenu_id`),
  ADD KEY `productmenuitems_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `productmenus`
--
ALTER TABLE `productmenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productmenus_locationproductmenu_id_foreign` (`locationproductmenu_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_attribute_values_product_id_attribute_id_value_unique` (`product_id`,`attribute_id`,`value`),
  ADD KEY `product_attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `searchs`
--
ALTER TABLE `searchs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `searchs_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `authentication_log`
--
ALTER TABLE `authentication_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `bannermenuitems`
--
ALTER TABLE `bannermenuitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `bannermenus`
--
ALTER TABLE `bannermenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `category_parents`
--
ALTER TABLE `category_parents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `locationbannermenus`
--
ALTER TABLE `locationbannermenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `locationmenus`
--
ALTER TABLE `locationmenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `locationproductmenus`
--
ALTER TABLE `locationproductmenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `productmenuitems`
--
ALTER TABLE `productmenuitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `productmenus`
--
ALTER TABLE `productmenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `searchs`
--
ALTER TABLE `searchs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ràng buộc đối với các bảng kết xuất
--

--
-- Ràng buộc cho bảng `bannermenuitems`
--
ALTER TABLE `bannermenuitems`
  ADD CONSTRAINT `bannermenuitems_bannermenu_id_foreign` FOREIGN KEY (`bannermenu_id`) REFERENCES `bannermenus` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `bannermenus`
--
ALTER TABLE `bannermenus`
  ADD CONSTRAINT `bannermenus_locationbannermenu_id_foreign` FOREIGN KEY (`locationbannermenu_id`) REFERENCES `locationbannermenus` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_category_parent_id_foreign` FOREIGN KEY (`category_parent_id`) REFERENCES `category_parents` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menuitems_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_locationmenu_id_foreign` FOREIGN KEY (`locationmenu_id`) REFERENCES `locationmenus` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `productmenuitems`
--
ALTER TABLE `productmenuitems`
  ADD CONSTRAINT `productmenuitems_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productmenuitems_productmenu_id_foreign` FOREIGN KEY (`productmenu_id`) REFERENCES `productmenus` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `productmenus`
--
ALTER TABLE `productmenus`
  ADD CONSTRAINT `productmenus_locationproductmenu_id_foreign` FOREIGN KEY (`locationproductmenu_id`) REFERENCES `locationproductmenus` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `searchs`
--
ALTER TABLE `searchs`
  ADD CONSTRAINT `searchs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
--
-- Cơ sở dữ liệu: `thegioididong`
--
CREATE DATABASE IF NOT EXISTS `thegioididong` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `thegioididong`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
