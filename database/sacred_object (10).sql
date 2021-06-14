-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 04:05 PM
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
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id_basket` int(100) NOT NULL,
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
(1, 1, 1, '1623242291336290466818.png,1623242291403717931707.png', 'ทดสอบ ', '100', '1', '100', 'order'),
(2, 18, 7, '1623245235676929467489.jpg,1623245235509447168142.jpg,1623245235539549404000.jpg,1623245235727738741574.jpg', 'เหรียญหลวงพ่อศรีสวรรค์ รุ่นหยดน้ำ', '120', '1', '120', 'order'),
(5, 3, 6, '1623244866244260042044.jpg,1623244866789383154304.jpg', 'เหรียญหลวงพ่อศรีสวรรค์หลวงพ่อสองพี่น้อง', '299', '1', '299', 'order'),
(6, 3, 5, '162324389198227662185.png,1623243891700914264664.png', 'พระบูชา หลวงพ่อพระศรีสวรรค์ (ตั้งหน้ารถรุ่นแรก)', '299', '1', '299', 'order'),
(9, 18, 7, '1623245235676929467489.jpg,1623245235509447168142.jpg,1623245235539549404000.jpg,1623245235727738741574.jpg', 'เหรียญหลวงพ่อศรีสวรรค์ รุ่นหยดน้ำ', '120', '2', '240', 'order');

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
(56, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nบุคคลพึงรีบขวนขวายในความดี พึงห้ามจิตเสียจากความชั่ว\r\nเพราะว่า เมื่อบุคคลทำความดีข้ไป ใจจะยินดีในความชั่ว ฯ\r\n(พุทธศาสนสุภาษิด) รมุมปทฏฐกกา\r\nCommentary and Morale\r\nA person should be in a hurry to persevere in goodness.\r\nShould prohibit the mind from evil.\r\nBecause when a person does good deeds too late.\r\nThen our mind will rejoice in evil,\r\n(Buddhasasana Proverb) Dhammapadatthakatha', 'จิรพัฒน์ มีด้วง', '162331429617042.jpg', '2021-06-10 08:42:39'),
(57, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nคนใดที่มองเห็นคุณค่าในตัวเรา นั่นคือคนที่ควรอยู่ในสายตาเรา\r\nคนใดที่คอยห่วงใยเราทุกเวลา นั่นคือคนที่เราต้องคอยห่วงใย\r\nคนใดที่มีความจริงใจให้เรา นั่นคือคนที่เราควรรักษาไว้\r\nคนใดที่อยู่เคียงข้างในยามยากไร้ นั่นคือคนที่เราควรดูแล ฯ\r\nพระมหาบุญส่ง เรืองวิเศษ\r\nCommentary and Morale\r\nAnyone who sees value in us.\r\nThat is the person who should be in our eyes.\r\nAnyone who cares for us all the time.\r\nThat is the person that we have to keep concerned.\r\nAnyone who has sincerity to us.\r\nThat is the person that we should keep.\r\nAnyone who is by the side in times of poor.\r\nThat is the person that we should take care of.\r\nPhra Maha Boonsong Ruangwiset', 'จิรพัฒน์ มีด้วง', '162331474431569.jpg', '2021-06-10 08:45:43'),
(58, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nหลวงปูมั่น ภูริทตฺโต ได้สอนไว้ว่...\r\nบุญนั้น ไม่ได้เกิดแต่การบริจาคทานอย่างเดียว\r\nบุญ เกิดจากการรักษาศีล, บุญ เกิดจากการภาวนา\r\nโดยเฉพาะอย่างยิ่ง \"การเจริญวิปัสสนาภาวนา\"\r\nเป็นบุญที่สามารถทำได้ โดยไม่เลือกบุคคล ฯ\r\nCommentary and Morale\r\nLuangpu Mun Phuridatto taught that...\r\n\"That merit\" is not only a donation alms.\r\nMerit happens from keeping precepts,\r\nMerit happens from meditation, especially \"Vipassana\"\r\nIt is the merit that can be done without selecting a person.', 'จิรพัฒน์ มีด้วง', '162331486841606.jpg', '2021-06-10 08:47:48'),
(59, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\n\"บุคคลผู้น่านับถือ\" ไม่ได้ขึ้นอยู่กับอายุหรือตำแหน่ง\r\nแต่ขึ้นอยู่กับ \"ความคิด คำพูด และการกระทำ\"\r\nที่เต็มเปี่ยมไปด้วยความจริงใจ ฯ\r\nCommentary and Morale\r\n\"Respectable person\r\n\" does not depend on age or position.\r\nBut it depends on your thoughts, speeches, and actions\r\nfull of sincerity.', 'จิรพัฒน์ มีด้วง', '162331499910203.jpg', '2021-06-10 08:49:58'),
(60, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nบัณฑิตทั้งหลายสอนไว้ว่า...\r\nเราจะชนะกายได้ เราต้องออกกำลัง\r\nเราจะชนะโรคได้ เราต้องรู้จักกิน\r\nเราจะชนะคนได้ เราต้องเป็นผู้ให้\r\nเราจะชนะมิตรได้ เราต้องช่วยเหลือกัน\r\nเราจะชนะศัตรูได้ เราต้องให้อภัย\r\nเราจะชนะกิเลสได้ เราต้องปฏิบัติธรรม ฯ\r\nCommentary and Morale\r\nAll graduates teach that...\r\nWe can win the body. We have to exercise.\r\nWe can win the disease. We must know how to eat.\r\nWe can win people. We must be the giver.\r\nWe can win friends. We have to help each other.\r\nWe can defeat the enemy. We have to forgive.\r\nWe can win the passion. We must practice the Dharma.', 'จิรพัฒน์ มีด้วง', '162331520113144.jpg', '2021-06-10 08:53:20'),
(61, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nบัณฑิตสอนไว้ว่า..\r\nไม่ว่าจะเกิดเรื่องราวใดๆ ขึ้น ในชีวิตเรา\r\nมันเป็นเรื่องที่จะต้องเกิด ไม่ว่าเรื่องนั้นจะดีหรือร้าย\r\nไม่มีเรื่องใดที่บังอิญ เพราะเราก็เคะทำอย่างนี้กับเขามาก่อนเมื่อดีตขาติๆ\r\nCommentary and Morale\r\nThe graduates teach that...\r\nNo matter what story happens in our life.\r\nIt is story that must happen. whether it is good or bad.\r\nNothing is a coincidence,\r\nbecause we have done this with him before in the past.', 'จิรพัฒน์ มีด้วง', '162331536096328.jpg', '2021-06-10 08:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_des` varchar(100) NOT NULL,
  `product_price` varchar(6) NOT NULL,
  `product_qty` varchar(5) NOT NULL,
  `product_cover` text NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `product_type`, `product_des`, `product_price`, `product_qty`, `product_cover`, `date_create`) VALUES
