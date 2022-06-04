create database db_storeUpdate;
use db_storeUpdate;
create table sellerStatus(
id_status int not null primary key ,
status varchar(20) not null 
);
insert into sellerStatus values
(1,"inProcess"),
(2,"accepted"),
(3,"rejected"),
(4,"suspend"),
(5,"banned");
create table sellers_acount(
id_seller int auto_increment primary key,
nom varchar(30) not null ,
prenom varchar(30) not null ,
datenaissance date not null ,
cin varchar(10) not null ,
phone int(10) not null ,
photo varchar(150) not null,
address varchar(150) not null,
city varchar(30) not null,
cin_photo varchar(100) not null,
email varchar(30) not null,
psw varchar(30) not null,
id_status int ,
foreign key(id_status) references sellerStatus(id_status)
); 
insert into sellers_acount (nom,prenom,datenaissance,cin,phone,photo,address,city,cin_photo,email,psw,id_status) values
-- ("reguig	","othmane	","4156-12-31",	"q445688",	710884423,	"hp.jpg	","lot elfirdaouss hay dakhla",	"khouribga",	"mac.jpeg","	othmanereguig199@gmail.com",	123,	1),
("yassin",	"yassin	","0000-00-00	","q166659",	710884423,	"nike.jpg"	,"lot elfirdaouss hay dakhla","	khouribga","	mac.jpeg","	yassin2000@gmail"	,"123",	1);

ALTER TABLE sellers_acount ALTER id_status SET DEFAULT 0;
create table  products_category(
id_category int primary key,
category varchar(30) not null 
);
insert into products_category values
(1,"electronic"),
(2,"other products");
create table color (
id_çolor int not null primary key,
çolor  varchar(30) not null 
);
create table size (
id_size int not null primary key,
size  varchar(8) not null 
);
-- create table  electronic_products(
-- id_product_elec int auto_increment primary key ,
-- id_seller int NOT NULL,
-- id_category int not null,
-- nom varchar(30) not null ,
-- image text(500) not null,
-- id_çolor int not null ,
-- quantity int not null ,
-- short_description varchar(100) not null ,
-- long_description varchar(1000) not null ,
-- price decimal not null ,
-- create_date datetime not null,
-- foreign key(id_çolor) references color(id_çolor),
-- foreign key(id_seller) references sellers_acount(id_seller)
-- );
-- create table  other_products(
-- id_product_oth int auto_increment primary key ,
-- id_seller int not null ,
-- id_category int not null ,
-- nom varchar(30) not null ,
-- image varchar(500) not null,
-- id_çolor int not null ,
-- id_size int not null ,
-- quantity int not null ,
-- short_description varchar(100) not null ,
-- long_description varchar(1000) not null ,
-- price decimal not null ,
-- create_date datetime 
-- );
-- ALTER TABLE products
-- add foreign key(id_seller) references sellers_acount(id_seller);
-- ALTER TABLE products
-- add foreign key(id_size) references size(id_size);
-- ALTER TABLE products
-- add foreign key(id_çolor) references color(id_çolor);
-- ALTER TABLE products
-- add foreign key(id_category) references products_category(id_category);

create table  products(
id_product int auto_increment primary key ,
id_seller int not null ,
id_category int not null ,
nom varchar(30) not null ,
image varchar(500) not null,
id_çolor int not null ,
id_size int not null ,
quantity int not null ,
short_description varchar(100) not null ,
long_description varchar(1000) not null ,
price decimal not null ,
create_date datetime 
);
create table client(
id_client int auto_increment primary key ,
nom varchar(30) not null ,
prenom varchar(30) not null ,
email varchar(30) not null,
psw varchar(30) not null
);
-- create table order_status(
-- id_orderStatus int primary key,
-- order_status varchar(30) not null
-- );
create table client_info(
id_client int  ,
nom varchar(30)  ,
prenom varchar(30) ,
email varchar(30),
address varchar(150) not null,
city varchar(30) not null,
phone int(10) ,
foreign key(id_client) references client(id_client)
);
create table orders (
id_orders int auto_increment primary key,
id_product int  not null ,
id_client int  not null ,
id_seller int not null ,
id_category int not null,
quantity int not null ,
invoice_amount decimal ,
invoice_date datetime not null,
foreign key(id_seller) references sellers_acount(id_seller),
foreign key(id_product) references products(id_product)
);
create table admin (
id int auto_increment primary key , 
prenom varchar(30) not null,
email varchar(100) not null,
psw varchar(200) not null
);
insert into admin (prenom,email,psw) values 
('othmane','othmane@gmail.com','123'),
('marwan','marwan@gmail.com','123'),
('yassin','yassin@gmail.com','123'),
('AbdulSamad','AbdulSamad@gmail.com','123');