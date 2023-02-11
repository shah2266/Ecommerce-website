<?php
	$dirpath = realpath(dirname(__FILE__));
	include_once ($dirpath.'/../config/config.php');
	include_once ($dirpath.'/../config/database.php');
	include_once 'format.php';
?>
<?php
	date_default_timezone_set('Asia/Dhaka');
	class Cart{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		
		/*
		Insert Cart Product
		---------------------------------------------------*/
		public function addToCart($quantity, $id){
			$quantity 	= $this->fm->validation($quantity);
			
			$quantity 	= mysqli_real_escape_string($this->db->link, $quantity);
			$productId 	= mysqli_real_escape_string($this->db->link, $id);
			$sessionId 	= session_id();
			$dateTime	= date("Y-m-d h:i:s");
			
			$query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
			$result = $this->db->select($query)->fetch_assoc();
			$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];
			
			if($quantity >= 0){
				$chkquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sessionId = '$sessionId'";
				
				$getPro = $this->db->select($chkquery);
				
				if($getPro){
					$msg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Failed !</strong> Product Already Added.</div>';
					$msg .= '<a href="index.php?pid=cart">See Cart ..</a>';
					return $msg;
				}else{
					
					$cartquery 	= "INSERT INTO tbl_cart(sessionId,productId,productName,price,quantity,image,dateTime) VALUES ('$sessionId','$productId','$productName','$price','$quantity','$image','$dateTime')";
					$cartquery 	= $this->db->insert($cartquery);
					if($cartquery){
						echo '<script>window.location.assign("index.php?pid=cart");</script>';
					}else{
						echo '<script>window.location.assign("index.php?pid=404");</script>';
					}
				}
			}else{
				$msg = '<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Failed !</strong> Negative value not allow. Please try again!</div>';
				return $msg;
			}		
		}
		
		/*
		Show Cart Product
		---------------------------------------------------*/
		public function getCartProduct(){
			$sessionId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sessionId = '$sessionId'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Show Price Quantity
		---------------------------------------------------*/
		public function getPriceQuantity(){
			$sessionId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sessionId = '$sessionId'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Cart Update
		---------------------------------------------------*/
		public function cartUpdate($quantity,$cartId){
			$quantity 	= $this->fm->validation($quantity);
			$quantity 	= mysqli_real_escape_string($this->db->link, $quantity);
			$cartId 	= mysqli_real_escape_string($this->db->link, $cartId);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			if($quantity >= 0){
				$query = "UPDATE tbl_cart
							SET 
							quantity = '$quantity',
							updateDateTime = '$updateDateTime'
							WHERE cartId = '$cartId'";
							
				$updated_row = $this->db->update($query);
				if($updated_row){
					$msg = '<div class="alert alert-success" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success !</strong> Your product is updated!
							</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Failed !</strong> Cart not updated!</div>';
					return $msg;
				}
			}else{
				$msg = '<div class="alert alert-danger"  role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Failed !</strong> Negative value not allow. Please try again!</div>';
				return $msg;
			}
		}
		
		/*
		Delete Product From Cart
		---------------------------------------------------*/
		public function delCartPro($id){
			
			$query 	= "DELETE FROM tbl_cart WHERE cartId = '$id'";
			$deldata 	= $this->db->delete($query);
			if($deldata){
				$msg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Failed !</strong> Product Remove</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Failed !</strong> Product Remove Failed</div>';
				return $msg;
			}
		}
		
		/*
		Check Cart Info
		---------------------------------------------------*/
		public function chkCartTbl(){
			$sessionId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sessionId = '$sessionId'";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Order Product insert
		---------------------------------------------------*/
		public function orderProduct($data,$sessionId){
			$customerName 	= $this->fm->validation($data['customerName']);
			$email 			= $this->fm->validation($data['email']);
			$contact 		= $this->fm->validation($data['contact']);
			$address 		= $this->fm->validation($data['address']);
			
			$customerName 	= mysqli_real_escape_string($this->db->link, $customerName);
			$email 			= mysqli_real_escape_string($this->db->link, $email);
			$contact 		= mysqli_real_escape_string($this->db->link, $contact);
			$address 		= mysqli_real_escape_string($this->db->link, $address);
			$dateTime		= date("Y-m-d h:i:s");
			
			$query = "SELECT * FROM tbl_cart WHERE sessionId = '$sessionId'";
			$getCartPro = $this->db->select($query);
			
			if($getCartPro){
				while($result = $getCartPro->fetch_assoc()){
					$sessionId 		= $result['sessionId'];
					$productId 		= $result['productId'];
					$productName 	= $result['productName'];
					$price 			= $result['price'];
					$quantity 		= $result['quantity'];
					$image 			= $result['image'];
					
					$orderquery 	= "INSERT INTO tbl_order(sessionId,productId,productName,price,quantity,image,customerName,email,contact,address,dateTime) VALUES ('$sessionId','$productId','$productName','$price','$quantity','$image','$customerName','$email','$contact','$address','$dateTime')";
					
					$orderquery 	= $this->db->insert($orderquery);
				}
				
			}
		}
		
		
		/*
		Delete Cart Product
		---------------------------------------------------*/
		public function delCartProduct($sessionId){
			$query = "DELETE FROM tbl_cart WHERE sessionId = '$sessionId'";
			$result = $this->db->delete($query);
			return $result;
		}
		
		/*
		Show Order in admin panel
		---------------------------------------------------*/	
		public function showOrder(){
			$query 	= "SELECT * FROM tbl_order ORDER BY orderId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Delete Order from admin panel
		---------------------------------------------------*/
		public function delOrderById($id){
			$query 	= "DELETE FROM tbl_order WHERE orderId = '$id'";
			$deldata 	= $this->db->delete($query);
			if($deldata){
				echo '<script>alert("Order Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=show-order");</script>';
			}else{
				echo '<script>alert("Order Delete failed!")</script>';
				echo '<script>window.location.assign("index.php?page=show-order");</script>';
			}
		}
		
	}
?>