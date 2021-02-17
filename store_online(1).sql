-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 06:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `parent_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 0, 'adidas', 1, '2021-01-19 22:12:07', '2021-01-19 22:12:07'),
(2, 'Puma', 0, 'puma', 1, '2021-01-19 22:12:31', '2021-01-19 22:12:31'),
(4, 'Nike', 0, 'nike', 1, '2021-01-19 22:42:43', '2021-01-19 22:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Sport', 0, 'sport', '2020-12-29 23:53:11', '2020-12-29 23:53:11', 0),
(2, 'Mỹ phẩm', 0, 'my-pham', '2020-12-29 23:54:32', '2020-12-29 23:54:32', 0),
(3, 'Nike', 1, 'nike', '2020-12-29 23:54:58', '2020-12-29 23:54:58', 0),
(4, 'Nike 1', 3, 'nike-1', '2020-12-29 23:55:30', '2020-12-29 23:55:30', 0),
(5, 'Hazeline', 2, 'hazeline', '2020-12-30 08:24:05', '2020-12-30 10:36:05', 1),
(6, 'Puma', 1, 'puma', '2020-12-30 08:40:01', '2020-12-30 08:40:01', 0),
(7, 'Adidas', 1, 'adidas', '2020-12-30 08:40:40', '2020-12-30 08:40:40', 1),
(8, 'Điện thoại', 0, 'dien-thoai', '2020-12-30 21:21:43', '2020-12-30 21:21:43', 1),
(9, 'Thời Trang', 0, 'thoi-trang', '2021-01-22 05:16:35', '2021-01-22 05:16:35', 1),
(10, 'Thời trang nam', 9, 'thoi-trang-nam', '2021-01-22 05:17:00', '2021-01-22 05:17:00', 1),
(11, 'Thời trang nữ', 9, 'thoi-trang-nu', '2021-01-22 05:24:10', '2021-01-22 05:24:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(2, 'AL', 'Albania', NULL, NULL),
(3, 'DZ', 'Algeria', NULL, NULL),
(4, 'DS', 'American Samoa', NULL, NULL),
(5, 'AD', 'Andorra', NULL, NULL),
(6, 'AO', 'Angola', NULL, NULL),
(7, 'AI', 'Anguilla', NULL, NULL),
(8, 'AQ', 'Antarctica', NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', NULL, NULL),
(10, 'AR', 'Argentina', NULL, NULL),
(11, 'AM', 'Armenia', NULL, NULL),
(12, 'AW', 'Aruba', NULL, NULL),
(13, 'AU', 'Australia', NULL, NULL),
(14, 'AT', 'Austria', NULL, NULL),
(15, 'AZ', 'Azerbaijan', NULL, NULL),
(16, 'BS', 'Bahamas', NULL, NULL),
(17, 'BH', 'Bahrain', NULL, NULL),
(18, 'BD', 'Bangladesh', NULL, NULL),
(19, 'BB', 'Barbados', NULL, NULL),
(20, 'BY', 'Belarus', NULL, NULL),
(21, 'BE', 'Belgium', NULL, NULL),
(22, 'BZ', 'Belize', NULL, NULL),
(23, 'BJ', 'Benin', NULL, NULL),
(24, 'BM', 'Bermuda', NULL, NULL),
(25, 'BT', 'Bhutan', NULL, NULL),
(26, 'BO', 'Bolivia', NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(28, 'BW', 'Botswana', NULL, NULL),
(29, 'BV', 'Bouvet Island', NULL, NULL),
(30, 'BR', 'Brazil', NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(32, 'BN', 'Brunei Darussalam', NULL, NULL),
(33, 'BG', 'Bulgaria', NULL, NULL),
(34, 'BF', 'Burkina Faso', NULL, NULL),
(35, 'BI', 'Burundi', NULL, NULL),
(36, 'KH', 'Cambodia', NULL, NULL),
(37, 'CM', 'Cameroon', NULL, NULL),
(38, 'CA', 'Canada', NULL, NULL),
(39, 'CV', 'Cape Verde', NULL, NULL),
(40, 'KY', 'Cayman Islands', NULL, NULL),
(41, 'CF', 'Central African Republic', NULL, NULL),
(42, 'TD', 'Chad', NULL, NULL),
(43, 'CL', 'Chile', NULL, NULL),
(44, 'CN', 'China', NULL, NULL),
(45, 'CX', 'Christmas Island', NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(47, 'CO', 'Colombia', NULL, NULL),
(48, 'KM', 'Comoros', NULL, NULL),
(49, 'CG', 'Congo', NULL, NULL),
(50, 'CK', 'Cook Islands', NULL, NULL),
(51, 'CR', 'Costa Rica', NULL, NULL),
(52, 'AF', 'Afghanistan', NULL, NULL),
(53, 'AL', 'Albania', NULL, NULL),
(54, 'DZ', 'Algeria', NULL, NULL),
(55, 'DS', 'American Samoa', NULL, NULL),
(56, 'AD', 'Andorra', NULL, NULL),
(57, 'AO', 'Angola', NULL, NULL),
(58, 'AI', 'Anguilla', NULL, NULL),
(59, 'AQ', 'Antarctica', NULL, NULL),
(60, 'AG', 'Antigua and Barbuda', NULL, NULL),
(61, 'AR', 'Argentina', NULL, NULL),
(62, 'AM', 'Armenia', NULL, NULL),
(63, 'AW', 'Aruba', NULL, NULL),
(64, 'AU', 'Australia', NULL, NULL),
(65, 'AT', 'Austria', NULL, NULL),
(66, 'AZ', 'Azerbaijan', NULL, NULL),
(67, 'BS', 'Bahamas', NULL, NULL),
(68, 'BH', 'Bahrain', NULL, NULL),
(69, 'BD', 'Bangladesh', NULL, NULL),
(70, 'BB', 'Barbados', NULL, NULL),
(71, 'BY', 'Belarus', NULL, NULL),
(72, 'BE', 'Belgium', NULL, NULL),
(73, 'BZ', 'Belize', NULL, NULL),
(74, 'BJ', 'Benin', NULL, NULL),
(75, 'BM', 'Bermuda', NULL, NULL),
(76, 'BT', 'Bhutan', NULL, NULL),
(77, 'BO', 'Bolivia', NULL, NULL),
(78, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(79, 'BW', 'Botswana', NULL, NULL),
(80, 'BV', 'Bouvet Island', NULL, NULL),
(81, 'BR', 'Brazil', NULL, NULL),
(82, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(83, 'BN', 'Brunei Darussalam', NULL, NULL),
(84, 'BG', 'Bulgaria', NULL, NULL),
(85, 'BF', 'Burkina Faso', NULL, NULL),
(86, 'BI', 'Burundi', NULL, NULL),
(87, 'KH', 'Cambodia', NULL, NULL),
(88, 'CM', 'Cameroon', NULL, NULL),
(89, 'CA', 'Canada', NULL, NULL),
(90, 'CV', 'Cape Verde', NULL, NULL),
(91, 'KY', 'Cayman Islands', NULL, NULL),
(92, 'CF', 'Central African Republic', NULL, NULL),
(93, 'TD', 'Chad', NULL, NULL),
(94, 'CL', 'Chile', NULL, NULL),
(95, 'CN', 'China', NULL, NULL),
(96, 'CX', 'Christmas Island', NULL, NULL),
(97, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(98, 'CO', 'Colombia', NULL, NULL),
(99, 'KM', 'Comoros', NULL, NULL),
(100, 'CG', 'Congo', NULL, NULL),
(101, 'CK', 'Cook Islands', NULL, NULL),
(102, 'CR', 'Costa Rica', NULL, NULL),
(103, 'HR', 'Croatia (Hrvatska)', NULL, NULL),
(104, 'CU', 'Cuba', NULL, NULL),
(105, 'CY', 'Cyprus', NULL, NULL),
(106, 'CZ', 'Czech Republic', NULL, NULL),
(107, 'DK', 'Denmark', NULL, NULL),
(108, 'DJ', 'Djibouti', NULL, NULL),
(109, 'DM', 'Dominica', NULL, NULL),
(110, 'DO', 'Dominican Republic', NULL, NULL),
(111, 'TP', 'East Timor', NULL, NULL),
(112, 'EC', 'Ecuador', NULL, NULL),
(113, 'EG', 'Egypt', NULL, NULL),
(114, 'SV', 'El Salvador', NULL, NULL),
(115, 'GQ', 'Equatorial Guinea', NULL, NULL),
(116, 'ER', 'Eritrea', NULL, NULL),
(117, 'EE', 'Estonia', NULL, NULL),
(118, 'ET', 'Ethiopia', NULL, NULL),
(119, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(120, 'FO', 'Faroe Islands', NULL, NULL),
(121, 'FJ', 'Fiji', NULL, NULL),
(122, 'FI', 'Finland', NULL, NULL),
(123, 'FR', 'France', NULL, NULL),
(124, 'FX', 'France, Metropolitan', NULL, NULL),
(125, 'GF', 'French Guiana', NULL, NULL),
(126, 'PF', 'French Polynesia', NULL, NULL),
(127, 'TF', 'French Southern Territories', NULL, NULL),
(128, 'GA', 'Gabon', NULL, NULL),
(129, 'GM', 'Gambia', NULL, NULL),
(130, 'GE', 'Georgia', NULL, NULL),
(131, 'DE', 'Germany', NULL, NULL),
(132, 'GH', 'Ghana', NULL, NULL),
(133, 'GI', 'Gibraltar', NULL, NULL),
(134, 'GK', 'Guernsey', NULL, NULL),
(135, 'GR', 'Greece', NULL, NULL),
(136, 'GL', 'Greenland', NULL, NULL),
(137, 'GD', 'Grenada', NULL, NULL),
(138, 'GP', 'Guadeloupe', NULL, NULL),
(139, 'GU', 'Guam', NULL, NULL),
(140, 'GT', 'Guatemala', NULL, NULL),
(141, 'GN', 'Guinea', NULL, NULL),
(142, 'GW', 'Guinea-Bissau', NULL, NULL),
(143, 'GY', 'Guyana', NULL, NULL),
(144, 'HT', 'Haiti', NULL, NULL),
(145, 'HM', 'Heard and Mc Donald Islands', NULL, NULL),
(146, 'HN', 'Honduras', NULL, NULL),
(147, 'HK', 'Hong Kong', NULL, NULL),
(148, 'HU', 'Hungary', NULL, NULL),
(149, 'IS', 'Iceland', NULL, NULL),
(150, 'IN', 'India', NULL, NULL),
(151, 'IM', 'Isle of Man', NULL, NULL),
(152, 'ID', 'Indonesia', NULL, NULL),
(153, 'IR', 'Iran (Islamic Republic of)', NULL, NULL),
(154, 'IQ', 'Iraq', NULL, NULL),
(155, 'IE', 'Ireland', NULL, NULL),
(156, 'IL', 'Israel', NULL, NULL),
(157, 'IT', 'Italy', NULL, NULL),
(158, 'CI', 'Ivory Coast', NULL, NULL),
(159, 'JE', 'Jersey', NULL, NULL),
(160, 'JM', 'Jamaica', NULL, NULL),
(161, 'JP', 'Japan', NULL, NULL),
(162, 'JO', 'Jordan', NULL, NULL),
(163, 'KZ', 'Kazakhstan', NULL, NULL),
(164, 'KE', 'Kenya', NULL, NULL),
(165, 'KI', 'Kiribati', NULL, NULL),
(166, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(167, 'KR', 'Korea, Republic of', NULL, NULL),
(168, 'XK', 'Kosovo', NULL, NULL),
(169, 'KW', 'Kuwait', NULL, NULL),
(170, 'KG', 'Kyrgyzstan', NULL, NULL),
(171, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(172, 'LV', 'Latvia', NULL, NULL),
(173, 'LB', 'Lebanon', NULL, NULL),
(174, 'LS', 'Lesotho', NULL, NULL),
(175, 'LR', 'Liberia', NULL, NULL),
(176, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(177, 'LI', 'Liechtenstein', NULL, NULL),
(178, 'LT', 'Lithuania', NULL, NULL),
(179, 'LU', 'Luxembourg', NULL, NULL),
(180, 'MO', 'Macau', NULL, NULL),
(181, 'MK', 'Macedonia', NULL, NULL),
(182, 'MG', 'Madagascar', NULL, NULL),
(183, 'MW', 'Malawi', NULL, NULL),
(184, 'MY', 'Malaysia', NULL, NULL),
(185, 'MV', 'Maldives', NULL, NULL),
(186, 'ML', 'Mali', NULL, NULL),
(187, 'MT', 'Malta', NULL, NULL),
(188, 'MH', 'Marshall Islands', NULL, NULL),
(189, 'MQ', 'Martinique', NULL, NULL),
(190, 'MR', 'Mauritania', NULL, NULL),
(191, 'MU', 'Mauritius', NULL, NULL),
(192, 'TY', 'Mayotte', NULL, NULL),
(193, 'MX', 'Mexico', NULL, NULL),
(194, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(195, 'MD', 'Moldova, Republic of', NULL, NULL),
(196, 'MC', 'Monaco', NULL, NULL),
(197, 'MN', 'Mongolia', NULL, NULL),
(198, 'ME', 'Montenegro', NULL, NULL),
(199, 'MS', 'Montserrat', NULL, NULL),
(200, 'MA', 'Morocco', NULL, NULL),
(201, 'MZ', 'Mozambique', NULL, NULL),
(202, 'MM', 'Myanmar', NULL, NULL),
(203, 'NA', 'Namibia', NULL, NULL),
(204, 'NR', 'Nauru', NULL, NULL),
(205, 'NP', 'Nepal', NULL, NULL),
(206, 'NL', 'Netherlands', NULL, NULL),
(207, 'AN', 'Netherlands Antilles', NULL, NULL),
(208, 'NC', 'New Caledonia', NULL, NULL),
(209, 'NZ', 'New Zealand', NULL, NULL),
(210, 'NI', 'Nicaragua', NULL, NULL),
(211, 'NE', 'Niger', NULL, NULL),
(212, 'NG', 'Nigeria', NULL, NULL),
(213, 'NU', 'Niue', NULL, NULL),
(214, 'NF', 'Norfolk Island', NULL, NULL),
(215, 'MP', 'Northern Mariana Islands', NULL, NULL),
(216, 'NO', 'Norway', NULL, NULL),
(217, 'OM', 'Oman', NULL, NULL),
(218, 'PK', 'Pakistan', NULL, NULL),
(219, 'PW', 'Palau', NULL, NULL),
(220, 'PS', 'Palestine', NULL, NULL),
(221, 'PA', 'Panama', NULL, NULL),
(222, 'PG', 'Papua New Guinea', NULL, NULL),
(223, 'PY', 'Paraguay', NULL, NULL),
(224, 'PE', 'Peru', NULL, NULL),
(225, 'PH', 'Philippines', NULL, NULL),
(226, 'PN', 'Pitcairn', NULL, NULL),
(227, 'PL', 'Poland', NULL, NULL),
(228, 'PT', 'Portugal', NULL, NULL),
(229, 'PR', 'Puerto Rico', NULL, NULL),
(230, 'QA', 'Qatar', NULL, NULL),
(231, 'RE', 'Reunion', NULL, NULL),
(232, 'RO', 'Romania', NULL, NULL),
(233, 'RU', 'Russian Federation', NULL, NULL),
(234, 'RW', 'Rwanda', NULL, NULL),
(235, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(236, 'LC', 'Saint Lucia', NULL, NULL),
(237, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(238, 'WS', 'Samoa', NULL, NULL),
(239, 'SM', 'San Marino', NULL, NULL),
(240, 'ST', 'Sao Tome and Principe', NULL, NULL),
(241, 'SA', 'Saudi Arabia', NULL, NULL),
(242, 'SN', 'Senegal', NULL, NULL),
(243, 'RS', 'Serbia', NULL, NULL),
(244, 'SC', 'Seychelles', NULL, NULL),
(245, 'SL', 'Sierra Leone', NULL, NULL),
(246, 'SG', 'Singapore', NULL, NULL),
(247, 'SK', 'Slovakia', NULL, NULL),
(248, 'SI', 'Slovenia', NULL, NULL),
(249, 'SB', 'Solomon Islands', NULL, NULL),
(250, 'SO', 'Somalia', NULL, NULL),
(251, 'ZA', 'South Africa', NULL, NULL),
(252, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL),
(253, 'SS', 'South Sudan', NULL, NULL),
(254, 'ES', 'Spain', NULL, NULL),
(255, 'LK', 'Sri Lanka', NULL, NULL),
(256, 'SH', 'St. Helena', NULL, NULL),
(257, 'PM', 'St. Pierre and Miquelon', NULL, NULL),
(258, 'SD', 'Sudan', NULL, NULL),
(259, 'SR', 'Suriname', NULL, NULL),
(260, 'SJ', 'Svalbard and Jan Mayen Islands', NULL, NULL),
(261, 'SZ', 'Swaziland', NULL, NULL),
(262, 'SE', 'Sweden', NULL, NULL),
(263, 'CH', 'Switzerland', NULL, NULL),
(264, 'SY', 'Syrian Arab Republic', NULL, NULL),
(265, 'TW', 'Taiwan', NULL, NULL),
(266, 'TJ', 'Tajikistan', NULL, NULL),
(267, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(268, 'TH', 'Thailand', NULL, NULL),
(269, 'TG', 'Togo', NULL, NULL),
(270, 'TK', 'Tokelau', NULL, NULL),
(271, 'TO', 'Tonga', NULL, NULL),
(272, 'TT', 'Trinidad and Tobago', NULL, NULL),
(273, 'TN', 'Tunisia', NULL, NULL),
(274, 'TR', 'Turkey', NULL, NULL),
(275, 'TM', 'Turkmenistan', NULL, NULL),
(276, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(277, 'TV', 'Tuvalu', NULL, NULL),
(278, 'UG', 'Uganda', NULL, NULL),
(279, 'UA', 'Ukraine', NULL, NULL),
(280, 'AE', 'United Arab Emirates', NULL, NULL),
(281, 'GB', 'United Kingdom', NULL, NULL),
(282, 'US', 'United States', NULL, NULL),
(283, 'UM', 'United States minor outlying islands', NULL, NULL),
(284, 'UY', 'Uruguay', NULL, NULL),
(285, 'UZ', 'Uzbekistan', NULL, NULL),
(286, 'VU', 'Vanuatu', NULL, NULL),
(287, 'VA', 'Vatican City State', NULL, NULL),
(288, 'VE', 'Venezuela', NULL, NULL),
(289, 'VN', 'Vietnam', NULL, NULL),
(290, 'VG', 'Virgin Islands (British)', NULL, NULL),
(291, 'VI', 'Virgin Islands (U.S.)', NULL, NULL),
(292, 'WF', 'Wallis and Futuna Islands', NULL, NULL),
(293, 'EH', 'Western Sahara', NULL, NULL),
(294, 'YE', 'Yemen', NULL, NULL),
(295, 'ZR', 'Zaire', NULL, NULL),
(296, 'ZM', 'Zambia', NULL, NULL),
(297, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'giam_10 sua', 10, 'Percentage', '2021-01-29', 1, '2021-01-17 09:05:34', '2021-01-25 21:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `users_id`, `users_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(27, 10, 'chau@gmail.com', 'le thi minh chau', '346/13/5 Mã Lò P.Bình Trị Đông A Q.Bình Tân', 'HCM', '11', 'Vietnam', '123', '0906077097', NULL, NULL),
(26, 12, 'dat@gmail.com', 'dat', '249 lllq', 'hcm', '11', 'Vietnam', '123', '09098', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Thể thao', 0, 'the-thao', 1, '2020-12-31 21:29:29', '2020-12-31 21:29:29'),
(2, 'Văn Hóa', 0, 'van-hoa', 1, '2021-01-02 03:11:54', '2021-01-02 03:11:54'),
(3, 'Bóng đá', 1, 'bong-da', 0, '2021-01-02 03:27:01', '2021-01-02 03:27:01'),
(4, 'Quần vợt', 1, 'quan-vot', 1, '2021-01-02 03:27:34', '2021-01-02 03:27:34'),
(5, 'Ngoại Hạng Anh', 3, 'ngoai-hang-anh', 1, '2021-01-02 03:28:50', '2021-01-02 03:28:50'),
(6, 'Xã hội', 0, 'xa-hoi', 1, '2021-01-02 03:29:36', '2021-01-02 03:29:36'),
(7, 'Việt Nam', 3, 'viet-nam', 1, '2021-01-02 03:30:57', '2021-01-02 03:30:57'),
(8, 'Giải hạng I', 7, 'giai-hang-i', 1, '2021-01-02 03:32:11', '2021-01-02 03:32:11'),
(9, 'Xã hội 1', 6, 'xa-hoi-1', 0, '2021-01-02 03:49:05', '2021-01-02 03:49:05'),
(10, 'Mỹ phẩm', 0, 'my-pham', 1, '2021-01-02 03:50:10', '2021-01-02 03:50:10'),
(11, 'Adidas', 0, 'adidas', 1, '2021-01-19 22:03:38', '2021-01-19 22:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_30_035718_create_categories_table', 1),
(5, '2021_01_01_021010_create_menus_table', 2),
(6, '2021_01_02_122829_create_settings_table', 3),
(7, '2021_01_03_102255_create_sliders_table', 4),
(8, '2021_01_04_041625_add_columns_to_users_table', 5),
(9, '2021_01_04_042228_add_status_to_users_table', 6),
(10, '2021_01_04_105648_create_products_table', 7),
(11, '2021_01_04_121745_create_product_images_table', 8),
(12, '2021_01_04_121832_create_product_tags_table', 8),
(13, '2021_01_04_121857_create_tags_table', 8),
(14, '2021_01_07_073313_create_product_attributes_table', 9),
(15, '2021_01_10_140203_create_permissions_table', 10),
(16, '2021_01_11_142949_create_roles_table', 11),
(17, '2021_01_11_154401_create_permission_role_table', 12),
(18, '2021_01_12_074434_create_role_user_table', 13),
(19, '2021_01_17_145212_create_coupons_table', 14),
(22, '2021_01_20_041219_create_brands_table', 15),
(23, '2021_01_23_101423_create_orders_table', 16),
(24, '2021_01_23_102004_create_carts_table', 16),
(25, '2021_01_23_102739_create_delivery_address_table', 16),
(26, '2021_01_27_071930_create_order_product_table', 17),
(27, '2021_02_02_040620_create_reviews_table', 18),
(28, '2021_02_02_101409_add_ratings_to_products_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_order` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `grand_total` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ma_order`, `note`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `pincode`, `country`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_status`, `payment_method`, `total_price`, `grand_total`, `created_at`, `updated_at`) VALUES
(23, 'KL-8bCrRgfW8s', NULL, 12, 'dat@gmail.com', 'dat', '249 lllq', 'hcm', '11', '123', 'Vietnam', '09098', 0.00, 'giam_10 sua', '8.5', 'pending', 'pending', 'COD', '', '76.5', '2021-01-29 03:53:59', '2021-01-29 03:53:59'),
(24, 'KL-A02d1LvDyh', NULL, 10, 'chau@gmail.com', 'chau', '346/13/5 Mã Lò P.Bình Trị Đông A Q.Bình Tân', 'HCM', '11', '123', 'Vietnam', '0906077097', 0.00, 'giam_10 sua', '36', 'pending', 'pending', 'COD', '360', '324', '2021-01-29 10:25:44', '2021-01-29 10:25:44'),
(25, 'KL-FoY5MEQujs', 'dsssssssssss', 10, 'chau@gmail.com', 'le thi minh chau', '346/13/5 Mã Lò P.Bình Trị Đông A Q.Bình Tân', 'HCM', '11', '123', 'Vietnam', '0906077097', 0.00, 'NO Coupon', '0', 'pending', 'pending', 'COD', '120', '120', '2021-01-29 10:30:42', '2021-02-01 08:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `orders_id`, `products_id`, `size`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(32, 23, 20, 'M', 3, '5', '15', '2021-01-29 03:53:59', '2021-01-29 03:53:59'),
(33, 23, 20, 'L', 5, '10', '50', '2021-01-29 03:53:59', '2021-01-29 03:53:59'),
(34, 23, 18, 'M', 2, '10', '20', '2021-01-29 03:53:59', '2021-01-29 03:53:59'),
(35, 24, 21, 'L', 10, '10', '100', '2021-01-29 10:25:44', '2021-01-29 10:25:44'),
(36, 24, 18, 'M', 20, '10', '200', '2021-01-29 10:25:44', '2021-01-29 10:25:44'),
(37, 24, 20, 'M', 12, '5', '60', '2021-01-29 10:25:44', '2021-01-29 10:25:44'),
(38, 25, 21, 'L', 10, '10', '100', '2021-01-29 10:30:42', '2021-01-29 10:30:42'),
(39, 25, 19, 'M', 4, '5', '20', '2021-01-29 10:30:42', '2021-01-29 10:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `key_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `parent_id`, `key_code`, `created_at`, `updated_at`) VALUES
(1, 'category', 'category', 0, NULL, '2021-01-11 07:18:08', '2021-01-11 07:18:08'),
(2, 'list', 'list', 1, 'category_list', '2021-01-11 07:18:08', '2021-01-11 07:18:08'),
(3, 'add', 'add', 1, 'category_add', '2021-01-11 07:18:08', '2021-01-11 07:18:08'),
(4, 'edit', 'edit', 1, 'category_edit', '2021-01-11 07:18:08', '2021-01-11 07:18:08'),
(5, 'delete', 'delete', 1, 'category_delete', '2021-01-11 07:18:08', '2021-01-11 07:18:08'),
(6, 'slider', 'slider', 0, NULL, '2021-01-11 07:18:49', '2021-01-11 07:18:49'),
(7, 'list', 'list', 6, 'slider_list', '2021-01-11 07:18:49', '2021-01-11 07:18:49'),
(8, 'add', 'add', 6, 'slider_add', '2021-01-11 07:18:49', '2021-01-11 07:18:49'),
(9, 'edit', 'edit', 6, 'slider_edit', '2021-01-11 07:18:49', '2021-01-11 07:18:49'),
(10, 'delete', 'delete', 6, 'slider_delete', '2021-01-11 07:18:49', '2021-01-11 07:18:49'),
(11, 'menu', 'menu', 0, NULL, '2021-01-14 21:32:58', '2021-01-14 21:32:58'),
(12, 'list', 'list', 11, 'menu_list', '2021-01-14 21:32:58', '2021-01-14 21:32:58'),
(13, 'add', 'add', 11, 'menu_add', '2021-01-14 21:32:58', '2021-01-14 21:32:58'),
(14, 'edit', 'edit', 11, 'menu_edit', '2021-01-14 21:32:58', '2021-01-14 21:32:58'),
(15, 'delete', 'delete', 11, 'menu_delete', '2021-01-14 21:32:58', '2021-01-14 21:32:58'),
(16, 'product', 'product', 0, NULL, '2021-01-14 21:33:13', '2021-01-14 21:33:13'),
(17, 'list', 'list', 16, 'product_list', '2021-01-14 21:33:13', '2021-01-14 21:33:13'),
(18, 'add', 'add', 16, 'product_add', '2021-01-14 21:33:13', '2021-01-14 21:33:13'),
(19, 'edit', 'edit', 16, 'product_edit', '2021-01-14 21:33:13', '2021-01-14 21:33:13'),
(20, 'delete', 'delete', 16, 'product_delete', '2021-01-14 21:33:13', '2021-01-14 21:33:13'),
(21, 'setting', 'setting', 0, NULL, '2021-01-14 21:33:26', '2021-01-14 21:33:26'),
(22, 'list', 'list', 21, 'setting_list', '2021-01-14 21:33:26', '2021-01-14 21:33:26'),
(23, 'add', 'add', 21, 'setting_add', '2021-01-14 21:33:26', '2021-01-14 21:33:26'),
(24, 'edit', 'edit', 21, 'setting_edit', '2021-01-14 21:33:26', '2021-01-14 21:33:26'),
(25, 'delete', 'delete', 21, 'setting_delete', '2021-01-14 21:33:26', '2021-01-14 21:33:26'),
(26, 'user', 'user', 0, '', '2021-01-17 03:58:36', '2021-01-17 03:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 3, 1, NULL, NULL),
(3, 4, 1, NULL, NULL),
(4, 5, 1, NULL, NULL),
(5, 7, 1, NULL, NULL),
(6, 8, 1, NULL, NULL),
(7, 9, 1, NULL, NULL),
(8, 10, 1, NULL, NULL),
(17, 12, 1, NULL, NULL),
(18, 13, 1, NULL, NULL),
(19, 14, 1, NULL, NULL),
(20, 15, 1, NULL, NULL),
(21, 17, 1, NULL, NULL),
(22, 18, 1, NULL, NULL),
(23, 19, 1, NULL, NULL),
(24, 20, 1, NULL, NULL),
(25, 22, 1, NULL, NULL),
(26, 23, 1, NULL, NULL),
(27, 24, 1, NULL, NULL),
(28, 25, 1, NULL, NULL),
(29, 12, 4, NULL, NULL),
(30, 13, 4, NULL, NULL),
(31, 14, 4, NULL, NULL),
(32, 15, 4, NULL, NULL),
(36, 2, 3, NULL, NULL),
(37, 19, 3, NULL, NULL),
(38, 4, 3, NULL, NULL),
(39, 3, 3, NULL, NULL),
(40, 5, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_sp` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '1',
  `views_count` int(11) DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avg_rating` double(8,2) NOT NULL DEFAULT '0.00',
  `reviews_count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `ma_sp`, `price`, `p_name`, `p_code`, `p_color`, `description`, `content`, `feature_image_path`, `feature_image_name`, `category_id`, `brand_id`, `user_id`, `views_count`, `status`, `created_at`, `updated_at`, `avg_rating`, `reviews_count`) VALUES
(3, 'san pham 1', 'san_pham_1', 'ddddddd', '10', NULL, NULL, NULL, 'mo ta san pham 1', '<p><img src=\"/storage/photos/1/product/cuongg.png\" alt=\"\" width=\"300\" height=\"153\" /></p>\r\n<p>noidung sap1</p>', '/storage/product/1/bm4bjGx3Gzo1TF2JkIZm.png', 'cuongg.png', 1, NULL, 2, 0, 1, '2021-01-04 21:06:57', '2021-01-04 21:06:57', 0.00, 0),
(4, 'Iphone', 'iphone', 'qqqqqqqqqqqqq', '3456', NULL, NULL, NULL, 'mo ta iphone', '<p><img src=\"/storage/photos/1/product/pikachu.png\" alt=\"\" width=\"300\" height=\"153\" /></p>', '/storage/product/1/5HMTlXMHboXpO5Cd4Edl.png', 'pikachu.png', 4, NULL, 1, 0, 1, '2021-01-04 21:11:15', '2021-01-20 03:30:47', 0.00, 0),
(5, 'Hazeline', 'hazeline', 'aaaaaaaaaaaaa', '12345678', NULL, NULL, NULL, 'mo ta hazelline', '<p>fdas</p>', '/storage/product/1/Te7EUowishmRi9k84yVM.png', 'cuongg.png', 7, NULL, 1, 0, 1, '2021-01-04 21:28:23', '2021-01-20 03:30:39', 0.00, 0),
(11, 'giày dép nam 1', 'giay-dep-nam-1', 'eeeeeeeee', '12345678', NULL, NULL, NULL, 'mo ta', '<p>fdafda</p>', '/storage/product/1/C4TrNWJEshOOvnt0lzaS.png', 'khe.png', 6, NULL, 1, 0, 1, '2021-01-04 21:56:34', '2021-01-20 03:29:59', 0.00, 0),
(12, 'iphone 7 sua', 'iphone-7-sua', 'aaaaaaaaaa', '123 sua', NULL, NULL, NULL, 'mo ta iphone7 sua', '<p>noi dung iphone 7 sua</p>', '/storage/product/1/8kdWcWvedTdWlCOB4IQK.png', 'ynbosster.png', 1, 1, 1, 0, 0, '2021-01-05 20:48:20', '2021-01-20 03:29:33', 0.00, 0),
(13, 'test Brand', 'test-brand', 'ddđ', '2321', NULL, NULL, NULL, 'mo ta test Brand', '<p>noi dung test Brand</p>', '/storage/product/1/zMItAd7cA6VlOTVdtd8F.png', 'cuongg.png', 3, 4, 1, 0, 1, '2021-01-19 22:44:24', '2021-01-20 03:29:10', 0.00, 0),
(14, 'Áo Thun Unisex V97', 'ao-thun-unisex-v97', 'aothun1', '2321', NULL, NULL, NULL, 'Chất liệu: Được làm 100% vải cotton', '<div class=\"description-content\">\r\n<div class=\"description-productdetail\">\r\n<p>- Chất liệu: Được l&agrave;m 100% vải cotton</p>\r\n<p>- M&agrave;u sắc: Trắng/ Đen</p>\r\n<p>- Kiểu d&aacute;ng: Cổ tr&ograve;n, d&aacute;ng rộng</p>\r\n<p>- Độ co gi&atilde;n: 4 chiều</p>\r\n<p>- K&iacute;ch thước: Gồm size S, M, L, XL</p>\r\n</div>\r\n</div>', '/storage/product/1/DZZY9tmouUz21yoHoEIf.jpg', '1fc8f7d72e45d01b895419_57ffe8c4f1ba4cbcac90ed5d7f205f2b_master.jpg', 6, 2, 1, 0, 1, '2021-01-19 22:52:16', '2021-01-20 03:26:54', 0.00, 0),
(15, 'Giày Thể Thao Nam Nike Air Force', 'giay-the-thao-nam-nike-air-force', 'Nike1A', '10', NULL, NULL, NULL, 'Giày Nike Air Force 1 07 White 315122-111 Màu Trắng thiết kế đẹp mắt, kiểu dáng hiện đại. Với đôi giày thời trang này chắc chắn bạn sẽ trở nên nổi bật và cuốn hút hơn.', '<h2 style=\"font-size: 18pt;\"><strong>Ưu điểm nổi bật của gi&agrave;y Nike Air Force 1 07 White 315122-111</strong></h2>\r\n<p>- Phần tr&ecirc;n của gi&agrave;y <strong>Nike Air Force 1 07 White 315122-111</strong> được l&agrave;m từ chất liệu da cao cấp với độ &ocirc;m được thiết kế đặc biệt để n&acirc;ng đỡ c&oacute; định hướng v&agrave; hỗ trợ chuyển động.</p>\r\n<p>- Đế ngo&agrave;i bằng cao su mềm dẻo tạo độ b&aacute;m, lớp l&oacute;t mềm mại mang lại cảm gi&aacute;c thoải m&aacute;i cho đ&ocirc;i ch&acirc;n.</p>\r\n<p>- Form gi&agrave;y đi l&ecirc;n ch&acirc;n vừa vặn, c&aacute;c đường chỉ kh&acirc;u rất tinh tế v&agrave; chắc chắn đảm bảo h&agrave;i l&ograve;ng mọi kh&aacute;ch h&agrave;ng.</p>\r\n<ul>\r\n<li>M&agrave;u sắc đơn giản rất dễ phối đồ.<img src=\"/storage/photos/1/product/giay-the-thao-nam-nike-air-force-1-07-white-315122-111-mau-trang-size-42-5fc9ad41e3511-04122020103009.jpg\" alt=\"\" width=\"500\" height=\"500\" /></li>\r\n</ul>\r\n<p>&nbsp;</p>', '/storage/product/1/aZ9ldP40a79pM3eyO0vs.jpg', 'giay-the-thao-nam-nike-air-force-1-07-white-315122-111-mau-trang-size-42-5fc9ad4115b36-04122020103009.jpg', 3, 4, 1, 0, 1, '2021-01-20 01:05:44', '2021-01-20 01:05:44', 0.00, 0),
(16, 'Giày Thể Thao Puma Scuderia Ferrari Drift Cat', 'giay-the-thao-puma-scuderia-ferrari-drift-cat', 'Puma1A', '5', NULL, NULL, NULL, 'Giày Puma Scuderia Ferrari Drift Cat 7s Ultra LS thiết kế dành cho người hâm mộ môn đua xe thể thao đỉnh cao, với phong cách hoàn toàn mới. Sản phẩm kết hợp giữa Puma và Ferrari, những thương hiệu mà tất cả chúng ta đều biết và yêu thích.', '<p><a title=\"Gi&agrave;y Puma\" href=\"https://vuahanghieu.com/puma/giay\" data-keyword-link=\"470\">Gi&agrave;y Puma</a><strong> Scuderia Ferrari Drift Cat 7s Ultra LS</strong> thiết kế d&agrave;nh cho người h&acirc;m mộ m&ocirc;n đua xe thể thao đỉnh cao, với phong c&aacute;ch ho&agrave;n to&agrave;n mới. Sản phẩm kết hợp giữa Puma v&agrave; Ferrari, những thương hiệu m&agrave; tất cả ch&uacute;ng ta đều biết v&agrave; y&ecirc;u th&iacute;ch.</p>', '/storage/product/1/ReqYvJoUZVFQtZ9qnWqj.jpg', 'giay-the-thao-puma-scuderia-ferrari-drift-cat-7s-ultra-ls-den-size-40-5ff6859c0f409-07012021105300.jpg', 5, 4, 1, 0, 1, '2021-01-20 01:10:35', '2021-01-21 22:32:05', 0.00, 0),
(18, 'Áp polo thể thao nam', 'ap-polo-the-thao-nam', 'W77TP20251', '10', NULL, NULL, NULL, '\"Năng động và phóng khoáng\" là những gì mà sản phẩm áo polo thể thao của ONOFF mang đến cho người mặc.', '<p class=\"wrapper\">\"Năng động v&agrave; ph&oacute;ng kho&aacute;ng\" l&agrave; những g&igrave; m&agrave; sản phẩm &aacute;o polo thể thao của ONOFF mang đến cho người mặc. Sản phẩm được thiết kế ph&ugrave; hợp với những hoạt động thường ng&agrave;y v&agrave; hoạt động thể thao tạo sự thoải m&aacute;i tối đa.</p>\r\n<div class=\"subtitle\">Chất liệu</div>\r\n<p>95% Polyester, 5% spandex</p>', '/storage/product/1/pKvRSBegZJOAKfEly95d.jpg', 'W77TP20251-MA05.jpg', 10, 2, 1, 0, 1, '2021-01-22 05:33:54', '2021-02-02 04:13:45', 5.00, 1),
(19, 'Áo dài tay nam French Terry', 'ao-dai-tay-nam-french-terry', 'W77TW20283', '5', NULL, NULL, NULL, 'mo ta Áo dài tay nam French  dddddddddddđ', '<p>noi dung &Aacute;o d&agrave;i tay nam French Terry</p>', '/storage/product/1/ew052h55YdGetL2LdYcy.jpg', 'W77TW20283-MA06.jpg', 10, 2, 1, 0, 1, '2021-01-22 05:39:29', '2021-01-22 05:39:29', 0.00, 0),
(20, 'Quần short nam dri-balance', 'quan-short-nam-dri-balance', 'H17BS19017', '100', NULL, NULL, NULL, 'Công nghệ dệt vải 2 mặt : chất liệu cotton mặt ngoài và chất liệu tổng hợp mặt trong tạo khả năng thấm hút 1 chiều đặc biệt, luôn giữ khô thoáng ở mặt trong và thoát mồ hôi ở mặt ngoài.', '<p class=\"wrapper\">- C&ocirc;ng nghệ dệt vải 2 mặt : chất liệu cotton mặt ngo&agrave;i v&agrave; chất liệu tổng hợp mặt trong tạo khả năng thấm h&uacute;t 1 chiều đặc biệt, lu&ocirc;n giữ kh&ocirc; tho&aacute;ng ở mặt trong v&agrave; tho&aacute;t mồ h&ocirc;i ở mặt ngo&agrave;i. <br />- Sản phẩm xốp, nhẹ, đ&agrave;n hồi của sợi tổng hợp; mềm mịn, thấm h&uacute;t của cotton, gi&uacute;p định h&igrave;nh phom d&aacute;ng v&agrave; giữ cho cơ thể lu&ocirc;n kh&ocirc;, tho&aacute;ng m&aacute;t.</p>\r\n<div class=\"subtitle\">Chất liệu</div>\r\n<p>65% Cotton, 35% Polyester</p>', '/storage/product/1/fnchryHnmaWKjq2MMcM4.jpg', 'H17BS19017-SG03.jpg', 10, 2, 1, 0, 1, '2021-01-22 05:45:03', '2021-01-22 05:45:03', 0.00, 0),
(21, 'Áo len nam dệt phối màu', 'ao-len-nam-det-phoi-mau', 'masp1', '10', NULL, NULL, NULL, 'Áo len nam sợi cotton acrylic dệt phối màu\r\nDáng regular, cổ tròn, tay dài', '<div id=\"product-detail-tab-content-1\" class=\"product-detail-tab-content active  \">&Aacute;o len nam sợi cotton acrylic dệt phối m&agrave;u <br />D&aacute;ng regular, cổ tr&ograve;n, tay d&agrave;i</div>\r\n<p><a class=\"product-detail-tab-label\" href=\"https://canifa.com/catalog/product/view/id/221813/s/ao-len-nam-hoa-tiet-8TE20W021/category/99/#product-detail-tab-content-2\">Chất liệu</a></p>\r\n<div id=\"product-detail-tab-content-2\" class=\"product-detail-tab-content \">48% Cotton 48% Acrylic 4% Nylon</div>\r\n<p><a class=\"product-detail-tab-label\" href=\"https://canifa.com/catalog/product/view/id/221813/s/ao-len-nam-hoa-tiet-8TE20W021/category/99/#product-detail-tab-content-3\"> Hướng dẫn sử dụng </a></p>\r\n<div id=\"product-detail-tab-content-3\" class=\"product-detail-tab-content \">Giặt m&aacute;y ở chế độ nhẹ,nhiệt độ thường.<br />Kh&ocirc;ng sử dụng h&oacute;a chất tẩy c&oacute; chứa clo.<br />Phơi vắt ngang, trong b&oacute;ng m&aacute;t.<br />Kh&ocirc;ng sử dụng m&aacute;y sấy.<br />L&agrave; ở nhiệt độ thấp 110 độ c.<br />Giặt mặt tr&aacute;i sản phẩm<br />Giặt với sản phẩm c&ugrave;ng m&agrave;u.<br />L&agrave;m ẩm sản phẩm khi l&agrave;.</div>\r\n<div class=\"product-detail-tab-content \"><img src=\"/storage/photos/1/product/cuongg.png\" alt=\"\" width=\"1271\" height=\"648\" /></div>', '/storage/product/1/GCVB5AQIVMzPiLhn5mmc.jpg', '8te20w021-sb866-m-1.jpg', 10, 2, 1, 0, 1, '2021-01-22 20:19:21', '2021-02-02 04:14:58', 3.67, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(3, 13, 'test sua moi', 'H', '7907878', 56789, '2021-01-09 05:23:01', '2021-01-09 05:24:01'),
(4, 12, 'sku-iphone7', 'L', '54', 45, '2021-01-09 05:24:43', '2021-01-09 05:25:10'),
(7, 14, 'sku1-1414', 'L-1414', '100', 1414, '2021-01-10 04:12:43', '2021-01-29 01:16:39'),
(8, 16, 'sku_puma1', '40', '5', 20, '2021-01-20 01:18:21', '2021-01-29 01:15:30'),
(9, 16, 'sku_puma2', '80', '2', 20, '2021-01-20 01:18:59', '2021-01-29 01:15:25'),
(10, 16, 'sku_puma3', '90', '4', 20, '2021-01-20 01:19:24', '2021-01-29 01:15:27'),
(11, 15, 'sku_nike1', '34', '10', 67, '2021-01-20 01:20:11', '2021-01-29 01:16:02'),
(12, 18, 'sku1', 'M', '10', 20, '2021-01-22 05:35:12', '2021-01-29 01:14:35'),
(13, 18, 'sku2', 'L', '10', 22, '2021-01-22 05:35:33', '2021-01-22 05:35:33'),
(14, 19, 'sku1', 'M', '5', 4, '2021-01-22 05:40:50', '2021-01-29 01:13:57'),
(15, 19, 'sku2', 'M', '10', 7, '2021-01-22 05:41:16', '2021-01-29 01:14:07'),
(16, 20, 'sku1', 'M', '5', 12, '2021-01-22 05:46:24', '2021-01-29 01:11:36'),
(17, 20, 'sku2', 'L', '10', 5, '2021-01-22 05:46:50', '2021-01-29 01:11:40'),
(18, 20, 'sku3', 'XL', '10', 10, '2021-01-22 05:47:12', '2021-01-29 01:11:44'),
(19, 21, 'sku1', 'L', '10', 10, '2021-01-22 20:21:25', '2021-01-29 01:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `image_name`, `name`, `product_id`, `created_at`, `updated_at`) VALUES
(2, '/storage/product/1/L0GVkpfm1VlweFPr0Ifn.png', 'hiepsi.png', NULL, 3, '2021-01-04 21:06:57', '2021-01-04 21:06:57'),
(3, '/storage/product/1/crc4zjDn0Ntl1J07y75w.png', 'phung hung.png', NULL, 4, '2021-01-04 21:11:15', '2021-01-04 21:11:15'),
(4, '/storage/product/1/veow8tc7wDYFjfWvSPZv.png', 'hiepsi.png', NULL, 5, '2021-01-04 21:28:23', '2021-01-04 21:28:23'),
(6, '/storage/product/1/pPaVLsK8rLxnqijrlWP4.png', 'khea.png', NULL, 11, '2021-01-04 21:56:34', '2021-01-04 21:56:34'),
(22, '/storage/product/1/qdhsgCgEMmKSHsuZVUqZ.png', 'khe.png', 'qdhsgCgEMmKSHsuZVUqZ.png', 13, '2021-01-06 22:39:22', '2021-01-06 22:39:22'),
(23, '/storage/product/1/gTDHGztj6nQ8xkVIRK81.png', 'khea.png', 'gTDHGztj6nQ8xkVIRK81.png', 13, '2021-01-06 22:39:23', '2021-01-06 22:39:23'),
(28, '/storage/product/1/spz7gUnAPpXG5L3Rh9P7.jpg', 'giay-the-thao-nam-nike-air-force-1-07-white-315122-111-mau-trang-size-42-5fc9ad41e3511-04122020103009.jpg', 'spz7gUnAPpXG5L3Rh9P7.jpg', 15, '2021-01-20 01:06:26', '2021-01-20 01:06:26'),
(29, '/storage/product/1/cnJgWzoVgUgvphS524W1.jpg', 'giay-the-thao-nam-nike-air-force-1-07-white-315122-111-mau-trang-size-42-5fc9ad42bf12b-04122020103010.jpg', 'cnJgWzoVgUgvphS524W1.jpg', 15, '2021-01-20 01:06:27', '2021-01-20 01:06:27'),
(30, '/storage/product/1/hlx1BOZVIuQPOnJSitQ3.jpg', 'giay-the-thao-nam-nike-air-force-1-07-white-315122-111-mau-trang-size-42-5fc9ad4115b36-04122020103009.jpg', 'hlx1BOZVIuQPOnJSitQ3.jpg', 15, '2021-01-20 01:06:27', '2021-01-20 01:06:27'),
(31, '/storage/product/1/c7QDQiGi7u5i0y6hLZ6k.jpg', 'giay-the-thao-nam-nike-air-force-1-07-white-315122-111-mau-trang-size-42-5fc9ad4232f34-04122020103010.jpg', 'c7QDQiGi7u5i0y6hLZ6k.jpg', 15, '2021-01-20 01:06:27', '2021-01-20 01:06:27'),
(32, '/storage/product/1/fSh0X9QUSG1QLlZf1Hgi.jpg', 'giay-the-thao-nam-nike-air-force-1-07-white-315122-111-mau-trang-size-42-5fc9ad42797ac-04122020103010.jpg', 'fSh0X9QUSG1QLlZf1Hgi.jpg', 15, '2021-01-20 01:06:28', '2021-01-20 01:06:28'),
(33, '/storage/product/1/Bn3LzNI4885meFnyH5k9.jpg', 'giay-the-thao-puma-scuderia-ferrari-drift-cat-7s-ultra-ls-den-size-40-5ff6859c0f409-07012021105300.jpg', 'Bn3LzNI4885meFnyH5k9.jpg', 16, '2021-01-20 01:11:08', '2021-01-20 01:11:08'),
(34, '/storage/product/1/AzgiC1rkQkxRH6g2idhd.jpg', 'giay-the-thao-puma-scuderia-ferrari-drift-cat-7s-ultra-ls-den-size-40-5ff6859c3e0d8-07012021105300.jpg', 'AzgiC1rkQkxRH6g2idhd.jpg', 16, '2021-01-20 01:11:09', '2021-01-20 01:11:09'),
(35, '/storage/product/1/ogaWF9NlAJF3sX5e7v5E.jpg', 'giay-the-thao-puma-scuderia-ferrari-drift-cat-7s-ultra-ls-den-size-40-5ff6859c22ce1-07012021105300.jpg', 'ogaWF9NlAJF3sX5e7v5E.jpg', 16, '2021-01-20 01:11:09', '2021-01-20 01:11:09'),
(36, '/storage/product/1/oGBireOSkVe9lgFVmHJA.jpg', 'giay-the-thao-puma-scuderia-ferrari-drift-cat-7s-ultra-ls-den-size-40-5ff6859c346a8-07012021105300.jpg', 'oGBireOSkVe9lgFVmHJA.jpg', 16, '2021-01-20 01:11:10', '2021-01-20 01:11:10'),
(37, '/storage/product/1/3sWG3wWvw1cwlTw5dhgq.jpg', '1fc8f7d72e45d01b895419_57ffe8c4f1ba4cbcac90ed5d7f205f2b_master.jpg', '3sWG3wWvw1cwlTw5dhgq.jpg', 14, '2021-01-20 03:27:41', '2021-01-20 03:27:41'),
(38, '/storage/product/1/xtyECkDFAaRdjJxFXolB.jpg', '2ed3c1e31871e62fbf6020_74528a3c2e9e4cf982587a24e202ec6e_master.jpg', 'xtyECkDFAaRdjJxFXolB.jpg', 14, '2021-01-20 03:27:44', '2021-01-20 03:27:44'),
(39, '/storage/product/1/deKG8hdJZjnyfvLEX7pQ.jpg', '3fdd31ffe86d16334f7c17_bb2bf43d8ab64ca8b112d3827db805c0_master.jpg', 'deKG8hdJZjnyfvLEX7pQ.jpg', 14, '2021-01-20 03:27:47', '2021-01-20 03:27:47'),
(40, '/storage/product/1/ycYkQNWcukzmHEst3aW3.jpg', 'f981439a9a0864563d1913_f616ce6c7b8a4860b508eb173eb297f8_master.jpg', 'ycYkQNWcukzmHEst3aW3.jpg', 14, '2021-01-20 03:27:50', '2021-01-20 03:27:50'),
(41, '/storage/product/1/z2z1LTAnOX356csZe3VM.jpg', 'W77TP20251-MA05.jpg', 'z2z1LTAnOX356csZe3VM.jpg', 18, '2021-01-22 05:34:24', '2021-01-22 05:34:24'),
(42, '/storage/product/1/NGFCx2MvOOGh9ikx217S.jpg', 'W77TP20251-MK01.jpg', 'NGFCx2MvOOGh9ikx217S.jpg', 18, '2021-01-22 05:34:26', '2021-01-22 05:34:26'),
(43, '/storage/product/1/0490c3kNcwzWOHxAkWyU.jpg', 'W77TP20251-MR01.jpg', '0490c3kNcwzWOHxAkWyU.jpg', 18, '2021-01-22 05:34:28', '2021-01-22 05:34:28'),
(44, '/storage/product/1/nKKLlhBXy1yWo0pZiHJ2.jpg', 'W77TW20283-MA06.jpg', 'nKKLlhBXy1yWo0pZiHJ2.jpg', 19, '2021-01-22 05:39:50', '2021-01-22 05:39:50'),
(45, '/storage/product/1/IbDMPK2cwZTQC8UWOQFP.jpg', 'W77TW20283-SJ01.jpg', 'IbDMPK2cwZTQC8UWOQFP.jpg', 19, '2021-01-22 05:39:52', '2021-01-22 05:39:52'),
(46, '/storage/product/1/EdVi1lCk0zEZ961GyKYB.jpg', 'W77TW20283-SK01.jpg', 'EdVi1lCk0zEZ961GyKYB.jpg', 19, '2021-01-22 05:39:54', '2021-01-22 05:39:54'),
(47, '/storage/product/1/AZxpUPx2du2BL9FYzJgL.jpg', 'H17BS19017-SA05.jpg', 'AZxpUPx2du2BL9FYzJgL.jpg', 20, '2021-01-22 05:45:34', '2021-01-22 05:45:34'),
(48, '/storage/product/1/vXVM1aNLAwjjiFPvyOtP.jpg', 'H17BS19017-SA14.jpg', 'vXVM1aNLAwjjiFPvyOtP.jpg', 20, '2021-01-22 05:45:36', '2021-01-22 05:45:36'),
(49, '/storage/product/1/NIAuEwITIW09KGmML2n6.jpg', 'H17BS19017-SB01.jpg', 'NIAuEwITIW09KGmML2n6.jpg', 20, '2021-01-22 05:45:38', '2021-01-22 05:45:38'),
(50, '/storage/product/1/ePvESmo6W83dMGY2xDUQ.jpg', 'H17BS19017-SG03.jpg', 'ePvESmo6W83dMGY2xDUQ.jpg', 20, '2021-01-22 05:45:40', '2021-01-22 05:45:40'),
(51, '/storage/product/1/5dVRAiLXvyvhCXmfnnTX.jpg', 'H17BS19017-SK01.jpg', '5dVRAiLXvyvhCXmfnnTX.jpg', 20, '2021-01-22 05:45:40', '2021-01-22 05:45:40'),
(52, '/storage/product/1/tWyfwktUgbjXN6AtrGY3.jpg', '1fc8f7d72e45d01b895419_57ffe8c4f1ba4cbcac90ed5d7f205f2b_master.jpg', 'tWyfwktUgbjXN6AtrGY3.jpg', 21, '2021-01-22 20:20:15', '2021-01-22 20:20:15'),
(53, '/storage/product/1/CQ71F3W57J5bMjQU3UIb.jpg', '2ed3c1e31871e62fbf6020_74528a3c2e9e4cf982587a24e202ec6e_master.jpg', 'CQ71F3W57J5bMjQU3UIb.jpg', 21, '2021-01-22 20:20:18', '2021-01-22 20:20:18'),
(54, '/storage/product/1/FmZJBA2aTW7FIQv6It6w.jpg', '3fdd31ffe86d16334f7c17_bb2bf43d8ab64ca8b112d3827db805c0_master.jpg', 'FmZJBA2aTW7FIQv6It6w.jpg', 21, '2021-01-22 20:20:21', '2021-01-22 20:20:21'),
(55, '/storage/product/1/wKkKP5wLpGfCv9D169Zv.jpg', '8te20w021-sb866-m-2.jpg', 'wKkKP5wLpGfCv9D169Zv.jpg', 21, '2021-01-22 20:20:21', '2021-01-22 20:20:21'),
(56, '/storage/product/1/rzYdkO0bWYiuSyPFCq7G.jpg', '8te20w021-sn203-m-1.jpg', 'rzYdkO0bWYiuSyPFCq7G.jpg', 21, '2021-01-22 20:20:25', '2021-01-22 20:20:25'),
(57, '/storage/product/1/kh6IPmDJDgEF047FM6RO.jpg', '8te20w021-sn203-m-2.jpg', 'kh6IPmDJDgEF047FM6RO.jpg', 21, '2021-01-22 20:20:27', '2021-01-22 20:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 3, 0, '2021-01-04 21:06:57', '2021-01-04 21:06:57'),
(2, 3, 1, '2021-01-04 21:06:57', '2021-01-04 21:06:57'),
(3, 3, 2, '2021-01-04 21:06:57', '2021-01-04 21:06:57'),
(5, 4, 1, '2021-01-04 21:11:15', '2021-01-04 21:11:15'),
(6, 4, 3, '2021-01-04 21:11:15', '2021-01-04 21:11:15'),
(8, 5, 4, '2021-01-04 21:28:23', '2021-01-04 21:28:23'),
(9, 5, 5, '2021-01-04 21:28:23', '2021-01-04 21:28:23'),
(10, 11, 12, '2021-01-04 21:56:34', '2021-01-04 21:56:34'),
(11, 11, 13, '2021-01-04 21:56:34', '2021-01-04 21:56:34'),
(19, 12, 16, '2021-01-10 03:54:46', '2021-01-10 03:54:46'),
(24, 13, 21, '2021-01-19 22:44:24', '2021-01-19 22:44:24'),
(25, 14, 22, '2021-01-19 22:52:16', '2021-01-19 22:52:16'),
(26, 15, 20, '2021-01-20 01:05:45', '2021-01-20 01:05:45'),
(27, 15, 23, '2021-01-20 01:05:45', '2021-01-20 01:05:45'),
(29, 16, 23, '2021-01-20 01:10:36', '2021-01-20 01:10:36'),
(30, 16, 20, '2021-01-21 22:29:05', '2021-01-21 22:29:05'),
(31, 18, 24, '2021-01-22 05:33:54', '2021-01-22 05:33:54'),
(32, 19, 24, '2021-01-22 05:39:29', '2021-01-22 05:39:29'),
(33, 20, 24, '2021-01-22 05:45:03', '2021-01-22 05:45:03'),
(34, 21, 24, '2021-01-22 20:19:22', '2021-01-22 20:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(9, 21, 1, 5, 'boy tot', 0, '2021-02-02 04:12:57', '2021-02-02 04:12:57'),
(10, 18, 1, 5, 'boy danh gia', 0, '2021-02-02 04:13:45', '2021-02-02 04:13:45'),
(11, 21, 10, 4, 'chau tot', 0, '2021-02-02 04:14:37', '2021-02-02 04:14:37'),
(12, 21, 10, 2, 'chau danh gia tiep', 0, '2021-02-02 04:14:58', '2021-02-02 04:14:58'),
(13, 21, 10, 4, 'test', 0, '2021-02-02 04:24:56', '2021-02-02 04:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'quản lý hệ thống', NULL, 1, '2021-01-11 09:02:00', '2021-01-14 21:34:03'),
(3, 'owner category', 'Owner category', 'Quản lý category', 1, '2021-01-11 21:13:40', '2021-01-11 21:13:40'),
(4, 'owner menu', 'Owner menu', 'quan ly menu', 1, '2021-01-14 21:35:34', '2021-01-14 21:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(5, 9, 1, NULL, NULL),
(6, 1, 3, NULL, NULL),
(7, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Footer config', '<p class=\"pull-left\">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p> <p class=\"pull-right\">Designed by <span><a target=\"_blank\" href=\"http://www.themeum.com\">Themeumetst</a></span></p>\r\nsua', 'Textarea', 0, '2021-01-02 22:06:31', '2021-01-18 20:48:55'),
(4, 'Phone contact', '0906077097', 'Text', 1, '2021-01-02 23:29:17', '2021-01-02 23:29:17'),
(5, 'Email contact', 'dokhaclam@gmail.com', 'Text', 0, '2021-01-02 23:29:49', '2021-01-02 23:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `content`, `image_path`, `image_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Slider 1', 'mô tả slider 1', 'noi dung slider 1', '/storage/slider//6E3y7l21X24QvjZOcMHA.png', 'cuongg.png', 1, '2021-01-03 05:18:53', '2021-01-03 05:18:53'),
(2, 'Slider 2 sua', 'mô tả slider 2  sua', 'noi dung slider 2 sua', '/storage/slider//TScSoP8uz9FEGNEr79BE.png', 'pikachu.png', 0, '2021-01-03 05:23:21', '2021-01-03 06:23:00'),
(3, 'Slider editor sua', 'mo ta slider editro sua', '<p><img src=\"/storage/photos/1/slider_content_img/pikachu.png\" alt=\"\" width=\"1271\" height=\"648\" /></p>\r\n<p>noi dung slider editor sua</p>', '/storage/slider/1/beZqF7toOtmPfMyOLHNA.png', 'ynbosster.png', 0, '2021-01-03 22:31:29', '2021-01-03 23:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'do', '2021-01-04 21:06:57', '2021-01-04 21:06:57'),
(2, 'khac', '2021-01-04 21:06:57', '2021-01-04 21:06:57'),
(3, 'cuong', '2021-01-04 21:11:15', '2021-01-04 21:11:15'),
(4, 'lam', '2021-01-04 21:28:23', '2021-01-04 21:28:23'),
(5, 'thy', '2021-01-04 21:28:23', '2021-01-04 21:28:23'),
(12, 'chau', '2021-01-04 21:56:34', '2021-01-04 21:56:34'),
(13, 'dat', '2021-01-04 21:56:34', '2021-01-04 21:56:34'),
(14, 'dienthoai', '2021-01-05 20:48:20', '2021-01-05 20:48:20'),
(15, 'chaulam', '2021-01-06 20:11:16', '2021-01-06 20:11:16'),
(16, 'myphamsua', '2021-01-10 03:54:46', '2021-01-10 03:54:46'),
(17, 'sport', '2021-01-10 04:10:09', '2021-01-10 04:10:09'),
(18, 'nha', '2021-01-10 04:10:09', '2021-01-10 04:10:09'),
(19, 'addidas', '2021-01-10 04:23:21', '2021-01-10 04:23:21'),
(20, 'nike', '2021-01-10 04:23:21', '2021-01-10 04:23:21'),
(21, 'testbrand', '2021-01-19 22:44:24', '2021-01-19 22:44:24'),
(22, 'puma', '2021-01-19 22:52:16', '2021-01-19 22:52:16'),
(23, 'giày dép', '2021-01-20 01:05:44', '2021-01-20 01:05:44'),
(24, 'thoi trang nam', '2021-01-22 05:33:54', '2021-01-22 05:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `status`) VALUES
(1, 'Boy', 'boy@gmail.com', NULL, '$2y$10$6cvjzgCllYN/Iz0.CMxT5eRBxbHFAfHHAWrfPLKoJbsDPbf4dTuoS', 'MewUduKvpStVU1Sab8ij6rvG8zX6UCogBRJfgT0PL5xCO83toV8kOIqHKu4K', NULL, '2021-01-17 02:20:03', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'thy sưa', 'thy@gmail.com.sưa', NULL, '$2y$10$9vf8G2ZbWMmonowVDdJcTOoMW4b.0USJyBqV1LoTobLylX8DaBMO2', NULL, '2021-01-13 21:37:36', '2021-01-14 05:41:36', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'test', 'test@gmail.com', NULL, '$2y$10$3B6Fv3NNUun9Em90qCVnNehpykGt54tKk/ZOZIp7RRdNSrvM/LUfO', NULL, '2021-01-14 05:42:35', '2021-01-14 05:42:35', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'test2', 'test2@gmail.com', NULL, '$2y$10$YgkFSgXyfGIjQJ6oWHqbU.udqcEi24MdSe25NVTqs5damrHIQ/BmG', NULL, '2021-01-14 05:43:45', '2021-01-14 05:43:45', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'test4', 'tes4@gam.com', NULL, '$2y$10$UgQ0dqSBlvShYYTwEC.tIe1kdw6tqEQ0Fi.DuuXtriALnMk7NnpDy', NULL, '2021-01-14 05:45:13', '2021-01-14 05:45:13', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Hazeline s', 'boddy@gmail.com', NULL, '$2y$10$7bFT4N5Nut1o.jJCbVNI6emqPlgpWfHOZNl1RKTY6zuB5t1wqqhMu', NULL, '2021-01-14 05:47:25', '2021-01-14 05:49:03', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, 'chau', 'chau@gmail.com', NULL, '$2y$10$Z8wbb1NREpz1ICgPv1faUuM1klG7FQPsmGh40VbulMTMFO.J75iHm', NULL, '2021-01-24 03:33:24', '2021-01-24 09:14:55', '346/13/5 Mã Lò P.Bình Trị Đông A Q.Bình Tân', 'HCM', '11', 'Vietnam', '123', '0906077097', 0),
(11, 'Boy1', 'boy1@gmail.com', NULL, '$2y$10$82rLtkI8EyjEaGmctgeoy.cnDKO9PIcOD6zCqdCAsC5FjGxOLAKX6', NULL, '2021-01-28 00:07:15', '2021-01-28 00:07:15', '346/13/5', 'HCM', '11', 'Vietnam', '123', '0908099', 0),
(12, 'dat', 'dat@gmail.com', NULL, '$2y$10$dWZBS4nCwSPiFqEEEy4SgeImbKl6hdKMBu81sY2H5lDNeGV2pcksO', NULL, '2021-01-29 01:07:23', '2021-01-29 01:07:23', '249 lllq', 'hcm', '11', 'Vietnam', '123', '09098', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
