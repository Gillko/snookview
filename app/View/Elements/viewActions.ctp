<div class="row viewActions">
	<div class="col-md-4 text-center">
		<?php echo $this->Html->link(
		    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-list-alt')) . "$list",
		    array('action' => 'admin_index'),
		    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
		); ?>
	</div>
	<div class="col-md-4 text-center">
		<?php echo $this->Html->link(
		    $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . " $edit",
		    array('action' => 'admin_edit', $id),
		    array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
		); ?>
	</div>
	<div class="col-md-4 text-center">
		<?php echo $this->Form->postLink(
		   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). " $delete",
		        array('action' => 'admin_delete', $id),
		        array('escape'=>false),
		    __('Are you sure you want to delete %s?', $display),
		   array('class' => 'btn btn-mini btn-noPadding')
		); ?>
	</div>
</div>