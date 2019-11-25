<?php $this->start('meta'); ?>
	<title>Snookview - Edit Comment</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' => 'delete', $comment->comment_id
					    ],
					    [
					    	'confirm' => 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Comment.comment_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Comment.comment_body'))); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create($comment->comment_id, [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
		<fieldset>
			<legend><?php echo __('Edit Comment'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->control('comment_body', array(
						'label' => 'Body',
						'placeholder' => 'Body',
						'class' => 'form-control',
						'value' => $comment->comment_body
					));
				?>
			</div>
			<div class="form-group">
				<?php
					/*echo $this->Form->input('modified', array(
						'type' => 'hidden',
						'label' => 'Modified',
						'class' => 'form-control date',
					));*/
					echo $this->Form->control('user_id', [
						'class' => 'form-control',
						'value' => $comment->user_id
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('video_id', [
						'class' => 'form-control',
						'value' => $comment->video_id
					]);
				?>
			</div>
			<div class="submit">
				<?php
					echo $this->Form->button(__('Edit'), ['class'=> 'btn btn-default btn-success btn-lg']);
				?>
			</div>
			<?php
				echo $this->Form->end();
			?>
		</fieldset>
	</div>
</div>
