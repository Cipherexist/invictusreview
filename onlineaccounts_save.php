<?php 
include 'dbconfig.php'; 
include 'loadmodules.php'; 

@$completename = $_POST['completename'];
@$username = $_POST['username'];
@$useremail = $_POST['useremail'];
@$password = $_POST['password'];
@$expirationdate = loadregistrationformat_monthfirst($_POST['expirationdate']);
@$viewtype = $_POST['viewtype'];
@$datetoday = loadregistrationdateformatdatetoday(); 
@$remdays = $expirationdate - $datetoday; 

$sql = "INSERT INTO `onlineaccounts` (`username`, `password`, `email`, `completename`, `viewtype`, `access`, `expirationdate`, `remdays`, `session`) 
VALUES ('$username', '$password', '$useremail', '$completename', '$viewtype', 'yes', '$expirationdate', '$remdays', '1')";

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


