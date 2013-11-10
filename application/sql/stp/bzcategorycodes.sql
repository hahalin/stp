
CREATE TABLE IF NOT EXISTS `bzcategorycodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bzcategory_id` bigint(20) unsigned DEFAULT '0',
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1  ;
