$(document).ready(function() {
    $(function() {    
        var scrollH = 0;
        if($(location).attr('pathname') == "/JejuAndCoffee/pages/index.php") {
            scrollH = 980;
        } else {
            $('#opacity').css('transition', '0s');
            $('#opacity').css('opacity', '1');
            $('#n_menu > li > a').css('color', '#000000');
            $('#logo > a > img').attr('src','../images/Main_images/Logo2.png');
            $('#n_menu > li:nth-child(3) > img').attr('src','../images/Main_images/User2.png');
            $('#n_menu > li:nth-child(4) > img').attr('src','../images/Main_images/Language2.png'); 
        }
        //nav
        $(window).scroll(function(e) {
            if($(this).scrollTop() >= scrollH) { //내렸을 때
                $('#opacity').css('opacity', '1');
                $('#n_menu > li > a').css('color', '#000000');
                $('#logo > a > img').attr('src','../images/Main_images/Logo2.png');
                $('#n_menu > li:nth-child(3) > img').attr('src','../images/Main_images/User2.png');
                if(lang_change == false) {
                    $('#n_menu > li:nth-child(4) > img').attr('src','../images/Main_images/Language2.png');
                }
            } else {//맨위
                $('#opacity').css('opacity', '0');
                $('#n_menu > li > a').css('color', '#ffffff');
                $('#logo > a > img').attr('src','../images/Main_images/Logo.png');
                $('#n_menu > li:nth-child(3) > img').attr('src','../images/Main_images/User.png');
                if(lang_change == false) {
                    $('#n_menu > li:nth-child(4) > img').attr('src','../images/Main_images/Language.png');   
                }
            }
        });
        //로그인
        $('#login_close').click(function() {
            $('.enter_id').val('');
            $('#login_main').css('transform','translateX(700px)');
            $('#login').css('opacity','0');
            $('nav').css('display','block');
            $('body').css('overflow-y','scroll');
            setTimeout(function (){
                $('#login').css('display','none');
            },300);
        });
        $('#n_menu > li:nth-child(3) > img').click(function() {
            $('#login').css('display','block');
            $('body').css('overflow-y','hidden');
            setTimeout(function (){
                $('#login').css('opacity','1');
                $('#login_main').css('transform','translateX(0px)');  
                $('nav').css('display','none');
            },100);
        });
        //언어 변경
        var lang_change = false;
        $('#n_menu > li:last-child').click(function() {
            if(lang_change == false) {
                $('#lang_change').css('display','block');
                $('#n_menu > li:last-child()').css('background-color','#ffffff');
                if($(location).attr('pathname') == "/JejuAndCoffee/pages/index.php") {
                    $('#n_menu > li:last-child() > img').attr('src','../images/Main_images/Language2.png');
                } else {
                    $('#n_menu > li:last-child() > img').attr('src','../images/Main_images/Language2.png');
                }
                lang_change = true;
            } else if(lang_change == true) {
                $('#lang_change').css('display','none');
                $('#n_menu > li:last-child()').css('background-color','');
                if($(location).attr('pathname') == "/JejuAndCoffee/pages/index.php") {
                    $('#n_menu > li:last-child() > img').attr('src','../images/Main_images/Language.png');
                } else {
                    $('#n_menu > li:last-child() > img').attr('src','../images/Main_images/Language2.png');
                } 
                lang_change = false;
            }
        });
        //회원가입
        $('.login_button2:last-child').click(function() {
            $('.sub_text').val('');
            $('#submit_img > img').attr('src','../images/Submit_images/icon/camera.png');
            $('#submit').show(); 
        });
        $('#sub_close').click(function() {
            $('#submit').hide();
        });
        //로그인 버튼
        $('.nav_popup > button').click(function() {
            location.reload();
        });
        //아이디 찾기
        $('#search_id').click(function() {
            $('.search_text').val("");
            $('#login_search').css('display','block');
            $('#id_search').css('display','block');
        });        
        $('#change_id').click(function() {
            $('.search_text').val("");
            $(this).animate({
                color: "#2C2111",
                borderBottomColor: "#2C2111"
            }, 500 );
            $('#change_pw').animate({
                color: "#999999",
                borderBottomColor: "#999999"
            }, 500 );
            $('#id_search').animate({
                height: "530px",
                marginTop: "-265px",
            }, 500 , function() {
                $('#id_after').css('display','block');
                $('#pw_after').css('display','none');
            });
        });
        $('#change_pw').click(function() {
            $('.search_text').val("");
            $(this).animate({
                color: "#2C2111",
                borderBottomColor: "#2C2111"
            }, 500);
            $('#change_id').animate({
                color: "#999999",
                borderBottomColor: "#999999"
            }, 500 );
            $('#id_search').animate({
                height: "650px",
                marginTop: "-325px",
            }, 500 , function() {
                $('#id_after').css('display','none');
                $('#pw_after').css('display','block');
            });
        });
        
        $('.search_cancel').click(function() {
            $('#login_search').css('display','none');
            $('#id_search').css('display','none');
        });
        //정보수정
        $('#user_modi').click(function() {
            $('#user_revise').css('display','block');
        });
        $('#user_revise > img').click(function() {
            $('#user_revise').css('display','none');
        });
        //서치
        $search_event = function() {
            var search = $('#nav_search > form > #search_text').val();
            var search2 = search.replace(/ /gi, '|');
            location.href = "cafe_search.php?search="+search; 
        }

        $('#nav_search > form > #search_text').keypress(function(e) {
            if(e.which == 13) {
                $search_event();
            }
        });
    }); 
});
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $(input).parent('label').parent('.profile').css('background-image','url("' + e.target.result + '")');
    };
    reader.readAsDataURL(input.files[0]);
  }
}