<div class="row">
	<div class="col-md-12 text-center">
		<div class="paging">
			<?php
				if($this->Paginator->hasPage(2)){
				echo $this->Paginator->first('First', array('class' => 'btn'));
				echo $this->Paginator->prev(__($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-backward'))), array('class' => 'btn', 'escape' => false), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => '', 'class' => 'numbers'));
				echo $this->Paginator->next(__($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-forward'))), array('class' => 'btn', 'escape' => false), array(), null, array('class' => 'next disabled'));
				}
				echo $this->Paginator->last('Last', array('class' => 'btn'));
			?>
		</div>
	</div>
</div>
