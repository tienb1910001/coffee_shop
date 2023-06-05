-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 05, 2023 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_user`, `date_order`, `total`, `payment`, `note`, `updated_at`, `created_at`) VALUES
(10, 7, '2023-06-05', 24000, 'shipCOD', NULL, '2023-06-05 00:26:17', '2023-06-05 00:26:17'),
(11, 7, '2023-06-05', 24000, 'shipCOD', NULL, '2023-06-05 00:28:05', '2023-06-05 00:28:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `updated_at`, `created_at`) VALUES
(9, 11, 63, 1, 24000, '2023-06-05 00:28:05', '2023-06-05 00:28:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price_m` double DEFAULT NULL,
  `price_l` double DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `new` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `price_m`, `price_l`, `image`, `ingredients`, `created_at`, `updated_at`, `new`) VALUES
(63, 'Cà phê đen', 1, 'Không ngọt ngào như Bạc sỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà trôi tuột xuống vòm họng.', 24000, 34000, 'https://product.hstatic.net/1000075078/product/1639377797_ca-phe-den-da_05253f78c67549cbb63870af01ae6a21.jpg', 'Cà phê', '2023-04-08 17:00:00', '2023-04-08 17:00:00', 0),
(64, 'Cà phê sữa đá', 1, 'Cà phê Đắk Lắk nguyên chất được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', 25000, 35000, 'https://product.hstatic.net/1000075078/product/1669736835_ca-phe-sua-da_3c1d0723dff94b6b93f6639f7946f8eb.png', 'Cà phê, sữa đặc', '2023-04-09 13:15:03', '2023-04-09 13:15:03', 0),
(65, 'Đường đen sữa đá', 1, 'Sản phẩm không thể thay đổi độ ngọt - Khuấy đều trước khi sử dụng Nếu chuộng vị cà phê đậm đà, bùng nổ và thích vị đường đen ngọt thơm, Đường Đen Sữa Đá đích thị là thức uống dành cho bạn. Không chỉ giúp bạn tỉnh táo buổi sáng, Đường Đen Sữa Đá còn hấp dẫn đến ngụm cuối cùng bởi thạch cà phê giòn dai, nhai cực cuốn.', 45000, 55000, 'https://product.hstatic.net/1000075078/product/1680709856_tagnew-dd-suada_7c1bab37e42d40a092f27c5d136992f7.jpg', 'Đường đen, sữa tươi', '2023-04-09 17:21:21', '2023-04-09 17:21:21', 1),
(66, 'Đường đen Marble Latte', 1, 'Sản phẩm không thể thay đổi độ ngọt - Khuấy đều trước khi sử dụng Đường Đen Marble Latte êm dịu cực hấp dẫn bởi vị cà phê đắng nhẹ hoà quyện cùng vị đường đen ngọt thơm và sữa tươi béo mịn. Sự kết hợp đầy mới mẻ của cà phê và đường đen cũng tạo nên diện mạo phân tầng đẹp mắt. Đây là lựa chọn đáng thử để bạn khởi đầu ngày mới đầy hứng khởi.', 55000, 65000, 'https://product.hstatic.net/1000075078/product/1680709921_tagnew-dd-latte-2_f4b06df22e544435bb3c8bb5001a810e.jpg', 'Đường đen, cà phê, sữa tươi', '2023-04-09 17:21:21', '2023-04-09 17:21:21', 1),
(67, 'Bạc sỉu', 1, 'Bạc sỉu chính là \"Ly sữa trắng kèm một chút cà phê\". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.', 29000, 39000, 'https://product.hstatic.net/1000075078/product/1639377904_bac-siu_2a46d27857f04a37adb350321d8b218f.jpg', 'Cà phê, sữa tươi, sữa đặc', '2023-04-09 17:21:21', '2023-04-09 17:21:21', 0),
(68, 'Trà đào cam sả', 2, 'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', 49000, 59000, 'https://product.hstatic.net/1000075078/product/1669736819_tra-dao-cam-sa-da_d7605f8f897a43bcae8f790b70554616.png', 'Trà oolong, đào, cam, sả', '2023-04-09 17:21:21', '2023-04-09 17:21:21', 0),
(69, 'Trà hạt sen', 2, 'Nền trà oolong hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', 49000, 59000, 'https://product.hstatic.net/1000075078/product/tra-sen_905594_2fa9bd733b58465c88e11bbb711bf51d.jpg', 'Trà oolong, hạt sen', '2023-04-09 17:21:21', '2023-04-09 17:21:21', 0),
(70, 'Hồng trà sữa trân châu', 2, 'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', 55000, 65000, 'https://product.hstatic.net/1000075078/product/hong-tra-sua-tran-chau_326977_b01c53c599d84ed7bdacc5311c7689d1.jpg', 'Hồng trà, sữa tươi, trân châu', '2023-04-09 17:21:21', '2023-04-09 17:21:21', 0),
(71, 'Trà oolong nướng trân châu', 2, 'Hương vị chân ái đúng gu đậm đà với trà oolong được “sao” (nướng) lâu hơn cho hương vị đậm đà, hòa quyện với sữa thơm béo mang đến cảm giác mát lạnh, lưu luyến vị trà sữa đậm đà nơi vòm họng.', 53000, 63000, 'https://product.hstatic.net/1000075078/product/1669736877_tra-sua-oolong-nuong-tran-chau_21de64f25beb4aac8ca9f670e33ee329.png', 'Trà oolong, sữa tươi, trân châu', '2023-04-09 17:21:21', '2023-04-09 17:21:21', 0),
(72, 'Trà sữa mắc ca trân châu', 2, 'Mỗi ngày với The Grinder sẽ là điều tươi mới hơn với sữa hạt mắc ca thơm ngon, bổ dưỡng quyện cùng nền trà oolong cho vị cân bằng, ngọt dịu đi kèm cùng Trân châu trắng giòn dai mang lại cảm giác “đã” trong từng ngụm trà sữa.', 57000, 67000, 'https://product.hstatic.net/1000075078/product/tra-sua-mac-ca_377522_21c7ceb3315842158e3b4c57dc27c951.jpg', 'Trà oolong, sữa mắc ca, trân châu', '2023-04-09 17:21:21', '2023-04-09 17:21:21', 0),
(73, 'Hi-tea Thơm trân châu', 3, 'Với nền trà Hibiscus 0% caffeine và thơm giàu vitamin C, Hi-Tea Thơm là thức uống dành cho hội healthy. Đặc biệt, Hi-Tea Thơm chua chua ngọt ngọt thêm phần hấp dẫn nhờ kết hợp cùng trân châu trắng giòn dai cực vui miệng.', 49000, 59000, 'https://product.hstatic.net/1000075078/product/1679067368_hitea-thom_5d7908f8a3c945d6bb6c889b9b0537c0.jpg', 'Trà Hibiscus, mứt thơm, trân châu', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(74, 'Hi-tea vải', 3, 'Chút ngọt ngào của Vải, mix cùng vị chua thanh tao từ trà hoa Hibiscus, mang đến cho bạn thức uống đúng chuẩn vừa ngon, vừa healthy.', 45000, 55000, 'https://product.hstatic.net/1000075078/product/1669736893_hi-tea-vai_4794875e16ab4478869bbc6ef969f54f.png', 'Trà Hibiscus, vải', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(75, 'Hi-tea dâu tây mận muối', 3, 'Sự kết hợp độc đáo giữa 3 sắc thái hương vị khác nhau: trà hoa Hibiscus chua thanh, Mận muối mặn mặn và Dâu tây tươi Đà Lạt cô đặc ngọt dịu. Ngoài ra, topping Aloe Vera tươi mát, ngon ngất ngây, đẹp đắm say, hứa hẹn sẽ khuấy đảo hè này.', 55000, 65000, 'https://product.hstatic.net/1000075078/product/1679067492_hitea-man-muoi-dau-tay-ver2_dc37a96f8d0e40da835b9e899b6987d5.jpg', 'Trà Hibiscus, dâu tây, mận muối', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(76, 'Cloud-tea oolong nướng kem cheese', 3, 'Hội mê cheese sao có thể bỏ lỡ chiếc trà sữa siêu mlem này. Món đậm vị Oolong nướng - nền trà được yêu thích nhất hiện nay, quyện thêm kem sữa thơm béo. Đặc biệt, chinh phục ngay fan ghiền cheese bởi lớp foam phô mai mềm tan mằn mặn. Càng ngon cực với thạch Oolong nướng nguyên chất giòn dai nhai siêu thích.', 55000, 65000, 'https://product.hstatic.net/1000075078/product/1675355728_cheese_dda0b4b049144d998c7e1e516ad67fae.jpg', 'Trà oolong nướng, kem cheese', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(77, 'Cloud-tea oolong nướng kem dừa đá xây', 3, 'Trà sữa đá xay - phiên bản nâng cấp đầy mới lạ của trà sữa truyền thống, lần đầu xuất hiện tại Nhà. Ngon khó cưỡng với lớp kem dừa béo ngậy nhưng không ngấy, thêm vụn bánh quy phô mai giòn tan vui miệng. Trà Oolong nướng rõ hương đậm vị, quyện với sữa dừa beo béo, được xay mịn cùng đá, mát rượi trong tích tắc. Đặc biệt, thạch Oolong nướng nguyên chất giúp giữ trọn vị đậm đà của trà sữa đến giọt cuối cùng.', 63000, 73000, 'https://product.hstatic.net/1000075078/product/1675329651_bg-cloudtea-daxay_08d2a37608784bb9881d5b3955b0f37f.jpg', 'Trà oolong nướng, kem chesse, dừa đá xay', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(78, 'Cloud-fee hạnh nhân nướng', 3, 'Vị đắng nhẹ từ cà phê phin truyền thống kết hợp Espresso Ý, lẫn chút ngọt ngào của kem sữa và lớp foam trứng cacao, nhấn thêm hạnh nhân nướng thơm bùi, kèm topping thạch cà phê dai giòn mê ly. Tất cả cùng quyện hoà trong một thức uống làm vị giác \"thức giấc\", thơm ngon hết nấc.', 49000, 59000, 'https://product.hstatic.net/1000075078/product/1675357918_cloudfee-hanh-nhan-nuong-min_2d33a80aea6c402ab34ce74cdcc9891e.png', 'Espresso Ý, foam trứng, kem sữa', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(79, 'Cloud-fee caramel', 3, 'Ngon khó cưỡng bởi xíu đắng nhẹ từ cà phê phin truyền thống pha trộn với Espresso lừng danh nước Ý, quyện vị kem sữa và caramel ngọt ngọt, thêm lớp foam trứng cacao bồng bềnh béo mịn, kèm topping thạch cà phê dai giòn nhai cực cuốn. Một thức uống \"điểm mười\" cho cả ngày tươi không cần tưới.', 44000, 54000, 'https://product.hstatic.net/1000075078/product/1675329314_bg-cloudfee-caramel_05bdce06fc8e460380ac95a2dc2c33af.jpg', 'Espresso Ý, caramel', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(80, 'Croissant trứng muối', 4, 'Croissant trứng muối thơm lừng, bên ngoài vỏ bánh giòn hấp dẫn bên trong trứng muối vị ngon khó cưỡng.', 35000, 35000, 'https://product.hstatic.net/1000075078/product/croissant-trung-muoi_880850_198fa7c1782a4d46bae1f95ba2a90374.jpg', '', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(81, 'Trà bông trứng muối', 4, 'Chiếc bánh với lớp phô mai vàng sánh mịn bên trong, được bọc ngoài lớp vỏ xốp mềm thơm lừng. Thêm lớp chà bông mằn mặn hấp dẫn bên trên.', 35000, 35000, 'https://product.hstatic.net/1000075078/product/1669736993_cha-bong-pho-mai_cec28eb718664e2eb52395a0a159f9f6.png', '', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(82, 'Tiramisu', 4, 'Hương vị dễ ghiền được tạo nên bởi chút đắng nhẹ của cà phê, lớp kem trứng béo ngọt dịu hấp dẫn', 29000, 29000, 'https://product.hstatic.net/1000075078/product/1638170137_tiramisu_445d8d8b2cbe4e99b3cafaecb85ad295.jpg', '', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(83, 'Red Velvet', 4, 'Bánh nhiều lớp được phủ lớp kem bên trên bằng Cream cheese.', 29000, 29000, 'https://product.hstatic.net/1000075078/product/5dd2087ff2546c2614fb08d1_red-velvet_087977_2c13b17dc631401a8dfcf35e69fd378b.jpg', '', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0),
(84, 'Gấu chocolate', 4, 'Với vẻ ngoài đáng yêu và hương vị ngọt ngào, thơm béo nhất định bạn phải thử ít nhất 1 lần.', 29000, 29000, 'https://product.hstatic.net/1000075078/product/1638170066_gau_b2b1d54a1770478eb79f539860012b48.jpg', '', '2023-04-09 18:00:46', '2023-04-09 18:00:46', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Coffee', NULL, NULL),
(2, 'Tea', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Special', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Cake', '2016-10-26 03:29:19', '2016-10-26 02:22:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `address`, `password`, `created_at`, `updated_at`) VALUES
(4, 'Thang Hoang', 'thangb1909988@student.ctu.edu.vn', '0916772982', 'Can Tho', '$2y$10$lPdaJsCLsAqdoGdmK4qa/O3Iz1XYaB1BsLDfQOMTnehk8kaz4GdKG', '2023-04-09 07:44:43', '2023-04-13 07:38:48'),
(5, 'Hoang', 'thang@gmail.com', '0912356781', '143 NTT', '$2y$10$B//31KB2T8E7FxjXhbnAB.hG3B4mhNXtJwS2tpXpJKo.hM8VllTGS', '2023-04-10 08:25:44', '2023-04-10 08:25:44'),
(6, 'Hoang Thang', 'thang123@gmail.com', '0912378112', '143 NTT 2', '$2y$10$3XD0G7zo0szuEtqNBg4Ju.R1gaVcYuPmM1nN5bUcrx2NIgfnrYF.m', '2023-04-11 01:09:09', '2023-04-11 01:09:09'),
(7, 'Nguyen Le Tien', 'letien@gmail.com', '0834245451', '0834245451', '$2y$10$mjGvP/ajdj6mZpn0LT.8JuUDO.9EYbIVawMrMpkSAFs.BhOk89/wO', '2023-06-05 00:20:17', '2023-06-05 00:20:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_user`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
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
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);

--
-- Các ràng buộc cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD CONSTRAINT `type_products_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
