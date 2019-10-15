<?php
    session_start();
    include('dbconn.php');
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    $sql = "select * from user where phone = '$phone'";
    $result = $dbcon->query($sql);
    if($result->num_rows == 1) {
        $row = mysqli_fetch_array($result);
        if($row['email'] == $email) { 
            echo "$row[id]";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
?>