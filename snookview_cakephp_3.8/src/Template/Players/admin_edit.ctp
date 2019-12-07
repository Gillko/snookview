<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Player</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
				$this->Form->postLink(
					'Delete',[
						'action' 			=> 'delete', $player->player_id
					],
					[
						'confirm' 			=> 'Are you sure?'
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
			echo $this->Form->create('Player', 
				[
					'inputDefaults' => 
					[
						'div' 				=> 'form-group',
						'wrapInput' 		=> false,
						'class' 			=> 'form-control'
					],
					'class' 				=> 'well',
					'type' 					=> 'file',
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Edit Player'); ?></legend>
			
			<?php
				echo $this->Form->control('player_firstname', 
					[
						'label' 			=> 'Firstname',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_firstname,
						'id' 				=> 'PlayerPlayerFirstname'
					]
				);
		
				echo $this->Form->control('player_surname', 
					[
						'label' 			=> 'Surname',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_surname,
						'id' 				=> 'PlayerPlayerSurname'
					]
				);
		
				echo $this->Form->control('player_slug', 
					[
						'label' 			=> 'Slug',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_slug,
						'id'				=> 'PlayerPlayerSlug'
					]
				);
		
				echo $this->Form->control('player_birthDate', 
					[
						'label' 			=> 'BirthDate',
						'type' 				=> 'date',
						//got to C:\MAMP\htdocs\snookview_cakephp_3_8\vendor\cakephp\cakephp\src\View\Helper\FormHelper.php
						//change 'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}', to 'dateWidget' => '{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}',
						//'dateFormat' => 'd-m-Y H:i:s',
						'value' 			=> $player->player_birthDate
					]
				);
		
				echo $this->Form->control($player->player_turnedPro, 
					[
						'type' 				=> 'year',
						'minYear' 			=> date('Y')-100, 
						'maxYear' 			=> date('Y')-0+1, 
						'label' 			=> 'Turned Pro',
						'empty' 			=> '- select -',
						'name' 				=> 'player_turnedPro',
						'class'				=> 'form-control',
						'value' 			=> $player->player_turnedPro,
						'id' 				=> 'player-turnedPro'
					]
				);
		
				echo $this->Form->control('player_nickname', 
					[
						'label' 			=> 'Nickname',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_nickname
					]
				);
		
				echo $this->Form->control('player_nationality', 
					[
						'label' 			=> 'Nationality',
						'type' 				=> 'select',
						'options' 			=> $nationalities,
						'class' 			=> 'form-control',
						'value' 			=> $player->player_nationality
					]
				);
		
				echo $this->Form->label('Select the player\'s country flag');

				foreach($files as $f => $file): {
					echo $this->Html->image(h('flags/' . $file), ['class' => 'flag', 'id' => ($f + 1)]);
					echo '&nbsp';
				}
				endforeach;
			
				echo $this->Form->control('player_flag', 
					[
						'label' 			=> 'Flag Image',
						'id' 				=> 'playerFlag',
						'type' 				=> 'hidden',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_flag
					]
				);
		
				echo $this->Form->control('player_highestBreak', 
					[
						'label' 			=> 'Highest Break',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_highestBreak
					]
				);
			
				echo $this->Form->control('player_highestRanking',
					[
						'label' 			=> 'Highest Ranking',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_highestRanking
					]
				);
		
				echo $this->Form->control('player_centuryBreaks',
					[
						'label' 			=> 'Century Breaks',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_centuryBreaks
					]
				);
	
				echo $this->Form->control('player_careerWinnings',
					[
						'label' 			=> 'Career Winnings',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_careerWinnings
					]
				);
		
				echo $this->Form->control('player_worldChampion', 
					[
						'label' 			=> 'World Champion',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_worldChampion
					]
				);
			?>
		
			<?php
				if(!empty($player->player_image)): 
			?>

				<div class="input">
					<label>Current Image (change by clicking image):</label>
					<?php echo $this->Html->image('/img/players/' . $player->player_image, ['class' => 'playerImage', 'width' => 100]); ?>
				</div>

			<?php
				else: 
			?>

				<div class="input">
					<label>Current Image (change by clicking image):</label>
					<?php echo $this->Html->image('players/Profile.jpg', ['class' => 'playerImage', 'width' => 100]); ?>
				</div>

			<?php endif;
				echo $this->Html->div('upload');
					echo $this->Html->tag('i', '', 
						[
							'class' 		=> 'glyphicon glyphicon-remove remove'
						]
					);
					echo $this->Form->control('player_image',
						[
							'label' 		=> 'Player Image',
							'type' 			=> 'file',
							'class' 		=> 'input-upload form-control',
							'value' 		=> $player->player_image,
							'required' 		=> true,
							'disabled' 		=> true
						]
					);
				echo '</div>';
			?>
		
			<?php
				echo $this->Form->control('player_imageSrc',
					[
						'label' 			=> 'Image Source',
						'class' 			=> 'form-control',
						'value' 			=> $player->player_imageSrc
					]
				);
		
				echo $this->Form->control('player_category',
					[
						'label' 			=> 'Category',
						'type' 				=> 'select',
						'options'			=> $categories,
						'class' 			=> 'form-control',
						'value' 			=> $player->player_category
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
	$('img.flag').click(function(){
		var src = $(this).attr('src');
		$('#playerFlag').val(src);
	});

	$('img.flag').click(function(){
		var id = this.id;
		var image = 'img#' . id;
		$('#' + id).css({'width': '60px', 'height': '36px'});
		$('img.flag').css({'width': '30px', 'height': '18px'});
		$('#' + id).css({'width': '60px', 'height': '36px'});
	});

	$('.remove').click(function(){
		$('.upload').slideToggle(0);
		$('.box').show();
		if($('.input-upload').attr('disabled'))
			$('.input-upload').removeAttr('disabled');
		else
			$('.input-upload').attr('disabled', 'disabled');
	})

	$('.upload').hide();
	$('.playerImage').click(function(){
		$('.upload').slideToggle(200);
		if($('.input-upload').attr('disabled'))
			$('.input-upload').removeAttr('disabled');
		else
			$('.input-upload').attr('disabled', 'disabled');
	})

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

	document.getElementById('player-turnedPro').setAttribute("name", "player_turnedPro");
</script>