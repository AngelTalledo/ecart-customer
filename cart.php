<?php
session_start();
include_once("Class/ProductoClass.php");

$objProducto = new Class_ProductoClass();
$User;
if(!isset($_SESSION['US'])){ $User = true;}
else{ $User=false;}
/*
 * Carrito de compras
 * */
if(isset($_SESSION['carrito'])){
    if(isset($_GET['id'])){
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for($i=0;$i<count($arreglo);$i++){
            if($arreglo[$i]['Id']== $_GET['id']){
                $encontro=true;
                $numero=$i;
            }
        }
        if($encontro==true){
            $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
            $_SESSION['carrito']=$arreglo;
        }else{
            $nombre="";
            $precio=0;
            $imagen="";
            $re = $objProducto->getListProductoId($_GET['id']);
            while ($f=$re->fetch_array()){
                $nombre=$f['nombreMarca'] ." ". $f['nombreModelo'];
                $precio=$f['precioVenta'];
                $imagen=$f['ImagenProducto'];
            }
            $datosNuevos=array('Id'=>$_GET['id'],
                'Nombre'=>$nombre,
                'Precio'=>$precio,
                'Imagen'=>$imagen,
                'Cantidad'=>1);

            array_push($arreglo, $datosNuevos);
            $_SESSION['carrito']=$arreglo;

        }
    }
}else{
    if(isset($_GET['id'])){
        $nombre="";
        $precio=0;
        $imagen="";
        $re=$objProducto->getListProductoId($_GET['id']);
        while($f=$re->fetch_array()) {
            $nombre=$f['nombreMarca']." ".$f['nombreModelo'];
            $precio=$f['precioVenta'];
            $imagen=$f['ImagenProducto'];
        }
        $arreglo[]=array('Id'=>$_GET['id'],
            'Nombre'=>$nombre,
            'Precio'=>$precio,
            'Imagen'=>$imagen,
            'Cantidad'=>1);
        $_SESSION['carrito']=$arreglo;
    }
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
		<title>Cart - eCart Responsive HTML5 Template </title>
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
								<h1><a href="index.php">E-CART</a> <span>Shopping Is Fun</span></h1>
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
                                    <img src="Imagenes/user/<?php echo $_SESSION['photo']?>.jpg" width="24px"height="24px" alt=""/>
                                    <span class=text-warning><?php echo $_SESSION['US'];?></span>|<a href="cerrar_sesion.php" >Cerrar Session</a>
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
									<p><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart (0)</a></p>
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
                                <li class="rox-submenu-item active"><a href="index.php"><i class="fa fa-home"></i></a></li>
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
								  <li><a href="index.php">Home</a></li>
								  <li class="active"><a href="#">Cart</a></li>
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
														<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
															<span class="pull-left plus"></span>
															Toys & Games 
														</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="single_category_item">
															<ul>
																<li><a href="#">New Games</a></li>
																<li><a href="#">Mad Monkey</a></li>
																<li><a href="#">Bad Cows</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											
											<div class="panel panel-default panel_customize">
												<div class="panel-heading panel_heading_customize">
													<h4 class="panel-title">
														<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
															<span class="pull-left plus"></span>
															Toys & Games 
														</a>
													</h4>
												</div>
												<div id="collapseTwo" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="single_category_item">
															<ul>
																<li><a href="#">New Games</a></li>
																<li><a href="#">Mad Monkey</a></li>
																<li><a href="#">Bad Cows</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											
											<div class="panel panel-default panel_customize">
												<div class="panel-heading panel_heading_customize">
													<h4 class="panel-title">
														<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
															<span class="pull-left plus"></span>
															Toys & Games 
														</a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="single_category_item">
															<ul>
																<li><a href="#">New Games</a></li>
																<li><a href="#">Mad Monkey</a></li>
																<li><a href="#">Bad Cows</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											
											<div class="panel panel-default panel_customize">
												<div class="panel-heading panel_heading_customize">
													<h4 class="panel-title">
														<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
															<span class="pull-left plus"></span>
															Toys & Games 
														</a>
													</h4>
												</div>
												<div id="collapseFour" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="single_category_item">
															<ul>
																<li><a href="#">New Games</a></li>
																<li><a href="#">Mad Monkey</a></li>
																<li><a href="#">Bad Cows</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
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
							<!-- Cart Area -->
							<div class="col-md-9">
								<div class="cart_area">
									<div class="featured_title shop_title">
										<h2 class="featured_header">			
											<span>Cart</span>
										</h2>
									</div>

									<hr class="cart_hr"/>
									<hr class="cart_hr"/>
									<div class="cart_details">
                                        <?php
                                        $total=0;
                                        if(isset($_SESSION['carrito'])){
                                        $datos=$_SESSION['carrito'];
                                        $total=0;?>
										<div class="table-responsive">
											<table class="table table-bordered">
												<tbody class="cart_product_table">
												  <tr>
													<td></td>
													<td>producto</td>
													<td>Precio</td>
													<td>Cantidad</td>

													<td>Sub Total</td>
												  </tr>
                                                  <?php
                                                      for($i=0;$i<count($datos);$i++){
                                                     ?>
												  <tr>
													<td>
														<div class="cart_item">
                                                            <a href="Imagenes/producto/<?php echo($datos[$i]['Imagen']);?>.png" class="prettyPhoto">
                                                                <img src="Imagenes/producto/<?php echo($datos[$i]['Imagen']);?>.png" width="50px" height="50px" alt="" />
                                                            </a>

														</div>
													</td>
													<td><?php echo $datos[$i]['Nombre'];?></td>
													<td> <?php echo $datos[$i]['Precio'];?></td>
													<td class="quantity_update">
                                                        <input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
                                                               data-precio="<?php echo $datos[$i]['Precio'];?>"
                                                               data-id="<?php echo $datos[$i]['Id'];?>"
                                                               class="cantidad">
                                                        <a href="#"><i class="fa fa-refresh"></i></a> <a href="#"><i class="fa fa-plus fa-rotate-45"></i></a>
													</td>
													<td><?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></td>
												  </tr>
                                                      <?php
                                                      $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
                                                  }

                                                  }else{
                                                      echo '<h2>No has añadido ningun producto</h2>';
                                                  }
                                                  echo '<h2 id="total">Total:'.$total.'</h2>';
                                                  if($total!=0){
                                                      echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>';
                                                  }

                                                  ?>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td></td>
                                                </tr>
												</tbody>
											</table>

										</div>
									</div>

									<hr class="cart_hr"/>
									
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
