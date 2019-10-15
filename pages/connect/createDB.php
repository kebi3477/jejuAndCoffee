<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '1234';
    //mysql -uroot -p
    $dbcon = new mysqli($host, $user, $pass);
    $dbcon->set_charset("utf8");
    
    $sql = "drop database coffee";
    $result = $dbcon->query($sql);
    
    $sql = "create database coffee";
    $result = $dbcon->query($sql);

    mysqli_select_db($dbcon,'coffee');
    
    $sql = "create table user(
                num int(11) primary key auto_increment,
                id char(20),
                password char(20),
                phone char(13),
                email varchar(50)
            );";
    $result = $dbcon->query($sql);

    $sql = "create table theme(
                theme_num int primary key,
                theme_name varchar(10),
                theme_text varchar(100)
            );";
    $result = $dbcon->query($sql);
    
    $sql = "create table location(
                cafe_num int primary key,
                locationX double,
                locationY double
            );";
    $result = $dbcon->query($sql);

    $sql = "create table cafe_like(
                like_num int primary key auto_increment,
                cafe_num int,
                id varchar(20),
                likes boolean
            );";
    $result = $dbcon->query($sql);

    $sql = "create table cafe_favorite(
                favorite_num int primary key auto_increment,
                cafe_num int,
                id varchar(20),
                favorites boolean
            );";
    $result = $dbcon->query($sql);
    
    $sql = "create table comments(
                comment_num int primary key auto_increment,
                id char(20),
                cafe_num int,
                comments_comm varchar(1000),
                taste varchar(10),
                mood varchar(10),
                service varchar(10),
                comments_day datetime
            );";
    $result = $dbcon->query($sql);
    
    $sql = "create table event(
                event_num int primary key auto_increment,
                event_title varchar(50),
                event_subtitle varchar(100),
                cafe_num int,
                cafe_name varchar(50)
            );";
    $result = $dbcon->query($sql);

    $sql = "create table cafe(
                cafe_num int primary key,
                cafe_name varchar(50),
                cafe_address varchar(100),
                cafe_phone varchar(50),
                theme_num varchar(100),
                cafe_time varchar(100),
                cafe_hollyday varchar(100),
                cafe_price varchar(100),
                cafe_parking varchar(100)
            );";
    $result = $dbcon->query($sql);

    $sql = "create table adver(
                adver_num int primary key auto_increment,
                adver_name varchar(100),
                adver_phone varchar(100),
                adver_email varchar(100),
                adver_cafename varchar(100),
                adver_address varchar(100),
                adver_content varchar(1000)
            );";
    $result = $dbcon->query($sql);
?>