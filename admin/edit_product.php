<?php
	require '../config/config.php';
	require '../config/database.php';
	require '../classes/format.php';
	require '../classes/product.class.php';
	$db = new Database();
	$fm = new Format();
	$pd = new Product();
?>
<?php
	if(isset($_POST['productUpdate'])){
		$productId = $_POST['productId'];
		$updateBrand = $pd->productUpdate($_POST,$_FILES,$productId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal">
		<?php
			if (isset($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$getProduct = $pd->getProductById($id);
				if($getProduct){
					while($result = $getProduct->fetch_assoc()){
		?>
		<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Product Name:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="productName" value="<?php echo $result['productName'];?>"/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Category Name:
				</div>
				<div class="col-sm-9">
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
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Add Brand Name:
				</div>
				<div class="col-sm-9">
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
				<div class="col-sm-3 control-label">
					Type:
				</div>
				<div class="col-sm-9">
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
				<div class="col-sm-3 control-label">
					Price:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="price" value="<?php echo $result['price']; ?>"/>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Discount:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="discount" value="<?php echo $result['discount']; ?>"/>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Description:
				</div>
				<div class="col-sm-9">
					<textarea class="form-control" rows="20" name="description"><?php echo $result['description'];?> </textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Upload image:
				</div>
				<div class="col-sm-9">
					<img src="<?php echo $result['image'];?>" class="img-responsive" width="200px"/>
					<input type="file" name="image"/>
				</div>
			</div>
			<input type="hidden" class="form-control" name="productId" value="<?php echo $result['productId']; ?>" />
			<div class="form-group text-center">
				<input type = "submit" name = "productUpdate" value = "Update" class = "btn btn-default" />
				<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
			</div>
			
		</form>
		
			<?php } } } ?>
	</div>
</div>