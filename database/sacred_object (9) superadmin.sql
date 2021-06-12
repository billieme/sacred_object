/*
 Navicat Premium Data Transfer

 Source Server         : nt4cat
 Source Server Type    : MariaDB
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : sacred_object

 Target Server Type    : MariaDB
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 13/06/2021 00:27:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for basket
-- ----------------------------
DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket`  (
  `id_basket` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `cover_basket` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รูป',
  `b_product_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อสินค้าที่เลือก',
  `b_product_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ราคาสินค้า/ชิ้น',
  `b_product_qty` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'จำนวนสินค้า',
  `b_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ราคา',
  `status_basket` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_basket`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of basket
-- ----------------------------
INSERT INTO `basket` VALUES (1, 1, 1, '1623242291336290466818.png,1623242291403717931707.png', 'ทดสอบ ', '100', '1', '100', 'order');
INSERT INTO `basket` VALUES (2, 18, 7, '1623245235676929467489.jpg,1623245235509447168142.jpg,1623245235539549404000.jpg,1623245235727738741574.jpg', 'เหรียญหลวงพ่อศรีสวรรค์ รุ่นหยดน้ำ', '120', '1', '120', 'order');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `news_summary` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `news_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `news_author` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `news_cover` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_create` timestamp(0) NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (56, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nบุคคลพึงรีบขวนขวายในความดี พึงห้ามจิตเสียจากความชั่ว\r\nเพราะว่า เมื่อบุคคลทำความดีข้ไป ใจจะยินดีในความชั่ว ฯ\r\n(พุทธศาสนสุภาษิด) รมุมปทฏฐกกา\r\nCommentary and Morale\r\nA person should be in a hurry to persevere in goodness.\r\nShould prohibit the mind from evil.\r\nBecause when a person does good deeds too late.\r\nThen our mind will rejoice in evil,\r\n(Buddhasasana Proverb) Dhammapadatthakatha', 'จิรพัฒน์ มีด้วง', '162331429617042.jpg', '2021-06-10 15:42:39');
INSERT INTO `news` VALUES (57, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nคนใดที่มองเห็นคุณค่าในตัวเรา นั่นคือคนที่ควรอยู่ในสายตาเรา\r\nคนใดที่คอยห่วงใยเราทุกเวลา นั่นคือคนที่เราต้องคอยห่วงใย\r\nคนใดที่มีความจริงใจให้เรา นั่นคือคนที่เราควรรักษาไว้\r\nคนใดที่อยู่เคียงข้างในยามยากไร้ นั่นคือคนที่เราควรดูแล ฯ\r\nพระมหาบุญส่ง เรืองวิเศษ\r\nCommentary and Morale\r\nAnyone who sees value in us.\r\nThat is the person who should be in our eyes.\r\nAnyone who cares for us all the time.\r\nThat is the person that we have to keep concerned.\r\nAnyone who has sincerity to us.\r\nThat is the person that we should keep.\r\nAnyone who is by the side in times of poor.\r\nThat is the person that we should take care of.\r\nPhra Maha Boonsong Ruangwiset', 'จิรพัฒน์ มีด้วง', '162331474431569.jpg', '2021-06-10 15:45:43');
INSERT INTO `news` VALUES (58, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nหลวงปูมั่น ภูริทตฺโต ได้สอนไว้ว่...\r\nบุญนั้น ไม่ได้เกิดแต่การบริจาคทานอย่างเดียว\r\nบุญ เกิดจากการรักษาศีล, บุญ เกิดจากการภาวนา\r\nโดยเฉพาะอย่างยิ่ง \"การเจริญวิปัสสนาภาวนา\"\r\nเป็นบุญที่สามารถทำได้ โดยไม่เลือกบุคคล ฯ\r\nCommentary and Morale\r\nLuangpu Mun Phuridatto taught that...\r\n\"That merit\" is not only a donation alms.\r\nMerit happens from keeping precepts,\r\nMerit happens from meditation, especially \"Vipassana\"\r\nIt is the merit that can be done without selecting a person.', 'จิรพัฒน์ มีด้วง', '162331486841606.jpg', '2021-06-10 15:47:48');
INSERT INTO `news` VALUES (59, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\n\"บุคคลผู้น่านับถือ\" ไม่ได้ขึ้นอยู่กับอายุหรือตำแหน่ง\r\nแต่ขึ้นอยู่กับ \"ความคิด คำพูด และการกระทำ\"\r\nที่เต็มเปี่ยมไปด้วยความจริงใจ ฯ\r\nCommentary and Morale\r\n\"Respectable person\r\n\" does not depend on age or position.\r\nBut it depends on your thoughts, speeches, and actions\r\nfull of sincerity.', 'จิรพัฒน์ มีด้วง', '162331499910203.jpg', '2021-06-10 15:49:58');
INSERT INTO `news` VALUES (60, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nบัณฑิตทั้งหลายสอนไว้ว่า...\r\nเราจะชนะกายได้ เราต้องออกกำลัง\r\nเราจะชนะโรคได้ เราต้องรู้จักกิน\r\nเราจะชนะคนได้ เราต้องเป็นผู้ให้\r\nเราจะชนะมิตรได้ เราต้องช่วยเหลือกัน\r\nเราจะชนะศัตรูได้ เราต้องให้อภัย\r\nเราจะชนะกิเลสได้ เราต้องปฏิบัติธรรม ฯ\r\nCommentary and Morale\r\nAll graduates teach that...\r\nWe can win the body. We have to exercise.\r\nWe can win the disease. We must know how to eat.\r\nWe can win people. We must be the giver.\r\nWe can win friends. We have to help each other.\r\nWe can defeat the enemy. We have to forgive.\r\nWe can win the passion. We must practice the Dharma.', 'จิรพัฒน์ มีด้วง', '162331520113144.jpg', '2021-06-10 15:53:20');
INSERT INTO `news` VALUES (61, 'ข้อคิดคติธรรม', 'ข้อคิดคติธรรม โดย เจ้าอาวาสวัฒนครสวรรค์ พระอารามหลวง', 'ข้อคิดคติธรรม\r\nบัณฑิตสอนไว้ว่า..\r\nไม่ว่าจะเกิดเรื่องราวใดๆ ขึ้น ในชีวิตเรา\r\nมันเป็นเรื่องที่จะต้องเกิด ไม่ว่าเรื่องนั้นจะดีหรือร้าย\r\nไม่มีเรื่องใดที่บังอิญ เพราะเราก็เคะทำอย่างนี้กับเขามาก่อนเมื่อดีตขาติๆ\r\nCommentary and Morale\r\nThe graduates teach that...\r\nNo matter what story happens in our life.\r\nIt is story that must happen. whether it is good or bad.\r\nNothing is a coincidence,\r\nbecause we have done this with him before in the past.', 'จิรพัฒน์ มีด้วง', '162331536096328.jpg', '2021-06-10 15:56:00');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id_product` int(100) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_des` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_price` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_qty` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_cover` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_create` timestamp(0) NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_product`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (3, 'พระพุทธศรีสวรรค์ ๙ นิ้ว ปิดทอง', 'พระเครื่อง', 'พระพุทธศรีสวรรค์ ๙ นิ้ว ปิดทอง', '10999', '30', '1623243315378905157216.jpg,1623243315120774524012.jpg', '2021-06-09 20:13:50');
INSERT INTO `product` VALUES (4, 'พระบูชาหลวงพ่อศรีสวรรค์ หน้าตัก ๕ นิ้ว', 'พระเครื่อง', 'พระบูชาหลวงพ่อศรีสวรรค์ หน้าตัก ๕ นิ้ววัดนครสวรรค์พระอารามหลวง', '2999', '50', '1623243574453451159814.jpg,1623243574158798728500.jpg', '2021-06-09 20:14:42');
INSERT INTO `product` VALUES (5, 'พระบูชา หลวงพ่อพระศรีสวรรค์ (ตั้งหน้ารถรุ่นแรก)', 'พระเครื่อง', 'พระบูชา หลวงพ่อพระศรีสวรรค์ (ตั้งหน้ารถรุ่นแรก) สวยดีกลั่ยทอง ประมาณ 2x3นิ้ว', '299', '20', '162324389198227662185.png,1623243891700914264664.png', '2021-06-09 20:14:20');
INSERT INTO `product` VALUES (6, 'เหรียญหลวงพ่อศรีสวรรค์หลวงพ่อสองพี่น้อง', 'พระเครื่อง', 'เหรียญหลวงพ่อศรีสวรรค์ หลังหลวงพ่อสองพี่น้อง สร้างปี 2551 ตอกโค๊ต BOX 9', '299', '30', '1623244866244260042044.jpg,1623244866789383154304.jpg', '2021-06-09 20:21:05');
INSERT INTO `product` VALUES (7, 'เหรียญหลวงพ่อศรีสวรรค์ รุ่นหยดน้ำ', 'พระเครื่อง', 'เหรียญหยดน้ำ หลวงพ่อศรีสวรรค์ วัดนครสวรรค์ สร้างปี 2539', '120', '39', '1623245235676929467489.jpg,1623245235509447168142.jpg,1623245235539549404000.jpg,1623245235727738741574.jpg', '2021-06-09 20:36:30');

-- ----------------------------
-- Table structure for save_basket
-- ----------------------------
DROP TABLE IF EXISTS `save_basket`;
CREATE TABLE `save_basket`  (
  `id_save_basket` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_basket` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_product` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `total_prod` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name_cus` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '-' COMMENT 'ชื่อลูกค้าสำหรับแอดมิน',
  `phone_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address_for_send` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slip_img` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'wait',
  `date_time` timestamp(0) NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `status_pay` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'not_pay',
  `date` datetime(0) NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_save_basket`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `save_basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of save_basket
-- ----------------------------
INSERT INTO `save_basket` VALUES (1, 1, '1', '1', '100', 'นาย -', '-', '-', 'wait', '2021-06-09 19:45:12', 'approved', '2021-06-09 19:45:12');
INSERT INTO `save_basket` VALUES (2, 18, '2', '7', '120', '-', '0845025236', '-', '16232458079298.png', '2021-06-09 20:37:32', 'approved', '2021-06-09 20:36:30');

-- ----------------------------
-- Table structure for transfer
-- ----------------------------
DROP TABLE IF EXISTS `transfer`;
CREATE TABLE `transfer`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_bank` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name_account` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `number_bank` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transfer
-- ----------------------------
INSERT INTO `transfer` VALUES (6, 'scb', 'JirapatTest1', '123456789101112');
INSERT INTO `transfer` VALUES (9, 'KTB', 'JirapatTest2', '121110987654321');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profile_img` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `register_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_level` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_register` timestamp(0) NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'ตรางข้อมูลผู้ใช้' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'จิรพัฒน์', 'มีด้วง', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'a', '2020-11-09 14:25:11');
INSERT INTO `user` VALUES (2, 'manager', '81dc9bdb52d04dc20036dbd8313ed055', 'Mr', 'jirapat', 'Meedoung', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'ma', '2020-11-09 14:29:00');
INSERT INTO `user` VALUES (3, 'usertest', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'บิล', 'จิรพัฒน์', 'q3.hahaha@gmail.com', '0845010652', '', 'pass', 'p', '2020-11-09 14:29:00');
INSERT INTO `user` VALUES (17, 'usertest2', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'Jirapat', 'Meedoung', 'jirapat@meedoung.com', '0845555555', '1620021772186.jpg', 'pass', 'p', '2021-05-03 13:02:52');
INSERT INTO `user` VALUES (18, 'zxc', '45c9a6d4065a71dbf21480e830c44d9c', 'นาย', 'Ji', 'Rapat', 'q3.hahaha@gmail.com', '0845025236', '1622954523156.jpg', 'pass', 'p', '2021-06-06 11:42:02');
INSERT INTO `user` VALUES (19, 'a1', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'a1', 'ทดลอง', 'a1@gmail.com', '0845010652', '-', 'pass', 'p', '2021-06-10 15:30:05');
INSERT INTO `user` VALUES (20, 'super@dmin', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'แอดมิน', 'สูงสุด', 'super@dmin.com', '0845010652', '-', 'pass', 'sp_@', '2021-06-12 21:51:16');

SET FOREIGN_KEY_CHECKS = 1;
