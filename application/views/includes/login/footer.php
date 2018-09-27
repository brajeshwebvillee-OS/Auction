    <footer>
        <!-- FOOTER TOP -->
        <div id="footer-top-wrap">
            <div id="footer-top">
                <!-- COMPANY INFO -->
                <div class="company-info">
                    <figure class="logo small wv_logo_small">
                        <img src="<?php echo base_url(); ?>images/logo_small.png" alt="logo-small">
                    </figure>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>
                    <ul class="company-info-list">
                        <li class="company-info-item">
                            <span class="icon-present"></span>
                            <p><span>850.296</span> Products</p>
                        </li>
                        <li class="company-info-item">
                            <span class="icon-energy"></span>
                            <p><span>1.207.300</span> Members</p>
                        </li>
                        <li class="company-info-item">
                            <span class="icon-user"></span>
                            <p><span>74.059</span> Sellers</p>
                        </li>
                    </ul>
                </div>
                <!-- /COMPANY INFO -->

                <!-- LINK INFO -->
                <div class="link-info">
                    <p class="footer-title">Useful links</p>
                    <!-- LINK LIST -->
                    <ul class="link-list">
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="about.html">More About iMozayed Auction</a>
                        </li>
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="terms-and-conditions.html">Terms & Conditions</a>
                        </li>
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                    <!-- /LINK LIST -->
                    <!-- SOCIAL LINKS -->
                    <h3 class="footer-title1 mt-25">Follow Us On</h3>
                    <ul class="social-links">
                        <li class="social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="social-link">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                    </ul>
                    <!-- /SOCIAL LINKS -->
                </div>
                <!-- /LINK INFO -->

                <!-- LINK INFO -->
                <div class="link-info">
                    <p class="footer-title">Help</p>
                    <!-- LINK LIST -->
                    <ul class="link-list">
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="faqs.html">FAQs</a>
                        </li>
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="increase-deposit-bidding-limit.html">My Wallet</a>
                        </li>
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="#ForgotPassword" data-toggle="modal">Forgot Password</a>
                        </li>
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="register.html">Registration</a>
                        </li>
                        <li class="link-item">
                            <div class="bullet"></div>
                            <a href="index.html#services-wrap">How to Bid</a>
                        </li>
                    </ul>
                    <!-- /LINK LIST -->
                </div>
                <!-- /LINK INFO -->
                <!-- LINK INFO -->
                <div class="link-info">
                    <p class="footer-title">Available On</p>
                    <!-- LINK LIST -->
                    <ul class="apps">
                        <li>
                            <a href="#">
                                <img src="<?php echo base_url(); ?>images/app-store.png">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo base_url(); ?>images/googleplay.png">
                            </a>
                        </li>
                    </ul>
                    <!-- /LINK LIST -->
                </div>
                <!-- /LINK INFO -->


            </div>
        </div>
        <!-- /FOOTER TOP -->

        <!-- FOOTER BOTTOM -->
        <div id="footer-bottom-wrap">
            <div id="footer-bottom">
                <p><span>&copy;</span><a href="index.html">Imozayed</a> - All Rights Reserved 2018</p>
            </div>
        </div>
        <!-- /FOOTER BOTTOM -->
    </footer>
    <div id="ForgotPassword" class="modal formModal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
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
                    <div class="form-popup-content">
                        <h4 class="popup-title">Forgot Password?</h4>
                        <!-- LINE SEPARATOR -->
                        <hr class="line-separator">
                        <!-- /LINE SEPARATOR -->
                        <h5 class="mb-15">Don't Worry, it happens. We will help you</h5>
                        <form id="login-form">
                            <label for="username" class="rl-label">Enter Mobile No.</label>
                            <div class="clearfix ">
                                <div class="phone_drop">
                                    <label class="select-block" for="ss_filter">
                                    <select class="">
                                        <option>+91</option>
                                        <option>+02</option>
                                        <option>+92</option>
                                        <option>+87</option>
                                        <option>+90</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"/>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                                </div>

                                <div class="Phone_number_field">
                                    <input type="text" id="username" name="username" placeholder="Mobile Number">
                                </div>
                            </div>
                            <a href="#OTPModal" data-dismiss="modal" data-toggle="modal" class="button mid dark mt-0">Reset my password</a>
                        </form>
                    </div>
                    <!-- /FORM POPUP CONTENT -->
                </div>
            </div>
        </div>
    </div>
    <div id="verificationThanks" class="modal formModal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
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
                    <div class="form-popup-content">
                        <h4 class="popup-title">Thanks for the verification !</h4>
                        <!-- LINE SEPARATOR -->
                        <hr class="line-separator">
                        <!-- /LINE SEPARATOR -->
                        <h5 class="mb-15">Please enter your new password</h5>
                        <form id="login-form">
                            <div class="form-group">
                                <input type="password" placeholder="New Password" class="mb-5">
                                <p class="form-error-message">*Password should be minimum 8 characters long</p>
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Confirm Password" class="mb-5">
                                <p class="form-error-message">*Password should be minimum 8 characters long</p>
                            </div>
                            <a data-toggle="modal" data-dismiss="modal" href="#verificationThanks" class="button mid dark">Save</a>
                            <p class="pt-10">You will be taken to login screen</p>
                        </form>
                    </div>
                    <!-- /FORM POPUP CONTENT -->
                </div>
            </div>
        </div>
    </div>
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
                    <div class="form-popup-content">
                        <h4 class="popup-title">Thank you for registering with us</h4>
                        <!-- LINE SEPARATOR -->
                        <hr class="line-separator">
                        <!-- /LINE SEPARATOR -->
                        <h6>An OTP has been sent by SMS, please enter it here</h6>
                        <h6 class="mb-15">OTP sent to 91-97XXXXXX98</h6>
                        <form id="login-form">
                            <input type="text" placeholder="OTP" class="mb-5">
                            <h6 class="mb-20 form-error-message"> If in case you are not receiving the OTP message then please contact your service provider to allow receiving the advertising SMS. </h6>
                            <a data-toggle="modal" href="#verificationThanks" data-dismiss="modal" class="button mid dark">Submit</a>
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
    <div class="modal fade formModal" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <div class="form-popup-content">
                        <h4 class="popup-title">Login to your Account</h4>
                        <!-- LINE SEPARATOR -->
                        <hr class="line-separator">
                        <!-- /LINE SEPARATOR -->
                        <form id="login-form">
                            <label for="username" class="rl-label">Email/Mobile<span class="requiredSign">*</span></label>
                            <input type="text" id="username" name="username" placeholder="Email/Mobile">
                            <label for="password" class="rl-label">Password<span class="requiredSign">*</span></label>
                            <input type="password" id="password" name="password" placeholder="Enter your password here...">

                            <div class="clearfix">
                                <div class="pull-left">
                                    <input id="RememberMe" name="language" type="checkbox">
                                    <label for="RememberMe" class="label-check mb-0 mt--5">
                                <span class="checkbox primary primary"><span></span></span>Remember Me
                            </label>
                                </div>
                                <p class="pull-right">Forgot your password? <a href="#ForgotPassword" data-toggle="modal" data-dismiss="modal" class="primary">Click here!</a></p>
                            </div>
                            <button class="button mid dark mt-20">Login <span class="">Now!</span></button>
                            <p class="mt-10 mb-0">New User? <a href="#" class="primary">Register Now</a></p>
                        </form>
                    </div>
                    <!-- /FORM POPUP CONTENT -->
                </div>
            </div>
        </div>
    </div>

    <div class="shadow-film closed"></div>

    <!-- SVG ARROW -->
    <svg style="display: none;">	
	<symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
		<path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
	</symbol>
