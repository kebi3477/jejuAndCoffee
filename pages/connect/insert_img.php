<?php
    $cafe_name = $_POST['cafe_num2'];
    $dirhandle = opendir("../../images/Cafe_images/$cafe_name");
    $count = 0;

    while($filename = readdir($dirhandle)) {
        if($filename == "." || $filename == "..")continue;
        $count++;
    }
//    for($i = 1; $i <= 10; $i++) {
//        echo "<div class='imgslide'>
//            <img src='../images/Cafe_images/$row[cafe_name]/$row[cafe_name]_$i.jpg' class='js-lightBox' data-group='slick' data-title='$row[cafe_name]'>
//        </div>";
//    }
    
    $newfilename= $cafe_name."_".($count+1).".jpg"; 
    move_uploaded_file($_FILES['cafe_insert']['tmp_name'],"../../images/Cafe_images/$cafe_name/".$newfilename);
    echo "insert";
    closedir($dirhandle);
?>