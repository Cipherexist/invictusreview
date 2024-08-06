    	<table class="table table-striped table-bordered mydatatable" style="width: 100%"> 
    	
    	<thead>
        <tr>
        <th> No </th>
        <th> Complete Name </th>
        <th> Rank </th>
        <th> Contact Number </th>
  	    <th> Viewtype </th>
          <th> Date Created </th>
          <th> Account Type </th>
			 	 <th> FUNCTION </th>
        </tr>
        </thead>
        
        <tbody>
      <?php 
  include 'dbconfig.php';
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
            echo "<tr>"; 
              echo "<td> ". $x . "</td>"; 
            echo "<td> ". $row["Completename"] . "</td>"; 
            echo "<td> ". $row["rank"] . "</td>"; 
            echo "<td> ". $row["contactno"] . "</td>"; 
              echo "<td> ". $row["viewtype"] . "</td>"; 
              echo "<td> ". $row["datecreated"] . "</td>";
              echo "<td> ". "for checking" . "</td>";
            echo '<td>'; 
            echo '<input type="button" id="driver" value="Info" class="btn btn-secondary btn-sm" onClick=""/>';
            echo '<input type="button" id="driver" value="Access" class="btn btn-success btn-sm" onClick=""/>';
            echo '</td>';
            
            
            echo "</tr>"; 
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

    

</tbody>


    </table>
