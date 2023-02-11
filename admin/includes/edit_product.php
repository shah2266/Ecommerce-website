<?php
	if(isset($_POST['productUpdate'])){
		$productId = $_POST['productId'];
		$updateProduct = $pd->productUpdate($_POST,$_FILES,$productId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal">
		<?php
			if(isset($updateProduct)){
				echo $updateProduct;
			}
		?>
		<?php
			if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$getProduct = $pd->getProductById($id);
				if($getProduct){
					while($result = $getProduct->fetch_assoc()){
		?>
		<form action = "" method = "POST" enctype = "multipart/form-data">
			<div class="form-group">
				<div class="col-sm-2 control-label">
					Product Name:
				</div>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="productName" value="<?php echo $result['productName'];?>"/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2 control-label">
					Category Name:
				</div>
				<div class="col-sm-4">
					<select name="catId" class="form-control">
							<option value="">--- Select Category Name ---</option>
							<?php 
								$catName = "SELECT * FROM tbl_category";
								$catNameResult = $db->select($catName);
								if($catNameResult){
									while($row = $catNameResult-> fetch_assoc()){ ?>
										<option 
											<?php if($row['catId'] == $result['catId']){ ?>
												selected = "selected"
											<?php } ?>value="<?php echo $row['catId']; ?>"> <?php echo $row['categoryName'];?></option>
							<?php } } ?>
					</select>
				</div>
				
				<div class="col-sm-2 control-label">
					Add Brand Name:
				</div>
				<div class="col-sm-4">
					<select name="brandId" id="brand_loader" class="form-control">
						<option value="">--- Select Brand Name ---</option>
							<?php 
								$brandSql = "SELECT * FROM tbl_brand";
								$brandResult = $db->select($brandSql);
								if($brandResult){
									while($row = $brandResult-> fetch_assoc()){ ?>
										<option 
											<?php if($row['brandId'] == $result['brandId']){ ?>
												selected = "selected"
											<?php } ?>value="<?php echo $row['brandId']; ?>"> <?php echo $row['brandName'];?></option>
							<?php } } ?>
					</select>
				</div>
				
			</div>
			
			<div class="form-group">
				<div class="col-sm-2 control-label">
					Type:
				</div>
				<div class="col-sm-10">
					<select name="type" id="brand_loader" class="form-control">
						<option value="">--- Select Brand Name ---</option>
						<?php 
							$idForType = $result["productId"];
							$specificType = "SELECT type FROM tbl_product WHERE productId = '$idForType'";
							$specificType = $db->select($specificType);
							$spcificRes = $specificType->fetch_assoc();?>
						<option value="<?php echo $spcificRes['type']; ?>" selected> <?php echo ucfirst($spcificRes['type']);?> Products </option>
						<option value="recent">Recent Products</option>
						<option value="popular">Popular Products</option>
						<option value="featured">Featured Products</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-2 control-label">
					Price:
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="price" value="<?php echo $result['price']; ?>"/>
				</div>
				<div class="col-sm-2 control-label">
					Discount:
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="discount" value="<?php echo $result['discount']; ?>"/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2 control-label">
					Description:
				</div>
				<div class="col-sm-10">
					<!--<textarea class="form-control" rows="20" name="description"> <?php //echo $result['description'];?></textarea> -->
					<textarea class="ckeditor" name="description"><?php echo $result['description'];?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-2 control-label">
					Upload image:
				</div>
				<div class="col-sm-10">
					<img src="<?php echo $result['image'];?>" class="img-responsive" width="200px"/>
					<code>( Image size must be width: 525px and height: 394px )</code>
					<input type="file" name="image"/>
				</div>
			</div>
			<input type="hidden" class="form-control" name="productId" value="<?php echo $result['productId']; ?>" />
			<div class="form-group text-center">
				<input type = "submit" name = "productUpdate" value = "Product Update" class = "btn btn-default" />
			</div>
			
		</form>
		
			<?php 
					} 
				}
			}else{
				echo '<div class="alert alert-danger"> <strong style="font-size:25px;">Error !</strong> 404</div>';
			}

			?>
	</div>
</div>