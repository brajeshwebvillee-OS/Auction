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

<body>
    <div class="RightMenuMain">
        <div class="RightMenuRelative">
            <div class="RightMenu">
                <div class="RightMenuLogo">
                    <div class="user-quickview">
                        <a href="author-profile.html">
                            <div class="outer-ring">
                                <div class="inner-ring"></div>
                                <figure class="user-avatar">
                                    <img alt="avatar" src="<?php echo base_url(); ?>images/avatars/avatar_01.jpg">
                                </figure>
                            </div>
                        </a>
                        <p class="user-name">Johnny Fisher</p>

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
                    <li class="dropdown-item">
                        <a href="post-an-item.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/post-item.png"></span> Post an Item</a>
                    </li>
                </ul>
                <h4>My Account</h4>
                <ul>
                    <li class="dropdown-item">
                        <a href="edit-profile.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/edit.png"></span> Edit Profile</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="recent-bids.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/bid.png"></span> My Recent Bids</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="past-bid.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/past-bid.png"></span> My Past Bids</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="watchlist.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/heart.png"></span> Wishlist</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="my-cart.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/my-cart.png"></span> My Cart</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="my-purchases.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/my-purchases.png"></span> My Purchases</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="seller-active-bids.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/my-items.png"></span> My Items</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="increase-deposit-bidding-limit.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/wallet.png"></span> My Wallet</a>
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
                    <li class="dropdown-item">
                        <a href="my-account.html"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/locked.png"></span> Change Password</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#"><span class="rightMenuitemImage"><img src="<?php echo base_url(); ?>images/icons/logout.png"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- HEADER -->
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
            <a href="index.html">
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
                <!-- USER QUICKVIEW -->
                <div class="user-quickview">
                    <!-- USER AVATAR -->
                    <a href="author-profile.html">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <figure class="user-avatar">
                                <img src="<?php echo base_url(); ?>images/avatars/avatar_01.jpg" alt="avatar">
                            </figure>
                        </div>
                    </a>
                    <!-- /USER AVATAR -->

                    <!-- USER INFORMATION -->
                    <p class="user-name">Johnny Fisher</p>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
						<use xlink:href="#svg-arrow"></use>
					</svg>
                    <!-- /SVG ARROW -->
                    <p class="user-money">$745.00</p>
                    <!-- /USER INFORMATION -->

                    <!-- DROPDOWN -->
                    <ul class="dropdown small hover-effect closed">
                        <li class="dropdown-item">
                            <div class="dropdown-triangle"></div>
                            <a href="my-account.html">Profile</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="my-account.html#NotificationSetting">Account Settings</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="my-purchases.html">Your Purchases</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="user-dashboard.html">Dashboard</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="post-an-item.html">Upload Item</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="seller-active-bids.html">Manage Items</a>
                        </li>
                    </ul>
                    <!-- /DROPDOWN -->
                </div>
                <!-- /USER QUICKVIEW -->

                <!-- ACCOUNT INFORMATION -->
                <div class="account-information">
                    <div class="account-cart-quickview">
                        <span class="icon-bell">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</span>

                        <!-- PIN -->
                        <span class="pin soft-edged secondary">7</span>
                        <!-- /PIN -->

                        <!-- DROPDOWN CART -->

                        <!-- /DROPDOWN CART -->
                        <ul class="NotificationList dropdown cart closed">
                            <li>
                                <div class="dropdown-triangle"></div>
                                <a class="clearfix" href="#">
                            <img src="<?php echo base_url(); ?>images/icons/money.png">
                            <span>Added $1000 USD <br> <strong>Transaction id: </strong>45692734</span>
                        </a>
                            </li>
                            <li>
                                <a class="clearfix" href="#">
                            <img src="<?php echo base_url(); ?>images/icons/megaphone.png">
                            <span>Christmas Offer: Get 10% discounts on all purchased products.</span>
                        </a>
                            </li>
                            <li>
                                <a class="clearfix" href="#">
                            <img src="<?php echo base_url(); ?>images/icons/money.png">
                            <span>Added $3000 USD <br> <strong>Transaction id: </strong>45875732</span>
                        </a>
                            </li>
                            <li>
                                <a class="clearfix" href="#">
                            <img src="<?php echo base_url(); ?>images/icons/money.png">
                            <span>Added $1500 USD <br> <strong>Transaction id: </strong>45232731</span>
                        </a>
                            </li>

                        </ul>
                    </div>

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
                    <a href="post-an-item.html" class="button primary">Become a Seller</a>
                    <a href="index-without-login.html" class="button secondary">Logout</a>
                </div>
                <!-- /ACCOUNT ACTIONS -->
            </div>
            <!-- /USER BOARD -->
        </header>
    </div>
    <!-- /HEADER -->
	<?php
	$ac_categories = $this->common_model->getAllwhere('ac_categories',array('status'=>'0'));	
	?>


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
                <a href="<?php echo base_url(); ?>">Home</a>
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
                <a href="my-account.html">Account</a>
            </li>
            <li class="dropdown-item">
                <a href="increase-deposit-bidding-limit.html">My Wallet</a>
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
                <a href="author-profile.html">
                    <div class="outer-ring">
                        <div class="inner-ring"></div>
                        <figure class="user-avatar">
                            <img src="<?php echo base_url(); ?>images/avatars/avatar_01.jpg" alt="avatar">
                        </figure>
                    </div>
                </a>
                <!-- /USER AVATAR -->

                <!-- USER INFORMATION -->
                <p class="user-name">Johnny Fisher</p>
                <p class="user-money">$745.00</p>
                <!-- /USER INFORMATION -->
            </div>
            <!-- /USER QUICKVIEW -->
        </div>
        <!-- /SIDE MENU HEADER -->

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
                        <a href="#">Property</a>
                    </li>

                    <li class="inner-dropdown-item">
                        <a href="my-account.html">Profile</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="my-account.html#NotificationSetting">Account Settings</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="my-purchases.html">Your Purchases</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="user-dashboard.html">Dashboard</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="post-an-item.html">Upload Item</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="seller-active-bids.html">Manage Items</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- DROPDOWN -->
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
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="search-product-listing.html">Live Sale</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="past-sale.html">Past Sale</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="post-an-item.html">Post an Item</a>
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
                        <a href="edit-profile.html">Edit Profile</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="recent-bids.html">My Recent Bids</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="past-bid.html">My Past Bids</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="watchlist.html">Wishlist</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="my-cart.html">My Cart</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="my-purchases.html">My Purchases</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="seller-active-bids.html">My Item</a>
                    </li>
                    <li class="inner-dropdown-item">
                        <a href="increase-deposit-bidding-limit.html">My Wallet</a>
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
                    <li class="inner-dropdown-item">
                        <a href="my-account.html">Change Password</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /DROPDOWN -->

        <a href="#" class="button medium secondary">Logout</a>
        <a href="post-an-item.html" class="button medium primary active">Become a Seller</a>
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

                    <!-- MENU ITEM -->
                    <!--
                    <li class="menu-item">
                        <a href="how-to-shop.html">Categories</a>
                    </li>
-->
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
                         <!--   <li class="dropdown-item">
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
                    <!-- /MENU ITEM -->

                    <!-- MENU ITEM -->
                    <li class="menu-item">
                        <a href="search-product-listing.html">Auctions</a>
                    </li>
                    <!-- /MENU ITEM -->

                    <!-- MENU ITEM -->
                    <li class="menu-item">
                        <a href="contact.html">Contact Us</a>
                    </li>
                    <!-- /MENU ITEM -->

                    <!-- MENU ITEM -->
                    <li class="menu-item">
                        <a href="my-account.html">Account</a>
                    </li>
                    <li class="menu-item">
                        <a href="increase-deposit-bidding-limit.html">My Wallet</a>
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

