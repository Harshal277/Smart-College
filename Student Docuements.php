<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC | Documents</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <script src="js/sidebar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/alertbox.css">
    <link rel="stylesheet" href="./css/fontawesome.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./webfonts/fa-regular-400.woff2">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d83f952c69.js"></script>
    <script src="./js/all.js"></script>
    <script src="./js/fontawesome.js"></script>
    <script src="./js/alertbox.js"></script>
    <script src="./js/solid.js"></script>

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: rgb(243, 243, 243);
        }
        button{
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            background: #007fff;
            color: white;
        }
        button:hover{
            background: #0482f9 ;
            box-shadow: 0 0 10px 3px rgba(0,0,0,0.2);
            cursor:pointer;
        }
        span{
            font-size: 14px;
            color: #444343;
            text-transform: uppercase;
            font-weight: 500;
        }
        a{
            color: grey;
        }
        .btn{
            border-radius: 5px;
            padding: 9px 15px;
            width: 80px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: bold;
            color: white;
            outline: none;
            border: none;
            margin: 0 55px;
        }
        h5{
            margin: 10px 0;
            text-align: center;
            color: rgb(20, 20, 20);          
            font-size: 30px;
        }
        .tb-btns{
            display: flex;
        }
        .tb-btns span{
            margin: auto;
            color: black;
            font-size: 25px;
        }
        .tb-btns{
            border-radius: 10px;
            margin: 20px;
            background: #fff;
            padding: 20px;  
        }
        #tt{
            background: #fff;
            padding: 20px;
            margin: 20px;
        }
        #tt table{
            width: 100%;
        }
        #tt table thead{
            font-weight: bold;
        }
        .createDialog{
            position: absolute;
            display: none;
            top: 0;
            width: 100%;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgb(255,255,255,0.7);
        }
        .upload{
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
            position: absolute;
            background: #fff;
            display: flex;
            flex-direction: column;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .upload .header{
            padding: 10px;
            background: #007fff;
        }
        .upload .header span{
            color: #fff;
        }
        .upload .dial-body{
            padding: 20px;
        }
        .upload .dial-body input{
            padding: 10px;
            width: 90%;
            outline: none;
            border: none;
            border: 1px solid grey;
            margin: 10px ;
        }
        .upload .dial-btn{
            padding: 0px 10px 20px 20px;
        }
        .upload .dial-btn button{
            margin-right: 20px;
        }
        .blankText{
            display: block;
            text-align: center;
            color: grey;
            font-size: 20px;
        }
        .optionbtn{
            font-size: 20px;
        }
        tr td{
            padding: 13px;
            border-bottom: 1px solid rgba(0,0,0,0.2);
        }
        #docTable{
            background: white;
            margin: auto;   
            width: 96%;
            margin: 20px;
        }
        #docTable thead{
            background: #3aa0f1;
            color: #fff;
        }
        #docTable thead td{
            padding: 15px;
        }
    </style>
</head>

