<?php $this->start('meta'); ?>

	<title>Snookview - Admin Add Player</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-12">
		<?php 
			echo $this->Form->create('Players', 
				[
					'inputDefaults' => 
					[
						'div' 				=> 'form-group',
						'wrapInput' 		=> false,
						'class' 			=> 'form-control'
					],
					'class' 				=> 'well',
					'type' 					=> 'file'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Add Player'); ?></legend>
			<?php
				echo $this->Form->control('player_firstname', 
					[
						'label' 			=> 'Firstname',
						'placeholder' 		=> 'Firstname',
						'class' 			=> 'form-control',
						'id' 				=> 'PlayerPlayerFirstname'
					]
				);

				echo $this->Form->control('player_surname', 
					[
						'label' 			=> 'Surname',
						'placeholder' 		=> 'Surname',
						'class' 			=> 'form-control',
						'id' 				=> 'PlayerPlayerSurname'
					]
				);

				echo $this->Form->control('player_slug', 
					[
						'label' 			=> 'Slug',
						'placeholder' 		=> 'Slug',
						'class' 			=> 'form-control',
						'id' 				=> 'PlayerPlayerSlug'
					]
				);

				echo $this->Form->control('player_route', 
					[
						'label' 			=> 'URL route',
						'placeholder' 		=> 'URL route',
						'class' 			=> 'form-control',
						'id' 				=> 'PlayerPlayerRoute'
					]
				);

				echo $this->Form->control('player_birthDate', 
					[
						'type' 				=> 'date',
						'label' 			=> 'BirthDate',
						'placeholder' 		=> 'BirthDate',
						'dateFormat'		=> 'DMY', 
						'minYear'			=> date('Y')-100, 
						'maxYear'			=> date('Y')-0+1,
						'class' 			=> 'form-control date'
					]
				);

				echo $this->Form->label('Turned Pro');
				echo $this->Form->year('player_turnedPro', 
					[
				    	'empty' 			=> '- select -',
				    	'dateFormat' 		=> 'Y',
				    	'minYear' 			=> date('Y')-100, 
				    	'maxYear' 			=> date('Y'),
				    	'name' 				=> 'data[Player][player_turnedPro]',
				    	'class' 			=> 'form-control'
					]
				);

				echo $this->Form->control('player_nickname', 
					[
						'label' 			=> 'Nickname',
						'placeholder' 		=> 'Nickname',
						'class' 			=> 'form-control'
					]
				);

				echo $this->Form->control('player_nationality', 
					[
						'label' 			=> 'Nationality',
						'placeholder' 		=> 'Nationality',
						'type' 				=> 'select',
						'options' 			=> $nationalities,
						'class' 			=> 'form-control'
					]
				);

				echo $this->Form->label('Select the player\'s country flag');
					foreach($files as $f => $file): {
						echo $this->Html->image(h('flags/' . $file), 
							[
								'class' 	=> 'flag', 'id' => ($f + 1)
							]
						);
						echo '&nbsp';
					}
				endforeach;

				echo $this->Form->control('player_flag', 
					[
						'label' 			=> 'Flag Image',
						'placeholder' 		=> 'Flag Image',
						'id' 				=> 'playerFlag',
						'class' 			=> 'form-control',
						'type' 				=> 'hidden'
					]
				);

				echo $this->Form->control('player_highestBreak', 
					[
						'label' 			=> 'Highest Break',
						'placeholder' 		=> 'Highest Break',
						'class' 			=> 'form-control'
					]
				);

				echo $this->Form->control('player_highestRanking', 
					[
						'label' 			=> 'Highest Ranking',
						'placeholder' 		=> 'Ranking',
						'class' 			=> 'form-control'
					]
				);

				echo $this->Form->control('player_centuryBreaks', 
					[
						'label' 			=> 'Century Breaks',
						'placeholder' 		=> 'Century Breaks',
						'class' 			=> 'form-control'
					]
				);

				echo $this->Form->control('player_careerWinnings', 
					[
						'label' 			=> 'Career Winnings',
						'placeholder' 		=> 'Career Winnings',
						'class' 			=> 'form-control'
					]
				);

				echo $this->Form->control('player_worldChampion', 
					[
						'label' 			=> 'World Champion',
						'placeholder' 		=> 'World Champion',
						'class' 			=> 'form-control'
					]
				);

				echo $this->Html->div('upload');
					echo $this->Html->tag('i', '', 
						[
							'class' 		=> 'glyphicon glyphicon-remove remove'
						]
					);
					echo $this->Form->file('player_image', 
						[
							'label' 		=> 'Player Image',
							'placeholder' 	=> 'Player Image',
							'class' 		=> 'input-upload form-control'
					]);
				echo '</div>';

				echo $this->Form->control('player_imageSrc', 
					[
						'label' 			=> 'Image Source',
						'placeholder' 		=> 'Image Source',
						'class' 			=> 'form-control'
					]
				);

				echo $this->Form->control('player_category', 
					[
						'label' 			=> 'Category',
						'placeholder' 		=> 'Category',
						'type' 				=> 'select',
						'options' 			=> $categories,
						'class' 			=> 'form-control'
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
	$('img').click(function(){
	   var src = $(this).attr('src');
	   $('#playerFlag').val(src);
	});
	$('img').click(function(){
		var id = this.id;
		var image = 'img#' . id;
		$('img#' + id).css({'width': '60px', 'height': '36px'});
		$('img').css({'width': '30px', 'height': '18px'});
		$('img#' + id).css({'width': '60px', 'height': '36px'});
	});

	$('.remove').click(function(){
		$('.upload').slideToggle(0);
		$('.box').show();
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
		}
	);
</script>