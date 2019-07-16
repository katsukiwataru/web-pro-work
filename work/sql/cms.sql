CREATE USER testuser IDENTIFIED BY 'testuser';
GRANT ALL ON *.* TO myuser@'%' IDENTIFIED BY 'testuser' WITH GRANT OPTION;

create table category(
  id int auto_increment primary key,
  name varchar(255)
);

create table contents(
  id int auto_increment primary key,
  category_id int not null,
  foreign key (category_id)
    references category(id),
  title varchar(255)
  created varchar(255)
);

create table user (
  id int auto_increment primary key,
  name VARCHAR(255) not null,
  type varchar(255) not null,
);

create table permission(
  id int auto_increment primary key,
  name VARCHAR(255) not null,
)

create table user_permission(
  id int auto_increment primary key,
  user_id int not null,
  foreign key (user_id)
    references user(id),
  permission int not null,
  foreign key (permission)
    references permission(id),
);
