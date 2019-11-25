<?php $this->start('meta'); ?>
	<title>Snookview - Edit Ranking</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
				$this->Form->postLink(
				    'Delete',[
				    	'action' => 'delete', $ranking->ranking_id
				    ],[
				    	'confirm' => 'Are you sure?'
				    ]
				)
				?>
				<?php
					echo $this->Form->end();
				?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ranking.ranking_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Ranking.ranking_points'))); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create($ranking->ranking_id, array(
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
				'class' => 'well'
			)); ?>
		<fieldset>
			<legend><?php echo __('Edit Ranking'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->control('ranking_rank', array(
						'label' => 'Rank',
						'placeholder' => 'Rank',
						'class' => 'form-control',
						'value' => $ranking->ranking_rank
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('ranking_points', array(
						'label' => 'Points',
						'placeholder' => 'Points',
						'class' => 'form-control',
						'value' => $ranking->ranking_points
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_id', [
						'class' => 'form-control',
						'value' => $ranking->player_id
					]);
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('season_id', [
						'class' => 'form-control',
						'value' => $ranking->season_id
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
