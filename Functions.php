<?php
    include("Database.php");
    $glob_teach = "abc";

    function compareLectureCounter($id,$r,$c){
        global $con;
        $compare_sub = "";
        $compare_teacher = "";
        $compare_max_lect = 0;
        $compare_count_lect = 0;
    
        $compare = mysqli_query($con, "SELECT * FROM randTimetable WHERE id='$id'");
            
        if($compare){
            $row = mysqli_fetch_array($compare);
            $compare_sub = $row['sub'];
            $compare_teacher = $row['teach'];     
            $compare_max_lect = $row['noLect'];
            $compare_count_lect = $row['count_lect'];
        }
        updateLectureCounter($id,$compare_max_lect,$compare_count_lect);

        // console_log("Lecture = id : $id -- Teacher : $compare_teacher , Count : $compare_count_lect , L Max : $compare_max_lect");
        displayLecture($compare_sub,$compare_teacher,$c,$r);

        // displayBlankLecture($compare_sub,$compare_teacher,$c,$r);
    }

    function comparePracticalCounter($id){
        global $con;
        $compare_sub = "";
        $compare_teacher = "";
        $compare_max_lect = 0;
        $compare_count_lect = 0;

        $compare = mysqli_query($con, "SELECT * FROM randTimetable WHERE id='$id' AND count_pract<=noPract");
        if($compare){
            $row = mysqli_fetch_array($compare);
            $compare_sub = $row['sub'];
            $compare_teacher = $row['teach'];     
            $compare_max_pract = $row['noPract'];
            $compare_count_pract = $row['count_pract'];
        }
        updatePracticalCounter($id,$compare_max_pract,$compare_count_pract);
        
        // console_log("Practical = id : $id -- Count : $compare_count_pract , P Max : $compare_max_pract");
        displayPractical($compare_sub,$compare_teacher);
    }

    function getPracticals(){
        global $con;
        $pract = mysqli_query($con,"SELECT * FROM randTimetable WHERE noPract>0");
        while ($row = mysqli_fetch_array($pract)) {
            $ids[] = $row['id'];
        }
        return $ids;
    }

    function console_log($str){
        print("<script> console.log('$str'); </script>");
    }

    function displayLecture($sub,$teach,$col,$row){
        $nm = "C".($row+1).$sub."R".($col+1).$teach;
        $tdname = "tdC".($row+1)."R".($col+1);
        $chname = "checkC".($row+1)."R".($col+1);
        echo "<td id='$tdname'>";
        echo "<div name='$nm' id='$nm' class='cell' ondblclick='changeSub(this,\"$nm\")'>";
        echo "<span id='s$nm'>$sub</span><br>";
        echo "($teach)";  
        echo "</div>";
        if(($col+1 == 1) or ($col+1 == 3) or ($col+1 == 5)){
            echo "<input type='checkbox' id='$chname' onchange='changeTD(this,this.id)'><span class='lblcheck'>Practical</span>";
        }
        echo "</td>";            
    }
    function displayBlankLecture($sub,$teach,$col,$row){
        $nm = "C".($row+1).$sub."R".($col+1).$teach;
        $tdname = "tdC".($row+1)."R".($col+1);
        $chname = "checkC".($row+1)."R".($col+1);
        echo "<td id='$tdname'>";
        echo "<div name='$nm' id='$nm' class='cell' ondblclick='changeSub(this,\"$nm\")'>";
        echo "<span id='s$nm'>$sub</span><br>";
        echo "($teach)";  
        echo "</div>";
        if(($col+1 == 1) or ($col+1 == 3) or ($col+1 == 5)){
            echo "<input type='checkbox' id='$chname' onchange='changeTD(this,this.id)'><span class='lblcheck'>Practical</span>";
        }
        echo "</td>";            
    }

    function displayPractical($sub,$teach){
        echo "<td colspan='2'>";
        echo $sub."<br>";
        echo "($teach)";
        echo "</td>";   
    }

    function updateLectureCounter($id,$max,$count){
        global $con;
        $count++;
        $update = mysqli_query($con, "UPDATE randTimetable SET count_lect='$count' WHERE id='$id'");
    }
    
    function updatePracticalCounter($id,$max,$count){
        global $con;
        $count++;
        if($count <= $max){
            $update = mysqli_query($con,"UPDATE randTimetable SET count_pract='$count' WHERE id='$id'");
            if(!$update){
                echo "There is problem while updating counter - P";
            }
        }
    }

    function copyArray($arr1){
        $arr2 = new ArrayObject($arr1);
        $copy = $arr2 -> getArrayCopy();
        return $copy;
    }

    function displayCard($id,$fname,$lname,$short,$noL,$noP,$email,$mob){
        echo "<div class='card-l'>";
        echo "<div class='profile'>";
        echo "<div class='r'>";
        $FL = strtoupper($fname[0]);
        echo "<img src='img/alphabets/$FL.png'></div>";   
        echo "<div class='l'>";
        echo "<h6>$fname</h6>";
        echo "<h6>$lname</h6>";
        echo "<small>$short</small></div></div>";
        echo "<div class='counts'><div class='lect'><small>Lectures</small>";
        echo "<span>$noL</span> </div>";
        echo "<div class='pract'><small>Practicals</small>";
        echo "<span>$noP</span>  </div> </div>";
        echo "<div class='info'>";
        echo "<span><i class='fas fa-envelope space'></i>$email</span>";
        echo "<span><i class='fas fa-phone-alt space'></i>$mob</span> </div> </div>";
    }

    function displayTableSub($dept = 0, $sem = 0){
        global $con;
        echo "<tr style='background: #9e9e9e;color:white;text-align:center;'>
            <td>ID</td>
            <td>Name</td>
            <td>Abbrivation</td>
            <td>Semister</td>
            <td>Teacher</td>
            <td>Option</td>
        </tr>";
        $subject = mysqli_query($con,"SELECT * FROM allocation WHERE `dept`='$dept' AND `semister`='$sem'");
        while ($row = mysqli_fetch_array($subject)) {
            $id = $row['sub_id'];
            $abb = $row['sub_abb'];
            $sem = $row['semister'];
            $tabb = $row['teach_abb'];
            $name = mysqli_query($con, "SELECT `name` FROM subject WHERE id = $id");
            $n = mysqli_fetch_array($name);
            $name = $n['name'];
            echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$abb</td>";
                echo "<td>$sem</td>";
                echo "<td>$tabb</td>";
                echo "<td><button class='delbtn' onclick='deleteAllo($id)'>Delete</button></td>";
            echo "</tr>";
        }         
    }

    function displaySuccessBox($msg="Allocated Successfully"){
        echo "<div class='alert' id='alert'>";
            echo "<div class='a-box'>";
                echo "<div class='small-icon'><img src='./img/sucessIcon.png' class='small-icon' alt='Sucessfull'></div>";
                echo "<h1 class='a-title'>$msg</h1>";
                echo "<div class='btn'>";
                    echo "<button class='a-btn' id='btn-ok' onclick=\"hide_alert('alert')\">OK</button>";
                echo "</div>";
            echo " </div>";
        echo "</div>";
    }

    function saveTable($day,$sem,$no,$sub,$teacher,$st,$dept){
        global $con;
        $nm = $sub."($teacher)";
        if($st=="T")
            $update = mysqli_query($con,"UPDATE $dept".$sem."i SET `$day` = '$nm' WHERE `slot` = '$no'");
        if($st=="P")
            $update = mysqli_query($con,"UPDATE $dept".$sem."i SET `$day` = '$nm' WHERE `slot` = '$no'");
            $no++;
            $update = mysqli_query($con,"UPDATE $dept".$sem."i SET `$day` = '$nm' WHERE `slot` = '$no'");
    }


    function checkExist($id,$slot,$day){
        global $con;
        # Get teacher abbrivation
        $query = mysqli_query($con,"SELECT teach FROM randTimetable WHERE id='$id' AND `noLect` != `count_lect`");
        if($query){
            $tname = mysqli_fetch_array($query);
            $abb = $tname[0];
            $teacher = "";

            # Get all created timetables and store in array
            $timetables = mysqli_query($con,"SELECT * FROM timetables");
            while ($row = mysqli_fetch_array($timetables)) {
                $createdTables[] = $row['name'];
            }

            $ttcount = mysqli_num_rows($timetables);        
            if($ttcount > 0){                
                $countTables = count($createdTables);
                $indexTable = 0;
                // console_log("Changed Sub to - $abb");

                # Loop from each timetables created and check if present
                while($indexTable < $countTables){
                    $tname = $createdTables[$indexTable];
                    $tableCheck = mysqli_query($con,"SELECT $day FROM $tname WHERE slot = $slot ");

                    while ($row = mysqli_fetch_array($tableCheck)) {
                        $teacher = $row[0];
                    }
                    console_log("(For compare - ".$tname." = ".$teacher."==". $abb.")");
                    $teacher = substr($teacher,4,3);
                    if( strcmp($abb,$teacher) == 0 ){       // if equal
                    console_log("Exited Dup");
                        return false;
                    }
                    else{
                        $indexTable++;
                    }
                }
            #  echo "<br><i>Compare OK - ".$abb."</i>";
                return true;
            }
            if($ttcount == 0){
                return true;
            }
        }
        else{
            return false;
        }
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

    function progress($message){
        echo "<script>";
            echo "document.getElementById('txt').innerTEXT = '$message';";
        echo "</script>";   
    }

    function cardTimetable($class, $table, $Cdate){
        $Utable = strtoupper($table);
        $tvalue = strtolower($table);
        echo "<div class=\"cardtt\">
            <div class=\"cardtt-body\">
                <h5>$class</h5>
                <span class=\"span-sem\">$Utable</span>
            </div>
            <div class=\"card-btn\">
                <form action=\"Show Timetables.php\" method=\"get\">
                    <input type=\"hidden\" name=\"tableName\" value=\"$tvalue\">
                    <input type=\"submit\" value=\"View\" class=\"btn\" id=\"btn-view\" name=\"btn-view\">
                    <input type=\"submit\" onclick='showtimetables()' value=\"Delete\" class=\"btn\" id=\"btn-delete\" name=\"btn-delete\" onclick='hideDIV('$class')'>
                </form>    </div>        
            <div class=\"card-buttom\">
                <span id=\"dateCreated\">Created On <em>$Cdate</em></span></div></div>";
    }

    function updateLectureCount($sub){
        $updateLectCount = mysqli_query($con, "SELECT count_lect FROM randTimetable WHERE sub='$sub'");
        $countLect = mysqli_fetch_array($updateLectCount);
        $countLect = $countLect['noLect'];
        $countLect = $countLect + 1;
        $updateLectCount = mysqli_query($con, "UPDATE randTimetable SET count_lect = '$countLect' WHERE sub='$sub'");
    }
    function updatePracticalCount($sub){
        $updatePractCount = mysqli_query($con, "SELECT count_pract FROM randTimetable WHERE sub='$sub'");
        $countPract = mysqli_fetch_array($updatePractCount);
        $countPract = $countPract['noPract'];
        $countPract = $countPract + 1;
        $updateLectCount = mysqli_query($con, "UPDATE randTimetable SET count_pract = '$countPract' WHERE sub='$sub'");
    }

    
    function individualTeach(){
        global $con;
        # Get teacher abbrivation
        $query = mysqli_query($con,"SELECT teach FROM randTimetable WHERE id='$id' AND `noLect` != `count_lect`");
        if($query){
            $tname = mysqli_fetch_array($query);
            $abb = $tname[0];
            $teacher = "";

            # Get all created timetables and store in array
            $timetables = mysqli_query($con,"SELECT * FROM timetables");
            while ($row = mysqli_fetch_array($timetables)) {
                $createdTables[] = $row['name'];
            }

            $ttcount = mysqli_num_rows($timetables);        
            if($ttcount > 0){                
                $countTables = count($createdTables);
                $indexTable = 0;
                // console_log("Changed Sub to - $abb");

                # Loop from each timetables created and check if present
                while($indexTable < $countTables){
                    $tname = $createdTables[$indexTable];
                    $tableCheck = mysqli_query($con,"SELECT $day FROM $tname WHERE slot = $slot ");

                    while ($row = mysqli_fetch_array($tableCheck)) {
                        $teacher = $row[0];
                    }
                    console_log("(For compare - ".$tname." = ".$teacher."==". $abb.")");
                    $teacher = substr($teacher,4,3);
                    if( strcmp($abb,$teacher) == 0 ){       // if equal
                    console_log("Exited Dup");
                        return false;
                    }
                    else{
                        $indexTable++;
                    }
                }
            #  echo "<br><i>Compare OK - ".$abb."</i>";
                return true;
            }
            if($ttcount == 0){
                return true;
            }
        }
        else{
            return false;
        }
    }
?>