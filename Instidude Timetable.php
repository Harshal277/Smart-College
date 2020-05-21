<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC | Institude Timetable</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/admin dashboard.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <script src="js/sidebar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/fontawesome.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d83f952c69.js"></script>
    <script src="./js/all.js"></script>
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>

    <style>
        body{
            overflow: scroll;
        }
        .options{
            color: black;
            background: #fff;
            width: 857;
            padding: 10px;
            margin: 20px;
            box-shadow: 0 0 10px 0px rgba(0,0,0,0.1);
            border: 1px solid rgba(0,0,0,0.1);
        }
        .options td{
            border:none;
        }
        select{
            border: none;
            border-radius: 0px;
            border: 1px solid rgba(0,0,0,0.3);
            padding: 5px;
            width: 100px;
            background: white;
            margin: 0 10px;
        }
        h5{
            font-size: 18px;
            margin: 10px;
            padding: 10px;
            text-align:center;
            font-weight: 500;
            color: grey;
        }
        
        select:focus{
            outline-color: DodgerBlue;    
        }
        td{
            padding: 8px 15px;
        }
        button{
            border: none;
            background: #007fff;
            border-radius: 25px;
            margin-left: 10px;
            padding: 10px 30px;
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
        input{
            padding: 8px 10px;
        }
        .displayIT{
            color: black;
        }
        .divtable{
            background: #fff;
            padding: 10px;
        }
        #printIT table{
            padding: 0;
        }
        #printIT {
            display:flex;
            flex-direction: column;
        }
        
        #printIT td{
            border: 1px solid grey;
            text-align: center;
            color:#000;
        }
        #printIT .titletd{
            background: #efefef;
        }
        #printIT .titletd td{
            padding: 12px;
            font-weight: bold;
        }
        #printIT .info td{
            padding: 0;
        }
        #printIT h1{
            color: #000;
            text-align: center;
            font-size: 15px;
        }
        #showTT{
            position: absolute;
            background: rgba(0,0,0,0.3);
            top: 0;
            left: 0;
            overflow: hidden;
            right: 0;
            bottom: 0;
            padding: 30px;
        }
        #table{
            height: 100vh;
            border-radius: 5px;
            box-shadow: 0 0 10px 3px rgba(0,0,0,0.2);
            background: #fff;
            overflow: scroll;            
            padding: 5px;
        }
        .menu{
            display: flex;
            padding: 0px 30px;
            padding-top: 20px;
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
            <div class="active-menu">
                <div class="item-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                <div class="item-title">Time Table</div>
            </div>
        </a>
        <a href="Notice.php" style="text-decoration: none;">
            <div class="menu-item">
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
                <a href="Timetable Dashboard.php">Timetable</a>
                <span>/</span>
                <a href="Instidude Timetable.php" class="active-nav">Institude</a>
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
            <div class="options">
                <table>
                    <tr>
                        <td>
                            <div class="box">
                                <span>Select Year</span>
                                <select name="year" id="year">
                                    <option selected disabled value="0">Year</option>
                                    <option value="FY">FY</option>
                                    <option value="SY">SY</option>
                                    <option value="TY">TY</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <button onclick="createIT(year.value)">Create</button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="displayIT" id="displayIT">
                
            </div>
        </div>
    <script src="js/alertbox.js"></script>
    <script>
        function createIT(year){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("displayIT").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "Institute create.php?year="+year, true);
            xmlhttp.send();
        }
        
        function closePrint(){
            var table = document.getElementById("showTT").style.display = "none";
        }
        function printTable(){
            var content = document.getElementById("divtable").innerHTML;
            var orignal = document.body.innerHTML;
            document.body.innerHTML =  content;
            window.print();
            document.body.innerHTML = orignal;
        }
    </script>
</body>
</html>