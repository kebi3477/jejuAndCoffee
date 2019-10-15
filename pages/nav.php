<?php
    session_start();
    $timeout = 60 ;
    $logout_redirect_url = "connect/logout.php";
    $timeout = $timeout * 10 ; // Converts minutes to seconds 
    if (isset( $_SESSION [ 'start_time' ])) { 
    $elapsed_time = time () - $_SESSION [ 'start_time' ]; 
        if ( $elapsed_time >= $timeout ) { 
            session_destroy (); 
            header ( "Location: $logout_redirect_url" ); 
        }
    }
    $_SESSION [ 'start_time' ] = time (); 
?>
<head>
    <title>Jeju & Coffee</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/subcss/nav_style.css">
    <script type="text/javascript" src="../javascript/subjava/nav_java.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/alertBox.css">
    <script type="text/javascript" src="../javascript/alertBox.js"></script>
    <script src="//cdn.jsdelivr.net/jquery.color-animation/1/mainfile"></script>
    <script>
        $login_event = function() {
            $('body').alertBox({
                title: '로그인 하시겠습니까?',
                rTxt: '확인',
                lTxt: '취소',
                rCallback:function() {
                    var id = $("#id").val();
                    var pw = $("#pw").val();
                    $.ajax({
                        url:"connect/login_check.php",
                        type:"POST",
                        data:"id="+id+"&pw="+pw,
                        success:function(response){
                            if(response == "success") {
                                alert("로그인 성공!");
                                location.reload();
                            } else {
                                alert("아이디나 비밀번호를 확인해주세요.");
                            }
                        }
                    });
                }
            })
        }
        $(document).ready(function() {
            $('#login_button').click(function() {
                 $login_event();
            });
            $('.enter_id').keypress(function(e) {
                if(e.which == 13) {
                    $login_event();
                }
            });
            $('.loging_cafe_c > img').click(function() {
                var cafe_num = $(this).attr('id');
                $.ajax({
                    url:"connect/favorite_check.php",
                    type:"POST",
                    data:"cafe_num="+cafe_num,
                    success:function(response) {
                        if(response == "nfavorite") {
                            location.reload();
                        }
                    }
                });
            });
            
            var id_check = false;
            var pw_check = false;
            var pw2_check = false;
            var phone_check = false;
            var email_check = false;
            
            
            $('#submit_button').click(function() {
                if(id_check == true && pw_check == true && pw2_check == true && phone_check == true && email_check == true) {
                    $('body').alertBox({
                        title: '회원가입 하시겠습니까?',
                        lTxt: '취소',
                        rTxt: '가입하기',
                        rCallback: function(){
                            var submit_form = $('#submit_form')[0];
                            var submit_formdata = new FormData(submit_form);
                            $.ajax({
                                url:"connect/submit.php",
                                type:"POST",
                                data:submit_formdata,
                                processData:false,
                                contentType:false,
                                success:function(response) {
                                    if(response=="submit") {
                                        location.reload();
                                    }                        
                                }
                            });
                        }
                    })
                }
            });
        
            $("#submit_id").keyup(function() {
                var submit_id = $('#submit_id').val();
                if(submit_id=="") {
                    $("#check_id").text("아이디를 입력해주세요.");
                    id_check = false;
                } else {
                    $.ajax({
                        url:"connect/submit_id.php",
                        type:"POST",
                        data:"submit_id="+submit_id,
                        success:function(response) {
                            if(response=="double") {
                                $("#check_id").text("중복된 아이디입니다.");
                                id_check = false;
                            }else if(response=="noteng") {
                                $("#check_id").text("영어, 숫자로만 입력해주십시오."); id_check = false;
                            }else if(response=="7down") {
                                $("#check_id").text("7자 이하입니다.");
                                id_check = false;
                            }else if(response=="18up") {
                                $("#check_id").text("18자 이상입니다.");
                                id_check = false;
                            }else {
                                $("#check_id").text("사용할 수 있는 아이디입니다.");
                                id_check = true;
                            }
                        }
                    });   
                }
            });
            
            $("#submit_pw").keyup(function() {
                var submit_pw = $('#submit_pw').val();
                if(submit_pw=="") {
                    $("#check_pw").text("비밀번호를 입력해주세요.");
                    pw_check = false;
                } else {
                    $.ajax({
                        url:"connect/submit_pw.php",
                        type:"POST",
                        data:"submit_pw="+submit_pw,
                        success:function(response) {
                            if(response=="noteng") {
                                $("#check_pw").text("영어, 숫자로만 입력해주십시오."); pw_check = false;  
                            }else if(response=="7down") {
                                $("#check_pw").text("7자 이하입니다.");
                                pw_check = false;
                            }else if(response=="18up") {
                                $("#check_pw").text("18자 이상입니다.");
                                pw_check = false;
                            }else {
                                $("#check_pw").text("사용할 수 있는 비밀번호입니다.");
                                pw_check = true;
                            }
                        }
                    });   
                }
            });
            
            $("#submit_pw_re").keyup(function() {
                var submit_pw = $('#submit_pw').val();
                var submit_pw_re = $('#submit_pw_re').val();
                if(submit_pw_re=="") {
                    $("#check_pw2").text("비밀번호를 한번 더 입력해주세요.");
                    pw2_check = false;
                } else if(submit_pw==submit_pw_re){
                    $("#check_pw2").text("비밀번호가 같습니다");
                    pw2_check = true;
                } else {
                    $("#check_pw2").text("비밀번호가 다릅니다");
                    pw2_check = false;
                }
            });
            
            $("#submit_phone").keyup(function() {
                var regExp = /^01([0|1|6|7|8|9]?)?([0-9]{3,4})?([0-9]{4})$/;
                var submit_phone = $('#submit_phone').val();
                if(!regExp.test(submit_phone)) {
                    $("#check_phone").text("휴대폰번호를 제대로 입력해주세요.");
                    phone_check = false;
                } else {
                    $.ajax({
                        url:"connect/submit_phone.php",
                        type:"POST",
                        data:"submit_phone="+submit_phone,
                        success:function(response) {
                            if(response=="double"){
                                $("#check_phone").text("중복된 휴대폰번호입니다.");   
                                phone_check = false;
                            } else {
                                $("#check_phone").text("사용가능한 휴대폰번호입니다.");
                                phone_check = true;
                            }
                        }
                    });
                }
            });
            
            $("#submit_email").keyup(function() {
                var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
                var submit_email = $('#submit_email').val();
                if(!regExp.test(submit_email)) {
                    $("#check_email").text("이메일을 제대로 입력해주세요.");
                    email_check = false;
                } else {
                    $.ajax({
                        url:"connect/submit_email.php",
                        type:"POST",
                        data:"submit_email="+submit_email,
                        success:function(response) {
                            if(response=="double"){
                                $("#check_email").text("중복된 이메일입니다.");     
                                email_check = false;
                            } else {
                                $("#check_email").text("사용가능한 이메일입니다.");
                                email_check = true;
                            }
                        }
                    });
                }
            });
            
            $('#id_search_button').click(function() {
                var phone= $("#id_search_phone").val();
                var email = $("#id_search_email").val();
                $.ajax({
                    url:"../pages/connect/id_search.php",
                    type:"POST",
                    data:"email="+email+"&phone="+phone,
                    success:function(response){
                        if(response == "error") {
                            alert("가입한 회원이 아닙니다! 다시한번 확인해주세요.");
                        } else {
                            alert("당신의 아이디는 '"+response+"' 입니다!");
                        }
                    }
                });
            });

            $('#pw_search_button').click(function() {
                var id = $('#pw_search_id').val();
                var phone= $("#pw_search_phone").val();
                var email = $("#pw_search_email").val();
                $.ajax({
                    url:"../pages/connect/pw_search.php",
                    type:"POST",
                    data:"id="+id+"&email="+email+"&phone="+phone,
                    success:function(response){
                        if(response == "error") {
                            alert("가입한 회원이 아닙니다! 다시한번 확인해주세요.");
                        } else {
                            alert("등록된 이메일로 비밀번호가 전송되었습니다.");
                        }
                    }
                });
            });
            
            $('#user_modi').click(function() {
                $.ajax({
                    url:"../pages/connect/user_modify.php",
                    type:"POST",
                    data:"",
                    success:function(response){
                        if(response == "error") {
                            alert("가입한 회원이 아닙니다! 다시한번 확인해주세요.");
                        } else {
                            var arr = response.split(',');
                            $('#user_id').val(arr[0]);
                            $('#user_email').val(arr[1]);
                            $('#user_phone').val(arr[2]);
                        }
                    }
                });
            });
            
            $('#user_button2').click(function() {
                var user_form = $('#user_revise_form')[0];
                var user_formdata = new FormData(user_form);
                $('body').alertBox({
                    title: '정보를 수정 하시겠습니까?',
                    rTxt: '확인',
                    lTxt: '취소',
                    rCallback:function() {
                        $.ajax({
                            url:"../pages/connect/user_modify2.php",
                            type:"POST",
                            data:user_formdata,
                            processData:false,
                            contentType:false,
                            success:function(response){
                                if(response == "error") {
                                    alert("정보를 다시 확인해주세요!");
                                } else {
                                    alert(response);
                                    alert("정보 수정 완료!");
                                    location.reload();
                                }
                            }
                        });
                    }
                });
                
            });
        });
    </script>
