-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 17, 2025 lúc 04:02 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.32

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `acl_rules`
--

CREATE TABLE `acl_rules` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Loại máy lạnh', 'loai-may-lanh', NULL, '2025-05-07 19:21:28', '2025-05-07 19:21:28'),
(2, 'Công suất làm lạnh', 'cong-suat-lam-lanh', NULL, '2025-05-07 19:21:37', '2025-05-07 19:21:37'),
(3, 'Diện tích phù hợp', 'dien-tich-phu-hop', NULL, '2025-05-07 19:21:58', '2025-05-07 19:21:58'),
(4, 'Mức tiêu thụ điện năng', 'muc-tieu-thu-dien-nang', NULL, '2025-05-07 19:22:07', '2025-05-07 19:22:07'),
(5, 'Chế độ tiết kiệm năng lượng', 'che-do-tiet-kiem-nang-luong', NULL, '2025-05-07 19:22:17', '2025-05-07 19:22:17'),
(6, 'Kích thước màn hình', 'kich-thuoc-man-hinh', NULL, '2025-05-07 19:22:31', '2025-05-07 19:22:31'),
(7, 'Độ phân giải màn hình', 'do-phan-giai-man-hinh', NULL, '2025-05-07 19:22:41', '2025-05-07 19:22:41'),
(8, 'Loại màn hình', 'loai-man-hinh', NULL, '2025-05-07 19:22:52', '2025-05-07 19:22:52'),
(9, 'Công suất', 'cong-suat', NULL, '2025-05-07 19:23:02', '2025-05-07 19:23:02'),
(10, 'Loại điều hòa', 'loai-dieu-hoa', NULL, '2025-05-07 19:23:10', '2025-05-07 19:23:10'),
(11, 'Loại gas làm lạnh', 'loai-gas-lam-lanh', NULL, '2025-05-07 19:23:17', '2025-05-07 19:23:17'),
(12, 'Màn hình', 'man-hinh', NULL, '2025-05-07 19:23:26', '2025-05-07 19:23:26'),
(13, 'RAM', 'ram', NULL, '2025-05-07 19:23:36', '2025-05-07 19:23:36'),
(14, 'Camera', 'camera', NULL, '2025-05-07 19:23:44', '2025-05-07 19:23:44'),
(15, 'Màu sắc', 'mau-sac', NULL, '2025-05-07 19:23:52', '2025-05-29 23:56:22');

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
(1, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-12 04:21:12', '2025-06-12 04:21:19'),
(2, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-12 04:21:34', '2025-06-12 04:22:15'),
(3, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-12 04:22:22', NULL),
(4, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-12 06:49:07', NULL),
(5, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-13 01:10:09', NULL),
(6, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-13 06:35:05', '2025-06-13 09:48:42'),
(7, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-13 09:48:54', NULL),
(8, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 01:06:46', NULL),
(9, 'App\\Models\\User', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 03:46:00', '2025-06-16 03:46:06'),
(10, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 03:46:27', NULL),
(11, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 06:33:07', '2025-06-16 06:33:39'),
(12, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 06:34:21', '2025-06-16 06:42:59'),
(13, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 06:44:12', '2025-06-16 06:44:23'),
(14, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 06:45:03', '2025-06-16 06:45:13'),
(15, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 06:45:28', '2025-06-16 07:12:27'),
(16, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 07:12:57', '2025-06-16 07:13:07'),
(17, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 07:13:33', '2025-06-16 07:13:41'),
(18, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 07:13:59', '2025-06-16 07:17:02'),
(19, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 07:17:18', '2025-06-16 07:23:03'),
(20, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-16 07:23:16', NULL),
(21, 'App\\Models\\User', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-17 01:07:40', NULL);

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
(1, 'http://127.0.0.1:8000/storage/photos/2/e1123f3241680e57094af88bd1c6675b.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 1, 1, '2025-06-12 04:35:12', '2025-06-12 04:35:12'),
(2, 'http://127.0.0.1:8000/storage/photos/2/9924377b70eebde3615863d508ff352e.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 1, 2, '2025-06-12 04:36:01', '2025-06-12 04:38:14'),
(3, 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 2, 2, '2025-06-12 04:36:01', '2025-06-12 04:36:01'),
(4, 'http://127.0.0.1:8000/storage/photos/2/e1123f3241680e57094af88bd1c6675b.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 1, 3, '2025-06-12 04:36:40', '2025-06-12 04:38:30'),
(5, 'http://127.0.0.1:8000/storage/photos/2/e1e79e4c6294b601281013b2fb99433b.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 2, 3, '2025-06-12 04:36:40', '2025-06-12 04:36:40'),
(6, 'http://127.0.0.1:8000/storage/photos/2/6266e05f03ab28d1af9f6dcab5de6c6c.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 1, 4, '2025-06-12 04:37:16', '2025-06-12 04:37:16'),
(7, 'http://127.0.0.1:8000/storage/photos/2/607e0cd2ba3a68161bcbc99e71179c24.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 2, 4, '2025-06-12 04:39:43', '2025-06-12 04:39:43'),
(8, 'http://127.0.0.1:8000/storage/photos/2/92606e36fe0b41c33b95e18550cfa673.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 3, 4, '2025-06-12 04:39:43', '2025-06-12 04:39:43'),
(9, 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 1, 5, '2025-06-12 04:41:15', '2025-06-12 04:41:15'),
(10, 'http://127.0.0.1:8000/storage/photos/2/607e0cd2ba3a68161bcbc99e71179c24.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 1, 6, '2025-06-12 04:42:18', '2025-06-16 08:25:36'),
(11, 'http://127.0.0.1:8000/storage/photos/2/c5d3883a7a8533d3172a6386bbf87b84.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 2, 6, '2025-06-12 04:42:18', '2025-06-12 04:42:18'),
(12, 'http://127.0.0.1:8000/storage/photos/2/6266e05f03ab28d1af9f6dcab5de6c6c.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 1, 7, '2025-06-12 04:43:29', '2025-06-12 04:43:29'),
(13, 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 2, 7, '2025-06-12 04:43:29', '2025-06-12 04:43:29'),
(14, 'http://127.0.0.1:8000/storage/photos/2/9924377b70eebde3615863d508ff352e.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 3, 7, '2025-06-12 04:43:29', '2025-06-12 04:43:29'),
(15, 'http://127.0.0.1:8000/storage/photos/2/e1e79e4c6294b601281013b2fb99433b.png', 'http://127.0.0.1:8000/admin/bannermenuitem/1/edit', 4, 7, '2025-06-12 04:44:11', '2025-06-12 04:44:11');

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
(1, 'Nguyễn Thế Anh', 'nguyen-the-anh', 1, '2025-06-12 04:33:25', '2025-06-12 04:33:25'),
(2, 'Nguyễn Thế Anh', 'nguyen-the-anh-1', 2, '2025-06-12 04:33:34', '2025-06-12 04:33:34'),
(3, 'Nguyễn Thế Anh', 'nguyen-the-anh-2', 3, '2025-06-12 04:33:43', '2025-06-12 04:33:43'),
(4, 'Nguyễn Thế Anh', 'nguyen-the-anh-3', 4, '2025-06-12 04:33:53', '2025-06-12 04:33:53'),
(5, 'Nguyễn Thế Anh', 'nguyen-the-anh-4', 5, '2025-06-12 04:40:34', '2025-06-12 04:40:34'),
(6, 'Nguyễn Thế Anh', 'nguyen-the-anh-5', 6, '2025-06-12 04:41:47', '2025-06-12 04:41:47'),
(7, 'Nguyễn Thế Anh', 'nguyen-the-anh-6', 7, '2025-06-12 04:42:49', '2025-06-12 04:42:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(20,0) DEFAULT NULL,
  `total_amount` decimal(20,0) DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `expiry_time` datetime DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_method` enum('online','offline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'offline',
  `status` enum('Pending','Confirmed','Preparing','Shipping','Delivered','Cancelled','Returned','Refunded','Failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `payment_status` enum('Paid','Payment Failed','Unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_cancel` enum('not_requested','requested','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_requested',
  `reason_cancel` text COLLATE utf8mb4_unicode_ci,
  `refund` tinyint(1) NOT NULL DEFAULT '0',
  `refund_amount` decimal(20,0) DEFAULT NULL,
  `refund_reason` text COLLATE utf8mb4_unicode_ci,
  `refund_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_time` datetime DEFAULT NULL,
  `refund_status` enum('Pending','Success','Failed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `code`, `discount`, `total_amount`, `shipping_address`, `phone`, `recipient_name`, `order_date`, `transaction_time`, `expiry_time`, `note`, `payment_method`, `status`, `payment_status`, `transaction_id`, `status_cancel`, `reason_cancel`, `refund`, `refund_amount`, `refund_reason`, `refund_transaction_id`, `refund_time`, `refund_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, '279962', 0, 8149000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', '2025-06-12 14:04:32', '2025-06-12 14:18:57', NULL, 'online', 'Delivered', 'Paid', '15014437', 'not_requested', NULL, 0, 8149000, NULL, NULL, NULL, NULL, NULL, '2025-05-05 07:03:31', '2025-06-12 07:07:53'),
(2, 2, '978218', 0, 1559000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 1559000, NULL, NULL, NULL, NULL, NULL, '2025-06-12 07:04:43', '2025-06-12 07:07:58'),
(3, 2, '870200', 0, 820000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 820000, NULL, NULL, NULL, NULL, NULL, '2025-06-05 07:05:15', '2025-06-12 07:08:03'),
(4, 2, '839402', 0, 119900, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 119900, NULL, NULL, NULL, NULL, NULL, '2025-06-12 07:05:35', '2025-06-12 07:08:07'),
(5, 2, '983065', 0, 1559000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 1559000, NULL, NULL, NULL, NULL, NULL, '2025-06-12 07:06:04', '2025-06-12 07:08:11'),
(6, 2, '992193', 0, 2088000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 2088000, NULL, NULL, NULL, NULL, NULL, '2025-06-07 07:06:43', '2025-06-12 07:07:47'),
(7, 2, '950558', 21, 76979, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 76979, NULL, NULL, NULL, NULL, NULL, '2025-06-10 07:20:56', '2025-06-12 08:00:36'),
(8, 2, '994461', 21, 4119979, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 4119979, NULL, NULL, NULL, NULL, NULL, '2025-06-12 07:24:28', '2025-06-12 08:00:32'),
(9, 2, '652240', 10000, 108000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-12', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 108000, NULL, NULL, NULL, NULL, NULL, '2025-06-11 07:59:14', '2025-06-12 08:00:27'),
(10, 2, '428358', 0, 295000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-13', NULL, NULL, NULL, 'offline', 'Delivered', 'Paid', NULL, 'not_requested', NULL, 0, 295000, NULL, NULL, NULL, NULL, NULL, '2025-06-13 02:38:08', '2025-06-16 07:55:45'),
(11, 2, '990746', 0, 92320000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 08:16:52', '2025-06-16 08:31:52', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 92320000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 01:16:52', '2025-06-16 01:33:07'),
(12, 2, '194749', 0, 92320000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 08:17:04', '2025-06-16 08:32:04', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 92320000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 01:17:04', '2025-06-16 01:33:07'),
(13, 2, '725749', 0, 120000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 08:29:01', '2025-06-16 08:44:01', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 120000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 01:29:01', '2025-06-16 01:46:18'),
(14, 2, '454312', 0, 6610000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 08:46:28', '2025-06-16 09:01:28', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 6610000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 01:46:28', '2025-06-16 02:01:30'),
(15, 2, '339246', 0, 120000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 08:48:55', '2025-06-16 09:03:55', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 120000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 01:48:55', '2025-06-16 02:05:35'),
(16, 2, '534842', 0, 5010000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 08:54:39', '2025-06-16 09:09:39', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 5010000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 01:54:39', '2025-06-16 02:17:04'),
(17, 2, '337716', 0, 6610000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 08:56:28', '2025-06-16 09:11:28', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 6610000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 01:56:28', '2025-06-16 02:17:04'),
(18, 2, '447046', 0, 75000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 08:59:44', '2025-06-16 09:14:44', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 75000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 01:59:44', '2025-06-16 02:17:04'),
(19, 2, '253019', 0, 670000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 09:01:40', '2025-06-16 09:16:40', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 670000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 02:01:40', '2025-06-16 02:17:04'),
(20, 2, '953573', 0, 195000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 09:06:21', '2025-06-16 09:21:21', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 195000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 02:06:21', '2025-06-16 02:22:02'),
(21, 2, '564443', 0, 5010000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-16', '2025-06-16 11:31:50', '2025-06-16 11:46:50', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 5010000, NULL, NULL, NULL, NULL, NULL, '2025-06-16 04:31:50', '2025-06-16 04:47:59'),
(22, 2, '714237', 0, 6610000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-17', '2025-06-17 08:08:10', '2025-06-17 08:23:10', NULL, 'online', 'Cancelled', 'Payment Failed', NULL, 'not_requested', 'Hết thời gian thanh toán online!', 0, 6610000, NULL, NULL, NULL, NULL, NULL, '2025-06-17 01:08:10', '2025-06-17 02:05:10'),
(23, 2, '716397', 0, 4020000, 'Tiên Phương, Chương Mỹ, Hà Nội', '0348022004', 'anhnt', '2025-06-17', NULL, NULL, NULL, 'offline', 'Pending', 'Unpaid', NULL, 'not_requested', NULL, 0, 4020000, NULL, NULL, NULL, NULL, NULL, '2025-06-17 01:09:33', '2025-06-17 01:09:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_items`
--

CREATE TABLE `bill_items` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `product_variant_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` decimal(20,0) NOT NULL,
  `total_price` decimal(20,0) NOT NULL,
  `import_price` decimal(20,0) DEFAULT NULL,
  `profit` decimal(20,0) DEFAULT NULL,
  `review_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_items`
--

INSERT INTO `bill_items` (`id`, `bill_id`, `product_id`, `product_variant_id`, `name`, `image`, `variant`, `quantity`, `price`, `total_price`, `import_price`, `profit`, `review_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 'Máy lạnh Casper Inverter 1.5 HP GC-12IS35 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '1 hp', 1, 6590000, 6590000, 5000000, 5000000, 0, '2025-05-11 07:03:31', '2025-06-12 07:03:31'),
(2, 1, 3, 5, '1 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '1', 1, 1539000, 1539000, 11000000, 11000000, 0, '2025-06-11 07:03:31', '2025-06-12 07:03:31'),
(3, 2, 3, 5, '1 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '1', 1, 1539000, 1539000, 11000000, 11000000, 0, '2025-06-12 07:04:43', '2025-06-12 07:04:43'),
(4, 3, 10, 12, '8 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '8', 1, 800000, 800000, 600000, 600000, 0, '2025-06-11 07:05:15', '2025-06-12 07:05:15'),
(5, 4, 11, 13, '9 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '9', 1, 99900, 99900, 5000, 5000, 0, '2025-06-12 07:05:35', '2025-06-12 07:05:35'),
(6, 5, 3, 5, '1 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '1', 1, 1539000, 1539000, 11000000, 11000000, 0, '2025-06-12 07:06:04', '2025-06-12 07:06:04'),
(7, 6, 13, 15, '11 + 12', 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', '11', 1, 19000, 19000, 10000, 10000, 0, '2025-06-12 07:06:43', '2025-06-12 07:06:43'),
(8, 6, 13, 20, '11 + 12', 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', '342', 1, 1599000, 1599000, 750000, 750000, 0, '2025-06-12 07:06:43', '2025-06-12 07:06:43'),
(9, 6, 13, 21, '11 + 12', 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', '234', 1, 450000, 450000, 390000, 390000, 0, '2025-06-12 07:06:43', '2025-06-12 07:06:43'),
(10, 7, 13, 15, '11 + 12', 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', '11', 3, 19000, 57000, 30000, 21, 0, '2025-06-12 07:20:56', '2025-06-12 07:20:56'),
(11, 8, 4, 6, '2 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '2', 1, 100000, 100000, 50000, 21, 0, '2025-06-12 07:24:28', '2025-06-12 07:24:28'),
(12, 8, 5, 7, '3 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '3', 1, 4000000, 4000000, 3000000, 21, 0, '2025-06-12 07:24:28', '2025-06-12 07:24:28'),
(13, 9, 13, 15, '11 + 12', 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', '11', 1, 19000, 19000, 10000, 7061, 0, '2025-06-12 07:59:14', '2025-06-12 07:59:14'),
(14, 9, 12, 14, '10 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '10', 1, 79000, 79000, 55000, 15939, 0, '2025-06-12 07:59:14', '2025-06-12 07:59:14'),
(15, 10, 4, 6, '2 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '2', 1, 100000, 100000, 50000, 50000, 0, '2025-06-13 02:38:08', '2025-06-13 02:38:08'),
(16, 10, 16, 18, '232', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', '123', 1, 175000, 175000, 109000, 109000, 0, '2025-06-13 02:38:08', '2025-06-13 02:38:08'),
(17, 11, 2, 4, 'Máy lạnh Casper Inverter 1.5 HP GC-12IS35 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '2.5 hp', 3, 15390000, 46170000, 42000000, 14000000, 0, '2025-06-16 01:16:52', '2025-06-16 01:16:52'),
(18, 11, 2, 3, 'Máy lạnh Casper Inverter 1.5 HP GC-12IS35 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '1 hp', 7, 6590000, 46130000, 35000000, 5000000, 0, '2025-06-16 01:16:52', '2025-06-16 01:16:52'),
(19, 13, 4, 6, '2 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '2', 1, 100000, 100000, 50000, 50000, 0, '2025-06-16 01:29:01', '2025-06-16 01:29:01'),
(20, 14, 2, 3, 'Máy lạnh Casper Inverter 1.5 HP GC-12IS35 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '1 hp', 1, 6590000, 6590000, 5000000, 5000000, 0, '2025-06-16 01:46:28', '2025-06-16 01:46:28'),
(21, 15, 4, 6, '2 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '2', 1, 100000, 100000, 50000, 50000, 0, '2025-06-16 01:48:55', '2025-06-16 01:48:55'),
(22, 16, 1, 1, 'Máy lạnh Nagakawa Inverter 1 HP NIS-C09R2T28 + 12', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', '1 hp', 1, 4990000, 4990000, 4000000, 4000000, 0, '2025-06-16 01:54:39', '2025-06-16 01:54:39'),
(23, 17, 2, 3, 'Máy lạnh Casper Inverter 1.5 HP GC-12IS35 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '1 hp', 1, 6590000, 6590000, 5000000, 5000000, 0, '2025-06-16 01:56:28', '2025-06-16 01:56:28'),
(24, 18, 7, 9, '5 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '5', 1, 55000, 55000, 20000, 20000, 0, '2025-06-16 01:59:44', '2025-06-16 01:59:44'),
(25, 19, 9, 11, '7 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '7', 1, 650000, 650000, 500000, 500000, 0, '2025-06-16 02:01:40', '2025-06-16 02:01:40'),
(26, 20, 16, 18, '232', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', '123', 1, 175000, 175000, 109000, 109000, 0, '2025-06-16 02:06:21', '2025-06-16 02:06:21'),
(27, 21, 1, 1, 'Máy lạnh Nagakawa Inverter 1 HP NIS-C09R2T28 + 12', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', '1 hp', 1, 4990000, 4990000, 4000000, 4000000, 0, '2025-06-16 04:31:50', '2025-06-16 04:31:50'),
(28, 22, 2, 3, 'Máy lạnh Casper Inverter 1.5 HP GC-12IS35 + 12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', '1 hp', 1, 6590000, 6590000, 5000000, 5000000, 0, '2025-06-17 01:08:10', '2025-06-17 01:08:10'),
(29, 23, 5, 7, '3 + 12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', '3', 1, 4000000, 4000000, 3000000, 3000000, 0, '2025-06-17 01:09:33', '2025-06-17 01:09:33');

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
(1, 'Flash sale giảm đến 50%++', 'flash-sale-giam-den-50', 'http://127.0.0.1:8000/storage/photos/2/category/706d8c2e4e66339775b17916d4348cb0.png', 0, 1, NULL, '2025-05-07 19:01:29', '2025-06-17 02:09:35'),
(2, 'Hàng cao cấp giảm đến 50%', 'hang-cao-cap-giam-den-50', 'http://127.0.0.1:8000/storage/photos/2/category/1cacbacf2f23ae1341ad05b39f8e6eb8.png', 0, 1, '2025-06-17 03:04:24', '2025-05-07 19:01:44', '2025-06-17 03:04:24'),
(3, 'Mua máy lạnh giá chỉ 5.490.000đ', 'mua-may-lanh-gia-chi-5490000d', 'http://127.0.0.1:8000/storage/photos/2/category/cad4e8ae58b5f18e710e766c20d2ccdd.png', 0, 1, '2025-06-17 03:04:34', '2025-05-07 19:02:09', '2025-06-17 03:04:34'),
(4, 'Mua lọc nước, tặng lõi lọc', 'mua-loc-nuoc-tang-loi-loc', 'http://127.0.0.1:8000/storage/photos/2/category/e2956ca2497ad19984644b9bb0712020.png', 0, 1, '2025-06-17 03:04:39', '2025-05-07 19:02:58', '2025-06-17 03:04:39'),
(5, 'Máy lạnh', 'may-lanh', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 2, '2025-06-17 02:27:47', '2025-05-07 19:03:28', '2025-06-17 02:27:47'),
(6, 'Tủ lạnh', 'tu-lanh', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 2, '2025-06-17 02:45:02', '2025-05-07 19:03:47', '2025-06-17 02:45:02'),
(7, 'Tivi', 'tivi', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 2, '2025-06-17 02:46:48', '2025-05-07 19:04:01', '2025-06-17 02:46:48'),
(8, 'Quạt điều hòa', 'quat-dieu-hoa', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 3, '2025-06-17 03:04:59', '2025-05-07 19:04:45', '2025-05-07 19:52:49'),
(9, 'Quạt', 'quat', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 3, '2025-06-03 03:05:03', '2025-05-07 19:05:09', '2025-05-07 19:51:14'),
(10, 'Máy xay sinh tố', 'may-xay-sinh-to', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 3, '2025-06-04 03:05:13', '2025-05-07 19:05:27', '2025-05-07 19:05:27'),
(11, 'Điện thoại', 'dien-thoai', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 4, '2025-06-04 03:05:16', '2025-05-07 19:05:52', '2025-05-07 19:51:56'),
(12, 'Laptop', 'laptop', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 4, '2025-06-10 03:05:18', '2025-05-07 19:06:07', '2025-05-07 19:06:07'),
(13, 'Tablet', 'tablet', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 4, '2025-06-10 03:05:21', '2025-05-07 19:06:22', '2025-05-07 19:06:22'),
(14, 'Đồng hồ thông minh', 'dong-ho-thong-minh', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 4, '2025-06-09 03:05:23', '2025-05-07 19:06:46', '2025-05-07 19:51:01'),
(15, 'Bộ lau nhà', 'bo-lau-nha', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 5, '2025-06-11 03:05:25', '2025-05-07 19:07:30', '2025-05-07 19:07:30'),
(16, 'Nồi, bộ nồi', 'noi-bo-noi', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 5, '2025-06-26 03:05:27', '2025-05-07 19:07:48', '2025-05-07 19:07:48'),
(17, 'Chảo các loại', 'chao-cac-loai', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 5, '2025-06-19 03:05:29', '2025-05-07 19:08:15', '2025-05-07 19:52:15'),
(18, 'Sạc dự phòng', 'sac-du-phong', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 6, '2025-06-02 03:05:31', '2025-05-07 19:09:13', '2025-05-07 19:09:13'),
(19, 'Tai nghe', 'tai-nghe', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 6, '2025-06-01 03:05:33', '2025-05-07 19:09:25', '2025-05-07 19:09:25'),
(20, 'Loa', 'loa', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 6, '2025-06-18 03:05:35', '2025-05-07 19:09:37', '2025-05-07 19:50:48'),
(21, 'Tivi', 'tivi-1', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 7, '2025-06-17 02:46:57', '2025-05-07 19:10:07', '2025-06-17 02:46:57'),
(22, 'Máy lạnh', 'may-lanh-1', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 7, '2025-06-17 02:30:41', '2025-05-07 19:10:43', '2025-06-17 02:30:41'),
(23, 'Máy giặt', 'may-giat', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 7, '2025-06-17 02:48:06', '2025-05-07 19:11:00', '2025-06-17 02:48:06'),
(24, 'Tủ lạnh', 'tu-lanh-1', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 7, '2025-06-17 02:45:13', '2025-05-07 19:11:42', '2025-06-17 02:45:13'),
(25, 'Đồng hồ thời trang', 'dong-ho-thoi-trang', NULL, 0, 8, '2025-06-11 03:05:40', '2025-05-07 19:12:06', '2025-05-07 19:12:06'),
(26, 'Xe đạp', 'xe-dap', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 8, '2025-06-03 03:06:12', '2025-05-07 19:12:16', '2025-05-07 19:12:16'),
(27, 'Camera', 'camera', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 8, '2025-06-18 03:06:10', '2025-05-07 19:12:25', '2025-05-07 19:12:25'),
(28, 'Mũ bảo hiểm', 'mu-bao-hiem', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 8, '2025-06-18 03:06:08', '2025-05-07 19:12:37', '2025-05-07 19:12:37'),
(29, 'Tư vấn chọn mua', 'tu-van-chon-mua', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 9, '2025-06-18 03:06:06', '2025-05-07 19:13:09', '2025-05-07 19:13:09'),
(30, 'Khuyến mãi', 'khuyen-mai', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 9, '2025-06-19 03:06:04', '2025-05-07 19:13:19', '2025-05-07 19:13:19'),
(31, 'Tìm địa chỉ cửa hàng', 'tim-dia-chi-cua-hang', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 9, '2025-06-27 03:06:02', '2025-05-07 19:13:28', '2025-05-07 19:13:28'),
(32, 'Vệ sinh máy lạnh', 've-sinh-may-lanh', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 10, '2025-06-24 03:06:00', '2025-05-07 19:13:51', '2025-05-07 19:13:51'),
(33, 'Thay lõi lọc nước', 'thay-loi-loc-nuoc', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 10, '2025-06-10 03:05:58', '2025-05-07 19:14:00', '2025-05-07 20:15:21'),
(34, 'Bảo hiểm Ô tô - Xe máy', 'bao-hiem-o-to-xe-may', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 10, '2025-06-10 03:05:56', '2025-05-07 19:14:09', '2025-05-07 20:14:56'),
(35, '1234 update', '1234-update', 'http://127.0.0.1:8000/storage/photos/2/gratisography-augmented-reality-800x525.jpg', 1, 1, '2025-06-03 03:05:54', '2025-05-11 23:59:00', '2025-05-16 02:12:28'),
(36, '123', '123', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 7, '2025-06-09 03:05:52', '2025-05-12 00:32:14', '2025-05-16 02:12:49'),
(37, '123', '123-1', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 10, '2025-06-10 03:05:49', '2025-05-12 01:37:54', '2025-05-29 23:51:32'),
(38, 'Hàng cao cấp giảm đến 50%', 'hang-cao-cap-giam-den-50-1', 'http://127.0.0.1:8000/storage/photos/2/category/1cacbacf2f23ae1341ad05b39f8e6eb8.png', 0, 1, NULL, '2025-06-16 09:47:45', '2025-06-17 03:00:17'),
(39, 'Mua máy lạnh giá chỉ 5.490.000đ', 'mua-may-lanh-gia-chi-5490000d-1', 'http://127.0.0.1:8000/storage/photos/2/category/cad4e8ae58b5f18e710e766c20d2ccdd.png', 0, 1, NULL, '2025-06-16 09:48:25', '2025-06-17 03:00:25'),
(40, 'Mua lọc nước, tặng lõi lọc', 'mua-loc-nuoc-tang-loi-loc-1', 'http://127.0.0.1:8000/storage/photos/2/category/e2956ca2497ad19984644b9bb0712020.png', 0, 1, NULL, '2025-06-16 09:48:39', '2025-06-17 02:57:32'),
(41, 'Xả kho giá sốc', 'xa-kho-gia-soc', 'http://127.0.0.1:8000/storage/photos/2/category/9e971eea7180a1a98224ae8a729ba8ab.png', 0, 1, NULL, '2025-06-16 09:48:51', '2025-06-17 03:00:38'),
(42, 'Đặt online hàng tận tay giá tận đáy', 'dat-online-hang-tan-tay-gia-tan-day', 'http://127.0.0.1:8000/storage/photos/2/category/ac3c324ad6aebf78ce75120b20d5aac0.png', 0, 1, NULL, '2025-06-16 09:49:02', '2025-06-17 03:00:48'),
(43, 'Mua bếp điện, tặng bộ nồi', 'mua-bep-dien-tang-bo-noi', 'http://127.0.0.1:8000/storage/photos/2/category/924d358c678235b0d12e7c772dac8fdf.png', 0, 1, NULL, '2025-06-16 09:49:15', '2025-06-17 03:01:01'),
(44, 'Mua nồi cơm, tặng bếp điện', 'mua-noi-com-tang-bep-dien', 'http://127.0.0.1:8000/storage/photos/2/category/31c9d188bc34f2d880e5e2c6678a9635.png', 0, 1, NULL, '2025-06-16 09:49:24', '2025-06-17 03:01:15'),
(45, 'Mua tủ lạnh tặng quà (tùy model)', 'mua-tu-lanh-tang-qua-tuy-model', 'http://127.0.0.1:8000/storage/photos/2/category/8a054804cdc69512d479a636758fad5f.png', 0, 1, NULL, '2025-06-16 09:49:38', '2025-06-17 03:01:23'),
(46, 'Mua tivi >55\" tặng quà (tuỳ model)', 'mua-tivi-55-tang-qua-tuy-model', 'http://127.0.0.1:8000/storage/photos/2/category/da96060fed5721776d032ea2edf1d18d.png', 0, 1, NULL, '2025-06-16 09:49:53', '2025-06-17 03:01:32'),
(47, 'HOT! Săn mã giảm 10%', 'hot-san-ma-giam-10', 'http://127.0.0.1:8000/storage/photos/2/category/dec84954f7032ab0a8eb3432641b6838.png', 0, 1, NULL, '2025-06-16 09:50:02', '2025-06-17 03:01:46'),
(48, 'Nhà bếp giảm đến 50%', 'nha-bep-giam-den-50', 'http://127.0.0.1:8000/storage/photos/2/category/58c3af05bcf7978c4028d617a0f53f61.png', 0, 1, NULL, '2025-06-16 09:50:12', '2025-06-17 03:02:49'),
(49, 'Xe đạp mua Online vượt trội', 'xe-dap-mua-online-vuot-troi', 'http://127.0.0.1:8000/storage/photos/2/category/9d6fa74a6fc28e15d6f05b64ae223b06.png', 0, 1, NULL, '2025-06-16 09:50:23', '2025-06-17 03:02:57'),
(50, 'Xay ép hàng hiệu Vượt Trội', 'xay-ep-hang-hieu-vuot-troi', 'http://127.0.0.1:8000/storage/photos/2/category/948313851d51b6a113539bdcf9d19113.png', 0, 1, NULL, '2025-06-16 09:50:32', '2025-06-17 03:03:05'),
(51, 'Gia dụng lắp đặt giảm đến 50%', 'gia-dung-lap-dat-giam-den-50', 'http://127.0.0.1:8000/storage/photos/2/category/493cfe9d7c0bda2f9163755b1fddd90d.png', 0, 1, NULL, '2025-06-16 09:50:45', '2025-06-17 03:03:16'),
(53, 'Máy lạnh', 'may-lanh-2', 'http://127.0.0.1:8000/storage/photos/2/category/82ab6158a6b5e938c11e9ebf1d05aae3.png', 1, 2, NULL, '2025-06-16 09:51:35', '2025-06-17 02:44:37'),
(54, 'Tủ lạnh', 'tu-lanh-2', 'http://127.0.0.1:8000/storage/photos/2/category/fe04b1635dc68b0ec71d9982b1dc8960.png', 1, 2, NULL, '2025-06-16 09:51:47', '2025-06-17 02:46:28'),
(55, 'Tivi', 'tivi-2', 'http://127.0.0.1:8000/storage/photos/2/category/b29491c0fa65ea5a6c08856cc17b15a0.png', 0, 2, NULL, '2025-06-16 09:51:56', '2025-06-17 02:47:36'),
(56, 'Máy giặt', 'may-giat-1', 'http://127.0.0.1:8000/storage/photos/2/category/36c96df469724206fb6f36b4fc519e65.png', 0, 2, NULL, '2025-06-16 09:52:05', '2025-06-17 02:48:47'),
(57, 'Máy sấy quần áo', 'may-say-quan-ao', 'http://127.0.0.1:8000/storage/photos/2/category/015c88be2da1adedcde4115199bbc118.png', 0, 2, NULL, '2025-06-16 09:52:27', '2025-06-17 02:49:54'),
(58, 'Máy nước nóng', 'may-nuoc-nong', 'http://127.0.0.1:8000/storage/photos/2/category/7bdde1faea75f04d58001102d43d1191.png', 0, 2, NULL, '2025-06-16 09:52:35', '2025-06-17 02:52:19'),
(59, 'Tủ mát', 'tu-mat', 'http://127.0.0.1:8000/storage/photos/2/category/c48b0e77b9836d86daa2723f35718238.png', 0, 2, NULL, '2025-06-16 09:52:44', '2025-06-17 02:53:38'),
(60, 'Tủ đông', 'tu-dong', 'http://127.0.0.1:8000/storage/photos/2/category/863935603073431e9c0b92b467b147dd.png', 0, 2, NULL, '2025-06-16 09:52:53', '2025-06-17 02:54:45'),
(61, 'Máy rửa chén', 'may-rua-chen', 'http://127.0.0.1:8000/storage/photos/2/category/01d049540b7662dab3dcff01de6d3b5f.png', 0, 2, NULL, '2025-06-16 09:53:05', '2025-06-17 03:12:13'),
(62, 'Loa, Dàn âm thanh', 'loa-dan-am-thanh', 'http://127.0.0.1:8000/storage/photos/2/category/6a1961e24fee2c3d687d7486fa4c5195.png', 0, 2, NULL, '2025-06-16 09:53:14', '2025-06-17 03:47:38'),
(63, 'Micro', 'micro', 'http://127.0.0.1:8000/storage/photos/2/category/ab12c135622ef252764fac9bdfcf184f.png', 0, 2, NULL, '2025-06-16 09:53:24', '2025-06-17 03:13:56'),
(64, 'Quạt điều hòa', 'quat-dieu-hoa-1', 'http://127.0.0.1:8000/storage/photos/2/category/b6b418e1d9427a293d11816ca3b0c184.png', 0, 3, NULL, '2025-06-16 09:54:07', '2025-06-17 03:14:39'),
(65, 'Quạt', 'quat-1', 'http://127.0.0.1:8000/storage/photos/2/category/f32743eb951ae3ba8cd51983e948ba9f.png', 0, 3, NULL, '2025-06-16 09:54:16', '2025-06-17 03:16:44'),
(66, 'Máy xay sinh tố', 'may-xay-sinh-to-1', 'http://127.0.0.1:8000/storage/photos/2/category/4dcb40b32d0b0927b4adead56253989a.png', 0, 3, NULL, '2025-06-16 09:54:25', '2025-06-17 03:18:03'),
(67, 'Máy ép trái cây', 'may-ep-trai-cay', 'http://127.0.0.1:8000/storage/photos/2/category/7cb0aa7b446b5d319a7cb646df143faa.png', 0, 3, NULL, '2025-06-16 09:54:35', '2025-06-17 03:19:28'),
(68, 'Máy lọc nước', 'may-loc-nuoc', 'http://127.0.0.1:8000/storage/photos/2/category/3c2f82dd62f6a3f7d1237500b771b10e.png', 0, 3, NULL, '2025-06-16 09:54:49', '2025-06-17 03:20:22'),
(69, 'Máy lọc không khí', 'may-loc-khong-khi', 'http://127.0.0.1:8000/storage/photos/2/category/86b7d200bdd564e597ca6ab06204d83f.png', 0, 3, NULL, '2025-06-16 09:54:59', '2025-06-17 03:21:09'),
(70, 'Máy hút ẩm', 'may-hut-am', 'http://127.0.0.1:8000/storage/photos/2/category/b85abfe48ee635b7022c590183f3c4c1.png', 0, 3, NULL, '2025-06-16 09:55:07', '2025-06-17 03:22:02'),
(71, 'Bếp từ', 'bep-tu', 'http://127.0.0.1:8000/storage/photos/2/category/4ec14a3426db052a386892dc70e0adaa.png', 0, 3, NULL, '2025-06-16 09:55:16', '2025-06-17 03:22:49'),
(72, 'Bếp hồng ngoại', 'bep-hong-ngoai', 'http://127.0.0.1:8000/storage/photos/2/category/5b2eb5fe7ccf790fccd65c1ff6771613.png', 0, 3, NULL, '2025-06-16 09:55:24', '2025-06-17 03:24:29'),
(73, 'Nồi cơm điện', 'noi-com-dien', 'http://127.0.0.1:8000/storage/photos/2/category/d51e5201e53a26de69a15ffc06bddbf3.png', 0, 3, NULL, '2025-06-16 09:55:33', '2025-06-17 03:27:01'),
(74, 'Nồi chiên không dầu', 'noi-chien-khong-dau', 'http://127.0.0.1:8000/storage/photos/2/category/42bd2773f3df315ae77d4467e9617f5c.png', 0, 3, NULL, '2025-06-16 09:55:42', '2025-06-17 03:27:43'),
(75, 'Robot hút bụi', 'robot-hut-bui', 'http://127.0.0.1:8000/storage/photos/2/category/e0b71143a19d84ce071d07b27a42154c.png', 0, 3, NULL, '2025-06-16 09:56:29', '2025-06-17 03:28:28'),
(76, 'Máy hút bụi', 'may-hut-bui', 'http://127.0.0.1:8000/storage/photos/2/category/ab4d68106b2e8129b74ed3ad980fbf66.png', 0, 3, NULL, '2025-06-16 09:56:38', '2025-06-17 03:29:33'),
(77, 'Máy làm sữa hạt', 'may-lam-sua-hat', 'http://127.0.0.1:8000/storage/photos/2/category/22a9f17911009780799dab55504790af.png', 0, 3, NULL, '2025-06-16 09:56:49', '2025-06-17 03:30:42'),
(78, 'Lò vi sóng', 'lo-vi-song', 'http://127.0.0.1:8000/storage/photos/2/category/87fa2e3e71f3ebae400ee8271d0af4b9.png', 0, 3, NULL, '2025-06-16 09:56:57', '2025-06-17 03:31:41'),
(79, 'Máy sấy giày', 'may-say-giay', 'http://127.0.0.1:8000/storage/photos/2/category/12e1c7fe7f3be76ec67a150d3acde4e8.png', 1, 3, NULL, '2025-06-16 09:57:09', '2025-06-17 03:32:05'),
(80, 'Quạt trần', 'quat-tran', 'http://127.0.0.1:8000/storage/photos/2/category/c0e6fd3da6847b1f20fbc5b02abe1440.png', 0, 3, NULL, '2025-06-16 09:57:21', '2025-06-17 03:32:34'),
(81, 'Quạt sưởi', 'quat-suoi', 'http://127.0.0.1:8000/storage/photos/2/category/5e111362e1fed7101ec12e7e1aff686d.png', 0, 3, NULL, '2025-06-16 09:57:34', '2025-06-17 03:33:11'),
(82, 'Cây nước nóng lạnh', 'cay-nuoc-nong-lanh', 'http://127.0.0.1:8000/storage/photos/2/category/b73485a6f2682001e723b22418a9af8b.png', 0, 3, NULL, '2025-06-16 09:58:09', '2025-06-17 03:34:15'),
(83, 'Lọc nước điện giải', 'loc-nuoc-dien-giai', 'http://127.0.0.1:8000/storage/photos/2/category/c88b20131c7accc12b8947ce626db93e.png', 0, 3, NULL, '2025-06-16 09:58:19', '2025-06-17 03:35:02'),
(84, 'Cốc lọc đầu nguồn', 'coc-loc-dau-nguon', 'http://127.0.0.1:8000/storage/photos/2/category/941f31f3f6eb36da002b4879353edb91.png', 0, 3, NULL, '2025-06-16 09:59:03', '2025-06-17 03:35:41'),
(85, 'Lõi máy lọc nước', 'loi-may-loc-nuoc', 'http://127.0.0.1:8000/storage/photos/2/category/2d9c013ed79c0ff5ffa51db77dc77467.png', 0, 3, NULL, '2025-06-16 09:59:13', '2025-06-17 03:36:11'),
(86, 'Bếp ga', 'bep-ga', 'http://127.0.0.1:8000/storage/photos/2/category/706115bd03c5836eb0715cfca5b37d6f.png', 0, 3, NULL, '2025-06-16 09:59:20', '2025-06-17 03:36:49'),
(87, 'Bàn ủi', 'ban-ui', 'http://127.0.0.1:8000/storage/photos/2/category/d5329550ce2706b73258bce839b12eb4.png', 0, 3, NULL, '2025-06-16 09:59:28', '2025-06-17 03:37:10'),
(88, 'Máy hút mùi', 'may-hut-mui', 'http://127.0.0.1:8000/storage/photos/2/category/6c34c1cecf1a2b27731f81ec1181ab52.png', 0, 3, NULL, '2025-06-16 09:59:35', '2025-06-17 03:37:52'),
(89, 'Lẩu điện', 'lau-dien', 'http://127.0.0.1:8000/storage/photos/2/category/f2c82cee61fa43c32fb154f70d8eb27e.png', 0, 3, NULL, '2025-06-16 09:59:44', '2025-06-17 03:38:33'),
(90, 'Bình đun siêu tốc', 'binh-dun-sieu-toc', 'http://127.0.0.1:8000/storage/photos/2/category/3603bc57ccf6667f07ab44125d8a49f3.png', 0, 3, NULL, '2025-06-16 09:59:50', '2025-06-17 03:39:32'),
(91, 'Lò nướng', 'lo-nuong', 'http://127.0.0.1:8000/storage/photos/2/category/5ddbfdf6370a72090a7a11934f51f509.png', 0, 3, NULL, '2025-06-16 09:59:58', '2025-06-17 03:40:11'),
(92, 'Bình thủy điện', 'binh-thuy-dien', 'http://127.0.0.1:8000/storage/photos/2/category/99d15f01884999613fbd2f8f134c20dc.png', 0, 3, NULL, '2025-06-16 10:00:05', '2025-06-17 03:41:09'),
(93, 'Máy sấy tóc', 'may-say-toc', 'http://127.0.0.1:8000/storage/photos/2/category/a437d951d130069466a258c6f6d0e508.png', 0, 3, NULL, '2025-06-16 10:00:14', '2025-06-17 03:41:52'),
(94, 'Nồi áp suất', 'noi-ap-suat', 'http://127.0.0.1:8000/storage/photos/2/category/deb38369dcf239b4c0be7c3c3788a31c.png', 0, 3, NULL, '2025-06-16 10:00:21', '2025-06-17 03:42:33'),
(95, 'Máy vắt cam', 'may-vat-cam', 'http://127.0.0.1:8000/storage/photos/2/category/a6bb930a7cacca52dace17f1256f595d.png', 0, 3, NULL, '2025-06-16 10:00:37', '2025-06-17 03:43:21'),
(96, 'Máy pha cà phê', 'may-pha-ca-phe', 'http://127.0.0.1:8000/storage/photos/2/category/26e48428a2a229c2f22f935731c5be08.png', 0, 3, NULL, '2025-06-16 10:00:44', '2025-06-17 03:44:15'),
(97, 'Máy xay thịt', 'may-xay-thit', 'http://127.0.0.1:8000/storage/photos/2/category/d5d865c4d36c95389a024beb150b3113.png', 0, 3, NULL, '2025-06-16 10:00:54', '2025-06-17 03:45:08'),
(98, 'Máy nhồi bột, đánh trứng', 'may-nhoi-bot-danh-trung', 'http://127.0.0.1:8000/storage/photos/2/category/c1eb2671e64d0235d01b08ad339c0366.png', 0, 3, NULL, '2025-06-16 10:01:00', '2025-06-17 03:45:32'),
(99, 'Chăn điện sưởi ấm', 'chan-dien-suoi-am', 'http://127.0.0.1:8000/storage/photos/2/category/77f0cefb259e4f7a7f1c5675e8f1cc0f.png', 0, 3, NULL, '2025-06-16 10:01:08', '2025-06-17 03:46:18'),
(100, 'Đèn điện, đèn sạc', 'den-dien-den-sac', 'http://127.0.0.1:8000/storage/photos/2/category/3d255ec99d878d979434831b67fa690f.png', 0, 3, NULL, '2025-06-16 10:01:15', '2025-06-17 03:47:08'),
(101, 'Máy lọc RO Hydrogen', 'may-loc-ro-hydrogen', 'http://127.0.0.1:8000/storage/photos/2/category/3c2f82dd62f6a3f7d1237500b771b10e.png', 0, 3, NULL, '2025-06-16 10:01:23', '2025-06-17 03:26:05'),
(102, 'Điện thoại', 'dien-thoai-1', 'http://127.0.0.1:8000/storage/photos/2/category/eded909b8116724d0e407ef0d87f936b.png', 0, 4, NULL, '2025-06-16 10:01:51', '2025-06-17 03:48:42'),
(103, 'Laptop', 'laptop-1', 'http://127.0.0.1:8000/storage/photos/2/category/6da36387eabd2db057b0a216f8499c24.png', 0, 4, NULL, '2025-06-16 10:01:58', '2025-06-17 03:49:45'),
(104, 'Tablet', 'tablet-1', 'http://127.0.0.1:8000/storage/photos/2/category/6e3c390fbda68d27de39fcee2bfcc5cb.png', 0, 4, NULL, '2025-06-16 10:02:05', '2025-06-17 03:50:25'),
(105, 'Đồng hồ thông minh', 'dong-ho-thong-minh-1', 'http://127.0.0.1:8000/storage/photos/2/category/eae28a0f5e785d021ff04d8708f55383.png', 0, 4, NULL, '2025-06-16 10:02:24', '2025-06-17 03:51:43'),
(106, 'Máy tính để bàn', 'may-tinh-de-ban', 'http://127.0.0.1:8000/storage/photos/2/category/1f7a724981b643e60362e64c1a5744ce.png', 0, 4, NULL, '2025-06-16 10:02:30', '2025-06-17 03:52:04'),
(107, 'Màn hình', 'man-hinh', 'http://127.0.0.1:8000/storage/photos/2/category/d9d66b8f5d369c170156583a12047ab1.png', 0, 4, NULL, '2025-06-16 10:02:38', '2025-06-17 03:52:28'),
(108, 'Máy chơi game', 'may-choi-game', 'http://127.0.0.1:8000/storage/photos/2/category/6b08326eb6783191ab1b32080618a663.png', 0, 4, NULL, '2025-06-16 10:02:45', '2025-06-17 03:53:07'),
(109, 'Máy in', 'may-in', 'http://127.0.0.1:8000/storage/photos/2/category/a8277b78329ee83d3cc7793525eb82a9.png', 0, 4, NULL, '2025-06-16 10:02:52', '2025-06-17 03:53:50'),
(110, 'Mực in', 'muc-in', 'http://127.0.0.1:8000/storage/photos/2/category/316cd456ce8273458afb91c8b154e38d.png', 0, 4, NULL, '2025-06-16 10:02:59', '2025-06-17 03:54:10'),
(111, 'Máy sấy tóc', 'may-say-toc-1', 'http://127.0.0.1:8000/storage/photos/2/category/dbab72cea0b8d0b583dace9812d264f3.png', 0, 15, NULL, '2025-06-16 10:04:07', '2025-06-17 03:57:13'),
(112, 'Máy sấy tóc', 'may-say-toc-2', NULL, 0, 13, '2025-06-17 03:57:33', '2025-06-16 10:04:24', '2025-06-17 03:57:33'),
(113, 'Máy cạo râu', 'may-cao-rau', 'http://127.0.0.1:8000/storage/photos/2/category/4ae8ea444c499a55c91b4809fad77c19.png', 0, 15, NULL, '2025-06-16 10:04:31', '2025-06-17 03:58:13'),
(114, 'Tông đơ cắt tóc', 'tong-do-cat-toc', 'http://127.0.0.1:8000/storage/photos/2/category/77abcaa413ac3c7edbc51e810c3c6386.png', 0, 15, NULL, '2025-06-16 10:04:40', '2025-06-17 03:59:00'),
(115, 'Máy tỉa lông mũi', 'may-tia-long-mui', 'http://127.0.0.1:8000/storage/photos/2/category/7f0bbd92ef2dfcc2d5c19144cd72bc5f.png', 0, 15, NULL, '2025-06-16 10:04:46', '2025-06-17 03:59:36'),
(116, 'Máy triệt lông', 'may-triet-long', NULL, 0, 13, NULL, '2025-06-16 10:04:56', '2025-06-16 10:04:56'),
(117, 'Máy tạo kiểu tóc', 'may-tao-kieu-toc', NULL, 0, 13, NULL, '2025-06-16 10:05:06', '2025-06-16 10:05:06'),
(118, 'Bàn chải điện', 'ban-chai-dien', NULL, 0, 13, NULL, '2025-06-16 10:05:16', '2025-06-16 10:05:16'),
(119, 'Máy tăm nước', 'may-tam-nuoc', NULL, 0, 13, NULL, '2025-06-16 10:05:31', '2025-06-16 10:05:31'),
(120, 'Máy massage cá nhân', 'may-massage-ca-nhan', NULL, 0, 13, NULL, '2025-06-16 10:05:38', '2025-06-16 10:05:38'),
(121, 'Bồn ngâm chân', 'bon-ngam-chan', NULL, 0, 13, NULL, '2025-06-16 10:05:47', '2025-06-16 10:05:47'),
(122, 'Cân sức khoẻ', 'can-suc-khoe', NULL, 0, 13, NULL, '2025-06-16 10:05:54', '2025-06-16 10:05:54'),
(123, 'Máy tạo ẩm xông tinh dầu', 'may-tao-am-xong-tinh-dau', NULL, 0, 13, NULL, '2025-06-16 10:06:01', '2025-06-16 10:06:01'),
(124, 'Bộ lau nhà', 'bo-lau-nha-1', NULL, 0, 13, NULL, '2025-06-16 10:06:14', '2025-06-16 10:06:14'),
(125, 'Nồi, bộ nồi', 'noi-bo-noi-1', NULL, 0, 13, NULL, '2025-06-16 10:06:22', '2025-06-16 10:06:22'),
(126, 'Chảo các loại', 'chao-cac-loai-1', NULL, 0, 13, NULL, '2025-06-16 10:06:33', '2025-06-16 10:06:33'),
(127, 'Bình, ly giữ nhiệt', 'binh-ly-giu-nhiet', NULL, 0, 13, NULL, '2025-06-16 10:06:40', '2025-06-16 10:06:40'),
(128, 'Bình đựng nước', 'binh-dung-nuoc', NULL, 0, 13, NULL, '2025-06-16 10:06:47', '2025-06-16 10:06:47'),
(129, 'Hộp nhựa đựng đồ đa năng', 'hop-nhua-dung-do-da-nang', NULL, 0, 13, NULL, '2025-06-16 10:06:54', '2025-06-16 10:06:54'),
(130, 'Hộp đựng thực phẩm', 'hop-dung-thuc-pham', NULL, 0, 13, NULL, '2025-06-16 10:07:01', '2025-06-16 10:07:01'),
(131, 'Kéo', 'keo', NULL, 0, 13, NULL, '2025-06-16 10:07:08', '2025-06-16 10:07:08'),
(132, 'Dao', 'dao', NULL, 0, 13, NULL, '2025-06-16 10:07:15', '2025-06-16 10:07:15'),
(133, 'Thớt', 'thot', NULL, 0, 13, NULL, '2025-06-16 10:07:25', '2025-06-16 10:07:25'),
(134, 'Dụng cụ mài dao', 'dung-cu-mai-dao', NULL, 0, 13, NULL, '2025-06-16 10:07:32', '2025-06-16 10:07:32'),
(135, 'Vợt muỗi', 'vot-muoi', NULL, 0, 13, NULL, '2025-06-16 10:07:39', '2025-06-16 10:07:39'),
(136, 'Sạc dự phòng', 'sac-du-phong-1', NULL, 0, 13, NULL, '2025-06-16 10:07:56', '2025-06-16 10:07:56'),
(137, 'Tai nghe', 'tai-nghe-1', NULL, 0, 13, NULL, '2025-06-16 10:08:41', '2025-06-16 10:08:41'),
(138, 'Loa', 'loa-1', NULL, 0, 13, NULL, '2025-06-16 10:08:47', '2025-06-16 10:08:47'),
(139, 'Sạc, cáp', 'sac-cap', NULL, 0, 13, NULL, '2025-06-16 10:08:54', '2025-06-16 10:08:54'),
(140, 'Ốp lưng điện thoại', 'op-lung-dien-thoai', NULL, 0, 13, NULL, '2025-06-16 10:09:01', '2025-06-16 10:09:01'),
(141, 'Ốp lưng máy tính bảng', 'op-lung-may-tinh-bang', NULL, 0, 13, NULL, '2025-06-16 10:09:08', '2025-06-16 10:09:08'),
(142, 'Miếng dán', 'mieng-dan', NULL, 0, 13, NULL, '2025-06-16 10:09:16', '2025-06-16 10:09:16'),
(143, 'Miếng dán Camera', 'mieng-dan-camera', NULL, 0, 13, NULL, '2025-06-16 10:09:23', '2025-06-16 10:09:23'),
(144, 'AirTag, Vỏ bảo vệ AirTag', 'airtag-vo-bao-ve-airtag', NULL, 0, 13, NULL, '2025-06-16 10:09:30', '2025-06-16 10:09:30'),
(145, 'Bút tablet', 'but-tablet', NULL, 0, 13, NULL, '2025-06-16 10:09:36', '2025-06-16 10:09:36'),
(146, 'Camera', 'camera-1', NULL, 0, 13, NULL, '2025-06-16 10:09:43', '2025-06-16 10:09:43'),
(147, 'Chuột máy tính', 'chuot-may-tinh', NULL, 0, 13, NULL, '2025-06-16 10:09:50', '2025-06-16 10:09:50'),
(148, 'Bàn phím', 'ban-phim', NULL, 0, 13, NULL, '2025-06-16 10:09:56', '2025-06-16 10:09:56'),
(149, 'Balo, túi chống sốc', 'balo-tui-chong-soc', NULL, 0, 13, NULL, '2025-06-16 10:10:04', '2025-06-16 10:10:04'),
(150, 'Thiết bị mạng', 'thiet-bi-mang', NULL, 0, 13, NULL, '2025-06-16 10:10:11', '2025-06-16 10:10:11'),
(151, 'Ổ cứng di động', 'o-cung-di-dong', NULL, 0, 13, NULL, '2025-06-16 10:10:19', '2025-06-16 10:10:19'),
(152, 'USB', 'usb', NULL, 0, 13, NULL, '2025-06-16 10:10:27', '2025-06-16 10:10:27'),
(153, 'Phần mềm', 'phan-mem', NULL, 0, 13, NULL, '2025-06-16 10:10:33', '2025-06-16 10:10:33'),
(154, 'Thẻ nhớ', 'the-nho', NULL, 0, 13, NULL, '2025-06-16 10:10:40', '2025-06-16 10:10:40'),
(155, 'Micro', 'micro-1', NULL, 0, 13, NULL, '2025-06-16 10:10:46', '2025-06-16 10:10:46'),
(156, 'Cáp HDMI, cáp tivi', 'cap-hdmi-cap-tivi', NULL, 0, 13, NULL, '2025-06-16 10:10:53', '2025-06-16 10:10:53'),
(157, 'Khung treo tivi', 'khung-treo-tivi', NULL, 0, 13, NULL, '2025-06-16 10:11:01', '2025-06-16 10:11:01'),
(158, 'Điều khiển tivi', 'dieu-khien-tivi', NULL, 0, 13, NULL, '2025-06-16 10:11:09', '2025-06-16 10:11:09'),
(159, 'Giá đỡ máy giặt, máy lọc nước', 'gia-do-may-giat-may-loc-nuoc', NULL, 0, 13, NULL, '2025-06-16 10:11:16', '2025-06-16 10:11:16'),
(160, 'Tivi', 'tivi-3', NULL, 0, 13, NULL, '2025-06-17 01:11:12', '2025-06-17 01:11:12'),
(161, 'Máy lạnh', 'may-lanh-3', NULL, 0, 13, NULL, '2025-06-17 01:11:20', '2025-06-17 01:11:20'),
(162, 'Máy giặt', 'may-giat-2', NULL, 0, 13, NULL, '2025-06-17 01:11:28', '2025-06-17 01:11:28'),
(163, 'Tủ lạnh', 'tu-lanh-3', NULL, 0, 13, NULL, '2025-06-17 01:11:36', '2025-06-17 01:11:36'),
(164, 'Tủ đông', 'tu-dong-1', NULL, 0, 13, NULL, '2025-06-17 01:12:02', '2025-06-17 01:12:02'),
(165, 'Máy sấy', 'may-say', NULL, 0, 13, NULL, '2025-06-17 01:12:09', '2025-06-17 01:12:09'),
(166, 'Máy rửa chén', 'may-rua-chen-1', NULL, 0, 13, NULL, '2025-06-17 01:12:17', '2025-06-17 01:12:17'),
(167, 'Micro', 'micro-2', NULL, 0, 13, NULL, '2025-06-17 01:12:25', '2025-06-17 01:12:25'),
(168, 'Loa karaoke', 'loa-karaoke', NULL, 0, 13, NULL, '2025-06-17 01:12:31', '2025-06-17 01:12:31'),
(169, 'Nồi cơm điện', 'noi-com-dien-1', NULL, 0, 13, NULL, '2025-06-17 01:12:38', '2025-06-17 01:12:38'),
(170, 'Bếp từ', 'bep-tu-1', NULL, 0, 13, NULL, '2025-06-17 01:12:45', '2025-06-17 01:12:45'),
(171, 'Bếp hồng ngoại', 'bep-hong-ngoai-1', NULL, 0, 13, NULL, '2025-06-17 01:12:52', '2025-06-17 01:12:52'),
(172, 'Bếp gas', 'bep-gas', NULL, 0, 13, NULL, '2025-06-17 01:13:01', '2025-06-17 01:13:01'),
(173, 'Máy lọc nước', 'may-loc-nuoc-1', NULL, 0, 13, NULL, '2025-06-17 01:13:08', '2025-06-17 01:13:08'),
(174, 'Cây nước nóng lạnh', 'cay-nuoc-nong-lanh-1', NULL, 0, 13, NULL, '2025-06-17 01:13:15', '2025-06-17 01:13:15'),
(175, 'Xe đạp', 'xe-dap-1', NULL, 0, 13, NULL, '2025-06-17 01:13:21', '2025-06-17 01:13:21'),
(176, 'Quạt', 'quat-2', NULL, 0, 13, NULL, '2025-06-17 01:13:31', '2025-06-17 01:13:31'),
(177, 'Quạt điều hòa', 'quat-dieu-hoa-2', NULL, 0, 13, NULL, '2025-06-17 01:13:38', '2025-06-17 01:13:38'),
(178, 'Máy xay sinh tố', 'may-xay-sinh-to-2', NULL, 0, 13, NULL, '2025-06-17 01:13:45', '2025-06-17 01:13:45'),
(179, 'Máy ép trái cây', 'may-ep-trai-cay-1', NULL, 0, 13, NULL, '2025-06-17 01:13:52', '2025-06-17 01:13:52'),
(180, 'Máy nước nóng', 'may-nuoc-nong-1', NULL, 0, 13, NULL, '2025-06-17 01:14:01', '2025-06-17 01:14:01'),
(181, 'Bàn ủi', 'ban-ui-1', NULL, 0, 13, NULL, '2025-06-17 01:14:08', '2025-06-17 01:14:08'),
(182, 'Điện thoại', 'dien-thoai-2', NULL, 0, 13, NULL, '2025-06-17 01:14:20', '2025-06-17 01:14:20'),
(183, 'Máy tính bảng', 'may-tinh-bang', NULL, 0, 13, NULL, '2025-06-17 01:14:28', '2025-06-17 01:14:28'),
(184, 'Laptop', 'laptop-2', NULL, 0, 13, NULL, '2025-06-17 01:14:35', '2025-06-17 01:14:35'),
(185, 'Đồng hồ thời trang', 'dong-ho-thoi-trang-1', NULL, 0, 13, NULL, '2025-06-17 01:14:42', '2025-06-17 01:14:42'),
(186, 'Đồng hồ thông minh', 'dong-ho-thong-minh-2', NULL, 0, 13, NULL, '2025-06-17 01:14:51', '2025-06-17 01:14:51'),
(187, 'Đồng hồ thanh lý', 'dong-ho-thanh-ly', NULL, 0, 13, NULL, '2025-06-17 01:14:58', '2025-06-17 01:14:58'),
(188, 'Pin sạc dự phòng', 'pin-sac-du-phong', NULL, 0, 13, NULL, '2025-06-17 01:15:05', '2025-06-17 01:15:05'),
(189, 'Chuột', 'chuot', NULL, 0, 13, NULL, '2025-06-17 01:15:12', '2025-06-17 01:15:12'),
(190, 'Cáp sạc Adapter sạc, chuyển đổi', 'cap-sac-adapter-sac-chuyen-doi', NULL, 0, 13, NULL, '2025-06-17 01:15:19', '2025-06-17 01:15:19'),
(191, 'Tai nghe', 'tai-nghe-2', NULL, 0, 13, NULL, '2025-06-17 01:15:27', '2025-06-17 01:15:27'),
(192, 'Phụ kiện điện máy', 'phu-kien-dien-may', NULL, 0, 13, NULL, '2025-06-17 01:15:34', '2025-06-17 01:15:34'),
(193, 'Loa laptop', 'loa-laptop', NULL, 0, 13, NULL, '2025-06-17 01:15:42', '2025-06-17 01:15:42'),
(194, 'Loa', 'loa-2', NULL, 0, 13, NULL, '2025-06-17 01:15:49', '2025-06-17 01:15:49'),
(195, 'Máy bơm nước', 'may-bom-nuoc', NULL, 0, 13, NULL, '2025-06-17 01:15:59', '2025-06-17 01:15:59'),
(196, 'Dụng cụ gia đình', 'dung-cu-gia-dinh', NULL, 0, 13, NULL, '2025-06-17 01:16:07', '2025-06-17 01:16:07'),
(197, 'Ổn áp', 'on-ap', NULL, 0, 13, NULL, '2025-06-17 01:16:15', '2025-06-17 01:16:15'),
(198, 'Máy rửa xe', 'may-rua-xe', NULL, 0, 13, NULL, '2025-06-17 01:16:21', '2025-06-17 01:16:21'),
(199, 'Máy khoan', 'may-khoan', NULL, 0, 13, NULL, '2025-06-17 01:16:28', '2025-06-17 01:16:28'),
(200, 'Máy sấy tóc', 'may-say-toc-3', NULL, 0, 13, NULL, '2025-06-17 01:16:36', '2025-06-17 01:16:36'),
(201, 'Bộ lau nhà', 'bo-lau-nha-2', NULL, 0, 13, NULL, '2025-06-17 01:16:43', '2025-06-17 01:16:43'),
(202, 'Nồi', 'noi', NULL, 0, 13, NULL, '2025-06-17 01:16:50', '2025-06-17 01:16:50'),
(203, 'Mũ bảo hiểm', 'mu-bao-hiem-1', NULL, 0, 13, NULL, '2025-06-17 01:16:58', '2025-06-17 01:16:58'),
(204, 'Đồng hồ thời trang', 'dong-ho-thoi-trang-2', NULL, 0, 13, NULL, '2025-06-17 01:17:14', '2025-06-17 01:17:14'),
(205, 'Xe đạp', 'xe-dap-2', NULL, 0, 13, NULL, '2025-06-17 01:17:21', '2025-06-17 01:17:21'),
(206, 'Camera', 'camera-2', NULL, 0, 13, NULL, '2025-06-17 01:17:29', '2025-06-17 01:17:29'),
(207, 'Mũ bảo hiểm', 'mu-bao-hiem-2', NULL, 0, 13, NULL, '2025-06-17 01:17:36', '2025-06-17 01:17:36'),
(208, 'Ổ cắm - Phích cắm', 'o-cam-phich-cam', NULL, 0, 13, NULL, '2025-06-17 01:17:43', '2025-06-17 01:17:43'),
(209, 'Ổn áp', 'on-ap-1', NULL, 0, 13, NULL, '2025-06-17 01:17:50', '2025-06-17 01:17:50'),
(210, 'Pin tiểu', 'pin-tieu', NULL, 0, 13, NULL, '2025-06-17 01:17:58', '2025-06-17 01:17:58'),
(211, 'Máy rửa xe', 'may-rua-xe-1', NULL, 0, 13, NULL, '2025-06-17 01:18:05', '2025-06-17 01:18:05'),
(212, 'Máy bơm nước', 'may-bom-nuoc-1', NULL, 0, 13, NULL, '2025-06-17 01:18:12', '2025-06-17 01:18:12'),
(213, 'Pin sạc', 'pin-sac', NULL, 0, 13, NULL, '2025-06-17 01:18:20', '2025-06-17 01:18:20'),
(214, 'Tư vấn chọn mua', 'tu-van-chon-mua-1', NULL, 0, 13, NULL, '2025-06-17 01:18:36', '2025-06-17 01:18:36'),
(215, 'Khuyến mãi', 'khuyen-mai-1', NULL, 0, 13, NULL, '2025-06-17 01:18:44', '2025-06-17 01:18:44'),
(216, 'Tìm địa chỉ cửa hàng', 'tim-dia-chi-cua-hang-1', NULL, 0, 13, NULL, '2025-06-17 01:18:51', '2025-06-17 01:18:51'),
(217, 'Tìm hiểu về mua trả chậm', 'tim-hieu-ve-mua-tra-cham', NULL, 0, 13, NULL, '2025-06-17 01:18:58', '2025-06-17 01:18:58'),
(218, 'Tra cứu bảo hành', 'tra-cuu-bao-hanh', NULL, 0, 13, NULL, '2025-06-17 01:19:05', '2025-06-17 01:19:05'),
(219, 'Vệ sinh máy lạnh', 've-sinh-may-lanh-1', NULL, 0, 13, NULL, '2025-06-17 01:19:20', '2025-06-17 01:19:20'),
(220, 'Thay lõi lọc nước', 'thay-loi-loc-nuoc-1', NULL, 0, 13, NULL, '2025-06-17 01:19:26', '2025-06-17 01:19:26'),
(221, 'Bảo hiểm Ô tô - Xe máy', 'bao-hiem-o-to-xe-may-1', NULL, 0, 13, NULL, '2025-06-17 01:19:33', '2025-06-17 01:19:33'),
(222, 'Sim số, thẻ cào', 'sim-so-the-cao', NULL, 0, 13, NULL, '2025-06-17 01:19:41', '2025-06-17 01:19:41'),
(223, 'Đóng tiền trả góp', 'dong-tien-tra-gop', NULL, 0, 13, NULL, '2025-06-17 01:19:48', '2025-06-17 01:19:48'),
(224, 'Đi chợ online', 'di-cho-online', NULL, 0, 13, NULL, '2025-06-17 01:19:55', '2025-06-17 01:19:55'),
(225, 'Vay tiền mặt CAKE', 'vay-tien-mat-cake', NULL, 0, 13, NULL, '2025-06-17 01:20:02', '2025-06-17 01:20:02'),
(226, 'Vay tiền mặt CATHAY', 'vay-tien-mat-cathay', NULL, 0, 13, NULL, '2025-06-17 01:20:08', '2025-06-17 01:20:08');

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
(1, 'Chương trình hot', 'chuong-trinh-hot', NULL, '2025-05-07 18:05:35', '2025-05-07 18:05:35'),
(2, 'Điện tử, điện máy', 'dien-tu-dien-may', NULL, '2025-05-07 18:05:47', '2025-05-07 18:05:47'),
(3, 'Điện gia dụng', 'dien-gia-dung', NULL, '2025-05-07 18:05:56', '2025-05-07 18:05:56'),
(4, 'Điện tử, Viễn thông', 'dien-tu-vien-thong', NULL, '2025-05-07 18:14:10', '2025-05-07 18:14:10'),
(5, 'Làm đẹp, chăm sóc cá nhân', 'lam-dep-cham-soc-ca-nhan', NULL, '2025-06-17 03:55:11', '2025-06-17 03:55:11'),
(6, 'Đồ gia dụng', 'do-gia-dung', NULL, '2025-05-07 18:14:27', '2025-05-07 18:14:27'),
(7, 'Phụ kiện', 'phu-kien', NULL, '2025-05-07 18:14:36', '2025-05-07 18:14:36'),
(8, 'Máy cũ, trưng bày', 'may-cu-trung-bay', NULL, '2025-05-07 18:14:47', '2025-05-07 18:14:47'),
(9, 'Sản phẩm khác', 'san-pham-khac', NULL, '2025-05-07 18:14:56', '2025-05-07 18:14:56'),
(10, 'Thông tin', 'thong-tin', NULL, '2025-05-07 18:15:05', '2025-05-07 18:15:05'),
(11, 'Dịch vụ tiện ích', 'dich-vu-tien-ich', NULL, '2025-05-07 18:15:23', '2025-06-13 08:51:51'),
(12, 'Nguyễn Thế Anh', 'nguyen-the-anh', NULL, '2025-06-13 08:52:27', '2025-06-13 08:52:27'),
(13, 'anhnt@gmail.com', 'anhnt-at-gmailcom', NULL, '2025-06-13 08:58:31', '2025-06-13 08:58:31'),
(14, 'nguyentheanh260204@gmail.com', 'nguyentheanh260204-at-gmailcom', NULL, '2025-06-13 09:00:12', '2025-06-13 09:00:12'),
(15, 'nguyentheanh260204@gmail.com', 'nguyentheanh260204-at-gmailcom-1', NULL, '2025-06-17 02:35:05', '2025-06-17 02:35:05');

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
(1, 'Nguyễn Thế Anh', 'nguyen-the-anh', '1', '2025-06-12 04:32:33', '2025-06-12 04:32:33'),
(2, 'Nguyễn Thế Anh', 'nguyen-the-anh', '1', '2025-06-12 04:32:41', '2025-06-12 04:32:50'),
(3, 'Nguyễn Thế Anh', 'nguyen-the-anh-1', '1', '2025-06-12 04:33:03', '2025-06-12 04:33:03'),
(4, 'Nguyễn Thế Anh', 'nguyen-the-anh-2', '1', '2025-06-12 04:33:14', '2025-06-12 04:33:14'),
(5, 'Nguyễn Thế Anh', 'nguyen-the-anh-3', '1', '2025-06-12 04:40:15', '2025-06-12 04:40:15'),
(6, 'Nguyễn Thế Anh', 'nguyen-the-anh-4', '1', '2025-06-12 04:41:32', '2025-06-12 04:41:32'),
(7, 'Nguyễn Thế Anh', 'nguyen-the-anh-5', '1', '2025-06-12 04:42:37', '2025-06-12 04:42:37');

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
(1, 'Nguyễn Thế Anh', 'nguyen-the-anh', '1', '2025-06-12 04:22:57', '2025-06-12 04:22:57'),
(2, 'Nguyễn Thế Anh', 'nguyen-the-anh-1', '1', '2025-06-12 04:23:07', '2025-06-12 04:23:07'),
(3, 'Nguyễn Thế Anh', 'nguyen-the-anh-2', '1', '2025-06-12 04:23:15', '2025-06-12 04:23:34'),
(4, 'Nguyễn Thế Anh', 'nguyen-the-anh-3', '1', '2025-06-12 04:23:24', '2025-06-12 04:23:42');

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
(1, 'Nguyễn Thế Anh', 'nguyen-the-anh', '1', '2025-06-12 04:28:10', '2025-06-12 04:28:10'),
(2, 'Nguyễn Thế Anh', 'nguyen-the-anh-1', '1', '2025-06-12 04:28:20', '2025-06-12 04:28:20'),
(3, 'Nguyễn Thế Anh', 'nguyen-the-anh', '1', '2025-06-12 04:28:28', '2025-06-12 04:28:45'),
(4, 'Nguyễn Thế Anh', 'nguyen-the-anh-3', '1', '2025-06-12 04:28:37', '2025-06-12 04:28:37');

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
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menuitems`
--

INSERT INTO `menuitems` (`id`, `name`, `link`, `location`, `menu_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 1, 32, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(2, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 1, 33, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(3, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 1, 34, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(4, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 4, 1, 29, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(5, 'Khuyến mãi', '/category/khuyen-mai', 5, 1, 30, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(6, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 6, 1, 31, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(7, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 7, 1, 25, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(8, 'Xe đạp', '/category/xe-dap', 8, 1, 26, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(9, 'Camera', '/category/camera', 9, 1, 27, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(10, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 10, 1, 28, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(11, 'Tivi', '/category/tivi-1', 11, 1, 21, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(12, 'Máy lạnh', '/category/may-lanh-1', 12, 1, 22, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(13, 'Máy giặt', '/category/may-giat', 13, 1, 23, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(14, 'Tủ lạnh', '/category/tu-lanh-1', 14, 1, 24, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(15, 'Sạc dự phòng', '/category/sac-du-phong', 15, 1, 18, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(16, 'Tai nghe', '/category/tai-nghe', 16, 1, 19, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(17, 'Loa', '/category/loa', 17, 1, 20, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(18, 'Bộ lau nhà', '/category/bo-lau-nha', 18, 1, 15, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(19, 'Nồi, bộ nồi', '/category/noi-bo-noi', 19, 1, 16, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(20, 'Chảo các loại', '/category/chao-cac-loai', 20, 1, 17, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(21, 'Điện thoại', '/category/dien-thoai', 21, 1, 11, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(22, 'Laptop', '/category/laptop', 22, 1, 12, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(23, 'Tablet', '/category/tablet', 23, 1, 13, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(24, 'Đồng hồ thông minh', '/category/dong-ho-thong-minh', 24, 1, 14, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(25, 'Quạt điều hòa', '/category/quat-dieu-hoa', 25, 1, 8, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(26, 'Quạt', '/category/quat', 26, 1, 9, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(27, 'Máy xay sinh tố', '/category/may-xay-sinh-to', 27, 1, 10, '2025-06-12 04:25:21', '2025-06-12 04:25:21'),
(28, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 2, 32, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(29, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 2, 33, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(30, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 2, 34, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(31, '123', '/category/123-1', 4, 2, 37, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(32, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 5, 2, 29, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(33, 'Khuyến mãi', '/category/khuyen-mai', 6, 2, 30, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(34, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 7, 2, 31, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(35, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 8, 2, 25, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(36, 'Xe đạp', '/category/xe-dap', 9, 2, 26, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(37, 'Camera', '/category/camera', 10, 2, 27, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(38, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 11, 2, 28, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(39, 'Tivi', '/category/tivi-1', 12, 2, 21, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(40, 'Máy lạnh', '/category/may-lanh-1', 13, 2, 22, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(41, 'Máy giặt', '/category/may-giat', 14, 2, 23, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(42, 'Tủ lạnh', '/category/tu-lanh-1', 15, 2, 24, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(43, 'Sạc dự phòng', '/category/sac-du-phong', 16, 2, 18, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(44, 'Tai nghe', '/category/tai-nghe', 17, 2, 19, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(45, 'Loa', '/category/loa', 18, 2, 20, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(46, 'Bộ lau nhà', '/category/bo-lau-nha', 19, 2, 15, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(47, 'Nồi, bộ nồi', '/category/noi-bo-noi', 20, 2, 16, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(48, 'Chảo các loại', '/category/chao-cac-loai', 21, 2, 17, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(49, 'Điện thoại', '/category/dien-thoai', 22, 2, 11, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(50, 'Laptop', '/category/laptop', 23, 2, 12, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(51, 'Tablet', '/category/tablet', 24, 2, 13, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(52, 'Đồng hồ thông minh', '/category/dong-ho-thong-minh', 25, 2, 14, '2025-06-12 04:26:15', '2025-06-12 04:26:15'),
(53, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 3, 32, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(54, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 3, 33, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(55, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 3, 34, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(56, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 4, 3, 29, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(57, 'Khuyến mãi', '/category/khuyen-mai', 5, 3, 30, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(58, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 6, 3, 31, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(59, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 7, 3, 25, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(60, 'Xe đạp', '/category/xe-dap', 8, 3, 26, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(61, 'Camera', '/category/camera', 9, 3, 27, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(62, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 10, 3, 28, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(63, 'Tivi', '/category/tivi-1', 11, 3, 21, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(64, 'Máy lạnh', '/category/may-lanh-1', 12, 3, 22, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(65, 'Máy giặt', '/category/may-giat', 13, 3, 23, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(66, 'Tủ lạnh', '/category/tu-lanh-1', 14, 3, 24, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(67, 'Sạc dự phòng', '/category/sac-du-phong', 15, 3, 18, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(68, 'Tai nghe', '/category/tai-nghe', 16, 3, 19, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(69, 'Loa', '/category/loa', 17, 3, 20, '2025-06-12 04:27:04', '2025-06-12 04:27:04'),
(70, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 4, 32, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(71, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 4, 33, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(72, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 4, 34, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(73, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 4, 4, 29, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(74, 'Khuyến mãi', '/category/khuyen-mai', 5, 4, 30, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(75, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 6, 4, 31, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(76, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 7, 4, 25, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(77, 'Xe đạp', '/category/xe-dap', 8, 4, 26, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(78, 'Camera', '/category/camera', 9, 4, 27, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(79, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 10, 4, 28, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(80, 'Tivi', '/category/tivi-1', 11, 4, 21, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(81, 'Máy lạnh', '/category/may-lanh-1', 12, 4, 22, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(82, 'Máy giặt', '/category/may-giat', 13, 4, 23, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(83, 'Tủ lạnh', '/category/tu-lanh-1', 14, 4, 24, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(84, '123', '/category/123', 15, 4, 36, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(85, 'Sạc dự phòng', '/category/sac-du-phong', 16, 4, 18, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(86, 'Tai nghe', '/category/tai-nghe', 17, 4, 19, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(87, 'Loa', '/category/loa', 18, 4, 20, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(88, 'Bộ lau nhà', '/category/bo-lau-nha', 19, 4, 15, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(89, 'Nồi, bộ nồi', '/category/noi-bo-noi', 20, 4, 16, '2025-06-12 04:27:42', '2025-06-12 04:27:42'),
(90, 'Chảo các loại', '/category/chao-cac-loai', 21, 4, 17, '2025-06-12 04:27:42', '2025-06-12 04:27:42');

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
(1, 'Menu 1', 'menu-1', 1, '2025-06-12 04:24:01', '2025-06-12 04:24:01'),
(2, 'Menu 2', 'menu-2', 2, '2025-06-12 04:24:20', '2025-06-12 04:24:20'),
(3, 'menu 3', 'menu-3', 3, '2025-06-12 04:24:32', '2025-06-12 04:24:32'),
(4, 'menu 4', 'menu-4', 4, '2025-06-12 04:24:45', '2025-06-12 04:24:45');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2017_09_01_000000_create_authentication_log_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_04_15_093417_create_category_parents_table', 1),
(7, '2025_04_15_093440_create_categories_table', 1),
(8, '2025_04_15_093518_create_posts_table', 1),
(9, '2025_04_15_093603_create_attributes_table', 1),
(10, '2025_04_15_093624_create_products_table', 1),
(11, '2025_04_15_093646_create_product_attribute_values_table', 1),
(12, '2025_04_15_093659_create_product_images_table', 1),
(13, '2025_04_15_093709_create_product_variants_table', 1),
(14, '2025_04_15_100833_create_bills_table', 1),
(15, '2025_04_15_100928_create_bill_items_table', 1),
(16, '2025_04_15_101052_create_reviews_table', 1),
(17, '2025_04_25_080342_create_permission_tables', 1),
(18, '2025_05_05_095637_create_locationmenus_table', 1),
(19, '2025_05_05_100355_create_menus_table', 1),
(20, '2025_05_05_112325_create_menuitems_table', 1),
(21, '2025_05_06_084413_create_locationproductmenus_table', 1),
(22, '2025_05_06_084429_create_productmenus_table', 1),
(23, '2025_05_06_084444_create_productmenuitems_table', 1),
(24, '2025_05_08_161906_create_searchs_table', 1),
(25, '2025_05_09_101937_create_locationbannermenus_table', 1),
(26, '2025_05_09_102144_create_bannermenus_table', 1),
(27, '2025_05_09_102201_create_bannermenuitems_table', 1),
(28, '2025_05_20_170719_create_vouchers_table', 1),
(29, '2025_06_06_092919_create_settings_table', 1),
(30, '2019_02_06_174631_make_acl_rules_table', 2),
(31, '2025_06_13_141422_create_shoppingcart_table', 2),
(32, '2025_06_16_143513_add_informational_to_settings_table', 2);

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
(1, 'App\\Models\\User', 2);

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
(1, 'index dashboard', 'web', 'Read', 'Dashboard', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(2, 'index category parent', 'web', 'Read', 'Category Parent', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(3, 'create category parent', 'web', 'Create', 'Category Parent', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(4, 'edit category parent', 'web', 'Edit', 'Category Parent', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(5, 'delete category parent', 'web', 'Delete', 'Category Parent', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(6, 'index category', 'web', 'Read', 'Category', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(7, 'create category', 'web', 'Create', 'Category', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(8, 'edit category', 'web', 'Edit', 'Category', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(9, 'delete category', 'web', 'Delete', 'Category', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(10, 'index post', 'web', 'Read', 'Post', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(11, 'create post', 'web', 'Create', 'Post', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(12, 'edit post', 'web', 'Edit', 'Post', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(13, 'delete post', 'web', 'Delete', 'Post', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(14, 'index attribute', 'web', 'Read', 'Attribute', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(15, 'create attribute', 'web', 'Create', 'Attribute', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(16, 'edit attribute', 'web', 'Edit', 'Attribute', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(17, 'delete attribute', 'web', 'Delete', 'Attribute', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(18, 'index product', 'web', 'Read', 'Product', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(19, 'create product', 'web', 'Create', 'Product', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(20, 'edit product', 'web', 'Edit', 'Product', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(21, 'delete product', 'web', 'Delete', 'Product', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(22, 'index user', 'web', 'Read', 'User', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(23, 'create user', 'web', 'Create', 'User', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(24, 'edit user', 'web', 'Edit', 'User', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(25, 'delete user', 'web', 'Delete', 'User', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(26, 'index image', 'web', 'Read', 'Image', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(27, 'index voucher', 'web', 'Read', 'Voucher', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(28, 'create voucher', 'web', 'Create', 'Voucher', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(29, 'edit voucher', 'web', 'Edit', 'Voucher', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(30, 'delete voucher', 'web', 'Delete', 'Voucher', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(31, 'index bill', 'web', 'Read', 'Bill', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(32, 'edit bill', 'web', 'Edit', 'Bill', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(33, 'index role permission', 'web', 'Read', 'Role Permission', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(34, 'create role permission', 'web', 'Create', 'Role Permission', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(35, 'edit role permission', 'web', 'Edit', 'Role Permission', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(36, 'delete role permission', 'web', 'Delete', 'Role Permission', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(37, 'index authentication', 'web', 'Read', 'Authentication', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(38, 'index location menu', 'web', 'Read', 'Location Menu', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(39, 'create location menu', 'web', 'Create', 'Location Menu', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(40, 'edit location menu', 'web', 'Edit', 'Location Menu', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(41, 'delete location menu', 'web', 'Delete', 'Location Menu', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(42, 'index location product', 'web', 'Read', 'Location Product', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(43, 'create location product', 'web', 'Create', 'Location Product', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(44, 'edit location product', 'web', 'Edit', 'Location Product', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(45, 'delete location product', 'web', 'Delete', 'Location Product', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(46, 'index location banner', 'web', 'Read', 'Location Banner', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(47, 'create location banner', 'web', 'Create', 'Location Banner', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(48, 'edit location banner', 'web', 'Edit', 'Location Banner', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(49, 'delete location banner', 'web', 'Delete', 'Location Banner', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(50, 'index setting', 'web', 'Read', 'Setting', '2025-06-12 04:10:29', '2025-06-12 04:10:29'),
(51, 'create setting', 'web', 'Create', 'Setting', '2025-06-12 04:10:30', '2025-06-12 04:10:30'),
(52, 'edit setting', 'web', 'Edit', 'Setting', '2025-06-12 04:10:30', '2025-06-12 04:10:30'),
(53, 'delete setting', 'web', 'Delete', 'Setting', '2025-06-12 04:10:30', '2025-06-12 04:10:30');

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
(1, 'Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', 'Máy xay đậu nành là thiết bị hữu ích giúp người dùng chế biến được nhiều thức uống bổ dưỡng như các loại sữa hạt, sữa ngũ cốc, xay sinh tố, nấu cháo, nấu súp,...', '<p>1M&aacute;y l&agrave;m sữa hạt đa năng BlueStone BLB-6031</p>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt đa năng BlueStone BLB-6031 sở hữu thiết kế hiện đại, m&agrave;u sắc trang nh&atilde;, ph&ugrave; hợp với nhiều kh&ocirc;ng gian bếp Việt. Sản phẩm nổi bật với c&ocirc;ng suất xay 800W v&agrave; c&ocirc;ng suất nấu 800W, kết hợp lưỡi dao inox 8 c&aacute;nh sắc b&eacute;n, tốc độ quay mạnh mẽ gi&uacute;p xay nhuyễn thực phẩm dễ d&agrave;ng, kể cả c&aacute;c loại hạt cứng.</p>\r\n\r\n<p>Cối xay bằng thủy tinh borosilicate cao cấp, chịu nhiệt tốt, dung t&iacute;ch sử dụng 1.75 l&iacute;t th&iacute;ch hợp để nấu sữa hạt cho gia đ&igrave;nh 2 - 4 người. M&aacute;y c&ograve;n t&iacute;ch hợp 9 chương tr&igrave;nh nấu tự động như: sữa đậu n&agrave;nh, ch&aacute;o, sinh tố, hầm canh... v&agrave; 9 mức tốc độ xay linh hoạt, k&egrave;m chức năng hẹn giờ l&ecirc;n đến 12 tiếng tiện lợi.</p>\r\n\r\n<p>Bảng điều khiển cảm ứng hiện đại với m&agrave;n h&igrave;nh LED, hướng dẫn tiếng Việt r&otilde; r&agrave;ng, dễ thao t&aacute;c cho cả người lớn tuổi.</p>\r\n\r\n<p><br />\r\nXem th&ecirc;m<br />\r\n7 h&igrave;nh</p>\r\n\r\n<p><br />\r\nM&aacute;y l&agrave;m sữa hạt đa năng Rapido RHB-800DM M&aacute;y l&agrave;m sữa hạt đa năng Rapido RHB-800DM</p>\r\n\r\n<p>label templateTrả chậm 3 th&aacute;ng</p>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt đa năng Rapido RHB-800DM</p>\r\n\r\n<p>1.090.000₫</p>\r\n\r\n<p>1.560.000₫</p>\r\n\r\n<p>-30%</p>\r\n\r\n<p>Qu&agrave; 300.000₫</p>\r\n\r\n<p><br />\r\nXem chi tiết</p>\r\n\r\n<p><br />\r\n❝L&agrave;m sữa mịn❞</p>\r\n\r\n<p>Chi Thường - InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>❝Sản phẩm tốt dễ sử dụng❞</p>\r\n\r\n<p>Đạt - InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>❝M&aacute;y tốt, dễ sử dụng❞</p>\r\n\r\n<p>Nguyễn Thiphương Th&uacute;y - InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>❝Rất tốt❞</p>\r\n\r\n<p>Anh Th&agrave;nh - InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>❝L&agrave;m sữa mịn❞</p>\r\n\r\n<p>Chi Thường - InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>❝Sản phẩm tốt dễ sử dụng❞</p>\r\n\r\n<p>Đạt - InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>❝M&aacute;y tốt, dễ sử dụng❞</p>\r\n\r\n<p>Nguyễn Thiphương Th&uacute;y - InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p>❝Rất tốt❞</p>\r\n\r\n<p>Anh Th&agrave;nh - InfoĐ&atilde; mua tại Điện m&aacute;y XANH</p>\r\n\r\n<p><br />\r\n4M&aacute;y l&agrave;m sữa hạt đa năng Sunhouse SHD5261</p>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt đa năng Sunhouse SHD5261 sở hữu thiết kế nhỏ gọn, hiện đại với t&ocirc;ng m&agrave;u trắng - x&aacute;m trang nh&atilde;, ph&ugrave; hợp với nhiều kh&ocirc;ng gian bếp. M&aacute;y hoạt động với c&ocirc;ng suất 400W, t&iacute;ch hợp lưỡi dao 8 c&aacute;nh bằng th&eacute;p kh&ocirc;ng gỉ sắc b&eacute;n, gi&uacute;p xay nhuyễn mịn c&aacute;c loại hạt v&agrave; thực phẩm.</p>\r\n\r\n<p>Cối xay được l&agrave;m từ thủy tinh chịu lực v&agrave; chịu nhiệt tốt, dung t&iacute;ch 1 l&iacute;t, ph&ugrave; hợp để nấu sữa hoặc s&uacute;p cho gia đ&igrave;nh nhỏ từ 2 - 3 người. Chất liệu cối gi&uacute;p dễ vệ sinh, kh&ocirc;ng b&aacute;m m&ugrave;i thực phẩm v&agrave; an to&agrave;n cho sức khỏe.</p>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt Sunhouse t&iacute;ch hợp 8 chương tr&igrave;nh nấu tự động như ngũ cốc, sữa đậu, ch&aacute;o hạt, s&uacute;p, tr&agrave;, giữ ấm, sữa lắc v&agrave; sinh tố đ&aacute;p ứng đa dạng nhu cầu chế biến của người d&ugrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Xem th&ecirc;m<br />\r\n7 h&igrave;nh</p>\r\n\r\n<p><br />\r\nM&aacute;y l&agrave;m sữa hạt đa năng Sunhouse SHD5261 M&aacute;y l&agrave;m sữa hạt đa năng Sunhouse SHD5261</p>\r\n\r\n<p>label templateTrả chậm 3 th&aacute;ng</p>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt đa năng Sunhouse SHD5261</p>\r\n\r\n<p>1.490.000₫</p>\r\n\r\n<p>1.860.000₫</p>\r\n\r\n<p>-19%</p>\r\n\r\n<p>Qu&agrave; 300.000₫</p>\r\n\r\n<p><br />\r\nXem đặc điểm nổi bật</p>\r\n\r\n<p>Xem chi tiết</p>\r\n\r\n<p>5M&aacute;y l&agrave;m sữa hạt đa năng Kangaroo KG175HB1</p>\r\n\r\n<p>M&aacute;y xay nấu đa năng Kangaroo KG175HB1 sở hữu thiết kế chắc chắn, sang trọng. M&aacute;y được trang bị lưỡi dao 3 lớp 8 c&aacute;nh bằng th&eacute;p kh&ocirc;ng gỉ, c&ocirc;ng suất xay 800W, c&ocirc;ng suất nấu 900W, động cơ mạnh mẽ với lực xoắn v&agrave; tốc độ l&ecirc;n tới 28.000 v&ograve;ng/ph&uacute;t, gi&uacute;p xay nhuyễn mịn c&aacute;c loại thực phẩm một c&aacute;ch nhanh ch&oacute;ng v&agrave; hiệu quả.</p>\r\n\r\n<p>Cối xay bằng thủy tinh cao cấp, dung t&iacute;ch tổng 1.75 l&iacute;t, ph&ugrave; hợp để nấu sữa hoặc s&uacute;p cho gia đ&igrave;nh từ 4 - 5 người. Chất liệu cối gi&uacute;p dễ vệ sinh, kh&ocirc;ng b&aacute;m m&ugrave;i thực phẩm v&agrave; an to&agrave;n cho sức khỏe.</p>\r\n\r\n<p>M&aacute;y l&agrave;m sữa hạt Kangaroo t&iacute;ch hợp 11 chương tr&igrave;nh nấu tự động v&agrave; 9 tốc độ xay, đ&aacute;p ứng đa dạng nhu cầu chế biến của người d&ugrave;ng. Ngo&agrave;i ra, m&aacute;y c&ograve;n hỗ trợ chức năng hẹn giờ l&ecirc;n đến 12 tiếng, tiện lợi cho việc chuẩn bị m&oacute;n ăn theo lịch tr&igrave;nh c&aacute; nh&acirc;n.</p>\r\n\r\n<p>M&aacute;y được trang bị bảng điều khiển cảm ứng hiện đại với m&agrave;n h&igrave;nh LED, hỗ trợ ng&ocirc;n ngữ Anh - Việt, gi&uacute;p người d&ugrave;ng dễ d&agrave;ng thao t&aacute;c v&agrave; t&ugrave;y chỉnh c&aacute;c chức năng. Ngo&agrave;i ra, sản phẩm c&ograve;n c&oacute; t&iacute;nh năng chỉ hoạt động khi cối được lắp đ&uacute;ng khớp với th&acirc;n m&aacute;y v&agrave; ch&acirc;n đế chống trượt, đảm bảo an to&agrave;n trong qu&aacute; tr&igrave;nh sử dụng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 'may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 33, 0, 'published', '2025-06-05 12:00:00', 34, 1, NULL, '2025-05-07 19:19:20', '2025-06-05 02:36:20'),
(2, 'Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', '1', '<p>`1234567890</p>', '1', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, 'published', '2025-05-09 12:00:00', 30, 1, NULL, '2025-05-08 18:11:05', '2025-05-08 18:11:05'),
(3, 'Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', 'Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', '<p>123456</p>', 'may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat-may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 2, 1, 'published', '2025-06-05 12:00:00', 34, 1, NULL, '2025-05-08 18:11:32', '2025-06-05 00:38:43'),
(4, 'Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', 'Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', '<p>2132132</p>', 'may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat-may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat-1', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 2, 0, 'published', '2025-06-05 14:03:44', 30, 1, NULL, '2025-05-12 00:03:44', '2025-06-05 00:18:22'),
(5, '123321 Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', '212132 Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', '<p>1232</p>', '123321-may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat-may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 4, 0, 'published', '2025-06-04 12:00:00', 34, 1, NULL, '2025-05-12 01:39:47', '2025-06-05 00:38:40'),
(6, '123321 Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', '123321 Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất Máy xay đậu nành loại nào tốt? Top 5 máy xay đậu nành đáng mua nhất', '<p><strong>123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất123321 M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất M&aacute;y xay đậu n&agrave;nh loại n&agrave;o tốt? Top 5 m&aacute;y xay đậu n&agrave;nh đ&aacute;ng mua nhất</strong></p>', '123321-may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat-may-xay-dau-nanh-loai-nao-tot-top-5-may-xay-dau-nanh-dang-mua-nhat-1', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 1, 'published', '2025-06-03 12:00:00', 34, 2, NULL, '2025-06-04 20:05:07', '2025-06-05 00:13:57');

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
(1, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 2, 1, 32, '2025-06-12 04:30:00', '2025-06-16 08:15:17'),
(2, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 3, 1, 33, '2025-06-12 04:30:00', '2025-06-16 08:15:17'),
(3, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 4, 1, 34, '2025-06-12 04:30:00', '2025-06-16 08:15:17'),
(4, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 5, 1, 29, '2025-06-12 04:30:00', '2025-06-16 08:15:17'),
(5, 'Khuyến mãi', '/category/khuyen-mai', 6, 1, 30, '2025-06-12 04:30:00', '2025-06-16 08:15:17'),
(6, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 7, 1, 31, '2025-06-12 04:30:00', '2025-06-16 08:15:17'),
(7, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 1, 1, 25, '2025-06-12 04:30:00', '2025-06-16 08:15:17'),
(8, 'Xe đạp', '/category/xe-dap', 8, 1, 26, '2025-06-12 04:30:00', '2025-06-12 04:30:00'),
(9, 'Camera', '/category/camera', 9, 1, 27, '2025-06-12 04:30:00', '2025-06-12 04:30:00'),
(10, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 10, 1, 28, '2025-06-12 04:30:00', '2025-06-12 04:30:00'),
(11, 'Tivi', '/category/tivi-1', 11, 1, 21, '2025-06-12 04:30:00', '2025-06-12 04:30:00'),
(12, 'Máy lạnh', '/category/may-lanh-1', 12, 1, 22, '2025-06-12 04:30:00', '2025-06-12 04:30:00'),
(13, 'Máy giặt', '/category/may-giat', 13, 1, 23, '2025-06-12 04:30:00', '2025-06-12 04:30:00'),
(14, 'Tủ lạnh', '/category/tu-lanh-1', 14, 1, 24, '2025-06-12 04:30:00', '2025-06-12 04:30:00'),
(15, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 2, 32, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(16, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 2, 33, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(17, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 2, 34, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(18, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 4, 2, 29, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(19, 'Khuyến mãi', '/category/khuyen-mai', 5, 2, 30, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(20, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 6, 2, 31, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(21, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 7, 2, 25, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(22, 'Xe đạp', '/category/xe-dap', 8, 2, 26, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(23, 'Camera', '/category/camera', 9, 2, 27, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(24, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 10, 2, 28, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(25, 'Tivi', '/category/tivi-1', 11, 2, 21, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(26, 'Máy lạnh', '/category/may-lanh-1', 12, 2, 22, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(27, 'Máy giặt', '/category/may-giat', 13, 2, 23, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(28, 'Tủ lạnh', '/category/tu-lanh-1', 14, 2, 24, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(29, 'Sạc dự phòng', '/category/sac-du-phong', 15, 2, 18, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(30, 'Tai nghe', '/category/tai-nghe', 16, 2, 19, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(31, 'Loa', '/category/loa', 17, 2, 20, '2025-06-12 04:30:22', '2025-06-12 04:30:22'),
(32, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 3, 32, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(33, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 3, 33, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(34, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 3, 34, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(35, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 4, 3, 29, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(36, 'Khuyến mãi', '/category/khuyen-mai', 5, 3, 30, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(37, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 6, 3, 31, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(38, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 7, 3, 25, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(39, 'Xe đạp', '/category/xe-dap', 8, 3, 26, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(40, 'Camera', '/category/camera', 9, 3, 27, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(41, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 10, 3, 28, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(42, 'Tivi', '/category/tivi-1', 11, 3, 21, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(43, 'Máy lạnh', '/category/may-lanh-1', 12, 3, 22, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(44, 'Máy giặt', '/category/may-giat', 13, 3, 23, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(45, 'Tủ lạnh', '/category/tu-lanh-1', 14, 3, 24, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(46, 'Sạc dự phòng', '/category/sac-du-phong', 15, 3, 18, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(47, 'Tai nghe', '/category/tai-nghe', 16, 3, 19, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(48, 'Loa', '/category/loa', 17, 3, 20, '2025-06-12 04:30:59', '2025-06-12 04:30:59'),
(49, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 4, 32, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(50, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 4, 33, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(51, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 4, 34, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(52, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 4, 4, 29, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(53, 'Khuyến mãi', '/category/khuyen-mai', 5, 4, 30, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(54, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 6, 4, 31, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(55, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 7, 4, 25, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(56, 'Xe đạp', '/category/xe-dap', 8, 4, 26, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(57, 'Camera', '/category/camera', 9, 4, 27, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(58, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 10, 4, 28, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(59, 'Tivi', '/category/tivi-1', 11, 4, 21, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(60, 'Máy lạnh', '/category/may-lanh-1', 12, 4, 22, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(61, 'Máy giặt', '/category/may-giat', 13, 4, 23, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(62, 'Tủ lạnh', '/category/tu-lanh-1', 14, 4, 24, '2025-06-12 04:31:25', '2025-06-12 04:31:25'),
(63, 'Vệ sinh máy lạnh', '/category/ve-sinh-may-lanh', 1, 5, 32, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(64, 'Thay lõi lọc nước', '/category/thay-loi-loc-nuoc', 2, 5, 33, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(65, 'Bảo hiểm Ô tô - Xe máy', '/category/bao-hiem-o-to-xe-may', 3, 5, 34, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(66, 'Tư vấn chọn mua', '/category/tu-van-chon-mua', 4, 5, 29, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(67, 'Khuyến mãi', '/category/khuyen-mai', 5, 5, 30, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(68, 'Tìm địa chỉ cửa hàng', '/category/tim-dia-chi-cua-hang', 6, 5, 31, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(69, 'Đồng hồ thời trang', '/category/dong-ho-thoi-trang', 7, 5, 25, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(70, 'Xe đạp', '/category/xe-dap', 8, 5, 26, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(71, 'Camera', '/category/camera', 9, 5, 27, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(72, 'Mũ bảo hiểm', '/category/mu-bao-hiem', 10, 5, 28, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(73, 'Tivi', '/category/tivi-1', 11, 5, 21, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(74, 'Máy lạnh', '/category/may-lanh-1', 12, 5, 22, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(75, 'Máy giặt', '/category/may-giat', 13, 5, 23, '2025-06-12 04:32:07', '2025-06-12 04:32:07'),
(76, 'Tủ lạnh', '/category/tu-lanh-1', 14, 5, 24, '2025-06-12 04:32:07', '2025-06-12 04:32:07');

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
(1, 'Khuyến mãi Online', 'sale-online', 1, '2025-06-12 04:28:58', '2025-06-16 08:20:14'),
(2, 'Gợi ý cho bạn', 'nguyen-the-anh-1', 2, '2025-06-12 04:29:07', '2025-06-16 08:21:50'),
(3, 'Sản Phẩm Đặc Quyền', 'nguyen-the-anh-2', 3, '2025-06-12 04:29:16', '2025-06-16 08:23:12'),
(4, 'Nguyễn Thế Anh', 'nguyen-the-anh-3', 4, '2025-06-12 04:29:25', '2025-06-12 04:29:25'),
(5, 'Nguyễn Thế Anh', 'nguyen-the-anh-4', 4, '2025-06-12 04:31:46', '2025-06-12 04:31:46');

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
(1, 'NIS-C09R2T28', 'Máy lạnh Nagakawa Inverter 1 HP NIS-C09R2T28 + 12', 'may-lanh-nagakawa-inverter-1-hp-nis-c09r2t28-12', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, '<p>Đ&aacute;nh gi&aacute; chi tiết m&aacute;y lạnh Nagakawa Inverter 1 HP NIS-C09R2T28<br />\r\nM&aacute;y lạnh Nagakawa Inverter 1 HP NIS-C09R2T28&nbsp;c&oacute; khả năng l&agrave;m lạnh nhanh nhưng vẫn đảm bảo được hiệu quả tiết kiệm điện. Hơn nữa, mẫu m&aacute;y lạnh n&agrave;y c&ograve;n c&oacute; thể h&uacute;t ẩm độc lập, gi&uacute;p căn ph&ograve;ng trở n&ecirc;n kh&ocirc; tho&aacute;ng cho những ng&agrave;y trời ẩm ướt.</p>\r\n\r\n<p>Thiết kế<br />\r\nD&agrave;n lạnh:</p>\r\n\r\n<p>Được thiết kế&nbsp;h&igrave;nh chữ nhật nằm ngang&nbsp;quen thuộc với chất liệu vỏ nhựa cao cấp v&agrave; sở hữu gam&nbsp;m&agrave;u trắng tinh tế.</p>\r\n\r\n<p>D&agrave;n n&oacute;ng:</p>\r\n\r\n<p>- Được thiết kế&nbsp;h&igrave;nh hộp chữ nhật&nbsp;với chất liệu vỏ nhựa bền bỉ.</p>\r\n\r\n<p>-&nbsp;L&aacute; tản nhiệt bằng nh&ocirc;m được phủ lớp Golden Fin&nbsp;c&oacute; khả năng chống ăn m&ograve;n tốt, gi&uacute;p tăng độ bền cho m&aacute;y trong suốt thời gian hoạt động.</p>\r\n\r\n<p>- Cả d&agrave;n lạnh v&agrave; d&agrave;n n&oacute;ng của&nbsp;m&aacute;y lạnh Nagakawa&nbsp;đều&nbsp;sử dụng ống dẫn gas được l&agrave;m bằng đồng, cho khả năng l&agrave;m lạnh nhanh v&agrave; s&acirc;u.</p>\r\n\r\n<p>- M&aacute;y lạnh&nbsp;sử dụng gas R32&nbsp;th&acirc;n thiện với m&ocirc;i trường v&agrave; mang lại hiệu quả l&agrave;m m&aacute;t tối ưu.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>C&ocirc;ng nghệ l&agrave;m lạnh<br />\r\n-&nbsp;M&aacute;y lạnh&nbsp;sở hữu&nbsp;c&ocirc;ng suất 1 HP, đ&aacute;p ứng khả năng l&agrave;m lạnh cho những căn ph&ograve;ng c&oacute; diện t&iacute;ch&nbsp;dưới 15m&sup2;.</p>\r\n\r\n<p>-&nbsp;Chế độ l&agrave;m lạnh nhanh Turbo: Động cơ m&aacute;y n&eacute;n sẽ hoạt động với c&ocirc;ng suất tối đa, gi&uacute;p nhiệt độ trong căn ph&ograve;ng được hạ nhanh ch&oacute;ng đến mức nhiệt độ m&agrave; người d&ugrave;ng c&agrave;i đặt, nhờ đ&oacute; người d&ugrave;ng&nbsp;cảm thấy m&aacute;t lạnh gần như ngay lập tức&nbsp;sau khi k&iacute;ch hoạt chế độ n&agrave;y.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>Cơ chế thổi gi&oacute;<br />\r\nCảm biến nhiệt độ I Feel: Cho ph&eacute;p người d&ugrave;ng c&oacute; thể tự động điều chỉnh chế độ hoạt động của m&aacute;y lạnh tại vị tr&iacute; remote nhờ bộ phận cảm biến được t&iacute;ch hợp, từ đ&oacute; gi&uacute;p người d&ugrave;ng&nbsp;cảm thấy m&aacute;t mẻ v&agrave; thoải m&aacute;i d&ugrave; ngồi bất k&igrave; vị tr&iacute; n&agrave;o gần remote m&aacute;y lạnh&nbsp;trong căn ph&ograve;ng.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>C&aacute;c c&ocirc;ng nghệ tiết kiệm điện<br />\r\n-&nbsp;C&ocirc;ng nghệ Inverter: C&oacute; khả năng điều chỉnh linh hoạt v&ograve;ng quay m&aacute;y n&eacute;n, gi&uacute;p m&aacute;y lạnh&nbsp;duy tr&igrave; nhiệt độ ổn định&nbsp;b&ecirc;n trong căn ph&ograve;ng m&agrave; vẫn&nbsp;ti&ecirc;u thụ điện năng &iacute;t nhất&nbsp;c&oacute; thể.</p>\r\n\r\n<p>-&nbsp;Chức năng tiết kiệm năng lượng (Economy): Hỗ trợ m&aacute;y lạnh c&oacute; khả năng&nbsp;tiết kiệm điện đến mức tối ưu, g&oacute;p phần l&agrave;m giảm chi ph&iacute; tiền điện mỗi th&aacute;ng cho người sử dụng.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>Khả năng lọc kh&ocirc;ng kh&iacute; - sức khoẻ<br />\r\nM&agrave;ng lọc 6 trong 1: Được cấu tạo từ 6 tấm lọc gồm c&oacute; Photocatalyst, Ion Silver, Active Carbon, Catechin, Vitamin C v&agrave; Catalyst, nhờ đ&oacute; mang lại khả năng&nbsp;lọc sạch bụi bẩn v&agrave; c&aacute;c chất g&acirc;y dị ứng tối ưu, đồng thời&nbsp;khử m&ugrave;i h&ocirc;i hiệu quả, trả lại&nbsp;bầu kh&ocirc;ng kh&iacute; tươi m&aacute;t&nbsp;cho căn ph&ograve;ng, thậm ch&iacute; c&ograve;n&nbsp;hỗ trợ l&agrave;m đẹp da&nbsp;cho người sử dụng.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>Tiện &iacute;ch<br />\r\n-&nbsp;Hẹn giờ bật tắt m&aacute;y: C&oacute; khả năng hẹn giờ bật hoặc tắt m&aacute;y l&ecirc;n đến 24 tiếng, gi&uacute;p người d&ugrave;ng&nbsp;kiểm so&aacute;t thời gian sử dụng m&aacute;y lạnh, tiện lợi cho việc sử dụng v&agrave;o ban đ&ecirc;m.</p>\r\n\r\n<p>-&nbsp;Tự khởi động lại khi c&oacute; điện: C&oacute; khả năng tự khởi động lại khi xảy ra t&igrave;nh trạng c&uacute;p điện đột ngột, m&agrave; người d&ugrave;ng kh&ocirc;ng cần phải c&agrave;i đặt lại chế độ l&agrave;m lạnh như ban đầu.</p>\r\n\r\n<p>-&nbsp;Chế độ c&agrave;i đặt y&ecirc;u th&iacute;ch I-set:&nbsp;M&aacute;y lạnh Nagakawa Inverter&nbsp;n&agrave;y c&oacute; khả năng ghi nhớ c&agrave;i đặt y&ecirc;u th&iacute;ch của người sử dụng, từ đ&oacute;&nbsp;giảm bớt thao t&aacute;c v&agrave; thời gian c&agrave;i đặt&nbsp;m&aacute;y lạnh mỗi khi d&ugrave;ng.</p>\r\n\r\n<p>-&nbsp;Chế độ vận h&agrave;nh khi ngủ:&nbsp;M&aacute;y lạnh Nagakawa 1 HP&nbsp;n&agrave;y c&oacute; thể tự động tăng nhiệt độ v&agrave;o ban đ&ecirc;m,&nbsp;tr&aacute;nh g&acirc;y cảm gi&aacute;c lạnh buốt&nbsp;v&agrave; gi&uacute;p cho người d&ugrave;ng c&oacute; được giấc ngủ ngon hơn.</p>\r\n\r\n<p>*H&igrave;nh ảnh chỉ mang t&iacute;nh chất minh họa</p>\r\n\r\n<p>T&oacute;m lại, m&aacute;y lạnh Nagakawa Inverter 1 HP NIS-C09R2T28 ph&ugrave; hợp cho mọi gia đ&igrave;nh hiện nay khi c&oacute; nhu cầu l&agrave;m m&aacute;t trong căn ph&ograve;ng nhỏ diện t&iacute;ch dưới 15m&sup2;. Hơn nữa, chiếc m&aacute;y lạnh n&agrave;y rất th&iacute;ch hợp cho những ai c&oacute; sức khỏe nhạy cảm khi nằm trong ph&ograve;ng m&aacute;y lạnh nhờ trang bị chế độ hoạt động khi ngủ v&agrave; bộ lọc 6 trong 1.&nbsp;</p>', 26, NULL, '2025-05-07 19:27:41', '2025-06-16 04:47:59'),
(2, 'GC-12IS35', 'Máy lạnh Casper Inverter 1.5 HP GC-12IS35 + 12', 'may-lanh-casper-inverter-15-hp-gc-12is35-12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 1, '<p><em>19.990.00019.990.000</em></p>', 25, NULL, '2025-05-07 20:54:05', '2025-06-17 02:05:10'),
(3, '1', '1 + 12', '1-12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 3, 1, '<p>1</p>', 5, NULL, '2025-05-07 20:55:45', '2025-06-12 07:06:04'),
(4, '2', '2 + 12', '2', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 2, 1, '<p>2</p>', 25, NULL, '2025-05-07 20:56:14', '2025-06-16 02:05:35'),
(5, '3', '3 + 12', '3-12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 2, 0, '<p>3</p>', 5, NULL, '2025-05-07 20:57:59', '2025-06-17 01:09:33'),
(6, '4', '4 + 12', '4', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, '<p>4</p>', 7, NULL, '2025-05-07 20:58:58', '2025-05-07 20:58:58'),
(7, '5', '5 + 12', '5-12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 4, 1, '<p>5</p>', 25, NULL, '2025-05-07 20:59:33', '2025-06-16 02:17:04'),
(8, '6', '6 + 12', '6-12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 0, 0, NULL, 8, NULL, '2025-05-07 21:00:13', '2025-06-02 02:50:53'),
(9, '7', '7 + 12', '7-12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 10, 0, '<p>7</p>', 25, NULL, '2025-05-07 21:00:51', '2025-06-16 02:17:04'),
(10, '8', '8 + 12', '8-12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 0, '<p>8</p>', 8, NULL, '2025-05-07 21:01:32', '2025-06-12 07:05:15'),
(11, '9', '9 + 12', '9-12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 0, '<p>9</p>', 25, NULL, '2025-05-07 21:02:18', '2025-06-12 07:05:35'),
(12, '10', '10 + 12', '10-12', 'http://127.0.0.1:8000/userfiles/images/gratisography-augmented-reality-800x525.jpg', 1, 1, '<p>10</p>', 7, NULL, '2025-05-07 21:03:04', '2025-06-12 07:59:14'),
(13, '11', '11 + 12', '11-12', 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', 7, 0, '<p>11</p>', 9, NULL, '2025-05-07 21:03:50', '2025-06-12 07:59:14'),
(14, '12', '12 + 12', '12-12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>12</p>', 25, NULL, '2025-05-07 21:04:48', '2025-06-02 18:21:58'),
(15, '13', '13 Đồng hồ thời trang Đồng hồ thời trang Đồng hồ thời trang Đồng hồ thời trang Đồng hồ thời trang + 12', '13-dong-ho-thoi-trang-dong-ho-thoi-trang-dong-ho-thoi-trang-dong-ho-thoi-trang-dong-ho-thoi-trang-12', 'http://127.0.0.1:8000/userfiles/images/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 0, '<p>13</p>', 9, NULL, '2025-05-07 21:48:27', '2025-06-02 18:21:46'),
(16, '23', '232', '232', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 1, 0, '<p>123</p>', 20, NULL, '2025-05-12 00:51:49', '2025-06-16 02:22:02'),
(17, '123', 'anhntph43180@fpt.edu12341243125245.vn + 12', '123', 'http://127.0.0.1:8000/storage/photos/2/pngtree-flower-jpg-vector-png-image_6886192.png', 0, 1, '<p>123r</p>', 24, '2025-05-29 23:57:03', '2025-05-12 01:02:03', '2025-05-29 23:57:03');

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
(1, 3, 14, '4k', '2025-05-07 20:55:45', '2025-06-02 02:49:57'),
(2, 2, 15, 'Đỏ', '2025-05-07 20:56:33', '2025-06-02 02:49:41'),
(3, 1, 13, '8GB', '2025-05-07 20:57:07', '2025-06-02 02:49:31'),
(4, 5, 12, 'olded', '2025-05-07 20:57:59', '2025-06-02 02:50:24'),
(5, 7, 13, '5gb', '2025-05-07 20:59:33', '2025-06-02 02:50:38'),
(6, 8, 1, '1HP', '2025-05-07 21:00:13', '2025-06-02 02:50:53'),
(7, 9, 12, '4K', '2025-05-07 21:00:51', '2025-06-02 18:23:57'),
(8, 11, 15, 'XaNh', '2025-05-07 21:02:18', '2025-06-02 18:23:00'),
(9, 13, 13, '11GB', '2025-05-07 21:03:50', '2025-06-02 18:22:12'),
(10, 14, 12, '70Ich', '2025-05-07 21:04:48', '2025-06-02 18:21:58'),
(11, 15, 13, '13GB', '2025-05-07 21:48:27', '2025-06-02 18:21:46'),
(12, 16, 14, '2k', '2025-05-12 00:51:49', '2025-06-02 19:23:49'),
(13, 17, 14, '1234', '2025-05-12 01:02:03', '2025-05-15 21:09:20'),
(14, 16, 13, '8GB', '2025-06-02 18:21:33', '2025-06-02 19:23:49'),
(15, 16, 12, 'oldled', '2025-06-02 18:21:33', '2025-06-02 19:23:49'),
(16, 15, 14, '4k', '2025-06-02 18:21:46', '2025-06-02 18:21:46'),
(17, 14, 14, '4k', '2025-06-02 18:21:58', '2025-06-02 18:21:58'),
(18, 13, 14, '4K', '2025-06-02 18:22:12', '2025-06-02 18:22:12'),
(19, 12, 14, '4K', '2025-06-02 18:22:36', '2025-06-02 18:22:36'),
(20, 12, 13, '8gb', '2025-06-02 18:22:36', '2025-06-02 18:22:36'),
(21, 11, 13, '4gb', '2025-06-02 18:23:00', '2025-06-02 18:23:00'),
(22, 11, 12, 'olded', '2025-06-02 18:23:00', '2025-06-02 18:23:00'),
(23, 10, 14, '2k', '2025-06-02 18:23:29', '2025-06-02 18:23:29'),
(24, 10, 13, '16gb', '2025-06-02 18:23:29', '2025-06-02 18:23:29'),
(25, 9, 14, '126hz', '2025-06-02 18:23:57', '2025-06-02 18:23:57'),
(26, 9, 13, '6gb', '2025-06-02 18:23:57', '2025-06-02 18:23:57');

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
(1, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525.jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525(1).jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525(2).jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 1, '2025-05-07 19:27:41', '2025-05-07 19:27:41'),
(2, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525.jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525(1).jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525(2).jpg\",\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 2, '2025-05-07 20:54:47', '2025-05-07 20:54:47'),
(3, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 3, '2025-05-07 20:55:45', '2025-05-07 20:55:45'),
(4, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 4, '2025-05-07 20:56:14', '2025-05-07 20:56:14'),
(5, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/gratisography-augmented-reality-800x525.jpg\"]', 5, '2025-05-07 20:57:59', '2025-05-07 20:57:59'),
(6, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 6, '2025-05-07 20:58:58', '2025-05-07 20:58:58'),
(7, '[\"http:\\/\\/127.0.0.1:8000\\/userfiles\\/images\\/pngtree-flower-jpg-vector-png-image_6886192.png\"]', 15, '2025-05-07 21:48:27', '2025-05-07 21:48:27'),
(8, '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/pngtree-flower-jpg-vector-png-image_6886192.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/gratisography-augmented-reality-800x525.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1e79e4c6294b601281013b2fb99433b.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/c5d3883a7a8533d3172a6386bbf87b84.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1123f3241680e57094af88bd1c6675b.png\"]', 17, '2025-05-12 01:02:03', '2025-05-15 21:09:20'),
(9, '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/607e0cd2ba3a68161bcbc99e71179c24.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/197e8e38f558b24af8e415c2cc7dba8d.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/9924377b70eebde3615863d508ff352e.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/92606e36fe0b41c33b95e18550cfa673.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/pngtree-flower-jpg-vector-png-image_6886192.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/gratisography-augmented-reality-800x525.jpg\"]', 13, '2025-05-12 21:43:35', '2025-05-12 21:47:09'),
(10, '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/9924377b70eebde3615863d508ff352e.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/c5d3883a7a8533d3172a6386bbf87b84.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1123f3241680e57094af88bd1c6675b.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/pngtree-flower-jpg-vector-png-image_6886192.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/gratisography-augmented-reality-800x525.jpg\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1e79e4c6294b601281013b2fb99433b.png\"]', 16, '2025-05-15 21:08:33', '2025-05-15 21:08:33'),
(11, '[\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/e1123f3241680e57094af88bd1c6675b.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/c5d3883a7a8533d3172a6386bbf87b84.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/9924377b70eebde3615863d508ff352e.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/950a82c88b10d6c42df763f2ad9b8151.png\",\"http:\\/\\/127.0.0.1:8000\\/storage\\/photos\\/2\\/92606e36fe0b41c33b95e18550cfa673.png\"]', 9, '2025-06-02 02:51:23', '2025-06-02 02:51:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(20,0) DEFAULT NULL,
  `price_old` decimal(20,0) DEFAULT NULL,
  `import_price` decimal(20,0) DEFAULT NULL,
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

INSERT INTO `product_variants` (`id`, `name`, `price`, `price_old`, `import_price`, `stock_quantity`, `status`, `product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1 hp', 4990000, 8990000, 4000000, 10, 'published', 1, NULL, '2025-05-07 19:27:41', '2025-06-16 04:47:59'),
(2, '2 hp', 6990000, 10990000, 6000000, 11, 'published', 1, NULL, '2025-05-07 19:27:41', '2025-06-02 02:49:31'),
(3, '1 hp', 6590000, 9290000, 5000000, 7, 'published', 2, NULL, '2025-05-07 20:54:05', '2025-06-17 02:05:10'),
(4, '2.5 hp', 15390000, 19990000, 14000000, 3, 'published', 2, NULL, '2025-05-07 20:54:05', '2025-06-16 01:33:07'),
(5, '1', 1539000, 15390000, 11000000, 0, 'published', 3, NULL, '2025-05-07 20:55:45', '2025-06-12 07:06:04'),
(6, '2', 100000, 200000, 50000, 1, 'published', 4, NULL, '2025-05-07 20:56:14', '2025-06-16 02:05:35'),
(7, '3', 4000000, 5000000, 3000000, 1, 'published', 5, NULL, '2025-05-07 20:57:59', '2025-06-17 01:09:33'),
(8, '4', 1000000, 2000000, 750000, 4, 'published', 6, NULL, '2025-05-07 20:58:58', '2025-05-07 20:58:58'),
(9, '5', 55000, 30000, 20000, 15, 'published', 7, NULL, '2025-05-07 20:59:33', '2025-06-16 02:17:04'),
(10, '6', 799000, 890000, 600000, 6, 'published', 8, NULL, '2025-05-07 21:00:13', '2025-06-02 02:50:53'),
(11, '7', 650000, 750000, 500000, 7, 'published', 9, NULL, '2025-05-07 21:00:51', '2025-06-16 02:17:04'),
(12, '8', 800000, 900000, 600000, 7, 'published', 10, NULL, '2025-05-07 21:01:32', '2025-06-12 07:05:15'),
(13, '9', 99900, 10000, 5000, 8, 'published', 11, NULL, '2025-05-07 21:02:18', '2025-06-12 07:05:35'),
(14, '10', 79000, 99000, 55000, 9, 'published', 12, NULL, '2025-05-07 21:03:04', '2025-06-12 07:59:14'),
(15, '11', 19000, 29000, 10000, 6, 'published', 13, NULL, '2025-05-07 21:03:50', '2025-06-12 07:59:14'),
(16, '12', 250000, 300000, 1500000, 12, 'published', 14, NULL, '2025-05-07 21:04:48', '2025-06-02 18:21:58'),
(17, '13', 139000, 159000, 98000, 13, 'published', 15, NULL, '2025-05-07 21:48:27', '2025-06-02 18:21:46'),
(18, '123', 175000, 230000, 109000, 122, 'published', 16, NULL, '2025-05-12 00:51:49', '2025-06-16 02:22:02'),
(19, '123', 399000, 450000, 250000, 32, 'published', 17, NULL, '2025-05-12 01:02:03', '2025-05-15 21:09:20'),
(20, '342', 1599000, 2999000, 750000, 233, 'published', 13, NULL, '2025-05-12 21:43:35', '2025-06-12 07:06:43'),
(21, '234', 450000, 500000, 390000, 42, 'published', 13, NULL, '2025-05-12 21:43:35', '2025-06-12 07:06:43'),
(22, '321', 239000, 400000, 189000, 123, 'published', 17, NULL, '2025-05-15 20:49:41', '2025-05-15 21:09:20'),
(23, '222', 135000, 320000, 10000, 123, 'published', 17, NULL, '2025-05-15 20:56:06', '2025-05-15 21:09:20'),
(24, '12333', 123000, 159000, 76000, 123321, 'published', 17, NULL, '2025-05-15 20:56:06', '2025-05-15 21:09:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bill_item_id` bigint UNSIGNED DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'admin', 'web', '2025-06-12 04:10:30', '2025-06-12 04:10:30');

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
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1);

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
(514, NULL, 2, '2025-06-03 01:16:46', '2025-06-03 01:16:46'),
(515, '12', 2, '2025-06-03 01:17:30', '2025-06-03 01:17:30'),
(516, '12', 2, '2025-06-03 01:17:40', '2025-06-03 01:17:40'),
(517, '12', 2, '2025-06-03 01:17:51', '2025-06-03 01:17:51'),
(518, '12345', 2, '2025-06-03 01:18:19', '2025-06-03 01:18:19'),
(519, '12', 2, '2025-06-03 01:21:10', '2025-06-03 01:21:10'),
(520, '12', 2, '2025-06-03 01:21:17', '2025-06-03 01:21:17'),
(521, '12', 2, '2025-06-03 01:21:24', '2025-06-03 01:21:24'),
(522, '12', 2, '2025-06-03 01:21:34', '2025-06-03 01:21:34'),
(523, '123', 2, '2025-06-03 01:24:51', '2025-06-03 01:24:51'),
(524, '21', 2, '2025-06-03 01:27:07', '2025-06-03 01:27:07'),
(525, 'đồng hồ', 2, '2025-06-03 01:27:17', '2025-06-03 01:27:17'),
(526, '1', 2, '2025-06-03 01:27:30', '2025-06-03 01:27:30'),
(527, '12314', 2, '2025-06-03 02:42:17', '2025-06-03 02:42:17'),
(528, '3245', 2, '2025-06-03 02:50:11', '2025-06-03 02:50:11'),
(529, '123456', 2, '2025-06-12 04:46:22', '2025-06-12 04:46:22'),
(530, 'hẹ hẹ hẹ', 2, '2025-06-12 04:51:35', '2025-06-12 04:51:35'),
(531, 'hej hej ehj', NULL, '2025-06-12 06:48:30', '2025-06-12 06:48:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `support` text COLLATE utf8mb4_unicode_ci,
  `main_color` text COLLATE utf8mb4_unicode_ci,
  `secondary_color` text COLLATE utf8mb4_unicode_ci,
  `seo_products` text COLLATE utf8mb4_unicode_ci,
  `seo_posts` text COLLATE utf8mb4_unicode_ci,
  `layout_not_found` text COLLATE utf8mb4_unicode_ci,
  `informational` text COLLATE utf8mb4_unicode_ci,
  `title_login_admin` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `support`, `main_color`, `secondary_color`, `seo_products`, `seo_posts`, `layout_not_found`, `informational`, `title_login_admin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thế Anh', 'http://127.0.0.1:8000/storage/photos/2/950a82c88b10d6c42df763f2ad9b8151.png', '[{\"id\":1,\"method\":\"H\\u1ed7 tr\\u1ee3\",\"phone\":\"0348022004\",\"time\":\"08h-20h\",\"href\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/bannermenuitem\\/1\\/edit\"}]', '#fdaaaa', '#f4d2d2', '{\"title_products\":null,\"description_products\":null,\"seoimage_products\":null,\"robots_products\":\"index, follow\"}', '{\"title_posts\":null,\"description_posts\":null,\"seoimage_posts\":null,\"robots_posts\":\"index, follow\"}', NULL, '© 2018. Công ty cổ phần Thế Giới Di Động. GPDKKD: 0303217354 do sở KH & ĐT TP.HCM cấp ngày\r\n                    02/01/2007. GPMXH: 21/GP-BTTTT do Bộ Thông Tin và Truyền Thông cấp ngày 11/01/2021.\r\n                    Địa chỉ: 128 Trần Quang Khải, P.Tân Định, Q.1, TP.Hồ Chí Minh. Địa chỉ liên hệ và gửi chứng từ: Lô\r\n                    T2-1.2, Đường D1, Đ. D1, P.Tân Phú, TP.Thủ Đức, TP.Hồ Chí Minh. Điện thoại: 028 38125960. Email:\r\n                    cskh@thegioididong.com. Chịu trách nhiệm nội dung: Huỳnh Văn Tốt. Email:\r\n                    hotrotmdt@thegioididong.com. <a class=\"text-decoration-none\" href=\"\">Xem chính sách sử\r\n                        dụng</a>', '{\"greeting\":\"Ch\\u00e0o m\\u1eebng \\u0111\\u1ebfn v\\u1edbi Nguy\\u1ec5n Th\\u1ebf Anh aka L\\u1ee5y Anh aka \\u0110\\u1eb9p trai vkl\",\"instruct\":\"\\u0110\\u0103ng nh\\u1eadp xong r\\u1ed3i l\\u00e0m g\\u00ec th\\u00ec l\\u00e0m\"}', 1, '2025-06-12 04:45:31', '2025-06-16 07:46:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `image`, `phone`, `birthday`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '2025-06-12 04:10:30', '$2y$10$VR9uVB9DMg8iWld0ZyoRSuDtm30KPB92dHztrlHwgzWHEcNINNPhu', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-12 04:10:30', '2025-06-12 04:10:30'),
(2, 'anhnt', 'anhnt@gmail.com', '2025-05-15 02:30:14', '$2y$10$Bg6e62TlfTlCvDHX2HAIZe7rQcOLYVSSyQ/PveJYMAOsBfteNKI3u', 'Tiên Phương, Chương Mỹ, Hà Nội', 'storage/avatar/EPqmwnbs0oXl1lElHZ7WgrkO8L19jiFbmzpb5fuv.png', '0348022004', '2025-05-31', '37cdTkNsCHa4E4J68nbbcSvMfHcA11cZbqIh8ZyAt5fTealRLMwSgUyhGpSx', NULL, '2025-05-12 01:21:24', '2025-06-16 07:47:07'),
(44, 'Nguyễn Thế Anh', 'nguyentheanh260204@gmail.com', '2025-05-15 19:33:50', '$2y$10$U.9R0hA7XWmYaWkTRywkteaGq/3mIHsDAcMgyIGCg74LB6j.BfKPS', 'Tiên Phương, Chương Mỹ, Hà Nội', 'storage/user/VfHpAaDtTmw6ZK9zEKliSJIHY11pGJHR6voY7HAC.jpg', '0981621246', '2025-05-01', NULL, NULL, '2025-05-15 19:33:34', '2025-05-30 01:37:10'),
(45, 'Nguyễn Thế Anh', '1232@gmail.com', NULL, '$2y$10$i6of4.yiJjUONc/sd3Q8OeJVSjO8S2RIqwB.x4thxQs9vd9jn.bAW', 'Tiên Phương, Chương Mỹ, Hà Nội', 'storage/user/fnwTILiT2kKb0It9YIocagd9X29rbyOzC57pEXF2.png', '0348022001', '2025-05-06', NULL, NULL, '2025-05-26 02:44:53', '2025-05-30 01:36:51'),
(46, 'Nguyễn Thế Anh', '32@intern.imtatech.com', NULL, '$2y$10$MBJOq6UVdHPpKTH/FnaoIOQJTkIeESNuKdboh0UwrPux8X5tv5XhC', 'Tiên Phương, Chương Mỹ, Hà Nội', 'storage/user/J0eF6Qw99ItxlQeOos8E77ZH38fYnp52NWeejdnD.png', '0348022000', '2025-05-20', NULL, NULL, '2025-05-26 03:05:23', '2025-05-30 01:36:36'),
(47, 'Nguyễn Thế Anh', 'nguyanh260204@gmail.com', NULL, '$2y$10$P8pj/rgsPybyvq7Sb4/PkOQyEnb1FXa3rI0YpraOfvrivQsT8N5HO', 'Tiên Phương, Chương Mỹ, Hà Nội', 'storage/user/0wInCDABc9tmFyFSaf8yJ7bIvOyDr0wbQrsQ9lB0.jpg', '0348022009', '2025-05-13', NULL, NULL, '2025-05-26 03:17:23', '2025-05-30 01:11:22'),
(48, 'Nguyễn Thế Anh', '123@gmail.com', '2025-06-16 03:06:35', '$2y$10$JK9snCNDij4RIjVkKMwu4uLaLVUlWATdpWZ6ad5l2r.Zu9S4sHh1K', 'Tiên Phương, Chương Mỹ, Hà Nội', '/storage/user/46TB2gOuqWxxRjYmTxDncr1zxJGPZYwfnTaFPLfb.png', '0348022011', '2025-06-02', NULL, NULL, '2025-06-16 03:06:35', '2025-06-16 03:06:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` int UNSIGNED NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `max_discount` decimal(20,0) DEFAULT NULL,
  `max_use` int UNSIGNED NOT NULL DEFAULT '0',
  `discount_condition` decimal(20,0) NOT NULL DEFAULT '0',
  `users` longtext COLLATE utf8mb4_unicode_ci,
  `products` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `promo_code`, `discount_percentage`, `start_date`, `end_date`, `time`, `status`, `max_discount`, `max_use`, `discount_condition`, `users`, `products`, `created_at`, `updated_at`) VALUES
(1, '123', 12, '2025-05-21 00:00:00', '2025-05-22 00:00:00', '05/21/2025 12:00 AM - 05/22/2025 12:00 AM', 0, 123, 0, 12, '[\"2\"]', '[\"17\"]', '2025-05-21 00:32:31', '2025-05-21 19:26:01'),
(2, '2', 1, '2025-05-21 00:00:00', '2025-05-22 00:00:00', '05/21/2025 12:00 AM - 05/22/2025 12:00 AM', 1, 123, 1, 123, '[\"2\"]', '[\"17\"]', '2025-05-21 00:52:12', '2025-05-21 18:06:48'),
(3, '1', 12, '2025-05-23 00:00:00', '2025-07-20 00:00:00', '05/23/2025 12:00 AM - 07/20/2025 12:00 AM', 1, 123, 1, 123, '[\"2\",\"1\"]', '[\"17\",\"16\",\"15\",\"10\",\"9\",\"8\"]', '2025-05-21 01:08:34', '2025-05-22 19:16:52'),
(4, '12', 50, '2025-05-24 00:00:00', '2025-07-05 00:00:00', '05/24/2025 12:00 AM - 07/05/2025 12:00 AM', 1, 10000, 0, 2000, NULL, NULL, '2025-05-21 01:20:56', '2025-06-12 07:59:14'),
(5, '1234567890', 1, '2025-05-14 00:00:00', '2025-06-26 00:00:00', '05/14/2025 12:00 AM - 06/26/2025 12:00 AM', 1, 121345, 0, 0, '[\"1\"]', '[\"4\",\"2\"]', '2025-05-21 01:23:42', '2025-05-30 01:08:52'),
(9, 'ht', 90, '2025-05-13 10:00:00', '2025-06-05 07:00:00', '05/13/2025 10:00 AM - 06/05/2025 7:00 AM', 1, 1, 4, 2, NULL, NULL, '2025-05-21 19:23:10', '2025-05-30 03:05:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `acl_rules`
--
ALTER TABLE `acl_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acl_rules_user_id_foreign` (`user_id`);

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
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bills_code_unique` (`code`),
  ADD UNIQUE KEY `bills_transaction_id_unique` (`transaction_id`),
  ADD UNIQUE KEY `bills_refund_transaction_id_unique` (`refund_transaction_id`),
  ADD KEY `bills_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `bill_items`
--
ALTER TABLE `bill_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_items_bill_id_foreign` (`bill_id`);

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
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_bill_item_id_foreign` (`bill_item_id`);

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
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `acl_rules`
--
ALTER TABLE `acl_rules`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `authentication_log`
--
ALTER TABLE `authentication_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `bannermenuitems`
--
ALTER TABLE `bannermenuitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bannermenus`
--
ALTER TABLE `bannermenus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `bill_items`
--
ALTER TABLE `bill_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT cho bảng `category_parents`
--
ALTER TABLE `category_parents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `productmenuitems`
--
ALTER TABLE `productmenuitems`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ràng buộc đối với các bảng kết xuất
--

--
-- Ràng buộc cho bảng `acl_rules`
--
ALTER TABLE `acl_rules`
  ADD CONSTRAINT `acl_rules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ràng buộc cho bảng `bill_items`
--
ALTER TABLE `bill_items`
  ADD CONSTRAINT `bill_items_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE SET NULL;

--
-- Ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_category_parent_id_foreign` FOREIGN KEY (`category_parent_id`) REFERENCES `category_parents` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
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
  ADD CONSTRAINT `reviews_bill_item_id_foreign` FOREIGN KEY (`bill_item_id`) REFERENCES `bill_items` (`id`) ON DELETE SET NULL,
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
