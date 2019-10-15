<?php
    $num = $_POST['admin_num'];
    $name = $_POST['admin_name'];
    $address = $_POST['admin_address'];
    $phone = $_POST['admin_phone'];
    $theme = $_POST['admin_theme'];
    $time = $_POST['admin_time'];
    $hollyday = $_POST['admin_hollyday'];
    $price = $_POST['admin_price'];
    $parking = $_POST['admin_parking'];
    
    include('dbconn.php');
    $sql = "update cafe set cafe_name='$name',cafe_address='$address',cafe_phone='$phone',theme_num='$theme',cafe_time='$time',cafe_hollyday='$hollyday',cafe_price='$price',cafe_parking='$parking' where cafe_num = $num";
    $result = $dbcon->query($sql);
    echo "<script>history.back();</script>";
?>