<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college_mgmt";
    $con = mysqli_connect($servername,$username,$password);
    if($con){
        mysqli_select_db($con,$dbname);   
    }
?>