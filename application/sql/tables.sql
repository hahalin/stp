
--
-- Table structure for table `companies_products`
--

CREATE TABLE IF NOT EXISTS `companies_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `companies_users`
--

CREATE TABLE IF NOT EXISTS `companies_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prdtbs_prdcols`
--

CREATE TABLE IF NOT EXISTS `prdtbs_prdcols` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prdtb_id` bigint(20) unsigned NOT NULL,
  `col_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `width` int(11) DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `productgroups`
--

CREATE TABLE productgroups
(
   id bigint(20) unsigned not null auto_increment,
   product_id bigint(20) not null,
   groupname varchar(20) not null,
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1;



-- --------------------------------------------------------

--
-- Table structure for table `products_pics`
--

CREATE TABLE IF NOT EXISTS `products_pics` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `path` varchar(256) COLLATE utf8_bin NOT NULL,
  `seqno` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--section

CREATE TABLE IF NOT EXISTS `secs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--province

CREATE TABLE IF NOT EXISTS `provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sec_id` bigint(20) not null,
  `name` varchar(20) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;


--company

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;


create table bzcategories_companies
(
	`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	`company_id` bigint(20) not null,
	`bzcategory_id` bigint(20) not null,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;


create table rfqs
(
   id bigint(20) unsigned not null  auto_Increment,
   billno varchar(20),
   billdate datetime,
   sender_id bigint,
   rfqstatus_id bigint,
   memo varchar(50),
   primary key(id)
)

create table rfqitems
(
   id bigint(20) not null  auto_Increment,
   rfq_id bigint(20),
   company_id bigint(20),
   receiver_id bigint,
   product_id bigint,
   primary key(id)
)

create table rfqstatuses
(
  id bigint(20) unsigned not null auto_increment,
  name varchar(20),
  primary key (id)
)
