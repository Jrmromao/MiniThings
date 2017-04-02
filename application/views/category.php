<?php include ("Template/header.php");?>
<body>
<div class="container">
    <?php
    foreach ($categories as $item):
        ?>
        <div class="col-sm-4">
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
                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <?php echo form_submit('value', 'Add to Cart', ['class' => 'btn btn-default add-to fa fa-shopping-cart']);
                        }
                        else{?>
                            <a href='javascript:;' onclick="alertFuncCart();"><i class="btn btn-default add-to fa fa-shopping-cart"></li>Add to Cart</i></a>
                        <?php } echo anchor("Product/Details/{$item['productCode']}", 'View',['class'=>'btn btn-default add-to fa fa-eye'] ); ?>
                    </div>
                </div>
                <?php   echo form_close();?>
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
    <?php endforeach; ?>
</div>
</body>
<?php include ("Template/footer.php");?>