<body onload="collapse_sidebar()">
    <div class="side-menu" id="side-bar">
        <div class="side-profile">
            <img src="img/sdpc_logo.png" alt="Icon" id="college-logo">
        </div>
        <a href="Student Dashboard.php" style="text-decoration: none;">
            <div class="menu-item" >
                <div class="item-icon"><i class="fa fa-cog" aria-hidden="true"></i></div>
                <div class="item-title">Dashboard</div>
            </div>
        </a>
        <a href="Student Sub show.php" style="text-decoration: none;">
            <div class="menu-item">
                <div class="item-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                <div class="item-title">Subject</div>
            </div>
        </a>
        <a href="Student Timetable.php" style="text-decoration: none;">
            <div class="menu-item">
                <div class="item-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                <div class="item-title">Time Table</div>
            </div>
        </a>
        <a href="Student Notice.php" style="text-decoration: none;">
            <div class="menu-item">
                <div class="item-icon"><i class="fas fa-bell" aria-hidden="true"></i></div>
                <div class="item-title">Notice</div>
            </div>
        </a>
        <a href="Student Docuements.php" style="text-decoration: none;">
            <div class="active-menu">
                <div class="item-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                <div class="item-title">Documents</div>
            </div>
        </a>
        <div class="collapse-side" onclick="collapse_sidebar()">
            <i id="btn-side-icon" class="fas fa-chevron-left " aria-hidden="true"></i>
        </div>
    </div>
    <div class="app" id="app">
        <nav class="top-nav">
            <div class="navigation">
                <a href="Student Dashboard.php"> <i class="fas fa-home"></i>Home</a>
                <span>/</span>
                <a href="Student Docuements.php" class="active-nav">Documents</a>
            </div>
            <div class="profile">
                <a id="edit-profile">
                    <?php
                        include("Database.php");
                        include("Functions.php");
                        include("Error.php");
                        if(isset($_SESSION['logged'])){
                            $loggedUser = $_SESSION['logged'];
                            getLoggedInName($loggedUser);
                        }
                    ?>
                </a>
                <a href="Login.php">Logout<i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>
        <div class="dashboard" id="dashboard">
            <div class="tb-btns">
                <span>Docuemnts</span>
                <button onclick="showDial()">Add Document<i style="margin-left: 10px;font-weight: bolder;" class="fa fa-plus" aria-hidden="true"></i></button>
            </div>                    
            <table cellspacing="0" id="docTable">
                <tr>
                    <?php
                        $loggedUser = $_SESSION['logged'];
                        $res = mysqli_query($con,"SELECT * FROM students WHERE sUser='$loggedUser'");
                        $data = mysqli_fetch_array($res);
                        $studid = $data['id'];
                        display_docuements($studid);
                    ?>
                </tr>
            </table>
            <?php     
                function display_blank(){
                    echo "<span class='blankText'>You Don't have any documents uploaded</span>";
                }
                function display_docuements($studid){
                    global $con, $studid;
                    $sr = 1;
                    $docs = mysqli_query($con, "SELECT * FROM `documentsdata` WHERE studid = $studid");
                    $numDoc = mysqli_num_rows($docs);
                    if($docs){
                        if($numDoc > 0){
                            echo "
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Document Name</td>
                                        <td>Modified Date</td>
                                        <td>Size</td>
                                        <td>Download</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                            ";
                            while($row = mysqli_fetch_array($docs)){
                                $docId = $row['docid'];
                                $docFile = str_replace(" ","",$row['file']);
                                $extension = explode(".", $docFile);
                                $extension = $extension[1];
                                echo "
                                    <tr>
                                        <td>$sr</td>
                                        <td style='min-width: 400px;max-width: 400px;'>".$row['doctitle']."</td>
                                        <td>".$row['docDate']."</td>
                                        <td>".number_format($row['size']/1000, 2)." KB</td>
                                        <td style='padding: 0 40px;'><a class='optionbtn' href=\"./Documents/$studid/$docFile\">";
                                            if($extension == "pdf"){
                                                echo "<img src='img/ext/pdf.svg' width='25px'>";
                                            }elseif(in_array($extension, ["doc","DOC","docm","DOCM","docx","DOCX","dot","DOT","dotm","DOTM"],true)){
                                                echo "<img src='img/ext/word.svg' width='25px'>";
                                            }elseif(in_array($extension, ["xlsx","XLSX","csv","CSV","xlsm","XLSM","xltx","XLTX","xls","XLS"], true)){
                                                echo "<img src='img/ext/excel.svg' width='25px'>";
                                            }elseif($extension == "txt"){
                                                echo "<img src='img/ext/txt.svg' width='25px'>";
                                            }elseif(in_array($extension, ['ppt','pptx','PPT','PPTX','PPTM','pptm'], true )){
                                                echo "<img src='img/ext/power.svg' width='25px'>";
                                            }elseif(in_array($extension, ['zip','7z','RAR','rar','ZIP'], true )){
                                                echo "<img src='img/ext/zip.svg' width='25px'>";
                                            }elseif(in_array($extension, ['jpg','JPG','jpeg','JPEG','png','PNG','bmp','BMP','svg','SVG'], true )){
                                                echo "<img src='img/ext/img.svg' width='25px'>";
                                            }else{
                                                echo "<img src='img/ext/file.svg' width='25px'>";
                                            }
                                        echo "</a></td>
                                        <td style='padding: 0 40px;'><span style='span:hover{cursor:pointer;}' class='optionbtn' onclick='deleteDoc($docId)'><i style=\"color: rgb(248, 48, 48);\" class=\"fas fa-trash-alt\"></i></span></td>
                                    </tr>
                                ";
                                $sr++;    
                            }
                        }
                        else{
                            display_blank();
                        }
                    }
                }
            ?>
        </div>
        <div class="createDialog" id="createDialog">
            <form action="Student Docuements.php" method="post" enctype="multipart/form-data">
                <div class="upload">
                    <div class="header"><i class="fas fa-file-alt" style="margin-right: 10px; color: #fff;"></i><span>Add Document</span></div>
                    <div class="dial-body">
                        <input type="text" placeholder="Title" name="ftitle" id="ftitle">
                        <input type="file" name="ffile" id="ffile">
                    </div>
                    <div class="dial-btn"><button type="submit" style="background: #378b3a;" name="btnUpload">Upload<button style="background: #f44336;" onclick="closeDial()">Cancel</button></div>
                </div>
            </form>
        </div>
        <?php
            if(isset($_POST['btnUpload'])){
                $docTitile =  $_POST['ftitle'];
                $filename = $_FILES['ffile']['name'];
                $destination = "Documents/$studid/" . $filename;
                if(!file_exists("Documents/$studid/")){
                    mkdir("Documents/$studid/");
                }
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $file = $_FILES['ffile']['tmp_name'];
                $size = $_FILES['ffile']['size'];
                if (move_uploaded_file($file, $destination)) {
                    $quary = "INSERT INTO documentsData(`studid`,`docid`,`doctitle`,`docDate`,`size`,`file`) VALUES ('$studid', NULL, '$docTitile', now(), $size, ' $filename')";
                    $res = mysqli_query($con,$quary) or die(mysqli_error($con));
                    if ($res) {
                        displaySuccessBox("Document Uploaded Successfully");
                    } else {
                        dispAlertBox(0, "There is problem uploading your document");
                    }
                } else {
                    dispAlertBox(0, "Failed to Upload your Document");
                }
            }
            
        ?>
    <script>
        function closeDial(){
            document.getElementById("createDialog").style.display = "none";
        }  
        function showDial(){
            document.getElementById("createDialog").style.display = "flex";
        }
        function deleteDoc(id){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "deleteDocument.php?did="+id, true);
            xmlhttp.send();
            alert("Docuement Deleted Successfully");
            location.reload();
        }
    </script>
</body>
</html>