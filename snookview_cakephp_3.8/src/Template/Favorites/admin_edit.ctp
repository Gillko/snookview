<?php $this->start('meta'); ?>
	<title>Snookview - Edit Favorite</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' => 'delete', $favorite->favorite_id
					    ],
					    [
					    	'confirm' => 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Favorite.favorite_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Favorite.favorite_id'))); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create('Favorite', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); ?>
		<fieldset>
			<legend><?php echo __('Edit Favorite'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->control('user_id', array(
						'class' => 'form-control',
						'value' => $favorite->user_id
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('video_id', array(
						'class' => 'form-control',
						'value' => $favorite->video_id
					));
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