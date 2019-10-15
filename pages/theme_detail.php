<!--get방식으로 테마의 번호를 받아서 그 테마의 번호가 있는 카페들을 sql문으로 서치해서 반복 출력한다.-->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/theme_detail_style.css">
    <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
</head>
<body>
    <div id="nav">
<!--    nav-->
    <?php
        include('nav.php');
    echo "</div>";
    ?>
<!--    section-->
    <section>
        <?php
            include('connect/dbconn.php');
            $theme_num = $_GET['theme_num'];
        ?>
        <header>
            <?php
                $sql = "select * from theme where theme_num='$theme_num'";
                $result = $dbcon->query($sql);
                $row = mysqli_fetch_array($result);
                echo "
                    <style>
                        section > header {
                            background-image: url(../images/Theme_images/header/$row[theme_name].jpg);
                        }
                    </style>
                ";
                echo "<h1>#$row[theme_name]</h1>";
                echo "<h3>$row[theme_text]</h3>";
            ?>
        </header>
        <div id='main'>
            <div id="main_cafe">
        <?php
            $sql = "select * from cafe where theme_num REGEXP '$row[theme_name]'"; 
            $result = $dbcon->query($sql);
            while($row = mysqli_fetch_array($result)) {
                 echo ("
                    <style>
                        .cafes > a > #cafe_$row[cafe_num]_img {
                            background-image: url('../images/Cafe_images/$row[cafe_name]/$row[cafe_name]_1.jpg');
                        }
                    </style>
                    
                    <div class='cafes'>
                        <a href='cafe_detail.php?cafe_num=$row[cafe_num]'><div id='cafe_$row[cafe_num]_img' class='cafe_img'></div></a>
                        <a href='cafe_detail.php?cafe_num=$row[cafe_num]'><h1>$row[cafe_name]</h1></a>
                        <p>$row[cafe_address]</p>
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
