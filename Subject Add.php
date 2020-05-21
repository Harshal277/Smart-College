<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC | Subject Add</title>
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
    <link rel="stylesheet" href="./css/alertbox.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d83f952c69.js"></script>
    <script src="./js/all.js"></script>
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>

    <style>
        form{
            color: black;
            background: #fff;
            width: 857;
            padding: 10px;
            margin: 20px;
            box-shadow: 0 0 10px 0px rgba(0,0,0,0.1);
            border: 1px solid rgba(0,0,0,0.1);
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
                <a href="Department.php" class="active-nav">Department</a>
                <span>/</span>
                <a href="Subject Add.php" class="active-nav">Add Subject</a>
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
        <form action="Subject Add.php" method="POST">
        <table>
            <tr>
                <td>
                    <div class="box">
                        <span>Department</span>
                        <select name="dept" id="dept">
                            <option value="CO">CO</option>
                            <option value="ME">ME</option>
                            <option value="ME">EE</option>
                            <option value="CE">CE</option>
                            <option value="E&TC">E&TC</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="box">
                        <span>Semester</span>
                        <select name="sem" id="sem">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </td> 
            </tr>
            <tr>
                <td><span>Subject Name</span></td>
                <td>
                    <input type='text' name='fullname' placeholder='Full Name'>
                </td>
            </tr>
            <tr>
                <td><span>Subject Code</span></td>
                <td>
                    <input type='text' name='subcode' placeholder='Subject Code'>
                </td>
            </tr>
            <tr>
                <td><span>Abbrivation</span> </td>
                <td>
                    <input type='text' name='subabb' placeholder='Subject Abbrivation'>
                </td>
                <td>
                    <button type'submit' value='Submit' colspan='2' style='margin:auto;'>Submit</button>
                </td>
            </tr>
        </table>
    </form>    
        </div>

    <?php
        include("Database.php");
        if (isset($_POST['dept']) && isset($_POST['sem'])) {
            $dept = $_POST['dept'];
            $sem = $_POST['sem'];
            $code = $_POST['subcode'];
            $fullname = $_POST['fullname'];
            $subabb = $_POST['subabb'];
            $insert = mysqli_query($con,"INSERT INTO `subject` (`id`, `name`, `abbrivation`, `subcode`, `dept`, `sem`) VALUES (NULL, '$fullname', '$subabb', '$code','$dept', '$sem')");
            if($insert){
                displaySuccessBox("Subject Added Successfully");  
            }
        }            
    ?>
    <script src="js/alertbox.js"></script>

</body>
</html>