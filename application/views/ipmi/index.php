<div class="row">
  <div class="col-md-offset-1 col-md-10">
  		<h3>IPMI</h3>
		<br/>
		<div class="btn-group" role="group" aria-label="...">
			<a href="<?php echo base_url(). 'ipmi/add'; ?>" role="button" class="btn btn-default">New IPMI</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<?php if($ipmi_list) : ?>
			<table class="table">
			<tr>
				<th>device</th>
				<th>mac</th>
				<th>ip</th>
				<th>notes</th>
				<th>Management</th>
			</tr>
				<?php foreach($ipmi_list as $ipmi): ?>
				<tr>
					<?php
						printf(
								'
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
								',
								(isset($ipmi['devices']['name']) ? $ipmi['devices']['name'] : '-'),
								$ipmi['mac'],
								$ipmi['ip'],
								$ipmi['notes']
						);
					?>
					<td>
						<a href="<?php echo base_url(). 'ipmi/edit/' . $ipmi['id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="<?php echo base_url(). 'ipmi/remove/' . $ipmi['id']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		<?php else: ?>
			<br/>
			<i>No ipmi found yet. <a href="<?php echo base_url(). 'ipmi/add'; ?>">Lets add one!</a></i>
		<?php endif; ?>
	</div>
</div>