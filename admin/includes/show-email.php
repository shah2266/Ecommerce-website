<div class="col-md-12 form-horizontal">
	<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0"  style="font-size:12px;">
        <thead>
            <tr>
                <th>SL</th>
                <th>Inbox</th>
				<th>Date :: Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
			<?php
				$showEmail = $os->showEmail();
				
				if($showEmail){
					$i = 0;
					while($result = $showEmail->fetch_assoc()){
						$i++;
				?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo '<strong>Name:</strong> '.$result['firstName'].' '.$result['lastName'].'<br><br><div style="border:1px solid #ccc; border-radius:8px;padding:8px;"><strong>Email:</strong> '.$result['email'].'<br><strong>Contact:</strong> '.$result['contact'].'<br><hr><strong>Message:</strong> '.$result['message'].'</div>';?></td>
						<td><?php echo $result['dateTime'];?></td>
						<td width="18%" class="text-right"><a href="index.php?page=send_mail&id=<?php echo $result['contactId'];?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Replay">Replay</a> || <a href="javascript:emailRemove(<?php echo $result['contactId'] ?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a></td>
					</tr>
			<?php } } ?>
        </tbody>
    </table>
</div>
