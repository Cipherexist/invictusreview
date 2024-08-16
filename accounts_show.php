
      <?php 
  include 'dbconfig.php';
  include 'loadmodules.php'; 

  @$searchvalue = ""; 

  if(isset($_POST['searchvalue']))
  {
    $searchvalue = $_POST['searchvalue']; 
  }
 
  if($searchvalue=="")
  {
    $fetchqry  = "SELECT * FROM `examapproved` ORDER BY ID DESC LIMIT 100"; 
  }
  else 
  {
    $fetchqry  = "SELECT * FROM `examapproved` Where `usernameusage` Like '%$searchvalue%' ORDER BY ID DESC"; 
  }
 
  $datame1 = mysqli_query($con,$fetchqry);
  $numrows=mysqli_num_rows($datame1);
  $x = 0; 
  $proceedend = 0; 


  if($numrows!=0)
  {
    while($row = mysqli_fetch_assoc($datame1))
    {
      //  setcookie('username', $row["username"], time()+$setlimit);
      //  setcookie('viewtype', $row["viewtype"], time()+$setlimit);
//setcookie('completename', $row["completename"], time()+$setlimit);

    @$myid = $row['ID'];
   $x = $x +1; 
   if($row["status"]=='yes')
   {
	   echo "<tr style='background-color:LIGHTGREEN;'>"; 
   }else
   {
	   echo "<tr style='background-color:YELLOWORANGE;'>"; 
   }
  	echo "<td> ". $x . "</td>"; 
	echo "<td> ". $row["usernameusage"] . "</td>"; 
	echo "<td> ". $row["password"] . "</td>"; 
	echo "<td> ". $row["viewtype"] . "</td>"; 
    echo "<td> ". $row["status"] . "</td>"; 
		echo "<td> ". loadregistrationtocompletedate($row["datecreated"]) . "</td>"; 
	echo "<td> ". $row["dateactivated"] . "</td>";
		echo "<td> ". lastlogin($row["usernameusage"])  . "</td>"; 
	$myusername = "'". $row["usernameusage"] . "'"; 

  if( $row["expdate"] ==NULL)
  {
    echo "<td>Unlimited</td>";
  }
  else 
  {
    echo "<td> ". loadregistrationtocompletedate($row["expdate"]) . "</td>";
  }

	echo "<td> ". $row["controlstatus"] . "</td>";
    if( $row["accounttype"] ==NULL)
    {
      echo "<td>OFFLINE</td>";
    }
    else 
    {
      echo "<td> ". $row["accounttype"] . "</td>";
    }
  ?>

	<td> <input type="button" id="driver" value="Deactivate" class="btn btn-sm btn-danger" onclick="deleteme(<?php echo $myusername ?>)"/>
	 <input type="button" id="driver" style="margin-top: 5px;" value="Delete" class="btn btn-sm btn-danger" onclick="deleteshow(<?php echo $myid; ?>,<?php echo $myusername ?>)"/></td>
	
  <?php 
  echo "</tr>"; 
	}
	
  }
  else 
  {
   echo "No Results";
  }

 

	
      ?> 

