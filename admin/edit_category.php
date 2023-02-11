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
	if(isset($_POST['updateCat'])){
		$categoryName = $_POST['categoryName'];
		$catId = $_POST['catId'];
		$updateCat = $cat->categoryUpdate($categoryName,$catId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal clearfix">
		<?php
			if (isset($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$showCategory = $cat->getCatById($id);
				if($showCategory){
					while($result = $showCategory->fetch_assoc()){
			?>

		<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Category Name:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="categoryName" value="<?php echo $result['categoryName']; ?>" required/>
					<input type="hidden" class="form-control" name="catId" value="<?php echo $result['catId']; ?>" />
				</div>
			</div>
			<div class="form-group text-center">
				<input type = "submit" name = "updateCat" value = "Update Category Name" class = "btn btn-default" />
			</div>
			
		</form>

	
	<?php } } } ?>
	</div>
</div>