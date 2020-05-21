<?php
     
	 include_once("Database.php");
	 
	  $con=mysqli_connect('localhost','root','');
	  
	  if(!$con)
	  {
		  echo "Not connected to server";
	  }
	   if(!mysqli_select_db($con,'college_mgmt'))
	  {
		  echo 'Database not selected';
	  }


		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$abbrevation = $_POST['abbrevation'];
		$dept = $_POST['dept'];
		$email = $_POST['email'];
		$aUser = $_POST['aUser'];
		$aPass = $_POST['aPass'];
		$mobile = $_POST['mobile'];
		
		$sql = mysqli_query($con,"INSERT INTO teacher(first_name,last_name,abbrivation,tUser,tPass,email,mobile,noLect,noPract,dept) VALUES ('$first_name','$last_name','$abbrevation','$aUser','$aPass','$email','$mobile',0,0,'$dept')") or die(mysqli_error($con));	
        if(!$sql)
		{
			echo "Not inserted";
		}
	    else
		{
			echo "Data inserted Successully";
		}
   
   



?>