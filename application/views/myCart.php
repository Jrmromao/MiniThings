

<?php include ("Template/header.php"); ?>
<div class="container">
    <?php if($this->cart->total_items() >= 1):?>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <?php $total = 0;
            $formQty = 0;
            $count = 0;
            foreach ($products as $product):;?>
                <?php $total += $product['subtotal'];
                $qty = $product['qty'];
                ?>
                <tbody>
                <br>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div width="70" height="44" class="col-sm-2 hidden-xs"><?php  echo img("assets/images/thumbs/" . $product['image'])?></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?php echo $product['name'];?></h4>
                                <p><?php echo $product['productDesc'];?></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?php echo $product['price'];?></td>
                    <td data-th="Quantity">


                        <?php echo form_open('Cart/update')?>
                                 <input id="rowid" type="hidden" name="rowid" value="<?php echo $product['rowid']?>">
                                 <input id="id" type="hidden" name="id" value="<?php echo $product['id']?>">

                        <input type="number" class="form-control text-center" value = "<?php echo $product['qty']?>" name= "qty" >
                    </td>
                    <td data-th="Subtotal" class="text-center"><?php echo $product['subtotal'];?></td>

                    <td class="actions" data-th="">
                        <button type="submit" name="submit" value="UPDATE" class="btn btn-info btn-sm" name="update"><i class="fa fa-refresh"></i></button>
                        <?php echo form_close()?>
                        <?php echo anchor( 'Cart/remove/'.$product['rowid'], ' ',['class'=>'btn btn-danger btn-sm  fa fa-trash-o', 'onclick' =>'return confirmFuncShoppingCart();']); ?>

                    </td>
                </tr>
                </tbody>
                <?php endforeach;?>
            <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total 1.99</strong></td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url()?>index.php/Product/product" class="btn btn-warning">Continue Shopping</a>
                </td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total €<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
                <td><a href="#" class="btn btn-success btn-block">Checkout</a></td>
                <td><?php echo anchor( 'Cart/removeAll', 'Clear Cart ',['class'=>'btn btn-danger btn-sm ', 'onclick' =>'return emptyShoppingCart();']); ?>
                </td>

                <td> </td>
            </tr>
            </tfoot>
        </table>
    <?php else:?>
        <h3>Shopping cart is empty! </h3>
        <a href="<?php echo base_url()?>index.php/Product/product" class="btn btn-warning"> Back to Shopping</a>
        <br>
        <br>
        <br>
        <br>
        <br>
    <?php endif;?>
</div>
<?php include ("Template/footer.php");?>

