<?php
	require '../config/config.php';
	require '../config/database.php';
	require '../classes/format.php';
	require '../classes/product.class.php';
	$db = new Database();
	$fm = new Format();
	$pd = new Product();
?>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$delProduct = $pd->delProductById($id);
	}
?>