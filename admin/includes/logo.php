<?php
	if(isset($_POST['updateLogo'])){
		$logoId = $_POST['logoId'];
		$updatelogo = $cat->logoUpdate($_FILES,$logoId);
	}
?>
<?php 
	if(isset($updatelogo)){
		echo $updatelogo;
	}
?>
<div class="row">
	<div class="col-md-12 logoUpdate clearfix text-center">
			<?php
				$showLogo = $cat->showLogo();
				
				if($showLogo){
					$i = 0;
					while($result = $showLogo->fetch_assoc()){
						$i++;
				?>
			<form action = "" method = "POST" enctype = "multipart/form-data">
				<div class="form-group">
						<img src="<?php echo $result['logo'];?>" class="img-responsive" width="150px" style="margin-bottom:8px"/>
						<input type="file" name="logo"/>
						<input type="hidden" class="form-control" name="logoId" value="<?php echo $result['logoId']; ?>" />
				</div>
				<div class="form-group text-center">
					<input type = "submit" name = "updateLogo" value = "Update Logo" class = "btn btn-default" />
				</div>
				
			</form>
		<?php } } ?>
	</div>
</div>