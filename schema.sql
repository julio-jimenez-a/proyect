/*
* Citas Medicas Database
* @author julio
*/
create database sistema;
use sistema; 
set sql_mode='';
create table usuario (
	id int not null auto_increment primary key,
	username varchar(50),
	name varchar(50),
	lastname varchar(50),
	email varchar(255),
	password varchar(60),
	is_active boolean not null default 1,
	is_admin boolean not null default 0,
	created_at datetime
);

insert into usuario (username,password,is_admin,is_active,created_at) value ("admin",sha1(md5("admin")),1,1,NOW());

create table pacient (
	id int not null auto_increment primary key,
	no varchar(50),
	name varchar(50),
	lastname varchar(50),
	gender varchar(1),
	day_of_birth date,
	email varchar(255),
	address varchar(255),
	phone varchar(255),
	image varchar(255),
	sick varchar(500),
	medicaments varchar(500),
	alergy varchar(500),
	is_favorite boolean not null default 1,
	is_active boolean not null default 1,
	created_at datetime
);

create table category (
	id int not null auto_increment primary key,
	name varchar(200)
	);

insert into category (name) value ("General");


create table medic (
	id int not null auto_increment primary key,
	no varchar(50),
	name varchar(50),
	lastname varchar(50),
	gender varchar(1),
	day_of_birth date,
	email varchar(255),
	address varchar(255),
	phone varchar(255),
	image varchar(255),
	is_active boolean not null default 1,
	created_at datetime,
	category_id int,
	foreign key (category_id) references category(id)
);

create table status (
	id int not null auto_increment primary key,
	name varchar(100)
);

insert into status (id,name) values (1,"Pendiente"), (2,"Aplicada"),(3,"No asistio"),(4,"Cancelada");

create table payment (
	id int not null auto_increment primary key,
	name varchar(100)
);

insert into payment (id,name) values  (1,"Pendiente"),(2,"Pagado"),(3,"Anulado");

create table reservation(
	id int not null auto_increment primary key,
	title varchar(100),
	note text,
	message text,
	date_at varchar(50),
	time_at varchar(50),
	created_at datetime,
	pacient_id int,
	symtoms text,
	sick text,
	medicaments text,
	user_id int,
	medic_id int,
	price double,
	is_web boolean not null default 0,
	payment_id int not null default 1,
	foreign key (payment_id) references payment(id),
	status_id int not null default 1,
	foreign key (status_id) references status(id),
	foreign key (user_id) references usuario(id),
	foreign key (pacient_id) references pacient(id),
	foreign key (medic_id) references medic(id)
);



create table category_ventas(
	id int not null auto_increment primary key,
	image varchar(255),
	name varchar(50),
	description text,
	created_at datetime
);

create table product(
	id int not null auto_increment primary key,
	image varchar(255),
	barcode varchar(50),
	name varchar(50),
	description text,
	inventary_min int default 10,
	price_in float,
	price_out float,
	unit varchar(255),
	presentation varchar(255),
	user_id int,
	category_ventas_id int,
	created_at datetime,
	is_active boolean default 1,
	foreign key (category_ventas_id) references category_ventas(id),
	foreign key (user_id) references usuario(id)
);

/*
person kind
1.- Client
2.- Provider
*/

create table provider(
	id int not null auto_increment primary key,
	name varchar(255),
	address1 varchar(50),
	address2 varchar(50),
	phone1 varchar(50),
	phone2 varchar(50),
	email1 varchar(50),
	email2 varchar(50),
	created_at datetime
);


create table operation_type(
	id int not null auto_increment primary key,
	name varchar(50)
);

insert into operation_type (name) value ("entrada");
insert into operation_type (name) value ("salida");

create table box(
	id int not null auto_increment primary key,
	created_at datetime
);

create table sell(
	id int not null auto_increment primary key,
	pacient_id int ,
	user_id int ,
	operation_type_id int default 2,
	box_id int,

	total double,
	cash double,
	discount double,

	foreign key (box_id) references box(id),
	foreign key (operation_type_id) references operation_type(id),
	foreign key (user_id) references usuario(id),
	foreign key (pacient_id) references pacient(id),
	created_at datetime
);

create table operation(
	id int not null auto_increment primary key,
	product_id int,
	q float,
	operation_type_id int,
	sell_id int,
	created_at datetime,
	foreign key (product_id) references product(id),
	foreign key (operation_type_id) references operation_type(id),
	foreign key (sell_id) references sell(id)
);

/*
configuration kind
1.- Boolean
2.- Text
3.- Number
*/
create table configuration_ventas(
	id int not null auto_increment primary key,
	short varchar(255) unique,
	name varchar(255) unique,
	kind int,
	val varchar(255)
);

insert into configuration_ventas(short,name,kind,val) value("title","Titulo del Sistema",2,"Consultas Medicas");
insert into configuration_ventas(short,name,kind,val) value("use_image_product","Utilizar Imagenes en los productos",1,0);
insert into configuration_ventas(short,name,kind,val) value("active_clients","Activar clientes",1,0);
insert into configuration_ventas(short,name,kind,val) value("active_providers","Activar proveedores",1,0);
insert into configuration_ventas(short,name,kind,val) value("active_categories","Activar categorias",1,0);
insert into configuration_ventas(short,name,kind,val) value("active_reports_word","Activar reportes en Word",1,0);
insert into configuration_ventas(short,name,kind,val) value("active_reports_excel","Activar reportes en Excel",1,0);
insert into configuration_ventas(short,name,kind,val) value("active_reports_pdf","Activar reportes en PDF",1,0);

