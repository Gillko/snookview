<!DOCTYPE html>
<html>
	<?php echo $this->element('head', array(
		"title" => 'Backoffice Snookview'
	)); ?>
	<body>
		<div id="container">
			<nav class="navbar navbar-default" role="navigation">
				<?php echo $this->element('nav_back'); ?>
			</nav>
			<?php echo $this->Flash->render() ?>
			<div class="content">
				<?php echo $this->fetch('content'); ?>
				<div class="push"></div>
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
	</body>
</html>