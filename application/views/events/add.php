<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<form action="<?php echo base_url(); ?>events/store" class="form-horizontal" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label for="title" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="title" id="title" value="<?php echo (isset($event_info['title']) ? $event_info['title'] : ''); ?>" placeholder="title">
				</div>
			</div>
			
		  <div class="form-group">
			<label for="comment" class="col-sm-2 control-label">Description</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="description" name="description"><?php echo (isset($event_info['description']) ? $event_info['description'] : ''); ?></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
				<label for="device" class="col-sm-2 control-label">device</label>
				<div class="col-sm-10">
					  <select name="device" id="device" class="form-control">
								<option value="-1">Irrelevant</option>
					  <?php if($devices): ?>
							<?php foreach($devices as $device): ?>
								<option value="<?php echo $device['id']; ?>" <?php echo (( isset($event_info) && $device['id'] == $event_info['device'] ) ? 'selected' : ''); ?>>#<?php echo $device['id']; ?> <?php echo $device['name']; ?></option>
							<?php endforeach; ?>
					  <?php endif; ?>
					 </select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="timespan" class="col-sm-2 control-label">TimeSpan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="timespan" id="timespan" value="<?php echo (isset($event_info['timespan']) ? $event_info['timespan'] : ''); ?>" placeholder="timespan">
				</div>
			</div>
			
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" name="submit" class="btn btn-default">submit</button>
			</div>
		  </div>
		  <?php if(isset($edit)): ?>
  			<input type="hidden" name="edit" value="true" />
  			<input type="hidden" name="id" value="<?php echo $event_info['id']; ?>" />
		  <?php endif; ?>
		</form>
	</div>
</div>