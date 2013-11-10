

CREATE TABLE IF NOT EXISTS `provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sec_id` bigint(20) not null,
  `name` varchar(20) ,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
