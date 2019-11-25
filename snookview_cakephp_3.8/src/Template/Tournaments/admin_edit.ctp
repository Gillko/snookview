<?php $this->start('meta'); ?>
	<title>Snookview - Edit Tournament</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' => 'delete', $tournament->torunament_id
					    ],
					    [
					    	'confirm' => 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tournament.tournament_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Tournament.tournament_name'))); ?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create($tournament->tournament_id, [
			'inputDefaults' => [
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			],
			'class' => 'well',
			'type' => 'file'
		]); ?>
	<fieldset>
		<legend><?php echo __('Edit Tournament'); ?></legend>
		<div class="form-group">
			<?php
				echo $this->Form->control($tournament->tournament_year, [
					'type' => 'year',
					'minYear' => date('Y')-100, 
					'maxYear' => date('Y')-0+1, 
					'label' => 'Tournament Year',
					'empty' => '- select -',
					'name' => 'tournament_year',
					'class' => 'form-control',
					'value' => $tournament->tournament_year,
					'id' => 'TournamentTournamentYearYear'
				]);
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('tournament_name', array(
					'label' => 'Name',
					'placeholder' => 'Name',
					'class' => 'form-control',
					'value' => $tournament->tournament_name,
					'id' => 'TournamentTournamentName'
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('tournament_slug', array(
					'label' => 'Slug',
					'placeholder' => 'Slug',
					'class' => 'form-control',
					'value' => $tournament->tournament_slug,
					'id' => 'TournamentTournamentSlug'
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('tournament_vennue', array(
					'label' => 'Vennue',
					'placeholder' => 'Vennue',
					'class' => 'form-control',
					'value' => $tournament->tournament_vennue
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('tournament_beginDate', array(
					'label' => 'Begin Date',
					'placeholder' => 'Date',
					'type' => 'date',
					//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
					//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
					//'dateFormat' => 'd-m-Y H:i:s',
					'value' => $tournament->tournament_beginDate
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('tournament_endDate', array(
					'label' => 'End Date',
					'placeholder' => 'Date',
					'type' => 'date',
					//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
					//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
					//'dateFormat' => 'd-m-Y H:i:s',
					'value' => $tournament->tournament_endDate
				));
			?>
		</div>
		<div class="form-group">
			<?php if(!empty($tournament->tournament_winner)): ?>
				<div class="input">
					<label>Current Image (change by clicking image):</label>
					<?php echo $this->Html->image('/img/winners/' . $tournament->tournament_winner, array('class' => 'winnerImage', 'width' => 100)); ?>
				</div>
			<?php endif; ?>
			<?php
				echo $this->Html->div('upload');
					echo $this->Form->control($tournament->tournament_winner, array(
						'label' => 'Image',
						'placeholder' => 'Image',
						'type' => 'file',
						'required' => true,
						'disabled' => true,
						'class' => 'input-upload form-control',
						'value' => $tournament->tournament_winner,
						'name' => 'tournament_winner'
					));
				
			?>
		</div>
		<div class="form-group">
			<?php
				echo '</div>';
				echo $this->Form->control('tournament_winnerSrc', array(
					'label' => 'Source of image',
					'placeholder' => 'Source of image',
					'class' => 'form-control',
					'value' => $tournament->tournament_winnerSrc,
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
<script>
	$('.upload').hide();
	$('.winnerImage').click(function(){
		$('.upload').slideToggle(200);
		if($('.input-upload').attr('disabled'))
			$('.input-upload').removeAttr('disabled');
	    else
	    	$('.input-upload').attr('disabled', 'disabled');
	})
</script>
<script>
$('#TournamentTournamentName').bind('keypress blur', function() {
	$('#TournamentTournamentSlug').val(
		$('#TournamentTournamentName').val().toLowerCase().replace(
			/[\s]/g, '-')
		+ '-'
		+ $('#TournamentTournamentYearYear option:selected').text()
		);
	}
);

$('#TournamentTournamentYearYear').click(function() {
	$('#TournamentTournamentSlug').val(
		$('#TournamentTournamentName').val().toLowerCase().replace(
			/[\s]/g, '-')
		+ '-'
		+ $('#TournamentTournamentYearYear option:selected').text()
		);
	}
);

/*$('#TournamentTournamentSlug').bind('keypress blur', function() {
	$('#TournamentTournamentRoute').val('Router::connect("/tournaments/' + $('#TournamentTournamentSlug').val() + '", array("controller" => "tournaments", "action" => "view", ' + $('#TournamentTournamentId').val() +'));');
});*/
</script>
<script>
	document.getElementById('TournamentTournamentYearYear').setAttribute("name", "tournament_year");
</script>