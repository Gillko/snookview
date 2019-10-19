<?php $this->start('meta'); ?>
	<title>Snookview - Frame</title>

	<style>
		.snookerball{
			width: 50px;
		    height: 50px;
		    border-radius: 50%;
		}
		.snookerballS{
			width: 10px;
		    height: 10px;
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
		.points{
			font-size: 35px;
		}
		ul.scoreboard li,
		ul.fouls li{
			list-style-type: none;
			display: inline-block;
		}
		ul.fouls li.foul,
		.points,
		.available_points{
			font-size: 35px;
		}
		ul{
			-webkit-padding-start: 0px;
		}
	</style>
<?php $this->end(); ?>
<div class="row">
	<h3><?php echo h($frame['Frame']['frame_name']); ?></h3>
	<div class="col-md-1"></div>
	<div class="col-md-10 box noPaddingTablet noPaddingMobile">
		<div class="row">
			<div class="col-md-6 text-center">
				<p>Player One</p>
				<ul class="score_player_one">
					<li>Points</li>
					<li class="points points_player_one_text"><?php echo($frame['Frame']['frame_player_one_points']) ?></li>
					<li>Highest Break:</li>
					<li class="highest_break_player_one_text"><?php echo($frame['Frame']['frame_player_one_highest_break']) ?></li>
					<li>Breaks:</li>
					<li class=""><?php echo($frame['Frame']['frame_player_one_breaks']) ?></li>
				</ul>
				<ul class="scoreboard balls_player_one">
					<?php echo($frame['Frame']['frame_player_one_balls']) ?>
				</ul>
			</div>
			<div class="col-md-6 text-center">
				<p>Player Two</p>
				<ul class="score_player_two">
					<li>Points</li>
					<li class="points points_player_two_text"><?php echo($frame['Frame']['frame_player_two_points']) ?></li>
					<li>Highest Break:</li>
					<li class="highest_break_player_two_text"><?php echo($frame['Frame']['frame_player_two_highest_break']) ?></li>
					<li>Breaks:</li>
					<li class=""><?php echo($frame['Frame']['frame_player_two_breaks']) ?></li>
				</ul>
				<ul class="scoreboard balls_player_two">
					<?php echo($frame['Frame']['frame_player_two_balls']) ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>