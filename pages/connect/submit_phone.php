<?php
    include('dbconn.php');
    $submit_phone = $_POST['submit_phone'];
    $sql = "select * from user where phone='$submit_phone'";
    $result = $dbcon->query($sql);
    if($result->num_rows == 1) {
        echo "double";
    } else {
        echo "nodouble";   
    }
?>