</head>
<body>
    <nav>  
        <div id="logo"><a href="index.php"><img src="../images/Main_images/Logo.png" alt="Logo"></a></div>
        <?php
            $url = $_SERVER['REQUEST_URI'];
            if($url != '/JejuAndCoffee/pages/index.php') {
        ?>
        <div id="nav_search">
            <form action="#" method="post" onsubmit="return false">
                <img src="../images/Main_images/Search.png">
                <input type="text" name="search" id="search_text" placeholder="지역 또는 카페...">
            </form>
        </div>
        <?php
            }else {}
        ?>
        <ul id="n_menu">
            <li><a href="theme.php">테마별보기</a></li>
            <li><a href="event.php">이벤트</a></li>
            <li><img src="../images/Main_images/User.png" alt="User"></li>
            <li><img src="../images/Main_images/Language.png" alt="Language"></li>
        </ul>
        <div id="opacity"></div> 
    </nav>
    <div id="login_search">
        <div id="id_search">
            <h1>아이디&비밀번호 찾기</h1>
            <div id="search_change">
                <h2 id="change_id">아이디 찾기</h2>
                <h2 id="change_pw">비밀번호 찾기</h2>
            </div>
            <div id="id_after" class="search_after">
                <p>가입할 때 등록한 휴대폰 번호와 메일 주소를 입력해주세요.</p>
                <div class="search_div">
                    <h3>Phone</h3>
                    <input type="text" name="id_search_phone" class="search_text" 
                    maxlength="11" id="id_search_phone">
                </div>
                <div class="search_div">
                    <h3>E-mail</h3>
                    <input type="text" name="id_search_email" class="search_text" maxlength="20" id="id_search_email">
                </div>
                <input type="button" value="확인" class="search_button" id="id_search_button">
                <input type="button" value="취소" class="search_button search_cancel">
            </div>
            <div id="pw_after" class="search_after">
                <p>비밀번호는 가입시 등록한 메일 주소로 알려드립니다. 가입할 때 등록한 아이디, 이름, 메일 주소를 입력해주세요.</p>
                <div class="search_div">
                    <h3>Id</h3>
                    <input type="text" name="search_id" class="search_text" id="pw_search_id">
                </div>
                <div class="search_div">
                    <h3>Phone</h3>
                    <input type="text" name="search_name" class="search_text" id="pw_search_phone">
                </div>
                <div class="search_div">
                    <h3>E-mail</h3>
                    <input type="text" name="search_phone" class="search_text" id="pw_search_email">    
                </div>
                <input type="button" value="확인" class="search_button" id="pw_search_button">
                <input type="button" value="취소" class="search_button search_cancel">
            </div>
        </div>
    </div>
