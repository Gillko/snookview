<!DOCTYPE html>
<html>
	<?php echo $this->element('head', array(
		"title" => 'Snookview'
	)); ?>
	<body>
		<div id="container">
			<nav class="navbar navbar-default home" role="navigation">
				<?php echo $this->element('nav_front', array(
					"location" => 'home',
					"headingOne" => "<h1 class='heading home'>The site for on demand snooker videos<br/><br/>of the 3 biggest tournaments.</h1>",
				)); ?>
			</nav>
			<div class="content">
				<?php echo $this->fetch('content'); ?>
				<div class="push bgWhite"></div>
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
	</body>
</html>
