<?php include('Template/header.php') ?>
    <body>
    <div class="container">
        <?php if (count($details)) : ?>
        <?php foreach ($details as $product):  ?>
            <h2><?php echo $product['productName']; ?></h2>
            <p><i class="fa fa-eye"></i> <?php echo $product['views']; ?></p>
            <br><br><br>
            <div class="col-md-6">
                <?php echo img("assets/images/products/".$product['image']);?>
            </div>
            <?php
            $productCode = $product['productCode'];
            $price = $product['buyPrice'];
            $productName = $product['productName'];
            $productDesc = $product['productDescription'];
            $image = $product['image']; ?>
            <?php echo form_open('Cart/add')?>
        <?php endforeach; foreach ($details as $product):  ?>
        <div class="col-lg-6">
            <ul class="list-group col-lg-8" >
                <li><strong>Product Category</strong>: <?php echo $product['productLine']; ?></li>
                <li><strong>Scale</strong>: <?php echo $product['productScale']; ?></li>
                <li><strong>Quantity in Stock</strong>: <?php echo $product['quantityInStock']; ?></li>
                <li><strong>Units to Order:</strong>:<br>
                    <div class="col-xs-8">
                        <div class="input-group number-spinner">
                            <input type="number" name="qty" class="form-control text-center" value="1">
                        </div>
                    </div>

                </li>
<br>
                <hr>
                <li><strong>Buy Price</strong>: <?php echo $product['buyPrice']; ?>€</li>
                <hr>
                <li><strong>Description</strong>: <?php echo $product['productDescription']; ?></li>
                <br>
                <?php echo form_hidden('id', $productCode)?>
                <?php echo form_hidden('price', $price)?>
                <?php echo form_hidden('name', $productName)?>
                <?php echo form_hidden('productDesc', $productDesc)?>
                <?php echo form_hidden('image', $image);?>


                <li><?php if (!$this->session->userdata('logged_in')) { ?>
                    <a href='javascript:;' onclick="alertFuncCart();"><i class="btn btn-default add-to fa fa-shopping-cart">Add to Cart</i></a>
                <a href='javascript:;' onclick="alertFunc();"><i class="btn btn-default add-to fa fa-heart">Add to Wishlist</i></a> </li>
<?php } else{?>


                <li><?php  echo form_submit('value', 'Add to Cart', ['class'=>'btn btn-default add-to '], ['class'=>'fa fa-plus'])." ".
                        anchor("Wishlist/wishlist/$productCode", 'Add to Wishlist', ['class'=>'btn btn-default add-to fa fa-heart']);?></li>

<?php }?>


            </ul>
        </div>
    </div>
    <?php endforeach;

    echo form_close();
    ?>



    <?php else:?>
        <p>No Records found!</p>
    <?php endif; ?>
    <div class="CorroselCcontainer image-size img">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h3>
                        Recommend Products
                    </h3>
                </div>
                <div class="col-md-3">
                    <!-- Controls -->
                    <div class="controls pull-right hidden-xs">
                        <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example" data-slide="prev"></a>
                        <a class="right fa fa-chevron-right btn btn-success" href="#carousel-example" data-slide="next"></a>
                    </div>
                </div>
            </div>
            <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[0]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[0]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[0]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[1]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[1]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[1]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[2]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[2]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[2]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[3]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[3]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[3]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[4]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[4]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[4]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[5]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[5]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[5]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[6]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[6]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[6]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[7]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[7]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[7]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[8]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[8]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[8]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[9]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[9]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[9]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[10]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[10]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[10]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="col-item">
                                    <hr>
                                    <div class="photo ">
                                        <?php echo img("assets/images/products/".$recommendedProd[11]['image']);?>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <hr>
                                            <div class="price col-md-11">
                                                <h5>
                                                    <?php echo $recommendedProd[11]['productName'];?>
                                                </h5>
                                                <h5 class="price-text-color">
                                                    <?php echo $recommendedProd[11]['buyPrice']."€";?>
                                                </h5>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
<?php include('Template/footer.php') ?>