(3, 'พระพุทธศรีสวรรค์ ๙ นิ้ว ปิดทอง', 'พระเครื่อง', 'พระพุทธศรีสวรรค์ ๙ นิ้ว ปิดทอง', '10999', '30', '1623243315378905157216.jpg,1623243315120774524012.jpg', '2021-06-09 13:13:50'),
(4, 'พระบูชาหลวงพ่อศรีสวรรค์ หน้าตัก ๕ นิ้ว', 'พระเครื่อง', 'พระบูชาหลวงพ่อศรีสวรรค์ หน้าตัก ๕ นิ้ววัดนครสวรรค์พระอารามหลวง', '2999', '50', '1623243574453451159814.jpg,1623243574158798728500.jpg', '2021-06-09 13:14:42'),
(5, 'พระบูชา หลวงพ่อพระศรีสวรรค์ (ตั้งหน้ารถรุ่นแรก)', 'พระเครื่อง', 'พระบูชา หลวงพ่อพระศรีสวรรค์ (ตั้งหน้ารถรุ่นแรก) สวยดีกลั่ยทอง ประมาณ 2x3นิ้ว', '299', '19', '162324389198227662185.png,1623243891700914264664.png', '2021-06-13 08:41:37'),
(6, 'เหรียญหลวงพ่อศรีสวรรค์หลวงพ่อสองพี่น้อง', 'พระเครื่อง', 'เหรียญหลวงพ่อศรีสวรรค์ หลังหลวงพ่อสองพี่น้อง สร้างปี 2551 ตอกโค๊ต BOX 9', '299', '30', '1623244866244260042044.jpg,1623244866789383154304.jpg', '2021-06-13 08:56:21'),
(7, 'เหรียญหลวงพ่อศรีสวรรค์ รุ่นหยดน้ำ', 'พระเครื่อง', 'เหรียญหยดน้ำ หลวงพ่อศรีสวรรค์ วัดนครสวรรค์ สร้างปี 2539', '120', '39', '1623245235676929467489.jpg,1623245235509447168142.jpg,1623245235539549404000.jpg,1623245235727738741574.jpg', '2021-06-14 10:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `save_basket`
--

CREATE TABLE `save_basket` (
  `id_save_basket` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_basket` varchar(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `total_prod` varchar(20) NOT NULL,
  `name_cus` varchar(100) NOT NULL DEFAULT '-' COMMENT 'ชื่อลูกค้าสำหรับแอดมิน',
  `phone_number` varchar(100) NOT NULL,
  `address_for_send` varchar(100) NOT NULL,
  `slip_img` varchar(150) NOT NULL DEFAULT 'wait',
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_pay` varchar(50) NOT NULL DEFAULT 'not_pay',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `save_basket`
--

INSERT INTO `save_basket` (`id_save_basket`, `id_user`, `id_basket`, `id_product`, `total_prod`, `name_cus`, `phone_number`, `address_for_send`, `slip_img`, `date_time`, `status_pay`, `date`) VALUES
(1, 1, '1', '1', '100', 'นาย -', '-', '-', 'wait', '2021-06-09 12:45:12', 'approved', '2021-06-09 19:45:12'),
(2, 18, '2', '7', '120', '-', '0845025236', '-', '16232458079298.png', '2021-06-09 13:37:32', 'approved', '2021-06-09 20:36:30'),
(3, 3, '5, 6', '6, 5', '598', '-', '0845010652', '-', 'wait', '2021-06-13 08:56:21', 'cancel_order', '2021-06-13 15:41:37'),
(4, 18, '9', '7', '240', '-', '0845025236', '-', 'wait', '2021-06-14 10:54:54', 'cancel_order', '2021-06-14 17:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(10) NOT NULL,
  `name_bank` text NOT NULL,
  `name_account` text NOT NULL,
  `number_bank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `name_bank`, `name_account`, `number_bank`) VALUES
(6, 'scb', 'JirapatTest1', '123456789101112'),
(9, 'KTB', 'JirapatTest2', '121110987654321');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `title_name` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `profile_img` varchar(50) NOT NULL,
  `register_status` varchar(10) NOT NULL,
  `user_level` text NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตรางข้อมูลผู้ใช้' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `title_name`, `first_name`, `last_name`, `email`, `phone_number`, `profile_img`, `register_status`, `user_level`, `date_register`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'จิรพัฒน์', 'มีด้วง', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'admin', '2020-11-09 07:25:11'),
(2, 'manager', '81dc9bdb52d04dc20036dbd8313ed055', 'Mr', 'jirapat', 'Meedoung', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'manager', '2020-11-09 07:29:00'),
(3, 'usertest', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'บิล', 'จิรพัฒน์', 'q3.hahaha@gmail.com', '0845010652', '', 'pass', 'people', '2020-11-09 07:29:00'),
(17, 'usertest2', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'Jirapat', 'Meedoung', 'jirapat@meedoung.com', '0845555555', '1620021772186.jpg', 'pass', 'people', '2021-05-03 06:02:52'),
(18, 'zxc', '45c9a6d4065a71dbf21480e830c44d9c', 'นาย', 'Ji', 'Rapat', 'q3.hahaha@gmail.com', '0845025236', '1622954523156.jpg', 'pass', 'people', '2021-06-06 04:42:02'),
(19, 'a1', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'a1', 'ทดลอง', 'a1@gmail.com', '0845010652', '-', 'pass', 'people', '2021-06-10 08:30:05'),
(20, 'super@dmin', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'แอดมิน', 'สูงสุด', 'super@dmin.com', '0845010652', '-', 'pass', 'super@dmin', '2021-06-12 14:51:16'),
(21, 'แอดมิน', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'จิรพัฒน์', 'มีด้วง', 'q3.hahaha@gmail.com', '0999999999', '-', 'pass', 'admin', '2021-06-14 10:52:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `save_basket`
--
ALTER TABLE `save_basket`
  ADD PRIMARY KEY (`id_save_basket`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_basket` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `save_basket`
--
ALTER TABLE `save_basket`
  MODIFY `id_save_basket` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `save_basket`
--
ALTER TABLE `save_basket`
  ADD CONSTRAINT `save_basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
