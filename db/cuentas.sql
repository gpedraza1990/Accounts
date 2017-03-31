/*
Navicat MySQL Data Transfer

Source Server         : estadistica
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : cuentas

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2017-03-30 21:59:48
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `cliente`
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ing` date NOT NULL,
  `balance` float NOT NULL,
  `vendedor` int(10) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `idcliente` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('17', 'adsf', 'asdfasdf', '11', '2016-10-12', '1', '7', '1');
INSERT INTO `cliente` VALUES ('18', 'asdfasdfasdfasdf', 'adsfadf', '3333', '2016-10-27', '1', '7', '1');
INSERT INTO `cliente` VALUES ('19', 'hello', 'adfasdf', '11111111', '2016-10-09', '11111', '7', '1');
INSERT INTO `cliente` VALUES ('20', 'cliente1', 'lejoslejos', '22222', '2016-10-10', '450', '8', '1');

-- ----------------------------
-- Table structure for `documento`
-- ----------------------------
DROP TABLE IF EXISTS `documento`;
CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `secuencia` int(11) NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `origen` tinyint(1) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`iddocumento`),
  UNIQUE KEY `iddocumento` (`iddocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of documento
-- ----------------------------
INSERT INTO `documento` VALUES ('8', 'documento Facturas', '1', '1', '0', '01', '0000-00-00');
INSERT INTO `documento` VALUES ('9', 'viendo fecha de entrada', '123', '0', '0', '01', '2016-10-10');

-- ----------------------------
-- Table structure for `documento_cliente`
-- ----------------------------
DROP TABLE IF EXISTS `documento_cliente`;
CREATE TABLE `documento_cliente` (
  `iddocumento` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valor` float NOT NULL,
  `origen` tinyint(1) NOT NULL,
  `concepto` int(11) NOT NULL,
  `detalle` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  PRIMARY KEY (`iddocumento`,`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of documento_cliente
-- ----------------------------
INSERT INTO `documento_cliente` VALUES ('8', '20', '2', '2016-10-10', '50', '0', '0', '0', '0', '1', '');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estatus` int(5) NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin', '0', '0cc175b9c0f1b6a831c399e269772661', '0');
INSERT INTO `usuario` VALUES ('5', 'gpedraza', '0', '0cc175b9c0f1b6a831c399e269772661', '1');
INSERT INTO `usuario` VALUES ('6', 'registrar', '0', '0cc175b9c0f1b6a831c399e269772661', '2');
INSERT INTO `usuario` VALUES ('7', 'modificarD', '0', '0cc175b9c0f1b6a831c399e269772661', '3');
INSERT INTO `usuario` VALUES ('8', 'eliminarD', '0', '0cc175b9c0f1b6a831c399e269772661', '4');
INSERT INTO `usuario` VALUES ('9', 'modificar', '0', '0cc175b9c0f1b6a831c399e269772661', '5');
INSERT INTO `usuario` VALUES ('10', 'eliminar', '0', '0cc175b9c0f1b6a831c399e269772661', '6');

-- ----------------------------
-- Table structure for `vendedor`
-- ----------------------------
DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE `vendedor` (
  `idvendedor` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idvendedor`),
  UNIQUE KEY `idvendedor` (`idvendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vendedor
-- ----------------------------
INSERT INTO `vendedor` VALUES ('10', 'Fecha', '2016-10-10');
