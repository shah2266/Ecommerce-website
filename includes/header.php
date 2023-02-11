<?php
include_once 'classes/session.php';
Session::init();
include_once 'config/config.php';
include_once 'config/database.php';
include_once 'classes/format.php';
include_once 'classes/category.php';
include_once 'classes/product.class.php';
include_once 'classes/cart.class.php';
include_once 'classes/function.class.php';
include_once 'classes/user.class.php';

$db 	= new Database();
$fm 	= new Format();
$cat 	= new Category();
$pd 	= new Product();
$ct 	= new Cart();
$os		= new Others();
$ur 	= new User();
?>
<!DOCTYPE html>
<html>
<!-- Wrap all page content here -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/icon.png">

    <title>
        <?php
if(isset($_GET['pid']) && !empty($_GET['pid'])){
$title = $_GET['pid'];
echo ucfirst($title).' | E-Commerce';
}else{
echo 'Home | E-Commerce';
}
?>
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/prettyPhoto.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/style.css" />


</head>
<div class="pageloader">

    <body>
        <!-- pre loader-->
        <!--<div id="preloader"></div>-->

        <!-- Header -->
        <header>
            <section id="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ul class="header-info">
                                <?php
                                    $showAddress = $cat->showAddress();

                                    if($showAddress){
                                    $i = 0;
                                    while($result = $showAddress->fetch_assoc()){
                                    $i++;
                                ?>
                                <li><a href=""><i class="fa fa-phone"></i> <?php echo $result['contact'];?></a></li>
                                <li><a href=""><i class="fa fa-envelope"></i> <?php echo $result['email'];?></a></li>
                                <?php } }?>

                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ul class="header-menu">
                                <li><a href=""><i class="fa fa-check-square-o"></i> Checkout</a></li>
                                <li><a href=""><i class="fa fa-sign-in"></i> Login</a></li>
                                <li><a href=""><i class="fa fa-user"></i> Registration</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section id="top-bar-second">
                <div class="container">
                    <div class="row">
                        <?php
                            $showLogo = $cat->showLogo();
                            if($showLogo){
                            $i = 0;
                            while($result = $showLogo->fetch_assoc()){
                            $i++;
                        ?>
                        <div class="col-md-3 col-sm-3">
                            <div class="brand-logo">
                                <a href="index.php"><img src="admin/<?php echo $result['logo'];?>"
                                        class="img-responsive" /></a>
                            </div>
                        </div>
                        <?php } }?>
                        <div class="col-md-5 col-sm-4 hidden-xs vcenter">
                            <div class="row">
                                <div class="custom-search-input col-sm-12">
                                    <form action="index.php?pid=search" method="POST">
                                        <div class="input-group col-md-12">
                                            <input type="text" name="search" class="form-control input-lg"
                                                placeholder="Search by keyword (E.g. category,product,content..)" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-info btn-lg" type="submit" name="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-5 vcenter shopping">
                            <div class="shopping-cart">
                                <ul class="shopping-cart-menu">
                                    <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="index.php?pid=cart">Shopping</a></li>
                                    <li class="dropdown">
                                        <a>
                                            <?php 
/*$getPinfo = $ct->chkCartTbl();
if($getPinfo){
$sum = Session::get("sum");
$qty = Session::get("qty");
echo 'Tk '.$sum.' || Qty: ( '.$qty.' )';
//echo '( '.$qty.' )';
}else{
echo 'Empty';
}*/

$pq = $ct->getPriceQuantity();
if($pq){
$pq_sum = 0;
$qyt = 0;
while($result = $pq->fetch_assoc()){
$pr = $result['price'];
$qy = $result['quantity'];
$pr_qy = $pr*$qy;
$pq_sum = $pq_sum+$pr_qy;
$qyt = $qyt+$result['quantity'];

}
echo 'Tk: '.number_format($pq_sum).' | Qty: ('.number_format($qyt).')';
}else{
echo 'Empty';
}
?>
                                        </a>
                                    </li>
                                    <!--<li class="dropdown">
<a href="" class="dropdown-toggle" data-toggle="dropdown">

</a>
<ul class="dropdown-menu">
<li><a href="#">Comming Soon</a></li>
</ul>
</li>-->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </header>
        <!--## Header -->



        <!-- Fixed navbar -->
        <!-- Begin Navbar -->
        <div id="nav">
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li
                                <?php if(isset($_GET['pid']) && !empty($_GET['pid'])){ $pid = $_GET['pid']; if($pid=='home'){ echo 'class="active"'; } } else{ echo 'class="active"'; } ?>>
                                <a href="index.php?pid=home"><i class="fa fa-home"></i> Home</a></li>
                            <li
                                <?php if(isset($_GET['pid'])){ $pid = $_GET['pid']; if($pid=='shop'){ echo 'class="active dropdown menu-large"'; }else{ echo 'class="dropdown menu-large"';} }else{echo 'class="dropdown menu-large"';} ?>>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop <b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu megamenu row">
                                    <li class="resources-inner">
                                        <div class="container">
                                            <div class="row">
                                                <?php
$showCategory = $cat->showCategoryShop();

if($showCategory){
$i = 0;
while($result = $showCategory->fetch_assoc()){
$i++;

if($result['categoryName'] == $result['categoryName']){ ?>
                                                <div class="col-md-3 clearfix">
                                                    <h4><i class="fa fa-square"></i>
                                                        <?php echo $result['categoryName']; ?></h4>
                                                    <ul>
                                                        <?php
$ctname = $result['categoryName'];
$results = $cat->showBrandShop($ctname);
if($results){
while($row = $results->fetch_assoc()){ ?>
                                                        <li><a
                                                                href="index.php?pid=shop&filterby=<?php echo $row['brandId']; ?>"><i
                                                                    class="fa fa-angle-right"></i>
                                                                <?php echo $row['brandName']; ?> </a></li>
                                                        <?php } } ?>
                                                    </ul>
                                                </div>
                                                <?php	} } } ?>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li
                                <?php if(isset($_GET['pid'])){ $pid = $_GET['pid']; if($pid=='about'){ echo 'class="active"'; } } ?>>
                                <a href="index.php?pid=about">About Us</a></li>
                            <li
                                <?php if(isset($_GET['pid'])){ $pid = $_GET['pid']; if($pid=='contact'){ echo 'class="active"'; } } ?>>
                                <a href="index.php?pid=contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.navbar -->
        </div>