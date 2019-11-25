<?php $this->start('meta'); ?>
	<title>Snookview - Edit Timeline</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' => 'delete', $timeline->timeline_id
					    ],
					    [
					    	'confirm' => 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Timeline.timeline_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Timeline.timeline_title'))); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create($timeline->timeline_id, [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
	<fieldset>
		<legend><?php echo __('Edit Timeline'); ?></legend>
		<div class="form-group">
			<?php
				echo $this->Form->control('timeline_title', array(
					'label' => 'Title',
					'placeholder' => 'Title',
					'class' => 'form-control',
					'value' => $timeline->timeline_title
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('timeline_description', array(
					'label' => 'Description',
					'placeholder' => 'Description',
					'class' => 'form-control',
					'value' => $timeline->timeline_description
				));
		?>
		</div>
		<div class="form-group">
			<?php
				/*echo $this->Form->control('video_id', array(
					'class' => 'form-control',
					'value' => $timeline->video_id
				));*/
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