</svg>
    <!-- /SVG ARROW -->

    <!-- SVG STAR -->
    <svg style="display: none;">
	<symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">	
		<polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751 
	2.495,6.313 -0.002,3.878 3.45,3.376 "/>
	</symbol>
</svg>
    <!-- /SVG STAR -->

    <!-- SVG PLUS -->
    <svg style="display: none;">
	<symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
		<rect x="5" width="3" height="13"/>
		<rect y="5" width="13" height="3"/>
	</symbol>
</svg>
    <!-- /SVG PLUS -->

    <!-- SVG CHECK -->
    <svg style="display: none;">
	<symbol id="svg-check" viewBox="0 0 15 12" preserveAspectRatio="xMinYMin meet">
		<polygon points="12.45,0.344 5.39,7.404 2.562,4.575 0.429,6.708 3.257,9.536 3.257,9.536 
			5.379,11.657 14.571,2.465 "/>
	</symbol>
</svg>

    <div class="popupForm">
        <div class="PF_logo">
            <img src="<?php echo base_url(); ?>images/logo.png">
        </div>
        <div class="popupFormClose">
            <img src="<?php echo base_url(); ?>images/icons/close.png">
        </div>
        <h4>Send Inquiry</h4>
        <p>For any complains, feedback or suggestions kindly contact us through the form below</p>
        <form>
            <input type="text" placeholder="Email">
            <input type="text" placeholder="Mobile Number">
            <input type="text" placeholder="Subject">
            <textarea placeholder="Message"></textarea>
            <div class="text-center">
                <button class="button primary active">Submit Inquiry</button>
            </div>
        </form>
    </div>
    <!-- /SVG CHECK -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>js/vendor/jquery-3.1.0.min.js"></script>
    <!-- Tooltipster -->
    <script src="<?php echo base_url(); ?>js/vendor/jquery.tooltipster.min.js"></script>
    <!-- Owl Carousel -->
    <script src="<?php echo base_url(); ?>js/vendor/owl.carousel.min.js"></script>
    <!-- Tweet -->
    <script src="<?php echo base_url(); ?>js/vendor/twitter/jquery.tweet.min.js"></script>
    <!-- xmAlerts -->
    <script src="<?php echo base_url(); ?>js/vendor/jquery.xmalert.min.js"></script>
    <!-- Side Menu -->
    <script src="<?php echo base_url(); ?>js/side-menu.js"></script>
    <!-- Home -->
    <script src="<?php echo base_url(); ?>js/home.js"></script>
    <!-- Tooltip -->
    <script src="<?php echo base_url(); ?>js/tooltip.js"></script>
    <!-- User Quickview Dropdown -->
    <script src="<?php echo base_url(); ?>js/user-board.js"></script>
    <!-- Home Alerts -->
    <!--    <script src="js/home-alerts.js"></script>-->
    <!-- Footer -->
    <script src="<?php echo base_url(); ?>js/jquery.countdown.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/script.js"></script>
    <script src="<?php echo base_url(); ?>js/footer.js"></script>

</body>

</html>
