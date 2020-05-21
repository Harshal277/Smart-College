<?php
include("Database.php");
      $dept = $_POST['dept'];
      $sem = $_POST['sem'];
      $fullname = $_POST['fullname'];
      $subabb = $_POST['subabb'];
      $insert = mysqli_query($con,"INSERT INTO `subject` (`id`, `name`, `abbrivation`, `dept`, `sem`) VALUES (NULL, '$fullname', '$subabb', '$dept', '$sem')");
      if($insert){
              
      }
?>