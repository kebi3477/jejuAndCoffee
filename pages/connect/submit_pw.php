<?php
    $pw = $_POST['submit_pw'];
    $submit_pw = strlen($pw);
    if(!ctype_alnum($pw)) {
        echo "noteng";
    }
    
    if($submit_pw < 7) {
        echo "7down";
    } else if($submit_pw > 18) {
        echo "18up";
    }
?>