<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/theme_style.css">
    <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../javascript/theme_java.js"></script>
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
                            background-image: url(../images/Theme_images/header/theme_".$ran.".jpg);
                        }
                    </style>
                ";
            ?>
            <h1>Jeju & Theme</h1>
            <h3>제주 엔 커피 안에 숨어있는 제주 카페의 작은 테마들</h3>
        </header>
        <div id="contents">
            <div id="theme1" class="theme">
                <div class="theme_pack">
                    <h1>#기분</h1>
                    <div id="opacity"></div>
                    <div class="theme_small">
                        <a href="theme_detail.php?theme_num=1"><div><img src="../images/Theme_images/우울함.jpg"><h2>#우울함</h2></div></a>
                        <a href="theme_detail.php?theme_num=2"><div><img src="../images/Theme_images/사랑.jpg"><h2>#사랑</h2></div></a>
                    </div>
                    <div class="theme_big">
                        <a href="theme_detail.php?theme_num=3"><div><img src="../images/Theme_images/신나는.jpg"><h2>#신나는</h2></div></a>
                    </div>
                    <div class="theme_small2">
                        <a href="theme_detail.php?theme_num=4"><div><img src="../images/Theme_images/오후.jpg"><h2>#오후</h2></div></a>
                        <a href="theme_detail.php?theme_num=5"><div><img src="../images/Theme_images/스트레스.jpg"><h2>#스트레스</h2></div></a>
                        <a href="theme_detail.php?theme_num=6"><div><img src="../images/Theme_images/센치함.jpg"><h2>#센치함</h2></div></a>
                    </div>
                </div>
                <div class="theme_pack">
                    <h1>#날씨</h1>
                    <div id="opacity"></div>
                    <div class="theme_small">
                        <a href="theme_detail.php?theme_num=7"><div class="small"><img src="../images/Theme_images/비오는.jpg"><h2>#비오는</h2></div></a>
                        <a href="theme_detail.php?theme_num=8"><div class="small"><img src="../images/Theme_images/맑음.jpg"><h2>#맑음</h2></div></a>
                    </div>
                    <div class="theme_big">
                        <a href="theme_detail.php?theme_num=9"><div><img src="../images/Theme_images/바람.jpg"><h2>#바람</h2></div></a>
                    </div>
                    <div class="theme_small2">
                        <a href="theme_detail.php?theme_num=10"><div><img src="../images/Theme_images/가을.jpg"><h2>#가을</h2></div></a>
                        <a href="theme_detail.php?theme_num=11"><div><img src="../images/Theme_images/눈.jpg"><h2>#눈</h2></div></a>
                        <a href="theme_detail.php?theme_num=12"><div><img src="../images/Theme_images/가을비.jpg"><h2>#가을비</h2></div></a>
                    </div>
                </div>
            </div>
            
            <div id="theme2" class="theme">
                <div class="theme_pack">
                   <h1>#분위기</h1>
                    <div id="opacity"></div>
                    <div class="theme_small">
                        <a href="theme_detail.php?theme_num=13"><div><img src="../images/Theme_images/7080.jpg"><h2>#7080</h2></div></a>
                        <a href="theme_detail.php?theme_num=14"><div><img src="../images/Theme_images/유럽풍.jpg"><h2>#유럽풍</h2></div></a>
                    </div>
                    <div class="theme_big">
                        <a href="theme_detail.php?theme_num=15"><div><img src="../images/Theme_images/벽돌.jpg"><h2>#벽돌</h2></div></a>
                    </div>
                    <div class="theme_small2">
                        <a href="theme_detail.php?theme_num=16"><div><img src="../images/Theme_images/아늑한.jpg"><h2>#아늑한</h2></div></a>
                        <a href="theme_detail.php?theme_num=17"><div><img src="../images/Theme_images/모던.jpg"><h2>#모던</h2></div></a>
                        <a href="theme_detail.php?theme_num=18"><div><img src="../images/Theme_images/빈티지.jpg"><h2>#빈티지</h2></div></a>
                    </div>
                </div>
                <div class="theme_pack">
                   <h1>#환경</h1>
                    <div id="opacity"></div>
                    <div class="theme_small">
                        <a href="theme_detail.php?theme_num=19"><div class="small"><img src="../images/Theme_images/숲속.jpg"><h2>#숲속</h2></div></a>
                        <a href="theme_detail.php?theme_num=20"><div class="small"><img src="../images/Theme_images/정원.jpg"><h2>#정원</h2></div></a>
                    </div>
                    <div class="theme_big">
                        <a href="theme_detail.php?theme_num=21"><div><img src="../images/Theme_images/꽃.jpg"><h2>#꽃</h2></div></a>
                    </div>
                    <div class="theme_small2">
                        <a href="theme_detail.php?theme_num=22"><div><img src="../images/Theme_images/바다.jpg"><h2>#바다</h2></div></a>
                        <a href="theme_detail.php?theme_num=23"><div><img src="../images/Theme_images/시골.jpg"><h2>#시골</h2></div></a>
                        <a href="theme_detail.php?theme_num=24"><div><img src="../images/Theme_images/도시.jpg"><h2>#도시</h2></div></a>
                    </div>
                </div>
            </div>
            
            <div id="theme3" class="theme">
                <div class="theme_pack">
                   <h1>#특별한 메뉴</h1>
                    <div id="opacity"></div>
                    <div class="theme_small">
                        <a href="theme_detail.php?theme_num=25"><div><img src="../images/Theme_images/티뮬리에.jpg"><h2>#티뮬리에</h2></div></a>
                        <a href="theme_detail.php?theme_num=26"><div><img src="../images/Theme_images/기념품.jpg"><h2>#기념품</h2></div></a>
                    </div>
                    <div class="theme_big">
                        <a href="theme_detail.php?theme_num=27"><div><img src="../images/Theme_images/디저트.jpg"><h2>#디저트</h2></div></a>
                    </div>
                    <div class="theme_small2">
                        <a href="theme_detail.php?theme_num=28"><div><img src="../images/Theme_images/핸드드립.jpg"><h2>#핸드드립</h2></div></a>
                        <a href="theme_detail.php?theme_num=29"><div><img src="../images/Theme_images/로스팅.jpg"><h2>#로스팅</h2></div></a>
                        <a href="theme_detail.php?theme_num=30"><div><img src="../images/Theme_images/빵.jpg"><h2>#빵</h2></div></a>
                    </div>
                </div>
                <div class="theme_pack">
                   <h1>#활동</h1>
                    <div id="opacity"></div>
                    <div class="theme_small">
                        <a href="theme_detail.php?theme_num=31"><div class="small"><img src="../images/Theme_images/결혼.jpg"><h2>#결혼</h2></div></a>
                        <a href="theme_detail.php?theme_num=34"><div class="small"><img src="../images/Theme_images/음악.jpg"><h2>#음악</h2></div></a>
                    </div>
                    <div class="theme_small">
                        <a href="theme_detail.php?theme_num=32"><div class="small"><img src="../images/Theme_images/휴식.jpg"><h2>#휴식</h2></div></a>
                        <a href="theme_detail.php?theme_num=35"><div class="small"><img src="../images/Theme_images/회의.jpg"><h2>#회의</h2></div></a>
                    </div>
                    <div class="theme_small">
                        <a href="theme_detail.php?theme_num=33"><div class="small"><img src="../images/Theme_images/독서.jpg"><h2>#독서</h2></div></a>
                        <a href="theme_detail.php?theme_num=36"><div class="small"><img src="../images/Theme_images/diy.jpg"><h2>#diy</h2></div></a>
                    </div>
                    <div class="theme_small2">
                        <a href="theme_detail.php?theme_num=37"><div><img src="../images/Theme_images/cycling.jpg"><h2>#cycling</h2></div></a>
                        <a href="theme_detail.php?theme_num=38"><div><img src="../images/Theme_images/애견동반.jpg"><h2>#애견동반</h2></div></a>
                        <a href="theme_detail.php?theme_num=39"><div><img src="../images/Theme_images/드라이브.jpg"><h2>#드라이브</h2></div></a>
                    </div>
                </div>
            </div>
        </div>
        <!--    footer-->
        <?php
            include 'footer.php';
        ?>
    </section>
</body>
</html>