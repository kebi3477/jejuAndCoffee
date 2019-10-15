<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/subcss/footer_style.css">
</head>
<body>
    <footer>
        <div id="footer">
            <a href="#"><img src="../images/Main_images/Logo.png"></a>
            <ul id="f_menu" class="f_menu">
                <li>
                <?php
                    error_reporting(0);
                    $admin = $_SESSION['admin'];
                    if($admin == 99999) {
                        echo "<a href='advertise_admin.php'>";
                    } else {
                        echo "<a href='advertise.php'>";
                    }
                ?>
                광고/카페추가 문의</a></li>
                <li><a href="company.php">회사/직원 소개</a></li>
                <li><a href="terms.php">이용약관</a></li>
                <li><a href="inform.php">개인정보처리방침</a></li>
            </ul>
            <p>
                ㈜ Jeju & Coffee<br>
                제주특별자치도 제주시 산천단3길 2 (한국폴리텍대학교)<br>
                대표이사: 김연희<br>
                Team Master : KoKoPham<br>
                사업자 등록번호: 010-5295-6530 [사업자정보확인]<br>
                통신판매업 신고번호: 112<br>
                고객센터: 010-4213-6766<br><br>
                © 2018 Jeju & Coffee Co., Ltd. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>