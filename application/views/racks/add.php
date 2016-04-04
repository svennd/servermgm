<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<form action="<?php echo base_url(); ?>racks/store" class="form-horizontal" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" id="name" value="<?php echo (isset($rack_info['name']) ? $rack_info['name'] : ''); ?>" placeholder="Rack Name">
				</div>
			</div>

			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">Location</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="location" value="<?php echo (isset($rack_info['location']) ? $rack_info['location'] : ''); ?>" id="location" placeholder="Antwerp">
				</div>
			</div>
			
			<div class="form-group">
				<label for="qc" class="col-sm-2 control-label">Size</label>
				<div class="col-sm-10">
					  <select name="size" id="size" class="form-control">
							<option value="47" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '47' ) ? 'selected' : ''); ?>>47</option>
							<option value="42" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '42' ) ? 'selected' : ''); ?>>42</option>
							<option value="32" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '32' ) ? 'selected' : ''); ?>>32</option>
							<option value="27" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '27' ) ? 'selected' : ''); ?>>27</option>
							<option value="22" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '22' ) ? 'selected' : ''); ?>>22</option>
							<option value="18" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '18' ) ? 'selected' : ''); ?>>18</option>
							<option value="15" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '15' ) ? 'selected' : ''); ?>>15</option>
							<option value="12" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '12' ) ? 'selected' : ''); ?>>12</option>
							<option value="9" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '9' ) ? 'selected' : ''); ?>>9</option>
							<option value="6" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '6' ) ? 'selected' : ''); ?>>6</option>
							<option value="4" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '4' ) ? 'selected' : ''); ?>>4</option>
							<option value="1" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '1' ) ? 'selected' : ''); ?>>1</option>
							<option value="-1" <?php echo ((isset($rack_info['size']) && $rack_info['size'] == '-1' ) ? 'selected' : ''); ?>>Unknown</option>
					 </select>
				</div>
			</div>
					
		  <div class="form-group">
			<label for="comment" class="col-sm-2 control-label">notes</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="notes" name="notes"><?php echo (isset($rack_info['notes']) ? $rack_info['notes'] : ''); ?></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" name="submit" class="btn btn-default">submit</button>
			</div>
		  </div>
		  <?php if(isset($edit)): ?>
			<input type="hidden" name="edit" value="false" />
			<input type="hidden" name="id" value="<?php echo $rack_info['id']; ?>" />
		  <?php endif; ?>
		</form>
	</div>
</div>