-- drop database customers_bak;
create database customers;
use customers;
create table itemslist(
	name varchar(20) primary key,
    amount int not null,
    price double not null
);
create table customerslist(
	name varchar(20) primary key,
    passwd varchar(20) not null,
    email varchar(100) not null,
    sex varchar(10) not null,
    money double default 1000.0
);
create table managerslist(
	name varchar(20) primary key,
    passwd varchar(20) not null
);
create table saleslist(
	name varchar(20) primary key,
    passwd varchar(20) not null
);

create table cilist (
	username varchar(20),
    itemname varchar(20),
    tolamount int,
    tolprice double,
    primary key(username,itemname),
    foreign key(username) references customerslist(name) on delete cascade,
    foreign key(itemname) references itemslist(name) on delete cascade
);
create table silist (
	salename varchar(20),
    itemname varchar(20),
    primary key(salename,itemname),
    foreign key(salename) references saleslist(name) on delete cascade,
    foreign key(itemname) references itemslist(name) on delete cascade
);
create table customerslog (
	id int8 primary key auto_increment,
	name varchar(20) not null,
    state varchar(10) not null,
    ip_addr varchar(20) not null,
    date datetime not null,
    foreign key(name) references customerslist(name)
);
create table cilog (
	id int8 primary key auto_increment,
    username varchar(20) not null,
    itemname varchar(20) not null,
    tolprice double not null,
    amount int not null,
    date datetime not null,
    foreign key(username) references customerslist(name),
    foreign key(itemname) references itemslist(name)
);

insert into managerslist value ('root','123456');