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
    <link rel="stylesheet" href="./css/alertbox.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="./js/fontawesome.js"></script>
    <script src="./js/solid.js"></script>
    <script src="js/sidebar.js"></script>

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: rgb(245, 245, 245);
        }

        /* Progress Bar */
        #dialog{
            background:rgba(0,0,0,0.5);   
            top: 0;
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            display: none;
            right: 0;
            z-index: 9999;
            bottom: 0;
        }
        .progressDialog{
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%,-50%);
            background: #fff;
            width: 50%;
            height: 30%;
            border: 1px solid rgba(0,0,0,0.3);
            box-shadow: 0 0 15px 0 rgba(0,0,0,0.38);
            border-radius: 10px;
            overflow: hidden;
        }
        #txt{
            text-align: center;
            padding: 30px;
            margin: 5% 0;
            font-size: 25px;
        }
        #backbar{      
            border-radius: 5px;      
            position: absolute;
            width: 97%;
            height: 2%;
            margin:10px;
            background: rgba(0,0,0,0.1);
        }
        #bar{
            position: absolute;
            width: 1%;
            border-radius: 5px;      
            transition: ease-in;
            height: 2%;
            margin:10px;
            background: dodgerblue;
        }
        /* App */
        .dashboard{
            padding: 10px;
            display: flex;  
            flex-direction: column;
        }
        .card{
            background: #007fff;
            padding: 10px;
            margin: 5px;
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
        a{
            color: grey;
        }
        table,td,tr,th{
            margin:0;
            padding:0;
            border-spacing: 0px;
        }
        table{
            margin: 0 20px;
        }
        td{
            background: #fff;
            border: 1px solid grey;
            padding: 8px 25px;
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
        em{
            color:red;
        }
        .cell{
            margin:0;
            padding:0;
        }
        .cell input{
            width:100px;
        }
        .cardChange{
            position: absolute;
            z-index:100;
            background: #fff;
            width: 100px;
            padding: 10px;
            box-shadow: 0 0 5px 0px rgba(0,0,0,0.4);
        }
        .cardChange select{
            margin: 5px;
        }
        .cardChange span{
            font-size: 11px;
            color: #000;
        }
        #alert .btn{
            border: none;
            background: #fff;
        }
        
    </style>
</head>
<script>
    var i = 0;
    var progress = true;
    function move() {
        if(progress){
            document.getElementById("dialog").style.display = "flex";
            if (i == 0) {
                i = 1;
                var elem = document.getElementById("bar");
                var text = document.getElementById("txt");
                var width = 1;
                var id = setInterval(frame, 50);
                function frame() {
                    if (width >= 97) {
                        clearInterval(id);
                        i = 0;
                        document.getElementById("dialog").style.display = "none";
                    } else {
                        width++;
                        if(width<20){
                            text.innerHTML = "Fetching Data";
                            elem.style.backgroundColor = "#1e90ff";
                        }
                        else if((width>60)&&(width<100)){
                            text.innerHTML = "Finalising Timetable";
                            elem.style.backgroundColor = "#2cb732";

                            if(width>90){
                                text.innerHTML = "Timetable Created Successfully";
                                elem.style.backgroundColor = "#17d61f";
                            }
                        }
                        else if(width>30){
                            text.innerHTML = "Comparing Lectures and Practicals";
                            elem.style.backgroundColor = "#ff5722";
                        }
                        elem.style.width = width + "%";
                    }
                }
            }
        }
    }
</script>
<body onload="collapse_sidebar()">
    <div id="dialog">
        <div class="progressDialog">
            <div id="txt">Creating</div>
            <div id="backbar"></div>
            <div id="bar"></div>
        </div>
    </div>
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
                <a href="Timetable Dashboard.php" class="active">Time Table</a>
                <span>/</span>
                <a href="Time Table.php" class="active-nav">Create</a>
            </div>
            <div class="profile">
                <a id="edit-profile">
                    <?php
                        include("Functions.php");
                        include("Database.php"); 
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
    <form action="Time Table.php" method="get">
        Select Department <select name="dept" id="dept" style="margin: 0 20px;">
            <option value="CO">CO</option>
            <option value="ME">ME</option>
            <option value="EE">EE</option>
            <option value="CE">CE</option>
            <option value="E&TC">EJ</option>
        </select>
        Select Semister<select name="sem" id="sem" style="margin:10px;">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        
        <input type="submit" style="margin:10px;padding:5px;" class="btn" value="Create">
    </form>
        <?php     
            $doProgress = false;
        
            if($con)
            {        
                if(isset($_GET['sem'])){
                $sem = $_GET["sem"];
                $dept = $_GET["dept"];
                
                //Check if table created
                $table = $dept.$sem."i";
                mysqli_query($con, "DROP TABLE IF EXISTS randTimetable");
                $droptable = mysqli_query($con, "DROP TABLE $table");
                if($droptable){
                    mysqli_query($con,"DELETE FROM `timetables` WHERE `name` = '$table'");
                    dispAlertBox(1,"Table Already Created Table Will Be Overtied");
                }
                
                // Call progress bar function
                echo '<script type="text/javascript"> move(); </script>';
                $doProgress = true;

                // Display Table
                echo '
                    <table id="timetable">
                    <thead>
                        <td colspan="7"><i> ---- TIME - TABLE ---- </i></td>    
                    </thead>
                    <tr>
                        <tr>
                            <td><strong>LECTURE</strong></td>
                            <td><strong>1</strong></td>
                            <td><strong>2</strong></td>
                            <td><strong>3</strong></td>
                            <td><strong>4</strong></td>
                            <td><strong>5</strong></td>
                            <td><strong>6</strong></td>
                        </tr>
                    </tr>
                ';

                // Display Time Slots
                $query = mysqli_query($con,"SELECT * FROM timeslot");
                echo "<tr>";
                echo "<td><strong>Time</strong></td>";
                while ($row = mysqli_fetch_array($query)) {
                    echo "<td>";
                    echo $row['starttime']."<br>".$row['endtime'];
                    echo "</td>";
                }
                echo "</tr>";

                // To Store table in database
                $table = $dept.$sem."i";
                mysqli_query($con,"CREATE TABLE $table (slot INT PRIMARY KEY, MON varchar(10) DEFAULT 'none', THU varchar(10) DEFAULT 'none', WED varchar(10) DEFAULT 'none', THE varchar(10) DEFAULT 'none', FRI varchar(10) DEFAULT 'none', SAT varchar(10) DEFAULT 'none')") or die(mysqli_errno($con));
                // Insert Temp data
                for($i=1;$i<=6;$i++){                     
                    mysqli_query($con,"INSERT INTO `$table` VALUES ('$i', 'none', 'none', 'none', 'none', 'none', 'none')");
                }

                // Retrive all data from allocation echo
                $allo_table = mysqli_query($con,"select * from allocation WHERE semister=$sem AND dept='$dept'" );

                // Retrive each column and store in array
                while ($row = mysqli_fetch_array($allo_table)) {
                    $allo_sub[] = $row['sub_abb'];
                    $allo_teach[] = $row['teach_abb'];
                    $allo_lect[] = $row['noLect'];
                    $allo_pract[] = $row['noPract'];
                }

                // Create temprary table and store sub and teachers
                mysqli_query($con,"CREATE table randTimetable (id int,sub VARCHAR(3),teach VARCHAR(3),noLect int,noPract int, count_lect int, count_pract int)");

                // Insert values
                for($i=0;$i<count($allo_sub);$i++){
                    $insert_id = $i+1;
                    $insert_sub = $allo_sub[$i];
                    $insert_teach = $allo_teach[$i];
                    $insert_lect = $allo_lect[$i];
                    $insert_pract = $allo_pract[$i];
                    mysqli_query($con,"INSERT INTO randTimetable VALUES ('$insert_id','$insert_sub','$insert_teach','$insert_lect','$insert_pract',0,0)");
                }

                // Retrive values and store in array
                $rand_table = mysqli_query($con,"SELECT * FROM randTimetable WHERE noLect>0 OR noPract>0");
                while ($row = mysqli_fetch_array($rand_table)) {
                    $rand_id[] = $row['id'];
                    $rand_sub[] = $row['sub'];
                    $rand_teach[] = $row['teach'];
                    $rand_lect[] = $row['noLect'];
                    $rand_pract[] = $row['noPract'];
                }      
            
                $days = array('MON','THU','WED','THE','FRI','SAT');                
                $Full_id_log = array();
                $random_no=$disp_id = 0;
                $validSub = false;

                // Display data in table randomly
                for ($i = 0; $i < 6; $i++){          // rows 
                    echo "<tr id='R$i'>";
                    echo "<td>".$days[$i]."</td>";
                    
                    // Store all sub id in array - copy per row to stop sub repeat in 1 row
                    $Full_id_log = copyArray($rand_id);
                    for ($b = 0; $b < 6 ;$b++) {     // columns
                        $counterWhile = count($rand_id);
                        while(true){
                            // Get random sub from id array
                            $random_no = array_rand($Full_id_log);      // random index
                            $disp_id = $Full_id_log[$random_no];        // random id at index
                            
                            if(checkExist($disp_id,$b+1,$days[$i])){
                                $validSub = true;
                                break;
                            }
                        }
                        
                        if($validSub){
                            $tquery = mysqli_query($con,"SELECT sub,teach FROM randtimetable WHERE id = '$disp_id'");
                            if($tquery){
                                $tdata = mysqli_fetch_array($tquery);
                                $subName = $tdata[0];
                                $teacherName = $tdata[1];

                                // Remove displayed sub from id array
                                // unset($Full_id_log[$random_no]);
                                compareLectureCounter($disp_id,$i,$b);    
                                //for save
                                $day = $days[$i];
                                saveTable($day,$sem,($b+1),$subName,$teacherName,"T",$dept);
                            }
                        }
                        else{
                            $day = $days[$i];
                            saveTable($day,$sem,($b+1),"","","T",$dept);
                        }
                    }        
                    echo "</tr>";                   
                }

                // Add entry in timetables table
                $currentDate = date("d/m/Y");
                console_log("Current Date - $currentDate");
                mysqli_query($con,"INSERT INTO `timetables` VALUES (NULL, '$table', '$sem', '$dept', Now())");

                // Delete Temprary Table
                //  mysqli_query($con,"DROP TABLE randTimetable");
                }
            }
            else{
                echo "Connection Failed to database";
            }
        ?>
    </table>
    </div>
</div>
<script>
    var isPract = false;
    function changeTD(ob, val){
        if(ob.checked == 1){
            isPract = true;
            // select name = CheckC1R1 
            var currenttd = "tdC"+val.charAt(6)+"R"+val.charAt(8); 
            var tdnm = "tdC"+val.charAt(6)+"R";
            // td name = tdC1R
            var indexNext = parseInt(val.charAt(8)) + 1;
            var tdname = tdnm + indexNext.toString();  
            // td next name = tdC1R2
            document.getElementById(tdname).remove();
            document.getElementById(currenttd).colSpan = '2';
            console.log("Updated P: "+val);
        }
        else{
            isPract = false;
            var currenttd = "tdC"+val.charAt(6)+"R"+val.charAt(8); 
            var tdnm = "tdC"+val.charAt(6)+"R";
            var indexNext = parseInt(val.charAt(8)) + 1;
            var tdname = tdnm + indexNext.toString();  
            document.getElementById(currenttd).colSpan = '1';
            
            //create new td next to
            var indexRow = parseInt(val.charAt(6)) - 1;  
            var row = document.getElementById("R"+indexRow.toString());
            var newtd = row.insertCell(parseInt(val.charAt(8)) + 1);
            nextROW = parseInt(val.charAt(8)) + 1;
            console.log(val)
            newtd.id = tdname;
            nm = "C"+(val.charAt(6))+"AAAR"+nextROW+"BBB"
            funID= "\""+nm+"\"";
            spanid = "s"+nm;//tdname 
            newtd.innerHTML = "<div name='"+nm+"' id='"+nm+"' class='cell' ondblclick='changeSub(this,"+funID+")'>"+
                    "<span id='"+spanid+"'>Select Sub</span><br></div>";
            if((val.charAt(6)+1 == 1) || (val.charAt(6)+1 == 3) || (val.charAt(6)+1 == 5)){
                newtd.innerHTML += "<input type='checkbox' id='checkC"+(val.charAt(6))+"R"+ nextROW + "' onchange='changeTD(this,this.id)'><span class='lblcheck'>Practical</span>";
            }  
        }
    }
    function changeSub(ob,val){
        console.log(val);

        if(isPract){
            console.log("Updated : "+val);
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(val).innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getSUB.php?pract=1&sub="+val+"&q=" + <?php echo $sem; ?>+"&dept='<?php echo $dept; ?>'", true);
            xmlhttp.send();
            isPract = false;
        }
        else{
            console.log("Updated : "+val);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(val).innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getSUB.php?pract=0&sub="+val+"&q=" + <?php echo $sem; ?>+"&dept='<?php echo $dept; ?>'", true);
            xmlhttp.send();
        }        
    }

    function checkOverlap(csub,ob,p){
        var id = ob.id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerHTML = this.responseText;
            }
        };
        if(p==0){
            xmlhttp.open("GET", "checkOverlap.php?sub="+csub+"&id=" + id +"&sem="+<?php echo $sem; ?>+"&dept='<?php echo $dept; ?>'", true);
        }
        else{
            xmlhttp.open("GET", "checkPracticalOverlap.php?sub="+csub+"&id=" + id +"&sem="+<?php echo $sem; ?>+"&dept='<?php echo $dept; ?>'", true);
        }
        xmlhttp.send();
    }

</script>
<script src="./js/alertbox.js"></script>
</body>
</html>