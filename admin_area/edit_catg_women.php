<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<?php 

if(isset($_GET['edit_catg_women'])){

$id = $_GET['edit_catg_women'];

$edit_catg_women = "select * from catg_women where id='$id'";

$run_edit = mysqli_query($con,$edit_catg_women);

$row_edit = mysqli_fetch_array($run_edit);

$id = $row_edit['id'];

$catg_women_name = $row_edit['catg_women_name'];

$catg_women_img = $row_edit['catg_women_img'];

$catg_women_url = $row_edit['catg_women_url'];

$new_catg_women_image = $row_edit['catg_women_img'];


}


?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit catg_women

</li>

</ol><!-- breadcrumb Ends -->



</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> EDIT cat_women

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">New Name:</label>

<div class="col-md-6">

<input type="text" name="catg_women_name" class="form-control" value="<?php echo $catg_women_name; ?>">

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group" ><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">New In Image:</label>

<div class="col-md-6">

<input type="file" name="catg_women_img" class="form-control" >
<br>
 <img src="women_images/<?php echo $catg_women_img; ?>" width="70" height="70" >

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group" ><!-- 3 form-group Starts -->

<label class="col-md-3 control-label">New Product  Url:</label>

<div class="col-md-6">

<input type="text" name="catg_women_url" value="<?php echo $catg_women_url; ?>" class="form-control" >

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

$catg_women_name = $_POST['catg_women_name'];

$catg_women_img = $_FILES['catg_women_img']['name'];

$temp_name = $_FILES['catg_women_img']['tmp_name'];

$catg_women_url = $_POST['catg_women_url'];

move_uploaded_file($temp_name,"women_images/$catg_women_img");

if(empty($catg_women_img)){

$catg_women_img = $new_catg_women_img;

}

$update_catg_women = "update catg_women set catg_women_name='$catg_women_name',catg_women_img='$catg_women_img',catg_women_url='$catg_women_url' where id='$id'";

$run_catg_women = mysqli_query($con,$update_catg_women);
                                              
if($run_catg_women){

echo "<script>alert('One product Image Has Been Updated')</script>";

echo "<script>window.open('index.php?view_catg_women','_self')</script>";

}

}


?>



<?php } ?>