<?php require 'includes/header.php'; ?>
		<?php
			if(isset($_GET['pid']) AND !empty($_GET['pid'])){
				$subPages = urldecode($_GET['pid']);
				$pageName = 'includes/'.$subPages.'.php';
				if(file_exists($pageName)){
					include($pageName);
				}else{
					include('includes/404.php');
				}
			}else{
				include('includes/home.php');
			}
		?>
<?php require 'includes/footer.php'; ?>