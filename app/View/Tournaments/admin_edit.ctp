<?php $this->start('meta'); ?>
	<title>Snookview - Edit Tournament</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tournament.tournament_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Tournament.tournament_name'))); ?></li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create('Tournament', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well',
			'type' => 'file'
		)); ?>
	<fieldset>
		<legend><?php echo __('Edit Tournament'); ?></legend>
	<?php
		echo $this->Form->input('tournament_id');
		echo $this->Form->input('tournament_year', array(
			'type' => 'date',
		    'dateFormat' => 'Y',
		    'minYear' => date('Y')-100, 
		    'maxYear' => date('Y')-0+1, 
		    'label' => 'Year',
		    'empty' => '- select -',
		    'default' => date('Y'),
		    'name' => 'data[Tournament][tournament_year]',
		    'selected' => 'data[Tournament][tournament_year]',
		));
		echo $this->Form->input('tournament_name', array(
			'label' => 'Name',
			'placeholder' => 'Name',
		));
		echo $this->Form->input('tournament_slug', array(
			'label' => 'Slug',
			'placeholder' => 'Slug',
		));
		echo $this->Form->input('tournament_route', array(
			'label' => 'URL route',
			'placeholder' => 'URL route',
		));
		echo $this->Form->input('tournament_vennue', array(
			'label' => 'Vennue',
			'placeholder' => 'Vennue',
		));
		echo $this->Form->input('tournament_beginDate', array(
			'class' => 'form-control date',
			'label' => 'Begin Date',
			'dateFormat'=>'DMY', 
			'minYear'=>date('Y')-100, 
			'maxYear'=>date('Y')-0+1,
		));
		echo $this->Form->input('tournament_endDate', array(
			'class' => 'form-control date',
			'label' => 'End Date',
			'dateFormat'=>'DMY', 
			'minYear'=>date('Y')-100, 
			'maxYear'=>date('Y')-0+1,
		));
		echo $this->Html->div('upload');
			echo $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove remove'));
			echo $this->Form->input('tournament_winner', array(
			'label' => 'Image',
			'placeholder' => 'Image',
			'type' => 'file',
			'class' => 'input-upload form-control'
		));
		echo '</div>';
		echo $this->Form->input('tournament_winnerSrc', array(
			'label' => 'Source of image',
			'placeholder' => 'Source of image',
		));
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
<script>
	$('.remove').click(function(){
		$('.upload').slideToggle(0);
		$('.box').show();
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
});

$('#TournamentTournamentSlug').bind('keypress blur', function() {
	$('#TournamentTournamentRoute').val('Router::connect("/tournaments/' + $('#TournamentTournamentSlug').val() + '", array("controller" => "tournaments", "action" => "view", ' + $('#TournamentTournamentId').val() +'));');
});
</script>