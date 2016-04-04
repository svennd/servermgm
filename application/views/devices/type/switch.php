<div class="form-group">
  <label for="reference" class="col-sm-2 control-label">Brand</label>
  <div class="col-sm-10">
    <select name="brand" id="brand" class="form-control">
      <option value="HP" <?php echo ((isset($device['brand']) && $device['brand'] == 'HP' ) ? 'selected' : ''); ?>>HP</option>
    </select>
  </div>
</div>
<div class="form-group">
	<label for="ports" class="col-sm-2 control-label">ports</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" name="ports" id="ports" placeholder="ports">
	</div>
</div>