-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2023 at 08:42 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

CREATE TABLE `tb_address` (
  `ad_od` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ad_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ad_id` int(20) NOT NULL,
  `ad_phone` int(10) NOT NULL,
  `ad_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `user` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `name`, `user`, `password`, `email`, `phone`, `created_datetime`) VALUES
(1, 'kanyanat nanta', 'admin1', '123456', 'admin1@gmail.com', '0966916592', '2022-11-06 21:18:35'),
(2, 'Araya Arnchantuek', 'admin2', '123456', '62010912572@msu.ac.th', '0874235678', '2022-11-12 17:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(5) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `name`, `user`, `password`, `email`, `address`, `phone`, `created_datetime`, `image`, `status`) VALUES
(16, 'cat cat', 'catcat', '123456', 'cat1@gmail.com', '149/cat/มหาสารคาม', '0966916592', '2022-12-18 19:26:34', '4.jpg', ''),
(17, 'คิมบับ (김밥) ', 'คิมบับ', '123456', 'kimbub@gmail.com', '168.lll/ggggg', '0987654321', '2022-12-18 19:27:12', '2.jpg', ''),
(18, 'kanyanat nanta', 'kanyanat', '123456', 'kanyanat@gmail.com', '32/fggggg', '0966916592', '2022-12-18 19:27:46', '3.jpg', ''),
(19, 'kanya tanan2', 'k1', '1234', 'k@gmail.com', '149/karasin/461303', '0966916592', '2023-01-17 00:22:11', '273012955_241310714859446_7789819425606975774_n.jpg', ''),
(20, 'kanyanat nanta3', 'catcat3', '1234', 'catcat3@msu.ac.th', '149/a;djoaw/catcat3', '0966916592', '2023-01-24 17:46:00', '', ''),
(21, 'kanyanat nanta4', 'catcat4', '1234', 'catcat4@msu.ac.th', '149/a;djoaw/catcat4', '0966916592', '2023-01-24 17:50:48', '1674582648130282580_1805774009580473_2544533717150879462_n.jpg', ''),
(22, 'kanyanat nanta4', 'catcat4', '', 'catcat4@msu.ac.th', '149/a;djoaw/catcat4', '0966916592', '2023-01-24 17:51:05', '1674582665130282580_1805774009580473_2544533717150879462_n.jpg', ''),
(23, 'kanyanat nanta5', 'catcat5', '1234', 'catcat5@msu.ac.th', '149/a;djoaw/catcat5', '0955555555', '2023-01-24 17:53:07', '90123885_1767927520015660_4338742689307557888_n.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list`
--

CREATE TABLE `tb_list` (
  `id` int(5) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `oid` int(11) UNSIGNED ZEROFILL NOT NULL,
  `ototal` int(11) NOT NULL,
  `odate` datetime NOT NULL,
  `med_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`oid`, `ototal`, `odate`, `med_id`) VALUES
(00000000001, 55, '2022-12-15 23:32:49', '0'),
(00000000002, 55, '2022-12-15 23:40:18', '0'),
(00000000003, 78, '2022-12-15 23:43:38', '0'),
(00000000004, 69, '2022-12-16 01:20:24', '0'),
(00000000005, 156, '2022-12-18 16:46:17', '0'),
(00000000006, 55, '2022-12-18 22:35:47', '0'),
(00000000007, 313, '2022-12-28 01:19:55', '0'),
(00000000008, 0, '2023-01-05 17:54:27', '0'),
(00000000009, 55, '2023-01-09 23:52:58', '0'),
(00000000010, 38, '2023-01-17 19:14:13', '0'),
(00000000011, 15, '2023-01-17 19:15:42', '0'),
(00000000012, 55, '2023-01-17 19:18:42', '0'),
(00000000013, 55, '2023-01-17 19:19:24', '0'),
(00000000014, 55, '2023-01-17 19:20:24', '0'),
(00000000015, 55, '2023-01-17 19:20:33', '0'),
(00000000016, 55, '2023-01-17 19:21:04', '0'),
(00000000017, 15, '2023-01-20 23:03:21', '0'),
(00000000018, 55, '2023-01-22 20:37:35', '0'),
(00000000019, 23, '2023-01-22 20:39:51', '0'),
(00000000020, 15, '2023-01-22 20:40:23', '0'),
(00000000021, 15, '2023-01-22 20:41:00', '0'),
(00000000022, 125, '2023-01-24 03:50:17', '0'),
(00000000023, 235, '2023-01-25 01:53:41', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders_detail`
--

CREATE TABLE `tb_orders_detail` (
  `od_id` int(11) NOT NULL,
  `oid` int(11) UNSIGNED ZEROFILL NOT NULL,
  `pid` int(11) NOT NULL,
  `item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_orders_detail`
--

INSERT INTO `tb_orders_detail` (`od_id`, `oid`, `pid`, `item`) VALUES
(1, 00000000001, 1, 1),
(2, 00000000002, 1, 1),
(3, 00000000003, 1, 1),
(4, 00000000003, 2, 1),
(5, 00000000004, 2, 3),
(6, 00000000005, 2, 2),
(7, 00000000005, 1, 2),
(8, 00000000006, 1, 1),
(9, 00000000007, 1, 5),
(10, 00000000007, 2, 1),
(11, 00000000007, 3, 1),
(12, 00000000009, 1, 1),
(13, 00000000010, 3, 1),
(14, 00000000010, 2, 1),
(15, 00000000011, 3, 1),
(16, 00000000012, 4, 1),
(17, 00000000013, 4, 1),
(18, 00000000014, 1, 1),
(19, 00000000015, 1, 1),
(20, 00000000016, 1, 1),
(21, 00000000017, 3, 1),
(22, 00000000018, 1, 1),
(23, 00000000019, 2, 1),
(24, 00000000020, 3, 1),
(25, 00000000021, 3, 1),
(26, 00000000022, 3, 1),
(27, 00000000022, 7, 2),
(28, 00000000023, 3, 1),
(29, 00000000023, 7, 3),
(30, 00000000023, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `med_id` int(11) NOT NULL,
  `type_product_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `med_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `med_detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `med_price` int(5) NOT NULL,
  `med_cost` int(5) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`med_id`, `type_product_id`, `med_name`, `med_detail`, `med_price`, `med_cost`, `image`) VALUES
(1, '3', 'TYLENOL PARACETAMOL ', 'ยาบรรเทาปวดลดไข้ 500 มก. (100 เม็ด)', 30, 55, '16685470501.jpg'),
(2, '3', 'ยาแก้ไอมะขามป้อม', 'ยาบรรเทาปวด', 20, 23, '16685470842.jpg'),
(3, '1', 'ยา1', 'ยาบรรเทาท้องเสีย', 10, 15, '16685471213.jpg'),
(4, '2', 'ยาทา', 'ยาบรรเทาปวดเมื่อย', 30, 55, '16685471474.jpg'),
(5, '3', 'ยาแก้ไอมะขามป้อม2', 'บรรเทาอาการไอ ขับเสมหะ และช่วยให้ชุ่มคอ ', 25, 50, '16685471695.jpg'),
(6, '3', 'ยาธาตุน้ำขาว', 'ใช้บรรเทาอาการท้องเสียจากการติดเชื้อที่ไม่รุนแรง ลดอาการแน่นท้อง ท้องอืด จุกเสียด ลดอาการปวดท้องได้ แต่ไม่มีส่วนช่วยในการลดกรดในกระเพาะอาหาร', 15, 25, '16685472096.jpg'),
(7, '1', 'ยา2', 'ยาบรรเทาปวดเมื่อย', 30, 55, 'ShotType1_540x540_23.jpg'),
(8, '2', 'ยาธาตุน้ำขาว ตรากระต่ายบิน', ' แก้ปวดท้อง ท้องอืด ท้องเฟ้อ', 30, 55, '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_product`
--

CREATE TABLE `tb_type_product` (
  `id` int(5) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tb_type_product`
--

INSERT INTO `tb_type_product` (`id`, `title`, `created_datetime`) VALUES
(1, 'ยาแผนโบราณ', '2022-11-06 21:09:31'),
(2, 'ยาแผนปัจจุบัน', '2022-11-06 21:09:41'),
(3, 'ยาสามัญประจำบ้าน', '2022-11-06 21:09:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_list`
--
ALTER TABLE `tb_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `tb_orders_detail`
--
ALTER TABLE `tb_orders_detail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `tb_type_product`
--
ALTER TABLE `tb_type_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `ad_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_list`
--
ALTER TABLE `tb_list`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `oid` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_orders_detail`
--
ALTER TABLE `tb_orders_detail`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_type_product`
--
ALTER TABLE `tb_type_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
