<?php
 	if(isset($_POST['addCategory'])){
		$categoryName = $_POST['categoryName'];
		$insertCat = $cat->catInsert($categoryName);
	}
?>

<div class="col-md-12">
<?php 
	if(isset($insertCat)){
		echo $insertCat;
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
				<input type="text" class="form-control" name="categoryName" />
			</div>
		</div>
		<div class="form-group text-center">
			<input type = "submit" name = "addCategory" value = "Add Category" class = "btn btn-default" />
			<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
		</div>
		
	</form>
</div>