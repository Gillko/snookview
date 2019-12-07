<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Video</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
					$this->Form->postLink(
						'Delete',[
							'action' 	=> 'delete', $video->video_id
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
			echo $this->Form->create($video->video_id, 
				[
					'inputDefaults' => 
					[
						'div' 			=> 'form-group',
						'wrapInput' 	=> false,
						'class' 		=> 'form-control'
					],
					'class' 			=> 'well'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Edit Video'); ?></legend>
			<?php
				echo $this->Form->control('video_title', 
					[
						'label' 		=> 'Title',
						'class' 		=> 'form-control',
						'id' 			=> 'VideoVideoTitle',
						'value' 		=> $video->video_title
					]
				);
				
				echo $this->Form->control('video_slug', 
					[
						'label' 		=> 'Slug',
						'class' 		=> 'form-control',
						'id' 			=> 'VideoVideoSlug',
						'value' 		=> $video->video_slug
					]
				);
				
				echo $this->Form->control('video_date', 
					[
						'label' 		=> 'Date',
						'type' 			=> 'date',
						'value' 		=> $video->video_date
						//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
						//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
						//'dateFormat' => 'd-m-Y H:i:s',
					]
				);
			
				echo $this->Form->control('video_scoreA', 
					[
						'label' 		=> 'Score A',
						'class' 		=> 'form-control',
						'value' 		=> $video->video_scoreA
					]
				);
			
				echo $this->Form->control('video_scoreB', 
					[
						'label' 		=> 'Score B',
						'class' 		=> 'form-control',
						'value' 		=> $video->video_scoreB
					]
				);
		
				echo $this->Form->control('video_url', 
					[
						'label' 		=> 'URL',
						'class' 		=> 'form-control',
						'value' 		=> $video->video_url
					]
				);
	
				echo $this->Form->control('session_id',
					[
						'class' 		=> 'form-control',
						'id' 			=> 'VideoVideoSession',
						'value' 		=> $video->session_id
					]
				);
		
				echo $this->Form->control('tournament_id',
					[
						'class' 		=> 'form-control',
						'id' 			=> 'VideoTournamentId',
						'value' 		=> $video->tournament_id
					]
				);
		
				echo $this->Form->control('round_id',
					[
						'class' 		=> 'form-control',
						'id' 			=> 'VideoRoundId',
						'value' 		=> $video->round_id
					]
				);
		
				echo $this->Form->control('timeline_id',
					[
						'class' 		=> 'form-control',
						'value' 		=> $video->timeline_id
					]
				);
		
				echo $this->Form->control('players._ids', 
					[
						'options' 			=> $players,
						'class' 			=> 'form-control',
						'multiple' 			=> true,
						'value' 			=> [
							$video->players[0]['player_id'], 
							$video->players[1]['player_id']
						]
					]
				);

				echo $this->Html->div(
					'submit'
				);

				echo $this->Form->button(
					__('Edit'), 
						[
							'class'			=> 'btn btn-default btn-success btn-lg'
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
			/[\s]/g, '-') 
		+ '/' 
		+ $('#VideoRoundId option:selected').text().toLowerCase().replace(
			/[\s]/g, '-') 
		+ '/' 
		+ $('#VideoVideoTitle').val().toLowerCase().replace(
			/['"’]/g, '').replace(/[\s]/g, '-') 
		+ '/' 
		+ $('#VideoVideoSession option:selected').text().toLowerCase().replace(
			/[\s]/g, '-')
		);
});
$('#VideoVideoSession').bind('keypress blur', function() {
	$('#VideoVideoSlug').val(
		$('#VideoTournamentId option:selected').text().toLowerCase().replace(
			/[\s]/g, '-') 
		+ '/' 
		+ $('#VideoRoundId option:selected').text().toLowerCase().replace(
			/[\s]/g, '-') 
		+ '/' 
		+ $('#VideoVideoTitle').val().toLowerCase().replace(
			/['"’]/g, '').replace(/[\s]/g, '-') 
		+ '/' 
		+ $('#VideoVideoSession option:selected').text().toLowerCase().replace(
			/[\s]/g, '-')
		);
});
</script>