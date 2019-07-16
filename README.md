# web-pro-work

## コンテナ一覧
```
docker container ps
```

## コンテナに入る
```
docker container exec -it コンテナID bash
```

## mysqlログイン
```
mysql -u root -h db
```

## mysqlユーザー作成
```
CREATE USER testuser IDENTIFIED BY 'testuser';
GRANT ALL ON *.* TO myuser@'%' IDENTIFIED BY 'testuser' WITH GRANT OPTION;
```

## databese一覧
```
show databases;
```

## databese選択
```
use cms;
```

## databese作成
```
create database cms default charset utf8;
```

## table一覧
```
show tables;
```

## table作成

#### カテゴリー作成
```
create table category(
  id int auto_increment primary key,
  name varchar(255)
);
```
#### コンテンツテーブル作成
```
create table contents(
  id int auto_increment primary key,
  category_id int not null,
  foreign key (category_id)
    references category(id),
  title varchar(255)
  created varchar(255)
);
```
#### ユーザーテーブル作成
```
create table user(
  id int auto_increment primary key,
  name varchar(255)
);
```

#### 権限テーブル作成
```
create table user_permission(
  id int auto_increment primary key,
  name VARCHAR(255) not null,
)
```

#### ユーザーテーブル作成
```
create table user (
  id int auto_increment primary key,
  name VARCHAR(255) not null,
  type varchar(255) not null,
);
```

#### ユーザー権限テーブル作成
```
create table user_infomation(
  id int auto_increment primary key,
  user_id int not null,
  foreign key (user_id)
    references user(id),
  user_permission int not null,
  foreign key (user_permission)
    references user_permission(id),
);
```
