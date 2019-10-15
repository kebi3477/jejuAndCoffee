<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/cafe_detail_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Main_images/Logo2.png">
    <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../javascript/cafe_detail_java.js"></script>
    <!--    slick-->
     <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css" />
    <script type="text/javascript" src="http://kenwheeler.github.io/slick/slick/slick.min.js"></script>
<!--    지도-->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=3b05253c09dfc17b87ff03bbf4113f1c"></script>
<!--    ajax-->
    <script type="text/javascript">
        var getParam = function(key){
            var _parammap = {};
            document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
                function decode(s) {
                    return decodeURIComponent(s.split("+").join(" "));
                }
                _parammap[decode(arguments[1])] = decode(arguments[2]);
            });
            return _parammap[key];
        };
        
        var likeajax = function() {
            var cafe_num = getParam("cafe_num");
            $.ajax({
                url:"connect/like_check.php",
                type:"POST",
                data:"cafe_num="+cafe_num,
                success:function(response){
                    if(response == "like") {
                        $('#cafe_icon > #icon_like').css('opacity','1');
                    } else if(response == "nlike") {
                        $('#cafe_icon > #icon_like').css('opacity','0.2');
                    }
                }
            });
        }
        
        var favoriteajax = function() {
            var cafe_num = getParam("cafe_num");
            $.ajax({
                url:"connect/favorite_check.php",
                type:"POST",
                data:"cafe_num="+cafe_num,
                success:function(response){
                    if(response == "favorite") {
                        $('#cafe_icon > #icon_favorite').css('opacity','1');
                    } else if(response == "nfavorite") {
                        $('#cafe_icon > #icon_favorite').css('opacity','0.2');
                    }
                    location.reload();
                }
            });
        }
        
        var deletecom = function(comm_num) {
            $.ajax({
                url:"../pages/connect/delete_comment.php",
                type:"POST",
                data:"comm_num="+comm_num,
                success:function(response) {
                    if(response == "delete") {
                        location.reload();   
                    }
                }
            });
        }
        
        function readURL2(input) {
            var length = $(".write_img").length;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(input).parent('.write_img').css('background-image','url("' + e.target.result + '")');
                };
                reader.readAsDataURL(input.files[0]);
            }
            if(length != 5) {
                $("<label></label>").attr({id:"write_file"+length,class:"write_img",for:"write_input"+length}).appendTo($('#write_img'));
                $("<input></input>").attr({type:"file",id:"write_input"+length,class:"write_file",accept:"image/jpeg,image/png",name:"write_multi"+length,onchange:"readURL2(this)"}).appendTo($('#write_file'+length));
            }
        }
    </script>
</head>
<body>
    <div id="nav">
