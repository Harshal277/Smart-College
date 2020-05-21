<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC - Admin Panel</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/admin dashboard.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/fontawesome.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./webfonts/fa-regular-400.woff2">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css">
    <script src="https://kit.fontawesome.com/d83f952c69.js"></script>
    <script src="./js/all.js"></script>
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>
</head>

<body onload="collapse_sidebar()">
    <div class="side-menu" id="side-bar">
        <div class="side-profile">
            <img src="img/sdpc_logo.png" alt="Icon" id="college-logo">
        </div>

        <a href="Admin Dashborad.php" style="text-decoration: none;">
            <div class=" active-menu" >
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

    <?php
        include("Database.php");
        include("Functions.php");
        include("Error.php");
        
        session_start();
            
    ?>
    <div class="app" id="app">
        <nav class="top-nav">
            <div class="navigation">
                <a href="Admin Dashborad.php" class="active-nav"> <i class="fas fa-home"></i>Home</a><span>/</span>
            </div>
            <div class="profile">
                <a id="edit-profile">
                    <?php 
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
            // unset($_SESSION['logged']);
        ?>    
        <div class="dashboard">
            <div class="row">
                <div class="card" id="card-deparment" onclick="window.location = 'Department.php';">
                    <div class="border">
                        <h3>Department</h3>
                        <div class="view-details">
                            <span>View Details <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card" id="card-staff" onclick="window.location = 'Staff.php';">
                    <h3>Staff</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="card" id="card-students" onclick="window.location = 'Student Details.php';">
                    <h3>Students</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="card" id="card-timetable" onclick="window.location = 'Timetable Dashboard.php';">
                    <h3>Time Table</h3>
                    <div class="view-details">
                        <span>Create Timetable <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="card" id="card-notice" onclick="window.location = 'Notice.php';">
                        <h3>Notice</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="card" id="card-exam" onclick="window.location = 'Subject Allocation.php';">
                        <h3>Subject</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/sidebar.js"></script>
</body>

</html>