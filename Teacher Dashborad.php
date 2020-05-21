<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC - Teacher Panel</title>
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
</head>

<body onload="collapse_sidebar()">

    <nav class="top-nav">
        <div class="banner">
            <img src="./img/sdpc_logo.png" alt="Icon" id="banner" width="45px">
        </div>
        <div class="title">
            <h1>Smart College</h1>
        </div>
        <div class="profile">
        <?php
            include("Database.php");
            include("Functions.php");
            
            session_start();
            $loggedUser = $_SESSION['logged'];
            getLoggedInName($loggedUser); 
        ?>
            <div class="pic"><i class="fas fa-user" id="user"></i><i class="fas fa-bars" id="bar"></i></div>
            <div class="profile-menu">
                <a href="#"><i class="fas fa-user-circle m-icon"></i>Edit Profile</a>
                <a href="Login.php"><i class="fas fa-sign-out-alt m-icon"></i>Logout</a>
            </div>
        </div>
    </nav>
    <div class="app">
        <div class="side-menu" id="side-bar">
            <div class="menu-item active-menu">
                <div class="item-icon"><i class="fa fa-cog " aria-hidden="true"></i></div>
                <div class="item-title">Dashboard</div>
            </div>
            <div class="menu-item">
                <div class="item-icon"><i class="fa fa-building " aria-hidden="true"></i></div>
                <div class="item-title">Deparment</div>
            </div>
            <div class="menu-item " id="stud">
                <div class="item-icon"><i class="fas fa-graduation-cap"></i></div>
                <div class="item-title">Students</div>
            </div>
            <div class="menu-item">
                <div class="item-icon"><i class="fas fa-users"></i></div>
                <div class="item-title">Staff</div>
            </div>
            <div class="menu-item">
                <div class="item-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                <div class="item-title">Time Table</div>
            </div>
            <div class="menu-item">
                <div class="item-icon"><i class="fas fa-bell"></i></div>
                <div class="item-title">Notice</div>
            </div>
            <div class="menu-item">
                <div class="item-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                <div class="item-title">Exam</div>
            </div>

            <div class="menu-item collapse-side" onclick="collapse_sidebar()"><i id="btn-side-icon"
                    class="fas fa-chevron-left "></i></div>
        </div>

        <div class="dashboard">
            <div class="row">
                <div class="card" id="card-deparment">
                    <h3>Deparment</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right"></i></span>
                    </div>
                </div>
                <div class="card" id="card-staff">
                    <h3>Staff</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right"></i></span>
                    </div>
                </div>
                <div class="card" id="card-students">
                    <h3>Students</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right"></i></span>
                    </div>
                </div>
                <div class="card" id="card-timetable">
                    <h3>Time Table</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right"></i></span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="card" id="card-notice">
                    <h3>Notice</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right"></i></span>
                    </div>
                </div>
                <div class="card" id="card-exam">
                    <h3>Attendance</h3>
                    <div class="view-details">
                        <span>View Details <i class="fas fa-chevron-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    var iscollapsed = true

    function collapse_sidebar() {
        if (iscollapsed) {
            var side = document.getElementById("side-bar")
            side.classList.remove("hide-side")

            var menuIcon = document.querySelectorAll(".item-icon")
            for (var i = 0; i < menuIcon.length; i++) {
                menuIcon[i].classList.remove("hide-icon");
            }

            var btn = document.getElementById("btn-side-icon")
            btn.classList.remove("fa-chevron-right")
            btn.classList.add("fa-chevron-left")
            btn.classList.remove("coll-short")
            btn.classList.add("coll-full")

            iscollapsed = false
            console.log("Side bar not collapsed")
        }
        else {
            var side = document.getElementById("side-bar")
            side.classList.add("hide-side")

            var menuIcon = document.querySelectorAll(".item-icon")
            for (var i = 0; i < menuIcon.length; i++) {
                menuIcon[i].classList.add("hide-icon");
            }

            var menuIcon = document.querySelectorAll(".menu-item")
            for (var i = 0; i < menuIcon.length; i++) {
                menuIcon[i].classList.add("hover-item");
            }

            var btn = document.getElementById("btn-side-icon")
            btn.classList.remove("fa-chevron-left")
            btn.classList.add("fa-chevron-right")
            btn.classList.remove("coll-full")
            btn.classList.add("coll-short")
            

            iscollapsed = true;
            console.log("Side bar collapsed")
        }
    }
</script>

</html>