<!--    nav-->
    <?php
        include('nav.php');
        echo "</div>";
        include('connect/dbconn.php');
        $cafe_num = $_GET['cafe_num'];
        $sql = "select * from cafe where cafe_num='$cafe_num'";
        $result = $dbcon->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
    <div id="write">
       <?php
            if(isset($_SESSION['id'])) { 
        ?>
        <div id="write_main">
            <form method="post" enctype="multipart/form-data" id="write_form" action="">
               <?php
                    $id = $_SESSION['id'];
                    echo "<h1>$row[cafe_name]<br>리뷰 남기기!
                        <input type='hidden' name='cafe_num' value='$row[cafe_num]'>
                        <input type='hidden' name='cafe_name' value='$row[cafe_name]'>
                    </h1>";
                ?>    
                <div class="score">
                    <h2>맛</h2>
                    <label for="taste1"></label>
                    <input type="radio" value="bad" name="taste" id="taste1" class="radio taste bad">
                    <label for="taste2"></label>
                    <input type="radio" value="normal" name="taste" id="taste2" class="radio taste normal">
                    <label for="taste3"></label>
                    <input type="radio" value="good" name="taste" id="taste3" class="radio taste good">
                </div><br>
                <div class="score">
                    <h2>분위기</h2>
                    <label for="mood1"></label>
                    <input type="radio" value="bad" name="mood" id="mood1" class="radio mood bad">
                    <label for="mood2"></label>
                    <input type="radio" value="normal" name="mood" id="mood2" class="radio mood normal">
                    <label for="mood3"></label>
                    <input type="radio" value="good" name="mood" id="mood3" class="radio mood good">
                </div><br>
                <div class="score">
                    <h2>서비스</h2>
                    <label for="service1"></label>
                    <input type="radio" value="bad" name="service" id="service1" class="radio service bad">
                    <label for="service2"></label>
                    <input type="radio" value="normal" name="service" id="service2" class="radio service normal">
                    <label for="service3"></label>
                    <input type="radio" value="good" name="service" id="service3" class="radio service good">
                </div>
                <div id="profile">
                    <div id="write_profile"></div>
                    <?php
                        echo "<style>
                            #write_profile {
                                background-image: url('../images/User_images/$id.jpg');
                            }
                        </style>";
                        $sql = "select * from user where id='$id'";
                        $result = $dbcon->query($sql);
                        $row2 = mysqli_fetch_array($result);
                        echo "<p>$row2[id]</p>";
                    ?>
                </div>
                <textarea placeholder="마음껏 입력해주세요..." name="comment"></textarea>
                <input type="button" id="insert_com" class="write_bt" value="완료">
                <input type="button" id="cancel_com" class="write_bt" value="취소">
                <div id="write_img">
                    <label id="write_file" class="write_img" for="write_input">
                       <input type="file" class="write_file" id="write_input" accept="image/jpeg,image/png" onchange="readURL2(this);" name="write_multi0">
                    </label>
                </div>
                <p>*이미지는 최대 5개까지 가능합니다.</p>
            </form>
        </div>
        <?php
            } else {
        ?>
        <div id="write_main2">
            <h1>로그인이 필요합니다!</h1>
            <button>로그인 하러가기</button>
        </div>
        <?php
            }
        ?>
    </div>
    <div id="favorite_popup">
        <div id="favorite">
           <?php
                $sql = "select * from cafe_favorite where cafe_num=$cafe_num and id='$id'";
                $result = $dbcon->query($sql);
                if($result->num_rows==1) {
                    echo "<h2>즐겨찾기 취소하겠습니까?</h2>";
                } else {
                    echo "<h2>즐겨찾기 하시겠습니까?</h2>";
                }
            ?>
            <button id="favorite_yes">예</button>
            <button id="favorite_no">아니오</button>
        </div>
    </div>
    <section>
        <div id="imgslide">
            <?php
                $dirhandle = opendir("../images/Cafe_images/$row[cafe_name]");
                $count = 0;
                
                while($filename = readdir($dirhandle)) {
                    if($filename == "." || $filename == "..")continue;
                    $count++;
                }
                for($i = 1; $i <= $count; $i++) {
                    echo "<div class='imgslide'>
                        <img src='../images/Cafe_images/$row[cafe_name]/$row[cafe_name]_$i.jpg' class='js-lightBox' data-group='slick' data-title='$row[cafe_name]'>
                    </div>";
                }
                closedir($dirhandle);
            ?>
        </div>
        <div id="main">
            <article>
                <div id="cafe">
                <?php
                error_reporting(0);
                $sql = "select * from cafe_like where cafe_num=$cafe_num and id='$id'";
                $result = $dbcon->query($sql);
                if($result->num_rows==1) {
                    echo ("<style>
                    #cafe > #cafe_icon > #icon_like {opacity:1;}
                    </style>");
                }
                $sql2 = "select * from cafe_like where cafe_num=$cafe_num";
                $result2 = $dbcon->query($sql2);
                $sql = "select * from cafe_favorite where cafe_num=$cafe_num and id='$id'";
                $result = $dbcon->query($sql);
                
                if($result->num_rows==1) {
                    echo ("<style>
                    #cafe > #cafe_icon > #icon_favorite { opacity:1; }
                    </style>");
                } else {
                    echo ("<style>
                    #cafe > #cafe_icon > #icon_favorite { opacity:0.2; }
                    </style>");
                }
                if(isset($_SESSION[id])) {
                    echo ("<script>
                    $(document).ready(function() {
                        $('#cafe_icon > #icon_like').click(function() {
                            likeajax();
                        });
                        $('#cafe_icon > #icon_favorite').click(function() {
                            $('#favorite_popup').show();
                        });
                        $('#favorite > #favorite_yes').click(function() {
                            favoriteajax();
                        }); 
                    });
                    </script>");
                } else {
                    echo ("<script>
                    $(document).ready(function() {
                        $('#cafe_icon > #icon_like').click(function() {
                            $('#write').show();
                        });
                        $('#cafe_icon > #icon_favorite').click(function() {
                            $('#write').show();
                        });
                    });
                    </script>");
                }
                ?>
                <?php
                echo '
                <div id="admin_popup">
                    <div id="admin_close"></div>
                    <div id="admin_main">
                        <h1>카페 수정하기</h1>
                        <form action="connect/update_cafe.php" method="post">
                        <input type="hidden" name="admin_num" value="'.$row[cafe_num].'">
                        <table>
                            <tr>
                                <td>카페 이름</td>
                                <td><input type="text" value="'.$row[cafe_name].'" name="admin_name"></td>
                            </tr>
                            <tr>
                                <td>주소</td>
                                <td><input type="text" value="'.$row[cafe_address].'" name="admin_address"></td>
                            </tr>
                            <tr>
                                <td>전화번호</td>
                                <td><input type="text" value="'.$row[cafe_phone].'" name="admin_phone"></td>
                            </tr>
                            <tr>
                                <td>테마</td>
                                <td><input type="text" value="'.$row[theme_num].'" name="admin_theme"></td>
                            </tr>
                            <tr>
                                <td>운영시간</td>
                                <td><input type="text" value="'.$row[cafe_time].'" name="admin_time"></td>
                            </tr>
                            <tr>
                                <td>쉬는 날</td>
                                <td><input type="text" value="'.$row[cafe_hollyday].'" name="admin_hollyday"></td>
                            </tr>
                            <tr>
                                <td>대표 메뉴</td>
                                <td><input type="text" value="'.$row[cafe_price].'" name="admin_price"></td>
                            </tr>
                            <tr>
                                <td>주차여부</td>
                                <td><input type="text" value="'.$row[cafe_parking].'" name="admin_parking"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="admin_button" value="수정하기"></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                ';
                ?>
                <?php
                echo ("
                <style>
                    #cafe > #cafe_icon > img {
                        opacity : 0.2;
                    }
                </style>
                <h1>$row[cafe_name]</h1>
                <div id='cafe_icon'>
                    ");
                    $admin = $_SESSION['admin'];
                    if($row[cafe_num] == $admin || $admin == 99999) {
                        echo "<label for='cafe_insert'>사진추가
                            <form id='insert_form'><input type='file' name='cafe_insert' id='cafe_insert' onchange='insertImg()'>
                            <input type='hidden' value='$row[cafe_name]' name='cafe_num2'>
                            </form>
                        </label>";
                        echo "<div>수정하기</div>";
                    }
                echo ("
                    <img src='../images/Cafe_images/like.png' id='icon_like'>
                    <p id='like_text'>$result2->num_rows</p>
                    <img src='../images/Cafe_images/favorite.png' id='icon_favorite'>
                    <img src='../images/Cafe_images/write.png' id='icon_write'>
                </div>
                <table>
                    <tr>
                        <td>주소</td>
                        <td>$row[cafe_address]</td>
                    </tr>
                    <tr>
                        <td>전화번호</td>
                        <td>$row[cafe_phone]</td>
                    </tr>
                    <tr>
                        <td>테마</td>
                        <td>$row[theme_num]</td>
                    </tr>
                    <tr>
                        <td>운영 시간</td>
                        <td>$row[cafe_time]</td>
                    </tr>
                    <tr>
                        <td>쉬는 날</td>
                        <td>$row[cafe_hollyday]</td>
                    </tr>
                    <tr>
                        <td>대표 메뉴</td>
                        <td>$row[cafe_price]</td>
                    </tr>
                    <tr>
                        <td>주차여부</td>
                        <td>$row[cafe_parking]</td>
                    </tr>
                    
                </table>");
                ?>
                </div>
                <div id="cafe_comments">
                    <?php
                    $sql = "select *, CHAR_LENGTH(com.comments_comm) as length from comments com, cafe ca, user us where com.cafe_num=ca.cafe_num and us.id=com.id and com.cafe_num=$cafe_num order by com.comments_day desc";
                    $result = $dbcon->query($sql);
                    error_reporting(0);
                    echo "<h1>리뷰($result->num_rows)</h1>";
                    while($row = mysqli_fetch_array($result)) {
                        $arr = array('taste','mood','service');
                        $arr2 = array('맛','분위기','서비스');
                        echo ("
                        <div class='comments js-load' id='$row[id]_comm'>
                            <div id='$row[id]_profile' class='profile'></div>
                            <div id='$row[id]_star' class='comment_star'>");
                                for($i = 0; $i < 3; $i++) {
                                    echo "<div id='comment_star2'><div>$arr2[$i]</div>";
                                    if($row[$arr[$i]] == "good") {
                                        $star = 3;
                                    } else if($row[$arr[$i]] == "normal") {
                                        $star = 2;
                                    } else {
                                        $star = 1;
                                    }
                                    for($j = 0; $j < $star; $j++) {
                                        echo "<img src='../images/Cafe_images/STAR/star_1.png'>";
                                    }
                                    echo "</div>";
                                }
                            $comments_day = substr($row[comments_day], 0, 10);
                            echo ("
                            </div>
                            <h3>$row[id]<h3> <h5>$comments_day</h5>
                            <p>$row[comments_comm]</p>
                            ");
                            $is_file_exist2 = file_exists("../images/Comment_images/$row[cafe_name]/".$row[id]."_".$row[comment_num]."_0.jpg");
                            if($is_file_exist2) {
                                echo "<div id='comment_img'>";
                                for($i = 0; $i < 5; $i++) {
                                    $filename = $row[id]."_".$row[comment_num]."_".$i.".jpg";
                                    $url = "../images/Comment_images/$row[cafe_name]/$filename";
                                    $is_file_exist = file_exists($url);
                                    if($is_file_exist) {
                                        echo "<img src='$url' class='comment_img js-lightBox' data-group='$row[comment_num]' data-title='$row[id]'>";
                                    }
                                }
                                echo "</div>";
                            }
                            $admin = $_SESSION['admin'];
                            if($row[id]==$id || $admin == 99999 || $admin == $row[cafe_num]) {
                                echo "<img src='../images/Cafe_images/trash.png' class='com_del' id='$row[comment_num]'>";
                            }
                        echo ("
                            </div>
                            <style>
                            #$row[id]_profile {
                                background-image: url('../images/User_images/$row[id].jpg');
                            }
                        </style>
                        ");
                    }
                    ?>
                    <div id='load'>더보기</div>
                </div>
            </article>
            <aside>
                <div id="map"></div>
                <?php
                    $sql = "select * from location where cafe_num=$cafe_num";
                    $result = $dbcon->query($sql);
                    $row = mysqli_fetch_array($result);
                    echo ("
                        <script>
                            var locationX = $row[locationX];
                            var locationY = $row[locationY];
                        </script>
                    ");
                ?>
            </aside>
        </div>
        <?php
            include ('footer.php');
        ?>
</section>
</body>
</html>
<!--lightbox-->
<link rel="stylesheet" type="text/css" href="../css/style-d1d3771169.css">
<script type="text/javascript" src="../javascript/lightBox-ba9e08126f.js"></script>
<script>jQuery(document).ready(function(e){e.DNLightBox({speed:200})});</script>