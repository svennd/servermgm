<div class="row">
  <div class="col-md-offset-1 col-md-10">
		<h3>Racks <a href="<?php echo base_url(). "racks/add"; ?>" role="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> new</a></h3>
	</div>
</div>

<div class="row">
	<div class="col-md-offset-1 col-md-10">&nbsp;
		<?php if($rack_list) : ?>
			<?php foreach($rack_list as $rack): ?>				
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $rack['name']; ?>
						<?php if(isset($rack['devices'])): ?>
						<span class="badge" style="float:right;">
							<a href="<?php echo base_url(). 'devices/index/' . $rack['id']; ?>" style="color:white;">
								<?php echo count($rack['devices']);?> <?php echo (count($rack['devices']) == 1) ? "device" : "devices"; ?>
							</a>
						</span>
						<?php else: ?>
						<span class="badge" style="float:right;"><a href="<?php echo base_url(). 'devices/add/' . $rack['id']; ?>" style="color:white;">0 device</a></span>
						<?php endif; ?>
					</h3>
				</div>
				<div class="panel-body">
					<?php echo (!empty($rack['size']) ? "Size : " . $rack['size'] . '<br/>' : ''); ?>
					<?php echo (!empty($rack['location']) ? "Location : " . $rack['location'] . '<br/>' : ''); ?>
					<?php echo (!empty($rack['notes']) ? "Notes : " . $rack['notes'] . '<br/>' : ''); ?>
				</div>
				<div class="panel-footer" style="min-height:50px">
					&nbsp;
					<span style="float:right;">
						<a href="<?php echo base_url(). 'devices/add/' . $rack['id']; ?>" role="button" class="btn btn-default" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
						<a href="<?php echo base_url(). 'racks/edit/' . $rack['id']; ?>" role="button" class="btn btn-default" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						<a href="<?php echo base_url(). 'racks/remove/' . $rack['id']; ?>" role="button" class="btn btn-default" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
					</span>
				</div>
			</div>
			<?php endforeach; ?>
		<?php else: ?>
			<br/>
			<i>No racks found yet. <a href="<?php echo base_url(). 'racks/add'; ?>">Lets add one!</a></i>
		<?php endif; ?>
	</div>
</div>