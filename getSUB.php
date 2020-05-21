<?php
    include("Database.php");
    $q = $_GET['q'];
    $id = $_GET['sub'];
    $dept = $_GET['dept'];
    $isPract = $_GET['pract'];              // 0 or 1
    $sub = substr($id,2,3);
    $subarr = array();
    echo "<select id='$id' onchange='checkOverlap(this.value, this, $isPract)'>";
    echo "<option disabled selected>Select Subject</option>";
    $semSub = mysqli_query($con,"SELECT abbrivation FROM subject WHERE sem = $q AND dept = $dept ");
    while ($row = mysqli_fetch_array($semSub)) {
        $subarr[] = $row["abbrivation"];
    }
    for($i=0;$i<count($subarr);$i++){
        echo "<option value='$subarr[$i]'>$subarr[$i]</option>";
    }
    echo "</select>";
?>