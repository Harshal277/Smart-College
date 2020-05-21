<?php
    include("Database.php");
    $id = $_GET['id'];
    $notice = mysqli_query($con, "SELECT * FROM notice WHERE id = $id");
    $n = mysqli_fetch_array($notice);
    $noticeFile = $n['file'];
    echo "<i class='fas fa-times' id='close-btn' onclick='closeNotice()'></i>";
    echo "<h1 id='nTitle'>".$n['title']."</h1>";
    echo "<p id='nDesc'>".$n['description']."</p>";
    if(!$noticeFile == NULL){
        $noticeFile = str_replace(" ","",$n['file']);
        echo "<a class='optionbtn' href=\"./uploads/$noticeFile\">View Document</a>";
    }
    echo "<button onclick='deleteNotice($id),closeNotice()' style='margin: 20px 100px;background:#e91e63;'>Delete</button>";
?>