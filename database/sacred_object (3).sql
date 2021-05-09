-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 09:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sacred_object`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id_basket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `cover_basket` varchar(250) NOT NULL COMMENT 'รูป',
  `b_product_name` varchar(250) NOT NULL COMMENT 'ชื่อสินค้าที่เลือก',
  `b_product_price` varchar(100) NOT NULL COMMENT 'ราคาสินค้า/ชิ้น',
  `b_product_qty` varchar(100) NOT NULL COMMENT 'จำนวนสินค้า',
  `b_price` varchar(100) NOT NULL COMMENT 'ราคา',
  `status_basket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id_basket`, `id_user`, `id_product`, `cover_basket`, `b_product_name`, `b_product_price`, `b_product_qty`, `b_price`, `status_basket`) VALUES
(50, 3, 26, '16175237994972.png', 'พระเครื่องเมืองเชียงใหม่', '1800', '1', '1800', 'order'),
(51, 3, 23, '161752317560434.png', 'พระเครื่องเมืองพิจิตร', '900', '5', '3600', 'order'),
(52, 3, 26, '16175237994972.png', 'พระเครื่องเมืองเชียงใหม่', '1800', '1', '1800', 'order'),
(53, 3, 23, '161752317560434.png', 'พระเครื่องเมืองพิจิตร', '900', '5', '4500', 'order'),
(54, 17, 23, '161752317560434.png', 'พระเครื่องเมืองพิจิตร', '900', '1', '900', 'order');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(250) NOT NULL,
  `news_summary` varchar(100) NOT NULL,
  `news_description` text NOT NULL,
  `news_author` varchar(50) NOT NULL,
  `news_cover` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_summary`, `news_description`, `news_author`, `news_cover`, `date_create`) VALUES
(29, 'หัวข้อข่าวที่ 1 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 1 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 1\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Lasgtin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755932191200.jpg3', '2021-04-04 18:02:00'),
(30, 'หัวข้อข่าวที่ 2 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 2 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 2\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755966254371.jpg2', '2021-04-04 18:07:42'),
(31, 'หัวข้อข่าวที่ 3 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 3', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 3\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755969025363.jpg', '2021-04-04 18:08:10'),
(32, 'หัวข้อข่าวที่ 4 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 4', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 4\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641333298341.png', '2020-11-26 17:55:32'),
(33, 'หัวข้อข่าวที่ 5 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 5', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 5\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '16064133524909.png', '2020-11-26 17:55:52'),
(34, 'หัวข้อข่าวที่ 6 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 6 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 6\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '16175597539915.jpg', '2021-04-04 18:09:13'),
(35, 'หัวข้อข่าวที่ 7 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 7', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 7\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755972665230.jpg2', '2021-04-04 18:08:45'),
(36, 'หัวข้อข่าวที่ 8 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 8', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 8\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755935184001.jpg3', '2021-04-04 18:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_des` varchar(100) NOT NULL,
  `product_price` varchar(6) NOT NULL,
  `product_qty` varchar(5) NOT NULL,
  `product_cover` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `product_type`, `product_des`, `product_price`, `product_qty`, `product_cover`, `date_create`) VALUES
(21, 'พระเครื่องเมืองกำแพง', 'พระเครื่อง', 'ของดีเมืองกำแพงเพชร', '500', '20', '161751874186045.png', '2021-05-07 10:36:53'),
(22, 'พระเครื่องเมืองนครสวรรค์', 'พระเครื่อง', 'ของดีเมืองนครสวรรค์', '300', '20', '161751878125269.png', '2021-05-07 10:36:12'),
(23, 'พระเครื่องเมืองพิจิตร', 'พระเครื่อง', 'ของดีเมืองพิจิตร', '900', '3', '161752317560434.png', '2021-05-08 10:09:44'),
(24, 'พระเครื่องเมืองสุโขทัย', 'พระเครื่อง', 'ของดีเมืองสุโขทัย', '1900', '14', '161752328733180.png', '2021-05-05 04:37:00'),
(25, 'พระเครื่องเมืองอยุธยา', 'พระเครื่อง', 'ของดีเมืองอยุธยา', '900', '17', '161752334564007.png', '2021-05-07 07:41:38'),
(26, 'พระเครื่องเมืองเชียงใหม่', 'พระเครื่อง', 'ของดีเมืองเชียงใหม่', '1800', '18', '16175237994972.png', '2021-05-07 10:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `save_basket`
--

CREATE TABLE `save_basket` (
  `id_save_basket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_basket` varchar(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `total_prod` varchar(20) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `address_for_send` varchar(100) NOT NULL,
  `slip_img` varchar(150) NOT NULL DEFAULT 'wait',
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_pay` varchar(50) NOT NULL DEFAULT 'not_pay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `save_basket`
--

INSERT INTO `save_basket` (`id_save_basket`, `id_user`, `id_basket`, `id_product`, `total_prod`, `phone_number`, `address_for_send`, `slip_img`, `date_time`, `status_pay`) VALUES
(32, 3, '50', '26', '1,800', '0845010652', '105/1 ม.2 ต.โพธิ์ทอง อ.ปางศิลาทอง จ.กำแพงเพชร 62120', '16203845437124.jpg', '2021-05-07 10:49:22', 'cancel_order'),
(33, 3, '51', '23', '3,600', '0845010652', '105/1 ม.2 ต.โพธิ์ทอง อ.ปางศิลาทอง จ.กำแพงเพชร 62120', 'wait', '2021-05-07 10:48:16', 'cancel_order'),
(34, 3, '52', '26', '1,800', '0845010652', '105/1 ม.2 ต.โพธิ์ทอง อ.ปางศิลาทอง จ.กำแพงเพชร 62120', '16203846436703.jpg', '2021-05-07 10:51:47', 'approved'),
(35, 3, '53', '23', '4,500', '0845010652', '105/1 ม.2 ต.โพธิ์ทอง อ.ปางศิลาทอง จ.กำแพงเพชร 62120', '16203848148625.jpeg', '2021-05-08 09:30:53', 'approved'),
(36, 17, '54', '23', '900', '0845555555', '1235/5 ม.2 ต.โพธิ์ทอง 62120', '16204686186758.jpg', '2021-05-08 10:10:18', 'wait_process');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `title_name` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `profile_img` varchar(50) NOT NULL,
  `register_status` varchar(10) NOT NULL,
  `user_level` varchar(5) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตรางข้อมูลผู้ใช้' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `title_name`, `first_name`, `last_name`, `email`, `phone_number`, `profile_img`, `register_status`, `user_level`, `date_register`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'จิรพัฒน์', 'มีด้วง', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'a', '2020-11-09 07:25:11'),
(2, 'manager', '81dc9bdb52d04dc20036dbd8313ed055', 'Mr', 'jirapat', 'Meedoung', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'ma', '2020-11-09 07:29:00'),
(3, 'usertest', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'บิล', 'จิรพัฒน์', 'q3.hahaha@gmail.com', '0845010652', '', 'pass', 'p', '2020-11-09 07:29:00'),
(17, 'usertest2', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'Jirapat', 'Meedoung', 'jirapat@meedoung.com', '0845555555', '1620021772186.jpg', 'pass', 'p', '2021-05-03 06:02:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `id_product` (`id_product`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`) USING BTREE;

--
-- Indexes for table `save_basket`
--
ALTER TABLE `save_basket`
  ADD PRIMARY KEY (`id_save_basket`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `save_basket`
--
ALTER TABLE `save_basket`
  MODIFY `id_save_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `save_basket`
--
ALTER TABLE `save_basket`
  ADD CONSTRAINT `save_basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
