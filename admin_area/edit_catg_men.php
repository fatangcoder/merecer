<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<?php 

if(isset($_GET['edit_catg_men'])){

$id = $_GET['edit_catg_men'];

$edit_catg_men = "select * from catg_men where id='$id'";

$run_edit = mysqli_query($con,$edit_catg_men);

$row_edit = mysqli_fetch_array($run_edit);

$id = $row_edit['id'];

$catg_men_name = $row_edit['catg_men_name'];

$catg_men_img = $row_edit['catg_men_img'];

$catg_men_url = $row_edit['catg_men_url'];



}


?>

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts --> 

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard" ></i> Dashboard / Edit catg_menin

</li>

</ol><!-- breadcrumb Ends -->



</div><!-- col-lg-12 Ends --> 

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> EDIT catg_menin

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->

<div class="form-group" ><!-- 1 form-group Starts -->

<label class="col-md-3 control-label">catg_men Name:</label>

<div class="col-md-6">

<input type="text" name="catg_men_name" class="form-control" value="<?php echo $catg_men_name; ?>">

</div>

</div><!-- 1 form-group Ends -->

<div class="form-group" ><!-- 2 form-group Starts -->

<label class="col-md-3 control-label">catg_men  Image:</label>

<div class="col-md-6">

<input type="file" name="catg_men_img" class="form-control" >
<br>
 <img src="men_images/<?php echo $catg_men_img; ?>" width="70" height="70" >

</div>

</div><!-- 2 form-group Ends -->


<div class="form-group" ><!-- 3 form-group Starts -->

<label class="col-md-3 control-label">catg_men Product  Url:</label>

<div class="col-md-6">

<input type="text" name="catg_men_url" value="<?php echo $catg_men_url; ?>" class="form-control" >

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

$catg_men_name = $_POST['catg_men_name'];

$catg_men_img = $_FILES['catg_men_img']['name'];

$temp_name = $_FILES['catg_men_img']['tmp_name'];

$catg_men_url = $_POST['catg_men_url'];

move_uploaded_file($temp_name,"men_images/$catg_men_img");

if(empty($catg_men_img)){

$catg_men_img = $new_catg_men_img;

}

$update_catg_menin = "update catg_men set catg_men_name='$catg_men_name',catg_men_img='$catg_men_img',catg_men_url='$catg_men_url' where id='$id'";

$run_catg_men = mysqli_query($con,$update_catg_menin);
                                              
if($run_catg_men){

echo "<script>alert('One product Image Has Been Updated')</script>";

echo "<script>window.open('index.php?view_catg_men','_self')</script>";

}

}


?>



<?php } ?>