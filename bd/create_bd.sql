

create database test;
use test;

create table t_images(
			id int auto_increment,
			description varchar(255),
			url varchar(50),
			primary key(id)
					);