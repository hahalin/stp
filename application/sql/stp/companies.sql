
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` int,
  `name` varchar(50) ,
  `ename` varchar(50) ,
  `bzcategory_id` bigint(20) unsigned not null,
  `province_id` bigint(20) unsigned ,
  `addr` varchar(100),
  `addrno` int,
  `eaddr` varchar(100),
  `tel` varchar(20),
  `fax` varchar(20),
  `web` varchar(20),
  `email` varchar(20),
  `scope` varchar(100),
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;
