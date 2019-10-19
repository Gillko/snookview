<?php $this->start('meta'); ?>
	<title>Snookview - Add Video</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Video', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); ?>
	<fieldset>
		<legend><?php echo __('Add Video'); ?></legend>
	<?php
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
			'class' => 'form-control date'
		));
		echo $this->Form->input('video_scoreA', array(
			'label' => 'Score A',
			'placeholder' => 'Score A',
		));
		echo $this->Form->input('video_scoreB', array(
			'label' => 'Score B',
			'placeholder' => 'Score B',
		));
		echo $this->Form->input('video_url', array(
			'label' => 'URL',
			'placeholder' => 'URL',
		));
		echo $this->Form->input('tournament_id');
		echo $this->Form->input('round_id');
		echo $this->Form->input('timeline_id');
		echo $this->Form->input('session_id');
		echo $this->Form->input('Player');
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
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
	$('#VideoVideoRoute').val('Router::connect("/videos/' + $('#VideoVideoSlug').val() + '", array("controller" => "videos", "action" => "view", ' + "<?php echo $lastVideoID['Video']['video_id']+1; ?>" +'));');
});
</script>