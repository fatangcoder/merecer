<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html>

<head>

<title>Merecer Melhor </title>
<meta name="google-site-verification" content="cfEtbhLPxNxhejLF5MDgsRMIq-hapjeFth9hFCvLsN4" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/style.css" rel="stylesheet">

<link href="styles/customstyle.css" rel="stylesheet">


<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">


</head>

<body>

<div id="top"><!-- top Starts -->

<div class="container"><!-- container Starts -->

<div class="col-md-6 offer"><!-- col-md-6 offer Starts -->

<a href="#" class="btn btn-success btn-sm" >
<?php

if(!isset($_SESSION['customer_email'])){

echo "Welcome :Guest";


}else{

echo "Welcome : " . $_SESSION['customer_email'] . "";

}


?>
</a>

<a href="#">
Shopping Cart Total Price: <?php total_price(); ?>, Total Items <?php items(); ?>
</a>

</div><!-- col-md-6 offer Ends -->

<div class="col-md-6"><!-- col-md-6 Starts -->
<ul class="menu"><!-- menu Starts -->

<li>
<a href="customer_register.php">
Register
</a>
</li>

<li>
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='checkout.php' >My Account</a>";

}
else{

echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

}


?>
</li>

<li>
<a href="cart.php">
Go to Cart
</a>
</li>

<li>
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='checkout.php'> Login </a>";

}else {

echo "<a href='logout.php'> Logout </a>";

}

?>
</li>

</ul><!-- menu Ends -->

</div><!-- col-md-6 Ends -->

</div><!-- container Ends -->
</div><!-- top Ends -->

<div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Starts -->
<div class="container" ><!-- container Starts -->

<div class="navbar-header"><!-- navbar-header Starts -->

<a class="navbar-brand home" href="index.php" ><!--- navbar navbar-brand home Starts -->

<img src="images/logo.jpg" alt="merecerlogo" class="hidden-xs"  height="auto" width="130px">
<!-- <img src="images/logo-small.png" alt="merecer logo" class="visible-xs" > -->

</a><!--- navbar navbar-brand home Ends -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"  >

<span class="sr-only" >Toggle Navigation </span>

<i class="fa fa-align-justify"></i>

</button>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >

<span class="sr-only" >Toggle Search</span>

<i class="fa fa-search" ></i>

</button>


</div><!-- navbar-header Ends -->

<div class="navbar-collapse collapse" id="navigation" ><!-- navbar-collapse collapse Starts -->

<div class="padding-nav" ><!-- padding-nav Starts -->

<ul class="nav navbar-nav navbar-left"><!-- nav navbar-nav navbar-left Starts -->

<li class="active">
<a href="index.php"> Home </a>
</li>

<li>
<a href="shop.php"> Shop </a>
</li>

<li>
<?php

if(!isset($_SESSION['customer_email'])){

echo "<a href='checkout.php' >My Account</a>";

}
else{

echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

}


?>
</li>

<li>
<a href="cart.php"> Shopping Cart </a>
</li>

<li>
<a href="about.php"> About Us </a>
</li>

<li>

<a href="services.php"> Services </a>

</li>

<li>
<a href="contact.php"> Contact Us </a>
</li>

</ul><!-- nav navbar-nav navbar-left Ends -->

</div><!-- padding-nav Ends -->

<a class="btn btn-primary navbar-btn right" href="cart.php"><!-- btn btn-primary navbar-btn right Starts -->

<i class="fa fa-shopping-cart"></i>

<span> <?php items(); ?> items in cart </span>

</a><!-- btn btn-primary navbar-btn right Ends -->

<div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Starts -->

<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">

<span class="sr-only">Toggle Search</span>

<i class="fa fa-search"></i>

</button>

</div><!-- navbar-collapse collapse right Ends -->

<div class="collapse clearfix" id="search"><!-- collapse clearfix Starts -->

<form class="navbar-form" method="get" action="results.php"><!-- navbar-form Starts -->

<div class="input-group"><!-- input-group Starts -->

<input class="form-control" type="text" placeholder="Search" name="user_query" required>

<span class="input-group-btn"><!-- input-group-btn Starts -->

<button type="submit" value="Search" name="search" class="btn btn-primary">

<i class="fa fa-search"></i>

</button>

</span><!-- input-group-btn Ends -->

</div><!-- input-group Ends -->

</form><!-- navbar-form Ends -->

</div><!-- collapse clearfix Ends -->

</div><!-- navbar-collapse collapse Ends -->

</div><!-- container Ends -->
</div><!-- navbar navbar-default Ends -->

<div class="container-fluid" id="slider"><!-- container Starts -->

<div class="col-md-12 col_adjust"><!-- col-md-12 Starts -->

