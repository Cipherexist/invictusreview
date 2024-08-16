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

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 	
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>	


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<!--DATA PICKER --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>	
	
	
    <link rel="stylesheet" href="css/style.css">
  
  </head>

<style>
</style>


<script>

	$(document).ready(function() 
	{

         

        var table = $('.mydatatable').DataTable();
     

        $("#expirygroup").hide()

		
	});

  
  showtable()


  function addshow()
  {


    document.getElementById("completename").value = ""
    document.getElementById("username").value = ""
    document.getElementById("marketby").value = ""
    document.getElementById("password").value = ""



    document.getElementById("completename").className = "form-control"
    document.getElementById("username").className = "form-control"
    document.getElementById("marketby").className = "form-control"
    document.getElementById("password").className = "form-control"

    


    $("#modelId").modal("show")
  }


      
function showtable()
{
  $("#loadajax").show()
  $.post("accounts_show.php",
  {
    searchvalue: $("#searchtxt").val()
  },function(result)
  {
   // console.log("RESULT:", result)
    $("#loadajax").hide()
     $("#reloadpage").empty()
    $("#reloadpage").append(result)
  })
}


function deleteshow(valueid,valuename)
{
  let myid = valueid
  Swal.fire({
    title: 'Do you want to Delete ? ' + valuename,
    text: 'it wont be reverted',
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Delete'
  }).then((result) => {
    if (result.isConfirmed) {

      $.post("accounts_delete.php",{
        id: myid
      },function(result)
      {
        if(result==1)
        {
         showtable() 
        }
        else 
        {
          console.log(result)
        }
      }
    )



    }
  })


}
		
		
		
function deleteme(classnotext) 
{ 

swal.fire({
  title: 'Deactivate ' + classnotext + '?',
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
        showtable()
		
	});
  }
});

}

function showresult()
{
    
var searchresult  = document.getElementById("searchid").value; 
 
document.getElementById("titleme").value = searchresult;

}


function savedata()
{
  if(validation())
  {
      $.post("accounts_add.php",{
      controlstatus: $("#controlstatus").val(),
      accounttype: $("#accounttype").val(),
      expirydate: $("#expirydate").val(),
      completename: $("#completename").val(),
      username: $("#username").val(),
      marketby: $("#marketby").val(),
      password: $("#password").val(),
      examdate: $("#examdate").val(),
      viewtype: $("#viewtype").val()
      },function(result)
      {
        if(result==1)
        {
          showtable()
        }
        else 
        {
          console.log(result)
        }

      })
  }
}


function validation()
{
  let mystring = ""
  let proceed = true
  

  mystring = "completename"
  if(document.getElementById(mystring).value == "")
  {
    proceed =false
    document.getElementById(mystring).className = "form-control border border-danger"
  }
  else 
  {
    document.getElementById(mystring).className = "form-control"
  }

  mystring = "username"
  if(document.getElementById(mystring).value == "")
  {
    proceed =false
    document.getElementById(mystring).className = "form-control border border-danger"
  }
  else 
  {
    document.getElementById(mystring).className = "form-control"
  }


  mystring = "marketby"
  if(document.getElementById(mystring).value == "")
  {
    proceed =false
    document.getElementById(mystring).className = "form-control border border-danger"
  }
  else 
  {
    document.getElementById(mystring).className = "form-control"
  }

  mystring = "password"
  if(document.getElementById(mystring).value == "")
  {
    proceed =false
    document.getElementById(mystring).className = "form-control border border-danger"
  }
  else 
  {
    document.getElementById(mystring).className = "form-control"
  }

  return proceed
}




</script>

