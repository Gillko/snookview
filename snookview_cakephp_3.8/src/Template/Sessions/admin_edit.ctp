<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Session</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
				$this->Form->postLink(
				    'Delete',[
				    	'action' 	=> 'delete', $session->session_id
				    ],
				    [
				    	'confirm' 	=> 'Are you sure?'
				    ]
				)
				?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php 
			echo $this->Form->create($session->session_id, 
				[
					'inputDefaults' => 
					[
						'div' 			=> 'form-group',
						'wrapInput' 	=> false,
						'class' 		=> 'form-control'
					],
					'class' 			=> 'well'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Edit Session'); ?></legend>
			<?php
				echo $this->Form->control('session_title', 
					[
						'label' 		=> 'Title',
						'class' 		=> 'form-control',
						'value' 		=> $session->session_title
					]
				);
		
				echo $this->Form->control('session_description', 
					[
						'label' 		=> 'Description',
						'class' 		=> 'form-control',
						'value' 		=> $session->session_description
					]
				);
				
				echo $this->Html->div(
					'submit'
				);

				echo $this->Form->button(
					__('Edit'), 
						[
							'class'		=> 'btn btn-default btn-success btn-lg'
						]
					)
				;

				echo $this->Form->end();
			?>
		</fieldset>
	</div>
</div>