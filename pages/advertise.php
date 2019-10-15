<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/adver_style.css">
    <script type="text/javascript" src="../javascript/jquery-3.3.1.min.js"></script>
    <script>
        function readURL_adver(input) {
            var length = $(".adver_label").length;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(input).parent('.adver_label').css('background-image','url("' + e.target.result + '")');
                };
                reader.readAsDataURL(input.files[0]);
            }
            if(length != 10) {
                $("<label></label>").attr({id:"adver_label"+length,class:"adver_label",for:"adver_img"+length}).appendTo($('#adver_input1'));
                $("<input></input>").attr({type:"file",id:"adver_img"+length,class:"adver_img",accept:"image/jpeg,image/png",name:"adver_multi"+length,onchange:"readURL_adver(this)"}).appendTo($('#adver_label'+length));
            }
        }
        
        function readURL_adver2(input) {
            var length = $(".adver_label2").length;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(input).parent('.adver_label2').css('background-image','url("' + e.target.result + '")');
                };
                reader.readAsDataURL(input.files[0]);
            }
            if(length != 10) {
                $("<label></label>").attr({id:"adver_pos"+length,class:"adver_label2",for:"adver_poster"+length}).appendTo($('#adver_input2'));
                $("<input></input>").attr({type:"file",id:"adver_poster"+length,class:"adver_img",accept:"image/jpeg,image/png",name:"adver_poster"+length,onchange:"readURL_adver2(this)"}).appendTo($('#adver_pos'+length));
            }
        }
    </script>
</head>
<body>
    <?php
        include('nav.php');
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.adver_button > input').click(function() {
                $('body').alertBox({
                    title:"광고 문의 하시겠습니까?",
                    lTxt:"아니요",
                    rTxt:"예",
                    rCallback:function() {
                        var adver_form = $('#adver_form')[0];
                        var adver_formdata = new FormData(adver_form);
                        $.ajax({
                            url:"connect/insert_adver.php",
                            type:"POST",
                            data:adver_formdata,
                            processData:false,
                            contentType:false,
                            success:function(response) {
                                if(response=="success") {
                                    alert("확인되었습니다!");
                                    location.reload();
                                } else {
                                    alert("제대로 입력해주세요!");
                                }
                            }
                        });
                    }
                })
            })  
        })
    </script>
    <section>
        <div id="top">
            <div id="top_img">
                <img src="../images/Company_images/top_image2.jpg">
            </div>
            <div id="top_text">
                <h2>“Hot place cafe!<br>제주 앤 커피가 홍보해드려요”</h2>
                <h3>내 카페를 인싸들의 핫플레이스로 만들고 싶다면<br>상담 문의에 글을 작성해주세요.<br>제주 앤 커피가 열심히 카페를 알려드려요.</h3>
            </div>
        </div>
        <div id="content">
            <div id="adver_content">
                <div id="adver_text">상담 문의</div>
                <div id="adver_form_block">
                    <h2>다음 사항을 정확하게 입력해 주세요.</h2>
                    <form method="post" action="" id="adver_form">
                        <div class="adver_input">
                            <h2>Name</h2>
                            <input type="text" name="adver_name" id="adver_name">
                        </div>
                        <div class="adver_input">
                            <h2>Phone</h2>
                            <input type="text" name="adver_phone" id="adver_phone">
                        </div>
                        <div class="adver_input">
                            <h2>E-mail</h2>
                            <input type="text" name="adver_email" id="adver_email">
                        </div>
                        <div class="adver_input">
                            <h2>Cafe name</h2>
                            <input type="text" name="adver_cafe_name" id="adver_cafe_name">
                        </div>
                        <div class="adver_input">
                            <h2>Cafe address</h2>
                            <input type="text" name="adver_address" id="adver_address">
                        </div>
                        <div class="adver_input adver_image">
                            <h2>Cafe image(indoor, outdoor)</h2>
                            <div class="adver_input_img" id="adver_input1">
                                <label for="adver_img" class="adver_label">
                                    <input type="file" class="adver_img" name="adver_multi0" id="adver_img" onchange="readURL_adver(this);">
                                </label>
                            </div>
                        </div>
                        <div class="adver_input adver_image">
                            <h2>Promotion poster</h2>
                            <div class="adver_input_img" id="adver_input2">
                                <label for="adver_poster" class="adver_label2">
                                    <input type="file" class="adver_img" name="adver_poster0" id="adver_poster" onchange="readURL_adver2(this);">
                                </label>
                            </div>
                        </div>
                        <div class="adver_input adver_texta">
                            <h2>Content</h2>
                            <textarea name="adver_comment"></textarea>
                        </div>
                        <div class="adver_button">
                            <input type="button" id="adver_button" value="작성 완료">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include('footer.php');
        ?>
    </section>
</body>
</html>