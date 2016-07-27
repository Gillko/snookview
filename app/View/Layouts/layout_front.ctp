<!DOCTYPE html>
<html>
	<?php echo $this->element('head', array(
		"title" => 'Snookview'
	)); ?>
	<body>
		<div id="container">
			<nav class="navbar navbar-default front" role="navigation">
				<div class='row'>
					<div class='col-md-1'>
					</div>
					<div class='col-md-10'>
						<?php echo $this->element('nav_front', array(
							"location" => 'front',
							"headingOne" => "",
						)); ?>
					</div>
					<div class='col-md-1'>
					</div>
				</div>
			</nav>
			<?php echo $this->Session->flash(); ?>
			<div class="content">
				<?php echo $this->fetch('content'); ?>
				<div class="push"></div>
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
	</body>
</html>