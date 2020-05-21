<?php
    session_start();
    include("Database.php");
    $delid = $_GET['id'];
    $dept = $_SESSION['alloDept'];
    $sem = $_SESSION['alloSem'];

    function displaySuccessBox($msg="Subject Unallocated Successfully"){
        echo "<div class='alert' id='alert'>";
            echo "<div class='a-box'>";
                echo "<div class='small-icon'><img src='./img/sucessIcon.png' class='small-icon' alt='Sucessfull'></div>";
                echo "<h1 class='a-title'>$msg</h1>";
                echo "<span>You can allocate this subject again</span>";
                echo "<div class='btn'>";
                    echo "<button class='a-btn' id='btn-ok' onclick=\"hide_alert('alert')\">OK</button>";
                echo "</div>";
            echo " </div>";
        echo "</div>";
    }
    if(mysqli_query($con,"DELETE FROM allocation WHERE `sub_id` = $delid")){
        displaySuccessBox();
    }
    echo "<table><tr style='background: #9e9e9e;color:white;text-align:center;'>
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
        echo "</table>";
?>