<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>
    <style>
        body{
            margin: 0;
            padding: 0;
            background: rgb(245, 245, 245);
            font-family: 'Roboto', sans-serif;
        }
        .display{
            padding: 10px;
        }
        table,td,tr,th{
            margin:0;
            padding:0;
        }
        table{
            background: #fff;
            margin:10px;
        }
        a{
            color: grey;
        }
        .filter-bar{
            display: flex;
        }
        .filter-bar .semister form{
            background: #fff;
            padding: 10px;
            display: flex;
            margin: 10px;       
            flex: 6;
            border-radius: 30px;
        }
        .filter-bar .semister form select{
            padding: 0 10px;
            margin: 0 15px;
        }
        .filter-bar .semister form button{
            background: #0986fc;
            color:#fff;
            border:none;
            margin: 0 10px;
            border-radius:20px;
            padding: 7px 15px;
        }
        .filter-bar .semister form span{
            color: rgba(0,0,0,0.9);
            margin:5px 10px; 
        }
        .filter-bar .semister form button:hover{
            background: #006eff;
            cursor:pointer;
        }
        td{
            border-bottom: 1px solid #b9b7b7;
            font-size: 15px;
            padding: 10px;
        }
        tr{
            border-bottom: 1px solid grey;

        }
        .space{
            padding-right: 8px;
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
            <div class="menu-item ">
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
            <div class="active-menu">
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
                <a href="Staff.php" class="active-nav">Staff</a>
                <span>/</span>      
               
            </div>
            <div class="profile">
                <a id="edit-profile">
                    <?php
                        include("Functions.php");

                        if(isset($_SESSION['logged'])){
                            $loggedUser = $_SESSION['logged'];
                            getLoggedInName($loggedUser); 
                        }
                    ?>
                </a>
                <a href="Login.php">Logout<i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>
    
        <div class="dashboard">
            <div class="display">
                <div class="filter-bar">
                    <form  method="post">
                        <div  class="text-warning text-center">
                        <button class="btn btn-success" type="submit" name="done" onclick="window.location.href = 'display.php';"> <a href="display.php" class="text-white">Staff Details </a></button><br>
                        </div>
                    </form             
                </div>
                
            </div>
        </div>
    </div>

   
    <script src="js/sidebar.js"></script>
</body>

</html>