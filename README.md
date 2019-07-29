# web-pro-work

## コンテナ一覧

```bash
docker container ps
```

## コンテナに入る

```bash
docker container exec -it コンテナID bash
```

## mysqlログイン

```root
mysql -u root -h db
```

## mysql

```sql
source work/sql/cms.sql
```

## mysqlユーザー作成

```sql
CREATE USER testuser IDENTIFIED BY 'testuser';
GRANT ALL ON *.* TO myuser@'%' IDENTIFIED BY 'testuser' WITH GRANT OPTION;
```

## databese一覧

```sql
show databases;
```

## databese選択

```sql
use cms;
```

## databese作成

```sql
create database cms default charset utf8;
```

## table一覧

```sql
show tables;
```

### Another Heading table作成

#### カテゴリーテーブル作成

```sql
create table categories(
    id int auto_increment not null primary key,
    name varchar(30) not null
);
```

#### コンテンツテーブル作成

```sql
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

```sql
create table users(
    id int auto_increment not null primary key,
    username varchar(20) not null,
    password varchar(100) not null
);
```

#### 権限テーブル作成

```sql
create table permissions(
    id int auto_increment not null primary key,
    name varchar(20) not null
);
```

#### ユーザーテーブル作成

```sql
create table user (
  id int auto_increment primary key,
  name VARCHAR(255) not null,
  type varchar(255) not null,
);
```

#### ユーザー権限テーブル作成

```sql
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

```sql
INSERT INTO permissions(name) VALUES ('administrator'), ('editor'), ('viewer');
```
