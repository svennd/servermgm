<div class="row">
  <div class="col-md-offset-1 col-md-10">
		<h3>Events <a href="<?php echo base_url(). "events/add"; ?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> new</a></h3>
	</div>
</div>
  
<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<?php if($events) : ?>
		<table id="events_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th>#</th>
			<th>Date</th>
			<th>Title</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($events as $event): ?>
			<tr>
				<?php
					printf(
							'
								<td>%s</td>
								<td>%s</td>
								<td>%s</td>
							',
							$event['id'],
							$event['created_at'],
							$event['title']
						);
				?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
	</div>
</div>

<script>
$(document).ready(function() {
    $('#events_table').DataTable({
			"iDisplayLength": 50,
			"bLengthChange": false,
			"order": [[ 0, "desc" ]]
	});
} );
</script>