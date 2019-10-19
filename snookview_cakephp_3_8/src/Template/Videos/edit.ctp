<?php $this->start('meta'); ?>
	<title>Snookview - Edit Video</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
				$this->Form->postLink(
				    'Delete',[
				    	'action' => 'delete', $video->video_id
				    ],[
				    	'confirm' => 'Are you sure?'
				    ]
				)
				?>
			</li>
		</ul>
	</div>

	<div class="col-md-9">
		<?php echo $this->Form->create($video->video_id, array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
			'class' => 'well'
		)); ?>
	<fieldset>
		<legend><?php echo __('Edit Video'); ?></legend>
		<div class="form-group">
			<?php
				echo $this->Form->control($video->video_id, array(
					'label' => 'ID',
					'placeholder' => 'ID',
					'class' => 'form-control',
					'id' => 'VideoVideoId',
					'value' => $video->video_id
				))
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('video_title', array(
					'label' => 'Title',
					'placeholder' => 'Title',
					'class' => 'form-control',
					'id' => 'VideoVideoTitle',
					'value' => $video->video_title
				))
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('video_slug', array(
					'label' => 'Slug',
					'placeholder' => 'Slug',
					'class' => 'form-control',
					'id' => 'VideoVideoSlug',
					'value' => $video->video_slug
				));
			?>
		</div>
		<!-- <div class="form-group"> -->
			<?php
				/*echo $this->Form->control('video_route', array(
					'label' => 'URL route',
					'placeholder' => 'URL route',
					'class' => 'form-control',
					'id' => 'VideoVideoRoute',
					'value' => $video->video_route
				));*/
			?>
		<!-- </div> -->
		<div class="form-group">
			<?php
				echo $this->Form->control('video_date', array(
					'label' => 'Date',
					'placeholder' => 'Date',
					'type' => 'date',
					//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
					//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
					//'dateFormat' => 'd-m-Y H:i:s',
					'value' => $video->video_date
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('video_scoreA', array(
					'label' => 'Score A',
					'placeholder' => 'ScoreA',
					'class' => 'form-control',
					'value' => $video->video_scoreA
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('video_scoreB', array(
					'label' => 'Score B',
					'placeholder' => 'Score B',
					'class' => 'form-control',
					'value' => $video->video_scoreB
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('video_url', array(
					'label' => 'URL',
					'placeholder' => 'URL',
					'class' => 'form-control',
					'value' => $video->video_url
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('session_id', array(
					'class' => 'form-control',
					'id' => 'VideoVideoSession',
					'value' => $video->session_id
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('tournament_id', array(
					'class' => 'form-control',
					'id' => 'VideoTournamentId',
					'value' => $video->tournament_id
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('round_id', array(
					'class' => 'form-control',
					'id' => 'VideoRoundId',
					'value' => $video->round_id
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('timeline_id', array(
					'class' => 'form-control',
					'value' => $video->timeline_id
				));
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('players._ids', [
				    'options' => $players,
				    'id' => 'magicselect',
					'class' => 'form-control',
					'multiple' => true,
					'value' => [
						$video->players[0]['player_id'], 
						$video->players[1]['player_id']
					]
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

/*$('#VideoVideoSlug').bind('keypress blur', function() {
	$('#VideoVideoRoute').val('Router::connect("/videos/' + $('#VideoVideoSlug').val() + '", array("controller" => "videos", "action" => "view", ' + $('#VideoVideoId').val() +'));');
});*/
</script>