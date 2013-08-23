CREATE TABLE `calls` (
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `caller_id` BIGINT UNSIGNED NOT NULL,
    `receiver_id` BIGINT UNSIGNED NOT NULL,
    'created_on' timestamp,
    'updated_on' timestamp,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;