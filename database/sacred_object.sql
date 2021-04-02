-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 04:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `news_title` varchar(250) NOT NULL,
  `news_summary` varchar(100) NOT NULL,
  `news_description` text NOT NULL,
  `news_author` varchar(50) NOT NULL,
  `news_cover` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_summary`, `news_description`, `news_author`, `news_cover`, `date_create`) VALUES
(29, 'หัวข้อข่าวที่ 1 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 1 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 1\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Lasgtin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641322483110.png', '2020-11-26 17:53:43'),
(30, 'หัวข้อข่าวที่ 2 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 2 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 2\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641328852178.png', '2020-11-26 17:54:47'),
(31, 'หัวข้อข่าวที่ 3 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 3', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 3\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641331239611.png', '2020-11-26 17:55:11'),
(32, 'หัวข้อข่าวที่ 4 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 4', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 4\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641333298341.png', '2020-11-26 17:55:32'),
(33, 'หัวข้อข่าวที่ 5 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 5', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 5\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '16064133524909.png', '2020-11-26 17:55:52'),
(34, 'หัวข้อข่าวที่ 6 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 6 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 6\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641337311511.png', '2020-11-26 17:56:12'),
(35, 'หัวข้อข่าวที่ 7 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 7', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 7\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641339296138.png', '2020-11-26 17:56:32'),
(36, 'หัวข้อข่าวที่ 8 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 8', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 8\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641341595473.png', '2020-11-26 17:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_des` varchar(100) NOT NULL,
  `product_price` varchar(6) NOT NULL,
  `product_qty` varchar(5) NOT NULL,
  `product_cover` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `product_type`, `product_des`, `product_price`, `product_qty`, `product_cover`, `date_create`) VALUES
(10, 'พระ 2', 'พระเครื่อง', 'พระแท้ 100%', '2000', '9', '160643352358633.png', '2020-11-26 23:32:03'),
(17, 'พระ 3', 'พระเครื่อง', 'พระเหรียญ', '500', '60', '161517136278580.png', '2021-03-08 02:50:07'),
(18, 'พระ 4', 'พระเครื่อง', 'พระเหรียญ', '600', '89', '161517139589934.png', '2021-03-08 02:50:18'),
(19, 'พระ 5', 'พระเครื่อง', 'พระเหรียญ', '900', '50', '161517184484858.png', '2021-03-08 02:50:44'),
(20, 'พระ 6', 'เครื่องรางของขลัง', 'เครื่อองรางของขลัง', '900', '87', '161517187970937.png', '2021-03-08 02:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตรางข้อมูลผู้ใช้';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `title_name`, `first_name`, `last_name`, `email`, `phone_number`, `profile_img`, `register_status`, `user_level`, `date_register`) VALUES
(1, 'admin', '1234', 'นาย', 'จิรพัฒน์', 'มีด้วง', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'a', '2020-11-09 07:25:11'),
(2, 'manager', '1234', 'Mr', 'jirapat', 'Meedoung', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'ma', '2020-11-09 07:29:00'),
(3, 'p1', '1234', 'นาย', 'บิล', 'จิรพัฒน์', 'q3.hahaha@gmail.com', '0845010652', '', 'pass', 'p', '2020-11-09 07:29:00'),
(4, 'p2', '1234', 'นาย', 'BILL', 'Jirapat', 'dd@gmail.com', '0845010652', '16050901171690.png', 'pass', 'p', '2020-11-11 10:21:56'),
(15, 'p3', '1234', 'นาย', 'jirapat', 'meedoung', 'jirapat.m@nsru.ac.th', '0899999999', '16151104501542.jpg', 'pass', 'p', '2021-03-07 09:47:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
