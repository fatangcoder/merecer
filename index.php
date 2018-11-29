<?php

session_start();
include('customer/gpConfig.php');
include('customer/User.php');

include("includes/db.php");

include("functions/functions.php");

?>

<?php
//Include GP config file && User class


if(isset($_GET['code'])){


    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google


    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $user = new User();
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => 'NA',
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    
    //Render facebook profile data
    if(!empty($userData)){

        $_SESSION['user_name'] = $userData['first_name'];
        $_SESSION['customer_email'] = $userData['email'];
        //header("Location: index.php");

        // $output = '<h1>Google+ Profile Details </h1>';
        // $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        // $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        // $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        // $output .= '<br/>Email : ' . $userData['email'];
        // $output .= '<br/>Gender : ' . $userData['gender'];
        // $output .= '<br/>Locale : ' . $userData['locale'];
        // $output .= '<br/>Logged in with : Google';
        // $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        // $output .= '<br/>Logout from <a href="logout.php">Google</a>'; 
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <title>Merecer Melhor</title>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="cfEtbhLPxNxhejLF5MDgsRMIq-hapjeFth9hFCvLsN4" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
        <!-- Brand -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                    <?php 
                        $q = "select * from categories where showInMenu = 1";
                        $query = mysqli_query($con,$q);
                        while ( $res = mysqli_fetch_array($query)) {
                        ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
                    
                        <?php echo $res['cat_title'] ?>
                    </a>
                    <div class="dropdown-menu">
                    <?php 
                        $command = "select * from product_categories where cat_id =". $res['cat_id']."";
                        $productQuery = mysqli_query($con,$command);
                        while ( $result = mysqli_fetch_array($productQuery)) {
                        ?>
                        
                        <a class="dropdown-item" href="products.php?product_cat_id=<?php echo $result['p_cat_id']?>"><?php echo  $result['p_cat_title'] ?></a>
                        <?php  
                            }
                        ?>
                    </div>
                    <?php  
                }
                    ?>
                </li>
            </ul>
            <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a  href="#"> 
                        <img src="images/logo.jpg" alt="merecerlogo"  height="auto" width="130px">
                    </a>
                </li>
            </ul> -->
            <ul class="navbar-nav ml-auto nav_txt_r">
            <li class="nav-item">
            <a class="nav-link" href="#search"
              ><span class="pe-7s-search"></span> Search
            </a>
          </li>
                <!--  <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li> -->

                <li class="nav-item">
                    <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a  class='nav-link' href='checkout.php'> Login </a>";
                        }   else {
                            echo "<a  class='btn btn-success btn-sm nav-link' style='color: white;' href='logout.php'> Welcome, " . $_SESSION['user_name'] ."</a>";
                        }

                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" >My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Basket</a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- navbar end -->
    <div id="search">
      <span class="close">X</span>
      <form role="search" id="searchform"  method="get" method="get" action="results.php">
        <input value="" name="q" type="search" placeholder="type to search" />
      </form>
    </div>
    <!-- carousel-->
    <div style="padding-top: 3%;" id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
                    
            <?php

                $get_slides = "select * from slider LIMIT 0,1";

                $run_slides = mysqli_query($con,$get_slides);

                while($row_slides=mysqli_fetch_array($run_slides)){

                $slide_name = $row_slides['slide_name'];
                $slide_image = $row_slides['slide_image'];

                $slide_url = $row_slides['slide_url'];

                echo "

                <div class='carousel-item active'>

                <a href='$slide_url'><img src='admin_area/slides_images/$slide_image' class='img_responsive'></a>

                </div>

                ";
                }
            ?>

            <?php

                $get_slides = "select * from slider LIMIT 1,2 ";

                $run_slides = mysqli_query($con,$get_slides);

                while($row_slides = mysqli_fetch_array($run_slides)) {


                $slide_name = $row_slides['slide_name'];

                $slide_image = $row_slides['slide_image'];

                $slide_url = $row_slides['slide_url'];

                echo "
                <div class='carousel-item'>

                <a href='$slide_url'><img src='admin_area/slides_images/$slide_image' class='img_responsive'></a>

                </div>

                ";


                }
            ?>
            <!-- <div class="carousel-item active">
                <img src="img/bg/home_bg_1.png" class="img_responsive" alt="image 1">
            </div>
            <div class="carousel-item">
                <img src="img/bg/home_bg_2.png" class="img_responsive" alt="image 2">
            </div> -->
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <!-- Carousel End-->
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

<!-- <script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script> -->



<!-- New layout Starts -->
    <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/scrollreveal.min.js"></script>
    <script src="js/js/main.js"></script>
<!-- New Layout Ends -->
</body>
</html>