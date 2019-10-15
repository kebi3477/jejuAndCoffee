<?php
    include('dbconn.php');
    $id = $_POST['submit_id'];
    $submit_id = strlen($id);
    $sql = "select * from user where id='$id'";
    $result = $dbcon->query($sql);

    if($submit_id < 7) {
        echo "7down";
    } else if(!ctype_alnum($id)) {
        echo "noteng";
    } else if($submit_id > 18) {
        echo "18up";
    } else if($result->num_rows==1) {
        echo "double";
    }

    
?>