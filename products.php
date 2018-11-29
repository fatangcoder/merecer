
<?php

session_start();

include("admin_area/includes/db.php");

include("includes/db.php");

include("functions/functions.php");

include("pagination/function.php");


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
                    <!-- <li class="nav-item">
                            <a class="nav-link" href="#"><span class="pe-7s-search"></span> Search </a>
                        </li> -->
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
    <!--page heading -->
    <div class="container-fluid">
        <div class="row" style="margin-top: 3%;">
            <div class="col-sm-12">
                <div class="header_logo">
                <a href="index.php"><img src="images/logo.jpg" alt="header logo"></a>
                </div>
            </div>
        </div>
        <div class="row pdp_bg" style="margin-top: 5%;">
            <div class="col-sm-2 col-md-2">
                <!-- dropdown -->
                <div id="sidemenu">
                    <div class="card card_edit">
                        <?php 
                        $q = "select * from categories where showInMenu = 1";
                        $query = mysqli_query($con,$q);
                        while ( $res = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" data-parent="#sidemenu" href="#collapse<?php echo $res['cat_id'] ?>">
                            
                                <?php echo $res['cat_title']; ?>
                                <span  class="float-right dp_size"> + </span>
                            </a>
                        </div>
                        
                        <div id="collapse<?php echo $res['cat_id'] ?>" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <?php
                                    $command = "select * from product_categories where cat_id =". $res['cat_id']."";
                                    $productQuery = mysqli_query($con,$command);
                                    while ( $result = mysqli_fetch_array($productQuery)) { ?>
                                    <li><a href="products.php?product_cat_id=<?php echo $result['p_cat_id']?>"><?php echo  $result['p_cat_title'] ?></a></li>
                                    <?php } ?>
                                </ul>
                               
                            </div>
                        </div>
                        <?php 
                    } ?>
                    </div>

                    <!-- <div class="card card_edit">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" data-parent="#sidemenu" href="#collapseTwo">
                                WOMEN
                                <span class="float-right dp_size"> + </span>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <li><a href="#">ALL HANDBAGS</a></li>
                                    <li><a href="#">LONG HANDLE BAGS</a></li>
                                    <li><a href="#">TOP HANDLE BAGS</a></li>
                                    <li><a href="#">TOTES</a></li>
                                    <li><a href="#">SLING BAGS</a></li>
                                    <li><a href="#">COMPUTER BAGS</a></li>
                                    <li><a href="#">WALLETS</a></li>
                                    <li><a href="#">BACKPACK</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card card_edit">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" data-parent="#sidemenu" href="#collapseThree">
                                BUSINESS ESSENTIALS
                                <span class="float-right dp_size"> + </span>
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <li><a href="#">NOTEPAD</a></li>
                                    <li><a href="#">TABLET COVER</a></li>
                                    <li><a href="#">CARDCASE</a></li>
                                    <li><a href="#">FOLDER</a></li>
                                    <li><a href="#">FILOFAX</a></li>
                                    <li><a href="#">NOTEBOOK</a></li>
                                    <li><a href="#">BRIEFCASE</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!--accordion end-->
            </div>
            <div class="col-sm-10 col-md-10">
                <div class="row">
                    <?php
                    if(isset($_GET['product_cat_id'])) {
                        $product_cat_id = @$_GET['product_cat_id'];
                        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                            $limit = 5; //if you want to dispaly 10 records per page then you have to change here
                            $startpoint = ($page * $limit) - $limit;
                            $statement = "products where p_cat_id=".$product_cat_id.""; //you have to pass your query over here
                            $res=mysqli_query($con, "select * from ".$statement." LIMIT ".$startpoint.",".$limit."");
                        }
                            while($row=mysqli_fetch_array($res))
                            {
                            // if(isset($_GET['product_cat_id'])) {
                            //     $product_cat_id = @$_GET['product_cat_id'];
                            //     $query = mysqli_query($con,  "CALL GetRecordByProductCategoryId($product_cat_id)");
                            //     $total = mysqli_num_rows($query);
                            //     $pageSize = 2;
                            // } else {
                            //     $query = mysqli_query($con,  "CALL GetAllProducts()");
                            // }
                            // while ($row = mysqli_fetch_array($query)){
                        ?>
                    <div class='col-sm-3'>
                        
                        <div class='p_container'>
                            <div class='p_img'>
                                <a href='product_detail.php?pro_id=<?php echo  $row['product_id']?>'><img src='admin_area/product_images/<?php echo $row["product_img1"]?>'></a>
                                <div class='overlay'>COLORS
                                    <div class='p_colors'>
                                        <span class='c_black'></span>
                                        <span class='c_brown'></span>
                                        <span class='c_golden'></span>
                                    </div>
                                </div>
        
                            </div>
                            <div class='p_sub_d'>
                                <p><?php echo $row["product_label"] ?></p>
                                <p>REVERSIBLE SEUED THREE QUARTER</p>
                                <p class='price'><span>INR</span></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php       
                            }
                        ?>
                </div>
                <?php
                    echo "<div id='pagingg' >";
                    echo pagination($statement,$limit,$page);
                    echo "</div>";
                    ?>
            </div> 
        </div>
    </div>

    <!-- footer start -->
    <div class="container-fluid footer_bg">
        <div class="row">
            <div class="col-sm-12">
                <div class="subscribe_news">
                    <h6>SUBSCRIBE TO NEWSLETTER</h6>
                    <form action="">
                        <div class="input-group subscribe_form">
                            <input type="email" class="form-control" placeholder="Your Email">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text news_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="footer_lks">
                    <div class="h5">Help</div>
                    <div class="f_links">
                        <a href="#">Frequently Asked Questions</a> <br>
                        <a href="#">How to Purchase</a> <br>
                        <a href="#">Transport and delivery</a> <br>
                        <a href="#">Exchange and returns</a> <br>
                        <a href="#">Payments</a> <br>
                        <a href="contact.html">Contact</a> <br>
                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                <div class="footer_lks">
                    <div class="h5">Company</div>
                    <div class="f_links">
                        <a href="#">History of Brand</a> <br>
                        <a href="#">Inditex</a> <br>
                        <a href="#">Values/CSR</a> <br>
                        <a href="#">Work with Us</a> <br>
                        <a href="#">Press Offices</a> <br>
                        <a href="#">Privacy Policy</a> <br>
                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                <div class="footer_lks">
                    <div class="h5">Follow</div>
                    <div class="f_links">
                        <a href="#">Facebook</a> <br>
                        <a href="#">Twitter</a> <br>
                        <a href="#">Youtube</a> <br>
                        <a href="#">Pinterest</a> <br>
                        <a href="#">Instagram</a> <br>
                        <a href="#">Newsletter</a> <br>2
                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                <div class="footer_lks">
                    <div class="h5">DOWNLOAD OUR APP</div>
                    <div class="f_links">
                        <a href="#">IOS</a> <br>
                        <a href="#">ANDROID</a>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-10">
                <a href="#" class="f_change">Change Market</a>
            </div>
            <div class="col-sm-2">
                <a href="#" class="cntry justify-content-end">IN</a>
            </div>
        </div>
    </div>





    <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/scrollreveal.min.js"></script>
    <script src="js/js/main.js"></script>


</body>

</html>