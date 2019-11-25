<?php echo $this->Form->postLink(
	$this->Html->tag(
		'i', 
		'', 
		[
			'class' => 'glyphicon glyphicon-remove'
		]) . " ",
		[
			'action' => 'adminDelete', 
			$idDeleteAction
		],
		[
			'escape' => false, 
			'confirm' => 'Are you sure you want to delete ' . $displayDeleteAction . '?'
		],
		[
			'class' => 'btn btn-mini btn-noPadding'
		]
); ?>