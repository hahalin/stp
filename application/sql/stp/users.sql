
CREATE TABLE  IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` char(40) NOT NULL,
  `salt` varchar(32) default NULL,
  `group_id` bigint(20) unsigned default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) DEFAULT CHARSET=utf8   COLLATE=utf8_general_ci AUTO_INCREMENT=1 
