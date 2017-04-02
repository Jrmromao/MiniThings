<!DOCTYPE html>
<html lang="en">
<head>
    <title>Minithings| <?php echo $title;?></title>
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
                <span class="img-circle"></span>

                <div class="container">

                    <div class="form-horizontal">
                        <?php  echo form_open_multipart('Add_Item/addProduct');?>
                        <fieldset>
                            <!-- Form Name -->
                            <legend>
                                <h2>Add Product</h2>
                            </legend>
                            <span class="text-danger"> Mandatory fields*</span>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Product Code<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php echo form_input(['name'=>'productCode','class'=>'form-control input-md','placeholder'=>'Product Code', 'value'=>set_value('productCode'),  'required'=>'true']);?>
                                </div>
                                <div class="col-lg-6">
                                    <?php echo form_error('productCode'); ?>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Product Name<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php echo form_input(['name'=>'productName','class'=>'form-control input-md','placeholder'=>'Product Name', 'value'=>set_value('productName'), 'required'=>'true']);?>
                                </div>
                                <div class="col-lg-6">
                                    <?php echo form_error('productName'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="account">Product Line<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select name="productLine" class="form-control input-md">
                                            <option > </option>

                                   <?php   foreach ($categories as $cat): ?>
                                       <option > <?php echo $cat['productLine'];?></option>
                                   <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <?php echo form_error('productLine'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="apikey">Product Scale<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <?php echo form_input(['name'=>'productScale','class'=>'form-control input-md','placeholder'=>'Product Scale', 'value'=>set_value('productScale'), 'required'=>'true']);?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <?php echo form_error('productScale'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">Product Vendor<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php echo form_input(['name'=>'productVendor','class'=>'form-control input-md','placeholder'=>'Product Vendor','value'=>set_value('productVendor'), 'required'=>'true', 'readonly'=>'true', 'value'=>"$salesRepre"]);?>
                                </div>
                                <div class="col-lg-6">
                                    <?php echo form_error('productVendor'); ?>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Product Description<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $data = array(
                                        'name'        => 'productDescription',
                                        'placeholder' => 'Product Description',
                                        'rows'        => '5',
                                        'cols'        => '20',
                                        'style'       => 'width:100%',
                                        'class'       => 'form-control input-md',
                                        'required'    => 'true',
                                        'value'=>set_value('productDescription')
                                    );


                                    echo form_textarea($data);
                                    ?>
                                </div>
                                <div class="col-lg-6">
                                    <?php echo form_error('productDescription'); ?>
                                </div>
                            </div>
                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <?php
                                        $data = array(
                                            'name'=>'productQuantity',
                                            'class'=>'form-control input-md',
                                            'placeholder'=>'Quantity',
                                            'type' => 'number',
                                            'required'=>'true',
                                            'style'       => 'width:91%',
                                            'value'=>set_value('productQuantity')
                                        );
                                        echo form_input($data);?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('productQuantity'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product  Price<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <?php echo form_input(['name'=>'productPrice','class'=>'form-control input-md','placeholder'=>'Product Price','value'=>set_value('productPrice'), 'required'=>'true']);?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('productPrice'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Appended Input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="account">MSRP<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <?php echo form_input(['name'=>'MSRP','class'=>'form-control input-md','placeholder'=>'MSRP','value'=>set_value('MSRP'), 'required'=>'true']);?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('MSRP'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="apikey">Upload Image<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <?php echo form_upload(['name'=>'productImage','class'=>'text-center center-block well well-sm','value'=>set_value('productImage'), 'required'=>'true']);?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('productImage'); ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </fieldset>
            <div class="btn center-block">
                <?php



                $data = array(
                    'name'=>'submitButton',
                    'class'=>'btn btn-success',
                    'value'=>'Add Item'
                );
                echo form_submit($data)?>
                <button id="cancel" name="cancel" class="btn btn-inverse">Cancel</button>

            </div>

        </div>
    </div>
</div>
<?php echo form_close();?>

                </div>




    </div>





</div>
</div>

<!--main page chart layer2-->
<div class="clearfix"> </div>
</div>
<!--climate start here-->
<!--climate end here-->
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
                <a href="#"><i class="fa fa-shopping-cart"></i><span>Minithings</span><span style="float: right"></span></a>
                <ul id="menu-academico-sub" >

                </ul>
            </li>
        </ul>
    </div>
</div>





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