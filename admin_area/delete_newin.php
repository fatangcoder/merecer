<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>
 
<?php
 
if(isset($_GET['delete_newin'])){


$id = $_GET['delete_newin'];

$delete_newin = "delete from new_in where id='$id'";


$run_delete = mysqli_query($con,$delete_newin);

if($run_delete){

echo "<script>alert('One Slide Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_slides','_self')</script>";

}


} 
 
 
 

?>



<?php } ?>