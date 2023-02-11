<?php
	if(isset($_POST['sendMail'])){
		$contactId = $_POST['contactId'];
		$sendMail = $os->getSendEmail($_POST,$contactId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal">
		<?php
			if(isset($sendMail)){
				echo $sendMail;
			}
		?>
		<?php
			if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$getEmail = $os->getEmailById($id);
				if($getEmail){
					while($result = $getEmail->fetch_assoc()){
		?>
		<form action = "" method = "POST" enctype = "multipart/form-data">
			<div class="form-group">
				<div class="col-sm-2 control-label">
					To email:
				</div>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" value="<?php echo $result['email'];?>"/>
				</div>
			</div>				
			
			<div class="form-group">
				<div class="col-sm-2 control-label">
					Subject:
				</div>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="subject" placeholder="Enter mail subject" required/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2 control-label">
					Message:
				</div>
				<div class="col-sm-10">
					<textarea class="ckeditor" name="description"></textarea>
				</div>
			</div>
			<input type="hidden" class="form-control" name="contactId" value="<?php echo $result['contactId']; ?>" />
			<div class="form-group text-center">
				<input type = "submit" name = "sendMail" value = "Send Mail" class = "btn btn-default" />
			</div>
			
		</form>
		
			<?php 
					} 
				}
			}else{
				echo '<div class="alert alert-danger"> <strong style="font-size:25px;">Error !</strong> 404</div>';
			}

			?>
	</div>
</div>