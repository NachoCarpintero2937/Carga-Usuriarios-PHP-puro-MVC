/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ntlife

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-10-28 02:32:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_estado` (`estado`),
  KEY `fk_usuarios_tipo` (`tipo`),
  CONSTRAINT `fk_usuarios_estado` FOREIGN KEY (`estado`) REFERENCES `usuarios_estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_tipo` FOREIGN KEY (`tipo`) REFERENCES `usuarios_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Natural life', 'NT', '1fea6e857ba6777f25bf7faa1ecc4a62', '1', '1', '2020-10-26 22:08:23', 'test@test.com');
INSERT INTO `usuarios` VALUES ('2', 'Testing', 'Test', '827ccb0eea8a706c4c34a16891f84e7b', '2', '2', '2020-10-28 00:05:19', 'test@test.com');
INSERT INTO `usuarios` VALUES ('10', 'Ultimo Test', 'Nacho', '827ccb0eea8a706c4c34a16891f84e7b', '1', '2', '2020-10-28 02:18:50', 'admin@admin.com');

-- ----------------------------
-- Table structure for usuarios_estado
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_estado`;
CREATE TABLE `usuarios_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios_estado
-- ----------------------------
INSERT INTO `usuarios_estado` VALUES ('1', 'HABLITADO');
INSERT INTO `usuarios_estado` VALUES ('2', 'DESHABILITADO');
INSERT INTO `usuarios_estado` VALUES ('3', 'ELIMINADO');

-- ----------------------------
-- Table structure for usuarios_tipo
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_tipo`;
CREATE TABLE `usuarios_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios_tipo
-- ----------------------------
INSERT INTO `usuarios_tipo` VALUES ('1', 'ADMINISTRADOR');
INSERT INTO `usuarios_tipo` VALUES ('2', 'CLIENTE');
