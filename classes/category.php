<?php
	$dirpath = realpath(dirname(__FILE__));
	include_once ($dirpath.'/../config/config.php');
	include_once ($dirpath.'/../config/database.php');
	include_once 'format.php';
?>

<?php
	date_default_timezone_set('Asia/Dhaka');	
	class Category{
		private $db;
		private $fm;
		
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		/*
		Category Insert query
		---------------------------------------------------*/
		public function catInsert($catName){
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$dateTime	= date("Y-m-d h:i:s");
			if(empty($catName)){
				$msg = '<div class="alert alert-warning text-center">Category Field must not be empty</div>';
				return $msg;
			}else{
				$catquery 	= "INSERT INTO tbl_category (categoryName,dateTime) VALUES ('$catName','$dateTime')";
				$catinsert 	= $this->db->insert($catquery);
				
				if($catinsert){
					$msg = '<div class="alert alert-success text-center"> Category Inserted Successfully</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger text-center"> Category Not Inserted</div>';
					return $msg;
				}
			}
		}
		
		/*
		Show Category List
		---------------------------------------------------*/
		public function showCategory(){
			$query 	= "SELECT * FROM tbl_category ORDER BY catId DESC";
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
		Category Update
		---------------------------------------------------*/
		public function categoryUpdate($categoryName,$id){
			$categoryName = $this->fm->validation($categoryName);
			$categoryName = mysqli_real_escape_string($this->db->link, $categoryName);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			if(empty($categoryName)){
				$msg = '<div class="alert alert-warning text-center">Fields must not be empty</div>';
				return $msg;
			}else{
				$query 		= "SELECT categoryName FROM tbl_category WHERE catId = '$id'";
				$result 	= $this->db->select($query);
				$res 		= $result->fetch_assoc();
				$res2 		= $res['categoryName'];
				
				$query2 = "UPDATE tbl_brand
						SET 
						categoryName = '$categoryName'
						WHERE categoryName = '$res2'";
				$query1 = "UPDATE tbl_category
						SET 
						categoryName = '$categoryName',
						updateDateTime = '$updateDateTime'
						WHERE catId = '$id'";
				$updated_row1 = $this->db->update($query1);
				$updated_row2 = $this->db->update($query2);
				if($updated_row1 && $updated_row2){
					echo '<script>alert("Category Name Updated!")</script>';
					echo '<script>window.location.assign("index.php?page=show-category");</script>';
				}else{
					echo '<script>alert("Category update failed!")</script>';
					echo '<script>window.location.assign("index.php?page=show-category");</script>';
				}
			}
		}
		
		/*
		Category delete/sub brand
		---------------------------------------------------*/
		public function delCatById($id){
			$query 		= "SELECT categoryName FROM tbl_category WHERE catId = '$id'";
			$result 	= $this->db->select($query);
			$res 		= $result->fetch_assoc();
			$res2 		= $res['categoryName'];
			$query1 	= "DELETE FROM tbl_category WHERE catId = '$id'";
			$query2 	= "DELETE FROM tbl_brand WHERE categoryName = '$res2'";
			$deldata 	= $this->db->delete($query1);
			$deldata2 	= $this->db->delete($query2);
			if($deldata && $deldata2){
				echo '<script>alert("Category Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=show-category");</script>';
			}else{
				echo '<script>alert("Category Delete failed!")</script>';
					echo '<script>window.location.assign("index.php?page=show-category");</script>';
			}
		}
		
		
		/*
		Category Methods End
		---------------------------------------------------*/
		
		
		/*
		Brand Insert Methods 
		---------------------------------------------------*/		
		public function brandInsert($catName,$brandName, $file){
			$catName 	= $this->fm->validation($catName);
			$brandName 	= $this->fm->validation($brandName);
			$catName 	= mysqli_real_escape_string($this->db->link, $catName);
			$brandName 	= mysqli_real_escape_string($this->db->link, $brandName);
			$dateTime	= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/brand/".$unique_image;
			
			if(empty($brandName) || empty($catName)){
				$msg = '<div class="alert alert-warning text-center">Brand Field must not be empty</div>';
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
						$brandquery 	= "INSERT INTO tbl_brand (categoryName,brandName,image,dateTime) VALUES ('$catName','$brandName','$uploaded_image','$dateTime')";
						$brandinsert	= $this->db->insert($brandquery);
						
						if($brandinsert){
							$msg = '<div class="alert alert-success text-center"> Brand Inserted Successfully</div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger text-center"> Brand Not Inserted</div>';
							return $msg;
						}
					}				
				}else{
					$brandquery 	= "INSERT INTO tbl_brand (categoryName,brandName,dateTime) VALUES ('$catName','$brandName','$dateTime')";
					$brandinsert	= $this->db->insert($brandquery);
					
					if($brandinsert){
						$msg = '<div class="alert alert-success text-center"> Brand Inserted Successfully</div>';
						return $msg;
					}else{
						$msg = '<div class="alert alert-danger text-center"> Brand Not Inserted</div>';
						return $msg;
					}
				}
			}
		}
		
		/*
		Brand Update
		---------------------------------------------------*/	
		public function brandUpdate($categoryName,$brandName,$file,$id){
			$categoryName 	= $this->fm->validation($categoryName);
			$brandName 		= $this->fm->validation($brandName);
			$categoryName 	= mysqli_real_escape_string($this->db->link, $categoryName);
			$brandName 		= mysqli_real_escape_string($this->db->link, $brandName);
			$id 			= mysqli_real_escape_string($this->db->link, $id);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/brand/".$unique_image;
			
			if(empty($categoryName) || empty($brandName)){
				echo '<script>alert("Brand Field must not be empty!")</script>';
				echo '<script>window.location.assign("index.php?page=show-brand");</script>';
			}else{
				
				if(!empty($file_name)){
					if($file_size > 1048567){
						echo '<script>alert("Image Size should be less then 1 MB!")</script>';
						echo '<script>window.location.assign("index.php?page=show-product");</script>';
					}elseif(in_array($file_ext, $permited) === false){
						echo '<script>alert("You can upload only:- jpg,jpeg,png, gif")</script>';
						echo '<script>window.location.assign("index.php?page=show-product");</script>';
					}else{
						$imgremovesql = "SELECT image from tbl_brand where brandId='$id'";
						$res = $this->db->select($imgremovesql);
						$res = $res->fetch_assoc();
						move_uploaded_file($file_temp,$uploaded_image);
						unlink($res['image']);
						
						$query = "UPDATE tbl_brand
							SET 
							categoryName = '$categoryName',
							brandName = '$brandName',
							image = '$uploaded_image',
							updateDateTime = '$updateDateTime'
							WHERE brandId = '$id'";
							
						$updated_row = $this->db->update($query);
						if($updated_row){
							echo '<script>alert("Brand Name Updated!")</script>';
							echo '<script>window.location.assign("index.php?page=show-brand");</script>';
						}else{
							echo '<script>alert("Brand update failed!")</script>';
							echo '<script>window.location.assign("index.php?page=show-brand");</script>';
						}
					}
				}else{
						$query = "UPDATE tbl_brand
								SET 
								categoryName = '$categoryName',
								brandName = '$brandName',
								updateDateTime = '$updateDateTime'
								WHERE brandId = '$id'";
								
						$updated_row = $this->db->update($query);
						if($updated_row){
							echo '<script>alert("Brand Name Updated!")</script>';
							echo '<script>window.location.assign("index.php?page=show-brand");</script>';
						}else{
							echo '<script>alert("Brand update failed!")</script>';
							echo '<script>window.location.assign("index.php?page=show-brand");</script>';
						}
					}
				}
		}
		
		
		/*
		Show Brand List
		---------------------------------------------------*/	
		public function showBrand(){
			$query 	= "SELECT * FROM tbl_brand ORDER BY brandId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Show Limited Brand List
		---------------------------------------------------*/	
		public function showBrandLimit($limit){
			$query 	= "SELECT * FROM tbl_brand ORDER BY brandId ASC LIMIT $limit";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Show Brand List for shop
		---------------------------------------------------*/	
		public function showBrandById($id){
			$query 	= "SELECT * FROM tbl_brand WHERE brandId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			return $result;
		}
		
		
		/*
		Show category Wise brand list for shop nav bar
		---------------------------------------------------*/	
		public function showBrandShop($categoryName){
			$query 	= "SELECT * FROM tbl_brand WHERE categoryName='$categoryName' ORDER BY brandId ASC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Show category list for shop nav bar
		---------------------------------------------------*/	
		public function showCategoryShop(){
			$query 	= "SELECT * FROM tbl_category ORDER BY catId ASC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Collect Brand Id
		---------------------------------------------------*/	
		public function getBrandById($id){
			$query 	= "SELECT * FROM tbl_brand WHERE brandId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}		
		
		/*
		Collect Category Name by BrandId for shop 
		---------------------------------------------------*/	
		public function getCategoryByBrandId($id){
			$query 	= "SELECT categoryName FROM tbl_brand WHERE brandId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			return $result;
		}
			
		
		/*
		Brand delete/sub products
		---------------------------------------------------*/
		public function delBrandById($id){
			$delImgSql = "SELECT * FROM tbl_product WHERE brandId = '$id'";
			$getImg = $this->db->select($delImgSql);
			if($getImg){
				while($delImg = $getImg->fetch_assoc()){
					$delImg = $delImg['image'];
					unlink($delImg);
				}
			}
			
			$brandLogosql = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
			$brandLogosql = $this->db->select($brandLogosql);
			if($brandLogosql){
				while($delLogoimg = $brandLogosql->fetch_assoc()){
					$delLogoimg = $delLogoimg['image'];
					if($delLogoimg == true){
						unlink($delLogoimg);
					}
				}
			}
			
			//$query 		= "SELECT productId FROM tbl_product WHERE brandId = '$id'";
			//$result 	= $this->db->select($query);
			//$res 		= $result->fetch_assoc();
			//$res2 		= $res['productId'];
			$query1 	= "DELETE FROM tbl_brand WHERE brandId = '$id'";
			$query2 	= "DELETE FROM tbl_product WHERE brandId = '$id'";
			$deldata1 	= $this->db->delete($query1);
			$deldata2 	= $this->db->delete($query2);
			if($deldata1 && $deldata2){
				echo '<script>alert("Brand Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=show-brand");</script>';
			}else{
				echo '<script>alert("Brand Delete failed!")</script>';
					echo '<script>window.location.assign("index.php?page=show-brand");</script>';
			}
		}
		
		public function selectCategory($value){
			$getCatName = "SELECT categoryName FROM tbl_category WHERE catId='$value'";
			$catNameExec = $this->db->select($getCatName);
			$catNameres = $catNameExec->fetch_assoc();
			$catNameres2 = $catNameres['categoryName'];
			$query = "SELECT * FROM tbl_brand WHERE categoryName='$catNameres2'";
			$result = $this->db->select($query);
			while($row = $result->fetch_assoc()){
				echo "<option value=".$row['brandId'].">".$row['brandName']."</option>";
			}
		}
		/*
		Brand Methods End
		---------------------------------------------------*/
		
		/*
		Show Logo 
		---------------------------------------------------*/
		public function showLogo(){
			$query 	= "SELECT * FROM tbl_logo ORDER BY logoId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Logo update 
		---------------------------------------------------*/
		public function logoUpdate($file,$id){
			$id = mysqli_real_escape_string($this->db->link, $id);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['logo']['name'];
			$file_size = $_FILES['logo']['size'];
			$file_temp = $_FILES['logo']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/logo/".$unique_image;
			
			if(empty($file_name)){
				$msg = '<div class="alert alert-warning text-center">Please upload logo!</div>';
				return $msg;
			}elseif(!empty($file_name)){
				if($file_size > 1048567){
					$msg = '<div class="alert alert-danger text-center">Logo Size should be less then 1 MB!</div>';
					return $msg;
				}elseif(in_array($file_ext, $permited) === false){
					$msg = '<div class="alert alert-danger text-center">You can upload only:- jpg,jpeg,png, gif!</div>';
					return $msg;
				}else{
					$imgremovesql = "SELECT logo from tbl_logo where logoId='$id'";
					$res = $this->db->select($imgremovesql);
					$res = $res->fetch_assoc();
					move_uploaded_file($file_temp,$uploaded_image);
					unlink($res['logo']);
					
					$query = "UPDATE tbl_logo
						SET 
						logo = '$uploaded_image',
						updateDateTime	= '$updateDateTime'
						WHERE logoId = '$id'";
						
					$updated_row = $this->db->update($query);
					if($updated_row){
						$msg = '<div class="alert alert-success text-center">logo Updated</div>';
						return $msg;
					}else{
						$msg = '<div class="alert alert-danger text-center">logo update failed</div>';
						return $msg;
					}
				}
			}
		}
		
		
		/*
		Slide Insert Methods 
		---------------------------------------------------*/		
		public function slideInsert($data,$file){
			$title			= $this->fm->validation($data['title']);
			$title			= mysqli_real_escape_string($this->db->link, $title);
			$description	= $data['description'];
			$dateTime	= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/slider/".$unique_image;
			
			if(empty($title) || empty($description) || empty($file_name)){
				$msg = '<div class="alert alert-warning text-center">All Slide fields must not be empty</div>';
				return $msg;
			}elseif($file_size > 1048567){
				$msg = '<div class="alert alert-danger text-center"> Slide Image Size should be less then 1 MB</div>';
				return $msg;
			}elseif(in_array($file_ext, $permited) === false){
				$msg = '<div class="alert alert-danger text-center">You can upload only:-'.implode(', ',$permited).'</div>';
				return $msg;
			}else{
				move_uploaded_file($file_temp,$uploaded_image);
				$sliderquery 	= "INSERT INTO tbl_slider(title, description,image,dateTime) VALUES('$title','$description','$uploaded_image','$dateTime')";
				$sliderinsert	= $this->db->insert($sliderquery);
				
				if($sliderinsert){
					$msg = '<div class="alert alert-success text-center"> Slide Inserted Successfully</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger text-center"> Slide Not Inserted</div>';
					return $msg;
				}
			}
		}
		
		
		/*
		Slide Update Methods 
		---------------------------------------------------*/	
		public function slideUpdate($title,$description,$file,$sliderId){
			$title 			= $this->fm->validation($title);
			$title 			= mysqli_real_escape_string($this->db->link, $title);
			$description	= $description;
			
			$updateDateTime	= date("Y-m-d h:i:s");
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "images/slider/".$unique_image;
			
			if($title == "" || $description == ""){
				$msg = '<div class="alert alert-warning text-center">Field must not be empty</div>';
				return $msg;
			}else{
				if(!empty($file_name)){
					if($file_size > 1048567){
						echo '<script>alert("Image Size should be less then 1 MB!")</script>';
						echo '<script>window.location.assign("index.php?page=show-slide");</script>';
					}elseif(in_array($file_ext, $permited) === false){
						echo '<script>alert("You can upload only:- jpg,jpeg,png, gif")</script>';
						echo '<script>window.location.assign("index.php?page=show-slide");</script>';
					}else{
						$imgremovesql = "SELECT image from tbl_slider where sliderId='$sliderId'";
						$res = $this->db->select($imgremovesql);
						$res = $res->fetch_assoc();
						move_uploaded_file($file_temp,$uploaded_image);
						unlink($res['image']);
						
						$query = "UPDATE tbl_slider
									SET
									title ='$title',
									description ='$description',
									image ='$uploaded_image',
									updateDateTime = '$updateDateTime'
									WHERE sliderId = '$sliderId'
									";
						
						$query_row	= $this->db->update($query);
						
						if($query_row){
							echo '<script>alert("Slide Updated Successfully!")</script>';
							echo '<script>window.location.assign("index.php?page=show-slide");</script>';
						}else{
							echo '<script>alert("Slide Not Updated!")</script>';
							echo '<script>window.location.assign("index.php?page=show-slide");</script>';
						}
					}
				}else{
					$query = "UPDATE tbl_slider
								SET
								title ='$title',
								description ='$description',
								updateDateTime = '$updateDateTime'
								WHERE sliderId = '$sliderId'
								";
					
					$query_row	= $this->db->update($query);
					if($query_row){
						echo '<script>alert("Slide Updated Successfully")</script>';
						echo '<script>window.location.assign("index.php?page=show-slide");</script>';
					}else{
						echo '<script>alert("Slide Not Updated!")</script>';
						echo '<script>window.location.assign("index.php?page=show-slide");</script>';
					}
				}
			}
		}
		
		/*
		Show slide List
		---------------------------------------------------*/	
		public function showSlide(){
			$query 	= "SELECT * FROM tbl_slider ORDER BY sliderId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Delete Slider
		---------------------------------------------------*/
		public function delSlideById($id){
			
			$slidesql = "SELECT * FROM tbl_slider WHERE sliderId = '$id'";
			$slidesql = $this->db->select($slidesql);
			if($slidesql){
				while($delSlideimg = $slidesql->fetch_assoc()){
					$delSlideimg = $delSlideimg['image'];
					unlink($delSlideimg);
				}
			}
			$query 		= "DELETE FROM tbl_slider WHERE sliderId = '$id'";
			$deldata 	= $this->db->delete($query);
			if($deldata){
				echo '<script>alert("Slider Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=show-slide");</script>';
			}else{
				echo '<script>alert("Slider Delete failed!")</script>';
				echo '<script>window.location.assign("index.php?page=show-slide");</script>';
			}
		}
		
		/*
		Collect Slider By Id
		---------------------------------------------------*/	
		public function getSlideById($id){
			$query 	= "SELECT * FROM tbl_slider WHERE sliderId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Show Social Link 
		---------------------------------------------------*/
		public function showSocialLink(){
			$query 	= "SELECT * FROM tbl_social ORDER BY sLinkId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Social Link Update
		---------------------------------------------------*/
		public function socialLink($data,$id){
			$facebook 		= $this->fm->validation($data['facebook']);
			$youtube 		= $this->fm->validation($data['youtube']);
			$twitter		= $this->fm->validation($data['twitter']);
			$googlePlus 	= $this->fm->validation($data['googlePlus']);
			$instagram 		= $this->fm->validation($data['instagram']);
			
			$facebook 	= mysqli_real_escape_string($this->db->link, $facebook);
			$youtube 	= mysqli_real_escape_string($this->db->link, $youtube);
			$twitter 	= mysqli_real_escape_string($this->db->link, $twitter);
			$googlePlus = mysqli_real_escape_string($this->db->link, $googlePlus);
			$instagram 	= mysqli_real_escape_string($this->db->link, $instagram);
			$sLinkId 	= mysqli_real_escape_string($this->db->link, $id);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			$query = "UPDATE tbl_social
				SET 
				facebook = '$facebook',
				youtube = '$youtube',
				twitter = '$twitter',
				googlePlus = '$googlePlus',
				instagram = '$instagram',
				updateDateTime	= '$updateDateTime'
				WHERE sLinkId = '$sLinkId'";
				
			$updated_row = $this->db->update($query);
			if($updated_row){
				$msg = '<div class="alert alert-success text-center">Social Link Updated</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger text-center">Social Link update failed</div>';
				return $msg;
			}
		}
		
		/*
		Show Address 
		---------------------------------------------------*/
		public function showAddress(){
			$query 	= "SELECT * FROM tbl_address ORDER BY addressId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Address Update
		---------------------------------------------------*/
		public function addressUpdate($data,$id){
			$address 		= $this->fm->validation($data['address']);
			$contact 		= $this->fm->validation($data['contact']);
			$email		= $this->fm->validation($data['email']);
			
			$address 	= mysqli_real_escape_string($this->db->link, $address);
			$contact 	= mysqli_real_escape_string($this->db->link, $contact);
			$email 	= mysqli_real_escape_string($this->db->link, $email);
			$addressId 	= mysqli_real_escape_string($this->db->link, $id);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			$query = "UPDATE tbl_address
				SET 
				address = '$address',
				contact = '$contact',
				email 	= '$email',
				updateDateTime = '$updateDateTime'
				WHERE addressId = '$addressId'";
				
			$updated_row = $this->db->update($query);
			if($updated_row){
				$msg = '<div class="alert alert-success text-center">Address Updated</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger text-center">Address update failed</div>';
				return $msg;
			}
		}
		
		/*
		Show Copy Right message
		---------------------------------------------------*/
		public function showCopyRight(){
			$query 	= "SELECT * FROM tbl_copyright ORDER BY crId DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Copy Right message Update
		---------------------------------------------------*/
		public function copyRightUpdate($text,$crId){
			$text 	= $this->fm->validation($text);
			$crId 	= $this->fm->validation($crId);
			
			$text 	= mysqli_real_escape_string($this->db->link, $text);
			$crId 	= mysqli_real_escape_string($this->db->link, $crId);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			if(empty($text)){
				$msg = '<div class="alert alert-warning text-center">You must upload copy right text!</div>';
				return $msg;
			}else{
				$query = "UPDATE tbl_copyright
					SET 
					text = '$text',
					updateDateTime = '$updateDateTime'
					WHERE crId = '$crId'";
					
				$updated_row = $this->db->update($query);
				if($updated_row){
					$msg = '<div class="alert alert-success text-center">Copy right text updated</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger text-center">Copy right text update failed</div>';
					return $msg;
				}	
			}
		}
		
		
		/*
		Widgets Insert query
		---------------------------------------------------*/
		public function widgetSinsert($data){
			$iconName		= $this->fm->validation($data['iconName']);
			$widgetheading	= $this->fm->validation($data['widgetheading']);
			$content		= $this->fm->validation($data['content']);
			
			$iconName		= mysqli_real_escape_string($this->db->link, $iconName);
			$widgetheading	= mysqli_real_escape_string($this->db->link, $widgetheading);
			$content		= mysqli_real_escape_string($this->db->link, $content);
			$dateTime	= date("Y-m-d h:i:s");
			
			if($iconName == "" || $widgetheading == "" || $content == ""){
				$msg = '<div class="alert alert-warning text-center">All Fields are required</div>';
				return $msg;
			}else{
				$widquery 	= "INSERT INTO tbl_widget (iconName,widgetheading,content,dateTime) VALUES ('$iconName','$widgetheading','$content','$dateTime')";
				$widInsert 	= $this->db->insert($widquery);
				
				if($widInsert){
					$msg = '<div class="alert alert-success text-center"> Widgets Inserted Successfully</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger text-center"> Widgets Not Inserted</div>';
					return $msg;
				}
			}
		}
		
		
		/*
		Widgets Update query
		---------------------------------------------------*/
		public function widgetsUpdate($data,$widgetId){
			$iconName		= $this->fm->validation($data['iconName']);
			$widgetheading	= $this->fm->validation($data['widgetheading']);
			$content		= $this->fm->validation($data['content']);
			
			$iconName		= mysqli_real_escape_string($this->db->link, $iconName);
			$widgetheading	= mysqli_real_escape_string($this->db->link, $widgetheading);
			$content		= mysqli_real_escape_string($this->db->link, $content);
			$widgetId		= mysqli_real_escape_string($this->db->link, $widgetId);
			$updateDateTime	= date("Y-m-d h:i:s");
			
			if(empty($iconName) || empty($widgetheading) || empty($content)){
				echo '<script>alert("All Fields are required")</script>';
				echo '<script>window.location.assign("index.php?page=show-widgets");</script>';
			}else{
				$query = "UPDATE tbl_widget
					SET 
					iconName = '$iconName',
					widgetheading = '$widgetheading',
					content = '$content',
					updateDateTime = '$updateDateTime'
					WHERE widgetId = '$widgetId'";
					
				$updated_row = $this->db->update($query);
				if($updated_row){
					echo '<script>alert("Widgets Updated Successfully")</script>';
					echo '<script>window.location.assign("index.php?page=show-widgets");</script>';
				}else{
					echo '<script>alert("Widgets Update Failed")</script>';
					echo '<script>window.location.assign("index.php?page=show-widgets");</script>';
				}	
			}
		}
		
		
		/*
		Show Widgets List
		---------------------------------------------------*/	
		public function showWidgets(){
			$query 	= "SELECT * FROM tbl_widget ORDER BY widgetId ASC";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Show limited Widgets List
		---------------------------------------------------*/	
		public function showWidgetslimit(){
			$query 	= "SELECT * FROM tbl_widget ORDER BY widgetId ASC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}
		
		
		/*
		Collect Widgets Id
		---------------------------------------------------*/
		public function getWidgetById($id){
			$query 	= "SELECT * FROM tbl_widget WHERE widgetId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		/*
		Widgets delete
		---------------------------------------------------*/
		public function delWidgetsById($id){
			$query 	= "DELETE FROM tbl_widget WHERE widgetId = '$id'";
			$delquery 	= $this->db->delete($query);
			if($delquery){
				echo '<script>alert("Widgets Deleted Successfully!")</script>';
				echo '<script>window.location.assign("index.php?page=show-widgets");</script>';
			}else{
				echo '<script>alert("Widgets Delete failed!")</script>';
					echo '<script>window.location.assign("index.php?page=show-widgets");</script>';
			}
		}
	}
?>