<?php
include 'dbconfig.php';
require 'forcookie.php';
require 'loadmodules.php'; 
require 'forcookie2.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple Online Quiz">
    <meta name="author" content="Val Okafor">   
    <title>Account Management</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    
    <!--
    <link href="css/theme.css" rel="stylesheet">
   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   	<link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
   	-->
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

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
 
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>	
	
	

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 	
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>	


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->
<!--DATA PICKER --> 

   <!--  <link rel="stylesheet" href="css/style.css"> -->
  
  </head>

<style>
</style>


<script>

	$(document).ready(function() 
	{
	
    $('#examdate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "startDate": '01-01-1970',
                locale: { format: 'DD/MM/YYYY' },
            });
         
		
	});
		
		
		
		
function deleteme(classnotext) 
{ 

swal.fire({
  title: 'Delete ' + classnotext + '?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    
    
    $.post("deleteacct.php",
	{
	usernameme: classnotext
	},function(result){
	    swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
			$('#result').empty();
			$('#result').append(result);
		
	});
  }
});

}

function showresult()
{
    
var searchresult  = document.getElementById("searchid").value; 
 
document.getElementById("titleme").value = searchresult;

}

</script>

<?php  
include 'navbardefault.php';


// function loadtotalquestions($viewtype, $competence)
// {
//   include 'dbconfig.php';
//   $query = "Select * from preboard Where viewtype Like '". $viewtype. "' and competence Like '". $competence . "'";
//     $datame = mysqli_query($con, $query);
//     if(mysqli_num_rows($datame)!=0)
//     {
     
//       $codecomplete = mysqli_num_rows($datame); 
//     }
    
//       return $codecomplete;
// }

function lastlogin($usernameme)
{
  include 'dbconfig.php';
  $codecomplete = ""; 
  $query = "Select * from examuseraccess Where username Like '". $usernameme. "'";
    $datame = mysqli_query($con, $query);
    if(mysqli_num_rows($datame)!=0)
    {
     while ($row3 = mysqli_fetch_array($datame, MYSQLI_ASSOC)) {
        
      $codecomplete = $row3['lastlogin']; 
     }
    }
    
      return $codecomplete;
}

function loadusersession($username, $viewtype)
{
  include 'dbconfig.php';
  $query = "Select * from user_data Where username Like '". $username. "' and viewtype Like '". $viewtype . "'";
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

function checkstatus($viewtype, $competence, $percenttotal , $session)
{
  include 'dbconfig.php';
  $query = "Select * from `results` Where viewtype Like '".$viewtype . "' and session Like '". $session . "' and competence Like '".$competence. "' and username Like '". $_COOKIE['username'] . "' ORDER BY qno ASC";
    $datame = mysqli_query($con, $query);
    $corrected = 0;
    $totalme = 0;
    $codecomplete =0;
    if(mysqli_num_rows($datame)!=0)
    {
    $totalme = mysqli_num_rows($datame); 
    while ($row3 = mysqli_fetch_array($datame, MYSQLI_ASSOC)) {
        if($row3['status']=="PASSED")
        {
         $corrected += 1 ;
        }
    }

    }
      if($corrected >0)
      {
        $codecomplete = ($corrected/$totalme) * 100; 
      }

      return $codecomplete;
}


?> 

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
        
        <div class="form-group margin-top: 10px;">
           <label for="accesstype">Select Question Limit</label>
            <select class="form-control" id="controlstatus" name="controlstatus" style="font-weight: bold; color:#000;">
                <option class="form-control" value="80">80%</option>
                  <option class="form-control" value="100">100%</option>
                <option class="form-control" value="trial">trial</option>
            </select> 
    </div>
            
            <div class="form-group">
                <label for="completename">Complete name</label>
                <input type="text" class="form-control" id="question" name="completename" placeholder="Enter your CompleteName here" Required>
            </div>
            <div class="form-group">
                <label for="username">Username (Optional)</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter the Username here" Required>
            </div>
            <div class="form-group">
                <label for="password">Activation Code</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Your Activation Code" Required>
            </div>


             <div class="form-group">
           <label for="examdate">Select Exam Date</label>
          <input type="text" class="form-control" id="examdate" name="examdate" placeholder="Enter the Exam Date" Required>
          </div>

     <div class="form-group">
           <label for="viewtype">Select Type</label>
          <select class="form-control" id="viewtype" name="viewtype" style="font-weight: bold; color:#000;">
              <option class="form-control" value="GMDSS Radio Operator"> GMDSS RADIO OPERATOR</option>
              <option class="form-control" value="Deck Management Level"> Deck Management Level</option>
              <option class="form-control" value="Engine Management Level"> Engine Management Level</option>
             <option class="form-control" value="Deck Operational Level"> Deck Operational Level</option>
            <option class="form-control" value="Engine Operational Level"> Engine Operational Level</option>
   
            </select> 
       </div>

     <div class="form-group">
           <label for="accesstype">Select Access</label>
            <select class="form-control" id="accesstype" name="accesstype" style="font-weight: bold; color:#000;">
                  <option class="form-control" value="Exam and Preview">Exam and Preview</option>
                  <option class="form-control" value="Review Only">Review Only</option>
                  <option class="form-control" value="Review Only">Exam Only</option>
            </select> 
       </div>
  

  
       <div class="form-group">
           <label for="usertype">Select User Type</label>
          <select class="form-control" id="usertype" name="usertype" style="font-weight: bold; color:#000;">
                <option class="form-control" value="Trainee User">Trainee User</option>
                <option class="form-control" value="Administrator">Administrator</option>
           </select> 
        </div>
  
         <div class="form-group">
            <label for="expirymonths">Select Expiry Months</label>
            <select class="form-control" id="expirymonths" name="expirymonths" style="font-weight: bold; color:#000;">
                <option class="form-control" value="Never">Never</option>
                  <option class="form-control" value="1">1</option>
                <option class="form-control" value="2">2</option>
                  <option class="form-control" value="3">3</option>
                  <option class="form-control" value="4">4</option>
                    <option class="form-control" value="5">5</option>
                  <option class="form-control" value="6">6</option>
                    <option class="form-control" value="7">7</option>
                    <option class="form-control" value="8">8</option>
                      <option class="form-control" value="9">9</option>
                    <option class="form-control" value="10">10</option>
                      <option class="form-control" value="11">11</option>
                      <option class="form-control" value="12">12</option>
              </select>   
        </div>




        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


<div class="container">

<div class="row" style="margin-top: 20px;">
    <div class="col-md-offset-2 col-md-8">
        <h1 id="titleme">Activated Accounts</h1>
    </div>
</div>

<div class="row" style="margin-top: 10px;">
   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modelId">Activate New Account</button>
</div>




<div id="result" class="row" style="margin-top:20px">
<?php 
include 'accounts_show.php';
?>



</div>


    
</div>

