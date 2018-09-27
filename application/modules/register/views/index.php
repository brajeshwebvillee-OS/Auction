
    <div class="TopHeaderCategory">
        <div class="container">
            <div class="ItemList ItemListCarousel">
                <div class="item">
                    <a href="#">
                        <div class="CItems">
                            <img src="images/icons/home.png">
                            <span class="CItemCount">3</span>
                        </div>
                        <p>Properties</p>
                    </a>
                </div>
                <div class="item">
                    <a href="search-product-listing.html">
                        <div class="CItems">
                            <img src="images/icons/car.png">
                            <span class="CItemCount">11</span>
                        </div>
                        <p>Vehicles</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="CItems">
                            <img src="images/icons/suitcase.png">
                        </div>
                        <p>Travel Equipments</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="CItems">
                            <img src="images/icons/vehicle-plate.png">
                            <span class="CItemCount">12</span>
                        </div>
                        <p>Distinguished Plates</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="CItems">
                            <img src="images/icons/mobile.png">
                        </div>
                        <p>Mobile</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="CItems">
                            <img src="images/icons/laptop.png">
                            <span class="CItemCount">10</span>
                        </div>
                        <p>Laptop</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="CItems">
                            <img src="images/icons/dimond.png">
                        </div>
                        <p>Luxury</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="CItems">
                            <img src="images/icons/electronics.png">
                        </div>
                        <p>Electronics</p>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="CItems">
                            <img src="images/icons/more.png">
                            <span class="CItemCount">18</span>
                        </div>
                        <p>Others</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-headline-wrap">
        <div class="section-headline">
            <h2 class="m-0">Register New User</h2>
            <p>Home<span class="separator">/</span><span class="current-section">Register New User</span></p>
        </div>
    </div>

    <section class="regiterForm">
        <div class="container">
            <form id="regiterationForm" action="<?php echo base_url('register'); ?>" method="post" enctype="multipart/form-data">
                <div class="headline purchases primary mb-20">
                    <h4 class="m-0">Personal Information </h4>
                </div>
                <div class="card">
                    <!--                    <h4>Personal Information</h4>-->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <p class="label">Full Name<span class="requiredSign">*</span></p>
                                <input type="text" class="" name="full_name" value="<?php  echo set_value('full_name'); ?>">
                                <p class="form-error-message"><?php echo form_error('full_name'); ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <p class="label">Email<span class="requiredSign">*</span></p>
                                <input type="email" class="" name="email" value="<?php  echo set_value('email'); ?>">
								<p class="form-error-message"><?php echo form_error('email'); ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <p class="label">Mobile Number<span class="requiredSign">*</span></p>
                                <div class="clearfix ">
                                    <div class="phone_drop">                                        
										<select name="std">
										<option value="+966" <?php if(set_value('std')=="+966"){ echo "selected";} ?> >+966</option>
										<option value="+123" <?php if(set_value('std')=="+123"){ echo "selected";} ?> >+123</option>
										<option value="+456" <?php if(set_value('std')=="+456"){ echo "selected";} ?> >+456</option>
										</select>
                                    </div>
                                    <div class="Phone_number_field">
                                        <input type="text" class="" name="mobile_no" value="<?php  echo set_value('mobile_no'); ?>">
                                    </div>
                                </div>
                                <p class="form-error-message"><?php echo form_error('mobile_no'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p class="label">Personal Identification No.<span class="requiredSign">*</span></p>
                                <input type="text" class="" name="identification_no" value="<?php  echo set_value('identification_no'); ?>">
								<p class="form-error-message"><?php echo form_error('identification_no'); ?></p>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-30">
                            <input type="radio" <?php if(set_value('identification_type')=='GovernmentID'){ echo "checked"; } ?> id="GovernmentID" value="GovernmentID" name="identification_type">
                            <label class="label-check display-inlineB mr-20" for="GovernmentID">
                                <span class="radio primary primary"><span></span></span>
                                Government ID
                            </label>
                            <input type="radio" id="Passport" <?php if(set_value('identification_type')=='Passport'){ echo "checked"; } ?> value="Passport" name="identification_type">
                            <label class="label-check display-inlineB mr-20" for="Passport">
                                <span class="radio primary primary"><span></span></span>
                                Passport
                            </label>
                            <input type="radio" id="Iqama" <?php if(set_value('identification_type')=='Iqama'){ echo "checked"; } ?> value="Iqama" name="identification_type">
                            <label class="label-check display-inlineB mr-20" for="Iqama">
                                <span class="radio primary primary"><span></span></span>
                                Iqama
                            </label>
							<p class="form-error-message"><?php echo form_error('identification_type'); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <p class="label">Country<span class="requiredSign">*</span></p>
                                <input type="text" class="" name="country" value="<?php  echo set_value('country'); ?>">
								<p class="form-error-message"><?php echo form_error('country'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="label">Province<span class="requiredSign">*</span></p>
                                <input type="text" class="" name="province" value="<?php  echo set_value('province'); ?>">
								<p class="form-error-message"><?php echo form_error('province'); ?></p>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <p class="label">City</p>
                        <input type="text" class="" name="city" value="<?php  echo set_value('city'); ?>">
						<p class="form-error-message"><?php echo form_error('city'); ?></p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="label">District</p>
                                <input type="text" class="" name="district" value="<?php  echo set_value('district'); ?>">
								<p class="form-error-message"><?php echo form_error('district'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="label">Street</p>
                                <input type="text" class="" name="street" value="<?php  echo set_value('street'); ?>">
								<p class="form-error-message"><?php echo form_error('street'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="headline purchases primary mb-20">
                    <h4 class="m-0">Bank Account Details</h4>
                </div>
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="label">Account holder name<span class="requiredSign">*</span></p>
                                <input type="text" class="" name="ac_holder_name" value="<?php  echo set_value('ac_holder_name'); ?>">
								<p class="form-error-message"><?php echo form_error('ac_holder_name'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="label">Account Number/IBAN<span class="requiredSign">*</span></p>
                                <input type="text" class="" name="account_no_iban" value="<?php  echo set_value('account_no_iban'); ?>">
								<p class="form-error-message"><?php echo form_error('account_no_iban'); ?></p>
                            </div>
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="label">Bank Name<span class="requiredSign">*</span></p>
                                <select name="bank">
                                    <option value="" >Select Bank</option>
                                    <?php if(count($banks_data)>0){ ?>
									<?php for($i=0;$i<=count($banks_data);$i++){ ?>
									<option value="<?php echo $banks_data[$i]->id; ?>" <?php if(set_value('bank')==$banks_data[$i]->id){ echo "selected";} ?>><?php echo $banks_data[$i]->name; ?></option>
									<?php } ?>
									<?php } ?>
                                </select>
								<p class="form-error-message"><?php echo form_error('bank'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="label">Swift Code<span class="requiredSign">*</span></p>
                                <input type="text" class="" name="swift_code" value="<?php  echo set_value('swift_code'); ?>">
								<p class="form-error-message"><?php echo form_error('swift_code'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="headline purchases primary mb-20">
                    <h4 class="m-0">Account Information</h4>
                </div>
                <div class="card">
                    <!--                    <h4>Account Information</h4>-->
                    <div class="form-group">
                        <p class="label">Password<span class="requiredSign">*</span></p>
                        <input type="password" class="" name="password" value="<?php  echo set_value('password'); ?>">
                        <p class="form-error-message"><?php echo form_error('password'); ?></p>
                    </div>
                    <div class="form-group">
                        <p class="label">Confirm Password<span class="requiredSign">*</span></p>
                        <input type="password" class="" name="cpassword" value="<?php  echo set_value('cpassword'); ?>">
						<p class="form-error-message"><?php echo form_error('cpassword'); ?></p>
                    </div>
                    <div class="form-group">
                        <div class="CustomFile mr-5">
                            <input type="file" name="document">
                            <div class="customFileContent">
                                <button class="btn btn-secondry"><i class="fa fa-upload"></i> Upload any registered ID</button>
                            </div>
                        </div>
                        <span>(Government ID, Passport, Iqama)</span>
						<p class="form-error-message"><?php echo $errors ?></p>
                    </div>

                    <div class="CaptchaImage">
                        <!--<img src="images/captcha-image.png"> -->
						<?php echo $widget;?>
						<?php echo $script;?>
                    </div>
					
                </div>
                <!--
                <div class="headline purchases primary mb-20">
                    <h4 class="m-0">Prove you are human</h4>
                </div>
-->

                <!--                <div class="card">-->
                <input id="AcceptTermsConditions" name="accept_terms" type="checkbox" <?php if(set_value('accept_terms')){ echo "checked";} ?>>
				
                <label for="AcceptTermsConditions" class="label-check display-inlineB mr-20">
                        <span class="checkbox primary primary"><span></span></span>
                        Accept Terms & Conditions<span class="requiredSign">*</span>
                    </label>
					<p class="form-error-message"><?php echo form_error('accept_terms'); ?></p>
                <!--                </div>-->
                <div class="mt-15">
                    <button class="button big primary active" type="submit">CREATE ACCOUNT</button>
                </div>

            </form>
			<a href="#OTPModal" data-toggle="modal" id="otp_btn" style="display:none" >OTP</a>
        </div>
    </section>
	
	

    <div id="OTPModal" class="modal formModal modal-child" data-backdrop-limit="-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="form-popup">
                    <!-- CLOSE BTN -->
                    <div class="close-btn" data-dismiss="modal">
                        <!-- SVG PLUS -->
                        <svg class="svg-plus">
						<use xlink:href="#svg-plus"></use>
					</svg>
                        <!-- /SVG PLUS -->
                    </div>
                    <!-- /CLOSE BTN -->

                    <!-- FORM POPUP CONTENT -->
                    <div class="form-popup-content otp_success">
                        <h4 class="popup-title">Thank you for registering with us</h4>
                        <!-- LINE SEPARATOR -->
                        <hr class="line-separator">
                        <!-- /LINE SEPARATOR -->
                        <h6>An OTP has been sent by SMS, please enter it here</h6>
                        <h6 class="mb-15">OTP sent to <?php echo set_value('std'); ?>-<?php echo substr(set_value('mobile_no'),0,2)."XXXXXX".substr(set_value('mobile_no'),8,2); ?></h6>
                        <form id="login-form">
                            <input type="text" placeholder="OTP" id="otp_value" name="otp_value" class="mb-5">
                            <h6 class="mb-20 form-error-message otp_error"> If in case you are not receiving the OTP message then please contact your service provider to allow receiving the advertising SMS. </h6>
                            <a id="otp_submit" class="button mid dark">Submit</a>
                            <p class="clearfix py-10">
                                <a href="#" class="pull-left primary">Change mobile number</a>
                                <a href="#" class="pull-right primary">Resend OTP</a>
                            </p>
                        </form>
                    </div>
                    <!-- /FORM POPUP CONTENT -->
                </div>
            </div>
        </div>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php if($otp=="yes"){ ?>	
	<script>
	$(document).ready(function(){		
		$( "#otp_btn" ).trigger( "click" );
	});
	</script>
	<?php } ?>
	<script type="text/javascript">
	// Ajax post
	$(document).ready(function() {
		$("#otp_submit").click(function(event) {
			event.preventDefault();
			var otp = $("#otp_value").val();			
			jQuery.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + "register/otp_match",
			dataType: 'json',
			data: {otp: otp},
			success: function(res) {
				if (res=='1')
				{
					$(".otp_success").html('<h4 class="popup-title">Thanks for the verification !</h4><a data-dismiss="modal" href="#LoginModal" data-toggle="modal">Click Here To Login</a>');
					
				}else{
					$(".otp_error").html("Your One Time Password Not Match.");
				}
			}
			});
		});
	});
</script>