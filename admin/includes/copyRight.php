<?php
	if(isset($_POST['copyRight'])){
		$crId = $_POST['crId'];
		$text = $_POST['text'];
		$copyRightUpdate = $cat->copyRightUpdate($text,$crId);
	}
?>
<?php 
	if(isset($copyRightUpdate)){
		echo $copyRightUpdate;
	}
?>
<div class="row">
	<div class="col-md-12 logoUpdate clearfix text-center">
			<?php
				$showAddress = $cat->showCopyRight();
				
				if($showAddress){
					$i = 0;
					while($result = $showAddress->fetch_assoc()){
						$i++;
				?>
			<form action = "" method = "POST" class="form-horizontal" enctype = "multipart/form-data">
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Text:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="text" value="<?php echo $result['text']; ?>"/>
						<input type="hidden" class="form-control" name="crId" value="<?php echo $result['crId']; ?>" />
					</div>
				</div>
				<div class="form-group text-center">
					<input type = "submit" name = "copyRight" value = "Update" class = "btn btn-default" />
				</div>
				
			</form>
		<?php } } ?>
	</div>
</div>