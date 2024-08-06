<?php 
include 'dbconfig.php'; 
include 'loadmodules.php'; 

@$id = $_POST['id'];

$sql = "DELETE from `onlineaccounts` Where `ID` like '$id'";
mysqli_query($con,$sql); 

if(!mysqli_error($con))
{
    echo 1;
}
else 
{
    echo mysqli_error($con);
}








?>


