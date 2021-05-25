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

 Date: 23/05/2021 16:53:54
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
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
  `name_cus` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '-',
  `phone_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address_for_send` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slip_img` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'wait',
  `date_time` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `status_pay` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'not_pay',
  PRIMARY KEY (`id_save_basket`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  CONSTRAINT `save_basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'ตรางข้อมูลผู้ใช้' ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
