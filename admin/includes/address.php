<?php
	if(isset($_POST['updateAddress'])){
		$addressId = $_POST['addressId'];
		$addressUpdate = $cat->addressUpdate($_POST,$addressId);
	}
?>
<?php 
	if(isset($addressUpdate)){
		echo $addressUpdate;
	}
?>
<div class="row">
	<div class="col-md-12 logoUpdate clearfix text-center">
			<?php
				$showAddress = $cat->showAddress();
				
				if($showAddress){
					$i = 0;
					while($result = $showAddress->fetch_assoc()){
						$i++;
				?>
			<form action = "" method = "POST" class="form-horizontal" enctype = "multipart/form-data">
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Address:
					</div>
					<div class="col-sm-9">
						<textarea class="form-control" name="address"><?php echo $result['address']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Contact:
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="contact" value="<?php echo $result['contact']; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 control-label">
						Email:
					</div>
					<div class="col-sm-9">
						<input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>"/>
						<input type="hidden" class="form-control" name="addressId" value="<?php echo $result['addressId']; ?>" />
					</div>
				</div>
				<div class="form-group text-center">
					<input type = "submit" name = "updateAddress" value = "Save" class = "btn btn-default" />
					<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
				</div>
				
			</form>
		<?php } } ?>
	</div>
</div>