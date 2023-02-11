<!--Bannder Slider-->
<section id="banner-slider">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 hidden-xs">
                <div class="row">
                    <div class="col-md-12">
                        <div class="headingWithcontrolbutton">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h3 style="font-size:17px; padding-top:2px;">Recent Products</h3>
                                </div>
                                <!-- Controls -->
                                <div class="col-sm-4 clearfix">
                                    <div class="controls pull-right">
                                        <a class="left fa fa-chevron-left" href="#bannder-side-carousel"
                                            data-slide="prev"></a>
                                        <a class="right fa fa-chevron-right" href="#bannder-side-carousel"
                                            data-slide="next"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bannder-side-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner clearfix">
                        <?php
                            $recentProduct =$pd->getRecentProductLimit(3);
                            if($recentProduct){
                            $rowCount = 1;
                            while( $result = $recentProduct-> fetch_assoc()){
                            ?>

                        <div class="item <?php if($rowCount == 1) echo 'active'; else{ }; ?> clearfix">
                            <div class="product clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="admin/<?php echo $result['image'];?>" alt=""></a>
                                    <a href="#"><img src="admin/<?php echo $result['image'];?>" alt=""></a>
                                    <div class="product-overlay">
                                        <a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"><i
                                                class="fa fa-shopping-cart"></i><span> Add to Cart</span></a>
                                        <a href="admin/<?php echo $result['image'];?>" rel="lightbox[group]"><i
                                                class="fa fa-search-plus"></i><span> Quick View</span></a>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <div class="product-title">
                                        <h3><a href="#"><?php echo $fm->textShorten($result['productName'],20);?></a>
                                        </h3>
                                    </div>
                                    <div class="product-price">Tk: <?php echo number_format($result['price']).' /=';?>
                                    </div>
                                    <div class="product-btn">
                                        <a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"
                                            class="btn btn-info">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $rowCount ++; } }?>

                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-6 col-xs-12">
                <div class="camera_wrap camera_azure_skin" id="camera_wrap">
                    <?php
$showSlide = $cat->showSlide();

