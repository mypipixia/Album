/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : album

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2018-11-18 17:17:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `actor`
-- ----------------------------
DROP TABLE IF EXISTS `actor`;
CREATE TABLE `actor` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aname` varchar(30) NOT NULL,
  `ainfo` varchar(200) DEFAULT NULL,
  `isrecommend` tinyint(2) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `aband` tinyint(2) DEFAULT NULL,
  `abg` varchar(100) DEFAULT NULL,
  `alogo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of actor
-- ----------------------------
INSERT INTO `actor` VALUES ('4', '东方神起', '华语歌手', '0', '1', '2', null, 'Public/Admin/images/aimg/2018-11-01/5bda553ed11e9.png');
INSERT INTO `actor` VALUES ('28', '防弹少年团(BTS)', '防弹少年团(BTS)', '1', '1', '2', null, null);
INSERT INTO `actor` VALUES ('5', 'Taylor Swift', '欧美歌手', '0', '2', '1', null, 'Public/Admin/images/aimg/2018-10-31/5bd968cb435a6.png');
INSERT INTO `actor` VALUES ('6', '岚', '乐队', '0', '4', '2', null, 'Public/Admin/images/aimg/2018-10-31/5bd9691e4b97b.png');
INSERT INTO `actor` VALUES ('7', '林俊杰', '华语歌手', '0', '1', '0', null, 'Public/Admin/images/aimg/2018-10-31/5bd969498ce4e.png');
INSERT INTO `actor` VALUES ('16', 'Louisa Johnson', 'Louisa Johnson', '1', '2', '0', null, null);
INSERT INTO `actor` VALUES ('17', '陈奕迅', '陈奕迅', '1', '1', '0', null, null);
INSERT INTO `actor` VALUES ('18', '郑俊英', '郑俊英', '1', '1', '0', null, null);
INSERT INTO `actor` VALUES ('25', 'EXO', 'EXO', '1', '3', '2', null, null);
INSERT INTO `actor` VALUES ('26', 'TFBOYS', 'TFBOYS', '1', '1', '2', null, null);
INSERT INTO `actor` VALUES ('21', 'Shawn Mendes', 'Shawn Mendes', '1', '2', '1', null, null);
INSERT INTO `actor` VALUES ('27', '任然', '任然', '1', '1', '0', null, null);
INSERT INTO `actor` VALUES ('29', '脸红的思春期', '脸红的思春期', '1', '4', '2', null, null);

-- ----------------------------
-- Table structure for `address`
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `consignee` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('14', '2', '皮皮虾', '北京市北京市通州区', '1234165');
INSERT INTO `address` VALUES ('18', '2', 'yjj', '北京市北京市东城区', '123165544');
INSERT INTO `address` VALUES ('19', '2', 'yjj', '西藏自治区日喀则市桑珠孜区', '12354');

-- ----------------------------
-- Table structure for `auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` VALUES ('1', '超级管理员', '1', ',45,59,58,57,51,55,50,56,49,48,47,46,54,53,52');
INSERT INTO `auth_group` VALUES ('4', '会员', '1', ',50,49,48,47,46,54,53,52');
INSERT INTO `auth_group` VALUES ('6', '普通管理员', '1', '');

-- ----------------------------
-- Table structure for `auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group_access
-- ----------------------------
INSERT INTO `auth_group_access` VALUES ('1', '1');
INSERT INTO `auth_group_access` VALUES ('3', '4');

-- ----------------------------
-- Table structure for `color`
-- ----------------------------
DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colorname` varchar(20) NOT NULL,
  `ename` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of color
-- ----------------------------
INSERT INTO `color` VALUES ('1', '黑色', '#000000');
INSERT INTO `color` VALUES ('2', '红色', '#ff0000');
INSERT INTO `color` VALUES ('4', '绿色', '#00ff40');
INSERT INTO `color` VALUES ('5', '紫色', '#8000ff');
INSERT INTO `color` VALUES ('6', '屎黄色', '#ffff00');

