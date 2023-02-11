<div class="col-md-12 form-horizontal">
	<table id="example" class="table table-striped table-bordered p-size" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>SL</th>
                <th>Product</th>
				<th>Category</th>
				<th>Brand</th>
				<th>Type</th>
				<th>Price</th>
				<th>Discount</th>
				<th>Description</th>
				<th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
			<?php
				$showProduct = $pd->showProduct();
				
				if($showProduct){
					$i = 0;
					while($result = $showProduct->fetch_assoc()){
						$i++;
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $result['productName'];?></td>
						<td><?php echo $result['categoryName'];?></td>
						<td><?php echo $result['brandName'];?></td>
						<td><?php echo $result['type'];?></td>
						<td><?php echo number_format($result['price']).' /=';?></td>
						<td><?php echo number_format($result['discount']).' /=';?></td>
						<td><?php echo $fm->textShorten($result['description'],50);?></td>
						<td><img src="<?php echo $result['image'];?>" class="img-responsive"/></td>
						<td width="15%" class="text-right"><a href="index.php?page=edit_product&id=<?php echo $result['productId'];?>" class="btn btn-sm btn-success"data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i> </a> || <a href="javascript:productRemove(<?php echo $result['productId'] ?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a></td>
					</tr>
			<?php } } ?>
        </tbody>
    </table>
</div>