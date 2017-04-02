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
    <?= link_tag("assets/css/style2.css")?>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!--icons-css-->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>


    <!--//skycons-icons-->
</head>
<body>
<?php foreach ($details as $user) {
    $userID = $user['userID'];
    $username = $user['username'];
    $user_cat = $user['user_cat'];
    $photo = $user['photo'];
    $name = $user['name'];
    $email = $user['email'];
    $vendorRepre = $user['Vendor_Representative'];
}
?>
<div class="page-container">
    <div class="left-content">
<div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">

                <div class="header-left">
                    <div class="logo-name">
                        <a href="<?php echo site_url()?>/Home">
                            <?php echo img("assets/images/logo.jpg");?>
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
                                            <p><?php echo $username;?></p>
                                            <span><?php  echo $user_cat; ?></span>

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
                </div>
                <div class="clearfix">
                </div>

            </div>

<br>
<br>


    <div class="market-updates">
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-1">
                <div class="col-md-8 market-update-left">
                    <h3><?php  echo count($customer)?></h3>
                    <h4>Registered Customers</h4>
                    <p>Ready to sell their products</p>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-file-text-o"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-8 market-update-left">
                    <h3><?php echo count($session)?></h3>
                    <h4>Visitors</h4>
                    <p>Since de begging of time!</p>

                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-eye"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-8 market-update-left">
                    <h3><?php echo count($views)?></h3>
                    <h4>Item views</h4>
                    <p>Sum of views of all items</p>
                </div>
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-eye"> </i>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
            <div class="inner-block">



                <div class="container">
                    <div class="container">
                        <div class="row">


                            <div class="col-md-12">
                                <h4>Costumers With no Balance!</h4>
                                <br>
                                <br>
                                <div class="table-responsive">


                                    <table id="mytable" class="table table-bordred table-striped">

                                        <thead>


                                        <th>Customer Number</th>
                                        <th>Customer Name</th>
                                        <th>Contact First Name</th>
                                        <th>Contact Last Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Credit Limit</th>
                                        </thead>
                                        <tbody>
                            <?php $count = 0;
                            foreach ($customersLIMIT15 as $c){
                                $count++;
                                $customerNumber = $c['customerNumber'];?>
                                                    <tr>
                                            <td><?php echo $customerNumber?></td>
                                            <td><?php echo $c['customerName']?></td>
                                            <td><?php echo $c['contactFirstName']?></td>
                                            <td><?php echo $c['contactLastName']?></td>
                                            <td><?php echo $c['phone']?></td>
                                            <td><?php echo $c['email']?></td>
                                            <td><?php echo $c['creditLimit']?></td>
                                                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#<?php echo"edit".$count;?>" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        </tr>


                                <div class="modal fade" id="<?php echo"edit".$count;?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                                <h4 class="modal-title custom_align" id="Heading">You are updating <?php echo $c['customerName']?> balance</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open('User/updateCredit')?>
                                                <?php echo form_hidden('customerNumber', $customerNumber)?>
                                                <div class="form-group">
                                                    <input class="form-control" name="creditLimit" type="number" placeholder="<?php echo $c['creditLimit']?>">
                                                </div>

                                            </div>
                                            <div class="modal-footer ">
                                                <?php
                                                $data = array(
                                                    'value' =>'Update',
                                                    'type'  =>'submit',
                                                    'class' =>'fa fa-refresh',
                                                    'class' =>'btn btn-warning btn-lg',
                                                    'style' =>'width: 100%;'
                                                );
                                                ?>
                                                <?php echo form_submit($data);?>
                                            </div>


                                            <?php echo form_close();?>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            <?php } ?>

                                        </tbody>

                                    </table>

                                    <div class="clearfix"></div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
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
                <a href="#"><i class="fa fa-shopping-cart"></i><span>Minithings</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><?php echo anchor("User/vendorProducts/{$vendorRepre}", 'Product');?></li>
                    <li id="menu-academico-avaliacoes" ><?php echo anchor("Add_Item/App_productPage/{$userID}", 'Add Product');?></li>

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