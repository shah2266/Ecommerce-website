<?php
if(isset($_POST['buyProduct'])){
$sessionId = Session_id();
$orderProduct = $ct->orderProduct($_POST,$sessionId);
$delCartProduct = $ct->delCartProduct($sessionId);
echo '<script>window.location.assign("index.php?pid=msg");</script>';
}
?>

<section id="page-indicators">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3>Order</h3>
            </div>

            <div class="col-md-6">
                <div class="page-url text-right">
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-th"></i> Home</a> / <a href="">Shop</a> / <a>Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="default">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="headingWithcontrolbutton">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h3>Drop Your Address Below</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="POST" class="form-horizontal order-form">
                    <div class="form-group">
                        <div class="col-sm-3 control-label">
                            Your name:
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="customerName" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 control-label">
                            Contact:
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="contact" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 control-label">
                            Email:
                        </div>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 control-label">
                            Address:
                        </div>
                        <div class="col-sm-9">
                            <textarea rows="5" class="form-control" name="address" required></textarea>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <div class="col-md-12 buy-btn">
                            <button type="submit" name="buyProduct" class="btn btn-default"><img src="images/buy.jpg"
                                    width="120px"></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="headingWithcontrolbutton">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h3>Your Order list</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <?php 
if(isset($updateCart)){
echo $updateCart;
}

if(isset($delCartPro)){
echo $delCartPro;
}
?>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Unit Price (Tk)</th>
                            <th>Quantity</th>
                            <th>Total (Tk)</th>
                        </tr>
                        <?php
$getPro = $ct->getCartProduct();
if($getPro){
$i = 0;
$sum = 0;
$qty = 0;
while($result = $getPro->fetch_assoc()){ 
$i++;
?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><img src="admin/<?php echo $result['image'];?>" class="img-responsive" width="80px">
                            </td>
                            <td><?php echo $result['productName'];?></td>
                            <td><?php echo number_format($result['price']).' /=';?></td>
                            <td><?php echo number_format($result['quantity']);?></td>
                            <td><?php 
$pri = $result['price'];
$q = $result['quantity'];
$priceTotal = $pri * $q;
echo number_format($priceTotal).' /=';
?></td>
                        </tr>
                        <?php
$qty = $qty + $q;
$sum = $sum + $priceTotal;
Session::set('sum', $sum);
Session::set('qty', $qty);
?>

                        <?php	}
}else{
echo '<tr><td colspan="7"><div class="msg alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Cart Empty! <a href="index.php?pid=home">Continue Shopping...</a></div></td></tr>';
}
?>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="index.php?pid=home" class=""><img src="images/Continue Shopping Button.png"
                                width="120px"></a>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="headingWithcontrolbutton">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>Cart Totals</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
$getPinfo = $ct->chkCartTbl();
if($getPinfo){ ?>
                    <table class="table table-striped">
                        <tr>
                            <th width="30%">Total Quantity:</th>
                            <td><?php if(@$qty != 0) echo number_format($qty); else echo '0';?></td>
                        </tr>
                        <tr>
                            <th width="25%">Cart Subtotal (Tk): </th>
                            <td><?php if(@$sum != 0) echo number_format($sum).' /='; else echo '0';?></td>
                        </tr>
                        <tr>
                            <th width="30%">Vat: </th>
                            <td>0%</td>
                        </tr>
                        <tr>
                            <th width="30%">Shipping: </th>
                            <td>Free Delivery</td>
                        </tr>
                        <tr>
                            <th width="30%">Total (Tk): </th>
                            <td><?php $vat = 10; @$total = $sum; echo number_format($total).' /='; ?></td>
                        </tr>
                    </table>
                    <?php } else{
echo '<div class="msg alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Cart Empty! <a href="index.php?pid=home">Continue Shopping...</a></div>';
} ?>
                </div>
            </div>
            <!--<div class="col-md-12 text-right">
<a href="index.php#default" class=""><img src="images/Continue Shopping Button.png" width="120px"></a>
</div>-->
        </div>
    </div>
</section>