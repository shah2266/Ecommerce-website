<?php
	require '../config/config.php';
	require '../config/database.php';
	require '../classes/format.php';
	require '../classes/category.php';
	$db = new Database();
	$fm = new Format();
	$cat = new Category();
?>
<?php
	if(isset($_POST['updateBrand'])){
		$categoryName = $_POST['categoryName'];
		$brandName = $_POST['brandName'];
		$brandId = $_POST['brandId'];
		$updateBrand = $cat->brandUpdate($categoryName,$brandName,$_FILES,$brandId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal clearfix">
		<?php
			if (isset($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$getBrand = $cat->getBrandById($id);
				if($getBrand){
					while($result = $getBrand->fetch_assoc()){
			?>

		<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Category Name:
				</div>
				<div class="col-sm-9">
					<select name="categoryName" class="form-control">
						<option value="<?php echo $result['categoryName']; ?>"><?php  echo $result['categoryName']; ?></option>
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
					Brand Name:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="brandName" value="<?php echo $result['brandName']; ?>" required/>
					<input type="hidden" class="form-control" name="brandId" value="<?php echo $result['brandId']; ?>" />
				</div>
			</div>
			<div class="form-group">
			<div class="col-sm-3 control-label">
				Brand Logo:
			</div>
			<div class="col-sm-9">
				<img src="<?php echo $result['image'];?>" class="img-responsive" width="80px" style="margin-bottom:8px"/>
				<input type="file" name="image"/>
			</div>
		</div>
			<div class="form-group text-center">
				<input type = "submit" name = "updateBrand" value = "Update Brand Name" class = "btn btn-default" />
			</div>
			
		</form>

	
	<?php } } } ?>
	</div>
</div>