-- ----------------------------
-- Table structure for `homeuser`
-- ----------------------------
DROP TABLE IF EXISTS `homeuser`;
CREATE TABLE `homeuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `psw` varchar(32) NOT NULL,
  `info` varchar(100) DEFAULT NULL,
  `headimg` varchar(200) DEFAULT NULL,
  `sex` tinyint(2) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of homeuser
-- ----------------------------
INSERT INTO `homeuser` VALUES ('2', '皮皮虾', 'a1f5ea7eb79c9597fff8d0ee6ccc6242', 'ada', 'Public/Home/images/user/2018-11-10/5be65e7b36641.png', '1', '13635967675');
INSERT INTO `homeuser` VALUES ('3', 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8', null, null, '1', '15779052051');
INSERT INTO `homeuser` VALUES ('4', '胜哥', '85d8ce590ad8981ca2c8286f79f59954', null, null, '1', '15797862638');

-- ----------------------------
-- Table structure for `kind`
-- ----------------------------
DROP TABLE IF EXISTS `kind`;
CREATE TABLE `kind` (
  `kindid` int(11) NOT NULL AUTO_INCREMENT,
  `kindname` varchar(20) NOT NULL,
  `kindtitle` varchar(200) NOT NULL,
  `kindimg` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kindid`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kind
-- ----------------------------
INSERT INTO `kind` VALUES ('27', '写真', '写真', 'Public/Admin/images/kindimg/2018-10-31/5bd94866b068b.png');
INSERT INTO `kind` VALUES ('28', '周边', '周边', 'Public/Admin/images/kindimg/2018-10-31/5bd8ff0a0ebda.png');
INSERT INTO `kind` VALUES ('29', '门票', '门票', 'Public/Admin/images/kindimg/2018-10-31/5bd8ff16b3f4f.png');
INSERT INTO `kind` VALUES ('35', '专辑', '专辑', 'Public/Admin/images/kindimg/2018-10-31/5bd92bc5715e9.png');

-- ----------------------------
-- Table structure for `lunbo`
-- ----------------------------
DROP TABLE IF EXISTS `lunbo`;
CREATE TABLE `lunbo` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `img` varchar(100) NOT NULL,
  `isshow` tinyint(1) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lunbo
-- ----------------------------
INSERT INTO `lunbo` VALUES ('12', '1', 'Public/Admin/images/lunbo/2018-11-01/5bdac1e33198f.png', '1');
INSERT INTO `lunbo` VALUES ('18', '5', 'Public/Admin/images/lunbo/2018-11-01/5bdac33479ef3.png', '1');
INSERT INTO `lunbo` VALUES ('15', '3', 'Public/Admin/images/lunbo/2018-11-01/5bdac24a6da20.png', '1');
INSERT INTO `lunbo` VALUES ('19', '7', 'Public/Admin/images/lunbo/2018-11-01/5bdad9f432ab4.png', '1');

-- ----------------------------
-- Table structure for `node`
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned DEFAULT NULL,
  `condition` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES ('45', '后台模块', '后台管理', '0', null, null, '0', '1', null);
INSERT INTO `node` VALUES ('46', '类别管理', '类别管理', '0', null, null, '45', '2', null);
INSERT INTO `node` VALUES ('47', '地区管理', '地区管理', '0', null, null, '45', '2', null);
INSERT INTO `node` VALUES ('48', '艺人管理', '艺人管理', '0', null, null, '45', '2', null);
INSERT INTO `node` VALUES ('49', '尺寸颜色管理', '尺寸颜色管理', '0', null, null, '45', '2', null);
INSERT INTO `node` VALUES ('50', '商品管理', '商品管理', '0', null, null, '45', '2', null);
INSERT INTO `node` VALUES ('51', '订单管理', '订单管理', '0', null, null, '45', '2', null);
INSERT INTO `node` VALUES ('52', '类别添加', '类别添加', '0', null, null, '46', '3', null);
INSERT INTO `node` VALUES ('53', '类别删除', '类别删除', '0', null, null, '46', '3', null);
INSERT INTO `node` VALUES ('54', '类别修改', '类别修改', '0', null, null, '46', '3', null);
INSERT INTO `node` VALUES ('55', '订单发货', '订单发货', '0', null, null, '51', '3', null);
INSERT INTO `node` VALUES ('56', '商品删除', '商品删除', '0', null, null, '50', '3', null);
INSERT INTO `node` VALUES ('57', '权限管理', '权限管理', '0', null, null, '45', '2', null);
INSERT INTO `node` VALUES ('58', '用户管理', '用户管理', '0', null, null, '45', '2', null);
INSERT INTO `node` VALUES ('59', '角色管理', '角色管理', '0', null, null, '45', '2', null);

