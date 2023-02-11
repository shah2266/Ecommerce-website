<div class="col-md-12 form-horizontal">
	<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>SL</th>
				<th>Icon Name</th>
				<th>Heading</th>
                <th>Brand Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
			<?php
				$showWidgets = $cat->showWidgets();
				
				if($showWidgets){
					$i = 0;
					while($result = $showWidgets->fetch_assoc()){
						$i++;
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $result['iconName'];?></td>
						<td><?php echo $result['widgetheading'];?></td>
						<td><?php echo $result['content'];?></td>
						<td width="22%" class="text-right"><button data-toggle="modal" data-target="#editWidget" data-id="<?php echo $result['widgetId'];?>" id="callWidgetjs" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> </button> || <a href="javascript:widgetsRemove(<?php echo $result['widgetId'] ?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a></td>
					</tr>
			<?php } } ?>
        </tbody>
    </table>
</div>
<div id="editWidget" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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