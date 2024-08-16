<?php 
include 'dbconfig.php'; 


@$id = $_POST['id']; 


@$sql = "DELETE from `examapproved` Where ID Like '$id'"; 

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