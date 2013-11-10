
CREATE TABLE IF NOT EXISTS `bzcategories_parents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bzcategory_id` bigint(20) unsigned DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;