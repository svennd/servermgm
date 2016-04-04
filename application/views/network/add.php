<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<form action="<?php echo base_url(); ?>network/store" class="form-horizontal" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label for="speed" class="col-sm-2 control-label">device</label>
				<div class="col-sm-10">
					  <select name="device" id="device" class="form-control">
					  <?php if($devices): ?>
							<?php foreach($devices as $device): ?>
								<option value="<?php echo $device['id']; ?>" <?php echo ((isset($device['id']) && $device['id'] == $network['device'] ) ? 'selected' : ''); ?>>#<?php echo $device['id']; ?> <?php echo $device['name']; ?></option>
							<?php endforeach; ?>
					  <?php endif; ?>
					 </select>
				</div>
			</div>
				
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">name</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo (isset($network['name']) ? $network['name'] : ''); ?>" name="name" id="name" placeholder="name">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">mac</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo (isset($network['mac']) ? $network['mac'] : ''); ?>" name="mac" id="mac" placeholder="mac">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">ip</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo (isset($network['ip']) ? $network['ip'] : ''); ?>" name="ip" id="ip" placeholder="ip">
			</div>
			</div>
			
		  <div class="form-group">
			<label for="comment" class="col-sm-2 control-label">notes</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="notes" name="notes"><?php echo (isset($network['notes']) ? $network['notes'] : ''); ?></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" name="submit" value="finish" class="btn btn-default">submit</button>
			</div>
		  </div>
		</form>
	</div>
</div>