<?php
    include('dbconn.php');
    session_start();
    $id = $_SESSION['id'];
    $sql = "select * from user where id='$id'";
    $result = $dbcon->query($sql);
    if($row = mysqli_fetch_array($result)) {
        echo "$row[id],$row[email],$row[phone]";
    } else {
        echo "error";
    }
?>