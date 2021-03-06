<?php $this->start('meta'); ?>
	<title>Snookview - Frame</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 noPaddingTablet noPaddingMobile ranking front">
		<h3><?php echo __('Scoreboard'); ?></h3>
		<ul class="scoreboard text-center">
			<li class="snookerball" id="red" value="1"></li>
			<li class="snookerball" id="yellow" value="2"></li>
			<li class="snookerball" id="green" value="3"></li>
			<li class="snookerball" id="brown" value="4"></li>
			<li class="snookerball" id="blue" value="5"></li>
			<li class="snookerball" id="pink" value="6"></li>
			<li class="snookerball" id="black" value="7"></li>
			<li class="snookerball" id="white" value="0"></li>
		</ul>
		<ul class="scoreboard text-center">
			<li class="snookerball white" id="whiteFour" value="4">4</li>
			<li class="snookerball white" id="whiteFive" value="5">5</li>
			<li class="snookerball white" id="whiteSix" value="6">6</li>
			<li class="snookerball white" id="whiteSeven" value="7">7</li>
			<li class="snookerball white" id="whiteFree" value="1">F</li>
		</ul>
		<!-- <ul class="fouls text-center">
			<li class="foul snookerball white" id="whiteFour" value="4">4</li>
			<li class="foul snookerball white" id="whiteFive" value="5">5</li>
			<li class="foul snookerball white" id="whiteSix" value="6">6</li>
			<li class="foul snookerball white" id="whiteSeven" value="7">7</li>
		</ul> -->
		<!-- <ul class="freeball text-center">
			<li class="snookerball" id="yellow" value="1"></li>
			<li class="snookerball" id="green" value="1"></li>
			<li class="snookerball" id="brown" value="1"></li>
			<li class="snookerball" id="blue" value="1"></li>
			<li class="snookerball" id="pink" value="1"></li>
			<li class="snookerball" id="black" value="1"></li>
		</ul> -->
		<!-- <div class="row">
			<div class="submit col-md-12 text-center">
				<button class="foul btn btn-default btn-success btn-lg">Foul</button>
				<button class="freeball btn btn-default btn-success btn-lg">Free Ball</button>
			</div>
		</div> -->
		<div class="row">
			<div class="submit col-md-6 text-center">
				<button class="player_one btn btn-default btn-success btn-lg" value="0">Player One</button>
				<ul class="score_player_one">
					<li class="points points_with_fouls_and_free_balls_player_one_text"></li>
					<li class="points points_player_one_text"></li>
					<li>Current Break:</li>
					<li class="break_player_one_text"></li>
					<li>Highest Break:</li>
					<li class="highest_break_player_one_text"></li>
					<li>Possible end score:</li>
					<li class="end_game_player_one"></li>
					<!-- <li>Foul Points:</li>
					<li class="foul_points_player_one_text"></li>
					<li>Free Ball Points:</li>
					<li class="free_ball_points_player_one_text"></li> -->
				</ul>
				<ul class="breaks_player_one">
					<li>Breaks:</li>
				</ul>
				<ul class="scoreboard balls_player_one">
				</ul>
			</div>
			<div class="submit col-md-6 text-center">
				<button class="player_two btn btn-default btn-success btn-lg" value="0">Player Two</button>
				<ul class="score_player_two">
					<li class="points points_with_fouls_and_free_balls_player_two_text"></li>
					<li class="points points_player_two_text"></li>
					<li>Current Break:</li>
					<li class="break_player_two_text"></li>
					<li>Highest Break:</li>
					<li class="highest_break_player_two_text"></li>
					<li>Possible end score:</li>
					<li class="end_game_player_two"></li>
					<!-- <li>Foul Points:</li>
					<li class="foul_points_player_two_text"></li> -->
					<!-- <li>Free Ball Points:</li>
					<li class="free_ball_points_player_two_text"></li> -->
				</ul>
				<ul class="breaks_player_two">
					<li>Breaks:</li>
				</ul>
				<ul class="scoreboard balls_player_two">
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<h3>Points on the table:</h3>
				<p class="available_points">147</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<p class="counter"></p>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 noPaddingTablet noPaddingMobile ranking front">
		<h3><?php echo __('Create a frame'); ?></h3>
		<?php echo $this->Form->create('Frame', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); ?>
		<fieldset>
		<?php
			echo $this->Form->input('frame_name', array(
				'label' => 'Frame',
				'placeholder' => 'Frame',
			));
			echo $this->Form->input('frame_player_one_break', array(
				'label' => 'Player One Current Break',
				'placeholder' => 'Player One Current Break',
				'class' => 'break_player_one form-control'
			));
			echo $this->Form->input('frame_player_one_points', array(
				'label' => 'Player One Points',
				'placeholder' => 'Player One Points',
				'class' => 'points_player_one form-control'
			));
			echo $this->Form->input('frame_player_one_highest_break', array(
				'label' => 'Player One Highest Break',
				'placeholder' => 'Player One Highest Break',
				'class' => 'highest_break_player_one form-control'
			));
			echo $this->Form->input('frame_player_one_breaks', array(
				'label' => 'Player One Breaks',
				'placeholder' => 'Player One Breaks',
				'class' => 'frame_breaks_player_one form-control'
			));
			echo $this->Form->input('frame_player_one_balls', array(
				'label' => 'Player One Balls',
				'placeholder' => 'Player One Balls',
				'class' => 'frame_balls_player_one form-control'
			));
			echo $this->Form->input('frame_player_two_break', array(
				'label' => 'Player Two Current Break',
				'placeholder' => 'Player Two Current Break',
				'class' => 'break_player_two form-control'
			));
			echo $this->Form->input('frame_player_two_points', array(
				'label' => 'Player Two Points',
				'placeholder' => 'Player Two Points',
				'class' => 'points_player_two form-control'
			));
			echo $this->Form->input('frame_player_two_highest_break', array(
				'label' => 'Player Two Highest Break',
				'placeholder' => 'Player Two Highest Break',
				'class' => 'highest_break_player_two form-control'
			));
			echo $this->Form->input('frame_player_two_breaks', array(
				'label' => 'Player Two Breaks',
				'placeholder' => 'Player Two Breaks',
				'class' => 'frame_breaks_player_two form-control'
			));
			echo $this->Form->input('frame_player_two_balls', array(
				'label' => 'Player Two Balls',
				'placeholder' => 'Player Two Balls',
				'class' => 'frame_balls_player_two form-control'
			));
			/*echo $this->Form->input('frame_time', array(
				'label' => 'Time',
				'placeholder' => 'Time',
			));*/
			echo $this->Form->input('frame_created', array(
				'label' => 'Created',
				'type' => 'hidden'
			));
			echo $this->Form->input('match_id');
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
	<div class="col-md-1"></div>
