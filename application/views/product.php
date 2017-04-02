
<?php include('Template/header.php') ?>
<style type="text/css">
     table img{
        width:70px;
        height:44px;
    }
</style>
<div class="container" >

    <?php
    $this->table->set_caption('<h2>Product List</h2>');
    $this->table->set_heading('Product Code', 'Product Name', 'Product Line', 'Product Scale', 'Product Description', 'Quantity in stock', 'Buy Price', 'MSRP', 'Image', 'View Item');
    echo $this->table->generate($products);

    ?>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#productsTable').DataTable();
        } );
    </script>
    </div>
<br>
<br>
<br>
<br>
<br>
<?php include('Template/footer.php') ?>