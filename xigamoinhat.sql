-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 28, 2020 lúc 10:04 AM
-- Phiên bản máy phục vụ: 10.3.23-MariaDB-1:10.3.23+maria~bionic
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `xiga`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban_xi_gas`
--

CREATE TABLE `ban_xi_gas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la hien, 0 la an',
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(6, 'Thuốc lá cuốn tay', 1, 0, '2020-08-10 23:25:13', '2020-08-10 23:25:13'),
(7, 'Bộ thuốc lá cuốn tay', 1, 0, '2020-08-10 23:25:32', '2020-08-10 23:25:32'),
(8, 'Phụ kiện thuốc lá cuốn tay', 1, 0, '2020-08-10 23:25:42', '2020-08-10 23:25:42'),
(9, 'Tẩu hút thuốc', 1, 0, '2020-08-10 23:25:51', '2020-08-10 23:25:51'),
(10, 'Phụ kiện tẩu', 1, 0, '2020-08-10 23:26:01', '2020-08-10 23:26:01'),
(11, 'Xì gà Cuba', 1, 0, '2020-08-10 23:26:10', '2020-08-10 23:26:10'),
(12, 'Xì gà Honduras', 1, 0, '2020-08-10 23:32:21', '2020-08-10 23:32:21'),
(13, 'Xì gà Mini', 1, 0, '2020-08-10 23:32:31', '2020-08-10 23:32:31'),
(14, 'Phụ kiện xì gà', 1, 0, '2020-08-10 23:32:42', '2020-08-10 23:32:42'),
(15, 'Thuốc lá ngoại thơm', 1, 0, '2020-08-10 23:32:50', '2020-08-10 23:32:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_07_30_101554_create_news_table', 1),
(7, '2020_07_30_101555_create_tag_table', 2),
(8, '2020_07_30_101556_add_column_desc_to_tag_table', 3),
(9, '2020_07_31_035653_categories', 4),
(10, '2020_07_31_041011_products', 5),
(11, '2020_07_31_043247_categories', 6),
(12, '2020_07_31_043749_product_images', 7),
(13, '2020_07_31_044538_order_list', 8),
(14, '2020_07_31_045552_order_product', 9),
(15, '2020_07_31_071836_product_images', 10),
(16, '2020_07_31_071837_product_images', 11),
(17, '2020_07_31_072138_order_list_product', 12),
(18, '2020_08_11_041830_create_ban_xi_gas_table', 13),
(19, '2020_08_13_052055_add_selled_to_product', 13),
(20, '2020_08_25_043047_order_list', 14),
(21, '2020_08_25_043048_order_list', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1. Cho phep hien thi, 0.Khong hien thi',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tieu de bai viet',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `active`, `title`, `description`, `thumb`, `content`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hut thuoc lao ko bi nhiem covid', 'Hut thuoc lao ko bi nhiem covid', 'https://vinmec-prod.s3.amazonaws.com/images/20190613_102732_315874_thuoc-lao-co-hai-khon.max-800x800.jpg', 'Hut thuoc lao ko bi nhiem covid', 'Quyen', '2020-07-30 11:26:14', '2020-07-30 11:26:19'),
(2, 1, 'Hut thuoc lao ko bi nhiem covid', 'Hut thuoc lao ko bi nhiem covid', 'https://vinmec-prod.s3.amazonaws.com/images/20190613_102732_315874_thuoc-lao-co-hai-khon.max-800x800.jpg', 'Hut thuoc lao ko bi nhiem covid', 'Quyen', '2020-07-30 11:26:25', '2020-07-30 20:28:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_list`
--

CREATE TABLE `order_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Chua xy ly; 1: dang xu ly; 2:da xu ly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_list`
--

INSERT INTO `order_list` (`id`, `cus_name`, `cus_phone`, `cus_email`, `cus_address`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(44, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '2865000', 0, '2020-08-26 04:54:05', '2020-08-26 04:54:05'),
(45, 'nghiem huu quyen', '31232312', 'vhkb1708@gmail.com', '123 qwewe 21 we23 sd23 dwq', '1679996', 0, '2020-08-26 04:54:38', '2020-08-26 04:54:38'),
(46, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '30999000', 0, '2020-08-26 22:53:37', '2020-08-26 22:53:37'),
(47, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '30999000', 0, '2020-08-26 22:54:24', '2020-08-26 22:54:24'),
(48, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '30999000', 0, '2020-08-26 22:55:31', '2020-08-26 22:55:31'),
(49, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '31719000', 0, '2020-08-27 00:21:41', '2020-08-27 00:21:41'),
(50, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '31719000', 0, '2020-08-27 00:33:18', '2020-08-27 00:33:18'),
(51, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '2600000', 0, '2020-08-27 00:36:03', '2020-08-27 00:36:03'),
(52, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '4550000', 0, '2020-08-27 00:37:54', '2020-08-27 00:37:54'),
(53, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '4550000', 0, '2020-08-27 00:38:36', '2020-08-27 00:38:36'),
(54, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '4550000', 0, '2020-08-27 00:42:10', '2020-08-27 00:42:10'),
(55, 'Cheri T Ponce', '8066803251', 'vhkb1234@gmail.com', '1201  Hilltop\nDrive', '4800000', 0, '2020-08-27 00:45:50', '2020-08-27 00:45:50'),
(56, 'Cheri T Ponce', '8066803251', 'vhkb1234@gmail.com', '1201  Hilltop\nDrive', '765000', 1, '2020-08-27 00:46:17', '2020-08-27 00:54:05'),
(57, 'sadas', '2131423', 'sadasd@2qwe', '123 ewqwe 23 qweqw 2133qwe', '780000', 0, '2020-08-27 00:56:16', '2020-08-27 00:56:16'),
(58, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '34245000', 0, '2020-08-27 04:39:29', '2020-08-27 04:39:29'),
(59, 'Cheri T Ponce', '8066803251', 'vhkb1708@gmail.com', '1201  Hilltop\nDrive', '1350000', 0, '2020-08-27 04:39:51', '2020-08-27 04:39:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_list_product`
--

CREATE TABLE `order_list_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL COMMENT 'so luong',
  `money` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_list_product`
--

INSERT INTO `order_list_product` (`id`, `order_id`, `product_id`, `product_name`, `qty`, `money`, `created_at`, `updated_at`) VALUES
(80, 44, '28', 'Bao da dựng tẩu Lubinski N005', 3, 1950000, '2020-08-26 04:54:05', '2020-08-26 04:54:05'),
(81, 44, '29', 'bật lửa clipper hàng chính hãng', 3, 345000, '2020-08-26 04:54:05', '2020-08-26 04:54:05'),
(82, 44, '30', 'Dụng cụ nén thuốc tẩu N001', 1, 300000, '2020-08-26 04:54:05', '2020-08-26 04:54:05'),
(83, 44, '12', 'Thuốc lá cuộn tay Amber Leaf', 1, 150000, '2020-08-26 04:54:05', '2020-08-26 04:54:05'),
(84, 44, '14', 'Thuốc lá cuốn tay Golden Virginia Original', 1, 120000, '2020-08-26 04:54:05', '2020-08-26 04:54:05'),
(85, 45, '16', 'Bộ thuốc lá cuốn tay Lookout 3', 1, 230000, '2020-08-26 04:54:38', '2020-08-26 04:54:38'),
(86, 45, '17', 'Bộ thuốc lá cuốn tay Mac Baren Cafe #09 Choice 6', 1, 240000, '2020-08-26 04:54:38', '2020-08-26 04:54:38'),
(87, 45, '12', 'Thuốc lá cuộn tay Amber Leaf', 1, 150000, '2020-08-26 04:54:38', '2020-08-26 04:54:38'),
(88, 45, '13', 'Thuốc lá cuốn tay Golden Virginia Bright Yellow', 1, 120000, '2020-08-26 04:54:38', '2020-08-26 04:54:38'),
(89, 45, '45', 'Dao cắt xì gà Lubinski N003', 1, 40000, '2020-08-26 04:54:38', '2020-08-26 04:54:38'),
(90, 45, '44', 'Bật lửa xì gà Cohiba', 2, 899996, '2020-08-26 04:54:38', '2020-08-26 04:54:38'),
(91, 46, '32', 'Cohiba Collection quà biếu dịp xuân về - lễ - tết', 1, 19999000, '2020-08-26 22:53:37', '2020-08-26 22:53:37'),
(92, 46, '33', 'Cohiba Siglo VI Hộp 10 điếu', 1, 11000000, '2020-08-26 22:53:37', '2020-08-26 22:53:37'),
(93, 47, '32', 'Cohiba Collection quà biếu dịp xuân về - lễ - tết', 1, 19999000, '2020-08-26 22:54:24', '2020-08-26 22:54:24'),
(94, 47, '33', 'Cohiba Siglo VI Hộp 10 điếu', 1, 11000000, '2020-08-26 22:54:24', '2020-08-26 22:54:24'),
(95, 48, '32', 'Cohiba Collection quà biếu dịp xuân về - lễ - tết', 1, 19999000, '2020-08-26 22:55:31', '2020-08-26 22:55:31'),
(96, 48, '33', 'Cohiba Siglo VI Hộp 10 điếu', 1, 11000000, '2020-08-26 22:55:31', '2020-08-26 22:55:31'),
(97, 49, '32', 'Cohiba Collection quà biếu dịp xuân về - lễ - tết', 1, 19999000, NULL, NULL),
(98, 49, '33', 'Cohiba Siglo VI Hộp 10 điếu', 1, 11000000, NULL, NULL),
(99, 49, '16', 'Bộ thuốc lá cuốn tay Lookout 3', 1, 230000, NULL, NULL),
(100, 49, '17', 'Bộ thuốc lá cuốn tay Mac Baren Cafe #09 Choice 6', 1, 240000, NULL, NULL),
(101, 49, '18', 'Bộ thuốc lá cuốn tay Original Drum 2', 1, 250000, NULL, NULL),
(102, 50, '32', 'Cohiba Collection quà biếu dịp xuân về - lễ - tết', 1, 19999000, NULL, NULL),
(103, 50, '33', 'Cohiba Siglo VI Hộp 10 điếu', 1, 11000000, NULL, NULL),
(104, 50, '16', 'Bộ thuốc lá cuốn tay Lookout 3', 1, 230000, NULL, NULL),
(105, 50, '17', 'Bộ thuốc lá cuốn tay Mac Baren Cafe #09 Choice 6', 1, 240000, NULL, NULL),
(106, 50, '18', 'Bộ thuốc lá cuốn tay Original Drum 2', 1, 250000, NULL, NULL),
(107, 51, '28', 'Bao da dựng tẩu Lubinski N005', 4, 2600000, NULL, NULL),
(108, 52, '28', 'Bao da dựng tẩu Lubinski N005', 7, 4550000, NULL, NULL),
(109, 53, '28', 'Bao da dựng tẩu Lubinski N005', 7, 4550000, NULL, NULL),
(110, 54, '28', 'Bao da dựng tẩu Lubinski N005', 7, 4550000, NULL, NULL),
(111, 55, '28', 'Bao da dựng tẩu Lubinski N005', 7, 4550000, NULL, NULL),
(112, 55, '18', 'Bộ thuốc lá cuốn tay Original Drum 2', 1, 250000, NULL, NULL),
(113, 56, '28', 'Bao da dựng tẩu Lubinski N005', 1, 650000, NULL, NULL),
(114, 56, '29', 'bật lửa clipper hàng chính hãng', 1, 115000, NULL, NULL),
(115, 57, '12', 'Thuốc lá cuộn tay Amber Leaf', 2, 300000, NULL, NULL),
(116, 57, '13', 'Thuốc lá cuốn tay Golden Virginia Bright Yellow', 2, 240000, NULL, NULL),
(117, 57, '14', 'Thuốc lá cuốn tay Golden Virginia Original', 2, 240000, NULL, NULL),
(118, 58, '33', 'Cohiba Siglo VI Hộp 10 điếu', 3, 33000000, NULL, NULL),
(119, 58, '26', 'Thuốc Tẩu Hộp CAPTAIN Black Vanilla - Flake', 1, 390000, NULL, NULL),
(120, 58, '25', 'Thuốc hút tẩu Peterson Nightcap', 1, 410000, NULL, NULL),
(121, 58, '42', 'Xì gà Villiger Mini sumatra classic', 1, 100000, NULL, NULL),
(122, 58, '29', 'bật lửa clipper hàng chính hãng', 3, 345000, NULL, NULL),
(123, 59, '48', 'Thuốc lá Marula Z Bấm', 3, 870000, NULL, NULL),
(124, 59, '50', 'Thuốc lá cuốn tay Drum Bright Blue', 4, 480000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `amont` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la hien, 0 la an',
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selled` bigint(20) DEFAULT 0 COMMENT 'số lượng đã bán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `amont`, `status`, `display_order`, `created_at`, `updated_at`, `selled`) VALUES
(12, 6, 'Thuốc lá cuộn tay Amber Leaf', '<p>- Th&ocirc;ng tin sản phẩm:&nbsp;<strong>Thuốc l&aacute; cuốn tay&nbsp;Amber Leaf.</strong></p>\r\n\r\n<p>- M&atilde; sản phẩm: ST-001.</p>\r\n\r\n<p>- Trọng lượng: 50gram.</p>\r\n\r\n<p>- Độ nặng: 3.5/5(cuốn được 100 điếu)</p>\r\n\r\n<p>- Đ&oacute;ng g&oacute;i: k&iacute;n nhiệt.</p>\r\n\r\n<p>- Sản xuất: Nhật bản.</p>\r\n\r\n<p>- Thuốc l&aacute; cuốn tay l&agrave; một sản phẩm nguy&ecirc;n chất&nbsp;với hương vị thơm ngọt nhẹ v&agrave; mang lại một cảm gi&aacute;c cho bạn n&acirc;ng n&acirc;ng say nhẹ.</p>\r\n\r\n<p>- L&agrave;&nbsp;một loại thuốc l&aacute; cao cấp&nbsp;được sản xuất từ nh&oacute;m&nbsp;Gallaher Group vương quốc Anh trước khi được Nhật bản tobaco mua lại v&agrave;o năm 2007. Sẽ l&agrave; một điều th&uacute; vị nếu tự tay ch&uacute;ng ta cuộn v&agrave; thưởng thức những l&aacute; thuốc<strong>&nbsp;AMBER LEAF&nbsp;</strong>thật thơm ngon phải kh&ocirc;ng bạn. N&agrave;o h&atilde;y c&ugrave;ng thưởng thức Thuốc l&aacute; cuốn tay Amber leaf nghe bạn.</p>', 150000, 100, 1, 0, '2020-08-10 23:38:37', '2020-08-27 00:56:16', 6),
(13, 6, 'Thuốc lá cuốn tay Golden Virginia Bright Yellow', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\nKhối lượng g&oacute;i: 50g ( cuốn được tầm 80 - 100 điếu ) thuốc l&aacute; cuốn tay Golden Virginia Bright Yellow<br />\r\nThương hiệu: Golden Virginia</p>', 120000, 100, 1, 0, '2020-08-10 23:39:23', '2020-08-27 00:56:16', 3),
(14, 6, 'Thuốc lá cuốn tay Golden Virginia Original', '<h1>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n sản phẩm: Golden Virginia Original<br />\r\n- Khối lượng g&oacute;i: 50g ( cuốn được khoảng 80 - 100 điếu )<br />\r\n- Thương hiệu: Golden Virginia<br />\r\n- Thuốc l&aacute; cuốn tay Golden Virginia Original&nbsp;hương vị thuốc l&aacute; gốc cho cảm gi&aacute;c l&acirc;ng l&acirc;ng v&agrave; say thật sự ngon đến từng hơi thuốc. Thơm ngon tựa d&ograve;ng Golden virginia classic chắc chắn sẽ mang đến cho qu&yacute; vị s&agrave;nh thuốc cuốn một sự trải nghiệm v&agrave; h&agrave;i l&ograve;ng bởi sự thơm ngon của n&oacute;.</h1>', 120000, 100, 1, 0, '2020-08-10 23:40:20', '2020-08-27 00:56:16', 3),
(15, 6, 'Thuốc lá cuốn tay Drum Bright Blue', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n SP: Drum Bright Blue<br />\r\n- M&atilde; SP: SP-005<br />\r\n- Trọng lượng: 50g ( cuốn được tầm 80 - 100 điếu )<br />\r\n- Hương vị: Sợi nguy&ecirc;n chất&nbsp;<br />\r\n- Thương hi&ecirc;̣u: Drum<br />\r\n- Sản xuất: H&agrave; Lan<br />\r\n- Thuốc l&aacute; cuốn tay Drum Bright Blue một hương vị thỏa m&atilde;n đến từ một sự kết hợp độc đ&aacute;o của thuốc l&aacute; chất lượng: Bright virginia, burley vị hấp dẫn v&agrave; đậm kentucky</p>', 120000, 100, 1, 0, '2020-08-10 23:40:54', '2020-08-10 23:40:54', 0),
(16, 7, 'Bộ thuốc lá cuốn tay Lookout 3', '<p>Th&ocirc;ng tin bộ sản phẩm:<br />\r\n- T&ecirc;n bộ SP: Bộ thuốc l&aacute; cuốn tay Lookout<br />\r\n- Số lượng bộ gồm:<br />\r\n. Một g&oacute;i thuốc Lookout&nbsp;( 50g )<br />\r\n. Một hộp cuốn thuốc l&aacute; tự động Rolling strong machine ( m&aacute;y rất tốt)<br />\r\n. Một bịch đầu lọc OCB ( 120 đầu lọc )&nbsp;hoặc một g&oacute;i lọc slim long 120, hoặc một g&oacute;i lọc 168<br />\r\n. 2 tệp giấy OCB ( 1 tệp/50 tờ giấy )</p>', 230000, 100, 1, 0, '2020-08-10 23:42:19', '2020-08-27 00:33:18', 1),
(17, 7, 'Bộ thuốc lá cuốn tay Mac Baren Cafe #09 Choice 6', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n SP: Bộ thuốc l&aacute; cuốn tay Mac Baren Cafe #09&nbsp;Choice 1<br />\r\n- Số lượng bộ gồm:<br />\r\n. Một g&oacute;i thuốc Mac Baren Cafe #09 Choice ( 40g )<br />\r\n. Một hộp cuốn thuốc l&aacute; tự động Mascotte<br />\r\n. Một bịch đầu lọc Party 168&nbsp;( 160 đầu lọc )&nbsp;hoặc một g&oacute;i lọc Party 252( 252 đầu lọc) hoặc một g&oacute;i lọc ocb/econo- 120 lọc<br />\r\n. 2 tệp giấy Gizeh&nbsp;( 1 tệp/50 tờ giấy )</p>\r\n\r\n<p>Lưu &yacute;: Qu&yacute; kh&aacute;ch h&agrave;ng&nbsp;c&oacute; thể chọn loại thuốc Mac Baren kh&aacute;c để gh&eacute;p v&agrave;o bộ n&agrave;y m&agrave; gi&aacute; kh&ocirc;ng đổi.</p>', 240000, 100, 1, 0, '2020-08-10 23:42:58', '2020-08-27 00:33:18', 1),
(18, 7, 'Bộ thuốc lá cuốn tay Original Drum 2', '<p>Th&ocirc;ng tin bộ sản phẩm:<br />\r\n- T&ecirc;n bộ SP: Bộ thuốc l&aacute; cuốn tay Drum Original 2<br />\r\n- Số lượng bộ gồm:<br />\r\n. Một g&oacute;i thuốc Drum Original ( 50g )<br />\r\n. Một hộp cuốn thuốc l&aacute; tự động Mascotte<br />\r\n. Một bịch đầu lọc OCB ( 120 đầu lọc )&nbsp;hoặc một g&oacute;i lọc slim long 120<br />\r\n. Một&nbsp;tệp giấy OCB Premium ( 1 tệp/50 tờ giấy )</p>', 250000, 100, 1, 0, '2020-08-10 23:43:31', '2020-08-27 00:45:50', 2),
(19, 7, 'Bộ thuốc lá cuốn tay Amber Leaf 3', '<p>Th&ocirc;ng tin bộ sản phẩm:<br />\r\n- T&ecirc;n b&ocirc; sản phẩm: Bộ thuốc l&aacute; cuốn tay Amber Leaf 3<br />\r\n- Số lượng bộ gồm:<br />\r\n. Một g&oacute;i thuốc Amber Leaf ( 50g )<br />\r\n. Một hộp cuốn thuốc l&aacute; tự động<br />\r\n. Một bịch đầu lọc slim 168 hoặc 252&nbsp;( 150 đầu lọc d&agrave;i&nbsp;hoặc 252 đầu lọc ngắn)<br />\r\n. Một&nbsp;tệp giấy Gizeh Original&nbsp;( 1 tệp/50 tờ giấy )<br />\r\n- Bộ thuốc l&aacute; cuốn tay Amber Leaf 3&nbsp;l&agrave; sản phẩm độc đ&aacute;o d&agrave;nh cho những ai h&uacute;t thuốc l&aacute;, muốn tạo cho m&igrave;nh một phong c&aacute;ch h&uacute;t thuốc mới. Sợi thuốc l&aacute; Amber Leaf l&agrave; sợi thuốc nguy&ecirc;n chất được nhập từ nước ngo&agrave;i về đem lại cảm gi&aacute;c mới v&agrave; hương thơm đặc trưng cho những ai thưởng thứ</p>', 280000, 100, 1, 0, '2020-08-10 23:44:03', '2020-08-10 23:44:03', 0),
(20, 8, 'Hộp cuốn thuốc lá tự động Rolling Strong-3', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n SP: Tobacco Cigarette Rolling Strong Box-1<br />\r\n- K&iacute;ch thước: 90 x 80 x 20mm<br />\r\n- Trọng lượng: 127g<br />\r\n- Chất liệu: Kim loại cao cấp<br />\r\n- M&agrave;u sắc: trắng<br />\r\n- Giấy sử dụng: Loại giấy 70mm<br />\r\n- Sản xuất: Đức</p>', 80000, 100, 1, 0, '2020-08-10 23:44:37', '2020-08-10 23:44:37', 0),
(21, 8, 'Hộp cuốn thuốc lá tự động zigzag 110mm', '<p>K&iacute;ch thước: 110mm d&ugrave;ng cả cho giấy 78mm v&agrave; 70 mm. H&agrave;ng cực chất lượng do h&atilde;ng Zigzad sản xuất, h&agrave;ng&nbsp; ch&iacute;nh h&atilde;ng nh&eacute; c&aacute;c t&iacute;n đồ n&ecirc;n cứ y&ecirc;n t&acirc;m về chất lượng. đảm bảo d&ugrave;ng d&agrave;i l&acirc;u bao bền. v&agrave; cuốn ra điếu thuốc chặt chẽ.</p>\r\n\r\n<p>Với sản phẩm mới n&agrave;y hy vọng sẽ mang lại sự th&uacute; vị cho t&iacute;n đồ đam m&ecirc; cuốn thuốc bằng tay.</p>\r\n\r\n<p>Chắc hẳn ai đ&atilde; từng cuốn thuốc cuốn tay đều biết đến sản phẩm m&aacute;y cuốn, một c&ocirc;ng cụ kh&ocirc;ng thể thiếu để tạo n&ecirc;n điếu thuốc do ch&iacute;nh tay m&igrave;nh tạo n&ecirc;n, sẽ l&agrave; niềm đam m&ecirc; v&agrave; th&iacute;ch th&uacute; dc n&acirc;ng l&ecirc;n khi ch&iacute;nh đ&ocirc;i tay tạo ra sản phẩm. Song để tạo được một điếu thuốc đ&uacute;ng theo &yacute; m&igrave;nh th&igrave; cần một m&aacute;y cuốn chuẩn v&agrave; chặt điếu thuốc. Đ&acirc;y, ch&iacute;nh m&aacute;y n&agrave;y l&agrave; một c&ocirc;ng cụ để tạo ra những điếu thuốc thật bắt mắt v&agrave; cuốn chặt để c&oacute; được trải nghiệm tốt nhất khi sử dụng thuốc.</p>', 120000, 100, 1, 0, '2020-08-10 23:45:07', '2020-08-10 23:45:07', 0),
(22, 8, 'Giấy cuốn thuốc lá Gizeh Original1', '<p>Gi&aacute;: 15.000đ/tệp<br />\r\nSố lượng: 1 tệp/50 tờ giấy<br />\r\nK&iacute;ch thước: 70mm<br />\r\nThương hiệu: Gizeh<br />\r\nSản xuất: Ph&aacute;p</p>', 30000, 100, 1, 0, '2020-08-10 23:45:41', '2020-08-10 23:45:41', 0),
(23, 8, 'MÁY XAY MX17', '<p>K&iacute;ch thước: đường k&iacute;nh 50mm x cao 24mm.</p>\r\n\r\n<p>Số tầng: 2&nbsp;tầng</p>\r\n\r\n<p>Trọng lượng : 90gram.</p>\r\n\r\n<p>Chất liệu: hợp kim nh&ocirc;m loại tốt.</p>\r\n\r\n<p>Độ bền: từ 2-7&nbsp;năm.</p>', 210000, 100, 1, 0, '2020-08-10 23:46:16', '2020-08-10 23:46:16', 0),
(24, 9, 'Thuốc hút tẩu Peterson Christmas Limited Edition 2019', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n SP: Thuốc h&uacute;t tẩu Peterson Christmas Limited Edition 2019<br />\r\n- Khối lượng: 100g/hộp<br />\r\n- Bao b&igrave;: Hộp thiếc<br />\r\n- Th&agrave;nh phần: Burley, Virginia<br />\r\n- Hương vị: Whisky<br />\r\n- Sức mạnh: 2/5<br />\r\n- Hỗn hợp: Virginia, Burley<br />\r\n- Hương thơm: Rượu whisky<br />\r\n- Loại cắt: Rolls<br />\r\n- Thương hiệu: Peterson<br />\r\n- Xuất xứ: Đan Mạch</p>', 650000, 100, 1, 0, '2020-08-10 23:46:53', '2020-08-10 23:46:53', 0),
(25, 9, 'Thuốc hút tẩu Peterson Nightcap', '<p>Thương hiệu Peterson<br />\r\nPha trộn bởi Dunhill<br />\r\nSản xuất bởi tập đo&agrave;n thuốc l&aacute; Scandinavi<br />\r\nLoại tiếng Anh<br />\r\nNội dung Latakia, phương Đ&ocirc;ng / Thổ Nhĩ Kỳ, Perique, Virginia<br />\r\nKh&ocirc;ng c&oacute; hương vị<br />\r\nCắt băng kh&aacute;nh th&agrave;nh<br />\r\nBao b&igrave; thiếc 50 gram<br />\r\nQuốc gia : Denmark</p>\r\n\r\n<p>H&agrave;ng: d&ugrave;ng cho thị trường Mỹ.</p>', 410000, 100, 1, 0, '2020-08-10 23:47:24', '2020-08-27 04:39:29', 1),
(26, 9, 'Thuốc Tẩu Hộp CAPTAIN Black Vanilla - Flake', '<p>Thuốc Tẩu Hộp CAPTAIN Black Vanilla - Flake</p>\r\n\r\n<p>390.000 VND</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>L&aacute; Thuốc Black Cavendish đen nhẹ v&agrave; burley hạt dẻ được tinh chế với hương vani thơm dịu. Hỗn hợp n&agrave;y được &eacute;p dưới &aacute;p suất cao v&agrave; cắt th&agrave;nh dạng miếng (Flake- nh&igrave;n giống miếng b&ograve; kh&ocirc;). Hương vị thuốc nhẹ nh&agrave;ng v&agrave; thơm với hương thơm tuyệt vời, kh&ocirc;ng thể nhầm lẫn.<br />\r\n<br />\r\nThương hiệu: Planta<br />\r\nLoại: hỗn hợp thơm<br />\r\nNội dung: Black Cavendish, Burley<br />\r\nHương: Vani<br />\r\nCắt: Miếng (Flake)<br />\r\nBao b&igrave;: 50 gram thiếc<br />\r\nQuốc gia DE</p>', 390000, 100, 1, 0, '2020-08-10 23:48:02', '2020-08-27 04:39:29', 1),
(27, 9, 'Thuốc hút tẩu Dunhill Nightcap', '<p>Nh&atilde;n hiệu: Dunhill</p>\r\n\r\n<p>Hương vị tạo bởi: Dunhill</p>\r\n\r\n<p>Sản xuất bởi:&nbsp;<a href=\"http://www.tobaccoreviews.com/search?Manufacturer=Scandinavian%20Tobacco%20Group\">Scandinavian Tobacco Group</a></p>\r\n\r\n<p>Kiểu hương vị:&nbsp;Anh Quốc</p>\r\n\r\n<p>Th&agrave;nh phần:&nbsp;Latakia, Oriental/Turkish, Perique, Virginia</p>\r\n\r\n<p>Hương vị: kh&ocirc;ng</p>\r\n\r\n<p>Kiểu cắt: Ribbon.</p>\r\n\r\n<p>Trọng lượng:&nbsp;50 grams</p>\r\n\r\n<p>Đ&oacute;ng g&oacute;i: lon thiếc.</p>', 410000, 100, 1, 0, '2020-08-10 23:48:40', '2020-08-10 23:48:40', 0),
(28, 10, 'Bao da dựng tẩu Lubinski N005', '<p>T&ecirc;n Sản phẩm: bao da dựng tẩu Lubinski N005</p>\r\n\r\n<p>K&iacute;ch thước: 55 x 100 x 190 mm</p>\r\n\r\n<p>Trọng lượng: 250gram</p>\r\n\r\n<p>Chất liệu: da</p>\r\n\r\n<p>M&agrave;u sắc: đen</p>\r\n\r\n<p>C&ocirc;ng dụng: Đựng tẩu, thuốc v&agrave; phụ kiện</p>\r\n\r\n<p>Sức chứa: đựng tẩu 03 c&aacute;i, phụ kiện k&egrave;m theo v&agrave; một hộp thuốc loại tr&ograve;n đường k&iacute;nh 110mm x cao 25mm.</p>\r\n\r\n<p>Thương hiệu: Lubinski.</p>', 650000, 100, 1, 0, '2020-08-10 23:49:32', '2020-08-27 00:46:17', 22),
(29, 10, 'bật lửa clipper hàng chính hãng', '<p>Quẹt-bật lửa Clipper quả thật l&agrave; một thương hiệu nổi tiếng với sản phẩm bật lửa tốt v&agrave; b&aacute;n chạy nhất thị trường hiện nay, với d&ograve;ng bật lửa n&agrave;y mang lại cho người d&ugrave;ng sự an t&acirc;m tin tưởng tuyệt đối về chất lượng v&agrave; độ bền vĩnh cửu, c&oacute; thể thay thế c&aacute;c bộ phận như đ&aacute; v&agrave; v&ograve;ng đ&aacute;nh lửa. ch&uacute;ng t&ocirc;i bảo tr&igrave; chọn đời cho d&ograve;ng sản phẩm n&agrave;y v&agrave; cung cấp đầy đủ phụ kiện để thay thế khi cần thiết.</p>', 115000, 100, 1, 0, '2020-08-10 23:50:35', '2020-08-27 04:39:29', 7),
(30, 10, 'Dụng cụ nén thuốc tẩu N001', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n SP: Dụng cụ n&eacute;n thuốc tẩu N001 3 chức năng trong 1 sản phẩm. (vừa&nbsp;<br />\r\n- Chiều d&agrave;i: 118mm<br />\r\n- Đường k&iacute;nh: 16mm<br />\r\n- Chất liệu: Th&eacute;p kh&ocirc;ng gỉ<br />\r\n- Thương hiệu:&nbsp;</p>', 300000, 100, 1, 0, '2020-08-10 23:51:28', '2020-08-26 04:54:05', 1),
(31, 10, 'Lọc tẩu Big ben 9mm', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n sản phẩm: Lọc tẩu Big - Ben<br />\r\n- K&iacute;ch thước: 9mm x 36mm<br />\r\n- Số lượng hộp: 10 lọc<br />\r\n- Thương hiệu: Big - Ben</p>\r\n\r\n<p>- Nếu ai từng d&ugrave;ng tẩu h&uacute;t thuốc th&igrave; ko thể thiếu được một sản phẩm lọc để mang lại hương vị thơm ngon của thuốc, ngo&agrave;i ra c&ograve;n lọc những độc tố c&oacute; trong kh&oacute;i thuốc, ch&iacute;nh v&igrave; vậy, Big-Ben được ra đời với hai đầu th&ocirc;ng tho&aacute;ng&nbsp; v&agrave; được thiết kế th&ocirc;ng qua những lỗ bằng than hoạt t&iacute;nh gi&uacute;p khử độc v&agrave; mang lại hương thơm cho thuốc tẩu.</p>', 60000, 100, 1, 0, '2020-08-10 23:52:06', '2020-08-10 23:52:06', 0),
(32, 11, 'Cohiba Collection quà biếu dịp xuân về - lễ - tết', '<p>T&ecirc;n sản phẩm: Cohiba collection 6 điếu&nbsp;</p>\r\n\r\n<p>Số lượng: 6 điếu/bộ từ siglo I đến siglo VI</p>\r\n\r\n<p>Sản xuất bằng tay.</p>', 19999000, 100, 1, 0, '2020-08-10 23:52:49', '2020-08-27 00:33:18', 1),
(33, 11, 'Cohiba Siglo VI Hộp 10 điếu', '<p><strong>Th&ocirc;ng tin sản phẩm</strong></p>\r\n\r\n<p><strong>T&ecirc;n th&ocirc;ng dụng:</strong>&nbsp;Siglo VI<br />\r\n<strong>T&ecirc;n gốc:</strong>&nbsp;Ca&ntilde;onazo<br />\r\n<strong>Quy c&aacute;ch hộp:</strong>&nbsp;Hộp 10 điếu chứa trong hộp gỗ<br />\r\n<strong>Đường k&iacute;nh:</strong>&nbsp;52 ~ 2.06cm / 0.8 inches<br />\r\n<strong>Độ d&agrave;i:</strong>&nbsp;15.00 cm / 5.9 inches<br />\r\n<strong>Vị:</strong>&nbsp;Gỗ<br />\r\n<strong>Độ nặng:</strong>&nbsp;Trung b&igrave;nh<br />\r\n<strong>H&igrave;nh dạng:</strong>&nbsp;Robusto</p>', 11000000, 100, 1, 0, '2020-08-10 23:53:27', '2020-08-27 04:39:29', 4),
(34, 11, 'Xì gà Cohiba Black Pequenos hộp đen 6 điếu (Cohiba hộp 6 điếu)', '<p>Cohiba black pequenos<br />\r\nHộp sắt : 6 điếu<br />\r\nK&iacute;ch thước : 9.5cm ring 38<br />\r\nX&igrave; G&agrave; Cohiba Pequenos được quấn tay bởi những người thợ h&agrave;ng đầu tại Cộng H&ograve;a Dominican v&igrave; vậy cấu tr&uacute;c của điếu rất xuất sắc với mầu n&acirc;u tự nhi&ecirc;n của l&aacute; thuốc. Bạn c&oacute; thể quan s&aacute;t thấy sự xuất sắc trong cấu tr&uacute;c điếu x&igrave; g&agrave; qua t&agrave;n thuốc k&eacute;o d&agrave;i sau mỗi hơi<br />\r\nVới hương vị nhẹ nh&agrave;ng của cf expresso , gỗ v&agrave; một ch&uacute;t socola<br />\r\nGi&aacute; : /hộp thiếc 6 điếu</p>', 750000, 100, 1, 0, '2020-08-10 23:53:59', '2020-08-10 23:53:59', 0),
(35, 11, 'Xì gà Cohiba Pequenos hộp 6 điếu (Cohiba hộp 6 điếu)', '<p>Cohiba pequenos<br />\r\nHộp sắt : 6 điếu<br />\r\nK&iacute;ch thước : 9.5cm ring 38<br />\r\nX&igrave; G&agrave; Cohiba Pequenos được quấn tay bởi những người thợ h&agrave;ng đầu tại Cộng H&ograve;a Dominican v&igrave; vậy cấu tr&uacute;c của điếu rất xuất sắc với mầu n&acirc;u tự nhi&ecirc;n của l&aacute; thuốc. Bạn c&oacute; thể quan s&aacute;t thấy sự xuất sắc trong cấu tr&uacute;c điếu x&igrave; g&agrave; qua t&agrave;n thuốc k&eacute;o d&agrave;i sau mỗi hơi<br />\r\nVới hương vị nhẹ nh&agrave;ng của cf expresso , gỗ v&agrave; một ch&uacute;t socola<br />\r\nGi&aacute; : /hộp thiếc 6 điếu</p>', 750000, 100, 1, 0, '2020-08-10 23:54:33', '2020-08-10 23:54:33', 0),
(36, 12, 'Xì Gà Leaf by Oscar Hộp Gỗ Sample 20\'s ring 60', '<ul>\r\n	<li>\r\n	<p>NH&Atilde;N HIỆU:&nbsp;Leaf by Oscar</p>\r\n	</li>\r\n	<li>\r\n	<p>Kiểu D&aacute;ng:&nbsp;4 loại</p>\r\n	</li>\r\n	<li>\r\n	<p>Th&acirc;n Cigar:&nbsp;Tr&ograve;n</p>\r\n	</li>\r\n	<li>\r\n	<p>CHIỀU D&Agrave;I X&Igrave; G&Agrave;:&nbsp;6 &quot;</p>\r\n	</li>\r\n	<li>\r\n	<p>NGUỒN GỐC:&nbsp;Honduras</p>\r\n	</li>\r\n	<li>\r\n	<p>ĐO V&Ograve;NG X&Igrave; G&Agrave;: 60</p>\r\n	</li>\r\n	<li>\r\n	<p>SỨC MẠNH: mang đặc trưng ri&ecirc;ng của 4 loại.</p>\r\n	</li>\r\n	<li>\r\n	<p>M&Agrave;U VỎ BỌC:&nbsp;Natural</p>\r\n	</li>\r\n	<li>\r\n	<p>BAO B&Igrave; ĐƠN: Kh&ocirc;ng</p>\r\n	</li>\r\n	<li>\r\n	<p>LOẠI C&Aacute;N:&nbsp;L&agrave;m Bằng Tay</p>\r\n	</li>\r\n	<li>\r\n	<p>NH&Agrave; SẢN XUẤT X&Igrave; G&Agrave;:&nbsp;Oscar Valladares</p>\r\n	</li>\r\n	<li>\r\n	<p>CIGAR WRAPPER:&nbsp;Nicaraguan Maduro</p>\r\n	</li>\r\n	<li>\r\n	<p>CIGAR BINDER:&nbsp;Honduras</p>\r\n	</li>\r\n	<li>\r\n	<p>CIGAR FILLER:&nbsp;Honduras</p>\r\n	</li>\r\n</ul>', 16000000, 100, 1, 0, '2020-08-10 23:55:12', '2020-08-10 23:55:12', 0),
(37, 12, 'Xì Gà Leaf by Oscar No1 Limited 2018 Hộp xứ Đỏ', '<ul>\r\n	<li>\r\n	<p>NH&Atilde;N HIỆU:&nbsp;Leaf by Oscar</p>\r\n	</li>\r\n	<li>\r\n	<p>Kiểu D&aacute;ng:&nbsp;4 loại</p>\r\n	</li>\r\n	<li>\r\n	<p>Th&acirc;n Cigar:&nbsp;Tr&ograve;n</p>\r\n	</li>\r\n	<li>\r\n	<p>CHIỀU D&Agrave;I X&Igrave; G&Agrave;:&nbsp;6 &quot;</p>\r\n	</li>\r\n	<li>\r\n	<p>NGUỒN GỐC:&nbsp;Honduras</p>\r\n	</li>\r\n	<li>\r\n	<p>ĐO V&Ograve;NG X&Igrave; G&Agrave;: 60</p>\r\n	</li>\r\n	<li>\r\n	<p>SỨC MẠNH: mang đặc trưng ri&ecirc;ng của 4 loại.</p>\r\n	</li>\r\n	<li>\r\n	<p>M&Agrave;U VỎ BỌC:&nbsp;Natural</p>\r\n	</li>\r\n	<li>\r\n	<p>BAO B&Igrave; ĐƠN: Kh&ocirc;ng</p>\r\n	</li>\r\n	<li>\r\n	<p>LOẠI C&Aacute;N:&nbsp;L&agrave;m Bằng Tay</p>\r\n	</li>\r\n	<li>\r\n	<p>NH&Agrave; SẢN XUẤT X&Igrave; G&Agrave;:&nbsp;Oscar Valladares</p>\r\n	</li>\r\n	<li>\r\n	<p>CIGAR WRAPPER:&nbsp;Nicaraguan Maduro</p>\r\n	</li>\r\n	<li>\r\n	<p>CIGAR BINDER:&nbsp;Honduras</p>\r\n	</li>\r\n	<li>\r\n	<p>CIGAR FILLER:&nbsp;Honduras</p>\r\n	</li>\r\n</ul>', 18500000, 100, 1, 0, '2020-08-10 23:55:48', '2020-08-10 23:55:48', 0),
(38, 12, 'XÌ Gà Rocky Patel Tubo Sampler', '<p>Rocky Patel Tubo Sampler 2015 gồm c&oacute; những vị trong bộ 6 điếu như sau:​<br />\r\n1 x Rocky Patel Sun Grown Tubo (6.0&quot;x50)<br />\r\n1 x Rocky Patel Decade Tubo (6.5&rdquo; x 52)<br />\r\n1 x Rocky Patel Royale Tubo (6.0&rdquo; x 50)<br />\r\n1 x Rocky Patel 15th Anniversary Tubo &nbsp;&nbsp;&nbsp;<br />\r\n1 x Rocky Patel Vintage 1990 Tubo (6.0&rdquo; x 50)<br />\r\n1 x Rocky Patel Vintage Connecticut Tubo (6.0&rdquo; x 50)</p>\r\n\r\n<p>Xuất xứ: T&acirc;y Ban Nha. L&aacute; thuốc c&oacute; độ tuổi từ 5 đến 12 năm tuổi từ Nicaragua v&agrave; Dominican, thuốc được cuốn bằng tay.</p>', 2200000, 100, 1, 0, '2020-08-10 23:56:44', '2020-08-10 23:56:44', 0),
(39, 12, 'Xì gà J.Corte\'s Corona tubos', '<p>Gi&aacute;: gi&aacute; tr&ecirc;n g&oacute;i 5&nbsp;điếu tubos</p>\r\n\r\n<p>Đ&oacute;ng g&oacute;i : Hộp 25&nbsp;điếu trong hộp giấy.</p>\r\n\r\n<p>Xuất xứ: Dominican</p>', 440000, 100, 1, 0, '2020-08-10 23:57:14', '2020-08-10 23:57:14', 0),
(40, 13, 'Cohiba short limited edition 2018', '<ul>\r\n	<li><strong>RING GAUGE:</strong>&nbsp;27</li>\r\n	<li><strong>CIGAR LENGTH:</strong>&nbsp;82 mm&nbsp;</li>\r\n	<li>diameter: 10.6mm</li>\r\n	<li><strong>STRENGTH:</strong>&nbsp;strength</li>\r\n	<li><strong>VITOLA:</strong>&nbsp;Panetela</li>\r\n	<li>flavour: Natural</li>\r\n	<li>Xuất xứ: Đức</li>\r\n	<li>Đ&oacute;ng g&oacute;i: hộp Gỗ.</li>\r\n	<li>Quy c&aacute;ch: 50 điếu/hộp.</li>\r\n</ul>', 7500000, 100, 1, 0, '2020-08-10 23:57:54', '2020-08-10 23:57:54', 0),
(41, 13, 'Xì gà Agio tip Sweet- HỘP GIẤY 10 ĐIẾU', '<p>- Số lượng: 1 hộp/10&nbsp;điếu<br />\r\n- K&iacute;ch thước: d&agrave;i 100&nbsp;mm<br />\r\n- V&ograve;ng đo: 9,1 mm<br />\r\n- Thời gian h&uacute;t: 15&nbsp;ph&uacute;t<br />\r\n- Hương vị: Vani thơm<br />\r\n- Đ&oacute;ng g&oacute;i: hộp thiếc<br />\r\n- Sản xuất: H&agrave; Lan</p>', 140000, 100, 1, 0, '2020-08-10 23:58:22', '2020-08-10 23:58:22', 0),
(42, 13, 'Xì gà Villiger Mini sumatra classic', '<ul>\r\n	<li><strong>T&ecirc;n th&ocirc;ng dụng:&nbsp;</strong><strong>Villiger Mini Sumatra Classic</strong></li>\r\n	<li><strong>Quy c&aacute;ch hộp:&nbsp;</strong>Bao sắt 10 điếu</li>\r\n	<li><strong>Đường k&iacute;nh:&nbsp;</strong>Ring 20</li>\r\n	<li><strong>Độ d&agrave;i:&nbsp;</strong>80 mm</li>\r\n	<li><strong>Vị:&nbsp;</strong>Gỗ, đất, cỏ kh&ocirc;</li>\r\n	<li><strong>Độ nặng:&nbsp;</strong>Nhẹ</li>\r\n	<li><strong>H&igrave;nh dạng:&nbsp;</strong>Cigarillos</li>\r\n	<li><strong>Xuất xứ:&nbsp;</strong>Đức</li>\r\n</ul>\r\n\r\n<p><strong>Villiger Mini Sumatra Classic</strong>&nbsp;&ndash; l&agrave; lọai cigar nhỏ thanh lịch với l&aacute; quấn ng&ograve;ai tự nhi&ecirc;n. Được tạo th&agrave;nh bởi sự pha trộn hương vị của Virginia, Burley v&agrave; Black Cavendish cho ra đời lọai hương vị Gỗ, đất, cỏ kh&ocirc; dễ chịu v&agrave; tuyệt hảo. Hy vọng một sản phẩm song song với d&ograve;ng villiger vanilla v&agrave; espresso&nbsp;sẽ mang lại sự thưởng thức th&uacute; vị.</p>', 100000, 100, 1, 0, '2020-08-10 23:59:01', '2020-08-27 04:39:29', 1),
(43, 13, 'Xì gà Café Crème Blue Hộp Giấy', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n sản phẩm: Caf&eacute; Cr&egrave;me Blue Mini<br />\r\n- Số lượng: 1 hộp/10 điếu x&igrave; g&agrave; Mini<br />\r\n- K&iacute;ch thước: d&agrave;i 78mm, &Oslash; 8.00 mm<br />\r\n- H&igrave;nh dạng: Cigarillo&nbsp;<br />\r\n- Sức mạnh: Nhẹ 2/5<br />\r\n- M&ugrave;i vị: Coffee, kem<br />\r\n- Thương hiệu: Caf&eacute; Cr&egrave;me<br />\r\n- Quốc gia: H&agrave; Lan</p>\r\n\r\n<p>- Đ&oacute;ng g&oacute;i: hộp giấy</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Henry Wintermans &ndash; Đến với d&ograve;ng X&igrave; g&agrave; mini, nếu thật sự ch&uacute;ng ta muốn thưởng thức hương vị truyền thống nhất hoặc đ&atilde; quen với hương vị truyền thống với những d&ograve;ng x&igrave; g&agrave; kh&aacute;c th&igrave; kh&ocirc;ng thể bỏ qua một d&ograve;ng x&igrave; g&agrave; mini đ&oacute; l&agrave; Caf&eacute; Cr&egrave;me Blue , đ&acirc;y ch&iacute;nh l&agrave; loại cigar mini c&oacute; hương vị truyền thống nhất trong d&ograve;ng cigar Caf&eacute; Cr&egrave;me. Hương vị c&oacute; hơi hướng m&ugrave;i ng&aacute;i của x&igrave; g&agrave; ch&iacute;nh hiệu, một ch&uacute;t m&ugrave;i gỗ v&agrave; thơm m&ugrave;i cafe. Một điếu chỉ cần 15p thưởng thức cũng đủ để bạn cảm nhận được những tinh t&uacute;y trong n&oacute;.</p>', 80000, 100, 1, 0, '2020-08-10 23:59:30', '2020-08-10 23:59:30', 0),
(44, 14, 'Bật lửa xì gà Cohiba', '<p><strong>Th&ocirc;ng tin sản phẩm :</strong></p>\r\n\r\n<p><strong>- T&ecirc;n sản phẩm:</strong>&nbsp;Bật lửa h&uacute;t Cigar Cohiba</p>\r\n\r\n<p><strong>- Nh&atilde;n hiệu:</strong>&nbsp;Cohiba.</p>\r\n\r\n<p><strong>- Loại:&nbsp;</strong>3 tia lửa cực mạnh, c&oacute; thiết bị đục x&igrave; g&agrave;.</p>\r\n\r\n<p><strong>- M&agrave;u sắc:</strong>&nbsp;m&agrave;u đen, m&agrave;u trắng bạc b&oacute;ng.</p>\r\n\r\n<p><strong>- Trọng lượng cả hộp</strong>: 203g.</p>\r\n\r\n<p><strong>- K&iacute;ch thước:</strong>87x30x24mm.</p>\r\n\r\n<p><strong>- Quy c&aacute;ch đ&oacute;ng g&oacute;i:</strong>&nbsp;Full box<strong><em>.</em></strong></p>', 449998, 100, 1, 0, '2020-08-11 00:00:41', '2020-08-26 04:54:38', 3),
(45, 14, 'Dao cắt xì gà Lubinski N003', '<p>Dao cắt x&igrave; g&agrave; Lubinski N003</p>\r\n\r\n<p>T&igrave;nh trạng: c&ograve;n h&agrave;ng.</p>\r\n\r\n<p>k&iacute;ch thước: cắt v&ograve;ng ring nhỏ cớ điếu thuốc l&aacute; ( lọt c&acirc;y viết b&uacute;t bi) đường k&iacute;nh 8mm</p>', 40000, 100, 1, 0, '2020-08-11 00:01:23', '2020-08-26 04:54:38', 3),
(46, 14, 'Gạt tàn thuốc xì gà cohiba N001', '<p>K&iacute;ch thước :&nbsp;120x68x25mm<br />\r\nChất liệu: kim loại</p>', 500000, 100, 1, 0, '2020-08-11 00:01:57', '2020-08-11 00:01:57', 0),
(47, 14, 'Tẩu hút xì gà Thạch Nam N006', '<p>Gi&aacute;: đơn gi&aacute;/c&aacute;i</p>\r\n\r\n<p>Tẩu Xuất xứ T&acirc;y ban nha, h&agrave;ng xịn nha c&aacute;c t&iacute;n đồ</p>\r\n\r\n<p>D&ugrave;ng cho&nbsp;size v&ograve;ng ring&nbsp;từ 40 đến 60.</p>\r\n\r\n<p>Chất liệu ống ngậm: Arcylic</p>\r\n\r\n<p>Cam kết h&agrave;ng chuẩn&nbsp;nếu kh&ocirc;ng đ&uacute;ng xin ho&agrave;n trả lại.</p>\r\n\r\n<p>L&otilde;i trong bằng đồng đảm b&agrave;o d&ugrave;ng bền l&acirc;u v&agrave; chất lượng</p>', 1850000, 100, 1, 0, '2020-08-11 00:02:39', '2020-08-11 00:02:39', 0),
(48, 15, 'Thuốc lá Marula Z Bấm', '<p>Đơn H&agrave;ng n&agrave;y được miễn ph&iacute; vận chuyển ( Free ship)</p>\r\n\r\n<p>Đơn gi&aacute;: /c&acirc;y</p>\r\n\r\n<p><strong>Th&ocirc;ng Tin Sản Phẩm:</strong><br />\r\n- Số lượng: 1 g&oacute;i/20 điếu (1 c&acirc;y/10 g&oacute;i)<br />\r\n- Đ&oacute;ng g&oacute;i: Hộp giấy<br />\r\n- Hương vị: Tr&aacute;i c&acirc;y + vị The khi bấm ở c&aacute;n lọc thuốc<br />\r\n- Thời gian h&uacute;t: 5-10 ph&uacute;t<br />\r\n- Thương hiệu: Zest<br />\r\n- Xuất xứ: H&agrave;n quốc</p>\r\n\r\n<p>T&ecirc;n sản phẩm: Marula (Z bấm tr&aacute;i c&acirc;y)</p>\r\n\r\n<p>Vị xo&agrave;i tr&aacute;i c&acirc;y nhiệt đới kết hợp với bạc h&agrave;.</p>\r\n\r\n<p>????ZEST MARULA - d&ograve;ng thuốc bấm HỢP L&Yacute; đến kh&oacute; hiểu<br />\r\n????Zest marula l&agrave; d&ograve;ng sản phẩm mới nhất của h&atilde;ng Zest, một thương hiệu tới từ H&agrave;n Quốc.<br />\r\n????Vẫn l&agrave; một bao Zest đẩy ngang hết sức đặc biệt nhưng Marula c&ograve;n đặc biệt hơn bởi hương vị xo&agrave;i nhiệt đới kết hợp với sự m&aacute;t lạnh tuyệt vời của bạc h&agrave;.<br />\r\n????Nếu ai đ&atilde; quen với những d&ograve;ng thuốc l&aacute; bấm của H&agrave;n quốc th&igrave; hẳn biết tới Africa Rula - c&aacute;i t&ecirc;n đ&atilde; cực nổi v&agrave; quen thuộc tr&ecirc;n thị trường. Bằng một c&aacute;ch n&agrave;o đ&oacute; v&ocirc; t&igrave;nh hay chủ &yacute; của nh&agrave; sản xuất, Zest Marula lại c&oacute; hương vị giống Africa đến kỳ lạ. Chỉ kh&aacute;c ch&uacute;t x&iacute;u l&agrave; Zest c&oacute; vẻ nhẹ hơn.<br />\r\n⚡️Zest Marula h&uacute;t đặc biệt &ecirc;m, kh&ocirc;ng hề kh&eacute;t, kh&eacute;, cổ hay để lại đờm một ch&uacute;t n&agrave;o.<br />\r\nThực sự l&agrave; một sự lựa chọn qu&aacute; xứng đ&aacute;ng khi gi&aacute; của sản phẩm chỉ bằng hơn nửa so với Africa:</p>', 290000, 100, 1, 0, '2020-08-11 00:05:56', '2020-08-27 04:39:51', 3),
(49, 15, 'DUNHILL ĐỎ DÀI', '<p>Th&ocirc;ng Tin Sản Phẩm:<br />\r\n<br />\r\n- Gi&aacute;: /1 c&acirc;y<br />\r\n- T&ecirc;n sản phẩm: Dunhill (Đỏ D&agrave;i)<br />\r\n- Số lượng: 1 g&oacute;i/20 điếu (1 c&acirc;y/10 g&oacute;i)<br />\r\n- Đ&oacute;ng g&oacute;i: Hộp giấy<br />\r\n- Hương vị: Mộc<br />\r\n- Thời gian h&uacute;t: 5-10 ph&uacute;t<br />\r\n- Xuất xứ: Anh</p>', 550000, 100, 1, 0, '2020-08-11 00:06:33', '2020-08-11 00:06:33', 0),
(50, 15, 'Thuốc lá cuốn tay Drum Bright Blue', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\n- T&ecirc;n SP: Drum Bright Blue<br />\r\n- M&atilde; SP: SP-005<br />\r\n- Trọng lượng: 50g ( cuốn được tầm 80 - 100 điếu )<br />\r\n- Hương vị: Sợi nguy&ecirc;n chất&nbsp;<br />\r\n- Thương hi&ecirc;̣u: Drum<br />\r\n- Sản xuất: H&agrave; Lan<br />\r\n- Thuốc l&aacute; cuốn tay Drum Bright Blue một hương vị thỏa m&atilde;n đến từ một sự kết hợp độc đ&aacute;o của thuốc l&aacute; chất lượng: Bright virginia, burley vị hấp dẫn v&agrave; đậm kentucky</p>', 120000, 100, 1, 0, '2020-08-11 00:34:24', '2020-08-27 04:39:51', 4),
(51, 15, 'Thuốc lá cuốn tay Mac Baren Double menthol choice #251', '<p>Th&ocirc;ng tin sản phẩm:<br />\r\nKhối lượng: 40g<br />\r\nHương vị: Double bạc h&agrave;( gấp 2 lần bạc h&agrave;)<br />\r\nĐộ nặng: 2/5<br />\r\nThương hiệu.: Mac Baren<br />\r\nXuất xứ: Đan Mạch</p>', 110000, 100, 1, 0, '2020-08-11 00:34:56', '2020-08-11 00:34:56', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la hien, 0 la an',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `status`, `created_at`, `updated_at`) VALUES
(8, 12, 'uploads/product/1597131439_5f324aaf76999.jpg', 1, '2020-08-11 00:37:19', '2020-08-11 00:37:19'),
(9, 13, 'uploads/product/1597131453_5f324abdb42a4.jpg', 1, '2020-08-11 00:37:33', '2020-08-11 00:37:33'),
(10, 14, 'uploads/product/1597131465_5f324ac9dfe87.jpg', 1, '2020-08-11 00:37:45', '2020-08-11 00:37:45'),
(11, 15, 'uploads/product/1597131476_5f324ad4cf0bf.jpg', 1, '2020-08-11 00:37:56', '2020-08-11 00:37:56'),
(12, 16, 'uploads/product/1597131524_5f324b0479dfe.jpg', 1, '2020-08-11 00:38:44', '2020-08-11 00:38:44'),
(13, 17, 'uploads/product/1597131548_5f324b1c82dd9.jpg', 1, '2020-08-11 00:39:08', '2020-08-11 00:39:08'),
(14, 18, 'uploads/product/1597131591_5f324b47acbc3.jpg', 1, '2020-08-11 00:39:51', '2020-08-11 00:39:51'),
(15, 19, 'uploads/product/1597131642_5f324b7a1cdcd.jpg', 1, '2020-08-11 00:40:42', '2020-08-11 00:40:42'),
(16, 20, 'uploads/product/1597131764_5f324bf497c1e.jpg', 1, '2020-08-11 00:42:44', '2020-08-11 00:42:44'),
(17, 20, 'uploads/product/1597131775_5f324bff3a3c2.jpg', 1, '2020-08-11 00:42:55', '2020-08-11 00:43:34'),
(18, 20, 'uploads/product/1597131794_5f324c12046ea.jpg', 1, '2020-08-11 00:43:14', '2020-08-27 19:59:52'),
(19, 20, 'uploads/product/1597131804_5f324c1c01bc1.jpg', 1, '2020-08-11 00:43:24', '2020-08-27 19:59:48'),
(20, 21, 'uploads/product/1597131853_5f324c4dc1448.jpg', 1, '2020-08-11 00:44:13', '2020-08-11 00:44:13'),
(21, 21, 'uploads/product/1597131863_5f324c57458cf.jpg', 1, '2020-08-11 00:44:23', '2020-08-11 00:44:23'),
(22, 22, 'uploads/product/1597131938_5f324ca2d8f58.jpg', 1, '2020-08-11 00:45:38', '2020-08-11 00:45:38'),
(23, 22, 'uploads/product/1597131948_5f324cac3e7bd.jpg', 1, '2020-08-11 00:45:48', '2020-08-11 00:45:48'),
(24, 22, 'uploads/product/1597131960_5f324cb8d8dbf.jpg', 1, '2020-08-11 00:46:00', '2020-08-11 00:46:00'),
(25, 23, 'uploads/product/1597132005_5f324ce5320e5.jpg', 1, '2020-08-11 00:46:45', '2020-08-11 00:46:45'),
(26, 23, 'uploads/product/1597132017_5f324cf13ddf0.jpg', 1, '2020-08-11 00:46:57', '2020-08-11 00:46:57'),
(27, 23, 'uploads/product/1597132030_5f324cfeecf7a.jpg', 1, '2020-08-11 00:47:10', '2020-08-11 00:47:10'),
(28, 24, 'uploads/product/1597132098_5f324d420a3c9.jpg', 1, '2020-08-11 00:48:18', '2020-08-11 00:48:18'),
(29, 24, 'uploads/product/1597132109_5f324d4d2aafe.jpg', 1, '2020-08-11 00:48:29', '2020-08-11 00:48:29'),
(30, 24, 'uploads/product/1597132118_5f324d56ba9c6.jpg', 1, '2020-08-11 00:48:38', '2020-08-11 00:48:38'),
(31, 25, 'uploads/product/1597132177_5f324d9139f4d.jpg', 1, '2020-08-11 00:49:37', '2020-08-11 00:49:37'),
(32, 25, 'uploads/product/1597132187_5f324d9b74d49.jpg', 1, '2020-08-11 00:49:47', '2020-08-11 00:49:47'),
(33, 25, 'uploads/product/1597132196_5f324da423b13.jpg', 1, '2020-08-11 00:49:56', '2020-08-11 00:49:56'),
(34, 26, 'uploads/product/1597132237_5f324dcd3bf6c.jpg', 1, '2020-08-11 00:50:37', '2020-08-11 00:50:37'),
(35, 27, 'uploads/product/1597132263_5f324de72321a.jpg', 1, '2020-08-11 00:51:03', '2020-08-11 00:51:03'),
(36, 28, 'uploads/product/1597132290_5f324e02ef74e.jpg', 1, '2020-08-11 00:51:30', '2020-08-11 00:51:30'),
(37, 29, 'uploads/product/1597132324_5f324e24a032d.jpg', 1, '2020-08-11 00:52:04', '2020-08-11 00:52:04'),
(38, 30, 'uploads/product/1597132372_5f324e5428219.jpg', 1, '2020-08-11 00:52:52', '2020-08-11 00:52:52'),
(39, 30, 'uploads/product/1597132382_5f324e5e8cea8.jpg', 1, '2020-08-11 00:53:02', '2020-08-11 00:53:02'),
(40, 30, 'uploads/product/1597132389_5f324e65f0d70.jpg', 1, '2020-08-11 00:53:09', '2020-08-11 00:53:09'),
(41, 31, 'uploads/product/1597132434_5f324e927c81d.jpg', 1, '2020-08-11 00:53:54', '2020-08-11 00:53:54'),
(42, 31, 'uploads/product/1597132443_5f324e9b8b954.jpg', 1, '2020-08-11 00:54:03', '2020-08-11 00:54:03'),
(43, 31, 'uploads/product/1597132453_5f324ea5c5ec0.jpg', 1, '2020-08-11 00:54:13', '2020-08-11 00:54:13'),
(44, 32, 'uploads/product/1597132512_5f324ee06f0ec.jpg', 1, '2020-08-11 00:55:12', '2020-08-11 00:55:12'),
(45, 32, 'uploads/product/1597132528_5f324ef038198.jpg', 1, '2020-08-11 00:55:28', '2020-08-11 00:55:28'),
(46, 32, 'uploads/product/1597132539_5f324efb80143.jpg', 1, '2020-08-11 00:55:39', '2020-08-11 00:55:39'),
(47, 33, 'uploads/product/1597132567_5f324f172ead1.jpg', 1, '2020-08-11 00:56:07', '2020-08-11 00:56:07'),
(48, 34, 'uploads/product/1597132617_5f324f49b1f6b.jpg', 1, '2020-08-11 00:56:57', '2020-08-11 00:56:57'),
(49, 34, 'uploads/product/1597132626_5f324f5280436.jpg', 1, '2020-08-11 00:57:06', '2020-08-11 00:57:06'),
(50, 34, 'uploads/product/1597132638_5f324f5e56ed6.jpg', 1, '2020-08-11 00:57:18', '2020-08-11 00:57:18'),
(51, 35, 'uploads/product/1597132691_5f324f9344b5d.jpg', 1, '2020-08-11 00:58:11', '2020-08-11 00:58:11'),
(52, 35, 'uploads/product/1597132705_5f324fa10cc96.jpg', 1, '2020-08-11 00:58:25', '2020-08-11 00:58:25'),
(53, 35, 'uploads/product/1597132715_5f324fab8396f.jpg', 1, '2020-08-11 00:58:35', '2020-08-11 00:58:35'),
(54, 36, 'uploads/product/1597132818_5f325012ae29e.jpg', 1, '2020-08-11 01:00:18', '2020-08-11 01:00:18'),
(55, 36, 'uploads/product/1597132840_5f3250283df78.jpg', 1, '2020-08-11 01:00:40', '2020-08-11 01:00:40'),
(56, 36, 'uploads/product/1597132851_5f325033e0ae1.jpg', 1, '2020-08-11 01:00:51', '2020-08-11 01:00:51'),
(57, 36, 'uploads/product/1597132861_5f32503d9d643.jpg', 1, '2020-08-11 01:01:01', '2020-08-11 01:01:01'),
(58, 37, 'uploads/product/1597132910_5f32506e3dbc3.jpg', 1, '2020-08-11 01:01:50', '2020-08-11 01:01:50'),
(59, 38, 'uploads/product/1597132949_5f325095a63ed.jpg', 1, '2020-08-11 01:02:29', '2020-08-11 01:02:29'),
(60, 39, 'uploads/product/1597132984_5f3250b8042c2.jpg', 1, '2020-08-11 01:03:04', '2020-08-11 01:03:04'),
(61, 39, 'uploads/product/1597133000_5f3250c893e92.jpg', 1, '2020-08-11 01:03:20', '2020-08-11 01:03:20'),
(62, 40, 'uploads/product/1597133053_5f3250fdb96ac.jpg', 1, '2020-08-11 01:04:13', '2020-08-11 01:04:13'),
(63, 40, 'uploads/product/1597133066_5f32510ac2848.jpg', 1, '2020-08-11 01:04:26', '2020-08-11 01:04:26'),
(64, 41, 'uploads/product/1597133157_5f3251650a26c.jpg', 1, '2020-08-11 01:05:57', '2020-08-11 01:05:57'),
(65, 41, 'uploads/product/1597133169_5f325171adaec.jpg', 1, '2020-08-11 01:06:09', '2020-08-11 01:06:09'),
(66, 42, 'uploads/product/1597133215_5f32519ff12bb.jpg', 1, '2020-08-11 01:06:55', '2020-08-11 01:06:55'),
(67, 42, 'uploads/product/1597133226_5f3251aae600c.jpg', 1, '2020-08-11 01:07:06', '2020-08-11 01:07:06'),
(68, 42, 'uploads/product/1597133239_5f3251b771b6a.jpg', 1, '2020-08-11 01:07:19', '2020-08-11 01:07:19'),
(69, 43, 'uploads/product/1597133319_5f325207e5100.jpg', 1, '2020-08-11 01:08:39', '2020-08-11 01:08:39'),
(70, 44, 'uploads/product/1597133358_5f32522e1d78a.jpg', 1, '2020-08-11 01:09:18', '2020-08-11 01:09:18'),
(71, 44, 'uploads/product/1597133372_5f32523c9d4cb.jpg', 1, '2020-08-11 01:09:32', '2020-08-11 01:09:32'),
(72, 45, 'uploads/product/1597133399_5f32525773fb6.jpg', 1, '2020-08-11 01:09:59', '2020-08-11 01:09:59'),
(73, 46, 'uploads/product/1597133426_5f3252728fbe1.jpg', 1, '2020-08-11 01:10:26', '2020-08-11 01:10:26'),
(74, 46, 'uploads/product/1597133438_5f32527e58986.jpg', 1, '2020-08-11 01:10:38', '2020-08-11 01:10:38'),
(75, 47, 'uploads/product/1597133489_5f3252b1d2eb2.jpg', 1, '2020-08-11 01:11:29', '2020-08-11 01:11:29'),
(76, 47, 'uploads/product/1597133501_5f3252bd72a4e.jpg', 1, '2020-08-11 01:11:41', '2020-08-11 01:11:41'),
(77, 48, 'uploads/product/1597133532_5f3252dc561d4.jpg', 1, '2020-08-11 01:12:12', '2020-08-11 01:12:12'),
(78, 48, 'uploads/product/1597133544_5f3252e8bacf4.jpg', 1, '2020-08-11 01:12:24', '2020-08-11 01:12:24'),
(79, 49, 'uploads/product/1597133577_5f3253097b3c2.jpg', 1, '2020-08-11 01:12:57', '2020-08-11 01:12:57'),
(80, 49, 'uploads/product/1597133587_5f3253139c9cf.jpg', 1, '2020-08-11 01:13:07', '2020-08-11 01:13:07'),
(81, 50, 'uploads/product/1597133711_5f32538f0d866.jpg', 1, '2020-08-11 01:15:11', '2020-08-11 01:15:11'),
(82, 51, 'uploads/product/1597133763_5f3253c38a295.jpg', 1, '2020-08-11 01:16:03', '2020-08-11 01:16:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tieu de bai viet',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `desc`) VALUES
(1, 'HI', '2020-07-30 11:56:20', '2020-07-30 11:56:20', ''),
(2, 'HA', '2020-07-30 11:56:20', '2020-07-30 11:56:20', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vhkb', 'vhkb1708@gmail.com', NULL, '$2y$10$bcU8uVfd6CZjbQVrGAXnaeFohf7T5NajmtNouUGjIwHlv.eTu3Kwa', 'lBkw2zs1tITGPNQwTrV5lkrnVy2Sb8Xxc1ikGlJJK4uOjay0Bdj5eu7tL3Av', '2020-07-30 04:09:54', '2020-07-30 04:09:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban_xi_gas`
--
ALTER TABLE `ban_xi_gas`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_list_product`
--
ALTER TABLE `order_list_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `ban_xi_gas`
--
ALTER TABLE `ban_xi_gas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `order_list_product`
--
ALTER TABLE `order_list_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