</div>
<script>
	$(document).ready(function() {

		$("li#red").click(function() {
			console.log( "Adding 1 point." );
		});
		$("li#yellow").click(function() {
			console.log( "Adding 2 points." );
		});
		$("li#green").click(function() {
			console.log( "Adding 3 points." );
		});
		$("li#brown").click(function() {
			console.log( "Adding 4 points." );
		});
		$("li#blue").click(function() {
			console.log( "Adding 5 points." );
		});
		$("li#pink").click(function() {
			console.log( "Adding 6 points." );
		});
		$("li#black").click(function() {
			console.log( "Adding 7 points." );
		});
		
		var count = 0;
		var countColors = 0;
		$("li#red").click(function() {
			count = count+1;
			if(count <= 15){
				$(".available_points").text($(".available_points").text() - 8);
			}
			if(count == 15){
				$(this).hide();
				$("li#yellow, li#green, li#brown, li#blue, li#pink, li#black, li#white").click(function() {
					countColors = countColors+1;
					if(countColors == 1){
						$('li#yellow').click(function() {
							$(".available_points").text($(".available_points").text() - 2);
							$(this).hide();
						});
						$('li#green').click(function() {
							$(".available_points").text($(".available_points").text() - 3);
							$(this).hide();
						});
						$('li#brown').click(function() {
							$(".available_points").text($(".available_points").text() - 4);
							$(this).hide();
						});
						$('li#blue').click(function() {
							$(".available_points").text($(".available_points").text() - 5);
							$(this).hide();
						});
						$('li#pink').click(function() {
							$(".available_points").text($(".available_points").text() - 6);
							$(this).hide();
						});
						$('li#black').click(function() {
							$(".available_points").text($(".available_points").text() - 7);
							$(this).hide();
						});
					}
				});
			}	else {
				$(this).show();
				$("li#yellow, li#green, li#brown, li#blue, li#pink, li#black").click(function() {
					$(this).show();
				});
			}
		});

		/**/
		$("button.player_one").click(function() {
			$("button.player_one").attr('disabled','disabled');
			$("button.player_two").removeAttr('disabled');
			console.log( "Player One is at the table" );
			$("ul.fouls").hide();
			$("ul.freeball").hide();
			$("button.player_one").val(1);
			$("button.player_two").val(0);
			$("button.player_one").css("background-color", "#000");
			$("button.player_two").css("background-color", "#adce8f");

			var Break_Player_One = 0;
			
			$('ul.scoreboard li').click(function(){
				if($("button.player_one").val() == '1'){
					Break_Player_One = Number(Break_Player_One) + Number($(this).val());
				}
				$('.break_player_one').val(Break_Player_One);
				$("li.break_player_one_text").text(Break_Player_One);
			});
		
			var break_player_two_overview = $('.break_player_two').val();
			if($(".break_player_two").val() > 0 ){
				$("ul.breaks_player_two").append('<li class="break">' + break_player_two_overview + '</li>');
				$('.frame_breaks_player_two').append(break_player_two_overview + " ");
			}
			if($(".break_player_two").val() > $('.highest_break_player_two').val()){
				$('.highest_break_player_two').val($(".break_player_two").val());
				$('li.highest_break_player_two_text').text($(".break_player_two").val());
			}
		});

		$("button.player_two").click(function() {
			$("button.player_one").removeAttr('disabled');
			$("button.player_two").attr('disabled','disabled');
			console.log( "Player Two is at the table" );
			$("ul.fouls").hide();
			$("ul.freeball").hide();
			$("button.player_one").val(0);
			$("button.player_two").val(1);
			$("button.player_one").css("background-color", "#adce8f");
			$("button.player_two").css("background-color", "#000");

			if(count == 15){
				countColors = 1;
			}

			var Break_Player_Two = 0;
			$('ul.scoreboard li').click(function(){
				if($("button.player_two").val() == '1'){
					Break_Player_Two = Number(Break_Player_Two) + Number($(this).val());
				}
				$('.break_player_two').val(Break_Player_Two);
				$("li.break_player_two_text").text(Break_Player_Two);
			});
			
			var break_player_one_overview = $('.break_player_one').val();
			if($(".break_player_one").val() > 0 ){
				$("ul.breaks_player_one").append('<li class="break">' + break_player_one_overview + '</li>');
				$('.frame_breaks_player_one').append(break_player_one_overview + " ");
			}
			
			if($(".break_player_one").val() > $('.highest_break_player_one').val()){
				$('.highest_break_player_one').val($(".break_player_one").val());
				$('.highest_break_player_one_text').text($(".break_player_one").val());
			}

		});

		/**/
		var Points_Player_One = 0;
		var Points_Player_Two = 0;
		var end_game_player_one = 147;
		var end_game_player_two = 147;
		$('ul.scoreboard li').click(function(){
			if($("button.player_one").val() == '1'){
				Points_Player_One = Number(Points_Player_One) + Number($(this).val());
				
			}
			$('.points_player_one').val(+(Points_Player_One));
			$('li.points_player_one_text').text(+(Points_Player_One));
			

			if($("button.player_two").val() == '1'){
				Points_Player_Two = Number(Points_Player_Two) + Number($(this).val());
			}
			$('.points_player_two').val(+(Points_Player_Two));
			$('li.points_player_two_text').text(+(Points_Player_Two + Foul_Points_Player_One));

			if(count < 15){
				end_game_player_one = Number(Points_Player_One) + Number($(".available_points").text());
				$(".end_game_player_one").text(end_game_player_one);

				end_game_player_two = Number(Points_Player_Two) + Number($(".available_points").text());
				$(".end_game_player_two").text(end_game_player_two);
			}

			if(count == 15){
				end_game_player_one = Number(Points_Player_One) + Number($(".available_points").text() - Number($(this).val()));
				$(".end_game_player_one").text(end_game_player_one);

				end_game_player_two = Number(Points_Player_Two) + Number($(".available_points").text() - Number($(this).val()));
				$(".end_game_player_two").text(end_game_player_two);
			}
		});
		
		/**/
		var Foul_Points_Player_One = 0;
		var Foul_Points_Player_Two = 0;
		$('ul.fouls li').click(function(){
			if($("button.player_one").val() == '1'){
				Foul_Points_Player_One = Number(Foul_Points_Player_One) + Number($(this).val());
			}
			$('li.foul_points_player_one_text').text(+(Foul_Points_Player_One));
			
			
			if($("button.player_two").val() == '1'){
				Foul_Points_Player_Two = Number(Foul_Points_Player_Two) + Number($(this).val());
			}
			
			$('li.foul_points_player_two_text').text(+(Foul_Points_Player_Two));
		});

		/**/
		var Free_Ball_Points_Player_One = 0;
		var Free_Ball_Points_Player_Two = 0;
		$('ul.freeball li').click(function(){
			if($("button.player_one").val() == '1'){
				Free_Ball_Points_Player_One = Number(Free_Ball_Points_Player_One) + Number($(this).val());
			}
			$('li.free_ball_points_player_one_text').text(+(Free_Ball_Points_Player_One));
			
			
			if($("button.player_two").val() == '1'){
				Free_Ball_Points_Player_Two = Number(Free_Ball_Points_Player_Two) + Number($(this).val());
			}
			
			$('li.free_ball_points_player_two_text').text(+(Free_Ball_Points_Player_Two));
		});

		/**/
		$('ul.scoreboard li').click(function(){
			if($("button.player_one").val() == '1'){
				var idOfBallPlayerOne = $(this).attr('id');
				
				$("ul.balls_player_one").append('<li class="snookerballS" id=' + idOfBallPlayerOne + '></li>');
				console.log(idOfBallPlayerOne);

				$('.frame_balls_player_one').text($("ul.balls_player_one").html().trim());
			}
			if($("button.player_two").val() == '1'){
				var idOfBallPlayerTwo = $(this).attr('id');
				
				$("ul.balls_player_two").append('<li class="snookerballS" id=' + idOfBallPlayerTwo + '></li>');
				console.log(idOfBallPlayerTwo);

				$('.frame_balls_player_two').text($("ul.balls_player_two").html().trim());
			}
		});

		/**/
		/*$("ul.fouls").hide();
		$("ul.freeball").hide();

		$("button.foul").click(function() {
			$("ul.fouls").show();
		});

		$("button.freeball").click(function() {
			$("ul.freeball").show();
		});

		$("ul.fouls li").click(function() {
			$("ul.fouls").hide();
		});

		$("ul.freeball li").click(function() {
			$("ul.freeball").hide();
		});*/
	});
</script>