<?php $this->start('meta'); ?>
	<title>Snookview - Edit Player</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
				$this->Form->postLink(
				    'Delete',[
				    	'action' => 'delete', $player->player_id
				    ],[
				    	'confirm' => 'Are you sure?'
				    ]
				)
				?>
				<?php
					echo $this->Form->end();
				?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Player.player_id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Player.player_surname'))); ?>
			</li>
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
			<div class="form-group">
				<?php
					echo $this->Form->control('player_firstname', array(
						'label' 		=> 'Firstname',
						'placeholder' 	=> 'Firstname',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_firstname,
						'id' 			=> 'PlayerPlayerFirstname'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_surname', array(
						'label' 		=> 'Surname',
						'placeholder' 	=> 'Surname',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_surname,
						'id' 			=> 'PlayerPlayerSurname'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_slug', array(
						'label' 		=> 'Slug',
						'placeholder' 	=> 'Slug',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_slug,
						'id'			=> 'PlayerPlayerSlug'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_birthDate', array(
						'label' 		=> 'BirthDate',
						'placeholder' 	=> 'BirthDate',
						'type' 			=> 'date',
						//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
						//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
						//'dateFormat' => 'd-m-Y H:i:s',
						'value' 		=> $player->player_birthDate
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control($player->player_turnedPro, [
						'type' 			=> 'year',
						'minYear' 		=> date('Y')-100, 
						'maxYear' 		=> date('Y')-0+1, 
						'label' 		=> 'Turned Pro',
						'empty' 		=> '- select -',
						'name' 			=> 'player_turnedPro',
						'class'			=> 'form-control',
						'value' 		=> $player->player_turnedPro,
						'id' 			=> 'player-turnedPro'
					])
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_nickname', array(
						'label' 		=> 'Nickname',
						'placeholder' 	=> 'Nickname',
						'class' 		=> 'form-control',
						 'value' 		=> $player->player_nickname
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_nationality', array(
						'label' 		=> 'Nationality',
						'placeholder' 	=> 'Nationality',
						'type' 			=> 'select',
						'options' 		=> $nationalities,
						'class' 		=> 'form-control',
						'value' 		=> $player->player_nationality
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->label('Select the player\'s country flag'
					);
					foreach($files as $f => $file): {
						echo $this->Html->image(h('flags/' . $file), array('class' => 'flag', 'id' => ($f + 1)));
						echo '&nbsp';
					}
					endforeach;
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_flag', array(
						'label' 		=> 'Flag Image',
						'placeholder' 	=> 'Flag Image',
						'id' 			=> 'playerFlag',
						'type' 			=> 'hidden',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_flag
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_highestBreak', array(
						'label' 		=> 'Highest Break',
						'placeholder' 	=> 'Highest Break',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_highestBreak
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_highestRanking', array(
						'label' 		=> 'Highest Ranking',
						'placeholder' 	=> 'Ranking',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_highestRanking
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_centuryBreaks', array(
						'label' 		=> 'Century Breaks',
						'placeholder' 	=> 'Century Breaks',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_centuryBreaks
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_careerWinnings', array(
						'label' 		=> 'Career Winnings',
						'placeholder' 	=> 'Career Winnings',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_careerWinnings
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_worldChampion', array(
						'label' 		=> 'World Champion',
						'placeholder' 	=> 'World Champion',
						'class' 		=> 'form-control',
						'value' 		=> $player->player_worldChampion
					));
				?>
			</div>
			<div class="form-group">
				<?php
					if(!empty($player->player_image)): 
				?>
					<div class="input">
						<label>Current Image (change by clicking image):</label>
						<?php echo $this->Html->image('/img/players/' . $player->player_image, array('class' => 'playerImage', 'width' => 100)); ?>
					</div>
				<?php
					else: 
				?>
					<div class="input">
						<label>Current Image (change by clicking image):</label>
						<?php echo $this->Html->image('players/Profile.jpg', array('class' => 'playerImage', 'width' => 100)); ?>
					</div>
				<?php endif;
					echo $this->Html->div('upload');
						echo $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove remove'));
						echo $this->Form->control('player_image', array(
							'label' 		=> 'Player Image',
							'placeholder' 	=> 'Player Image',
							'type' 			=> 'file',
							'class' 		=> 'input-upload form-control',
							'value' 		=> $player->player_image,
							'required' 		=> true,
							'disabled' 		=> true
						));
					echo '</div>';
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_imageSrc', array(
						'label' 			=> 'Image Source',
						'placeholder' 		=> 'Image Source',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_imageSrc
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('player_category', array(
						'label' 			=> 'Category',
						'placeholder' 		=> 'Category',
						'type' 				=> 'select',
						'options'			=> $categories,
						'class' 			=> 'form-control',
						'value' 			=> $player->player_category
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
$('img.flag').click(function(){
   var src = $(this).attr('src');
   $('#playerFlag').val(src);
   //$('img#').attr('id').css('width', '60px');
 
});
$('img.flag').click(function(){
	var id = this.id;
	var image = 'img#' . id;
	$('#' + id).css({'width': '60px', 'height': '36px'});
	$('img.flag').css({'width': '30px', 'height': '18px'});
	$('#' + id).css({'width': '60px', 'height': '36px'});
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
$('.upload').hide();
$('.playerImage').click(function(){
	$('.upload').slideToggle(200);
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
<script>
	document.getElementById('player-turnedPro').setAttribute("name", "player_turnedPro");
</script>
