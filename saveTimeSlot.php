<?php
    include("Database.php");
    $posi = $_GET['posi'];
    $timeVal = $_GET['time'];
    $slot = substr($posi,2,1);
    $startend = substr($posi,3,1);
    if(strcmp($startend, 'S') == 0){
        $updateSlot = mysqli_query($con,"UPDATE timeslot SET `starttime` = '$timeVal' WHERE `slot` = $slot");
        echo $timeVal;
    }
    if(strcmp($startend, 'E') == 0){
        $updateSlot = mysqli_query($con,"UPDATE timeslot SET endtime='$timeVal' WHERE slot='$slot'");
        echo $timeVal;
    }
?>