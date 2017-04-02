<?php include("Template/header.php") ?>
    <!--slider-->
    <div class="container">
        <div class="row">
            <?php    if($this->session->userdata('logged_in'))
            {?>
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <?php
                    $costumerID = "";
                    if ($wishlist):
                    ?>
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th></th>
                        <th class="text-center">Price</th>
                        <th class="text-center"></th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    foreach ($wishlist as $item):
                        $costumerID = $item['customerID'];
                        $productCode = $item['productCode'];
                        $price = $item['buyPrice'];
                        $productName = $item['productName'];
                        $productDesc = $item['productDescription'];
                        $image = $item['image'];

                        echo form_open('Cart/add');
                        ?>
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left wishlistImg img" href="#" style="width: 72px; height: 72px;"> <?php  echo img("assets/images/products/" . $item['image'])?> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#"><?php echo $item['productName'];?></a></h4>
                                        <h5 class="media-heading"> by <a href="#"><?php echo $item['productVendor'];?></a></h5>
                                        <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $item['buyPrice'];?></strong></td>
                            <td class="col-sm-1 col-md-1 text-center"></td>

                            <?php echo form_hidden('id', $productCode)?>
                            <?php echo form_hidden('price', $price)?>
                            <?php echo form_hidden('name', $productName)?>
                            <?php echo form_hidden('productDesc', $productDesc)?>
                            <?php echo form_hidden('image', $image);
                            ?>
                            <input type="hidden" name="qty" class="form-control text-center" value="1">
                            <td class="col-sm-1 col-md-1"><?php echo anchor( "Wishlist/delete/{$item['wishlist_ItemID']}", ' ',['class'=>'btn btn-danger btn-sm  fa fa-trash-o']); ?></td>
                            <td class="col-sm-1 col-md-1"><?php  echo form_submit('value', 'Nuy Now', ['class'=>'btn btn-default add-to fa fa-shopping-cart']);?></td>
                        </tr>
                    <?php
                    echo form_close();
                    endforeach;?>

                    </tbody>
                </table>
                <?php echo anchor("Wishlist/removeAll/$costumerID", 'Clear Wishlist', ['class'=>'btn btn-danger btn-sm pull-right']);?>
                <?php else:?>
                    <h3>Wishlist is empty</h3>
                    <h4>Why don't you start  adding some products to you Wishlist!   <a href="<?php echo base_url()?>index.php/Product/product" class="btn btn-warning">Start Shopping</a></h4>
                <?php endif;?>
                <br>
                <br>
                <br>
            </div>
        </div>
        <?php  } else { ?>
            <h3>Please Login to see your Wishlist!</h3>
            <a href="<?php echo base_url() ?>index.php/Login/login" class="btn btn-warning"> Login</a>
        <?php }?>
    </div>

    <br>
    <br>
    <br>
    <br>
<?php include("Template/footer.php") ?>