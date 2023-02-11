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
	if(isset($_POST['updateWidget'])){
		$widgetId = $_POST['widgetId'];
		$updateWidgets = $cat->widgetsUpdate($_POST,$widgetId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal clearfix">
		<?php
			if (isset($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$showWidgets = $cat->getWidgetById($id);
				if($showWidgets){
					while($result = $showWidgets->fetch_assoc()){
			?>
			<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
			
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Icon <strong>(fa fa-<em>Your Icon Name</em>)</strong>:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="iconName" value="<?php echo $result['iconName']; ?>" maxlength="15" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Heading:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="widgetheading" value="<?php echo $result['widgetheading']; ?>" maxlength="18" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Content:
					</div>
					<div class="col-sm-9">
						<textarea class="form-control" name="content" maxlength="25" required ><?php echo $result['content']; ?></textarea>
						<input type="hidden" class="form-control" name="widgetId" value="<?php echo $result['widgetId']; ?>"/>
					</div>
				</div>
				
				<div class="form-group text-center">
					<input type = "submit" name = "updateWidget" value = "Update Widgets" class = "btn btn-default" />
				</div>
				
			</form>
	
	<?php } } } ?>
	</div>
</div>