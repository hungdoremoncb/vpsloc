-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2023 at 03:14 PM
-- Server version: 5.7.35-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudvps_df`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `stk` text COLLATE utf8_vietnamese_ci NOT NULL,
  `name` text COLLATE utf8_vietnamese_ci NOT NULL,
  `bank_name` text COLLATE utf8_vietnamese_ci NOT NULL,
  `chi_nhanh` text COLLATE utf8_vietnamese_ci NOT NULL,
  `logo` text COLLATE utf8_vietnamese_ci NOT NULL,
  `ghichu` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `stk`, `name`, `bank_name`, `chi_nhanh`, `logo`, `ghichu`) VALUES
(1, '0904657059', 'MoMo', 'Cao Ngọc Quang Linh', '', 'https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png', 'Chuyển đúng nội dung hệ thông tự cộng tiền sau 30s - 1 phút'),
(2, '0904657059', 'MB Bank', 'Cao Ngoc Quang Linh', '', 'https://static.wixstatic.com/media/9d8ed5_b92082f54b6143f6bacafff11d0c1d98~mv2.png/v1/fill/w_597,h_597,al_c,usm_0.66_1.00_0.01/9d8ed5_b92082f54b6143f6bacafff11d0c1d98~mv2.png', 'Chuyển đúng nội dung hệ thông tự cộng tiền sau 30s - 1 phút');

-- --------------------------------------------------------

--
-- Table structure for table `bank_auto`
--

CREATE TABLE `bank_auto` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_vietnamese_ci NOT NULL,
  `tranId` text COLLATE utf8_vietnamese_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `comment` text COLLATE utf8_vietnamese_ci NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `username` varchar(32) COLLATE utf8_vietnamese_ci NOT NULL,
  `loaithe` varchar(32) COLLATE utf8_vietnamese_ci NOT NULL,
  `menhgia` int(11) NOT NULL,
  `thucnhan` int(11) DEFAULT '0',
  `seri` mediumtext COLLATE utf8_vietnamese_ci NOT NULL,
  `pin` mediumtext COLLATE utf8_vietnamese_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `status` varchar(32) COLLATE utf8_vietnamese_ci NOT NULL,
  `note` mediumtext COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `detail` longtext,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `detail`, `status`) VALUES
(1, 'Vps Trial', 'vps-trial', '{\"data\":[{\"country_id\":\"2\",\"country_name\":\"Singapore\"},{\"country_id\":\"3\",\"country_name\":\"\\u1ea4n \\u0110\\u1ed9\"},{\"country_id\":\"4\",\"country_name\":\"Nh\\u1eadt B\\u1ea3n\"},{\"country_id\":\"5\",\"country_name\":\"M\\u1ef9 ( US )\"},{\"country_id\":\"6\",\"country_name\":\"Australia\"},{\"country_id\":\"8\",\"country_name\":\"\\u0110\\u1ee9c\"},{\"country_id\":\"9\",\"country_name\":\"Canada\"},{\"country_id\":\"11\",\"country_name\":\"Anh ( UK )\"}]}', 1),
(2, 'Cloud Vps VN', 'cloud-vps-vn', '{\"data\":[{\"country_id\":\"1\",\"country_name\":\"Vi\\u1ec7t Nam\"}]}', 1),
(3, 'VPS USA', 'vps-usa', '{\"data\":[{\"country_id\":\"5\",\"country_name\":\"M\\u1ef9 ( US )\"}]}', 1),
(4, 'NAT VPS', 'nat-vps', '{\"data\":[{\"country_id\":\"1\",\"country_name\":\"Vi\\u1ec7t Nam\"}]}', 1),
(9, 'VPS UK', 'vps-uk', '{\"data\":[]}', 0),
(10, 'Proxy', 'proxy', NULL, 1),
(11, 'VPS Trial 1 Năm', 'vps-trial-1-nam', '{\"data\":[{\"country_id\":\"2\",\"country_name\":\"Singapore\"},{\"country_id\":\"10\",\"country_name\":\"Hong Kong\"}]}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_vps`
--

CREATE TABLE `category_vps` (
  `id` int(11) NOT NULL,
  `nguoiban` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'jinvps',
  `category` int(11) NOT NULL DEFAULT '0',
  `namevps` text COLLATE utf8_vietnamese_ci NOT NULL,
  `img` text COLLATE utf8_vietnamese_ci NOT NULL,
  `cpu` text COLLATE utf8_vietnamese_ci NOT NULL,
  `ram` text COLLATE utf8_vietnamese_ci NOT NULL,
  `vitri` text COLLATE utf8_vietnamese_ci NOT NULL,
  `gia` text COLLATE utf8_vietnamese_ci NOT NULL,
  `bandwidth` text COLLATE utf8_vietnamese_ci NOT NULL,
  `display` text COLLATE utf8_vietnamese_ci NOT NULL,
  `daban` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category_vps`
--

INSERT INTO `category_vps` (`id`, `nguoiban`, `category`, `namevps`, `img`, `cpu`, `ram`, `vitri`, `gia`, `bandwidth`, `display`, `daban`, `view`) VALUES
(1, 'jinvps', 1, 'VPS Trial 1-1-20', '/assets/storage/images/upload.png', '1', '1', 'Full Location', '40000', '100 GB', 'SHOW', 315, 0),
(2, 'jinvps', 1, 'VPS Trial 1-2-20', '/assets/storage/images/upload.png', '1', '2', 'Full Location', '55000', '100 GB', 'SHOW', 93, 0),
(3, 'jinvps', 1, 'VPS Trial 2-4-80', '/assets/storage/images/upload.png', '2', '4', 'Full Location', '80000', '500 GB', 'SHOW', 168, 0),
(4, 'jinvps', 1, 'VPS Trial 2-8-126 ( Ngừng Bán )', '/assets/storage/images/upload.png', '2', '8', 'Full Location', '120000', '500 GB', 'SHOW', 12, 0),
(5, 'jinvps', 1, 'VPS Trial 4-8-126', '/assets/storage/images/upload.png', '4', '8', 'Full Location', '180000', '500 GB', 'SHOW', 35, 0),
(6, 'jinvps', 1, 'VPS Trial 4-16-126 ( Ngừng Bán )', '/assets/storage/images/upload.png', '4', '16', 'Full Location', '250000', '500 GB', 'SHOW', 7, 0),
(13, 'jinvps', 2, 'VPS VN 1-1-20', '/assets/storage/images/upload.png', '1', '1', 'Việt Nam', '80000', '100 Mb / 10 Mb', 'SHOW', 50, 0),
(14, 'jinvps', 2, 'VPS VN 1-2-20', '/assets/storage/images/upload.png', '1', '2', 'Việt Nam', '120000', '100 Mb / 10 Mb', 'SHOW', 15, 0),
(15, 'jinvps', 2, 'VPS VN 2-2-20', '/assets/storage/images/upload.png', '2', '2', 'Việt Nam', '170000', '100 Mb / 10 Mb', 'SHOW', 3, 0),
(16, 'jinvps', 2, 'VPS VN 2-4-20', '/assets/storage/images/upload.png', '2', '4', 'Việt Nam', '220000', '100 Mb / 10 Mb', 'SHOW', 1, 0),
(17, 'jinvps', 2, 'VPS VN 4-8-60', '/assets/storage/images/upload.png', '4', '8', 'Việt Nam', '450000', '100 Mb / 10 Mb', 'SHOW', 0, 0),
(18, 'jinvps', 2, 'VPS VN 8-8-60', '/assets/storage/images/upload.png', '8', '8', 'Việt Nam', '600000', '100 Mb / 10 Mb', 'SHOW', 1, 0),
(19, 'jinvps', 2, 'VPS VN 6-16-60', '/assets/storage/images/upload.png', '6', '16', 'Việt Nam', '670000', '100 Mb / 10 Mb', 'SHOW', 0, 0),
(20, 'jinvps', 2, 'VPS VN 8-16-60', '/assets/storage/images/upload.png', '8', '16', 'Việt Nam', '750000', '100 Mb / 10 Mb', 'SHOW', 1, 0),
(21, 'jinvps', 2, 'VPS Đặc Biệt 2-4-20', '/assets/storage/images/upload.png', '2', '4', 'Việt Nam', '180000', '100 Mb / 10 Mb', 'SHOW', 14, 0),
(22, 'jinvps', 2, 'VPS Đặc Biệt 4-4-20', '/assets/storage/images/upload.png', '4', '4', 'Việt Nam', '240000', '100 Mb / 10 Mb', 'SHOW', 4, 0),
(23, 'jinvps', 2, 'VPS Đặc Biệt 4-8-20', '/assets/storage/images/upload.png', '4', '8', 'Việt Nam', '300000', '100 Mb / 10 Mb', 'SHOW', 2, 0),
(24, 'jinvps', 3, 'VPS US 1-1-20', '/assets/storage/images/upload.png', '1', '1', 'USA', '100000', '100 Mb/10 Mb', 'SHOW', 3, 0),
(25, 'jinvps', 3, 'VPS US 2-2-20', '/assets/storage/images/upload.png', '2', '2', 'USA', '180000', '100 Mb/10 Mb', 'SHOW', 1, 0),
(26, 'jinvps', 3, 'VPS US 4-4-50', '/assets/storage/images/upload.png', '4', '4', 'USA', '280000', '100 Mb/10 Mb', 'SHOW', 1, 0),
(27, 'jinvps', 3, 'VPS 4-8-100', '/assets/storage/images/upload.png', '4', '8', 'USA', '500000', '100 Mb/10 Mb', 'SHOW', 1, 0),
(28, 'jinvps', 3, 'VPS US 8-16-100', '/assets/storage/images/upload.png', '8', '16', 'USA', '950000', '100 Mb/10 Mb', 'SHOW', 0, 0),
(43, 'jinvps', 4, 'NAT VPS 1-1-20', '', '1', '1', 'Việt Nam', '60000', '100 Mb/10 Mb', 'SHOW', 6, 0),
(44, 'jinvps', 4, 'NAT VPS 1-2-20', '', '1', '2', 'Việt Nam', '100000', '100 Mb/10 Mb', 'SHOW', 1, 0),
(45, 'jinvps', 4, 'NAT VPS 2-2-20', '', '2', '2', 'Việt Nam', '120000', '100 Mb/10 Mb', 'SHOW', 4, 0),
(46, 'jinvps', 4, 'NAT VPS 2-4-20', '', '2', '4', 'Việt Nam', '160000', '100 Mb/10 Mb', 'SHOW', 0, 0),
(47, 'jinvps', 4, 'NAT VPS 4-4-20', '', '4', '4', 'Việt Nam', '200000', '100 Mb/10 Mb', 'SHOW', 1, 0),
(51, 'jinvps', 1, 'VPS Trial 6-16-320', '', '6', '16', 'Full Location', '270000', '500 GB', 'SHOW', 0, 0),
(52, 'jinvps', 1, 'VPS Trial 8-16-126', '', '8', '16', 'Full Location', '350000', '500 GB', 'SHOW', 8, 0),
(53, 'jinvps', 1, 'VPS Trial 8-32-126', '', '8', '32', 'Full Location', '400000', '500 GB', 'SHOW', 2, 0),
(54, 'jinvps', 1, 'VPS Trial 16-32-126', '', '16', '32', 'Full Location', '650000', '1 TB', 'SHOW', 2, 0),
(55, 'jinvps', 1, 'VPS Trial 16-64-126', '', '16', '64', 'Full Location', '800000', '1 TB', 'SHOW', 1, 0),
(56, 'jinvps', 1, 'VPS Trial 32-64-126', '', '32', '64', 'Full Location', '1200000', '1 TB', 'SHOW', 0, 0),
(57, 'jinvps', 1, 'VPS Trial 32-128-126', '', '32', '128', 'Full Location', '1300000', '1 TB', 'SHOW', 0, 0),
(58, 'jinvps', 1, 'VPS Trial 64-128-126', '', '64', '128', 'Full Location', '1600000', '1 TB', 'SHOW', 0, 0),
(59, 'jinvps', 1, 'VPS Trial 64-256-126', '', '64', '256', 'Full Location', '1800000', '1 TB', 'SHOW', 0, 0),
(60, 'jinvps', 9, 'VPS UK 1-1-20', '', '1', '1', 'United Kingdom', '100000', '100 Mb / 10 Mb', 'SHOW', 0, 0),
(61, 'jinvps', 9, 'VPS UK 2-2-20', '', '2', '2', 'United Kingdom', '180000', '100 Mb / 10 Mb', 'SHOW', 0, 0),
(62, 'jinvps', 9, 'VPS UK 4-4-50', '', '4', '4', 'United Kingdom', '280000', '100 Mb / 10 Mb', 'SHOW', 0, 0),
(63, 'jinvps', 9, 'VPS UK 4-8-100', '', '4', '8', 'United Kingdom', '500000', '100 Mb / 10 Mb', 'SHOW', 0, 0),
(65, 'jinvps', 10, 'Proxy SockS5 US', '', '0', '0', 'California/Texas/New York', '50000', 'Unlimited', 'SHOW', 0, 0),
(66, 'jinvps', 10, 'Proxy HTTP VN', '', '0', '0', 'Việt Nam', '50000', 'Unlimited', 'SHOW', 1, 0),
(67, 'jinvps', 11, 'VPS Trial 1-1-30', '', '1', '1', 'Singapore', '240000', '100 GB', 'SHOW', 0, 0),
(68, 'jinvps', 11, 'VPS Trial 2-1-30', '', '2', '1', 'Hong Kong', '300000', '100 GB', 'SHOW', 0, 0),
(69, 'jinvps', 10, 'Proxy SockS5 VN', '', '0', '0', 'Việt Nam', '50000', 'Unlimited', 'SHOW', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `status`) VALUES
(1, 'Việt Nam', 1),
(2, 'Singapore', 1),
(3, 'Ấn Độ', 1),
(4, 'Nhật Bản', 1),
(5, 'Mỹ ( US )', 1),
(6, 'Australia', 1),
(7, 'Pháp', 1),
(8, 'Đức', 1),
(9, 'Canada', 1),
(10, 'Hong Kong', 1),
(11, 'Anh ( UK )', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daban`
--

CREATE TABLE `daban` (
  `id` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `loai_id` int(11) NOT NULL,
  `doanhthu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daban_vps`
--

CREATE TABLE `daban_vps` (
  `id` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `loai_id` int(11) NOT NULL,
  `doanhthu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã giảm giá',
  `discount` int(11) NOT NULL COMMENT 'Số tiền',
  `payment_limit` int(11) NOT NULL DEFAULT '0',
  `limit_number` int(11) NOT NULL COMMENT 'giới hạn lượt mua',
  `number_used` int(11) NOT NULL COMMENT 'Số lượng đã nhập',
  `expiration_date` date NOT NULL COMMENT 'Ngày hết hạn',
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `code`, `discount`, `payment_limit`, `limit_number`, `number_used`, `expiration_date`, `created`) VALUES
(33, 'AZ15', 15, 40000, 100, 1, '2023-04-25', '2023-04-21'),
(34, 'AZ20', 20, 220000, 100, 3, '2023-04-25', '2023-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `doanhthu`
--

CREATE TABLE `doanhthu` (
  `id` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `doanhthu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dongtien`
--

CREATE TABLE `dongtien` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sotientruoc` int(11) NOT NULL,
  `sotienthaydoi` int(11) NOT NULL,
  `sotiensau` int(11) NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noidung` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `dongtien`
--

INSERT INTO `dongtien` (`id`, `username`, `sotientruoc`, `sotienthaydoi`, `sotiensau`, `thoigian`, `noidung`) VALUES
(725, '99b1quy', 33000, 11000, 44000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22228047266636 - MB NAPTIEN160. TU: NGO NGOC QUY - 10000)'),
(726, 'minghieu1', 594000, 198000, 792000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22223292257990 - MB NAPTIEN146. TU: BUI MINH HIEU - 180000)'),
(727, 'thande1', 264000, 88000, 352000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22222140456506 - CUSTOMER MB 0904657059 NAPTIEN145 Trace 0220 39 - 80000)'),
(728, '01215266238', 1155000, 385000, 1540000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22222956206663 - MB NAPTIEN127. TU: NGUYEN QUY LINH CONG - 350000)'),
(729, 'khoianhgauvit', 132000, 44000, 176000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22222675792508 - CUSTOMER NAPTIEN137 - 40000)'),
(730, 'btdiep2002', 181500, 60500, 242000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22216426818702 - MB NAPTIEN117. TU: BUI TUAN DIEP - 55000)'),
(731, '123chumnho5', 264000, 88000, 352000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22216825201755 - NAPTIEN42 - 80000)'),
(732, 'linhhaak', 396000, 132000, 528000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22215326256664 - MB NAPTIEN111. TU: HA NHAT LINH - 120000)'),
(733, 'newmorningvn', 660000, 220000, 880000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22215703760172 - CUSTOMER MBVCB 2294636969 024420 NAPTIEN110  CT tu 0711000264631 NGUYEN NGOC PHU ONG toi 0904657059 CAO NGOC QUANG L INH  MB  Quan Doi Trace 024420 - 200000)'),
(734, 'Aocaolon2', 165000, 14300, 179300, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22214900298227 - MB NAPTIEN102. TU: TONG THAI BAO - 13000)'),
(735, 'Aocaolon2', 179300, 40700, 220000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22214110756708 - MB NAPTIEN102. TU: TONG THAI BAO - 37000)'),
(736, 'dctyasuo', 1306800, 390500, 1697300, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22213155283270 - MB NAPTIEN89. TU: DINH CHI THIEN - 355000)'),
(737, 'dctyasuo', 1697300, 45100, 1742400, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22213712044073 - MB NAPTIEN89. TU: DINH CHI THIEN - 41000)'),
(738, '0365262308', 132000, 44000, 176000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22213413290109 - MB NAPTIEN87. TU: TRAN NGOC TRUNG - 40000)'),
(739, '0345553325', 2640000, 880000, 3520000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22211272053691 - CUSTOMER MBVCB 2279964763 009669 NAPTIEN84 C T tu 1022496831 TRAN DANG LONG toi  0904657059 CAO NGOC QUANG LINH  MB   Quan Doi Trace 009669 - 800000)'),
(740, 'tantai0407', 181500, 60500, 242000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22211646076300 - MB NAPTIEN85. TU: NGUYEN TAN TAI - 55000)'),
(741, 'khai0201', 264000, 88000, 352000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22211852883034 - CUSTOMER NAPTIEN81 FT22211283105825 Trace 58 4082 - 80000)'),
(742, '0395999963', 264000, 88000, 352000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22204004917550 - MB NAPTIEN56. TU: DAO QUANG HUNG - 80000)'),
(743, 'tidepzai', 264000, 88000, 352000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22203006340714 - MB NAPTIEN54. TU: LE NHAT LINH - 80000)'),
(744, 'biinhdubai', 132000, 44000, 176000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22203047089002 - MB NAPTIEN48. TU: TRAN DUY BINH - 40000)'),
(745, 'vipvcl01', 132000, 44000, 176000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22203952418548 - CUSTOMER NAPTIEN46 Trace 977303 - 40000)'),
(746, 'nguyenanhtuan', 198000, 66000, 264000, '2022-08-16 13:32:34', 'Nạp tiền tự động qua Mbbank (#FT22201667993788 - MB NAPTIEN37. TU: NGUYEN ANH TUAN - 60000)'),
(747, 'Duy12hd', 0, 187000, 187000, '2022-08-16 15:11:15', 'Admin jinvps cộng tiền (Reset data)'),
(748, 'duyminh123', 0, 10000, 10000, '2022-08-16 15:11:42', 'Admin jinvps cộng tiền (Reset data)'),
(749, 'luvanthanh', 0, 55000, 55000, '2022-08-16 15:12:15', 'Admin jinvps cộng tiền (Reset data)'),
(750, 'khoihuyen98', 0, 55000, 55000, '2022-08-16 15:36:01', 'Nạp tiền tự động qua Ví Momo (#27684785789 - NAPTIEN161 - 50000)'),
(751, 'khoihuyen98', 55000, 55000, 110000, '2022-08-16 15:38:03', 'Nạp tiền tự động qua Mbbank (#FT22228494540203 - MB NAPTIEN161. TU: PHAM VAN KHOI - 50000)'),
(752, 'khoihuyen98', 110000, 40000, 70000, '2022-08-16 15:39:31', 'Mua VPS (#VPS Nước Ngoài)'),
(753, 'khoihuyen98', 70000, 40000, 30000, '2022-08-16 15:45:15', 'Mua VPS (#VPS Nước Ngoài)'),
(754, 'Quocthai2000', 0, 44000, 44000, '2022-08-16 17:13:31', 'Nạp tiền tự động qua Ví Thesieure (#T11497369 - NAPTIEN123 - 40000)'),
(755, 'Duy12hd', 187000, 99000, 286000, '2022-08-16 17:13:31', 'Nạp tiền tự động qua Ví Thesieure (#T11428710 - NAPTIEN69 - 90000)'),
(756, 'vietdznhat123', 0, 55000, 55000, '2022-08-16 17:13:31', 'Nạp tiền tự động qua Ví Thesieure (#T11428397 - NAPTIEN109 - 50000)'),
(757, 'Duy12hd', 286000, 88000, 374000, '2022-08-16 17:13:31', 'Nạp tiền tự động qua Ví Thesieure (#T11428339 - NAPTIEN69 - 80000)'),
(758, 'Duy12hd', 374000, 187000, 187000, '2022-08-16 21:20:03', 'Admin jinvps trừ tiền (Lỗi tsr)'),
(759, 'Quocthai2000', 44000, 40000, 4000, '2022-08-16 21:20:56', 'Admin jinvps trừ tiền (Lỗi tsr)'),
(760, 'vietdznhat123', 55000, 55000, 0, '2022-08-16 21:21:31', 'Admin jinvps trừ tiền (Lỗi tsr)'),
(761, 'linhtest', 0, 40000, 40000, '2022-08-16 22:00:46', 'Admin jinvps cộng tiền (test)'),
(762, 'linhtest', 40000, 40000, 0, '2022-08-16 22:10:15', 'Mua VPS (#VPS Nước Ngoài)'),
(763, 'admin', 90000, 90000, 0, '2022-08-17 05:03:53', 'Mua VPS (#VPS Việt Nam - C1)'),
(764, '01215266238', 0, 40700, 40700, '2022-08-17 13:49:04', 'Nạp tiền tự động qua Ví Momo (#27723361335 - NAPTIEN127 - 37000)'),
(765, '01215266238', 40700, 40000, 700, '2022-08-17 13:49:48', 'Mua VPS (#VPS Nước Ngoài)'),
(766, 'nhoklovemy1207', 0, 55000, 55000, '2022-08-17 22:42:01', 'Nạp tiền tự động qua Ví Momo (#27744342762 - NAPTIEN168 - 50000)'),
(767, 'nhoklovemy1207', 55000, 40000, 15000, '2022-08-17 22:43:37', 'Mua VPS (#VPS Nước Ngoài)'),
(768, 'duyminh123', 10000, 88000, 98000, '2022-08-17 23:40:01', 'Nạp tiền tự động qua Ví Momo (#27745188150 - NAPTIEN65 - 80000)'),
(769, 'duyminh123', 98000, 90000, 8000, '2022-08-17 23:40:37', 'Mua VPS (#VPS Việt Nam - C1)'),
(770, 'luvanthanh', 55000, 55000, 0, '2022-08-18 00:25:43', 'Mua VPS (#VPS Nước Ngoài)'),
(771, 'thienando', 0, 33000, 33000, '2022-08-18 07:57:01', 'Nạp tiền tự động qua Ví Momo (#27752081215 - NAPTIEN23 - 30000)'),
(772, 'thienando', 33000, 7700, 40700, '2022-08-18 07:59:01', 'Nạp tiền tự động qua Ví Momo (#27751933916 - NAPTIEN23 - 7000)'),
(773, 'thienando', 40700, 40000, 700, '2022-08-18 07:59:14', 'Mua VPS (#VPS Nước Ngoài)'),
(774, '01215266238', 700, 39600, 40300, '2022-08-18 20:30:01', 'Nạp tiền tự động qua Ví Momo (#27781194853 - NAPTIEN127 - 36000)'),
(775, '01215266238', 40300, 40000, 300, '2022-08-18 20:30:18', 'Mua VPS (#VPS Nước Ngoài)'),
(776, 'Xakutara', 0, 55000, 55000, '2022-08-19 08:24:08', 'Nạp tiền tự động qua Mbbank (#FT22231794833609 - CUSTOMER NAPTIEN173 FT22231947010506 Trace 8 35472 - 50000)'),
(777, 'Xakutara', 55000, 55000, 0, '2022-08-19 08:26:02', 'Mua VPS (#VPS Nước Ngoài)'),
(778, 'trongphi1905', 0, 99000, 99000, '2022-08-19 09:41:02', 'Nạp tiền tự động qua Mbbank (#FT22231807405837 - MB NAPTIEN171. TU: NGUYEN PHI TRONG - 90000)'),
(779, 'trongphi1905', 99000, 90000, 9000, '2022-08-19 09:41:49', 'Mua VPS (#VPS Việt Nam - C1)'),
(780, 'binhhh6105', 0, 88000, 88000, '2022-08-19 09:55:02', 'Nạp tiền tự động qua Mbbank (#FT22231828689602 - MB NAPTIEN174. TU: TRAN DUY BINH - 80000)'),
(781, 'binhhh6105', 88000, 40000, 48000, '2022-08-19 09:56:32', 'Mua VPS (#VPS Nước Ngoài)'),
(782, 'binhhh6105', 48000, 40000, 8000, '2022-08-19 09:56:33', 'Mua VPS (#VPS Nước Ngoài)'),
(783, 'congtonn22705', 0, 60500, 60500, '2022-08-19 11:02:03', 'Nạp tiền tự động qua Ví Momo (#27800420098 - NAPTIEN175 - 55000)'),
(784, 'congtonn22705', 60500, 55000, 5500, '2022-08-19 11:03:59', 'Mua VPS (#VPS Nước Ngoài)'),
(785, 'blacklaoki29', 0, 8370, 8370, '2022-08-19 11:32:06', 'Nạp tiền tự động qua card seri (10008852818758)'),
(786, 'blacklaoki29', 8370, 8370, 16740, '2022-08-19 11:35:21', 'Nạp tiền tự động qua card seri (10008852818757)'),
(787, 'blacklaoki29', 16740, 8370, 25110, '2022-08-19 11:36:04', 'Nạp tiền tự động qua card seri (10008852818753)'),
(788, 'blacklaoki29', 25110, 17600, 42710, '2022-08-19 12:12:03', 'Nạp tiền tự động qua Ví Thesieure (#T11725699 - NAPTIEN176 - 16000)'),
(789, 'blacklaoki29', 42710, 40000, 2710, '2022-08-19 12:12:20', 'Mua VPS (#VPS Nước Ngoài)'),
(790, '0393059215', 0, 40700, 40700, '2022-08-19 22:42:37', 'Nạp tiền tự động qua Mbbank (#FT22232202536730 - MB NAPTIEN178. TU: TRAN DUY BINH - 37000)'),
(791, '0393059215', 40700, 40000, 700, '2022-08-19 22:43:27', 'Mua VPS (#VPS Nước Ngoài)'),
(792, '0344911948', 0, 44000, 44000, '2022-08-20 09:06:02', 'Nạp tiền tự động qua Ví Momo (#27835728680 - NAPTIEN181 - 40000)'),
(793, 'tanpquo123', 0, 55000, 55000, '2022-08-20 13:53:02', 'Nạp tiền tự động qua Mbbank (#FT22232243050859 - NAPTIEN183 - 50000)'),
(794, 'tanpquo123', 55000, 55000, 0, '2022-08-20 13:53:23', 'Mua VPS (#VPS Nước Ngoài)'),
(795, '0344911948', 44000, 40000, 4000, '2022-08-20 15:35:46', 'Mua VPS (#VPS Nước Ngoài)'),
(796, 'hoangmai', 0, 88000, 88000, '2022-08-20 17:09:03', 'Nạp tiền tự động qua Ví Momo (#27848985858 - NAPTIEN184 - 80000)'),
(797, 'hoangmai', 88000, 80000, 8000, '2022-08-20 17:09:32', 'Mua VPS (#VPS Nước Ngoài)'),
(798, 'light204', 0, 165000, 165000, '2022-08-21 00:42:03', 'Nạp tiền tự động qua Mbbank (#FT22234051554489 - MB NAPTIEN185. TU: HOANG CONG TAM - 150000)'),
(799, 'light204', 165000, 150000, 15000, '2022-08-21 00:43:46', 'Mua VPS (#VPS Nước Ngoài)'),
(800, 'Tuaniuvan', 0, 44000, 44000, '2022-08-21 18:28:03', 'Nạp tiền tự động qua Ví Momo (#27882009470 - NAPTIEN191 - 40000)'),
(801, 'Tuaniuvan', 44000, 40000, 4000, '2022-08-21 18:28:40', 'Mua VPS (#VPS Nước Ngoài)'),
(802, 'tanpquo123', 0, 148500, 148500, '2022-08-21 21:03:02', 'Nạp tiền tự động qua Mbbank (#FT22234930223995 - CUSTOMER IBFT NAPTIEN183 Trace 925772 - 135000)'),
(803, 'tanpquo123', 148500, 2200, 150700, '2022-08-21 21:07:02', 'Nạp tiền tự động qua Mbbank (#FT22234200536093 - CUSTOMER IBFT NAPTIEN183 Trace 927124 - 2000)'),
(804, 'tanpquo123', 150700, 150000, 700, '2022-08-21 21:07:22', 'Mua VPS (#VPS Nước Ngoài)'),
(805, 'ductv1203', 0, 40000, 40000, '2022-08-22 10:05:01', 'Nạp tiền tự động qua Ví Momo (#27901572156 - NAPTIEN198 - 40000)'),
(806, 'ductv1203', 40000, 15000, 55000, '2022-08-22 10:07:01', 'Nạp tiền tự động qua Ví Momo (#27901572564 - NAPTIEN198 - 15000)'),
(807, 'ductv1203', 55000, 55000, 0, '2022-08-22 10:07:17', 'Mua VPS (#VPS Nước Ngoài)'),
(808, 'l7baonhi', 0, 40000, 40000, '2022-08-22 11:09:03', 'Nạp tiền tự động qua Mbbank (#FT22234229823685 - MB NAPTIEN199. TU: DUONG BAN VINH - 40000)'),
(809, 'l7baonhi', 40000, 40000, 0, '2022-08-22 11:09:48', 'Mua VPS (#VPS Nước Ngoài)'),
(810, 'chicken123', 0, 1010, 1010, '2022-08-22 11:15:01', 'Nạp tiền tự động qua Ví Momo (#27903861727 - NAPTIEN155 - 1010)'),
(811, 'vipvcl02', 0, 40000, 40000, '2022-08-22 16:30:03', 'Nạp tiền tự động qua Mbbank (#FT22234092460903 - CUSTOMER NAPTIEN200 Trace 567148 - 40000)'),
(812, 'vipvcl02', 40000, 40000, 0, '2022-08-22 16:32:56', 'Mua VPS (#VPS Nước Ngoài)'),
(813, 'tako', 0, 40000, 40000, '2022-08-22 23:14:02', 'Nạp tiền tự động qua Ví Thesieure (#T11801100 - NAPTIEN201 - 40000)'),
(814, 'tako', 40000, 40000, 0, '2022-08-22 23:14:26', 'Mua VPS (#VPS Nước Ngoài)'),
(815, 'th4nhtung04', 0, 40000, 40000, '2022-08-23 11:45:01', 'Nạp tiền tự động qua Mbbank (#FT22235243596518 - MB NAPTIEN189. TU: NGUYEN THANH TUNG - 40000)'),
(816, 'th4nhtung04', 40000, 40000, 0, '2022-08-23 11:46:16', 'Mua VPS (#VPS Nước Ngoài)'),
(817, 'Vduc02', 0, 40000, 40000, '2022-08-23 15:53:03', 'Nạp tiền tự động qua Ví Momo (#27947811344 - NAPTIEN207 - 40000)'),
(818, 'Vduc02', 40000, 40000, 0, '2022-08-23 15:53:28', 'Mua VPS (#VPS Nước Ngoài)'),
(819, 'thangcaca', 0, 80000, 80000, '2022-08-24 10:09:03', 'Nạp tiền tự động qua Ví Momo (#27973096263 - NAPTIEN212 - 80000)'),
(820, 'thangcaca', 80000, 80000, 0, '2022-08-24 10:09:24', 'Mua VPS (#VPS Trial 2-4-126)'),
(821, 'Yangcheng', 0, 55000, 55000, '2022-08-24 12:29:03', 'Nạp tiền tự động qua Mbbank (#FT22236022209558 - CUSTOMER NAPTIEN217 - 55000)'),
(822, 'Yangcheng', 55000, 55000, 0, '2022-08-24 12:29:13', 'Mua VPS (#VPS Trial 1-2-126)'),
(823, 'nguyenbacbinh77', 0, 40000, 40000, '2022-08-24 15:20:01', 'Nạp tiền tự động qua Ví Momo (#27985630946 - NAPTIEN219 - 40000)'),
(824, 'nguyenbacbinh77', 40000, 40000, 0, '2022-08-24 15:22:24', 'Mua VPS (#VPS Trial 1-1-126)'),
(825, 'xuanhuy1', 0, 60000, 60000, '2022-08-24 21:48:03', 'Nạp tiền tự động qua Ví Momo (#27999421707 - NAPTIEN220 - 60000)'),
(826, 'xuanhuy1', 60000, 55000, 5000, '2022-08-24 21:51:19', 'Mua VPS (#VPS Trial 1-2-126)'),
(827, 'Huychuong2001', 0, 40000, 40000, '2022-08-25 01:56:02', 'Nạp tiền tự động qua Ví Momo (#28005042077 - NAPTIEN223 - 40000)'),
(828, 'Huychuong2001', 40000, 40000, 0, '2022-08-25 02:00:10', 'Mua VPS (#VPS Trial 1-1-126)'),
(829, 'birdywl', 0, 43600, 43600, '2022-08-25 08:14:39', 'Nạp tiền tự động qua card seri (53510329381570)'),
(830, 'birdywl', 43600, 40000, 3600, '2022-08-25 08:23:08', 'Mua VPS (#VPS Trial 1-1-126)'),
(831, 'vudesign', 0, 250000, 250000, '2022-08-25 08:42:02', 'Nạp tiền tự động qua Mbbank (#FT22237191751390 - CUSTOMER IBVCB 2376490301 361701 NAPTIEN225  CT tu 0041000247338 NGUYEN HOAI VU  toi 0904657059 CAO NGOC QUANG LINH   MB  Quan Doi Trace 361701 - 250000)'),
(832, 'vudesign', 250000, 250000, 0, '2022-08-25 08:46:33', 'Mua VPS (#VPS Trial 4-16-126)'),
(833, 'buiminhchien', 0, 40000, 40000, '2022-08-25 17:02:03', 'Nạp tiền tự động qua Ví Momo (#28029709556 - NAPTIEN229 - 40000)'),
(834, 'buiminhchien', 40000, 40000, 0, '2022-08-25 17:02:25', 'Mua VPS (#VPS Trial 1-1-126)'),
(835, 'thanh050104', 0, 40000, 40000, '2022-08-25 20:21:01', 'Nạp tiền tự động qua Ví Momo (#28039209936 - NAPTIEN231 - 40000)'),
(836, 'thanh050104', 40000, 40000, 0, '2022-08-25 20:21:30', 'Mua VPS (#VPS Trial 1-1-126)'),
(837, 'pomdeptrai', 0, 80000, 80000, '2022-08-26 17:18:01', 'Nạp tiền tự động qua Mbbank (#FT22238435375171 - MB NAPTIEN235. TU: NGUYEN DUC HUNG - 80000)'),
(838, 'pomdeptrai', 80000, 80000, 0, '2022-08-26 17:18:12', 'Mua VPS (#VPS Trial 2-4-126)'),
(839, 'Dominh97', 0, 40000, 40000, '2022-08-26 23:39:02', 'Admin jinvps cộng tiền (Khách nạp sai nd)'),
(840, 'Dominh97', 40000, 40000, 0, '2022-08-26 23:39:36', 'Mua VPS (#VPS Trial 1-1-126)'),
(841, 'xxx010', 0, 40000, 40000, '2022-08-27 10:09:03', 'Nạp tiền tự động qua Ví Momo (#28098324128 - NAPTIEN238 - 40000)'),
(842, 'xxx010', 40000, 40000, 0, '2022-08-27 10:10:06', 'Mua VPS (#VPS Trial 1-1-126)'),
(843, 'haudau1563', 0, 43100, 43100, '2022-08-27 14:29:33', 'Nạp tiền tự động qua card seri (10009052118961)'),
(844, 'haudau1563', 43100, 40000, 3100, '2022-08-27 14:30:30', 'Mua VPS (#VPS Trial 1-1-126)'),
(845, '0966382520', 0, 180000, 180000, '2022-08-27 19:21:03', 'Nạp tiền tự động qua Ví Momo (#28114628369 - NAPTIEN243 - 180000)'),
(846, '0966382520', 180000, 180000, 0, '2022-08-27 19:21:36', 'Mua VPS (#VPS Trial 4-8-126)'),
(847, 'Khai02012001', 0, 90000, 90000, '2022-08-27 20:39:03', 'Nạp tiền tự động qua Mbbank (#FT22239193486539 - NAPTIEN245 - 90000)'),
(848, 'Khai02012001', 90000, 90000, 0, '2022-08-27 20:40:22', 'Mua VPS (#VPS VN 1-1-20)'),
(849, 'minhtri4869', 0, 42900, 42900, '2022-08-27 20:50:06', 'Nạp tiền tự động qua card seri (10009293724689)'),
(850, 'minhtri4869', 42900, 40000, 2900, '2022-08-27 20:50:16', 'Mua VPS (#VPS Trial 1-1-126)'),
(851, 'dinhvanduy103', 0, 40000, 40000, '2022-08-27 21:46:04', 'Nạp tiền tự động qua Ví Momo (#28119245421 - NAPTIEN246 - 40000)'),
(852, 'b0can3', 0, 55000, 55000, '2022-08-27 22:38:04', 'Nạp tiền tự động qua Ví Momo (#28120721640 - NAPTIEN247 - 55000)'),
(853, 'b0can3', 55000, 55000, 0, '2022-08-27 22:40:16', 'Mua VPS (#VPS Trial 1-2-126)'),
(854, 'viettb', 0, 55000, 55000, '2022-08-27 22:51:04', 'Nạp tiền tự động qua Ví Momo (#28120872667 - NAPTIEN248 - 55000)'),
(855, 'viettb', 55000, 55000, 0, '2022-08-27 22:55:21', 'Mua VPS (#VPS Trial 1-2-126)'),
(856, 'dinhvanduy103', 40000, 40000, 0, '2022-08-27 23:32:10', 'Mua VPS (#VPS Trial 1-1-126)'),
(857, 'viettb', 0, 100000, 100000, '2022-08-28 14:27:01', 'Nạp tiền tự động qua Ví Momo (#28139524691 - NAPTIEN248 - 100000)'),
(858, 'quynr2008', 0, 42700, 42700, '2022-08-28 20:40:21', 'Nạp tiền tự động qua card seri (10009280736097)'),
(859, 'quynr2008', 42700, 40000, 2700, '2022-08-28 20:41:23', 'Mua VPS (#VPS Trial 1-1-126)'),
(860, 'Lequanghieu', 0, 15000, 15000, '2022-08-29 08:28:05', 'Admin jinvps cộng tiền (rf)'),
(861, 'dctyasuo', 0, 45000, 45000, '2022-08-29 08:38:40', 'Admin jinvps cộng tiền (rf)'),
(862, 'taivemx2', 0, 15000, 15000, '2022-08-29 08:39:23', 'Admin jinvps cộng tiền (ok)'),
(863, 'congtonn22705', 5500, 40000, 45500, '2022-08-29 08:42:44', 'Admin jinvps cộng tiền (rf)'),
(864, 'Xakutara', 0, 40000, 40000, '2022-08-29 08:43:15', 'Admin jinvps cộng tiền (rf)'),
(865, 'dctyasuo', 45000, 45000, 0, '2022-08-29 08:46:36', 'Admin jinvps trừ tiền ()'),
(866, 'thienando', 700, 25000, 25700, '2022-08-29 08:52:53', 'Admin jinvps cộng tiền (rf)'),
(867, 'thienando', 25700, 15000, 40700, '2022-08-29 08:57:01', 'Nạp tiền tự động qua Ví Momo (#28162854832 - NAPTIEN23 - 15000)'),
(868, 'thienando', 40700, 40000, 700, '2022-08-29 08:57:13', 'Mua VPS (#VPS Trial 1-1-126)'),
(869, 'taivemx2', 15000, 25000, 40000, '2022-08-29 09:06:04', 'Nạp tiền tự động qua Ví Momo (#28163481340 - NAPTIEN82 - 25000)'),
(870, 'taivemx2', 40000, 40000, 0, '2022-08-29 09:06:29', 'Mua VPS (#VPS Trial 1-1-126)'),
(871, 'bimno12344', 0, 40000, 40000, '2022-08-29 09:13:03', 'Nạp tiền tự động qua Ví Thesieure (#T11910935 - NAPTIEN259 - 40000)'),
(872, 'bimno12344', 40000, 40000, 0, '2022-08-29 09:20:49', 'Mua VPS (#VPS Trial 1-1-126)'),
(873, 'Xakutara', 40000, 40000, 0, '2022-08-29 09:38:11', 'Mua VPS (#VPS Trial 1-1-126)'),
(874, 'Khoa0909', 0, 40000, 40000, '2022-08-29 09:54:02', 'Nạp tiền tự động qua Mbbank (#FT22241520754901 - MB NAPTIEN260. TU: NGUYEN TRAN MINH KHOA - 40000)'),
(875, 'Khoa0909', 40000, 40000, 0, '2022-08-29 09:56:35', 'Mua VPS (#VPS Trial 1-1-126)'),
(876, 'dinhvanduy103', 0, 90000, 90000, '2022-08-29 11:38:01', 'Nạp tiền tự động qua Ví Momo (#28168532982 - NAPTIEN246 - 90000)'),
(877, 'dinhvanduy103', 90000, 90000, 0, '2022-08-29 11:49:06', 'Mua VPS (#VPS VN 1-1-20)'),
(878, 'Khiem123', 0, 40000, 40000, '2022-08-29 17:10:03', 'Nạp tiền tự động qua Ví Momo (#28179870154 - NAPTIEN241 - 40000)'),
(879, 'Khiem123', 40000, 40000, 0, '2022-08-29 17:10:35', 'Mua VPS (#VPS Trial 1-1-126)'),
(880, 'hovailonhd', 0, 80000, 80000, '2022-08-29 21:44:02', 'Nạp tiền tự động qua Ví Momo (#28189118826 - NAPTIEN265 - 80000)'),
(881, 'hovailonhd', 80000, 80000, 0, '2022-08-29 21:44:21', 'Mua VPS (#VPS Trial 2-4-126)'),
(882, 'Lequanghieu', 15000, 40000, 55000, '2022-08-29 23:28:01', 'Nạp tiền tự động qua Ví Momo (#28190855224 - NAPTIEN257 - 40000)'),
(883, 'Lequanghieu', 55000, 55000, 0, '2022-08-29 23:32:50', 'Mua VPS (#VPS Trial 1-2-126)'),
(884, 'birdywl', 3600, 45650, 49250, '2022-08-30 00:03:24', 'Nạp tiền tự động qua card seri (53510329381577)'),
(885, 'birdywl', 49250, 40000, 9250, '2022-08-30 00:03:35', 'Mua VPS (#VPS Trial 1-1-126)'),
(886, 'hoangvietkt', 0, 90000, 90000, '2022-08-30 08:17:02', 'Nạp tiền tự động qua Ví Momo (#28197935571 - NAPTIEN266 - 90000)'),
(887, 'hoangvietkt', 90000, 90000, 0, '2022-08-30 08:17:42', 'Mua VPS (#VPS VN 1-1-20)'),
(888, 'Mjnhducvh', 0, 55000, 55000, '2022-08-30 08:48:02', 'Nạp tiền tự động qua Mbbank (#FT22242861636830 - MB NAPTIEN268. TU: NGUYEN MINH DUC - 55000)'),
(889, 'Mjnhducvh', 55000, 55000, 0, '2022-08-30 08:48:17', 'Mua VPS (#VPS Trial 1-2-126)'),
(890, 'pc105204', 0, 55000, 55000, '2022-08-30 12:10:31', 'Nạp tiền tự động qua Ví Momo (#28205403936 - NAPTIEN269 - 55000)'),
(891, 'pc105204', 55000, 55000, 0, '2022-08-30 12:12:45', 'Mua VPS (#VPS Trial 1-2-126)'),
(892, '0365262308', 0, 12000, 12000, '2022-08-30 14:50:59', 'Admin jinvps cộng tiền (reset data)'),
(893, 'luvanthanh', 0, 10000, 10000, '2022-08-30 14:52:15', 'Admin jinvps cộng tiền (rf)'),
(894, 'dongockimtrinh', 0, 25000, 25000, '2022-08-30 15:50:54', 'Admin jinvps cộng tiền (rf)'),
(895, 'congtonn22705', 45500, 40000, 5500, '2022-08-30 19:53:14', 'Mua VPS (#VPS Trial 1-1-126)'),
(896, 'tamkazors', 0, 55000, 55000, '2022-08-31 06:39:03', 'Nạp tiền tự động qua Mbbank (#FT22243403600656 - MB NAPTIEN275. TU: BUI VU MINH TAM - 55000)'),
(897, 'tamkazors', 55000, 55000, 0, '2022-08-31 06:39:31', 'Mua VPS (#VPS Trial 1-2-126)'),
(898, 'dongockimtrinh', 25000, 55000, 80000, '2022-08-31 14:37:01', 'Nạp tiền tự động qua Ví Momo (#28282304679 - NAPTIEN271 - 55000)'),
(899, 'dongockimtrinh', 80000, 80000, 0, '2022-08-31 14:38:14', 'Mua VPS (#VPS Trial 2-4-126)'),
(900, 'batman', 0, 120000, 120000, '2022-08-31 14:49:02', 'Nạp tiền tự động qua Ví Momo (#28282645962 - NAPTIEN129 - 120000)'),
(901, 'batman', 120000, 120000, 0, '2022-08-31 14:49:57', 'Mua VPS (#VPS VN 1-2-20)'),
(902, 'tienlqmb2008', 0, 45650, 45650, '2022-08-31 18:24:23', 'Nạp tiền tự động qua card seri (59550031671586)'),
(903, 'tienlqmb2008', 45650, 40000, 5650, '2022-08-31 18:25:02', 'Mua VPS (#VPS Trial 1-1-126)'),
(904, 'meosieusao', 0, 43850, 43850, '2022-08-31 19:11:28', 'Nạp tiền tự động qua card seri (10009354307741)'),
(905, 'meosieusao', 43850, 40000, 3850, '2022-08-31 19:12:07', 'Mua VPS (#VPS Trial 1-1-126)'),
(906, 'tienlqmb2008', 5650, 40000, 45650, '2022-08-31 20:18:17', 'Admin jinvps cộng tiền (rf)'),
(907, 'Doanhcute', 0, 40000, 40000, '2022-08-31 21:47:04', 'Nạp tiền tự động qua Mbbank (#FT22243402057030 - MB NAPTIEN282. TU: TRUONG DANG DOANH - 40000)'),
(908, 'Doanhcute', 40000, 40000, 0, '2022-08-31 21:58:04', 'Mua VPS (#VPS Trial 1-1-126)'),
(909, 'Hieunek2003', 0, 55000, 55000, '2022-09-01 11:38:01', 'Nạp tiền tự động qua Ví Momo (#28312736761 - NAPTIEN285 - 50000)'),
(910, 'Hieunek2003', 55000, 55000, 0, '2022-09-01 11:38:44', 'Mua VPS (#VPS Trial 1-2-126)'),
(911, 'tienlqmb2008', 45650, 16800, 62450, '2022-09-01 12:47:20', 'Nạp tiền tự động qua card seri (59200034621635)'),
(912, 'tienlqmb2008', 62450, 16800, 79250, '2022-09-01 12:48:09', 'Nạp tiền tự động qua card seri (59200034621636)'),
(913, 'tienlqmb2008', 79250, 8400, 87650, '2022-09-01 12:53:09', 'Nạp tiền tự động qua card seri (59000020828680)'),
(914, 'tienlqmb2008', 87650, 80000, 7650, '2022-09-01 12:55:28', 'Mua VPS (#VPS Trial 2-4-126)'),
(915, '21092002', 0, 49500, 49500, '2022-09-01 21:22:01', 'Nạp tiền tự động qua Ví Momo (#28331006091 - NAPTIEN292 - 45000)'),
(916, '21092002', 49500, 40000, 9500, '2022-09-01 21:24:22', 'Mua VPS (#VPS Trial 1-1-126)'),
(917, 'Tanhung16997', 0, 55000, 55000, '2022-09-01 23:04:03', 'Nạp tiền tự động qua Ví Momo (#28333487546 - NAPTIEN293 - 50000)'),
(918, 'Tanhung16997', 55000, 55000, 0, '2022-09-01 23:05:46', 'Mua VPS (#VPS Trial 1-2-126)'),
(919, 'Giknroz3', 0, 42850, 42850, '2022-09-02 07:30:54', 'Nạp tiền tự động qua card seri (10009279821914)'),
(920, 'Giknroz3', 42850, 40000, 2850, '2022-09-02 07:30:56', 'Mua VPS (#VPS Trial 1-1-126)'),
(921, 'thanhnam1102', 0, 44000, 44000, '2022-09-02 08:29:03', 'Nạp tiền tự động qua Ví Momo (#28340812034 - NAPTIEN295 - 40000)'),
(922, 'thanhnam1102', 44000, 40000, 4000, '2022-09-02 08:29:26', 'Mua VPS (#VPS Trial 1-1-126)'),
(923, 'co3132004', 0, 88000, 88000, '2022-09-02 13:54:01', 'Nạp tiền tự động qua Ví Momo (#28351538631 - NAPTIEN289 - 80000)'),
(924, 'co3132004', 88000, 80000, 8000, '2022-09-02 13:54:43', 'Mua VPS (#VPS Trial 2-4-126)'),
(925, 'hoangvietkt', 0, 99000, 99000, '2022-09-02 16:27:05', 'Nạp tiền tự động qua Mbbank (#FT22245120223092 - MB NAPTIEN266. TU: PHAM BINH MINH - 90000)'),
(926, 'davidlorencia', 0, 495000, 495000, '2022-09-02 16:29:03', 'Nạp tiền tự động qua Ví Momo (#28355748472 - NAPTIEN299 - 450000)'),
(927, 'davidlorencia', 495000, 450000, 45000, '2022-09-02 16:31:04', 'Mua VPS (#VPS Trial 8-32-126)'),
(928, 'hoangvietkt', 99000, 90000, 9000, '2022-09-02 16:36:50', 'Mua VPS (#VPS VN 1-1-20)'),
(929, 'Thangcnc99', 0, 88000, 88000, '2022-09-02 16:37:02', 'Nạp tiền tự động qua Mbbank (#FT22245612497969 - CUSTOMER NAPTIEN297 Trace 058829 - 80000)'),
(930, 'chicken123', 1010, 11, 999, '2022-09-02 16:47:58', 'Mua VPS (#lộc dz test vps)'),
(931, 'chicken123', 999, 11, 988, '2022-09-02 16:58:37', 'Mua VPS (#lộc dz test vps)'),
(932, 'Thangcnc99', 88000, 80000, 8000, '2022-09-02 17:11:53', 'Mua VPS (#VPS Trial 2-4-126)'),
(933, 'chicken123', 988, 1100, 2088, '2022-09-02 17:33:04', 'Nạp tiền tự động qua Mbbank (#FT22245350418319 - CUSTOMER NAPTIEN155 Trace 290876 - 1000)'),
(934, 'davidlorencia', 45000, 495000, 540000, '2022-09-02 18:59:03', 'Nạp tiền tự động qua Mbbank (#FT22245052086855 - CUSTOMER NAPTIEN299 Trace 073950 - 450000)'),
(935, 'davidlorencia', 540000, 495000, 45000, '2022-09-02 22:27:29', 'Admin jinvps trừ tiền (Refund)'),
(936, 'galaxy141', 0, 44000, 44000, '2022-09-02 22:43:01', 'Nạp tiền tự động qua Ví Momo (#28365137268 - NAPTIEN301 - 40000)'),
(937, 'galaxy141', 44000, 40000, 4000, '2022-09-02 22:43:40', 'Mua VPS (#VPS Trial 1-1-126)'),
(938, 'linh041120044', 0, 99000, 99000, '2022-09-02 23:14:04', 'Nạp tiền tự động qua Ví Momo (#28365857517 - NAPTIEN303 - 90000)'),
(939, 'linh041120044', 99000, 90000, 9000, '2022-09-02 23:14:42', 'Mua VPS (#VPS VN 1-1-20)'),
(940, 'Pine11091999', 0, 132000, 132000, '2022-09-03 06:41:01', 'Nạp tiền tự động qua Ví Momo (#28370927641 - NAPTIEN305 - 120000)'),
(941, 'Pine11091999', 132000, 120000, 12000, '2022-09-03 06:43:34', 'Mua VPS (#VPS VN 1-2-20)'),
(942, 'Buiduyhuyhd97', 0, 198000, 198000, '2022-09-03 08:20:01', 'Nạp tiền tự động qua Ví Momo (#28372588007 - NAPTIEN306 - 180000)'),
(943, 'Buiduyhuyhd97', 198000, 180000, 18000, '2022-09-03 08:56:15', 'Mua VPS (#VPS Trial 4-8-126)'),
(944, '0968710828', 0, 88000, 88000, '2022-09-03 14:54:03', 'Nạp tiền tự động qua Ví Momo (#28384876356 - NAPTIEN310 - 80000)'),
(945, '0968710828', 88000, 80000, 8000, '2022-09-03 14:54:31', 'Mua VPS (#VPS Trial 2-4-126)'),
(946, 'minh1711', 0, 44000, 44000, '2022-09-03 17:40:04', 'Nạp tiền tự động qua Ví Momo (#28390402216 - NAPTIEN311 - 40000)'),
(947, 'minh1711', 44000, 40000, 4000, '2022-09-03 17:40:57', 'Mua VPS (#VPS Trial 1-1-126)'),
(948, 'langkk2874', 0, 60500, 60500, '2022-09-03 22:26:01', 'Nạp tiền tự động qua Ví Momo (#28399218193 - NAPTIEN313 - 55000)'),
(949, 'langkk2874', 60500, 55000, 5500, '2022-09-03 22:27:21', 'Mua VPS (#VPS Trial 1-2-126)'),
(950, 'Huyvipkka', 0, 44000, 44000, '2022-09-04 00:12:33', 'Admin jinvps cộng tiền (Nap)'),
(951, 'Huyvipkka', 44000, 40000, 4000, '2022-09-04 00:15:04', 'Mua VPS (#VPS Trial 1-1-126)'),
(952, 'duongvps', 0, 132000, 132000, '2022-09-04 08:31:03', 'Nạp tiền tự động qua Ví Momo (#28406799743 - NAPTIEN315 - 120000)'),
(953, 'duongvps', 132000, 120000, 12000, '2022-09-04 08:36:16', 'Mua VPS (#VPS VN 1-2-20)'),
(954, 'tdquanghuy1512', 0, 45100, 45100, '2022-09-04 11:11:24', 'Admin jinvps cộng tiền (Khách nạp mb)'),
(955, 'tdquanghuy1512', 45100, 40000, 5100, '2022-09-04 11:12:15', 'Mua VPS (#VPS Trial 1-1-126)'),
(956, 'sonlamit', 0, 180000, 180000, '2022-09-04 16:32:03', 'Nạp tiền tự động qua Ví Momo (#28420306874 - NAPTIEN318 - 180000)'),
(957, 'sonlamit', 180000, 180000, 0, '2022-09-04 16:33:17', 'Mua VPS (#VPS Trial 4-8-126)'),
(958, 'Pine11091999', 12000, 210000, 222000, '2022-09-04 16:43:03', 'Nạp tiền tự động qua Ví Momo (#28420772703 - NAPTIEN305 - 210000)'),
(959, 'Pine11091999', 222000, 80000, 142000, '2022-09-04 16:48:21', 'Mua VPS (#VPS Trial 2-4-126)'),
(960, 'Pine11091999', 142000, 80000, 62000, '2022-09-04 16:48:34', 'Mua VPS (#VPS Trial 2-4-126)'),
(961, 'hayquen06', 0, 60000, 60000, '2022-09-04 20:51:03', 'Nạp tiền tự động qua Ví Momo (#28429164735 - NAPTIEN321 - 60000)'),
(962, 'hayquen06', 60000, 55000, 5000, '2022-09-04 20:51:37', 'Mua VPS (#VPS Trial 1-2-126)'),
(963, 'Quand', 0, 2000000, 2000000, '2022-09-04 21:23:48', 'Admin Quand cộng tiền ()'),
(964, 'Quand', 2000000, 1500000, 500000, '2022-09-04 21:24:24', 'Mua VPS (#VPS Trial 64-128-126)'),
(965, 'Quand', 500000, 500000, 0, '2022-09-04 21:32:17', 'Admin dinhtuanhung trừ tiền (test)'),
(966, 'Quand', 0, 500000, -500000, '2022-09-04 21:33:02', 'Admin Quand trừ tiền ()'),
(967, 'dinhtuanhung', 0, 45000, 45000, '2022-09-04 21:35:49', 'Admin dinhtuanhung cộng tiền (test)'),
(968, 'dinhtuanhung', 45000, 45000, 0, '2022-09-04 21:43:56', 'Mua VPS (#VPS TEST VUI LÒNG KHÔNG MUA)'),
(969, 'Thuocla79', 0, 80000, 80000, '2022-09-04 22:13:02', 'Nạp tiền tự động qua Ví Thesieure (#T12032757 - NAPTIEN323 - 80000)'),
(970, 'Thuocla79', 80000, 80000, 0, '2022-09-04 22:15:57', 'Mua VPS (#VPS Trial 2-4-126)'),
(971, 'Pine11091999', 62000, 18000, 80000, '2022-09-05 09:12:02', 'Nạp tiền tự động qua Ví Momo (#28441691552 - NAPTIEN305 - 18000)'),
(972, 'Pine11091999', 80000, 80000, 0, '2022-09-05 09:12:27', 'Mua VPS (#VPS Trial 2-4-126)'),
(973, 'thangtran021099', 0, 40000, 40000, '2022-09-05 10:24:04', 'Nạp tiền tự động qua Ví Momo (#28444898535 - NAPTIEN325 - 40000)'),
(974, 'thangtran021099', 40000, 40000, 0, '2022-09-05 10:24:34', 'Mua VPS (#VPS Trial 1-1-126)'),
(975, 'nguyen905', 0, 40000, 40000, '2022-09-05 11:58:03', 'Nạp tiền tự động qua Ví Momo (#28447067500 - NAPTIEN326 - 40000)'),
(976, 'nguyen905', 40000, 40000, 0, '2022-09-05 11:58:28', 'Mua VPS (#VPS Trial 1-1-126)'),
(977, '01215266238', 300, 40000, 40300, '2022-09-06 07:59:03', 'Nạp tiền tự động qua Ví Thesieure (#T12050079 - NAPTIEN127 - 40000)'),
(978, '01215266238', 40300, 40000, 300, '2022-09-06 07:59:41', 'Mua VPS (#VPS Trial 1-1-126)'),
(979, '0365262308', 12000, 21000, 33000, '2022-09-06 10:26:03', 'Nạp tiền tự động qua Ví Momo (#28484151851 - NAPTIEN87 - 21000)'),
(980, '0365262308', 33000, 10000, 43000, '2022-09-06 10:40:03', 'Nạp tiền tự động qua Ví Momo (#28484392317 - NAPTIEN87 - 10000)'),
(981, '0365262308', 43000, 33333, 9667, '2022-09-06 10:41:25', 'Mua VPS (#VPS TRIAL 1-1)'),
(982, 'Thideptrai', 0, 40000, 40000, '2022-09-06 19:46:28', 'Admin jinvps cộng tiền ()'),
(983, 'Thideptrai', 40000, 40000, 0, '2022-09-06 19:47:29', 'Mua VPS (#VPS Trial 1-1-126)'),
(984, 'Thideptrai', 0, 40000, 40000, '2022-09-06 20:05:03', 'Nạp tiền tự động qua Mbbank (#FT22249000069501 - MB NAPTIEN338. TU: NGUYEN NGOC THI - 40000)'),
(985, 'j4uonline', 0, 430000, 430000, '2022-09-07 13:27:03', 'Nạp tiền tự động qua Ví Momo (#28528106320 - NAPTIEN341 - 430000)'),
(986, 'j4uonline', 430000, 430000, 0, '2022-09-07 13:28:12', 'Mua VPS (#VPS VN Sale 1-1-20)'),
(987, 'Thideptrai', 40000, 40000, 0, '2022-09-07 13:35:20', 'Admin jinvps trừ tiền ()'),
(988, 'Tamvo123', 0, 40000, 40000, '2022-09-08 09:24:01', 'Nạp tiền tự động qua Mbbank (#FT22251844003386 - MB NAPTIEN348. TU: VO DINH TAM - 40000)'),
(989, 'Tamvo123', 40000, 40000, 0, '2022-09-08 09:50:27', 'Mua VPS (#VPS Trial 1-1-126)'),
(990, 'huykx001', 0, 55000, 55000, '2022-09-08 12:26:01', 'Nạp tiền tự động qua Mbbank (#FT22251344880040 - MB NAPTIEN339. TU: PHAN NGOC ANH - 55000)'),
(991, 'huykx001', 55000, 55000, 0, '2022-09-08 12:28:11', 'Mua VPS (#VPS Trial 1-2-126)'),
(992, 'namzzw12', 0, 40000, 40000, '2022-09-08 12:53:01', 'Nạp tiền tự động qua Ví Momo (#28566318136 - NAPTIEN336 - 40000)'),
(993, 'namzzw12', 40000, 40000, 0, '2022-09-08 12:53:23', 'Mua VPS (#VPS Trial 1-1-126)'),
(994, 'betafpt', 0, 80000, 80000, '2022-09-08 13:35:01', 'Nạp tiền tự động qua Mbbank (#FT22251084052384 - CUSTOMER NAPTIEN347 FT22251189003168 Trace 0 35692 - 80000)'),
(995, 'betafpt', 80000, 80000, 0, '2022-09-08 13:37:02', 'Mua VPS (#VPS Trial 2-4-126)'),
(996, 'xuanhuy1', 5000, 50000, 55000, '2022-09-08 16:54:02', 'Nạp tiền tự động qua Ví Momo (#28575274435 - NAPTIEN220 - 50000)'),
(997, 'xuanhuy1', 55000, 55000, 0, '2022-09-08 16:55:24', 'Mua VPS (#VPS Trial 1-2-126)'),
(998, 'o0rayleigh0o', 0, 40000, 40000, '2022-09-08 21:11:03', 'Nạp tiền tự động qua Mbbank (#FT22251947061021 - CUSTOMER NAPTIEN344 Trace 979552 - 40000)'),
(999, 'o0rayleigh0o', 40000, 40000, 0, '2022-09-08 21:21:15', 'Mua VPS (#VPS Trial 1-1-126)'),
(1000, 'Kemkem2018', 0, 180000, 180000, '2022-09-08 22:12:01', 'Nạp tiền tự động qua Ví Momo (#28586842006 - NAPTIEN353 - 180000)'),
(1001, 'Kemkem2018', 180000, 180000, 0, '2022-09-08 22:14:32', 'Mua VPS (#VPS US 2-2-20)'),
(1002, '0912239613', 0, 55000, 55000, '2022-09-09 10:47:03', 'Nạp tiền tự động qua Mbbank (#FT22252153228885 - MB NAPTIEN357. TU: TRAN HUY DAT - 55000)'),
(1003, '0912239613', 55000, 55000, 0, '2022-09-09 10:48:10', 'Mua VPS (#VPS Trial 1-2-126)'),
(1004, 'ngbtrz', 0, 40000, 40000, '2022-09-09 11:17:04', 'Nạp tiền tự động qua Ví Momo (#28605158477 - NAPTIEN354 - 40000)'),
(1005, 'ngbtrz', 40000, 40000, 0, '2022-09-09 11:23:59', 'Mua VPS (#VPS Trial 1-1-126)'),
(1006, '109078', 0, 80000, 80000, '2022-09-09 11:24:01', 'Nạp tiền tự động qua Ví Momo (#28604470662 - NAPTIEN359 - 80000)'),
(1007, '109078', 80000, 80000, 0, '2022-09-09 11:24:20', 'Mua VPS (#VPS Trial 2-4-126)'),
(1008, 'Lechuongit', 0, 88200, 88200, '2022-09-09 13:13:50', 'Nạp tiền tự động qua card seri (10009165218304)'),
(1009, 'Lechuongit', 88200, 80000, 8200, '2022-09-09 13:14:37', 'Mua VPS (#VPS Trial 2-4-126)'),
(1010, 'phanhai1024', 0, 55000, 55000, '2022-09-09 16:35:04', 'Nạp tiền tự động qua Ví Momo (#28616305608 - NAPTIEN365 - 55000)'),
(1011, 'phanhai1024', 55000, 55000, 0, '2022-09-09 16:35:36', 'Mua VPS (#VPS Trial 1-2-126)'),
(1012, 'meanhwang310302', 0, 88200, 88200, '2022-09-09 18:06:52', 'Nạp tiền tự động qua card seri (10009476008412)'),
(1013, 'meanhwang310302', 88200, 80000, 8200, '2022-09-09 18:07:13', 'Mua VPS (#VPS Trial 2-4-126)'),
(1014, 'duyhoan5520', 0, 40000, 40000, '2022-09-09 19:11:02', 'Nạp tiền tự động qua Ví Momo (#28624479285 - NAPTIEN368 - 40000)'),
(1015, 'duyhoan5520', 40000, 40000, 0, '2022-09-09 19:11:25', 'Mua VPS (#VPS Trial 1-1-126)'),
(1016, 'buianh98', 0, 40000, 40000, '2022-09-09 23:55:01', 'Nạp tiền tự động qua Ví Momo (#28633984097 - NAPTIEN372 - 40000)'),
(1017, 'buianh98', 40000, 40000, 0, '2022-09-09 23:55:31', 'Mua VPS (#VPS Trial 1-1-126)'),
(1018, 'minhhieu12', 0, 160000, 160000, '2022-09-10 11:02:04', 'Nạp tiền tự động qua Mbbank (#FT22253140645322 - CUSTOMER NAPTIEN375 Trace 777955 - 160000)'),
(1019, 'minhhieu12', 160000, 80000, 80000, '2022-09-10 11:02:32', 'Mua VPS (#VPS Trial 2-4-126)'),
(1020, 'minhhieu12', 80000, 80000, 0, '2022-09-10 11:03:47', 'Mua VPS (#VPS Trial 2-4-126)'),
(1021, 'Luongquangt126', 0, 40000, 40000, '2022-09-10 12:36:03', 'Nạp tiền tự động qua Ví Momo (#28648646312 - NAPTIEN355 - 40000)'),
(1022, 'Luongquangt126', 40000, 40000, 0, '2022-09-10 12:38:15', 'Mua VPS (#VPS Trial 1-1-126)'),
(1023, '0829332494', 0, 44100, 44100, '2022-09-10 15:09:14', 'Nạp tiền tự động qua card seri (10009327300385)'),
(1024, '0829332494', 44100, 40000, 4100, '2022-09-10 15:09:32', 'Mua VPS (#VPS Trial 1-1-126)'),
(1025, 'Luongquangt126', 0, 180000, 180000, '2022-09-10 15:41:03', 'Nạp tiền tự động qua Mbbank (#FT22253242450097 - CUSTOMER NAPTIEN355 Trace 621397 - 180000)'),
(1026, 'Luongquangt126', 180000, 180000, 0, '2022-09-10 15:42:44', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1027, 'Duy12hd', 187000, 40000, 147000, '2022-09-10 18:01:05', 'Mua VPS (#VPS Trial 1-1-126)'),
(1028, 'AnhQuan164', 0, 80000, 80000, '2022-09-10 18:40:01', 'Nạp tiền tự động qua Ví Momo (#28660880466 - NAPTIEN377 - 80000)'),
(1029, 'AnhQuan164', 80000, 80000, 0, '2022-09-10 18:48:08', 'Mua VPS (#VPS Trial 2-4-126)'),
(1030, 'duongvps', 12000, 570000, 582000, '2022-09-10 20:26:02', 'Nạp tiền tự động qua Mbbank (#FT22253650010018 - MB NAPTIEN315. TU: PHAN THI HUE - 570000)'),
(1031, 'duongvps', 582000, 570000, 12000, '2022-09-10 20:26:33', 'Mua VPS (#VPS VN Sale 1-2-20)'),
(1032, 'congly1310', 0, 80000, 80000, '2022-09-10 21:03:03', 'Nạp tiền tự động qua Mbbank (#FT22253308126478 - CUSTOMER IBFT NAPTIEN379 Trace 483754 - 80000)'),
(1033, 'congly1310', 80000, 80000, 0, '2022-09-10 21:03:28', 'Mua VPS (#VPS Trial 2-4-126)'),
(1034, 'thanh050104', 0, 90000, 90000, '2022-09-10 22:03:04', 'Nạp tiền tự động qua Mbbank (#FT22253570285718 - CUSTOMER NAPTIEN231 Trace 275079 - 90000)'),
(1035, 'thanh050104', 90000, 90000, 0, '2022-09-10 22:09:32', 'Mua VPS (#VPS VN 1-1-20)'),
(1036, 'caovanthanh2003', 0, 80000, 80000, '2022-09-10 23:09:02', 'Nạp tiền tự động qua Ví Momo (#28669553106 - NAPTIEN382 - 80000)'),
(1037, 'caovanthanh2003', 80000, 80000, 0, '2022-09-10 23:10:27', 'Mua VPS (#VPS Trial 2-4-126)'),
(1038, 'Hoanguyen', 0, 865000, 865000, '2022-09-10 23:54:03', 'Nạp tiền tự động qua Mbbank (#FT22254731050360 - CUSTOMER MBVCB 2437338554 063292 NAPTIEN374  CT tu 1018172822 THAI BA DO toi 090 4657059 CAO NGOC QUANG LINH  MB  Qu an Doi Trace 063292 - 865000)'),
(1039, 'Hoanguyen', 865000, 865000, 0, '2022-09-10 23:54:29', 'Mua VPS (#VPS VN Đặc Biệt Sale 2-4-20)'),
(1040, 'dan621', 0, 40000, 40000, '2022-09-11 06:50:10', 'Admin jinvps cộng tiền (Khách nạp tsr)'),
(1041, 'dan621', 40000, 40000, 0, '2022-09-11 06:51:56', 'Mua VPS (#VPS Trial 1-1-126)'),
(1042, 'dan621', 0, 40000, 40000, '2022-09-11 07:59:28', 'Admin jinvps cộng tiền (Khách nạp tsr)'),
(1043, 'Duy12hd', 147000, 40000, 107000, '2022-09-11 15:16:55', 'Mua VPS (#VPS Trial 1-1-126)'),
(1044, 'hungdo1388', 0, 80000, 80000, '2022-09-11 17:53:03', 'Nạp tiền tự động qua Ví Momo (#28695224748 - NAPTIEN367 - 80000)'),
(1045, 'hungdo1388', 80000, 80000, 0, '2022-09-11 17:53:18', 'Mua VPS (#VPS Trial 2-4-126)'),
(1046, '0ldkIemh0a', 0, 40000, 40000, '2022-09-12 07:38:05', 'Nạp tiền tự động qua Mbbank (#FT22255821281120 - MB NAPTIEN387. TU: TRAN NHAT LINH - 40000)'),
(1047, '0ldkIemh0a', 40000, 40000, 0, '2022-09-12 07:38:30', 'Mua VPS (#VPS Trial 1-1-126)'),
(1048, 'xxx010', 0, 40000, 40000, '2022-09-12 07:55:04', 'Nạp tiền tự động qua Ví Momo (#28710863036 - NAPTIEN238 - 40000)'),
(1049, 'xxx010', 40000, 40000, 0, '2022-09-12 07:56:08', 'Mua VPS (#VPS Trial 1-1-126)'),
(1050, 'cgdzdz123', 0, 55000, 55000, '2022-09-12 08:08:56', 'Admin jinvps cộng tiền (Khách nạp mm)'),
(1051, 'cgdzdz123', 55000, 55000, 0, '2022-09-12 08:09:17', 'Mua VPS (#VPS Trial 1-2-126)'),
(1052, '109078', 0, 50000, 50000, '2022-09-12 15:08:04', 'Nạp tiền tự động qua Mbbank (#FT22255040058380 - MB NAPTIEN359. TU: NGUYEN PHUONG NAM - 50000)'),
(1053, '109078', 50000, 30000, 80000, '2022-09-12 15:12:02', 'Nạp tiền tự động qua Mbbank (#FT22255046124792 - CUSTOMER MoMoT0949007208T28725478788T970422T NAPTIEN359 - 30000)'),
(1054, '109078', 80000, 80000, 0, '2022-09-12 15:12:15', 'Mua VPS (#VPS Trial 2-4-126)'),
(1055, 'hovailonhd', 0, 80000, 80000, '2022-09-12 15:40:01', 'Nạp tiền tự động qua Ví Momo (#28727119089 - NAPTIEN265 - 80000)'),
(1056, 'hovailonhd', 80000, 80000, 0, '2022-09-12 15:40:50', 'Mua VPS (#VPS Trial 2-4-126)'),
(1057, 'huydayne', 0, 40000, 40000, '2022-09-12 17:45:03', 'Nạp tiền tự động qua Ví Momo (#28731542507 - NAPTIEN389 - 40000)'),
(1058, 'huydayne', 40000, 40000, 0, '2022-09-12 17:45:56', 'Mua VPS (#VPS Trial 1-1-126)'),
(1059, 'oggy893', 0, 40000, 40000, '2022-09-12 20:44:03', 'Nạp tiền tự động qua Mbbank (#FT22255349852999 - MB NAPTIEN390. TU: NGUYEN DAC ANH DUC - 40000)'),
(1060, 'oggy893', 40000, 40000, 0, '2022-09-12 20:44:59', 'Mua VPS (#VPS Trial 1-1-126)'),
(1061, 'Anhvipro010', 0, 80000, 80000, '2022-09-12 21:33:05', 'Nạp tiền tự động qua Ví Momo (#28739675452 - NAPTIEN386 - 80000)'),
(1062, 'Anhvipro010', 80000, 80000, 0, '2022-09-12 21:35:09', 'Mua VPS (#VPS Trial 2-4-126)'),
(1063, '01215266238', 300, 80000, 80300, '2022-09-12 22:36:04', 'Nạp tiền tự động qua Ví Momo (#28741779232 - NAPTIEN127 - 80000)'),
(1064, '01215266238', 80300, 80000, 300, '2022-09-12 22:36:27', 'Mua VPS (#VPS Trial 2-4-126)'),
(1065, 'Kakahuy', 0, 40000, 40000, '2022-09-13 08:18:04', 'Nạp tiền tự động qua Ví Momo (#28749149035 - NAPTIEN202 - 40000)'),
(1066, 'Kakahuy', 40000, 40000, 0, '2022-09-13 08:21:47', 'Mua VPS (#VPS Trial 1-1-126)'),
(1067, 'phonganddong', 0, 89500, 89500, '2022-09-14 10:02:24', 'Nạp tiền tự động qua card seri (10009420628953)'),
(1068, 'phonganddong', 89500, 80000, 9500, '2022-09-14 10:02:58', 'Mua VPS (#VPS Trial 2-4-126)'),
(1069, 'Thuocla79', 0, 40000, 40000, '2022-09-14 12:13:03', 'Nạp tiền tự động qua Ví Momo (#28792981359 - NAPTIEN323 - 40000)'),
(1070, 'Thuocla79', 40000, 40000, 0, '2022-09-14 12:13:36', 'Mua VPS (#VPS Trial 1-1-126)'),
(1071, 'minghieu1', 0, 180000, 180000, '2022-09-14 19:46:04', 'Nạp tiền tự động qua Mbbank (#FT22257334607737 - MB NAPTIEN146. TU: BUI MINH HIEU - 180000)'),
(1072, 'minghieu1', 180000, 180000, 0, '2022-09-14 21:27:29', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1073, 'bluexephoss', 0, 40000, 40000, '2022-09-15 11:13:03', 'Nạp tiền tự động qua Mbbank (#FT22258401097997 - CUSTOMER MBVCB 2454279251 018205 NAPTIEN401  CT tu 1017131610 PHAM NGOC TIN toi  0904657059 CAO NGOC QUANG LINH  MB   Quan Doi Trace 018205 - 40000)'),
(1074, 'bluexephoss', 40000, 40000, 0, '2022-09-15 11:55:40', 'Mua VPS (#VPS Trial 1-1-126)'),
(1075, '0358447622', 0, 40000, 40000, '2022-09-15 12:50:03', 'Nạp tiền tự động qua Mbbank (#FT22258782370428 - CUSTOMER MBVCB 2454719113 522441 NAPTIEN400  CT tu 1025142383 PHI THANH TUNG toi  0904657059 CAO NGOC QUANG LINH  MB   Quan Doi Trace 522441 - 40000)'),
(1076, '0358447622', 40000, 40000, 0, '2022-09-15 12:54:56', 'Mua VPS (#VPS Trial 1-1-126)'),
(1077, 'hotrongtai', 0, 40000, 40000, '2022-09-15 13:25:01', 'Nạp tiền tự động qua Ví Momo (#28855292716 - NAPTIEN402 - 40000)'),
(1078, 'hotrongtai', 40000, 40000, 0, '2022-09-15 13:25:18', 'Mua VPS (#VPS Trial 1-1-126)'),
(1079, 'Datka', 0, 17220, 17220, '2022-09-15 15:03:01', 'Nạp tiền tự động qua card seri (10009205039207)'),
(1080, 'Datka', 17220, 17220, 34440, '2022-09-15 15:03:26', 'Nạp tiền tự động qua card seri (10009205039208)'),
(1081, 'Datka', 34440, 8610, 43050, '2022-09-15 15:04:42', 'Nạp tiền tự động qua card seri (20000189332881)'),
(1082, 'Datka', 43050, 40000, 3050, '2022-09-15 15:09:06', 'Mua VPS (#VPS Trial 1-1-126)'),
(1083, 'Duong1301', 0, 40000, 40000, '2022-09-15 19:30:02', 'Nạp tiền tự động qua Ví Momo (#28868193876 - NAPTIEN404 - 40000)'),
(1084, 'Duong1301', 40000, 40000, 0, '2022-09-15 19:30:30', 'Mua VPS (#VPS Trial 1-1-126)'),
(1085, 'Tranhau3131', 0, 120000, 120000, '2022-09-16 09:04:03', 'Nạp tiền tự động qua Mbbank (#FT22259331581777 - TRAN MINH HAU MBVCB.2457003670.NAPTIEN360.CT TU 1 031001813 TOI 0904657059 CAO NGOC Q UANG LINH MB QUAN DOI. TU: TRAN MINH HAU - 120000)'),
(1086, 'Tranhau3131', 120000, 120000, 0, '2022-09-16 09:13:28', 'Mua VPS (#VPS Trial 2-8-126)'),
(1087, 'hoangvietkt', 9000, 80000, 89000, '2022-09-16 16:30:31', 'Nạp tiền tự động qua Ví Momo (#28899775955 - NAPTIEN266 - 80000)'),
(1088, 'hoangvietkt', 89000, 80000, 9000, '2022-09-16 16:34:16', 'Mua VPS (#VPS Trial 2-4-126)'),
(1089, 'Killer', 0, 80000, 80000, '2022-09-16 20:04:04', 'Nạp tiền tự động qua Mbbank (#FT22259922538411 - MB NAPTIEN143. TU: HO VAN DAT - 80000)'),
(1090, 'Killer', 80000, 80000, 0, '2022-09-16 20:07:17', 'Mua VPS (#VPS Trial 2-4-126)'),
(1091, 'Trunks555', 0, 40000, 40000, '2022-09-16 20:32:03', 'Nạp tiền tự động qua Mbbank (#FT22259888294511 - MB NAPTIEN14. TU: LUONG THAI BAO - 40000)'),
(1092, 'Trunks555', 40000, 40000, 0, '2022-09-16 20:33:34', 'Mua VPS (#VPS Trial 1-1-126)'),
(1093, 'Kiemvua', 0, 55000, 55000, '2022-09-17 11:51:03', 'Nạp tiền tự động qua Ví Momo (#28925044355 - NAPTIEN406 - 55000)'),
(1094, 'Kiemvua', 55000, 55000, 0, '2022-09-17 11:52:52', 'Mua VPS (#VPS Trial 1-2-126)'),
(1095, 'Kiemvua', 0, 55000, 55000, '2022-09-17 17:39:22', 'Admin jinvps cộng tiền (Rf)'),
(1096, 'Kiemvua', 55000, 55000, 0, '2022-09-17 17:40:31', 'Mua VPS (#VPS Trial 1-2-126)'),
(1097, 'Trunks555', 0, 40000, 40000, '2022-09-17 17:48:03', 'Nạp tiền tự động qua Ví Momo (#28935131614 - NAPTIEN14 - 40000)'),
(1098, 'Trunks555', 40000, 40000, 0, '2022-09-17 17:48:35', 'Mua VPS (#VPS Trial 1-1-126)'),
(1099, 'thanh050104', 0, 120000, 120000, '2022-09-17 18:46:03', 'Nạp tiền tự động qua Mbbank (#FT22260214283869 - CUSTOMER NAPTIEN231 Trace 704814 - 120000)'),
(1100, 'thanh050104', 120000, 120000, 0, '2022-09-17 18:46:23', 'Mua VPS (#VPS VN 1-2-20)'),
(1101, 'hoilamgiinc', 0, 40000, 40000, '2022-09-17 19:08:03', 'Nạp tiền tự động qua Ví Momo (#28937243140 - NAPTIEN36 - 40000)'),
(1102, 'hoilamgiinc', 40000, 40000, 0, '2022-09-17 19:08:31', 'Mua VPS (#VPS Trial 1-1-126)'),
(1103, 'daibeou2k5', 0, 55000, 55000, '2022-09-17 20:36:05', 'Nạp tiền tự động qua Mbbank (#FT22260020049404 - MB NAPTIEN410. TU: TRAN TRONG DAI - 55000)'),
(1104, 'daibeou2k5', 55000, 55000, 0, '2022-09-17 20:39:02', 'Mua VPS (#VPS Trial 1-2-126)'),
(1105, 'Trunks555', 0, 40000, 40000, '2022-09-17 21:36:01', 'Nạp tiền tự động qua Ví Momo (#28941168085 - NAPTIEN14 - 40000)'),
(1106, 'Trunks555', 40000, 40000, 0, '2022-09-17 21:36:32', 'Mua VPS (#VPS Trial 1-1-126)'),
(1107, 'nhattinh789', 0, 40000, 40000, '2022-09-18 12:06:03', 'Nạp tiền tự động qua Ví Momo (#28955486800 - NAPTIEN413 - 40000)'),
(1108, 'nhattinh789', 40000, 40000, 0, '2022-09-18 12:08:25', 'Mua VPS (#VPS Trial 1-1-126)'),
(1109, 'Khiemnong2007', 0, 40000, 40000, '2022-09-18 16:31:01', 'Nạp tiền tự động qua Ví Momo (#28962207651 - NAPTIEN414 - 40000)'),
(1110, 'Khiemnong2007', 40000, 40000, 0, '2022-09-18 16:32:07', 'Mua VPS (#VPS Trial 1-1-126)'),
(1111, 'nghiaprsv1', 0, 55000, 55000, '2022-09-19 14:16:04', 'Nạp tiền tự động qua Ví Momo (#28990707909 - NAPTIEN418 - 55000)'),
(1112, 'nghiaprsv1', 55000, 55000, 0, '2022-09-19 14:16:16', 'Mua VPS (#VPS Trial 1-2-126)'),
(1113, 'hung8496', 0, 40000, 40000, '2022-09-19 16:19:04', 'Nạp tiền tự động qua Ví Momo (#28995171427 - NAPTIEN417 - 40000)'),
(1114, 'hung8496', 40000, 40000, 0, '2022-09-19 16:20:06', 'Mua VPS (#VPS Trial 1-1-126)'),
(1115, '0327538883', 0, 80000, 80000, '2022-09-20 16:47:04', 'Nạp tiền tự động qua Mbbank (#FT22263008137380 - CUSTOMER NAPTIEN423 Trace 444416 - 80000)'),
(1116, '0327538883', 80000, 80000, 0, '2022-09-20 17:07:58', 'Mua VPS (#VPS Trial 2-4-126)'),
(1117, 'hieusz', 0, 40000, 40000, '2022-09-20 19:46:04', 'Nạp tiền tự động qua Ví Thesieure (#T12267467 - NAPTIEN424 - 40000)'),
(1118, 'hieusz', 40000, 40000, 0, '2022-09-20 19:47:40', 'Mua VPS (#VPS Trial 1-1-126)'),
(1119, 'QuanNQ', 0, 40000, 40000, '2022-09-21 07:20:01', 'Nạp tiền tự động qua Ví Momo (#29050495777 - NAPTIEN427 - 40000)'),
(1120, 'QuanNQ', 40000, 40000, 0, '2022-09-21 07:25:24', 'Mua VPS (#VPS Trial 1-1-126)'),
(1121, 'Abybabyb', 0, 80000, 80000, '2022-09-22 08:23:03', 'Nạp tiền tự động qua Mbbank (#FT22265236632848 - CUSTOMER MB 0904657059 naptien428 Trace 7133 29 - 80000)'),
(1122, 'Abybabyb', 80000, 80000, 0, '2022-09-22 08:25:13', 'Mua VPS (#VPS Trial 2-4-126)'),
(1123, 'songloimr', 0, 55000, 55000, '2022-09-22 10:54:04', 'Nạp tiền tự động qua Mbbank (#FT22265100702057 - MB NAPTIEN429. TU: NGO TUAN KIET - 55000)'),
(1124, 'songloimr', 55000, 55000, 0, '2022-09-22 10:55:01', 'Mua VPS (#VPS Trial 1-2-126)'),
(1125, '01215266238', 300, 40000, 40300, '2022-09-22 11:46:03', 'Nạp tiền tự động qua Ví Momo (#29092332488 - NAPTIEN127 - 40000)'),
(1126, '01215266238', 40300, 40000, 300, '2022-09-22 11:51:20', 'Mua VPS (#VPS Trial 1-1-126)'),
(1127, 'kienle565', 0, 40000, 40000, '2022-09-22 20:45:04', 'Nạp tiền tự động qua Mbbank (#FT22265421245064 - CUSTOMER NAPTIEN421 Trace 700351 - 40000)'),
(1128, 'kienle565', 40000, 40000, 0, '2022-09-22 20:45:21', 'Mua VPS (#VPS Trial 1-1-126)'),
(1129, 'minhhiu24', 0, 80000, 80000, '2022-09-23 16:53:02', 'Nạp tiền tự động qua Ví Momo (#29135906363 - NAPTIEN430 - 80000)'),
(1130, 'minhhiu24', 80000, 80000, 0, '2022-09-23 16:53:21', 'Mua VPS (#VPS Trial 2-4-126)'),
(1131, 'minhhiu24', 0, 80001, 80001, '2022-09-23 20:05:02', 'Nạp tiền tự động qua Ví Momo (#29142139343 - NAPTIEN430 - 80001)'),
(1132, 'minhhiu24', 80001, 80000, 1, '2022-09-23 20:06:47', 'Mua VPS (#VPS Trial 2-4-126)'),
(1133, 'sinh4322', 0, 90000, 90000, '2022-09-23 20:50:01', 'Nạp tiền tự động qua Ví Momo (#29143471765 - NAPTIEN432 - 90000)'),
(1134, 'sinh4322', 90000, 90000, 0, '2022-09-23 20:50:34', 'Mua VPS (#VPS VN 1-1-20)'),
(1135, 'zint', 0, 80000, 80000, '2022-09-23 21:47:15', 'Admin jinvps cộng tiền (khách nạp atm)'),
(1136, 'zint', 80000, 80000, 0, '2022-09-23 21:47:33', 'Mua VPS (#VPS Trial 2-4-126)'),
(1137, 'lamdasilva', 0, 40000, 40000, '2022-09-23 21:48:02', 'Nạp tiền tự động qua Ví Momo (#29144767352 - NAPTIEN433 - 40000)'),
(1138, 'lamdasilva', 40000, 40000, 0, '2022-09-23 21:48:22', 'Mua VPS (#VPS Trial 1-1-126)'),
(1139, 'zint', 0, 80000, 80000, '2022-09-23 22:35:01', 'Nạp tiền tự động qua Mbbank (#FT22266104739760 - CUSTOMER naptien434 Trace 115463 - 80000)'),
(1140, 'trungdz1', 0, 55000, 55000, '2022-09-24 19:59:03', 'Nạp tiền tự động qua Ví Momo (#29173455507 - NAPTIEN436 - 55000)'),
(1141, 'trungdz1', 55000, 55000, 0, '2022-09-24 20:03:02', 'Mua VPS (#VPS Trial 1-2-126)'),
(1142, 'minhhiu24', 1, 80000, 80001, '2022-09-25 11:55:05', 'Nạp tiền tự động qua Ví Momo (#29191523082 - NAPTIEN430 - 80000)'),
(1143, 'minhhiu24', 80001, 80000, 1, '2022-09-25 11:55:20', 'Mua VPS (#VPS Trial 2-4-126)'),
(1144, '0878035019', 0, 40000, 40000, '2022-09-25 12:38:03', 'Nạp tiền tự động qua Ví Momo (#29192771880 - NAPTIEN437 - 40000)'),
(1145, '0878035019', 40000, 40000, 0, '2022-09-25 12:38:15', 'Mua VPS (#VPS Trial 1-1-126)'),
(1146, 'nguyentuandat', 0, 180000, 180000, '2022-09-25 15:22:03', 'Nạp tiền tự động qua Mbbank (#FT22269779109086 - MB NAPTIEN438. TU: NGUYEN TUAN DAT - 180000)'),
(1147, 'nguyentuandat', 180000, 180000, 0, '2022-09-25 15:22:21', 'Mua VPS (#VPS Trial 4-8-126)'),
(1148, 'luvanthanh', 10000, 30000, 40000, '2022-09-25 23:53:03', 'Nạp tiền tự động qua Ví Momo (#29214779582 - NAPTIEN104 - 30000)'),
(1149, 'luvanthanh', 40000, 40000, 0, '2022-09-25 23:54:20', 'Mua VPS (#VPS Trial 1-1-126)'),
(1150, 'LongNhi', 0, 40000, 40000, '2022-09-26 07:24:01', 'Nạp tiền tự động qua Ví Momo (#29218063669 - NAPTIEN440 - 40000)'),
(1151, 'LongNhi', 40000, 40000, 0, '2022-09-26 07:24:06', 'Mua VPS (#VPS Trial 1-1-126)'),
(1152, 'songloimr', 0, 55000, 55000, '2022-09-26 17:01:39', 'Admin jinvps cộng tiền (Khách nạp atm)'),
(1153, 'dctyasuo', 0, 80000, 80000, '2022-09-26 23:44:03', 'Nạp tiền tự động qua Mbbank (#FT22269817306821 - CUSTOMER NAPTIEN89 Trace 985791 - 80000)'),
(1154, 'dctyasuo', 80000, 80000, 0, '2022-09-27 04:08:12', 'Mua VPS (#VPS Trial 2-4-126)'),
(1155, 'dctyasuo', 0, 80000, 80000, '2022-09-27 06:07:16', 'Admin jinvps cộng tiền (Rf)');
INSERT INTO `dongtien` (`id`, `username`, `sotientruoc`, `sotienthaydoi`, `sotiensau`, `thoigian`, `noidung`) VALUES
(1156, 'jinvps', 0, 40000, 40000, '2022-09-27 06:10:36', 'Admin jinvps cộng tiền (Test)'),
(1157, 'jinvps', 40000, 40000, 0, '2022-09-27 06:10:51', 'Mua VPS (#VPS Trial 1-1-126)'),
(1158, 'dctyasuo', 80000, 80000, 0, '2022-09-27 06:16:37', 'Mua VPS (#VPS Trial 2-4-126)'),
(1159, 'Khai02012001', 0, 90000, 90000, '2022-09-27 13:12:01', 'Nạp tiền tự động qua Mbbank (#FT22270007058601 - NAPTIEN245 - 90000)'),
(1160, 'Khai02012001', 90000, 90000, 0, '2022-09-27 14:27:15', 'Admin jinvps trừ tiền (Gia hạn vps VN)'),
(1161, 'chicken123', 2088, 111, 1977, '2022-09-27 14:49:10', 'Mua VPS (#VPS USA - Locdz1 TEST)'),
(1162, 'Haiponn', 0, 55000, 55000, '2022-09-27 18:50:02', 'Nạp tiền tự động qua Ví Momo (#29271791288 - NAPTIEN450 - 55000)'),
(1163, 'Haiponn', 55000, 55000, 0, '2022-09-27 18:50:27', 'Mua VPS (#VPS Trial 1-2-126)'),
(1164, 'naruto1s2', 0, 80000, 80000, '2022-09-27 21:39:04', 'Nạp tiền tự động qua Ví Momo (#29276277510 - NAPTIEN453 - 80000)'),
(1165, 'naruto1s2', 80000, 80000, 0, '2022-09-27 21:41:15', 'Mua VPS (#VPS Trial 2-4-126)'),
(1166, 'gamexvuive', 0, 500000, 500000, '2022-09-27 22:12:03', 'Nạp tiền tự động qua Mbbank (#FT22270060326172 - CUSTOMER NAPTIEN451 FT22271293175672 Trace 7 13941 - 500000)'),
(1167, 'gamexvuive', 500000, 250000, 250000, '2022-09-27 22:38:35', 'Mua VPS (#VPS Trial 4-16-126)'),
(1168, 'gamexvuive', 250000, 250000, 500000, '2022-09-27 23:01:58', 'Admin jinvps cộng tiền ()'),
(1169, 'gamexvuive', 500000, 250000, 250000, '2022-09-27 23:05:21', 'Mua VPS (#VPS Trial 4-16-126)'),
(1170, 'Haiponn', 0, 80000, 80000, '2022-09-28 13:58:02', 'Nạp tiền tự động qua Ví Momo (#29294640170 - NAPTIEN450 - 80000)'),
(1171, 'Haiponn', 80000, 80000, 0, '2022-09-28 13:58:20', 'Mua VPS (#VPS Trial 2-4-126)'),
(1172, '0968710828', 8000, 82000, 90000, '2022-09-28 16:46:08', 'Nạp tiền tự động qua Mbbank (#FT22271040684060 - CUSTOMER MB 0904657059 NAPTIEN310 Trace 3090 15 - 82000)'),
(1173, '0968710828', 90000, 90000, 0, '2022-09-28 16:46:56', 'Mua VPS (#VPS VN 1-1-20)'),
(1174, 'banhbao', 0, 40000, 40000, '2022-09-28 17:23:03', 'Nạp tiền tự động qua Mbbank (#FT22271131873572 - MB NAPTIEN460. TU: NGUYEN MANH THAI - 40000)'),
(1175, 'banhbao', 40000, 40000, 0, '2022-09-28 17:23:26', 'Mua VPS (#VPS Trial 1-1-126)'),
(1176, 'LongNhi', 0, 43200, 43200, '2022-09-28 18:15:28', 'Nạp tiền tự động qua card seri (10009355627131)'),
(1177, 'dongockimtrinh', 0, 80000, 80000, '2022-09-28 19:36:02', 'Nạp tiền tự động qua Ví Momo (#29304325269 - NAPTIEN271 - 80000)'),
(1178, 'dongockimtrinh', 80000, 80000, 0, '2022-09-28 19:37:50', 'Mua VPS (#VPS Trial 2-4-126)'),
(1179, 'keyofficial', 0, 40000, 40000, '2022-09-28 20:30:01', 'Nạp tiền tự động qua Ví Momo (#29306211425 - NAPTIEN461 - 40000)'),
(1180, 'keyofficial', 40000, 40000, 0, '2022-09-28 20:30:39', 'Mua VPS (#VPS Trial 1-1-126)'),
(1181, '', 0, 80000, 80000, '2022-09-30 12:12:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664514723689-2e23445083359a11c2ba0a637573cb613279ed2244de8c0ad854443d02752713 - NAPTIEN425 FT22273049730988 - 80000)'),
(1182, '', 0, 80000, 80000, '2022-09-30 12:13:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664514784314-519e7be70f59cc9d777696ee92d895bc39753037498c92220a722a59cf34ae88 - NAPTIEN425 FT22273049730988 - 80000)'),
(1183, '', 0, 80000, 80000, '2022-09-30 12:14:02', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664514842734-f8199f715c5bf6530bd203168fbcd030758f31a9a43e8145afc99d8292240ce4 - NAPTIEN425 FT22273049730988 - 80000)'),
(1184, '', 0, 80000, 80000, '2022-09-30 12:15:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664514901821-60d9a5a4b2c1377c3f19d4abbdabff6473d04808e08139b68e8db43dfb0d849f - NAPTIEN425 FT22273049730988 - 80000)'),
(1185, '', 0, 80000, 80000, '2022-09-30 12:16:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664514964204-b10d0aaab272ce9a297771a7f0251ebc00fe8287930deb999c0a1e47cdc756c2 - NAPTIEN425 FT22273049730988 - 80000)'),
(1186, '', 0, 80000, 80000, '2022-09-30 12:17:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515023608-46576ebd5c9c64217f9d40a662e32361aeb691c0c4052ed3e5ee4525b5cd12fe - NAPTIEN425 FT22273049730988 - 80000)'),
(1187, '', 0, 80000, 80000, '2022-09-30 12:18:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515081895-acf25618535319ab035757eac0630b35389d56e3021790f1e520a96110a95ed0 - NAPTIEN425 FT22273049730988 - 80000)'),
(1188, '', 0, 80000, 80000, '2022-09-30 12:19:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515144055-ca3b1fc78ded3ed6d7ce0c2bdc8fc10e3e6484ac5ea39aa228b7694d15725659 - NAPTIEN425 FT22273049730988 - 80000)'),
(1189, '', 0, 80000, 80000, '2022-09-30 12:20:02', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515202000-9f2d061d346c59a0697b02ba880a8dc5d2a9bba1943d878d2abe4669042754d8 - NAPTIEN425 FT22273049730988 - 80000)'),
(1190, '', 0, 80000, 80000, '2022-09-30 12:21:02', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515262799-263360bb9e247535513dd0d61f155319f534759baaa23475a53148ab8d4e2350 - NAPTIEN425 FT22273049730988 - 80000)'),
(1191, '', 0, 80000, 80000, '2022-09-30 12:22:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515323326-398cff8ec9c0a614fd4703e92a0ee00658a0c3498ff75167b43b39d5fc57755b - NAPTIEN425 FT22273049730988 - 80000)'),
(1192, '', 0, 80000, 80000, '2022-09-30 12:23:02', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515382907-de4df4e5cbc5f5b2442c814d4317a1c36b6f0dcc14344555ee7ab7577c691b1e - NAPTIEN425 FT22273049730988 - 80000)'),
(1193, '', 0, 80000, 80000, '2022-09-30 12:24:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515443592-ebb79da7df14715e2c010fffd390b3c489b5da91936d0a9fb58114c48b3cd571 - NAPTIEN425 FT22273049730988 - 80000)'),
(1194, '', 0, 80000, 80000, '2022-09-30 12:25:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515501683-3528c49e04f1b97e42bc10685ec220a74e711e41681f865d150a278cd922d772 - NAPTIEN425 FT22273049730988 - 80000)'),
(1195, '', 0, 80000, 80000, '2022-09-30 12:26:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515563235-fc34f5a244819427fb4c41c83ea6ce644cfedb21c14321f90bb3ec427dc1762b - NAPTIEN425 FT22273049730988 - 80000)'),
(1196, '', 0, 80000, 80000, '2022-09-30 12:28:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515681804-5258d8ba258981948305bf238cc9bf1fa0135cf3f410c214b7f2bec66fed1c4c - NAPTIEN425 FT22273049730988 - 80000)'),
(1197, '', 0, 80000, 80000, '2022-09-30 12:29:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515743139-2b129dc2ae211537ccf3c072afa6409a67a7fffcab04d4b05a70317130bcae8d - NAPTIEN425 FT22273049730988 - 80000)'),
(1198, '', 0, 80000, 80000, '2022-09-30 12:30:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515801748-4c5c5819dfa745461326402cb9f344af9f36d33df072da36f3b6bffd2133d65d - NAPTIEN425 FT22273049730988 - 80000)'),
(1199, '', 0, 80000, 80000, '2022-09-30 12:31:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515861602-b23c5bc33dcff2821c23c9bf4d039ef6e8130154333a06243ec78d2fb4202549 - NAPTIEN425 FT22273049730988 - 80000)'),
(1200, '', 0, 80000, 80000, '2022-09-30 12:32:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515923999-d6e2373641f65b6ff9864d31023e4122e5db52d937bfaa24ed57e3d742529a8c - NAPTIEN425 FT22273049730988 - 80000)'),
(1201, '', 0, 80000, 80000, '2022-09-30 12:33:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664515983177-091a67552b18101686d4850aa33fcb36294d4ba1fd2ea6195d415add0ebea4d2 - NAPTIEN425 FT22273049730988 - 80000)'),
(1202, '', 0, 80000, 80000, '2022-09-30 12:34:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516044322-2046217839eb75358fb88c3b2363fe4b88aaa802838b54883cc7da46fa0ff542 - NAPTIEN425 FT22273049730988 - 80000)'),
(1203, '', 0, 80000, 80000, '2022-09-30 12:35:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516104269-6fbcd52d7285c7cca1615bfb844e37ae3189e13056a432d3ad8905c82be04869 - NAPTIEN425 FT22273049730988 - 80000)'),
(1204, '', 0, 80000, 80000, '2022-09-30 12:36:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516164284-87584a91f027d91f4118a03b91d7fd7788ff4b02dd5b21e8cb5f1ce8f1bb7c9f - NAPTIEN425 FT22273049730988 - 80000)'),
(1205, '', 0, 80000, 80000, '2022-09-30 12:37:15', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516235007-90e45dfe237c03417455490e5d7c4e7bf9815919c53f79136dc63b212cd434b2 - NAPTIEN425 FT22273049730988 - 80000)'),
(1206, '', 0, 80000, 80000, '2022-09-30 12:38:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516283877-4c44453cf7de97bf1ea059904b49d52a7b4e3f6034740761f6ca1b0c3340752a - NAPTIEN425 FT22273049730988 - 80000)'),
(1207, '', 0, 80000, 80000, '2022-09-30 12:39:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516341825-402f7b18d4f44495eb814f695aba38f710c6b9628ac8b66f742c5d4f7aef0963 - NAPTIEN425 FT22273049730988 - 80000)'),
(1208, '', 0, 80000, 80000, '2022-09-30 12:40:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516403788-16fc224aae1bbd48f977824bb8df81e66ce69f9919fb68477fa35d0b1e9d08f5 - NAPTIEN425 FT22273049730988 - 80000)'),
(1209, '', 0, 80000, 80000, '2022-09-30 12:41:02', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516462111-057d9553b7692ad0ca5b92bd7a7f2162f39cdc4d3850c65fc6ab054e8bc0b403 - NAPTIEN425 FT22273049730988 - 80000)'),
(1210, '', 0, 80000, 80000, '2022-09-30 12:42:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516521820-7b619b8de8ba5dc326acceac95a90a92f01335f135df824bf71c16a2348707c3 - NAPTIEN425 FT22273049730988 - 80000)'),
(1211, '', 0, 80000, 80000, '2022-09-30 12:44:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516643645-744393204ba2dcb486cfac0bfadbe62fdaf93699e2e7e9498066f962ef9eac7b - NAPTIEN425 FT22273049730988 - 80000)'),
(1212, '', 0, 80000, 80000, '2022-09-30 12:45:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516703837-6b9b02aa74fdc413549a07c4d776819e72c1132b26e87cfa1f23a2de0848c8cc - NAPTIEN425 FT22273049730988 - 80000)'),
(1213, '', 0, 80000, 80000, '2022-09-30 12:46:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516761672-c264651c1b39dbc4ad19b9d2317e1c66e2aa3d5a0b55b83c068609fb602403ef - NAPTIEN425 FT22273049730988 - 80000)'),
(1214, '', 0, 80000, 80000, '2022-09-30 12:47:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516821847-f115ba357022b916b99d8b8be7a2ea296d363b54dfd08e75d34833cae9e84028 - NAPTIEN425 FT22273049730988 - 80000)'),
(1215, '', 0, 80000, 80000, '2022-09-30 12:48:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516883845-dd99000b4a63966a449d6f806a39a5a3404c29cdb98118a05844629c91e81e56 - NAPTIEN425 FT22273049730988 - 80000)'),
(1216, '', 0, 80000, 80000, '2022-09-30 12:49:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664516941817-3a2cdaeb549f3041a74107223c13ecc339c3da69927cee663b694768fd729bb3 - NAPTIEN425 FT22273049730988 - 80000)'),
(1217, '', 0, 80000, 80000, '2022-09-30 12:50:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517001690-5b3857e3a207421a7a3b877d5c8e883ce7a8866f6af45972b006edcc461c8cd9 - NAPTIEN425 FT22273049730988 - 80000)'),
(1218, '', 0, 80000, 80000, '2022-09-30 12:51:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517064386-79346843ed2199084b2854dc2f2be8835b1dde53145b507a59d6f1abfb1a0d2e - NAPTIEN425 FT22273049730988 - 80000)'),
(1219, '', 0, 80000, 80000, '2022-09-30 12:52:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517123245-93ad2efa0a3eebb87fe22a168ecb6544fa320362440e3937f24f35dd5d18e25d - NAPTIEN425 FT22273049730988 - 80000)'),
(1220, '', 0, 80000, 80000, '2022-09-30 12:53:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517183839-175320904731b28a927256f0ce9b55355390653fe22c934a3d451da92c7ffee4 - NAPTIEN425 FT22273049730988 - 80000)'),
(1221, '', 0, 80000, 80000, '2022-09-30 12:54:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517243799-ed5829833d42cba86c1087cad5e1c65d61abde6aa5aa3274a0b109b00ec23bb9 - NAPTIEN425 FT22273049730988 - 80000)'),
(1222, '', 0, 80000, 80000, '2022-09-30 12:55:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517304824-e9ace3b6afc9b19689870f895532b617b524088257f3abfc1c470c82cbaa0dd4 - NAPTIEN425 FT22273049730988 - 80000)'),
(1223, '', 0, 80000, 80000, '2022-09-30 12:56:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517363260-28f4db483cb8e11755f67fd8bcf33274cdff2f4855760f7c0333fb631d813930 - NAPTIEN425 FT22273049730988 - 80000)'),
(1224, '', 0, 80000, 80000, '2022-09-30 12:57:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517421826-ccbf6cc980b6dd2b2d18108c3d935be1befa3c09fd25807aca37a9d400b46249 - NAPTIEN425 FT22273049730988 - 80000)'),
(1225, '', 0, 80000, 80000, '2022-09-30 12:58:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517481769-95a8c5a5232fba5070cd483c623df9e98568feb4c4c41ecf679db9ef24559d01 - NAPTIEN425 FT22273049730988 - 80000)'),
(1226, 'vbaooo', 3600000, 80000, 3520000, '2022-09-30 12:58:49', 'Mua VPS (#VPS Trial 2-4-126)'),
(1227, '', 0, 80000, 80000, '2022-09-30 13:00:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517601643-f289fcd46033f860f39ae96bca538f223e6e21de85180cfa0642c99173d092d7 - NAPTIEN425 FT22273049730988 - 80000)'),
(1228, '', 0, 80000, 80000, '2022-09-30 13:01:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517661766-b4aa238971ca822b7a802ab5a1f0bb4c7dffb6eb92d5fa05f52db197ea6b56e1 - NAPTIEN425 FT22273049730988 - 80000)'),
(1229, '', 0, 80000, 80000, '2022-09-30 13:02:04', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517724319-ad5c47951ed612c27de1687adf489113a51949b54c484f2fd75b557d413b86ed - NAPTIEN425 FT22273049730988 - 80000)'),
(1230, '', 0, 80000, 80000, '2022-09-30 13:03:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517783001-0b7cf3c4eeeadd31aadefbd9e8326a77360c2aa1f378fecf9a814566b59e48e6 - NAPTIEN425 FT22273049730988 - 80000)'),
(1231, '', 0, 80000, 80000, '2022-09-30 13:04:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517841818-d72b52894e871534e4279368019c94700b3e3c82470d4da5374a1b6a7bc235c1 - NAPTIEN425 FT22273049730988 - 80000)'),
(1232, '', 0, 80000, 80000, '2022-09-30 13:05:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517903655-ca19986ee7ae9b02dc3715565f282b9da177ec7b0eb8e059a46bebf55805a799 - NAPTIEN425 FT22273049730988 - 80000)'),
(1233, 'vbaooo', 4000000, 400000, 3600000, '2022-09-30 13:05:59', 'Mua VPS (#VPS Đặc Biệt 4-8-20)'),
(1234, '', 0, 80000, 80000, '2022-09-30 13:06:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664517963655-c7b71b4dce1369f17a6af45d06536ce3f76e7f5cb74c2c1471970dbcbbbb4eda - NAPTIEN425 FT22273049730988 - 80000)'),
(1235, 'vbaooo', 3680000, 3680000, 0, '2022-09-30 13:07:02', 'Admin jinvps trừ tiền ()'),
(1236, '', 0, 80000, 80000, '2022-09-30 13:07:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664518023825-949c77ad0571668762743f7778d861197017243a0ba301dfe46fe6a9ad820611 - NAPTIEN425 FT22273049730988 - 80000)'),
(1237, 'vbaooo', 80000, 80000, 0, '2022-09-30 13:07:10', 'Admin jinvps trừ tiền ()'),
(1238, '', 0, 80000, 80000, '2022-09-30 13:08:01', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664518081873-02be281fda04ae5ae5e1d80d870e874fb442d7558a8bc69d149156c130ebf2e6 - NAPTIEN425 FT22273049730988 - 80000)'),
(1239, '', 0, 80000, 80000, '2022-09-30 13:09:03', 'Nạp tiền tự động qua TPBank (#11105042005,VND-1664518143670-dd15ad59460059ab44500661ee1cf5004508774d007c9fe025530437ae893e1f - NAPTIEN425 FT22273049730988 - 80000)'),
(1240, 'vbaooo', 160000, 80000, 80000, '2022-09-30 13:09:12', 'Mua VPS (#VPS Trial 2-4-126)'),
(1241, 'vbaooo', 80000, 80000, 0, '2022-09-30 16:47:47', 'Mua VPS (#VPS Trial 2-4-126)'),
(1242, 'khoatran06', 0, 40000, 40000, '2022-09-30 18:58:02', 'Nạp tiền tự động qua Ví Momo (#29368162306 - NAPTIEN472 - 40000)'),
(1243, 'khoatran06', 40000, 40000, 0, '2022-09-30 18:58:34', 'Mua VPS (#VPS Trial 1-1-126)'),
(1244, 'hungdo1388', 0, 40000, 40000, '2022-09-30 21:17:02', 'Nạp tiền tự động qua Ví Momo (#29372629187 - NAPTIEN367 - 40000)'),
(1245, 'hungdo1388', 40000, 40000, 0, '2022-09-30 21:18:12', 'Mua VPS (#VPS Trial 1-1-126)'),
(1246, 'hungdo1388', 0, 40000, 40000, '2022-09-30 21:28:03', 'Nạp tiền tự động qua Ví Momo (#29372654352 - NAPTIEN367 - 40000)'),
(1247, 'hungdo1388', 40000, 40000, 0, '2022-09-30 21:28:22', 'Mua VPS (#VPS Trial 1-1-126)'),
(1248, 'vipvcl02', 0, 40000, 40000, '2022-10-02 11:43:02', 'Nạp tiền tự động qua Mbbank (#FT22276988309373 - CUSTOMER NAPTIEN200 Trace 486327 - 40000)'),
(1249, 'vipvcl02', 40000, 40000, 0, '2022-10-02 11:45:11', 'Mua VPS (#VPS Trial 1-1-126)'),
(1250, '109078', 0, 40000, 40000, '2022-10-02 20:59:46', 'Admin jinvps cộng tiền (Nạp mm)'),
(1251, '109078', 40000, 40000, 0, '2022-10-02 21:01:00', 'Mua VPS (#VPS Trial 1-1-126)'),
(1252, 'dinhvanduy103', 0, 90000, 90000, '2022-10-03 01:12:02', 'Nạp tiền tự động qua Ví Momo (#29445031568 - NAPTIEN246 - 90000)'),
(1253, 'dinhvanduy103', 90000, 90000, 0, '2022-10-03 01:15:36', 'Mua VPS (#VPS VN 1-1-20)'),
(1254, 'huykx001', 0, 44350, 44350, '2022-10-03 19:09:16', 'Nạp tiền tự động qua card seri (10009347916545)'),
(1255, 'huykx001', 44350, 50000, 94350, '2022-10-03 19:19:31', 'Nạp tiền tự động qua Mbbank (#FT22276500754017 - CUSTOMER NAPTIEN339 FT22276633494350 Trace 6 55715 - 50000)'),
(1256, 'huykx001', 94350, 90000, 4350, '2022-10-03 20:14:53', 'Mua VPS (#VPS VN 1-1-20)'),
(1257, 'linh041120044', 9000, 85000, 94000, '2022-10-03 21:51:01', 'Nạp tiền tự động qua Ví Momo (#29477510708 - NAPTIEN303 - 85000)'),
(1258, 'linh041120044', 94000, 90000, 4000, '2022-10-03 21:51:29', 'Mua VPS (#VPS VN 1-1-20)'),
(1259, 'nt9909', 0, 100000, 100000, '2022-10-05 00:32:05', 'Nạp tiền tự động qua Mbbank (#FT22277675577126 - CUSTOMER NAPTIEN483 - 100000)'),
(1260, 'phuonglh2812', 0, 120000, 120000, '2022-10-05 12:07:03', 'Nạp tiền tự động qua Mbbank (#FT22278425090010 - MB Naptien486. TU: LE HOANG PHUONG - 120000)'),
(1261, 'phuonglh2812', 120000, 40000, 80000, '2022-10-05 12:07:19', 'Mua VPS (#VPS Trial 1-1-126)'),
(1262, 'phuonglh2812', 80000, 40000, 40000, '2022-10-05 12:08:55', 'Mua VPS (#VPS Trial 1-1-126)'),
(1263, 'phuonglh2812', 40000, 40000, 0, '2022-10-05 12:09:13', 'Mua VPS (#VPS Trial 1-1-126)'),
(1264, 'anhtaivp', 0, 40000, 40000, '2022-10-05 12:31:01', 'Nạp tiền tự động qua Mbbank (#FT22278822717481 - CUSTOMER NAPTIEN485 Trace 403398 - 40000)'),
(1265, 'anhtaivp', 40000, 40000, 0, '2022-10-05 12:31:21', 'Mua VPS (#VPS Trial 1-1-126)'),
(1266, 'hieuchange', 0, 80000, 80000, '2022-10-05 16:06:02', 'Nạp tiền tự động qua Mbbank (#FT22278424781080 - CUSTOMER MBVCB 2531430195 076337 NAPTIEN488  CT tu 1026403891 NGUYEN MINH HIEU t oi 0904657059 CAO NGOC QUANG LINH   MB  Quan Doi Trace 076337 - 80000)'),
(1267, 'hieuchange', 80000, 80000, 0, '2022-10-05 16:06:37', 'Mua VPS (#VPS Trial 2-4-126)'),
(1268, 'havinkhang', 0, 40000, 40000, '2022-10-05 18:50:02', 'Nạp tiền tự động qua Ví Momo (#29543176648 - NAPTIEN340 - 40000)'),
(1269, 'havinkhang', 40000, 40000, 0, '2022-10-05 18:50:44', 'Mua VPS (#VPS Trial 1-1-126)'),
(1270, 'tuancamdo', 0, 55000, 55000, '2022-10-05 20:37:32', 'Nạp tiền tự động qua Ví Momo (#29547045668 - NAPTIEN489 - 55000)'),
(1271, 'tuancamdo', 55000, 55000, 0, '2022-10-05 20:38:04', 'Mua VPS (#VPS Trial 1-2-126)'),
(1272, 'Buiduyhuyhd97', 18000, 170000, 188000, '2022-10-05 22:59:04', 'Nạp tiền tự động qua Ví Momo (#29551846741 - NAPTIEN306 - 170000)'),
(1273, 'Buiduyhuyhd97', 188000, 180000, 8000, '2022-10-05 23:01:28', 'Mua VPS (#VPS Trial 4-8-126)'),
(1274, 'nhattinh789', 0, 40000, 40000, '2022-10-05 23:26:05', 'Nạp tiền tự động qua Mbbank (#FT22279620128278 - MB NAPTIEN413. TU: NGUYEN NHAT TINH - 40000)'),
(1275, 'nhattinh789', 40000, 40000, 0, '2022-10-06 07:18:49', 'Mua VPS (#VPS Trial 1-1-126)'),
(1276, '109078', 0, 40000, 40000, '2022-10-06 16:25:02', 'Nạp tiền tự động qua Ví Momo (#29575912570 - NAPTIEN359 - 40000)'),
(1277, '109078', 40000, 40000, 0, '2022-10-06 16:25:15', 'Mua VPS (#VPS Trial 1-1-126)'),
(1278, 'maianh1708', 0, 55000, 55000, '2022-10-07 14:58:02', 'Nạp tiền tự động qua Mbbank (#FT22280201305738 - MB NAPTIEN498. TU: NGUYEN TUAN ANH - 55000)'),
(1279, 'maianh1708', 55000, 55000, 0, '2022-10-07 14:58:09', 'Mua VPS (#VPS Trial 1-2-126)'),
(1280, '01215266238', 300, 80000, 80300, '2022-10-07 20:49:02', 'Nạp tiền tự động qua Ví Momo (#29623049466 - NAPTIEN127 - 80000)'),
(1281, 'longhoang00045', 0, 70000, 70000, '2022-10-07 21:01:04', 'Nạp tiền tự động qua Mbbank (#FT22280111588333 - NAPTIEN500 - 70000)'),
(1282, 'longhoang00045', 70000, 70000, 0, '2022-10-07 21:03:30', 'Mua VPS (#NAT VPS 1-1-20)'),
(1283, '01215266238', 80300, 80000, 300, '2022-10-07 22:04:33', 'Mua VPS (#VPS Trial 2-4-126)'),
(1284, 'b0can3', 0, 55000, 55000, '2022-10-08 08:56:03', 'Nạp tiền tự động qua Ví Momo (#29634537016 - NAPTIEN247 - 55000)'),
(1285, 'b0can3', 55000, 55000, 0, '2022-10-08 08:56:44', 'Mua VPS (#VPS Trial 1-2-126)'),
(1286, 'phambinhminh', 0, 40000, 40000, '2022-10-08 10:39:05', 'Nạp tiền tự động qua Mbbank (#FT22281090520270 - MB NAPTIEN501. TU: PHAM BINH MINH - 40000)'),
(1287, 'phambinhminh', 40000, 40000, 0, '2022-10-08 10:48:51', 'Mua VPS (#VPS Trial 1-1-126)'),
(1288, '0829332494', 4100, 100000, 104100, '2022-10-08 12:31:01', 'Nạp tiền tự động qua Ví Momo (#29642048905 - NAPTIEN376 - 100000)'),
(1289, '0829332494', 104100, 80000, 24100, '2022-10-08 12:31:36', 'Mua VPS (#VPS Trial 2-4-126)'),
(1290, 'wanghib', 0, 40000, 40000, '2022-10-08 14:49:05', 'Nạp tiền tự động qua Ví Momo (#29645645084 - NAPTIEN502 - 40000)'),
(1291, 'wanghib', 40000, 40000, 0, '2022-10-08 14:49:52', 'Mua VPS (#VPS Trial 1-1-126)'),
(1292, 'lethang', 0, 100000, 100000, '2022-10-08 17:32:02', 'Nạp tiền tự động qua Mbbank (#FT22281330376813 - CUSTOMER naptien503 Trace 430572 - 100000)'),
(1293, 'lethang', 100000, 55000, 45000, '2022-10-08 17:32:48', 'Mua VPS (#VPS Trial 1-2-126)'),
(1294, 'lethang', 45000, 40000, 5000, '2022-10-08 17:32:58', 'Mua VPS (#VPS Trial 1-1-126)'),
(1295, '0336326620', 0, 240000, 240000, '2022-10-08 20:08:32', 'Nạp tiền tự động qua Mbbank (#FT22281400938450 - MB NAPTIEN504. TU: LE VAN BINH - 240000)'),
(1296, '0336326620', 240000, 240000, 0, '2022-10-08 20:10:06', 'Mua VPS (#VPS Đặc Biệt 4-4-20)'),
(1297, 'chinhdocle', 0, 55000, 55000, '2022-10-08 21:11:04', 'Nạp tiền tự động qua Mbbank (#FT22281993497352 - MB NAPTIEN506. TU: NGUYEN QUANG CHINH - 55000)'),
(1298, 'chinhdocle', 55000, 55000, 0, '2022-10-08 21:12:17', 'Mua VPS (#VPS Trial 1-2-126)'),
(1299, 'Anhvipro010', 0, 80000, 80000, '2022-10-08 21:18:02', 'Nạp tiền tự động qua Ví Momo (#29657147772 - NAPTIEN386 - 80000)'),
(1300, 'nguyen905', 0, 70000, 70000, '2022-10-08 21:18:02', 'Nạp tiền tự động qua Ví Momo (#29658101327 - NAPTIEN326 - 70000)'),
(1301, 'Anhvipro010', 80000, 80000, 0, '2022-10-08 21:19:22', 'Mua VPS (#VPS Trial 2-4-126)'),
(1302, 'nguyen905', 70000, 70000, 0, '2022-10-08 21:19:36', 'Mua VPS (#NAT VPS 1-1-20)'),
(1303, 'taivemx2', 0, 55000, 55000, '2022-10-08 21:55:03', 'Nạp tiền tự động qua Ví Momo (#29658466967 - NAPTIEN82 - 55000)'),
(1304, 'taivemx2', 55000, 55000, 0, '2022-10-08 21:56:18', 'Mua VPS (#VPS Trial 1-2-126)'),
(1305, 'lethang', 5000, 105000, 110000, '2022-10-08 22:54:03', 'Nạp tiền tự động qua Mbbank (#FT22281757505750 - CUSTOMER naptien503 Trace 600858 - 105000)'),
(1306, 'lethang', 110000, 55000, 55000, '2022-10-08 22:55:34', 'Mua VPS (#VPS Trial 1-2-126)'),
(1307, 'lethang', 55000, 55000, 0, '2022-10-08 22:55:40', 'Mua VPS (#VPS Trial 1-2-126)'),
(1308, 'taivemx2', 0, 55000, 55000, '2022-10-08 23:16:19', 'Admin jinvps cộng tiền (rf)'),
(1309, 'taivemx2', 55000, 35000, 90000, '2022-10-08 23:18:03', 'Nạp tiền tự động qua Ví Momo (#29660723612 - NAPTIEN82 - 35000)'),
(1310, 'taivemx2', 90000, 90000, 0, '2022-10-08 23:18:12', 'Mua VPS (#VPS VN 1-1-20)'),
(1311, 'lethang', 0, 200000, 200000, '2022-10-09 07:46:02', 'Nạp tiền tự động qua Mbbank (#FT22283505775943 - CUSTOMER naptien503 Trace 669727 - 200000)'),
(1312, 'lethang', 200000, 120000, 80000, '2022-10-09 07:55:20', 'Mua VPS (#VPS Trial 2-8-126)'),
(1313, 'lethang', 80000, 80000, 0, '2022-10-09 07:56:10', 'Mua VPS (#VPS Trial 2-4-126)'),
(1314, 'Trunks555', 0, 70000, 70000, '2022-10-09 09:35:02', 'Nạp tiền tự động qua Mbbank (#FT22283384692302 - MB NAPTIEN14. TU: LE MINH HIEU - 70000)'),
(1315, 'Trunks555', 70000, 70000, 0, '2022-10-09 09:35:52', 'Mua VPS (#NAT VPS 1-1-20)'),
(1316, 'Khangpham', 0, 55000, 55000, '2022-10-09 18:25:02', 'Nạp tiền tự động qua Ví Momo (#29685159635 - NAPTIEN508 - 55000)'),
(1317, 'Khangpham', 55000, 55000, 0, '2022-10-09 18:25:46', 'Mua VPS (#VPS Trial 1-2-126)'),
(1318, 'tinh1211', 0, 55000, 55000, '2022-10-09 22:11:01', 'Nạp tiền tự động qua Mbbank (#FT22283000913554 - MB NAPTIEN509. TU: TRAN HUY DAT - 55000)'),
(1319, 'tinh1211', 55000, 55000, 0, '2022-10-09 22:12:24', 'Mua VPS (#VPS Trial 1-2-126)'),
(1320, 'Saisan665', 0, 40000, 40000, '2022-10-10 12:18:03', 'Nạp tiền tự động qua Mbbank (#FT22283928601052 - MB NAPTIEN511. TU: BUI THI YEN - 40000)'),
(1321, 'Saisan665', 40000, 40000, 0, '2022-10-10 12:18:20', 'Mua VPS (#VPS Trial 1-1-126)'),
(1322, 'caovanthanh2003', 0, 60000, 60000, '2022-10-10 16:42:33', 'Admin jinvps cộng tiền (bh)'),
(1323, 'letrieu363636', 0, 40000, 40000, '2022-10-10 16:46:04', 'Nạp tiền tự động qua Mbbank (#FT22283297040877 - CUSTOMER MBVCB 2551771830 048794 NAPTIEN513  CT tu 9383790822 LE VAN TRIEU toi 0 904657059 CAO NGOC QUANG LINH  MB   Quan Doi Trace 048794 - 40000)'),
(1324, 'letrieu363636', 40000, 40000, 0, '2022-10-10 16:47:18', 'Mua VPS (#VPS Trial 1-1-126)'),
(1325, 'thanh050104', 0, 400000, 400000, '2022-10-10 16:53:03', 'Nạp tiền tự động qua Ví Momo (#29719590349 - NAPTIEN231 - 400000)'),
(1326, 'thanh050104', 400000, 400000, 0, '2022-10-10 16:56:37', 'Mua VPS (#VPS Đặc Biệt 4-8-20)'),
(1327, 'linh041120044', 4000, 40000, 44000, '2022-10-10 17:20:32', 'Nạp tiền tự động qua Ví Momo (#29720461753 - NAPTIEN303 - 40000)'),
(1328, 'linh041120044', 44000, 40000, 4000, '2022-10-10 17:41:20', 'Mua VPS (#VPS Trial 1-1-126)'),
(1329, 'Abybabyb', 0, 160000, 160000, '2022-10-10 19:47:04', 'Nạp tiền tự động qua Mbbank (#FT22283323350850 - CUSTOMER MB 0904657059 naptien428 Trace 2150 48 - 160000)'),
(1330, 'Abybabyb', 160000, 80000, 80000, '2022-10-10 19:48:21', 'Mua VPS (#VPS Trial 2-4-126)'),
(1331, 'Tur79', 0, 40000, 40000, '2022-10-10 20:25:05', 'Nạp tiền tự động qua Ví Momo (#29727687074 - NAPTIEN516 - 40000)'),
(1332, 'don10092008', 0, 40000, 40000, '2022-10-10 20:29:22', 'Admin jinvps cộng tiền (tsr)'),
(1333, 'don10092008', 40000, 40000, 0, '2022-10-10 20:30:18', 'Mua VPS (#VPS Trial 1-1-126)'),
(1334, 'Tuandz121', 0, 40000, 40000, '2022-10-10 20:36:41', 'Admin jinvps cộng tiền (tsr)'),
(1335, 'Tur79', 40000, 40000, 0, '2022-10-10 20:39:07', 'Mua VPS (#VPS Trial 1-1-126)'),
(1336, 'Tuandz121', 40000, 40000, 0, '2022-10-10 20:53:52', 'Mua VPS (#VPS Trial 1-1-126)'),
(1337, 'nguyentanmedia', 0, 1500000, 1500000, '2022-10-10 20:58:02', 'Nạp tiền tự động qua Ví Momo (#29730174852 - NAPTIEN517 - 1500000)'),
(1338, 'caovanthanh2003', 60000, 30000, 90000, '2022-10-10 21:24:02', 'Nạp tiền tự động qua Ví Momo (#29731311719 - NAPTIEN382 - 30000)'),
(1339, 'nguyentanmedia', 1500000, 1500000, 0, '2022-10-10 21:24:09', 'Mua VPS (#VPS Trial 64-128-126)'),
(1340, 'caovanthanh2003', 90000, 90000, 0, '2022-10-10 21:24:52', 'Mua VPS (#VPS VN 1-1-20)'),
(1341, 'Duong1301', 0, 80000, 80000, '2022-10-10 21:46:28', 'Nạp tiền tự động qua Ví Momo (#29732386188 - NAPTIEN404 - 80000)'),
(1342, 'Longkhuc1', 0, 50000, 50000, '2022-10-10 22:42:03', 'Nạp tiền tự động qua Mbbank (#FT22284182359444 - CUSTOMER NAPTIEN518 FT22284545907587 Trace 0 09191 - 50000)'),
(1343, 'Longkhuc1', 50000, 40000, 10000, '2022-10-10 22:44:34', 'Mua VPS (#VPS Trial 1-1-126)'),
(1344, 'quyanh234x', 0, 40000, 40000, '2022-10-10 22:51:04', 'Nạp tiền tự động qua Mbbank (#FT22284354706189 - CUSTOMER NAPTIEN519 Trace 390912 - 40000)'),
(1345, 'quyanh234x', 40000, 40000, 0, '2022-10-10 22:51:59', 'Mua VPS (#VPS Trial 1-1-126)'),
(1346, 'Duong1301', 80000, 40000, 40000, '2022-10-11 05:27:28', 'Mua VPS (#VPS Trial 1-1-126)'),
(1347, 'Duong1301', 40000, 40000, 0, '2022-10-11 11:58:40', 'Mua VPS (#VPS Trial 1-1-126)'),
(1348, 'mvtuan', 0, 55000, 55000, '2022-10-11 12:12:02', 'Nạp tiền tự động qua Ví Momo (#29752594826 - NAPTIEN521 - 55000)'),
(1349, 'mvtuan', 55000, 55000, 0, '2022-10-11 12:14:56', 'Mua VPS (#VPS Trial 1-2-126)'),
(1350, 'Duong1301', 0, 40000, 40000, '2022-10-11 12:15:02', 'Nạp tiền tự động qua Ví Momo (#29752744310 - NAPTIEN404 - 40000)'),
(1351, 'Duong1301', 40000, 40000, 0, '2022-10-11 12:15:18', 'Mua VPS (#VPS Trial 1-1-126)'),
(1352, 'dongockimtrinh', 0, 80000, 80000, '2022-10-11 20:26:04', 'Nạp tiền tự động qua Ví Momo (#29773058038 - NAPTIEN271 - 80000)'),
(1353, 'dongockimtrinh', 80000, 80000, 0, '2022-10-11 20:27:20', 'Mua VPS (#VPS Trial 2-4-126)'),
(1354, 'Thuocla79', 0, 40000, 40000, '2022-10-12 08:43:03', 'Nạp tiền tự động qua Mbbank (#FT22285026855700 - MB NAPTIEN323. TU: TRAN NGUYEN TRUONG GIANG - 40000)'),
(1355, 'Thuocla79', 40000, 40000, 0, '2022-10-12 08:43:47', 'Mua VPS (#VPS Trial 1-1-126)'),
(1356, 'Killer', 0, 40000, 40000, '2022-10-12 20:32:02', 'Nạp tiền tự động qua Mbbank (#FT22285629623395 - MB NAPTIEN143. TU: HO VAN DAT - 40000)'),
(1357, 'Killer', 40000, 40000, 0, '2022-10-12 20:33:54', 'Mua VPS (#VPS Trial 1-1-126)'),
(1358, 'Abybabyb', 80000, 80000, 0, '2022-10-12 21:22:47', 'Mua VPS (#VPS Trial 2-4-126)'),
(1359, 'wppyhieu', 0, 55000, 55000, '2022-10-13 01:08:03', 'Nạp tiền tự động qua Ví Momo (#29819874136 - NAPTIEN524 - 55000)'),
(1360, 'wppyhieu', 55000, 55000, 0, '2022-10-13 01:09:05', 'Mua VPS (#VPS Trial 1-2-126)'),
(1361, 'kiendz45', 0, 120000, 120000, '2022-10-13 08:46:02', 'Nạp tiền tự động qua Mbbank (#FT22286740095740 - MB NAPTIEN526. TU: NGUYEN TRUNG KIEN - 120000)'),
(1362, 'kiendz45', 120000, 120000, 0, '2022-10-13 08:46:14', 'Mua VPS (#NAT VPS 2-2-20)'),
(1363, 'duca1769', 0, 55000, 55000, '2022-10-13 18:50:03', 'Nạp tiền tự động qua Mbbank (#FT22286871350884 - MB NAPTIEN527. TU: NGUYEN DUC ANH - 55000)'),
(1364, 'duca1769', 55000, 55000, 0, '2022-10-13 18:50:47', 'Mua VPS (#VPS Trial 1-2-126)'),
(1365, 'linh041120044', 4000, 90000, 94000, '2022-10-14 21:49:43', 'Admin jinvps cộng tiền (nap mm)'),
(1366, 'linh041120044', 94000, 90000, 4000, '2022-10-14 21:50:35', 'Mua VPS (#VPS VN 1-1-20)'),
(1367, 'bigcitym0i', 0, 40000, 40000, '2022-10-15 10:45:46', 'Admin jinvps cộng tiền (Nap mm)'),
(1368, 'Thuocla79', 0, 40000, 40000, '2022-10-15 10:46:28', 'Admin jinvps cộng tiền (Nap at.)'),
(1369, 'Thuocla79', 40000, 40000, 0, '2022-10-15 10:48:18', 'Mua VPS (#VPS Trial 1-1-126)'),
(1370, 'bigcitym0i', 40000, 40000, 0, '2022-10-15 11:15:43', 'Mua VPS (#VPS Trial 1-1-126)'),
(1371, 'tdquanghuy1512', 5100, 35000, 40100, '2022-10-15 20:03:15', 'Admin jinvps cộng tiền (nap mm)'),
(1372, 'tdquanghuy1512', 40100, 40000, 100, '2022-10-15 20:05:18', 'Mua VPS (#VPS Trial 1-1-126)'),
(1373, 'Hieunek2003', 0, 40000, 40000, '2022-10-17 14:44:57', 'Admin jinvps cộng tiền (Nap mm)'),
(1374, 'yoyop3yb', 0, 180000, 180000, '2022-10-17 14:45:30', 'Admin jinvps cộng tiền (Nap atm)'),
(1375, 'Hieunek2003', 40000, 40000, 0, '2022-10-17 14:45:31', 'Mua VPS (#VPS Trial 1-1-126)'),
(1376, 'yoyop3yb', 180000, 180000, 0, '2022-10-17 14:46:49', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1377, 'Huyvipkka', 4000, 40000, 44000, '2022-10-17 18:13:32', 'Admin jinvps cộng tiền ()'),
(1378, 'Huyvipkka', 44000, 40000, 4000, '2022-10-17 18:21:23', 'Mua VPS (#VPS Trial 1-1-126)'),
(1379, 'hoangvietkt', 9000, 40000, 49000, '2022-10-17 21:13:47', 'Admin jinvps cộng tiền (tt)'),
(1380, 'hoangvietkt', 49000, 40000, 9000, '2022-10-17 21:14:09', 'Mua VPS (#VPS Trial 1-1-126)'),
(1381, '0335703972', 0, 40000, 40000, '2022-10-18 18:28:32', 'Admin jinvps cộng tiền (Nap mm)'),
(1382, '0335703972', 40000, 40000, 0, '2022-10-18 18:29:06', 'Mua VPS (#VPS Trial 1-1-126)'),
(1383, '0335703972', 0, 40000, 40000, '2022-10-19 14:45:52', 'Admin jinvps cộng tiền (Nap mm)'),
(1384, '0866035532', 0, 40000, 40000, '2022-10-19 14:46:05', 'Admin jinvps cộng tiền (Nap mm)'),
(1385, '0866035532', 40000, 40000, 0, '2022-10-19 14:55:41', 'Mua VPS (#VPS Trial 1-1-126)'),
(1386, 'Dominh97', 0, 80000, 80000, '2022-10-20 17:25:23', 'Admin jinvps cộng tiền (nap atm)'),
(1387, '0365262308', 9667, 31000, 40667, '2022-10-20 17:25:47', 'Admin jinvps cộng tiền (nap atm)'),
(1388, '0365262308', 40667, 40000, 667, '2022-10-20 17:48:15', 'Mua VPS (#VPS Trial 1-1-126)'),
(1389, 'Dominh97', 80000, 80000, 0, '2022-10-20 18:54:51', 'Mua VPS (#VPS Trial 2-4-126)'),
(1390, 'xxx010', 0, 40000, 40000, '2022-10-20 21:11:19', 'Admin jinvps cộng tiền ()'),
(1391, 'xxx010', 40000, 40000, 0, '2022-10-20 21:16:29', 'Mua VPS (#VPS Trial 1-1-126)'),
(1392, 'HoaiThuc', 0, 87100, 87100, '2022-10-21 18:20:21', 'Nạp tiền tự động qua card seri (10009488649612)'),
(1393, 'HoaiThuc', 87100, 87100, 174200, '2022-10-21 18:22:46', 'Nạp tiền tự động qua card seri (10009488649617)'),
(1394, 'HoaiThuc', 174200, 5800, 180000, '2022-10-21 18:23:10', 'Admin jinvps cộng tiền ()'),
(1395, 'HoaiThuc', 180000, 180000, 0, '2022-10-21 18:24:10', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1396, '0335703972', 40000, 40000, 0, '2022-10-22 13:28:03', 'Mua VPS (#VPS Trial 1-1-126)'),
(1397, '293hoang', 0, 40000, 40000, '2022-10-23 12:30:30', 'Admin jinvps cộng tiền (Nap mm)'),
(1398, '293hoang', 40000, 40000, 0, '2022-10-23 13:01:07', 'Mua VPS (#VPS Trial 1-1-126)'),
(1399, 'mcigroup', 0, 180000, 180000, '2022-10-23 13:44:42', 'Admin jinvps cộng tiền (Nap atm)'),
(1400, 'mcigroup', 180000, 180000, 0, '2022-10-23 13:47:05', 'Mua VPS (#VPS Trial 4-8-126)'),
(1401, 'gamexvuive', 250000, 250000, 0, '2022-10-24 00:44:24', 'Mua VPS (#VPS Trial 4-16-126)'),
(1402, 'quan2002', 0, 90000, 90000, '2022-10-24 14:29:26', 'Admin jinvps cộng tiền (Nap atm)'),
(1403, 'quan2002', 90000, 90000, 0, '2022-10-24 14:49:10', 'Mua VPS (#VPS VN 1-1-20)'),
(1404, 'Abybabyb', 0, 80000, 80000, '2022-10-24 15:22:45', 'Admin jinvps cộng tiền (nap atm)'),
(1405, 'hayquen06', 5000, 50000, 55000, '2022-10-24 15:33:48', 'Admin jinvps cộng tiền (nap mm)'),
(1406, 'hayquen06', 55000, 55000, 0, '2022-10-24 15:34:20', 'Mua VPS (#VPS Trial 1-2-126)'),
(1407, 'LongNhi', 43200, 80000, 123200, '2022-10-24 21:15:27', 'Admin jinvps cộng tiền ()'),
(1408, 'LongNhi', 123200, 120000, 3200, '2022-10-24 21:19:20', 'Mua VPS (#VPS Trial 2-8-126)'),
(1409, 'quan2002', 0, 90000, 90000, '2022-10-25 12:00:15', 'Admin jinvps cộng tiền (Nap atm)'),
(1410, 'btdiep592002', 0, 40000, 40000, '2022-10-25 12:00:42', 'Admin jinvps cộng tiền (Mm)'),
(1411, 'btdiep592002', 40000, 40000, 0, '2022-10-25 12:03:14', 'Mua VPS (#VPS Trial 1-1-126)'),
(1412, 'btdiep592002', 0, 40000, 40000, '2022-10-25 12:20:03', 'Admin jinvps cộng tiền (Mm)'),
(1413, 'daibeou2k5', 0, 55000, 55000, '2022-10-25 12:20:25', 'Admin jinvps cộng tiền (Nap atm)'),
(1414, 'lamh', 0, 80000, 80000, '2022-10-25 12:20:45', 'Admin jinvps cộng tiền (Atm)'),
(1415, 'daibeou2k5', 55000, 55000, 0, '2022-10-25 13:31:31', 'Mua VPS (#VPS Trial 1-2-126)'),
(1416, 'lamh', 80000, 10000, 90000, '2022-10-25 21:48:58', 'Admin jinvps cộng tiền (Atn)'),
(1417, 'lamh', 90000, 90000, 0, '2022-10-25 21:49:35', 'Mua VPS (#VPS VN 1-1-20)'),
(1418, 'lamh', 0, 10000, 10000, '2022-10-25 21:49:52', 'Admin jinvps cộng tiền (Atn)'),
(1419, 'lamh', 10000, 10000, 0, '2022-10-25 21:58:37', 'Admin jinvps trừ tiền ()'),
(1420, 'btdiep592002', 40000, 40000, 0, '2022-10-25 21:58:49', 'Admin jinvps trừ tiền ()'),
(1421, 'quan2002', 90000, 90000, 0, '2022-10-26 07:24:44', 'Mua VPS (#VPS VN 1-1-20)'),
(1422, 'Buiduyhuyhd97', 8000, 170000, 178000, '2022-10-26 20:28:07', 'Admin jinvps cộng tiền (atm)'),
(1423, 'Buiduyhuyhd97', 178000, 170000, 8000, '2022-10-26 20:30:26', 'Mua VPS (#VPS VN 2-2-20)'),
(1424, 'Huydepzai', 0, 86300, 86300, '2022-10-26 20:51:05', 'Nạp tiền tự động qua card seri (10009574914360)'),
(1425, 'Huydepzai', 86300, 43500, 129800, '2022-10-26 20:58:56', 'Admin jinvps cộng tiền (nap card zing)'),
(1426, 'Huydepzai', 129800, 120000, 9800, '2022-10-26 21:02:12', 'Mua VPS (#VPS Trial 2-8-126)'),
(1427, 'thanh050104', 0, 90000, 90000, '2022-10-27 19:56:35', 'Admin jinvps cộng tiền (atm)'),
(1428, 'thanh050104', 90000, 90000, 0, '2022-10-27 19:56:56', 'Mua VPS (#VPS VN 1-1-20)'),
(1429, 'gamexvuive', 0, 750000, 750000, '2022-10-27 21:29:58', 'Admin jinvps cộng tiền (nap atm)'),
(1430, 'gamexvuive', 750000, 750000, 0, '2022-10-27 21:30:43', 'Mua VPS (#VPS VN 8-16-60)'),
(1431, 'Killer', 0, 60000, 60000, '2022-10-28 14:40:41', 'Admin jinvps cộng tiền (rf)'),
(1432, 'Killer', 60000, 40000, 100000, '2022-10-28 14:43:37', 'Admin jinvps cộng tiền (rf)'),
(1433, 'Killer', 100000, 90000, 10000, '2022-10-28 14:58:56', 'Mua VPS (#VPS VN 1-1-20)'),
(1434, 'quay99', 0, 80000, 80000, '2022-10-28 15:06:55', 'Admin jinvps cộng tiền (atm)'),
(1435, 'quay99', 80000, 80000, 0, '2022-10-28 15:07:19', 'Mua VPS (#VPS Trial 2-4-126)'),
(1436, 'binhnrov3z', 0, 40000, 40000, '2022-10-28 18:57:47', 'Admin jinvps cộng tiền (Tsr)'),
(1437, 'binhnrov3z', 40000, 40000, 0, '2022-10-28 19:00:38', 'Mua VPS (#VPS Trial 1-1-126)'),
(1438, 'Anhthuy2003', 0, 40000, 40000, '2022-10-28 22:10:12', 'Admin jinvps cộng tiền ()'),
(1439, 'Anhthuy2003', 40000, 40000, 0, '2022-10-28 22:12:02', 'Mua VPS (#VPS Trial 1-1-126)'),
(1440, 'duyminh123', 8000, 40000, 48000, '2022-10-29 15:40:55', 'Admin jinvps cộng tiền (mm)'),
(1441, 'nhattinh789', 0, 40000, 40000, '2022-10-29 15:41:11', 'Admin jinvps cộng tiền (mm)'),
(1442, 'duyminh123', 48000, 40000, 8000, '2022-10-29 15:41:19', 'Mua VPS (#VPS Trial 1-1-126)'),
(1443, 'nhattinh789', 40000, 40000, 0, '2022-10-29 15:41:27', 'Mua VPS (#VPS Trial 1-1-126)'),
(1444, 'Baongoc2ker', 0, 55000, 55000, '2022-10-29 15:51:15', 'Admin jinvps cộng tiền (mm)'),
(1445, 'Baongoc2ker', 55000, 55000, 0, '2022-10-29 15:53:09', 'Mua VPS (#VPS Trial 1-2-126)'),
(1446, '0968710828', 0, 80000, 80000, '2022-10-29 18:09:08', 'Admin jinvps cộng tiền (Atm)'),
(1447, '0968710828', 80000, 80000, 0, '2022-10-29 18:10:59', 'Mua VPS (#VPS Trial 2-4-126)'),
(1448, 'langkk2874', 5500, 50000, 55500, '2022-10-30 06:49:38', 'Admin jinvps cộng tiền (Atm)'),
(1449, 'langkk2874', 55500, 55000, 500, '2022-10-30 07:03:10', 'Mua VPS (#VPS Trial 1-2-126)'),
(1450, 'co3132004', 8000, 80000, 88000, '2022-10-30 20:24:03', 'Admin jinvps cộng tiền (Atm)'),
(1451, 'co3132004', 88000, 80000, 8000, '2022-10-30 20:25:13', 'Mua VPS (#VPS Trial 2-4-126)'),
(1452, 'Doanhca', 0, 40000, 40000, '2022-10-31 14:59:12', 'Admin jinvps cộng tiền (atm)'),
(1453, 'Doanhca', 40000, 40000, 0, '2022-10-31 16:19:48', 'Mua VPS (#VPS Trial 1-1-126)'),
(1454, 'Khang1400', 0, 83600, 83600, '2022-11-01 04:52:04', 'Nạp tiền tự động qua card seri (10009445333985)'),
(1455, 'Khang1400', 83600, 83600, 167200, '2022-11-01 04:54:53', 'Nạp tiền tự động qua card seri (10009445333984)'),
(1456, 'Khang1400', 167200, 16520, 183720, '2022-11-01 04:57:30', 'Nạp tiền tự động qua card seri (10009236234281)'),
(1457, 'Khang1400', 183720, 180000, 3720, '2022-11-01 04:57:59', 'Mua VPS (#VPS Trial 4-8-126)'),
(1458, 'hungdo1388', 0, 40000, 40000, '2022-11-01 09:03:46', 'Admin jinvps cộng tiền (Atm)'),
(1459, 'hungdo1388', 40000, 40000, 0, '2022-11-01 09:13:24', 'Mua VPS (#VPS Trial 1-1-126)'),
(1460, 'phuongdong003', 0, 55000, 55000, '2022-11-02 13:23:03', 'Nạp tiền tự động qua Mbbank (#FT22306704993554 - CUSTOMER MBVCB 2647880473 052929 NAP595 CT t u 1021236859 HOANG PHUONG DONG toi  0904657059 CAO NGOC QUANG LINH Ngan  hang Quan Doi  MB  Trace 052929 - 55000)'),
(1461, 'phuongdong003', 55000, 55000, 0, '2022-11-02 13:23:31', 'Mua VPS (#VPS Trial 1-2-126)'),
(1462, 'tamdz04', 0, 44400, 44400, '2022-11-03 21:00:29', 'Nạp tiền tự động qua card seri (10009303518296)'),
(1463, 'tamdz04', 44400, 88800, 133200, '2022-11-03 21:01:11', 'Nạp tiền tự động qua card seri (10009578141803)'),
(1464, 'tamdz04', 133200, 120000, 13200, '2022-11-03 21:04:28', 'Mua VPS (#VPS Trial 2-8-126)'),
(1465, '01215266238', 300, 40000, 40300, '2022-11-04 09:07:04', 'Nạp tiền tự động qua Mbbank (#FT22308772202809 - MB NAP127. TU: NGUYEN QUY LINH CONG - 40000)'),
(1466, '01215266238', 40300, 40000, 300, '2022-11-04 09:07:13', 'Mua VPS (#VPS Trial 1-1-126)'),
(1467, 'minghieu1', 0, 180000, 180000, '2022-11-04 16:32:02', 'Nạp tiền tự động qua Mbbank (#FT22308449946430 - MB NAP146. TU: BUI MINH HIEU - 180000)'),
(1468, 'minghieu1', 180000, 180000, 0, '2022-11-04 16:32:17', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1469, 'Ghoulomg', 0, 120000, 120000, '2022-11-04 20:48:03', 'Nạp tiền tự động qua Ví Thesieure (#T2022110412906745 - NAP221 - 120000)'),
(1470, 'Ghoulomg', 120000, 120000, 0, '2022-11-04 20:50:28', 'Mua VPS (#VPS Trial 2-8-126)'),
(1471, 'jarvis', 0, 40000, 40000, '2022-11-05 10:25:02', 'Nạp tiền tự động qua Mbbank (#FT22309765299182 - CUSTOMER MBVCB 2659522792 066030 NAP328 CT t u 0381000486234 VO PHUONG DONG toi  0904657059 CAO NGOC QUANG LINH Ngan  hang Quan Doi  MB  Trace 066030 - 40000)'),
(1472, 'jarvis', 40000, 200000, 240000, '2022-11-05 10:28:04', 'Nạp tiền tự động qua Mbbank (#FT22309030580443 - CUSTOMER MBVCB 2659539438 072591 NAP328 CT t u 0381000486234 VO PHUONG DONG toi  0904657059 CAO NGOC QUANG LINH Ngan  hang Quan Doi  MB  Trace 072591 - 200000)'),
(1473, 'jarvis', 240000, 240000, 0, '2022-11-05 10:28:34', 'Mua VPS (#VPS Đặc Biệt 4-4-20)'),
(1474, 'Ducdung8386', 0, 55000, 55000, '2022-11-05 18:57:02', 'Nạp tiền tự động qua Mbbank (#FT22309384887790 - NAP603 - 55000)'),
(1475, 'Ducdung8386', 55000, 55000, 0, '2022-11-05 18:57:09', 'Mua VPS (#VPS Trial 1-2-126)'),
(1476, 'anvanmanh2k4', 0, 360000, 360000, '2022-11-06 00:02:03', 'Nạp tiền tự động qua Ví Momo (#31610682063 - NAP605 - 360000)'),
(1477, 'anvanmanh2k4', 360000, 180000, 180000, '2022-11-06 00:03:08', 'Mua VPS (#VPS Trial 4-8-126)'),
(1478, 'anvanmanh2k4', 180000, 180000, 0, '2022-11-06 00:03:22', 'Mua VPS (#VPS Trial 4-8-126)'),
(1479, 'TATHANHKHIET', 0, 180000, 180000, '2022-11-06 07:10:04', 'Nạp tiền tự động qua Ví Momo (#31615493686 - NAP606 - 180000)'),
(1480, 'TATHANHKHIET', 180000, 180000, 0, '2022-11-06 07:11:17', 'Mua VPS (#VPS Trial 4-8-126)'),
(1481, 'duongpham293', 0, 40000, 40000, '2022-11-06 09:10:04', 'Nạp tiền tự động qua Ví Momo (#31618785311 - NAP187 - 40000)'),
(1482, 'duongpham293', 40000, 40000, 0, '2022-11-06 09:11:16', 'Mua VPS (#VPS Trial 1-1-126)'),
(1483, 'Tuan2k1dz01', 0, 40000, 40000, '2022-11-06 09:30:01', 'Nạp tiền tự động qua Mbbank (#FT22311882172142 - CUSTOMER MBVCB 2663130130 035695 NAP565 CT t u 1025848756 TRAN NGOC TUAN toi 090 4657059 CAO NGOC QUANG LINH Ngan ha ng Quan Doi  MB  Trace 035695 - 40000)'),
(1484, 'Tuan2k1dz01', 40000, 40000, 0, '2022-11-06 09:30:17', 'Mua VPS (#VPS Trial 1-1-126)'),
(1485, '0779445800', 0, 40000, 40000, '2022-11-06 09:46:03', 'Nạp tiền tự động qua Mbbank (#FT22311837471828 - MB NAP607. TU: NGUYEN THANH TUAN - 40000)'),
(1486, '0779445800', 40000, 40000, 0, '2022-11-06 09:48:10', 'Mua VPS (#VPS Trial 1-1-126)'),
(1487, 'taivemx2', 0, 90000, 90000, '2022-11-06 14:26:03', 'Nạp tiền tự động qua Mbbank (#FT22311340041009 - MB NAP82. TU: NGUYEN TAN TAI - 90000)'),
(1488, 'taivemx2', 90000, 90000, 0, '2022-11-06 14:26:05', 'Mua VPS (#VPS VN 1-1-20)'),
(1489, '0919305467', 0, 89200, 89200, '2022-11-06 15:03:25', 'Nạp tiền tự động qua card seri (10009485310523)'),
(1490, '0919305467', 89200, 44600, 133800, '2022-11-06 15:03:57', 'Nạp tiền tự động qua card seri (10009709437108)'),
(1491, '0919305467', 133800, 120000, 13800, '2022-11-06 15:04:21', 'Mua VPS (#VPS VN 1-2-20)'),
(1492, 'phainho1234', 0, 40000, 40000, '2022-11-07 07:14:03', 'Nạp tiền tự động qua Mbbank (#FT22311447953044 - MB NAP538. TU: NGUYEN DUY NGOC - 40000)'),
(1493, 'phainho1234', 40000, 40000, 0, '2022-11-07 07:14:30', 'Mua VPS (#VPS Trial 1-1-126)'),
(1494, 'Anhvipro010', 0, 80000, 80000, '2022-11-07 10:01:02', 'Nạp tiền tự động qua Ví Momo (#31657775468 - NAP386 - 80000)'),
(1495, 'Anhvipro010', 80000, 80000, 0, '2022-11-07 10:01:16', 'Mua VPS (#VPS Trial 2-4-126)'),
(1496, '01215266238', 300, 40000, 40300, '2022-11-07 19:02:03', 'Nạp tiền tự động qua Mbbank (#FT22311030036107 - MB NAP127. TU: NGUYEN QUY LINH CONG - 40000)'),
(1497, '01215266238', 40300, 40000, 300, '2022-11-07 19:02:40', 'Mua VPS (#VPS Trial 1-1-126)'),
(1498, 'buianh9', 0, 40000, 40000, '2022-11-08 11:05:03', 'Nạp tiền tự động qua Ví Momo (#31701205045 - NAP610 - 40000)'),
(1499, 'buianh9', 40000, 40000, 0, '2022-11-08 11:05:28', 'Mua VPS (#VPS Trial 1-1-126)'),
(1500, 'Huyvipkka', 4000, 40000, 44000, '2022-11-08 16:13:03', 'Nạp tiền tự động qua Ví Momo (#31713032742 - NAP38 - 40000)'),
(1501, 'Huyvipkka', 44000, 40000, 4000, '2022-11-08 16:13:25', 'Mua VPS (#VPS Trial 1-1-126)'),
(1502, 'thopr02008', 0, 30000, 30000, '2022-11-08 19:00:02', 'Nạp tiền tự động qua Ví Momo (#31719698802 - NAP496 - 30000)'),
(1503, 'Ghoulomg', 0, 80000, 80000, '2022-11-08 19:39:03', 'Nạp tiền tự động qua Ví Thesieure (#T2022110812964827 - NAP221 - 80000)'),
(1504, 'Ghoulomg', 80000, 80000, 0, '2022-11-08 19:42:44', 'Mua VPS (#VPS Trial 2-4-126)'),
(1505, 'bin', 0, 80000, 80000, '2022-11-08 20:44:03', 'Nạp tiền tự động qua Ví Thesieure (#T2022110812966330 - NAP613 - 80000)'),
(1506, 'bin', 80000, 80000, 0, '2022-11-08 20:44:29', 'Mua VPS (#VPS Trial 2-4-126)'),
(1507, 'nguyen905', 0, 80000, 80000, '2022-11-08 23:40:03', 'Nạp tiền tự động qua Ví Momo (#31729342919 - NAP326 - 80000)'),
(1508, 'nguyen905', 80000, 80000, 0, '2022-11-08 23:40:38', 'Mua VPS (#VPS Trial 2-4-126)'),
(1509, 'thopr02008', 30000, 60000, 90000, '2022-11-09 16:32:03', 'Nạp tiền tự động qua Ví Momo (#31753655395 - NAP496 - 60000)'),
(1510, 'thopr02008', 90000, 90000, 0, '2022-11-09 16:33:16', 'Mua VPS (#VPS VN 1-1-20)'),
(1511, 'phucle', 0, 80000, 80000, '2022-11-10 14:08:02', 'Nạp tiền tự động qua Mbbank (#FT22314700790080 - CUSTOMER NAP616 Trace 234838 - 80000)'),
(1512, 'phucle', 80000, 80000, 0, '2022-11-10 14:17:31', 'Mua VPS (#VPS Trial 2-4-126)'),
(1513, 'phucle', 0, 80000, 80000, '2022-11-11 16:48:04', 'Nạp tiền tự động qua Mbbank (#FT22315431827969 - CUSTOMER NAP616 Trace 449165 - 80000)'),
(1514, 'phucle', 80000, 80000, 0, '2022-11-11 16:52:03', 'Mua VPS (#VPS Trial 2-4-126)'),
(1515, 'anvanmanh2k4', 0, 80000, 80000, '2022-11-13 10:31:02', 'Nạp tiền tự động qua Ví Momo (#31921965048 - NAP605 - 80000)'),
(1516, 'anvanmanh2k4', 80000, 80000, 0, '2022-11-13 10:31:23', 'Mua VPS (#VPS Trial 2-4-126)'),
(1517, 'hoangyor123', 0, 90000, 90000, '2022-11-13 22:19:03', 'Nạp tiền tự động qua Mbbank (#FT22318090014114 - CUSTOMER NAP611 Trace 829355 - 90000)'),
(1518, 'hoangyor123', 90000, 90000, 0, '2022-11-13 22:19:30', 'Mua VPS (#VPS VN 1-1-20)'),
(1519, 'tanfa204', 0, 180000, 180000, '2022-11-14 20:45:03', 'Nạp tiền tự động qua Ví Momo (#31985129941 - NAP525 - 180000)'),
(1520, 'tanfa204', 180000, 180000, 0, '2022-11-14 20:45:24', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1521, 'Bekhaihi', 0, 55000, 55000, '2022-11-15 09:51:04', 'Nạp tiền tự động qua Mbbank (#FT22319773888005 - CUSTOMER NAP619 Trace 635231 - 55000)'),
(1522, 'Bekhaihi', 55000, 55000, 0, '2022-11-15 10:12:12', 'Mua VPS (#VPS Trial 1-2-126)'),
(1523, 'tdquanghuy1512', 100, 40000, 40100, '2022-11-15 15:29:02', 'Nạp tiền tự động qua Mbbank (#FT22319523108648 - MB NAP317. TU: NGUYEN DUC VINH - 40000)'),
(1524, 'tdquanghuy1512', 40100, 40000, 100, '2022-11-15 15:50:40', 'Mua VPS (#VPS Trial 1-1-126)'),
(1525, 'qwerty15', 0, 40000, 40000, '2022-11-15 18:19:02', 'Nạp tiền tự động qua Ví Momo (#32036279125 - NAP622 - 40000)'),
(1526, 'qwerty15', 40000, 40000, 0, '2022-11-15 18:19:28', 'Mua VPS (#VPS Trial 1-1-126)'),
(1527, 'phauvip13', 0, 160000, 160000, '2022-11-17 17:48:01', 'Nạp tiền tự động qua Mbbank (#FT22321129492501 - CUSTOMER NAP624 FT22321299751206 Trace 55642 2 - 160000)'),
(1528, 'phauvip13', 160000, 80000, 80000, '2022-11-17 17:49:00', 'Mua VPS (#VPS Trial 2-4-126)'),
(1529, 'phauvip13', 80000, 80000, 0, '2022-11-17 17:49:07', 'Mua VPS (#VPS Trial 2-4-126)'),
(1530, 'hung8496', 0, 40000, 40000, '2022-11-18 19:04:03', 'Nạp tiền tự động qua Ví Momo (#32166503933 - NAP417 - 40000)'),
(1531, 'hung8496', 40000, 40000, 0, '2022-11-18 19:04:53', 'Mua VPS (#VPS Trial 1-1-126)'),
(1532, 'thanh050104', 0, 90000, 90000, '2022-11-18 20:04:02', 'Nạp tiền tự động qua Mbbank (#FT22322073590840 - CUSTOMER NAP231 Trace 822514 - 90000)'),
(1533, 'thanh050104', 90000, 90000, 0, '2022-11-18 20:06:12', 'Mua VPS (#VPS VN 1-1-20)'),
(1534, 'chenyihan171097', 0, 50000, 50000, '2022-11-20 07:50:04', 'Nạp tiền tự động qua Mbbank (#FT22325495157050 - CUSTOMER NAP625 Trace 812859 - 50000)'),
(1535, 'chenyihan171097', 50000, 40000, 10000, '2022-11-20 07:50:25', 'Mua VPS (#VPS Trial 1-1-126)'),
(1536, 'ngoanzip', 0, 55000, 55000, '2022-11-20 13:58:03', 'Nạp tiền tự động qua Ví Momo (#32231930894 - NAP626 - 55000)'),
(1537, 'ngoanzip', 55000, 55000, 0, '2022-11-20 13:58:46', 'Mua VPS (#VPS Trial 1-2-126)'),
(1538, 'Anhvipro010', 0, 40000, 40000, '2022-11-20 17:05:03', 'Nạp tiền tự động qua Ví Momo (#32237704630 - NAP386 - 40000)'),
(1539, 'Anhvipro010', 40000, 15000, 55000, '2022-11-20 17:09:03', 'Nạp tiền tự động qua Ví Momo (#32237446887 - NAP386 - 15000)'),
(1540, 'Anhvipro010', 55000, 55000, 0, '2022-11-20 17:18:25', 'Mua VPS (#VPS Trial 1-2-126)'),
(1541, 'phantruong02', 0, 250000, 250000, '2022-11-20 19:09:04', 'Nạp tiền tự động qua Mbbank (#FT22325280204018 - MB NAP628. TU: PHAN VAN TRUONG - 250000)'),
(1542, 'phantruong02', 250000, 250000, 0, '2022-11-20 19:09:38', 'Mua VPS (#VPS Trial 4-16-126)'),
(1543, 'khangdz190', 0, 40000, 40000, '2022-11-20 21:17:04', 'Admin jinvps cộng tiền ()'),
(1544, 'khangdz190', 40000, 40000, 0, '2022-11-20 21:17:28', 'Mua VPS (#VPS Trial 1-1-126)'),
(1545, 'Tranngochai1234', 0, 180000, 180000, '2022-11-21 13:10:03', 'Nạp tiền tự động qua Mbbank (#FT22325088837159 - CUSTOMER NAP630 Trace 933064 - 180000)'),
(1546, 'Tranngochai1234', 180000, 180000, 0, '2022-11-21 13:11:05', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1547, 'Anhvipro010', 0, 55000, 55000, '2022-11-21 18:33:04', 'Nạp tiền tự động qua Ví Momo (#32285589628 - NAP386 - 55000)'),
(1548, 'Anhvipro010', 55000, 55000, 0, '2022-11-21 18:33:47', 'Mua VPS (#VPS Trial 1-2-126)'),
(1549, '0829332494', 24100, 60000, 84100, '2022-11-22 12:24:02', 'Nạp tiền tự động qua Mbbank (#FT22326001493801 - CUSTOMER ZP693FT4HLV9 NAP376 Trace 041624 - 60000)'),
(1550, '0829332494', 84100, 80000, 4100, '2022-11-22 12:56:13', 'Mua VPS (#VPS Trial 2-4-126)'),
(1551, 'Phambinhdz', 0, 40000, 40000, '2022-11-22 21:49:03', 'Nạp tiền tự động qua Ví Momo (#32334768608 - NAP632 - 40000)'),
(1552, 'Phambinhdz', 40000, 40000, 0, '2022-11-22 21:52:18', 'Mua VPS (#VPS Trial 1-1-126)'),
(1553, 'hunghungvps', 0, 180000, 180000, '2022-11-23 12:47:03', 'Nạp tiền tự động qua Mbbank (#FT22327400435796 - CUSTOMER NAP627 Trace 833397 - 180000)');
INSERT INTO `dongtien` (`id`, `username`, `sotientruoc`, `sotienthaydoi`, `sotiensau`, `thoigian`, `noidung`) VALUES
(1554, 'hunghungvps', 180000, 180000, 0, '2022-11-23 12:47:38', 'Mua VPS (#VPS Trial 4-8-126)'),
(1555, 'Abybabyb', 80000, 80000, 0, '2022-11-23 17:42:19', 'Mua VPS (#VPS Trial 2-4-126)'),
(1556, 'thanh36zz', 0, 40000, 40000, '2022-11-24 16:04:08', 'Admin jinvps cộng tiền (atm)'),
(1557, 'thanh36zz', 40000, 40000, 0, '2022-11-24 16:04:37', 'Mua VPS (#VPS Trial 1-1-126)'),
(1558, 'tdquanghuy1512', 100, 40000, 40100, '2022-11-24 21:00:26', 'Admin jinvps cộng tiền (atm)'),
(1559, 'tdquanghuy1512', 40100, 40000, 100, '2022-11-24 22:15:03', 'Mua VPS (#VPS Trial 1-1-126)'),
(1560, 'thanh36zz', 0, 40000, 40000, '2022-11-25 06:49:02', 'Nạp tiền tự động qua Mbbank (#FT22328894851441 - CUSTOMER NAP634 Trace 036518 - 40000)'),
(1561, 'tdquanghuy1512', 100, 40000, 40100, '2022-11-25 06:49:02', 'Nạp tiền tự động qua Mbbank (#FT22328931541416 - MB NAP317. TU: NGUYEN DUC VINH - 40000)'),
(1562, 'thanh36zz', 40000, 40000, 0, '2022-11-25 15:06:38', 'Mua VPS (#VPS Trial 1-1-126)'),
(1563, 'duyhoan5520', 0, 40000, 40000, '2022-11-25 18:49:03', 'Nạp tiền tự động qua Ví Momo (#32453481963 - NAP368 - 40000)'),
(1564, 'duyhoan5520', 40000, 40000, 0, '2022-11-25 18:49:26', 'Mua VPS (#VPS Trial 1-1-126)'),
(1565, 'mcigroup', 0, 16820, 16820, '2022-11-25 19:35:24', 'Nạp tiền tự động qua card seri (20000128811775)'),
(1566, 'mcigroup', 16820, 63200, 80020, '2022-11-25 19:39:02', 'Nạp tiền tự động qua Ví Momo (#32454877480 - NAP558 - 63200)'),
(1567, 'mcigroup', 80020, 80000, 20, '2022-11-25 19:39:21', 'Mua VPS (#VPS Trial 2-4-126)'),
(1568, 'Tuandz121', 0, 40000, 40000, '2022-11-25 22:03:03', 'Nạp tiền tự động qua Ví Thesieure (#T2022112513238501 - NAP512 - 40000)'),
(1569, 'Tuandz121', 40000, 40000, 0, '2022-11-25 22:03:38', 'Mua VPS (#VPS Trial 1-1-126)'),
(1570, 'tdquanghuy1512', 40100, 40000, 100, '2022-11-25 22:23:37', 'Admin jinvps trừ tiền ()'),
(1571, 'luvanthanh', 0, 90000, 90000, '2022-11-26 05:37:02', 'Nạp tiền tự động qua Ví Momo (#32472172388 - NAP104 - 90000)'),
(1572, 'luvanthanh', 90000, 90000, 0, '2022-11-26 05:37:20', 'Mua VPS (#VPS VN 1-1-20)'),
(1573, 'vuduynhien1', 0, 110000, 110000, '2022-11-26 18:43:02', 'Nạp tiền tự động qua Mbbank (#FT22330300811680 - CUSTOMER NAP635 Trace 497494 - 110000)'),
(1574, 'vuduynhien1', 110000, 55000, 55000, '2022-11-26 18:43:55', 'Mua VPS (#VPS Trial 1-2-126)'),
(1575, 'vuduynhien1', 55000, 55000, 0, '2022-11-26 18:44:02', 'Mua VPS (#VPS Trial 1-2-126)'),
(1576, '01215266238', 300, 40000, 40300, '2022-11-27 20:39:56', 'Admin jinvps cộng tiền ()'),
(1577, '01215266238', 40300, 40000, 300, '2022-11-27 20:40:22', 'Mua VPS (#VPS Trial 1-1-126)'),
(1578, 'daibeou2k5', 0, 55000, 55000, '2022-11-27 20:57:03', 'Nạp tiền tự động qua Mbbank (#FT22332927345236 - CUSTOMER NAP410 Trace 672415 - 55000)'),
(1579, 'daibeou2k5', 55000, 55000, 0, '2022-11-27 20:57:51', 'Mua VPS (#VPS Trial 1-2-126)'),
(1580, 'tamdz04', 13200, 171400, 184600, '2022-11-27 21:09:51', 'Nạp tiền tự động qua card seri (097007000008104)'),
(1581, 'tamdz04', 184600, 8370, 192970, '2022-11-27 21:10:27', 'Nạp tiền tự động qua card seri (097002000066292)'),
(1582, 'tamdz04', 192970, 180000, 12970, '2022-11-27 21:27:56', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1583, 'truong', 0, 55000, 55000, '2022-11-28 07:13:03', 'Nạp tiền tự động qua Mbbank (#FT22332022034306 - MB Nap636. TU: TRAN THANH TRUONG - 55000)'),
(1584, 'truong', 55000, 55000, 0, '2022-11-28 07:14:40', 'Mua VPS (#VPS Trial 1-2-126)'),
(1585, 'hungndecm', 0, 100000, 100000, '2022-11-28 11:35:02', 'Nạp tiền tự động qua Mbbank (#FT22332517221669 - CUSTOMER NAP222 FT22332808108988 Trace 46883 9 - 100000)'),
(1586, 'hungndecm', 100000, 100000, 0, '2022-11-28 11:35:19', 'Mua VPS (#VPS US 1-1-20)'),
(1587, 'co3132004', 8000, 80000, 88000, '2022-11-28 13:52:03', 'Nạp tiền tự động qua Ví Momo (#32565498988 - NAP289 - 80000)'),
(1588, '0829332494', 4100, 86600, 90700, '2022-11-29 15:22:14', 'Nạp tiền tự động qua card seri (10009184100730)'),
(1589, '0829332494', 90700, 80000, 10700, '2022-11-29 15:22:29', 'Mua VPS (#VPS Trial 2-4-126)'),
(1590, 'mcigroup', 20, 25000, 25020, '2022-11-29 21:29:02', 'Nạp tiền tự động qua Mbbank (#FT22333308084425 - MB NAP558. TU: NGUYEN DUONG TOAN - 25000)'),
(1591, 'co3132004', 88000, 80000, 8000, '2022-11-29 21:35:16', 'Mua VPS (#VPS Trial 2-4-126)'),
(1592, 'longhoang00045', 0, 200000, 200000, '2022-11-30 07:06:02', 'Nạp tiền tự động qua Mbbank (#FT22334996052228 - NAP500 - 200000)'),
(1593, 'longhoang00045', 200000, 200000, 0, '2022-11-30 07:06:39', 'Mua VPS (#NAT VPS 4-4-20)'),
(1594, 'hungndecm', 0, 100000, 100000, '2022-11-30 10:54:03', 'Nạp tiền tự động qua Mbbank (#FT22334502683278 - CUSTOMER NAP222 FT22334477584182 Trace 56253 6 - 100000)'),
(1595, 'hungndecm', 100000, 100000, 0, '2022-11-30 10:55:55', 'Mua VPS (#VPS US 1-1-20)'),
(1596, 'vipvcl02', 0, 40000, 40000, '2022-11-30 12:32:03', 'Nạp tiền tự động qua Mbbank (#FT22334701247204 - CUSTOMER NAP200 Trace 679670 - 40000)'),
(1597, 'vipvcl02', 40000, 40000, 0, '2022-11-30 12:34:43', 'Mua VPS (#VPS Trial 1-1-126)'),
(1598, 'linh041120044', 4000, 180000, 184000, '2022-11-30 22:20:03', 'Nạp tiền tự động qua Ví Momo (#32662708900 - NAP303 - 180000)'),
(1599, 'linh041120044', 184000, 180000, 4000, '2022-11-30 22:22:17', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1600, 'dangphuc4n', 0, 120000, 120000, '2022-12-01 09:48:03', 'Nạp tiền tự động qua Ví Momo (#32677109490 - NAP642 - 120000)'),
(1601, 'dangphuc4n', 120000, 120000, 0, '2022-12-01 09:48:24', 'Mua VPS (#VPS VN 1-2-20)'),
(1602, '01215266238', 300, 40000, 40300, '2022-12-01 18:39:03', 'Nạp tiền tự động qua Mbbank (#FT22335308601068 - MB NAP127. TU: NGUYEN QUY LINH CONG - 40000)'),
(1603, '01215266238', 40300, 40000, 300, '2022-12-01 18:39:16', 'Mua VPS (#VPS Trial 1-1-126)'),
(1604, 'Quangvungoc0903', 0, 40000, 40000, '2022-12-02 22:50:03', 'Nạp tiền tự động qua Mbbank (#FT22337913690782 - MB NAP643. TU: VU NGOC QUANG - 40000)'),
(1605, 'Quangvungoc0903', 40000, 40000, 0, '2022-12-02 22:51:17', 'Mua VPS (#VPS Trial 1-1-126)'),
(1606, 'hoangvietkt', 9000, 71000, 80000, '2022-12-03 06:34:02', 'Nạp tiền tự động qua Ví Momo (#32762674829 - NAP266 - 71000)'),
(1607, 'hoangvietkt', 80000, 80000, 0, '2022-12-03 06:58:33', 'Mua VPS (#VPS Trial 2-4-126)'),
(1608, 'hanhattoan', 0, 40000, 40000, '2022-12-03 15:34:02', 'Nạp tiền tự động qua Ví Momo (#32781162689 - NAP644 - 40000)'),
(1609, 'hanhattoan', 40000, 40000, 0, '2022-12-03 15:42:43', 'Mua VPS (#VPS Trial 1-1-126)'),
(1610, 'huyne1810', 0, 40000, 40000, '2022-12-03 22:24:03', 'Nạp tiền tự động qua Ví Momo (#32796102381 - NAP646 - 40000)'),
(1611, 'huyne1810', 40000, 40000, 0, '2022-12-03 22:24:17', 'Mua VPS (#VPS Trial 1-1-126)'),
(1612, 'huuhung', 0, 55000, 55000, '2022-12-04 11:00:03', 'Nạp tiền tự động qua Mbbank (#FT22339076847492 - CUSTOMER ZP695S8TMLD6 NAP648 Trace 029031 - 55000)'),
(1613, 'huuhung', 55000, 55000, 0, '2022-12-04 11:00:42', 'Mua VPS (#VPS Trial 1-2-126)'),
(1614, 'mcigroup', 25020, 55000, 80020, '2022-12-04 13:07:03', 'Nạp tiền tự động qua Ví Momo (#32815058304 - NAP558 - 55000)'),
(1615, 'Vanngoan007', 0, 450000, 450000, '2022-12-05 10:33:02', 'Nạp tiền tự động qua Mbbank (#FT22339908156930 - CUSTOMER NAP649 Trace 610630 - 450000)'),
(1616, 'Vanngoan007', 450000, 450000, 0, '2022-12-05 10:36:23', 'Mua VPS (#VPS Trial 8-32-126)'),
(1617, 'binhnrov3z', 0, 40000, 40000, '2022-12-06 09:39:03', 'Nạp tiền tự động qua Ví Momo (#32898068743 - NAP568 - 40000)'),
(1618, 'binhnrov3z', 40000, 40000, 0, '2022-12-06 09:39:36', 'Mua VPS (#VPS Trial 1-1-126)'),
(1619, 'Ghoulomg', 0, 180000, 180000, '2022-12-06 13:55:02', 'Nạp tiền tự động qua Ví Thesieure (#T2022120613405934 - NAP221 - 180000)'),
(1620, 'Ghoulomg', 180000, 180000, 0, '2022-12-06 18:25:23', 'Mua VPS (#VPS Trial 4-8-126)'),
(1621, 'hungndecm', 0, 100000, 100000, '2022-12-07 20:14:02', 'Nạp tiền tự động qua Mbbank (#FT22341748261652 - CUSTOMER NAP222 FT22341241902330 Trace 92582 3 - 100000)'),
(1622, 'hungndecm', 100000, 100000, 0, '2022-12-07 20:14:22', 'Mua VPS (#VPS US 1-1-20)'),
(1623, 'Saisan665', 0, 40000, 40000, '2022-12-08 14:00:03', 'Nạp tiền tự động qua Mbbank (#FT22342202483718 - CUSTOMER NAP511 Trace 844986 - 40000)'),
(1624, 'Saisan665', 40000, 40000, 0, '2022-12-08 14:00:17', 'Mua VPS (#VPS Trial 1-1-126)'),
(1625, 'phauvip13', 0, 50000, 50000, '2022-12-09 05:21:03', 'Nạp tiền tự động qua Ví Momo (#33034750871 - NAP624 - 50000)'),
(1626, 'phauvip13', 50000, 30000, 80000, '2022-12-09 05:23:02', 'Nạp tiền tự động qua Ví Momo (#33034514673 - NAP624 - 30000)'),
(1627, 'phauvip13', 80000, 80000, 0, '2022-12-09 05:23:09', 'Mua VPS (#VPS Trial 2-4-126)'),
(1628, 'Vanngoan007', 0, 450000, 450000, '2022-12-09 18:16:02', 'Nạp tiền tự động qua Mbbank (#FT22343949205065 - CUSTOMER NAP649 Trace 263871 - 450000)'),
(1629, 'Vanngoan007', 450000, 450000, 0, '2022-12-09 19:23:45', 'Mua VPS (#VPS Trial 8-32-126)'),
(1630, 'tuancamdo', 0, 55000, 55000, '2022-12-10 20:37:19', 'Admin jinvps cộng tiền (rf)'),
(1631, 'tuancamdo', 55000, 55000, 0, '2022-12-10 20:37:56', 'Mua VPS (#VPS Trial 1-2-126)'),
(1632, 'DucVuPro', 0, 55000, 55000, '2022-12-11 12:27:03', 'Nạp tiền tự động qua Mbbank (#FT22346799791294 - MB NAP654. TU: NGUYEN DUC VU - 55000)'),
(1633, 'DucVuPro', 55000, 55000, 0, '2022-12-11 12:27:18', 'Mua VPS (#VPS Trial 1-2-126)'),
(1634, 'ntb12345', 0, 40000, 40000, '2022-12-11 15:06:03', 'Nạp tiền tự động qua Ví Momo (#33150704902 - NAP655 - 40000)'),
(1635, 'ntb12345', 40000, 40000, 0, '2022-12-11 15:06:36', 'Mua VPS (#VPS Trial 1-1-126)'),
(1636, 'Hieunek2003', 0, 90000, 90000, '2022-12-11 19:08:03', 'Nạp tiền tự động qua Mbbank (#FT22346931276155 - MB NAP285. TU: NGUYEN QUANG HIEU - 90000)'),
(1637, 'Hieunek2003', 90000, 90000, 0, '2022-12-11 19:08:23', 'Mua VPS (#VPS VN 1-1-20)'),
(1638, 'vanbien122', 0, 40000, 40000, '2022-12-12 08:45:03', 'Nạp tiền tự động qua Ví Momo (#33180187726 - NAP657 - 40000)'),
(1639, 'vanbien122', 40000, 40000, 0, '2022-12-12 08:45:31', 'Mua VPS (#VPS Trial 1-1-126)'),
(1640, 'lethotuan4973', 0, 40000, 40000, '2022-12-12 12:28:02', 'Nạp tiền tự động qua Mbbank (#FT22346363076098 - CUSTOMER MBVCB 2822864743 051007 NAP658 CT t u 9842530204 LE THO TUAN toi 090465 7059 CAO NGOC QUANG LINH Ngan hang  Quan Doi  MB  Trace 051007 - 40000)'),
(1641, 'lethotuan4973', 40000, 40000, 0, '2022-12-12 12:28:32', 'Mua VPS (#VPS Trial 1-1-126)'),
(1642, '0335998613', 0, 55000, 55000, '2022-12-12 19:47:03', 'Nạp tiền tự động qua Mbbank (#FT22346549847799 - CUSTOMER NAP659 121222 19 45 13 698795 Trace  698795 - 55000)'),
(1643, '0335998613', 55000, 55000, 0, '2022-12-12 19:47:59', 'Mua VPS (#VPS Trial 1-2-126)'),
(1644, 'quaydz1234', 0, 320000, 320000, '2022-12-13 15:20:04', 'Nạp tiền tự động qua Mbbank (#FT22347322837087 - MB NAP662. TU: HOANG MANH PHUC - 320000)'),
(1645, 'quaydz1234', 320000, 320000, 0, '2022-12-13 15:21:32', 'Mua VPS (#VPS Trial 8-16-126)'),
(1646, 'quaydz1234', 0, 320000, 320000, '2022-12-13 16:58:03', 'Nạp tiền tự động qua Mbbank (#FT22347446230200 - MB NAP662. TU: HOANG MANH PHUC - 320000)'),
(1647, 'quaydz1234', 320000, 320000, 0, '2022-12-13 16:58:34', 'Mua VPS (#VPS Trial 8-16-126)'),
(1648, '0966382521', 0, 120000, 120000, '2022-12-13 17:08:02', 'Nạp tiền tự động qua Ví Momo (#33248510913 - NAP663 - 120000)'),
(1649, '0966382521', 120000, 120000, 0, '2022-12-13 17:08:26', 'Mua VPS (#VPS Trial 2-8-126)'),
(1650, 'keyofficial', 0, 45100, 45100, '2022-12-13 18:06:00', 'Nạp tiền tự động qua card seri (10009317431680)'),
(1651, 'keyofficial', 45100, 40000, 5100, '2022-12-13 18:06:35', 'Mua VPS (#VPS Trial 1-1-126)'),
(1652, 'linhham200', 0, 80000, 80000, '2022-12-13 18:29:04', 'Nạp tiền tự động qua Ví Momo (#33252141044 - NAP664 - 80000)'),
(1653, 'linhham200', 80000, 80000, 0, '2022-12-13 18:29:20', 'Mua VPS (#VPS Trial 2-4-126)'),
(1654, 'linh041120044', 4000, 80000, 84000, '2022-12-13 20:17:02', 'Nạp tiền tự động qua Ví Momo (#33256205458 - NAP303 - 80000)'),
(1655, 'linh041120044', 84000, 40000, 44000, '2022-12-13 20:20:50', 'Mua VPS (#VPS Trial 1-1-126)'),
(1656, 'tranbaokhue', 0, 40000, 40000, '2022-12-14 15:23:02', 'Nạp tiền tự động qua Ví Momo (#33288989149 - NAP653 - 40000)'),
(1657, 'tranbaokhue', 40000, 40000, 0, '2022-12-14 15:23:31', 'Mua VPS (#VPS Trial 1-1-126)'),
(1658, 'walaxu', 0, 20000, 20000, '2022-12-15 09:22:03', 'Nạp tiền tự động qua Ví Momo (#33317617352 - NAP666 - 20000)'),
(1659, 'walaxu', 20000, 300000, 320000, '2022-12-15 09:25:03', 'Nạp tiền tự động qua Ví Momo (#33317736569 - NAP666 - 300000)'),
(1660, 'walaxu', 320000, 320000, 0, '2022-12-15 10:07:52', 'Mua VPS (#VPS Trial 8-16-126)'),
(1661, 'Khaanngg', 0, 80000, 80000, '2022-12-16 09:29:04', 'Nạp tiền tự động qua Mbbank (#FT22350102005225 - CUSTOMER NAP668. TU: TRUONG PHUC KHANG - 80000)'),
(1662, 'Khaanngg', 80000, 80000, 0, '2022-12-16 09:30:18', 'Mua VPS (#VPS Trial 2-4-126)'),
(1663, 'hoquockhang', 0, 80000, 80000, '2022-12-16 12:45:03', 'Nạp tiền tự động qua Ví Momo (#33374985124 - NAP669 - 80000)'),
(1664, 'hoquockhang', 80000, 80000, 0, '2022-12-16 12:45:21', 'Mua VPS (#VPS Trial 2-4-126)'),
(1665, 'hoquockhang', 0, 650000, 650000, '2022-12-16 19:18:03', 'Nạp tiền tự động qua Ví Momo (#33390473753 - NAP669 - 650000)'),
(1666, 'hoquockhang', 650000, 650000, 0, '2022-12-16 19:20:21', 'Mua VPS (#VPS Trial 16-32-126)'),
(1667, 'phauvip13', 0, 240000, 240000, '2022-12-18 11:03:04', 'Nạp tiền tự động qua Ví Momo (#33456102663 - NAP624 - 240000)'),
(1668, 'phauvip13', 240000, 80000, 160000, '2022-12-18 11:04:55', 'Mua VPS (#VPS Trial 2-4-126)'),
(1669, 'phauvip13', 160000, 80000, 80000, '2022-12-18 11:04:57', 'Mua VPS (#VPS Trial 2-4-126)'),
(1670, 'phauvip13', 80000, 80000, 0, '2022-12-18 11:04:58', 'Mua VPS (#VPS Trial 2-4-126)'),
(1671, 'mcigroup', 80020, 80000, 20, '2022-12-18 15:24:58', 'Mua VPS (#VPS Trial 2-4-126)'),
(1672, '0981068001', 0, 240000, 240000, '2022-12-18 15:37:02', 'Nạp tiền tự động qua Ví Momo (#33466328987 - NAP672 - 240000)'),
(1673, '0981068001', 240000, 80000, 160000, '2022-12-18 15:41:40', 'Mua VPS (#VPS Trial 2-4-126)'),
(1674, '0981068001', 160000, 80000, 80000, '2022-12-18 15:41:56', 'Mua VPS (#VPS Trial 2-4-126)'),
(1675, 'Huy1509', 0, 40000, 40000, '2022-12-19 19:19:05', 'Nạp tiền tự động qua Ví Momo (#33515564850 - NAP675 - 40000)'),
(1676, 'Huy1509', 40000, 40000, 0, '2022-12-19 19:21:06', 'Mua VPS (#VPS Trial 1-1-126 ( Tạm Ngưng ))'),
(1677, 'jinvps', 0, 40000, 40000, '2022-12-19 20:31:17', 'Admin jinvps cộng tiền ()'),
(1678, 'jinvps', 40000, 40000, 0, '2022-12-19 20:31:26', 'Mua VPS (#VPS Trial 1-1-126 ( Tạm Ngưng ))'),
(1679, '109078', 0, 80000, 80000, '2022-12-19 21:10:05', 'Nạp tiền tự động qua Ví Momo (#33519905782 - NAP359 - 80000)'),
(1680, '109078', 80000, 80000, 0, '2022-12-19 21:11:02', 'Mua VPS (#VPS Trial 2-4-126)'),
(1681, 'naruto1s2', 0, 80000, 80000, '2022-12-20 16:29:02', 'Nạp tiền tự động qua Mbbank (#FT22354389056581 - CUSTOMER NAP453 Trace 769748 - 80000)'),
(1682, 'naruto1s2', 80000, 80000, 0, '2022-12-20 16:31:28', 'Mua VPS (#VPS Trial 2-4-126)'),
(1683, '0981068001', 80000, 10000, 90000, '2022-12-20 23:37:02', 'Nạp tiền tự động qua Mbbank (#FT22355009109026 - CUSTOMER NAP672. TU: LE THANH DAT - 10000)'),
(1684, '0981068001', 90000, 90000, 0, '2022-12-20 23:37:49', 'Mua VPS (#VPS VN 1-1-20)'),
(1685, 'quang162c2', 0, 120000, 120000, '2022-12-21 09:02:05', 'Nạp tiền tự động qua Ví Momo (#33614774845 - NAP681 - 120000)'),
(1686, 'quang162c2', 120000, 120000, 0, '2022-12-21 09:03:17', 'Mua VPS (#VPS Trial 2-8-126)'),
(1687, 'hitachi2618', 0, 250000, 250000, '2022-12-21 09:05:04', 'Nạp tiền tự động qua Ví Momo (#33615350229 - NAP682 - 250000)'),
(1688, 'hitachi2618', 250000, 250000, 0, '2022-12-21 09:06:34', 'Mua VPS (#VPS Trial 4-16-126)'),
(1689, 's2spmario000', 0, 120000, 120000, '2022-12-21 17:06:05', 'Nạp tiền tự động qua Ví Momo (#33633920121 - NAP687 - 120000)'),
(1690, 's2spmario000', 120000, 120000, 0, '2022-12-21 17:06:22', 'Mua VPS (#VPS VN 1-2-20)'),
(1691, 'HaQuan03', 0, 40000, 40000, '2022-12-21 22:06:03', 'Nạp tiền tự động qua Ví Momo (#33645343180 - NAP683 - 40000)'),
(1692, 'HaQuan03', 40000, 40000, 0, '2022-12-21 22:09:08', 'Mua VPS (#VPS Trial 1-1-126)'),
(1693, 'thuongdepjai12', 0, 40000, 40000, '2022-12-22 00:21:03', 'Nạp tiền tự động qua Mbbank (#FT22356414549780 - CUSTOMER NAP689. TU: NGUYEN TIEN THUONG - 40000)'),
(1694, 'thuongdepjai12', 40000, 40000, 0, '2022-12-22 00:22:30', 'Mua VPS (#VPS Trial 1-1-126)'),
(1695, 'hieuchen0806', 0, 120000, 120000, '2022-12-22 12:25:03', 'Nạp tiền tự động qua Mbbank (#FT22356400315007 - CUSTOMER NAP690. TU: DUONG MINH HIEU - 120000)'),
(1696, 'hieuchen0806', 120000, 120000, 0, '2022-12-22 12:25:15', 'Mua VPS (#VPS VN 1-2-20)'),
(1697, '0358447622', 0, 40000, 40000, '2022-12-22 15:27:02', 'Nạp tiền tự động qua Mbbank (#FT22356717450688 - CUSTOMER NAP400. TU: PHI THANH TUNG - 40000)'),
(1698, '0358447622', 40000, 40000, 0, '2022-12-22 15:27:25', 'Mua VPS (#VPS Trial 1-1-126)'),
(1699, 'namxfa', 0, 40000, 40000, '2022-12-24 19:46:03', 'Nạp tiền tự động qua Mbbank (#FT22360533601247 - CUSTOMER Nam chuyen NAP696 FT22360401401188  Trace 761344 - 40000)'),
(1700, 'namxfa', 40000, 40000, 0, '2022-12-24 19:47:28', 'Mua VPS (#VPS Trial 1-1-126)'),
(1701, 'amsbetrd', 0, 80000, 80000, '2022-12-24 20:03:03', 'Nạp tiền tự động qua Mbbank (#FT22360849703769 - CUSTOMER NAP699. TU: NGUYEN TUNG DUY - 80000)'),
(1702, 'amsbetrd', 80000, 80000, 0, '2022-12-24 20:03:06', 'Mua VPS (#VPS Trial 2-4-126)'),
(1703, 'Soibeti09', 0, 55000, 55000, '2022-12-24 21:40:04', 'Nạp tiền tự động qua Ví Momo (#33767630279 - nap703 - 55000)'),
(1704, 'vxeom36', 0, 80000, 80000, '2022-12-24 21:40:04', 'Nạp tiền tự động qua Ví Momo (#33763164638 - NAP535 - 80000)'),
(1705, 'Soibeti09', 55000, 55000, 0, '2022-12-24 21:56:41', 'Mua VPS (#VPS Trial 1-2-126)'),
(1706, 'vxeom36', 80000, 80000, 0, '2022-12-24 22:57:27', 'Mua VPS (#VPS Trial 2-4-126)'),
(1707, 'Administrator', 0, 40000, 40000, '2022-12-25 03:56:04', 'Nạp tiền tự động qua Mbbank (#FT22360829919219 - CUSTOMER IBFT NAP705 Trace 417666 - 40000)'),
(1708, 'Administrator', 40000, 40000, 0, '2022-12-25 03:56:23', 'Mua VPS (#VPS Trial 1-1-126)'),
(1709, 'trunks888', 0, 70000, 70000, '2022-12-25 09:27:02', 'Nạp tiền tự động qua Mbbank (#FT22360507115319 - CUSTOMER NAP706. TU: LE MINH HIEU - 70000)'),
(1710, 'trunks888', 70000, 70000, 0, '2022-12-25 09:27:16', 'Mua VPS (#NAT VPS 1-1-20)'),
(1711, 'manhhung6926', 0, 40000, 40000, '2022-12-25 21:14:03', 'Nạp tiền tự động qua Mbbank (#FT22360008502475 - CUSTOMER MB 0904657059 NAP693 Trace 783196 - 40000)'),
(1712, 'manhhung6926', 40000, 40000, 0, '2022-12-25 21:14:24', 'Mua VPS (#VPS Trial 1-1-126)'),
(1713, 'nhoklovemy1207', 15000, 40000, 55000, '2022-12-26 14:39:09', 'Nạp tiền tự động qua Ví Momo (#33830818819 - NAP168 - 40000)'),
(1714, 'nhoklovemy1207', 55000, 40000, 15000, '2022-12-26 14:39:37', 'Mua VPS (#VPS Trial 1-1-126)'),
(1715, 'Administrator', 0, 50000, 50000, '2022-12-26 16:51:03', 'Nạp tiền tự động qua Mbbank (#FT22360301855419 - CUSTOMER IBFT NAP705 Trace 521408 - 50000)'),
(1716, 'Administrator', 50000, 40000, 90000, '2022-12-26 19:41:05', 'Admin jinvps cộng tiền ()'),
(1717, 'Administrator', 90000, 90000, 0, '2022-12-26 19:44:16', 'Mua VPS (#VPS VN 1-1-20)'),
(1718, 'Ghoulomg', 0, 80000, 80000, '2022-12-27 14:40:13', 'Admin jinvps cộng tiền (tsr)'),
(1719, 'minhphuc12365', 0, 80000, 80000, '2022-12-27 14:40:30', 'Admin jinvps cộng tiền (atm)'),
(1720, 'Ghoulomg', 80000, 80000, 0, '2022-12-27 14:43:16', 'Mua VPS (#VPS Trial 2-4-126)'),
(1721, 'minhphuc12365', 80000, 80000, 0, '2022-12-27 14:44:47', 'Mua VPS (#VPS Trial 2-4-126)'),
(1722, 'tamdz04', 12970, 178600, 191570, '2022-12-27 17:29:50', 'Nạp tiền tự động qua card seri (59850005973200)'),
(1723, 'tamdz04', 191570, 180000, 11570, '2022-12-27 17:30:35', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1724, 'tanpquo123', 700, 80000, 80700, '2022-12-27 19:32:04', 'Nạp tiền tự động qua Ví Momo (#33882588083 - NAP183 - 80000)'),
(1725, 'tanpquo123', 80700, 80000, 700, '2022-12-27 19:32:49', 'Mua VPS (#VPS Trial 2-4-126)'),
(1726, 'traidep', 0, 90000, 90000, '2022-12-28 11:18:04', 'Nạp tiền tự động qua Ví Momo (#33892641204 - NAP709 - 90000)'),
(1727, 'traidep', 90000, 90000, 0, '2022-12-28 13:05:30', 'Mua VPS (#VPS VN 1-1-20)'),
(1728, 'luvanthanh', 0, 90000, 90000, '2022-12-28 21:38:03', 'Nạp tiền tự động qua Mbbank (#FT22362203766066 - CUSTOMER MBVCB 2897955391 044706 NAP104 CT t u 1020640218 LU VAN THANH toi 09046 57059 CAO NGOC QUANG LINH Ngan hang  Quan Doi  MB  Trace 044706 - 90000)'),
(1729, 'luvanthanh', 90000, 90000, 0, '2022-12-28 21:39:43', 'Mua VPS (#VPS VN 1-1-20)'),
(1730, 'co3132004', 8000, 80000, 88000, '2022-12-29 10:19:04', 'Nạp tiền tự động qua Mbbank (#FT22363605314784 - CUSTOMER NAP289. TU: PHAM NGOC SON - 80000)'),
(1731, 'co3132004', 88000, 80000, 8000, '2022-12-29 10:22:50', 'Mua VPS (#VPS Trial 2-4-126)'),
(1732, 'Khiemnong2007', 0, 80000, 80000, '2022-12-29 11:37:05', 'Nạp tiền tự động qua Ví Momo (#33947591294 - NAP414 - 80000)'),
(1733, 'Khiemnong2007', 80000, 80000, 0, '2022-12-29 11:37:43', 'Mua VPS (#VPS Trial 2-4-126)'),
(1734, 'Abybabyb', 0, 180000, 180000, '2022-12-29 21:08:02', 'Nạp tiền tự động qua Mbbank (#FT22363697864784 - CUSTOMER MB 0904657059 nap428 Trace 363426 - 180000)'),
(1735, 'datcon1444', 0, 1300000, 1300000, '2022-12-29 22:30:03', 'Nạp tiền tự động qua Mbbank (#FT22363707463032 - CUSTOMER NAP711 FT22363730571609 Trace 12559 8 - 1300000)'),
(1736, 'datcon1444', 1300000, 320000, 980000, '2022-12-29 22:48:10', 'Mua VPS (#VPS Trial 8-16-126)'),
(1737, 'datcon1444', 980000, 320000, 660000, '2022-12-29 22:48:24', 'Mua VPS (#VPS Trial 8-16-126)'),
(1738, 'datcon1444', 660000, 320000, 340000, '2022-12-29 22:48:33', 'Mua VPS (#VPS Trial 8-16-126)'),
(1739, 'datcon1444', 340000, 320000, 20000, '2022-12-29 22:48:39', 'Mua VPS (#VPS Trial 8-16-126)'),
(1740, 'Abybabyb', 180000, 180000, 0, '2022-12-29 22:59:52', 'Mua VPS (#VPS Trial 4-8-126)'),
(1741, 'durex535', 0, 80000, 80000, '2022-12-30 08:01:03', 'Nạp tiền tự động qua Mbbank (#FT22364772308145 - CUSTOMER NAP712. TU: DO VAN QUYEN - 80000)'),
(1742, 'durex535', 80000, 80000, 0, '2022-12-30 08:01:35', 'Mua VPS (#VPS Trial 2-4-126)'),
(1743, 'hunghungvps', 0, 240000, 240000, '2022-12-30 12:17:04', 'Nạp tiền tự động qua Mbbank (#FT22364021473289 - CUSTOMER NAP627 Trace 314058 - 240000)'),
(1744, 'hunghungvps', 240000, 240000, 0, '2022-12-30 12:22:26', 'Mua VPS (#VPS Đặc Biệt 4-4-20)'),
(1745, '0829332494', 10700, 70000, 80700, '2022-12-30 14:12:05', 'Nạp tiền tự động qua Ví Momo (#33993772987 - NAP376 - 70000)'),
(1746, '0829332494', 80700, 80000, 700, '2022-12-30 14:26:11', 'Mua VPS (#VPS Trial 2-4-126)'),
(1747, 'phthduc', 0, 80000, 80000, '2022-12-30 18:27:05', 'Nạp tiền tự động qua Ví Momo (#34003193297 - NAP716 - 80000)'),
(1748, 'phthduc', 80000, 80000, 0, '2022-12-30 18:27:26', 'Mua VPS (#VPS Trial 2-4-126)'),
(1749, 'Minh2006', 0, 80000, 80000, '2022-12-30 22:38:04', 'Nạp tiền tự động qua Ví Momo (#34012752644 - NAP717 - 80000)'),
(1750, 'Minh2006', 80000, 80000, 0, '2022-12-30 22:39:29', 'Mua VPS (#VPS Trial 2-4-126)'),
(1751, 'minhhiu24', 1, 80000, 80001, '2022-12-31 10:39:03', 'Nạp tiền tự động qua Mbbank (#FT22365945808808 - CUSTOMER NAP430. TU: TRAN HUU MINH HIEU - 80000)'),
(1752, 'minhhiu24', 80001, 80000, 1, '2022-12-31 10:39:37', 'Mua VPS (#VPS Trial 2-4-126)'),
(1753, 'tamdz04', 11570, 43050, 54620, '2022-12-31 14:22:04', 'Nạp tiền tự động qua card seri (10009769122584)'),
(1754, 'tdquanghuy1512', 100, 40000, 40100, '2022-12-31 20:19:06', 'Nạp tiền tự động qua Mbbank (#FT23002401271111 - CUSTOMER NAP317. TU: NGUYEN DUC VINH - 40000)'),
(1755, 'tdquanghuy1512', 40100, 30000, 70100, '2022-12-31 22:07:04', 'Nạp tiền tự động qua Mbbank (#FT23002617073010 - CUSTOMER NAP317. TU: NGUYEN DUC VINH - 30000)'),
(1756, 'drablueskyyy', 0, 80000, 80000, '2022-12-31 22:12:45', 'Admin jinvps cộng tiền (tsr)'),
(1757, 'tdquanghuy1512', 70100, 10000, 80100, '2022-12-31 22:17:04', 'Nạp tiền tự động qua Mbbank (#FT23002378146104 - CUSTOMER NAP317. TU: NGUYEN DUC VINH - 10000)'),
(1758, 'tdquanghuy1512', 80100, 80000, 100, '2022-12-31 22:18:25', 'Mua VPS (#VPS Trial 2-4-126)'),
(1759, 'drablueskyyy', 80000, 80000, 0, '2023-01-01 05:42:49', 'Mua VPS (#VPS Trial 2-4-126)'),
(1760, 'aloxinh', 0, 80000, 80000, '2023-01-02 21:10:04', 'Nạp tiền tự động qua Ví Momo (#34129317749 - NAP724 - 80000)'),
(1761, 'aloxinh', 80000, 80000, 0, '2023-01-02 21:14:57', 'Mua VPS (#VPS Trial 2-4-126)'),
(1762, 'Huy1509', 0, 40000, 40000, '2023-01-03 17:26:05', 'Nạp tiền tự động qua Ví Momo (#34164681436 - NAP675 - 40000)'),
(1763, 'hoangvietkt', 0, 80000, 80000, '2023-01-03 21:56:40', 'Admin jinvps cộng tiền ()'),
(1764, 'co3132004', 8000, 62000, 70000, '2023-01-03 22:57:04', 'Nạp tiền tự động qua Mbbank (#FT23004990462801 - CUSTOMER NAP289. TU: PHAM NGOC SON - 62000)'),
(1765, 'co3132004', 70000, 70000, 0, '2023-01-03 22:58:29', 'Mua VPS (#NAT VPS 1-1-20)'),
(1766, 'linh041120044', 44000, 50000, 94000, '2023-01-04 08:14:04', 'Nạp tiền tự động qua Ví Momo (#34186184726 - NAP303 - 50000)'),
(1767, 'linh041120044', 94000, 90000, 4000, '2023-01-04 08:15:09', 'Mua VPS (#VPS VN 1-1-20)'),
(1768, 'hoangvietkt', 80000, 80000, 0, '2023-01-04 09:35:42', 'Mua VPS (#VPS Trial 2-4-126)'),
(1769, 'tttinhhh25', 0, 650000, 650000, '2023-01-04 20:11:07', 'Nạp tiền tự động qua Mbbank (#FT23004533165057 - CUSTOMER NAP725. TU: LE DUC TINH - 650000)'),
(1770, 'tttinhhh25', 650000, 650000, 0, '2023-01-04 20:13:29', 'Mua VPS (#VPS Trial 16-32-126)'),
(1771, 'truong', 0, 80000, 80000, '2023-01-04 22:19:02', 'Nạp tiền tự động qua Mbbank (#FT23005028240561 - CUSTOMER NAP636. TU: TRAN THANH TRUONG - 80000)'),
(1772, 'truong', 80000, 80000, 0, '2023-01-04 22:29:00', 'Mua VPS (#VPS Trial 2-4-126)'),
(1773, 'buianh9', 0, 80000, 80000, '2023-01-05 18:07:02', 'Nạp tiền tự động qua Mbbank (#FT23005095874992 - CUSTOMER NAP610 Trace 691102 - 80000)'),
(1774, 'buianh9', 80000, 80000, 0, '2023-01-05 18:07:31', 'Mua VPS (#VPS Trial 2-4-126)'),
(1775, 'Dinhhoang02', 0, 90000, 90000, '2023-01-05 22:32:03', 'Nạp tiền tự động qua Mbbank (#FT23006307800234 - CUSTOMER NAP726. TU: DINH VIET HOANG - 90000)'),
(1776, 'Dinhhoang02', 90000, 90000, 0, '2023-01-05 22:32:25', 'Mua VPS (#VPS VN 1-1-20)'),
(1777, 'co3132004', 0, 120000, 120000, '2023-01-06 16:27:02', 'Nạp tiền tự động qua Mbbank (#FT23006283998093 - CUSTOMER NAP289. TU: PHAM NGOC SON - 120000)'),
(1778, 'co3132004', 120000, 120000, 0, '2023-01-06 16:29:55', 'Mua VPS (#NAT VPS 2-2-20)'),
(1779, 'ducmanh88', 0, 80000, 80000, '2023-01-07 14:04:04', 'Nạp tiền tự động qua Ví Momo (#34327695365 - NAP729 - 80000)'),
(1780, 'ducmanh88', 80000, 80000, 0, '2023-01-07 14:05:45', 'Mua VPS (#VPS Trial 2-4-126)'),
(1781, 'tranlongth68', 0, 80000, 80000, '2023-01-07 21:33:04', 'Nạp tiền tự động qua Mbbank (#FT23009185942855 - CUSTOMER IBFT NAP731 Trace 753206 - 80000)'),
(1782, 'tranlongth68', 80000, 80000, 0, '2023-01-07 21:35:52', 'Mua VPS (#VPS Trial 2-4-126)'),
(1783, 'drablueskyyy', 0, 80000, 80000, '2023-01-09 10:22:02', 'Nạp tiền tự động qua Ví Thesieure (# - NAP718 - 80000)'),
(1784, 'Ghoulomg', 0, 40000, 40000, '2023-01-09 10:22:02', 'Nạp tiền tự động qua Ví Thesieure (# - NAP221 - 40000)'),
(1785, 'Tuandz121', 0, 40000, 40000, '2023-01-09 10:22:02', 'Nạp tiền tự động qua Ví Thesieure (# - NAP512 - 40000)'),
(1786, 'drablueskyyy', 80000, 80000, 160000, '2023-01-09 10:23:02', 'Nạp tiền tự động qua Ví Thesieure (#31122022200038 - NAP718 - 80000)'),
(1787, 'Ghoulomg', 40000, 40000, 80000, '2023-01-09 10:23:02', 'Nạp tiền tự động qua Ví Thesieure (#25122022224716 - NAP221 - 40000)'),
(1788, 'Ghoulomg', 80000, 40000, 120000, '2023-01-09 10:23:02', 'Nạp tiền tự động qua Ví Thesieure (#25122022071857 - NAP221 - 40000)'),
(1789, 'Ghoulomg', 120000, 180000, 300000, '2023-01-09 10:23:02', 'Nạp tiền tự động qua Ví Thesieure (#06122022135414 - NAP221 - 180000)'),
(1790, 'Tuandz121', 40000, 40000, 80000, '2023-01-09 10:23:02', 'Nạp tiền tự động qua Ví Thesieure (#25112022220257 - NAP512 - 40000)'),
(1791, 'Duy12hd', 107000, 80000, 27000, '2023-01-10 20:54:07', 'Mua VPS (#VPS Trial 2-4-126)'),
(1792, 'ntb12345', 0, 90000, 90000, '2023-01-11 18:48:06', 'Nạp tiền tự động qua Ví Momo (#34538894602 - NAP655 - 90000)'),
(1793, 'ntb12345', 90000, 90000, 0, '2023-01-11 18:52:39', 'Mua VPS (#VPS VN 1-1-20)'),
(1794, 'namnam', 0, 180000, 180000, '2023-01-11 23:04:10', 'Nạp tiền tự động qua Ví Momo (#34553891056 - NAP737 - 180000)'),
(1795, 'namnam', 180000, 180000, 0, '2023-01-11 23:05:04', 'Mua VPS (#VPS Trial 4-8-126)'),
(1796, 'tttinhhh25', 0, 320000, 320000, '2023-01-12 21:23:09', 'Nạp tiền tự động qua Ví Momo (#34612744763 - NAP725 - 320000)'),
(1797, 'tttinhhh25', 320000, 320000, 0, '2023-01-12 21:23:20', 'Mua VPS (#VPS Trial 8-16-126)'),
(1798, 'chamie0cute', 0, 180000, 180000, '2023-01-13 14:58:43', 'Admin jinvps cộng tiền (tsr)'),
(1799, 'chamie0cute', 180000, 180000, 0, '2023-01-13 16:14:44', 'Mua VPS (#VPS Trial 4-8-126)'),
(1800, 'tranbaokhue', 0, 40000, 40000, '2023-01-14 08:37:04', 'Nạp tiền tự động qua Ví Momo (#34690030484 - NAP653 - 40000)'),
(1801, 'tranbaokhue', 40000, 40000, 0, '2023-01-14 08:51:57', 'Mua VPS (#VPS Trial 1-1-126)'),
(1802, 'vothanhloc305', 0, 80000, 80000, '2023-01-14 20:27:03', 'Nạp tiền tự động qua Mbbank (#FT23016221526903 - CUSTOMER NAP742. TU: VO THANH LOC - 80000)'),
(1803, 'vothanhloc305', 80000, 80000, 0, '2023-01-14 20:31:41', 'Mua VPS (#VPS Trial 2-4-126)'),
(1804, 'tuancamdo', 0, 55000, 55000, '2023-01-14 21:30:05', 'Nạp tiền tự động qua Mbbank (#FT23016297439297 - CUSTOMER NAP489. TU: HOANG TRONG TUAN - 55000)'),
(1805, 'tuancamdo', 55000, 55000, 0, '2023-01-14 21:45:42', 'Mua VPS (#VPS Trial 1-2-126)'),
(1806, 'tamdz04', 54620, 87200, 141820, '2023-01-15 11:05:47', 'Nạp tiền tự động qua card seri (59700020697461)'),
(1807, 'tamdz04', 141820, 120000, 21820, '2023-01-15 11:08:58', 'Mua VPS (#VPS Trial 2-8-126)'),
(1808, 'Thien0901', 0, 89900, 89900, '2023-01-16 10:05:10', 'Nạp tiền tự động qua card seri (10009559814564)'),
(1809, 'Thien0901', 89900, 80000, 9900, '2023-01-16 10:05:25', 'Mua VPS (#VPS Trial 2-4-126)'),
(1810, 'Thien0901', 9900, 89900, 99800, '2023-01-16 11:12:28', 'Nạp tiền tự động qua card seri (10009559814569)'),
(1811, 'Thien0901', 99800, 8650, 108450, '2023-01-16 11:13:15', 'Nạp tiền tự động qua card seri (20000208513283)'),
(1812, 'Thien0901', 108450, 100000, 8450, '2023-01-16 11:13:24', 'Mua VPS (#NAT VPS 1-2-20)'),
(1813, 'thanhkhang1409', 0, 55000, 55000, '2023-01-16 17:04:07', 'Nạp tiền tự động qua Ví Momo (#34832404040 - NAP747 - 55000)'),
(1814, 'thanhkhang1409', 55000, 55000, 0, '2023-01-16 17:04:47', 'Mua VPS (#VPS Trial 1-2-20)'),
(1815, 'huyhoangvip', 0, 180000, 180000, '2023-01-16 21:49:03', 'Nạp tiền tự động qua Mbbank (#FT23016117257665 - CUSTOMER NAP748. TU: NGUYEN HUY HOANG - 180000)'),
(1816, 'huyhoangvip', 180000, 180000, 0, '2023-01-16 21:51:04', 'Mua VPS (#VPS Trial 4-8-126)'),
(1817, 'lambinhhoa', 0, 40000, 40000, '2023-01-17 09:45:04', 'Nạp tiền tự động qua Ví Momo (#34860334260 - NAP750 - 40000)'),
(1818, 'lambinhhoa', 40000, 40000, 0, '2023-01-17 09:46:12', 'Mua VPS (#VPS Trial 1-1-20)'),
(1819, 'datnm8', 0, 55000, 55000, '2023-01-17 10:49:50', 'Admin jinvps cộng tiền (mm)'),
(1820, 'datnm8', 55000, 55000, 0, '2023-01-17 10:51:06', 'Mua VPS (#VPS Trial 1-2-20)'),
(1821, 'kintong2002', 0, 40000, 40000, '2023-01-17 17:55:03', 'Nạp tiền tự động qua Mbbank (#FT23017503004175 - CUSTOMER NAP752. TU: PHAM THONG QUOC - 40000)'),
(1822, 'kintong2002', 40000, 40000, 0, '2023-01-17 18:04:20', 'Mua VPS (#VPS Trial 1-1-20)'),
(1823, 'minghieu1', 0, 180000, 180000, '2023-01-18 20:02:02', 'Nạp tiền tự động qua Mbbank (#FT23018607906206 - CUSTOMER NAP146. TU: BUI MINH HIEU - 180000)'),
(1824, 'minghieu1', 180000, 180000, 0, '2023-01-18 20:02:22', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1825, 'mqm0307', 0, 40000, 40000, '2023-01-19 09:30:03', 'Nạp tiền tự động qua Mbbank (#FT23019891164768 - CUSTOMER NAP753. TU: MA THI HA PHUONG - 40000)'),
(1826, 'mqm0307', 40000, 40000, 0, '2023-01-19 09:30:23', 'Mua VPS (#VPS Trial 1-1-20)'),
(1827, 'thuongdepjai12', 0, 80000, 80000, '2023-01-19 18:02:02', 'Nạp tiền tự động qua Mbbank (#FT23019600163969 - CUSTOMER NAP689. TU: NGUYEN TIEN THUONG - 80000)'),
(1828, 'thuongdepjai12', 80000, 80000, 0, '2023-01-19 18:05:12', 'Mua VPS (#VPS Trial 2-4-80)'),
(1829, 'liemhaohao2', 0, 80000, 80000, '2023-01-19 18:27:02', 'Nạp tiền tự động qua Mbbank (#FT23019061632293 - CUSTOMER IBFT NAP736 Trace 164382 - 80000)'),
(1830, 'liemhaohao2', 80000, 40000, 40000, '2023-01-19 18:35:17', 'Mua VPS (#VPS Trial 1-1-20)'),
(1831, '0867455307', 0, 40000, 40000, '2023-01-20 00:23:09', 'Nạp tiền tự động qua Ví Momo (#35012776780 - NAP757 - 40000)'),
(1832, '0867455307', 40000, 10000, 50000, '2023-01-20 00:24:04', 'Nạp tiền tự động qua Ví Momo (#35013391078 - NAP757 - 10000)'),
(1833, '0867455307', 50000, 40000, 10000, '2023-01-20 00:27:37', 'Mua VPS (#VPS Trial 1-1-20)'),
(1834, 'Tuandz2ca33', 0, 55000, 55000, '2023-01-20 23:24:02', 'Nạp tiền tự động qua Mbbank (#FT23023904561674 - CUSTOMER NAP759. TU: VO ANH TUAN - 55000)'),
(1835, 'Tuandz2ca33', 55000, 55000, 0, '2023-01-20 23:28:35', 'Mua VPS (#VPS Trial 1-2-20)'),
(1836, '0358447622', 0, 40000, 40000, '2023-01-21 10:24:02', 'Nạp tiền tự động qua Mbbank (#FT23023950240537 - CUSTOMER NAP400. TU: PHI THANH TUNG - 40000)'),
(1837, 'huyhoangvip', 0, 100000, 100000, '2023-01-21 12:53:04', 'Nạp tiền tự động qua Ví Momo (#35077203679 - NAP748 - 100000)'),
(1838, 'huyhoangvip', 100000, 330000, 430000, '2023-01-22 08:38:03', 'Nạp tiền tự động qua Ví Momo (#35128915849 - NAP748 - 300000)'),
(1839, 'huyhoangvip', 430000, 400000, 30000, '2023-01-22 08:40:04', 'Mua VPS (#VPS Trial 8-32-126)'),
(1840, 'luanplus', 0, 88000, 88000, '2023-01-22 09:17:04', 'Nạp tiền tự động qua Ví Momo (#35130263814 - NAP760 - 80000)'),
(1841, 'luanplus', 88000, 80000, 8000, '2023-01-22 09:17:27', 'Mua VPS (#VPS Trial 2-4-80)'),
(1842, 'huyhoangvip', 30000, 385000, 415000, '2023-01-22 13:07:06', 'Nạp tiền tự động qua Ví Momo (#35141993124 - NAP748 - 350000)'),
(1843, 'huyhoangvip', 415000, 400000, 815000, '2023-01-22 15:47:44', 'Admin jinvps cộng tiền (rf)'),
(1844, 'huyhoangvip', 815000, 800000, 15000, '2023-01-22 16:13:48', 'Mua VPS (#VPS Trial 16-64-126)'),
(1845, 'duy1502', 0, 550000, 550000, '2023-01-22 21:20:29', 'Admin jinvps cộng tiền ()'),
(1846, 'duy1502', 550000, 500000, 50000, '2023-01-22 21:23:31', 'Mua VPS (#VPS 4-8-100)'),
(1847, 'duy1502', 50000, 561000, 611000, '2023-01-23 09:53:45', 'Admin jinvps cộng tiền (Tsr)'),
(1848, 'duy1502', 611000, 580000, 31000, '2023-01-23 09:54:33', 'Mua VPS (#VPS VN 8-8-60)'),
(1849, 'Tanzx123', 0, 44000, 44000, '2023-01-23 12:03:04', 'Nạp tiền tự động qua Ví Momo (#35183308239 - NAP763 - 40000)'),
(1850, 'Tanzx123', 44000, 40000, 4000, '2023-01-23 12:03:26', 'Mua VPS (#VPS Trial 1-1-20)'),
(1851, 'trieuducdung1', 0, 275000, 275000, '2023-01-23 15:50:04', 'Nạp tiền tự động qua Ví Momo (#35191459717 - NAP764 - 250000)'),
(1852, 'trieuducdung1', 275000, 250000, 25000, '2023-01-23 15:57:58', 'Mua VPS (#VPS Trial 4-16-126)'),
(1853, 'Leminhtantai', 0, 198000, 198000, '2023-01-24 15:00:50', 'Admin jinvps cộng tiền (tsr)'),
(1854, 'Leminhtantai', 198000, 180000, 18000, '2023-01-24 15:02:19', 'Mua VPS (#VPS Trial 4-8-126)'),
(1855, 'minhhiu24', 1, 88000, 88001, '2023-01-24 18:28:04', 'Nạp tiền tự động qua Ví Momo (#35236624182 - NAP430 - 80000)'),
(1856, 'minhhiu24', 88001, 80000, 8001, '2023-01-24 18:29:08', 'Mua VPS (#VPS Trial 2-4-80)'),
(1857, 's2vanhdaika2s', 0, 44000, 44000, '2023-01-24 19:43:05', 'Nạp tiền tự động qua Mbbank (#FT23025855976155 - CUSTOMER NAP767. TU: HOANG HUU VIET ANH - 40000)'),
(1858, 's2vanhdaika2s', 44000, 40000, 4000, '2023-01-24 19:43:17', 'Mua VPS (#VPS Trial 1-1-20)'),
(1859, 'bingz8', 0, 88000, 88000, '2023-01-25 16:22:03', 'Nạp tiền tự động qua Mbbank (#FT23025465006109 - CUSTOMER NAP771. TU: TONG XUAN TRUONG - 80000)'),
(1860, 'bingz8', 88000, 80000, 8000, '2023-01-25 16:23:17', 'Mua VPS (#VPS Trial 2-4-80)'),
(1861, 'tuanz10', 0, 60500, 60500, '2023-01-25 18:46:02', 'Nạp tiền tự động qua Mbbank (#FT23025004689069 - CUSTOMER NAP772. TU: NGUYEN HOANG TUAN - 55000)'),
(1862, 'tuanz10', 60500, 55000, 5500, '2023-01-25 18:46:53', 'Mua VPS (#VPS Trial 1-2-20)'),
(1863, 'Van123', 0, 44000, 44000, '2023-01-25 19:47:03', 'Nạp tiền tự động qua Mbbank (#FT23026000692315 - CUSTOMER NAP765. TU: VU BA VAN - 40000)'),
(1864, 'Van123', 44000, 40000, 4000, '2023-01-25 19:47:40', 'Mua VPS (#VPS Trial 1-1-20)'),
(1865, 'Administrator', 0, 99000, 99000, '2023-01-25 20:25:11', 'Nạp tiền tự động qua Mbbank (#FT23026297919756 - CUSTOMER IBFT NAP705 Trace 474858 - 90000)'),
(1866, 'thuongdepjai12', 0, 33000, 33000, '2023-01-25 20:56:23', 'Nạp tiền tự động qua Ví Momo (#35277415843 - NAP689 - 30000)'),
(1867, 'thuongdepjai12', 33000, 20000, 53000, '2023-01-25 21:18:24', 'Admin jinvps cộng tiền ()'),
(1868, 'manhhung6926', 0, 44000, 44000, '2023-01-26 07:15:03', 'Nạp tiền tự động qua Mbbank (#FT23026016855033 - CUSTOMER MB 0904657059 NAP693 Trace 856821 - 40000)'),
(1869, 'manhhung6926', 44000, 40000, 4000, '2023-01-26 07:15:12', 'Mua VPS (#VPS Trial 1-1-20)'),
(1870, 'minhhiu24', 8001, 176000, 184001, '2023-01-26 10:08:04', 'Nạp tiền tự động qua Ví Momo (#35293650724 - NAP430 - 160000)'),
(1871, 'minhhiu24', 184001, 80000, 104001, '2023-01-26 10:17:21', 'Mua VPS (#VPS Trial 2-4-80)'),
(1872, 'minhhiu24', 104001, 80000, 24001, '2023-01-26 10:20:28', 'Mua VPS (#VPS Trial 2-4-80)'),
(1873, 'minhhiu24', 24001, 28000, 52001, '2023-01-26 10:24:03', 'Admin jinvps cộng tiền ()'),
(1874, 'Administrator', 99000, 90000, 9000, '2023-01-26 11:08:24', 'Admin jinvps trừ tiền (gia hạn vps)'),
(1875, 'minhhiu24', 52001, 100000, 152001, '2023-01-26 13:23:47', 'Nạp tiền tự động qua Ví Momo (#35300653708 - NAP430 - 100000)'),
(1876, 'minhhiu24', 152001, 80000, 72001, '2023-01-26 13:36:08', 'Mua VPS (#VPS Trial 2-4-80)'),
(1877, 'minhhiu24', 72001, 168000, 240001, '2023-01-26 13:41:04', 'Nạp tiền tự động qua Ví Momo (#35300617868 - NAP430 - 168000)'),
(1878, 'minhhiu24', 240001, 80000, 160001, '2023-01-26 13:42:16', 'Mua VPS (#VPS Trial 2-4-80)'),
(1879, 'minhhiu24', 160001, 80000, 80001, '2023-01-26 13:42:27', 'Mua VPS (#VPS Trial 2-4-80)'),
(1880, 'minhhiu24', 80001, 80000, 1, '2023-01-26 13:42:39', 'Mua VPS (#VPS Trial 2-4-80)'),
(1881, 'thienando', 700, 40000, 40700, '2023-01-26 17:46:05', 'Nạp tiền tự động qua Ví Momo (#35310888845 - NAP23 - 40000)'),
(1882, 'thienando', 40700, 40000, 700, '2023-01-26 17:48:50', 'Mua VPS (#VPS Trial 1-1-20)'),
(1883, 'vantien1601', 0, 120000, 120000, '2023-01-26 21:26:05', 'Nạp tiền tự động qua Ví Momo (#35319728908 - NAP776 - 120000)'),
(1884, 'vantien1601', 120000, 120000, 0, '2023-01-26 21:27:23', 'Mua VPS (#NAT VPS 2-2-20)'),
(1885, 'minhhiu24', 1, 160000, 160001, '2023-01-27 21:34:04', 'Nạp tiền tự động qua Ví Momo (#35369177827 - NAP430 - 160000)'),
(1886, 'minhhiu24', 160001, 80000, 80001, '2023-01-27 21:34:28', 'Mua VPS (#VPS Trial 2-4-80)'),
(1887, 'minhhiu24', 80001, 80000, 1, '2023-01-27 21:34:49', 'Mua VPS (#VPS Trial 2-4-80)'),
(1888, 'rteam911', 0, 180000, 180000, '2023-01-28 04:21:03', 'Nạp tiền tự động qua Mbbank (#FT23028284990040 - CUSTOMER MBVCB 3033790811 085088 NAP781 CT t u 1033623999 DANG HOANG MINH toi 09 04657059 CAO NGOC QUANG LINH Ngan h ang Quan Doi  MB  Trace 085088 - 180000)'),
(1889, 'rteam911', 180000, 180000, 0, '2023-01-28 04:22:22', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(1890, 'Nhat1912', 0, 80000, 80000, '2023-01-28 19:11:03', 'Nạp tiền tự động qua Mbbank (#FT23028075140433 - CUSTOMER NAP782. TU: PHUNG HUY NHAT - 80000)'),
(1891, 'Nhat1912', 80000, 80000, 0, '2023-01-28 19:12:40', 'Mua VPS (#VPS Trial 2-4-80)'),
(1892, 'huyakkrot1717', 0, 90000, 90000, '2023-01-28 22:44:08', 'Nạp tiền tự động qua Mbbank (#FT23030098288906 - CUSTOMER NAP784. TU: HA THI HONG - 90000)'),
(1893, 'huyakkrot1717', 90000, 90000, 0, '2023-01-28 22:53:13', 'Mua VPS (#VPS VN 1-1-20)'),
(1894, 'bimbimbap', 0, 40000, 40000, '2023-01-29 12:37:05', 'Nạp tiền tự động qua Ví Momo (#35454808013 - NAP756 - 40000)'),
(1895, 'bimbimbap', 40000, 40000, 0, '2023-01-29 12:37:38', 'Mua VPS (#VPS Trial 1-1-20)'),
(1896, 'tamdz04', 21820, 10000, 31820, '2023-01-29 17:08:25', 'Admin jinvps cộng tiền ()'),
(1897, 'xuanhuy1', 0, 40000, 40000, '2023-01-29 21:25:06', 'Nạp tiền tự động qua Ví Momo (#35482316032 - NAP220 - 40000)'),
(1898, 'xuanhuy1', 40000, 40000, 0, '2023-01-29 21:30:39', 'Mua VPS (#VPS Trial 1-1-20)'),
(1899, 'Ghoulomg', 300000, 40000, 260000, '2023-01-29 21:58:58', 'Mua VPS (#VPS Trial 1-1-20)'),
(1900, 'Ghoulomg', 260000, 40000, 220000, '2023-01-29 21:59:03', 'Mua VPS (#VPS Trial 1-1-20)'),
(1901, 'tommy23vn', 0, 55000, 55000, '2023-01-29 22:52:14', 'Nạp tiền tự động qua Ví Momo (#35485185796 - NAP787 - 55000)'),
(1902, 'tommy23vn', 55000, 55000, 0, '2023-01-29 22:52:35', 'Mua VPS (#VPS Trial 1-2-20)'),
(1903, 'hoangzhen', 0, 100000, 100000, '2023-01-31 09:55:06', 'Nạp tiền tự động qua Ví Momo (#35570682245 - NAP791 - 100000)'),
(1904, 'hoangzhen', 100000, 40000, 60000, '2023-01-31 10:15:43', 'Mua VPS (#VPS Trial 1-1-20)'),
(1905, 'itdeveloper', 0, 40000, 40000, '2023-01-31 17:30:03', 'Nạp tiền tự động qua Mbbank (#FT23031959307073 - CUSTOMER NAP792. TU: GIANG A LANH - 40000)'),
(1906, 'itdeveloper', 40000, 40000, 0, '2023-01-31 17:30:44', 'Mua VPS (#VPS Trial 1-1-20)'),
(1907, 'Playzoy', 0, 40000, 40000, '2023-01-31 18:23:02', 'Nạp tiền tự động qua Mbbank (#FT23031002280165 - CUSTOMER NAP793. TU: NGUYEN MINH DANH - 40000)'),
(1908, 'Ghoulomg', 220000, 55000, 165000, '2023-01-31 22:30:30', 'Mua VPS (#VPS Trial 1-2-20)'),
(1909, 'tdquanghuy1512', 100, 40000, 40100, '2023-02-01 13:26:04', 'Nạp tiền tự động qua Mbbank (#FT23032995950648 - CUSTOMER NAP317. TU: NGUYEN DUC VINH - 40000)'),
(1910, 'tdquanghuy1512', 40100, 40000, 100, '2023-02-01 14:14:13', 'Mua VPS (#VPS Trial 1-1-20)'),
(1911, 'Playzoy', 0, 40000, 40000, '2023-02-01 15:10:48', 'Admin jinvps cộng tiền ()'),
(1912, 'jinvps', 0, 40000, 40000, '2023-02-01 20:39:20', 'Admin jinvps cộng tiền ()'),
(1913, 'jinvps', 40000, 40000, 0, '2023-02-01 20:40:30', 'Mua VPS (#VPS Trial 1-1-20)'),
(1914, 'Thangdubai8888', 0, 80000, 80000, '2023-02-01 21:48:03', 'Nạp tiền tự động qua Mbbank (#FT23032954950328 - CUSTOMER NAP797. TU: PHAM THANH LUAN - 80000)'),
(1915, 'Thangdubai8888', 80000, 80000, 0, '2023-02-01 21:49:55', 'Mua VPS (#VPS Trial 2-4-80)'),
(1916, 'Playzoy', 0, 40000, 40000, '2023-02-02 11:29:03', 'Admin jinvps cộng tiền ()'),
(1917, 'Playzoy', 40000, 40000, 0, '2023-02-02 11:31:07', 'Mua VPS (#VPS Trial 1-1-20)'),
(1918, '0829332494', 700, 43850, 44550, '2023-02-02 11:46:51', 'Nạp tiền tự động qua card seri (10008718817275)'),
(1919, '0829332494', 44550, 40000, 4550, '2023-02-02 11:47:32', 'Mua VPS (#VPS Trial 1-1-20)'),
(1920, 'hungdo1388', 0, 40000, 40000, '2023-02-04 00:20:08', 'Nạp tiền tự động qua Ví Momo (#35790070479 - NAP367 - 40000)'),
(1921, 'hungdo1388', 40000, 40000, 0, '2023-02-04 00:20:41', 'Mua VPS (#VPS Trial 1-1-20)'),
(1922, 'linh041120044', 4000, 86000, 90000, '2023-02-04 08:32:04', 'Nạp tiền tự động qua Ví Momo (#35797483580 - NAP303 - 86000)'),
(1923, 'linh041120044', 90000, 90000, 0, '2023-02-04 08:32:16', 'Mua VPS (#VPS VN 1-1-20)'),
(1924, 'sunchan06', 0, 40000, 40000, '2023-02-04 09:12:06', 'Nạp tiền tự động qua Mbbank (#FT23035940473076 - CUSTOMER NAP801 Trace 880500 - 40000)'),
(1925, 'sunchan06', 40000, 40000, 0, '2023-02-04 09:14:14', 'Mua VPS (#VPS Trial 1-1-20)'),
(1926, 'Ghoulomg', 165000, 40000, 125000, '2023-02-05 11:58:40', 'Mua VPS (#VPS Trial 1-1-20)'),
(1927, 'Ghoulomg', 125000, 40000, 85000, '2023-02-05 11:58:51', 'Mua VPS (#VPS Trial 1-1-20)'),
(1928, 'Saisan665', 0, 40000, 40000, '2023-02-06 07:18:03', 'Nạp tiền tự động qua Mbbank (#FT23037900307645 - CUSTOMER NAP511 Trace 342804 - 40000)'),
(1929, 'Saisan665', 40000, 40000, 0, '2023-02-06 07:18:35', 'Mua VPS (#VPS Trial 1-1-20)'),
(1930, 'cusino20', 0, 200000, 200000, '2023-02-06 10:45:02', 'Nạp tiền tự động qua Mbbank (#FT23037286596859 - CUSTOMER NAP770. TU: DAO VAN THANG - 200000)'),
(1931, 'cusino20', 200000, 180000, 20000, '2023-02-06 11:11:40', 'Mua VPS (#VPS Trial 4-8-126)'),
(1932, 'Ghoulomg', 85000, 40000, 45000, '2023-02-06 12:08:39', 'Mua VPS (#VPS Trial 1-1-20)'),
(1933, 'qwerty15', 0, 55000, 55000, '2023-02-08 13:07:09', 'Nạp tiền tự động qua Ví Momo (#36016276708 - NAP622 - 55000)'),
(1934, 'qwerty15', 55000, 55000, 0, '2023-02-08 13:10:19', 'Mua VPS (#VPS Trial 1-2-20)'),
(1935, 'hongphuc', 0, 450000, 450000, '2023-02-08 15:14:03', 'Nạp tiền tự động qua Mbbank (#FT23039923999519 - CUSTOMER NAP805 Trace 857386 - 450000)'),
(1936, 'hongphuc', 450000, 400000, 50000, '2023-02-08 15:14:27', 'Mua VPS (#VPS Trial 8-32-126)'),
(1937, 'hongphuc', 50000, 50000, 0, '2023-02-08 15:14:51', 'Mua VPS (#Proxy HTTP VN)'),
(1938, 'Tanhung16997', 0, 40000, 40000, '2023-02-08 19:25:14', 'Nạp tiền tự động qua Ví Momo (#36034935527 - nap293 - 40000)'),
(1939, 'Tanhung16997', 40000, 40000, 0, '2023-02-08 19:25:43', 'Mua VPS (#VPS Trial 1-1-20)'),
(1940, 'luvanthanh', 0, 40000, 40000, '2023-02-09 12:47:05', 'Nạp tiền tự động qua Ví Momo (#36065666149 - NAP104 - 40000)'),
(1941, 'luvanthanh', 40000, 40000, 0, '2023-02-09 12:48:22', 'Mua VPS (#VPS Trial 1-1-20)'),
(1942, 'tamdz04', 31820, 10000, 41820, '2023-02-09 15:27:02', 'Nạp tiền tự động qua Ví Thesieure (#T2023012914389125 - NAP599 - 10000)'),
(1943, 'minhhiu24', 1, 28000, 28001, '2023-02-09 15:27:02', 'Nạp tiền tự động qua Ví Thesieure (#T2023012614317364 - NAP430 - 28000)'),
(1944, 'thuongdepjai12', 53000, 20000, 73000, '2023-02-09 15:27:02', 'Nạp tiền tự động qua Ví Thesieure (#T2023012514310717 - NAP689 - 20000)'),
(1945, 'Leminhtantai', 18000, 180000, 198000, '2023-02-09 15:27:02', 'Nạp tiền tự động qua Ví Thesieure (#T2023012414270461 - NAP766 - 180000)'),
(1946, 'duy1502', 31000, 510000, 541000, '2023-02-09 15:27:02', 'Nạp tiền tự động qua Ví Thesieure (#T2023012314231148 - NAP762 - 510000)'),
(1947, 'duy1502', 541000, 500000, 1041000, '2023-02-09 15:27:02', 'Nạp tiền tự động qua Ví Thesieure (#T2023012214225182 - NAP762 - 500000)'),
(1948, 'tamdz04', 41820, 10000, 31820, '2023-02-09 15:49:28', 'Admin jinvps trừ tiền ()'),
(1949, 'minhhiu24', 28001, 28000, 1, '2023-02-09 15:49:48', 'Admin jinvps trừ tiền ()'),
(1950, 'thuongdepjai12', 73000, 20000, 53000, '2023-02-09 15:50:12', 'Admin jinvps trừ tiền ()'),
(1951, 'Leminhtantai', 198000, 180000, 18000, '2023-02-09 15:50:31', 'Admin jinvps trừ tiền ()'),
(1952, 'duy1502', 1041000, 1010000, 31000, '2023-02-09 15:50:57', 'Admin jinvps trừ tiền ()'),
(1953, '109078', 0, 40000, 40000, '2023-02-09 17:21:02', 'Nạp tiền tự động qua Mbbank (#FT23040963358640 - CUSTOMER NAPAZ359. TU: NGUYEN TAN DAT - 40000)'),
(1954, '109078', 40000, 40000, 0, '2023-02-09 17:21:36', 'Mua VPS (#VPS Trial 1-1-20)'),
(1955, 'Duy12hd', 27000, 70000, 97000, '2023-02-09 20:49:11', 'Admin jinvps cộng tiền ()'),
(1956, 'Duy12hd', 97000, 80000, 17000, '2023-02-09 20:58:04', 'Mua VPS (#VPS Trial 2-4-80)'),
(1957, 'NHHDTTP', 0, 40000, 40000, '2023-02-10 11:47:10', 'Nạp tiền tự động qua Ví Momo (#36115532037 - NAPAZ809 - 40000)'),
(1958, 'NHHDTTP', 40000, 40000, 0, '2023-02-10 11:47:45', 'Mua VPS (#VPS Trial 1-1-20)'),
(1959, '0829332494', 4550, 120000, 124550, '2023-02-10 12:02:20', 'Nạp tiền tự động qua Ví Momo (#36116838563 - NAPAZ376 - 120000)'),
(1960, '0829332494', 124550, 120000, 4550, '2023-02-10 12:03:18', 'Mua VPS (#VPS Trial 2-8-126)'),
(1961, 'ntb12345', 0, 120000, 120000, '2023-02-10 19:28:03', 'Nạp tiền tự động qua Mbbank (#FT23041019702456 - CUSTOMER NAPAZ655. TU: NGUYEN TRONG BAO - 120000)'),
(1962, 'ntb12345', 120000, 120000, 0, '2023-02-10 19:30:05', 'Mua VPS (#VPS VN 1-2-20)'),
(1963, 'tamdz04', 31820, 89300, 121120, '2023-02-12 00:23:19', 'Nạp tiền tự động qua card seri (10009602018192)'),
(1964, 'tamdz04', 121120, 120000, 1120, '2023-02-12 00:24:22', 'Mua VPS (#VPS Trial 2-8-126)'),
(1965, 'Phuocdepzai', 0, 177200, 177200, '2023-02-12 14:44:52', 'Nạp tiền tự động qua card seri (10008842624167)'),
(1966, 'hotrongtai', 0, 40000, 40000, '2023-02-12 15:02:05', 'Nạp tiền tự động qua Mbbank (#FT23044001743840 - CUSTOMER NAPAZ402. TU: HO TRONG TAI - 40000)'),
(1967, 'hotrongtai', 40000, 40000, 0, '2023-02-12 15:02:08', 'Mua VPS (#VPS Trial 1-1-20)'),
(1968, 'Ductran662003', 0, 40000, 40000, '2023-02-12 16:01:03', 'Nạp tiền tự động qua Mbbank (#FT23044220669159 - CUSTOMER NAPAZ812. TU: TRAN VAN DUC - 40000)'),
(1969, 'Ductran662003', 40000, 40000, 0, '2023-02-12 16:01:42', 'Mua VPS (#VPS Trial 1-1-20)'),
(1970, 'Phuocdepzai', 177200, 177200, 354400, '2023-02-12 16:32:28', 'Nạp tiền tự động qua card seri (10008842624298)'),
(1971, 'Phuocdepzai', 354400, 350000, 4400, '2023-02-12 19:57:21', 'Mua VPS (#VPS Trial 8-16-126)'),
(1972, 'jinvps', 0, 40000, 40000, '2023-02-14 20:44:09', 'Admin jinvps cộng tiền ()'),
(1973, 'jinvps', 40000, 40000, 0, '2023-02-14 20:50:07', 'Mua VPS (#VPS Trial 1-1-20)'),
(1974, 'chicken123', 1977, 100000, 101977, '2023-02-14 20:54:38', 'Admin chicken123 cộng tiền ()'),
(1975, 'chicken123', 101977, 90000, 11977, '2023-02-14 20:55:52', 'Mua VPS (#VPS VN 1-1-20)'),
(1976, 'chicken123', 11977, 1000000, 1011977, '2023-02-14 21:16:30', 'Admin chicken123 cộng tiền ()'),
(1977, 'chicken123', 1011977, 40000, 971977, '2023-02-14 21:16:50', 'Mua VPS (#VPS Trial 1-1-20)'),
(1978, 'Nhat1912', 0, 80000, 80000, '2023-02-15 12:49:02', 'Nạp tiền tự động qua Mbbank (#FT23046959375486 - CUSTOMER NAPAZ782. TU: PHUNG HUY NHAT - 80000)'),
(1979, 'Nhat1912', 80000, 80000, 0, '2023-02-15 12:51:42', 'Mua VPS (#VPS Trial 2-4-80)'),
(1980, 'tamdz04', 1120, 44750, 45870, '2023-02-15 18:06:46', 'Nạp tiền tự động qua card seri (53510357513898)'),
(1981, 'tamdz04', 45870, 40000, 5870, '2023-02-15 18:08:10', 'Mua VPS (#VPS Trial 1-1-20)'),
(1982, 'sundepzai102', 0, 40000, 40000, '2023-02-16 15:38:05', 'Nạp tiền tự động qua Ví Momo (#36399411316 - NAPAZ820 - 40000)'),
(1983, 'sundepzai102', 40000, 40000, 0, '2023-02-16 15:41:26', 'Mua VPS (#VPS Trial 1-1-20)'),
(1984, 'PhuLuan99', 0, 180000, 180000, '2023-02-18 07:56:03', 'Nạp tiền tự động qua Mbbank (#FT23049305078552 - CUSTOMER NAPAZ823 Trace 582454 - 180000)'),
(1985, 'PhuLuan99', 180000, 180000, 0, '2023-02-18 07:56:47', 'Mua VPS (#VPS Trial 4-8-126)'),
(1986, 'massiu', 0, 80000, 80000, '2023-02-19 17:17:09', 'Nạp tiền tự động qua Ví Momo (#36517338045 - NAPAZ799 - 80000)'),
(1987, 'massiu', 80000, 80000, 0, '2023-02-19 17:17:29', 'Mua VPS (#VPS Trial 2-4-80)'),
(1988, 'Dusosnskskak', 0, 40000, 40000, '2023-02-19 18:21:02', 'Nạp tiền tự động qua Mbbank (#FT23051401096094 - CUSTOMER NAPAZ828. TU: NGUYEN VAN TUAN ANH - 40000)');
INSERT INTO `dongtien` (`id`, `username`, `sotientruoc`, `sotienthaydoi`, `sotiensau`, `thoigian`, `noidung`) VALUES
(1989, 'Dusosnskskak', 40000, 50000, 90000, '2023-02-19 19:34:15', 'Admin jinvps cộng tiền (atm)'),
(1990, 'Dusosnskskak', 90000, 90000, 0, '2023-02-19 19:36:58', 'Mua VPS (#VPS VN 1-1-20)'),
(1991, 'tamdz04', 5870, 90000, 95870, '2023-02-19 20:01:16', 'Admin jinvps cộng tiền ()'),
(1992, '0829332494', 4550, 90000, 94550, '2023-02-19 20:01:47', 'Admin jinvps cộng tiền (rf)'),
(1993, 'tamdz04', 95870, 40000, 55870, '2023-02-19 21:00:58', 'Mua VPS (#VPS Trial 1-1-20)'),
(1994, 'Dusosnskskak', 0, 50000, 50000, '2023-02-19 21:05:19', 'Nạp tiền tự động qua Mbbank (#FT23051058620608 - CUSTOMER NAPAZ828. TU: NGUYEN VAN TUAN ANH - 50000)'),
(1995, 'haixuan', 0, 80000, 80000, '2023-02-20 00:25:05', 'Nạp tiền tự động qua Ví Momo (#36529740599 - NAPAZ830 - 80000)'),
(1996, 'haixuan', 80000, 80000, 0, '2023-02-20 00:26:23', 'Mua VPS (#VPS Trial 2-4-80)'),
(1997, '0829332494', 94550, 80000, 14550, '2023-02-20 05:46:31', 'Mua VPS (#VPS Trial 2-4-80)'),
(1998, 'Hoangtuandz123', 0, 180000, 180000, '2023-02-20 18:05:04', 'Nạp tiền tự động qua Ví Momo (#36553488111 - NAPAZ832 - 180000)'),
(1999, 'Hoangtuandz123', 180000, 180000, 0, '2023-02-20 18:10:03', 'Mua VPS (#VPS Trial 4-8-126)'),
(2000, 'Dusosnskskak', 50000, 50000, 0, '2023-02-20 18:12:04', 'Admin jinvps trừ tiền ()'),
(2001, 'phieuvu', 0, 40000, 40000, '2023-02-21 10:51:04', 'Nạp tiền tự động qua Ví Momo (#36574067062 - NAPAZ834 - 40000)'),
(2002, 'phieuvu', 40000, 40000, 0, '2023-02-21 10:52:17', 'Mua VPS (#VPS Trial 1-1-20)'),
(2003, 'buianh9', 0, 40000, 40000, '2023-02-21 23:09:03', 'Nạp tiền tự động qua Ví Momo (#36598676128 - NAPAZ610 - 40000)'),
(2004, 'buianh9', 40000, 40000, 0, '2023-02-21 23:09:41', 'Mua VPS (#VPS Trial 1-1-20)'),
(2005, 'binhnrov3z', 0, 40000, 40000, '2023-02-22 11:54:04', 'Nạp tiền tự động qua Mbbank (#FT23053805722560 - CUSTOMER NAPAZ568. TU: TRAN DUY BINH - 40000)'),
(2006, 'binhnrov3z', 40000, 40000, 0, '2023-02-22 12:11:27', 'Mua VPS (#VPS Trial 1-1-20)'),
(2007, 'ceydan3004', 0, 55000, 55000, '2023-02-22 18:15:04', 'Nạp tiền tự động qua Ví Momo (#36623024047 - NAPAZ837 - 55000)'),
(2008, 'ceydan3004', 55000, 55000, 0, '2023-02-22 18:15:56', 'Mua VPS (#VPS Trial 1-2-20)'),
(2009, 'binhnrov3z', 0, 40000, 40000, '2023-02-23 11:35:20', 'Admin jinvps cộng tiền (rf)'),
(2010, 'binhnrov3z', 40000, 40000, 0, '2023-02-23 12:41:14', 'Mua VPS (#VPS Trial 1-1-20)'),
(2011, 'tommy23vn', 0, 650000, 650000, '2023-02-24 16:05:05', 'Nạp tiền tự động qua Ví Momo (#36695996300 - NAPAZ787 - 650000)'),
(2012, 'tommy23vn', 650000, 650000, 0, '2023-02-24 16:06:27', 'Mua VPS (#VPS Trial 16-32-126)'),
(2013, 'ianhvps', 0, 80000, 80000, '2023-02-24 19:47:04', 'Nạp tiền tự động qua Ví Momo (#36705960262 - NAPAZ829 - 80000)'),
(2014, 'ianhvps', 80000, 80000, 0, '2023-02-24 19:47:26', 'Mua VPS (#VPS Trial 2-4-80)'),
(2015, 'hayquen06', 0, 40000, 40000, '2023-02-25 10:13:03', 'Nạp tiền tự động qua Ví Momo (#36721915799 - NAPAZ321 - 40000)'),
(2016, 'hayquen06', 40000, 40000, 0, '2023-02-25 10:13:29', 'Mua VPS (#VPS Trial 1-1-20)'),
(2017, 'Playzoy', 0, 180000, 180000, '2023-02-25 19:41:03', 'Nạp tiền tự động qua Ví Momo (#36740161467 - NAPAZ793 - 180000)'),
(2018, 'Playzoy', 180000, 180000, 0, '2023-02-25 19:41:26', 'Mua VPS (#VPS Trial 4-8-126)'),
(2019, 'tamdz04', 55870, 45150, 101020, '2023-02-25 23:43:35', 'Nạp tiền tự động qua card seri (10009901120125)'),
(2020, 'tamdz04', 101020, 90000, 11020, '2023-02-25 23:46:50', 'Mua VPS (#VPS VN 1-1-20)'),
(2021, 'Administrator', 9000, 90000, 99000, '2023-02-26 23:37:02', 'Nạp tiền tự động qua Mbbank (#FT23058177263203 - CUSTOMER IBFT NAPAZ705 Trace 447028 - 90000)'),
(2022, 'Administrator', 99000, 90000, 9000, '2023-02-27 06:55:09', 'Admin jinvps trừ tiền ()'),
(2023, 'vantien1601', 0, 120000, 120000, '2023-02-27 16:29:05', 'Nạp tiền tự động qua Ví Momo (#36802150683 - NAPAZ776 - 120000)'),
(2024, 'anh0235', 0, 80000, 80000, '2023-02-27 17:46:10', 'Admin jinvps cộng tiền (tsr)'),
(2025, 'anh0235', 80000, 80000, 0, '2023-02-27 17:49:10', 'Mua VPS (#VPS Trial 2-4-80)'),
(2026, 'Administrator', 9000, 90000, -81000, '2023-02-27 21:45:04', 'Admin jinvps trừ tiền ()'),
(2027, 'vantien1601', 120000, 120000, 0, '2023-02-28 06:43:57', 'Admin jinvps trừ tiền (Gia hạn vps)'),
(2028, 'vinhhhlh123', 0, 350000, 350000, '2023-02-28 11:35:06', 'Nạp tiền tự động qua Ví Momo (#36828414709 - NAPAZ745 - 350000)'),
(2029, 'vinhhhlh123', 350000, 350000, 0, '2023-02-28 11:35:22', 'Mua VPS (#VPS Trial 8-16-126)'),
(2030, 'Nhat1912', 0, 80000, 80000, '2023-02-28 12:56:03', 'Nạp tiền tự động qua Mbbank (#FT23059602105180 - CUSTOMER NAPAZ782. TU: PHUNG HUY NHAT - 80000)'),
(2031, 'Nhat1912', 80000, 80000, 0, '2023-02-28 12:57:36', 'Mua VPS (#VPS Trial 2-4-80)'),
(2032, 'miubepbep', 0, 40000, 40000, '2023-02-28 21:52:28', 'Admin jinvps cộng tiền ()'),
(2033, 'miubepbep', 40000, 40000, 0, '2023-02-28 21:56:32', 'Mua VPS (#VPS Trial 1-1-20)'),
(2034, 'Nhat1912', 0, 80000, 80000, '2023-03-01 21:00:09', 'Admin jinvps cộng tiền ()'),
(2035, 'Nhat1912', 80000, 80000, 0, '2023-03-01 21:22:32', 'Mua VPS (#VPS Trial 2-4-80)'),
(2036, 'hoangzhen', 60000, 40000, 20000, '2023-03-02 02:12:17', 'Mua VPS (#VPS Trial 1-1-20)'),
(2037, 'anh0235', 0, 220000, 220000, '2023-03-02 18:13:29', 'Admin jinvps cộng tiền ()'),
(2038, 'anh0235', 220000, 220000, 0, '2023-03-02 18:44:36', 'Mua VPS (#VPS VN 2-4-20)'),
(2039, 'linh041120044', 0, 90000, 90000, '2023-03-04 13:39:04', 'Nạp tiền tự động qua Ví Momo (#37029803377 - NAPAZ303 - 90000)'),
(2040, 'linh041120044', 90000, 90000, 0, '2023-03-04 16:43:24', 'Admin jinvps trừ tiền (gia hajn vps)'),
(2041, 'ianhvps', 0, 135000, 135000, '2023-03-05 20:31:04', 'Nạp tiền tự động qua Ví Momo (#37093225531 - NAPAZ829 - 135000)'),
(2042, 'ianhvps', 135000, 55000, 80000, '2023-03-05 20:51:24', 'Mua VPS (#VPS Trial 1-2-20)'),
(2043, 'ianhvps', 80000, 80000, 0, '2023-03-05 20:51:44', 'Mua VPS (#VPS Trial 2-4-80)'),
(2044, 'tdquanghuy1512', 100, 40000, 40100, '2023-03-06 06:24:03', 'Nạp tiền tự động qua Mbbank (#FT23065398261502 - CUSTOMER NAPAZ317. TU: NGUYEN DUC VINH - 40000)'),
(2045, 'tdquanghuy1512', 40100, 40000, 100, '2023-03-06 09:01:39', 'Mua VPS (#VPS Trial 1-1-20)'),
(2046, 'ntb12345', 0, 120000, 120000, '2023-03-06 11:50:02', 'Nạp tiền tự động qua Mbbank (#FT23065463035509 - CUSTOMER NAPAZ655. TU: NGUYEN TRONG BAO - 120000)'),
(2047, 'ntb12345', 120000, 120000, 0, '2023-03-06 11:50:46', 'Mua VPS (#VPS VN 1-2-20)'),
(2048, 'Ductran662003', 0, 40000, 40000, '2023-03-06 17:20:03', 'Nạp tiền tự động qua Mbbank (#FT23065770037885 - CUSTOMER NAPAZ812. TU: TRAN VAN DUC - 40000)'),
(2049, '18lucjfer', 0, 80000, 80000, '2023-03-06 20:09:04', 'Nạp tiền tự động qua Ví Momo (#37150009678 - NAPAZ852 - 80000)'),
(2050, '18lucjfer', 80000, 80000, 0, '2023-03-06 20:09:40', 'Mua VPS (#VPS Trial 2-4-80)'),
(2051, 'quang162c2', 0, 180000, 180000, '2023-03-06 21:32:04', 'Nạp tiền tự động qua Ví Momo (#37154722206 - NAPAZ681 - 180000)'),
(2052, 'quang162c2', 180000, 180000, 0, '2023-03-06 21:32:59', 'Mua VPS (#VPS Trial 4-8-126)'),
(2053, 'Tur79', 0, 40000, 40000, '2023-03-06 23:30:04', 'Nạp tiền tự động qua Ví Momo (#37159496148 - NAPAZ516 - 40000)'),
(2054, 'Tur79', 40000, 40000, 0, '2023-03-06 23:34:20', 'Mua VPS (#VPS Trial 1-1-20)'),
(2055, '0935697905', 0, 40000, 40000, '2023-03-07 05:44:02', 'Nạp tiền tự động qua Ví Momo (#37167054292 - NAPAZ855 - 40000)'),
(2056, '0935697905', 40000, 40000, 0, '2023-03-07 05:58:50', 'Mua VPS (#VPS Trial 1-1-20)'),
(2057, 'manhtyc99', 0, 80000, 80000, '2023-03-07 13:56:02', 'Nạp tiền tự động qua Mbbank (#FT23066539206945 - CUSTOMER NAPAZ856 Trace 178609 - 80000)'),
(2058, 'manhtyc99', 80000, 80000, 0, '2023-03-07 13:57:12', 'Mua VPS (#VPS Trial 2-4-80)'),
(2059, 'tranbaokhue', 0, 40000, 40000, '2023-03-07 18:28:05', 'Nạp tiền tự động qua Ví Momo (#37198943141 - NAPAZ653 - 40000)'),
(2060, 'tranbaokhue', 40000, 40000, 0, '2023-03-07 18:30:05', 'Mua VPS (#VPS Trial 1-1-20)'),
(2061, 'datlaiuyen', 0, 40000, 40000, '2023-03-08 01:29:02', 'Nạp tiền tự động qua Mbbank (#FT23067701146597 - CUSTOMER MBVCB 3195337814 040375 NAPAZ859 CT  tu 9369981783 TRAN TIEU DAT toi 09 04657059 CAO NGOC QUANG LINH Ngan h ang Quan Doi  MB  Trace 040375 - 40000)'),
(2062, 'datlaiuyen', 40000, 40000, 0, '2023-03-08 01:29:33', 'Mua VPS (#VPS Trial 1-1-20)'),
(2063, 'khanhnguyen9872', 0, 80000, 80000, '2023-03-08 12:29:05', 'Nạp tiền tự động qua Ví Momo (#37227584933 - NAPAZ860 - 80000)'),
(2064, 'khanhnguyen9872', 80000, 80000, 0, '2023-03-08 12:29:31', 'Mua VPS (#VPS Trial 2-4-80)'),
(2065, '0866035532', 0, 80000, 80000, '2023-03-08 12:50:05', 'Nạp tiền tự động qua Ví Momo (#37228344948 - NAPAZ546 - 80000)'),
(2066, '0866035532', 80000, 80000, 0, '2023-03-08 12:51:21', 'Mua VPS (#VPS Trial 2-4-80)'),
(2067, 'thering', 0, 80000, 80000, '2023-03-08 17:32:02', 'Nạp tiền tự động qua Mbbank (#FT23067067528432 - CUSTOMER MBVCB 3198902941 046505 NAPAZ861 CT  tu 1025154023 DO HOANG VIET toi 09 04657059 CAO NGOC QUANG LINH Ngan h ang Quan Doi  MB  Trace 046505 - 80000)'),
(2068, 'thering', 80000, 80000, 0, '2023-03-08 17:32:52', 'Mua VPS (#VPS Trial 2-4-80)'),
(2069, 'dohai2000', 0, 40000, 40000, '2023-03-08 22:41:04', 'Nạp tiền tự động qua Ví Momo (#37251495109 - NAPAZ862 - 40000)'),
(2070, 'dohai2000', 40000, 40000, 0, '2023-03-08 22:41:53', 'Mua VPS (#VPS Trial 1-1-20)'),
(2071, 'Tung1211', 0, 80000, 80000, '2023-03-09 18:38:04', 'Nạp tiền tự động qua Ví Momo (#37286209378 - NAPAZ864 - 80000)'),
(2072, 'Tung1211', 80000, 80000, 0, '2023-03-09 18:39:42', 'Mua VPS (#VPS Trial 2-4-80)'),
(2073, 'cauchu34', 0, 40000, 40000, '2023-03-10 05:35:03', 'Nạp tiền tự động qua Ví Momo (#37300711193 - NAPAZ702 - 40000)'),
(2074, 'cauchu34', 40000, 40000, 0, '2023-03-10 05:35:30', 'Mua VPS (#VPS Trial 1-1-20)'),
(2075, 'tamdz04', 11020, 9020, 20040, '2023-03-10 20:58:17', 'Nạp tiền tự động qua card seri (59000022021606)'),
(2076, 'tranlongth68', 0, 80000, 80000, '2023-03-11 14:01:03', 'Nạp tiền tự động qua Mbbank (#FT23070105184736 - CUSTOMER IBFT NAPAZ731 Trace 587983 - 80000)'),
(2077, 'tranlongth68', 80000, 80000, 0, '2023-03-11 14:01:59', 'Mua VPS (#VPS Trial 2-4-80)'),
(2078, 'Tung1211', 0, 80000, 80000, '2023-03-11 18:53:04', 'Nạp tiền tự động qua Ví Momo (#37375721657 - NAPAZ864 - 80000)'),
(2079, 'Tung1211', 80000, 80000, 0, '2023-03-11 18:53:25', 'Mua VPS (#VPS Trial 2-4-80)'),
(2080, 'cauchu34', 0, 120000, 120000, '2023-03-12 05:32:03', 'Nạp tiền tự động qua Mbbank (#FT23072051131048 - CUSTOMER NAPAZ702. TU: NGUYEN TRONG TOAN - 120000)'),
(2081, 'cauchu34', 120000, 40000, 80000, '2023-03-12 05:32:30', 'Mua VPS (#VPS Trial 1-1-20)'),
(2082, 'cauchu34', 80000, 40000, 40000, '2023-03-12 05:32:43', 'Mua VPS (#VPS Trial 1-1-20)'),
(2083, 'cauchu34', 40000, 40000, 0, '2023-03-12 05:32:53', 'Mua VPS (#VPS Trial 1-1-20)'),
(2084, 'tanfa204', 0, 45850, 45850, '2023-03-12 11:57:43', 'Nạp tiền tự động qua card seri (10009914040171)'),
(2085, 'tanfa204', 45850, 40000, 5850, '2023-03-12 12:05:08', 'Mua VPS (#VPS Trial 1-1-20)'),
(2086, 'tttinhhh25', 0, 80000, 80000, '2023-03-12 18:36:03', 'Nạp tiền tự động qua Ví Momo (#37413772905 - NAPAZ725 - 80000)'),
(2087, 'tttinhhh25', 80000, 80000, 0, '2023-03-12 18:37:53', 'Mua VPS (#VPS Trial 2-4-80)'),
(2088, 'ianhvps', 0, 40000, 40000, '2023-03-12 21:38:05', 'Nạp tiền tự động qua Ví Momo (#37420572356 - NAPAZ829 - 40000)'),
(2089, 'ianhvps', 40000, 40000, 0, '2023-03-12 21:38:44', 'Mua VPS (#VPS Trial 1-1-20)'),
(2090, 'cauchu34', 0, 40000, 40000, '2023-03-13 18:01:05', 'Nạp tiền tự động qua Ví Momo (#37453572801 - NAPAZ702 - 40000)'),
(2091, 'cauchu34', 40000, 40000, 0, '2023-03-13 18:01:34', 'Mua VPS (#VPS Trial 1-1-20)'),
(2092, 'cauchu34', 0, 40000, 40000, '2023-03-14 20:51:03', 'Nạp tiền tự động qua Mbbank (#FT23073749024807 - CUSTOMER NAPAZ702. TU: NGUYEN TRONG TOAN - 40000)'),
(2093, 'cauchu34', 40000, 40000, 0, '2023-03-14 20:51:04', 'Mua VPS (#VPS Trial 1-1-20)'),
(2094, 'ianhvps', 0, 95000, 95000, '2023-03-14 21:02:09', 'Nạp tiền tự động qua Ví Momo (#37501841922 - NAPAZ829 - 95000)'),
(2095, 'ianhvps', 95000, 40000, 55000, '2023-03-14 21:02:50', 'Mua VPS (#VPS Trial 1-1-20)'),
(2096, 'ianhvps', 55000, 55000, 0, '2023-03-14 21:03:12', 'Mua VPS (#VPS Trial 1-2-20)'),
(2097, 'Phamanh', 0, 80000, 80000, '2023-03-14 22:47:12', 'Admin jinvps cộng tiền ()'),
(2098, 'Phamanh', 80000, 80000, 0, '2023-03-14 22:48:32', 'Mua VPS (#VPS Trial 2-4-80)'),
(2099, 'haixuan', 0, 80000, 80000, '2023-03-15 11:36:07', 'Nạp tiền tự động qua Ví Momo (#37521857780 - NAPAZ830 - 80000)'),
(2100, 'haixuan', 80000, 80000, 0, '2023-03-15 12:01:53', 'Mua VPS (#VPS Trial 2-4-80)'),
(2101, 'hungdo1388', 0, 40000, 40000, '2023-03-15 16:23:05', 'Nạp tiền tự động qua Ví Momo (#37533723878 - NAPAZ367 - 40000)'),
(2102, 'hungdo1388', 40000, 40000, 0, '2023-03-15 16:24:54', 'Mua VPS (#VPS Trial 1-1-20)'),
(2103, 'cauchu34', 0, 40000, 40000, '2023-03-15 20:51:02', 'Nạp tiền tự động qua Mbbank (#FT23074381266583 - CUSTOMER NAPAZ702. TU: NGUYEN TRONG TOAN - 40000)'),
(2104, 'cauchu34', 40000, 40000, 0, '2023-03-15 20:53:14', 'Mua VPS (#VPS Trial 1-1-20)'),
(2105, 'hoangvuong088', 0, 92200, 92200, '2023-03-15 21:04:51', 'Nạp tiền tự động qua card seri (10009975610834)'),
(2106, 'hoangvuong088', 92200, 80000, 12200, '2023-03-15 21:13:51', 'Mua VPS (#VPS Trial 2-4-80)'),
(2107, 'hoangvuong088', 12200, 46100, 58300, '2023-03-15 21:26:54', 'Nạp tiền tự động qua card seri (10009908928311)'),
(2108, 'hieusky2003', 0, 80000, 80000, '2023-03-15 23:13:03', 'Nạp tiền tự động qua Mbbank (#FT23075701399262 - CUSTOMER NAPAZ878 Trace 743366 - 80000)'),
(2109, 'hieusky2003', 80000, 80000, 0, '2023-03-15 23:15:34', 'Mua VPS (#VPS Trial 2-4-80)'),
(2110, 'hoangvuong088', 58300, 17940, 76240, '2023-03-16 12:57:22', 'Nạp tiền tự động qua card seri (10008910329580)'),
(2111, 'hoangvuong088', 76240, 4000, 80240, '2023-03-16 15:21:19', 'Admin jinvps cộng tiền ()'),
(2112, 'hoangvuong088', 80240, 80000, 240, '2023-03-16 15:22:11', 'Mua VPS (#VPS Trial 2-4-80)'),
(2113, 'cauchu34', 0, 40000, 40000, '2023-03-16 18:41:02', 'Nạp tiền tự động qua Mbbank (#FT23075718450625 - CUSTOMER NAPAZ702. TU: NGUYEN TRONG TOAN - 40000)'),
(2114, 'cauchu34', 40000, 40000, 0, '2023-03-16 18:48:33', 'Mua VPS (#VPS Trial 1-1-20)'),
(2115, 'hungdo1388', 0, 80000, 80000, '2023-03-16 19:43:03', 'Nạp tiền tự động qua Ví Momo (#37585053612 - NAPAZ367 - 80000)'),
(2116, 'hungdo1388', 80000, 80000, 0, '2023-03-16 21:24:39', 'Mua VPS (#VPS Trial 2-4-80)'),
(2117, 'cauchu34', 0, 40000, 40000, '2023-03-17 11:36:03', 'Nạp tiền tự động qua Mbbank (#FT23076869450830 - CUSTOMER NAPAZ702. TU: NGUYEN TRONG TOAN - 40000)'),
(2118, 'cauchu34', 40000, 40000, 0, '2023-03-17 11:36:05', 'Mua VPS (#VPS Trial 1-1-20)'),
(2119, 'leo124', 0, 40000, 40000, '2023-03-18 08:07:03', 'Nạp tiền tự động qua Mbbank (#FT23077804600700 - CUSTOMER NAPAZ881. TU: HUYNH THANH TUNG - 40000)'),
(2120, 'leo124', 40000, 40000, 0, '2023-03-18 08:07:04', 'Mua VPS (#VPS Trial 1-1-20)'),
(2121, 'ianhvps', 0, 40000, 40000, '2023-03-18 19:19:05', 'Nạp tiền tự động qua Ví Momo (#37662242110 - NAPAZ829 - 40000)'),
(2122, 'ianhvps', 40000, 40000, 0, '2023-03-18 19:19:22', 'Mua VPS (#VPS Trial 1-1-20)'),
(2123, 'dangtrinh', 0, 40000, 40000, '2023-03-19 20:13:03', 'Nạp tiền tự động qua Mbbank (#FT23079078841050 - CUSTOMER NAPAZ882 Trace 210120 - 40000)'),
(2124, 'Nghiadz', 0, 40000, 40000, '2023-03-19 21:02:02', 'Nạp tiền tự động qua Mbbank (#FT23079901200428 - CUSTOMER NAPAZ883. TU: PHAM HONG NGHIA - 40000)'),
(2125, 'Nghiadz', 40000, 40000, 0, '2023-03-19 21:18:23', 'Mua VPS (#VPS Trial 1-1-20)'),
(2126, 'dangtrinh', 40000, 40000, 0, '2023-03-20 07:07:56', 'Admin jinvps trừ tiền (Rf)'),
(2127, 'ianhvps', 0, 40000, 40000, '2023-03-20 21:32:03', 'Nạp tiền tự động qua Ví Momo (#37743451358 - NAPAZ829 - 40000)'),
(2128, 'ianhvps', 40000, 40000, 0, '2023-03-20 21:32:14', 'Mua VPS (#VPS Trial 1-1-20)'),
(2129, 'tomtuan213', 0, 180000, 180000, '2023-03-21 22:08:04', 'Nạp tiền tự động qua Ví Momo (#37784734053 - NAPAZ885 - 180000)'),
(2130, 'tomtuan213', 180000, 180000, 0, '2023-03-21 22:08:47', 'Mua VPS (#VPS Trial 4-8-126)'),
(2131, 'ntb12345', 0, 120000, 120000, '2023-03-22 12:31:05', 'Nạp tiền tự động qua Ví Momo (#37803866024 - NAPAZ655 - 120000)'),
(2132, 'ntb12345', 120000, 120000, 0, '2023-03-22 12:31:40', 'Mua VPS (#VPS VN 1-2-20)'),
(2133, 'durex535', 0, 90000, 90000, '2023-03-23 01:23:02', 'Nạp tiền tự động qua Mbbank (#FT23082386000810 - CUSTOMER NAPAZ712. TU: DO VAN QUYEN - 90000)'),
(2134, 'durex535', 90000, 90000, 0, '2023-03-23 01:27:50', 'Mua VPS (#VPS VN 1-1-20)'),
(2135, 'durex535', 0, 90000, 90000, '2023-03-23 06:27:49', 'Admin jinvps cộng tiền ()'),
(2136, 'durex535', 90000, 90000, 0, '2023-03-23 07:28:29', 'Mua VPS (#VPS VN 1-1-20)'),
(2137, 'Playzoy', 0, 170000, 170000, '2023-03-25 17:21:03', 'Nạp tiền tự động qua Ví Momo (#37930224917 - NAPAZ793 - 170000)'),
(2138, 'Playzoy', 170000, 170000, 0, '2023-03-25 17:21:28', 'Mua VPS (#VPS VN 2-2-20)'),
(2139, 'massiu', 0, 40000, 40000, '2023-03-26 00:10:04', 'Nạp tiền tự động qua Ví Momo (#37943055028 - NAPAZ799 - 40000)'),
(2140, 'massiu', 40000, 40000, 0, '2023-03-26 00:10:27', 'Mua VPS (#VPS Trial 1-1-20)'),
(2141, 'gioitv7890', 0, 40000, 40000, '2023-03-26 17:50:05', 'Nạp tiền tự động qua Ví Momo (#37967389631 - NAPAZ891 - 40000)'),
(2142, 'gioitv7890', 40000, 40000, 0, '2023-03-26 17:50:49', 'Mua VPS (#VPS Trial 1-1-20)'),
(2143, 'naking4s', 0, 80000, 80000, '2023-03-26 20:44:04', 'Nạp tiền tự động qua Ví Momo (#37973084982 - NAPAZ892 - 80000)'),
(2144, 'naking4s', 80000, 80000, 0, '2023-03-26 20:44:33', 'Mua VPS (#VPS Trial 2-4-80)'),
(2145, 'massiu', 0, 40000, 40000, '2023-03-27 14:57:05', 'Admin jinvps cộng tiền (rd)'),
(2146, 'vantien1601', 0, 120000, 120000, '2023-03-27 17:19:04', 'Nạp tiền tự động qua Ví Momo (#38002941498 - NAPAZ776 - 120000)'),
(2147, 'vantien1601', 120000, 120000, 0, '2023-03-28 17:13:25', 'Admin jinvps trừ tiền (gh vps)'),
(2148, 'khacphuc', 0, 40000, 40000, '2023-03-28 22:09:02', 'Nạp tiền tự động qua Mbbank (#FT23088224561046 - CUSTOMER NAPAZ895. TU: DAU KHAC PHUC - 40000)'),
(2149, 'khacphuc', 40000, 40000, 0, '2023-03-28 22:10:07', 'Mua VPS (#VPS Trial 1-1-20)'),
(2150, 'naking4s', 0, 180000, 180000, '2023-03-29 15:45:04', 'Nạp tiền tự động qua Ví Momo (#38071010957 - NAPAZ892 - 180000)'),
(2151, 'naking4s', 180000, 180000, 0, '2023-03-29 16:40:58', 'Mua VPS (#VPS Đặc Biệt 2-4-20)'),
(2152, 'naruto1s2', 0, 55000, 55000, '2023-03-30 16:56:03', 'Nạp tiền tự động qua Mbbank (#FT23089200133575 - CUSTOMER NAPAZ453 Trace 800613 - 55000)'),
(2153, 'naruto1s2', 55000, 55000, 0, '2023-03-30 16:58:51', 'Mua VPS (#VPS Trial 1-2-20)'),
(2154, 'thienhoang', 0, 180000, 180000, '2023-03-31 01:21:03', 'Nạp tiền tự động qua Ví Momo (#38120777098 - NAPAZ897 - 180000)'),
(2155, 'thienhoang', 180000, 180000, 0, '2023-03-31 01:21:31', 'Mua VPS (#VPS Trial 4-8-126)'),
(2156, 'izuminls', 0, 240000, 240000, '2023-03-31 14:52:04', 'Nạp tiền tự động qua Ví Momo (#38139530314 - NAPAZ896 - 240000)'),
(2157, 'izuminls', 240000, 240000, 0, '2023-03-31 14:55:31', 'Mua VPS (#VPS Đặc Biệt 4-4-20)'),
(2158, 'tuanlaem1999', 0, 100000, 100000, '2023-03-31 19:11:02', 'Nạp tiền tự động qua Mbbank (#FT23090134674411 - CUSTOMER NAPAZ898. TU: NGUYEN TRONG TUAN - 100000)'),
(2159, 'tuanlaem1999', 100000, 10000, 110000, '2023-03-31 19:11:04', 'Nạp tiền tự động qua Ví Momo (#38148849670 - NAPAZ898 - 10000)'),
(2160, 'tuanlaem1999', 110000, 55000, 55000, '2023-03-31 19:12:41', 'Mua VPS (#VPS Trial 1-2-20)'),
(2161, 'Hieuokevcl', 0, 40000, 40000, '2023-03-31 20:20:02', 'Nạp tiền tự động qua Mbbank (#FT23090530564678 - CUSTOMER napaz900 Trace 873375 - 40000)'),
(2162, 'Hieuokevcl', 40000, 40000, 0, '2023-03-31 20:24:38', 'Mua VPS (#VPS Trial 1-1-20)'),
(2163, 'massiu', 40000, 40000, 80000, '2023-03-31 21:53:03', 'Nạp tiền tự động qua Ví Momo (#38154482183 - NAPAZ799 - 40000)'),
(2164, 'massiu', 80000, 80000, 0, '2023-03-31 21:53:55', 'Mua VPS (#VPS Trial 2-4-80)'),
(2165, 'thanhtam16082003', 0, 40000, 40000, '2023-04-02 14:06:03', 'Nạp tiền tự động qua Ví Momo (#38212755547 - napaz904 - 40000)'),
(2166, 'thanhtam16082003', 40000, 40000, 0, '2023-04-02 14:06:52', 'Mua VPS (#VPS Trial 1-1-20)'),
(2167, 'domesdog', 0, 80000, 80000, '2023-04-02 17:26:02', 'Nạp tiền tự động qua Mbbank (#FT23093063901482 - CUSTOMER NAPAZ903 Trace 843886 - 80000)'),
(2168, 'domesdog', 80000, 80000, 0, '2023-04-02 17:26:12', 'Mua VPS (#VPS Trial 2-4-80)'),
(2169, 'Kytouyen', 0, 40000, 40000, '2023-04-02 23:03:02', 'Nạp tiền tự động qua Mbbank (#FT23093048508619 - CUSTOMER NAPAZ907. TU: NGUYEN VIET KHANH - 40000)'),
(2170, 'Kytouyen', 40000, 40000, 0, '2023-04-02 23:03:35', 'Mua VPS (#VPS Trial 1-1-20)'),
(2171, 'linh041120044', 0, 90000, 90000, '2023-04-03 07:23:03', 'Nạp tiền tự động qua Ví Momo (#38236573977 - NAPAZ303 - 90000)'),
(2172, 'Nguyensythanh', 0, 40000, 40000, '2023-04-04 13:52:06', 'Nạp tiền tự động qua Ví Momo (#38295020620 - NAPAZ909 - 40000)'),
(2173, 'Nguyensythanh', 40000, 40000, 0, '2023-04-04 13:52:41', 'Mua VPS (#VPS Trial 1-1-20)'),
(2174, 'leminhtoi', 0, 40000, 40000, '2023-04-05 11:39:03', 'Nạp tiền tự động qua Mbbank (#FT23095503180718 - CUSTOMER MBVCB 3327647355 036506 NAPAZ910 CT  tu 1013020438 LE MINH TOI toi 0904 657059 CAO NGOC QUANG LINH Ngan han g Quan Doi  MB  Trace 036506 - 40000)'),
(2175, 'leminhtoi', 40000, 40000, 0, '2023-04-05 11:39:31', 'Mua VPS (#VPS Trial 1-1-20)'),
(2176, 'linh041120044', 90000, 90000, 0, '2023-04-05 22:51:46', 'Admin jinvps trừ tiền (gia han vps)'),
(2177, 'tdquanghuy1512', 100, 40000, 40100, '2023-04-06 05:37:02', 'Nạp tiền tự động qua Mbbank (#FT23096004490675 - CUSTOMER NAPAZ317. TU: NGUYEN DUC VINH - 40000)'),
(2178, 'dinhvanduy103', 0, 40000, 40000, '2023-04-06 10:50:05', 'Nạp tiền tự động qua Ví Momo (#38368095150 - NAPAZ246 - 40000)'),
(2179, 'dinhvanduy103', 40000, 40000, 0, '2023-04-06 10:57:58', 'Mua VPS (#VPS Trial 1-1-20)'),
(2180, 'dohai2000', 0, 90000, 90000, '2023-04-06 18:48:03', 'Nạp tiền tự động qua Mbbank (#FT23096695688757 - CUSTOMER MBVCB 3335055944 043429 NAPAZ862 CT  tu 9969598040 DO HUU HAI toi 09046 57059 CAO NGOC QUANG LINH Ngan hang  Quan Doi  MB  Trace 043429 - 90000)'),
(2181, 'dohai2000', 90000, 90000, 0, '2023-04-06 18:49:24', 'Mua VPS (#VPS VN 1-1-20)'),
(2182, 'Nghiacute', 0, 40000, 40000, '2023-04-07 18:10:06', 'Nạp tiền tự động qua Ví Momo (#38421134712 - NAPAZ911 - 40000)'),
(2183, 'Nghiacute', 40000, 40000, 0, '2023-04-07 18:15:55', 'Mua VPS (#VPS Trial 1-1-20)'),
(2184, 'huucau', 0, 40000, 40000, '2023-04-07 22:10:04', 'Nạp tiền tự động qua Ví Momo (#38429809754 - NAPAZ880 - 40000)'),
(2185, 'huucau', 40000, 40000, 0, '2023-04-07 22:11:59', 'Mua VPS (#VPS Trial 1-1-20)'),
(2186, 'minhduc', 0, 80000, 80000, '2023-04-08 13:21:06', 'Nạp tiền tự động qua Ví Momo (#38447605551 - NAPAZ912 - 80000)'),
(2187, 'minhduc', 80000, 80000, 0, '2023-04-08 13:21:24', 'Mua VPS (#VPS Trial 2-4-80)'),
(2188, 'phongtran', 0, 90000, 90000, '2023-04-08 23:05:03', 'Nạp tiền tự động qua Mbbank (#FT23100795660507 - CUSTOMER NAPAZ913. TU: TRAN TIEN PHONG - 90000)'),
(2189, 'phongtran', 90000, 90000, 0, '2023-04-08 23:05:48', 'Mua VPS (#VPS VN 1-1-20)'),
(2190, 'linh2203', 0, 40000, 40000, '2023-04-09 01:18:03', 'Nạp tiền tự động qua Ví Momo (#38468380014 - NAPAZ914 - 40000)'),
(2191, 'linh2203', 40000, 40000, 0, '2023-04-09 01:18:38', 'Mua VPS (#VPS Trial 1-1-20)'),
(2192, 'Maguss123', 0, 60000, 60000, '2023-04-10 21:24:03', 'Nạp tiền tự động qua Ví Momo (#38544207948 - NAPAZ916 - 60000)'),
(2193, 'Maguss123', 60000, 55000, 5000, '2023-04-10 21:24:45', 'Mua VPS (#VPS Trial 1-2-20)'),
(2194, 'manhtyc99', 0, 80000, 80000, '2023-04-11 21:34:03', 'Nạp tiền tự động qua Mbbank (#FT23101407110437 - CUSTOMER NAPAZ856 Trace 265001 - 80000)'),
(2195, 'manhtyc99', 80000, 80000, 0, '2023-04-11 21:35:24', 'Mua VPS (#VPS Trial 2-4-80)'),
(2196, 'khanh111tnn', 0, 80000, 80000, '2023-04-11 21:42:04', 'Nạp tiền tự động qua Mbbank (#FT23101706122869 - CUSTOMER NAPAZ854. TU: LE DUY KHANH - 80000)'),
(2197, 'khanh111tnn', 80000, 80000, 0, '2023-04-11 21:43:49', 'Mua VPS (#VPS Trial 2-4-80)'),
(2198, '18lucjfer', 0, 80000, 80000, '2023-04-12 12:41:03', 'Nạp tiền tự động qua Ví Momo (#38605542394 - NAPAZ852 - 80000)'),
(2199, '18lucjfer', 80000, 80000, 0, '2023-04-12 12:42:59', 'Mua VPS (#VPS Trial 2-4-80)'),
(2200, 'Thanhdag2001', 0, 55000, 55000, '2023-04-12 20:12:02', 'Nạp tiền tự động qua Mbbank (#FT23102676572947 - CUSTOMER NAPAZ917. TU: NGUYEN THANH DANG - 55000)'),
(2201, 'Thanhdag2001', 55000, 55000, 0, '2023-04-12 20:16:10', 'Mua VPS (#VPS Trial 1-2-20)'),
(2202, 'tamdz04', 20040, 179400, 199440, '2023-04-12 20:35:16', 'Nạp tiền tự động qua card seri (10010001847233)'),
(2203, 'tamdz04', 199440, 180000, 19440, '2023-04-12 21:01:47', 'Mua VPS (#VPS Trial 4-8-126)'),
(2204, 'cusino20', 20000, 180000, 200000, '2023-04-13 19:12:03', 'Nạp tiền tự động qua Mbbank (#FT23103480276482 - CUSTOMER NAPAZ770. TU: DAO VAN THANG - 180000)'),
(2205, 'cusino20', 200000, 180000, 20000, '2023-04-13 19:12:54', 'Mua VPS (#VPS Trial 4-8-126)'),
(2206, 'hoangmanhvo4', 0, 80000, 80000, '2023-04-14 22:48:03', 'Nạp tiền tự động qua Mbbank (#FT23104100100722 - CUSTOMER NAPAZ921. TU: VU MANH HOANG - 80000)'),
(2207, 'hoangmanhvo4', 80000, 80000, 0, '2023-04-14 22:55:12', 'Mua VPS (#VPS Trial 2-4-80)'),
(2208, '0975838533', 0, 330000, 330000, '2023-04-15 10:20:04', 'Nạp tiền tự động qua Ví Momo (#38719361425 - NAPAZ922 - 330000)'),
(2209, '0975838533', 330000, 350000, -20000, '2023-04-15 10:23:21', 'Mua VPS (#VPS Trial 8-16-126)'),
(2210, 'hanhattoanv1', 0, 40000, 40000, '2023-04-15 11:10:03', 'Nạp tiền tự động qua Ví Momo (#38721379592 - NAPAZ923 - 40000)'),
(2211, 'hanhattoanv1', 40000, 40000, 0, '2023-04-15 11:12:34', 'Mua VPS (#VPS Trial 1-1-20)'),
(2212, 'tranbaokhue', 0, 40000, 40000, '2023-04-15 14:00:03', 'Nạp tiền tự động qua Ví Momo (#38727374808 - NAPAZ653 - 40000)'),
(2213, 'tranbaokhue', 40000, 40000, 0, '2023-04-15 14:02:16', 'Mua VPS (#VPS Trial 1-1-20)'),
(2214, 'Trongvps', 0, 40000, 40000, '2023-04-15 21:28:03', 'Nạp tiền tự động qua Ví Momo (#38743125837 - NAPAZ924 - 40000)'),
(2215, 'Trongvps', 40000, 40000, 0, '2023-04-15 21:29:03', 'Mua VPS (#VPS Trial 1-1-20)'),
(2216, 'tuanvipro', 0, 40000, 40000, '2023-04-15 22:35:03', 'Nạp tiền tự động qua Mbbank (#FT23107300021487 - CUSTOMER NAPAZ813. TU: VO ANH TUAN - 40000)'),
(2217, 'tuanvipro', 40000, 40000, 0, '2023-04-15 22:35:20', 'Mua VPS (#VPS Trial 1-1-20)'),
(2218, 'thuycuti', 0, 40000, 40000, '2023-04-16 12:45:58', 'Admin jinvps cộng tiền ()'),
(2219, 'thuycuti', 40000, 40000, 0, '2023-04-16 12:46:36', 'Mua VPS (#VPS Trial 1-1-20)'),
(2220, 'vxeom36', 0, 40000, 40000, '2023-04-16 20:56:02', 'Nạp tiền tự động qua Mbbank (#FT23107805693586 - CUSTOMER NAPAZ535 Trace 198759 - 40000)'),
(2221, 'vxeom36', 40000, 40000, 0, '2023-04-16 20:59:49', 'Mua VPS (#VPS Trial 1-1-20)'),
(2222, 'Giang9899', 0, 90000, 90000, '2023-04-16 22:33:02', 'Nạp tiền tự động qua Mbbank (#FT23107130897918 - CUSTOMER MBVCB 3386405992 046595 NAPAZ926 CT  tu 1036710633 NGUYEN VAN GIANG toi  0904657059 CAO NGOC QUANG LINH Nga n hang Quan Doi  MB  Trace 046595 - 90000)'),
(2223, 'Giang9899', 90000, 90000, 0, '2023-04-16 22:33:55', 'Mua VPS (#VPS VN 1-1-20)'),
(2224, 'Lamvankha112', 0, 55000, 55000, '2023-04-17 11:17:03', 'Nạp tiền tự động qua Ví Momo (#38796619670 - NAPAZ927 - 55000)'),
(2225, 'Lamvankha112', 55000, 55000, 0, '2023-04-17 11:18:05', 'Mua VPS (#VPS Trial 1-2-20)'),
(2226, 'Huuzafkiel', 0, 45800, 45800, '2023-04-17 22:25:49', 'Nạp tiền tự động qua card seri (10009727301365)'),
(2227, 'Huuzafkiel', 45800, 10000, 55800, '2023-04-17 22:29:12', 'Nạp tiền tự động qua Ví Momo (#38821720246 - NAPAZ906 - 10000)'),
(2228, 'Huuzafkiel', 55800, 55000, 800, '2023-04-17 22:36:10', 'Mua VPS (#VPS Trial 1-2-20)'),
(2229, 'tommy23vn', 0, 650000, 650000, '2023-04-19 19:13:03', 'Nạp tiền tự động qua Mbbank (#FT23109107330556 - CUSTOMER NAPAZ787. TU: TRAN TRI NGHIA - 650000)'),
(2230, 'tommy23vn', 650000, 650000, 0, '2023-04-19 19:15:52', 'Mua VPS (#VPS Trial 16-32-126)'),
(2231, 'daoquangvuong', 0, 40000, 40000, '2023-04-19 21:45:03', 'Nạp tiền tự động qua Mbbank (#FT23109022409071 - CUSTOMER NAPAZ933. TU: DAO QUANG VUONG - 40000)'),
(2232, 'daoquangvuong', 40000, 40000, 0, '2023-04-19 21:51:55', 'Mua VPS (#VPS Trial 1-1-20)'),
(2233, 'tommy23vn', 0, 700000, 700000, '2023-04-19 22:44:53', 'Admin jinvps cộng tiền ()'),
(2234, 'tommy23vn', 700000, 350000, 350000, '2023-04-20 05:13:26', 'Mua VPS (#VPS Trial 8-16-126)'),
(2235, 'tommy23vn', 350000, 350000, 0, '2023-04-20 05:14:01', 'Mua VPS (#VPS Trial 8-16-126)'),
(2236, 'alosunday', 0, 40000, 40000, '2023-04-20 13:57:02', 'Nạp tiền tự động qua Mbbank (#FT23110500421550 - CUSTOMER NAPAZ935 Trace 578027 - 40000)'),
(2237, 'alosunday', 40000, 40000, 0, '2023-04-20 13:59:52', 'Mua VPS (#VPS Trial 1-1-20)'),
(2238, 'manhtyc99', 0, 80000, 80000, '2023-04-20 15:33:03', 'Nạp tiền tự động qua Mbbank (#FT23110813901339 - CUSTOMER NAPAZ856 Trace 765962 - 80000)'),
(2239, 'manhtyc99', 80000, 40000, 40000, '2023-04-20 15:33:30', 'Mua VPS (#VPS Trial 1-1-20)'),
(2240, 'manhtyc99', 40000, 40000, 0, '2023-04-20 15:33:41', 'Mua VPS (#VPS Trial 1-1-20)'),
(2241, 'dung2003', 0, 40000, 40000, '2023-04-20 20:39:02', 'Nạp tiền tự động qua Mbbank (#FT23110636822108 - CUSTOMER NAPAZ936. TU: VU TIEN DUNG - 40000)'),
(2242, 'dung2003', 40000, 40000, 0, '2023-04-20 20:40:19', 'Mua VPS (#VPS Trial 1-1-20)'),
(2243, 'jinvps', 0, 40000, 40000, '2023-04-21 10:02:51', 'Admin jinvps cộng tiền ()'),
(2244, 'jinvps', 40000, 40000, 0, '2023-04-21 10:03:06', 'Mua VPS (#VPS Trial 1-1-20)'),
(2245, 'Lamvankha112', 0, 80000, 80000, '2023-04-21 22:48:04', 'Nạp tiền tự động qua Ví Momo (#38971892643 - NAPAZ927 - 80000)'),
(2246, 'Lamvankha112', 80000, 80000, 0, '2023-04-22 03:27:46', 'Mua VPS (#VPS Trial 2-4-80)'),
(2247, 'Tameo2005', 0, 560000, 560000, '2023-04-23 13:17:02', 'Nạp tiền tự động qua Mbbank (#FT23114006997087 - CUSTOMER NAPAZ941 Trace 550935 - 560000)'),
(2248, 'Tameo2005', 560000, 350000, 210000, '2023-04-23 13:17:47', 'Mua VPS (#VPS Trial 8-16-126)'),
(2249, 'Tameo2005', 280000, 350000, -70000, '2023-04-23 13:18:18', 'Mua VPS (#VPS Trial 8-16-126)'),
(2250, 'hoangan2609', 0, 280000, 280000, '2023-04-23 14:05:02', 'Nạp tiền tự động qua Ví Momo (#39029248274 - NAPAZ940 - 280000)'),
(2251, 'hoangan2609', 280000, 350000, -70000, '2023-04-23 14:07:02', 'Mua VPS (#VPS Trial 8-16-126)'),
(2252, 'thongvps', 0, 40000, 40000, '2023-04-23 14:31:02', 'Nạp tiền tự động qua Mbbank (#FT23114583840674 - CUSTOMER NAPAZ942 Trace 294984 - 40000)'),
(2253, 'thongvps', 40000, 40000, 0, '2023-04-23 14:32:28', 'Mua VPS (#VPS Trial 1-1-20)'),
(2254, 'Tuan', 0, 40000, 40000, '2023-04-23 16:33:03', 'Nạp tiền tự động qua Mbbank (#FT23114721387009 - CUSTOMER MBVCB 3418927008 035484 NAPAZ943 CT  tu 9818899948 NGUYEN BA TUAN toi 0 904657059 CAO NGOC QUANG LINH Ngan  hang Quan Doi  MB  Trace 035484 - 40000)'),
(2255, 'Tuan', 40000, 40000, 0, '2023-04-23 16:33:51', 'Mua VPS (#VPS Trial 1-1-20)'),
(2256, 'Tameo2005', 0, 42500, 42500, '2023-04-24 12:47:03', 'Nạp tiền tự động qua Mbbank (#FT23114019520881 - CUSTOMER NAPAZ941 Trace 938433 - 42500)'),
(2257, 'quan139200', 0, 40000, 40000, '2023-04-24 20:16:06', 'Nạp tiền tự động qua Mbbank (#FT23114891361169 - CUSTOMER MBVCB 3425001435 031624 NAPAZ945 CT  tu 1035250203 GIANG QUOC QUAN toi  0904657059 CAO NGOC QUANG LINH Ngan  hang Quan Doi  MB  Trace 031624 - 40000)'),
(2258, 'quan139200', 40000, 40000, 0, '2023-04-24 20:18:06', 'Mua VPS (#VPS Trial 1-1-20)'),
(2259, 'Tameo2005', 42500, 40000, 2500, '2023-04-24 21:04:25', 'Admin jinvps trừ tiền (proxy VN)'),
(2260, 'colenaohihihi123', 0, 40000, 40000, '2023-04-25 11:41:04', 'Nạp tiền tự động qua Mbbank (#FT23115510800107 - CUSTOMER MB 0904657059 NAPAZ946 Trace 807642 - 40000)'),
(2261, 'colenaohihihi123', 40000, 40000, 0, '2023-04-25 11:49:12', 'Mua VPS (#VPS Trial 1-1-20)'),
(2262, 'colenaohihihi123', 0, 40000, 40000, '2023-04-25 18:28:52', 'Hoàn tiền do khách hàng hủy gói vps (#VPS Trial 1-1-20)'),
(2263, 'colenaohihihi123', 40000, 40000, 0, '2023-04-25 18:29:44', 'Mua VPS (#VPS Trial 1-1-20)'),
(2264, 'colenaohihihi123', 0, 40000, 40000, '2023-04-25 20:53:08', 'Hoàn tiền do khách hàng hủy gói vps (#VPS Trial 1-1-20)'),
(2265, 'colenaohihihi123', 40000, 40000, 0, '2023-04-26 06:33:45', 'Mua VPS (#VPS Trial 1-1-20)'),
(2266, 'colenaohihihi123', 0, 40000, 40000, '2023-04-26 06:44:35', 'Hoàn tiền do khách hàng hủy gói vps (#VPS Trial 1-1-20)'),
(2267, 'colenaohihihi123', 40000, 40000, 0, '2023-04-26 08:22:12', 'Mua VPS (#VPS Trial 1-1-20)'),
(2268, 'manhlc123', 0, 120000, 120000, '2023-04-26 13:47:03', 'Nạp tiền tự động qua Mbbank (#FT23116505909985 - CUSTOMER NAPAZ947. TU: NONG VAN MANH - 120000)'),
(2269, 'manhlc123', 120000, 120000, 0, '2023-04-26 13:55:50', 'Mua VPS (#VPS VN 1-2-20)'),
(2270, 'daoanhuy2005', 0, 40000, 40000, '2023-04-26 19:58:06', 'Nạp tiền tự động qua Mbbank (#FT23116105042584 - CUSTOMER NAPAZ948. TU: DAO AN HUY - 40000)'),
(2271, 'daoanhuy2005', 40000, 40000, 0, '2023-04-26 20:26:19', 'Mua VPS (#VPS Trial 1-1-20)'),
(2272, 'kiendz45', 0, 120000, 120000, '2023-04-26 20:49:02', 'Nạp tiền tự động qua Mbbank (#FT23116590187694 - CUSTOMER NAPAZ526. TU: NGUYEN TRUNG KIEN - 120000)'),
(2273, 'kiendz45', 120000, 120000, 0, '2023-04-26 20:50:51', 'Mua VPS (#NAT VPS 2-2-20)'),
(2274, 'vantien1601', 0, 120000, 120000, '2023-04-27 09:28:03', 'Nạp tiền tự động qua Ví Momo (#39175301579 - NAPAZ776 - 120000)'),
(2275, 'vantien1601', 120000, 120000, 0, '2023-04-28 06:44:11', 'Admin jinvps trừ tiền (Gia hạn vps)'),
(2276, 'phihoz123', 0, 87200, 87200, '2023-04-28 11:17:03', 'Nạp tiền tự động qua card seri (10009154912887)'),
(2277, 'vuduc027', 0, 60000, 60000, '2023-04-29 01:50:03', 'Nạp tiền tự động qua Ví Momo (#39249974992 - NAPAZ951 - 60000)'),
(2278, 'vuduc027', 60000, 60000, 0, '2023-04-29 01:50:33', 'Mua VPS (#VPS VN 1-1-20)'),
(2279, 'phihoz123', 87200, 40000, 47200, '2023-04-29 04:58:00', 'Mua VPS (#VPS Trial 1-1-20)'),
(2280, 'binhnrov3z', 0, 40000, 40000, '2023-04-29 17:31:04', 'Nạp tiền tự động qua Mbbank (#FT23119412433635 - CUSTOMER NAPAZ568. TU: TRAN DUY BINH - 40000)'),
(2281, 'binhnrov3z', 40000, 40000, 0, '2023-04-29 20:56:12', 'Admin jinvps trừ tiền (rf)'),
(2282, 'hungdo1388', 0, 80000, 80000, '2023-04-29 22:38:04', 'Nạp tiền tự động qua Ví Momo (#39281769486 - NAPAZ367 - 80000)'),
(2283, 'hungdo1388', 80000, 80000, 0, '2023-04-29 22:40:10', 'Mua VPS (#VPS Trial 2-4-80)'),
(2284, 'Nmquan05', 0, 60000, 60000, '2023-04-30 21:26:02', 'Nạp tiền tự động qua Mbbank (#FT23121078695370 - CUSTOMER NAPAZ952. TU: NGUYEN MINH QUAN - 60000)'),
(2285, 'Nmquan05', 60000, 60000, 0, '2023-04-30 21:26:23', 'Mua VPS (#VPS VN 1-1-20)'),
(2286, 'anvanmanh2k4', 0, 40000, 40000, '2023-05-02 01:01:03', 'Nạp tiền tự động qua Ví Momo (#39351627825 - NAPAZ605 - 40000)'),
(2287, 'anvanmanh2k4', 40000, 40000, 0, '2023-05-02 01:01:58', 'Mua VPS (#VPS Trial 1-1-20)'),
(2288, 'domesdog', 0, 80000, 80000, '2023-05-02 20:11:04', 'Nạp tiền tự động qua Ví Momo (#39379652224 - NAPAZ903 - 80000)'),
(2289, 'domesdog', 80000, 80000, 0, '2023-05-02 20:12:04', 'Mua VPS (#VPS Trial 2-4-80)'),
(2290, 'tuananhmmo', 0, 550000, 550000, '2023-05-03 09:51:03', 'Nạp tiền tự động qua Mbbank (#FT23123624369783 - CUSTOMER NAPAZ956 FT23124912605745 Trace 495 653 - 550000)'),
(2291, 'tuananhmmo', 550000, 180000, 370000, '2023-05-03 09:53:25', 'Mua VPS (#VPS Trial 4-8-126)'),
(2292, 'tuananhmmo', 370000, 180000, 550000, '2023-05-03 10:53:06', 'Admin jinvps cộng tiền (rf)'),
(2293, 'tuananhmmo', 550000, 280000, 270000, '2023-05-03 10:56:26', 'Mua VPS (#VPS US 4-4-50)'),
(2294, 'gioitv7890', 0, 40000, 40000, '2023-05-05 14:31:03', 'Nạp tiền tự động qua Ví Momo (#39488315935 - NAPAZ891 - 40000)'),
(2295, 'gioitv7890', 40000, 40000, 0, '2023-05-05 14:34:38', 'Mua VPS (#VPS Trial 1-1-20)'),
(2296, 'dangthiluu', 0, 45100, 45100, '2023-05-06 19:28:02', 'Nạp tiền tự động qua card seri (10009929406465)'),
(2297, 'dangthiluu', 45100, 40000, 5100, '2023-05-06 19:28:41', 'Mua VPS (#VPS Trial 1-1-20)'),
(2298, 'anhvipro', 0, 40000, 40000, '2023-05-08 08:42:02', 'Nạp tiền tự động qua Ví Momo (#39596726865 - NAPAZ570 - 40000)'),
(2299, 'anhvipro', 40000, 40000, 0, '2023-05-08 08:42:16', 'Mua VPS (#VPS Trial 1-1-20)'),
(2300, 'Kiet007', 0, 17240, 17240, '2023-05-08 17:49:10', 'Nạp tiền tự động qua card seri (51500521419107)'),
(2301, 'Kiet007', 17240, 24000, 41240, '2023-05-08 18:55:04', 'Nạp tiền tự động qua Mbbank (#FT23128042938049 - CUSTOMER NAPAZ960. TU: VO DINH KIET - 24000)'),
(2302, 'Kiet007', 41240, 45300, 86540, '2023-05-08 19:09:34', 'Nạp tiền tự động qua card seri (10009366037412)'),
(2303, 'Kiet007', 86540, 80000, 6540, '2023-05-08 19:12:07', 'Mua VPS (#VPS Trial 2-4-80)'),
(2304, 'Trai0212', 0, 40000, 40000, '2023-05-10 12:11:03', 'Nạp tiền tự động qua Mbbank (#FT23130038859182 - CUSTOMER IBFT NAPAZ962 Trace 450085 - 40000)'),
(2305, 'Trai0212', 40000, 40000, 0, '2023-05-10 12:13:59', 'Mua VPS (#VPS Trial 1-1-20)'),
(2306, 'Vanchau', 0, 40000, 40000, '2023-05-11 15:03:03', 'Nạp tiền tự động qua Ví Momo (#39744952979 - NAPAZ963 - 40000)'),
(2307, 'Vanchau', 40000, 40000, 0, '2023-05-11 15:03:33', 'Mua VPS (#VPS Trial 1-1-20)'),
(2308, 'trinhvanquan2k6', 0, 60000, 60000, '2023-05-12 19:16:03', 'Nạp tiền tự động qua Mbbank (#FT23132300264011 - CUSTOMER NAPAZ964. TU: TRINH VAN QUAN - 60000)'),
(2309, 'trinhvanquan2k6', 60000, 60000, 0, '2023-05-12 19:21:53', 'Mua VPS (#NAT VPS 1-1-20)');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `client` varchar(255) NOT NULL,
  `bidanh` text NOT NULL,
  `tool_id` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `token` text NOT NULL,
  `day` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `license_vps`
--

CREATE TABLE `license_vps` (
  `id` int(11) NOT NULL,
  `nguoiban` text COLLATE utf8_vietnamese_ci NOT NULL,
  `user` text COLLATE utf8_vietnamese_ci NOT NULL,
  `vps_id` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `ip` text COLLATE utf8_vietnamese_ci NOT NULL,
  `tk` text COLLATE utf8_vietnamese_ci NOT NULL,
  `mk` text COLLATE utf8_vietnamese_ci NOT NULL,
  `status` text COLLATE utf8_vietnamese_ci,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `opera` text COLLATE utf8_vietnamese_ci,
  `country` text COLLATE utf8_vietnamese_ci,
  `create_date` text COLLATE utf8_vietnamese_ci,
  `update_date` text COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `momo`
--

CREATE TABLE `momo` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_vietnamese_ci NOT NULL,
  `partnerName` text COLLATE utf8_vietnamese_ci NOT NULL,
  `partnerId` text COLLATE utf8_vietnamese_ci NOT NULL,
  `tranId` text COLLATE utf8_vietnamese_ci NOT NULL,
  `amount` text COLLATE utf8_vietnamese_ci NOT NULL,
  `comment` text COLLATE utf8_vietnamese_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `naptsr`
--

CREATE TABLE `naptsr` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sotien` int(11) NOT NULL,
  `magd` text COLLATE utf8_vietnamese_ci NOT NULL,
  `noidung` text COLLATE utf8_vietnamese_ci NOT NULL,
  `status` text COLLATE utf8_vietnamese_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `create_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `create_date`, `status`) VALUES
(306, 'Thêm 2 Package VPS Trial 1 Năm', '<p>Thêm 2 Package VPS Trial 1 Năm<br></p>', '2023/02/09 16:04:03', 1),
(307, 'Chuyển Sang Website Mới Lightvps.net', '<p>Chuyển Sang Website Mới Lightvps.net<br></p>', '2023/05/08 08:50:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operating_system`
--

CREATE TABLE `operating_system` (
  `id` int(11) NOT NULL,
  `stt` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_vietnamese_ci,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `operating_system`
--

INSERT INTO `operating_system` (`id`, `stt`, `name`, `status`) VALUES
(1, 1, 'CentOS-7-x64', 1),
(2, 2, 'Ubuntu-Server-16.04-x64', 1),
(3, 3, 'Ubuntu-Server-18.04-x64', 1),
(4, 4, 'Ubuntu-Server-20.04-x64', 1),
(5, 5, 'Debian-10-x64', 1),
(6, 6, 'Windows Server 2012R2', 1),
(7, 7, 'Windows Server 2016', 1),
(8, 8, 'Windows Server 2019', 1),
(9, 9, 'Windows 10 64bit', 1),
(10, 10, 'Windows Server 2022 LTSC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `value` longtext COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key`, `value`) VALUES
(1, 'tenweb', 'WEBSITE CUNG CẤP DỊCH VỤ VPS'),
(2, 'mota', 'Website Cung Cấp Dịch Vụ Cloud VPS'),
(3, 'tukhoa', 'cloudvps.site, cloudvps, banvps, vps, cloud, vpstrial'),
(4, 'logo', 'https://cloudvps.site/assets/img/vpslogo.png'),
(5, 'email', 'trumdev80@gmail.com'),
(6, 'pass_email', 'niexszekuotoehqe'),
(11, 'noidung_naptien', 'NAPAZ'),
(12, 'thongbao', '<h2><p style=\"font-size: 16px; text-align: center;\"><span style=\"font-weight: bolder;\"><font style=\"\" color=\"#ff0000\">WEBSITE CHUYÊN CUNG CẤP VPS GIÁ RẺ UY TÍN CHẤT LƯỢNG</font></span></p><p style=\"font-size: 16px; text-align: center;\"><b><font color=\"#000000\">Gửi Yêu Cầu Bảo Hành VPS</font><font color=\"#00ff00\"> <a href=\"https://www.facebook.com/CaoNgocLinhz\" target=\"_blank\" style=\"\">Tại Đây</a></font></b></p><p style=\"font-size: 16px; text-align: center;\"><b><font color=\"#000000\">Tùy Chọn Vị Trí Datacenter, Hệ Điều Hành Cho VPS Việt Nam</font><font color=\"#00ff00\"> <a href=\"https://www.facebook.com/CaoNgocLinhz\" target=\"_blank\">Tại Đây</a></font></b></p><p style=\"font-size: 16px; text-align: center;\"><b><font color=\"#000000\">Liên Hệ FB Admin</font><font color=\"#00ff00\"> <a href=\"https://www.facebook.com/CaoNgocLinhz\" target=\"_blank\" style=\"\">Tại Đây</a></font></b></p><p style=\"font-size: 16px; text-align: center;\"><font color=\"#000000\"><b>Tham Gia Nhóm Zalo Hỗ Trợ Khách Hàng </b></font><a href=\"https://zalo.me/g/lpyizq341\" target=\"_blank\"><b>Tại Đây</b></a></p><p style=\"font-size: 16px; text-align: center;\"><font color=\"#000000\"><b>Xem Hướng Dẫn Tự Setup VPS Treo Game/Tools </b></font><a href=\"https://youtu.be/rRcyNGRmM3k\" target=\"_blank\"><b>Tại Đây</b></a></p><p style=\"font-size: 16px; text-align: center;\"><b>Xem HD Setup Và Dùng Trên Điện Thoại </b><a href=\"https://www.youtube.com/watch?v=42nWhQPkqCg\" target=\"_blank\"><b>Tại Đây</b></a></p><p style=\"font-size: 16px; text-align: center;\"><font color=\"#ff0000\"><b>Lưu Ý: Không Bảo Hành VPS NN Khi Sử Dụng Quá 80% CPU, Gây Treo Remote, Đào Coin, Scan SSH.</b></font></p><p style=\"font-size: 16px; text-align: center;\"><font color=\"#ff0000\"><b>Gói VPS VN Đặc Biệt Và VPS USA Không Thể Nâng Cấp Cấu Hình.</b></font></p><p style=\"font-size: 16px; text-align: center;\"><font color=\"#ff0000\"><b>Đơn Hàng VPS Sẽ Được Duyệt Từ 10 Phút - 5 Giờ Xin Quý Khách Vui Lòng Đợi Admin.</b></font></p><p style=\"font-size: 16px; text-align: center;\"><br></p></h2><ul>\r\n            </ul>'),
(13, 'anhbia', 'https://cloudvps.site/assets/img/vpslogo.png'),
(14, 'favicon', 'https://api.mrduy.name.vn/vendors/images/favicon-32x32.png'),
(17, 'baotri', 'ON'),
(18, 'chinhsach', '<p>BẰNG VIỆC SỬ DỤNG C&Aacute;C DỊCH VỤ HOẶC MỞ MỘT T&Agrave;I KHOẢN, BẠN CHO BIẾT RẰNG BẠN CHẤP NHẬN, KH&Ocirc;NG R&Uacute;T LẠI, C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y. NẾU BẠN KH&Ocirc;NG ĐỒNG &Yacute; VỚI C&Aacute;C ĐIỀU KHOẢN N&Agrave;Y, VUI L&Ograve;NG KH&Ocirc;NG SỬ DỤNG C&Aacute;C DỊCH VỤ CỦA CH&Uacute;NG T&Ocirc;I HAY TRUY CẬP TRANG WEB. NẾU BẠN DƯỚI 18 TUỔI HOẶC &quot;ĐỘ TUỔI TRƯỞNG TH&Agrave;NH&quot;PH&Ugrave; HỢP Ở NƠI BẠN SỐNG, BẠN PHẢI XIN PH&Eacute;P CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P ĐỂ MỞ MỘT T&Agrave;I KHOẢN V&Agrave; CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P PHẢI ĐỒNG &Yacute; VỚI C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y. NẾU BẠN KH&Ocirc;NG BIẾT BẠN C&Oacute; THUỘC &quot;ĐỘ TUỔI TRƯỞNG TH&Agrave;NH&quot; Ở NƠI BẠN SỐNG HAY KH&Ocirc;NG, HOẶC KH&Ocirc;NG HIỂU PHẦN N&Agrave;Y, VUI L&Ograve;NG KH&Ocirc;NG TẠO T&Agrave;I KHOẢN CHO ĐẾN KHI BẠN Đ&Atilde; NHỜ CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P CỦA BẠN GI&Uacute;P ĐỠ. NẾU BẠN L&Agrave; CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P CỦA MỘT TRẺ VỊ TH&Agrave;NH NI&Ecirc;N MUỐN TẠO MỘT T&Agrave;I KHOẢN, BẠN PHẢI CHẤP NHẬN C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y THAY MẶT CHO TRẺ VỊ TH&Agrave;NH NI&Ecirc;N Đ&Oacute; V&Agrave; BẠN SẼ CHỊU TR&Aacute;CH NHIỆM ĐỐI VỚI TẤT CẢ HOẠT ĐỘNG SỬ DỤNG T&Agrave;I KHOẢN HAY C&Aacute;C DỊCH VỤ, BAO GỒM C&Aacute;C GIAO DỊCH MUA H&Agrave;NG DO TRẺ VỊ TH&Agrave;NH NI&Ecirc;N THỰC HIỆN, CHO D&Ugrave; T&Agrave;I KHOẢN CỦA TRẺ VỊ TH&Agrave;NH NI&Ecirc;N Đ&Oacute; ĐƯỢC MỞ V&Agrave;O L&Uacute;C N&Agrave;Y HAY ĐƯỢC TẠO SAU N&Agrave;Y V&Agrave; CHO D&Ugrave; TRẺ VỊ TH&Agrave;NH NI&Ecirc;N C&Oacute; ĐƯỢC BẠN GI&Aacute;M S&Aacute;T TRONG GIAO DỊCH MUA H&Agrave;NG Đ&Oacute; HAY KH&Ocirc;NG.</p>\n'),
(27, 'min_ruttien', '100000'),
(28, 'ck_con', '3'),
(29, 'phi_chuyentien', '500'),
(30, 'status_chuyentien', 'ON'),
(31, 'hotline', '0964290613'),
(32, 'facebook', 'https://www.facebook.com/BuiDuyAnh.02'),
(33, 'theme_color', '#01578B'),
(34, 'modal_thongbao', ''),
(42, 'api_bank', 'NTCOZKCB-YLSU-OK52-AS2I-2QGHG0ATPOF0'),
(43, 'status_napbank', 'ON'),
(44, 'status_demo', 'OFF'),
(46, 'luuy_naptien', '<p style=\"padding: 0px; margin: 0px; outline: 0px; border: 0px;\"><b style=\"\"><font color=\"#000000\" style=\"\">Hệ thống xử lý 5s-10s 1 thẻ.</font></b></p><p style=\"padding: 0px; margin: 0px; outline: 0px; border: 0px;\"><b><font color=\"#000000\" style=\"\">Vui lòng gửi đúng mệnh giá, sai mệnh giá mất thẻ.</font></b></p>'),
(47, 'id_video_youtube', 'e3zuAHXJ_YI'),
(48, 'ck_bank', '0'),
(49, 'luuy_napbank', '<p><span style=\"color:#994de6\"><strong>* Nạp ATM/MOMO/V&Iacute; ( Được 100% Gi&aacute; Trị Nạp )</strong></span></p>\r\n\r\n<p><span style=\"color:#e6994d\"><strong>V&iacute; Dụ:</strong></span></p>\r\n\r\n<p><span style=\"color:#e64d4d\"><strong>100k&nbsp;</strong></span><span style=\"color:#994de6\">ATM/MOMO/V&Iacute;</span><strong>&nbsp;= </strong><span style=\"color:#e64d4d\"><strong>100k Tr&ecirc;n Shop</strong></span></p>\r\n\r\n<p><span style=\"color:#e64d4d\"><strong>500k&nbsp;</strong></span><span style=\"color:#994de6\">ATM/MOMO/V&Iacute;</span>&nbsp;<span style=\"color:#e64d4d\"><span style=\"color:#000000\">=&nbsp;</span><strong>500k Tr&ecirc;n Shop</strong></span></p>\r\n'),
(50, 'check_time_cron', '1660571701'),
(51, 'api_momo', ''),
(54, 'check_time_cron_bank', '1660571701'),
(55, 'Partner_ID', ''),
(56, 'Partner_Key', ''),
(57, 'api_tsr', 'dsaa'),
(61, 'recaptcha', 'OFF'),
(62, 'api_tpbank', 'dsadsa'),
(63, 'api_zalopay', 'dsa'),
(64, 'api_tpbank', 'dsadsa'),
(65, 'api_mbbank', ''),
(66, 'status_tpbank', '1'),
(67, 'status_zalopay', '1'),
(68, 'status_momo', '1'),
(69, 'status_mbbank', '1'),
(70, 'id_chat', ''),
(71, 'token_tele', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `status`) VALUES
(4, 'Điều Khoản Sử Dụng Dịch Vụ Là Gì ?', '<p>Ch&uacute;ng t&ocirc;i cung cấp dịch vụ Cloud VPS/Proxy an to&agrave;n - bảo mật - uy t&iacute;n. V&igrave; vậy, ch&uacute;ng t&ocirc;i nghi&ecirc;m cấm c&aacute;c kh&aacute;ch h&agrave;ng sử dụng dịch vụ của ch&uacute;ng t&ocirc;i nhằm mục đ&iacute;ch bất hợp ph&aacute;p, lừa đảo, vi phạm ch&iacute;nh s&aacute;ch bảo h&agrave;nh. Những trường hợp vi phạm điều khoản ch&uacute;ng t&ocirc;i sẽ hủy dịch vụ v&agrave; kh&ocirc;ng ho&agrave;n tiền.</p>\r\n', 1),
(5, 'Chính Sách Bảo Hành Như Thế Nào?', '<p>Ch&uacute;ng t&ocirc;i cam kết bảo h&agrave;nh 1 đổi 1 trong suốt thời gian qu&yacute; kh&aacute;ch h&agrave;ng sử dụng dịch vụ của ch&uacute;ng t&ocirc;i. Ngo&agrave;i ra, khi dịch vụ bị tr&igrave; ho&atilde;n, ch&uacute;ng t&ocirc;i sẽ đền b&ugrave; đ&uacute;ng thời gian dịch vụ của qu&yacute; kh&aacute;ch bị tạm dừng. B&ecirc;n cạnh đ&oacute;, đối với dịch vụ Cloud VPS Trial, ch&uacute;ng t&ocirc;i kh&ocirc;ng bảo h&agrave;nh khi qu&yacute; kh&aacute;ch h&agrave;ng lạm dụng qu&aacute; 80% CPU, sử dụng vượt qu&aacute; băng th&ocirc;ng của g&oacute;i dịch vụ, d&ugrave;ng VPS để scan SSH, DDoS, config network g&acirc;y lỗi remote.</p>\r\n', 1),
(6, 'Tôi có thể yêu cầu hoàn tiền khi không có nhu cầu sử dụng dịch vụ nữa không ?', '<p>Ch&uacute;ng t&ocirc;i chỉ chấp nhận y&ecirc;u cầu ho&agrave;n tiền khi dịch vụ của qu&yacute; kh&aacute;ch h&agrave;ng bị gi&aacute;n đoạn hoặc hủy đơn đặt h&agrave;ng ( đ&atilde; thanh to&aacute;n nhưng hệ thống chưa ho&agrave;n th&agrave;nh ), số tiền sẽ được ho&agrave;n 100% tương ứng với số ng&agrave;y c&ograve;n lại của dịch vụ.</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `token` text COLLATE utf8_vietnamese_ci,
  `email` text COLLATE utf8_vietnamese_ci NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `level` text COLLATE utf8_vietnamese_ci,
  `banned` int(11) DEFAULT '0',
  `createdate` datetime DEFAULT NULL,
  `qua` int(11) NOT NULL,
  `daily` int(11) NOT NULL DEFAULT '0',
  `otp` text COLLATE utf8_vietnamese_ci,
  `ip` text COLLATE utf8_vietnamese_ci,
  `chietkhau` float DEFAULT '0',
  `time` text COLLATE utf8_vietnamese_ci,
  `chitieu` int(11) NOT NULL DEFAULT '0',
  `total_money` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_auto`
--
ALTER TABLE `bank_auto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_vps`
--
ALTER TABLE `category_vps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daban`
--
ALTER TABLE `daban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daban_vps`
--
ALTER TABLE `daban_vps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dongtien`
--
ALTER TABLE `dongtien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license_vps`
--
ALTER TABLE `license_vps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `momo`
--
ALTER TABLE `momo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `naptsr`
--
ALTER TABLE `naptsr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operating_system`
--
ALTER TABLE `operating_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_auto`
--
ALTER TABLE `bank_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1054;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_vps`
--
ALTER TABLE `category_vps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daban`
--
ALTER TABLE `daban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daban_vps`
--
ALTER TABLE `daban_vps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `doanhthu`
--
ALTER TABLE `doanhthu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dongtien`
--
ALTER TABLE `dongtien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2310;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `license_vps`
--
ALTER TABLE `license_vps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=780;

--
-- AUTO_INCREMENT for table `momo`
--
ALTER TABLE `momo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `naptsr`
--
ALTER TABLE `naptsr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `operating_system`
--
ALTER TABLE `operating_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=967;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
