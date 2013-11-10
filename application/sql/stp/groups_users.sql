
CREATE  TABLE IF NOT EXISTS `groups_users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `group_id` BIGINT UNSIGNED NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX group_id (`group_id` ASC) ,
  INDEX user_id (`user_id` ASC) )
 DEFAULT CHARSET=utf8  COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;