if($showSlide){
$i = 0;
while($result = $showSlide->fetch_assoc()){
$i++;
?>
                    <div data-thumb="admin/<?php echo $result['image'];?>"
                        data-src="admin/<?php echo $result['image'];?>">
                        <div class="camera_caption fadeFromBottom"><em><?php echo $result['description'];?></em></div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--#Bannder Slider-->

<section id="default">
    <!-- Item slider-->
    <div class="container">
        <?php
$popularProduct 	=	$pd->getPopularProductLimit(5);
$popularProCount 	=	@$popularProduct->num_rows;
if($popularProCount == Null){
echo '<div class="alert alert-danger"> Popular Products Comming Soon</div>';
}
if($popularProduct){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="headingWithcontrolbutton">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Popular Products</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                    <div class="carousel-inner">
                        <?php
$rowCount = 1;
while( $result = $popularProduct-> fetch_assoc()){
?>
                        <div class="item <?php if($rowCount == 1) echo 'active'; else{ }; ?> clearfix">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="product clearfix">
                                    <div class="product-inner">
                                        <div class="product-image">
                                            <a href="#"><img src="admin/<?php echo $result['image'];?>" alt=""></a>
                                            <a href="#"><img src="admin/<?php echo $result['image'];?>" alt=""></a>
                                            <div class="product-overlay">
                                                <a
                                                    href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"><i
                                                        class="fa fa-shopping-cart"></i><span> Add to Cart</span></a>
                                                <a href="admin/<?php echo $result['image'];?>" rel="lightbox[group]"><i
                                                        class="fa fa-search-plus"></i><span> Quick View</span></a>
                                            </div>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-title">
                                                <h3><a
                                                        href="#"><?php echo $fm->textShorten($result['productName'],20);?></a>
                                                </h3>
                                            </div>
                                            <div class="product-price" style="padding-bottom:4px;">Tk:
                                                <?php echo number_format($result['price']).' /=';?></div>
                                            <div class="product-btn">
                                                <a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"
                                                    class="btn btn-info">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php $rowCount++; } ?>

                    </div>

                    <div id="slider-control">
                        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img
                                src="images/right-arrow.png" alt="Left" class="img-left"></a>
                        <a class="right carousel-control" href="#itemslider" data-slide="next"><img
                                src="images/left-arrow.png" alt="Right" class="img-right"></a>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- Item slider end-->
</section>


<!--Featured Products-->
<section id="default">
    <!-- Item slider-->
    <div class="container">
        <?php
$featuredProduct 	=	$pd->getFeaturedProductLimit(5);
$featuredProCount 	= 	@$featuredProduct->num_rows;
if($featuredProCount == Null){
echo '<div class="alert alert-danger"> Featured Products Comming Soon</div>';
}
if($featuredProduct){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="headingWithcontrolbutton">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Featured Products</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="carousel carousel-showmanymoveone slide" id="itemslider2">
                    <div class="carousel-inner">
                        <?php
$rowCount = 1;
while( $result = $featuredProduct-> fetch_assoc()){
?>
                        <div class="item <?php if($rowCount == 1) echo 'active'; else{ }; ?> clearfix">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="product clearfix">
                                    <div class="product-inner">
                                        <div class="product-image">
                                            <a href="#"><img src="admin/<?php echo $result['image'];?>" alt=""></a>
                                            <a href="#"><img src="admin/<?php echo $result['image'];?>" alt=""></a>
                                            <div class="product-overlay">
                                                <a
                                                    href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"><i
                                                        class="fa fa-shopping-cart"></i><span> Add to Cart</span></a>
                                                <a href="admin/<?php echo $result['image'];?>" rel="lightbox[group]"><i
                                                        class="fa fa-search-plus"></i><span> Quick View</span></a>
                                            </div>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-title">
                                                <h3><a
                                                        href="#"><?php echo $fm->textShorten($result['productName'],20);?></a>
                                                </h3>
                                            </div>
                                            <div class="product-price" style="padding-bottom:4px;">Tk:
                                                <?php echo number_format($result['price']).' /=';?></div>
                                            <div class="product-btn">
                                                <a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"
                                                    class="btn btn-info">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php $rowCount++; } ?>

                    </div>

                    <div id="slider-control">
                        <a class="left carousel-control" href="#itemslider2" data-slide="prev"><img
                                src="images/right-arrow.png" alt="Left" class="img-left"></a>
                        <a class="right carousel-control" href="#itemslider2" data-slide="next"><img
                                src="images/left-arrow.png" alt="Right" class="img-right"></a>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- Item slider end-->
</section>
<!--#Featured Products-->

<!-- Reviews -->
<section id="default-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!--<div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>-->
                <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
                    <!-- Carousel indicators -->
                    <!--<ol class="carousel-indicators">
<li data-target="#fade-quote-carousel" data-slide-to="0"></li>
<li data-target="#fade-quote-carousel" data-slide-to="1"></li>
<li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>
<li data-target="#fade-quote-carousel" data-slide-to="3"></li>
<li data-target="#fade-quote-carousel" data-slide-to="4"></li>
<li data-target="#fade-quote-carousel" data-slide-to="5"></li>
</ol>-->
                    <!-- Carousel items -->
                    <!--<div class="carousel-inner">
<div class="item">
<div class="profile-circle" style="background-color: rgba(0,0,0,.2);"></div>
<blockquote>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
</blockquote>	
</div>
<div class="item">
<div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
<blockquote>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
</blockquote>
</div>
<div class="active item">
<div class="profile-circle" style="background-color: rgba(145,169,216,.2);"></div>
<blockquote>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
</blockquote>
</div>
<div class="item">
<div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
<blockquote>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
</blockquote>
</div>
<div class="item">
<div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
<blockquote>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
</blockquote>
</div>
<div class="item">
<div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>
<blockquote>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
</blockquote>
</div>
</div>-->
                </div>
            </div>

        </div>
    </div>
</section>