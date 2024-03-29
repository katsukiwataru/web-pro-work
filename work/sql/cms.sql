CREATE USER testuser IDENTIFIED BY 'testuser';
GRANT ALL ON *.* TO myuser@'%' IDENTIFIED BY 'testuser' WITH GRANT OPTION;

create database cms default charset utf8;
use cms;

create table users(
    id int auto_increment not null primary key,
    username varchar(20) not null,
    password varchar(100) not null
);

create table permissions(
    id int auto_increment not null primary key,
    name varchar(20) not null
);

create table user_permissions(
    id int auto_increment not null primary key,
    user_id int not null,
    foreign key (user_id)
        references users(id),
    permission_id int not null,
    foreign key (permission_id)
        references permissions(id)
);

create table categories(
    id int auto_increment not null primary key,
    name varchar(255) not null
);

create table contents(
    id int auto_increment not null primary key,
    title varchar(50) not null,
    body varchar(255) not null,
    date timestamp default current_timestamp,
    category_id int not null,
    foreign key (category_id)
        references categories(id)
);

insert into permissions (name) values ("Administrator");
insert into permissions (name) values ("Editor");
insert into permissions (name) values ("Visitor");

insert into users (username, password) VALUES ("test", "test");
insert into user_permissions (user_id, permission_id) VALUES ("1", "1");
