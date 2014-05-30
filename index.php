<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8">
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9">
<![endif]-->
<!--[if gt IE 9]>
<!-->
<html>
<!--
<![endif]-->
	<head>
		<meta charset="utf-8">
		<title> eCart Responsive HTML5 Template </title>
		<meta name="keywords" content="HTML5 Template"/>
		<meta name="description" content="eCart Responsive html5 Template">
		<meta name="author" content="http://themerox.com/">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="vendors/selectivizr/selectivizr.js">
		</script>
		<noscript>
			<link rel="stylesheet" href="css/iefall-back.css.css" />
		</noscript>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js">
		</script>
		<script src="js/respond.js">
		</script>
		<![endif]-->
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet" media="screen">
		<!-- Fontawsome -->
		<link href="css/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
		<!-- PT sans Google web font -->
		<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
		<!-- Menu CSS -->
		<link href="css/menu/menu.css" rel="stylesheet" media="screen">
		<link href="css/menu/menu-config.css" rel="stylesheet" media="screen">
		<link href="css/menu/menu-responsive.css" rel="stylesheet" media="screen">
		<!--Theme Panel CSS-->
		<link href="css/themes_panel.css" rel="stylesheet" media="screen">
		<!-- revolution CSS --> 
		<link rel="stylesheet" href="vendors/rs/css/settings.css" type="text/css" />
		<link rel="stylesheet" href="vendors/rs/css/captions.css" type="text/css" />	
		<!-- revolution captions CSS -->
		<!--prettyPhoto-->
		<link href="vendors/prettyPhoto/prettyPhoto.css" rel="stylesheet" media="screen">	
		<!--End of Page View Css Load for Individual page-->
		<!--Theme css-->
		<link href="css/theme.css" rel="stylesheet" media="screen">
		<!--preset-->
		<link href="css/presets/preset1.css" rel="stylesheet" media="screen" id="layoutstyle">
		<!-- responsive css -->
		<link href="css/responsive.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<header class="rox-header clearfix">
			<div class="box effect2">
				<div class="container">
					<div class="navbar_header_area clearfix">
						<div class="navbar-header">
							<div class="logo">
								<h1><a href="index.html">E-CART</a> <span>Shopping Is Fun</span></h1>
							</div>
						</div>

						<div class="header-right pull-right">
                            <?php
                            session_start();
                            if(!isset($_SESSION['US'])){?>
                                <div class="login_register">
                                    <ul>
                                        <li><a href="login.php" id="roxpopup" class="roxup-btn">Login</a>|</li>
                                        <li><a href="registration.php">Registrar</a></li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div class="login_register">

                                    <img src="Imagenes/user/<?php echo $_SESSION['US'] ?>.jpg" width="24px"height="24px" alt=""/>
                                    <span class="text-left"><?php echo $_SESSION['US'];?></span>|<a href="cerrar_sesion.php">Cerrar Session</a>
                                </div>
                            <?php }?>
							<div class="phone_number">
								<p>
									<i class="fa fa-phone"></i> 000-123-456
								</p>
							</div>
							<div id="rox-search" class="search pull-right">
								<form id="searchForm" action="#blank" method="post">
									<div class="input-group">									
										<input type="text" class="form-control search" name="search" id="search" value="Search..." onblur="if(this.value == '') { this.value='Search...'}" onfocus="if (this.value == 'Search...') {this.value=''}">
										<span class="input-group-btn">
											<button class="btn btn-default" type="button">
												<i class="fa fa-search"></i>
											</button>
										</span>
									</div>
								</form>
							</div>
							<div class="cart_amount pull-right">
								<p><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart (0)</a></p>
							</div>
						</div>
					</div>
					<div id="mobilemenu" class="mobile-menu"></div>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars">
						</i>
					</button>
                                        
					<div class="navbar-collapse nav-main-collapse collapse">
						<nav class="nav-main mega-menu main_menu">
							<ul class="nav nav-pills nav-main" id="rox-main-menu">
							<!-- Drop Down menu Home -->
								<li class="rox-submenu-item active"><a href="index.html"><i class="fa fa-home"></i></a></li>
								<!-- End Of Drop Down Menu Home -->
                                                                
								<?php 
                                                                require_once('Components/Config.conf');
                                                                $objMenuTemplate  = new Class_MenuTemplateClass();
                                                                $result  =  $objMenuTemplate->getMenuByFkMenu('_');
                                                                ?>
                                                                
                                                                <?php while($row = $result->fetch_array()){ ?>
                                                                <li class="dropdown rox-submenu-item"><a href="<?php  echo $row['urlMenu'];?>"><?php  echo $row['menuName'];?></a>
									<ul class="dropdown-menu">
                                                                            <?php $objMenuTemplate  = new Class_MenuTemplateClass();
                                                                $subitems  =  $objMenuTemplate->getMenuByFkMenu($row['pkMenuTemplate']);
                                                                 while($rowItems = $subitems->fetch_array()){
                                                                                ?>
										<div class="rox-menu-wrapper">
											<li>
												<a href="<?php  echo $rowItems['urlMenu'];?>">
													<?php  echo $rowItems['menuName'];?> </a>
											</li>
										</div>
                                                                 <?php } ?>
									</ul>
								</li>
                                                                <?php } ?>
                                                                
								
								
							
								<!-- End Of Sortcodes Menu -->
								
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>	<!-- End Header Section -->
		
		<!-- BEGIN THEME PANEL -->
		<div id="themes_panel">
			<div id="toggle_button">
				<a href="#"></a>
			</div>
			<div id="themes_menu">
				<h4 style="text-align:center;">Style Switcher</h4>
				<div class="segment">
					<h5>Color</h5>
					<ul class="theme cookie_layout_style">
						<li>
							<a style="background: #CE001A" title="presets/preset1" href="#"></a>
						</li>
						<li>
							<a style="background: #21A117" title="presets/preset2" href="#"></a>
						</li>
						<li>
							<a style="background: #0FF160" title="presets/preset3" href="#"></a>
						</li>
						<li>
							<a style="background: #FF0B46" title="presets/preset4" href="#"></a>
						</li>
						<li>
							<a style="background: #5786E7" title="presets/preset5" href="#"></a>
						</li>
						<li>
							<a style="background: #619223" title="presets/preset6" href="#"></a>
						</li>
						<li>
							<a style="background: #D35400" title="presets/preset7" href="#"></a>
						</li>
						<li>
							<a style="background: #ed1f24" title="presets/preset8" href="#"></a>
						</li>
						<li>
							<a style="background: #493375" title="presets/preset9" href="#"></a>
						</li>
						<li>
							<a style="background: #009CF5" title="presets/preset10" href="#"></a>
						</li>
						<li>
							<a style="background: #2DB5AA" title="presets/preset11" href="#"></a>
						</li>
						<li>
							<a style="background: #ED6B61" title="presets/preset12" href="#"></a>
						</li>
						<li>
							<a style="background: #07ad87" title="presets/preset13" href="#"></a>
						</li>
						<li>
							<a style="background: #2DCC70" title="presets/preset14" href="#"></a>
						</li>
						<li>
							<a style="background: #FFC406" title="presets/preset15" href="#"></a>
						</li>
						<li>
							<a style="background: #FF5400" title="presets/preset16" href="#"></a>
						</li>
						<li>
							<a style="background: #EE82EE" title="presets/preset17" href="#"></a>
						</li>
						<li>
							<a style="background: #9882F6" title="presets/preset18" href="#"></a>
						</li>
					</ul>
				</div>

				<div class="segment">
					<div id="reset">
						<a href="#" class="btn reset">Reset</a>
					</div>
				</div>
			</div>
		</div>
		<!-- END THEME PANEL -->
		
		<section class="slider_area clearfix">
			<div class="container main_bg">
				<div class="row">
					<div class="slider">
						<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;padding:0px;margin-top:0px;margin-bottom:0px;max-height:650px;direction:ltr;">
							<div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:650px;height:650px;">
							<ul class="rev_slide">
									<!-- Slide One -->
									<li data-transition="turnoff" data-slotamount="7" data-masterspeed="300" ><img src="images/none.png" alt="images none" />
										<div class="tp-caption slider-heading lft"  
											 data-x="100" 
											 data-y="150" 
											 data-speed="1500" 
											 data-start="800" 
											 data-easing="easeOutQuad"  > <h1>Our Template Featuring</h1></div>
			
										<div class="tp-caption lfl"  
											 data-x="100" 
											 data-y="250" 
											 data-speed="1700" 
											 data-start="800" 
											 data-easing="easeOutQuad" ><p class="sub_heading">THE TASTE OF GOOD DESIGN</p></div>
										
										<div class="tp-caption randomrotate"  
											 data-x="100" 
											 data-y="320" 
											 data-speed="1400" 
											 data-start="1400" 
											 data-easing="easeInQuint"  ><p class="slider_content">Lorem ipsum dolor sit amet, consectetuer adio plastic printing <br />spcing elit, sed diam nonu make me wild third personal point of<br /> home book new. era of success</p></div>
										
														
										<div class="tp-caption lfb"  
											 data-x="100" 
											 data-y="420" 
											 data-speed="1000" 
											 data-start="1700" 
											 data-easing="easeOutExpo"  ><a href='#' class="learnmore">Learn More</a></div>
											 
										<div class="tp-caption earth lft"  
											 data-x="960" 
											 data-y="100" 
											 data-speed="700" 
											 data-start="500" 
											 data-easing="easeOutQuad"  ><img class="" src="images/slider/slider-1/robot.png" alt="">
										</div>

										<div class="tp-caption lfb"  
											 data-x="850" 
											 data-y="250" 
											 data-speed="1500" 
											 data-start="500" 
											 data-easing="easeOutQuad"  ><img class="" src="images/slider/slider-1/headphone.png" alt="">
										</div>

									</li>
									
									<!-- Slide Two -->
									
									<li data-transition="turnoff" data-slotamount="7" data-masterspeed="300" ><img src="images/none.png" alt="images none" />
										<div class="tp-caption slider-heading lft"  
											 data-x="100" 
											 data-y="100" 
											 data-speed="1500" 
											 data-start="800" 
											 data-easing="easeInOutBounce"  > <h1 class="discount">20%</h1></div>
			
										<div class="tp-caption lfl"  
											 data-x="100" 
											 data-y="250" 
											 data-speed="1700" 
											 data-start="800" 
											 data-easing="easeInOutBounce" ><p class="sub_heading">THE TASTE OF GOOD DESIGN</p></div>
										
										<div class="tp-caption randomrotate"  
											 data-x="100" 
											 data-y="320" 
											 data-speed="1400" 
											 data-start="1400" 
											 data-easing="easeInOutBounce"  ><p class="slider_content">Lorem ipsum dolor sit amet, consectetuer adio plastic printing <br />spcing elit, sed diam nonu make me wild third personal point of<br /> home book new. era of success</p></div>
										
														
										<div class="tp-caption lfb"  
											 data-x="100" 
											 data-y="420" 
											 data-speed="1000" 
											 data-start="1700" 
											 data-easing="easeInOutBounce"  ><a href='#' class="learnmore">Learn More</a></div>
											 
										<div class="tp-caption lfr"  
											 data-x="760" 
											 data-y="200" 
											 data-speed="700" 
											 data-start="500" 
											 data-easing="easeInBounce"
											 data-endeasing="easeOutBack" ><img class="" src="images/slider/slider-2/car.png" alt="">
										</div>

										<div class="tp-caption lfb"  
											 data-x="1030" 
											 data-y="400" 
											 data-speed="1500" 
											 data-start="500" 
											 data-easing="easeOutQuad"  ><img class="" src="images/slider/slider-2/controlar.png" alt="">
										</div>
									</li>	
									<!-- Slide Three -->
									<li data-transition="turnoff" data-slotamount="1" data-masterspeed="1" ><img src="images/none.png" alt="images none" />
										<div class="tp-caption slider-heading lft"  
											 data-x="100" 
											 data-y="150" 
											 data-speed="1500" 
											 data-start="800" 
											 data-easing="easeInCirc"  > <h1>Our Template Featuring</h1></div>
			
										<div class="tp-caption lfl"  
											 data-x="100" 
											 data-y="250" 
											 data-speed="1700" 
											 data-start="800" 
											 data-easing="easeInCirc" ><p class="sub_heading">THE TASTE OF GOOD DESIGN</p></div>
										
										<div class="tp-caption randomrotate"  
											 data-x="100" 
											 data-y="320" 
											 data-speed="1400" 
											 data-start="1400" 
											 data-easing="easeInCirc"  ><p class="slider_content">Lorem ipsum dolor sit amet, consectetuer adio plastic printing <br />spcing elit, sed diam nonu make me wild third personal point of<br /> home book new. era of success</p></div>
										
														
										<div class="tp-caption lfb"  
											 data-x="100" 
											 data-y="420" 
											 data-speed="1000" 
											 data-start="1700" 
											 data-easing="easeInCirc"  ><a href='#' class="learnmore">Learn More</a></div>
										
										<div class="tp-caption lft"  
											 data-x="850" 
											 data-y="150" 
											 data-speed="1500" 
											 data-start="500" 
											 data-easing="easeInBounce"  ><img class="" src="images/slider/slider-3/pc.png" alt="">
										</div>										
										
										<div class="tp-caption earth lfl"  
											 data-x="850" 
											 data-y="215" 
											 data-speed="700" 
											 data-start="500" 
											 data-easing="easeInBounce"  ><img class="" src="images/slider/slider-3/tab.png" alt="">
										</div>

										<div class="tp-caption lfr"  
											 data-x="1260" 
											 data-y="300" 
											 data-speed="1500" 
											 data-start="500" 
											 data-easing="easeInBounce"  ><img class="" src="images/slider/slider-3/mobile.png" alt="">
										</div>
									</li>
									
									<!-- Slide Four -->
									<li data-transition="turnoff" data-slotamount="1" data-masterspeed="1" ><img src="images/none.png" alt="images none" />
										<div class="tp-caption slider-heading lft"  
											 data-x="100" 
											 data-y="150" 
											 data-speed="1500" 
											 data-start="800" 
											 data-easing="easeInCirc"  > <h1>Our Template Featuring</h1></div>
			
										<div class="tp-caption lfl"  
											 data-x="100" 
											 data-y="250" 
											 data-speed="1700" 
											 data-start="800" 
											 data-easing="easeInCirc" ><p class="sub_heading">THE TASTE OF GOOD DESIGN</p></div>
										
										<div class="tp-caption randomrotate"  
											 data-x="100" 
											 data-y="320" 
											 data-speed="1400" 
											 data-start="1400" 
											 data-easing="easeInCirc"  ><p class="slider_content">Lorem ipsum dolor sit amet, consectetuer adio plastic printing <br />spcing elit, sed diam nonu make me wild third personal point of<br /> home book new. era of success</p></div>
										
														
										<div class="tp-caption lfb"  
											 data-x="100" 
											 data-y="420" 
											 data-speed="1000" 
											 data-start="1700" 
											 data-easing="easeInCirc"  ><a href='#' class="learnmore">Learn More</a></div>
										
										<div class="tp-caption lft"  
											 data-x="1050" 
											 data-y="150" 
											 data-speed="1500" 
											 data-start="500" 
											 data-easing="easeInBounce"  ><img class="" src="images/slider/slider-4/1.png" alt="">
										</div>										
										
										<div class="tp-caption earth lfl"  
											 data-x="990" 
											 data-y="350" 
											 data-speed="1500" 
											 data-start="500" 
											 data-easing="easeInBounce"  ><img class="" src="images/slider/slider-4/2.png" alt="">
										</div>
									</li>
									
									<!-- Slide Five -->
									
									<li data-transition="turnoff" data-slotamount="7" data-masterspeed="300" ><img src="images/none.png" alt="images none" />
										<div class="tp-caption slider-heading lft"  
											 data-x="100" 
											 data-y="100" 
											 data-speed="1500" 
											 data-start="800" 
											 data-easing="easeInOutBounce"  > <h1 class="discount">20%</h1></div>
			
										<div class="tp-caption lfl"  
											 data-x="100" 
											 data-y="250" 
											 data-speed="1700" 
											 data-start="800" 
											 data-easing="easeInOutBounce" ><p class="sub_heading">THE TASTE OF GOOD DESIGN</p></div>
										
										<div class="tp-caption randomrotate"  
											 data-x="100" 
											 data-y="320" 
											 data-speed="1400" 
											 data-start="1400" 
											 data-easing="easeInOutBounce"  ><p class="slider_content">Lorem ipsum dolor sit amet, consectetuer adio plastic printing <br />spcing elit, sed diam nonu make me wild third personal point of<br /> home book new. era of success</p></div>
										
														
										<div class="tp-caption lfb"  
											 data-x="100" 
											 data-y="420" 
											 data-speed="1000" 
											 data-start="1700" 
											 data-easing="easeInOutBounce"  ><a href='#' class="learnmore">Learn More</a></div>
											 
										<div class="tp-caption lfr"  
											 data-x="860" 
											 data-y="200" 
											 data-speed="700" 
											 data-start="500" 
											 data-easing="easeInBounce"
											 data-endeasing="easeOutBack" ><img class="" src="images/slider/slider-5/1.png" alt="">
										</div>

										<div class="tp-caption lfb"  
											 data-x="1030" 
											 data-y="400" 
											 data-speed="1500" 
											 data-start="500" 
											 data-easing="easeOutQuad"  ><img class="" src="images/slider/slider-5/2.png" alt="">
										</div>
									</li>
								</ul>
								<div class="tp-bannertimer tp-bottom"></div>					
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- /end revolution slider -->
		<!-- Featured Product section -->
		<section class="featured_section_area clearfix">
			<div class="container main_bg">
				<div class="row">
					<div class="featured_title">
						<h2 class="featured_header">			
							<span>New Product</span>
						</h2>
					</div>
					<div class="featured_content_area">
						<div id="featured_carousel" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="new_product_banner">
												<p>N <br />E <br />W</p>
											</div>
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
													<img src="images/featured-img/1.png" alt="" />
												</a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
													<img src="images/featured-img/1.png" alt="" />
												</a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="hot_product_banner">
												<p>H <br />O <br />T</p>
											</div>
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="new_product_banner">
												<p>N <br />E <br />W</p>
											</div>
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="hot_product_banner">
												<p>H <br />O <br />T</p>
											</div>
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#featured_carousel" data-slide="prev">
									<span> <i class="fa fa-angle-left"></i></span>
								</a>
								<a class="right carousel-control" href="#featured_carousel" data-slide="next">
									<span> <i class="fa fa-angle-right"></i></span>
								</a>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- End Featured Section -->
		
		<!-- New Product section -->
		<section class="product_section_area">
			<div class="container main_bg">
				<div class="row">
					<div class="featured_title">
						<h2 class="featured_header">			
							<span>New Product</span>
						</h2>
					</div>
					<div class="product_content_area">
						<div id="product_carousel" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="new_product_banner">
												<p>N <br />E <br />W</p>
											</div>
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="hot_product_banner">
												<p>H <br />O <br />T</p>
											</div>
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="new_product_banner">
												<p>N <br />E <br />W</p>
											</div>
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="single_featured_post">
											<div class="hot_product_banner">
												<p>H <br />O <br />T</p>
											</div>
											<div class="featured_image">
												<a href="images/featured-img/1.png" class="prettyPhoto">
												<img src="images/featured-img/1.png" alt="" /></a>
											</div>
											<div class="featured_content">
												<div class="content_title">
													<a href="#"><h2>OPTIMUS PRIME</h2></a>
												</div>
												<div class="price">
													<p>$200.00</p>
												</div>
												<div class="about_product">
													<div class="add-to-cart">
														<a href="shop-details.html"><i class="fa fa-shopping-cart"></i>
														<p>Add to Cart</p></a>
													</div>
													<div class="view-details">
														<a href="shop-details.html"><i class="fa fa-eye"></i>
														<p>View Details</p></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#product_carousel" data-slide="prev">
									<span> <i class="fa fa-angle-left"></i></span>
								</a>
								<a class="right carousel-control" href="#product_carousel" data-slide="next">
									<span> <i class="fa fa-angle-right"></i></span>
								</a>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- New Product Section -->
		
		<section class="client_section_area">
			<div class="container client_section main_bg">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="client_info_area">
							<div class="client_info">
								<a href="#"><img src="images/client/1.png" alt="" /></a>
							</div>
							<div class="client_info">
								<a href="#"><img src="images/client/2.png" alt="" /></a>
							</div>
							<div class="client_info">
								<a href="#"><img src="images/client/3.png" alt="" /></a>
							</div>
							<div class="client_info">
								<a href="#"><img src="images/client/4.png" alt="" /></a>
							</div>
							<div class="client_info">
								<a href="#"><img src="images/client/5.png" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--  -->
		<footer class="footer_area">
			<div class="container">
				<div class="row">
					<div class="footer">
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="about_us">
								<h2>ACERCA DE</h2>
								<p>Lorem ipsum has erroribus is a design  no color vituperata ex, bonorum depends an scale you used compre.</p>
								<div class="phone-and-fax">
									<p>Phone: +02 555 (000) 4567</p>
									<p>Fax: +0223 666 (333) 1234</p>
								</div>
								<div class="social_area">
									<ul>
										<li><a href="#"><i class="fa fa-facebook facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus google"></i></a></li>
										<li><a href="#"><i class="fa fa-flickr flickr"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest pinterest"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="useful_link">
								<h2>USEFUL LINK</h2>
								<ul>
									<li><a href="#">About Joomla Website</a></li>
									<li><a href="#">Custome Module Design</a></li>
									<li><a href="#">Administrator Link Show</a></li>
									<li><a href="#">Themerox History Info</a></li>
									<li><a href="#">About Joomla Site</a></li>
									<li><a href="#">Custome Module Support</a></li>
									<li><a href="#">Administrator Link</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="twitter_update">
								<h2>TWEET UPDATE</h2>
								<div class="single_tweet">
									<p><a href="#">@ John Dow:  Lorem ipsum has erroribus  design  no color vituperata</a> <br />
									<em>about 20 minutes ago</em></p>
								</div>
								<div class="single_tweet">
									<p><a href="#">@ John Dow:  Lorem ipsum has erroribus  design  no color vituperata</a> <br />
									<em>about 20 minutes ago</em></p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12">
							<div class="flickr_photo_area">
								<h2>FLICKR PHOTO</h2>
								<div class="fliker-photo">
									<a href="images/01.jpg" class="prettyPhoto[gal2]">
										<img src="images/01.jpg" class="img-responsive" alt="Responsive image">
									</a>
									<a href="images/02.jpg" class="prettyPhoto[gal2]">
										<img src="images/02.jpg" class="img-responsive" alt="Responsive image">
									</a>
									<a href="images/04.jpg" class="prettyPhoto[gal2]">
										<img src="images/03.jpg" class="img-responsive" alt="Responsive image">
									</a>
									<a href="images/04.jpg" class="prettyPhoto[gal2]">
										<img src="images/04.jpg" class="img-responsive" alt="Responsive image">
									</a>
									<a href="images/05.jpg" class="prettyPhoto[gal2]">
										<img src="images/05.jpg" class="img-responsive" alt="Responsive image">
									</a>
									<a href="images/06.jpg" class="prettyPhoto[gal2]">
										<img src="images/06.jpg" class="img-responsive" alt="Responsive image">
									</a>
									<a href="images/02.jpg" class="prettyPhoto[gal2]">
										<img src="images/02.jpg" class="img-responsive" alt="Responsive image">
									</a>
									<a href="images/04.jpg" class="prettyPhoto[gal2]">
										<img src="images/04.jpg" class="img-responsive" alt="Responsive image">
									</a>
									<a href="images/01.jpg" class="prettyPhoto[gal2]">
										<img src="images/01.jpg" class="img-responsive" alt="Responsive image">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_bottom_area">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="copyright_text pull-left">
								<p>Copyright &copy; <a href="#">ThemeRox</a>. All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="payment_getway pull-right">
								<ul>
									<li><a href="#"><img src="images/paypal.png" alt="Paypal" /></a></li>
									<li><a href="#"><img src="images/mastercard.png" alt="Master Card" /></a></li>
									<li><a href="#"><img src="images/cirrus.png" alt="Cirrus" /></a></li>
									<li><a href="#"><img src="images/visa.png" alt="Visa Card" /></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer> <!-- end footer section -->
		<!-- footer bottom area -->
		
		
		<!-- Core required JS files -->
		<script src="js/jquery.js"></script>
		<!-- bootstrap JS file -->
		<script src="js/bootstrap.js"></script>
		<!-- modernizr JS file -->
		<script src="js/modernizr.custom.97074.js"></script>
		<!--Jquery Mobile Menu Will load when media screen less than 640-->
		<script type="text/javascript" src="vendors/jquery.mobilemenu/jquery.mobilemenu.js"></script>
		<!--Jquery Mobile Menu-->
		<script type="text/javascript" src="js/menu.js"></script>
		<!-- revolution slider JS -->
		<script src="vendors/rs/js/jquery.plugins.min.js" type="text/javascript"></script>
		<script src="vendors/rs/js/jquery.revolution.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/pageview/revusliderpages.js"></script>
		<!--Theme Panel Scrip-->
		<script type="text/javascript" src="js/themes_panel.js"></script>
		<!-- pretty photo JS -->
		<script src="vendors/prettyPhoto/jquery.prettyPhoto.js" type="text/javascript"></script>
		<!-- Plugin JS -->
		<script src="js/plugins.js" type="text/javascript"></script>
		<!-- common theme JS -->
		<script src="js/theme.js"></script>
		<script type="text/javascript">
		  $(document).ready(function(){
			$("a[class^='prettyPhoto']").prettyPhoto();
		  });
		</script>
		<!--End of Page wise js load for individual page only-->
		<!--Google Analytic Code remember to re-configure according to your need-->
		<!-- Google Analytics: Change UA-XXXXX-X to be your google analytic ID. For more information go to http://www.google.com/analytics/ . After all this remove comment to enable script tag.
		<script>
		(function(b,o,i,l,e,r){
		b.GoogleAnalyticsObject=l;
		b[l]||(b[l]=
		function(){
		(b[l].q=b[l].q||[]).push(arguments)}
		);
		b[l].l=+new Date;
		e=o.createElement(i);
		r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}
		(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');
		ga('send','pageview');
		</script>
		-->
		<!--End of Google Analytic Code remember to re-configure according to your need-->
	</body>
</html>