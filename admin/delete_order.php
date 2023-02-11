<?php
	require '../config/config.php';
	require '../config/database.php';
	require '../classes/format.php';
	require '../classes/cart.class.php';
	$db = new Database();
	$fm = new Format();
	$ct	= new Cart();
?>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$delOrder = $ct->delOrderById($id);
	}
?>