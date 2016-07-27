<?php $this->start('meta'); ?>
	<title>Snookview - Edit Player</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Player.player_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Player.player_surname'))); ?></li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php echo $this->Form->create('Player', array(
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
				'class' => 'well',
				'type' => 'file',
			)); ?>
	<fieldset>
		<legend><?php echo __('Edit Player'); ?></legend>
	<?php
		echo $this->Form->input('player_id');
		echo $this->Form->input('player_firstname', array(
			'label' => 'Firstname',
			'placeholder' => 'Firstname',
		));
		echo $this->Form->input('player_surname', array(
			'label' => 'Surname',
			'placeholder' => 'Surname',
		));
		echo $this->Form->input('player_slug', array(
			'label' => 'Slug',
			'placeholder' => 'Slug',
		));
		echo $this->Form->input('player_route', array(
			'label' => 'URL route',
			'placeholder' => 'URL route',
		));
		echo $this->Form->input('player_birthDate', array(
			'label' => 'BirthDate',
			'placeholder' => 'BirthDate',
			'dateFormat'=>'DMY', 
			'minYear'=>date('Y')-100, 
			'maxYear'=>date('Y')-0+1,
			'class' => 'form-control date' 
		));
		echo $this->Form->input('player_turnedPro', array(
			'type' => 'date',
		    'dateFormat' => 'Y',
		    'minYear' => date('Y')-100, 
		    'maxYear' => date('Y')-0+1, 
		    'label' => 'Turned Pro',
		    'empty' => '- select -',
		    'default' => date('Y'),
		    'name' => 'data[Player][player_turnedPro]',
		    'selected' => 'data[Date][date_year]'
		));
		echo $this->Form->input('player_nickname', array(
			'label' => 'Nickname',
			'placeholder' => 'Nickname',
		));
		echo $this->Form->input('player_nationality', array(
			'label' => 'Nationality',
			'placeholder' => 'Nationality',
			'type' => 'select',
			'options' => $nationalities
		));
		echo $this->Form->label('Select the player\'s country flag'
		);
		foreach($files as $f => $file): {
			echo $this->Html->image(h('flags/' . $file), array('class' => 'flag', 'id' => ($f + 1)));
			echo '&nbsp';
		}
		endforeach;
		echo $this->Form->input('player_flag', array(
			'label' => 'Flag Image',
			'placeholder' => 'Flag Image',
			'id' => 'playerFlag',
			'type' => 'hidden'
		));
		echo $this->Form->input('player_highestBreak', array(
			'label' => 'Highest Break',
			'placeholder' => 'Highest Break',
		));
		echo $this->Form->input('player_highestRanking', array(
			'label' => 'Highest Ranking',
			'placeholder' => 'Ranking',
		));
		echo $this->Form->input('player_centuryBreaks', array(
			'label' => 'Century Breaks',
			'placeholder' => 'Century Breaks',
		));
		echo $this->Form->input('player_careerWinnings', array(
			'label' => 'Career Winnings',
			'placeholder' => 'Career Winnings',
		));
		echo $this->Form->input('player_worldChampion', array(
			'label' => 'World Champion',
			'placeholder' => 'World Champion'
		));
		echo $this->Html->div('upload');
			echo $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove remove'));
			echo $this->Form->input('player_image', array(
				'label' => 'Player Image',
				'placeholder' => 'Player Image',
				'type' => 'file',
				'class' => 'input-upload form-control'
			));
		echo '</div>';
		echo $this->Form->input('player_imageSrc', array(
			'label' => 'Image Source',
			'placeholder' => 'Image Source'
		));
		echo $this->Form->input('player_category', array(
			'label' => 'Category',
			'placeholder' => 'Category',
			'type' => 'select',
			'options' => $categories
		));
		//echo $this->Form->input('Video');
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label' => __('Edit', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
</div>
<script>
$('img').click(function(){
   var src = $(this).attr('src');
   $('#playerFlag').val(src);
   //$('img#').attr('id').css('width', '60px');
 
});
$('img').click(function(){
	var id = this.id;
	var image = 'img#' . id;
	$('img#' + id).css({'width': '60px', 'height': '36px'});
	$('img').css({'width': '30px', 'height': '18px'});
	$('img#' + id).css({'width': '60px', 'height': '36px'});
});
</script>
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
$('#PlayerPlayerFirstname, #PlayerPlayerSurname').bind('keypress blur', function() {
	$('#PlayerPlayerSlug').val(
		$('#PlayerPlayerFirstname').val().toLowerCase().replace(
			/['"’\s]/g, '')
		+ '-'
		+ $('#PlayerPlayerSurname').val().toLowerCase().replace(
			/['"’\s]/g, '')
		);
});

$('#PlayerPlayerSlug').bind('keypress blur', function() {
	$('#PlayerPlayerRoute').val('Router::connect("/players/' + $('#PlayerPlayerSlug').val() + '", array("controller" => "players", "action" => "view", ' + $('#PlayerPlayerId').val() +'));');
});
</script>
