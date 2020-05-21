<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC | Notice</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/admin dashboard.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <script src="js/sidebar.js"></script>
    <link rel="stylesheet" href="./css/alertbox.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/fontawesome.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./webfonts/fa-regular-400.woff2">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d83f952c69.js"></script>
    <script src="./js/all.js"></script>
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>
    <script src="./js/alertbox.js"></script>
    <style>
        body {
            color: black;
            overflow: hidden;
            font-family: 'Roboto', sans-serif;
        }
        a{
            color:grey;
        }
        .dashboard {
            text-align: center;
        }

        .dialog {
            background: rgba(0, 0, 0, 0.5);
            display: none;
            width: 100vw;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .dialog form, #viewN{
            text-align: center;
            width: 35vw;
            overflow: auto;
            height: 80vh;
            margin: 5vh 30vw;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            background: #fff;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        #dialogCreate form button {
            padding: 8px 25px;
        }

        .showDialog {
            display: block;
        }

        .closeDialog {
            display: none;
        }

        button {
            background: #2192f3;
            border: none;
            padding: 10px 25px;
            color: white;
            border-radius: 5px;
            font-size: 13px;
        }

        .btn {
            display: flex;
            margin: 25px 95px;
        }

        .btn #createBtn {
            padding: 13px 40px;
        }

        .btn #resetBtn {
            margin-left: 30px;
            padding: 13px 40px;
        }

        input,
        textarea {
            border: none;
            border: 1px solid black;
            padding: 10px;
            margin: 15px 70px;
            border-radius: 5px;
            font-family: 'Roboto';
            font-size: 15px;
        }

        textarea {
            resize: none;
        }

        #noticeDept{
            border: none;
            border: 1px solid black;
            padding: 10px;
            margin: 15px 100px;
            border-radius: 5px;
            font-size: 15px;
        }

        input:focus {
            outline-color: transparent;
            border: 1px solid #0e75f5;
        }

        input:hover {
            outline-color: transparent;
            border: 1px solid #2192f3;
        }

        textarea:hover {
            border-color: #2192f3;
        }

        button:hover {
            background: #0e75f5;
            cursor: pointer;
        }

        #close-btn {
            font-size: 25px;
            color: #565656;
            margin-top: 15px    ;
            margin-left: 92%;
        }

        #close-btn:hover {
            color: black;
            cursor: pointer;
        }

        hr {
            margin: 15px 0;
        }

        #msg {
            background: rgb(252, 213, 213);
            color: rgb(250, 26, 26);
            padding: 15px 50px;
            text-align: center;
            border: 1px solid red;
        }

        table {
            width: 100%;
        }
        tr {
            margin: 5px;
            padding: 10px;
            border-color: black;
            background: #e8e8e8;
            border: 1px solid #f0f0f0;
        }

        tr:hover {
            background: #e0e0e0;
            cursor: pointer;
        }       
        .displayBody{
            overflow-y: scroll;
            max-height: 70%;
            height: 70%;
        }
    </style>
</head>

