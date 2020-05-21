<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC - Department</title>
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
            font-family: 'Roboto', sans-serif;
            color: white;
            background: rgb(245, 245, 245);
            overflow: hidden;
        }
        .dashboard{
            padding: 10px;
            display: flex;
            flex-direction: row;
        }
        .card{
            background: #007fff;
            padding: 2px 10px;
            margin: 10px;
        }
        .card:hover{
            background: #0000aa;
            cursor:pointer;
        }
        form{
            color: black;
            background: #fff;
            width: 857;
            padding: 10px;
            margin: 20px;
            box-shadow: 0 0 10px 0px rgba(0,0,0,0.1);
            border: 1px solid rgba(0,0,0,0.1);
        }
        h3{
        }
        h5{
            font-size: 18px;
            margin: 10px;
            padding: 10px;
            text-align:center;
            font-weight: 500;
            color: grey;
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
            </div>
            <div class="profile">
                <a id="edit-profile">Full Name</a>
                <a href="Login.php">Logout<i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>
    
        <div class="dashboard">
            <?php
                include("Database.php")   
            ?>
            <div class="card" onclick="window.location = 'Subject Add.php';">
                <h3>New Subject</h3>
            </div>
            <div class="card" onclick="window.location = 'Subject.php';">
                <h3>Show Subjects</h3>
            </div>
            <div class="card" onclick="window.location = 'Subject Allocation.php';">
                <h3>Subject Allocation</h3>
            </div>
        </div>
    </div>
    <script src="js/sidebar.js"></script>
</body>

</html>