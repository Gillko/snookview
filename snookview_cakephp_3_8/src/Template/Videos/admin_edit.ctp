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
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Video.video_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Video.video_title'))); ?></li>
		</ul>
	</div>

	<div class="col-md-9">
		<?php echo $this->Form->create('Video', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
			'class' => 'well'
		)); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Video'); ?></legend>
		<?php
			echo $this->Form->control('video_id', array(
				'class' => 'form-control'
			))
		?>
		<?php
			echo $this->Form->control('video_title', array(
				'label' => 'Title',
				'placeholder' => 'Title',
				'class' => 'form-control',
				'value' => $video
			))
		?>
		<?php
			echo $this->Form->control('video_slug', array(
				'label' => 'Slug',
				'placeholder' => 'Slug',
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('video_route', array(
				'label' => 'URL route',
				'placeholder' => 'URL route',
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('video_date', array(
				'label' => 'Date',
				'placeholder' => 'Date',
				'type' => 'date',
				'dateFormat' => 'DMY',
				'class' => 'form-control date',
			));
		?>
		<?php
			echo $this->Form->control('video_scoreA', array(
				'label' => 'Score A',
				'placeholder' => 'ScoreA',
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('video_scoreB', array(
				'label' => 'Score B',
				'placeholder' => 'Score B',
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('video_url', array(
				'label' => 'URL',
				'placeholder' => 'URL',
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('video_url_playlist', array(
				'label' => 'Playlist URL',
				'placeholder' => 'Playlist URL',
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('video_part', array(
				'label' => 'Part',
				'placeholder' => 'Part',
				'type' => 'select',
				'options' => $parts,
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('video_sort', array(
				'label' => 'Sort',
				'placeholder' => 'Sort',
				'options' => $sorts,
				'class' => 'form-control'
			));
		?>
		<?php
		?>
		<?php
			echo $this->Form->control('tournament_id', array(
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('round_id', array(
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('timeline_id', array(
				'class' => 'form-control'
			));
		?>
		<?php
			echo $this->Form->control('players._ids', [
			    'options' => $players,
			    'id' => 'magicselect',
				'class' => 'form-control',
				'multiple' => true
			]);
		?>
		<div class="submit">
			<?php
				echo $this->Form->button(__('Edit'),['class'=> 'btn btn-default btn-success btn-lg']);
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
			/[\s]/g, '-') + '/' + $('#VideoRoundId option:selected').text().toLowerCase().replace(
			/[\s]/g, '-') + '/' + $('#VideoVideoTitle').val().toLowerCase().replace(
			/['"’]/g, '').replace(/[\s]/g, '-')
		);
});

$('#VideoVideoSlug').bind('keypress blur', function() {
	$('#VideoVideoRoute').val('Router::connect("/videos/' + $('#VideoVideoSlug').val() + '", array("controller" => "videos", "action" => "view", ' + $('#VideoVideoId').val() +'));');
});
</script>