<?php  
include 'navbardefault.php';


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
            <h5 class="modal-title">Add Enrollment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
        
        <div class="form-group margin-top: 10px;">
           <label for="accesstype">Select Question Limit</label>
            <select class="form-control" id="controlstatus" name="controlstatus" style="font-weight: bold; color:#000;">
            <option class="form-control" value="10">10%</option>
            <option class="form-control" value="20">20%</option>
            <option class="form-control" value="30">30%</option>
            <option class="form-control" value="40">40%</option>
            <option class="form-control" value="50">50%</option>
            <option class="form-control" value="60">60%</option>      
            <option class="form-control" value="70">70%</option>      
            <option class="form-control" value="80">80%</option>      
            <option class="form-control" value="90">90%</option>
                  <option class="form-control" value="100" selected>100%</option>
                <option class="form-control" value="trial">trial</option>
            </select> 
        </div>

        <div class="form-group">
          <label for="accounttype">Type of Account</label>
          <select class="form-control" id="accounttype">
            <option value="offline">OFFLINE</option>
            <option value="online">ONLINE</option>
          </select>
        </div>

        <div class="form-group" id="expirygroup">
          <label for="expirydate">Expiry Date</label>
          <input type="text"
            class="form-control" name="" id="expirydate" aria-describedby="helpId" placeholder="">
        </div>

        
        <div class="form-group">
           <label for="examdate">Select Exam Date</label>
          <input type="text" class="form-control" id="examdate" name="examdate" placeholder="Enter the Exam Date" Required>
          </div>


            <div class="form-group">
                <label for="completename">Complete name</label>
                <input type="text" class="form-control" id="completename" placeholder="Enter your CompleteName here" Required>
            </div>
            <div class="form-group">
                <label for="username">Username (Optional)</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter the Username here" Required>
            </div>

            <div class="form-group">
              <label for="marketby">Market By</label>
              <input type="text"
                class="form-control" id="marketby" aria-describedby="helpId" placeholder="Ex. Sorsogon Marketing">
            </div>

            <div class="form-group">
                <label for="password">Activation Code</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Your Activation Code" Required>
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


  
      



        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="savedata()">Save</button>
      </div>
    </div>
  </div>
</div>


<body>
  
<div class="container-fluid" style="padding-left: 40px; padding-right: 40px;" >

<div class="row" style="margin-top: 20px;">
    <div class="col-md-offset-2 col-md-8">
        <h1 id="titleme">Activated Accounts</h1>
    </div>
</div>

<div class="row" style="margin-top: 10px;">
   <button type="button" class="btn btn-success" onclick="addshow()">Activate New Account</button>
</div>

<div class="row" style="margin-top: 20px;">
  

    <div class="col-5" style="margin-left: -20px">

        <div class="form-group">
          <label for="searchtxt">Search</label>
          <input type="text"
            class="form-control bg-warning"  id="searchtxt" aria-describedby="helpId" placeholder="">
        </div>

    </div>



</div>




<div class="row" style="margin-top: 10px;">
  

<table class="table table-striped table-bordered"> 
    	
    	<thead>
        <tr>
        <th> No </th>
        <th> Registered User </th>
        <th> Activation Code </th>
  	    <th> Viewtype </th>
        <th> Valid </th>
          <th> Date Created </th>
			 <th> App registered </th>
			   <th> LastLogin </th>
         <th> Expiry Date </th>
			    <th> Access </th>
          <th> Account </th>
			 	 <th> FUNCTION </th>
        </tr>
        </thead>
       
        <tbody id="reloadpage">

 
        </tbody>
        <p  id="loadajax" >Loading <img src="image/ajax-loader.gif" alt="No loading"></p>

    </table>


</div>


    
</div>



</body>
<script>

  const expirychoose =document.getElementById("accounttype")
  const searchtext =document.getElementById("searchtxt")

  searchtext.addEventListener("change",function()
  {
    showtable()
  })

  expirychoose.addEventListener("change",function()
  {
    if(expirychoose.value =="online")
    {
      $("#expirygroup").show()

      $('#expirydate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                locale: { format: 'MM/DD/YYYY' },
            });

    }
    else 
    {
      $("#expirygroup").hide()
    }
  })


             $('#examdate').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                locale: { format: 'MM/DD/YYYY' },
            });

    

</script>