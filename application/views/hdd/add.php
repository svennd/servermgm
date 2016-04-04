<div class="row">
	<div class="col-md-offset-1 col-md-10">
    <?php if($added): ?>
    <p>added Disk !</p>
    <?php endif; ?>
		&nbsp;
		<form action="<?php echo base_url(); ?>hdd/store" class="form-horizontal" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label for="speed" class="col-sm-2 control-label">device</label>
				<div class="col-sm-10">
					  <select name="device" id="device" class="form-control">
								<option value="-1">FREE</option>
					  <?php if($devices): ?>
							<?php foreach($devices as $device): ?>
								<option value="<?php echo $device['id']; ?>" <?php echo (( isset($hdd) && $device['id'] == $hdd['server'] ) ? 'selected' : ''); ?>>#<?php echo $device['id']; ?> <?php echo $device['name']; ?></option>
							<?php endforeach; ?>
					  <?php endif; ?>
					 </select>
				</div>
			</div>
				
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">serial</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" name="serial" id="serial" value="<?php echo (isset($hdd['serial']) ? $hdd['serial'] : ''); ?>" placeholder="serial">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">vendor</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" name="vendor" id="vendor" value="<?php echo (isset($hdd['vendor']) ? $hdd['vendor'] : ''); ?>" placeholder="vendor">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">brand</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" name="brand" id="brand" value="<?php echo (isset($hdd['brand']) ? $hdd['brand'] : ''); ?>" placeholder="brand">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">capacity</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" name="capacity" id="capacity" value="<?php echo (isset($hdd['capacity']) ? $hdd['capacity'] : ''); ?>" placeholder="capacity">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">bought</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" name="bought" id="bought" value="<?php echo (isset($hdd['bought']) ? $hdd['bought'] : ''); ?>" placeholder="bought">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">warranty</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" name="warranty" id="warranty" value="<?php echo (isset($hdd['warranty']) ? $hdd['warranty'] : ''); ?>" placeholder="warranty">
			</div>
			</div>
			
		  <div class="form-group">
			<label for="comment" class="col-sm-2 control-label">notes</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="notes" name="notes"><?php echo (isset($hdd['notes']) ? $hdd['notes'] : ''); ?></textarea>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="status" class="col-sm-2 control-label">status</label>
			<div class="col-sm-10">
				 <select name="status" id="status" class="form-control">
					 <option value="hot" <?php echo ((isset($hdd['status']) && $hdd['status'] == 'hot' ) ? 'selected' : ''); ?>>hot</option>
					 <option value="cold" <?php echo ((isset($hdd['status']) && $hdd['status'] == 'cold' ) ? 'selected' : ''); ?>>cold</option>
					 <option value="backup" <?php echo ((isset($hdd['status']) && $hdd['status'] == 'backup' ) ? 'selected' : ''); ?>>backup</option>
					 <option value="RMA" <?php echo ((isset($hdd['status']) && $hdd['status'] == 'RMA' ) ? 'selected' : ''); ?>>RMA</option>
					 <option value="replaced" <?php echo ((isset($hdd['status']) && $hdd['status'] == 'replaced' ) ? 'selected' : ''); ?>>replaced</option>
					 <option value="hot_spare" <?php echo ((isset($hdd['status']) && $hdd['status'] == 'hot_spare' ) ? 'selected' : ''); ?>>hot_spare</option>
					 <option value="dead" <?php echo ((isset($hdd['status']) && $hdd['status'] == 'dead' ) ? 'selected' : ''); ?>>dead</option>
				</select>
			</div>
		  </div>
		  
		  <?php if(isset($edit)): ?>
			<input type="hidden" name="edit" value="true" />
			<input type="hidden" name="id" value="<?php echo $hdd['id']; ?>" />
		  <?php endif; ?>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" name="submit" value="true" class="btn btn-default">submit</button>
			  <button type="submit" name="submit_next" value="true" class="btn btn-default">submit & do next one</button>
			</div>
		  </div>
		</form>
	</div>
</div>

<script>
/* disks have only 3 to 5y warranty so this is plenty */
var date = new Date();
var min_year = date.getFullYear() - 7;
var max_year = date.getFullYear() + 7;

/* warranty end */
new Pikaday(
{
  field: document.getElementById('warranty'),
  firstDay: 1,
  minDate: new Date(min_year, 0, 1),
  maxDate: new Date(max_year, 12, 31),
  yearRange: [min_year,max_year]
});

/* warranty "start" */
new Pikaday(
{
  field: document.getElementById('bought'),
  firstDay: 1,
  minDate: new Date(min_year, 0, 1),
  maxDate: new Date(max_year, 12, 31),
  yearRange: [min_year,max_year]
});

</script>