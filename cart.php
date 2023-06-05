<?php
session_start();
//Importing the required PHP Files;
require_once "backend/db codes/GetData.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>Eflyer</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesoeet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen" />
</head>
<body>
    <!-- banner bg main start -->
    <div class="banner_bg_main">
        <!-- header top section start -->
        <div class="container">
            <div class="header_section_top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li>
                                    <a href="#">Best Sellers</a>
                                </li>
                                <li>
                                    <a href="#">Gift Ideas</a>
                                </li>
                                <li>
                                    <a href="#">New Releases</a>
                                </li>
                                <li>
                                    <a href="#">Today's Deals</a>
                                </li>
                                <li>
                                    <a href="#">Customer Service</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top section start -->
        <!-- logo section start -->

        <div class="logo_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo">
                            <a href="index.html">
                                <img src="images/logo.png" />
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- logo section end -->
        <!-- header section start -->
        <div class="header_section">
            <div class="container">
                <div class="containt_main">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="index.html">Home</a>
                        <a href="fashion.html">Fashion</a>
                        <a href="electronic.html">Electronic</a>
                        <a href="jewellery.html">Jewellery</a>
                    </div>
                    <span class="toggle_icon" onclick="openNav()">
                        <img src="images/toggle-icon.png" />
                    </span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            All Category
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <div class="main">
                        <!-- Another variation with a button -->
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header_box">
                        <div class="lang_box ">
                            <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                                <img src="images/flag-uk.png" alt="flag" class="mr-2 " title="United Kingdom" /> English <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu ">
                                <a href="#" class="dropdown-item">
                                    <img src="images/flag-france.png" class="mr-2" alt="flag" />
                                    French
                                </a>
                            </div>
                        </div>
                        <div class="login_menu">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="padding_10">Cart</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="padding_10">Cart</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header section end -->
        
    </div>
    
    <!-- fashion section start -->
    <div id="cart_section">
        <table>
            <tr>
                <td>

                    <h2> Items in the CART </h2>
                    <div >

                        <form id="cartFrame" action="backend/tasks handler/cartHelp.php" method="post" class="col-lg-4 col-sm-4">
                            <?php
                            if(isset($_SESSION['CARTS'])){
                            $getData = new GetData();
                            $_SESSION['CARTS'] = $getData->cart($_SESSION['ID']);
                    if(isset($_SESSION['CARTS'])){
                        $totalPrice =0;
                    foreach($_SESSION['CARTS'] as $product){
                        if($product['user_id']==$_SESSION['ID'] && $product['status']== 0){
                           foreach($_SESSION['PRODUCTS'] as $product1){
                               if($product1['id']==$product['product_id']){
                            ?>

                            <div class="box_main">
                                <h4>
                                    <?php echo $product1['name'];?>
                                </h4>
                                <p class="price_text">
                                    Price  <span style="color: #262626;">
                                        $ <?php $totalPrice += $product1['price']; echo $product1['price']."00<br/> Quantity: ".$product1['quantity']; ?>
                                    </span>
                                </p>

                                <input type="text" id="p_id" name="<?php echo $product['id'];?>" value="<?php echo $product['id'];?>" />

                            </div>

                            <?php
                    }}}
                    }

                }}
                            ?>
                            <br />
                            <p class="price_text">
                                Total Price:  <span style="color: #262626;">
                                    $ <?php if(isset($_SESSION['CARTS'])){ echo $totalPrice."00<br/> Quantity: ";} ?>
                                </span>
                            </p>
                            <br />
                            <br />
                            <div class="btn_main">
                                <div class="buy_bt">
                                    <button id="buyButt2" type="submit">Check out</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </td>
                <td>

                    <h2> Order History </h2>
                    <div>

                        <form id="cartFrame" action="backend/db codes/carHelp.php" method="post" class="col-lg-4 col-sm-4">
                            <?php
                            if(isset($_SESSION['CARTS'])){
                                $totalPrice =0;
                                foreach($_SESSION['CARTS'] as $product){
                                    if($product['user_id']==$_SESSION['ID'] && $product['status']==1){
                                        foreach($_SESSION['PRODUCTS'] as $product1){
                                            if($product1['id']==$product['product_id']){
                            ?>

                            <div class="box_main">
                                <h4>
                                    <?php echo $product1['name'];?>
                                </h4>
                                <p class="price_text">
                                    Price  <span style="color: #262626;">
                                        $ <?php $totalPrice += $product1['price']; echo $product1['price']."00<br/> Quantity".$product1['quantity']; ?>
                                    </span>
                                </p>

                                <input type="text" id="p_id" name="id" value="<?php echo $product['id'];?>" />

                            </div>

                            <?php
                                            }
                                        }
                                    }
                                }

                            }
                            ?>
                            <br />
                        </form>

                    </div>
                </td>
            </tr>
        </table>
    </div>
    
    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="footer_logo">
                <a href="index.html">
                    <img src="images/footer-logo.png" />
                </a>
            </div>
            <div class="input_bt">
                <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email" />
                <span class="subscribe_bt" id="basic-addon2">
                    <a href="#">Subscribe</a>
                </span>
            </div>
            <div class="footer_menu">
                <ul>
                    <li>
                        <a href="#">Best Sellers</a>
                    </li>
                    <li>
                        <a href="#">Gift Ideas</a>
                    </li>
                    <li>
                        <a href="#">New Releases</a>
                    </li>
                    <li>
                        <a href="#">Today's Deals</a>
                    </li>
                    <li>
                        <a href="#">Customer Service</a>
                    </li>
                </ul>
            </div>
            <div class="location_main">
                Help Line  Number : <a href="#">+1 1800 1200 1200</a>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">
                � 2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a>
            </p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }

         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
    </script>
</body>
</html>