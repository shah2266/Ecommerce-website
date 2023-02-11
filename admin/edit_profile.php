<?php
	require '../config/config.php';
	require '../config/database.php';
	require '../classes/format.php';
	require '../classes/function.class.php';
	$db = new Database();
	$fm = new Format();
	$os	= new Others();
?>
<?php
	if(isset($_POST['updateUser'])){
		$userId = $_POST['userId'];
		$updateUser = $os->userUpdate($_POST,$userId);
	}
?>
<div class="row">
	<div class="col-md-12 form-horizontal clearfix">
		<?php
			if (isset($_REQUEST['id'])) {
				$id = intval($_REQUEST['id']);
				$showUser = $os->getUserById($id);
				if($showUser){
					while($result = $showUser->fetch_assoc()){
			?>

		<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" enctype = "multipart/form-data">
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Controler Name:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="controlerName" value="<?php echo $result['controlerName']; ?>" required/>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Email:
				</div>
				<div class="col-sm-9">
					<input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>" required/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Contact:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="contact" value="<?php echo $result['contact']; ?>" required/>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-3 control-label">
					User Name:
				</div>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="userName" value="<?php echo $result['userName']; ?>" required/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					Password:
				</div>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="password" value="<?php echo $result['password']; ?>" required/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-3 control-label">
					User permission Level:
				</div>
				<div class="col-sm-9">
					<select name="level" class="form-control" required>
						<option value="<?php echo $result['level']; ?>"><?php echo $result['level']; ?></option>
						<option value="1"> Is Admin</option>
						<option value="2"> General</option>
						<option value="3"> General 2</option>
					</select>
					<input type="hidden" class="form-control" name="userId" value="<?php echo $result['userId']; ?>"/>
				</div>
			</div>
			<div class="form-group text-center">
				<input type = "submit" name = "updateUser" value = "Update user profile" class = "btn btn-default" />
			</div>
			
		</form>

	
	<?php } } } ?>
	</div>
</div>