<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/main_style.css">
    <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../javascript/main_java.js"></script>
<!--    font-->
</head>
<body>
    <div id="nav">
<!--    nav-->
    <?php
        include('nav.php');
    echo "</div>";
    ?>
<!--    body-->
    <div id="body">
        <div id="main_img">
            <hgroup>
                <h1>제주도에서 여유로움 '한 잔'</h1>
                <h1>제주도에서 카페를 찾고 있다면</h1>
            </hgroup>
            <div id="main_search">
                <img src="../images/Main_images/Search.png">
                <form action="" method="post" onsubmit="return false">
                    <input type="text" name="search" id="search_text" placeholder="지역 또는 카페...">
                    <input type="button" value="검색" id="search_button">
                </form>
            </div>
            <h3>SCROLL DOWN<br>↓</h3>
        </div>
        <div id="eventncoupon">
            <div id="event" class="enc">
                <img src="../images/Main_images/Event.png">
                <div id="event_contents" class="contents">
                    <h1>제주 엔 커피의<br>이벤트들,<br>알고싶다면?</h1>
                    <a href="event.php"><div id="event_button"><h3>이벤트 바로가기 >></h3></div></a>
                </div>
            </div>
        </div>
        <div id="theme" class="themencafe">
            <a href="../pages/theme.php"><div id="theme_plus" class="plus">
                <h3>더보기</h3>
                <img src="../images/Main_images/plus2.png" alt="theme plus">
            </div></a>
            <h1>Best Theme</h1>
            <div id="theme_slide" class="slide">
                <?php
                    include('connect/dbconn.php');
                    $re_sql = "select * from theme";
                    $re_result = $dbcon->query($re_sql);
                    $arr = array(''); $arr = [];
                    $arr2 = array(''); $arr2 = [];
                    $arr3 = array(''); $arr3 = [];
                    while($re_row = mysqli_fetch_array($re_result)){
                        $sql = "select *,count(*) as cot from cafe where theme_num REGEXP '$re_row[theme_name]'";   
                        $result = $dbcon->query($sql);
                        $row = mysqli_fetch_array($result);
                        array_push($arr,$row['cot']);
                        array_push($arr2,$re_row['theme_name']);
                        array_push($arr3,$re_row['theme_num']);
                    }
                    for($i = 0; $i < count($arr); $i++) {
                        for($j = 0; $j < $i; $j++) {
                            if($arr[$i] > $arr[$j]) {
                                $temp = $arr[$i]; $arr[$i] = $arr[$j];
                                $arr[$j] = $temp;
                                $temp2 = $arr2[$i]; $arr2[$i] = $arr2[$j];
                                $arr2[$j] = $temp2;
                                $temp3 = $arr3[$i]; $arr3[$i] = $arr3[$j];
                                $arr3[$j] = $temp3;
                            }
                        }
                    }
                    for($i = 0; $i < 3; $i++) {
                        echo ("
                            <div class='theme_slide'>
                                <a href='theme_detail.php?theme_num=$arr3[$i]'>
                                <img src='../images/Theme_images/$arr2[$i].jpg' alt='theme1'>
                                <div class='theme_focus'><h3>#$arr2[$i]</h3></div>
                                </a>
                            </div>
                        ");
                    }
                ?>
            </div>
        </div>
        
        <div id="cafe" class="themencafe">
            <a href="../pages/cafe_search.php?search="><div id="cafe_plus" class="plus">
                <h3>더보기</h3>
                <img src="../images/Main_images/plus2.png" alt="theme plus">
            </div></a>
            <h1>Best Cafe</h1>
            <div id="cafe_slide" class="slide">
            <?php
                $sql = "select *,count(cl.cafe_num) as cont from cafe_like cl, cafe c where cl.cafe_num=c.cafe_num group by cl.cafe_num order by cont desc limit 3";
                $result = $dbcon->query($sql);
                while($row = mysqli_fetch_array($result)) {
                    echo ("
                    
                        <div class='cafe_slide'>
                        <a href='cafe_detail.php?cafe_num=$row[cafe_num]'>
                            <img src='../images/Cafe_images/$row[cafe_name]/$row[cafe_name]_1.jpg' alt='cafe1'>
                            <div class='cafe_focus'><h3>$row[cafe_name]</h3></div>
                        </a>
                        </div>
                    
                    ");
                }
            ?>
            </div>
        </div>
        
    <!--Footer-->
    <?php 
        include 'footer.php';
    ?>
    </div>
</body>
</html>