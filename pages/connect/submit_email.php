<?php
    include('dbconn.php');
    $submit_email = $_POST['submit_email'];
    $sql = "select * from user where email='$submit_email'";
    $result = $dbcon->query($sql);
    if($result->num_rows == 1) {
        echo "double";
    } else {
        echo "nodouble";   
    }
?>