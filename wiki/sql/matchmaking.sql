/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost
 Source Database       : matchmaking

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : utf-8

 Date: 12/11/2018 11:41:37 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ips_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ips_admin`;
CREATE TABLE `ips_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理编号',
  `admin_salt` char(6) CHARACTER SET utf8 DEFAULT '',
  `admin_email` varchar(255) DEFAULT '' COMMENT '邮箱',
  `admin_account` varchar(64) DEFAULT '' COMMENT '管理账号',
  `admin_passwd` varchar(32) DEFAULT '' COMMENT '管理密码',
  `admin_realname` varchar(64) DEFAULT NULL COMMENT '管理姓名',
  `admin_group` tinyint(3) unsigned DEFAULT NULL COMMENT '权限组',
  `admin_depart` int(10) unsigned DEFAULT '1' COMMENT '部门ID',
  `admin_lastlogin` int(10) unsigned DEFAULT NULL COMMENT '最近登录时间',
  `admin_lastip` int(11) unsigned DEFAULT NULL COMMENT '最近登录IP',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_account` (`admin_account`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT=' 管理员表';

-- ----------------------------
--  Records of `ips_admin`
-- ----------------------------
BEGIN;
INSERT INTO `ips_admin` VALUES ('1', 'njUW82', 'tech-agent2@ipasspay.com', 'admin', 'cc4b2f7cd1ccbd0357cc4324b45af0da', 'Andy', '0', '1', '1544175313', '2130706433');
COMMIT;

-- ----------------------------
--  Table structure for `ips_admin_group`
-- ----------------------------
DROP TABLE IF EXISTS `ips_admin_group`;
CREATE TABLE `ips_admin_group` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '组ID',
  `group_label` char(64) NOT NULL COMMENT '组名称',
  `group_perm` text COMMENT '权限内容',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理权限组';

-- ----------------------------
--  Records of `ips_admin_group`
-- ----------------------------
BEGIN;
INSERT INTO `ips_admin_group` VALUES ('1', '管理员', 'goods-index,goods-add,category-index-t-1,category-add-t-1,sample-index-t-1,sample-index-t-2,sourcing-index,sourcing-sample,sourcing-focus,config-account,group-index'), ('2', '供货商', 'goods-index,goods-add,category-index-t-1,category-add-t-1,sample-index-t-1,sample-index-t-2,config-account'), ('3', '采购商', 'sourcing-index,sourcing-sample,sourcing-focus,config-account');
COMMIT;

-- ----------------------------
--  Table structure for `ips_admin_logs`
-- ----------------------------
DROP TABLE IF EXISTS `ips_admin_logs`;
CREATE TABLE `ips_admin_logs` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `log_admin_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '操作的管理员ID',
  `log_admin_name` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '操作的管理员名称',
  `log_res_type` smallint(3) unsigned DEFAULT '0' COMMENT '操作的资源类型',
  `log_res_id` int(10) unsigned DEFAULT '0' COMMENT '操作的资源ID',
  `log_remark` varchar(1024) DEFAULT '' COMMENT '备注',
  `log_adate` int(10) unsigned DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='管理员操作日志';

-- ----------------------------
--  Table structure for `ips_admin_perm`
-- ----------------------------
DROP TABLE IF EXISTS `ips_admin_perm`;
CREATE TABLE `ips_admin_perm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `ap_name` char(32) NOT NULL COMMENT '项目名称',
  `ap_code` char(64) NOT NULL COMMENT '项目标识',
  `ap_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_1` (`ap_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
