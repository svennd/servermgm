<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<form action="<?php echo base_url(); ?>ipmi/store" class="form-horizontal" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label for="speed" class="col-sm-2 control-label">device</label>
				<div class="col-sm-10">
					  <select name="device" id="device" class="form-control">
								<option value="-1">FREE</option>
					  <?php if($devices): ?>
							<?php foreach($devices as $device): ?>
								<option value="<?php echo $device['id']; ?>"
								  <?php echo ((isset($ipmi) && $device['id'] == $ipmi['id']) ? 'selected' : ''); ?>>#<?php echo $device['id']; ?> <?php echo $device['name']; ?>
								</option>
							<?php endforeach; ?>
					  <?php endif; ?>
					 </select>
				</div>
			</div>
				
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">mac</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo (isset($ipmi['mac']) ? $ipmi['mac'] : ''); ?>" name="mac" id="mac" placeholder="mac">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">ip</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" value="<?php echo (isset($ipmi['ip']) ? $ipmi['ip'] : ''); ?>" name="ip" id="ip" placeholder="ip">
			</div>
			</div>
			
		  <div class="form-group">
			<label for="comment" class="col-sm-2 control-label">notes</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="notes" name="notes"><?php echo (isset($ipmi['notes']) ? $ipmi['notes'] : ''); ?></textarea>
			</div>
		  </div>
		  
		  <?php if(isset($edit)): ?>
			<input type="hidden" name="edit" value="true" />
			<input type="hidden" name="id" value="<?php echo $ipmi['id']; ?>" />
		  <?php endif; ?>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" name="submit" value="finish" class="btn btn-default">submit</button>
			</div>
		  </div>
		</form>
	</div>
</div>