<?php
    include("Database.php");
    $docid = $_GET['did'];
    $query = mysqli_query($con, "DELETE FROM documentsData WHERE docId = $docid")
?>