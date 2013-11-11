

create table rfqs
(
   id bigint(20) unsigned not null  auto_Increment,
   billno varchar(20),
   billdate datetime,
   sender_id bigint,
   rfqstatus_id bigint,
   memo varchar(50),
   primary key(id)
)  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci
