<?php
include 'dbconfig.php';
require 'forcookie.php';
require 'loadmodules.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple Online Quiz">
    <meta name="author" content="Val Okafor">   
    <title>Simple Quiz</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    
    <!--
    <link href="css/theme.css" rel="stylesheet">
   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
   	-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
  <!--
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jquery-1.10.2.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  
  
  
  
  </head>

<style>
</style>

<?php  
include 'navbardefault.php';


function loadtotalquestions($viewtype, $competence)
{
  include 'dbconfig.php';
  $query = "Select * from `quiz` Where viewtype Like '". $viewtype. "' and competence Like '". $competence . "'";
    $datame = mysqli_query($con, $query);
    if(mysqli_num_rows($datame)!=0)
    {
     
      $codecomplete = mysqli_num_rows($datame); 
    }
    
      return $codecomplete;
}

function loadusersession($username, $viewtype)
{
  include 'dbconfig.php';
  $query = "Select * from `user_data` Where username Like '". $username. "' and viewtype Like '". $viewtype . "'";
    $datame = mysqli_query($con, $query);
    if(mysqli_num_rows($datame)!=0)
    {
     while ($row3 = mysqli_fetch_array($datame, MYSQLI_ASSOC)) {
        $setlimit = 10000;
        setcookie('session',$row3['session'], time()+$setlimit);
            $codecomplete = $row3['session']; 
    }
    }
    
      return $codecomplete;
}

function checkstatus($viewtype, $competence)
{
  include 'dbconfig.php';
  
  $query = "Select * from `sessiontime` Where viewtype Like '".$viewtype . "' and competence Like '".$competence. "' and username Like '". $_GET['getusername'] . "'";
    $datame = mysqli_query($con, $query);
    $corrected = 0;
    $totalme = 0;
    $totalaverage = 0; 
    $codecomplete =0;
    if(mysqli_num_rows($datame)!=0)
    {
    $totalme = mysqli_num_rows($datame); 
    while ($row3 = mysqli_fetch_array($datame, MYSQLI_ASSOC)) {
        if($row3['AVERAGE']!="")
        {
           
         $corrected += 1 ;
         $totalaverage = $totalaverage + $row3['AVERAGE'];
        }
    }

    }
    else
    {
        
    }
      if($corrected >0)
      {
        $codecomplete = $totalaverage/$corrected ; 
      }
      return round($codecomplete);
}

function checkstatussession($viewtype, $competence)
{
  include 'dbconfig.php';
  
  $query = "Select * from `sessiontime` Where viewtype Like '".$viewtype . "' and competence Like '".$competence. "' and username Like '". $_GET['getusername'] . "'";
    $datame = mysqli_query($con, $query);
    $corrected = 0;
    $totalme = 0;
    $totalaverage = 0; 
    $codecomplete =0;
    if(mysqli_num_rows($datame)!=0)
    {
    $totalme = mysqli_num_rows($datame); 
    while ($row3 = mysqli_fetch_array($datame, MYSQLI_ASSOC)) {
        if($row3['AVERAGE']!="")
        {
           
         $corrected += 1 ;
         $totalaverage = $totalaverage + $row3['AVERAGE'];
        }
    }

    }
    else
    {
        
    }
      if($corrected >0)
      {
        $codecomplete = $totalaverage/$corrected ; 
      }
      return $corrected;
}


?> 
<div class="container">
<div class="row">
    <div class="col-md-offset-2 col-md-8">
        <h1>USERNAME: <?php echo $_GET['getusername']; ?></h1>
            <div class="form-group">
              <h1> <?php echo $_GET['myviewtype']; ?> </h1>
  </div>
  
    

        </form>
    </div>
     </div>
	 <?php if(isset($_POST['submit'])){
$fetchqry = "SELECT * FROM `quiz`";
$result=mysqli_query($con,$fetchqry);
$num=mysqli_num_rows($result);
@$id = $num + 1;
@$que = $_POST['question'];
@$ans = $_POST['correct_answer'];
@$wans1 = $_POST['wrong_answer1'];
@$wans2 = $_POST['wrong_answer2'];
@$wans3 = $_POST['wrong_answer3']; 
$qry = "INSERT INTO `quiz`(`id`, `que`, `option 1`, `option 2`, `option 3`, `option 4`, `ans`) VALUES ($id,'$que','$ans','$wans1','$wans2','$wans3','$ans')";
$done = mysqli_query($con,$qry);
if($done==TRUE){
	echo "Question and Answers Sumbmitted Succesfully";
}
	 }
?>
<div class="row" style="margin-top:20px">
    <div class="col-md-offset-2 col-md-8">
      <h2>TO MONITORING: <a href='monitoring.php'>Click to Return</a></h2>"; 
     </h1>
 

	<table class="table"> 
    <tr>
    <th> C No </th>
    <th> Competence Title </th>
     <th> Total Questions </th>
       <th> Quiz Items </th>
        <th> Passing Grade </th>
          <th> status </th>
           <th> No of Session </th>
    </tr>

      <?php 

$fetchqry  = "SELECT * FROM `competence` WHERE VIEWTYPE LIKE '".  $_GET['myviewtype'] ."'"; 
  $datame1 = mysqli_query($con,$fetchqry);
  $numrows=0;
  $x = 0; 
  $proceedend = 0; 


  if(mysqli_num_rows($datame1)!=0)
  {
  
    
         while($row = mysqli_fetch_assoc($datame1))
           {
                $myresult = checkstatus($row["VIEWTYPE"], $row["COMPETENCE"]);
                $noofsession = checkstatussession($row["VIEWTYPE"], $row["COMPETENCE"]);
                
                if($noofsession>0)
                {
                echo "<tr style='background-color:LIGHTGREEN;'>";  
                }
                else{  echo "<tr >"; }
                 $numrows +=1; 

                $x = $x +1; 
                $loadtotal = loadtotalquestions($row["VIEWTYPE"], $row["COMPETENCE"]);
                $totalitems = $row["CONTENTS"];
               
                echo "<td> ". $row["COMPETENCE"] . "</td>";
                echo "<td> ". $row["STATUS"] . "</td>"; 
                echo "<td> ". $loadtotal . "</td>"; 
                echo "<td> ". $totalitems . "</td>"; 
                echo "<td> ". $row["PERCENTAGE"]. "%" . "</td>"; 
                  
               
                echo "<td> ". $myresult . "%" . "</td>"; 
               
                echo "<td> ". $noofsession . "" . "</td>"; 
        
                echo "</tr>"; 
                
          }
      


  }

      ?> 






    </table>


</div></div>

</div>

