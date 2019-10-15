$(document).ready(function() {
    $('#cafe_icon > #icon_write').click(function() {
        $('body').alertBox({
            title:"리뷰를 남기시겠습니까?",
            lTxt:'취소',
            rTxt:'남기기',
            rCallback:function(){
                $('#write').show();
            }
        });
    });
    $('#cancel_com').click(function() {
        $('#write').hide();
    });
    
    $("#write_main2 > button").click(function() {
        $("#write").hide();
        setTimeout(function() {
            $('#login').css('display','block');
            setTimeout(function (){
                $('#login').css('opacity','1');
                $('#login_main').css('transform','translateX(0px)');  
                $('nav').css('display','none');
            },100);
        },50);
    });
    
     $('section > #imgslide').slick({
        autoplay : true,
        speed : 500, /* 이미지가 슬라이딩시 걸리는 시간 */
        infinite: true,
        swipe: false,
        pauseOnHover:false,
        autoplaySpeed: 1000, /* 이미지가 다른 이미지로 넘어 갈때의 텀 */
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false
    });

    $(".score > .radio").change(function() {
        $(this).siblings('label').css('background-image','url("../images/Cafe_images/STAR/star_1_grey.png")');
        $(this).prevAll('label').css('background-image','url("../images/Cafe_images/STAR/star_1.png")');
    });
    
    $('.comments > .com_del').click(function() {
        var comm_num = $(this).attr('id');
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
    });
    
    $('#write_main > form > #insert_com').click(function() {
        var write_form = $('#write_form')[0];
        var write_formdata = new FormData(write_form);
        $.ajax({
            url:"../pages/connect/insert_comment.php",
            type:"POST",
            data:write_formdata,
            processData:false,
            contentType:false,
            success:function(response) {
                alert(response);
                if(response=="comment") {
                    location.reload();
                }                        
            }
        });
    });
    $('#cafe_icon > div').click(function() {
        $('#admin_popup').css('display','block');
    });
    $('#admin_close').click(function() {
        $('#admin_popup').css('display','none');
    });
    
    
    $(window).on('load', function () {
        load('#main', '5');
        $("#load").on("click", function () {
            load('#main', '5', '#load');
        })
    });

    function load(id, cnt, btn) {
        var girls_list = id + " .js-load:not(.active)";
        var girls_length = $(girls_list).length;
        var girls_total_cnt;
        if (cnt < girls_length) {
            girls_total_cnt = cnt;
        } else {
            girls_total_cnt = girls_length;
            $('.button').hide()
        }
        $(girls_list + ":lt(" + girls_total_cnt + ")").addClass("active");
    }
    
    
     $('#favorite > #favorite_yes').click(function() {
        $('#favorite_popup').hide();
    });
    $('#favorite > #favorite_no').click(function() {
        $('#favorite_popup').hide(); 
    });
    
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = { 
            center: new daum.maps.LatLng(locationX, locationY), // 지도의 중심좌표
            level: 2
        };
    var map = new daum.maps.Map(mapContainer, mapOption);
    var markerPosition  = new daum.maps.LatLng(locationX, locationY); 
    // 마커를 생성합니다
    var marker = new daum.maps.Marker({
        position: markerPosition
    });

    // 마커가 지도 위에 표시되도록 설정합니다
    marker.setMap(map);

    // 아래 코드는 지도 위의 마커를 제거하는 코드입니다
    // marker.setMap(null); 
    

});
   function insertImg() {
        var insert_form = $('#insert_form')[0];
        var insert_formdata = new FormData(insert_form);
        $.ajax({
            url:"connect/insert_img.php",
            type:"POST",
            data:insert_formdata,
            processData:false,
            contentType:false,
            success:function(response) {
                alert(response);
                if(response=="insert") {
                    location.reload();
                }                        
            }
        });
    }

