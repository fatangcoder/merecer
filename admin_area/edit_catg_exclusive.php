<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<?php 

if(isset($_GET['edit_catg_exclusive'])){

$id = $_GET['edit_catg_exclusive'];

$edit_catg_exclusive = "select * from catg_exclusive where id='$id'";

$run_edit = mysqli_query($con,$edit_catg_exclusive);

$row_edit = mysqli_fetch_array($run_edit);

$id = $row_edit['id'];

$catg_exclusive_name = $row_edit['catg_exclusive_name'];

$catg_exclusive_img = $row_edit['catg_exclusive_img'];

$catg_exclusive_url = $row_edit['catg_exclusive_url'];

$new_catg_exclusive_img = $row_edit['catg_exclusive_img'];



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

<i class="fa fa-money fa-fw"></i> EDIT catg_exclusivein

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">Explore Name:</label>

<div class="col-md-6">

<input type="text" name="catg_exclusive_name" class="form-control" value="<?php echo $catg_exclusive_name; ?>">

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group" ><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">Explore  Image:</label>

<div class="col-md-6">

<input type="file" name="catg_exclusive_img" class="form-control" >
<br>
 <img src="exclusive_images/<?php echo $catg_exclusive_img; ?>" width="70" height="70" >

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group" ><!-- 3 form-group Starts -->

<label class="col-md-3 control-label">Explore Product  Url:</label>

<div class="col-md-6">

<input type="text" name="catg_exclusive_url" value="<?php echo $catg_exclusive_url; ?>" class="form-control" >

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

$catg_exclusive_name = $_POST['catg_exclusive_name'];

$catg_exclusive_img = $_FILES['catg_exclusive_img']['name'];

$temp_name = $_FILES['catg_exclusive_img']['tmp_name'];

$catg_exclusive_url = $_POST['catg_exclusive_url'];

move_uploaded_file($temp_name,"exclusive_images/$catg_exclusive_img");

if(empty($catg_exclusive_img)){

$catg_exclusive_img = $new_catg_exclusive_img;

}

$update_catg_exclusivein = "update catg_exclusive set catg_exclusive_name='$catg_exclusive_name',catg_exclusive_img='$catg_exclusive_img',catg_exclusive_url='$catg_exclusive_url' where id='$id'";

$run_catg_exclusive = mysqli_query($con,$update_catg_exclusivein);
                                              
if($run_catg_exclusive){

echo "<script>alert('One product Image Has Been Updated')</script>";

echo "<script>window.open('index.php?view_catg_exclusive','_self')</script>";

}

}


?>



<?php } ?>