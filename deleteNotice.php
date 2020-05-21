<?php 
    include("Database.php");
    $id = $_GET['id'];
    $del = mysqli_query($con, "DELETE FROM notice WHERE id = $id");
    if($del){
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
    else{
        echo "<div class='alert' id='alert'>";
            echo "<div class='a-box'>";
                echo "<div class='small-icon'><img src='./img/errorIcon.png' style='width:60px;' class='small-icon' alt='Sucessfull'></div>";
                echo "<h1 class='a-title' style='color: red;'>$msg</h1>";
                echo "<div class='btn'>";
                    echo "<button class='a-btn' id='btn-ok' onclick=\"hide_alert('alert')\">OK</button>";
                echo "</div>";
            echo " </div>";
        echo "</div>";
    }
    
?>