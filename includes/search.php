<?php
if(!isset($_POST['search']) && $_POST['search'] == NULL){
echo '<script>window.location.assign("index.php?pid=404");</script>';
}else{
$id = preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_POST['search']);
}
?>
<section id="page-indicators">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3>Search</h3>
            </div>

            <div class="col-md-6">
                <div class="page-url text-right">
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-th"></i> Home</a> / <a href="">Search</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="products-features">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widgets-menu">
                    <div class="widgets-menu-title">
                        <h3>Top Brands</h3>
                    </div>
                    <div class="widgets-menu-list">
                        <ul>
                            <?php
$showBrandLimit = $cat->showBrandLimit(10);

if($showBrandLimit){
$i = 0;
while($result = $showBrandLimit->fetch_assoc()){
$i++;
?>
                            <li><a href="index.php?pid=shop&filterby=<?php echo $result['brandId']; ?>"><i
                                        class="fa fa-angle-right"></i> <?php echo $result['brandName']; ?></a></li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div class="widgets-menu">
                    <div class="widgets-menu-title">
                        <h3>Our Products</h3>
                    </div>
                    <div class="widgets-menu-list">
                        <ul>
                            <?php
$showLimitProduct = $pd->showLimitProduct(15);

if($showLimitProduct){
$i = 0;
while($result = $showLimitProduct->fetch_assoc()){
$i++;
?>
                            <li><a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"><i
                                        class="fa fa-angle-right"></i> <?php echo $result['productName']; ?></a></li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php
$search 	=	$os->search($id);
if($search){ 
while( $result = $search-> fetch_assoc()){ ?>
                    <div class="col-sm-4">
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
                                        <h3><a href="#"><?php echo $fm->textShorten($result['productName'],20);?></a>
                                        </h3>
                                    </div>
                                    <div class="product-price">Tk: <?php echo number_format($result['price']).' /='; ?>
                                    </div>
                                    <div class="product-btn">
                                        <a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"
                                            class="btn btn-info">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
} else{
echo '<div class="msg alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Failed !</strong> No data found!</div>';
}?>
                </div>
            </div>
        </div>
    </div>
</section>