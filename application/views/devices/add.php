<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<form action="<?php echo base_url(); ?>devices/store" class="form-horizontal" method="post" accept-charset="utf-8">
			<div class="form-group">
				<!-- RACK selector -->
				<label for="rack" class="col-sm-2 control-label">rack</label>
				<div class="col-sm-10">
					  <select name="rack" id="rack" class="form-control">
					  <?php if($rack_preselect): ?>
						<?php foreach($rackinfo as $rack): ?>
								<option value="<?php echo $rack['id']; ?>" <?php echo (($rack_preselect == $rack['id'] ) ? 'selected' : ''); ?>>#<?php echo $rack['id']; ?> <?php echo $rack['name']; ?></option>
							<?php endforeach; ?>
					  <?php elseif($rackinfo): ?>
							<?php foreach($rackinfo as $rack): ?>
								<option value="<?php echo $rack['id']; ?>" <?php echo ((isset($device['rack']) && $device['rack'] == $rack['id'] ) ? 'selected' : ''); ?>>#<?php echo $rack['id']; ?> <?php echo $rack['name']; ?></option>
							<?php endforeach; ?>
					  <?php endif; ?>
					 </select>
				</div>
			</div>
			
			<!-- device size -->
			<div class="form-group">
				<label for="size" class="col-sm-2 control-label">size</label>
				<div class="col-sm-10">
					<?php $device['size'] = (!isset($device['size'])) ? 1 : $device['size']; ?>
					  <select name="size" id="size" class="form-control">
							<option value="-1"<?php echo (($device['size'] == '-1' ) ? 'selected' : ''); ?>>Unknown/no-U format</option>
							<option value="1" <?php echo (($device['size'] == '1' ) ? 'selected' : ''); ?>>1U</option>
							<option value="2" <?php echo (($device['size'] == '2' ) ? 'selected' : ''); ?>>2U</option>
							<option value="3" <?php echo (($device['size'] == '3' ) ? 'selected' : ''); ?>>3U</option>
							<option value="4" <?php echo (($device['size'] == '4' ) ? 'selected' : ''); ?>>4U</option>
							<option value="5" <?php echo (($device['size'] == '5' ) ? 'selected' : ''); ?>>5U</option>
							<option value="6" <?php echo (($device['size'] == '6' ) ? 'selected' : ''); ?>>6U</option>
							<option value="7" <?php echo (($device['size'] == '7' ) ? 'selected' : ''); ?>>7U</option>
							<option value="8" <?php echo (($device['size'] == '8' ) ? 'selected' : ''); ?>>8U</option>
							<option value="9" <?php echo (($device['size'] == '9' ) ? 'selected' : ''); ?>>9U</option>
							<option value="10" <?php echo (($device['size'] == '10' ) ? 'selected' : ''); ?>>10U</option>
					 </select>
				</div>
			</div>
			
			<!-- device name/callname -->
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">name</label>
				<div class="col-sm-10">
			  <input type="text" class="form-control" name="name" id="name" value="<?php echo (isset($device['name']) ? $device['name'] : ''); ?>" placeholder="Device Name">
			</div>
			</div>
		
			<!-- show options based on the device type -->
			<div class="form-group">
			<label for="type" class="col-sm-2 control-label">Type</label>
			<div class="col-sm-10">
			   <select name="type" id="type" class="form-control">
						<option value="generic" <?php echo ((isset($device['type']) && $device['type'] == 'generic' ) ? 'selected' : ''); ?>>other</option>
						<option value="server" <?php echo ((isset($device['type']) && $device['type'] == 'server' ) ? 'selected' : ''); ?>>Server</option>
						<option value="switch" <?php echo ((isset($device['type']) && $device['type'] == 'switch' ) ? 'selected' : ''); ?>>Switch</option>
						<option value="ups" <?php echo ((isset($device['type']) && $device['type'] == 'ups' ) ? 'selected' : ''); ?>>UPS</option>
				</select>
			 </div>
		  </div>
		  
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">warranty</label>
				<div class="col-sm-10">
			  <input type="text" value="<?php echo (isset($device['warranty']) ? $device['warranty'] : ''); ?>" class="form-control" name="warranty" id="warranty" placeholder="Device warranty">
			</div>
			</div>
			
			<div class="form-group">
				<label for="read_length" class="col-sm-2 control-label">serial</label>
				<div class="col-sm-10">
				<input type="text" value="<?php echo (isset($device['serial']) ? $device['serial'] : ''); ?>" class="form-control" name="serial" id="serial" placeholder="Device serial">
				</div>
			</div>

			<!-- its a server -->
			<div id="type_server" class="type" style="display:none">
				<?php echo $page['server']; ?>
			</div>
			
			<!-- its a switch -->
			<div id="type_switch" class="type" style="display:none">
				<?php echo $page['switch']; ?>
			</div>
			
			<!-- its a ups -->
			<div id="type_ups" class="type" style="display:none">
				<?php echo $page['ups']; ?>
			</div>
			
		  <div class="form-group">
			<label for="comment" class="col-sm-2 control-label">notes</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="5" id="notes" name="notes"><?php echo (isset($device['notes']) ? $device['notes'] : ''); ?></textarea>
			</div>
		  </div>
		  
		  <?php if(isset($edit)): ?>
			<input type="hidden" name="edit" value="true" />
			<input type="hidden" name="id" value="<?php echo $device['id']; ?>" />
		  <?php endif; ?>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" name="submit" class="btn btn-default">submit</button>
			</div>
		  </div>
		</form>
	</div>
</div>
<script>
$(function() {
	$('#type').change(function(){
		$('.type').hide();
		$('#type_' + $(this).val()).show();
	});
});

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

</script>