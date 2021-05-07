/*
 Navicat Premium Data Transfer

 Source Server         : Database MSQL
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : sacred_object

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 07/05/2021 15:17:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for basket
-- ----------------------------
DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket`  (
  `id_basket` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `cover_basket` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รูป',
  `b_product_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อสินค้าที่เลือก',
  `b_product_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ราคาสินค้า/ชิ้น',
  `b_product_qty` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'จำนวนสินค้า',
  `b_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ราคา',
  `status_basket` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_basket`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  INDEX `id_product`(`id_product`) USING BTREE,
  CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of basket
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `news_title` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `news_summary` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `news_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `news_author` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `news_cover` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_create` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (29, 'หัวข้อข่าวที่ 1 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 1 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 1\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Lasgtin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755932191200.jpg3', '2021-04-05 01:02:00');
INSERT INTO `news` VALUES (30, 'หัวข้อข่าวที่ 2 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 2 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 2\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755966254371.jpg2', '2021-04-05 01:07:42');
INSERT INTO `news` VALUES (31, 'หัวข้อข่าวที่ 3 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 3', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 3\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755969025363.jpg', '2021-04-05 01:08:10');
INSERT INTO `news` VALUES (32, 'หัวข้อข่าวที่ 4 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 4', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 4\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '160641333298341.png', '2020-11-27 00:55:32');
INSERT INTO `news` VALUES (33, 'หัวข้อข่าวที่ 5 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 5', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 5\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '16064133524909.png', '2020-11-27 00:55:52');
INSERT INTO `news` VALUES (34, 'หัวข้อข่าวที่ 6 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 6 ', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 6\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '16175597539915.jpg', '2021-04-05 01:09:13');
INSERT INTO `news` VALUES (35, 'หัวข้อข่าวที่ 7 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 7', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 7\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755972665230.jpg2', '2021-04-05 01:08:45');
INSERT INTO `news` VALUES (36, 'หัวข้อข่าวที่ 8 ทดสอบ', 'สรุปหัวข้อข่าว ที่ 8', 'รายละเอียดข่าวประชาสัมพันธ์ ที่ 8\r\n*ข้อมูล Fake \r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.1.5.6', 'จิรพัฒน์ มีด้วง', '161755935184001.jpg3', '2021-04-05 01:02:30');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_des` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_price` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_qty` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_cover` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_create` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_product`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (21, 'พระเครื่องเมืองกำแพง', 'พระเครื่อง', 'ของดีเมืองกำแพงเพชร', '500', '0', '161751874186045.png', '2021-05-04 18:48:32');
INSERT INTO `product` VALUES (22, 'พระเครื่องเมืองนครสวรรค์', 'พระเครื่อง', 'ของดีเมืองนครสวรรค์', '300', '0', '161751878125269.png', '2021-05-04 19:17:29');
INSERT INTO `product` VALUES (23, 'พระเครื่องเมืองพิจิตร', 'พระเครื่อง', 'ของดีเมืองพิจิตร', '900', '9', '161752317560434.png', '2021-05-05 11:37:00');
INSERT INTO `product` VALUES (24, 'พระเครื่องเมืองสุโขทัย', 'พระเครื่อง', 'ของดีเมืองสุโขทัย', '1900', '14', '161752328733180.png', '2021-05-05 11:37:00');
INSERT INTO `product` VALUES (25, 'พระเครื่องเมืองอยุธยา', 'พระเครื่อง', 'ของดีเมืองอยุธยา', '900', '17', '161752334564007.png', '2021-05-07 14:41:38');
INSERT INTO `product` VALUES (26, 'พระเครื่องเมืองเชียงใหม่', 'พระเครื่อง', 'ของดีเมืองเชียงใหม่', '1800', '19', '16175237994972.png', '2021-05-06 16:21:03');

-- ----------------------------
-- Table structure for save_basket
-- ----------------------------
DROP TABLE IF EXISTS `save_basket`;
CREATE TABLE `save_basket`  (
  `id_save_basket` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_basket` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_product` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `total_prod` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address_for_send` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slip_img` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'wait',
  `date_time` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `status_pay` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'not_pay',
  PRIMARY KEY (`id_save_basket`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `save_basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of save_basket
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profile_img` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `register_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_level` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_register` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'ตรางข้อมูลผู้ใช้' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'จิรพัฒน์', 'มีด้วง', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'a', '2020-11-09 14:25:11');
INSERT INTO `user` VALUES (2, 'manager', '81dc9bdb52d04dc20036dbd8313ed055', 'Mr', 'jirapat', 'Meedoung', 'jirapat.m@nsru.ac.th', '0845010652', '', 'pass', 'ma', '2020-11-09 14:29:00');
INSERT INTO `user` VALUES (3, 'usertest', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'บิล', 'จิรพัฒน์', 'q3.hahaha@gmail.com', '0845010652', '', 'pass', 'p', '2020-11-09 14:29:00');
INSERT INTO `user` VALUES (17, 'usertest2', '81dc9bdb52d04dc20036dbd8313ed055', 'นาย', 'Jirapat', 'Meedoung', 'jirapat@meedoung.com', '0845555555', '1620021772186.jpg', 'pass', 'p', '2021-05-03 13:02:52');

SET FOREIGN_KEY_CHECKS = 1;
