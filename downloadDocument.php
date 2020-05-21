<?php
    include("Database.php");
    $docid = $_GET['did'];
    $query = mysqli_query($con, "SELECT * FROM documentsData WHERE docId = $docid")
    if($query){
        
    }
?>