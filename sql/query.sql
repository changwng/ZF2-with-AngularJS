-- ----------------------------
--  Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `firstname` varchar(32) DEFAULT NULL COMMENT 'Admin User First Name',
  `lastname` varchar(32) DEFAULT NULL COMMENT 'Admin User Last Name',
  `email` varchar(128) DEFAULT NULL COMMENT 'Admin User Email',
  `username` varchar(40) DEFAULT NULL COMMENT 'Admin User Login',
  `password` varchar(100) DEFAULT NULL COMMENT 'Admin User Password',
  `is_active` smallint(6) NOT NULL DEFAULT '1' COMMENT 'User Is Active',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNQ_ADMIN_USER_USERNAME` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Admin User Table';

-- ----------------------------
--  Records of `admin_user`
-- ----------------------------
BEGIN;
INSERT INTO `admin_user` VALUES ('1', 'Admin', 'Admin', 'admin@mail.com', 'admin', '25d55ad283aa400af464c76d713c07ad', '1');
COMMIT;

-- ----------------------------
--  Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `album`
-- ----------------------------
BEGIN;
INSERT INTO `album` VALUES ('1', 'The  Military  Wives 55', 'In  My  Dreams'), ('2', 'Adele', '21'), ('3', 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'), ('4', 'Lana  Del  Rey', 'Born  To  Die'), ('8', 'The  Military  Wives 55', 'First post save te');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
