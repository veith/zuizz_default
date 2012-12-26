/*
 Navicat MySQL Data Transfer

 Source Server         : local.zuizz.com
 Source Server Version : 50137
 Source Host           : localhost
 Source Database       : zuizz_init

 Target Server Version : 50137
 File Encoding         : utf-8

 Date: 12/23/2012 19:37:08 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `feature_type` int(11) unsigned NOT NULL DEFAULT '0',
  `feature_id` int(11) unsigned NOT NULL DEFAULT '0',
  `label` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `c_date` int(11) unsigned NOT NULL,
  `c_user_id` int(11) unsigned NOT NULL,
  `priority` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `line` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `main_index` (`feature_type`),
  KEY `date` (`c_date`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `log`
-- ----------------------------
BEGIN;
INSERT INTO `log` VALUES ('8', '100', '2', '403 Access', 'access on forbiden page', '1356286088', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('9', '100', '2', '403 Access', 'access on forbiden page', '1356286088', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('10', '100', '2', '403 Access', 'access on forbiden page', '1356286088', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('11', '100', '2', '403 Access', 'access on forbiden page', '1356286088', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('12', '100', '2', '403 Access', 'access on forbiden page', '1356286094', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('13', '100', '2', '403 Access', 'access on forbiden page', '1356286094', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('14', '100', '2', '403 Access', 'access on forbiden page', '1356286095', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('15', '100', '2', '403 Access', 'access on forbiden page', '1356286095', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('16', '100', '2', '403 Access', 'access on forbiden page', '1356286095', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('17', '100', '2', '403 Access', 'access on forbiden page', '1356286095', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('18', '100', '2', '403 Access', 'access on forbiden page', '1356286095', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('19', '100', '2', '403 Access', 'access on forbiden page', '1356286095', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('20', '100', '2', '403 Access', 'access on forbiden page', '1356286095', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('21', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('22', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('23', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('24', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('25', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('26', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('27', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('28', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('29', '100', '2', '403 Access', 'access on forbiden page', '1356286189', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('30', '100', '3', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('31', '100', '2', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('32', '100', '2', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('33', '100', '2', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('34', '100', '2', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('35', '100', '2', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('36', '100', '2', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('37', '100', '2', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('38', '100', '2', '403 Access', 'access on forbiden page', '1356286200', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('39', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('40', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('41', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('42', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('43', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('44', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('45', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('46', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('47', '100', '2', '403 Access', 'access on forbiden page', '1356286287', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('48', '100', '3', '403 Access', 'access on forbiden page', '1356286986', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('49', '100', '2', '403 Access', 'access on forbiden page', '1356286986', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('50', '100', '2', '403 Access', 'access on forbiden page', '1356286986', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('51', '100', '2', '403 Access', 'access on forbiden page', '1356286986', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('52', '100', '2', '403 Access', 'access on forbiden page', '1356286987', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('53', '100', '2', '403 Access', 'access on forbiden page', '1356286987', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('54', '100', '2', '403 Access', 'access on forbiden page', '1356286987', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('55', '100', '2', '403 Access', 'access on forbiden page', '1356286987', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('56', '100', '2', '403 Access', 'access on forbiden page', '1356286987', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('57', '100', '2', '403 Access', 'access on forbiden page', '1356287027', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('58', '100', '2', '403 Access', 'access on forbiden page', '1356287027', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('59', '100', '2', '403 Access', 'access on forbiden page', '1356287027', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('60', '100', '2', '403 Access', 'access on forbiden page', '1356287027', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('61', '100', '2', '403 Access', 'access on forbiden page', '1356287027', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('62', '100', '2', '403 Access', 'access on forbiden page', '1356287027', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('63', '100', '2', '403 Access', 'access on forbiden page', '1356287027', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('64', '100', '2', '403 Access', 'access on forbiden page', '1356287028', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('65', '100', '2', '403 Access', 'access on forbiden page', '1356287028', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('66', '100', '2', '403 Access', 'access on forbiden page', '1356287061', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('67', '100', '2', '403 Access', 'access on forbiden page', '1356287062', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('68', '100', '2', '403 Access', 'access on forbiden page', '1356287062', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('69', '100', '2', '403 Access', 'access on forbiden page', '1356287062', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('70', '100', '2', '403 Access', 'access on forbiden page', '1356287062', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('71', '100', '2', '403 Access', 'access on forbiden page', '1356287062', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('72', '100', '2', '403 Access', 'access on forbiden page', '1356287062', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('73', '100', '2', '403 Access', 'access on forbiden page', '1356287062', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('74', '100', '2', '403 Access', 'access on forbiden page', '1356287062', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('75', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('76', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('77', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('78', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('79', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('80', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('81', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('82', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('83', '100', '2', '403 Access', 'access on forbiden page', '1356287063', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('84', '100', '3', '403 Access', 'access on forbiden page', '1356287068', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('85', '100', '2', '403 Access', 'access on forbiden page', '1356287069', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('86', '100', '2', '403 Access', 'access on forbiden page', '1356287069', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('87', '100', '2', '403 Access', 'access on forbiden page', '1356287069', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('88', '100', '2', '403 Access', 'access on forbiden page', '1356287069', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('89', '100', '2', '403 Access', 'access on forbiden page', '1356287069', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('90', '100', '2', '403 Access', 'access on forbiden page', '1356287069', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('91', '100', '2', '403 Access', 'access on forbiden page', '1356287069', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('92', '100', '2', '403 Access', 'access on forbiden page', '1356287069', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('93', '100', '3', '403 Access', 'access on forbiden page', '1356287072', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('94', '100', '3', '403 Access', 'access on forbiden page', '1356287323', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('95', '100', '2', '403 Access', 'access on forbiden page', '1356287323', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('96', '100', '2', '403 Access', 'access on forbiden page', '1356287323', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('97', '100', '2', '403 Access', 'access on forbiden page', '1356287323', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('98', '100', '2', '403 Access', 'access on forbiden page', '1356287323', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('99', '100', '2', '403 Access', 'access on forbiden page', '1356287323', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('100', '100', '2', '403 Access', 'access on forbiden page', '1356287323', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('101', '100', '2', '403 Access', 'access on forbiden page', '1356287323', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('102', '100', '76', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('103', '100', '2', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('104', '100', '2', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('105', '100', '2', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('106', '100', '2', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('107', '100', '2', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('108', '100', '2', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('109', '100', '2', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('110', '100', '2', '403 Access', 'access on forbiden page', '1356287328', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('111', '100', '2', '403 Access', 'access on forbiden page', '1356287388', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('112', '100', '2', '403 Access', 'access on forbiden page', '1356287388', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('113', '100', '2', '403 Access', 'access on forbiden page', '1356287388', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('114', '100', '2', '403 Access', 'access on forbiden page', '1356287388', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('115', '100', '2', '403 Access', 'access on forbiden page', '1356287388', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('116', '100', '2', '403 Access', 'access on forbiden page', '1356287388', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('117', '100', '2', '403 Access', 'access on forbiden page', '1356287389', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('118', '100', '2', '403 Access', 'access on forbiden page', '1356287389', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('119', '100', '2', '403 Access', 'access on forbiden page', '1356287389', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('120', '100', '3', '403 Access', 'access on forbiden page', '1356287391', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('121', '100', '2', '403 Access', 'access on forbiden page', '1356287391', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('122', '100', '2', '403 Access', 'access on forbiden page', '1356287391', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('123', '100', '2', '403 Access', 'access on forbiden page', '1356287391', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('124', '100', '2', '403 Access', 'access on forbiden page', '1356287392', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('125', '100', '2', '403 Access', 'access on forbiden page', '1356287392', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('126', '100', '2', '403 Access', 'access on forbiden page', '1356287392', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('127', '100', '2', '403 Access', 'access on forbiden page', '1356287392', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('128', '100', '2', '403 Access', 'access on forbiden page', '1356287392', '2', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93'), ('129', '100', '76', '403 Access', 'access on forbiden page', '1356287613', '3', '512', '/Users/vzaech/PhpstormProjects/zugit/custory2/public_html/index.php', '93');
COMMIT;

-- ----------------------------
--  Table structure for `org_delegation`
-- ----------------------------
DROP TABLE IF EXISTS `org_delegation`;
CREATE TABLE `org_delegation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `represent_by_user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `represent_by_user_id` (`represent_by_user_id`),
  KEY `org_delegation` (`user_id`),
  KEY `FKorg_delega490490` (`user_id`),
  CONSTRAINT `org_delegation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `org_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `org_functional_role`
-- ----------------------------
DROP TABLE IF EXISTS `org_functional_role`;
CREATE TABLE `org_functional_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `c_date` int(10) unsigned DEFAULT NULL,
  `c_id` int(10) unsigned DEFAULT NULL,
  `m_date` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `org_functional_role`
-- ----------------------------
BEGIN;
INSERT INTO `org_functional_role` VALUES ('1', '1', 'Public', 'Alle Benutzer und Besucher', null, null, null), ('6', '1', 'Administrator', 'Administrator', null, null, null), ('7', '1', 'Developer', 'Developer', null, null, null), ('8', '1', 'User', 'Alle angemeldeten Benutzer', '1331555233', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `org_functional_role_org_tree`
-- ----------------------------
DROP TABLE IF EXISTS `org_functional_role_org_tree`;
CREATE TABLE `org_functional_role_org_tree` (
  `functional_role_id` int(10) unsigned NOT NULL,
  `org_tree_org_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`functional_role_id`,`org_tree_org_id`),
  KEY `FKorg_functi151764` (`functional_role_id`),
  KEY `FKorg_functi497884` (`org_tree_org_id`),
  CONSTRAINT `org_functional_role_org_tree_ibfk_1` FOREIGN KEY (`functional_role_id`) REFERENCES `org_functional_role` (`role_id`),
  CONSTRAINT `org_functional_role_org_tree_ibfk_2` FOREIGN KEY (`org_tree_org_id`) REFERENCES `org_tree` (`org_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `org_permission_org`
-- ----------------------------
DROP TABLE IF EXISTS `org_permission_org`;
CREATE TABLE `org_permission_org` (
  `feature_type` int(10) unsigned NOT NULL,
  `feature_node_id` int(10) NOT NULL,
  `org_id` int(10) unsigned NOT NULL,
  `perm` int(10) DEFAULT NULL,
  `perm_b` int(10) DEFAULT NULL COMMENT '       ',
  `c_date` int(10) DEFAULT NULL,
  `c_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`feature_type`,`feature_node_id`,`org_id`),
  KEY `FKorg_permis741349` (`org_id`),
  CONSTRAINT `org_permission_org_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `org_tree` (`org_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `org_permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `org_permission_role`;
CREATE TABLE `org_permission_role` (
  `feature_type` int(10) NOT NULL DEFAULT '0',
  `feature_node_id` int(10) NOT NULL DEFAULT '0',
  `role_id` int(10) unsigned NOT NULL,
  `perm` int(10) DEFAULT NULL,
  `perm_b` int(10) DEFAULT NULL,
  `c_date` int(10) DEFAULT NULL,
  `c_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`feature_type`,`feature_node_id`,`role_id`),
  KEY `FKorg_permis830910` (`role_id`),
  CONSTRAINT `org_permission_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `org_functional_role` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `org_permission_role`
-- ----------------------------
BEGIN;
INSERT INTO `org_permission_role` VALUES ('100', '1', '8', '1', null, null, null), ('100', '2', '1', '1', null, null, null), ('100', '76', '7', '1', null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `org_permission_user`
-- ----------------------------
DROP TABLE IF EXISTS `org_permission_user`;
CREATE TABLE `org_permission_user` (
  `feature_type` int(10) unsigned NOT NULL DEFAULT '0',
  `feature_node_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0 = grundrecht auf feature',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0 = everyone',
  `perm` int(10) unsigned DEFAULT '0',
  `perm_b` int(10) unsigned NOT NULL DEFAULT '0',
  `c_date` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`feature_type`,`feature_node_id`,`user_id`),
  KEY `org_permission_user` (`user_id`),
  KEY `prinipal_type 0` (`user_id`),
  KEY `feature` (`feature_type`),
  KEY `FKorg_permis345593` (`user_id`),
  CONSTRAINT `org_permission_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `org_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `org_tree`
-- ----------------------------
DROP TABLE IF EXISTS `org_tree`;
CREATE TABLE `org_tree` (
  `org_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `level` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` int(10) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `tree_id` int(10) NOT NULL,
  PRIMARY KEY (`org_id`),
  KEY `org_tree` (`pid`,`level`),
  KEY `nested` (`lft`,`rgt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `org_tree`
-- ----------------------------
BEGIN;
INSERT INTO `org_tree` VALUES ('1', '1', '2', '0', '1', 'Default Org', '1', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `org_user`
-- ----------------------------
DROP TABLE IF EXISTS `org_user`;
CREATE TABLE `org_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact_id` int(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_date` int(10) NOT NULL,
  `org_id` int(10) unsigned NOT NULL COMMENT 'org_node an den der user gebunden wird',
  PRIMARY KEY (`user_id`),
  KEY `org_user` (`name`),
  KEY `contact` (`contact_id`),
  KEY `FKorg_user115311` (`org_id`),
  CONSTRAINT `org_user_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `org_tree` (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `org_user`
-- ----------------------------
BEGIN;
INSERT INTO `org_user` VALUES ('1', 'admin', '0', '0ac1a8844265861ccf9e67619258bbcd', '0', '1'), ('2', 'devel', '398', '054f3f503ae688dd9c75196514a6c538', '0', '1'), ('3', 'everyone', '0', 'noauth', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `org_user_functional_role`
-- ----------------------------
DROP TABLE IF EXISTS `org_user_functional_role`;
CREATE TABLE `org_user_functional_role` (
  `org_user_id` int(10) unsigned NOT NULL,
  `functional_role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`org_user_id`,`functional_role_id`),
  KEY `FKorg_user_f372133` (`org_user_id`),
  KEY `FKorg_user_f268149` (`functional_role_id`),
  CONSTRAINT `org_user_functional_role_ibfk_1` FOREIGN KEY (`functional_role_id`) REFERENCES `org_functional_role` (`role_id`) ON DELETE CASCADE,
  CONSTRAINT `org_user_functional_role_ibfk_2` FOREIGN KEY (`org_user_id`) REFERENCES `org_user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `org_user_functional_role`
-- ----------------------------
BEGIN;
INSERT INTO `org_user_functional_role` VALUES ('2', '7'), ('3', '1');
COMMIT;

-- ----------------------------
--  Table structure for `org_user_setting`
-- ----------------------------
DROP TABLE IF EXISTS `org_user_setting`;
CREATE TABLE `org_user_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `Key` varchar(35) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `org_user_setting` (`user_id`),
  KEY `user` (`user_id`),
  KEY `FKorg_user_s170334` (`user_id`),
  CONSTRAINT `org_user_setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `org_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `pages_tree`
-- ----------------------------
DROP TABLE IF EXISTS `pages_tree`;
CREATE TABLE `pages_tree` (
  `page_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `root` int(10) unsigned NOT NULL,
  `active` int(10) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `route` varchar(255) DEFAULT NULL,
  `page_layout` varchar(255) DEFAULT NULL,
  `page_contents` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`page_id`),
  KEY `nested` (`lft`,`rgt`,`root`),
  KEY `pages_tree` (`lft`,`rgt`,`root`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `pages_tree`
-- ----------------------------
BEGIN;
INSERT INTO `pages_tree` VALUES ('1', '1', '6', '1', '1', '0', '1', 'root', '', null), ('2', '2', '5', '1', '1', '0', '1', 'index.html', 'default.html', 'index.page'), ('3', '3', '4', '1', '1', '0', '0', 'auth.html', 'default.html', 'auth.page'), ('76', '1', '2', '76', '1', '0', '0', 'dev/apidoc.html', 'apidoc.html', 'apidoc.page');
COMMIT;

-- ----------------------------
--  Table structure for `pages_tree_details`
-- ----------------------------
DROP TABLE IF EXISTS `pages_tree_details`;
CREATE TABLE `pages_tree_details` (
  `page_id` int(10) unsigned NOT NULL,
  `lang` varchar(5) NOT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `nav_title` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `display_in_nav` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`page_id`,`lang`),
  KEY `fk_pages_detail` (`page_id`),
  KEY `pages_tree_details` (`page_id`,`lang`),
  CONSTRAINT `fk_pages_detail` FOREIGN KEY (`page_id`) REFERENCES `pages_tree` (`page_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `pages_tree_details`
-- ----------------------------
BEGIN;
INSERT INTO `pages_tree_details` VALUES ('1', 'de', 'root node', 'root node', null, '1'), ('2', 'de', 'Index', 'Index', null, '0'), ('3', 'de', 'Anmelden', 'Anmelden', 'icon-user', '1'), ('76', 'de', 'DEV-APIDOC', 'Apidoc', 'icon-wrench', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
