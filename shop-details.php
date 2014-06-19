<?php
session_start();
include_once("Class/ProductoClass.php");
$User;
if(!isset($_SESSION['US'])){ $User = true;}
else{ $User=false;}
if(!isset ($_GET['modelo'])){
    echo('Seleccione un modelo');
}else{
   $objProducto = new Class_ProductoClass();
    $row =$objProducto->getListProductoModelo($_GET['modelo']);
    $rowProducto = $row->fetch_array();
}
?>
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
		<title> Shop Details - eCart Responsive HTML5 Template </title>
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
		<!-- revolution captions CSS -->
		<!--prettyPhoto-->
		<link href="vendors/prettyPhoto/prettyPhoto.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="vendors/rs/css/captions.css" type="text/css" />		
		<!--End of Page View Css Load for Individual page-->
		<!--accordion-->
		<link rel="stylesheet" type="text/css" href="vendors/accordion/liteaccordion.css">
		<link rel="stylesheet" type="text/css" href="vendors/accordion/accordion.css">
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
                        if($User == true){?>
                            <div class="login_register">
                                <ul>
                                    <li><a href="login.php" id="roxpopup" class="roxup-btn">Login</a>|</li>
                                    <li><a href="registration.php">Registrar</a></li>
                                </ul>
                            </div>
                        <?php }else{ ?>
                            <div class="login_register">
                                <img src="Imagenes/user/<?php echo $_SESSION['photo']?>.jpg"  width="24px"height="24px" alt=""/>
                                <span class=text-warning><?php echo $_SESSION['US'];?></span>|<a >Cerrar Session</a>
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
                            <p><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart (2)</a></p>
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
		<!-- Breadcrumb Section -->
		<section class="breadcrumb_section_area">
			<div class="breadcrumb_section">
				<div class="container main_bg">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="breadcrumb_menu">
								<ul class="custom_breadcrumb">
								  <li><a href="index.html">Home</a></li>
								  <li><a href="shop.html">Shop</a></li>
								  <li class="active"><a href="#">Shop Details</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="shop_section_area">
			<div class="shop_area">
				<div class="container main_bg">
					<div class="body_shadow">
						<div class="row">
							<div class="col-md-3">
								<div class="left_sidebar">
                                    <div class="featured_title shop_title">
                                        <h2 class="featured_header">
                                            <span>Categories</span>
                                        </h2>
                                    </div>

                                    <div class="category_item">
                                        <div class="panel-group panel_group_customize" id="accordion">
                                            <div class="panel panel-default panel_customize">
                                                <div class="panel-heading panel_heading_customize">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href=#">
                                                            <span class="pull-left plus"></span>
                                                        </a>  <a href="shop.php?id=all"> Mostrar Todo</a>

                                                    </h4>
                                                </div>
                                            </div>
                                            <?php
                                            $objCategoria = new Class_CategoriaClass();
                                            $resultMarca = $objCategoria->getIdCategoria();
                                            while($rowMarca = $resultMarca->fetch_array()){
                                                ?>
                                                <div class="panel panel-default panel_customize">
                                                    <div class="panel-heading panel_heading_customize">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $rowMarca['nombreMarca']; ?>">
                                                                <span class="pull-left plus"></span></a>
                                                            <a href="shop.php?id=<?php echo $rowMarca['idMarca'];?>"> <?php echo $rowMarca['nombreMarca']; ?></a>

                                                        </h4>
                                                    </div>
                                                    <div id="<?php echo $rowMarca['nombreMarca']; ?>" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="single_category_item">
                                                                <ul>
                                                                    <?php
                                                                    $objCategoria = new Class_CategoriaClass();
                                                                    $resultModelo = $objCategoria->getFkCategoria($rowMarca['idMarca']);
                                                                    while($rowModelo = $resultModelo->fetch_array()){
                                                                        ?>
                                                                        <li><a href="shop-details.php?modelo=<?php echo $rowModelo['idModelo'];?>"><?php echo $rowModelo['nombreModelo'];?></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
									
									<div class="featured_title shop_title">
										<h2 class="featured_header">			
											<span>Pricing Filter</span>
										</h2>
									</div>
									<div class="pricing_filter_area">
										<div id="slider"></div>
									</div>
								</div>
							</div>
							<!-- Our Shop details Area -->
							<div class="col-md-9">
								<div class="shop_details_area clearfix">
									<div class="col-lg-7 col-sm-7 col-xs-12">
										<div class="shop_details_slide">
											<div id="shop_details_carousel" class="carousel slide" data-ride="carousel">
												<ol class="custom_carousel_indicators">
													<li data-target="#shop_details_carousel" data-slide-to="0"><img src="Imagenes/producto/<?php echo $rowProducto['ImagenProducto']?>.png" alt="" height="78px" width="75px" /></li>
													<li data-target="#shop_details_carousel" data-slide-to="1"><img src="Imagenes/producto/<?php echo $rowProducto['ImagenProducto_1']?>.png" alt="" height="78px" width="75px" /></li>
													<li data-target="#shop_details_carousel" data-slide-to="2"><img src="Imagenes/producto/<?php echo $rowProducto['ImagenProducto_2']?>.png" alt="" height="78px" width="75px" /></li>
                                                </ol>
												
												<!-- Wrapper for slides -->
												<div class="carousel-inner shop_slider_inner">
													<div class="item shop_carousel_item text-center active">
														<img class="img-responsive" src="Imagenes/producto/<?php echo $rowProducto['ImagenProducto']?>.png"  alt="" />
													</div>
													<div class="item shop_carousel_item text-center">
														<img class="img-responsive" src="Imagenes/producto/<?php echo $rowProducto['ImagenProducto_1']?>.png" alt="" />
													</div>
													<div class="item shop_carousel_item text-center">
														<img class="img-responsive" src="Imagenes/producto/<?php echo $rowProducto['ImagenProducto_2']?>.png" alt="" />
													</div>

												</div>

													<!-- Controls -->
													<a class="left shop_details_carousel_control" href="#shop_details_carousel" data-slide="prev">
														<span> <i class="fa fa-angle-left"></i></span>
													</a>
													<a class="right shop_details_carousel_control" href="#shop_details_carousel" data-slide="next">
														<span> <i class="fa fa-angle-right"></i></span>
													</a>
											</div>
										</div>
									</div>
									<div class="col-lg-5 col-sm-5 col-xs-12">
										<div class="shop_product_description">
											<div class="product_des_title clearfix">
												<h2><?php echo $rowProducto['nombreMarca']." ".$rowProducto['nombreModelo'];?></h2>
											</div>
											<div class="product_des_content clearfix">
												<p>
                                                    <?php echo utf8_decode($rowProducto['descripcionProducto']);?>
												</p>
											</div>
											<!--<div class="product_des_feature clearfix">
												<ul>
													<li><i class="fa fa-check"></i> Lorem ipsum has erroribus</li>
													<li><i class="fa fa-check"></i> Comprehensam his in, semate turists</li>
													<li><i class="fa fa-check"></i> Lorem ipsum has erroribus vituperata</li>
												</ul>
											</div>--->
											<div class="product_price clearfix">
												<p>Precio: <span>S./<?php echo($rowProducto['precioVenta']); ?></span></p>
											</div>
											<div class="product_stock clearfix">
												<p>Stock <span>Disponible</span></p>
											</div>
											<div class="about_product clearfix">
												<!--<div class="product_size pull-left">
													<h4>Size</h4>
													<select>
														<option value="">Small</option>
														<option value="">Medium</option>
														<option value="">Big</option>
													</select>
												</div>-->
												<div class="product_color pull-left">
													<h4>Color</h4>
													<select>
														<option value="">Red</option>
														<option value="">Blue</option>
														<option value="">Yellow</option>
													</select>
												</div>
											</div>
											<div class="product_amount clearfix">
												
											</div>
											<div class="shop_des_add_to_cart clearfix">
												<a href="cart.php?id=<?php echo($rowProducto['IdProducto']); ?>"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
											</div>
										</div>
									</div>
								</div>
								<!-- Product Tab -->
								<div class="product_tab_area">
									<div class="featured_title shop_title clearfix">
										<h2 class="featured_header">			
											<span>Ficha del producto</span>
										</h2>
									</div>
									<div class="bs-example bs-example-tabs">
										<ul class="nav nav-tabs custom_shop_tab" id="myTab">
										  <li class="active"><a data-toggle="tab" href="#description">Caracteristicas</a></li>
										  <li class=""><a data-toggle="tab" href="#review">Especificaciones</a></li>
										</ul>
										<div class="tab-content shop_tab_content" id="myTabContent">
										  <div id="description" class="tab-pane fade active in">
											<p>
                                                <?php echo(utf8_decode($rowProducto['CaracteristicasProducto'])); ?>
											</p>
										  </div>
										  <div id="review" class="tab-pane fade">
                                              <p>
                                                  <?php echo(utf8_decode($rowProducto['EspecificacionesProducto'])); ?>
                                              </p>
										  </div>
										</div>
									</div>
								</div> <!-- end product tab -->
								<div class="related_product">
									<div class="featured_title related_shop_title clearfix">
										<h2 class="featured_header">			
											<span>Related Product</span>
										</h2>
									</div>
									<div id="related_product_carousel" class="carousel slide" data-ride="carousel">
										<!-- Wrapper for slides -->
										<div class="carousel-inner">
											<div class="item active">
												<div class="col-md-4 col-sm-6 col-xs-12">
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
												<div class="col-md-4 col-sm-6 col-xs-12">
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
												
												<div class="col-md-4 col-sm-6 col-xs-12">
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
												<div class="col-md-4 col-sm-6 col-xs-12">
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
												<div class="col-md-4 col-sm-6 col-xs-12">
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
												<div class="col-md-4 col-sm-6 col-xs-12">
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
											<a class="left carousel-control" href="#related_product_carousel" data-slide="prev">
												<span> <i class="fa fa-angle-left"></i></span>
											</a>
											<a class="right carousel-control" href="#related_product_carousel" data-slide="next">
												<span> <i class="fa fa-angle-right"></i></span>
											</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="footer">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="about_us">
                            <h2>ACERCA DE</h2>
                            <p>Quieres más información sobre los telefonos libres o tu pedido? Contactanos:</p>
                            <div class="phone-and-fax">
                                <p>Telefono: +02 555 (000) 4567</p>
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
                            <h2>CONTACTANOS</h2>
                            <ul>
                                <li><a href="#">Nuestras Tiendas</a></li>
                                <li><a href="#">Lugares de pago</a></li>
                                <li><a href="#">Expertos Smart</a></li>
                                <li><a href="#">Atención Telefónica</a></li>
                                <li><a href="#">Acerca de Nosotros</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="twitter_update">
                            <h2>TWEET UPDATE</h2>
                            <div class="single_tweet">
                                <p><a href="#">@ Angel Talledo:  Terminaremos el Proyecto?</a> <br />
                                    <em>about 20 minutes ago</em></p>
                            </div>
                            <div class="single_tweet">
                                <p><a href="#">@ Bryan Checa:  Con fe mi estimado Con fe!</a> <br />
                                    <em>about 20 minutes ago</em></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="flickr_photo_area">
                            <h2>GALERIA DE FOTOS</h2>
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
		<!-- accordion JS -->
		<script src="vendors/accordion/liteaccordion.jquery.js"></script>
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