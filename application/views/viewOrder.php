<?php include ("Template/header.php");
/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 26/01/2017
 * Time: 21:53
 */ ?>

<style type="text/css">

    .row img{
        margin-left: 10px;
    }
</style>


<div class="container">
    <div class="container">
        <table>
            <?php
        foreach ($status as $st){
            $orderNum = $st['orderNumber'];

            if ($st['status'] == "Shipped"):?>

                   <tr id="shipped"><td><?php echo $st['status'];?> </td><td></td></tr>
                   <tr><td><h4>Order Number: </h4></td><td></td><td><?php echo $st['orderDate'];?></td></tr>
                   <tr><td><h4>Order Date:  </h4></td><td></td><td><?php echo $st['orderDate'];?></td></tr>
                   <tr><td><h4>Required Date: </h4></td><td></td><td><?php echo $st['requiredDate'];?></td></tr>
                   <tr><td><h4>Shipped Date </h4></td><td></td><td><?php echo $st['shippedDate'];?></td></tr>
                 <?php if(!$st['comments'] == null):?>
                  <tr><td><h4>Comment: </h4></td><td></td><td><?php echo $st['comments'];?></td></tr>
            <?php endif;
             else:  ?>
                 <tr id="inProcess"><td><?php echo $st['status'];?> </td><td></td></tr>
                 <tr><td><h4>Order Number: </h4></td><td></td><td><?php echo $st['orderNumber'];?></td></tr>
                 <tr><td><h4>Order Date:  </h4></td><td></td><td><?php echo $st['orderDate'];?></td></tr>
                 <tr><td><h4>Required Date: </h4></td><td></td><td><?php echo $st['requiredDate'];?></td></tr>
                 <tr><td><h4>Shipped Date </h4></td><td></td><td><?php if($st['shippedDate'] == null) echo 'Not Shipped Yet!';
                         else
                             echo $st['shippedDate'];?></td></tr>

                 <?php if(!$st['comments'] == null):?>
                     <tr><td><h4>Comment: </h4></td><td></td><td><?php echo $st['comments'];?></td></tr>
                 <?php endif; ?>
                 <tr><td> <button id="cancel" data-target="#login-modal" data-toggle="modal" name="cancel" class="btn btn-default">Edit Order</button></td>
                <td><?php echo anchor("Update/delete/{$st['orderNumber']}", 'Cancel Order ',['class'=>'btn btn-warning',   'onclick' =>'return confirmFunc();']); ?></td</tr>

                <?php endif;?>

        </table>
        <br>
        <br>
        <?php }
        foreach ($orderDetails as $item):
            ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <?php  ?>
                            <h3><?php echo $item['productName']?></h3>
                            <?php
                            echo img('assets/images/products/'.$item['image']);?>

                            <h4 class="pull-left">Quantity Ordered: <?php echo $item['quantityOrdered'];?></h4>
                            <h4 class="pull-left">Product Vendor: <?php echo $item['productVendor'];?></h4>
                            <h4 class="pull-left">Price per Unit: <?php echo $item['priceEach'];?></h4>
                            <?php ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>

    $(document).ready(function() {
        $("#datepicker").datepicker();
    });


</script>

    <div class="myModal">
    <div class="modal fade" id="login-modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Order</h4>
                </div>
                <br>
                <br>
                <br>
                <fieldset>
                    <?php echo form_open('Update/update_order')?>
                    <div class="container">
                        <div id="form-field">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label  name="requiredDate"  for="textinput">Required Date</label>

                                            <input  type="text" placeholder="Required Date" value="<?php echo $st['requiredDate'];?>" name="requiredDate" id="datepicker" class="form-control" style="width: 100%;">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label  name="comment"  for="textinput">Comment</label>

                                            <?php
                                            $data = array(
                                                'name'        => 'comment',
                                                'placeholder' => 'Comment',
                                                'rows'        => '5',
                                                'cols'        => '20',
                                                'width'       => '100%',
                                                'class'       => 'form-control input-md',
                                                'value'=>set_value('comments')
                                            );
                                            echo form_textarea($data);  ?>
                                        </div>

                                </div>            </fieldset>
<div class="row">
                                <?php
                                foreach ($orderDetails as $item):


                                    ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php  ?>
                                                    <h4><?php echo $item['productName']?></h4>
                                                    <?php echo form_hidden('productCode', $item['productCode']);
                                                    echo
                                                    img('assets/images/products/'.$item['image']);?>
                                                    <h5 class="pull-left">Quantity Ordered:   <input type="number" name="qty" class="form-control text-center pull-right" value="<?php echo $item['quantityOrdered'];?>" style="width: 55px; margin-left: 10px"></h5>
                                                    <h5 class="pull-left">Product Vendor: <?php echo $item['productVendor'];?></h5>
                                                    <h5 class="pull-left">Price per Unit: <?php echo $item['priceEach'];?></h5>
                                                    <?php ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                <?php endforeach; ?>

</div>

                <div class="modal-footer">
                    <?php
                    $data = array(
                        'value' =>'Update Order',
                        'type'  =>'submit',
                        'class' =>'fa fa-refresh',
                        'class' =>'btn btn-warning btn-lg',
                        'style' =>'width: 100%;'
                    );
                    ?>
                    <?php echo form_hidden('orderNumber', $orderNum);
                    echo form_submit($data);?>
                </div>
                <?php echo form_close();?>
                </div>
            </div>
</div>

        
        </div>


</div>

<?php include ("Template/footer.php");?>

