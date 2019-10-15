<?php
    include('dbconn.php');
    
    $id = $_POST['sub_id'];
    $pass = $_POST['sub_pw'];
    $phone = $_POST['sub_phone'];
    $email = $_POST['sub_email'];
    $newfilename= $id.".jpg";              //새로운 이름
    // 중복확인
    $sql = "select * from user where id='$id'";
    $result = $dbcon->query($sql);
    if($id==NULL || $pass==NULL || $phone==NULL || $email==NULL) {
        echo "textnull";
    }
    $check = mysqli_num_rows($result);
    if($check) {
        echo "idcheck";
    }
    // 파일 업로드
    move_uploaded_file($_FILES['sub_img']['tmp_name'],"../../images/User_images/".$newfilename);
    // DB에 쑤셔넣기
    $sql = "insert into user ";
    $sql = $sql."values('','".$id."','".$pass."','".$phone."','".$email."',0)";
    
    if($result = $dbcon->query($sql)) {
        echo "submit";
    }
?>