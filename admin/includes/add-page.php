<?php
 	if(isset($_POST['addPage'])){
		$pageInsert = $os->pageInsert($_POST,$_FILES);
	}
?>

<div class="col-md-12">
<?php 
	if(isset($pageInsert)){
		echo $pageInsert;
	}
?>
</div>
<div class="col-md-12 form-horizontal">
	<form action = "" method = "POST" enctype = "multipart/form-data">
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Select Page:
			</div>
			<div class="col-sm-10">
				<select name="pageName" class="form-control" required>
					<option value="">--- Select page name ---</option>
					<option value="about">About</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Heading:
			</div>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="pageHeading" required/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Content:
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
				<input type="file" name="image"/>
				<input type="hidden" class="form-control" name="pageId"/>
			</div>
		</div>
		<div class="form-group text-center">
			<input type = "submit" name = "addPage" value = "Add page" class = "btn btn-default" />
			<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
		</div>
		
	</form>
</div>