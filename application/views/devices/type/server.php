<!-- server specific fields -->
<div class="form-group">
  <label for="reference" class="col-sm-2 control-label">Brand</label>
  <div class="col-sm-10">
    <select name="brand" id="brand" class="form-control">
      <option value="Supermicro" <?php echo ((isset($device['brand']) && $device['brand'] == 'Supermicro' ) ? 'selected' : ''); ?>>Supermicro</option>
      <option value="DELL" <?php echo ((isset($device['brand']) && $device['brand'] == 'DELL' ) ? 'selected' : ''); ?>>DELL</option>
      <option value="HP" <?php echo ((isset($device['brand']) && $device['brand'] == 'HP' ) ? 'selected' : ''); ?>>HP</option>
    </select>
  </div>
</div>

<div class="form-group">
	<label for="cpu_count" class="col-sm-2 control-label">CPU count (socket)</label>
	<div class="col-sm-10">
		<select name="cpu_count" id="cpu_count" class="form-control">
				<option value="0">other</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="4">4</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label for="cpu_type" class="col-sm-2 control-label">CPU type, name</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" name="cpu_type" id="cpu_type" placeholder="CPU Name">
	</div>
</div>

<div class="form-group">
	<label for="mem_banks" class="col-sm-2 control-label">Memory : banks/filled/size</label>
	<div class="row">
	  <div class="col-sm-3">
		<input type="text" class="form-control" name="mem_banks" id="mem_banks" placeholder="mem_banks">
	  </div>
	  <div class="col-sm-3">
		<input type="text" class="form-control" name="mem_filled" id="mem_filled" placeholder="mem_filled">
	  </div>
	  <div class="col-sm-3">
			<div class="input-group">
				<input type="text" class="form-control" name="mem_size" id="mem_size" placeholder="size">
				<div class="input-group-addon">GB</div>
			</div>
	  </div>
	</div>
</div>

<div class="form-group">
	<label for="disk_count" class="col-sm-2 control-label">Disks count</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" name="disk_count" id="disk_count" placeholder="nr of disks">
	</div>
</div>