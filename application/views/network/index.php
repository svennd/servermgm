<div class="row">
  <div class="col-md-offset-1 col-md-10">
  		<h3>network</h3>
		<br/>
		<div class="btn-group" role="group" aria-label="...">
			<a href="<?php echo base_url(). 'network/add'; ?>" role="button" class="btn btn-default">New network</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<?php if($network_list) : ?>
			<table class="table">
			<tr>
				<th>device</th>
				<th>name</th>
				<th>mac</th>
				<th>ip</th>
				<th>notes</th>
				<th>Management</th>
			</tr>
				<?php foreach($network_list as $network): ?>
				<tr>
					<?php
						printf(
								'
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
								',
								(isset($network['devices']['name']) ? $network['devices']['name'] : '-'),
								$network['name'],
								$network['mac'],
								$network['ip'],
								$network['notes']
						);
					?>
					<td>
						<a href="<?php echo base_url(). 'network/edit/' . $network['id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="<?php echo base_url(). 'network/remove/' . $network['id']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		<?php else: ?>
			<br/>
			<i>No network found yet. <a href="<?php echo base_url(). 'network/add'; ?>">Lets add one!</a></i>
		<?php endif; ?>
	</div>
</div>