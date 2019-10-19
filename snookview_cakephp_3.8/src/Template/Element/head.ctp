<head>
	<?php echo $this->Html->charset(); ?>
	
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<meta name="description" content="SNOOKVIEW The site for on demand snooker videos of the 3 biggest tournaments."/>
	<meta name="keywords" content="snooker, 147, maximum, bbc, bbcsport, cue, uk, championship, masters, world"/>

	<?php echo $this->fetch('meta'); ?>
	<?php
		echo $this->Html->meta('icon');

		//===BEGIN JQUERY FILES===//
		echo $this->Html->script('libraries/jquery/jquery-1.10.2.min.js');
		echo $this->Html->script('libraries/jquery/jquery-ui.js');
		//===END JQUERY FILES===//

		//===BEGIN BOOTSTRAP FILES===//
		echo $this->Html->css('libraries/bootstrap/bootstrap.min');
		echo $this->Html->script('libraries/bootstrap/bootstrap.min');
		//===END BOOTSTRAP FILES===//

		//===BEGIN OWN FILES===//
		echo $this->Html->css('style');
		//===END OWN FILES===//
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>