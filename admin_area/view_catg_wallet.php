<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Wallet

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts  -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Wallet

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<?php

$get_catg_wallet = "select * from catg_wallet";

$run_catg_wallet = mysqli_query($con,$get_catg_wallet);

while($row_catg_wallet=mysqli_fetch_array($run_catg_wallet)){

$id = $row_catg_wallet['id'];

$catg_wallet_name = $row_catg_wallet['catg_wallet_name'];

$catg_wallet_img = $row_catg_wallet['catg_wallet_img'];

$catg_wallet_url = $row_catg_wallet['catg_wallet_url'];

?>

<div class="col-lg-3 col-md-3" ><!-- col-lg-3 col-md-3 Starts -->

<div class="panel panel-primary" ><!-- panel panel-primary Starts --->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" align="center" >

<?php echo $catg_wallet_name; ?>


</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<img src="wallet_images/<?php echo $catg_wallet_img; ?>" class="img-responsive" >

</div><!-- panel-body Ends -->

<div class="panel-footer" ><!-- panel-footer Starts -->

<center><!-- center Starts -->

<!-- <a href="index.php?delete_newin=<?php echo $id; ?>" class="pull-left" >

<i class="fa fa-trash-o" ></i> Delete

</a> -->

<a href="index.php?edit_catg_wallet=<?php echo $id; ?>" class="pull-right" >

<i class="fa fa-pencil" ></i> Edit

</a>

<div class="clearfix" >

</div>



</center><!-- center Ends -->


</div><!-- panel-footer Ends -->


</div><!-- panel panel-primary Ends --->


</div><!-- col-lg-3 col-md-3 Ends -->


<?php } ?>


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends  -->

<?php } ?>