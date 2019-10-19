<div class="row">
	<div class="col-md-12 text-center">
		<div class="paging">
			<?php
				if($this->Paginator->hasPage(2)){
					echo $this->Paginator->first(
						'First', [
							'class' => 'btn'
						]
					);
					
					echo $this->Paginator->prev(__(
						$this->Html->tag(
							'i',
							'', [
								'class' => 'glyphicon glyphicon-backward'
							]
						)), [
						'class' => 'btn', 
						'escape' => false]
						, 
						[], 
						null, [
							'class' => 'prev disabled'
						]
					);
					
					echo $this->Paginator->numbers([
						'separator' => '',
						'class' => 'numbers'
					]
				);
					
					echo $this->Paginator->next(__(
						$this->Html->tag(
							'i', 
							'', [
								'class' => 'glyphicon glyphicon-forward'
							]
						)), [
						'class' => 'btn',
						'escape' => false], 
						[], 
						null, [
							'class' => 'next disabled'
						]
					);
				}
					
				echo $this->Paginator->last(
					'Last', [
						'class' => 'btn'
					]
				);
			?>
		</div>
	</div>
</div>