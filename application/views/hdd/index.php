<div class="row">
  <div class="col-md-offset-1 col-md-10">
		<h3>HDD <a href="<?php echo base_url(). "hdd/add"; ?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> new</a></h3>
	</div>
</div>
					
<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<table id="hdd_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th>serial</th>
			<th>specs</th>
			<th>warranty</th>
			<th>status</th>
			<th>vendor</th>
			<th>device</th>
			<th>notes</th>
			<th>Mgm</th>
		</tr>
		</thead>
		<tbody>
			<?php if($hdd_list) : ?>
			<?php foreach($hdd_list as $hdd): ?>
			<tr>
				<?php
					# switch status
					/* colors are cool, but don't know if this is needed
					switch ($hdd['status']) 
					{
						case "RMA": 
							$status = '<span style="color:#d1d1d1">RMA</span>';
							break;
						case "cold": 
							$status = '<span style="color:#75bdbd">cold</span>';
							break;
						default :
					}
					*/
							$status = $hdd['status'];
					
					printf(
							'
								<td>%s</td>
								<td>%s, %s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
							',
							(!empty($hdd['serial']) ? $hdd['serial'] : '-'),
							(!empty($hdd['brand']) ? $hdd['brand'] : '-'),
							(!empty($hdd['capacity']) ? $hdd['capacity'] : '-'),
							(!empty($hdd['warranty']) ? $hdd['warranty'] : '-'),
							$status,
							(!empty($hdd['vendor']) ? $hdd['vendor'] : '-'),
							(isset($hdd['devices']['name']) ? $hdd['devices']['name'] : '-'),
							(!empty($hdd['notes']) ? $hdd['notes'] : '-')
					);
				?>
				<td>
					<a href="<?php echo base_url(). 'hdd/edit/' . $hdd['id']; ?>" role="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					<a href="<?php echo base_url(). 'hdd/remove/' . $hdd['id']; ?>" role="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
		</table>
	</div>
</div>
<script>
$(document).ready(function() {
    $('#hdd_table').DataTable({
			"iDisplayLength": 50,
			"bLengthChange": false, 
			"stateSave": true,
			"dom": "<'row'<'col-md-6'<'btn-group'<'selections'>>><'col-md-6'f>>rtip"
	});
	
	$("div.selections").append(
						'Show : ' +
						<?php if(!$filter): ?>
							'<a href="<?php echo base_url(). "hdd/index/hot"; ?>" role="button" class="btn btn-default btn-sm" style="margin-right:3px;">hot only</a>' +
							'<a href="<?php echo base_url(). "hdd/index/cold"; ?>" role="button" class="btn btn-default btn-sm" style="margin-right:3px;">cold only</a>' +
							'<a href="<?php echo base_url(). "hdd/index/backup"; ?>" role="button" class="btn btn-default btn-sm" style="margin-right:3px;">backup only</a>' +
							'<a href="<?php echo base_url(). "hdd/index/lost"; ?>" role="button" class="btn btn-default btn-sm" style="margin-right:3px;">lost</a>'
						<?php else : ?>
							'<button class="btn btn-default btn-sm disabled" type="button" style="margin-right:3px;"><?php echo $filter_text; ?></button>' +
							'<a href="<?php echo base_url(). "hdd/"; ?>" role="button" class="btn btn-default btn-sm" style="margin-right:3px;">all</a>'
						<?php endif; ?>
						);
} );
</script>