<div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Starts --->

<ol class="carousel-indicators"><!-- carousel-indicators Starts -->

<li data-target="#myCarousel" data-slide-to="0" class="active"></li>

<li data-target="#myCarousel" data-slide-to="1"></li>

<li data-target="#myCarousel" data-slide-to="2"></li>

<li data-target="#myCarousel" data-slide-to="3"></li>


</ol><!-- carousel-indicators Ends -->

<div class="carousel-inner"><!-- carousel-inner Starts -->

<?php

$get_slides = "select * from slider LIMIT 0,1";

$run_slides = mysqli_query($con,$get_slides);

while($row_slides=mysqli_fetch_array($run_slides)){

$slide_name = $row_slides['slide_name'];
$slide_image = $row_slides['slide_image'];

$slide_url = $row_slides['slide_url'];

echo "

<div class='item active'>

<a href='$slide_url'><img src='admin_area/slides_images/$slide_image'></a>

</div>

";
}

?>

<?php

$get_slides = "select * from slider LIMIT 1,3 ";

$run_slides = mysqli_query($con,$get_slides);

while($row_slides = mysqli_fetch_array($run_slides)) {


$slide_name = $row_slides['slide_name'];

$slide_image = $row_slides['slide_image'];

$slide_url = $row_slides['slide_url'];

echo "

<div class='item'>

<a href='$slide_url'><img src='admin_area/slides_images/$slide_image'></a>

</div>

";


}



?>

</div><!-- carousel-inner Ends -->

<a class="left carousel-control" href="#myCarousel" data-slide="prev"><!-- left carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-left"> </span>

<span class="sr-only"> Previous </span>

</a><!-- left carousel-control Ends -->

<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-right"> </span>

<span class="sr-only"> Next </span>

</a><!-- right carousel-control Ends -->

</div><!-- carousel slide Ends --->

</div><!-- col-md-12 Ends -->

</div><!-- container Ends -->
  <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-pad_adjst">
                <div class="home_new_in">
                    <div class="img_container">
           <?php

$get_newin = "select * from new_in  ";

$run_newin = mysqli_query($con,$get_newin);

while($row_newin = mysqli_fetch_array($run_newin)) {


$new_name = $row_newin['new_name'];

$new_img = $row_newin['new_img'];

$new_url = $row_newin['new_url'];

echo "



<a href='$new_url'><img src='admin_area/new_images/$new_img' class='img_responsive new_collection_img'></a>



";


}

?>
                        <!-- <a href="products.html"> <img src="img/bg/home_bg_new_in.png" class="img_responsive new_collection_img" alt="new collections"> </a> -->
                        <!-- <a href="#" class="hn_link">NEW IN</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--  COLLECTIONS STARTS -->
<div class="container-fluid collection_bg">
        <div class="row">
  
            <div class="col-sm-4 col-pad_adjst">
                <div class="img_container men_co">
                              <?php

$get_catg_men = "select * from catg_men  ";

$run_catg_men = mysqli_query($con,$get_catg_men);

while($row_catg_men = mysqli_fetch_array($run_catg_men)) {


$catg_men_name = $row_catg_men['catg_men_name'];

$catg_men_img = $row_catg_men['catg_men_img'];

$catg_men_url = $row_catg_men['catg_men_url'];

echo "



<a href='$catg_men_url'><img src='admin_area/men_images/$catg_men_img' class='img_responsive'></a>



";


}

?>
                  <!--  <a href="men.html"><img src="images/men_collection.png" class="img_responsive" alt="Mens Collection"></a> -->
                   <a href="products.html" class="h_cl_shop">Shop Now</a>
                </div>
            </div>
            <div class="col-sm-4 col-pad_adjst">
                <div class="img_container men_co">
                              <?php

$get_catg_women = "select * from catg_women  ";

$run_catg_women = mysqli_query($con,$get_catg_women);

while($row_catg_women = mysqli_fetch_array($run_catg_women)) {


$catg_women_name = $row_catg_women['catg_women_name'];

$catg_women_img = $row_catg_women['catg_women_img'];

$catg_women_url = $row_catg_women['catg_women_url'];

echo "



<a href='$catg_women_url'><img src='admin_area/women_images/$catg_women_img' class='img_responsive'></a>



";


}

?>
                   <!--  <a href="Women.html"><img src="images/women_collection.png" class="img_responsive" alt="Womens Collection"></a> -->
                    <a href="products.html" class="h_cl_shop">Shop Now</a>
                </div>
            </div>
            <div class="col-sm-4 col-pad_adjst">
                <div class="img_container men_co">
                              <?php

$get_catg_business = "select * from catg_business  ";

$run_catg_business = mysqli_query($con,$get_catg_business);

