<?php $this->start('meta'); ?>
	<title>Snookview - Add Comment</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Comments', [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
		<fieldset>
			<legend><?php echo __('Add Comment'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->input('comment_body', [
						'label' => 'Body',
						'placeholder' => 'Body',
						'class' => 'form-control'
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('comment_created', [
						'type' => 'hidden'
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('user_id', [
						'class' => 'form-control'
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('video_id', [
						'class' => 'form-control'
					]);
				?>
			</div>
			<div class="submit">
				<?php
					echo $this->Form->button(__('Add'),['class'=> 'btn btn-default btn-success btn-lg']);
				?>
			</div>

			<?php
				echo $this->Form->end();
			?>
		</fieldset>
	</div>
</div>
