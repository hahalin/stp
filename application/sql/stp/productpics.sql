
--
-- Table structure for table `productpics`
--

CREATE TABLE IF NOT EXISTS `productpics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `path` varchar(256)  NOT NULL,
  `thumb` varchar(256)  NOT NULL,
  `seqno` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
