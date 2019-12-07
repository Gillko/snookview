<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Comment</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' 	=> 'delete', $comment->comment_id
					    ],
					    [
					    	'confirm' 	=> 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php 
			echo $this->Form->create($comment->comment_id, 
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
			<legend><?php echo __('Admin Edit Comment'); ?></legend>
			<?php
				echo $this->Form->control('comment_body', 
					[
						'label' 		=> 'Body',
						'class' 		=> 'form-control',
						'value' 		=> $comment->comment_body
					]
				);

				echo $this->Form->control('user_id', 
					[
						'class' 		=> 'form-control',
						'value' 		=> $comment->user_id
					]
				);

				echo $this->Form->control('video_id', 
					[
						'class' 		=> 'form-control',
						'value' 		=> $comment->video_id
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