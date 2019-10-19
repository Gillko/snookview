<?php $this->start('meta'); ?>
	<title>Snookview - Add Ranking</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Rankings', [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
	<fieldset>
		<legend><?php echo __('Add Ranking'); ?></legend>
		<div class="form-group">
			<?php
				echo $this->Form->input('ranking_rank', [
					'label' => 'Rank',
					'placeholder' => 'Rank',
					'class' => 'form-control'
				]);
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->input('ranking_points', [
					'label' => 'Ranking Points',
					'placeholder' => 'Ranking Points',
					'class' => 'form-control'
				]);
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->input('player_id', [
					'class' => 'form-control'
				]);
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->input('season_id', [
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
