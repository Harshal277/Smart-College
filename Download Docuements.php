<?php
    include("Database.php");
    
        // Downloads files
        if (isset($_GET['file_id'])) {
        $studid = $_GET['stud'];
        $id = $_GET['file_id'];

        // fetch file to download from database
        $result = mysqli_query($con, "SELECT * FROM `documentsdata` WHERE docid = $id");
        $file = mysqli_fetch_assoc($result);
        $filepath = "Documents/$studid/" . $file['file'];
        // if (file_exists($filepath)) {
            header('Content-Description: Document');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize("Documents/$studid/" . $file['name']));
            readfile("Documents/$studid/" . $file['name']);
            exit;
        // }
    }
?>