<div class="row">
  <div class="col-md-offset-1 col-md-10">
		<h3>Devices <a href="<?php echo base_url(). "devices/add"; ?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> new</a></h3>
	</div>
</div>

<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<?php if($device_list) : ?>
		<table id="devices_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th>Position</th>
			<th>Name</th>
			<th>Serial</th>
			<th>Warranty</th>
			<th>Manage</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($device_list as $device): ?>
			<tr>
				<?php
					printf(
							'
								<td>%s</td>
								<td><strong>%s</strong><br/>%s</td>
								<td>%s</td>
								<td>%s</td>
							',
							'<abbr title="' . $device['rack']['notes'] . '">' . $device['rack']['name'] . '</abbr><br/><abbr title="Size">S:</abbr>' . $device['size'] . 'U',
							$device['name'],
							$device['brand'],
							$device['serial'],
							$device['warranty']
						);
				?>
				<td>
					<a href="<?php echo base_url(). 'devices/edit/' . $device['id']; ?>" role="button" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					<a href="<?php echo base_url(). 'devices/remove/' . $device['id']; ?>" role="button" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
	</div>
</div>

<script>
$(document).ready(function() {
    $('#devices_table').DataTable({
			"iDisplayLength": 50,
			"bLengthChange": false,
			"order": [[ 0, "desc" ]]
	});
} );
</script>