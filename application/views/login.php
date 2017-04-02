<?php include('Template/header.php') ?>
    <section id="form"">
        <!--form-->

        <div class="container">
            <?php if ($error = $this->session->flashdata('response')): ?>
                <div class="alert alert-danger">
                <?php echo $error;
                ?>
                </div><?php endif; ?>
            <div class="row">

                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <?php     echo form_open('Login/login');?>
                        <fieldset>
                            <div class="container">
                                <legend>Login</legend>
                                <p><span class="text-danger"> Mandatory fields*</span></p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Customer Email<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email', 'value'=>set_value('email'), 'required'=>'true' ,'type'=> 'email'] );?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Password<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password', 'value'=>set_value('password'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                        </fieldset>


                        <table>

                            <tr><td></td><td> <input type="checkbox" name="remember_me" value="on"></td><td><strong>Remember me</strong></td></tr>
                        </table>
                        <div class="form-group">
                                <?php echo form_submit(['value' => 'Login', 'class'=> 'btn btn-primary pull-right']);?>

                            </div>
                        </div>
                        <?php echo form_close()?>
                    </div><!--/sign up form-->
                </div>
            <h4>Do not Hold an Account With MiniThing? <a href="<?php echo site_url();?>/Register/register"> Register</a> </h4>
            </div>

    </section>
    <!--/form-->
<?php include('Template/footer.php') ?>