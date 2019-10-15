<?php
    include('dbconn.php');
    session_start();
    $id = $_SESSION['id'];
    $pw = $_POST['user_pw'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_phone'];
    $newfilename= $id.".jpg";  
    
    $sql = "select * from user where id='$id'";
    $result = $dbcon->query($sql);
    if($result->num_rows == 1) {
        $sql = "update user set password='$pw', email='$email', phone='$phone' where id='$id'";
        move_uploaded_file($_FILES['user_img']['tmp_name'],"../../images/User_images/".$newfilename);
        $result = $dbcon->query($sql);
        echo "success";
    } else {
        echo "error";
    }
?>