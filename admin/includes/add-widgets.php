<?php
 	if(isset($_POST['addWidget'])){
		$insertWidget = $cat->widgetSinsert($_POST);
	}
?>

<div class="col-md-12">
<?php 
	if(isset($insertWidget)){
		echo $insertWidget;
	}
?>
</div>
<div class="col-md-12 form-horizontal">
	<form action = "" method = "POST" enctype = "multipart/form-data">
		
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Icon <strong>(fa fa-<em>Your Icon Name</em>)</strong>:
			</div>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="iconName" placeholder="Only font awesome icon name"  maxlength="15" required/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Heading:
			</div>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="widgetheading" placeholder="Add your service name here"  maxlength="18" required/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Content:
			</div>
			<div class="col-sm-9">
				<textarea class="form-control" name="content" placeholder="Add Service related content (e.g: content shortest)" maxlength="25" required ></textarea>
			</div>
		</div>
		
		<div class="form-group text-center">
			<input type = "submit" name = "addWidget" value = "Add Widgets" class = "btn btn-default" />
			<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
		</div>
		
	</form>
</div>