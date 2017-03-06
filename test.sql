/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-06 15:11:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for entradas
-- ----------------------------
DROP TABLE IF EXISTS `entradas`;
CREATE TABLE `entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evento_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of entradas
-- ----------------------------

-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `tipo_cupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of eventos
-- ----------------------------

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrada_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tickets
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_cupo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_cupo`;
CREATE TABLE `tipo_cupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_cupo
-- ----------------------------
INSERT INTO `tipo_cupo` VALUES ('1', 'Limitado');
INSERT INTO `tipo_cupo` VALUES ('2', 'Ilimitado');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `clasification_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
