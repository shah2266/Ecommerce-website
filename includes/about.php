<section id="page-indicators">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3>About US</h3>
            </div>

            <div class="col-md-6">
                <div class="page-url text-right">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-th"></i> Home</a> / <a href="">About US</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="default">
    <div class="container">
        <div class="row">
            <?php
$showPage = $os->showPage();

if($showPage){
$i = 0;
while($result = $showPage->fetch_assoc()){
$i++;
?>
            <div class="col-md-6">
                <h3><?php echo $result['pageHeading'];?></h3>
                <p><?php echo $result['description'];?></p>
            </div>
            <div class="col-md-6">
                <img src="admin/<?php echo $result['image'];?>" class="img-responsive" />
            </div>
            <?php } } ?>
        </div>
    </div>
</section>

<section id="products-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headingWithcontrolbutton">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Our Products</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
$showLimitProduct = $pd->showLimitProduct(1);

if($showLimitProduct){
$i = 0;
while($result = $showLimitProduct->fetch_assoc()){
$i++;
?>
            <div class="col-md-6">
                <div class="col-md-12" style="margin:0;padding:0;">
                    <div class="portfolio-item">
                        <a><img src="admin/<?php echo $result['image'];?>" alt="" width="100%" height="350px"></a>
                        <div class="portfolio-overlay clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3><a
                        href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"><?php echo $result['productName'];?></a>
                </h3>
                <p><?php echo $fm->textShorten($result['description'],800);?></p>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>