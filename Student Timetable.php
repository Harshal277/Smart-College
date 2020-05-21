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
            margin: 30px;
            border-radius: 10px;
        }
        td{
            padding: 10px;
        }
        .span-sem{
            color: rgb(20, 20, 20);
            text-align: center;
            display: block;
            font-weight: bold;
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
        .cardtt{
            border-radius: 15px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
            background: #fff;
            padding: 30px 20px;
        }
        .cardtt:hover{
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.4);
        }
        .cardtt-body{
            padding: 10px;
        }
        .card-btn{
            margin: 15px 0;
        }
        .card-btn .btn{
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
        .span-sem{
            color: rgb(20, 20, 20);
            text-align: center;
            display: block;
            font-weight: bold;
        }
        #btn-view{
            background: rgb(14, 125, 236);
        }
        #btn-view:hover{
            cursor: pointer;
            background: rgb(1, 99, 197);
        }
        #btn-delete{
            background: #eb182af6;
        }
        #btn-delete:hover{
            background: #ea001f;
            cursor: pointer;
        }
        .card-buttom{
            bottom: 0;
            text-align: right;
            margin-top: 20px;
        }
        #showTT{
            position: absolute;
            background: rgba(0,0,0,0.3);
            top: 0;
            left: 0;
            display: none;
            right: 0;
            bottom: 0;
            padding: 30px;
        }
        #table{
            border-radius: 5px;
            background: #fff;
            overflow: scroll;            
            padding: 20px;
        }
        .menu{
            margin-bottom: 20px;
            display: flex;
        }
        .menu span{
            color: #565656;
            margin-left:auto;
        }
        #close-btn {
            font-size: 25px;
        }

        #close-btn:hover {
            color: black;
            cursor: pointer;
        }

        /* Table Formating */
        .printable{
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
            background: #fff;
        }
        .layout{
            display: flex;
            flex-direction: column;
        }
        .showTable{
            margin: 0;
        }
        .showTable td{
            padding: 10px 120px;
            font-size: 15px;
            text-align: center;
            font-family: "times new roman";
            border:0.5px solid rgba(0,0,0,0.7);
        }
        .showTable .day{
            font-weight: bold;
        }
        
        /* Time table Formating */
        .timetable-head td{
            font-weight: bold;
            font-size: 13px;
            letter-spacing: 4px;            
            padding: 4px 120px;

        }
        .smallinfo td{
            padding: 3px;
            font-size: 13px;
        }
        .recess td{
            font-family: 'Times new roman';
            padding: 3px;
            font-size: 13px;
            font-weight: bolder;
            letter-spacing: 50px;
        }
        .timetable-column td{
            font-size: 14px;
            padding: 6px 7px;
            text-transform: uppercase;
        }
        .timetable-subjects td{
            padding: 6px 30px ;
            font-size: 14px;
        }
        .sub-name{
            color: black;
            font-weight: bold;
        }
        .timetable-footer{
            height: 40px;
        }
        .timetable-footer td{
            display: table-cell;
            vertical-align: bottom;
        }
        .timetable-footer .effectdate{
            padding: 20px;
        }

        /* Details */
        .footer-details{
            font-size: 12px;
            margin: 10px 0;
        }
        .footer-column-heading td{
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }
        .footer-column-heading2 td{
            font-size: 11px; 
            font-weight: bold;
            text-align: center;
        }
        .footer-details td{
            padding: 3px 20px;
            border:0.5px solid rgba(0,0,0,0.7);
        }
    </style>
</head>

<body onload="collapse_sidebar()">
    <div class="side-menu" id="side-bar">
        <div class="side-profile">
            <img src="img/sdpc_logo.png" alt="Icon" id="college-logo">
        </div>
        <a href="Student Dashboard.php" style="text-decoration: none;">
            <div class="menu-item">
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
            <div class="active-menu">
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
                <a href="Student Timetable.php" class="active-nav">Timetables</a>
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
            <?php
                $stud = mysqli_query($con, "SELECT * FROM students WHERE sUser = '$loggedUser'");
                $row = mysqli_fetch_array($stud);
                $dept = $row['dept'];
                $countRows = 4; 
                $tables = mysqli_query($con,"SELECT * FROM `timetables` WHERE dept='$dept' ORDER BY `name` ASC ");
                echo "<table><tr>";
                while($row = mysqli_fetch_array($tables)){
                    $tt_sem = $row['semister'];
                    $tt_dept = $row['dept'];
                    $Cdate = $row['date_created'];
                    $table = $tt_dept.$tt_sem."i";
                    if(($tt_sem == 1) or ($tt_sem == 2)){
                        $class = "FY".$tt_dept;
                    }elseif(($tt_sem == 3) or ($tt_sem == 4)){
                        $class = "SY".$tt_dept;
                    }else{
                        $class = "TY".$tt_dept;
                    }
                    $name = $row['name'];
                    echo "<td>";
                    echo "<div class=\"cardtt\">
                    <div class=\"cardtt-body\">
                        <h5>$class</h5>
                        <span class=\"span-sem\">$name</span>
                    </div>
                    <div class=\"card-btn\">
                        <button class=\"btn\" id=\"$name\" name=\"$name\" onclick='show(this)'>View</button>
                    </div>        
                    <div class=\"card-buttom\">
                        <span id=\"dateCreated\">Created On <em>$Cdate</em></span></div></div>";
                    echo "</td>";
                }
                echo "</tr></table>";
            ?>
        </div>
        <div id="showTT"><div id="table"></div></div>
    <script>
        function show(nm){
            document.getElementById("showTT").style.display = "grid";
            name = nm.id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("table").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "showTimetable.php?name="+name, true);
            xmlhttp.send();
        }
        function printTable(){
            var content = document.getElementById("layout").innerHTML;
            var orignal = document.body.innerHTML;
            document.body.innerHTML =  content;
            window.print();
            document.body.innerHTML = orignal;
        }
        function closePrint(){
            var table = document.getElementById("showTT").style.display = "none";
        }
    </script>
</body>
</html>