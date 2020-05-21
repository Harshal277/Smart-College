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
        }
        #divTeach{
            color: black;
        }
        a{
            color: grey;
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
        a{
            color: grey;
        }
        table,td,tr,th{
            margin:0;
            padding:0;
            border-spacing: 0px;
        }
        td{
            background: #fff;
            border: 1px solid grey;
            padding: 2px;
            padding: auto;
            text-align:center;
            font-size:14px;
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

        .btn:hover{
            background: #0482f9 ;
            box-shadow: 0 0 15px 0px rgba(0,0,0,0.2);
            cursor:pointer;
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
        select{
            padding: 5px;
        }
        /* Table Formating */
        .printable{
            margin: 20px;
            background: #fff;
        }
        .layout{
            display: flex;
            flex-direction: column;
            margin-bottom: 200px;
        }
        .showTable .day{
            font-weight: bold;
        }
        .showTable .day td{
            padding: 5px;
        }
        .ft td{
            padding: 5px 20px;
            font-weight: bold;
        }

        /* Time table Formating */
        .timetable-head td{
            font-weight: bold;
            font-size: 13px;
            letter-spacing: 4px;            
            padding: 4px 120px;

        }
        .smallinfo td{
            padding: 3px;
            font-size: 13px;
        }
        .recess td{
            font-family: 'Times new roman';
            padding: 3px;
            font-size: 13px;
            font-weight: bolder;
            letter-spacing: 50px;
        }
        .sign td{
            padding: 10px 0;
            font-weight: bold;
            padding-top: 30px;
        }
        .tbabb{
            margin: 20px 0;
            margin-left: auto;
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
                <a href="Individual Timetable.php" class="active-nav">Individual Timetable</a>
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
    <form action="Individual Timetable.php" method="get">
        Select Department <select name="dept" id="dept" style="margin: 10px;" onchange="retriveTeacher(this.value)">
            <option selected disabled>Select Department</option>
            <option value="CO">CO</option>
            <option value="ME">ME</option>
            <option value="EE">EE</option>
            <option value="CE">CE</option>
            <option value="E&TC">EJ</option>
        </select>
        <e id="divTeach"></e>
        
    </form>
    </div>
    <?php    
        $deptname = "";
        $dispSub = array();
        $dispTable = array(); 
        $tname = array();
        $days = array('MON','THU','WED','THE','FRI','SAT');         
        if(isset($_GET['dept']) && isset($_GET['teach'])){
            $dept = $_GET['dept'];
            $teach = $_GET['teach'];

            $ttables = mysqli_query($con, "SELECT `name` FROM timetables");
            while($row = mysqli_fetch_array($ttables)){
                $tname[] = $row['name'];
            }
            echo "<div id='showTT'><div id='table'>";
            echo "<div class='menu'>
                <button onclick='printTable()'>Print</button>
                <span><i class='fas fa-times' id='close-btn' onclick='closePrint()'></i><span>
            </div>";
            echo "<div class='printable'>";
                echo "<div class='layout' id='layout'>";
                echo "<table class='showTable' style='width: 100%;'>";
                echo "<tr class='timetable-college'><td colspan='8'>SHREE DATTA POLYTECHNIC COLLEGE, DATTANAGAR</td></tr>";
                $teacherName = mysqli_query($con, "SELECT first_name, last_name FROM teacher WHERE abbrivation = '$teach'");
                $teacherName = mysqli_fetch_array($teacherName);
                echo "<tr class='timetable-head'><td colspan='8'><i>----- TIME-TABLE ----- </i>( ".$teacherName['first_name']." ".$teacherName['last_name'].")</td></tr>";
                echo "<tr class='timetable-head'><td colspan='8'>ACADEMIC YEAR S - ". date('Y')."</td></tr>";
                    echo "<tr class='day timetable-column'><td>LECTURE</td>";
                        echo "<td>Time</td>";
                    foreach($days as $day){
                        echo "<td>$day</td>";
                    }
                    echo "</tr>";
                    for($slot = 1; $slot<7; $slot++){                        
                        if($slot == 3 or $slot == 5){
                            echo "<tr class='recess'><td colspan='8'>RECESS</td></tr>";
                        }
                        $exist = "";
                        echo "<tr>";
                        $tslots = mysqli_query($con, "SELECT * FROM timeslot WHERE slot='$slot'");
                        $slots = mysqli_fetch_array($tslots);
                        echo "<td>0".$slot."</td>";
                        echo "<td>".$slots['starttime']."<br>".$slots['endtime'];
                        for($cell = 0; $cell < 6; $cell++){
                            $day = $days[$cell];
                            if(substr(check($day, $slot), 6, 1) == "P"){
                                echo "<td style='background: #adadad;'>".check($day, $slot)."</td>";
                            }else{
                                echo "<td>".check($day, $slot)."</td>";
                            }
                        }
                        echo "</tr>";
                    }
                    echo "<tr class='sign'><td colspan='4'>".$teacherName['first_name']." ".$teacherName['last_name']."</td><td colspan='2'>H. O. D.</td><td colspan='2'>PRINCIPAL</td></tr>";
                echo "</table>";    
                echo "<table class='tbabb'>";
                echo "<tr class='ft'><td rowspan='2'>Abbreviation</td><td colspan='3'>TEACHING SCHEME</td><td rowspan='2'>TOTAL LOAD</td></tr>";
                echo "<tr class='ft'><td>TH</td><td>TU</td><td>PR</td></tr>";
                
                $dispSub = array_unique($dispSub);
                end($dispSub);
                $lastKey = key($dispSub);
                for($i=0;$i<=$lastKey;$i++){
                    if(array_key_exists($i, $dispSub)){
                        $noLP = mysqli_query($con, "SELECT noLect, noPract FROM allocation WHERE sub_abb = '$dispSub[$i]' AND teach_abb = '$teach'");
                        $noLP = mysqli_fetch_array($noLP);
                        $tolLoad = $noLP['noLect'] + $noLP['noPract'];
                        echo "<tr><td>".$dispSub[$i]." - ".$dispTable[$i]."</td><td>".$noLP['noLect']."</td><td>-</td><td>".$noLP['noPract']."</td><td>$tolLoad</td></tr>";
                    }
                }
            echo "</div></div>";    
            echo "</div>";
        }

        function check($day, $slot){
            global $con, $teach, $dispSub, $dispTable;
            $ttables = mysqli_query($con, "SELECT `name` FROM timetables");
            while($row = mysqli_fetch_array($ttables)){
                $tname = $row['name'];
                $tdata = mysqli_query($con, "SELECT $day FROM $tname WHERE slot='$slot'");
                $abb = mysqli_fetch_array($tdata);
                $tabb = $abb[$day];
                $sub = substr($tabb, 0, 3);
                $isPract = substr($tabb, 9, 1);
                $tabb = substr($tabb, 4, 3);
                if(strcmp($tabb, $teach) == 0){
                    $dispSub[] = $sub;
                    $dispTable[] = $tname;
                    if($isPract == "P"){
                        return "$sub - P";
                    }
                    else{
                        return "$sub";
                    }
                }
            }
        }
    ?>
    </div>
    <script>
        function retriveTeacher(dept){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("divTeach").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "retriveTeacher.php?dept="+dept, true);
            xmlhttp.send();
        }
        function printTable(){
            var content = document.getElementById("layout").innerHTML;
            var orignal = document.body.innerHTML;
            document.body.innerHTML =  content;
            window.print();
            document.body.innerHTML = orignal;
        }
        
        function closePrint(){
            var table = document.getElementById("showTT").style.display = "none";
        }
    </script>
</body>
</html>