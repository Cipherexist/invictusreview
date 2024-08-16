  <?php 
function loaduseraccesstype($username)
{
    include 'dbconfig.php';
    $query = "Select * from `user_data` Where username Like '". $username. "'";
    $datame = mysqli_query($con, $query);
    if(mysqli_num_rows($datame)!=0)
    {
      while($row = mysqli_fetch_assoc($datame)) 
      {
      $codecomplete = $row["accesstype"]; 
      }
    }
    else
    {
      $codecomplete = $query; 
    }
    
      return $codecomplete;
}



  ?>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Monitoring</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      
      
      
      <?php
            if(loaduseraccesstype($_COOKIE['usname'])=='Admin')
            {
      ?>    
               <li class="nav-item">
               <a class="nav-link <?php if($_GET['content']=='activatedaccount'){echo 'active';}?>" href="accounts.php?content=activatedaccount">Activated Account <span class="sr-only"></span></a>
                </li>
                
              <li class="nav-item">
              <a class="nav-link <?php if($_GET['content']=='enrollment'){echo 'active';}?>" href="enrollment.php?content=enrollment">Enrollment <span class="sr-only"></span></a>
               </li>

               <li class="nav-item">
               <a class="nav-link <?php if($_GET['content']=='onlineaccount'){echo 'active';}?>" href="onlineaccounts.php?content=onlineaccount">Preboard Online Accounts<span class="sr-only"></span></a>
                </li>

      

               <li class="nav-item">
               <a class="nav-link <?php if($_GET['content']=='registernewapp'){echo 'active';}?>" href="registeruserapp.php?content=registernewapp">Register New App <span class="sr-only"></span></a>
                </li>
                
                    <!-- <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Registration
                           </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="registeruser.php">Online User</a>
                          <a class="dropdown-item" href="registeruserapp.php">App User</a>
                         </div>
                       </li>  -->
                       
                                  <!-- <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Manage Accounts
                       </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="accessability2.php">Android Accounts</a>
                           <a class="dropdown-item" href="preboardaccounts2.php">Preboard Accounts</a>
                         </div>
                     </li> -->
      
  
           <!-- <li class="nav-item">
              <a class="nav-link" href="monitoring.php">Monitoring</a>
           </li>  -->
<!--       
         <li class="nav-item">
                <a class="nav-link" href="rankings.php">TOP Scores</a>
              </li> -->

              
               <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>               
              
          
        <?php
            }
            
            else 
            {

          ?>

            <li class="nav-item active">
               <a class="nav-link" href="preboard.php">Home <span class="sr-only">(current)</span></a>
              </li>
        
      
     <li class="nav-item">
              <a class="nav-link" href="preboard.php">Preboard and Review</a>
           </li>
      
          <li class="nav-item">
              <a class="nav-link" href="mypendings.php">Check Pendings</a>
           </li>
      
          <li class="nav-item">
              <a class="nav-link" href="scores.php">Your Sessionss</a>
           </li>
      
      
         <li class="nav-item">
                <a class="nav-link" href="rankings.php">TOP Scores</a>
              </li>
              
      <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
              </li>              
                              
      <?php

            }
      
      ?>
    </ul>
  </div>
</nav>