-- ----------------------------
-- Table structure for `orderdetail`
-- ----------------------------
DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `buycount` int(11) NOT NULL,
  `buynum` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `colorname` varchar(30) DEFAULT NULL,
  `sizename` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orderdetail
-- ----------------------------
INSERT INTO `orderdetail` VALUES ('35', '1542111063', '20', '1', '9', '无', '无');
INSERT INTO `orderdetail` VALUES ('36', '1542111117', '20', '1', '9', '无', '无');
INSERT INTO `orderdetail` VALUES ('37', '1542111117', '88', '1', '16', '紫色', 'L');
INSERT INTO `orderdetail` VALUES ('38', '1542111117', '88', '1', '16', '红色', 'XXL');
INSERT INTO `orderdetail` VALUES ('39', '1542162787', '200', '1', '25', '无', '无');
INSERT INTO `orderdetail` VALUES ('40', '1542163054', '20', '1', '9', '无', '无');
INSERT INTO `orderdetail` VALUES ('41', '1542163087', '200', '1', '21', '无', '无');

-- ----------------------------
-- Table structure for `orderinfo`
-- ----------------------------
DROP TABLE IF EXISTS `orderinfo`;
CREATE TABLE `orderinfo` (
  `oderid` int(11) NOT NULL,
  `orderdate` varchar(100) NOT NULL,
  `ordermoney` varchar(100) NOT NULL,
  `isdeliver` tinyint(1) NOT NULL,
  `productnum` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `ispay` tinyint(1) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `isget` int(1) NOT NULL,
  PRIMARY KEY (`oderid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orderinfo
-- ----------------------------
INSERT INTO `orderinfo` VALUES ('1542111063', '1542111063', '20', '0', '1', '14', '0', '2', '0');
INSERT INTO `orderinfo` VALUES ('1542111117', '1542111117', '196', '1', '3', '14', '1', '2', '0');
INSERT INTO `orderinfo` VALUES ('1542162787', '1542162787', '200', '0', '1', '14', '1', '2', '0');
INSERT INTO `orderinfo` VALUES ('1542163054', '1542163054', '20', '0', '1', '19', '1', '2', '0');
INSERT INTO `orderinfo` VALUES ('1542163087', '1542163087', '200', '0', '1', '14', '1', '2', '0');

-- ----------------------------
-- Table structure for `proactor`
-- ----------------------------
DROP TABLE IF EXISTS `proactor`;
CREATE TABLE `proactor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proactor
-- ----------------------------
INSERT INTO `proactor` VALUES ('21', '3', '3');
INSERT INTO `proactor` VALUES ('17', '4', '0');
INSERT INTO `proactor` VALUES ('19', '2', '0');
INSERT INTO `proactor` VALUES ('25', '10', '25');
INSERT INTO `proactor` VALUES ('26', '11', '25');
INSERT INTO `proactor` VALUES ('28', '13', '25');
INSERT INTO `proactor` VALUES ('27', '12', '25');
INSERT INTO `proactor` VALUES ('37', '16', '25');
INSERT INTO `proactor` VALUES ('39', '14', '25');
INSERT INTO `proactor` VALUES ('38', '15', '25');
INSERT INTO `proactor` VALUES ('41', '28', '4');

-- ----------------------------
-- Table structure for `procolor`
-- ----------------------------
DROP TABLE IF EXISTS `procolor`;
CREATE TABLE `procolor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of procolor
-- ----------------------------
INSERT INTO `procolor` VALUES ('37', '15', '2');
INSERT INTO `procolor` VALUES ('36', '15', '4');
INSERT INTO `procolor` VALUES ('31', '16', '2');
INSERT INTO `procolor` VALUES ('30', '16', '5');
INSERT INTO `procolor` VALUES ('35', '15', '6');
INSERT INTO `procolor` VALUES ('38', '15', '1');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` int(20) NOT NULL,
  `num` int(20) NOT NULL,
  `sales` int(20) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT NULL,
  `uptime` varchar(20) DEFAULT NULL,
  `kid` int(11) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `isrecommend` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('2', 'DAVID GUEITA FT', '200', '200', '0', '1', '1541146911', '35', 'Public/Admin/images/product/2018-11-02/5bdc091f67720.png', '1');
INSERT INTO `product` VALUES ('3', 'breakbot', '100', '200', '0', '1', '1541149595', '27', 'Public/Admin/images/product/2018-11-02/5bdc139b83292.png', '1');
INSERT INTO `product` VALUES ('4', '危险世界', '100', '200', '0', '1', '1541149654', '35', 'Public/Admin/images/product/2018-11-05/5be00368001b3.png', '1');
INSERT INTO `product` VALUES ('6', '姆爷全新数字专辑', '20', '200', '500', '1', '154141643', '35', 'Public/Admin/images/product/2018-11-05/5be025ef2a7b7.png', '1');
INSERT INTO `product` VALUES ('7', 'MOONLIGT', '20', '200', '500', '1', '154141649', '35', 'Public/Admin/images/product/2018-11-05/5be0262db7bca.png', '1');
INSERT INTO `product` VALUES ('8', 'off', '20', '200', '500', '1', '154141655', '35', 'Public/Admin/images/product/2018-11-05/5be0266b18ecf.png', '1');
INSERT INTO `product` VALUES ('9', 'ATOMIG', '20', '197', '503', '1', '154141658', '35', 'Public/Admin/images/product/2018-11-05/5be0268665b91.png', '1');
INSERT INTO `product` VALUES ('10', ' 2017 专辑3', '89', '198', '352', '1', '1541570291', '35', 'Public/Admin/images/product/2018-11-07/5be27ef3656c6.png', '1');
INSERT INTO `product` VALUES ('11', '2017 专辑2', '89', '200', '330', '1', '1541570450', '35', 'Public/Admin/images/product/2018-11-07/5be27f9285eb3.png', '1');
INSERT INTO `product` VALUES ('12', '2017 专辑01', '89', '200', '0', '1', '1541570511', '35', 'Public/Admin/images/product/2018-11-07/5be27fcf4611d.png', '1');
INSERT INTO `product` VALUES ('13', '2017 写真 01', '89', '198', '2', '1', '1541570735', '27', 'Public/Admin/images/product/2018-11-07/5be280afec0c8.png', '1');
INSERT INTO `product` VALUES ('14', 'EXO周边', '89', '200', '0', '1', '1541574402', '28', 'Public/Admin/images/product/2018-11-07/5be28f02549c1.png', '1');
INSERT INTO `product` VALUES ('15', '衣服', '59', '200', '0', '1', '1541574432', '28', 'Public/Admin/images/product/2018-11-07/5be28f20325bd.png', '1');
INSERT INTO `product` VALUES ('16', '鞋子', '88', '198', '2', '1', '1541574463', '28', 'Public/Admin/images/product/2018-11-07/5be28f3f5dc34.png', '1');
INSERT INTO `product` VALUES ('20', '五月天', '200', '200', '400', '1', '1541579968', '29', 'Public/Admin/images/product/2018-11-07/5be2a0d0a101b.png', '1');
INSERT INTO `product` VALUES ('21', 'MooN', '200', '200', '400', '1', '1541579005', '29', 'Public/Admin/images/product/2018-11-07/5be2a0fd3ad89.png', '1');
INSERT INTO `product` VALUES ('22', 'SUPER', '200', '200', '400', '1', '1541579034', '29', 'Public/Admin/images/product/2018-11-07/5be2a11adb6a9.png', '1');
INSERT INTO `product` VALUES ('23', 'PLAY', '50', '200', '0', '1', '1541580466', '29', 'Public/Admin/images/product/2018-11-07/5be2a6b2931fa.png', '1');
INSERT INTO `product` VALUES ('24', 'FIRST', '200', '200', '0', '1', '1541580583', '29', 'Public/Admin/images/product/2018-11-07/5be2a7274911d.png', '1');
INSERT INTO `product` VALUES ('25', 'DON', '200', '200', '0', '1', '1541580695', '29', 'Public/Admin/images/product/2018-11-07/5be2a797ab51a.png', '1');
INSERT INTO `product` VALUES ('26', '在弦', '200', '200', '0', '1', '1541580812', '29', 'Public/Admin/images/product/2018-11-07/5be2a80c4b0bf.png', '1');
INSERT INTO `product` VALUES ('27', '韩语演唱会', '200', '200', '0', '1', '1541580891', '29', 'Public/Admin/images/product/2018-11-07/5be2a85b0d66f.png', '1');
INSERT INTO `product` VALUES ('28', 'EXO热卖', '500', '200', '0', '1', '1542007236', '27', 'Public/Admin/images/product/2018-11-12/5be929c4aa231.png', '1');
INSERT INTO `product` VALUES ('29', 'James', '200', '200', '0', '1', '1542007270', '27', 'Public/Admin/images/product/2018-11-12/5be929e66833b.png', '1');
INSERT INTO `product` VALUES ('30', 'SMTOWN', '200', '150', '0', '1', '1542007302', '27', 'Public/Admin/images/product/2018-11-12/5be92a06359ed.png', '1');
INSERT INTO `product` VALUES ('31', 'Taylor', '200', '200', '0', '1', '1542007338', '27', 'Public/Admin/images/product/2018-11-12/5be92a2a33700.png', '1');
INSERT INTO `product` VALUES ('32', '世界', '200', '200', '0', '1', '1542008269', '28', 'Public/Admin/images/product/2018-11-12/5be92dcdd0fa7.png', '1');
INSERT INTO `product` VALUES ('33', 'CNBL', '100', '100', '0', '1', '1542008295', '28', 'Public/Admin/images/product/2018-11-12/5be92de6f3ff5.png', '1');
INSERT INTO `product` VALUES ('34', 'zha', '100', '100', '0', '1', '1542008324', '28', 'Public/Admin/images/product/2018-11-12/5be92e047e7d5.png', '1');

-- ----------------------------
-- Table structure for `prosize`
-- ----------------------------
DROP TABLE IF EXISTS `prosize`;
CREATE TABLE `prosize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prosize
-- ----------------------------
INSERT INTO `prosize` VALUES ('54', '15', '8');
INSERT INTO `prosize` VALUES ('48', '16', '6');
INSERT INTO `prosize` VALUES ('47', '16', '7');
INSERT INTO `prosize` VALUES ('56', '15', '6');
INSERT INTO `prosize` VALUES ('55', '15', '7');
INSERT INTO `prosize` VALUES ('46', '16', '9');
INSERT INTO `prosize` VALUES ('45', '16', '10');
INSERT INTO `prosize` VALUES ('53', '15', '9');
INSERT INTO `prosize` VALUES ('52', '15', '10');
INSERT INTO `prosize` VALUES ('57', '15', '5');

-- ----------------------------
-- Table structure for `region`
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(20) NOT NULL,
  `rimg` varchar(100) DEFAULT NULL,
  `rinfo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES ('1', '中国', 'Public/Admin/images/rimg/2018-10-31/5bd93341d0bbc.png', '这是中国');
INSERT INTO `region` VALUES ('2', '欧美', 'Public/Admin/images/rimg/2018-10-31/5bd933bc806a5.png', '这是欧美');
INSERT INTO `region` VALUES ('3', '韩国', 'Public/Admin/images/rimg/2018-10-31/5bd933c6005fb.png', '这是韩国');
INSERT INTO `region` VALUES ('4', '日本', 'Public/Admin/images/rimg/2018-10-31/5bd933cfbf2f2.png', '这是日本');

-- ----------------------------
-- Table structure for `size`
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sizename` varchar(255) NOT NULL,
  `sizeinfo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of size
-- ----------------------------
INSERT INTO `size` VALUES ('7', 'L', '48');
INSERT INTO `size` VALUES ('6', 'S', '44');
INSERT INTO `size` VALUES ('5', 'M', '46');
INSERT INTO `size` VALUES ('8', 'XL', '50');
INSERT INTO `size` VALUES ('9', 'XXL', '52');
INSERT INTO `size` VALUES ('10', 'XXXL', '54');
INSERT INTO `size` VALUES ('11', 'XXXXL', '56');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `userpsw` varchar(32) NOT NULL,
  `logintime` varchar(32) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `userphoto` varchar(50) DEFAULT NULL,
  `userinfo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1542091552', '1', null, '6');
INSERT INTO `user` VALUES ('3', '胜哥', 'a1f5ea7eb79c9597fff8d0ee6ccc6242', '1542093841', '1', null, null);

-- ----------------------------
-- View structure for `addresspay`
-- ----------------------------
DROP VIEW IF EXISTS `addresspay`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `addresspay` AS select `orderinfo`.`oderid` AS `oderid`,`orderinfo`.`orderdate` AS `orderdate`,`orderinfo`.`ordermoney` AS `ordermoney`,`orderinfo`.`isdeliver` AS `isdeliver`,`orderinfo`.`productnum` AS `productnum`,`orderinfo`.`addressid` AS `addressid`,`orderinfo`.`ispay` AS `ispay`,`orderinfo`.`userid` AS `userid`,`orderinfo`.`isget` AS `isget`,`address`.`consignee` AS `consignee`,`address`.`address` AS `address`,`address`.`phone` AS `phone` from (`address` join `orderinfo`) where (`address`.`id` = `orderinfo`.`addressid`) ;

-- ----------------------------
-- View structure for `ap`
-- ----------------------------
DROP VIEW IF EXISTS `ap`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ap` AS select `product`.`name` AS `name`,`product`.`price` AS `price`,`product`.`num` AS `num`,`product`.`sales` AS `sales`,`product`.`isshow` AS `isshow`,`product`.`uptime` AS `uptime`,`product`.`kid` AS `kid`,`product`.`img` AS `img`,`product`.`isrecommend` AS `isrecommend`,`product`.`id` AS `id`,`actor`.`aid` AS `aid` from ((`actor` join `product`) join `proactor`) where ((`actor`.`aid` = `proactor`.`aid`) and (`proactor`.`pid` = `product`.`id`)) ;

-- ----------------------------
-- View structure for `ar`
-- ----------------------------
DROP VIEW IF EXISTS `ar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ar` AS select `actor`.`aid` AS `aid`,`actor`.`aname` AS `aname`,`actor`.`ainfo` AS `ainfo`,`actor`.`isrecommend` AS `isrecommend`,`actor`.`rid` AS `rid`,`actor`.`aband` AS `aband`,`actor`.`abg` AS `abg`,`actor`.`alogo` AS `alogo`,`region`.`rname` AS `rname` from (`actor` join `region`) where (`actor`.`rid` = `region`.`rid`) ;

-- ----------------------------
-- View structure for `auth`
-- ----------------------------
DROP VIEW IF EXISTS `auth`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `auth` AS select `user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`userpsw` AS `userpsw`,`user`.`logintime` AS `logintime`,`user`.`status` AS `status`,`user`.`userphoto` AS `userphoto`,`user`.`userinfo` AS `userinfo`,`auth_group`.`title` AS `title`,`auth_group`.`rules` AS `rules` from ((`auth_group` join `auth_group_access`) join `user`) where ((`user`.`id` = `auth_group_access`.`uid`) and (`auth_group`.`id` = `auth_group_access`.`group_id`)) ;

-- ----------------------------
-- View structure for `pcolor`
-- ----------------------------
DROP VIEW IF EXISTS `pcolor`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pcolor` AS select `color`.`ename` AS `ename`,`color`.`colorname` AS `colorname`,`color`.`id` AS `id`,`procolor`.`pid` AS `pid` from (`procolor` join `color`) where (`procolor`.`cid` = `color`.`id`) ;

-- ----------------------------
-- View structure for `pk`
-- ----------------------------
DROP VIEW IF EXISTS `pk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pk` AS select `product`.`id` AS `id`,`product`.`name` AS `name`,`product`.`price` AS `price`,`product`.`num` AS `num`,`product`.`sales` AS `sales`,`product`.`isshow` AS `isshow`,`product`.`uptime` AS `uptime`,`product`.`kid` AS `kid`,`product`.`img` AS `img`,`kind`.`kindname` AS `kindname`,`product`.`isrecommend` AS `isrecommend` from (`kind` join `product`) where (`kind`.`kindid` = `product`.`kid`) ;

-- ----------------------------
-- View structure for `prode`
-- ----------------------------
DROP VIEW IF EXISTS `prode`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prode` AS select `product`.`name` AS `name`,`product`.`img` AS `img`,`orderdetail`.`pid` AS `pid`,`orderdetail`.`id` AS `id`,`orderdetail`.`orderid` AS `orderid`,`orderdetail`.`buycount` AS `buycount`,`orderdetail`.`buynum` AS `buynum`,`orderdetail`.`colorname` AS `colorname`,`orderdetail`.`sizename` AS `sizename`,`product`.`price` AS `price` from (`product` join `orderdetail`) where (`product`.`id` = `orderdetail`.`pid`) ;

-- ----------------------------
-- View structure for `psize`
-- ----------------------------
DROP VIEW IF EXISTS `psize`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `psize` AS select `size`.`sizename` AS `sizename`,`size`.`id` AS `id`,`size`.`sizeinfo` AS `sizeinfo`,`prosize`.`pid` AS `pid` from (`prosize` join `size`) where (`prosize`.`sid` = `size`.`id`) ;
