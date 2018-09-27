<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/vendor/tooltipster.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/vendor/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.countdown.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/countdown-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/fastselect.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/vendor/bootstrap-datepicker3.standalone.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/responsive.css">
    <!-- favicon -->
    <link rel="icon" href="favicon.ico">
    <title>Imozayed | Home</title>
</head>

<body class="withoutLogin">
    <div class="RightMenuMain">
        <div class="RightMenuRelative">
            <div class="RightMenu">
                <div class="RightMenuLogo">
                    <div class="user-quickview">
                        <a href="#">
                            <div class="outer-ring">
                                <div class="inner-ring"></div>
                                <figure class="user-avatar">
                                    <img alt="avatar" src="<?php echo base_url(); ?>images/icons/user.png">
                                </figure>
                            </div>
                        </a>
                        <p class="user-name">Guest</p>

                    </div>
                    <div class="RightMenuClose">
                        <img src="<?php echo base_url(); ?>images/icons/close.png">
                    </div>
                </div>
                <h4>Auction</h4>
                <ul>
                    <li class="dropdown-item">
                        <div class="dropdown-triangle"></div>
                        <a href="search-product-listing.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/bid.png"></span> Live Sale</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="past-sale.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/past-bid.png"></span> Past sale</a>
                    </li>
                </ul>
                <h4>My Account</h4>
                <ul>
                    <li class="dropdown-item">
                        <a href="#LoginModal" data-toggle="modal"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/login.png"></span> Login</a>
                    </li>
                </ul>
                <h4>About</h4>
                <ul>
                    <li class="dropdown-item">
                        <a href="terms-and-conditions.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/notepad.png"></span> Terms & Conditions</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="about.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/info.png"></span> About Us</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="contact.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/phone-book.png"></span> Contact Us</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="faqs.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/help.png"></span> Help/FAQs</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/translate.png"></span> Language setting</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <!-- HEADER -->
	<?php
	$ac_categories = $this->common_model->getAllwhere('ac_categories',array('status'=>'0'));	
	?>
    <div class="header-wrap">
        <header>
            <!-- LOGO -->
            <a href="<?php echo base_url(); ?>">
                <figure class="logo wv_logo">
                    <img src="<?php echo base_url(); ?>images/logo.png" alt="logo">
                </figure>
            </a>
            <!-- /LOGO -->

            <!-- MOBILE MENU HANDLER -->
            <div class="mobile-menu-handler left primary">
                <img src="<?php echo base_url(); ?>images/pull-icon.png" alt="pull-icon">
            </div>
            <!-- /MOBILE MENU HANDLER -->

            <!-- LOGO MOBILE -->
            <a href="<?php echo base_url(); ?>">
                <figure class="logo-mobile">
                    <img src="<?php echo base_url(); ?>images/logo.png" alt="logo-mobile">
                </figure>
            </a>
            <!-- /LOGO MOBILE -->

            <!-- MOBILE ACCOUNT OPTIONS HANDLER -->
            <div class="mobile-account-options-handler right secondary">
                <span class="icon-user"></span>
            </div>
            <!-- /MOBILE ACCOUNT OPTIONS HANDLER -->

            <!-- USER BOARD -->
            <div class="user-board">

                <!-- ACCOUNT INFORMATION -->
                <div class="account-information">


                    <div class="account-settings-quickview">
                        <span class="icon-globe">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</span>

                        <!-- PIN -->
                        <!--<span class="pin soft-edged primary">49</span>
						<!-- /PIN -->

                        <!-- DROPDOWN NOTIFICATIONS -->
                        <ul class="dropdown notifications no-hover closed">
                            <!-- DROPDOWN ITEM -->
                            <li class="dropdown-item">
                                <div class="dropdown-triangle"></div>
                                <p class="title">
                                    <a href="item-v1.html"><span>English</span></a>
                                </p>
                            </li>
                            <li class="dropdown-item">
                                <div class="dropdown-triangle"></div>
                                <p class="title">
                                    <a href="item-v1.html"><span>Arabic</span></a>
                                </p>
                            </li>
                            <!-- /DROPDOWN ITEM -->
                        </ul>
                        <!-- /DROPDOWN NOTIFICATIONS -->
                    </div>
                </div>
                <!-- /ACCOUNT INFORMATION -->

                <!-- ACCOUNT ACTIONS -->
                <div class="account-actions">
                    <a href="#LoginModal" data-toggle="modal" class="button secondary">Login</a>
                </div>
                <!-- /ACCOUNT ACTIONS -->
            </div>
            <!-- /USER BOARD -->
        </header>
    </div>
    <!-- /HEADER -->
	
	
    <!-- SIDE MENU -->
    <div id="mobile-menu" class="side-menu left closed">
        <!-- SVG PLUS -->
        <svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
        <!-- /SVG PLUS -->

        <!-- SIDE MENU HEADER -->
        <div class="side-menu-header">
            <figure class="logo small">
                <img src="images/logo.png" alt="logo">
            </figure>
        </div>
        <!-- /SIDE MENU HEADER -->

        <!-- SIDE MENU TITLE -->
        <p class="side-menu-title">Main Links</p>
        <!-- /SIDE MENU TITLE -->

        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect interactive">
            <!-- MENU ITEM -->
            <li class="dropdown-item">
                <a href="index.html">Home</a>
            </li>
            <!-- /MENU ITEM -->

            <!-- MENU ITEM -->
            <!--
                    <li class="dropdown-item">
                        <a href="how-to-shop.html">Categories</a>
                    </li>
