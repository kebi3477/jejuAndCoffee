<?php
    include('dbconn.php');
    session_start();
    $id = $_SESSION['id'];
    $cafe_num = $_POST['cafe_num'];
    $cafe_name = $_POST['cafe_name'];
    $comment = $_POST['comment'];
    $taste = $_POST['taste'];
    $mood = $_POST['mood'];
    $service = $_POST['service'];
    error_reporting(0);
    $date = date('Y-m-d H:i:s',time());
    if($comment==null||$taste==null||$mood==null||$service==null) {
        echo "null";
    } else {
        $sql = "insert into comments values('','$id','$cafe_num','$comment','$taste','$mood','$service','$date')";
        if($result = $dbcon->query($sql)) {
            echo "comment";
        }
        
        $sql2 = "select * from comments where id='$id' order by comment_num desc limit 1";
        $result2 = $dbcon->query($sql2);
        $row2 = mysqli_fetch_array($result2);
        $comment_num = $row2[comment_num];
        
        for($i = 0; $i < 5; $i++) {
            $newfilename = $id."_".$comment_num."_".$i.".jpg";
            $write_file = $_FILES["write_multi$i"];
            if(isset($write_file)) {
move_uploaded_file($write_file['tmp_name'],"../../images/Comment_images/$cafe_name/".$newfilename);
            }
        }
        
        
    }
?>