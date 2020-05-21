<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subjects</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/alertbox.css">
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
            padding: 15px 30px;
            display: flex;
            margin: 10px;       
            flex: 6;
            border-radius: 10px;
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
        .searchdiv{
            display: flex;
            flex: 2;
            margin: 10px;
            border-radius: 30px;
            padding: 8px 10px;
            margin-left: 48%;
            background: #fff;
        }
        .searchdiv input{
            border: none;
            margin-left: 10px;
            font-size: 15px;
        }
        .searchdiv input:focus, button:focus{
            outline:none;
        }
        .searchdiv button{
            border:none;
            background: #0986fc;
            border-radius: 50%;
            color:white;
            padding: 10px;
        }
        .searchdiv button:hover{
            background: #006eff;
            cursor:pointer;
        }
        .delbtn{
            border:none;
            background: #fb4638;
            border-radius: 5px;
            color:white;
            padding: 10px 20px;
        }
        .delbtn:hover{
            background: #ef2314;
            cursor:pointer;
        }
        td{
            font-size: 15px;
            border-left: 1px solid #e6e6e6;
            padding: 10px;
        }
        tr:nth-child(odd){
            background: #ececec;
        }
        tr{
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
            <div class="active-menu">
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
                <a href="Department.php" class="active-nav">Department</a>
                <span>/</span>      
                <a href="Subject.php" class="active-sub-nav">Subject</a>
            </div>
            <div class="profile">
                <a id="edit-profile">
                    <?php
                        include("Database.php");
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
                    <div class="semister">
                        <form action="Subject.php" method="get">
                            <span>Department</span>
                            <select name="dept" id="dept">
                                <option selected disabled value="0">Select Department</option>
                                <option value="CO">CO</option>
                                <option value="ME">ME</option>
                                <option value="CE">CE</option>
                                <option value="EE">EE</option>
                                <option value="E&TC">E&TC</option>
                            </select>
                            <span>Semister</span>
                            <select name="semi" id="semi">  
                                <option selected disabled value="0">Select Semister</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                            <button type="submit" name="show">Display</button>
                        </form>
                    </div>
                              
                </div>
                <div class="table-display" id='dispTable'>
                    <table cellspacing='0'>
                        <?php
                            if(isset($_GET['show'])){
                                if(isset($_GET["semi"]) && isset($_GET['dept'])){
                                    $sem_set = $_GET["semi"]; 
                                    $dept = $_GET['dept'];
                                    displayTableSub($dept, $sem_set);
                                    $_SESSION['alloDept'] = $dept;
                                    $_SESSION['alloSem'] = $sem_set;
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function fill_hidden(){
            var sem = document.getElementById("semi");
            var semValue = sem.options[sem.selectedIndex].value;
            document.getElementById("sem_set").value = semValue;
        }
        function deleteAllo(id){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dispTable").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "deleteAllocation.php?id="+id, true);
            xmlhttp.send();
        }
    </script>
    <script src="js/sidebar.js"></script>
    <script src="js/alertbox.js"></script>
</body>

</html>