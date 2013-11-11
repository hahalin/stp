
create table categories_products
(

id bigint(20) unsigned not null auto_increment,
   product_id bigint(20) not null,
   category_id bigint(20) not null,
 
   PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;
