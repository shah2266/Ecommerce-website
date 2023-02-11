<?php
 	if(isset($_POST['signUp'])){
		$signUp = $os->signUp($_POST);
	}
?>

<div class="col-md-12">
<?php 
	if(isset($signUp)){
		echo $signUp;
	}
?>
</div>
<div class="col-md-12 form-horizontal">
	<form action = "" method = "POST" enctype = "multipart/form-data">
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Controler Name:
			</div>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="controlerName" placeholder="Enter Controler Name" required/>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Email:
			</div>
			<div class="col-sm-9">
				<input type="email" class="form-control" name="email"  placeholder="Enter valid email" required/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Contact:
			</div>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="contact"  placeholder="Enter contact number" required/>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-3 control-label">
				User Name:
			</div>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="userName" placeholder="Enter username" required/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 control-label">
				Password:
			</div>
			<div class="col-sm-9">
				<input type="password" class="form-control" name="password"  placeholder="Enter password"required/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 control-label">
				User permission Level:
			</div>
			<div class="col-sm-9">
				<select name="level" class="form-control" required>
					<option value="">--- Select user permission Level ---</option>
					<option value="1"> Is Admin</option>
					<option value="2"> General</option>
					<option value="3"> General 2</option>
				</select>
			</div>
		</div>
		<div class="form-group text-center">
			<input type = "submit" name = "signUp" value = "Sign Up" class = "btn btn-default" />
			<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
		</div>
		
	</form>
</div>