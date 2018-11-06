<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Insert NEWin

</li>

</ol><!-- breadcrumb Ends -->



</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> Insert NewIn

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">NEWIn:</label>

<div class="col-md-6">

<input type="text" name="new_name" class="form-control" >

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group" ><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">NEWin Image:</label>

<div class="col-md-6">

<input type="file" name="new_img" class="form-control" >

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group" ><!-- 3 form-group Starts -->

<label class="col-md-3 control-label">New Url:</label>

<div class="col-md-6">

<input type="text" name="new_url" class="form-control" >

</div>

</div><!-- 3 form-group Ends -->

<div class="form-group" ><!-- 4 form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="submit" value="Submit Now" class=" btn btn-primary form-control" >

</div>

</div><!--4 form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$new_name = $_POST['new_name'];

$new_img = $_FILES['new_img']['name'];

$temp_name = $_FILES['new_img']['tmp_name'];

$new_url = $_POST['new_url'];

$view_newin = "select * from new_in";

$view_run_newin = mysqli_query($con,$view_newin);



move_uploaded_file($temp_name,"new_images/$new_img");

$insert_newin = "insert into new_in (new_name,new_img,new_url) values ('$new_name','$new_img','$new_url')";

$run_newin = mysqli_query($con,$insert_newin);

echo "<script>alert('NewIn Image Has Been Inserted')</script>";

echo "<script>window.open('index.php?view_newin','_self')</script>";




}


?>



<?php } ?>