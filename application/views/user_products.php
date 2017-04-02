<!DOCTYPE html>
<html lang="en">
<head>
    <title>Minithings| Admin</title>
    <?= link_tag("assets/css/bootstrap.min.css")?>
    <?= link_tag("assets/css/font-awesome.min.css")?>
    <?= link_tag("assets/css/prettyPhoto.css")?>
    <?= link_tag("assets/css/price-range.css")?>
    <?= link_tag("assets/css/animate.css")?>
    <?= link_tag("assets/css/main.css")?>
    <?= link_tag("assets/css/responsive.css")?>
    <?= link_tag("assets/css/style.css")?>
    <!--[if lt IE 9]-->
    <?= link_tag("assets/js/html5shiv.js")?>
    <?= link_tag("assets/js/respond.min.js")?>
    <?= link_tag("assets/js/ProductCarousel.js")?>
    <!--[endif]-->
    <script src="<?php echo base_url()?>./assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>./assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>./assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url()?>./assets/js/price-range.js"></script>
    <script src="<?php echo base_url()?>./assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url()?>./assets/js/main.js"></script>
    <script src="<?php echo base_url()?>./assets/js/getQuantity.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <!--icons-css-->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>

    <script>

        function confirmFunc() {

            return  confirm("Want to delete?");

        }

    </script>

    <!--//skycons-icons-->
</head>
<body>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">
                <div class="header-left">
                    <div class="logo-name">
                        <a href="<?php echo site_url()?>/Home">
                            <?php echo img("assets/images/logo.jpg");?>
                            <!--<img id="logo" src="" alt="Logo"/>-->
                        </a>
                    </div>
                </div>
                <div class="header-right">
                    <div class="profile_details_left">
                        <!--notifications of menu start -->
                        <ul class="nofitications-dropdown">
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <!--notification menu end -->
                    <div class="profile_details">
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img ">
                                        <div class="user-name">


                                        </div>
                                        <i class="fa fa-angle-down lnr"></i>
                                        <i class="fa fa-angle-up lnr"></i>
                                        <div class="clearfix"></div>
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                                    <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                                    <li> <a href="<?php echo site_url();?>/Logout/logout"<i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix">
                </div>
            </div>
            <div class="inner-block">
                <div class="container">
                    <?php
                    foreach ($product as $item):
                        ?>    <div class="col-sm-3">

                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php
                                    $productCode = $item['productCode'];
                                    $price = $item['buyPrice'];
                                    $productName = $item['productName'];
                                    $productDesc = $item['productDescription'];
                                    $image = $item['image']; ?>
                                    <?php echo form_open('Cart/add')?>
                                    <?php
                                    echo img('assets/images/products/'.$item['image']);
                                    ?>

                                    <?php echo form_hidden('id', $productCode)?>
                                    <?php echo form_hidden('price', $price)?>
                                    <?php echo form_hidden('name', $productName)?>
                                    <?php echo form_hidden('productDesc', $productDesc)?>
                                    <?php echo form_hidden('image', $image);?>

                                    <?php echo '<h2> €' . $item['buyPrice'] . '</h2><br> <p>' . $item['productName'].'</p><br>'; ?>



                                    <?php echo anchor("Product/Details/{$item['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye'] ); ?>
                                    <?php echo anchor("Product/Delete_product/{$item['productCode']}", 'Delete',['class'=>'btn btn-default add-to fa fa-trash-o',   'onclick' =>'return confirmFunc();']); ?>

                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <!--inner block end here-->
            <!--copy rights start here-->
            <div class="copyrights">
                <p>© 2016 Minithings</p>
            </div>
            <!--COPY rights end here-->
        </div>
    </div>
    <!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
            <a href="#">
                <span id="logo" ></span>
                <!--<img id="logo" src="" alt="Logo"/>-->
            </a>
        </div>
        <div class="menu">
            <ul id="menu" >
                <li id="menu-home" ><a href="<?php echo base_url()?>/index.php/Account/profile"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                <li>
                    <a href="#"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="inbox.html">Inbox</a></li>
                        <li id="menu-academico-boletim" ><a href="inbox-details.html">Compose email</a></li>
                    </ul>
                </li>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i><span>Minithings</span><span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><?php echo anchor("User/vendorProducts", 'Product');?></li>
                        <li id="menu-academico-avaliacoes" ><?php echo anchor("Add_Item/App_productPage", 'Add Product');?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->

<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>