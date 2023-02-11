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
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$delUser = $os->delUserprofileById($id);
	}
?>