<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Mini Things| <?php echo "User Login";?></title>
  <?= link_tag("assets/css/bootstrap.min.css")?>
  <?= link_tag("assets/css/font-awesome.min.css")?>
  <?= link_tag("assets/css/prettyPhoto.css")?>
  <?= link_tag("assets/css/price-range.css")?>
  <?= link_tag("assets/css/animate.css")?>
  <?= link_tag("assets/css/main.css")?>
  <?= link_tag("assets/css/responsive.css")?>
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
</head>
<body>
<div class="container">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <section class="login-form">
        <?php echo form_open('Login/loginUser');?>
          <?php for ($i = 0; $i < 8; $i++)
            echo "<br>";?>

          <?php echo img("assets/images/logo.jpg");?>
          <br><br>

        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email', 'value'=>set_value('email'), 'required'=>'true' ,'type'=> 'email'] );?>
        <?php echo form_error('email'); ?>
        <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password', 'value'=>set_value('password'), 'required'=>'true']);?>
        <?php echo form_error('password'); ?>
          <div class="pwstrength_viewport_progress"></div>

        <?php echo form_submit(['value' => 'Login', 'class'=> 'btn btn-lg btn-primary btn-block']);?>
       <?php echo form_close();?>

        <div class="form-links">
          <a href="<?php echo site_url()?>/Home">www.MiniThings.com</a>
        </div>
      </section>
    </div>
    <div class="col-md-4"></div>
  </div>
</body>
</html>
