<?php
	require '../config/config.php';
	require '../config/database.php';
	require '../classes/format.php';
	require '../classes/function.class.php';
	$db = new Database();
	$fm = new Format();
	$os	= new Others();
?>
<?php
	if(isset($_POST['updatePage'])){
		$pageName = $_POST['pageName'];
		$pageHeading = $_POST['pageHeading'];
		$description = $_POST['description'];
		$pId = $_POST['pId'];
		$updatePage = $os->pageUpdate($pageName,$pageHeading,$description,$_FILES,$pId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal clearfix">
		<?php
			if (isset($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$getPage = $os->getPageById($id);
				if($getPage){
					while($result = $getPage->fetch_assoc()){
			?>

		<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Select Page:
				</div>
				<div class="col-sm-9">
					<select name="pageName" class="form-control" required>
						<option value="<?php echo $result['pageName'];?>"><?php echo $result['pageName'];?></option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Heading:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="pageHeading" value="<?php echo $result['pageHeading'];?>" required/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Content:
				</div>
				<div class="col-sm-9">
					<textarea class="form-control" rows="10" name="description" required><?php echo $result['description'];?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Upload image:
				</div>
				<div class="col-sm-9">
					<img src="<?php echo $result['image'];?>" class="img-responsive" width="80px" style="margin-bottom:8px" />
					<input type="file" name="image"/>
					<input type="hidden" class="form-control" name="pId" value="<?php echo $result['pId'];?>"/>
				</div>
			</div>
			<div class="form-group text-center">
				<input type = "submit" name = "updatePage" value = "Update Page" class = "btn btn-default" />
			</div>
			
		</form>

	
	<?php } } } ?>
	</div>
</div>