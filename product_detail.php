<?php
    session_start();
    include("admin_area/includes/db.php");
    include("includes/db.php");
    include("functions/functions.php");
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
    <div class="container-fluid" style="padding-top: 3%;">
        <div class="row">
            <div class="col-sm-12">
                <div class="header_logo">
                    <a href="index.php"><img src="images/logo.jpg" alt="header logo"></a>
                </div>
            </div>
        </div>
        <?php
                $product_id = @$_GET['pro_id'];
                $query = mysqli_query($con,  "CALL GetProductById($product_id)");
                while ($result = mysqli_fetch_array($query)){
            
                ?>
        <div class="row single_pdct">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="img_container">
                            <a href="#"><img src="admin_area/product_images/<?php echo $result['product_img1'] ?>" alt="product 1"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="img_container">
                            <a href="#"><img src="admin_area/product_images/<?php echo $result['product_img2'] ?>" alt="product 2"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="img_container">
                            <a href="#"><img src="admin_area/product_images/<?php echo $result['product_img3'] ?>" alt="product 3"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="img_container">
                            <a href="#"><img src="admin_area/product_images/<?php echo $result['product_img4'] ?>" alt="product 4"></a>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                        <div class="img_container">
                            <a href="#"><img src="img/products/wallet/wallet-1.jpg" alt="product 2"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="img_container">
                            <a href="#"><img src="img/products/wallet/wallet-1.jpg" alt="product 3"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="img_container">
                            <a href="#"><img src="img/products/wallet/wallet-1.jpg" alt="product 4"></a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-sm-4">
                <div class="single_ph">
                    <p><?php echo $result['product_title'] ?> </p>
                    <p class="price"> <?php echo $result['product_price'] ?><span> INR</span></p>
                </div>
                <div class="single_pc">
                    <a href="#"><span class="c_black"></span></a>
                    <a href="#"><span class="c_brown"></span></a>
                    <a href="#"><span class="c_golden"></span></a>
                </div>
                <div class="single_size">
                    <p>FIT FOR ALL SIZE</p>
                </div>
                <div class="buy">
                    <a href="#" class="btn buy_btn" role="button">BUY NOW</a>
                </div>
                <div class="s_details">
                    <!-- dropdown -->
                    <div id="accordion">

                        <div class="card card_edit">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    PRODUCT DETAILS
                                    <span class="float-right dp_size"> + </span>
                                </a>

                            </div>
                            <div id="collapseOne" class="collapse">
                                <div class="card-body">
                                    <?php echo $result['product_desc'] ?>
                                </div>
                            </div>
                        </div>

                        <div class="card card_edit">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    FABRIC / CARE
                                    <span class="float-right dp_size"> + </span>
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse">
                                <div class="card-body">
                                    st...
                                </div>
                            </div>
                        </div>

                        <div class="card card_edit">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    DELIVERY DETAILS
                                    <span class="float-right dp_size"> + </span>
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse">
                                <div class="card-body">
                                    fit..
                                </div>
                            </div>
                        </div>
                        <div class="card card_edit">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    RETURN POLICY
                                    <span class="float-right dp_size"> + </span>
                                </a>
                            </div>
                            <div id="collapseFour" class="collapse">
                                <div class="card-body">
                                    Return...
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--accordion end-->
                </div>
            </div>
        </div>
        <?php 
            }
        ?>
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
                        <a href="#">Newsletter</a> <br>
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