<?php
	$dirpath = realpath(dirname(__FILE__));
	include_once ($dirpath.'/../config/config.php');
	include_once ($dirpath.'/../config/database.php');
	include_once 'format.php';
?>

<?php
	date_default_timezone_set('Asia/Dhaka');	
	class Others{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		/*
		Sign up
		---------------------------------------------------*/
		public function signUp($data){
			$controlerName	= $this->fm->validation($data['controlerName']);
			$email			= $this->fm->validation($data['email']);
			$contact		= $this->fm->validation($data['contact']);
			$userName		= $this->fm->validation($data['userName']);
			$password		= $this->fm->validation($data['password']);
			$level			= $this->fm->validation($data['level']);
			
			$controlerName	= mysqli_real_escape_string($this->db->link, $controlerName);
			$email			= mysqli_real_escape_string($this->db->link, $email);
			$contact		= mysqli_real_escape_string($this->db->link, $contact);
			$userName		= mysqli_real_escape_string($this->db->link, $userName);
			$password		= mysqli_real_escape_string($this->db->link, md5($password));
			$level			= mysqli_real_escape_string($this->db->link, $level);
			$dateTime		= date("Y-m-d h:i:s");
			
		if(empty($controlerName) || empty($email)  || empty($contact) || empty($userName) || empty($password) || empty($level)){
				$msg = '<div class="alert alert-warning text-center">All Fields are required</div>';
				return $msg;
			}else{
				$query 	= "INSERT INTO tbl_admin (controlerName,email,contact,userName,password,level,dateTime) VALUES ('$controlerName','$email','$contact','$userName','$password','$level','$dateTime')";
				$signinsert = $this->db->insert($query);
				
				if($signinsert){
					$msg = '<div class="alert alert-success text-center">Successfully Sign Up</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger text-center"> Sign Up failed</div>';
					return $msg;
				}
			}
		}
	
		/*
		Show user profile
		---------------------------------------------------*/
		public function showUser(){
			$query 	= "SELECT * FROM tbl_admin ORDER BY userId ASC";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Collect User by Id
		---------------------------------------------------*/
		public function getUserById($id){
			$query 	= "SELECT * FROM tbl_admin WHERE userId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Collect Category Id
		---------------------------------------------------*/
		public function getCatById($id){
			$query 	= "SELECT * FROM tbl_category WHERE catId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		User Update
		---------------------------------------------------*/
		public function userUpdate($data,$id){
			$controlerName	= $this->fm->validation($data['controlerName']);
			$email			= $this->fm->validation($data['email']);
			$contact		= $this->fm->validation($data['contact']);
			$userName		= $this->fm->validation($data['userName']);
			$password		= $this->fm->validation($data['password']);
			$level			= $this->fm->validation($data['level']);
			
			$controlerName	= mysqli_real_escape_string($this->db->link, $controlerName);
			$email			= mysqli_real_escape_string($this->db->link, $email);
			$contact		= mysqli_real_escape_string($this->db->link, $contact);
			$userName		= mysqli_real_escape_string($this->db->link, $userName);
			$password		= mysqli_real_escape_string($this->db->link, md5($password));
			$level			= mysqli_real_escape_string($this->db->link, $level);
			$id				= mysqli_real_escape_string($this->db->link, $id);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			if(empty($controlerName) || empty($email)  || empty($contact) || empty($userName) || empty($password) || empty($level)){
				echo '<script>alert("All Fileds are required")</script>';
				echo '<script>window.location.assign("index.php?page=user-profile");</script>';
			}else{
				$query = "UPDATE tbl_admin
						SET 
						controlerName	= '$controlerName',
						email		 	= '$email',
						contact 		= '$contact',
						userName 		= '$userName',
						password 		= '$password',
						level 			= '$level',
						updateDateTime 	= '$updateDateTime'
						WHERE userId 	= '$id'";
						
				$updated_row = $this->db->update($query);
				if($updated_row){
					echo '<script>alert("User profile Updated!")</script>';
					echo '<script>window.location.assign("index.php?page=user-profile");</script>';
				}else{
					echo '<script>alert("User update failed!")</script>';
					echo '<script>window.location.assign("index.php?page=user-profile");</script>';
				}
			}
		}
		
		/*
		Delete user profile
		---------------------------------------------------*/
		public function delUserprofileById($id){
			$query 	= "DELETE FROM tbl_admin WHERE userId = '$id'";
			$deldata 	= $this->db->delete($query);
			if($deldata){
				echo '<script>alert("User Profile Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=user-profile");</script>';
			}else{
				echo '<script>alert("User Profile Delete failed!")</script>';
				echo '<script>window.location.assign("index.php?page=user-profile");</script>';
			}
		}
		
		
		/*
		Contact Form
		---------------------------------------------------*/
		public function contactInsert($data){
			$firstName = $this->fm->validation($data['firstName']);
			$lastName = $this->fm->validation($data['lastName']);
			$email = $this->fm->validation($data['email']);
			$contact = $this->fm->validation($data['contact']);
			$message = $this->fm->validation($data['message']);
			
			$firstName = mysqli_real_escape_string($this->db->link, $firstName);
			$lastName = mysqli_real_escape_string($this->db->link, $lastName);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$contact = mysqli_real_escape_string($this->db->link, $contact);
			$message = mysqli_real_escape_string($this->db->link, $message);
			$dateTime	= date("Y-m-d h:i:s");
			$status = 1;
			
			$error = "";
			if(empty($firstName)){
				$error = '<div class="alert alert-warning">Please enter first name.</div>';
				return $error;
			}elseif(empty($lastName)){
				$error = '<div class="alert alert-warning">Please enter last name.</div>';
				return $error;
			}elseif(empty($email)){
				$error = '<div class="alert alert-warning">Please enter email.</div>';
				return $error;
			}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$error = '<div class="alert alert-warning">Please enter valid email.</div>';
				return $error;
			}elseif(empty($contact)){
				$error = '<div class="alert alert-warning">Please enter contact.</div>';
				return $error;
			}elseif(empty($message)){
				$error = '<div class="alert alert-warning">Please enter message.</div>';
				return $error;
			}else{
				$conquery 	= "INSERT INTO tbl_contact (firstName,lastName,email,contact,message,dateTime,status) VALUES ('$firstName','$lastName','$email','$contact','$message','$dateTime','$status')";
				$coninsert 	= $this->db->insert($conquery);
				
				if($coninsert){
					$msg = '<div class="alert alert-success"> Thanks for your message</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> There is a problem to send mail.!Try again later</div>';
					return $msg;
				}
			}
			
			
			/*
			$firstName = $this->fm->validation($data['firstName']);
			$lastName = $this->fm->validation($data['lastName']);
			$email = $this->fm->validation($data['email']);
			$contact = $this->fm->validation($data['contact']);
			$message = $this->fm->validation($data['message']);
			
			$firstName = mysqli_real_escape_string($this->db->link, $firstName);
			$lastName = mysqli_real_escape_string($this->db->link, $lastName);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$contact = mysqli_real_escape_string($this->db->link, $contact);
			$message = mysqli_real_escape_string($this->db->link, $message);
			$dateTime	= date("Y-m-d h:i:s");
			$status = 1;
			
			//message display
			$errorFn = "";
			$errorLn = "";
			$errorEm = "";
			$errorEmv = "";
			$errorCon = "";
			$errorMsg = "";
			
			if(empty($firstName)){
				$errorFn = '<div class="alert alert-warning">Please enter first name.</div>';
				return $errorFn;
			}
			if(empty($lastName)){
				$errorLn = '<div class="alert alert-warning">Please enter last name.</div>';
				return $errorLn;
			}
			if(empty($email)){
				$errorEm = '<div class="alert alert-warning">Please enter email.</div>';
				return $errorEm;
			}
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$errorEmv = '<div class="alert alert-warning">Please enter valid email.</div>';
				return $errorEmv;
			}
			if(empty($contact)){
				$errorConr = '<div class="alert alert-warning">Please enter contact.</div>';
				return $errorCon;
			}
			if(empty($message)){
				$errorMsg = '<div class="alert alert-warning">Please enter message.</div>';
				return $errorMsg;
			}else{
				$conquery 	= "INSERT INTO tbl_contact (firstName,lastName,email,contact,message,dateTime,status) VALUES ('$firstName','$lastName','$email','$contact','$message','$dateTime','$status')";
				$coninsert 	= $this->db->insert($conquery);
				
				if($coninsert){
					$msg = '<div class="alert alert-success"> Thanks for your message</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> There is a problem to send mail.!Try again later</div>';
					return $msg;
				}
			}
			*/
		}
		
		/*
		Show Inbox emailId
		---------------------------------------------------*/
		public function getEmailById($id){
			$query 	= "SELECT * FROM tbl_contact WHERE contactId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Send mail OR Replay Inbox mail
		---------------------------------------------------*/
		public function getSendEmail($data,$id){
			$to				= $this->fm->validation($data['email']);
			$subject 		= $this->fm->validation($data['subject']);
			
			$to				= mysqli_real_escape_string($this->db->link, $to);
			$subject		= mysqli_real_escape_string($this->db->link, $subject);
			$message 		= strip_tags($data['description']);
			
			$from = 'info@demo.com';
			
			//email headers
			$headers	 = "From: ".$from."\r\n";
			$headers	.= "Replay-To: ".$from."\r\n";
			$headers 	.= "CC: info@demo.com\r\n";
			$headers	.= "X-Mailer: PHP/" . phpversion()."\r\n";
			$headers	.= 'MIME-Version: 1.0';
			$headers	.= 'Content-type: text/html; charset=iso-8859-1';
			
			$sendEmail = @mail($to,$subject,$message,$headers);
			if($sendEmail){
				$msg = '<div class="alert alert-success"><i class="fa fa-check"></i> Mail Send Successfully! <a href="index.php?page=show-email">Show Mail Inbox</a></div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><i class="fa fa-warning"></i> <strong>Error! </strong> There was a problem to send mail!</div>';
				return $msg;
			}
			
		}
		
		/*
		Show Order email
		---------------------------------------------------*/
		public function getOrderEmailById($id){
			$query 	= "SELECT * FROM tbl_order WHERE orderId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Send mail OR Replay Order mail
		---------------------------------------------------*/
		public function sendEmailOrder($data,$id){
			$to				= $this->fm->validation($data['email']);
			$subject 		= $this->fm->validation($data['subject']);
			
			$to				= mysqli_real_escape_string($this->db->link, $to);
			$subject		= mysqli_real_escape_string($this->db->link, $subject);
			$message 		= strip_tags($data['description']);
			
			$from = 'info@demo.com';
			
			//email headers
			$headers	 = "From: ".$from."\r\n";
			$headers	.= "Replay-To: ".$from."\r\n";
			$headers 	.= "CC: info@demo.com\r\n";
			$headers	.= "X-Mailer: PHP/" . phpversion()."\r\n";
			$headers	.= 'MIME-Version: 1.0';
			$headers	.= 'Content-type: text/html; charset=iso-8859-1';
			
			$sendEmail = @mail($to,$subject,$message,$headers);
			if($sendEmail){
				$msg = '<div class="alert alert-success"><i class="fa fa-check"></i> Mail Send Successfully! <a href="index.php?page=show-order">Show Mail Inbox</a></div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><i class="fa fa-warning"></i> <strong>Error! </strong> There was a problem to send mail!</div>';
				return $msg;
			}
			
		}
		
		/*
		Show email in admin panel
		---------------------------------------------------*/	
		public function showEmail(){
			$query 	= "SELECT * FROM tbl_contact ORDER BY contactId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Delete email from admin panel
		---------------------------------------------------*/
		public function delEmailById($id){
			$query 	= "DELETE FROM tbl_contact WHERE contactId = '$id'";
			$deldata 	= $this->db->delete($query);
			if($deldata){
				echo '<script>alert("Email Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=show-email");</script>';
			}else{
				echo '<script>alert("Email Delete failed!")</script>';
				echo '<script>window.location.assign("index.php?page=show-email");</script>';
			}
		}
		
		
		/*
		Page Insert Methods 
		---------------------------------------------------*/		
		public function pageInsert($data,$file){
			$pageName		= $this->fm->validation($data['pageName']);
			$pageHeading	= $this->fm->validation($data['pageHeading']);
			
			$pageName		= mysqli_real_escape_string($this->db->link, $pageName);
			$pageHeading	= mysqli_real_escape_string($this->db->link, $pageHeading);
			$description	= $data['description'];
			$dateTime		= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/page/".$unique_image;
			
			if(empty($pageName) || empty($pageHeading) || empty($description)){
				$msg = '<div class="alert alert-warning text-center">All Fields are required</div>';
				return $msg;
			}else{
				if(!empty($file_name)){
					if($file_size > 1048567){
						$msg = '<div class="alert alert-danger text-center"> Image Size should be less then 1 MB</div>';
						return $msg;
					}elseif(in_array($file_ext, $permited) === false){
						$msg = '<div class="alert alert-danger text-center">You can upload only:-'.implode(', ',$permited).'</div>';
						return $msg;
					}else{
						move_uploaded_file($file_temp,$uploaded_image);
						$pagequery 	= "INSERT INTO tbl_page(pageName, pageHeading,description,image,dateTime) VALUES('$pageName','$pageHeading','$description','$uploaded_image','$dateTime')";
						$pageinsert	= $this->db->insert($pagequery);
						
						if($pageinsert){
							$msg = '<div class="alert alert-success text-center"> Page Inserted Successfully</div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger text-center"> Page Not Inserted</div>';
							return $msg;
						}
					}
				}else{
					$pagequery 	= "INSERT INTO tbl_page(pageName, pageHeading,description,dateTime) VALUES('$pageName','$pageHeading','$description','$dateTime')";
					$pageinsert	= $this->db->insert($pagequery);
					
					if($pageinsert){
						$msg = '<div class="alert alert-success text-center"> Page Inserted Successfully</div>';
						return $msg;
					}else{
						$msg = '<div class="alert alert-danger text-center"> Page Not Inserted</div>';
						return $msg;
					}
				}
			}
		}
		
		/*
		Page Update Methods 
		---------------------------------------------------*/	
		public function pageUpdate($pageName,$pageHeading,$description,$file,$pId){
			$pageName		= $this->fm->validation($pageName);
			$pageHeading 	= $this->fm->validation($pageHeading);
			
			$pageName 		= mysqli_real_escape_string($this->db->link, $pageName);
			$pageHeading 	= mysqli_real_escape_string($this->db->link, $pageHeading);
			$description	= $description;
			
			$updateDateTime	= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/page/".$unique_image;
			
			if($pageName == "" || $pageHeading == "" || $description == ""){
				$msg = '<div class="alert alert-warning text-center">Field must not be empty</div>';
				return $msg;
			}else{
				if(!empty($file_name)){
					if($file_size > 1048567){
						echo '<script>alert("Image Size should be less then 1 MB!")</script>';
						echo '<script>window.location.assign("index.php?page=show-pages");</script>';
					}elseif(in_array($file_ext, $permited) === false){
						echo '<script>alert("You can upload only:- jpg,jpeg,png, gif")</script>';
						echo '<script>window.location.assign("index.php?page=show-pages");</script>';
					}else{
						$imgremovesql = "SELECT image from tbl_page where pId='$pId'";
						$res = $this->db->select($imgremovesql);
						$res = $res->fetch_assoc();
						move_uploaded_file($file_temp,$uploaded_image);
						unlink($res['image']);
						
						$query = "UPDATE tbl_page
									SET
									pageName ='$pageName',
									pageHeading = '$pageHeading',
									description ='$description',
									image ='$uploaded_image',
									updateDateTime = '$updateDateTime'
									WHERE pId = '$pId'
									";
						
						$query_row	= $this->db->update($query);
						
						if($query_row){
							echo '<script>alert("Page Updated Successfully!")</script>';
							echo '<script>window.location.assign("index.php?page=show-pages");</script>';
						}else{
							echo '<script>alert("Page Not Updated!")</script>';
							echo '<script>window.location.assign("index.php?page=show-pages");</script>';
						}
					}
				}else{
					$query = "UPDATE tbl_page
									SET
									pageName ='$pageName',
									pageHeading = '$pageHeading',
									description ='$description',
									updateDateTime = '$updateDateTime'
									WHERE pId = '$pId'
									";
					
					$query_row	= $this->db->update($query);
					if($query_row){
						echo '<script>alert("Page Updated Successfully")</script>';
						echo '<script>window.location.assign("index.php?page=show-pages");</script>';
					}else{
						echo '<script>alert("Page Not Updated!")</script>';
						echo '<script>window.location.assign("index.php?page=show-pages");</script>';
					}
				}
			}
		}
		
		
		/*
		Show Page List
		---------------------------------------------------*/	
		public function showPage(){
			$query 	= "SELECT * FROM tbl_page ORDER BY pId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Delete Page
		---------------------------------------------------*/
		public function delPageById($id){
			
			$psql = "SELECT * FROM tbl_page WHERE pId = '$id'";
			$psql = $this->db->select($psql);
			if($psql){
				while($pimg = $psql->fetch_assoc()){
					$pimg = $pimg['image'];
					unlink($pimg);
				}
			}
			$query 		= "DELETE FROM tbl_page WHERE pId = '$id'";
			$deldata 	= $this->db->delete($query);
			if($deldata){
				echo '<script>alert("Page Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=show-pages");</script>';
			}else{
				echo '<script>alert("Page Delete failed!")</script>';
				echo '<script>window.location.assign("index.php?page=show-pages");</script>';
			}
		}
		
		/*
		Collect Page By Id
		---------------------------------------------------*/	
		public function getPageById($id){
			$query 	= "SELECT * FROM tbl_page WHERE pId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Search Query
		---------------------------------------------------*/
		public function search($id){
			$query 	= "SELECT * FROM tbl_product WHERE productName LIKE '$id%' OR description LIKE '$id%' OR price LIKE '$id%'";
			$result = $this->db->select($query);
			return $result;
		}		
	}	
?>