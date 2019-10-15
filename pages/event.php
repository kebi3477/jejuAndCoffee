<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/event_style.css">
    <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../javascript/event_java.js"></script>
    <script>
        $(document).ready(function() {
            $('table #cafe_button').click(function(){
                alert("?");
                var event_form = $('#event_form')[0];
                var event_formdata = new FormData(event_form);
                $.ajax({
                    url:"connect/insert_event.php",
                    type:"POST",
                    data:event_formdata,
                    processData:false,
                    contentType:false,
                    success:function(response) {
                        if(response=="success") {
                            alert("확인되었습니다!");
                            location.reload();
                        } else {
                            alert(response);
                            alert("제대로 입력해주세요!");
                        }
                    }
                }); 
            });
            
            $('#admin_event > button').click(function() {
                $('#admin_popup').css('display','block');
            })
            $('#admin_close').click(function() {
                $('#admin_popup').css('display','none');
            })
        })
        
        
        
    </script>
</head>
<body>
    <div id="nav">    
<!--    nav-->
    <?php
        include('nav.php');
    echo "</div>";
    ?>
<!--    body-->
    <section>
        <header>
            <?php
                srand(mktime());
                $ran = (rand() % 3) + 1;
                echo "
                    <style>
                        section > header {
                            background-image: url(../images/Event_images/Header/event_".$ran.".jpg);
                        }
                    </style>
                ";
            ?>
            <h1>Jeju & Event</h1>
            <h3>제주 엔 커피와 함께하는 제주 카페들의 이벤트들</h3>
        </header>
<!--    popup-->
        <div id="popup">
           <div id="popup_close"></div>
            <div id="popup_main">
                <img src="">
            </div>
        </div>
<!--        Event-->
        <div id="admin_popup">
            <div id="admin_close"></div>
            <div id="admin_main">
                <h1>이벤트 추가하기</h1>
                <table id="admin_table">
                <form action="" method="post" id="event_form">
                    <tr>
                        <td>제목 :</td>
                        <td><input type="text" name="title"></td>
                    </tr>
                    <tr>
                        <td>부제목 :</td>
                        <td><input type="text" name="subtitle"></td>
                    </tr>
                    <tr>
                        <td>카페이름 :</td>
                        <td><input type="text" name="cafe_name" placeholder="카페이름과 동일하게 작성"></td>
                    </tr>
                    <tr>
                        <td>이미지 :</td>
                        <td><label for="event_img"><input type="file" name="event_img" id="event_img"></label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" value="추가" id="cafe_button"></td>
                    </tr>
                </form>
                </table>
            </div>
        </div>
        <?php
            error_reporting(0);
            $admin = $_SESSION['admin'];
            if($admin > 0) {
        ?>
        <div id="admin_event">
            <button>이벤트 추가하기</button>
        </div>
        <?php
            } else {}
        ?>
        <div id="contents">
            <div class="event_content">
               <?php
                    include('connect/dbconn.php');
                    $sql = "select * from event";
                    $result = $dbcon->query($sql);  
                    while($row = mysqli_fetch_array($result)) {
                        echo "
                        <div class='sub_content' id='$row[cafe_name]'>
                            <div id='event_img'>
                                <img src='../images/Event_images/$row[cafe_name].jpg' id='$row[cafe_num]'>
                            </div>
                            <h2>$row[event_title]</h2>
                            <h4>$row[event_subtitle]</h4>
                            <button>자세히 보기</button>
                        </div>
                        ";
                    }
                ?>
                
<!--
                <div class="sub_content" id="봄날">
                    <div id="event_img">
                        <img src="../images/Event_images/봄날.jpg" id="7">
                    </div>
                    <h2>당신의 하루는<br>'봄날'으로 부터</h2>
                    <h4>봄날과 함께하는 댓글 인증 이벤트!!</h4>
                    <button>자세히 보기</button>
                </div>
                <div class="sub_content" id="쌀다방">
                    <div id="event_img">
                        <img src="../images/Event_images/쌀다방.jpg" id="68">
                    </div>
                    <h2>쌀다방과 제주엔커피가<br>진행하는 이벤트</h2>
                    <h4>아메리카노의 사이즈를 업그레이드 하고싶으면?</h4>
                    <button>자세히 보기</button>
                </div>
                <div class="sub_content" id="최마담네">
                    <div id="event_img">
                        <img src="../images/Event_images/최마담네.png" id="48">
                    </div>
                    <h2>크루아상 증정<br>이벤트</h2>
                    <h4>최마담네 빵다방에서 크루아상 무료로 먹자!</h4>
                    <button>자세히 보기</button>
                </div>  
                <div class="sub_content" id="두둠칫">
                    <div id="event_img">
                        <img src="../images/Event_images/두둠칫.jpg" id="9">
                    </div>
                    <h2>두둠칫 두둠칫<br>이벤트</h2>
                    <h4>봄날, 테라로사 등 정해진 카페에서 댓글 달고 상품권받자!</h4>
                    <button>자세히 보기</button>
                </div>
-->
            </div>
        </div>    
    </section>
     <?php
            include 'footer.php';
        ?>
</body>
</html>