<?php $this->start('meta'); ?>
	<title>Snookview - Edit Video</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Video.video_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Video.video_title'))); ?></li>
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
		echo $this->Form->input('video_id');
		echo $this->Form->input('video_title', array(
			'label' => 'Title',
			'placeholder' => 'Title',
		));
		echo $this->Form->input('video_slug', array(
			'label' => 'Slug',
			'placeholder' => 'Slug',
		));
		echo $this->Form->input('video_route', array(
			'label' => 'URL route',
			'placeholder' => 'URL route',
		));
		echo $this->Form->input('video_date', array(
			'label' => 'Date',
			'placeholder' => 'Date',
			'type' => 'date',
			'dateFormat' => 'DMY',
			'class' => 'form-control date'
		));
		echo $this->Form->input('video_scoreA', array(
			'label' => 'Score A',
			'placeholder' => 'ScoreA',
		));
		echo $this->Form->input('video_scoreB', array(
			'label' => 'Score B',
			'placeholder' => 'Score B',
		));
		echo $this->Form->input('video_url', array(
			'label' => 'URL',
			'placeholder' => 'URL',
		));
		echo $this->Form->input('video_url_playlist', array(
			'label' => 'Playlist URL',
			'placeholder' => 'Playlist URL',
		));
		echo $this->Form->input('video_part', array(
			'label' => 'Part',
			'placeholder' => 'Part',
			'type' => 'select',
			'options' => $parts
		));
		echo $this->Form->input('video_sort', array(
			'label' => 'Sort',
			'placeholder' => 'Sort',
			'options' => $sorts
		));
		/*echo $this->Form->input('video_order', array(
			'label' => 'Order of Players',
			'placeholder' => 'Order of Players',
		));*/
		echo $this->Form->input('tournament_id');
		echo $this->Form->input('round_id');
		echo $this->Form->input('timeline_id');
		echo $this->Form->input('Player');
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
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