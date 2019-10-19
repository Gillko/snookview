<?php $this->start('meta'); ?>
	<title>Snookview - Add Session</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Sessions', [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
		<fieldset>
			<legend><?php echo __('Add Session'); ?></legend>

			<div class="form-group">
				<?php
					echo $this->Form->control('session_title', [
						'label' => 'Title',
						'placeholder' => 'Title',
						'class' => 'form-control'
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('session_description', [
						'label' => 'Description',
						'placeholder' => 'Description',
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