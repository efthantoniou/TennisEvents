create table user(
    user_id int auto_increment PRIMARY KEY,
    f_name varchar(30),
    l_name varchar(20),
    date_bi varchar(30),
    gender varchar(6),
    username varchar(30),
    password_u char(128),
    email varchar(40),
    photo_path varchar(100),
    priority varchar(20),
);