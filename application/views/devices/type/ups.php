<div class="form-group">
  <label for="reference" class="col-sm-2 control-label">Brand</label>
  <div class="col-sm-10">
    <select name="brand" id="brand" class="form-control">
      <option value="APC" <?php echo ((isset($device['brand']) && $device['brand'] == 'APC' ) ? 'selected' : ''); ?>>APC</option>
    </select>
  </div>
</div>

<div class="form-group">
	<label for="capacity" class="col-sm-2 control-label">capacity</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" name="capacity" id="capacity" placeholder="capacity">
	</div>
</div>
