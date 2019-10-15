<?php
    include('dbconn.php');
    $name = $_POST['adver_name'];
    $phone = $_POST['adver_phone'];
    $email = $_POST['adver_email'];
    $cafe_name = $_POST['adver_cafe_name'];
    $address = $_POST['adver_address'];
    $comment = $_POST['adver_comment'];

    if($name==NULL||$phone==NULL||$email==NULL||$cafe_name==NULL||$address==NULL||$comment==NULL) {
        echo "null";
    } else {
        $sql = "insert into adver values ('','$name','$phone','$email','$cafe_name','$address','$comment')";
        $result = $dbcon->query($sql);
        echo "success";
        error_reporting(0);
        for($i = 0; $i < 10; $i++) {
            $newfilename = $cafe_name."_".$i.".jpg";
            $write_file = $_FILES["adver_multi$i"];
            if(isset($write_file)) {
move_uploaded_file($write_file['tmp_name'],"../../images/Adver_images/Cafe_img/".$newfilename);
            }
            $write_file2 = $_FILES["adver_poster$i"];
            if(isset($write_file2)) {
move_uploaded_file($write_file2['tmp_name'],"../../images/Adver_images/Poster/".$newfilename);
            }
        }
    }
    
?>