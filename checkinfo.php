<?php 

include 'dbconfig.php'; 

$today = date("F j, Y, g:i a");

$usernameusage =  $_POST["password"];



$query = "Select * from `examapproved` Where usernameusage Like '". $usernameusage . "'";
$access = "";

		$data = array();
		$datame = mysqli_query($con,$query);
		if(mysqli_num_rows($datame)!=0) 
		{
			while($row = mysqli_fetch_assoc($datame)) 
			{
		    	$data['examapproved'][] = $row; 

			}

			echo json_encode($data);
		}

?> 
