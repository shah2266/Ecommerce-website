<?php
	if(isset($_POST['updateSocialLink'])){
		$sLinkId = $_POST['sLinkId'];
		$updateSocialLink = $cat->socialLink($_POST,$sLinkId);
	}
?>
<?php 
	if(isset($updateSocialLink)){
		echo $updateSocialLink;
	}
?>
<div class="row">
	<div class="col-md-12 logoUpdate clearfix text-center">
			<?php
				$showSocialLink = $cat->showSocialLink();
				
				if($showSocialLink){
					$i = 0;
					while($result = $showSocialLink->fetch_assoc()){
						$i++;
				?>
			<form action = "" method = "POST" class="form-horizontal" enctype = "multipart/form-data">
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Facebook:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="facebook" value="<?php echo $result['facebook']; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Youtube:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="youtube" value="<?php echo $result['youtube']; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Twitter:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="twitter" value="<?php echo $result['twitter']; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Google-Plus:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="googlePlus" value="<?php echo $result['googlePlus']; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Instagram:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="instagram" value="<?php echo $result['instagram']; ?>"/>
						<input type="hidden" class="form-control" name="sLinkId" value="<?php echo $result['sLinkId']; ?>" />
					</div>
				</div>
				<div class="form-group text-center">
					<input type = "submit" name = "updateSocialLink" value = "Update Social Link" class = "btn btn-default" />
					<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
				</div>
				
			</form>
		<?php } } ?>
	</div>
</div>