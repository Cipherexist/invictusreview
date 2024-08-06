<?php
include 'dbconfig.php';
require 'forcookie.php';
require 'loadmodules.php'; 

      
echo 
     '<div id="result" class="row" style="margin-top:20px">';

     
      $usernameme = $_POST['usernameme'];
      $fetchqry2 = "UPDATE `examapproved` SET `hide` = 'invictus', `status` = 'no' WHERE `usernameusage` Like '".$usernameme. "'"; 
      if(mysqli_query($con,$fetchqry2))
      {
          
      }
        else
      {
         echo mysqli_error($con) ;
      }
      $fetchqry2 = "UPDATE `examuseraccess` SET `active` = 'no' WHERE `username` Like '" .$usernameme. "'"; 
      if(mysqli_query($con,$fetchqry2))
      {
          
      }
      else
      {
         echo mysqli_error($con) ;
      }   
      
    echo '	<script> 
    window.location.replace("accessability2.php");
    </script> 
	';
      

?>