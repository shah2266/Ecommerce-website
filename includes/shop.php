<?php
if(!isset($_GET['filterby']) || $_GET['filterby'] == NULL){
echo '<script>window.location.assign("index.php?pid=404");</script>';
}else{
$id = preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['filterby']);
//$id = $_GET['filterby'];
//echo $id;
}
/*if($_SERVER['REQUEST_METHOD'] == 'POST'){
$quantity = $_POST['quantity'];
$addCart = $ct->addToCart($quantity, $id);
}*/
?>
<section id="page-indicators">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3>Shop</h3>
            </div>

            <div class="col-md-6">
                <div class="page-url text-right">
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-th"></i> Home</a> / <a href="">Shop</a></li>
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
                <div class="navbar-collapse" style="margin:0px;padding:0px;" id="mymenu">
                    <h4
                        style="background:#F81524; color: #fff; padding:10px 0; padding-left:30px; margin:0; border-bottom:1px solid #F81524; border-radius:3px 3px 0 0; font-size:15px;">
                        All Categories</h4>
                    <ul id="accordion" class="accordion">

                        <?php
$showCategory = $cat->showCategoryShop();

if($showCategory){
$i = 0;
while($result = $showCategory->fetch_assoc()){
$i++;

if($result['categoryName'] == $result['categoryName']){ 
$ctname = $result['categoryName'];
$results = $cat->showBrandShop($ctname);
?>
                        <?php $getCateName = $cat->getCategoryByBrandId($id); ?>
                        <li
                            <?php if($getCateName['categoryName'] == $result['categoryName']) echo 'class="open"'; else{} ?>>
                            <div class="link"><i class="fa fa-tags" aria-hidden="true"></i>
                                <?php echo $result['categoryName']; ?> <i class="fa fa-chevron-right"></i></div>
                            <ul class="submenu"
                                <?php if($getCateName['categoryName'] == $result['categoryName']) echo 'style="display:block;"'; else{}?>>
                                <?php
if($results){
while($row = $results->fetch_assoc()){ ?>
                                <li><a href="index.php?pid=shop&filterby=<?php echo $row['brandId']; ?>">
                                        <?php echo $row['brandName']; ?> </a></li>
                                <?php } } ?>
                            </ul>
                        </li>
                        <?php	} } } ?>
                    </ul>
                </div>

            </div>
            <div class="col-md-9">
                <div class="row">
                    <?php
$showBrandById = $cat->showBrandById($id);
$getCateName = $cat->getCategoryByBrandId($id);
if($showBrandById){
echo '<div class="col-md-12 show-brand-title"><h4><i class="fa fa-square"></i> '.$getCateName['categoryName'].' <i class="fa fa-angle-right"></i> '.$showBrandById['brandName'].'</h4></div>';
} 
?>
                    <?php
$productBrandWise 	=	$pd->showProductShop($id);
$productBrandWiseCount 	= 	@$productBrandWise->num_rows;
if($productBrandWiseCount == Null){
echo '<div class="col-md-12"><div class="msg alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Product Comming Soon!</div></div>';

}
if($productBrandWise){ 
while( $result = $productBrandWise-> fetch_assoc()){ ?>
                    <div class="col-md-3 hidden-sm hidden-xs">
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
                                    <h3><a href="#"><?php echo $fm->textShorten($result['productName'],20);?></a></h3>
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

                    <div class="col-xs-4 visible-sm hidden-xs">
                        <div class="product clearfix">
                            <div class="product-image">
                                <a href="#"><img src="admin/<?php echo $result['image'];?>" alt=""
                                        class="img-responsive"></a>
                                <a href="#"><img src="admin/<?php echo $result['image'];?>" alt=""
                                        class="img-responsive"></a>
                                <div class="product-overlay">
                                    <a href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"><i
                                            class="fa fa-shopping-cart"></i><span> Add to Cart</span></a>
                                    <a href="admin/<?php echo $result['image'];?>" rel="lightbox[group]"><i
                                            class="fa fa-search-plus"></i><span> Quick View</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title">
                                    <h3><a href="#"><?php echo $fm->textShorten($result['productName'],20);?></a></h3>
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

                    <div class="col-xs-6 visible-xs">
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
                                    <h3><a href="#"><?php echo $fm->textShorten($result['productName'],20);?></a></h3>
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

                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</section>