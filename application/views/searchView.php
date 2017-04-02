<?php include('Template/header.php') ?>

    <section id="slider">
        <!--slider-->
        <div class="container">

        </div>
    </section>
    <!--/slider-->
    <section>
        <div class="container">
            <div class="row">
                <h2>Find a Product</h2>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class=" search-query form-control" placeholder="Search" id="search" name="search" />
                        <span class="input-group-btn">

                                <?php echo anchor( 'Search/search/', ' ',['class'=>'btn btn-danger glyphicon glyphicon-search']); ?>
                                    </button>
                                </span>
                    </div>
                </div>
            </div>
            <?php echo $this->input->post('search');

            echo  $getSearchResults; ?>


        </div>

    </section>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include("Template/footer.php") ?>



