<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '1234';
    //mysql -uroot -p
    $dbcon = new mysqli($host, $user, $pass);
    $dbcon->set_charset("utf8");
    //DB선택
    mysqli_select_db($dbcon,'coffee');
?>