while($row_catg_business = mysqli_fetch_array($run_catg_business)) {


$catg_business_name = $row_catg_business['catg_business_name'];

$catg_business_img = $row_catg_business['catg_business_img'];

$catg_business_url = $row_catg_business['catg_business_url'];

echo "



<a href='$catg_business_url'><img src='admin_area/business_images/$catg_business_img' class='img_responsive '></a>



";


}

?>
                    <!-- <a href="essentials.html"><img src="images/business_collection.png" class="img_responsive" alt="Business Collection"></a> -->
                    <a href="products.html" class="h_cl_shop">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

<div class="container home_sec">
        <div class="row">
            <div class="col-sm-6">
                <div class="img_container bag_section">
                    <?php

$get_catg_bag = "select * from catg_bag  ";

$run_catg_bag = mysqli_query($con,$get_catg_bag);

while($row_catg_bag = mysqli_fetch_array($run_catg_bag)) {


$catg_bag_name = $row_catg_bag['catg_bag_name'];

$catg_bag_img = $row_catg_bag['catg_bag_img'];

$catg_bag_url = $row_catg_bag['catg_bag_url'];

echo "



<a href='$catg_bag_url'><img src='admin_area/bag_images/$catg_bag_img' class='img_responsive '></a>



";


}

?>
                    <!-- <a href="products.html"><img src="images/bags.png" class="img_responsive" alt="bag section"></a> -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="img_container laptop_section">
                                        <?php

$get_catg_lapbag = "select * from catg_lapbag  ";

$run_catg_lapbag = mysqli_query($con,$get_catg_lapbag);

while($row_catg_lapbag = mysqli_fetch_array($run_catg_lapbag)) {


$catg_lapbag_name = $row_catg_lapbag['catg_lapbag_name'];

$catg_lapbag_img = $row_catg_lapbag['catg_lapbag_img'];

$catg_lapbag_url = $row_catg_lapbag['catg_lapbag_url'];

echo "



<a href='$catg_lapbag_url'><img src='admin_area/lapbag_images/$catg_lapbag_img' class='img_responsive '></a>



";


}

?>
                    <!-- <a href="products.html"><img src="images/laptops.png" class="img_responsive" alt="laptop section"></a> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="img_container wllet_section">
                                        <?php

$get_catg_wallet = "select * from catg_wallet  ";

$run_catg_wallet = mysqli_query($con,$get_catg_wallet);

while($row_catg_wallet = mysqli_fetch_array($run_catg_wallet)) {


$catg_wallet_name = $row_catg_wallet['catg_wallet_name'];

$catg_wallet_img = $row_catg_wallet['catg_wallet_img'];

$catg_wallet_url = $row_catg_wallet['catg_wallet_url'];

echo "



<a href='$catg_wallet_url'><img src='admin_area/wallet_images/$catg_wallet_img' class='img_responsive '></a>



";


}

?>
                   <!--  <a href="products.html"><img src="images/wallets.png" class="img_responsive" alt="wallet section"></a> -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="img_container exclusive_section">
                                        <?php

$get_catg_exclusive = "select * from catg_exclusive  ";

$run_catg_exclusive = mysqli_query($con,$get_catg_exclusive);

while($row_catg_exclusive = mysqli_fetch_array($run_catg_exclusive)) {


$catg_exclusive_name = $row_catg_exclusive['catg_exclusive_name'];

$catg_exclusive_img = $row_catg_exclusive['catg_exclusive_img'];

$catg_exclusive_url = $row_catg_exclusive['catg_exclusive_url'];

echo "



<a href='$catg_exclusive_url'><img src='admin_area/exclusive_images/$catg_exclusive_img' class='img_responsive '></a>



";


}

?>
                    <!-- <a href="products.html"><img src="images/exclusive.png" class="img_responsive" alt="exclusive section"></a>
 -->                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid explore_bg">
        <div class="row">
            <div class="col-sm-12 col-pad_adjst">
                <?php

$get_sec_explore = "select * from sec_explore  ";

$run_sec_explore = mysqli_query($con,$get_sec_explore);

while($row_sec_explore = mysqli_fetch_array($run_sec_explore)) {


$sec_explore_name = $row_sec_explore['sec_explore_name'];

$sec_explore_img = $row_sec_explore['sec_explore_img'];

$sec_explore_url = $row_sec_explore['sec_explore_url'];

echo "



<a href='$sec_explore_url'><img src='admin_area/explore_images/$sec_explore_img' class='img_responsive '></a>



";


}

?>
                <!-- <a href="products.html"><img src="images/explore.png" class="img_responsive nexplore_img" alt="explore collections"></a> -->
            </div>
        </div>
    </div>




<?php

include("includes/footer1.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>