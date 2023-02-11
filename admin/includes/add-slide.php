<?php
 	if(isset($_POST['addSlide'])){
		$addSlide = $cat->slideInsert($_POST,$_FILES);
	}
?>

<div class="col-md-12">
<?php 
	if(isset($addSlide)){
		echo $addSlide;
	}
?>
</div>
<div class="col-md-12 form-horizontal">
	<form action = "" method = "POST" enctype = "multipart/form-data">
		<div class="form-group">
			<div class="col-sm-2 control-label">
				Title:
			</div>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" required/>
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
				Upload Slide image:
			</div>
			<div class="col-sm-10">
				<input type="file" name="image" required/>
				<input type="hidden" class="form-control" name="sliderId"/>
			</div>
		</div>
		<div class="form-group text-center">
			<input type = "submit" name = "addSlide" value = "Add Slider" class = "btn btn-default" />
			<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
		</div>
		
	</form>
</div>