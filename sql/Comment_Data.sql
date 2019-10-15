create table comments(
    comment_num int primary key auto_increment,
    id char(20),
    cafe_num int,
    comments_comm varchar(1000),
    taste varchar(10),
    mood varchar(10),
    service varchar(10),
    comments_day datetime
);
