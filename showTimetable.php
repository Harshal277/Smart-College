<?php
    include("Database.php");
    echo "<div class='menu'>
                    <button onclick='printTable()'>Print</button>
                    <span><i class='fas fa-times' id='close-btn' onclick='closePrint()'></i><span>
                </div>";
                $deptname = "";
                $slot = 1;
                $days = array('MON','THU','WED','THE','FRI','SAT');
                $semnames = array('FIRST', 'SECOND', 'THIRD', 'FORTH', 'FIFTH', 'SIXTH');           
                $timeName = $_GET['name'];
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
                echo "</div></div>";
?>