<?php $this->start('meta'); ?>
	<title>Snookview - Add Timeline</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Timelines', [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
		<fieldset>
			<legend><?php echo __('Add Timeline'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->input('timeline_title', array(
						'label' => 'Title',
						'placeholder' => 'Title',
						'class' => 'form-control'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('timeline_description', array(
						'label' => 'Description',
						'placeholder' => 'Description',
						'class' => 'form-control'
					));
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