--  Table structure for `ips_category`
-- ----------------------------
DROP TABLE IF EXISTS `ips_category`;
CREATE TABLE `ips_category` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `cat_name` char(64) NOT NULL COMMENT '类别名称',
  `cat_parent` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属类别',
  `cat_route` char(32) NOT NULL DEFAULT '' COMMENT '路由hash',
  `cat_py` char(32) NOT NULL DEFAULT '' COMMENT '类别拼音',
  `cat_sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
  `cat_paths` char(255) NOT NULL DEFAULT '#0#' COMMENT '关系路径',
  `cat_level` tinyint(1) unsigned NOT NULL COMMENT '层次级别',
  `cat_type` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '分类类型',
  `cat_desc` varchar(2048) NOT NULL DEFAULT '' COMMENT '分类介绍',
  `cat_admin_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属管理员ID',
  PRIMARY KEY (`cat_id`),
  KEY `cat_path` (`cat_paths`),
  KEY `cat_type` (`cat_type`,`cat_level`,`cat_sort`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
--  Records of `ips_category`
-- ----------------------------
BEGIN;
INSERT INTO `ips_category` VALUES ('1', '男装', '0', '', 'auto', '0', '#0#', '0', '1', '', '1'), ('2', '女装', '0', '', 'auto', '0', '#0#', '0', '1', '', '1'), ('3', '牛仔裤', '1', '', 'auto', '0', '#0#1#', '1', '1', '品牌#颜色#尺码', '1');
COMMIT;

-- ----------------------------
--  Table structure for `ips_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ips_goods`;
CREATE TABLE `ips_goods` (
  `goods_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(255) DEFAULT '' COMMENT '商品名称',
  `goods_admin_id` int(10) unsigned DEFAULT '0' COMMENT '所属管理员ID',
  `goods_cat_id` int(10) unsigned DEFAULT '0' COMMENT '分类ID',
  `goods_storage` smallint(5) unsigned DEFAULT '0' COMMENT '库存',
  `goods_cover` varchar(255) DEFAULT '' COMMENT '商品封面',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `ips_goods`
-- ----------------------------
BEGIN;
INSERT INTO `ips_goods` VALUES ('1', '吉普 jeep 牛仔裤男加绒加厚商务直筒2018新款弹力宽松休闲男裤子', '1', '3', '2000', '2018-12-10/pre_ebytgmjmj6kg.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `ips_goods_detail`
-- ----------------------------
DROP TABLE IF EXISTS `ips_goods_detail`;
CREATE TABLE `ips_goods_detail` (
  `goods_id` int(1) unsigned NOT NULL COMMENT '商品ID',
  `goods_detail` text COMMENT '商品详情',
  UNIQUE KEY `goods_id` (`goods_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `ips_goods_detail`
-- ----------------------------
BEGIN;
INSERT INTO `ips_goods_detail` VALUES ('1', '<p style=\"margin-top: 1.12em; margin-bottom: 1.12em; padding: 0px;\"><img src=\"/data/attachment/ueditor/image/20181210/1544434345547779.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434346387390.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434346158800.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434347470732.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434348179211.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434349296430.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434349930789.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434350978292.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434351139552.jpg\" class=\"\" width=\"750\" height=\"1273\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434352656980.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434352927270.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434354293933.jpg\" class=\"\" width=\"750\" height=\"1274\"/><img src=\"/data/attachment/ueditor/image/20181210/1544434355196448.jpg\" class=\"\" width=\"750\" height=\"1274\"/></p><h3 class=\"spec-title\" style=\"margin: 0px 0px 15px; padding: 0px; font-size: 16px; border-bottom: 1px solid rgb(238, 238, 238);\">价格说明</h3><p class=\"title\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(254, 112, 47);\">划线价格</p><p class=\"info\" style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(102, 102, 102);\">指商品的专柜价、吊牌价、正品零售价、厂商指导价或该商品的曾经展示过的销售价等，<span style=\"color: rgb(51, 51, 51); font-weight: 600;\">并非原价</span>，仅供参考。</p><p class=\"title\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(254, 112, 47);\">未划线价格</p><p class=\"info\" style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(102, 102, 102);\">指商品的<span style=\"color: rgb(51, 51, 51); font-weight: 600;\">实时标价</span>，不因表述的差异改变性质。具体成交价格根据商品参加活动，或会员使用优惠券、积分等发生变化，最终以订单结算页价格为准。</p><p class=\"info\" style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(102, 102, 102);\">商家详情页（含主图）以图片或文字形式标注的一口价、促销价、优惠价等价格可能是在使用优惠券、满减或特定优惠活动和时段等情形下的价格，具体请以结算页面的标价、优惠条件或活动规则为准。</p><p class=\"info\" style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(102, 102, 102);\">此说明仅当出现价格比较时有效，具体请参见《淘宝价格发布规范》。若商家单独对划线价格进行说明的，以商家的表述为准。</p><ul class=\"tb-security list-paddingleft-2\" style=\"margin: 0px 0px 10px; padding: 0px 0px 10px 68px; line-height: 2;\"><li><p>安全提示：</p></li><li><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">交易中请勿使用<span class=\"tb-h\" style=\"color: rgb(255, 68, 0);\">阿里旺旺</span>以外的聊天工具沟通，不要接收<span class=\"tb-h\" style=\"color: rgb(255, 68, 0);\">可疑文件</span>和不要点击<span class=\"tb-h\" style=\"color: rgb(255, 68, 0);\">不明来源</span>的链接，支付前核实好域名和支付详情。 淘宝不会以订单有问题，让您提供任何<span class=\"tb-h\" style=\"color: rgb(255, 68, 0);\">银行卡</span>、<span class=\"tb-h\" style=\"color: rgb(255, 68, 0);\">密码</span>、<span class=\"tb-h\" style=\"color: rgb(255, 68, 0);\">手机验证码</span>！遇到可疑情况可在钱盾“诈骗举报”中进行举报,');
COMMIT;

-- ----------------------------
--  Table structure for `ips_goods_price`
-- ----------------------------
DROP TABLE IF EXISTS `ips_goods_price`;
CREATE TABLE `ips_goods_price` (
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_start` int(10) unsigned DEFAULT '0' COMMENT '起始订购数量',
  `goods_end` int(10) unsigned DEFAULT '0' COMMENT '截止订购量',
  `goods_price` decimal(8,2) unsigned DEFAULT '0.00' COMMENT '阶梯价格',
  KEY `good_id` (`goods_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `ips_goods_price`
-- ----------------------------
BEGIN;
INSERT INTO `ips_goods_price` VALUES ('1', '1', '300', '99.00'), ('1', '301', '500', '88.00'), ('1', '501', '800', '77.00');
COMMIT;

-- ----------------------------
--  Table structure for `ips_goods_specs`
-- ----------------------------
DROP TABLE IF EXISTS `ips_goods_specs`;
CREATE TABLE `ips_goods_specs` (
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goods_spec_key` varchar(100) DEFAULT '' COMMENT '规格键',
  `goods_spec_val` varchar(100) DEFAULT '' COMMENT '规格值',
  KEY `good_id` (`goods_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
--  Records of `ips_goods_specs`
-- ----------------------------
BEGIN;
INSERT INTO `ips_goods_specs` VALUES ('1', '品牌', 'JEEP'), ('1', '颜色', '天蓝色'), ('1', '尺码', '28');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
