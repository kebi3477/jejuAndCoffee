<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/adver_admin_style.css">
    <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
</head>
<body>
   <?php
        include('nav.php');
    ?>
    <section>
        <h2>광고문의 모아보기(관리자)</h2>
           <?php
                include('connect/dbconn.php');
                $sql = "select * from adver order by adver_num";
                $result = $dbcon->query($sql);
                while($row = mysqli_fetch_array($result)) {
                    echo("
                        <table>
                            <tr><td>번호 :</td><td>$row[adver_num]</td></tr>
                            <tr><td>사업자 이름 :</td><td>$row[adver_name]</td></tr>
                            <tr><td>전화번호 :</td><td>$row[adver_phone]</td></tr>
                            <tr><td>이메일 :</td><td>$row[adver_email]</td></tr>
                            <tr><td>카페 이름 :</td><td>$row[adver_cafename]</td></tr>
                            <tr><td>카페 주소 :</td><td>$row[adver_address]</td></tr>
                            "); 
                        $is_file_exist1 = file_exists("../images/Adver_images/Cafe_img/".$row['adver_cafename']."_0.jpg");
                        if($is_file_exist1) {
                            echo "<tr><td>카페 이미지 :</td><td>";
                            for($i = 0; $i < 10; $i++) {
                                $filename = $row['adver_cafename']."_".$i.".jpg";
                                $url = "../images/Adver_images/Cafe_img/$filename";
                                $is_file_exist = file_exists($url);
                                if($is_file_exist) {
                                    echo "<img src='$url' class='adver_img'>";
                                }
                            }
                            echo "</td></tr>";
                        }
                        $is_file_exist2 = file_exists("../images/Adver_images/Poster/".$row['adver_cafename']."_0.jpg");
                        if($is_file_exist2) {
                            echo "<tr><td>카페 포스터 :</td><td>";
                            for($i = 0; $i < 10; $i++) {
                                $filename = $row['adver_cafename']."_".$i.".jpg";
                                $url = "../images/Adver_images/Poster/$filename";
                                $is_file_exist = file_exists($url);
                                if($is_file_exist) {
                                    echo "<img src='$url' class='adver_img'>";
                                }
                            }
                            echo "</td></tr>";
                        }
                    echo ("
                            <tr><td>소개 내용 :</td><td>$row[adver_content]</td></tr>
                        </table>
                    ");
                }
            ?>
    </section>
    <?php
        include('footer.php');
    ?>
</body>
</html>