<?php
	require '../config/config.php';
	require '../config/database.php';
	require '../classes/format.php';
	require '../classes/category.php';
	$db = new Database();
	$fm = new Format();
	$cat = new Category();
?>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$delCat = $cat->delSlideById($id);
	}
?>