<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC - Time Table</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>
    <script src="js/sidebar.js"></script>

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: rgb(243, 243, 243);
        }
        .ttapp{
            height:100%;
            width:100%;
        }
        
        a{
            color: grey;
        }

        .btncard{
            display:flex;
        }
        
        .btn{
            border: none;
            width: 100px;
            height: 35px;
            border-radius: 5px;
            background: #0c79ff;
            color: #fff;
            font-size: 15px;
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
            margin: 5px;
        }
        .remainingTT{
            margin: 50px;
            padding: 10px;
            box-shadow: 0 0 15px 0px rgba(0,0,0,0.1);
            border: 1px solid rgba(0,0,0,0.1);
            width:300px;
            height: 300px;
            overflow-x: hidden; 
            overflow-x: auto; 
        }
        .remainCard{
            background: red;
            border-radius:5px;
            height: 50px;
        }
        .btncard{
            margin: 50px;
        }
        button:hover{
            background: #2196f3;
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
                <a href="Timetable Dashboard.php">Time Table</a>
            </div>
            <div class="profile">
                <a id="edit-profile">
                    <?php
                        include("Functions.php");
                        include("Database.php");
                        
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
        <div class="ttapp">
            <div class="btncard">
                <div class="createcard">
                    <button class="btn" onclick="window.location = 'Time Table.php';">CREATE</button>
                </div>
                <div class="showcard ">
                    <button class="btn"  onclick="window.location = 'Show Timetables.php';">SHOW</button>
                </div>
                <div class="timeslotcard">
                    <button class="btn" style="width:100px;" onclick="window.location = 'Time Slots.php';">Time Slot</button>
                </div>
                <div class="timeslotcard">
                    <button class="btn" style="width:100px;" onclick="window.location = 'Individual Timetable.php';">Individual</button>
                </div>
                <div class="timeslotcard">
                    <button class="btn" style="width:250px;" onclick="window.location = 'Instidude Timetable.php';">Institude Timetable</button>
                </div>
            </div>  
            <!-- <div class="tables">
                <div class="remainingTT">
                    <div class="remainCard">
                        <table>
                            
                        </table>                        
                    </div>
                </div>
            </div>       -->
        </div>
    </div>
</body>
</html>