<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC | Students</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link rel="stylesheet" href="./css/student details.css">
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
        a{
            color:grey;
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
            <div class="active-menu" id="stud">
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

        <div class="menu-item collapse-side" onclick="collapse_sidebar()"><i id="btn-side-icon" class="fas fa-chevron-left "></i></div>
    </div>
    <div class="app" id="app">
    <nav class="top-nav">
            <?php
                include("Database.php");
                include("Functions.php");        
            ?>
            <div class="navigation">
                <a href="Admin Dashborad.php"> <i class="fas fa-home"></i>Home</a>
                <span>/</span>
                <a href="Student Details.php" class="active-nav">Students</a>
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
        <div class="dashboard">
            <form class="search-bar" method="POST" action="Student Details">
                <select name="dept" id="year">
                    <option value="0">Select Department</option>
                    <option value="CO">CO</option>
                    <option value="ME">ME</option>
                    <option value="EE">EE</option>
                    <option value="CE">CE</option>
                    <option value="EJ">EJ</option>
                </select>
                <input type="text" name="searchbox" id="searchbox" placeholder="Name" onkeyup="search()">
                <button><i class="fas fa-search"></i><span>Search</span></button>
            </form>
            <hr>

            <!-- PHP CODE -->
            <?php
            if (isset($_POST['dept'])) {
                $dept = $_POST['dept'];

                $res = mysqli_query($con,"SELECT * FROM students WHERE dept='$dept'");

                if ($res) {
                    if ($dept == "0") {
                        echo "<p id='msg'>Select Department</p>";
                    } else {
                        echo "
                                <table id='row' class='center'>
                                <thead>
                                    <td>ID</td>
                                    <td>Enrollment No</td>
                                    <td>Student Name</td>
                                    <td>View Details </td>    
                                </thead>
                            ";
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<tr><td>{$row['id']}</td><td>{$row['Enrollno']}</td><td>{$row['First_name']} {$row['Last_name']}</td><td><button id='view'>View</button></td></tr>\n";
                        }
                        echo "</table>";
                    }
                } else {
                    echo "Error message = " . mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>

    <script>
        function search() {
            var filter = document.getElementById("searchbox").value.toUpperCase();
            var myTable = document.getElementById("row");
            var tr = myTable.getElementsByTagName("tr");
            for (var i = 0; i < tr.length; i++) {
                var name = tr[i].getElementsByTagName('td')[2];
                if (name) {
                    var textValue = name.textContent || name.innerHTML;
                    if (textValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>