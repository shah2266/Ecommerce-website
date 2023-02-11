<?php
	include 'session.php';
	Session::checkLogin();
	include_once '../config/config.php';
	include_once '../config/database.php';
	include_once 'format.php';

class adminLogin{
	
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	
	/*
	Login Check
	---------------------------------------------------*/
	public function adminLogin($userName, $password){
		$userName = $this->fm->validation($userName);
		$password = $this->fm->validation($password);
		
		$userName = mysqli_real_escape_string($this->db->link, $userName);
		$password = mysqli_real_escape_string($this->db->link, $password);
		
		if(empty($userName) || empty($password)){
			$msg = '<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error !</strong> Username or Password must not be empty!</div>';
			return $msg;
		}else{
			$query = "SELECT * FROM tbl_admin WHERE userName = '$userName' AND password = '$password'";
			$result = $this->db->select($query);
			if($result != false){
				$value = $result->fetch_assoc();
				Session::set("adminlogin", true);
				Session::set("userId", $value['userId']);
				Session::set("userName", $value['userName']);
				Session::set("email", $value['email']);
				Session::set("controlerName", $value['controlerName']);
				header("Location:index.php");
			}else{
				$msg = '<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error !</strong> Username and password dosn\'t match!</div>';
				return $msg;
			}
		}
	}

}
?>