<div class="row viewActions">
	<div class="col-md-4 text-center">
		<?php echo $this->Html->link(
		    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-list-alt')) . "$list",
		    array('action' => 'adminIndex'),
		    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
		); ?>
	</div>
	<div class="col-md-4 text-center">
		<?php echo $this->Html->link(
		    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . " $edit",
		    array('action' => 'adminEdit', $id),
		    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
		); ?>
	</div>
	<div class="col-md-4 text-center">
		<?php echo $this->Form->postLink(
			$this->Html->tag(
				'i', 
				'', 
				[
					'class' => 'glyphicon glyphicon-remove'
				]) . " $delete",
				[
					'action' => 'adminDelete', 
					$id
				],
				[
					'escape' => false, 
					'confirm' => 'Are you sure you want to delete ' . $display . '?'
				],
				[
					'class' => 'btn btn-mini btn-noPadding'
				]
		); ?>
	</div>
</div>