<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mini Things| <?php echo $title?></title>
    <?= link_tag("assets/css/bootstrap.min.css")?>
    <?= link_tag("assets/css/font-awesome.min.css")?>
    <?= link_tag("assets/css/prettyPhoto.css")?>
    <?= link_tag("assets/css/price-range.css")?>
    <?= link_tag("assets/css/animate.css")?>
    <?= link_tag("assets/css/main.css")?>
    <?= link_tag("assets/css/responsive.css")?>
    <?= link_tag("assets/css/myStyleSheet.css")?>
    <?= link_tag("assets/css/modal.css")?>
    <!--[if lt IE 9]-->
    <?= link_tag("assets/js/html5shiv.js")?>
    <?= link_tag("assets/js/respond.min.js")?>
    <!--[endif]-->
    <link rel="icon" href="<?php echo base_url();?>assets/images/logo.jpg" type="image/gif"">
    <script src="<?php echo base_url()?>./assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>./assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>./assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url()?>./assets/js/price-range.js"></script>
    <script src="<?php echo base_url()?>./assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url()?>./assets/js/main.js"></script>
    <script src="<?php echo base_url()?>./assets/js/getQuantity.js"></script>
    <script src="<?php echo base_url()?>./assets/js/ProductCarousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <?= link_tag("assets/DataTables-1.10.12/media/css/jquery.dataTables.css") ?>
    <script src="<?= base_url("assets/DataTables-1.10.12/media/js/jquery.js")?>"> </script>
    <script src="<?= base_url("assets/DataTables-1.10.12/media/js/jquery.dataTables.js")?>"> </script>
</head>
<!--/head-->
<body>
<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@minithings.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->
    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?php echo site_url()?>/Home">
                            <?php echo img("assets/images/logo.jpg");?>
                            <!--<img id="logo" src="" alt="Logo"/>-->
                        </a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo site_url();?>/Account/profile"><i class="fa fa-user"></i> Account</a></li>


                            <li> <?php  if($this->session->flashdata('wishlistCount') > 0):
                                    $Witem = $this->session->flashdata('wishlistCount');
                                    ?>

                                    <a href="<?php echo site_url();?>/Wishlist/MyWishList">
                                        <p><i class="fa fa-star"></i>  Wishlist</a><span class="badge"><?php  echo $Witem; ?></span></p>

                                <?php else: ?>
                                    <a href="<?php echo site_url();?>/Wishlist/MyWishList">
                                        <p><i class="fa fa-star"></i>Wishlist</a></p>
                                <?php endif;?>

                            </li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>


                            <li>
                                <?php if($this->cart->contents()){
                                    $items = count($this->cart->contents());
                                    ?>
                                    <a href="<?php echo base_url().'index.php/Cart/cart'?>">
                                        <p ><i class="fa fa-shopping-cart"></i>Cart <span class="badge"><?php echo"\n". $items;?></span></p>
                                    </a>
                                <?php } else{?>
                                    <a href="<?php echo base_url().'index.php/Cart/cart'?>">
                                        <p ><i class="fa fa-shopping-cart"></i>Cart</p>
                                    </a>
                                <?php }?>
                            </li>



                            <?php if($this->session->userdata('logged_in')):?>
                                <li><a href="<?php echo site_url();?>/Logout/logout"><i class="fa fa-lock"></i> Logout</a></li>
                            <?php  else:?>
                                <li><a data-toggle="modal" data-target="#loginModal" ><i class="fa fa-lock"></i>Login</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->
    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?php echo site_url();?>/Home" class="active">Home</a></li>
                            <li><a href="<?php echo site_url();?>/Product/product">Products<i></i></a>
                            </li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($this->session->flashdata('alert'))
        echo $this->session->flashdata('alert');
    if($this->session->flashdata('update'))
        echo $this->session->flashdata('update');
    else
        echo $this->session->flashdata('noUpdate');

    if($this->session->flashdata('ValidateQTY'))
        echo $this->session->flashdata('ValidateQTY');

    if($this->session->flashdata('Delete'))
        echo $this->session->flashdata('Delete');
    else
        echo $this->session->flashdata('NoDelete');


    if($this->session->flashdata('register'))
        echo $this->session->flashdata('register');



    ?>
    <script>
        function confirmFunc() {
            return  confirm("Are you sure you want to cancel this Order?");
        }

        function confirmFuncShoppingCart() {
            return  confirm("Are you sure you want to delete this item from your shopping cart?");
        }
        function emptyShoppingCart() {
            return  confirm("Are you sure you want Clear the Shopping Cart>");
        }


    </script>
</header>
<!--/header-->

