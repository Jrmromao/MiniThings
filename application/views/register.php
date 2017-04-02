<?php include('Template/header.php') ?>
    <section id="form">
        <!--form-->
        <div class="container">
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>New User Sign up!</h2>

                        <?php   echo form_open('Register/register');?>
                        <fieldset>
                            <div class="container">
                                <legend>Sign up</legend>

                                <p><span class="text-danger"> Mandatory fields*</span></p>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label  class="col-lg-4 control-label">Customer Name<span class="text-danger" >*</span></label>
                                                <div class="col-lg-8">
                                                    <?php echo form_input(['name'=>'customerName','class'=>'form-control','placeholder'=>'Customer Name', 'value'=>set_value('customerName'), 'required'=>'true']);?>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-lg-6">
                                            <?php echo form_error('customerName'); ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label">Contact First Name <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <?php echo form_input(['name'=>'contactFirstName','class'=>'form-control',
                                                        'placeholder'=>'Contact First Name', 'value'=>set_value('contactFirstName'), 'required'=>'true']);?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php echo form_error('phone'); ?>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="col-lg-4 control-label">Contact Last Name<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'contactLastName','class'=>'form-control',
                                                    'placeholder'=>'Contact Last Name', 'value'=>set_value('contactLastName'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('contactLastName'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="col-lg-4 control-label">Phone<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'phone','class'=>'form-control',
                                                    'placeholder'=>'Phone', 'value'=>set_value('phone'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('phone'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label  class="col-lg-4 control-label">Address Line 1<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'addressLine1','class'=>'form-control',
                                                    'placeholder'=>'Address Line 1', 'value'=>set_value('addressLine1'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('addressLine1'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Address Line 2</label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'addressLine2','class'=>'form-control',
                                                    'placeholder'=>'Address Line 2', 'value'=>set_value('addressLine2')]);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('addressLine2'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">City<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'city','class'=>'form-control',
                                                    'placeholder'=>'City', 'value'=>set_value('city'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('city'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">State</label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'city','class'=>'form-control',
                                                    'placeholder'=>'State', 'value'=>set_value('state')]);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('state'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Postal Code<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'postalCode','class'=>'form-control',
                                                    'placeholder'=>'Postal Code', 'value'=>set_value('postalCode'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('postalCode'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Country<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'country','class'=>'form-control',
                                                    'placeholder'=>'Country', 'value'=>set_value('country'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('country'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Credit Limit</label>
                                            <div class="col-lg-8">
                                                <?php echo form_input(['name'=>'creditLimit','class'=>'form-control',
                                                    'placeholder'=>'Credit Limit', 'value'=>set_value('creditLimit'), '']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('creditLimit'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Email<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">

                                                <?php echo form_input(['name'=>'email','class'=>'form-control',
                                                    'placeholder'=>'Email', 'value'=>set_value('email'), 'required'=>'true' ,'type'=> 'email'] );?>
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
                                                <?php echo form_password(['name'=>'password','class'=>'form-control', 'placeholder'=>'Password', 'value'=>set_value('password'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Repeat Password<span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <?php echo form_password(['name'=>'repeatPassword','class'=>'form-control','placeholder'=>'Repeat Password', 'value'=>set_value('repeatPassword'), 'required'=>'true']);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php echo form_error('repeatPassword'); ?>
                                    </div>
                                </div>

                        </fieldset>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <?php echo form_reset(['value' => 'Reset', 'class'=> 'btn btn-default pull-left'])?>
                                  <?php echo form_submit(['value' => 'Submit', 'class'=> 'btn btn-primary pull-right']);?>

                            </div>
                        </div>
                        <?php echo form_close()?>
                    </div><!--/sign up form-->
                </div>
            </div>
    </section>
    <!--/form-->
<?php include('Template/footer.php') ?>