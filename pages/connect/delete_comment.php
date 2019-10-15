<?php
    include('dbconn.php');
    $comm_num = $_POST['comm_num'];
    $sql = "delete from comments where comment_num=$comm_num";
    $result = $dbcon->query($sql);
    echo "delete";
?>