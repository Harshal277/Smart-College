<?php
    function dispAlertBox($eno,$msg){
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
    function showError($eno){
        if($eno==1046)
            dispAlertBox($eno,"No Database is Selected");
        if($eno==1049)
            dispAlertBox($eno,"Check Database Connection");
        if($no==1146)
            dispAlertBox($eno,"Unknown Table Name");
        if($no==1062)
            echo "Subject Already Allocated";
            dispAlertBox($eno,"Subject Already Allocated");
    }
?>