-->
            <li class="dropdown-item interactive">
                <a href="#">
                            Categories
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </a>

                <!-- INNER DROPDOWN -->
                <ul class="inner-dropdown">
                    <!-- INNER DROPDOWN ITEM -->
					<?php if(count($ac_categories)>0){ ?>
					<?php foreach($ac_categories as $ct){ ?>								
						<li class="dropdown-item">
							<a href="#"><?php echo $ct->name; ?></a>
						</li>
					<?php } ?>
					<?php } ?>
                <!--    <li class="inner-dropdown-item">
                        <a href="#">Property</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="search-product-listing.html">Vehicles</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="#">Electronics</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="#">Luxury</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="#">Kids & baby</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="#">Furnitures</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="#">Distinguished Plates</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="#">Others</a>
                    </li> -->
                </ul>
            </li>
            <!-- /MENU ITEM -->

            <!-- MENU ITEM -->
            <li class="dropdown-item">
                <a href="search-product-listing.html">Auctions</a>
            </li>
            <!-- /MENU ITEM -->

            <!-- MENU ITEM -->
            <li class="dropdown-item">
                <a href="contact.html">Contact Us</a>
            </li>
            <!-- /MENU ITEM -->

            <!-- MENU ITEM -->
            <li class="dropdown-item">
                <a href="#LoginModal" data-toggle="modal">Account</a>
            </li>
            <li class="dropdown-item">
                <a href="#LoginModal" data-toggle="modal">My Wallet</a>
            </li>
        </ul>
        <!-- /DROPDOWN -->
    </div>
    <!-- /SIDE MENU -->

    <!-- SIDE MENU -->
    <div id="account-options-menu" class="side-menu right closed">
        <!-- SVG PLUS -->
        <svg class="svg-plus">
			<use xlink:href="#svg-plus"></use>
		</svg>
        <!-- /SVG PLUS -->

        <!-- SIDE MENU HEADER -->
        <div class="side-menu-header">
            <!-- USER QUICKVIEW -->
            <div class="user-quickview">
                <!-- USER AVATAR -->
                <a href="#">
                    <div class="outer-ring">
                        <div class="inner-ring"></div>
                        <figure class="user-avatar">
                            <img src="<?php echo base_url(); ?>images/icons/user.png" alt="avatar">
                        </figure>
                    </div>
                </a>
                <!-- /USER AVATAR -->

                <!-- USER INFORMATION -->
                <p class="user-name">Guest</p>
                <!-- /USER INFORMATION -->
            </div>
            <!-- /USER QUICKVIEW -->
        </div>
        <!-- /SIDE MENU HEADER -->
        <ul class="dropdown dark hover-effect interactive">
            <li class="dropdown-item interactive">
                <a href="#">
                            Auction
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </a>

                <!-- INNER DROPDOWN -->
                <ul class="inner-dropdown">
                    <li class="inner-dropdown-item">
                        <a href="search-product-listing.html"> Live Sale</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="past-sale.html"> Past sale</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect interactive">
            <li class="dropdown-item interactive">
                <a href="#">
                    My Account
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </a>

                <!-- INNER DROPDOWN -->
                <ul class="inner-dropdown">
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="#LoginModal" data-toggle="modal">Login</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /DROPDOWN -->
        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect interactive">
            <li class="dropdown-item interactive">
                <a href="#">
                    About
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </a>

                <!-- INNER DROPDOWN -->
                <ul class="inner-dropdown">
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="terms-and-conditions.html">Term and Contditions</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="about.html">About Us</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="contact.html">Contact Us</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="faqs.html">Help/FAQs</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="#">Language setting</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /DROPDOWN -->
        <a href="#" class="button mt-10 medium secondary">Login</a>
    </div>
    <!-- /SIDE MENU -->

    <!-- MAIN MENU -->
    <div class="main-menu-wrap">
        <div class="menu-bar">
            <nav>
                <ul class="main-menu">
                    <!-- MENU ITEM -->
                    <li class="menu-item active">
                        <a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <!-- /MENU ITEM -->

                    <li class="menu-item interactive">
                        <a href="#">
                            Categories
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </a>

                        <!-- INNER DROPDOWN -->
                        <ul class="dropdown ">
                            <!-- INNER DROPDOWN ITEM -->
							<?php if(count($ac_categories)>0){ ?>
							<?php foreach($ac_categories as $ct){ ?>								
								<li class="dropdown-item">
									<a href="#"><?php echo $ct->name; ?></a>
								</li>
							<?php } ?>
							<?php } ?>
                        <!--    <li class="dropdown-item">
                                <a href="#">Property</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="search-product-listing.html">Vehicles</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Electronics</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Luxury</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Kids & baby</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Furnitures</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Distinguished Plates</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Others</a>
                            </li> -->
                        </ul>
                    </li>

                    <!-- MENU ITEM -->
                    <li class="menu-item">
                        <a href="search-product-listing.html">Auctions</a>
                    </li>
                    <!-- /MENU ITEM -->

                    <!-- MENU ITEM -->
                    <li class="menu-item">
                        <a href="<?php echo base_url('register'); ?>">Register</a>
                    </li>
                    <!-- /MENU ITEM -->

                    <!-- MENU ITEM -->
                    <li class="menu-item">
                        <a data-toggle="modal" href="#LoginModal">Account</a>
                    </li>
                    <li class="menu-item">
                        <a data-toggle="modal" href="#LoginModal">My Wallet</a>
                    </li>
                    <li class="menu-item mainMenuDrop">
                        <a href="#" class="icon-menu"></a>
                    </li>
                    <!-- /MENU ITEM -->


                </ul>
            </nav>
            <!--<form class="search-form">
				<input type="text" class="rounded" name="search" id="search_products" placeholder="Search products here...">
				<input type="image" src="images/search-icon.png" alt="search-icon">
			</form>-->
        </div>
    </div>
    <!-- /MAIN MENU -->

    