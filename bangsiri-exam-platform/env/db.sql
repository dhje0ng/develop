create database IF NOT EXISTS bangsiriexam character set utf8 collate utf8_general_ci;

use bangsiriexam;

create table IF NOT EXISTS users(
    idx int(11) not null auto_increment,
    num int(7) not null,
    name varchar(10) not null,
    username varchar(32) not null,
    password varchar(512) not null,
    regtime datetime not null,
    is_admin varchar(1) not null,
    primary key(idx)
);

create table IF NOT EXISTS challenges(
    idx int(11) not null auto_increment,
    ch_name varchar(50) not null,
    ch_content varchar(50) not null,
    ch_category varchar(10) not null,
    ch_link varchar(100) not null,
    primary key(idx)
);

create table IF NOT EXISTS notice(
    idx int(11) not null auto_increment,
    title varchar(50) not null,
    time datetime not null,
    primary key(idx)
);

create table IF NOT EXISTS env(
    start_time datetime not null,
    end_time datetime not null,
    is_start varchar(1) not null,
    primary key(start_time)
);

insert into users (num, name, username, password, regtime, is_admin) VALUES (0000999, '관리자', 'admin', '56be6016a353b82df9c6bbf7070340d5437763c1d4ad7081d084cfbe96d89437943c95b1b8f7e9f8a89b68b314d3c7e268dbb545e56bc2e0ecd0652fda3f279c', now(), 'Y');
insert into notice (title, time) VALUES ('환영합니다', now());
insert into env (start_time, end_time, is_start) VALUES ('2021-03-20 18:00:00', '2021-03-20 20:00:00', 'N');

/* b@ngsiriadm$ */