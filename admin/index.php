<?php
	ob_start();
	require '../classes/session.php';
	session::checkSession();
?>
<?php
	//require '../config/config.php';
	//require '../config/database.php';
	require '../classes/format.php';
	require '../classes/category.php';
	require '../classes/product.class.php';
	require '../classes/function.class.php';
	require '../classes/cart.class.php';
	
	$db		= new Database();
	$fm		= new Format();
	$cat	= new Category();
	$pd		= new Product();
	$os		= new Others();
	$ct 	= new Cart();
	
?>
<!DOCTYPE html>
<html>
<!-- Wrap all page content here -->
	  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">

		<title>
			<?php
				if(isset($_GET['page'])){
					$title = $_GET['page'];
					echo $title.' | Demo';
				}else{
					echo 'Home | Demo';
				}
			?>
		</title>

		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/animate.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/prettyPhoto.css"/>
		<link rel="stylesheet" href="css/responsive.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="css/select.bootstrap.min.css">
		<link rel="stylesheet" href="css/touchTouch.css">
		<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
	</head>

	<body>
		<div id="wrap">
			
			<!-- Header -->
			<header>
				<div class="container-fluid">
					<div class="container-fluid-inside-header">
						<div class="row">
							<div class="col-sm-4">
								<div class="header-info">
									<ul>
										<li><a href="index.php?page=user-profile"><i class="fa fa-envelope"></i> <?php echo Session::get('email');?></a></li>
										<li><a href="../index.php" target="_blank"> || Preview Site</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4">
								<ul class="user-info">
									<li><a href="index.php?page=user-profile"><i class="fa fa-user"></i> Hello <?php echo Session::get('controlerName');?></a></li>
									<li><a href="?action=logout"> || Logout</a></li>
								</ul>
							</div>
							<?php
								if(isset($_GET['action']) && $_GET['action'] =="logout"){
									Session:: destroy();
								}
							?>
						</div>
					</div>
				</div>
			</header>
			<!--## Header -->
			
			<!-- Fixed navbar -->
			<!-- Static navbar -->
			<nav class="navbar navbar-default navbar-static-top" id="nav">
				<div class="container-fluid">
					<div class="container-fluid-inside-navbar">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-animations="fadeInDown fadeInLeft fadeInUp fadeInRight" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php"></a>
						</div>
						<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li <?php if(isset($_GET['page'])){ }else{ echo 'class="active"'; } ?> ><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
								<li <?php if(isset($_GET['page'])){ $navAactive = $_GET['page']; if($navAactive == 'show-order'){ echo 'class="active"'; } } ?> ><a href="index.php?page=show-order"><i class="fa fa-shopping-cart"></i> View Order</a></li>
								<li <?php if(isset($_GET['page'])){ $navAactive = $_GET['page']; if($navAactive == 'show-email'){ echo 'class="active"'; } } ?> ><a href="index.php?page=show-email"><i class="fa fa-envelope"></i> Inbox</a></li>
								<li <?php if(isset($_GET['page'])){ $navAactive = $_GET['page']; if($navAactive == 'user-profile'){ echo 'class="active"'; } } ?> ><a href="index.php?page=user-profile"><i class="fa fa-user"></i> User Profile</a></li>
								<li <?php if(isset($_GET['page'])){ $navAactive = $_GET['page']; if($navAactive == 'signup'){ echo 'class="active"'; } } ?> ><a href="index.php?page=signup"><i class="fa fa-sign-in"></i>Sign Up</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li style="margin-right:15px;"><a href="../index.php" target="_blank"><i class="fa fa-eye"></i> Preview Site</a></li>
							</ul>
						</div><!--## nav-collapse -->
					</div>
				</div><!--## container-fluid -->
			</nav><!--## Navbar End-->
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<div class="well control-heading">
							<div class="navbar-collapse" style="margin:0px;padding:0px;" id="mymenu">
								<h3 class="text-center">Site Option</h3>
								<div class="hr"><hr></div>
								<ul id="accordion" class="accordion">
									<li <?php 
											if(isset($_GET['page'])){
												$pactive = $_GET['page'];
												if($pactive == 'add-page' || $pactive == 'show-pages'){
													echo "class='Open'";
												}else{
													
												}
											}
										?>>
										<div class="link"><i class="fa fa-files-o" aria-hidden="true"></i> Page <i class="fa fa-chevron-down"></i></div>
										<ul class="submenu" 
											<?php 
												if(isset($_GET['page'])){
													$pactive = $_GET['page'];
													if($pactive == 'add-page' || $pactive == 'show-pages'){
														echo "style='display:block;'";
													}else{
														
													}
												}
											?>>
											<li><a href="index.php?page=add-page">Add Page</a></li>
											<li><a href="index.php?page=show-pages">Show pages</a></li>
										</ul>
									</li>
									
									<li <?php 
											if(isset($_GET['page'])){
												$pactive = $_GET['page'];
												if($pactive == 'logo' || $pactive == 'add-slide' || $pactive == 'show-slide' || $pactive == 'socialLink' || $pactive = 'address' || $pactive == 'add-widgets'|| $pactive == 'show-widgets' || $pactive == 'copyRight'){
													echo "class='Open'";
												}else{
													
												}
											}
										?>>
										<div class="link"><i class="fa fa-indent" aria-hidden="true"></i> Site Option <i class="fa fa-chevron-down"></i></div>
										<ul class="submenu" 
											<?php 
												if(isset($_GET['page'])){
													$pactive = $_GET['page'];
													if($pactive == 'logo' || $pactive == 'add-slide' || $pactive == 'show-slide' || $pactive == 'socialLink' || $pactive == 'address' || $pactive == 'add-widgets'|| $pactive == 'show-widgets' || $pactive == 'copyRight'){
														echo "style='display:block;'";
													}else{
														
													}
												}
											?>>
											<li><a href="index.php?page=logo">Logo</a></li>
											<li><a href="index.php?page=add-slide">Slider</a></li>
											<li><a href="index.php?page=show-slide">Show Slider</a></li>
											<li><a href="index.php?page=socialLink">Social Link</a></li>
											<li><a href="index.php?page=address">Address</a></li>
											<li><a href="index.php?page=add-widgets">Add Widgets</a></li>
											<li><a href="index.php?page=show-widgets">Show Widgets</a></li>
											<li><a href="index.php?page=copyRight">Copy Right Text</a></li>
										</ul>
									</li>
									
									<li 
										<?php 
										if(isset($_GET['page'])){
											$pactive = $_GET['page'];
											if($pactive == 'add-category' || $pactive == 'show-category' || $pactive == 'add-brand' || $pactive == 'show-brand'){
												echo "class='Open'";
											}else{
												
											}
										}?>>
										<div class="link"><i class="fa fa-tags" aria-hidden="true"></i> Category Option <i class="fa fa-chevron-down"></i></div>
										<ul class="submenu" 
											<?php 
											if(isset($_GET['page'])){
												$pactive = $_GET['page'];
												if($pactive == 'add-category' || $pactive == 'show-category' || $pactive == 'add-brand' || $pactive == 'show-brand'){
													echo "style='display:block;'";
												}else{ 
												}
											}?>>
											<li><a href="index.php?page=add-category">Add Category</a></li>
											<li><a href="index.php?page=show-category">Show Category list</a></li>
											<li><a href="index.php?page=add-brand">Add Brand</a></li>
											<li><a href="index.php?page=show-brand">Show Brand list</a></li>
										</ul>
									</li>

									<li
										<?php 
										if(isset($_GET['page'])){
											$pactive = $_GET['page'];
											if($pactive == 'add-product' || $pactive == 'show-product'){
												echo "class='Open'";
											}else{
												
											}
										}?>>
										<div class="link"><i class="fa fa-th-large" aria-hidden="true"></i>Products Panel <i class="fa fa-chevron-down"></i></div>
										<ul class="submenu"
											<?php if(isset($_GET['page'])){
													$pactive = $_GET['page'];
													if($pactive == 'add-product' || $pactive == 'show-product'){
														echo "style='display:block;'";
													}else{
														
													}
											}?>>
											<li><a href="index.php?page=add-product">Add Products</a></li>
											<li><a href="index.php?page=show-product">Show Products</a></li>
										</ul>
									</li>    
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-md-9">
						<div class="well well-resiaing control-heading2">
							<div class="row">
								<div class="col-md-12">
									<h2>
										<?php 
											if(isset($_GET['page'])){
												$title = $_GET['page'];
												echo '<div class="pull-left" style="margin-bottom:5px;"><i class="fa fa-caret-right"></i> Site Option <i class="fa fa-angle-right"></i>'.strtolower($title).'</div>';
												if($title == 'edit_product'){ ?>
													<div class="pull-right">
														<div class="" style="margin-top:-15px;">
															<a href="index.php?page=add-product" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Add Product"><i class="fa fa-plus"></i></a>
															<a href="index.php?page=show-product" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="View products"><i class="fa fa-eye"></i></a>
														</div>
													</div>
											<?php	}
											}else{
												echo '<i class="fa fa-dashboard fa-2x"></i> Demo Dashboard';
											}
										?>
									</h2>
								</div>
							</div>
							<div class="hr"><hr></div>
							<div class="row">
								<?php
									if(isset($_GET['page']) AND !empty($_GET['page'])){
										$subPages = urldecode($_GET['page']);
										$pageName = 'includes/'.$subPages.'.php';
										if(file_exists($pageName)){
											include($pageName);
										}else{
											echo 'file not found';
										}
									}else{
										echo '<h1 class="text-center alert alert-success" style="font-size:40px;">Welcome Demo Dashboard</h1>';
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<footer style="background:#6A727F;color:#fff; text-align:center;">
				<div class="container-fluid">
					<h4>2016 &copy; Demo</h4>
				</div>
			</footer>
			
		<!-- =============================================
							JS Links
		================================================== -->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="js/dataTables.select.min.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="js/camera.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/touchTouch.jquery.js"></script>
		<script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/main.js"></script>
		
		<!-- Active Class Script -->
		<script type="text/javascript">
			$('.panel-default .panel-heading').click(function(e) {
				$('.panel-default .panel-heading.active').removeClass('active');
				var $this = $(this);
				if (!$this.hasClass('active')) {
					$this.addClass('active');
				}
				e.preventDefault();
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$('#call_brand_loader').change(function(){
					var value = $(this).val();
						if(value == ""){
							$('#brand_loader').show();
						}else{
							$('#brand_loader').show();
							$.post('brand-loader.php', {value: value}, function(data){
								$('#brand_loader').html(data);
							});
						}
				});
			});
		</script>
		
		<script>
			$(document).ready(function() {
				$('#example').DataTable( {
					select: true
				} );
			} );
		</script>
		<script type="text/javascript">
			function remove(id){
				if(confirm('Are you sure you want to delete this record and it\'s deleted all dependency on its?')){
					window.location='cat-delete.php?id='+id;
				}
			}
			
			function brandRemove(id){
				if(confirm('Are you sure you want to delete this record and it\'s deleted all dependency on its?')){
					window.location='brand-delete.php?id='+id;
				}
			}
			function slideRemove(id){
				if(confirm('Are you sure you want to delete this record?')){
					window.location='delete_slide.php?id='+id;
				}
			}
			
			function productRemove(id){
				if(confirm('Are you sure you want to delete this record?')){
					window.location='delete_product.php?id='+id;
				}
			}
			
			function widgetsRemove(id){
				if(confirm('Are you sure you want to delete this record?')){
					window.location='delete_widgets.php?id='+id;
				}
			}
			function pageRemove(id){
				if(confirm('Are you sure you want to delete this record?')){
					window.location='delete_page.php?id='+id;
				}
			}
			function profileRemove(id){
				if(confirm('Are you sure you want to delete this record?')){
					window.location='delete_profile.php?id='+id;
				}
			}
			function emailRemove(id){
				if(confirm('Are you sure you want to delete this record?')){
					window.location='delete_email.php?id='+id;
				}
			}
			function orderRemove(id){
				if(confirm('Are you sure you want to delete this record?')){
					window.location='delete_order.php?id='+id;
				}
			}
		</script>
		<script>
			$(document).ready(function(){
				
				$(document).on('click', '#callCatjs', function(e){
					
					e.preventDefault();
					
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
						url: 'edit_category.php',
						type: 'POST',
						data: 'id='+uid,
						dataType: 'html'
					})
					.done(function(data){
						console.log(data);	
						$('#dynamic-content').html('');    
						$('#dynamic-content').html(data); // load response 
						$('#modal-loader').hide();		  // hide ajax loader	
					})
					.fail(function(){
						$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
						$('#modal-loader').hide();
					});
					
				});
				
				$(document).on('click', '#callBrandjs', function(e){
					
					e.preventDefault();
					
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
						url: 'edit_brand.php',
						type: 'POST',
						data: 'id='+uid,
						dataType: 'html'
					})
					.done(function(data){
						console.log(data);	
						$('#dynamic-content').html('');    
						$('#dynamic-content').html(data); // load response 
						$('#modal-loader').hide();		  // hide ajax loader	
					})
					.fail(function(){
						$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
						$('#modal-loader').hide();
					});
					
				});
				
				$(document).on('click', '#callSlidejs', function(e){
					
					e.preventDefault();
					
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
						url: 'edit_slide.php',
						type: 'POST',
						data: 'id='+uid,
						dataType: 'html'
					})
					.done(function(data){
						console.log(data);	
						$('#dynamic-content').html('');    
						$('#dynamic-content').html(data); // load response 
						$('#modal-loader').hide();		  // hide ajax loader	
					})
					.fail(function(){
						$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
						$('#modal-loader').hide();
					});
					
				});
				
				$(document).on('click', '#callPagejs', function(e){
					
					e.preventDefault();
					
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
						url: 'edit_page.php',
						type: 'POST',
						data: 'id='+uid,
						dataType: 'html'
					})
					.done(function(data){
						console.log(data);	
						$('#dynamic-content').html('');    
						$('#dynamic-content').html(data); // load response 
						$('#modal-loader').hide();		  // hide ajax loader	
					})
					.fail(function(){
						$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
						$('#modal-loader').hide();
					});
					
				});
				
				$(document).on('click', '#callWidgetjs', function(e){
					
					e.preventDefault();
					
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
						url: 'edit_widgets.php',
						type: 'POST',
						data: 'id='+uid,
						dataType: 'html'
					})
					.done(function(data){
						console.log(data);	
						$('#dynamic-content').html('');    
						$('#dynamic-content').html(data); // load response 
						$('#modal-loader').hide();		  // hide ajax loader	
					})
					.fail(function(){
						$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
						$('#modal-loader').hide();
					});
					
				});
				
				$(document).on('click', '#callProfilejs', function(e){
					
					e.preventDefault();
					
					var uid = $(this).data('id');   // it will get id of clicked row
					
					$('#dynamic-content').html(''); // leave it blank before ajax call
					$('#modal-loader').show();      // load ajax loader
					
					$.ajax({
						url: 'edit_profile.php',
						type: 'POST',
						data: 'id='+uid,
						dataType: 'html'
					})
					.done(function(data){
						console.log(data);	
						$('#dynamic-content').html('');    
						$('#dynamic-content').html(data); // load response 
						$('#modal-loader').hide();		  // hide ajax loader	
					})
					.fail(function(){
						$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
						$('#modal-loader').hide();
					});
					
				});
				
			});

		</script>
		
		<script>
			// bootstrap-ckeditor-modal-fix.js
			// hack to fix ckeditor/bootstrap compatiability bug when ckeditor appears in a bootstrap modal dialog
			//
			// Include this AFTER both bootstrap and ckeditor are loaded.
			// From: http://stackoverflow.com/questions/14420300/bootstrap-with-ckeditor-equals-problems
			// Author: http://stackoverflow.com/users/185839/aaron

			$.fn.modal.Constructor.prototype.enforceFocus = function() {
			  modal_this = this
			  $(document).on('focusin.modal', function (e) {
				if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
				&& !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
				&& !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
				  modal_this.$element.focus()
				}
			  })
			};
		</script>
		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
		
	</body>
</html>