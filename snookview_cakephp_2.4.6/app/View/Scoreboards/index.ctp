<?php $this->start('meta'); ?>
	<title>Snookview - Match</title>
	<style>
		.snookerball{
			width: 50px;
		    height: 50px;
		    border-radius: 50%;
		}
		#white{
			background: #FFF;
		}
		#red {
		    background: #6d1714;
		}
		#yellow {
		    background: #b0932c;
		}
		#green {
		    background: #14413b;
		}
		#brown {
		    background: #523d16;
		}
		#blue {
		    background: #103867;
		}
		#pink {
		    background: #c3677a;
		}
		#black {
		    background: #000;
		}
		ul.scoreboard li{
			list-style-type: none;
			display: inline-block;
		}
		ul{
			-webkit-padding-start: 0px;
		}
		ul.score_player_one li,
		ul.score_player_two li{
			list-style-type: none;
		}
	</style>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 noPaddingTablet noPaddingMobile ranking front">
		<h3><?php echo __('Scoreboard'); ?></h3>
		<ul class="scoreboard text-center">
			<li class="snookerball" id="white" value="4"></li>
			<li class="snookerball" id="red" value="1"></li>
			<li class="snookerball" id="yellow" value="2"></li>
			<li class="snookerball" id="green" value="3"></li>
			<li class="snookerball" id="brown" value="4"></li>
			<li class="snookerball" id="blue" value="5"></li>
			<li class="snookerball" id="pink" value="6"></li>
			<li class="snookerball" id="black" value="7"></li>
		</ul>
		<div class="row">
			<div class="col-md-6 text-center">
				<button class="player_one" value="0">Player One</button>
				<ul class="score_player_one">
					<li>Break:</li>
					<li class="break_player_one"></li>
					<li>Points:</li>
					<li class="points_player_one"></li>
					<li>Breaks:</li>
				</ul>
			</div>
			<div class="col-md-6 text-center">
				<button class="player_two" value="0">Player Two</button>
				<ul class="score_player_two">
					<li>Break:</li>
					<li class="break_player_two"></li>
					<li>Points:</li>
					<li class="points_player_two"></li>
					<li>Breaks:</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<script>
	$(document).ready(function() {
		$("li#white").click(function() {
			console.log( "You scratched the white and lose 4 points." );
			$("p.break_player_one").value();
		});
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

		$("button.player_one").click(function() {
		    console.log( "Player One is at the table" );
			$("button.player_one").val(1);
			$("button.player_two").val(0);
			$("button.player_one").css("background-color", "#b0932c");
			$("button.player_two").css("background-color", "transparent");

			var Break_Player_One = 0;
			$('li').click(function(){
				if($("button.player_one").val() == '1'){
					Break_Player_One = Number(Break_Player_One) + Number($(this).val());
					$('.break_player_one').text(Break_Player_One);
				}
			});

			var break_player_two_overview = $('.break_player_two').text();
			if($(".break_player_two").text() > 0 ){
				$("ul.score_player_two").append('<li class="breaks_player_two">' + break_player_two_overview + '</li>');
				$(".break_player_two").text(0);
			}
		});

		var Points_Player_One = 0;
		$('li').click(function(){
			if($("button.player_one").val() == '1'){
				Points_Player_One = Number(Points_Player_One) + Number($(this).val());
			}
			$('.points_player_one').text(+(Points_Player_One));
		});

		$("button.player_two").click(function() {
			console.log( "Player Two is at the table" );
			$("button.player_one").val(0);
			$("button.player_two").val(1);
			$("button.player_one").css("background-color", "transparent");
			$("button.player_two").css("background-color", "#b0932c");


			var Break_Player_Two = 0;
			$('li').click(function(){
				if($("button.player_two").val() == '1'){
					Break_Player_Two = Number(Break_Player_Two) + Number($(this).val());
					$('.break_player_two').text(Break_Player_Two);
				}
			});
			
			var break_player_one_overview = $('.break_player_one').text();
			if($(".break_player_one").text() > 0 ){
				$("ul.score_player_one").append('<li class="breaks_player_one">' + break_player_one_overview + '</li>');

				$(".break_player_one").text(0);
			}
		});

		var Points_Player_Two = 0;
		$('li').click(function(){
			if($("button.player_two").val() == '1'){
				Points_Player_Two = Number(Points_Player_Two) + Number($(this).val());
				$('.points_player_two').text(+(Points_Player_Two));
			}
		});
	});
</script>