<?php
    if(!isset($_SESSION['id'])) {
?>
    <div id="login">
        <div id="login_close"></div>
        <div id="login_main">
            <a href="#"><img src="../images/Main_images/Logo2.png" alt="Logo"></a>
            <div id="login_main2">
                <form method="post" action="connect/login_check.php">
                    <div class="login_text">
                        <img src="../images/Submit_images/icon/name.png">
                        <input type="text" name="id" id="id" placeholder="ID" class="enter_id">
                    </div>
                    <div class="login_text">
                        <img src="../images/Submit_images/icon/password.png">
                        <input type="password" name="pw" id ="pw" placeholder="PASSWORD" class="enter_id">
                    </div>
                    <input class="login_button" type="button" value="로그인" id="login_button">
                    <input class="login_search" id="search_id" type="button" value="아이디 찾기 & 비밀번호 찾기">
                    <input class="login_button2" type="button" value="회원가입">
                </form>
            </div>
        </div>
    </div>
<?php
    } else {
?>    
    <div id="login">
        <div id="login_close"></div>
        <div id="login_main">
            <div id="loging_main">
                <h1 id="loging_h1">My Page</h1>
                <div id="login_profile">
                    <?php
                        $file_name = $_SESSION['id'].'.jpg';
                        $file_url = '../images/User_images/'.$file_name;
                        if(file($file_url)) {
                            echo "
                                <style>
                                    #login_profile {
                                        background-image: url($file_url);
                                    }
                                </style>
                            ";
                        } else {
                            echo "
                                <style>
                                    #login_profile {
                                        background-image: url('../images/Submit_images/icon/camera.png');
                                    }
                                </style>
                            ";
                        }
                    ?>
                </div>
                <?php
                    echo "<h2 id='loging_name'>".$_SESSION['id']."</h2>";
                ?>
            </div>
            <h2 id="loging_h2">My Pick Cafe</h2>
            <div id="loging_pick">
                <div id="loging_favorite">
                    <?php
                        include('connect/dbconn.php');
                        $id = $_SESSION['id'];
                        $sql = "select * from cafe_favorite f, cafe c where f.id='$id' and f.cafe_num=c.cafe_num order by f.favorite_num";
                        $result = $dbcon->query($sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo ("
                            <style>
                                .loging_cafe_c > a > #$row[cafe_name]_favorite {
                                    background-image: url('../images/Cafe_images/$row[cafe_name]/$row[cafe_name]_1.jpg');
                                }
                            </style>
                            <div class='loging_cafe_c'>
                                <a href='cafe_detail.php?cafe_num=$row[cafe_num]'>
                                <div class='loging_cafe' id='$row[cafe_name]_favorite'></div><h3>$row[cafe_name]</h3></a>
                            <h4>$row[cafe_address]</h4>
                            <img src='../images/Cafe_images/trash.png' id='$row[cafe_num]'>
                            </div>
                            ");
                        }
                    ?>  
                </div>
                <div id="loging_button">
                    <a><div class="loging_button" id="user_modi">
                        <img src="../images/Main_images/Modity.png">&nbsp;&nbsp;회원정보수정
                    </div></a>
                    <a href="../pages/connect/logout.php"><div class="loging_button">
                        <img src="../images/Main_images/Logout.png">&nbsp;&nbsp;로그아웃
                    </div></a>
                </div>
            </div>
        </div>
    </div>
