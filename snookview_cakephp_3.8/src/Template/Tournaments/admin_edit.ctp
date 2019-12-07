<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Tournament</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
					    'Delete',[
					    	'action' 	=> 'delete', $tournament->torunament_id
					    ],
					    [
					    	'confirm' 	=> 'Are you sure?'
					    ]
					)
				?>
				<?php
					echo $this->Form->end();
				?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php 
			echo $this->Form->create($tournament->tournament_id, 
				[
					'inputDefaults' => [
						'div' 			=> 'form-group',
						'wrapInput' 	=> false,
						'class' 		=> 'form-control'
					],
					'class' 			=> 'well',
					'type' 				=> 'file'
				]
			);
		?>
		<fieldset>
			<legend><?php echo __('Admin Edit Tournament'); ?></legend>
			<?php
				echo $this->Form->control($tournament->tournament_year, 
					[
						'type' 			=> 'year',
						'minYear' 		=> date('Y')-100, 
						'maxYear' 		=> date('Y')-0+1, 
						'label' 		=> 'Tournament Year',
						'empty' 		=> '- select -',
						'name' 			=> 'tournament_year',
						'class' 		=> 'form-control',
						'value' 		=> $tournament->tournament_year,
						'id' 			=> 'TournamentTournamentYearYear'
					]
				);
		
				echo $this->Form->control('tournament_name', 
					[
						'label' 		=> 'Name',
						'class' 		=> 'form-control',
						'value' 		=> $tournament->tournament_name,
						'id' 			=> 'TournamentTournamentName'
					]
				);
		
				echo $this->Form->control('tournament_slug', 
					[
						'label' 		=> 'Slug',
						'class' 		=> 'form-control',
						'value' 		=> $tournament->tournament_slug,
						'id' 			=> 'TournamentTournamentSlug'
					]
				);
		
				echo $this->Form->control('tournament_vennue', 
					[
						'label' 		=> 'Vennue',
						'class' 		=> 'form-control',
						'value' 		=> $tournament->tournament_vennue
					]
				);
		
				echo $this->Form->control('tournament_beginDate', 
					[
						'label' 		=> 'Begin Date',
						'type' 			=> 'date',
						//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
						//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
						//'dateFormat' => 'd-m-Y H:i:s',
						'value' 		=> $tournament->tournament_beginDate
					]
				);
		
				echo $this->Form->control('tournament_endDate', 
					[
						'label' 		=> 'End Date',
						'type' 			=> 'date',
						//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
						//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
						//'dateFormat' => 'd-m-Y H:i:s',
						'value' 		=> $tournament->tournament_endDate
					]
				);
			?>
			
			<?php if(!empty($tournament->tournament_winner)): ?>

				<div class="input">
					<label>Current Image (change by clicking image):</label>
					<?php echo $this->Html->image('/img/winners/' . $tournament->tournament_winner, ['class' => 'winnerImage', 'width' => 100]); ?>
				</div>

			<?php endif; ?>

			<?php
				echo $this->Html->div('upload');
					echo $this->Form->control($tournament->tournament_winner, 
						[
							'label' 	=> 'Image',
							'type' 		=> 'file',
							'required' 	=> true,
							'disabled' 	=> true,
							'class' 	=> 'input-upload form-control',
							'value' 	=> $tournament->tournament_winner,
							'name' 		=> 'tournament_winner'
						]
					);
				echo '</div>';

				echo $this->Form->control('tournament_winnerSrc', 
					[
						'label' 		=> 'Source of image',
						'class' 		=> 'form-control',
						'value' 		=> $tournament->tournament_winnerSrc
					]
				);
		
				echo $this->Html->div(
					'submit'
				);

				echo $this->Form->button(
					__('Edit'), 
						[
							'class'		=> 'btn btn-default btn-success btn-lg'
						]
					)
				;

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

	document.getElementById('TournamentTournamentYearYear').setAttribute("name", "tournament_year");
</script>