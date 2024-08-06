<?php 


function loaduseraccesstype($username)
{
	include 'dbconfig.php'; 
    $query = "Select * from `user_data` Where username Like '". $username. "'";
    $datame = mysqli_query($con, $query);
    if(mysqli_num_rows($datame)!=0)
    {
      while($row = mysqli_fetch_assoc($datame)) 
      {
      $codecomplete = $row["accesstype"]; 
      }
    }
    else
    {
      $codecomplete = $query; 
    }
    
      return $codecomplete;
}



$huan = $_POST['usname'];
$two = $_POST['psname'];
$setlimit = 10000;

setcookie('usname', $huan, time()+$setlimit);
setcookie('psword', $two, time()+$setlimit);


require 'dbconfig.php';


if(isset($_POST['usname']) && isset($_POST['psname']))
 {
	 $huan = $_POST['usname'];
	 $two = $_POST['psname'];
	 $usnameme = 'admin'; 
	 $psnameme = '24428142258';
	 
	 
$fetchqry  = "SELECT * FROM `user_data` WHERE username LIKE '". $huan ."' AND password LIKE '". $two ."'"; //SQL FORMAT FOR SEARCHING 

$result=mysqli_query($con,$fetchqry);
$numrows=mysqli_num_rows($result);

	 if($numrows != 0) 
	 {




	
	$datame1 = mysqli_query($con,$fetchqry);
	$numrows=mysqli_num_rows($datame1);
	if($numrows!=0)
	{
		while($row = mysqli_fetch_assoc($datame1))
		{
			if($row["access"]=="yes")
			{
				setcookie('username', $row["username"], time()+$setlimit);
				setcookie('viewtype', $row["viewtype"], time()+$setlimit);
				setcookie('completename', $row["completename"], time()+$setlimit);
				setcookie('session', $row["session"], time()+$setlimit);
				setcookie('accesstype', $row["accesstype"], time()+$setlimit);
				setcookie('oldsystem', $row["oldsystem"], time()+$setlimit);
			}
				else
				{
					echo '  <p style="color:#F66; font-family:"Copperplate Gothic Bold""> Sorry, Your Access has been denied by the Administrator, Due to the reason that your access is expired.</p>';
					die();
				}
		}
	}
	
	 if(loaduseraccesstype($_POST['usname'])=='Admin')
            {
echo '	<script> 
window.location.replace("registeruser.php");
</script> 
	';
            }
            else
            {
            	echo '	<script> 
window.location.replace("index.php");
</script> 
	';
            }
	
	
	
	die();
	 }
	 else 
	 { 
	 echo '  <p style="color:#F66; font-family:"Copperplate Gothic Bold""> Login-details incorrect </p>';
	 } 
	 
 }


?>
   
      