<body onload="collapse_sidebar()">
    <div class="side-menu" id="side-bar">
        <div class="side-profile">
            <img src="img/sdpc_logo.png" alt="Icon" id="college-logo">
        </div>

        <a href="Admin Dashborad.php" style="text-decoration: none;">
            <div class="menu-item" >
                <div class="item-icon"><i class="fa fa-cog" aria-hidden="true"></i></div>
                <div class="item-title">Dashboard</div>
            </div>
        </a>
        <a href="Department.php" style="text-decoration: none;">
            <div class="menu-item">
                <div class="item-icon"><i class="fas fa-building" aria-hidden="true"></i></div>
                <div class="item-title">Department</div>
            </div>
        </a>
        <a href="Student Details.php" style="text-decoration: none;">
            <div class="menu-item " id="stud">
                <div class="item-icon"><i class="fas fa-graduation-cap" aria-hidden="true"></i></div>
                <div class="item-title">Students</div>
            </div>
        </a>
        <a href="Staff.php" style="text-decoration: none;">
            <div class="menu-item">
                <div class="item-icon"><i class="fas fa-users" aria-hidden="true"></i></div>
                <div class="item-title">Staff</div>
            </div>
        </a>
        <a href="Timetable Dashboard.php" style="text-decoration: none;">
            <div class="menu-item">
                <div class="item-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                <div class="item-title">Time Table</div>
            </div>
        </a>
        <a href="Notice.php" style="text-decoration: none;">
            <div class="active-menu">
                <div class="item-icon"><i class="fas fa-bell" aria-hidden="true"></i></div>
                <div class="item-title">Notice</div>
            </div>
        </a>
        <a href="Subject Allocation.php" style="text-decoration: none;">
            <div class="menu-item">
                <div class="item-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                <div class="item-title">Subject</div>
            </div>
        </a>

        <div class="collapse-side" onclick="collapse_sidebar()">
            <i id="btn-side-icon" class="fas fa-chevron-left " aria-hidden="true"></i>
        </div>
    </div>
    <div class="app" id="app">
        <nav class="top-nav">
            <div class="navigation">
                <a href="Admin Dashborad.php"> <i class="fas fa-home"></i>Home</a>
                <span>/</span>
                <a href="Notice.php" class="active-nav">Notice</a>
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
        
    <?php
        function showNotice(){
            global $con, $title, $noticeDate, $countNotice, $displayTable;
            echo "<table>";
                $res = mysqli_query($con,"SELECT * FROM notice");
                if ($res) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $t = $row['title'];
                        $d = $row['date'];
                        $id = $row['id'];
                    echo "<tr onclick=\"showNotice(this)\" id='$id' ><td style='padding: 15px;'>$t</td><td><span>$d</span></td></tr>";
                }
                $countNotice = mysqli_num_rows($res);
                $displayTable = true;
            }
            echo "</table>";
        }
        $msg = "";
        $m = "";
        $title = array();
        $noticeDate = array();
        $res = mysqli_query($con,"SELECT * FROM notice");
        if ($res) {
            $n = mysqli_num_rows($res);
            if($n > 0){
                while ($row = mysqli_fetch_assoc($res)) {
                    $title[] = $row['title'];
                    $noticeDate[] = $row['date'];
                }
                $countNotice = mysqli_num_rows($res);
                $displayTable = true;
            } else {
                $m = "false";
                $msg = "No Notice Found";
                $displayTable = false;
            }
        }

        if (isset($_POST['title'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = date('Y-m-d');
            $filename = "";
            $filename = $_FILES['nfile']['name'];
            if($filename != ""){
                // destination of the file on the server
                $destination = 'uploads/' . $filename;
                // get the file extension
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                // the physical file on a temporary uploads directory on the server
                $file = $_FILES['nfile']['tmp_name'];
                $size = $_FILES['nfile']['size'];

                if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
                    $msg = "You file extension must be .zip, .pdf or .docx";
                } elseif ($_FILES['nfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
                    $msg = "File too large!";
                } else {
                    if (move_uploaded_file($file, $destination)) {
                        $quary = "INSERT INTO notice(`title`,`description`,`date`,`file`,`size`) VALUES('$title','$description','$date','$filename','$size')";
                        $res = mysqli_query($con,$quary) or die(mysqli_error($con));
                        if ($res) {
                            $msg = "Notice Created";
                            $m = "true";
                        } else {
                            $msg = "Notice not Created";
                            $m = "false";
                        }
                    } else {
                        $msg = "Failed to upload file.";
                        $m = "false";
                    }
                }
            }    
            else{
                $quary = "INSERT INTO notice(`title`,`description`,`date`,`file`,`size`) VALUES('$title','$description','$date', NULL, NULL)";
                $res = mysqli_query($con,$quary) or die(mysqli_error($con));
                if ($res) {
                    $msg = "Notice Created";
                    $m = "true";
                } else {
                    $msg = "Notice not Created";
                    $m = "false";
                }
            }
        }
        ?>
        <div class="dashboard" id="dashboard">
            <button onclick="showDialog()">CREATE</button>
            <hr>
            <div class="displayBody">
            <?php
                if($displayTable){
                    showNotice();
                }
                if ($m == "true") {
                    echo "<p id='msg' style='background: #d5fcd8;
                        color: #101010e3;
                        border: 1px solid #30ea43;'>$msg</p>";
                }
                if ($m == "false") {
                    echo "<p id='msg' style='background: rgb(252, 213, 213);    
                        color: rgb(250, 26, 26);
                        border: 1px solid red;'>$msg</p>";
                }   
                if($m == "delete") {
                    echo "<p id='msg' style='background: #ef3f07;    
                        color: rgb(250, 26, 26);
                        border: 1px solid red;'>Notice Deleted</p>";
                }             
            ?>
            </div>
        </div>
        <div id="dialogCreate" class="dialog">
            <form action="Notice.php" method="post" enctype="multipart/form-data" >
                <i class="fas fa-times" id="close-btn" onclick="closeDialog()"></i>
                <h1>CREATE NOTICE</h1>
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="description" placeholder="Description" rows="5"></textarea>
                <input type="file" name="nfile">
                <div class="btn">
                    <button type="submit" id="createBtn">CREATE</button>
                    <button type="reset" id="resetBtn">RESET</button>
                </div>
                <input type="hidden" name="msg" id="msg">
            </form>
        </div>

        <div id="viewNotice" class="dialog" >
            <div class="content" id="viewN">
                <!-- From ajax                 -->
            </div>
        </div>
        <input type="hidden" name="title" id="title">
</body>
<script>
    function showDialog() {
        document.getElementById("dialogCreate").style.display = "block";
        document.getElementById("dialogCreate").style.zIndex = "999999";
    }

    function closeDialog() {
        document.getElementById("dialogCreate").style.display = "none";
        document.getElementById("dialogCreate").style.zIndex = "-999999";
    }

    function showNotice(ob) {
        document.getElementById("viewNotice").style.display = "block";
        document.getElementById("viewNotice").style.zIndex = "999999";

        id = ob.id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("viewN").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getNotice.php?id="+id, true);
        xmlhttp.send();
        console.log("Notice Selected : "+ob.innerText);
    }

    function deleteNotice(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "deleteNotice.php?id="+id, true);
        xmlhttp.send();
        console.log("Notice Deleted : "+id);
        location.reload();
    }

    function closeNotice() {
        document.getElementById("viewNotice").style.display = "none";
        document.getElementById("viewNotice").style.zIndex = "-999999";
    }
</script>

</html>