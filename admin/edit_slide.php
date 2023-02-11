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
	if(isset($_POST['updateSlide'])){
		$title = $_POST['title'];
		$description = $_POST['description'];
		$sliderId = $_POST['sliderId'];
		$updateSlider = $cat->slideUpdate($title,$description,$_FILES,$sliderId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal clearfix">
		<?php
			if (isset($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$getSlide = $cat->getSlideById($id);
				if($getSlide){
					while($result = $getSlide->fetch_assoc()){
			?>

		<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
			<div class="form-group">
				<div class="col-sm-4 control-label">
					Title:
				</div>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="title" value="<?php echo $result['title']; ?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 control-label">
					Content:
				</div>
				<div class="col-sm-8">
					<textarea type="text" class="form-control" name="description"><?php echo $result['description']; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 control-label">
					Upload Slide image:
				</div>
				<div class="col-sm-8">
					<img src="<?php echo $result['image'];?>" class="img-responsive" width="80px" style="margin-bottom:8px" />
					<input type="file" name="image"/>
					<input type="hidden" class="form-control" name="sliderId" value="<?php echo $result['sliderId'];?>"/>
				</div>
			</div>
			<div class="form-group text-center">
				<input type = "submit" name = "updateSlide" value = "Update Slide" class = "btn btn-default" />
			</div>
			
		</form>

	
	<?php } } } ?>
	</div>
</div>