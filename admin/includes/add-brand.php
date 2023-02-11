<?php
 	if(isset($_POST['addBrand'])){
		$catName = $_POST['categoryName'];
		$brandName = $_POST['brandName'];
		$brandNameResult = $cat->brandInsert($catName,$brandName,$_FILES);
	}
?>

<div class="col-md-12">
<?php 
	if(isset($brandNameResult)){
		echo $brandNameResult;
	}
?>
</div>
<div class="col-md-12 form-horizontal">
	<form action = "" method = "POST" enctype = "multipart/form-data">
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Category Name:
			</div>
			<div class="col-sm-9">
				<select name="categoryName" class="form-control" required>
						<option value="">--- Select Category Name ---</option>
						<?php 
							$catName = "SELECT * FROM tbl_category";
							$catNameResult = $db->select($catName);
							if($catNameResult){
								while($row = $catNameResult-> fetch_assoc()){ ?>
									<option value="<?php echo $row['categoryName'];?>"><?php echo $row['categoryName'];?></option>
						<?php } } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Add Brand Name:
			</div>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="brandName" required/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Brand Logo:
			</div>
			<div class="col-sm-9">
				<input type="file" name="image"/>
			</div>
		</div>
		<div class="form-group text-center">
			<input type = "submit" name = "addBrand" value = "Add Brand" class = "btn btn-default" />
			<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
		</div>
		
	</form>
</div>