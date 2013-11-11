

--
-- Table structure for table `prdtbs_prdcols`
--

CREATE TABLE IF NOT EXISTS `prdtbs_prdcols` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prdtb_id` bigint(20) unsigned NOT NULL,
  `col_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `width` int(11) DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- Table structure for table `products_prdtbs`
--

CREATE TABLE IF NOT EXISTS `products_prdtbs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `title` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `seqno` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;


