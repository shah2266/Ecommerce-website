<?php
if(isset($_GET['delete-product-from-cart'])){
$id = preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['delete-product-from-cart']);
$delCartPro = $ct->delCartPro($id);
}

if(isset($_POST['updateCart'])){
$cartId = $_POST['cartId'];
$quantity = $_POST['quantity'];
$updateCart = $ct->cartUpdate($quantity,$cartId);

if($quantity <= 0){
$delCartPro = $ct->delCartPro($cartId);
}
}
?>

<section id="page-indicators">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3>Cart</h3>
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
            <div class="col-md-12">
                <div class="headingWithcontrolbutton">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Your Cart Product list</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

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
                        <th width="12%">Unit Price (Tk)</th>
                        <th width="18%">Quantity</th>
                        <th width="10%">Total (Tk)</th>
                        <th width="15%" class="text-center">Action</th>
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
                        <td><img src="admin/<?php echo $result['image'];?>" class="img-responsive" width="80px"></td>
                        <td><?php echo $result['productName'];?></td>
                        <td class="text-center"><?php echo number_format($result['price']).' /=';?></td>
                        <td>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="hidden" class="cart-quantity" name="cartId"
                                        value="<?php echo $result['cartId']; ?>" />
                                    <input type="number" class="cart-quantity" name="quantity"
                                        value="<?php echo $result['quantity']; ?>" style="width:60px;" />
                                    <input type="submit" class="btn btn-info" name="updateCart" value="Update Cart">
                                </div>
                            </form>
                        </td>
                        <td><?php 
$pri = $result['price'];
$q = $result['quantity'];
$priceTotal = $pri * $q;
echo number_format($priceTotal).' /=';
?></td>
                        <td class="text-center">
                            <a href="index.php?pid=cart&delete-product-from-cart=<?php echo $result['cartId']; ?>"
                                class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                    class="fa fa-trash"></i> </a> <a
                                href="index.php?pid=single&proid=<?php echo $result['productId']; ?>"
                                class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Details"><i
                                    class="fa fa-eye"></i> </a>
                        </td>
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
            <div class="col-md-12 text-right">
                <a href="index.php?pid=home" class=""><img src="images/Continue Shopping Button.png" width="120px"></a>
            </div>
        </div>
    </div>
</section>

<section id="default">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft">
            </div>

            <div class="col-md-6 wow fadeInRight">
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
                        <td><?php $vat = 10; @$total = $sum; echo number_format($total).' /=';?></td>
                    </tr>
                </table>
                <?php } else{
echo '<div class="msg alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Cart Empty! <a href="index.php?pid=home">Continue Shopping...</a></div>';
} ?>

                <div class="buy-btn text-right">
                    <a href="index.php?pid=order" class="btn btn-default"><img src="images/order.jpg" width="200px"></a>
                </div>
            </div>
        </div>
    </div>
</section>