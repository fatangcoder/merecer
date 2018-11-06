<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<?php 

if(isset($_GET['edit_catg_lapbag'])){

$id = $_GET['edit_catg_lapbag'];

$edit_catg_lapbag = "select * from catg_lapbag where id='$id'";

$run_edit = mysqli_query($con,$edit_catg_lapbag);

$row_edit = mysqli_fetch_array($run_edit);

$id = $row_edit['id'];

$catg_lapbag_name = $row_edit['catg_lapbag_name'];

$catg_lapbag_img = $row_edit['catg_lapbag_img'];

$catg_lapbag_url = $row_edit['catg_lapbag_url'];

$new_catg_lapbag_img = $row_edit['catg_lapbag_img'];



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

<i class="fa fa-money fa-fw"></i> EDIT catg_lapbagin

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">Explore Name:</label>

<div class="col-md-6">

<input type="text" name="catg_lapbag_name" class="form-control" value="<?php echo $catg_lapbag_name; ?>">

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group" ><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">Explore  Image:</label>

<div class="col-md-6">

<input type="file" name="catg_lapbag_img" class="form-control" >
<br>
 <img src="lapbag_images/<?php echo $catg_lapbag_img; ?>" width="70" height="70" >

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group" ><!-- 3 form-group Starts -->

<label class="col-md-3 control-label">Explore Product  Url:</label>

<div class="col-md-6">

<input type="text" name="catg_lapbag_url" value="<?php echo $catg_lapbag_url; ?>" class="form-control" >

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

$catg_lapbag_name = $_POST['catg_lapbag_name'];

$catg_lapbag_img = $_FILES['catg_lapbag_img']['name'];

$temp_name = $_FILES['catg_lapbag_img']['tmp_name'];

$catg_lapbag_url = $_POST['catg_lapbag_url'];

move_uploaded_file($temp_name,"lapbag_images/$catg_lapbag_img");

if(empty($catg_lapbag_img)){

$catg_lapbag_img = $new_catg_lapbag_img;

}

$update_catg_lapbagin = "update catg_lapbag set catg_lapbag_name='$catg_lapbag_name',catg_lapbag_img='$catg_lapbag_img',catg_lapbag_url='$catg_lapbag_url' where id='$id'";

$run_catg_lapbag = mysqli_query($con,$update_catg_lapbagin);
                                              
if($run_catg_lapbag){

echo "<script>alert('One product Image Has Been Updated')</script>";

echo "<script>window.open('index.php?view_catg_lapbag','_self')</script>";

}

}


?>



<?php } ?>