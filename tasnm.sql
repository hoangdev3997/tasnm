-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2019 lúc 07:36 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tasnm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Itachi', '$2y$10$/3goIpFf.zWpq71XVg/Vme722nld6wHOQ/m22iAtEIHXpgbu.ayJC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commenter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commenter_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 1,
  `child_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `commenter_id`, `commenter_type`, `guest_name`, `guest_email`, `commentable_type`, `commentable_id`, `comment`, `approved`, `child_id`, `created_at`, `updated_at`) VALUES
(5, '5', 'App\\User', NULL, NULL, 'App\\Product', '1', 'CHào', 1, NULL, '2019-10-27 10:47:01', '2019-10-27 10:47:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `FullName_CT` varchar(50) NOT NULL,
  `Email_CT` varchar(50) NOT NULL,
  `Tieude_CT` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `FullName_CT`, `Email_CT`, `Tieude_CT`, `Message`, `created_at`, `updated_at`) VALUES
(1, 'Trần Anh Khoa', 'nhokcodoc468@gmail.com', 'Chăm sóc khách hàng', 'Tệ hết sức tệ!!!!', '2019-10-18 19:10:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_sps`
--

CREATE TABLE `group_sps` (
  `id` int(11) NOT NULL,
  `Ten_Group` varchar(20) NOT NULL,
  `Top_Group` tinyint(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `group_sps`
--

INSERT INTO `group_sps` (`id`, `Ten_Group`, `Top_Group`, `created_at`, `updated_at`) VALUES
(1, 'Trang Phục Nam', 1, NULL, '2019-10-19 00:15:24'),
(2, 'Trang Phục Nữ', 2, NULL, NULL),
(3, 'Phụ Kiện', 3, NULL, NULL),
(4, 'Bí Ẩn', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `ID_SP` int(11) NOT NULL,
  `Images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `ID_SP`, `Images`, `created_at`, `updated_at`) VALUES
(2, 1, 'm44.jpg', NULL, NULL),
(3, 2, 'm33.jpg', NULL, NULL),
(4, 4, 'm22.jpg', NULL, NULL),
(5, 5, 'm55.jpg', NULL, NULL),
(6, 6, 'm77.jpg', NULL, NULL),
(7, 7, 'm88.jpg', NULL, NULL),
(8, 8, 'm66.jpg', NULL, NULL),
(9, 9, 'w11.jpg', NULL, NULL),
(10, 10, 'w22.jpg', NULL, NULL),
(11, 11, 'w33.jpg', NULL, NULL),
(12, 12, 'w44.jpg', NULL, NULL),
(13, 13, 'w55.jpg', NULL, NULL),
(14, 14, 'w66.jpg', NULL, NULL),
(15, 15, 'w77.jpg', NULL, NULL),
(16, 16, 'w88.jpg', NULL, NULL),
(17, 32, '62241049_1245496205610497_5375337598862491648_n.jpg', NULL, NULL),
(23, 2, '61908702_2061813380779946_1109367972129931264_n.jpg', '2019-10-18 09:45:28', '2019-10-18 09:45:28'),
(53, 1, '42058360_533594700387485_3420667458120318976_n.jpg', NULL, NULL),
(54, 1, 'jRLkW4M_700wa_0.gif', NULL, '2019-10-18 11:10:27'),
(55, 1, '42058360_533594700387485_3420667458120318976_n.jpg', NULL, NULL),
(56, 1, '43354677_10156073585303585_978130320073162752_n.jpg', NULL, NULL),
(58, 34, '71589685_905592006489163_1112525675035623424_n.jpg', NULL, NULL),
(59, 34, '71756161_2429141137352614_3603488522100539392_n.jpg', NULL, NULL),
(60, 34, '72536356_1113735222161770_7404740724605845504_n.jpg', NULL, NULL),
(61, 34, '72671403_2637347696286856_7136773196702810112_n.jpg', NULL, NULL),
(62, 34, '72940881_538342456737205_1003371245871300608_n.jpg', NULL, NULL),
(63, 1, '11 - CozNnNB.png', NULL, NULL),
(64, 1, '12 - tdnCpsj.png', NULL, NULL),
(65, 1, '13 - PdcgoeC.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_tasnms`
--

CREATE TABLE `info_tasnms` (
  `id` tinyint(1) NOT NULL,
  `SDT_tasnm` varchar(25) NOT NULL,
  `Email_tasnm` varchar(100) NOT NULL,
  `Location_tasnm` varchar(255) NOT NULL,
  `Time_tasnm` varchar(35) NOT NULL,
  `Content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `info_tasnms`
--

INSERT INTO `info_tasnms` (`id`, `SDT_tasnm`, `Email_tasnm`, `Location_tasnm`, `Time_tasnm`, `Content`, `created_at`, `updated_at`) VALUES
(1, '(+84) 090 678 194Z', 'mail@example.com', '778/11 NguyenKiem Street, GoVap, VietNam', 'Thứ 2 - Chủ Nhật  9:00 ~ 23:00', 'Tasnm cam kết chất lượng cho tất cả sản phẩm bán tại cửa hàng Tasnm bằng chính sách bảo hành 365 ngày và chăm sóc trọn đời sau khi hết bảo hành.', NULL, '2019-10-19 00:48:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Status_Order` tinyint(1) NOT NULL,
  `Price_Order` double(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `ID_Order` int(11) NOT NULL,
  `ID_SP` int(11) NOT NULL,
  `Color_Od_SP` varchar(10) NOT NULL,
  `Size_Od_SP` varchar(10) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `Img_Pn` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `partners`
--

INSERT INTO `partners` (`id`, `Img_Pn`, `created_at`, `updated_at`) VALUES
(1, 'FPoly.png', NULL, NULL),
(2, '1.png', NULL, NULL),
(3, '2.png', NULL, NULL),
(4, '3.png', NULL, NULL),
(5, '4.png', NULL, NULL),
(6, '5.png', NULL, NULL),
(7, '6.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Ten_SP` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Gia_SP` double(10,0) NOT NULL,
  `GiamGia_SP` double(10,0) DEFAULT NULL,
  `Mota_SP` text CHARACTER SET utf8 NOT NULL,
  `Img_SP` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Availability` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Event_SP` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Color_SP` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Size_SP` varchar(25) CHARACTER SET utf8 NOT NULL,
  `ID_Group` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `Ten_SP`, `Gia_SP`, `GiamGia_SP`, `Mota_SP`, `Img_SP`, `Availability`, `Event_SP`, `Color_SP`, `Size_SP`, `ID_Group`, `created_at`, `updated_at`) VALUES
(1, 'Round Neck Black T-Shirt', 875000, 0, '<p>Áo Xanh Trắng.</p>', 'm4.jpg', 'Còn Hàng', 'Hot', 'Trắng', 'XXL', 1, NULL, NULL),
(2, 'Dark Blue Track Pants', 875000, 950000, 'Quần Xanh Đen.', 'm3.jpg', 'Hết Hàng', NULL, 'Đỏ', 'SL', 1, NULL, NULL),
(4, 'Gabi Full Sleeve Sweatshirt', 750000, NULL, 'Áo khoác Gabi Full Sleeve.', 'm2.jpg', 'Còn Hàng', 'New', 'Cam', 'M', 1, NULL, NULL),
(5, 'Men\'s Black Jeans', 479000, NULL, 'Quần Màu Đen.', 'm5.jpg', 'Còn Hàng', 'New', 'Trắng', 'SX', 1, NULL, NULL),
(6, 'Analog Watch', 22990000, 42570000, 'Đồng Hồ Conan.', 'm7.jpg', 'Còn Hàng', 'Sale', 'Đỏ', 'SX', 1, NULL, NULL),
(7, 'Party Men\'s Blazer', 5850000, 6720000, 'Áo được thiết kế đặc biệt dành cho những bữa tiệc lớn.', 'm8.jpg', 'Còn Hàng', 'Sale', 'Đỏ', 'SX', 1, NULL, NULL),
(8, 'Reversible Belt', 99999000, 119999000, 'Loại dây nịt được làm từ Da Khủng Long Bạo Chúa Cao Cấp.', 'm6.jpg', 'Còn Hàng', 'Sale', 'Cam', 'M', 1, NULL, NULL),
(9, 'A-line Black Skirt', 3012770, 4363330, '<p>Quần A-Line của Bạn Nữ.</p>', 'w1.jpg', 'Còn hàng', 'Sale', 'Đỏ', 'SX', 2, NULL, '2019-10-19 03:07:41'),
(10, 'Sleeveless Solid Blue Top', 3242770, 4363330, 'Quần Sleeveless Solid Nữ.', 'w2.jpg', 'Còn Hàng', 'New Hot', 'Xanh Dương', 'SL', 2, NULL, NULL),
(11, 'Skinny Jeans', 3473000, 4364000, 'Quần Skinny của Bạn Nữ.\r\n', 'w3.jpg', 'Còn Hàng', 'Hot', 'Đỏ', 'SX', 2, NULL, NULL),
(12, 'Black Basic Shorts', 2783000, 4364000, 'Quần Ngắn Basic Nữ.', 'w4.jpg', 'Còn Hàng', 'Hot', 'Cam', 'XXL', 2, NULL, NULL),
(13, 'Pink Track Pants', 5083000, 8964000, 'Quần Pink Track của Bạn Nữ.\r\n', 'w5.jpg', 'Còn Hàng', 'Hot', 'Đỏ', 'SX', 2, NULL, NULL),
(14, 'Analog Watch', 7383000, 11264000, '<p>Đồng Hồ Sleeveless Nữ.</p>\r\n', 'w6.jpg', 'Còn Hàng', 'Hot', 'Đỏ', 'M', 2, NULL, NULL),
(15, 'Ankle Length Socks', 2323000, NULL, 'Vớ Ankle Nữ.\r\n', 'w7.jpg', 'Còn Hàng', NULL, 'Xanh Dương', 'SX', 2, NULL, NULL),
(16, 'Reebok Women\'s Tights', 3013000, NULL, 'Quần Bó Sleeveless Solid Nữ.', 'w8.jpg', 'Còn Hàng', NULL, 'Đỏ', 'SL', 2, NULL, NULL),
(17, 'Laptop Messenger Bag', 5245000, NULL, 'Túi Đựng LapTop.', 'b1.jpg', 'Còn Hàng', NULL, 'Cam', 'SX', 3, NULL, NULL),
(18, 'Puma Backpack', 5245000, NULL, 'Balo Puma.', 'b2.jpg', 'Còn Hàng', NULL, 'Đỏ', 'SX', 3, NULL, NULL),
(19, 'Laptop Backpack', 3425000, 5504000, 'Balo Backpack.', 'b3.jpg', 'Còn Hàng', NULL, 'Đỏ', 'M', 4, NULL, NULL),
(20, 'Travel Duffel Bag', 3245000, NULL, 'Túi Đeo Travel.', 'b4.jpg', 'Còn Hàng', NULL, 'Đỏ', 'SL', 3, NULL, NULL),
(21, 'Hand-held Bag', 7045000, 10575000, 'Túi Xách Hand Nữ.', 'b5.jpg', 'Còn Hàng', NULL, 'Xanh Dương', 'SX', 3, NULL, NULL),
(22, 'Butterflies Bag', 8545000, NULL, 'Túi Xách Butterflies Nữ.', 'b6.jpg', 'Còn Hàng', NULL, 'Đỏ', 'XL', 3, NULL, NULL),
(23, 'Costa Swiss Bag', 12045000, 20005000, 'Túi Xách Costa Nữ.', 'b7.jpg', 'Còn Hàng', NULL, 'Đỏ', 'SX', 3, NULL, NULL),
(24, 'Noble Designs Bag', 3445000, NULL, 'Túi Xách Noble Nữ.', 'b8.jpg', 'Còn Hàng', NULL, 'Xanh Dương', 'XL', 3, NULL, NULL),
(25, 'Running Shoes', 245000, 452000, 'Giày Running.', 's1.jpg', 'Còn Hàng', NULL, 'Đỏ', 'XL', 3, NULL, NULL),
(26, 'Steemo Casuals(Black)', 3245000, NULL, 'Giày Steemo.', 's3.jpg', 'Còn Hàng', NULL, 'Xanh Dương', 'XXL', 3, NULL, NULL),
(27, 'Benetton Flip Flops', 95000, 175000, 'Dép Benetton Nữ.', 's4.jpg', 'Còn Hàng', NULL, 'Đỏ', 'XL', 3, NULL, NULL),
(28, 'Moonwalk Bellies', 545000, 605500, 'Dép Moonwalk Nữ.', 's5.jpg', 'Còn Hàng', NULL, 'Đỏ', 'M', 3, NULL, NULL),
(29, 'Aero Canvas Loafers', 2045000, 2205000, 'Giày Aero.', 's6.jpg', 'Còn Hàng', NULL, 'Cam', 'SL', 3, NULL, NULL),
(30, 'Sparx Sporty Canvas Shoes', 3445000, 4598000, 'Giày Lười Sparx.', 's7.jpg', 'Còn Hàng', NULL, 'Đỏ', 'SX', 3, NULL, NULL),
(31, 'Shoetopia Lace Up', 2654000, 0, 'Giày Nike Fake.', 's2.jpg', 'Còn Hàng', NULL, 'Xanh Dương', 'M', 3, NULL, NULL),
(32, 'Women BLACK Heels', 11354000, 0, 'Guốc Đen Cho Nữ', 's8.jpg', 'Còn Hàng', NULL, 'Đỏ', 'SX', 3, NULL, NULL),
(34, 'Cần Sa', 1, 0, 'Cần sa: còn được gọi là marijuana/cannabis, cỏ, là một loại thuốc thần kinh từ cây Cannabis được sử dụng cho mục đích y tế hoặc giải trí. Chất kích thích thần kinh chính của cần sa là tetrahydrocannabinol (THC), một trong 483 hợp chất đã biết trong cây này, bao gồm ít nhất 65 loại cannabinoid khác. Cần sa có thể được sử dụng bằng cách hút thuốc, hít hơi, trộn vào trong thực phẩm, hoặc như một chất chiết xuất.', '20120623-chinh-phu-uruguay-muon-buon-ban...-can-sa-0.jpg', 'Còn hàng', 'Hot', 'Xanh lá', 'XXL', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `Email_Sale` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `Email_Sale`, `created_at`, `updated_at`) VALUES
(12, 'nhokcodoc468@gmail.com', '2019-10-24 05:44:12', '2019-10-24 05:44:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `Tieude_NB` varchar(25) NOT NULL,
  `NoiDung_Sl` varchar(100) NOT NULL,
  `Name_Sl` varchar(45) NOT NULL,
  `Img_Sl` varchar(255) NOT NULL,
  `ID_Group` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `Tieude_NB`, `NoiDung_Sl`, `Name_Sl`, `Img_Sl`, `ID_Group`, `created_at`, `updated_at`) VALUES
(1, 'Bộ sưu tập mới', 'Mỗi ngày là một ngày mới', 'Thời trang Nam', '1.png', 1, NULL, '2019-10-19 03:09:02'),
(2, 'Khuyến mãi giờ vàng', 'Đặc biệt trong tháng 9', 'Thời trang Nữ', '2.png', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FullName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` int(11) NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `FullName`, `Phone`, `Address`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Itachi', '$2y$10$34f3gLgJfWjniKthakaELuDz6TGAUECKMxIGsFJgaIpwezhy34mja', 'Khoa Trần', 1231231231, 'Đoán xem', 'khoataps08318@fpt.edu.vn', NULL, 'GXBHl7drdN66e8SGnJLAGAvzb4tlAWE4nGVh0UEhHF5YavF2MMp7Y5pmpXrQ', '2019-11-01 12:54:30', '2019-11-01 12:55:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commenter_id_commenter_type_index` (`commenter_id`,`commenter_type`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_child_id_foreign` (`child_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group_sps`
--
ALTER TABLE `group_sps`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_images_products` (`ID_SP`);

--
-- Chỉ mục cho bảng `info_tasnms`
--
ALTER TABLE `info_tasnms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orderdetails_products` (`ID_SP`),
  ADD KEY `FK_orderdetails_order` (`ID_Order`);

--
-- Chỉ mục cho bảng `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_products_group_sp` (`ID_Group`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_slide_group_sp` (`ID_Group`);

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
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `group_sps`
--
ALTER TABLE `group_sps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_images_products` FOREIGN KEY (`ID_SP`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_orderdetails_order` FOREIGN KEY (`ID_Order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orderdetails_products` FOREIGN KEY (`ID_SP`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_group_sp` FOREIGN KEY (`ID_Group`) REFERENCES `group_sps` (`id`);

--
-- Các ràng buộc cho bảng `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `FK_slide_group_sp` FOREIGN KEY (`ID_Group`) REFERENCES `group_sps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
