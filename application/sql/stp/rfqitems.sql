
create table rfqitems
(
   id bigint(20) not null  auto_Increment,
   rfq_id bigint(20),
   company_id bigint(20),
   receiver_id bigint,
   product_id bigint,
   primary key(id)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci
