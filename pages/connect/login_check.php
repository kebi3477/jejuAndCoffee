<?php
    session_start();
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $mysqli = mysqli_connect("localhost",'root','1234','coffee');
    
    $sql = "select * from user where id = '$id'";
    $result = $mysqli->query($sql);
    if($result->num_rows == 1) { //만약 아이디 있으면
        $row = $result->fetch_array(MYSQLI_ASSOC); //하나의 열을 배열로 가져오기
        if($row['password'] == $pw) { //배열안에 있는 패스워드가 입력한 패스워드랑 같으면
            $_SESSION['id'] = $id; //세션변수 안에 아이디 넣기
            $_SESSION['admin'] = $row['admin'];
            echo "success";
        } else {
            echo "첫번째 에러";
        }
    } else {
        echo "두번째 에러";
    }
?>