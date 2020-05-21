<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDPC - Show Time Table</title>
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
        
        a{
            color: grey;
        }
        
        span{
            font-size: 14px;
            color: #444343;
            text-transform: uppercase;
            font-weight: 500;
        }
        table,td,tr,th{
            margin:0;
            border-spacing: 0px;
            padding:0;
        }
        table{
            padding: 0 10px;
        }
        td{
            padding: 20px 10px;
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
        .timeInput{
            width: 100%;
        }
        .cardtt{
            border-radius: 15px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
            background: #fff;
            padding: 14px 20px;
        }
        .cardtt:hover{
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.4);
        }
        .cardtt-body{
            padding: 10px;
        }
        .card-btn{
            margin: 15px 0;
        }
        .card-btn .btn{
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
        #btn-view{
            background: rgb(14, 125, 236);
        }
        #btn-view:hover{
            cursor: pointer;
            background: rgb(1, 99, 197);
        }
        #btn-delete{
            background: #eb182af6;
        }
        #btn-delete:hover{
            background: #ea001f;
            cursor: pointer;
        }
        .card-buttom{
            bottom: 0;
            text-align: right;
            margin-top: 20px;
        }
        h5{
            margin: 10px 0;
            text-align: center;
            color: rgb(20, 20, 20);          
            font-size: 30px;
        }
        .span-sem{
            color: rgb(20, 20, 20);
            text-align: center;
            display: block;
            font-weight: bold;
        }
        #dateCreated{
            font-size: 12px;
        }
        #dateCreated em{
            color: #222;
            font-weight: bold;
            font-size: 13px;
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
        .showTable td{
            padding: 10px 120px;
            font-size: 15px;
            text-align: center;
            font-family: "times new roman";
            border:0.5px solid rgba(0,0,0,0.7);
        }
        .showTable .day{
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
        .timetable-column td{
            font-size: 14px;
            padding: 6px 7px;
            text-transform: uppercase;
        }
        .timetable-subjects td{
            padding: 6px 30px ;
            font-size: 14px;
        }
        .sub-name{
            color: black;
            font-weight: bold;
        }
        .timetable-footer{
            height: 40px;
        }
        .timetable-footer td{
            display: table-cell;
            vertical-align: bottom;
        }
        .timetable-footer .effectdate{
            padding: 20px;
        }

        /* Details */
        .footer-details{
            font-size: 12px;
            margin: 10px 0;
        }
        .footer-column-heading td{
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }
        .footer-column-heading2 td{
            font-size: 11px; 
            font-weight: bold;
            text-align: center;
        }
        .footer-details td{
            padding: 3px 20px;
            border:0.5px solid rgba(0,0,0,0.7);
        }
        .menu{
            display: flex;
            padding: 0px 30px;
            padding-top: 20px;
        }
        button{
            border-radius: 5px;
            padding: 8px 15px;
            width: 80px;
            font-size: 14px;
            border: none;
            background: #007fff;
            color: white;
        }
        button:hover{
            background: #0482f9 ;
            box-shadow: 0 0 10px 3px rgba(0,0,0,0.2);
            cursor:pointer;
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
    </style>
</head>

<body onload="collapse_sidebar()">
    <div class="side-menu" id="side-bar">
        <div class="side-profile">
            <img src="img/sdpc_logo.png" alt="Icon" id="college-logo">
        </div>

        <a href="Admin Dashborad.html" style="text-decoration: none;">
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
        <a href="#" style="text-decoration: none;">
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
    <?php
        if(isset($_SESSION['logged'])){
            $loggedUser = $_SESSION['logged'];
        }
        include("Error.php");
        include("Functions.php");
        include("Database.php");
    ?>
    <div class="app" id="app">
        <nav class="top-nav">
            <div class="navigation">
                <a href="Admin Dashborad.php"> <i class="fas fa-home"></i>Home</a>
                <span>/</span>
                <a href="Timetable Dashboard.php">Time Table</a>
                <span>/</span>
                <a href="Show Timetables.php" class="active-nav">Display Table</a>
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
    
    <div class="dashboard" id="dashboard" >
        <?php             
            $countRows = 4; 
            echo "<table cellspacing='0'><tr>";
            $tables = mysqli_query($con, "SELECT * FROM `timetables`");
            while($row = mysqli_fetch_array($tables)){
                $tt_sem = $row['semister'];
                $tt_dept = $row['dept'];
                $Cdate = $row['date_created'];
                $table = $tt_dept.$tt_sem."i";
                if(($tt_sem == 1) or ($tt_sem == 2)){
                    $class = "FY".$tt_dept;
                }elseif(($tt_sem == 3) or ($tt_sem == 4)){
                    $class = "SY".$tt_dept;
                }else{
                    $class = "TY".$tt_dept;
                }
                if($countRows==0){
                    echo "</tr><tr>";
                    $countRows = 4;
                }
                echo "<td id='$class'>";
                    cardTimetable($class, $table, $Cdate);
                echo "</td>";
                $countRows--;
            }
            echo "</tr></table>";    
            if(isset($_GET['btn-delete'])){
                $timetable = $_GET['tableName'];
                mysqli_query($con,"DROP TABLE $timetable");
                mysqli_query($con,"DELETE FROM `timetables` WHERE `name` = '$timetable'");
            }

            if(isset($_GET['btn-view'])){
                echo "<div id='showTT'><div id='table'>";
                echo "<div class='menu'>
                    <button onclick='printTable()'>Print</button>
                    <span><i class='fas fa-times' id='close-btn' onclick='closePrint()'></i><span>
                </div>";
                $deptname = "";
                $slot = 1;
                $days = array('MON','THU','WED','THE','FRI','SAT');
                $semnames = array('FIRST', 'SECOND', 'THIRD', 'FORTH', 'FIFTH', 'SIXTH');           
                $timeName = $_GET['tableName'];
                if((substr($timeName, 2, 1) == '1') or (substr($timeName, 2, 1) == '2')){
                    $classname = "FY".strtoupper(substr($timeName, 0, 2));
                    $sem = substr($timeName,2,1);
                }     
                if((substr($timeName, 2, 1) == '3') or (substr($timeName, 2, 1) == '4')){
                    $classname = "SY".strtoupper(substr($timeName, 0, 2));
                    $sem = substr($timeName,2,1);
                }     
                if((substr($timeName, 2, 1) == '5') or (substr($timeName, 2, 1) == '6')){
                    $classname = "TY".strtoupper(substr($timeName, 0, 2));
                    $sem = substr($timeName,2,1);
                }     
                if((substr($timeName, 0, 2) == 'CO')){
                    $deptname = "COMPUTER";
                }
                if((substr($timeName, 0, 2) == 'ME')){
                    $deptname = "MECHANICAL";
                }
                if((substr($timeName, 0, 2) == 'CE')){
                    $deptname = "CIVIL";
                }
                if((substr($timeName, 0, 2) == 'EE')){
                    $deptname = "ELECTRICAL";
                }
                if((substr($timeName, 0, 4) == 'e&tc')){
                    $deptname = "E&TC";
                }
                $timetable = mysqli_query($con,"SELECT * FROM $timeName");
                echo "<div class='printable'>";
                echo "<div class='layout' id='layout'>";
                echo "<table class='showTable' style='width: 100%;'>";
                echo "<tr class='timetable-college'><td colspan='8'>SHREE DATTA POLYTECHNIC COLLEGE, DATTANAGAR</td></tr>";
                echo "<tr class='timetable-head'><td colspan='8'><i>----- TIME-TABLE ----- ( $classname )</i></td></tr>";
                echo "<tr class='smallinfo'><td colspan='8'>".$semnames[$sem-1]." SEMESTER DIPLOMA IN $deptname </td></tr>";
                if($timetable){
                    echo "<tr class='day timetable-column'><td>LECTURE</td>";
                        echo "<td>Time</td>";
                    foreach($days as $day){
                        echo "<td>$day</td>";
                    }
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($timetable)) {
                        if($slot == 3 or $slot == 5){
                            echo "<tr class='recess'><td colspan='8'>RECESS</td></tr>";
                        }
                        echo "<tr class='timetable-subjects'>";
                            echo "<td>0$slot</td>";
                            $timeslot = mysqli_query($con, "SELECT * FROM timeslot WHERE slot = $slot");
                            $timeslot = mysqli_fetch_array($timeslot);
                            echo "<td class='timetable-time'>".$timeslot['starttime']."<br>".$timeslot['endtime']."</td>";
                            for($d=1;$d<7;$d++){
                                $sub = substr($row[$d],0,3);
                                $teach = substr($row[$d],3,8);
                                if(strlen($row[$d]) > 9){
                                    if(substr($row[$d],9,1)){
                                        echo "<td style='background:#e2e2e2;'><span class='sub-name'>$sub</span> <br> $teach</td>";
                                    }
                                }else{
                                    echo "<td><span class='sub-name'>$sub</span> <br> $teach</td>";
                                }
                            }
                        echo "</tr>";
                        $slot++;
                    }
                }
                $currentDate = date("d/M/Y");
                
                // Bottom
                echo "<tr class='timetable-footer'><td colspan='4' class='effectdate'>WITH EFFECT FROM : $currentDate</td><td colspan='2'><div>H.O.D.</div></td><td colspan='2'><div>PRINCIPAL</div></td></tr>";
                echo "</table>";

                // Subject details
                $srno = 1;
                echo "<table class='footer-details' style='width: 100%;'>";
                echo "<tr class='footer-column-heading'><td rowspan='2'>SR. <br> NO.</td><td rowspan='2'>SUBJECT TITLE</td><td rowspan='2'  >ABBREVIATION</td><td rowspan='2'>SUB <br> CODE</td><td colspan='3'>TEACHING SCHEME</td><td rowspan='2'>TOTAL LOAD</td><td rowspan='2'>STAFF NAME</td></tr>";
                echo "<tr class='footer-column-heading2'><td>TH</td><td>TU</td><td>PR</td></tr>";

                // Subject Details
                $sub = array();
                $dept = strtoupper(substr($timeName, 0, 2));
                $sem = substr($timeName, 2, 1);
                $subjects = mysqli_query($con, "SELECT * FROM `allocation` WHERE dept = '$dept' AND semister = '$sem'");
                $count = mysqli_num_rows($subjects);
                while($row = mysqli_fetch_array($subjects)){
                    $sub[] = $row['sub_abb'];
                    $subid[] = $row['sub_id'];
                }
                do{
                    $s = $sub[$srno-1];
                    $sid = $subid[$srno-1];
                    $subfullname = mysqli_query($con, "SELECT * FROM `subject` WHERE abbrivation = '$s'");
                    $subdetails = mysqli_fetch_array($subfullname);

                    $allocationdetails = mysqli_query($con, "SELECT * FROM `allocation` WHERE sub_id = '$sid'");
                    $allodetails = mysqli_fetch_array($allocationdetails);
                    $lectpract = $allodetails['noPract'] + $allodetails['noLect'];
                    $teach = $allodetails['teacher_id'];
                    $tname = mysqli_query($con, "SELECT first_name, last_name FROM `teacher` WHERE id = '$teach'");
                    $teacher = mysqli_fetch_array($tname);
                    $tfullname = $teacher['first_name']." ".$teacher['last_name'];
                    echo "<tr><td>$srno</td><td>".$subdetails['name']."</td><td>".$s."</td><td>".$subdetails['subcode']."</td><td>".$allodetails['noLect']."</td><td>-</td><td>".$allodetails['noPract']."</td><td>$lectpract</td><td>$tfullname</td></tr>";
                    $srno++;
                }while($srno<=$count);
                $thtol = 0;
                $prtol = 0;
                $allocationdetails = mysqli_query($con, "SELECT noLect,noPract FROM `allocation` WHERE dept = '$dept' AND semister = '$sem'");
                while($num = mysqli_fetch_array($allocationdetails)){
                    $thtol += $num['noLect'];
                    $prtol += $num['noPract'];
                }
                $total = $thtol + $prtol;
                echo "<tr><td colspan='4'>TOTAL</td><td>$thtol</td><td>-</td><td>$prtol</td><td>$total</td><td></td></tr>";
                echo "</table>";
                echo "</div></div></div></div>";
            }
        ?>
    </div>
    <script>
        function printTable(){
            var content = document.getElementById("layout").innerHTML;
            var orignal = document.body.innerHTML;
            document.body.innerHTML =  content;
            window.print();
            document.body.innerHTML = orignal;
        }
        function hideDIV(id){
            var cell = document.getElementById(id).style.display = "none";
        }
        function closePrint(){
            var table = document.getElementById("showTT").style.display = "none";
        }
        function showtimetables(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("dashboard").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "Show created timetables.php", true);
            xmlhttp.send();
        }
    </script>
</body>
</script>
</html>