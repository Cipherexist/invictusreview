<?php 
include 'dbconfig.php'; 
include 'loadmodules.php'; 


@$sql =  "Select * from `onlineaccounts` ORDER BY `expirationdate` DESC";
@$dbt = mysqli_query($con,$sql);

if(!mysqli_error($con))
{
    if(mysqli_num_rows($dbt)!=0)
    {
    @$count = 0; 

        while($rows = mysqli_fetch_assoc($dbt))
        {
        @$id = $rows['ID'];
        @$completename = $rows['completename'];
        @$count +=1;
?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $completename; ?></td>
                <td><?php echo $rows['username']; ?></td>
                <td><?php echo $rows['password']; ?></td>
                <td><?php echo $rows['viewtype']; ?></td>
                <td><?php echo loadregistrationtocompletedate($rows['expirationdate'])?></td>
                <td><?php echo $rows['remdays'];?> Day's</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteshow('<?php echo $id; ?>','<?php echo $completename; ?>')">Delete</button>
                </td>
            </tr>

<?php

          }


    }



}
else 
{
    echo mysqli_error($con);
}



?>