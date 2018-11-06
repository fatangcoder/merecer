<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<?php 

if(isset($_GET['edit_newin'])){

$id = $_GET['edit_newin'];

$edit_newin = "select * from new_in where id='$id'";

$run_edit = mysqli_query($con,$edit_newin);

$row_edit = mysqli_fetch_array($run_edit);

$id = $row_edit['id'];

$new_name = $row_edit['new_name'];

$new_img = $row_edit['new_img'];

$new_url = $row_edit['new_url'];

$newin_img = $row_edit['new_img'];

}


?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit Newin

</li>

</ol><!-- breadcrumb Ends -->



</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> EDIT Newin

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">New Name:</label>

<div class="col-md-6">

<input type="text" name="new_name" class="form-control" value="<?php echo $new_name; ?>">

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group" ><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">New In Image:</label>

<div class="col-md-6">

<input type="file" name="new_img" class="form-control" >
<br>
 <img src="new_images/<?php echo $new_img; ?>" width="70" height="70" >

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group" ><!-- 3 form-group Starts -->

<label class="col-md-3 control-label">New Product  Url:</label>

<div class="col-md-6">

<input type="text" name="new_url" value="<?php echo $new_url; ?>" class="form-control" >

</div>

</div><!-- 3 form-group Ends -->


<div class="form-group" ><!-- 4 form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="update" value="Update Now" class=" btn btn-primary form-control" >

</div>

</div><!-- 4 form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$new_name = $_POST['new_name'];

$new_img = $_FILES['new_img']['name'];

$temp_name = $_FILES['new_img']['tmp_name'];

$new_url = $_POST['new_url'];

move_uploaded_file($temp_name,"new_images/$new_img");

if(empty($new_img)){

$new_img = $newin_img;

}

$update_newin = "update new_in set new_name='$new_name',new_img='$new_img',new_url='$new_url' where id='$id'";

$run_newin = mysqli_query($con,$update_newin);
                                              
if($run_newin){

echo "<script>alert('One product Image Has Been Updated')</script>";

echo "<script>window.open('index.php?view_newin','_self')</script>";

}

}


?>



<?php } ?>