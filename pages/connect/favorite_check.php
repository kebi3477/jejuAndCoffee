<?php
    include('dbconn.php');
    session_start();
    $cafe_num = $_POST['cafe_num'];
    $id = $_SESSION['id'];
    $sql = "select * from cafe_favorite where cafe_num=$cafe_num and id='$id'";
    $result = $dbcon->query($sql);
    if($result->num_rows==1) {
        $sql = "delete from cafe_favorite where cafe_num=$cafe_num and id='$id'";
        $result = $dbcon->query($sql);
        echo "nfavorite";
    } else {
        $sql = "insert into cafe_favorite values('',$cafe_num,'$id',TRUE)";
        $result = $dbcon->query($sql);
        echo "favorite";
    }
?>