<?php
	$dirpath = realpath(dirname(__FILE__));
	include_once ($dirpath.'/../config/config.php');
	include_once ($dirpath.'/../config/database.php');
	include_once 'format.php';
?>

<?php
	date_default_timezone_set('Asia/Dhaka');
	class Product{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		/*
		INSERT Prodct 
		---------------------------------------------------*/
		
		public function productInsert($data, $file){
			$productName 	= $this->fm->validation($data['productName']);
			$catId 			= $this->fm->validation($data['catId']);
			$brandId 		= $this->fm->validation($data['brandId']);
			$type 			= $this->fm->validation($data['type']);
			$price			= floatval(preg_replace('/[^\d.]/', '', $data['price']));
			$discount		= floatval(preg_replace('/[^\d.]/', '', $data['discount']));
			
			$productName 	= mysqli_real_escape_string($this->db->link, $productName);
			$catId 			= mysqli_real_escape_string($this->db->link, $catId);
			$brandId 		= mysqli_real_escape_string($this->db->link, $brandId);
			$type 			= mysqli_real_escape_string($this->db->link, $type);
			$price 			= mysqli_real_escape_string($this->db->link, $price);
			$discount 		= mysqli_real_escape_string($this->db->link, $discount);
			$description 	= $data['description'];
			
			$dateTime	= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = stripslashes($_FILES['image']['name']);
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/product/".$unique_image;
			
			if($file_ext=="jpg" || $file_ext=="jpeg" ){
				$src = imagecreatefromjpeg($file_temp);
			}elseif($file_ext=="png"){
				$src = imagecreatefrompng($file_temp);
			}else{
				$src = imagecreatefromgif($file_temp);
			}
			$max_width  = imagesx($src);
			$max_height = imagesy($src);
			
			if($productName == "" || $catId == "" || $brandId == "" || $price == "" || $description == "" || $file_name == ""){
				$msg = '<div class="alert alert-warning text-center">Field must not be empty</div>';
				return $msg;
			}elseif($file_size > 1048567){
				$msg = '<div class="alert alert-danger text-center"> Image Size should be less then 1 MB</div>';
				return $msg;
			}elseif(in_array($file_ext, $permited) === false){
				$msg = '<div class="alert alert-danger text-center">You can upload only:-'.implode(', ',$permited).'</div>';
				return $msg;
			}elseif(($max_width > 525) || ($max_width < 525) || ($max_height > 394) || ($max_height < 394) ){
				$msg = '<div class="alert alert-danger text-center"> Please resize the image with (e.g, width: 525px and height: 394px)</div>';
				return $msg;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$pdquery 	= "INSERT INTO tbl_product(productName,catId,brandId,type,price,discount,description,image,dateTime) VALUES ('$productName','$catId','$brandId','$type','$price','$discount','$description','$uploaded_image','$dateTime')";
				$pdquery 	= $this->db->insert($pdquery);
				if($pdquery){
					$msg = '<div class="alert alert-success text-center"> Product Inserted Successfully</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger text-center"> Prodct Not Inserted</div>';
					return $msg;
				}
			}
		}
		
		
		/*
		Product Update
		---------------------------------------------------*/
		public function productUpdate($data,$file,$productId){
			$productName 	= $this->fm->validation($data['productName']);
			$catId 			= $this->fm->validation($data['catId']);
			$brandId 		= $this->fm->validation($data['brandId']);
			$type 			= $this->fm->validation($data['type']);
			$price			= floatval(preg_replace('/[^\d.]/', '', $data['price']));
			$discount		= floatval(preg_replace('/[^\d.]/', '', $data['discount']));
			
			$productName 	= mysqli_real_escape_string($this->db->link, $productName);
			$catId 			= mysqli_real_escape_string($this->db->link, $catId);
			$brandId 		= mysqli_real_escape_string($this->db->link, $brandId);
			$type 			= mysqli_real_escape_string($this->db->link, $type);
			$price 			= mysqli_real_escape_string($this->db->link, $price);
			$discount 		= mysqli_real_escape_string($this->db->link, $discount);
			$description 	= $data['description'];
			
			$updateDateTime	= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/product/".$unique_image;
			
			if($file_ext=="jpg" || $file_ext=="jpeg" ){
				$src = imagecreatefromjpeg($file_temp);
			}elseif($file_ext=="png"){
				$src = imagecreatefrompng($file_temp);
			}else{
				$src = imagecreatefromgif($file_temp);
			}
			$max_width  = imagesx($src);
			$max_height = imagesy($src);
			
			
			if($productName == "" || $catId == "" || $brandId == "" || $price == "" || $description == "" ){
				$msg = '<div class="alert alert-warning text-center">Field must not be empty</div>';
				return $msg;
			}else{
				if(!empty($file_name)){
					if($file_size > 1048567){
						echo '<script>alert("Image Size should be less then 1 MB!")</script>';
						echo '<script>window.location.assign("index.php?page=show-product");</script>';
					}elseif(in_array($file_ext, $permited) === false){
						echo '<script>alert("You can upload only:- jpg,jpeg,png, gif")</script>';
						echo '<script>window.location.assign("index.php?page=show-product");</script>';
					}elseif(($max_width > 525) || ($max_width < 525) || ($max_height > 394) || ($max_height < 394) ){
						$msg = '<div class="alert alert-danger text-center"> Please resize the image with (e.g, width: 525px and height: 394px)</div>';
						return $msg;
					}else{
						$imgremovesql = "SELECT image from tbl_product where productId='$productId'";
						$res = $this->db->select($imgremovesql);
						$res = $res->fetch_assoc();
						move_uploaded_file($file_temp,$uploaded_image);
						unlink($res['image']);
						
						$query = "UPDATE tbl_product
									SET
									productName ='$productName',
									catId ='$catId',
									brandId ='$brandId',
									type ='$type',
									price ='$price',
									discount ='$discount',
									description ='$description',
									image ='$uploaded_image',
									updateDateTime ='$updateDateTime'
									WHERE productId = '$productId'
									";
						
						$query_row	= $this->db->update($query);
						
						if($query_row){
							$msg = '<div class="alert alert-success"><i class="fa fa-check"></i> Product Updated Successfully! <a href="index.php?page=show-product">See Product line</a></div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger"><i class="fa fa-warning"></i> <strong>Error! </strong> Prodct Not Updated!</div>';
							return $msg;
						}
					}
				}else{
					$query = "UPDATE tbl_product
								SET
								productName ='$productName',
								catId ='$catId',
								brandId ='$brandId',
								type ='$type',
								price ='$price',
								discount ='$discount',
								description ='$description',
								updateDateTime = '$updateDateTime'
								WHERE productId = '$productId'
								";
					
					$query_row	= $this->db->update($query);
					if($query_row){
						$msg = '<div class="alert alert-success"><i class="fa fa-check"></i> Product Updated Successfully! <a href="index.php?page=show-product">See Product line</a></div>';
						return $msg;
					}else{
						$msg = '<div class="alert alert-danger"><i class="fa fa-warning"></i> <strong>Error! </strong> Prodct Not Updated!</div>';
						return $msg;
					}
				}
			}
		}
		
		/*
		Show Prodct List
		---------------------------------------------------*/
		public function showProduct(){
			$query 	= "SELECT tbl_product.*, tbl_category.categoryName, tbl_brand.brandName
						FROM tbl_product
						INNER JOIN tbl_category
						ON tbl_product.catId = tbl_category.catId
						INNER JOIN tbl_brand
						ON tbl_product.brandId = tbl_brand.brandId
						ORDER BY tbl_product.productId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Show Prodct limit
		---------------------------------------------------*/
		public function showLimitProduct($limit){
			$query 	= "SELECT tbl_product.*, tbl_category.categoryName, tbl_brand.brandName
						FROM tbl_product
						INNER JOIN tbl_category
						ON tbl_product.catId = tbl_category.catId
						INNER JOIN tbl_brand
						ON tbl_product.brandId = tbl_brand.brandId
						ORDER BY tbl_product.productId DESC LIMIT $limit";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Show Prodct List for shop
		---------------------------------------------------*/
		public function showProductShop($id){
			$query 	= "SELECT * FROM tbl_product WHERE brandId='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Collect Prodct Id
		---------------------------------------------------*/
		public function getProductById($id){
			$query 	= "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Prodct DELETE
		---------------------------------------------------*/
		public function delProductById($id){
			$delImgSql = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$getImg = $this->db->select($delImgSql);
			if($getImg){
				while($delImg = $getImg->fetch_assoc()){
					$delImg = $delImg['image'];
					unlink($delImg);
				}
			}
			
			$query 	= "DELETE FROM tbl_product WHERE productId = '$id'";
			$deldata 	= $this->db->delete($query);
			if($deldata){
				echo '<script>alert("Product Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=show-product");</script>';
			}else{
				echo '<script>alert("Product Delete failed!")</script>';
					echo '<script>window.location.assign("index.php?page=show-product");</script>';
			}
		}
		
		
		/*
		Recent product Query
		---------------------------------------------------*/
		public function getRecentProduct(){
			$query 	= "SELECT * FROM tbl_product WHERE type='recent' ORDER BY productId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Recent product limit Query
		---------------------------------------------------*/
		public function getRecentProductLimit($limit){
			$query 	= "SELECT * FROM tbl_product WHERE type='recent' ORDER BY productId DESC LIMIT $limit";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Popular product Query
		---------------------------------------------------*/
		public function getPopularProduct(){
			$query 	= "SELECT * FROM tbl_product WHERE type='popular' ORDER BY productId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Popular product Query
		---------------------------------------------------*/
		public function getPopularProductLimit($limit){
			$query 	= "SELECT * FROM tbl_product WHERE type='popular' ORDER BY productId DESC LIMIT $limit";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Featured product Query
		---------------------------------------------------*/
		public function getFeaturedProduct(){
			$query 	= "SELECT * FROM tbl_product WHERE type='featured' ORDER BY productId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Featured product Limit Query
		---------------------------------------------------*/
		public function getFeaturedProductLimit($limit){
			$query 	= "SELECT * FROM tbl_product WHERE type='featured' ORDER BY productId DESC LIMIT $limit";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Show Prodct List
		---------------------------------------------------*/
		public function getSingleProduct($id){
			/*$query 	= "SELECT tbl_product.*, tbl_category.categoryName, tbl_brand.brandName
						FROM tbl_product
						INNER JOIN tbl_category
						ON tbl_product.catId = tbl_category.catId
						INNER JOIN tbl_brand
						ON tbl_product.brandId = tbl_brand.brandId
						ORDER BY tbl_product.productId DESC";*/
						
			$query = "SELECT p.*, c.categoryName, b.brandName 
						FROM tbl_product as p, tbl_category as c, tbl_brand as b 
						WHERE p.catId = c.catId 
						AND p.brandId = b.brandId 
						AND p.productId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Related product Query
		---------------------------------------------------*/
		public function getRelatedProduct($id){
			$query1 	= "SELECT brandId FROM tbl_product WHERE productId = '$id'";
			$result1 	= $this->db->select($query1);
			$res 		= $result1->fetch_assoc();
			$res2 		= $res['brandId'];
			$query2 	= "SELECT * FROM tbl_product WHERE brandId = '$res2'";
			$result = $this->db->select($query2);
			return $result;
		}
		
	}
?>