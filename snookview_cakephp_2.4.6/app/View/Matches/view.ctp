<?php $this->start('meta'); ?>
	<title>Snookview - Matches</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<h3><?php echo h($match['Match']['match_title']); ?><br/>
	<?php echo h($this->Time->nice($match['Match']['match_created'])); ?></h3>
	<div class="col-md-1"></div>
	<div class="col-md-10 box noPaddingTablet noPaddingMobile">
		<div class="row">
			<div class="col-md-5 text-center">
				<p><?php echo h($match['Match']['match_player_one_firstname']); ?>
				<?php echo h($match['Match']['match_player_one_surname']); ?></p>
			</div>
			<div class="col-md-2 text-center">
				VS
			</div>
			<div class="col-md-5 text-center">
				<?php echo h($match['Match']['match_player_two_firstname']); ?>
				<?php echo h($match['Match']['match_player_two_surname']); ?>
			</div>
		</div>
		<div class="related">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3><?php echo __('Frames'); ?></h3>
					<?php if (!empty($match['Frame'])): ?>
						<?php foreach ($match['Frame'] as $frame): ?>
							<p><?php echo $this->Html->link($frame['frame_name'], array('controller' => 'frames', 'action' => 'view', $frame['frame_id'])); ?>
							</p>
							<p><?php echo $frame['frame_player_one_points']; ?> VS <?php echo $frame['frame_player_two_points']; ?></p>
						<?php endforeach; ?>
					<?php endif; ?>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center submit">
					<?php echo $this->Html->link('Create a frame', array('controller' => 'frames', 'action' => 'add'), array('class' => 'white btn btn-default btn-success btn-lg')); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>