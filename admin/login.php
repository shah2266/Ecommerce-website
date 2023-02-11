<?php
	include '../classes/adminaccess.php';
?>
<?php
	$al = new adminLogin();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$adminUser = $_POST['adminUser'];
		$adminPass = $_POST['adminPass'];
		
		$loginChk = $al->adminLogin($adminUser,$adminPass);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Login | Camerabazar</title>
		<link rel="icon" href="favicon.ico">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/animate.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/prettyPhoto.css"/>
		<link rel="stylesheet" href="css/responsive.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<style>
			body{background: url(images/bg-all.png)repeat;}
		</style>
	</head>
	<body>
		<div class = "container">
			<div class="wrapper">				
				<form action="login.php" method="POST" class="form-signin">
					<img src="images/logo.png" class="img-responsive">
					<h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
					  <hr class="colorgraph"><br>
						<span style="color:red; font-size: 14px;">
							<?php 
								if(isset($loginChk)){
									echo $loginChk;
								}
							?>
						</span>
					  <input type="text" class="form-control" name="adminUser" placeholder="Username" autofocus="" />
					  <input type="password" class="form-control" name="adminPass" placeholder="Password" />     		  
					 
					  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
				</form>			
			</div>
		</div>
		
		<!-- JS Links -->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="js/camera.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/touchTouch.jquery.js"></script>
		<script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script>
			// Auto Message Hide
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
				});
			}, 2000);
		</script>
	</body>
</html>
