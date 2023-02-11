<?php
if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
echo '<script>window.location.assign("index.php?pid=404");</script>';
}else{
$id = preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['proid']);
//$id = $_GET['proid'];
//echo $id;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$quantity = $_POST['quantity'];
$addCart = $ct->addToCart($quantity, $id);
}
?>
<section id="page-indicators">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3>Product View</h3>
            </div>

            <div class="col-md-6">
                <div class="page-url text-right">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-th"></i> Home</a> / <a href="">Shop</a> / <a>Product
                                View</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
$getSproduct = $pd->getSingleProduct($id);
if($getSproduct){
while($getSproductRes = $getSproduct->fetch_assoc()){ ?>


<section id="default">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single-product-image-gallery">
                    <div id="bannder-side-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner clearfix">
                            <div class="item active clearfix">
                                <div class="mag">
                                    <img data-toggle="magnify" src="admin/<?php echo $getSproductRes['image']; ?>"
                                        alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="mag">
                                    <img data-toggle="magnify" src="admin/<?php echo $getSproductRes['image']; ?>"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <!--<div class="single-slide-control">
<ul>
<li><a href="#bannder-side-carousel" data-slide="prev"><img src="admin/<?php //echo $getSproductRes['image']; ?>" class="img-responsive"/></a></li>
<li><a href="#bannder-side-carousel" data-slide="next"><img src="admin/<?php //echo $getSproductRes['image']; ?>" class="img-responsive"/></a></li>
</ul>
</div>-->
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-sm-desc">
                    <h3><?php echo $getSproductRes['productName']; ?></h3>
                    <h5>Shopping Available</h5>
                    <div class="clearfix"
                        style="width:90px; height: 3px; display: block; overflow:hidden; background:#E8E8E8;"></div>

                    <p><?php echo $fm->textShorten($getSproductRes['description'],200); ?></p>
                </div>
                <div class="single-card-info">
                    <strong>Tk: <?php echo number_format($getSproductRes['price']).' /=';?></strong><br>
                    <?php
if(isset($addCart)){
echo $addCart;
}
?>
                    <form action="" method="POST" style="margin-top:20px;">
                        <div class="form-group">
                            <input type="number" class="cart-quantity" name="quantity" value="1" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="submit" value="Add To Cart">
                        </div>
                    </form>
                </div>
                <div class="single-menu">
                    <span><i class="fa fa-share-alt"></i> Share:
                        <div class="single-social-icon">
                            <ul>
                                <li><a href="" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="" data-toggle="tooltip" data-placement="top" title="Youtube"><i
                                            class="fa fa-youtube"></i></a></li>
                                <li><a href="" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="" data-toggle="tooltip" data-placement="top" title="Google-plus"><i
                                            class="fa fa-google-plus"></i></a></li>
                                <li><a href="" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                            class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                </div>

            </div>

        </div>
    </div>
</section>

<section id="default" class="dsc-single-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#description" data-toggle="tab"><i class="fa fa-bars"></i>
                                    Description</a></li>
                            <li><a href="#additinal" data-toggle="tab"><i class="fa fa-info"></i> Additional
                                    Information</a></li>
                            <li><a href="#reviews" data-toggle="tab"><i class="fa fa-star"></i> Reviews</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                <p><?php echo $getSproductRes['description']; ?></p>
                            </div>
                            <div class="tab-pane fade" id="additinal">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th width="200px;">Brand Name</th>
                                        <td> <?php echo $getSproductRes['brandName']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="200px;">Category</th>
                                        <td> <?php echo $getSproductRes['categoryName']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="200px;">Discount</th>
                                        <td> <?php if($getSproductRes['discount'] != NULL){
echo number_format($getSproductRes['discount']);

}else{
echo 'No Discount';
}?></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="reviews">
                                <ul class="reviews-panel-out">
                                    <li>
                                        <div class="reviews-panel">
                                            <div class="pull-left">
                                                <div class="user-img">
                                                    <img src="images/user-icon.png" />
                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <h5>John Doe</h5>
                                                <span>April 24, 2014 at 10:46AM</span>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has. Lorem Ipsum is simply dummy text of the
                                                    printing and typesetting industry. Lorem Ipsum has. Lorem Ipsum is
                                                    simply dummy text of the printing and typesetting industry. Lorem
                                                    Ipsum has. Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem Ipsum has. Lorem Ipsum is simply dummy
                                                    text of the printing and typesetting industry. Lorem Ipsum has.
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has. Lorem</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="reviews-panel">
                                            <div class="pull-left">
                                                <div class="user-img">
                                                    <img src="images/user-icon.png" />
                                                </div>
                                            </div>

                                            <div class="pull-right">
                                                <h5>John Doe</h5>
                                                <span>April 24, 2014 at 10:46AM</span>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has. Lorem Ipsum is simply dummy text of the
                                                    printing and typesetting industry. Lorem Ipsum has. Lorem Ipsum is
                                                    simply dummy text of the printing and typesetting industry. Lorem
                                                    Ipsum has. Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem Ipsum has. Lorem Ipsum is simply dummy
                                                    text of the printing and typesetting industry. Lorem Ipsum has.
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has. Lorem</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="reviews-btn">
                                    <a href="" class="btn btn-info">Add a review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php	
} //#end while
} //#end if
?>


<!--Related Products-->
<section id="default">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headingWithcontrolbutton">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Related Products</h3>
                        </div>
                        <!--<div class="col-sm-8 clearfix">
<div class="controls pull-right">
<a class="left fa fa-chevron-left" href="#featured-products" data-slide="prev"></a>
<a class="right fa fa-chevron-right" href="#featured-products" data-slide="next"></a>
</div>
</div>-->
                    </div>
                </div>
            </div>
        </div>
        <?php
$relatedProduct 	=	$pd->getRelatedProduct($id);
$relatedProCount 	= 	@$relatedProduct->num_rows;
if($relatedProCount == Null){
echo '<div class="alert alert-danger"> Related Products Comming Soon</div>';
}
if($relatedProduct){ ?>
        <div class="row">
            <div class="col-md-12">
                <ul id="gallery-slider-2" class="gallery">
                    <?php 
while( $result = $relatedProduct-> fetch_assoc()){
?>
                    <li>
                        <div class="product clearfix">
                            <div class="product-inner">
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
                                        <h3><a href="#"><?php echo $fm->textShorten($result['productName'],10);?></a>
                                        </h3>
                                    </div>
                                    <div class="product-price" style="padding-bottom:4px;">Tk:
                                        <?php echo number_format($result['price']).' /='; ?></div>
                                    <div class="product-btn">
                                        <a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"
                                            class="btn btn-info">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php  } ?>
    </div>
</section>
<!--#RelatedProducts-->