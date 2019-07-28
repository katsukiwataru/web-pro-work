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

## mysql
```
source work/sql/cms.sql
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

#### カテゴリーテーブル作成
```
create table categories(
    id int auto_increment not null primary key,
    name varchar(30) not null
);
```
#### コンテンツテーブル作成
```
create table contents(
    id int auto_increment not null primary key,
    category_id int not null,
    title varchar(50) not null,
    body varchar(255) not null,
    date timestamp default current_timestamp,
    foreign key (category_id)
        references categories(id)
);
```
#### ユーザーテーブル作成
```
create table users(
    id int auto_increment not null primary key,
    username varchar(20) not null,
    password varchar(100) not null
);
```

#### 権限テーブル作成
```
create table permissions(
    id int auto_increment not null primary key,
    name varchar(20) not null
);
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
create table user_permissions(
    id int auto_increment not null primary key,
    user_id int not null,
    permission_id int not null,
    foreign key (user_id)
        references users(id),
    foreign key (permission_id)
        references permissions(id)
);
```

#### 権限の一覧を追加
```
INSERT INTO permissions(name) VALUES ('administrator'), ('editor'), ('viewer');
```
