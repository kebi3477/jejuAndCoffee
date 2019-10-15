<?php
    session_start();
    include('dbconn.php');
    include("Sendmail.php");
    $sendmail = new Sendmail();

    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sql = "select * from user where id = '$id'";
    $result = $dbcon->query($sql);

    if($result->num_rows == 1) {
        $row = mysqli_fetch_array($result);
        if($row['phone'] == $phone && $row['email'] == $email) { 
            $to="$row[email]";
            $from="Jeju & Coffee";
            $subject="Jeju & Coffee 비밀번호 전송";
            $body="오늘도 Jeju & Coffee를 사랑해주셔서 감사합니다. 당신의 비밀번호는 '$row[password]'입니다. 감사합니다.";
            $sendmail->send_mail($to, $from, $subject, $body);
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
?>