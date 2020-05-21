<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject Allocation</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="./css/admin dashboard.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topMenu.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/alertbox.css">
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>
    <script src="js/sidebar.js"></script>

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
        /* Drop Down */
        #sub{
            margin: 0 40px;
            width: 250px;
        }
        #teach{
            margin: 0 39px;
            width: 250px;
        }
        #lect{
            margin: 0 33px;
            width: 250px;
        }
        #pract{
            margin: 0 19px;
            width: 250px;
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
            <div class="menu-item">
                <div class="item-icon"><i class="fas fa-bell" aria-hidden="true"></i></div>
                <div class="item-title">Notice</div>
            </div>
        </a>        
        <a href="Subject Allocation.php" style="text-decoration: none;">
            <div class="active-menu">
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
                <a href="Subject Allocation.php" class="active-sub-nav">Subject Allocation</a>
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
    
        <div class="dashboard">
    <form action="Subject Allocation.php" method="POST">
        <!-- Get Semister and department -->
        <table>
            <tr>
                <td>
                    <div class="box">
                        <span>Department</span>
                        <select name="dept" id="dept">
                            <option value="CO">CO</option>
                            <option value="ME">ME</option>
                            <option value="EE">EE</option>
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
                <td>
                    <button type="submit" value="Submit" style="margin:0 20px;" >Submit</button>
                </td>
            </tr>
        </table>
    </form>    

    <?php
    
    function assign_teachers($sub,$teach,$s_abb,$t_abb,$s_sem,$l,$p,$dept){
        global $con;
        $insert = mysqli_query($con, "insert into allocation (sub_id,teacher_id,sub_abb,teach_abb,semister,noLect,noPract,dept) values ('$sub','$teach','$s_abb','$t_abb','$s_sem','$l','$p','$dept')");
        if($insert){
            displaySuccessBox();
        }
        else{
            console_log(mysqli_errno($con));
            showError(mysqli_errno($con));
        }
        updateTeacher($teach,$l,$p);
    }

    function updateTeacher($id,$noL,$noP){
        global $con;
        $no_lecture = 0;
        $no_practical = 0;
        $select = mysqli_query($con,"SELECT noLect, noPract FROM teacher WHERE id='$id'");
        while($row = mysqli_fetch_array($select)){
            $no_lecture = $row[0];
            $no_practical = $row[1];
        }
        if($noL > 0){
            $no_lecture = $no_lecture + 1;
        }
        if($noP > 0){
            $no_practical = $no_practical + 1;
        }
        console_log($no_lecture." ".$no_practical);
       
        $update = mysqli_query($con,"UPDATE teacher set noLect = '$no_lecture',noPract = '$no_practical' WHERE id = '$id'");
    }
    
    if(isset($_GET['sub'])){
        global $con;
        $sub = $_GET['sub'];
        $teach = $_GET['teach'];
        $lect = $_GET['lect'];
        $pract = $_GET['pract'];
        $deptH = $_GET['hiddenDept'];
        $res_s = mysqli_query($con,"select abbrivation,sem from subject where id='$sub'");
        $res_t = mysqli_query($con,"select abbrivation from teacher where id='$teach'");

        $res_s = mysqli_fetch_array($res_s);
        $res_t = mysqli_fetch_array($res_t);
        
        $res_sub = $res_s[0];
        $res_s_sem = $res_s[1];
        $res_t = $res_t[0];
        assign_teachers($sub,$teach,$res_sub,$res_t,$res_s_sem,$lect,$pract,$deptH);

        //Update conters in teacher table
        $update_L = mysqli_query($con,"SELECT * FROM teacher WHERE `abbrivation` = '$teach'");
        $update_teacher = mysqli_fetch_assoc($update_L);
        $update_lect = $update_teacher['noLect'];
        $update_lect += 1;
        mysqli_query($con,"UPDATE teacher SET `noLect` = '$update_lect' WHERE `abbrivation` = '$teach'");
    }       
        function disp_subjects($d,$s){
            global $con;
            echo "<form action='Subject Allocation.php' method='GET'>";
            echo "<h5>Semister - $s</h5>";
            // Display data in table
            
            echo "<table><tr><td><div class='box'>";
            // Subject select
            echo "
                <span>Select Subject</span>
                <select name='sub' id='sub'>";
                $res = mysqli_query($con, "SELECT * FROM subject WHERE dept = '$d' AND sem = '$s'");
                while ($row = mysqli_fetch_array($res)) {
                    $subId = $row['id'];
                    $check =  mysqli_query($con,"SELECT sub_id FROM allocation WHERE semister = '$s' and sub_id = '$subId' ");
                    if($check){
                        $check_res = mysqli_fetch_array($check);
                    }
                    printf("<option value=%d> %s </option>",$row['id'],$row['name']);
                }         
            echo "</select>";
            echo "</div></td></tr>";

            // Teacher Select
            echo "<tr>
                <td><div class='box'>
                <span>Select Teacher</span>
                <select name='teach' id='teach'>";

                $res = mysqli_query($con,"SELECT * FROM teacher");
                while ($row = mysqli_fetch_array($res)) {
                    printf("<option value=%d> %s %s</option>",$row['id'],$row['first_name'],$row['last_name']);
                }         
            echo "</select>";
            echo "</div></td></tr>";
            
            // Lectures Select
            echo "
                <tr><td><div class='box'>
                <span>Select Lectures</span>
                <select name='lect' id='lect'>";
                for($no=0;$no<5;$no++){
                    printf("<option value=%d>%d</option>",$no,$no);
                }
            echo "</select>";
            echo "</div></td>";

            // Practicals Select
            echo "
                <tr><td><div class='box'>
                <span>Select Practicals</span>
                <select name='pract' id='pract'>";
                for($no=0;$no<5;$no++){
                    printf("<option value=%d>%d</option>",$no,$no);
                }
            echo "</select>";
            echo "</div></td>";

            echo "<td><button type='submit' value='Allocate' name='data'>Submit</button></td>";
            echo "</tr><input type='hidden' value='$d' name='hiddenDept'></table> </form>";
        }
        if (isset($_POST['dept']) && isset($_POST['sem'])) {
            $dept = $_POST['dept'];
            $sem = $_POST['sem'];

            disp_subjects($dept,$sem);
        }        
    ?>

    </div>
    <script src="js/alertbox.js"></script>
</body>

</html>