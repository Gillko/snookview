<?php $this->start('meta'); ?>
	<title>Snookview - Admin Edit Season</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' => 'delete', $season->season_id
					    ],
					    [
					    	'confirm' => 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Season.season_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Season.season_beginYear'))); ?>
			</li>
		</ul>
	</div>

	<div class="col-md-9">
		<?php echo $this->Form->create($season->season_id, [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well'
		]); ?>
		<fieldset>
			<legend><?php echo __('Admin Edit Season'); ?></legend>
			<div class="form-group">
				<?php
					echo $this->Form->control($season->season_beginYear, [
						'type' => 'year',
						'minYear' => date('Y')-100, 
						'maxYear' => date('Y')-0+1, 
						'label' => 'Begin Year',
						'empty' => '- select -',
						'name' => 'season_beginYear',
						'class' => 'form-control',
						'id' => 'season-beginyear',
						'value' => $season->season_beginYear
					])
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control($season->season_endYear, [
						'type' => 'year',
					    'minYear' => date('Y')-100, 
					    'maxYear' => date('Y')-0+1, 
					    'label' => 'End Year',
					    'empty' => '- select -',
						'class' => 'form-control',
						'name' => 'season_endYear',
						'id' => 'season-endyear',
						'value' => $season->season_endYear
					])
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
<script>
	document.getElementById('season-endyear').setAttribute("name", "season_endYear");
	document.getElementById('season-beginyear').setAttribute("name", "season_beginYear");
</script>