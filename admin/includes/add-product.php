<?php
 	if(isset($_POST['addProduct'])){
		$productInsert = $pd->productInsert($_POST,$_FILES);
	}
?>
<div class="col-md-12">
<?php 
	if(isset($productInsert)){
		echo $productInsert;
	}
?>
</div>
<div class="col-md-12 form-horizontal">
	<form action = "" method = "POST" enctype = "multipart/form-data">
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Product Name:
			</div>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="productName" placeholder="Enter your product name" required/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Category Name:
			</div>
			<div class="col-sm-4">
				<select name="catId" id="call_brand_loader" class="form-control">
						<option value="">--- Select Category Name ---</option>
						<?php 
							$catName = "SELECT * FROM tbl_category";
							$catNameResult = $db->select($catName);
							if($catNameResult){
								while($row = $catNameResult-> fetch_assoc()){ ?>
									<option value="<?php echo $row['catId'];?>"><?php echo $row['categoryName'];?></option>
						<?php } } ?>
				</select>
			</div>
			<div class="col-sm-2 control-label">
				Add Brand Name:
			</div>
			<div class="col-sm-4">
				<select name="brandId" id="brand_loader" class="form-control">
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Type:
			</div>
			<div class="col-sm-10">
				<select name="type" class="form-control">
					<option value="">--- Select Select Name ---</option>
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
				<input type="text" class="form-control" name="price" placeholder="Enter product price" required />
			</div>
			<div class="col-sm-2 control-label">
				Discount:
			</div>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="discount" placeholder="Enter Discount Amount (in any)" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Description:
			</div>
			<div class="col-sm-10">
				<textarea class="ckeditor" name="description"></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Upload image:
			</div>
			<div class="col-sm-10">
				<code>( Image size must be width: 525px and height: 394px )</code>
				<input type="file" name="image" required/>
			</div>
		</div>
		<div class="form-group text-center">
			<input type = "submit" name = "addProduct" value = "Save" class = "btn btn-default" />
			<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
		</div>
		
	</form>
</div>