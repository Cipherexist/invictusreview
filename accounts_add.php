<?php
include 'loadmodules.php';
include 'dbconfig.php';


@$controlstatus = $_POST['controlstatus'];
@$accounttype = $_POST['accounttype'];
@$expirydate = loadregistrationformat_monthfirst($_POST['expirydate']);
@$completename = $_POST['completename'];
@$username = $_POST['username'];
@$marketby = $_POST['marketby'];
@$password = $_POST['password'];
@$examdate = loadregistrationformat_monthfirst($_POST['examdate']);
@$viewtype = $_POST['viewtype'];
@$globalusername = $_COOKIE['username'];
@$regtoday = loadregistrationdateformatdatetoday(); 

@$sql = "INSERT INTO `examapproved` (`expdate`, `accounttype`, `password`, `rights`, `usernameusage`, 
`status`, `viewtype`, `access`, `examdate`, `session`, `accesstype`, `completename`, `usertype`, 
`expirymonths`, `accessuser`, `createdby`, `datecreated`, `deviceused`, `hide`, `controlstatus`, 
`contactnumber`, `totalpass`, `totalfailed`, `average`, `connection`, `purchase`, `marketby`) VALUES 
('$expirydate', '$accounttype', '$password', 'user', '$completename', 
'yes', '$viewtype', 'yes', '$examdate', '1', '$viewtype', '$completename', 'Trainee User', 
'Never', 'Exam and Preview', '$globalusername', '$regtoday', '', 'invictus', '$controlstatus', 
'', '', '', NULL, NULL, NULL, '$marketby')"; 


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