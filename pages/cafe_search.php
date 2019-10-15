<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/cafe_search_style.css">
    <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../javascript/cafe_search_java.js"></script>
<!--    지도-->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=3b05253c09dfc17b87ff03bbf4113f1c"></script>
</head>
<body>
    <div id="nav">
        <?php
            include('nav.php');
        ?>
    </div>
    <section>
        <div id="cafe_search">
           <div id="search_main">
            <?php
                $search = $_GET['search'];
                
                $field_name = array('cafe_name','cafe_address','theme_name');
//                $search3 = str_replace(" ", ".*", $search);
                include('connect/dbconn.php');
//                $sql = "select * from cafe where cafe_address REGEXP '($search3)' or cafe_name REGEXP '($search3)' or theme_num REGEXP '($search3)'";
                $search3 = explode(' ', $search);
                $length = count($search3);
                $sql = "select * from cafe where";
                for($i = 0; $i < $length; $i++) {
                    if($i == 0) {
                        $sql.= " (cafe_name REGEXP '$search3[$i]'";    
                    } else {
                        $sql.= " and (cafe_name REGEXP '$search3[$i]'";   
                    }
                    $sql.= " or cafe_address REGEXP '$search3[$i]'";
                    $sql.= " or theme_num REGEXP '$search3[$i]')";
                }

                $result = $dbcon->query($sql);
//                $result2 = $dbcon->query($sql);
//                $search2 = str_replace("|", " ", $search);
                echo "<h1>$search 카페 인기 검색순위</h1>";
                while($row = mysqli_fetch_array($result)) {
                        echo ("
                        <div class='cafe_search'>
                            <style>
                                #cafe_$row[cafe_num]_img {
                                    background-image: url('../images/Cafe_images/$row[cafe_name]/$row[cafe_name]_1.jpg');
                                }
                            </style>
                            <a href='cafe_detail.php?cafe_num=$row[cafe_num]'><div id='cafe_$row[cafe_num]_img' class='cafe_img'></div></a>
                            <a href='cafe_detail.php?cafe_num=$row[cafe_num]'><h1>$row[cafe_name]</h1></a>
                            <p>주소 : $row[cafe_address]</p>
                        </div>
                    ");
                }
            ?> 
            </div>
        </div>
        <?php
            include('footer.php');
        ?>
    </section>
</body>
</html>
