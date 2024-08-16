
  <?php 
  include 'dbconfig.php';
  include 'loadmodules.php'; 

  $fetchqry  = "SELECT * FROM `enrollment` ORDER BY ID DESC"; 
  $datame1 = mysqli_query($con,$fetchqry);
 
  if(!mysqli_error($con))
  {
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
            $x = $x +1; 
            //  if($row["status"]=='yes')
            //  {
            //    echo "<tr style='background-color:LIGHTGREEN;'>"; 
            //  }else
            //  {
            //    echo "<tr style='background-color:YELLOWORANGE;'>"; 
            //  }
            @$myid = $row['ID'];
            @$totalaccounts = loadnumberofdataall("examapproved","Where `accountid` Like '$myid'")
          ?>

            <tr>
            <td><?php echo $x ?></td> 
            <td><?php echo $row["Completename"]; ?></td> 
            <td><?php echo $row["rank"]; ?></td> 
            <td><?php echo $row["contactno"]; ?></td> 
            <td><?php echo $row["viewtype"]; ?></td> 
            <td><?php echo $row["datecreated"]; ?></td>
            <td><?php echo $totalaccounts; ?></td>
            <td>
            <input type="button" id="driver" value="Info" class="btn btn-secondary btn-sm" onClick=""/>
            <input type="button" id="driver" value="Access" class="btn btn-success btn-sm" onClick=""/>
            </td>
            
            
            </tr> 

        <?php


          }
      
      }
      else 
      {
        echo "No Data"; 
      }
  }
  else 
  {
    echo mysqli_error($con); 
  }
     
	
      ?> 

 