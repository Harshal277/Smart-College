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

		$Fname = $_POST['Fname'];
		$Lname = $_POST['Lname'];
		$gender =$_POST['gen'];
		$emailid =$_POST['emailid'];
		$username =$_POST['username'];
		$password =$_POST['password'];
		$Enrollno =$_POST['Enrollno'];
		$mbno =$_POST['mbno'];
		$dept = $_POST['dept'];
		$sql="INSERT INTO students(First_name,Last_name,gender,emailid,sUser,sPass,Enrollno,mbno,dept)VALUES('$Fname','$Lname','$gender','$emailid','$username','$password','$Enrollno','$mbno', '$dept')";	
        if(!mysqli_query($con,$sql))
		{
			echo "Not inserted";
		}
	    else
		{
			echo "Data inserted Successully";
		}
   
   



?>