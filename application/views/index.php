<?php include("Template/header.php");?>
<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Mini</span>Things</h1>
                                <h2>'cos Size does not matter</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </div>
                            <div class="col-sm-6">
                                <?php echo img("assets\\images\\products\\S12_1099.jpg") ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Mini</span>Things</h1>
                                <h2>'cos Size does not matter</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </div>
                            <div class="col-sm-6">
                                <?php echo img("assets\\images\\products\\S10_4757.jpg") ?>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Mini</span>Things</h1>
                                <h2>'cos Size does not matter</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            </div>
                            <div class="col-sm-6">
                                <?php echo img("assets\\images\\products\\S10_1949.jpg") ?>
                            </div>
                        </div>
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/slider-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="panel-group category-products" id="accordian">
                    <!--category-productsr-->
                    <?php
                    foreach ($categories as $cat){
                        $productLine = $cat['productLine'];
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><?php echo anchor("Category/category/{$cat['productLine']}", "$productLine"); ?></h4>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <!--/category-products-->
                <!--/category-products-->
                <div class="brands_products">
                    <!--brands_products-->
                    <h2>Product Vendor</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                            foreach ($productVendor as $pVend){
                                $productVendor = $pVend['productVendor'];
                                ?>
                                <li class="panel-title"> <a href="<?php echo site_url()."/Vendor/vendor/$productVendor";?>"> <span class="pull-right"></span><?php echo $productVendor; ?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                    <!--/brands_products-->
                    <!--/shipping-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php
                    foreach ($featureItems as $item):

                        $productCode = $item['productCode'];
                        $price = $item['buyPrice'];
                        $productName = $item['productName'];
                        $productDesc = $item['productDescription'];
                        $image = $item['image'];

                        ?><?php echo form_open('Cart/add') ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <?php echo img("assets/images/products/" . $item['image']); ?>
                                        <?php echo '<h2> €' . $item['buyPrice'] . '</h2><br> <p>' . $item['productName'] . '</p><br>'; ?>
                                        <?php echo form_hidden('id', $productCode) ?>
                                        <?php
                                        // Submit Button.
                                        if ($this->session->userdata('logged_in'))
                                            echo form_submit('value', 'Add to Cart', ['class' => 'btn btn-default add-to fa fa-shopping-cart']);
                                        else {
                                            ?>
                                            <p>Login to Purchase This Item </p>
                                        <?php }
                                        echo form_close();
                                        ?>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <?php echo '<h2> €' . $item['buyPrice'] . '</h2><br> <p>' . $item['productName'] . '</p><br>'; ?>
                                            <?php echo form_hidden('id', $productCode); ?>
                                            <?php echo form_hidden('price', $price); ?>
                                            <?php echo form_hidden('name', $productName); ?>
                                            <?php echo form_hidden('productDesc', $productDesc); ?>
                                            <?php echo form_hidden('image', $image); ?>
                                            <input type="hidden" name="qty" class="form-control text-center" value="1">
                                            <?php
                                            // Submit Button.
                                            if ($this->session->userdata('logged_in')) {

                                                echo form_submit('value', 'Add to Cart', ['class' => 'btn btn-default add-to fa fa-eye'])."".anchor("Product/Details/{$item['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);

                                            } else {
                                                ?>
                                                <p>Login to Purchase This Item </p>
                                            <?php }
                                            echo form_close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <?php if ($this->session->userdata('logged_in')) { ?>
                                            <li><i class="fa fa-plus-square"><?php echo anchor("Wishlist/wishlist/$productCode", 'Add to Wishlist');?></i></li>
                                        <?php } else { ?>
                                            <li><a href='javascript:;' onclick="alertFunc();"><i class="fa fa-plus-square">Add to Wishlist</i></a> </li>
                                        <?php }?>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <!--features_items-->
                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo img("assets/images/products/" . $lowPrice[0]['image']); ?>
                                                <h2><?php echo "€".$lowPrice[0]['buyPrice'];?></h2>
                                                <p><?php echo $lowPrice[0]['productName'];?></p>
                                                <?php echo anchor("Product/Details/{$lowPrice[0]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo img("assets/images/products/" . $lowPrice[1]['image']); ?>
                                                <h2><?php echo "€".$lowPrice[1]['buyPrice'];?></h2>
                                                <p><?php echo $lowPrice[1]['productName'];?></p>
                                                <?php echo anchor("Product/Details/{$lowPrice[1]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo img("assets/images/products/" . $lowPrice[2]['image']); ?>
                                                <h2><?php echo "€".$lowPrice[2]['buyPrice'];?></h2>
                                                <p><?php echo $lowPrice[2]['productName'];?></p>
                                                <?php echo anchor("Product/Details/{$lowPrice[2]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo img("assets/images/products/" . $lowPrice[3]['image']); ?>
                                                <h2><?php echo "€".$lowPrice[3]['buyPrice'];?></h2>
                                                <p><?php echo $lowPrice[3]['productName'];?></p>
                                                <?php echo anchor("Product/Details/{$lowPrice[3]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo img("assets/images/products/" . $lowPrice[4]['image']); ?>
                                                <h2><?php echo "€".$lowPrice[4]['buyPrice'];?></h2>
                                                <p><?php echo $lowPrice[4]['productName'];?></p>
                                                <?php echo anchor("Product/Details/{$lowPrice[4]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo img("assets/images/products/" . $lowPrice[5]['image']); ?>
                                                <h2><?php echo "€".$lowPrice[5]['buyPrice'];?></h2>
                                                <p><?php echo $lowPrice[5]['productName'];?></p>
                                                <?php echo anchor("Product/Details/{$lowPrice[5]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="category-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#<?php echo $categories[0]['productLine']; ?>" data-toggle="tab"><?php echo  $categories[0]['productLine']; ?></a></li>
                            <li><a href="#<?php echo $categories[1]['productLine']; ?>" data-toggle="tab"><?php echo  $categories[1]['productLine']; ?></a></li>
                            <li><a href="#<?php echo $categories[2]['productLine']; ?>" data-toggle="tab"><?php echo  $categories[2]['productLine']; ?></a></li>
                            <li><a href="#<?php echo $categories[3]['productLine']; ?>" data-toggle="tab"><?php echo  $categories[3]['productLine']; ?></a></li>
                            <li><a href="#<?php echo $categories[4]['productLine']; ?>" data-toggle="tab"><?php echo  $categories[4]['productLine']; ?></a></li>
                            <li><a href="#<?php echo $categories[5]['productLine']; ?>" data-toggle="tab"><?php echo  $categories[5]['productLine']; ?></a></li>
                            <li><a href="#<?php echo $categories[6]['productLine']; ?>" data-toggle="tab"><?php echo  $categories[6]['productLine']; ?></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="<?php echo $categories[0]['productLine']; ?>"" >
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <?php echo img("assets/images/products/" . $featureItems[0]['image']); ?>
                                        <h2><?php echo "€".$featureItems[0]['buyPrice'];?></h2>
                                        <p><?php echo $featureItems[0]['productName'];?></p>
                                        <?php echo anchor("Product/Details/{$featureItems[0]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="<?php echo $categories[1]['productLine']; ?>"" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?php echo img("assets/images/products/" . $featureItems[1]['image']); ?>
                                            <h2><?php echo "€".$featureItems[1]['buyPrice'];?></h2>
                                            <p><?php echo $featureItems[1]['productName'];?></p>
                                            <?php echo anchor("Product/Details/{$featureItems[1]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="<?php echo $categories[2]['productLine']; ?>"" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo img("assets/images/products/" . $featureItems[2]['image']); ?>
                                                <h2><?php echo "€".$featureItems[2]['buyPrice'];?></h2>
                                                <p><?php echo $featureItems[2]['productName'];?></p>
                                                <?php echo anchor("Product/Details/{$featureItems[2]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="<?php echo $categories[3]['productLine']; ?>"" >
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php echo img("assets/images/products/" . $featureItems[3]['image']); ?>
                                                    <h2><?php echo "€".$featureItems[3]['buyPrice'];?></h2>
                                                    <p><?php echo $featureItems[3]['productName'];?></p>

                                                    <?php echo anchor("Product/Details/{$featureItems[3]['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye']);?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/category-tab-->
                <!--/recommended_items-->
            </div>
        </div>
</section>
<?php include("Template/footer.php") ?>

