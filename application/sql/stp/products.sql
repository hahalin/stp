
--
-- Table structure for table `products`
--

CREATE TABLE products
(
   id bigint(20) unsigned not null auto_increment,
   productname varchar(100) not null,
   issa varchar(100),
   impa varchar(100),
   local varchar(100),
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

