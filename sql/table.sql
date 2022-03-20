create table collections
(
    id    int          null,
    name  varchar(255) null,
    value varchar(255) null,
    image varchar(255) null
)
    charset = utf8mb4;

create table orders
(
    id      int auto_increment
        primary key,
    user_id int  null,
    items   json null
)
    charset = utf8mb4;

create index orders_users_id_fk
    on orders (user_id);

create table products
(
    id            int          null,
    name          varchar(255) null,
    image         varchar(255) null,
    price         int          null,
    model         varchar(255) null,
    year          int          null,
    country       varchar(255) null,
    collection_id int          null
)
    charset = utf8mb4;

create table users
(
    id         int auto_increment
        primary key,
    name       varchar(255)         null,
    surname    varchar(255)         null,
    patronymic varchar(255)         null,
    login      varchar(255)         null,
    password   varchar(255)         null,
    email      varchar(255)         null,
    is_admin   tinyint(1) default 0 null,
    constraint users_email_uindex
        unique (email),
    constraint users_login_uindex
        unique (login)
)
    charset = utf8mb4;


