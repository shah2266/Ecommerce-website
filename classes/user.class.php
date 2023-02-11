<?php
	$dirpath = realpath(dirname(__FILE__));
	include_once ($dirpath.'/../config/config.php');
	include_once ($dirpath.'/../config/database.php');
	include_once 'format.php';
?>
<?php
	class User{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
	}
?>