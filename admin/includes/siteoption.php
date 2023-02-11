<?php
	
	class siteOption{
		public $subPages;
		
		public function logo($subPages){
			
			if($subPages == 'logo'){
				echo '
					<div class="col-md-8 col-md-offset-2 well">
						<div class="text-center">
							<img src="../images/camera_logo.PNG"/>
						</div>
						<form action = "" method = "POST" enctype = "multipart/form-data">
							<div class="form-horizontal clearfix">
								<div class="form-group">
									<div class="col-sm-4 control-label">
										Upload image:
									</div>
									<div class="col-sm-8">
										<input type="file" name="file" required/>
									</div>
								</div>
								<div class="text-center">
									<input type = "submit" name = "logoSubmit" value = "Save" class = "btn btn-default" />
								</div>
							</div>
						</form>
					</div>					
				';
			}elseif($subPages == 'socialLink'){
				echo '<div class="col-md-6 form-horizontal">
						<form action = "" method = "POST" enctype = "multipart/form-data">
							<div class="form-group">
								<div class="col-sm-3 control-label">
									Facebook:
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="contentHeading"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3 control-label">
									Youtube:
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="contentHeading"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3 control-label">
									Twitter:
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="contentHeading"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3 control-label">
									Google-Plus:
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="contentHeading"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3 control-label">
									Instagram:
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="contentHeading"/>
								</div>
							</div>
							<div class="form-group text-center">
								<input type = "submit" name = "submit" value = "Save" class = "btn btn-default" />
								<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
							</div>
							
						</form>
					</div>';
			}elseif($subPages == 'footer'){
				echo '<div class="col-md-6 form-horizontal">
						<form action = "" method = "POST" enctype = "multipart/form-data">
							<div class="form-group">
								<div class="col-sm-3 control-label">
									Copyright text:
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="contentHeading" required/>
								</div>
							</div>
							<div class="form-group text-center">
								<input type = "submit" name = "submit" value = "Save" class = "btn btn-default" />
								<input type = "Reset" name = "Reset" value = "Reset" class = "btn btn-danger" />
							</div>
							
						</form>
					</div>';
			}else{
				echo '<span style="color:red;">page not found</span>';
			}
		}
	}
?>