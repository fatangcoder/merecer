<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<?php 

if(isset($_GET['edit_sec_explore'])){

$id = $_GET['edit_sec_explore'];

$edit_sec_explore = "select * from sec_explore where id='$id'";

$run_edit = mysqli_query($con,$edit_sec_explore);

$row_edit = mysqli_fetch_array($run_edit);

$id = $row_edit['id'];

$sec_explore_name = $row_edit['sec_explore_name'];

$sec_explore_img = $row_edit['sec_explore_img'];

$sec_explore_url = $row_edit['sec_explore_url'];

$new_sec_explore_img = $row_edit['sec_explore_img'];



}


?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit Explore

</li>

</ol><!-- breadcrumb Ends -->



</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> EDIT sec_explorein

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">Explore Name:</label>

<div class="col-md-6">

<input type="text" name="sec_explore_name" class="form-control" value="<?php echo $sec_explore_name; ?>">

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group" ><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">Explore  Image:</label>

<div class="col-md-6">

<input type="file" name="sec_explore_img" class="form-control" >
<br>
 <img src="explore_images/<?php echo $sec_explore_img; ?>" width="70" height="70" >

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group" ><!-- 3 form-group Starts -->

<label class="col-md-3 control-label">Explore Product  Url:</label>

<div class="col-md-6">

<input type="text" name="sec_explore_url" value="<?php echo $sec_explore_url; ?>" class="form-control" >

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

$sec_explore_name = $_POST['sec_explore_name'];

$sec_explore_img = $_FILES['sec_explore_img']['name'];

$temp_name = $_FILES['sec_explore_img']['tmp_name'];

$sec_explore_url = $_POST['sec_explore_url'];

move_uploaded_file($temp_name,"explore_images/$sec_explore_img");

if(empty($sec_explore_img)){

$sec_explore_img = $new_sec_explore_img;

}

$update_sec_explorein = "update sec_explore set sec_explore_name='$sec_explore_name',sec_explore_img='$sec_explore_img',sec_explore_url='$sec_explore_url' where id='$id'";

$run_sec_explore = mysqli_query($con,$update_sec_explorein);
                                              
if($run_sec_explore){

echo "<script>alert('One product Image Has Been Updated')</script>";

echo "<script>window.open('index.php?view_sec_explore','_self')</script>";

}

}


?>



<?php } ?>