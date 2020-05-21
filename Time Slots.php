<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC - Time Slot</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link href="css/mdtimepicker.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/jquery.js"></script>

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: rgb(245, 245, 245);
        }
        a{
            color: grey;
        }
        
        table,td,tr,th{
            margin:0;
            padding:0;
            border-spacing: 0px;
        }
        table{
            margin: 20px;
        }
        .tbl-content thead{
            font-size:16px;
        }
        td{
            text-align:center;
        }
        .mdtimepicker{
            background-color:rgba(255, 255, 255, 0.55);
            left:-20%;
        }
        .mdtp__wrapper{  
            transform: translateY(-30%);
        }
        .tb{
            width:100%;
            table-layout: fixed;
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
        }
        .tbl-content{
            background: #fff;
            box-shadow: 0 0 10px 0px rgba(0,0,0,0.3);
            font-family: 'Roboto', sans-serif;
            margin-top: 0px;
            border: 1px solid rgba(255,255,255,0.3);
        }        
        .tbl-content td{
            padding: 10px 20px;
            text-align: center;
            vertical-align:middle;
            font-weight: 300;
            font-size: 15px;
            color:#000;
            border-bottom: solid 1px rgba(255,255,255,0.1);
        }
        .tbsec{
            margin: 50px;
        }
        .txt{
            height:30px;
            width: 80%;
            font-size: 18px;
            text-align: center;
        }
        .cm{
            width: 200px;
        }
        
        .tb tr:nth-child(1){
            padding: 50px;
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
                <span>/</span>
                <a href="Time Slots.php" class="active-nav">Time Slot</a>
            </div>
            <div class="profile">
                <a id="edit-profile">
                    <?php 
                        include("Database.php");
                                        
                        if(isset($_SESSION['logged'])){
                            $loggedUser = $_SESSION['logged'];
                        }

                        function getLoggedInName($loggedUser){
                            global $con;
                            $res = mysqli_query($con,"SELECT first_name,last_name FROM admin WHERE aUser='$loggedUser'");
                            $row = mysqli_num_rows($res);
                            $data = mysqli_fetch_array($res);
                    
                            if ($row == 1) {
                                echo $data[0]." ";
                                echo $data[1];
                            }
                            if ($row == 0) {
                                $res = mysqli_query($con,"SELECT First_name,Last_name FROM students WHERE sUser='$loggedUser'");
                                $row = mysqli_num_rows($res);
                                $data = mysqli_fetch_array($res);
                    
                                if ($row == 1) {
                                    echo $data[0]." ";
                                    echo $data[1];
                                }
                                if ($row == 0) {
                                    $res = mysqli_query($con,"SELECT first_name,last_name FROM teacher WHERE tUser='$loggedUser'");
                                    $row = mysqli_num_rows($res);
                                    $data = mysqli_fetch_array($res);
                    
                                    if ($row == 1) {
                                        echo $data[0]." ";
                                        echo $data[1];
                                    }
                                }
                            } 
                        }
                        getLoggedInName($loggedUser); 
                    ?>
                </a>
                <a href="Login.php">Logout<i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>
    
    <div class="dashboard">
        <section class="tbsec">
            <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0" class="tb">
            <tbody>
                <thead class="thead">
                    <th class="cm">Slot</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </thead>
                <?php
                    $slotno = 1;
                    $query = mysqli_query($con, "SELECT * FROM timeslot");
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td class='cm'>$slotno</td>";
                        echo "<td><input class='txt' type='text' id='tp".$slotno."S' value='".$row['starttime']."' required onchange='saveTime(this.id, this.value)'></td>";
                        echo "<td><input class='txt' type='text' id='tp".$slotno."E' value='".$row['endtime']."' required onchange='saveTime(this.id, this.value)'/></td>";
                        echo "</tr>";
                        $slotno++; 
                    }
                ?>
                
            </tbody>
            </table>
        </div>
        </section>
    </div>
    <script>
        function saveTime(ipID, ipVal){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(ipID).value = this.responseText;
                }
            };
            xmlhttp.open("GET", "saveTimeSlot.php?posi="+ipID+"&time="+ipVal, true);
            xmlhttp.send();
        }
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="js/mdtimepicker.js"></script>
    <script>
        $(document).ready(function(){
            $("input").click(function(){
                var id = this.id;
                $('#'+id).mdtimepicker();
            });
        });
    </script>
</body>
</html>