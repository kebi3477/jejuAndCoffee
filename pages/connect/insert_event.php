<?php
    include('dbconn.php');
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $cafe_name = $_POST['cafe_name'];
    $newfilename = $cafe_name.".jpg";
//    error_reporting(0);
    $sql = "select * from cafe where cafe_name='$cafe_name'";
    $result = $dbcon->query($sql);
    $row = mysqli_fetch_array($result);
    $cafe_num = $row['cafe_num'];
    $sql2 = "insert into event values('','$title','$subtitle','$cafe_num','$cafe_name')";
    $result2 = $dbcon->query($sql2);
    move_uploaded_file($_FILES['event_img']['tmp_name'],"../../images/Event_images/".$newfilename);
    echo 'success';
?>