<?php   
    }
?>
    <div id="user_revise">
        <img src="../images/Submit_images/icon/close.png">
        <div id="user_revise_main">
            <h1>프로필 수정</h1>
            <form method="post" action="" enctype="multipart/form-data" id="user_revise_form">
            <div id="user_revise_profile">
                <?php
                    echo "<style>
                        #user_profile {
                            background-image: url('../images/User_images/$_SESSION[id].jpg');
                        }
                    </style>";
                ?>
                <div id="user_profile" class="profile">
                    <label id="user_camera" for="user_img">
                       <input type="file" name="user_img" id="user_img" accept="image/jpeg,image/png" onchange="readURL(this);">
                    </label>
                </div>
            </div>
            <div id="user_revise_content">
                <div class="user_content">
                    <h2>ID</h2>
                    <input type="text" id="user_id" name="user_id" class="user_input" disabled>
                </div>
                <div class="user_content">
                    <h2>PASSWORD</h2>
                    <input type="password" id="user_pw" name="user_pw" class="user_input">
                </div>
                <div class="user_content">
                    <h2>RE-PASSWORD</h2>
                    <input type="password" id="user_pw_re" class="user_input">
                </div>
                <h2>개인정보</h2>
                <div class="user_content">
                    <h2>E-mail</h2>
                    <input type="text" id="user_email" name="user_email" class="user_input">
                </div>
                <div class="user_content">
                    <h2>Phone</h2>
                    <input type="text" id="user_phone" name="user_phone" class="user_input">
                </div>
                <div id="user_button">
                    <input type="button" value="수정 완료" id="user_button2">
                </div>
            </div>
            </form>
        </div>
    </div>
    <div id="submit">
        <img src="../images/Submit_images/icon/close.png" id="sub_close">
        <div id="submit_main">
            <div id="submit_header">
            <img src="../images/Submit_images/header1.jpg">
            <a href="../pages/index.php"><img src="../images/Submit_images/jeju_and_coffee_logo.png" id="sub_logo"></a>
            </div>
            <div id="submit_body">
                <form method="post" action="" enctype="multipart/form-data" id="submit_form">
                    <div id="submit_img" class="profile">
                        <label id="submit_camera" for="sub_img">
                           <input type="file" id="sub_img" name="sub_img" class="sub_img" accept="image/jpeg,image/png" onchange="readURL(this);">
                        </label>
                    </div>
                    <table>
                        <tr>
                            <td><img src="../images/Submit_images/icon/name.png"></td>
                            <td><input type="text" name="sub_id" id="submit_id" class="sub_text" placeholder="ID" maxlength="20"><p id="check_id">ID는 7~18자로 작성해주세요.(영문,숫자)</p></td>
                        </tr>
                        <tr>
                            <td><img src="../images/Submit_images/icon/password.png"></td>
                            <td><input type="password" name="sub_pw" id="submit_pw" class="sub_text" placeholder="PASSWORD" maxlength="20"><p id="check_pw">PASSWORD는 7~18자로 작성해주세요.(영문,숫자)</p></td>
                        </tr>
                        <tr>
                            <td><img src="../images/Submit_images/icon/password.png"></td>
                            <td><input type="password" name="sub_pw_re" id="submit_pw_re" class="sub_text" placeholder="RE-PASSWORD" maxlength="20"><p id="check_pw2">비밀번호를 한번 더 입력해주세요.</p></td>
                        </tr>
                        <tr>
                            <td><img src="../images/Submit_images/icon/mobile.png"></td>
                            <td><input type="text" name="sub_phone" id="submit_phone" class="sub_text" placeholder="PHONE-NUMBER" maxlength="11"><p id="check_phone">휴대폰 번호를 입력해주세요.</p></td>
                        </tr>
                        <tr>
                            <td><img src="../images/Submit_images/icon/email.png"></td>
                            <td><input type="text" name="sub_email" id="submit_email" class="sub_text" placeholder="E-MAIL" maxlength="50"><p id="check_email">이메일을 입력해주세요.</p></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" value="회원가입" id="submit_button"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<!-- 언어번역-->
    <div id="lang_change">
       <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'ko'}, 'google_translate_element');
        }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <div id="google_translate_element"></div>
    </div>
</body>