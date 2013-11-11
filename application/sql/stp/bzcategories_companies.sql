
CREATE TABLE IF NOT EXISTS `bzcategories_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bzcategory_id` bigint(20) unsigned DEFAULT NULL,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;