<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC | Timetables</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/admin dashboard.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <script src="js/sidebar.js"></script>
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

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: rgb(243, 243, 243);
        }
        table, tr, td{
            padding: 0;
            border-spacing: 0px;
            margin: 0;
            color: black;
        }
        table{
            margin: 20px;
            width: 90%;
            border: 2px solid #d8d8d8;
        }
        tr:nth-child(odd){
            background:#e8e8e8;
        }
        td{
            margin: 5px;
            padding: 15px;
        }
        td:hover{
            background: #2196f3;
            color: #fff;
            cursor: pointer;
        }
        button{
            border-radius: 5px;
            padding: 8px 15px;
            width: 80px;
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
            height: 80vh;
            margin: 5vh 30vw;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            background: #fff;
            border-radius: 10px;
            display: flex;
            overflow: auto  ;
            flex-direction: column;
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

        #viewN button{
            display: none;
        }
        #nTitle{
            color: black;
        }
        #nDesc{
            color: grey;
        }
        
        .blankText{
            display: block;
            text-align: center;
            color: grey;
            font-size: 20px;
        }
        h5{
            margin: 10px 0;
            text-align: center;
            color: rgb(20, 20, 20);          
            font-size: 30px;
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
            <div class="active-menu">
                <div class="item-icon"><i class="fas fa-bell" aria-hidden="true"></i></div>
                <div class="item-title">Notice</div>
            </div>
        </a>
        <a href="Student Docuements.php" style="text-decoration: none;">
            <div class="menu-item">
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
                <a href="Student Notice.php" class="active-nav">Notices</a>
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
            <table>
                <?php
                    $n = mysqli_query($con, "SELECT * FROM notice");
                    $num = mysqli_num_rows($n);
                    if($num > 0){
                        while($row = mysqli_fetch_array($n)){
                            $i = $row['id'];
                            echo "<tr>";
                                echo "<td onclick=\"showNotice(this)\" id='$i' >".$row['title']."</td>";
                            echo "</tr>";
                        }
                    }else {
                        echo "<span class='blankText'>No Notice Found</span>";
                    }
                ?>
                <div id="viewNotice" class="dialog" >
                    <div class="content" id="viewN">
                        <!-- From ajax                 -->
                    </div>
                </div>
            </table>
        </div>
    <script>
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
            
        function closeNotice() {
            document.getElementById("viewNotice").style.display = "none";
            document.getElementById("viewNotice").style.zIndex = "-999999";
        }
    </script>
</body>
</html>