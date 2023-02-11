<div class="col-md-12 form-horizontal">
	<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>SL</th>
				<th>Brand Logo</th>
				<th>Category Name</th>
                <th>Brand Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <!--<tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>-->
        <tbody>
			<?php
				$showBrand = $cat->showBrand();
				
				if($showBrand){
					$i = 0;
					while($result = $showBrand->fetch_assoc()){
						$i++;
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td>
							<?php if($result['image'] == NULL){
								echo '<strong style="color:#FF6868;">No image uploaded</strong>';
							}else{ ?>
								<img src="<?php echo $result['image'];?>" class="img-responsive" width="80px"/>
							<?php } ?>
							
						</td>
						<td><?php echo $result['categoryName'];?></td>
						<td><?php echo $result['brandName'];?></td>
						<td width="22%" class="text-right"><button data-toggle="modal" data-target="#editBrand" data-id="<?php echo $result['brandId'];?>" id="callBrandjs" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button> || <a href="javascript:brandRemove(<?php echo $result['brandId'] ?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a></td>
					</tr>
			<?php } } ?>
        </tbody>
    </table>
</div>
<div id="editBrand" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	 <div class="modal-dialog"> 
		  <div class="modal-content"> 
		  
			   <div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h4 class="modal-title">
						<i class="fa fa-pencil"></i> Edit Panel
					</h4> 
			   </div> 
				<div class="modal-body"> 
			   
				   <div id="modal-loader" style="display: none; text-align: center;">
					<img src="ajax-loader.gif">
				   </div>
					
				   <!-- content will be load here -->                          
					<div id="dynamic-content"></div>
					 
				</div> 
				<div class="modal-footer"> 
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
				</div> 
				
		 </div> 
	  </div>
</div><!-- /.modal --> 