<div class="col-md-12 form-horizontal">
	<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0" style="font-size:12px;">
        <thead>
            <tr>
                <th>SL</th>
                <th>Customer Info</th>
				<th>Image</th>
				<th>Order Item(s)</th>
				<th>Date :: Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
			<?php
				$showOrder = $ct->showOrder();
				
				if($showOrder){
					$i = 0;
					while($result = $showOrder->fetch_assoc()){
						$i++;
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo '<strong>Customer Name:</strong> '.$result['customerName'].'<br><div style="border:1px solid #ccc; border-radius:8px;padding:8px;"><strong>Email:</strong> '.$result['email'].'<br><strong>Contact:</strong> '.$result['contact'].'<br><strong>Address:</strong> <em>'.$result['address'].'</em>';?></td>
						<td><img src="<?php echo $result['image'];?>" width="100px"></td>
						<td><?php echo '<strong>Product Name:</strong> '.$result['productName'].'<br><div style="border:1px solid #ccc; border-radius:8px;padding:8px;"><strong>Quantity:</strong> '.$result['quantity'].'<br><strong>Price:</strong> '.number_format($result['price']).' /='.'<br><strong>VAT:</strong> '.$result['vat'].'<br><strong>Discount: </strong>'.number_format($result['discount']).' /='.'<br></div>';?></td>
						<td><?php echo $result['dateTime'];?></td>
						<td width="18%" class="text-right"><a href="index.php?page=send_mail_order&id=<?php echo $result['orderId'];?>" data-toggle="tooltip" data-placement="top" title="Replay" class="btn btn-sm btn-success">Replay</a> || <a href="javascript:orderRemove(<?php echo $result['orderId'] ?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a></td>
					</tr>
			<?php } } ?>
        </tbody>
    </table>
</div>
