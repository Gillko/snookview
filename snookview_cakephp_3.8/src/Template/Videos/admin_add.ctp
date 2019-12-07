<?php $this->start('meta'); ?>

	<title>Snookview - Admin Add Video</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-12">
		<?php 
			echo $this->Form->create('Videos', 
				[
					'inputDefaults' => 
					[
						'div' 					=> 'form-group',
						'wrapInput'				=> false,
						'class' 				=> 'form-control'
					],
					'class' 					=> 'well'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Add Video'); ?></legend>
			<?php
				echo $this->Form->control('video_title', 
					[
						'label' 		=> 'Title',
						'placeholder' 	=> 'Title',
						'id' 			=> 'VideoVideoTitle',
						'class' 		=> 'form-control'
					]
				);
		
				echo $this->Form->control('video_slug', 
					[
						'label' 		=> 'Slug',
						'placeholder' 	=> 'Slug',
						'id' 			=> 'VideoVideoSlug',
						'class' 		=> 'form-control'
					]
				);

				echo $this->Form->control('video_date', 
					[
						'label' 		=> 'Date',
						'placeholder' 	=> 'Date',
						'type' 			=> 'date'
						//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
						//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
						//'dateFormat' => 'd-m-Y H:i:s',
					]
				);
			
				echo $this->Form->control('video_scoreA', 
					[
						'label' 		=> 'Score A',
						'placeholder' 	=> 'Score A',
						'class' 		=> 'form-control'
					]
				);
		
				echo $this->Form->control('video_scoreB', 
					[
						'label' 		=> 'Score B',
						'placeholder' 	=> 'Score B',
						'class' 		=> 'form-control'
					]
				);
	
				echo $this->Form->control('video_url', 
					[
						'label' 		=> 'URL',
						'placeholder' 	=> 'URL',
						'class' 		=> 'form-control'
					]
				);
		
				echo $this->Form->control('session_id', 
					[
						'class' 		=> 'form-control',
						'id' 			=> 'VideoVideoSession'
					]
				);
		
				echo $this->Form->control('tournament_id', 
					[
						'class' 		=> 'form-control',
						'id' 			=> 'VideoTournamentId'
					]
				);
	
				echo $this->Form->control('round_id', 
					[
						'class' 		=> 'form-control',
						'id' 			=> 'VideoRoundId'
					]
				);
		
				echo $this->Form->control('timeline_id', 
					[
						'class' 		=> 'form-control'
					]
				);
		
				echo $this->Form->control('players._ids', 
					[
					    'options' 		=> $players,
						'class' 		=> 'form-control',
						'multiple' 		=> true
					]
				);

				echo $this->Html->div(
					'submit'
				);

				echo $this->Form->button(
					__('Add'),
						[
							'class'			=> 'btn btn-default btn-success btn-lg submit'
						]
					)
				;

				echo $this->Form->end();
			?>
		</fieldset>
	</div>
</div>
<script>
	$('#VideoVideoTitle').bind('keypress blur', function() {
		$('#VideoVideoSlug').val(
			$('#VideoTournamentId option:selected').text().toLowerCase().replace(
				/[\s]/g, '-') + '/' + $('#VideoRoundId option:selected').text().toLowerCase().replace(
				/[\s]/g, '-') + '/' + $('#VideoVideoTitle').val().toLowerCase().replace(
				/['"’]/g, '').replace(/[\s]/g, '-') + '/' + $('#VideoVideoSession option:selected').text().toLowerCase().replace(
				/[\s]/g, '-')
			);
	});

	$('#VideoVideoSession').bind('keypress blur', function() {
		$('#VideoVideoSlug').val(
			$('#VideoTournamentId option:selected').text().toLowerCase().replace(
				/[\s]/g, '-') + '/' + $('#VideoRoundId option:selected').text().toLowerCase().replace(
				/[\s]/g, '-') + '/' + $('#VideoVideoTitle').val().toLowerCase().replace(
				/['"’]/g, '').replace(/[\s]/g, '-') + '/' + $('#VideoVideoSession option:selected').text().toLowerCase().replace(
				/[\s]/g, '-')
			);
	});
</script>